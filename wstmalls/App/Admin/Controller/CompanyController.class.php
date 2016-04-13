<?php
namespace Admin\Controller;
class CompanyController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'company';//数据库
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
		if(isset($search['province1'])){$this->_where['province1'] = $search['province1'];}
		if(isset($search['province2'])){$this->_where['province2'] = $search['province2'];}

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
			$value['name'] = $this->I_chk('post.name','企业名称',0,0);
			$value['frname'] = $this->I_chk('post.frname','法人姓名',0,0);
			$value['frsex'] = $this->I_chk('post.frsex','法人性别',0,0);
			$value['yyzhizhao'] = $this->I_chk('post.yyzhizhao','营业执照',0,0);
			$value['province1'] = $this->I_chk('post.province1','省份',0,0);
			$value['city1'] = $this->I_chk('post.city1','城市',0,0);
			$value['regaddress'] = $this->I_chk('post.regaddress','注册地址',0,0);
			$value['province2'] = $this->I_chk('post.province2','省份',0,0);
			$value['city2'] = $this->I_chk('post.city2','城市',0,0);
			$value['address'] = $this->I_chk('post.address','联系地址',0,0);
			$value['regmoney'] = $this->I_chk('post.regmoney','注册资本(万元)',0,0);
			$value['business'] = $this->I_chk('post.business','经营范围',0,0);
			$value['bank'] = $this->I_chk('post.bank','收款行',0,0);
			$value['bankname'] = $this->I_chk('post.bankname','支行名称',0,0);
			$value['cardname'] = $this->I_chk('post.cardname','收款账户名',0,0);
			$value['card'] = $this->I_chk('post.card','银行卡号',0,0);
			$value['state'] = $this->I_chk('post.state','验证状态',0,0);
			$value['reason'] = $this->I_chk('post.reason','验证原因',0,0);

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
			$value['name'] = $this->I_chk('post.name','企业名称',0,0);
			$value['frname'] = $this->I_chk('post.frname','法人姓名',0,0);
			$value['frsex'] = $this->I_chk('post.frsex','法人性别',0,0);
			$value['yyzhizhao'] = $this->I_chk('post.yyzhizhao','营业执照',0,0);
			$value['province1'] = $this->I_chk('post.province1','省份',0,0);
			$value['city1'] = $this->I_chk('post.city1','城市',0,0);
			$value['regaddress'] = $this->I_chk('post.regaddress','注册地址',0,0);
			$value['province2'] = $this->I_chk('post.province2','省份',0,0);
			$value['city2'] = $this->I_chk('post.city2','城市',0,0);
			$value['address'] = $this->I_chk('post.address','联系地址',0,0);
			$value['regmoney'] = $this->I_chk('post.regmoney','注册资本(万元)',0,0);
			$value['business'] = $this->I_chk('post.business','经营范围',0,0);
			$value['bank'] = $this->I_chk('post.bank','收款行',0,0);
			$value['bankname'] = $this->I_chk('post.bankname','支行名称',0,0);
			$value['cardname'] = $this->I_chk('post.cardname','收款账户名',0,0);
			$value['card'] = $this->I_chk('post.card','银行卡号',0,0);
			$value['state'] = $this->I_chk('post.state','验证状态',0,0);
			$value['reason'] = $this->I_chk('post.reason','验证原因',0,0);

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