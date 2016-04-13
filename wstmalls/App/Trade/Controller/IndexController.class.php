<?php
namespace Trade\Controller;
class IndexController extends TradeBaseController {
    public function index(){
    	/**
    	 * 国际商标
    	 */
    	$user_trade = M ( 'user_trade' );
    	$data['gn_trade_user'] = $trade_user  =  $search = urldecode(I('get.trade_user'));
    	//当前权利人
    	//获取当前权力人列表
    	$data['gn_user'] = $user_trade->field('count(*) as count,trade_user')->where(array('user_id'=>get_userid(),'type'=>'1'))->group('trade_user')->select();
    	if(!$trade_user){
    		$user = array();
    		foreach($data['gn_user'] as $key => $val){
    			$user[$key] = $val['count'];
    		}
    		$key = array_search(max($user),$user);
    		$data['gn_trade_user'] = $trade_user = $data['gn_user'][$key]['trade_user'];
    	}
    	$data ['gn_mytrade_count'] = $user_trade->where ( array ( 'user_id' => get_userid(),'type'=>1  ) )->count ();
    	//当前权利人
    	$data['gn_user'] = $user_trade->field('trade_user')->where(array('user_id'=>get_userid(),'type'=>'1'))->group('trade_user')->select();
    	// 获得续展商标
    	$data ['gn_xz_count'] = $this->xu_count();
    	// 获取费用管理商标
    	$data ['gn_res_trade'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'fee_state' => '1'  ) )->count ();
    	$data ['gn_res_trade_fee'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'fee_state' => '1'  ) )->sum ('total_fee');
    	// 交易商标
    	$data ['gn_jy_trade'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'trading_state' => array ( array ( 'gt', 0  ), array ( 'lt', 3  ), 'and'  )  ) )->count ();
    	$data ['gn_jy_trade_price'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'trading_state' => array ( array ( 'gt', 0  ), array ( 'lt', 3  ), 'and'  )  ) )->sum ('price');
    	 
    	$data ['gn_user_trade_count'] = $user_trade->where ( array ( 'user_id' => get_userid(),'type'=>1,'trade_user'=>$trade_user  ) )->count();
    	//近五年申请的数量
    	$year = date('Y',time());
    	$data['gn'] = array();
    	for($i=$year;$i>=$year-4;$i--){
    		$begin = strtotime($i.'-01-01 00:00:00');
    		$end = strtotime($i.'-12-31 23:59:59');
    		$where['sq_date'] =  array(array('egt',$begin),array('elt',$end),'and');
    		$where['type'] = 1;
    		$where['trade_user'] = $trade_user;
    		$where['user_id'] = get_userid();
    		$data['gn'][$i] = $user_trade->where($where)->count();
    	}
    	//查询国内最早申请商标
    	$data['gn_min_trade'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>1,'trade_user'=>$trade_user))->min('sq_date');
    	//查询国内最近申请商标
    	$data['gn_max_trade'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>1,'trade_user'=>$trade_user))->max('sq_date');
    	//获取申请中
    	$data['gn_w_sqz'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'1','trade_user'=>$trade_user,'trade_dynamic_state'=>'101'))->count();
    	//获取已注册
    	$data['gn_w_yzc'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'1','trade_user'=>$trade_user,'trade_dynamic_state'=>'102'))->count();
    	//获取已无效
    	$data['gn_w_ywx'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'1','trade_user'=>$trade_user,'trade_dynamic_state'=>'100'))->count();
    	//获取已无效
    	$data['gn_w_ybh'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'1','trade_user'=>$trade_user,'trade_dynamic_state'=>'103'))->count();
    	//获取其他
    	$data['gn_w_qt'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'1','trade_user'=>$trade_user,'trade_dynamic_state'=>'106'))->count();
    	 
    	
    	/**
    	 * 国际商标
    	 */
    	$data['gj_trade_user'] = $trade_user  =  $search = urldecode(I('get.trade_user'));
    	//当前权利人
    	//获取当前权力人列表
    	$data['gj_user'] = $user_trade->field('count(*) as count,trade_user')->where(array('user_id'=>get_userid(),'type'=>'2'))->group('trade_user')->select();
    	if(!$trade_user){
    		$user = array();
    		foreach($data['gj_user'] as $key => $val){
    			$user[$key] = $val['count'];
    		}
    		$key = array_search(max($user),$user);
    		$data['gj_trade_user'] = $trade_user = $data['gj_user'][$key]['trade_user'];
    	}
    	$data ['gj_mytrade_count'] = $user_trade->where ( array ( 'user_id' => get_userid(),'type'=>2  ) )->count ();
    	//当前权利人
    	$data['gj_user'] = $user_trade->field('trade_user')->where(array('user_id'=>get_userid(),'type'=>'2'))->group('trade_user')->select();
    	// 获得续展商标
    	$data ['gj_xz_count'] = $this->xu_count();
    	// 获取费用管理商标
    	$data ['gj_res_trade'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'fee_state' => '1'  ) )->count ();
    	$data ['gj_res_trade_fee'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'fee_state' => '1'  ) )->sum ('total_fee');
    	// 交易商标
    	$data ['gj_jy_trade'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'trading_state' => array ( array ( 'gt', 0  ), array ( 'lt', 3  ), 'and'  )  ) )->count ();
    	$data ['gj_jy_trade_price'] = $user_trade->where ( array ( 'user_id' => get_userid(), 'trading_state' => array ( array ( 'gt', 0  ), array ( 'lt', 3  ), 'and'  )  ) )->sum ('price');
    	
    	$data ['gj_user_trade_count'] = $user_trade->where ( array ( 'user_id' => get_userid(),'type'=>2,'trade_user'=>$trade_user  ) )->count();
    	//近五年申请的数量
    	$year = date('Y',time());
    	$data['gj'] = array();
    	for($i=$year;$i>=$year-4;$i--){
    		$begin = strtotime($i.'-01-01 00:00:00');
    		$end = strtotime($i.'-12-31 23:59:59');
    		$where['sq_date'] =  array(array('egt',$begin),array('elt',$end),'and');
    		$where['type'] = 2;
    		$where['trade_user'] = $trade_user;
    		$where['user_id'] = get_userid();
    		$data['gj'][$i] = $user_trade->where($where)->count();
    	}
    	//查询国内最早申请商标
    	$data['gj_min_trade'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>2,'trade_user'=>$trade_user))->min('sq_date');
    	//查询国内最近申请商标
    	$data['gj_max_trade'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>2,'trade_user'=>$trade_user))->max('sq_date');
    	//获取申请中
    	$data['gj_w_sqz'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'2','trade_user'=>$trade_user,'trade_dynamic_state'=>'101'))->count();
    	//获取已注册
    	$data['gj_w_yzc'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'2','trade_user'=>$trade_user,'trade_dynamic_state'=>'102'))->count();
    	//获取已无效
    	$data['gj_w_ywx'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'2','trade_user'=>$trade_user,'trade_dynamic_state'=>'100'))->count();
    	//获取已无效
    	$data['gj_w_ybh'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'2','trade_user'=>$trade_user,'trade_dynamic_state'=>'103'))->count();
    	//获取其他
    	$data['gj_w_qt'] = $user_trade->where(array('user_id'=>get_userid(),'type'=>'2','trade_user'=>$trade_user,'trade_dynamic_state'=>'106'))->count();
    	
    	
    	$this->assign('list',$data);
    	$this->display();
   	}
   	
   	public function xu_count(){
   		$user_trade = M ( 'user_trade');
   		if($data['title']!='商标管家-需续展商标'){
   			if(date('L',time()+31536000)==1){
   				$ymd = time()+31622400;
   			}else{
   				$ymd = time()+31536000;
   			}
   			$time_where = strtotime(date("Y-m-d",strtotime("-6 month")));
   			$where['zd_date'] = array(array('elt',$ymd),array('gt',1),array('gt',$time_where));
   			$where['state'] = 1;
   			$where['trade_dynamic_state'] = array(array('eq','102'),array('eq','105'),'or');
   			$where['user_id'] = get_userid();
   			$data['count'] = $user_trade->where($where)->count();
   			return $data['count'];
   		}
   	}
   	
   	public function detail(){
   		$data['items'] = M('Items')->where(array('parentid'=>'0','tmpa'=>'1','state'=>'1'))->select();
   		$get = I('get.');
   		$data['trade'] = $this->get_one_trade($get['tmid']);
   		foreach ($data['trade']['result']['items'] as $key=>$value){
   			$items_id = array_search($value['fclass'],C("TYPE_CODE"));
   			$items = M('items')->where(array('id'=>$items_id))->find();
   			$data['trade']['result']['items'][$key]['name'] = $items['name'];
   		}
   		$data['trade_dynamic'] = $data['trade']['dynamic'];
   		if(!$data['trade']['result']['items']){
   			$data['trade'] = M('user_trade')->where(array('reg_id'=>$get['tmid']))->find();
   			$data['trade']['img'] = explode(',',$data['trade']['img']);
   			$data['trade_dynamic'] = json_decode($data['trade']['trade_dynamic'],true);
   			$items = M('items')->where(array('id'=>$data['trade']['trade_class_id']))->find();
   			$data['trade']['name'] = $items['name'];
   		}
   		$data['sy'] = M('item')->where(array('tmscreening'=>2,'tmpa'=>1))->limit(4)->order('rand()')->select();
   		$data['sc'] = M('item')->where(array('tmscreening3'=>2,'tmpa'=>1))->limit(4)->order('rand()')->select();
   		 
   		foreach ($data['sy'] as $key=>$value){
   			$items = M('items')->where(array('id'=>$value['groupid']))->find();
   			$data['sy'][$key]['name'] = $items['name'];
   		}
   		 
   		foreach ($data['sc'] as $key=>$value){
   			$items = M('items')->where(array('id'=>$value['groupid']))->find();
   			$data['sc'][$key]['name'] = $items['name'];
   		}
   		$this->assign('list',$data);
   		return $this->display();
   		/**
   		$data['items'] = M('Items')->where(array('parentid'=>'0','tmpa'=>'1','state'=>'1'))->select();
   		$get = I('get.');
   		$data['trade'] = $this->get_trade(array('id'=>$get['tmid']));
   		foreach ($data['trade']['result']['items'] as $key=>$value){
   			$items_id = array_search($value['fclass'],C("TYPE_CODE"));
   			$items = M('items')->where(array('id'=>$items_id))->find();
   			$data['trade']['result']['items'][$key]['name'] = $items['name'];
   		}
   		if(!$data['trade']['result']['items']){
   			$data['trade'] = M('user_trade')->where(array('reg_id'=>$get['tmid']))->find();
   			$data['trade']['img'] = explode(',',$data['trade']['img']);
   			$data['trade_dynamic'] = json_decode($data['trade']['trade_dynamic'],true);
   			$items = M('items')->where(array('id'=>$data['trade']['trade_class_id']))->find();
   			$data['trade']['name'] = $items['name'];
   		}
   		$data['sy'] = M('item')->where(array('tmscreening'=>2,'tmpa'=>1))->limit(4)->order('rand()')->select();
   		$data['sc'] = M('item')->where(array('tmscreening3'=>2,'tmpa'=>1))->limit(4)->order('rand()')->select();
   		
   		foreach ($data['sy'] as $key=>$value){
   			$items = M('items')->where(array('id'=>$value['groupid']))->find();
   			$data['sy'][$key]['name'] = $items['name'];
   		}
   		
   		foreach ($data['sc'] as $key=>$value){
   			$items = M('items')->where(array('id'=>$value['groupid']))->find();
   			$data['sc'][$key]['name'] = $items['name'];
   		}
   		$this->assign('list',$data);
   		$this->display();
   		**/
   	}
   	
   	public function tmlist(){
   		$data['items'] = M('Items')->where(array('parentid'=>'0','tmpa'=>'1','state'=>'1'))->select();
   		if(I('post.')){
   			$data['post'] = $post =I('post.');
   		}else{
   			$data['post'] = $post = I('get.');
   			$data['post']['paseach'] = $post['paseach'] = urldecode($post['paseach']);
   		}
   		$where = array();
   		if($post['name']=='name'){
   			$where['name'] = urldecode($post['paseach']);
   		}elseif($post['name']=='fsqr1'){
   			$where['fsqr1'] = urldecode($post['paseach']);
   		}elseif($post['name']=='id'){
   			$where['id'] = $post['paseach'];
   		}
   		if($post['fclass']){
   			$where['fclass'] = C('TYPE_CODE')[$post['fclass']];
   		}
   		$p = 0;
   		if(isset($post['p'])){
   			$p = $post['p'];
   		}
   		$data['trade'] = $this->get_trade($where,'10',$p);
   		$Page = new \Org\Util\Pagem( $data['trade']['result']['total'], '10' ); // 实例化分页类 传入总记录数和每页显示的记录数(10)
   		if($post['name']=='name'){
   			$where['ftmchin'] = urldecode($post['paseach']);
   			$where['ftmeng'] = urldecode($post['paseach']);
   			$where['ftmpy'] = urldecode($post['paseach']);
   			$Page->parameter['name']   =  'name';
   			$Page->parameter['paseach']   =  urlencode($post['paseach']);
   		}elseif($post['name']=='fsqr1'){
   			$where['fsqr1'] = urldecode($post['paseach']);
   			$Page->parameter['name']   =  'fsqr1';
   			$Page->parameter['paseach']   =  urlencode($post['paseach']);
   		}elseif($post['name']=='id'){
   			$where['id'] = urldecode($post['paseach']);
   			$Page->parameter['name']   =  'id';
   			$Page->parameter['paseach']   =  urlencode($post['paseach']);
   		}
   		if($post['fclass']){
   			$where['fclass'] = C('TYPE_CODE')[$post['fclass']];
   			$Page->parameter['fclass']   =  C('TYPE_CODE')[$post['fclass']];
   		}
   		$data ['page'] = $Page->show(); // 分页显示输出
   		foreach ($data['trade']['result']['items'] as $key=>$value){
    		$items_id = array_search($value['fclass'],C("TYPE_CODE"));
    		$items = M('items')->where(array('id'=>$items_id))->find();
    		$data['trade']['result']['items'][$key]['name'] = $items['name'];
    	}
   		$data['sy'] = M('item')->where(array('tmscreening'=>2,'tmpa'=>1))->limit(4)->order('rand()')->select();
   		$data['sc'] = M('item')->where(array('tmscreening3'=>2,'tmpa'=>1))->limit(4)->order('rand()')->select();
   		 
   		foreach ($data['sy'] as $key=>$value){
   			$items = M('items')->where(array('id'=>$value['groupid']))->find();
   			$data['sy'][$key]['name'] = $items['name'];
   		}
   		 
   		foreach ($data['sc'] as $key=>$value){
   			$items = M('items')->where(array('id'=>$value['groupid']))->find();
   			$data['sc'][$key]['name'] = $items['name'];
   		}
   		$this->assign('list',$data);
   		$this->display();
   	}
   	
}