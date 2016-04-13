<?php
namespace Member\Controller;
class UserController extends MemberBaseController {
	
	public function _initialize(){
		parent::_initialize();
    	$this->_where['id'] = $this->userid;//用户的id永远等于session内的id
	}
	
	/**
	 * 用户个人中心
	 */
	public function index(){//首页
		$data['member'] = M('member')->where($this->_where)->find();
		$data['agent'] = M('member')->where(['id'=>$data['member']['aid']])->find();
		$data['shop'] = M('shop')->where($this->_where)->find();
		$count['tm'] = M('item')->where(['userid'=>$this->userid,'tmpa'=>'1','state'=>'1'])->count();//商标个数
		$count['pa'] = M('item')->where(['userid'=>$this->userid,'tmpa'=>'2','state'=>'1'])->count();//专利个数
		$count['dd'] = M('order')->where(['buyer'=>$this->userid,'state'=>'1'])->count();//供应信息
		$count['qg'] = M('supply')->where(['userid'=>$this->userid,'supplytype'=>'2','state'=>'1'])->count();//求购信息
		$count['wfk'] = M('order')->where(array('buyer'=>$this->userid,'state'=>'1'))->count();//未付款订单
		$data['count'] = $count;
		$money['sr'] = M('moneylog')->where(['userid'=>$this->userid,'type'=>4])->sum('money');
		$money['zc'] = M('moneylog')->where(['userid'=>$this->userid,'type'=>3])->sum('money');
		$money['tk'] = M('moneylog')->where(['userid'=>$this->userid,'type'=>5])->sum('money');
		$data['money'] = $money;
		$data['item'] = M('item')->field('*,(select `name` from qh_items where qh_items.id = qh_item.groupid) as groupname')->where(['state'=>'1'])->limit(0,8)->order('rand()')->select();
		
		//print_r($data['member']);
		$this->assign('data',$data);
		$this->display();
	}

	/**
	 * 用户查看个人资料
	 */
	public function showself(){//查看个人资料
		$m = M('Member');
		$data = $m->where($this->_where)->find();
		
		//把省份市的id转化为对应的名称
		$map['id'] = $data['province'];
		$data['province'] = M('Region')->where($map)->getField('shortname');
		$wh['id'] = $data['city'];
		$data['city'] = M('Region')->where($wh)->getField('shortname');
		
		$name = $m->where(array('id'=>$data['aid']))->find();
		$data['aid'] = $name['name'];
		//省
		$where['level'] = '1';
		$data['sheng'] = M('Region')->where($where)->select();
		foreach ($data['sheng'] as $key => $value){
			$data['pro'] .= '<option value="'.$value['id'].'">'.$value['shortname'].'</option>';
		}
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/*
	 * 修改基本信息
	*/
	public function edit(){
		$model = M('Member');
		if(I('type')=='realname'){
			$where['id'] = I('uid');
			$data['name'] = I('zlmcst');
			$data['gender'] = I('RadioOptions');
			$result = $model->where($where)->save($data);
			if($result){
				$msg['data'] = '修改成功！';
				$msg['state'] = '1';
			}else{
				$msg['data'] = '您没有修改任何数据！';
				$msg['state'] = '2';
			}
			$msg['realname'] = I('zlmcst');
			if(I('RadioOptions') == '1'){
				$msg['gender'] = '先生';
			}elseif(I('RadioOptions') == '2'){
				$msg['gender'] = '女士';
			}else {
				$msg['gender'] = '';
			}
			$this->ajaxReturn($msg);
		}elseif (I('type')=='contact'){
			$map['id'] = I('zlflste');
			$sheng = M('Region')->where($map)->find();
			$wh['id'] = I('zlflst1');
			$shi = M('Region')->where($wh)->find();
			$where['id'] = I('uid');
			$data['tel'] = I('lxtel');
			$data['qq'] = I('lxqq');
			$data['province'] = I('zlflste');
			$data['city'] = I('zlflst1');
			$data['address'] = I('lxaddr');
			$data['about'] = I('mdzs');
			$result = $model->where($where)->save($data);
			if($result){
				$msg['data'] = '修改成功！';
				$msg['state'] = '1';
				$msg['tel'] = I('lxtel');
				$msg['qq'] = I('lxqq');
				$msg['addr'] = $sheng['shortname'].$shi['shortname'].I('lxaddr');
				$msg['about'] = I('mdzs');
			}else{
				$msg['data'] = '您没有修改任何数据！';
				$msg['state'] = '2';
				$msg['tel'] = I('lxtel');
				$msg['qq'] = I('lxqq');
				$msg['addr'] = $sheng['shortname'].$shi['shortname'].I('lxaddr');
				$msg['about'] = I('mdzs');
			}
			$this->ajaxReturn($msg);
		}elseif (I('type')=='bank'){
			$where['id'] = I('uid');
			$data['bank'] = I('gsyh');//所属银行
			$data['acname'] = I('yhxm');//银行户名
			$data['bankcard'] = I('yhkh');//卡号，账号
			$result = $model->where($where)->save($data);
			if($result){
				$msg['data'] = '修改成功！';
				$msg['state'] = '1';
				$msg['bank'] = I('gsyh');//所属银行
				$msg['acname'] = I('yhxm');//银行户名
				$msg['bankcard'] = I('yhkh');//卡号，账号
			}else{
				$msg['data'] = '您没有修改任何数据！';
				$msg['state'] = '2';
				$msg['bank'] = I('gsyh');//所属银行
				$msg['acname'] = I('yhxm');//银行户名
				$msg['bankcard'] = I('yhkh');//卡号，账号
			}
			$this->ajaxReturn($msg);
		}
	}
	
	/**
	 * 修改账号信息时获取性别
	 */
	public function account_info(){
		$where['id'] = I('uid');
		$data['userinfo'] = M('Member')->where($where)->find();
		
		$msg .='<div class="col-xs-2 wdfbwztt fxk">';
		$msg .= '<label class="radio-inline">';
	if($data['userinfo']['gender'] == '1'){
		$msg .= '<input type="radio" checked="checked" name="RadioOptions" value="1">先生';
	}else {
		$msg .= '<input type="radio" name="RadioOptions" value="1">先生';
	}
		$msg .=	'</label><label class="radio-inline">';	
	if($data['userinfo']['gender'] == '2'){
		$msg .=	'<input type="radio" checked="checked" name="RadioOptions" value="2">女士';
	}else{
		$msg .=	'<input type="radio" name="RadioOptions" value="2">女士';
	}	
		$msg .=	'</label><label class="radio-inline">';
	if($data['userinfo']['gender'] == '3'){
		$msg .=	'<input type="radio" checked="checked" name="RadioOptions" value="3">保密';
	}else {
		$msg .=	'<input type="radio" name="RadioOptions" value="3">保密';
	}
		$msg .=	'</label></div>';
		
		echo $msg;
	}
	
	/**
	 * 手机号码认证
	 */
	public function mobileverify(){
		$where['id'] = $this->userid;
		$data['mob'] = M('Member')->where($where)->getField('mobile'); 
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 邮箱认证
	 */
	public function emailverify(){
		$where['id'] = $this->userid;
		$data['email'] = M('Member')->where($where)->getField('email');
		
		$this->assign('data',$data);
		$this->display();
	}
	/*
	 * 验证手机号码
	*/
	public function mobile_verify(){
		$where['userid'] = session('user.id');
		$where['state'] = '1';
		$where['pin'] = I('dbnewmima');
		$result = M('Telmsg')->where($where)->find();
		if($result){
			$msg['data'] = '验证成功！';
			$msg['state'] = '1';
			$map['id'] = session('user.id');
			$map['state'] = '1';
			$data['mobile'] = I('newmima');//保存手机号码
			$data['mobilechk'] = '3';//手机已验证
			$moblie = M('Member')->where($map)->save($data);
		}else{
			$msg['data'] = '验证失败，原因：验证码不正确或者是过期！';
			$msg['state'] = '2';
		}
	
		$this->ajaxReturn($msg);
	}
	
	/*
	 * 验证邮箱
	*/
	public function email_verify(){
		$where['userid'] = session('user.id');
		$where['state'] = '1';
		$where['pin'] = I('dbnewmima');//验证码
		$result = M('Email')->where($where)->find();
		if($result){
			$msg['data'] = '验证成功！';
			$msg['state'] = '1';
			$map['id'] = session('user.id');
			$map['state'] = '1';
			$data['email'] = I('newmima');//保存邮箱
			$data['emailchk'] = '3';//邮箱已验证
			$moblie = M('Member')->where($map)->save($data);
		}else{
			$msg['data'] = '验证失败，原因：验证码不正确或者是过期！';
			$msg['state'] = '2';
		}
	
		$this->ajaxReturn($msg);
	}
	
	/**
	 * 选择省份时获取对应的市
	 */
	public function chengshi(){
		if(empty(I('sfid'))){
			$msg ='<option value="0">请选择</option>';
		}else{
			$where['parentid'] = I('sfid');
			$where['level'] = '2';
			$data['shi'] = M('Region')->where($where)->select();
			foreach ($data['shi'] as $key => $value){
				$msg .= '<option value="'.$value['id'].'">'.$value['shortname'].'</option>';
			}
		}
		echo $msg;
	}
	
	/**
	 * 点击联系人信息修改按钮时获取用户信息
	 */
	public function contact(){
		$where['id'] = I('uid');
		$data['userinfo'] = M('Member')->where($where)->find();
		
		//省
		$msg .='<div class="member_message_left">联系地址：&nbsp;   </div>
				<div class="col-xs-10">
				<div class="col-xs-2 hjuli">
				<select class="form-control sheng" name="zlflste">
				<option value="0">请选择</option>';
		
		$map['level'] = '1';
		$data['province'] = M('Region')->where($map)->select();
		foreach ($data['province'] as $key => $value){
			if($data['userinfo']['province'] == $value['id']){
				$msg .= '<option selected value="'.$value['id'].'">'.$value['shortname'].'</option>';
			}else{
				$msg .= '<option value="'.$value['id'].'">'.$value['shortname'].'</option>';
			}
		}
		
		//市
		$msg .='</select>
				</div>
				<div class="col-xs-2 hjuli">
				<select class="form-control shi" name="zlflst1">
				<option value="0">请选择</option>';
		
	if(!empty($data['userinfo']['province'])){
		$wh['level'] = '2';
		$wh['parentid'] = $data['userinfo']['province'];
		$data['city'] = M('Region')->where($wh)->select();
		foreach ($data['city'] as $key => $value){
			if($data['userinfo']['city'] == $value['id']){
				$msg .= '<option selected value="'.$value['id'].'">'.$value['shortname'].'</option>';
			}else{
				$msg .= '<option value="'.$value['id'].'">'.$value['shortname'].'</option>';
			}
		}
	}
		//详细地址
		$msg .= '</select>
				</div>
				<div class="col-xs-4 hjuli">
				<input type="text" name="lxaddr" class="form-control" placeholder="联系地址" value="'.$data['userinfo']['address'].'"/>
				</div></div>';
		
		echo $msg;
	}
	
	public function truename_edit(){
		$data = I('post.');
		$data['idcardimg'] = implode(',', $data['idcardimg']);
		$data['idcardchk'] = 2;//等待验证
		$re = M('Member')->where($this->_where)->save($data);
		if($re){
			$this->success('修改成功！');
		}else{
			$this->error('修改失败！');
		}
		
	}
	
	/**
	 * 我的消息
	 */
	public function msg_rcv($p=1){
		$where['toid'] = session('user.id');
		$data['count'] = M('Msg')->where($where)->count();
		if(session('zt',I('zt'))){
			$where['s.state'] = session('zt',I('zt'));
			$data['zt'] = session('zt',I('zt'));
		}
		$pagesize = '12';
		$newpage = new \Org\Util\Page($data['count'],$pagesize);//实例化分类页
		if($data['count'] && $data['count']>$pagesize){
			$data['page'] = $newpage->getPage();//数据分页
		}
		$data['msg'] = M('Msg as s')->join('left join qh_member as m ON m.id = s.userid')->field('s.id,s.title,s.sendtime,s.totime,s.data,s.state,m.username')->where($where)->order('s.id desc')->limit(($p-1)*$pagesize,$pagesize)->select();
		foreach ($data['msg'] as $key => $value){
			if($value['usertype'] == '2'){
				$data['msg'][$key]['sender'] = '管理员';
			}else{
				$data['msg'][$key]['sender'] = $value['username'];
			}
		}
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 全选删除我的消息功能
	 */
	public function batch_del(){
		$where['id'] = array('in',I('sid'));
		$del = M('Msg')->where($where)->delete();
		if($del){
			$msg['msg'] = '删除成功！';
			$msg['state'] = '1';
		}else{
			$msg['msg'] = '删除失败！';
			$msg['state'] = '2';
		}
		
		$this->ajaxReturn($msg);
	}
	
	/**
	 * 我的消息，查看修改状态功能
	 */
	public function view_state(){
		$model = M('Msg');
		$where['id'] = I('sid');
		$sql = $model->where($where)->find();
		if($sql['state'] == '2'){
			$data['totime'] = time();
			$data['state'] = '1';
			$del = $model->where($where)->save($data);
			if($del){
				$msg['msg'] = '状态保存成功！';
				$msg['state'] = '1';
			}
		}else {
			$msg['state'] = '2';
		}
	
		$this->ajaxReturn($msg);
	}
	
	/**
	 * 查看站内信
	 */
	public function msg_show($uid){
		if($uid){
			$m = M('msg');
			$where['toid'] = $this->userid;
			$where['uid'] = $uid;
			$data['data']  = $m->where($where)->find();
			if($data['data']){
				$save['totime'] = time();
				$m->where($where)->save($save);
				$this->assign('data',$data);
				$this->display();
			} else {
				return $this->error('该记录不存在！');
			}
		} else {
			return $this->error('参数错误！');
		}
		
	}
	
	/**
	 * 删除站内信
	 */
	public function msg_del($uid=0){
		if($uid){
			$m = M('msg');
			$where['toid'] = $this->userid;
			$where['uid'] = $uid;
			$num = $m->where($where)->delete();
			return $this->success('已删除！',U('msg_rcv'));
		} else {
			return $this->error('参数错误！');
		}
		
	}
	
	/**
	 * 用户查看个人修改
	 */
	public function showme(){//个人资料修改
		$m = M('member');
		$data = $m->where($this->_where)->find();
		$name = $m->where(array('id'=>$data['aid']))->find();
		$data['aid'] = $name['name'];
		$arr = explode(',', $data['idcardimg']);
		if(isset($arr[0])){$data['img1']=$arr[0];}else{$data['img1']='';}
		if(isset($arr[1])){$data['img2']=$arr[1];}else{$data['img2']='';}
		if(isset($arr[2])){$data['img3']=$arr[2];}else{$data['img3']='';}
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 用户修改个人密码
	 */
	public function repass(){//修改密码
		if(IS_POST){
			$post = I('post.');
			if(!isset($post['password']) && !$post['password']){
				$this->error('原密码不能为空!');
			}
			if(!isset($post['password1']) && !$post['password1']){
				$this->error('新密码1不能为空!');
			}
			if(!isset($post['password2']) && !$post['password2']){
				$this->error('新密码2不能为空!');
			}
			if($post['password1']!==$post['password2']){
				$this->error('两次密码输入不一致!');
			}
			$m = M('member');
			$re = $m->field('password')->where($this->_where)->find();
			if($re['password']==md5(md5($post['password']))){
				$re1 = $m->where($this->_where)->save(['password'=>md5(md5($post['password1']))]);
				if($re1){
					return $this->success('密码修改成功!请重新登陆！',U('/Index/User/logout'));	
				} else {
					return $this->error('原密码跟新密码一致，修改失败!');
				}
			} else {
				return $this->error('原密码不正确!');
			}
		}
		return $this->display();
	}
	
	/**
	 * 用户修改支付密码
	 */
	public function repaypass(){//修改密码
		$m = M('member');
		$data['user'] = $m->field('paypassword')->where($this->_where)->find();
		if(IS_POST){
			$post = I('post.');
			$password = I('post.paypassword','');
			if(!isset($post['password1']) && !$post['password1']){
				$this->error('新密码1不能为空!');
			}
			if(!isset($post['password2']) && !$post['password2']){
				$this->error('新密码2不能为空!');
			}
			if($post['password1']!==$post['password2']){
				$this->error('两次密码输入不一致!');
			}
			
			if($data['user']['paypassword']=='' || $data['user']['paypassword']==md5(md5($password))){//原密码为空或者密码校验通过
				$re1 = $m->where($this->_where)->save(['paypassword'=>md5(md5($post['password1']))]);
				if($re1){
					return $this->success('支付密码修改成功!');
				} else {
					return $this->error('原支付密码跟新密码一致，修改失败!');
				}
			} else {
				return $this->error('原支付密码不正确!');
			}
		}
		$this->assign('data',$data);
		return $this->display();
	}
	
	/**
	 * 用户收藏夹列表
	 */
	public function favorite($tmpa='',$page=1){//产品收藏夹
		$m = M('favorite');
		$re = $m->where($this->_where)->find();
		$where['id'] = array('in',explode(',',$re['data']));
		if($tmpa){
			$where['tmpa'] = $tmpa;
		}
		$count = M('Item')->where($where)->count(); // 查询满足要求的总记录数
		$data['page'] = $this->get_page($count,$page,$rows);
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data ['item_data'] = M('Item')->where($where)->page($this->page,$this->rows)->select();
		$this->assign('data',$data);
		$this->assign('tmpa',$tmpa);
		$this->display();
	}
	
	/**
	 * 用户移除收藏
	 */
	public function remove_favorite($item = ''){
		if(empty($item)){
			$item = I('param.item');
		}
		 if($item){
			$m = M('favorite');
			$re = $m->where($this->_where)->find();
			if($re){
				$data = str_replace(','.$item, '', $re['data']);
				$data = str_replace($item, '', $data);
				$m->where($this->_where)->save(['data'=>$data]);
			}
		} 
		if(IS_AJAX){
			$this->ajaxReturn(['success'=>true]);
		} else {
			$this->success('取消收藏成功！');	
		}
	}
	
	
	//发送验手机、邮箱证码
	public function sendmsg(){
		$name = I('post.name');
		$phone = I('post.val');
		$member = M('Member');
		if($name == 'mobile_code'){
			$where['id'] = $this->userid;
			$res_data = $member->where($where)->find();
			if($res_data['mobilechk']=='3' && $res_data['mobile'] == $phone){
				$re = array('msg'=>'手机已通过认证，无须重复认证！');
				$this->ajaxReturn($re);
				exit;
			}
			$count = $member->where(['mobile'=>$phone,'mobilechk'=>'3'])->count();
			if($count){
				$re = array('msg'=>'该手机号码已在其他账号通过认证，请更换手机号码进行登记！');
				$this->ajaxReturn($re);
				exit;
			}
			$pin = new \Common\Lib\Notice();
    		$re = $pin->send_pin('telmsg',$phone);
    		if($re['success'] =='1'){
    			$re['msg'] = ' 发送成功！';
    		}else{
    			$re['msg'] = $re['errorMsg'];
    		}
			$this->ajaxReturn($re);
		}else if($name == 'email_code'){
			$where['id'] = $this->userid;
			$res_data = $member->where($where)->find();
			if($res_data['emailchk']=='3' && $res_data['email'] == $phone){
				$re = array('msg'=>'邮箱已通过认证，无须重复认证！');
				$this->ajaxReturn($re);
				exit;
			}
			$count = $member->where(['email'=>$phone,'emailchk'=>'3'])->count();//如果已经被别人认证过
			if($count){
				$re = array('msg'=>'该邮箱号码已在其他账号通过验证，请更换邮箱号码进行登记！');
				$this->ajaxReturn($re);
				exit;
			}
			$pin = new \Common\Lib\Notice();
    		$re = $pin->send_pin('email',$phone);
			if($re['success'] =='1'){
    			$re['msg'] = ' 发送成功！';
    		}else{
    			$re['msg'] = $re['errorMsg'];
    		}
			$this->ajaxReturn($re);
		}
	}
	
	public function remove_favorite_all(){
		$item = I('post.add');
		foreach ($item as $k => $v){
			 if($v){
				$m = M('favorite');
				$re = $m->where($this->_where)->find();
				if($re){
					$data = str_replace(','.$item, '', $re['data']);
					$data = str_replace($item, '', $data);
					$m->where($this->_where)->save(['data'=>$data]);
				}
			} 
		}
		$this->success('取消收藏成功！');
	}
	
	
	public function uploadsImg(){
		/* import('ORG.Net.UploadFile');
		$upload = new \UploadFile();// 实例化上传类 */
		$upload = new \Org\Net\UploadFile();
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$savePath = '.'.UPLOAD_DIR.'userimg/'.date('Ymd').'/';
		if (!is_dir($savePath)){
			if (!mkdir($savePath,0777,true)){
				$this->ajaxReturn('创建文件夹'.$savePath.'失败,请检查uploads文件夹权限是否为777');
			}
		}
		$upload->savePath =$savePath;  // 设置附件上传目录
		 
		if(!$upload->upload()) {// 上传错误提示错误信息
			$info=$upload->getErrorMsg();
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
		}
		if (!is_array($info)){
			$this->ajaxReturn($info);
		}else{
			/* import('ORG.Net.Image');
			$img=new \Image($info[0]['savepath'].$info[0]['savename'],1,'320','240',$info[0]['savepath'].'s_'.$info[0]['savename']); */
			$img = new \Org\Net\Image($info[0]['savepath'].$info[0]['savename'],1,'320','240',$info[0]['savepath'].'s_'.$info[0]['savename']);
			$img->outimage();
			$picRealPath=J(__ROOT__.'/'.$img->getImageName());
			$this->ajaxReturn($picRealPath);
		}
	}
	
	public function ajaxReturn($data,$url='',$type="1"){
		$ajax['data']=$data;
		if (!empty($url)){
			if ($type=="2"){
				$url=$url;
			}else{
				$url=__APP__.'/'.$url.'/right';
			}
		}
		$ajax['url']=$url;
		die(json_encode($ajax));
	}
	
	public function cutImg(){
		$dfile = '.'.UPLOAD_DIR.'userimg/'.date('Ymd').'/';
		if(!is_dir($dfile)){
			if (!mkdir($dfile,0777,true)){
				$this->ajaxReturn('创建文件夹'.$dfile.'失败,请检查uploads文件夹权限是否为777');
			}
		}
		$sfile=$_REQUEST['filename'];
		$sfile=str_replace(__ROOT__, '.', $sfile);
		$file_tmp=explode('/', $sfile);
		$file=$file_tmp[count($file_tmp)-1];
		$x=$_REQUEST['x']?$_REQUEST['x']:0;
		$y=$_REQUEST['y']?$_REQUEST['y']:10;
		$x1=$_REQUEST['x1']?$_REQUEST['x1']:219;
		$y1=$_REQUEST['y1']?$_REQUEST['y1']:229;
		$width=$_REQUEST['w']?$_REQUEST['w']:219;
		$height=$_REQUEST['h']?$_REQUEST['h']:219;
		//import('ORG.Net.Image');
		$value1=$x.','.$y;
		$value2=$width.','.$height;
		$dfile=$dfile.'small_'.$file;
		//$img=new \Image($sfile,2,$value1,$value2,$dfile);
		$img = new \Org\Net\Image('.'.$sfile,2,$value1,$value2,$dfile);
		$img->outimage();
		$filename=$img->getImageName();
		$name = ltrim($filename, ".");
		$this->save_img($name);
		$filename=J(__ROOT__.'/'.$filename);
		$this->ajaxReturn($filename);
	}
	
	
	public function save_img($filename){
		M('Member')->where(array('id'=>$this->userid))->save(array('img'=>$filename));
	}
	
	
}