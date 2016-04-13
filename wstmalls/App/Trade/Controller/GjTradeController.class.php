<?php
namespace Trade\Controller;
class GjTradeController extends TradeBaseController {
    
	public function index(){
		$data['groupid'] = M('Items')->where(array('parentid'=>'0','tmpa'=>'1','state'=>'1'))->select();
		$user = M('user_trade')->where(array('user_id'=>get_userid(),'type'=>'2'))->select();
    	$data['trade_user'] = array();
    	$items  = array();
    	$trade_dynamic_state = array();
    	foreach($user as $key => $val){
    		$data['trade_user'][] = $val['trade_user'];
    		$items[] = $val['trade_class_id'];
    		$trade_dynamic_state[] = $val['trade_dynamic_state'];
    	}
    	$data['trade_user']  = array_unique($data['trade_user']);
    	$data['items']  = array_unique($data['items']);
    	$data['trade_dynamic_state']  = array_unique($trade_dynamic_state);
		if($items){
    		$data['items'] = M('Items')->where(array('id'=>array('in',$items)))->select();
    	}
    	$year = M('user_trade')->field('sq_date')->where(array('user_id'=>get_userid(),'type'=>'2'))->group('trade_user')->select();
    	
		$year_all = array();
		foreach ($year as $key=>$value){
			$year_all[] = date('Y',$value['sq_date']);
		}
		$data['year'] = array_unique($year_all);
		rsort($data['year']);
		if(!$data['year']){
			$nowyear = date('Y',time());
			for ($i=$nowyear;$i>$nowyear-5;$i--){
				$data['year'][] = $i;
			}
		}
		$search = I('get.');
		$paseach = I('post.paseach')?I('post.paseach'):$search['paseach'];
		if($paseach){
			$wherea['reg_id'] = array('like','%'.urldecode($paseach).'%');
			$wherea['trade_name'] = array('like','%'.urldecode($paseach).'%');
			$wherea['trade_user'] = array('like','%'.urldecode($paseach).'%');
			$wherea['_logic'] = 'OR';
			$where['_complex']=$wherea;
		}
		if($search['trade_class_id']){
			$search['trade_class_id'] = explode('-',$search['trade_class_id']);
			$where['trade_class_id']  = array('in',$search['trade_class_id']);
		}
		if($search['trade_dynamic_state']){
			$search['trade_dynamic_state'] = explode('-',$search['trade_dynamic_state']);
			if($search['trade_dynamic_state']=='102'){
				$search['trade_dynamic_state'][] = '105';
				$where['trade_dynamic_state']  = array('in',$search['trade_dynamic_state']);
			}else{
			$where['trade_dynamic_state']  = array('in',$search['trade_dynamic_state']);
			}
		}
		if($search['trade_user']){
			$search['trade_user'] = explode('-',$search['trade_user']);
			$where['trade_user']  = array('in',str_replace('+',' ',$search['trade_user']));
			//$where['trade_user']  = urldecode($search['trade_user']);
		}
		if($search['year']){
			$search['year'] = explode('-',$search['year']);
			foreach ($search['year'] as $key=>$value ){
				$beg = strtotime($value.'-1-1 00:00:00');
				$end = strtotime($value.'-12-31 23:59:59');
				$where['sq_date'][]  = array(array('gt',$beg),array('lt',$end), 'and') ;
			}
			$where['sq_date'][] = 'or';
		}
		$where['user_id'] = get_userid();
		$where['type'] = '2';
		$data['count'] = M('user_trade')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagem($data['count'], '10' ); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->parameter['paseach']   =   urlencode($paseach);
		$data ['page'] = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data['trade'] = M('user_trade')->field ( 'qh_user_trade.id,qh_user_trade.trade_name,qh_user_trade.trade_user,qh_user_trade.trade_class_id,qh_user_trade.uid,qh_user_trade.reg_id,qh_user_trade.trade_class_id,qh_user_trade.type,qh_user_trade.state,qh_user_trade.tm_state,qh_user_trade.user_id,qh_user_trade.trade_id,qh_items.name,qh_user_trade.sq_date,qh_user_trade.zc_date,qh_user_trade.zd_date,qh_user_trade.service,qh_user_trade.trading_state,qh_user_trade.trade_dynamic_state' )->join ( 'left join qh_items on qh_user_trade.trade_class_id = qh_items.id', 'LEFT' )->where($where)->order(array('id'=>'desc'))->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign('paseach',$paseach);
		$this->assign('search',$search);
    	$this->assign('list',$data);
		$this->display();
	}
	
	public function ajax_show(){
		$data['rel'] = I('post.rel');
		$data['uid'] = $uid = I('post.id');
		$data['trade_data'] = M('user_trade')->where(array('uid'=>$uid))->find();
		$data['trade_data']['trade_dynamic'] = json_decode($data['trade_data']['trade_dynamic'],true);
		$data['trade_data']['file_img'] = json_decode($data['trade_data']['file_img'],true);
		$zd_date = $data['trade_data']['zd_date'];
		$zd = date('Y-m-d H:i:s',$data['trade_data']['zd_date']);
		if($zd_date){
			if(strtotime("+12 month")<$zd_date){
				$data['xz'] = array(
						'type' =>'正常',
						'content'=>'',
						'price' =>''
				);
			}
			if(strtotime("+12 month")>$zd_date&&time()<$zd_date){
				$day = ($zd_date-time())/84600;
				$data['xz'] = array(
						'type' =>'未续展',
						'day' =>floor($day),
						'content'=>'天后续展期结束，进入宽展期',
						'price' =>'2000'
				);
			}
			if(strtotime("$zd +6 month")>time()&&time()>$zd_date){
				$day = ((strtotime("$zd +6 month")-time()))/86400;
				$data['xz'] = array(
						'type' =>'宽展期',
						'day' =>floor($day),
						'content'=>'天后宽展期结束，商标失效',
						'price' =>'2500'
						);
			}
			if(strtotime("$zd +6 month")<time()){
				$data['xz'] = array(
						'type' =>'未续展',
						'content'=>'商标失效',
						'price' =>''
				);
			}
		}
		$this->assign('list',$data);
		$this->display();
	}
	
	public function get_cat(){
		$cat = I('post.cat');
		$cat_data = C('TRADE_CAT')[$cat];
		$data = array();
		if($cat_data['hcat']){
			foreach ($cat_data['hcat'] as $key=>$value){
				$items = M('items')->where(array('id'=>$key))->find();
				$data['hcat'][$items['name']]=$value;
			}
			
		}
		if($cat_data['gcat']){
			foreach ($cat_data['gcat'] as $key=>$value){
				$items = M('items')->where(array('id'=>$key))->find();
				$data['gcat'][$items['name']]=$value;
			}
				
		}
		$this->assign('list',$data);
		$this->display();
	}
	
	public function aaaaa(){
		$aa = array(
			'1'=>'8',
			'2'=>'9',
			'3'=>'10',
			'4'=>'11',
			'5'=>'28',
			'6'=>'29',
			'7'=>'30',
			'8'=>'31',
			'9'=>'32',
			'10'=>'33',
			'11'=>'34',
			'12'=>'35',
			'13'=>'36',
			'14'=>'37',
			'15'=>'38',
			'16'=>'39',
			'17'=>'40',
			'18'=>'41',
			'19'=>'42',
			'20'=>'43',
			'21'=>'44',
			'22'=>'45',
			'23'=>'46',
			'24'=>'47',
			'25'=>'48',
			'26'=>'49',
			'27'=>'50',
			'28'=>'51',
			'29'=>'52',
			'30'=>'53',
			'31'=>'54',
			'32'=>'55',
			'33'=>'56',
			'34'=>'57',
			'35'=>'58',
			'36'=>'59',
			'37'=>'60',
			'38'=>'61',
			'39'=>'62',
			'40'=>'63',
			'41'=>'64',
			'42'=>'65',
			'43'=>'66',
			'44'=>'67',
			'45'=>'68'
				
				
		);
			$data = M('user_trade')->select();
			foreach ($data as $key=>$value){
				$re = M('user_trade')->where(array('id'=>$value['id']))->save(array('trade_class_id'=>$aa[$value['trade_class_id']]));
				if($re){
					p($value['id'].'修改成功！'.$re);
				}else{
					p($value['id'].'修改失败！'.$re);
				}
			}
	}
	
	
	/**
	 * 远程获取商标图片
	 * @param unknown $id 商标注册号
	 * @param unknown $class 商标类别
	 */
	public function tmimg($id, $class) {
		header( "HTTP/1.1 301 Moved Permanently" );
		header('Location: http://www.quandashi.com/member/new-image?brand='.$id.'&type=middle');exit;
		
		$re = $this->imgdata($id, $class);
		if($re){
			if($re['type']=='bmp'){
				header ( "Content-type: application/x-bmp" );
			} else {
				header ("Content-type: application/image/gif");
			}
			echo $re['data'];
		} else {
			header ("Content-type: application/image/pjpeg");
			$file = file_get_contents('/var/www/html/qihaoip/html/statics/images/nojpg.jpg');
			echo $file;
			exit();
		}
	}
	
	/**
	 * 远程获取商标图片
	 * @param unknown $id 商标注册号
	 * @param unknown $class商标类别
	 * @return unknown|boolean 
	 */	
	 public function imgdata($id, $class){	 	
		if ($class < 10) {
			$class = '0' . ($class + 0);
		}
		$link = mssql_connect ( '120.234.2.202:1433', 'sa', '421651zzZZ' );
		mssql_select_db ( 'qstmimage', $link );
		$sql = 'select top 1 * from ttmimage' . $class . ' where fTMID = 0x' . $id;
		$query = mssql_query ( $sql, $link );
		$row = mssql_fetch_assoc ( $query );
		if($row){
			if ($row['fgif'] == '2' || $row['fgif'] == '5') {
				$re['type'] = 'bmp';
			} else {
				$re['type'] = 'gif';
			}
			$re['data'] = $row['fImage'];
			return $re;
		} else {
			return false;
		}
	}

	/**
	 * 修改管理费用
	 */
	public function edit_fee(){
		$insert = I('post.');
		if($insert){
			$re = M('user_trade')->where(array('uid'=>$insert['uid']))->save($insert);
		}
		if($re){
			$this->ajaxReturn(array('code'=>'1','msg'=>'保存成功！','rel'=>$insert['rel'],'uid'=>$insert['uid']));
		}else{
			$this->ajaxReturn(array('code'=>'2','msg'=>'保存失败！','rel'=>$insert['rel'],'uid'=>$insert['uid']));
		}
	}
	
	/**
	 * 修改状态详情
	 */
	public function edit_dynamic(){
		$post = I('post.');
		$trade_dynamic = array();
		foreach ($post['trade_dynamic'] as $key => $value){
			if($value['time']&&$value['type']){
				$trade_dynamic[$key]['time'] = $value['time'];
				$trade_dynamic[$key]['type'] = $value['type'];
			}
		}
		$insert = json_encode($trade_dynamic);
		if($insert){
			$re = M('user_trade')->where(array('uid'=>$post['uid']))->save(array('trade_dynamic'=>$insert));
			if($re){
				$this->ajaxReturn(array('code'=>'1','msg'=>'保存成功！','rel'=>$post['rel'],'uid'=>$post['uid']));
			}else{
				$this->ajaxReturn(array('code'=>'2','msg'=>'保存失败！','rel'=>$post['rel'],'uid'=>$post['uid']));
			}
		}
	}
	
	public function del(){
		$uid = I('post.uid');
		$re = M('user_trade')->where(array('uid'=>$uid))->delete();
		if($re){
			$this->ajaxReturn(array('code'=>'1','msg'=>'删除成功！'));
		}else{
			$this->ajaxReturn(array('code'=>'1','msg'=>'删除失败！'));
		}
	}
	
	public function alldel(){
		if(IS_POST){
			$ids = I('post.ids');
			if($ids){
				$where['uid'] = array('in',$ids);
				$re = M('user_trade')->where($where)->delete();
			}else{
				$this->error('请选择要删除的商标！');
			}
		}
		if(IS_GET){
			$where['user_id'] = get_userid();
			$where['type'] = 2;
			$re = M('user_trade')->where($where)->delete();
		}
		if($re){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	
	public function cost_list(){
		$where = array();
		$data['paseach'] = $paseach = I('post.paseach')?I('post.paseach'):I('get.paseach');
		if($paseach){
			$wherea['reg_id'] = array('like','%'.urldecode($paseach).'%');
			$wherea['trade_name'] = array('like','%'.urldecode($paseach).'%');
			$wherea['trade_user'] = array('like','%'.urldecode($paseach).'%');
			$wherea['_logic'] = 'OR';
			$where['_complex']=$wherea;
		}
		$where['user_id'] =get_userid();
		$where['type'] = 2;
		$where['fee_state'] = 1;
		$data['total'] = M('user_trade')->where($where)->sum('total_fee');
		$data['count'] = M('user_trade')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagem($data['count'], '10' ); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->parameter['paseach']   =   urlencode($paseach);
		$data ['page'] = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data['trade'] = M('user_trade')->field ( 'qh_user_trade.total_fee,qh_user_trade.else_fee,qh_user_trade.law_fee,qh_user_trade.ad_fee,qh_user_trade.design_fee,qh_user_trade.replay_fee,qh_user_trade.re_chk_fee,qh_user_trade.reg_agent_fee,qh_user_trade.reg_fee,qh_user_trade.id,qh_user_trade.trade_name,qh_user_trade.trade_user,qh_user_trade.trade_class_id,qh_user_trade.uid,qh_user_trade.reg_id,qh_user_trade.trade_class_id,qh_user_trade.type,qh_user_trade.state,qh_user_trade.tm_state,qh_user_trade.user_id,qh_user_trade.trade_id,qh_items.name,qh_user_trade.sq_date,qh_user_trade.zc_date,qh_user_trade.zd_date,qh_user_trade.service,qh_user_trade.trading_state,qh_user_trade.trade_dynamic_state' )->join ( 'left join qh_items on qh_user_trade.trade_class_id = qh_items.id', 'LEFT' )->where($where)->order(array('id'=>'desc'))->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		$this->assign('list',$data);
		$this->display();
	}
	
	public function show_cost(){
		$data['uid'] = $uid = I('post.id');
		$data['trade_data'] = M('user_trade')->where(array('uid'=>$uid))->find();
		$this->assign('list',$data);
		$this->display();
	}
	
	public function fee_edit(){
			$uid = I('get.uid');
			$re = M('user_trade')->where(array('uid'=>$uid))->save(array('fee_state'=>'0'));
			if($re){
				$this->success('删除成功！');
			}else{
				$this->error('删除失败！');
			}
		}
		
		
	public function fee_del(){
		if(IS_POST){
			$ids = I('post.ids');
			if($ids){
				$where['uid'] = array('in',$ids);
				$re = M('user_trade')->where($where)->save(array('fee_state'=>'0'));
			}else{
				$this->error('请选择要删除的商标！');
			}
		}
		if(IS_GET){
			$where['user_id'] = get_userid();
			$where['type'] = 2;
			$re = M('user_trade')->where($where)->save(array('fee_state'=>'0'));
		}
		if($re){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	
	public function edit_file(){
		$post = I('post.');
		$trade = M('user_trade')->where(array('uid'=>$post['uid']))->find();
		$img = array();
		/* $trade['file_img'] = json_decode($trade['file_img'],true);
		foreach ($trade['file_img'] as $key =>$value){
			$img[] = $value;
		} */
		foreach($post['file_img'] as $key=>$value){
			$img[] = $value;
		}
		$file_img = array('file_img'=>json_encode($img));
		$re = M('user_trade')->where(array('uid'=>$post['uid']))->save($file_img);
		if($re){
			$this->ajaxReturn(array('code'=>'1','msg'=>'保存成功！','rel'=>$post['rel'],'uid'=>$post['uid']));
		}else{
			$this->ajaxReturn(array('code'=>'2','msg'=>'保存失败！','rel'=>$post['rel'],'uid'=>$post['uid']));
		}
	}
	
	public function file_del(){
		$post = I('post.');
		$trade = M('user_trade')->where(array('uid'=>$post['uid']))->find();
		$trade['file_img'] = json_decode($trade['file_img'],true);
		unset($trade['file_img'][$post['rel']]);
		$file_img = array('file_img'=>json_encode($trade['file_img']));
		$re = M('user_trade')->where(array('uid'=>$post['uid']))->save($file_img);
		if($re){
    		$this->ajaxReturn(array('code'=>1,'msg'=>'删除成功！'),'json');
    	}else{
    		$this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'),'json');
    	}
	}
	
	public function file_list(){
		$where = array();
		$data['paseach'] = $paseach = I('post.paseach')?I('post.paseach'):I('get.paseach');
		if($paseach){
			$wherea['reg_id'] = array('like','%'.urldecode($paseach).'%');
			$wherea['trade_name'] = array('like','%'.urldecode($paseach).'%');
			$wherea['trade_user'] = array('like','%'.urldecode($paseach).'%');
			$wherea['_logic'] = 'OR';
			$where['_complex']=$wherea;
		}
		$where['user_id'] =get_userid();
		$where['type'] = 2;
		$where['file_img'] = array('neq','NULL');
		$data['count'] = M('user_trade')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagem($data['count'], '10' ); // 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->parameter['paseach']   =   urlencode($paseach);
		$data ['page'] = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data['trade'] = M('user_trade')->field ( 'qh_user_trade.file_img,qh_user_trade.total_fee,qh_user_trade.else_fee,qh_user_trade.law_fee,qh_user_trade.ad_fee,qh_user_trade.design_fee,qh_user_trade.replay_fee,qh_user_trade.re_chk_fee,qh_user_trade.reg_agent_fee,qh_user_trade.reg_fee,qh_user_trade.id,qh_user_trade.trade_name,qh_user_trade.trade_user,qh_user_trade.trade_class_id,qh_user_trade.uid,qh_user_trade.reg_id,qh_user_trade.trade_class_id,qh_user_trade.type,qh_user_trade.state,qh_user_trade.tm_state,qh_user_trade.user_id,qh_user_trade.trade_id,qh_items.name,qh_user_trade.sq_date,qh_user_trade.zc_date,qh_user_trade.zd_date,qh_user_trade.service,qh_user_trade.trading_state,qh_user_trade.trade_dynamic_state' )->join ( 'left join qh_items on qh_user_trade.trade_class_id = qh_items.id', 'LEFT' )->where($where)->order(array('id'=>'desc'))->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		foreach ($data['trade'] as $key=>$value){
			$data['trade'][$key]['file_img'] = json_decode($value['file_img'],true);
		}
		$this->assign('list',$data);
		$this->display();
	}
	
	public function ajax_upload($type="img"){
		 $dir = '.'.UPLOAD_DIR.'fileimg/';
		 $dir_name = UPLOAD_DIR.'fileimg/';
		 if (!is_dir($dir)){
		 	if (!mkdir($dir,0777,true)){
		 		$this->ajaxReturn('创建文件夹'.$savePath.'失败,请检查uploads文件夹权限是否为777');
		 	}
		 }
		if($type=='img'){
			$exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		} else {
			$exts = array('jpg', 'gif', 'png', 'jpeg','zip','rar','doc','docx','xls','xlsx','ppt','pptx','txt','pdf');// 设置附件上传类型
		}
		if(count($_FILES)){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     512000;// 设置附件上传大小
			$upload->exts      =     $exts;// 设置附件上传类型
			$upload->rootPath  =     $dir; // 设置附件上传根目录
			$upload->savePath  =     date('m').'/'; // 设置附件上传（子）目录
			$info = $upload->upload();
			if($info){
				echo json_encode(array("error"=>"0","pic"=>$dir_name.$info['file']['savepath'].$info['file']['savename'],"name"=>$info['file']['savename']));
			}else{
				echo json_encode(array("error"=>"上传有误，清检查服务器配置！"));
			}
		} 
	}
	
	public function show_file(){
		$data['uid'] = $uid = I('post.id');
		$data['trade_data'] = M('user_trade')->where(array('uid'=>$uid))->find();
		$this->assign('list',$data);
		$this->display();
	}
	
	public function del_file(){
		$uid = I('get.uid');
		$re = M('user_trade')->where(array('uid'=>$uid))->save(array('file_img'=>'NULL'));
		if($re){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	
	public function ajax_get_file(){
		$data['uid'] = $uid = I('post.uid');
		$data['trade_data'] = M('user_trade')->where(array('uid'=>$uid))->find();
		$data['trade_data']['file_img'] = json_decode($data['trade_data']['file_img'],true);
		$this->assign('list',$data);
		$this->display();
	}
	
	public function file_delete(){
		if(IS_POST){
			$ids = I('post.ids');
			if($ids){
				$where['uid'] = array('in',$ids);
				$re = M('user_trade')->where($where)->save(array('file_img'=>'NULL'));
			}else{
				$this->error('请选择要删除的商标！');
			}
		}
		if(IS_GET){
			$where['user_id'] = get_userid();
			$where['type'] = 2;
			$re = M('user_trade')->where($where)->save(array('file_img'=>'NULL'));
		}
		if($re){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	
	public function daochu(){
		$data = M('user_trade')->where(array('user_id'=>get_userid(),'type'=>2))->select();
		foreach ($data as $key=>$value){
			$items = M('items')->where(array('id'=>$value['trade_class_id']))->find();
			$data[$key]['name'] = $items['name'];
			$data[$key]['state'] = C('TRADE_STATE')[$value['trade_dynamic_state']];
		}
		$this->excel($data,'国际商标');
		
	}
	
	public function xiazai_fee(){
		if(IS_POST){
			$ids = I('post.ids');
			if($ids){
				$where['uid'] = array('in',$ids);
				$data = M('user_trade')->where($where)->select();
			}else{
				$this->error('请选择要导出的商标！');
			}
		}
		if(IS_GET){
			$where['user_id'] = get_userid();
			$where['type'] = 2;
			$where['fee_state'] = 1;
			$data = M('user_trade')->where($where)->select();
		}
		if($data){
			foreach ($data as $key=>$value){
				$items = M('items')->where(array('id'=>$value['trade_class_id']))->find();
				$data[$key]['name'] = $items['name'];
				$data[$key]['state'] = C('TRADE_STATE')[$value['trade_dynamic_state']];
			}
			$this->excel($data,'国内商标-费用管理','fee');
		}
	}
	
	
	public function xiazai_wen(){
		if(IS_POST){
			$ids = I('post.ids');
			if($ids){
				$where['uid'] = array('in',$ids);
				$data = M('user_trade')->where($where)->select();
			}else{
				$this->error('请选择要导出的商标！');
			}
		}
		if(IS_GET){
			$where['user_id'] = get_userid();
			$where['type'] = 2;
			$where['file_img'] = array('neq','NULL');
			$data = M('user_trade')->where($where)->select();
		}
		if($data){
			foreach ($data as $key=>$value){
				$items = M('items')->where(array('id'=>$value['trade_class_id']))->find();
				$data[$key]['name'] = $items['name'];
				$data[$key]['state'] = C('TRADE_STATE')[$value['trade_dynamic_state']];
			}
			$this->excel($data,'国内商标-文件管理','file');
		}
	}
	
public function ajax_jy(){
		$post = I('post.');
		$trade = M('user_trade')->where(array('uid'=>$post['uid']))->find();
		if($trade['reg_id']){
			$id = $trade['reg_id'];
		}else{
			$id = ttmid($trade['trade_id']);
		}
		$check = M('item')->where(array('tmno'=>$id,'state'=>array('neq',8)))->count();
		if($check){
			$this->ajaxReturn(array('code'=>2,'msg'=>'交易库已存在此商标！'),'json');
			exit;
		}
		$re = M('user_trade')->where(array('uid'=>$post['uid']))->save(array('price'=>$post['price'],'trading_state'=>1));
		$re = true;
		if($re){
			$this->ajaxReturn(array('code'=>1,'msg'=>'加入交易成功！'),'json');
		}else{
			$this->ajaxReturn(array('code'=>2,'msg'=>'加入交易失败！！'),'json');
		}
	}
	
	public function all_jy(){
		$data = array();
		$ids = I('post.ids');
		if(IS_POST){
			if($ids){
				$trade = M('user_trade')->where(array('uid'=>array('in',$ids)))->select();
				foreach ($trade as $key=>$value){
					$data[] = $value['reg_id']?$value['reg_id']:ttmid($value['trade_id']);
				}
				$check = M('item')->where(array('tmno'=>array('in',$data),'state'=>array('neq',8)))->count();
				if(!$check){
					$re = M('user_trade')->where(array('uid'=>array('in',$ids)))->save(array('trading_state'=>1));
				}else{
					$this->error('商标库存在某条商标，无法重复添加！');
				}
			}else{
				$this->error('请选择要交易的商标！');
			}
		}
		if(IS_GET){
			echo 222;
			die;
			$trade = M('user_trade')->where(array('user_id'=>get_userid()))->select();
			foreach ($trade as $key=>$value){
				$data[] = $value['reg_id']?$value['reg_id']:ttmid($value['trade_id']);
			}
			$check = M('item')->where(array('tmno'=>array('in',$data),'state'=>array('neq',8)))->count();
			if(!$check){
				$re = M('user_trade')->where(array('user_id'=>get_userid()))->save(array('trading_state'=>1));
			}else{
				$this->error('商标库存在某条商标，无法重复添加！');
			}
		}
		if($re){
			$this->success('添加交易成功！');
		}else{
			$this->error('添加交易失败！');
		}
	}
	
}