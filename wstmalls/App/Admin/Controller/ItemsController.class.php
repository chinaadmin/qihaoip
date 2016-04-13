<?php
namespace Admin\Controller;
class ItemsController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'items';//数据库
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
	
	/**
	 * 通过类型选择
	 * @param number $id
	 */
	public function get_select($tmpa=0,$id=0,$find=''){
		$data = '    <option value ="0">未选择</option>';
		if($tmpa){
			$where['tmpa'] = $tmpa;
		}
		$where['parentid'] = $id;
		$where['state'] = '1';
		$re = M('items')->field('id,name')->where($where)->order('sort desc,id desc')->select();
		if($re){
			foreach ($re as $row){
				if($find && $find==$row['id']){
					$data .= '
                <option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
				} else {
					$data .= '
                <option value="'.$row['id'].'" >'.$row['name'].'</option>';
				}
			}
		}
		echo $data;
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
		if(isset($search['tmpa'])){$this->_where['tmpa'] = $search['tmpa'];}
		if(isset($search['parentid'])){$this->_where['parentid'] = $search['parentid'];}
		if(isset($search['name'])){$this->_where['name'] = $search['name'];}
		if(isset($search['state'])){$this->_where['state'] = $search['state'];}
		if(isset($search['level'])){$this->_where['level'] = $search['level'];}
		if(isset($search['groupid'])){$this->_where['level'] = array('egt','2');}
		if(isset($search['groupid2'])){$this->_where['level'] = array('egt','3');}
		$page = I('get.page',1);
		$rows = I('get.rows',20);
		$db = M($this->_db);//无须使用模型
		$data['total'] = $db->where($this->_where)->count();
		$data['rows'] = $db->where($this->_where)->order('id desc')->page($page,$rows)->select();
		foreach ($data['rows'] as $key => $value){
				$where['id'] = $value['parentid'];
				$cate =  $db->where($where)->find();
			if($cate['parentid']){
				$data['rows'][$key]['scate'] = $cate;
				$wh['id'] = $data['rows'][$key]['scate']['parentid'];
				$data['rows'][$key]['pcate'] = $db->where($wh)->find();
			}else{
				$data['rows'][$key]['pcate'] =  $db->where($where)->find();
			}
		}
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
			$value['tmpa'] = $this->I_chk('post.tmpa','商品类型',0,0);
			if(I('post.parentid1')){
				$value['parentid'] = $this->I_chk('post.parentid1','上级ID',0,0);
			}else{
				$value['parentid'] = $this->I_chk('post.parentid','上级ID',0,0);
			}
			$value['name'] = $this->I_chk('post.name','类别名称',0,0);
			$value['about'] = $this->I_chk('post.about','类别说明',0,0);
			$value['level'] = $this->I_chk('post.level','级别',0,0);
			$value['sort'] = $this->I_chk('post.sort','排序',0,0);
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
			$value['tmpa'] = $this->I_chk('post.tmpa','商品类型',0,0);
			if(I('post.parentid1')){
				$value['parentid'] = $this->I_chk('post.parentid1','上级ID',0,0);
			}else{
				$value['parentid'] = $this->I_chk('post.parentid','上级ID',0,0);
			}
			$value['name'] = $this->I_chk('post.name','类别名称',0,0);
			$value['about'] = $this->I_chk('post.about','类别说明',0,0);
			$value['level'] = $this->I_chk('post.level','级别',0,0);
			$value['sort'] = $this->I_chk('post.sort','排序',0,0);
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
		$where['id'] = $data['parentid'];
		$cate = M($this->_db)->where($where)->find();
		if($cate['parentid']){
			$data['scate'] = $cate;
			$wh['id'] = $data['scate']['parentid'];
			$data['pcate'] = M($this->_db)->where($wh)->find();
		}else {
			$data['pcate'] = '0';
		}
		//print_r($data);
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