<?php
namespace Admin\Controller;
class OrderController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'order';//数据库
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
		if(isset($search['uid'])){$this->_where['uid'] = $search['uid'];}
		if(isset($search['parent'])){$this->_where['parent'] = $search['parent'];}
		if(isset($search['payid'])){$this->_where['payid'] = $search['payid'];}
		if(isset($search['type'])){$this->_where['type'] = $search['type'];}
		if(isset($search['seller'])){$this->_where['seller'] = $search['seller'];}
		if(isset($search['aid'])){$this->_where['aid'] = $search['aid'];}
		if(isset($search['buyer'])){$this->_where['buyer'] = $search['buyer'];}
		if(isset($search['htid'])){$this->_where['htid'] = $search['htid'];}
		if(isset($search['srid'])){$this->_where['srid'] = $search['srid'];}
		if(isset($search['itemids'])){$this->_where['itemids'] = $search['itemids'];}
		if(isset($search['price'])){$this->_where['price'] = $search['price'];}
		if(isset($search['fees'])){$this->_where['fees'] = $search['fees'];}
		if(isset($search['amount'])){$this->_where['amount'] = $search['amount'];}
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
			$value['uid'] = $this->I_chk('post.uid','订单号',0,0);
			$value['parent'] = $this->I_chk('post.parent','父类id',0,0);
			$value['seller'] = $this->I_chk('post.seller','卖家',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人id',0,0);
			$value['buyer'] = $this->I_chk('post.buyer','买家',0,0);
			$value['htid'] = $this->I_chk('post.htid','合同主体id',0,0);
			$value['srid'] = $this->I_chk('post.srid','受让主体id',0,0);
			$value['itemids'] = $this->I_chk('post.itemids','商品id',0,0);
			$value['price'] = $this->I_chk('post.price','售价',0,0);
			$value['fees'] = $this->I_chk('post.fees','手续费',0,0);
			$value['date'] = $this->I_chk('post.date','订单日期',0,0);
			$value['datetime'] = $this->I_chk('post.datetime','订单时间',0,0);
			$value['updatetime'] = $this->I_chk('post.updatetime','更新时间',0,0);
			$value['about'] = $this->I_chk('post.about','订单留言',0,0);
			$value['state'] = $this->I_chk('post.state','订单状态',0,0);

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
			$value['uid'] = $this->I_chk('post.uid','订单号',0,0);
			$value['parent'] = $this->I_chk('post.parent','父类id',0,0);
			$value['seller'] = $this->I_chk('post.seller','卖家',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人id',0,0);
			$value['buyer'] = $this->I_chk('post.buyer','买家',0,0);
			$value['htid'] = $this->I_chk('post.htid','合同主体id',0,0);
			$value['srid'] = $this->I_chk('post.srid','受让主体id',0,0);
			$value['itemids'] = $this->I_chk('post.itemids','商品id',0,0);
			$value['price'] = $this->I_chk('post.price','售价',0,0);
			$value['fees'] = $this->I_chk('post.fees','手续费',0,0);
			$value['amount'] = $this->I_chk('post.amount','总计',0,0);
			$value['date'] = $this->I_chk('post.date','订单日期',0,0);
			$value['datetime'] = $this->I_chk('post.datetime','订单时间',0,0);
			$value['updatetime'] = $this->I_chk('post.updatetime','更新时间',0,0);
			$value['about'] = $this->I_chk('post.about','订单留言',0,0);
			$value['state'] = $this->I_chk('post.state','订单状态',0,0);

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