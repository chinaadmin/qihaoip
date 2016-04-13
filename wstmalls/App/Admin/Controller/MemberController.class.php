<?php
namespace Admin\Controller;
class MemberController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'member';//数据库
	private $_name = '';
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){
		parent::_initialize();
		$this->_name = MODULE_NAME.'-'.CONTROLLER_NAME;
	}
	
	/***
	 * 显示默认首页
	 */
	public function index(){
		$this->admin_index();
	}
	
	/***
	 * 显示后台默认首页
	 */
	public function admin_index(){
		if(session('?search-'.$this->_name)){
			session('search-'.$this->_name,null);
		}
		$this->display();
	}
	
	/***
	 * 当前模块，控制器和方法名字
	 */
	public function this_name(){
		echo MODULE_NAME.'/'.CONTROLLER_NAME."/".ACTION_NAME;
	}
	
	/***
	 * 后台根据id查找一条数据
	 */
	public function admin_show($id){
		$db = M($this->_db);//无须使用模型
		$this->_where['id'] = $id;
		$data = $db->where($this->_where)->find();
		$this->assign('data',$data);
		$this->display();
	}
	
	/***
	 * 显示数据数组
	 * 跟查询条件有关
	 * 查询条件跟session.search有关
	 */
	public function admin_ShowList(){
		if(IS_POST){
			if(I('post.cleanSearch',0)){
				session('search-'.$this->_name,null);
				$re['success'] = TRUE;
				return $this->ajaxReturn($re);
			} else {
				$post = I('post.');
				if(is_array($post) && count($post)){
					foreach ($post as $k=>$v){
						if(!$v){//空数据过滤
							unset($post[$k]);
						}
					}
				}
				session('search-'.$this->_name,array_merge($post,$this->_where));
			}
		}
		$search = session('search-'.$this->_name);
		if(isset($search['id'])){$this->_where['id'] = $search['id'];}
		if(isset($search['ugroup'])){$this->_where['ugroup'] = $search['ugroup'];}
		if(isset($search['admin'])){$this->_where['admin'] = $search['admin'];}
		if(isset($search['adminord'])){$this->_where['adminord'] = $search['adminord'];}
		if(isset($search['username'])){$this->_where['username'] = $search['username'];}
		if(isset($search['email'])){$this->_where['email'] = $search['email'];}
		if(isset($search['mobile'])){$this->_where['mobile'] = $search['mobile'];}
		if(isset($search['tel'])){$this->_where['tel'] = $search['tel'];}
		if(isset($search['webname'])){$this->_where['webname'] = $search['webname'];}
		if(isset($search['aid'])){$this->_where['aid'] = $search['aid'];}
		if(isset($search['qq'])){$this->_where['qq'] = $search['qq'];}
		if(isset($search['weixin'])){$this->_where['weixin'] = $search['weixin'];}
		if(isset($search['name'])){$this->_where['name'] = $search['name'];}
		if(isset($search['about'])){$this->_where['about'] = $search['about'];}
		if(isset($search['province'])){$this->_where['province'] = $search['province'];}
		if(isset($search['idcard'])){$this->_where['idcard'] = $search['idcard'];}
		if(isset($search['emailchk'])){$this->_where['emailchk'] = $search['emailchk'];}
		if(isset($search['mobilechk'])){$this->_where['mobilechk'] = $search['mobilechk'];}
		if(isset($search['idcardchk'])){$this->_where['idcardchk'] = $search['idcardchk'];}
		if(isset($search['bankcardchk'])){$this->_where['bankcardchk'] = $search['bankcardchk'];}
		if(isset($search['state'])){$this->_where['state'] = $search['state'];}

		$page = I('get.page',1);
		$rows = I('get.rows',20);
		$db = M($this->_db);//无须使用模型
		$data['total'] = $db->where($this->_where)->count();
		$data['rows'] = $db->where($this->_where)->order('id desc')->page($page,$rows)->select();
		$data['page'] = $this->admin_page($data['total'],$page,$rows);
		$this->assign('search',$search);
		$this->assign('data',$data);
		$this->display();
	}
	
	/***
	 * 后台添加一条数据
	 */
	public function admin_add(){
		$msg = '';
		if(IS_POST){
			$db = D($this->_db);//使用模型验证数据
			$value['ugroup'] = $this->I_chk('post.ugroup','用户组',0,0);
			$value['admin'] = $this->I_chk('post.admin','管理组',0,0);
			$value['adminord'] = $this->I_chk('post.adminord','管理员排序',0,0);
			$value['username'] = $this->I_chk('post.username','用户账号',0,0);
			$value['email'] = $this->I_chk('post.email','邮箱',0,0);
			$value['mobile'] = $this->I_chk('post.mobile','手机号',0,0);
			$value['tel'] = $this->I_chk('post.tel','电话号码',0,0);
			$value['webname'] = $this->I_chk('post.webname','昵称',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人',0,0);
			$value['qq'] = $this->I_chk('post.qq','qq号码',0,0);
			$value['weixin'] = $this->I_chk('post.weixin','微信账号',0,0);
			$value['name'] = $this->I_chk('post.name','姓名',0,0);
			$value['about'] = $this->I_chk('post.about','个人简介',0,255);
			$value['province'] = $this->I_chk('post.province','省份',0,0);
			$value['city'] = $this->I_chk('post.city','城市',0,0);
			$value['address'] = $this->I_chk('post.address','地址',0,0);
			$value['bank'] = $this->I_chk('post.bank','归属银行',0,0);
			$value['bankcard'] = $this->I_chk('post.bankcard','银行卡号',0,0);
			$value['idcard'] = $this->I_chk('post.idcard','身份证号',0,0);
			$value['idcardimg'] = $this->I_chk('post.idcardimg','身份证照片',0,0);
			$value['regip'] = $this->I_chk('post.regip','注册ip',0,0);
			$value['regdate'] = $this->I_chk('post.regdate','注册日期',0,0);
			$value['regtime'] = $this->I_chk('post.regtime','注册时间',0,0);
			$value['jifen'] = $this->I_chk('post.jifen','用户积分',0,0);
			$value['money'] = $this->I_chk('post.money','金额',0,0);
			$value['lockmoney'] = $this->I_chk('post.lockmoney','冻结金额',0,0);
			$value['qmoney'] = $this->I_chk('post.qmoney','七号币',0,0);
			$value['emailchk'] = $this->I_chk('post.emailchk','邮箱验证',0,0);
			$value['mobilechk'] = $this->I_chk('post.mobilechk','手机验证',0,0);
			$value['idcardchk'] = $this->I_chk('post.idcardchk','身份验证',0,0);
			$value['bankcardchk'] = $this->I_chk('post.bankcardchk','银行卡验证',0,0);
			$value['password'] = $this->I_chk('post.password','用户密码',0,0);
			$value['paypassword'] = $this->I_chk('post.paypassword','支付密码',0,0);
			$value['gender'] = $this->I_chk('post.gender','性别',0,0);
			$value['img'] = $this->I_chk('post.img','头像图片',0,0);
			$value['state'] = $this->I_chk('post.state','状态',0,0);

			if(!$this->chk){//如果验证未通过，则返回错误并退出
				$msg = $this->debug;
				$this->assign('msg',$msg);
				return $this->display();
			}
			if($db->create($value)){//通过模型来验证数据
				$state = $db->add();
				if($state){
					$msg = '数据添加成功！请关闭页面或者继续添加数据。';
				} else {
					$msg = '添加失败:无权限或者字段错误。请联系管理员。';
					sql_err($db->getLastSql(),$db->getDbError(),__FILE__,__LINE__);
				}
			} else {
				$msg = '添加失败:'.$db->getError();
				sql_err($db->getLastSql(),$db->getDbError(),__FILE__,__LINE__);
			}
		}
		$this->assign('msg',$msg);
		return $this->display();
	}
	
	/***
	 * 后台编辑一条数据
	 */
	public function admin_edit($id=0){
		$msg = '';
		$this->_where['id'] = $id;
		if(IS_POST){
			$db = D($this->_db);//使用模型验证数据
			$value['ugroup'] = $this->I_chk('post.ugroup','用户组',0,0);
			$value['admin'] = $this->I_chk('post.admin','管理组',0,0);
			$value['adminord'] = $this->I_chk('post.adminord','管理员排序',0,0);
			$value['username'] = $this->I_chk('post.username','用户账号',0,0);
			$value['email'] = $this->I_chk('post.email','邮箱',0,0);
			$value['mobile'] = $this->I_chk('post.mobile','手机号',0,0);
			$value['tel'] = $this->I_chk('post.tel','电话号码',0,0);
			$value['webname'] = $this->I_chk('post.webname','昵称',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人',0,0);
			$value['qq'] = $this->I_chk('post.qq','qq号码',0,0);
			$value['weixin'] = $this->I_chk('post.weixin','微信账号',0,0);
			$value['name'] = $this->I_chk('post.name','姓名',0,0);
			$value['about'] = $this->I_chk('post.about','个人简介',0,255);
			$value['province'] = $this->I_chk('post.province','省份',0,0);
			$value['city'] = $this->I_chk('post.city','城市',0,0);
			$value['address'] = $this->I_chk('post.address','地址',0,0);
			$value['bank'] = $this->I_chk('post.bank','归属银行',0,0);
			$value['bankcard'] = $this->I_chk('post.bankcard','银行卡号',0,0);
			$value['idcard'] = $this->I_chk('post.idcard','身份证号',0,0);
			$value['idcardimg'] = $this->I_chk('post.idcardimg','身份证照片',0,0);
			$value['regip'] = $this->I_chk('post.regip','注册ip',0,0);
			$value['regdate'] = $this->I_chk('post.regdate','注册日期',0,0);
			$value['regtime'] = $this->I_chk('post.regtime','注册时间',0,0);
			$value['jifen'] = $this->I_chk('post.jifen','用户积分',0,0);
			$value['money'] = $this->I_chk('post.money','金额',0,0);
			$value['lockmoney'] = $this->I_chk('post.lockmoney','冻结金额',0,0);
			$value['qmoney'] = $this->I_chk('post.qmoney','七号币',0,0);
			$value['emailchk'] = $this->I_chk('post.emailchk','邮箱验证',0,0);
			$value['mobilechk'] = $this->I_chk('post.mobilechk','手机验证',0,0);
			$value['idcardchk'] = $this->I_chk('post.idcardchk','身份验证',0,0);
			$value['bankcardchk'] = $this->I_chk('post.bankcardchk','银行卡验证',0,0);
			$value['gender'] = $this->I_chk('post.gender','性别',0,0);
			$value['img'] = $this->I_chk('post.img','头像图片',0,0);
			$value['state'] = $this->I_chk('post.state','状态',0,0);

			if(!$this->chk){//如果验证未通过，则返回错误并退出
				$msg = $this->debug;
				$this->assign('msg',$msg);
				return $this->display();
			}
			if($db->create($value)){//通过模型来验证数据
				$state = $db->where($this->_where)->save();
				if($state){
					$msg = '编辑成功！';
				} else {
					$msg = '编辑失败:数据不存在或者并未发生更改。请联系管理员。';;
					sql_err($db->getLastSql(),$db->getDbError(),__FILE__,__LINE__);
				}
			} else {
				$msg = '编辑失败:'.$db->getError();
				sql_err($db->getLastSql(),$db->getDbError(),__FILE__,__LINE__);
			}

		}
		$data = M($this->_db)->where($this->_where)->find();
		$this->assign('msg',$msg);
		$this->assign('data',$data);
		return $this->display();
		
	}
	
	/***
	 * 后台根据id删除数据
	 */
	public function admin_del($id=0){
		$db = M($this->_db);//无须使用模型
		$this->_where['id'] = $id;
		$state = $db->where($this->_where)->delete();
		if($state){
			$re = array('success'=>TRUE);
		} else {
			$re = array('success'=>FALSE,'errorMsg'=>'删除失败！无权限或者数据不存在。请联系管理员。');
			sql_err($db->getLastSql(),$db->getDbError(),__FILE__,__LINE__);
		}
		$this->ajaxReturn($re);
	}
}