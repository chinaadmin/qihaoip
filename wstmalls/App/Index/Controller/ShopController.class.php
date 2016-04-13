<?php
namespace Index\Controller;
class ShopController extends IndexBaseController {
	
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 空操作
	 */
	public function _empty(){
		switch (ACTION_NAME){
			case 'recommend':
				$tj = '1';//推荐专利
				return $this->show_list('',$tj);
			case 'price':
				$tj = '2';//特惠专利
				return $this->show_list('',$tj);
			default:
				if(is_numeric(ACTION_NAME)){
					if(!strstr($_SERVER['PHP_SELF'], '.html') || !strstr($_SERVER['PHP_SELF'], 'patent')){
						Header("HTTP/1.1 301 Moved Permanently");
						Header("Location: /shop/patnetlist/".ACTION_NAME.".html");
						exit;
					}
					$_GET['id'] = I('path.1');
					return $this->detail();
				}else{
					$list = explode('list',I('path.1'));
					$type = explode('type',I('path.1'));
					if(stristr(I('path.1'),'list')&&!$list['0']&&(is_numeric($list['1'])||empty($list['1']))){
						return $this->patnetlist($list['1']);
					}elseif(stristr(I('path.1'),'type')&&!$type['0']&&(is_numeric($type['1'])||empty($type['1']))){
						return $this->tradelist($type['1']);
					}else{
						$this->show_404('页面不存在！！！！');
					}
				}
		}
	}
	
	/**
	 * 获取导航菜单
	 */
	protected function data_menu($id='',$shopid=''){
		if($shopid){
			$re['0'] = array('name'=>'店铺首页','title'=>'店铺首页','alt'=>'店铺首页','link'=>U('shop/shop_list',['shop'=>$shopid]));
			$re['1'] = array('name'=>'店铺简介','title'=>'店铺简介','alt'=>'店铺简介','link'=>U('shop/shop_detail',['shop'=>$shopid]));
			$re['2'] = array('name'=>'商标','title'=>'商标','alt'=>'商标','link'=>U('shop/tradelist',['shop'=>$shopid]));
			$re['3'] = array('name'=>'专利','title'=>'专利','alt'=>'专利','link'=>U('shop/patnetlist',['shop'=>$shopid]));
			$re['4'] = array('name'=>'诚邀入驻','title'=>'诚邀入驻','alt'=>'诚邀入驻','link'=>'/shop/reg/');
		}else {
			$re['0'] = array('name'=>'商城首页','title'=>'知识产权商城-知识产权界的“Tmall”','alt'=>'商城首页','link'=>'/shop/');
			$re['1'] = array('name'=>'知产包','title'=>'知产包','alt'=>'知产包','link'=>'/ipbag/');
			$re['2'] = array('name'=>'诚邀入驻','title'=>'诚邀入驻','alt'=>'诚邀入驻','link'=>'/shop/reg/');
		}
		return $re;
	}
	
	
	private function index_link(){
		$map['id'] = array('in','1,2,9,10');
		$arr = M('Links')->where($map)->order('sort desc')->select();
		foreach ($arr as $key => $value){
			$where['groupid'] = $value['id'];
			$where['state'] = '1';
			$arr[$key]['link'] = M('Link')->where($where)->order('id desc,sort desc')->select();
		}
	
		return $arr;
	}
	
	private function get_list_data($shopid=''){
		$re['menu'] = $this->data_menu(8,$shopid);
		//$re['searchKeyWords'] = $this->data_keywords();
		$re['cart'] = $this->data_cart();//获取购物车信息
		$re['help'] = $this->data_help();
// 		$re['link'] = $this->data_link();
		$re['siteInfo'] = $this->data_site_info();
		return $re;
	}
	/***
	 * 显示默认首页
	 */
	public function index(){
		if($_SERVER['PHP_SELF']!='/index.php/shop/'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /shop/");
			exit;
		}
		$data = $this->get_data('7','6','8');//公共数据
		$data['data_ad'] = $this->adv('170','2');//商城首页商标和专利专区第一个大图广告
		$data['adv'] = $this->adv('177', '3');//商城首页横条广告位
		unset($data['menu']['3']);
		unset($data['menu']['4']);
		unset($data['menu']['5']);
		$data['banner'] = $this->shop_banner('163');//商城首页banner
		$data['starshop'] = $this->adv('174');//商城首页明星旗舰店广告位
		//知产包
		$data['zcb'] = $this->get_zcb();
		//特惠专区
		$data['ykj'] = $this->special_zone();
		//商标专区
		$where['tmscreening3'] = '2';//商城推荐
		$where['state'] = '1';//已发布
		$where['tmpa'] = '1';//商标
		$data['tm'] = M('Item')->where($where)->limit('8')->select();
		foreach ($data['tm'] as $key => $value){
			$data['tm'][$key]['img'] = explode(',',$value['img']);
			$data['tm'][$key]['groupname'] = M('Items')->where(array('id'=>$value['groupid']))->getField('name');
			$data['tm'][$key]['category'] = explode('-',$data['tm'][$key]['groupname']);
			if($value['price'] > 0){
				$data['tm'][$key]['price'] = '￥'.$value['price'];
			}else{
				$data['tm'][$key]['price'] = '面议';
			}
		}
		//专利专区
		$wh['tmscreening3'] = '2';//商城推荐
		$wh['state'] = '1';//已发布
		$wh['tmpa'] = '2';//专利
		$data['pa'] = M('Item')->where($wh)->limit('8')->select();
		foreach ($data['pa'] as $key => $value){
			$data['pa'][$key]['img'] = explode(',',$value['img']);
			$data['pa'][$key]['category'] = M('Items')->where(array('id'=>$value['groupid']))->getField('name');
			$data['pa'][$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			if($value['price'] > 0){
				$data['pa'][$key]['price'] = '￥'.$value['price'];
			}else {
				$data['pa'][$key]['price'] = '面议';
			}
		}
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['menu'][0]['title'];
		$data['keywords'] = $data['menu'][0]['alt'];
		$data['description'] = $data['menu'][0]['about'];
		$data['nav_type'] = 1;
		
		$this->assign('data',$data);
		$this->display();
	}
	
	private function get_shop_item($where,$type,$sl){
		$id = M('Shop')->field('id')->where($where)->select();
		$re = array();
		foreach ($id as $key=>$value){
			$re['search'][] = $value['id'];
		}
		$item_where['userid'] = array('in',$re['search']);
		$item_where['state'] = '1';
		$item_where['tmpa'] = $type;
		$item_group = M('item')->field('groupid')->where($item_where)->group('groupid')->select();
		$item = array();
		foreach ($item_group as $key=>$value){
			$item[$value['groupid']] = M('item')->order(array('tmscreening3'=>'desc','id'=>'asc'))->where(array('tmpa'=>$type,'state'=>'1','groupid'=>$value['groupid'],'userid'=>array('in',$re['search'])))->count();
		}
		arsort($item);
		$i=0;
		$re['re_item'] = array();
		foreach ($item as $k=>$v){
			if($i<$sl){
				$re['re_item'][$k]=$v;
			}else{
				break;
			}
			$i++;
		}
		return $re;
	}
	
	
	/***
	 * 显示商城店铺列表页
	*/
	public function store_list($p=1){
		$data = $this->get_data(8,'6','8');//公共数据
		$data['data_ad'] = $this->data_ad(170);
		unset($data['menu']['2']);
		unset($data['menu']['3']);
		unset($data['menu']['4']);
		unset($data['menu']['5']);
		
		/**
		 *热门推荐	
		 */
		$data['recommended'] = $this->recommend();
		
		$where['state'] = '3';
		/* 数据分页 */
		$count = M('Shop')->where($where)->count();
		$pagesize = 20;
		$newpage = new \Org\Util\Page($count,$pagesize);//实例化分类页
		if($count){
			$data['page'] = $newpage->getPage();//数据分页
		}
		$data['flagshipshop'] =	M('Shop')->where($where)->field('id,name,logo')->order('tuijian desc,sort desc')->limit(($p-1)*$pagesize,$pagesize)->select();
		foreach ($data['flagshipshop'] as $key => $value){
			$wh['userid'] = session('user.id');
			$wh['goodsid'] = $value['id'];
			$wh['type'] = '4';
			$wh['state'] = '1';
			$data['flagshipshop'][$key]['shoucang'] = M('Favorite')->where($wh)->getField('id');
			if(empty($data['flagshipshop'][$key]['shoucang']))unset($data['flagshipshop'][$key]['shoucang']);
		}
		/* 标题title，关键词keywords，描述description */
		$data['title'] = '明星旗舰店列表';
		$data['keywords'] = '明星旗舰店';
		$data['description'] = '明星旗舰店';
		//print_r($data['recommended']);
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 商城店铺列表页热门推荐
	 */
	private function recommend(){
		$map['i.state'] = '1';
		$result = M('Item i')->join('right join qh_shop s ON s.id = i.userid')->where($map)->field('i.id,i.userid,i.tmpa,i.price,i.img,i.groupid,i.title,i.tmlimit,s.name')->order('tmscreening3 desc')->limit(4)->select();
		foreach ($result as $key => $value){
			$wh['id'] = $value['groupid'];
			$groupname = M('Items')->where($wh)->getField('name');
			$groupname = explode('-', $groupname);
			$result[$key]['groupname'] = $groupname[0];
			if($value['price'] > 0){
				$result[$key]['price'] = '￥'.$value['price'];
			}else{
				$result[$key]['price'] = '面议';
			}
			$img = explode(',', $value['img']);
			$result[$key]['img'] = $img[0];
			$condition['userid'] = session('user.id');
			$condition['goodsid'] = $value['id'];
			$condition['type'] = $value['tmpa'];
			$condition['state'] = '1';
			$result[$key]['shoucang'] = M('Favorite')->where($condition)->getField('id');
			if(empty($result[$key]['shoucang']))unset($result[$key]['shoucang']);
		}
		
		return $result;
	}
	
	public function shop_list(){
		$this->chk_url();
		$id = I('get.shop');
		$data = $this->get_list_data($id);//公共数据
		$data['indexlink'] = $this->index_link();//首页友情链接
		$data['shop_id'] =$id;
		$data['shop_re'] = M('shop')->where(array('id'=>$id))->find();
		$data['shop_re']['kfinfo'] =  json_decode($data['shop_re']['kfinfo'],true);
		$data['shop_re']['worktime'] =  json_decode($data['shop_re']['worktime'],true);
		$num = $data['shop_re']['template'] == 2?'6':'7';
		$numtj = $data['shop_re']['template'] == 2?'8':'7';
		$tmp = C('TEMPLATE_TYPE')[$data['shop_re']['template']];
		$data['ad'][1] = M('shopad')->where(array('shopid'=>$id,type=>1))->select();
		$data['ad'][2] = M('shopad')->where(array('shopid'=>$id,type=>2))->select();
		$data['ad'][3] = M('shopad')->where(array('shopid'=>$id,type=>3))->find();
		$data['ad'][4] = M('shopad')->where(array('shopid'=>$id,type=>4))->select();
		$data['ad'][5] = M('shopad')->where(array('shopid'=>$id,type=>5))->find();
		$data['ad'][6] = M('shopad')->where(array('shopid'=>$id,type=>6))->find();
		$data['ad'][7] = M('shopad')->where(array('shopid'=>$id,type=>7))->find();
		if($data['shop_re']['showtm']==1){
			$data['trade'] = M('item')->where(array('tmpa'=>1,'state'=>'1','userid'=>$id,'tmscreening4'=>'2'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($num)->select();
			$nid = array();
			foreach ($data['trade'] as $key=>$value){
				$nid[] = $value['id']; 
				$data['trade'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total1 = count($data['trade']);
			$where = array('tmpa'=>1,'state'=>'1','userid'=>$id);
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total1<$num){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($num-$total1)->select();
					$i=0;		
				foreach ($res as $key => $value){
					$data['trade'][$total1+$i] = $value;
					$data['trade'][$total1+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
		}
		if($data['shop_re']['showpa']==1){
			$data['pant'] = M('item')->where(array('tmpa'=>2,'state'=>'1','userid'=>$id,'tmscreening4'=>'2'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($num)->select();
			$nid = array();
			foreach ($data['pant'] as $key=>$value){
				$nid[] = $value['id'];
				$data['pant'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total2 = count($data['pant']);
			$where = array('tmpa'=>2,'state'=>'1','userid'=>$id);
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total2<$num){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($num-$total2)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['pant'][$total2+$i] = $value;
					$data['pant'][$total2+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
		}
		
		if($data['shop_re']['showtj']==1){
			$data['tj'] = M('item')->where(array('state'=>'1','userid'=>$id,'tmscreening4'=>'3'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($numtj)->select();
			$nid = array();
			foreach ($data['tj'] as $key=>$value){
				$nid[] = $value['id'];
				$data['tj'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total3 = count($data['tj']);
				$where = array('state'=>'1','userid'=>$id);
				if($nid){
					$where['id']=array('not in'=>$nid);
				}
			if($total3<$numtj){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($numtj-$total3)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['tj'][$total3+$i] = $value;
					$data['tj'][$total3+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
		}
		$data['title'] = $data['shop_re']['title'];
		$data['keywords'] = $data['shop_re']['keywords'];
		$data['description'] = $data['shop_re']['description'];
		$this->assign('data',$data);
		$this->display($tmp);
	}
	
	
	
	/*1111 public function shop_list(){
		$id = I('get.shop');
		$data = $this->get_list_data($id);//公共数据
		$data['shop_re'] = $userid = M('shop')->where(array('id'=>$id))->find();
		$data['trade'] = M('item')->where(array('tmpa'=>1,'state'=>'1','userid'=>$userid['id']))->order(array('tmscreening3'=>'desc','id'=>'asc'))->limit(12)->select();
		foreach ($data['trade'] as $key=>$value){
			$data['trade'][$key]['items'] = $this->get_items($value['groupid']);
		}
		$data['pant'] = M('item')->where(array('tmpa'=>2,'state'=>'1','userid'=>$userid['id']))->order(array('tmscreening3'=>'desc','id'=>'asc'))->limit(12)->select();
		foreach ($data['pant'] as $key=>$value){
			$data['pant'][$key]['items'] = $this->get_items($value['groupid']);
		}
		//banner广告
		$data['banner_ad'] = M('Shopad')->where(array('shopid'=>$id,'type'=>'1','state'=>'3'))->select();
		//商标广告
		$data['trade_ad'] = M('Shopad')->where(array('shopid'=>$id,'type'=>'2','state'=>'3'))->find();
		//专利广告
		$data['pantent_ad'] = M('Shopad')->where(array('shopid'=>$id,'type'=>'3','state'=>'3'))->find();
		$data['shop_id'] =$id;
		
		标题title，关键词keywords，描述description 
		$data['title'] = $data['shop_re']['name'];
		$data['keywords'] = $data['shop_re']['keywords'];
		$data['description'] = $data['shop_re']['description'];
		
		$this->assign('data',$data);
		$this->display();
	} */
	
	
	/***
	 * 显示列表页
	*/
	public function show_list($p=1){
		$data = $this->get_data(3);

		$this->assign('data',$data);
		$this->display();
	}
	
	/***
	 * 显示详情页
	*/
	public function detail(){
		$data = $this->get_data(3);

		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 商城首页和商城店铺列表的幻灯片
	 */
	private function shop_banner($id){
		$arr = M('Ad')->field('id,name,img,link')->where('(endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().') and state=1 and groupid='.$id)->order('sort DESC')->limit(6)->select();
	
		return $arr;
	}
	
	//根据groupid获取当前商品分类
	public function get_items($groupid){
		$re = M('items')->where(array('id'=>$groupid))->find();
		if(!$re['parentid']){
			return $re;
		}else{
			return $this->get_items($re['parentid']);
		}
	}
	
	
public function tradelist($groupid=''){
		$data = $this->get_data('3','','10');//公共数据
		//$data = $this->get_list_data(I('get.shop'));//商标市场公共数据
		//获取商标分类
		//$data['tmcategory'] = $this->tmcate(10);
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
		if($search['shop']){
			$where['userid'] = $search['shop'];
		}else{
			$shop_data = array();
			$shop['state'] = '3';
			$shop_re = M('shop')->where($shop)->select();
			foreach ($shop_re as $k=>$v){
				$shop_data[] = $v['id'];
			}
			$where['userid'] = array('in',$shop_data);
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
		$data['title'] = $data['headinfo']['title'];
		$data['keywords'] = $data['headinfo']['title'];
		$data['description'] = $data['headinfo']['title'];
		$this->assign('data',$data);
		$this->assign('search',$search);
		$this->assign('count',$count);
		$this->display('tradelist');
	}
	
	public function patnetlist($catid='',$th=''){
		$data = $this->get_data('3','','10');//公共数据
		$data['catid'] = $catid;//获取id
		$item = M('Item as i');
		$items = M('Items');
		$favorite = M('Favorite');
		$shop = M('Shop');
		
		/**筛选条件---开始**/
		//获取国家筛选条件
		if(I('country')){
			$where['tmregarea'] = I('country');
		}
		//获取一级分类筛选条件
		if(I('onecate')){
			$where['groupid'] = I('onecate');
		}elseif($catid){
			//获取网站地图传过来的参数
			$category = $items->field('id,name,level')->where(array('id'=>$catid))->find();
			if($category['level'] == '1'){
				$data['onecatename']['name'] = $category['name'];
				$data['groupid'] = $category['id'];
				$where['groupid'] = $category['id'];
			}elseif ($category['level'] == '2'){
				$data['twocatename']['name'] = $category['name'];
				$data['groupid2'] = $category['id'];
				$where['groupid2'] = $category['id'];
			}elseif ($category['level'] == '3'){
				$data['threecatename']['name'] = $category['name'];
				$data['groupid3'] = $category['id'];
				$where['groupid3'] = $category['id'];
			}
			$whr['groupid'] = $catid;
			$whr['groupid2'] = $catid;
			$whr['groupid3'] = $catid;
			$whr['_logic'] = 'or';
			$where['_complex'] = $whr;
		}elseif($th){
			//获取特惠专区筛选条件
			$where['i.tuijian'] = $th;
		}
		if((!I('get.')||(count(I('get.'))=='1'&&I('get.p')))&&!$catid){
			$where['groupid'] = '83';//默认分类
		}
		if($where['groupid']){
			$data['groupid'] = $where['groupid'];//一级分类
		}
		//获取二级分类筛选条件
		if(I('twocate')){
			$where['groupid2'] = I('twocate');
			$data['groupid2'] = $where['groupid2'];//二级分类
		}
		
		//获取三级分类筛选条件
		if(I('threecate')){
			$where['groupid3'] = I('threecate');//三级分类
			$data['groupid3'] = $where['groupid3'];
			$data['groupid2'] = $items->where(array('id'=>$where['groupid3']))->getField('parentid');//二级分类id
			$data['twocatename'] = $items->field('id,name')->where(array('id'=>$data['groupid2']))->find();//二级分类信息
			$data['groupid'] = $items->where(array('id'=>$data['groupid2']))->getField('parentid');//一级分类id
			$data['onecatename'] = $items->field('id,name')->where(array('id'=>$data['groupid']))->find();//一级分类信息
		}
		//获取专利类型筛选条件
		if(I('type')){
			$where['tmtype'] = I('type');//专利类型
		}
		
		//获取专利权人类型筛选条件
		if(I('tee')){
			$where['mastertype'] = I('tee');//专利权人类型
		}
		
		//获取价格筛选条件
		$minPrice = I('minPrice');//最小价格
		$maxPrice = I('maxPrice');//最大价格
		if(($minPrice=='0'&&$maxPrice)||($minPrice&&$maxPrice)){
			$where['price'] = array(array('gt',$minPrice),array('elt',$maxPrice),'AND');
		}elseif (!$minPrice&&$maxPrice=='面议'){
			$where['price'] = '0';
		}elseif (!$minPrice&&$maxPrice){
			$maxPrice = preg_replace('/\D/s', '', $maxPrice);//截取数字
			$where['price'] = array('gt',$maxPrice);
		}
		if(I('shop')){
			$where['p.id'] = I('shop');//商城id
		}
		
		//获取排序筛选条件
		$sortType = I('sortType');
		$isAsc = I('isAsc');
		if($sortType=='1'&&$isAsc=='1'){
			$order = 'price asc';
		}elseif ($sortType=='2'&&$isAsc=='1'){
			$order = 'views asc';
		}elseif ($sortType=='1'&&!$isAsc){
			$order = 'price desc';
		}elseif ($sortType=='2'&&!$isAsc){
			$order = 'views desc';
		}else{
			$order = 'id';
		}
		
		$where['i.tmpa'] = '2';//类型
		$where['i.state'] = '1';//状态
		/**筛选条件---结束**/
		
		/**已选择条件--开始**/
		//国家
		$data['countryname'] = C('ITEM_AREA_TYPE')[$where['tmregarea']];
		//行业
		//一级分类
		if($where['groupid']){
			$data['onecatename'] = $items->field('id,name')->where(array('id'=>$where['groupid']))->find();
		}
		//二级分类
		if($where['groupid2']){
			$data['twocatename'] = $items->field('id,name')->where(array('id'=>$where['groupid2']))->find();
		}
		//三级分类
		if($where['groupid3']){
			$data['threecatename'] = $items->field('id,name')->where(array('id'=>$where['groupid3']))->find();
		}
		//类型
		$data['typename'] = C('ITEM_PA_TYPE')[$where['tmtype']];
		//专利权人
		$data['teename'] = C('ITEM_MASTER_TYPE')[$where['mastertype']];
		//价格
		if($minPrice&&$maxPrice){
			$price = $minPrice.'-'.$maxPrice;
		}elseif(!$minPrice&&$maxPrice){
			$price = $maxPrice;
		}
		$data['pricename'] = $price;
		//7号商城
		$data['shopname'] = $shop->where(array('id'=>$where['p.id']))->getField('name');
		/**已选择条件--结束**/
		
		/**默认显示数据---开始**/
		//国家
		$data['country'] = C('ITEM_AREA_TYPE');
		
		//行业
		/*一级*/
		$wh['tmpa'] = '2';
		$wh['state'] = '1';
		$wh1['_complex'] = $wh;
		$wh1['_logic'] = 'AND';
		$wh1['level'] = '1';
		$data['onecate'] = $items->where($wh1)->select();
		
		/*二级*/
		$wh2['_complex'] = $wh;
		$wh2['_logic'] = 'AND';
		$wh2['level'] = '2';
		if($where['groupid']){
			$wh2['parentid'] = $where['groupid'];
		}
		$data['twocate'] = $items->where($wh2)->select();
		foreach ($data['twocate'] as $key => $value){
			$pid[] .= $value['id'];
		}
		
		/*三级*/
		$wh3['_complex'] = $wh;
		$wh3['_logic'] = 'AND';
		$wh3['level'] = '3';
		if($where['groupid2']){
			$wh3['parentid'] = $where['groupid2'];
		}elseif ($pid){
			$wh3['parentid'] = array('in',implode(',',$pid));
		}else{
			$wh3['parentid'] = '';
		}
		$data['threecate'] = $items->where($wh3)->select();
		
		//先点击三级分类处理效果
		if($where['groupid3']&&!$where['groupid2']&&!$where['groupid']){
			$twocate = $items->where(array('level'=>'3','id'=>$where['groupid3']))->getField('parentid');//获得二级分类id
			$onecate = $items->where(array('level'=>'2','id'=>$twocate))->getField('parentid');//获得一级分类id
				
			$data['groupid'] = $items->where(array('level'=>'1','id'=>$onecate))->getField('id');//获取一级分类id
			$data['groupid2'] = $items->where(array('level'=>'2','id'=>$twocate))->getField('id');//获取二级分类id
				
			$data['twocate'] = $items->where(array('level'=>'2','parentid'=>$onecate))->select();//获取同级分类信息
			$data['threecate'] = $items->where(array('parentid'=>$twocate))->select();//获取同级分类信息
		}
		
		//先点击二级分类处理效果
		if($where['groupid2']&&!$where['groupid3']&&!$where['groupid']){
			$onecate = $items->where(array('level'=>'2','id'=>$where['groupid2']))->getField('parentid');//获得一级分类id
			$data['groupid'] = $items->where(array('level'=>'1','id'=>$onecate))->getField('id');//获取二级的一级分类
			$data['twocate'] = $items->where(array('level'=>'2','parentid'=>$onecate))->select();//获取二级同级分类信息
		}
		
		//类型
		$data['tmtype'] = C('ITEM_PA_TYPE');
		$data['tmtype']['0'] = '全部';
		ksort($data['tmtype']);
		
		//专利权人
		$data['tee'] = C('ITEM_MASTER_TYPE');
		$data['tee']['0'] = '全部';
		ksort($data['tee']);
		
		//价格
		$data['price'] = array(
				'0'=>array(
						'maxPrice'=>'全部',
				),
				'1'=>array(
						'maxPrice'=>'面议',
				),
				'2'=>array(
						'minPrice'=>'0',
						'maxPrice'=>'2000',
				),
				'3'=>array(
						'minPrice'=>'2000',
						'maxPrice'=>'10000',
				),
				'4'=>array(
						'minPrice'=>'10000',
						'maxPrice'=>'50000',
				),
				'5'=>array(
						'minPrice'=>'50000',
						'maxPrice'=>'100000',
				),
				'6'=>array(
						'maxPrice'=>'100000以上',
				),
		);
		//7号商城
		$wh4['state'] = '3';
		$data['shop'] = M('Shop')->where($wh4)->select();
		/**默认显示数据---结束**/
		
		//获取数据条数
		$data['count'] = $item->join('left join qh_items as s ON s.id = i.groupid')->join('right join qh_shop p ON p.id = i.userid')->where($where)->count();
		$pagesize = '20';
		$page = new \Org\Util\Page($data['count'],$pagesize);//实例化分类页
		if($data['count'] && $data['count']>$pagesize){
			$data['page'] = $page->getPage();//数据分页
		}
		//获取筛选后的数据
		//$data['goods'] = $item->join('left join qh_items as s ON s.id = i.groupid')->join('left join qh_shop p ON p.id = i.userid')->field('i.id,i.tmpa,i.userid,i.groupid,i.groupid2,i.groupid3,i.title,i.price,i.img,i.tmtype,s.id as catid,s.name,p.id as shopid,p.name as shopname,p.state as shopstate')->where($where)->order($order)->limit($page->firstRow.','.$page->pagesize)->select();
		$data['goods'] = $item->join('right join qh_shop p ON p.id = i.userid')->field('i.id,i.tmpa,i.userid,i.groupid,i.groupid2,i.groupid3,i.title,i.price,i.img,i.tmtype,p.id as shopid,p.name as shopname,p.state as shopstate')->where($where)->order($order)->limit($page->firstRow.','.$page->pagesize)->select();
		foreach ($data['goods'] as $key => $value){
			if($value['groupid3']){
				$map['id'] = $value['groupid3'];
			}elseif (!$value['groupid3']&&$value['groupid2']){
				$map['id'] = $value['groupid2'];
			}elseif (!$value['groupid3']&&!$value['groupid2']&&$value['groupid']){
				$map['id'] = $value['groupid'];
			}
			$data['goods'][$key]['category'] = $items->field('id,name')->where($map)->find();
			$wh['userid'] = session('user.id');//收藏用户id
			$wh['goodsid'] = $value['id'];//收藏商品id
			$wh['type'] = '2';//收藏类型
			$wh['state'] = '1';//收藏状态
			$data['goods'][$key]['scid'] = $favorite->where($wh)->getField('id');
			if($value['price'] > '0'){
				$data['goods'][$key]['price'] = '￥'.$value['price'];
			}else {
				$data['goods'][$key]['price'] = '面议';
			}
			$data['goods'][$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			if($value['img']){
				$img = explode(',', $value['img']);
				$data['goods'][$key]['img'] = $img['0'];
			}else{
				$data['goods'][$key]['img'] = '/Upload/Img/11/27/0947478956.jpg';
			}
		}
		//print_r($data['goods']);
		//滑动式的热门分类标识
		$data['nav_type'] = 3;
		//title，关键词，描述
		if($data['onecatename']['name']){
			$data['seo']['title'] = $data['onecatename']['name'];
		}elseif ($data['twocatename']['name']){
			$data['seo']['title'] = $data['twocatename']['name'];
		}elseif ($data['threecatename']['name']){
			$data['seo']['title'] = $data['threecatename']['name'];
		}else{
			$data['seo']['title'] = $data['goods']['title'];
		}
		$data['title'] = $data['seo']['title'].'专利技术转让-专利交易列表';
		$data['keywords'] = $data['seo']['title'].'专利转让 专利交易列表 '.$data['seo']['title'].'专利分类';
		$data['description'] = $data['seo']['title'].'专利技术转让列表，7号网专利经纪人为您提供精准专利匹配，拥有国内外的'.$data['seo']['title'].'类的发明专利、实用新型专利、外观设计专利的转让，让为专利权人提供专利技术转移流程，专利技术推广服务，服务热线4008897080';
		
		$this->assign('data',$data);
		$this->display('patnetlist');
	}	
	
	/**
	 * 专利分类
	 */
	private function patent_category(){
		$arr = M('Items')->field('id,parentid,name')->where('tmpa=2 and state=1 and parentid=0')->order('sort DESC')->select();
	
		return $arr;
	}
	
	public function shop_detail(){
		$shop_id = I('get.shop');
		$data = $this->get_list_data($shop_id);
		$data['shop'] = M('shop')->where(array('id'=>$shop_id))->find();
		$data['shop']['kfinfo'] =  json_decode($data['shop']['kfinfo'],true);
		$data['shop']['worktime'] =  json_decode($data['shop']['worktime'],true);
		$data['item'] = M('item')->where(array('userid'=>$shop_id,'state'=>'1'))->order('views desc')->limit(10)->select();
		
		$data['banner_ad'] = M('Shopad')->where(array('shopid'=>$shop_id,'type'=>'1','state'=>'3'))->select();
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['menu'][1]['title'];
		$data['keywords'] = $data['menu'][1]['alt'];
		$data['description'] = $data['menu'][1]['about'];
		$this->assign('data',$data);
		$this->display();
	}
	
	public function reg(){
		$data = $this->get_data(8);//公共数据
		unset($data['menu']['2']);
		unset($data['menu']['3']);
		unset($data['menu']['4']);
		unset($data['menu']['5']);
		$where['companychk']  = array('eq',3);
		$where['personchk']  = array('eq',3);
		$where['_logic'] = 'or';
		$shop['_complex'] = $where;
		$shop['id'] = array('neq',1820);
		$shop['tuijian'] = array('eq',2);
		$data['shop'] = M('Shop')->where($shop)->select();
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['menu'][1]['title'];
		$data['keywords'] = $data['menu'][1]['alt'];
		$data['description'] = $data['menu'][1]['about'];
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 知产包
	 * @return 返回数组值
	 */
	private function get_zcb(){
		$where['state'] = '1';
		$zcb = M('Zcb')->where($where)->order('sort desc')->limit(3)->select();
		
		return $zcb;
	}
	
	/**
	 * 特惠专区
	 * @return 返回数组值
	 */
	private function special_zone(){
		$items = M('Items');
		$where['tuijian'] = '2';//推荐为2时，为一口价也就是特惠价
		$where['state'] = '1';//已发布
		$tehui = M('Item')->where($where)->select();
		foreach ($tehui as $key => $value){
			$catename = $items->where(array('id'=>$value['groupid']))->getField('name');
			if($value['tmpa']=='1'){
				$groupname = explode('-',$catename);
				$tehui[$key]['groupname'] = $groupname['0'];
			}else{
				$tehui[$key]['groupname'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			}
		}
		
		return $tehui;
	}
	
}