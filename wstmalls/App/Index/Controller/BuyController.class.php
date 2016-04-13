<?php
namespace Index\Controller;
class BuyController extends IndexBaseController {
	
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){
		parent::_initialize();
	}
	
	/***
	 * 显示默认首页
	 */
	public function index(){
		$data = $this->get_data();//公共数据
		
		$this->assign('data',$data);
		$this->display();
	}
	
	public function show_list(){
		$data = $this->get_data(1,'',8);
		$tm_items = M('items')->where(array('parentid'=>0,'tmpa'=>1))->select();
		foreach ($tm_items as $key=>$value){
			$data['tm_items'][$value['id']]=$value['name'];
		}
		$pa_items = M('items')->where(array('parentid'=>0,'tmpa'=>2))->select();
		foreach ($pa_items as $key=>$value){
			$data['pa_items'][$value['id']]=$value['name'];
		}
		
		$search = I('get.');
		$search['t'] = $search['t']?$search['t']:'1';
		$where['s.tmpa'] = $search['t'];
		if($search['i']){
			$where['s.groupid'] = $search['i'];
		}
		$where['s.state'] = 1;
		$where['s.supplytype'] = 2;
		$count = M('Supply as s')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagenew( $count, '10',array('t'=>$search['t'],'i'=>$search['i']),FALSE); // 实例化分页类 传入总记录数和每页显示的记录数(10);marktype为自定义分类连接标识
		$data ['page'] = $Page->show(); // 分页显示输出
		$data['supply_data'] = M('Supply as s')->join('qh_member as m ON m.id = s.userid','LEFT')->join('qh_items as it on s.groupid = it.id')->field('s.id,s.uid,s.userid,s.groupid,s.tmpa,s.title,s.content,s.pricemin,s.pricemax,s.addtime,s.endtime,s.views,m.username,m.qq,it.name')->where($where)->order('s.addtime desc,s.id desc')->limit($Page->firstRow . ',' . $Page->listRows )->select();
		
		$data['adv'] = $this->data_ad('183');//资讯列表轮播图
		$data['hot'] = $this->hot_art();//热门资讯
		$data['latest'] = $this->latest_art();//最新资讯
		$data['tm'] = $this->recommended_tm();//推荐商标
		$data['pt'] =  $this->recommended_pt();//推荐专利
		
		
		$data['nav_type']=1;
		$this->assign('search',$search);
		$this->assign('data',$data);
		$this->display('show_list');
	}
	
	
	
	/***
	 * 显示详情页
	*/
	public function detail(){
		$this->show(' ','utf8');
		$uid = I('get.uid');
		$data['buyinfo'] = $this->buy_info($uid);//求购详细
		if(empty($data['buyinfo'])){
			header("Location:/404.html");
		}
		if($data['buyinfo']['tmpa'] == '1'){
			$data = $this->get_data(1,'',8);
			$data['buyinfo'] = $this->buy_info($uid);//求购详细
			$data['buyinfo']['cate'] = '商标市场';
			$data['typename'] = '商标';
		}elseif ($data['buyinfo']['tmpa'] == '2'){
			$data = $this->get_data(1,'',8);
			$data['buyinfo'] = $this->buy_info($uid);//求购详细
			$data['buyinfo']['cate'] = '专利市场';
			$data['typename'] = '专利';
		}
		if($data['buyinfo']['endtime'] < time() && $data['buyinfo']['endtime'] != '0'){
			$data['buyinfo']['title'] = $data['buyinfo']['title'].'&nbsp;&nbsp;[已过期]';
		}
		$this->views_num($uid);//浏览次数views
		$data['seller'] = $this->get_member($data['buyinfo']['userid']);//买家信息
		$data['shop'] = $this->seller_shop($data['buyinfo']['userid']);//个人商城
		if($data['seller']['aid']){$data['agent'] = $this->get_member($data['seller']['aid']);}//经纪人信息
		$data['readinfo'] = $this->read_info($data['buyinfo']['tmpa']);//浏览过的信
		$data['interest'] = $this->interest_info($data['buyinfo']['tmpa'],$data['buyinfo']['groupid']);//感兴趣的信息
		$data['nav_type'] = 1;
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['buyinfo']['title'].'_'.$data['typename'].'求购';
		$data['keywords'] = $data['buyinfo']['title'];
		$data['description'] = $data['buyinfo']['content'];
		
		$this->assign('data',$data);
		$this->display('detail');
	}


	/**
	 * 求购详细信息
	 */
 	private function buy_info($id){
 		$userid = get_userid();
  		$arr = M('Supply as s')->join('qh_items as i ON i.id = s.groupid')->join('qh_member as m ON m.id = s.userid','LEFT')->field('s.id,s.userid,s.groupid,s.tmpa,s.title,s.content,s.pricemin,s.pricemax,s.endtime,s.addtime,s.views,i.name,m.address,m.qq')->where('s.state=1 and s.uid ='.$id)->find();
  	
  		return $arr;
	}
	
	/**
	 * 求购列表信息
	 */
	private function buylist_info($typeid){
		$arr = M('Supply as s')->join('qh_member as m ON m.id = s.userid')->field('s.id,s.userid,s.groupid,s.tmpa,s.title,s.content,s.pricemin,s.pricemax,s.addtime,s.endtime,s.views,m.username')->where('s.state=1 and s.tmpa ='.$typeid)->select();
		foreach ($arr as $key => $value){
			if($value['pricemax'] < '1'){
				$arr[$key]['pricemax'] = '面议'; 
			}
		}
		
		return $arr;
	}
	
	/**
	 * 求购列表分类信息
	 */
	private function cate_info($typeid){
		$arr = M('Items')->field('id,name')->where('parentid=0 and state=1 and tmpa='.$typeid)->select();
		foreach ($arr as $key => $value){
				$arr[$key]['num'] = M('Supply')->field('id,groupid,tmpa,title')->where('tmpa='.$typeid.' and state=1 and groupid='.$value['id'])->count();
			}
			
		return $arr;
	}
	

	/**
	 * 专利分类
	 */
	private function patent_category(){
		$arr = M('Items')->field('id,parentid,name')->where('tmpa=2 and state=1 and parentid=0')->order('sort DESC')->select();
	
		return $arr;
	}
	
	/**
	 * 7号商城
	 */
	private function brand_shop(){
		$arr = M('Item')->field('id,master')->where('tmpa=2 and state=1 and mastertype=1')->group('master')->limit(10)->select();
		
		return $arr;
	}
	
	/**
	 * 浏览次数
	 */
	public function views_num($id){
		$arr = M('Supply')->where('uid='.$id)->setInc('views');
		//$arr = M('Article')->where('views='.views+1)->save();
		
		return $arr;
	}
	
	/**
	 * 专利卖家信息商店
	 */
	private function seller_shop($id){
		$arr = M('Shop')->field('id,name')->where('state=1 and id='.$id)->find();
	
		return $arr;
	}
	
	
	/**
	 * 浏览过的商标或专利
	 */
	private function read_info($typeid){
		if($typeid == '1'){
			$getcontent = unserialize($_COOKIE['tm_id']);
			if(count($getcontent)<6){
				$stj = M('item')->where(array('tmpa'=>1,'state'=>1))->limit(10-count($getcontent))->select();
			}
			foreach ($stj as $key => $value){
				$getcontent[] = $value['id'];
			}
		}else{
			$getcontent = unserialize($_COOKIE['content_id']);
			if(count($getcontent)<6){
				$stj = M('item')->where(array('tmpa'=>2,'state'=>1))->limit(10-count($getcontent))->select();
			}
			foreach ($stj as $key => $value){
				$getcontent[] = $value['id'];
			}
		}
		
		foreach($getcontent as $row=>$r){
			$arr[$row] = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.tmlimit,z.groupid,z.title,z.tmcontent,z.price,z.img,z.tmlimit,z.addtime,z.tmtradeway,z.tmregdate,z.tmtype,z.views,z.tmno,c.name')->where(array('z.state'=>'1','z.tmpa'=>$typeid,'z.id'=>$r))->find();
		
			if($arr[$row]){
				$arr[$row]['tmtype'] = C('ITEM_PA_TYPE')[$arr[$row]['tmtype']];
				$res = M('shop')->where(array('id'=>$arr[$row]['userid'],'state'=>3))->find();
				if($res) $arr[$row]['shop'] = $res;
			}
		}
		
		return $arr;
		/* 
		
		if($typeid == '1'){
			$getcontent = unserialize($_COOKIE['tm_id']);
			foreach($getcontent as $row=>$r){
				$arr[$row] = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.tmcontent,z.tmlimit,z.price,z.img,z.addtime,z.tmtradeway,z.tmregdate,z.tmtype,z.views,z.tmno,c.name')->where('z.state=1 and z.tmpa=1 and z.id='.$r)->find();
				$arr[$row]['tmtype'] = C('ITEM_PA_TYPE')[$arr[$row]['tmtype']];
			}
		}elseif ($typeid == '2'){
			$getcontent = unserialize($_COOKIE['content_id']);
			foreach($getcontent as $row=>$r){
				$arr[$row] = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.tmcontent,z.price,z.img,z.addtime,z.tmtradeway,z.tmregdate,z.tmtype,z.views,z.tmno,c.name')->where('z.state=1 and z.tmpa=2 and z.id='.$r)->find();
				$arr[$row]['tmtype'] = C('ITEM_PA_TYPE')[$arr[$row]['tmtype']];
			}
		}
			
		return $arr; */
	}
	
	/**
	 * 感兴趣的商标
	 */
	private function interest_info($tmpa,$typeid){
		$arr = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmlimit,z.tmtype,z.tmno,c.name,z.userid')->where(array('z.state'=>'1','z.tmpa'=>$tmpa,'z.groupid'=>$typeid))->order('rand()')->limit(10)->select();
		foreach($arr as $key=>$value){
			$arr[$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			$res = M('shop')->where(array('id'=>$value['userid'],'state'=>3))->find();
			if($res) $arr[$key]['shop'] = $res;
		}
		return $arr;
	}
	
	/* /**
	 * 感兴趣的商标或专利
	 
	private function interest_info($tmpa,$typeid){
		if($tmpa == '1'){
			$arr = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmlimit,z.tmtype,z.tmno,c.name')->where('z.state=1 and z.tmpa=1 and z.groupid='.$typeid)->order('rand()')->limit(4)->select();
			foreach($arr as $key=>$value){
				$arr[$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			}	
		}elseif ($tmpa == '2'){
			$arr = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmtype,z.tmno,c.name')->where('z.state=1 and z.tmpa=2 and z.groupid='.$typeid)->order('rand()')->limit(4)->select();
			foreach($arr as $key=>$value){
				$arr[$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			}
		}
		
		return $arr;
	} */
	
	/**
	 * 热门资讯
	 */
	public function hot_art(){
		$map['groupid'] = array('not in','3');
		$map['state'] = '1';
		$arr = M('Article')->field('id,title,date')->where($map)->order('views DESC')->limit(10)->select();
	
		return $arr;
	}
	
	/**
	 * 最新资讯
	 */
	public function latest_art(){
		$arr = M('Article')->field('id,title,date')->where('state=1')->order('addtime DESC')->limit(8)->select();
	
		return $arr;
	}
	
	/**
	 * 推荐商标
	 */
	public function recommended_tm(){
		$arr = M('Item as s')->join('qh_items as c ON c.id = s.groupid')->field('s.id,s.groupid,s.tmno,s.title,s.tmlimit,s.price,s.img,s.addtime,c.name')->where('s.state=1 and s.tmpa=1 and s.tuijian=1')->order('tmscreening1 desc')->limit(5)->select();
		foreach ($arr as $key => $value){
			$img = explode(',',$value['img']);
			$arr[$key]['img'] = $img['0'];
			if($value['price'] > '0'){
				$arr[$key]['price'] = '￥'.$value['price'];
			}else{
				$arr[$key]['price'] = '面议';
			}
			$cate = explode('-',$value['name']);
			$arr[$key]['catename'] = $cate['0'];
		}
	
		return $arr;
	}
	
	/**
	 * 推荐专利
	 */
	public function recommended_pt(){
		$items = M('Items');
		$arr = M('Item')->field('id,groupid,groupid2,groupid3,title,price,img,tmtype')->where('state=1 and tmpa=2 and tuijian=1')->order('tmscreening1 desc')->limit('5')->select();
		foreach ($arr as $key => $value){
			$img = explode(',',$value['img']);
			$arr[$key]['img'] = $img['0'];
			if($value['price'] > '0'){
				$arr[$key]['price'] = '￥'.$value['price'];
			}else{
				$arr[$key]['price'] = '面议';
			}
			$arr[$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			if($value['groupid3']){
				$map['id'] = $value['groupid3'];
			}elseif (!$value['groupid3']&&$value['groupid2']){
				$map['id'] = $value['groupid2'];
			}elseif (!$value['groupid3']&&!$value['groupid2']&&$value['groupid']) {
				$map['id'] = $value['groupid'];
			}
			$arr[$key]['category'] = $items->where($map)->getField('name');
		}
	
		return $arr;
	}
}