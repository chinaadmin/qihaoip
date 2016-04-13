<?php
namespace Index\Controller;
class TrademarkController extends IndexBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	/*
	 *空操作 
	 */
	public function _empty(){
		$url_self = $_SERVER['PHP_SELF'];
		$url_self = strtolower($_SERVER['PHP_SELF']);
		if(strstr($url_self, 'show-')){//trademark/show-1407.html
			$id = str_replace('/index.php/trademark/show-', '', $url_self);
			$id = str_replace('.html', '', $id);
			$id = $id + 10000000;
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /trademark/".$id.".html");
			exit;
		}
		switch (ACTION_NAME){
			case 'fine':
				//$_GET['tuijian'] = '1';//精品商标
				return $this->finetrade();
			case 'price':
				$_GET['tuijian'] = '2';//一口价商标
				return $this->tradelist();
			case 'foreign':
				$_GET['are'] = '3';//涉外商标
				return $this->tradelist();
			default:
				if(is_numeric(ACTION_NAME)){
					if(!strstr($_SERVER['PHP_SELF'], '.html') || !strstr($_SERVER['PHP_SELF'], 'trademark')){
						Header("HTTP/1.1 301 Moved Permanently");
						Header("Location: /trademark/".ACTION_NAME.".html");
						exit;
					}
					$_GET['id'] = I('path.1');
					return $this->detail();
				} else {
					$list = explode('type',I('path.1'));
					if(stristr(I('path.1'),'type')&&!$list['0']&&is_numeric($list['1'])||empty($list['1'])){
						return $this->tradelist($list['1']);
					}else {
						$this->show_404('页面不存在！！！！');
					}
				}
		}
	}
    
	public function index(){
		if($_SERVER['PHP_SELF']!='/index.php/trademark/'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /trademark/");
			exit;
		}
		$data = $this->get_data(2,'3','10');//商标市场公共数据
		$data['banner'] = $this->data_ad(160);//获取首页banner信息
		$data['lbav'] = $this->data_ad(179);//获取首页商标列表广告
		$data['tgav'] = $this->data_ad(180);//获取首页商标市场通告栏广告
		$data['artbanner'] = $this->data_ad(161);
		$data['supply'] = $this->supply();//商标求购信息
		$data['trade_fine'] = $this->trade_fine();//精品商标
		$data['trade_price'] = $this->trade_price();//一口价商标
		$data['starshop'] = $this->adv('174');//商城首页明星旗舰店广告位
		$data['trade'] = $this->trade($data);//商标
		$data['sbbk'] =M('article')->where(array('groupid'=>75,'tmpa'=>1))->order(array('addtime'=>'desc'))->limit(4)->select();
		/* 标题title，关键词keywords，描述description */
    	$data['title'] = $data['menu'][0]['title'];
    	$data['keywords'] = $data['menu'][0]['alt'];
    	$data['description'] = $data['menu'][0]['about'];
    	$data['isindex'] = TRUE;
		$data['nav_type'] = 2; 
		$this->assign('data',$data);
    	$this->display('index');
	}
	
	/**
	 * 获取 专利首页，七号商城商标
	 */
	private function qihao_mall(){
		$arr = M('Shop')->field('id,name,logo')->where('state=3')->order('tuijian desc,sort desc,id desc')->limit(6)->select();
		
		return $arr;
	}
	
	/**
	 * 商标求购信息
	 */
	private function supply(){
		$arr = M('Supply as s')->join('qh_member as m ON m.id = s.userid')->join('qh_items as it on s.groupid=it.id')->field('s.id,s.uid,s.tmpa,s.groupid,s.endtime,s.title,s.pricemax,m.qq,it.name')->where('s.tmpa=1 and s.state=1 and (s.endtime = 0 or s.endtime >'.time().')')->order('s.addtime desc,s.id desc')->limit(20)->select();
		
		return $arr;
	}
	
	/**
	 * 精品商标
	 */
	private function trade_fine(){
		return M('item as i')->join('qh_items as it on i.groupid=it.id')->field('i.id,i.title,it.name,i.price,i.tmno,i.tmlimit,i.img')->where(array('i.tmpa'=>'1','i.tuijian'=>'1','i.state'=>'1'))->limit(10)->order(array('id'=>'desc'))->select();
	}
	
	/**
	 * 一口价商标
	 */
	private function trade_price(){
		return M('item as i')->join('qh_items as it on i.groupid=it.id')->field('i.id,i.title,it.name,i.price,i.tmno,i.tmlimit,i.img')->where(array('i.tmpa'=>'1','i.tuijian'=>'2','i.state'=>'1'))->limit(12)->order(array('id'=>'desc'))->select();
	}
	
	
	
	public function trade($data){
		$data =array();
		$data['items'] = M('Items')->limit(6)->order('sort desc')->where(array('tmpa'=>'1','parentid'=>'0','state'=>'1'))->select();
		foreach($data['items'] as $key=>$value){
			$data['items'][$key]['items_data'] = M('Items')->limit(6)->where(array('tmpa'=>'1','parentid'=>$value['id'],'state'=>'1'))->select();
			$data['items'][$key]['item'] = M('Item')->limit(8)->order('tmscreening1 desc,id desc')->where(array('tmpa'=>'1','groupid'=>$value['id'],'state'=>'1'))->select();
		}
		return $data['items'];
	}
	
	
	
	public function detail(){
		$actname = ACTION_NAME;
		$actname = strtolower($actname);
		if($actname=='detail'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /trademark/".I('id',0).".html");
			exit;
		}
		$data = $this->get_data(2,'',10);//商标市场公共数据
		$id = I('id');
		$id = full_id(10000000, $id);//当id位数不够时补全
		$data['trade'] = $this->get_trade($id);
		if(!$data['trade']){//如果页面不存在
			return $this->show_404();
		}
		$data['views'] = $this->views_num($id);//浏览次数
		$data['seller'] = $this->get_member($data['trade']['userid']);//卖家信息
		if($data['seller']['aid']){
			$data['agent'] = $this->get_member($data['seller']['aid']);//经纪人信息
		}
		$data['shop'] = $this->seller_shop($data['seller']['id']);//个人商城
		$data['readtm'] = $this->read_tm($id);//浏览过的商标
		$data['interest'] = $this->interest_tm();//感兴趣的商标
		/* 标题title，关键词keywords，描述description */
		if($data['trade']['tmtype']==1){
			$data['trade']['combinatetype'] = '中文';
		}else if($data['trade']['tmtype']==2){
			$data['trade']['combinatetype'] = '英文';
		}else if($data['trade']['tmtype']==3){
			$data['trade']['combinatetype'] = '中文+英文';
		}else if($data['trade']['tmregarea']==4){
			$data['trade']['combinatetype'] = '图形';
		}else if($data['trade']['tmregarea']==5){
			$data['trade']['combinatetype'] = '中文+图形';
		}else if($data['trade']['tmregarea']==6){
			$data['trade']['combinatetype'] = '英文+图形';
		}else if($data['trade']['tmregarea']==7){
			$data['trade']['combinatetype'] = '组合';
		}
		$data['nav_type'] = 2;
		$data['title'] = $data['trade']['title'].'商标转让-'.$data['trade']['items'];
		$data['keywords'] = $data['trade']['title'].'商标,'.$data['trade']['title'].'商标转让,'.$data['trade']['title'].$data['trade']['combinatetype'].'商标转让';
		$data['description'] = $data['trade']['title'].'商标转让,'.$data['trade']['title'].'商标可用于'.$data['trade']['tmlimit'].'等商品/服务,'.$data['trade']['items'].'商标转让尽在7号网商标交易与管理平台,商标转让全国NO.1。';
		
		$this->assign('data',$data);
    	$this->display('detail');
	}
	
	
	/**
	 * 专利卖家信息
	 */
	private function seller_info($id){
		$arr = M('Item as z')->join('qh_member as m ON m.id = z.userid')->field('m.id,m.username,m.name,m.email,m.mobile,m.qq,m.aid,m.tel,m.img,m.about')->where('z.state=1 and z.tmpa=1 and z.id='.$id)->find();
	
		return $arr;
	}
	
	/**
	 * 浏览次数
	 */
	public function views_num($id){
		$arr = M('Item')->where('id='.$id)->setInc('views');
		//$arr = M('Article')->where('views='.views+1)->save();
		return $arr;
	}
	
	/**
	 * 商标卖家信息商店
	 */
	private function seller_shop($id){
		if($id){
			$arr = M('Shop')->field('id,name')->where('state=3 and id='.$id)->find();
			return $arr;
		} else {
			return false;
		}
	
	}
	
	/**
	 * 浏览过的商标
	 */
	public function read_tm($id){
		$tm_id = array();//1.创建一个数组
		$tm_id[] = $id; //2.对接收到的ID插入到数组中去
		if(isset($_COOKIE['tm_id'])){//3.判定cookie是否存在,第一次不存在(如果存在的话)
			$now_content = str_replace("\\","",$_COOKIE['tm_id']);//(4).您可以查看下cookie,此时如果unserialize的话出问题的,我把里面的斜杠去掉了。
			$now = unserialize($now_content); //(5).把cookie 中的serialize生成的字符串反实例化成数组
			foreach($now as $n=>$w) {//(6).里面很多元素,所以我要foreach 出值
				if(!in_array($w,$tm_id)){//(7).判定这个值是否存在,如果存在的化我就不插入到数组里面去;
					$tm_id[] = $w; //(8).插入到数组
				}
			}
			$content= serialize($tm_id); //(9).把数组实例化成字符串
			setcookie("tm_id",$content, time()+3600*24,"/"); //(10).插入到cookie
		}else {
			$content= serialize($tm_id);//4.把数组实例化成字符串
			setcookie("tm_id",$content, time()+3600*24,"/"); //5.生成cookie
		}
		//print_r($_COOKIE['content_id']);
		//$getcontent = unserialize(str_replace("\\", "", $_COOKIE['content_id']));
		$getcontent = unserialize($_COOKIE['tm_id']);
		if(count($getcontent)<6){
			$stj = M('item')->where(array('tmpa'=>1,'tmscreening'=>2))->limit(10-count($getcontent))->select();
		}
		foreach ($stj as $key => $value){
			$getcontent[] = $value['id'];
		}
		foreach($getcontent as $row=>$r){
			$arr[$row] = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.tmlimit,z.groupid,z.title,z.tmcontent,z.price,z.img,z.tmlimit,z.addtime,z.tmtradeway,z.tmregdate,z.tmtype,z.views,z.tmno,c.name')->where('z.state=1 and z.tmpa=1 and z.id='.$r)->find();
			
			$res = M('shop')->where(array('id'=>$arr[$row]['userid'],'state'=>3))->find();
			if($res) $arr[$row]['shop'] = $res;
		}
		
	
		return $arr;
	}
	
	/**
	 * 感兴趣的商标
	 */
	private function interest_tm(){
		$arr = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmlimit,z.tmtype,z.tmno,c.name,z.userid')->where('z.state=1 and z.tmpa=1')->order('rand()')->limit(10)->select();
		foreach($arr as $key=>$value){
			$res = M('shop')->where(array('id'=>$value['userid'],'state'=>3))->find();
			if($res) $arr[$key]['shop'] = $res;
		}
		return $arr;
	}
	
	private function get_trade($id){
		$data = M('Item')->where(array('id'=>$id,'tmpa'=>'1'))->find();
		if($data){
			$items = M('items')->where(array('id'=>$data['groupid']))->find();
			$data['items'] = $items['name'];
			$data['itemsid'] = $items['id'];
			return $data;
		} else {
			return false;
		}
	}
	
	
	public function tradelist($groupid=''){
		$data = $this->get_data(2,'',10);//商标市场公共数据
		$shop_where['state'] = '3';
		$data['shop_data'] = M('shop')->field('id,name')->where($shop_where)->order('tuijian desc,sort desc')->select();
		$data['price'] = array(
				"0-0"=>"面议",
				"1-2000"=>"1-2000",
				"2001-10000"=>"2001-10000",
				"10001-50000"=>"10001-50000",
				"50001-100000"=>"50001-100000",
				"100000-0"=>"100000以上"
				);
		
		$search = I('get.');
		$search['groupid'] = $groupid?$groupid:'48';
		if($search['views']){
			$order['views'] = $search['views'];
		}
		if($search['prices']){
			$order['price'] = $search['prices'];
		}
		
		if($search['groupid']){
			$where['groupid'] = $search['groupid'];
			$class = M('Items')->where(array('parentid'=>'0','tmpa'=>'1','id'=>$search['groupid']))->select();
			$data['groupid2'] = M('Items')->where(array('parentid'=>$search['groupid'],'tmpa'=>'1',))->select();
		}else{
			$level1type = array();
			foreach ($data['groupid'] as $key => $value){
				$level1type[] = $value['id'];
			}
			if($level1type){
				$data['groupid2'] = M('Items')->where(array('parentid'=>array('in',$leve1ltype),'tmpa'=>'1',))->select();
			}
		}
		if($search['groupid2']){
			$where['groupid'] = $search['groupid2'];
			$data['groupid3'] = M('Items')->where(array('parentid'=>$search['groupid2'],'tmpa'=>'1',))->select();
		}else{
			$level2type = array();
			foreach ($data['groupid2'] as $key => $value){
				$level2type[] = $value['id'];
			}
			if($level2type){
				$data['groupid3'] = M('Items')->where(array('parentid'=>array('in',$level2type),'tmpa'=>'1',))->select();
			}
		}
		
		
		if($search['groupid3']){
			$where['groupid'] = $search['groupid3'];
			$now = M('Items')->where(array('id'=>$search['groupid3'],'tmpa'=>'1',))->find();
			$search['groupid2'] = $now['parentid'];
		}
		
		if($search['tuijian']){
			$where['tuijian'] = $search['tuijian'];
		}
		if($search['are']){
			$where['tmregarea'] = $search['are'];
		}
		if($search['tmtype']){
			$where['tmtype'] = $search['tmtype'];
		}
		if($search['shop']){
			$where['userid'] = $search['shop'];
		}
		if($search['price']){
			$price = explode('-',$search['price']);
			if($price[0]=='0' && $price[1]=='0'){
				$where['price'] = $price[0];
			}elseif($price[1] == '0'){
				$where['price'] = array('gt',$price[0]);
			}else{
				$where['price'] = array(array('gt',$price[0]),array('lt',$price[1]));
			}
		}
		$where['state'] = '1';
		$where['tmpa'] = '1';
		$data['groupid'] = M('Items')->where(array('parentid'=>'0','tmpa'=>'1','state'=>'1'))->select();
		$count = M('Item')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagenew( $count, '20',$search,true); // 实例化分页类 传入总记录数和每页显示的记录数(10);marktype为自定义分类连接标识
		$data ['page'] = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data['item_data'] = M('Item')->where($where)->order($order)->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		foreach($data ['item_data'] as $key=>$value){
			$items = M('items')->where(array('id'=>$value['groupid']))->find();
			$data ['item_data'][$key]['items'] = $items['name'];
			$res = M('shop')->where(array('id'=>$value['userid']))->find();
			if($res) $data['item_data'][$key]['shop'] = $res;
		}
		/* 标题title，关键词keywords，描述description */
		if(I('tuijian') == '1'){
			$data['headinfo'] = $data['menu'][1];	
		}elseif (I('tuijian') == '2'){
			$data['headinfo'] = $data['menu'][2];
		}elseif(I('are') == '3'){
			$data['headinfo'] = $data['menu'][3];
		}else{
			foreach ($class as $value){
				$data['headinfo']['title'] .= $value['name'];
			}
			$data['headinfo']['keywords'] = $data['headinfo']['title'];
			$data['headinfo']['description'] = $data['headinfo']['title'];
		}
		$data['nav_type'] = 2;
		$data['title'] = str_replace('-','商标-',$class[0]['name']).'商标转让分类列表';
		$data['keywords'] = str_replace('-','商标 ',$class[0]['name']).'商标转让 商标资源分类列表 商标资源';
		$data['description'] = $class[0]['name'].'商标转让资源列表，国内外'.mb_substr($class[0]['name'],0,3,'utf-8').'精品好商标尽在7号网商标转让网，'.str_replace('-','',$class[0]['name']).'商标转让优质商标资源汇总，让你企业品牌梦不再是想,提供专业的商标转让服务，金牌商标经纪人热线4008897080';
		$this->assign('data',$data);
		$this->assign('search',$search);
		$this->assign('count',$count);
		$this->display('tradelist');
	}
	
	public function finetrade(){
		$data = $this->get_data(2,'3','10');//商标市场公共数据
		$items = M('items')->where(array('tmpa'=>1,'parentid'=>0))->order(array('sort'=>'desc'))->select();
		$where['i.state'] = 1;
		$where['i.tuijian'] = 1;
		$where['i.tmpa'] = 1;
		if(I('get.groupid')){
			$search['groupid'] = $where['i.groupid'] = I('get.groupid');
		}
		foreach ($items as $key =>$value){
			$item_count = M('item')->where(array('state'=>'1','tuijian'=>'1','groupid'=>$value['id'],'tmpa'=>1))->count();
			if($item_count){
				$data['items'][] = $value;
			}
		}
		$count = M('Item as i')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagenew( $count, '8'); // 实例化分页类 传入总记录数和每页显示的记录数(10);marktype为自定义分类连接标识
		$data ['page'] = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性11
		$data['item_data'] = M('Item as i')->field('i.id,i.title,i.groupid,i.price,i.adimg,i.tmlimit,it.name')->join('qh_items as it on i.groupid=it.id')->where($where)->order($order)->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
	
		$data['nav_type'] = 2;
		$this->assign('search',$search);
		$this->assign('data',$data);
		$this->display('finetrade');
	}
	
}