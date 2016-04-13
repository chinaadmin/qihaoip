<?php
namespace Admin\Controller;
class ArticlesController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'articles';//数据库
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
	 * 通过文章类型选择
	 * @param number $id
	 */
	public function get_select($id=0,$find=''){
		$data = '    <option value ="0">未选择</option>';
		if($id){
			$where['upid'] = $id;
			$where['state'] = '1';
			$re = M('Articles')->field('id,name')->where($where)->order('sort desc,id desc')->select();
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
		}
		echo $data;
	}
	
	/**
	 * 通过省市区选择
	 * @param number $id
	 */
	public function get_city($id=0,$find=''){
		$data = '    <option value ="0">未选择</option>';
		if($id){
			$where['parentid'] = $id;
			$where['state'] = '1';
			$re = M('Region')->field('id,areaname')->where($where)->order('sort desc,id desc')->select();
			if($re){
				foreach ($re as $row){
					if($find && $find==$row['id']){
						$data .= '
	                <option value="'.$row['id'].'" selected="selected">'.$row['areaname'].'</option>';
					} else {
						$data .= '
	                <option value="'.$row['id'].'" >'.$row['areaname'].'</option>';
					}
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
		if(isset($search['upid'])){$this->_where['upid'] = $search['upid'];}

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
			if (I('twoid')){
				$value['upid'] = $this->I_chk('post.twoid','二级分类',0,0);
				$value['level'] = '3';
			}elseif (I('upid')){
				$value['upid'] = $this->I_chk('post.upid','上级分类',0,0);
				$value['level'] = '2';
			}else {
				$value['upid'] = '0';
				$value['level'] = '1';
			}
			$value['name'] = $this->I_chk('post.name','分类名称',0,0);
			$value['ename'] = $this->I_chk('post.ename','分类英文名称',0,0);
			/* $value['province'] = $this->I_chk('post.proid','省份名称',0,0);
			$value['city'] = $this->I_chk('post.cityid','城市名称',0,0); */
			$value['indexstyle'] = $this->I_chk('post.indexstyle','首页式样',0,0);
			$value['liststyle'] = $this->I_chk('post.liststyle','列表式样',0,0);
			$value['title'] = $this->I_chk('post.title','标题',0,0);
			$value['keywords'] = $this->I_chk('post.keywords','关键词',0,0);
			$value['description'] = $this->I_chk('post.description','描述',0,0);
			$value['about'] = $this->I_chk('post.about','说明',0,0);
			$value['sort'] = $this->I_chk('post.sort','排序',0,0);

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
			if (I('twoid')){
				$value['upid'] = $this->I_chk('post.twoid','二级分类',0,0);
				$value['level'] = '3';
			}elseif (I('upid')){
				$value['upid'] = $this->I_chk('post.upid','上级分类',0,0);
				$value['level'] = '2';
			}else {
				$value['upid'] = '0';
				$value['level'] = '1';
			}
			$value['name'] = $this->I_chk('post.name','分类名称',0,0);
			$value['ename'] = $this->I_chk('post.ename','分类英文名称',0,0);
			/* $value['province'] = $this->I_chk('post.proid','省份名称',0,0);
			$value['city'] = $this->I_chk('post.cityid','城市名称',0,0); */
			$value['indexstyle'] = $this->I_chk('post.indexstyle','首页式样',0,0);
			$value['liststyle'] = $this->I_chk('post.liststyle','列表式样',0,0);
			$value['title'] = $this->I_chk('post.title','标题',0,0);
			$value['keywords'] = $this->I_chk('post.keywords','关键词',0,0);
			$value['description'] = $this->I_chk('post.description','描述',0,0);
			$value['about'] = $this->I_chk('post.about','说明',0,0);
			$value['sort'] = $this->I_chk('post.sort','排序',0,0);

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
		//获取对应的分类信息
		if($data['upid']){
			$where['id'] = $data['upid'];
			$cate = M($this->_db)->field('id,name,upid')->where($where)->find();
			if($cate['upid']){
				$data['scate'] = $cate;
				$wh['id'] = $data['scate']['upid'];
				$data['pcate'] = M($this->_db)->field('id,name,upid')->where($wh)->find();
			}else{
				$data['pcate'] = $cate;
			}
		}else{
			$where['id'] = $data['id'];
			$data['pcate'] = '0';
		}
		//获取对应的省市信息
		$region = M('Region');
		if($data['province']){
			$data['sheng'] = $region->field('id,areaname,parentid')->where(array('id'=>$data['province']))->find();
		}
		if($data['city']){
			$data['shi'] = $region->field('id,areaname,parentid')->where(array('id'=>$data['city']))->find();
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