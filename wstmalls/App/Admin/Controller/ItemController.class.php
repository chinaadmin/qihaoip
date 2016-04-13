<?php
namespace Admin\Controller;
class ItemController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'item';//数据库
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
		if(isset($search['tmpa'])){$this->_where['tmpa'] = $search['tmpa'];}
		if(isset($search['groupid'])){$this->_where['groupid'] = $search['groupid'];}
		if(isset($search['groupid2'])){$this->_where['groupid2'] = $search['groupid2'];}
		if(isset($search['groupid3'])){$this->_where['groupid3'] = $search['groupid3'];}
		if(isset($search['title'])){$this->_where['title'] = $search['title'];}
		if(isset($search['state'])){$this->_where['state'] = $search['state'];}
		if(isset($search['userid'])){$this->_where['userid'] = $search['userid'];}
		if(isset($search['aid'])){$this->_where['aid'] = $search['aid'];}
		if(isset($search['type'])){$this->_where['type'] = $search['type'];}
		if(isset($search['adddate'])){$this->_where['adddate'] = $search['adddate'];}
		if(isset($search['tmno'])){$this->_where['tmno'] = $search['tmno'];}
		if(isset($search['master'])){$this->_where['master'] = $search['master'];}
		if(isset($search['mastertype'])){$this->_where['mastertype'] = $search['mastertype'];}
		if(isset($search['tmtype'])){$this->_where['tmtype'] = $search['tmtype'];}
		if(isset($search['tmscreening'])){$this->_where['tmscreening'] = $search['tmscreening'];}
		if(isset($search['tmscreening1'])){$this->_where['tmscreening1'] = $search['tmscreening1'];}
		if(isset($search['tmscreening2'])){$this->_where['tmscreening2'] = $search['tmscreening2'];}
		if(isset($search['tmscreening3'])){$this->_where['tmscreening3'] = $search['tmscreening3'];}
		if(isset($search['tmscreening4'])){$this->_where['tmscreening4'] = $search['tmscreening4'];}
		if(isset($search['tuijian'])){$this->_where['tuijian'] = $search['tuijian'];}

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
			$value['tmpa'] = $this->I_chk('post.tmpa','商品类型',0,0);
			$value['groupid'] = $this->I_chk('post.groupid','类别',0,0);
			$value['groupid2'] = $this->I_chk('post.groupid2','二级分类',0,0);
			$value['groupid3'] = $this->I_chk('post.groupid3','三级分类',0,0);
			$value['title'] = $this->I_chk('post.title','商品名称',0,0);
			$value['keywords'] = $this->I_chk('post.keywords','关键词',0,0);
			$value['description'] = $this->I_chk('post.description','描述',0,0);
			$value['introduce'] = $this->I_chk('post.introduce','商品简介',0,0);
			$value['price'] = $this->I_chk('post.price','商品价格',0,0);
			$value['count'] = $this->I_chk('post.count','库存',0,0);
			$value['views'] = $this->I_chk('post.views','浏览次数',0,0);
			$value['state'] = $this->I_chk('post.state','是否显示',0,0);
			$value['adimg'] = $this->I_chk('post.adimg','广告图片',0,0);
			$value['img'] = $this->I_chk('post.img','商品图片',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人',0,0);
			$value['type'] = $this->I_chk('post.type','商品性质',0,0);
			$value['adddate'] = date('Ymd');
			$value['addtime'] = time();
			$value['tmno'] = $this->I_chk('post.tmno','申请号',0,0);
			$value['master'] = $this->I_chk('post.master','权利人',0,0);
			$value['mastertype'] = $this->I_chk('post.mastertype','权利人类型',0,0);
			$value['tmtype'] = $this->I_chk('post.tmtype','所属类别',0,0);
			$value['tmlimit'] = $this->I_chk('post.tmlimit','服务项目',0,0);
			$value['tmregdate'] = $this->I_chk('post.tmregdate','申请日',0,0);
			$value['tmregstart'] = $this->I_chk('post.tmregstart','注册日',0,0);
			$value['tmregend'] = $this->I_chk('post.tmregend','到期日',0,0);
			$value['tmregarea'] = $this->I_chk('post.tmregarea','商品地区',0,0);
			$value['tmtradeway'] = $this->I_chk('post.tmtradeway','交易方式',0,0);
			$value['singlesale'] = $this->I_chk('post.singlesale','单独转让',0,0);
			$value['tmscreening'] = $this->I_chk('post.tmscreening','首页推荐',0,0);
			$value['tmscreening1'] = $this->I_chk('post.tmscreening1','市场页推荐',0,0);
			$value['tmscreening2'] = $this->I_chk('post.tmscreening2','资讯页推荐',0,0);
			$value['tmscreening3'] = $this->I_chk('post.tmscreening3','商城推荐',0,0);
			$value['tmscreening4'] = $this->I_chk('post.tmscreening4','店铺推荐',0,0);
			$value['tuijian'] = $this->I_chk('post.tuijian','推荐方式',0,0);
			$value['tmcontent'] = $this->I_chk('post.tmcontent','商品内容详情',0,0);

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
			$value['groupid'] = $this->I_chk('post.groupid','类别',0,0);
			$value['groupid2'] = $this->I_chk('post.groupid2','二级分类',0,0);
			$value['groupid3'] = $this->I_chk('post.groupid3','三级分类',0,0);
			$value['title'] = $this->I_chk('post.title','商品名称',0,0);
			$value['keywords'] = $this->I_chk('post.keywords','关键词',0,0);
			$value['description'] = $this->I_chk('post.description','描述',0,0);
			$value['introduce'] = $this->I_chk('post.introduce','商品简介',0,0);
			$value['price'] = $this->I_chk('post.price','商品价格',0,0);
			$value['count'] = $this->I_chk('post.count','库存',0,0);
			$value['views'] = $this->I_chk('post.views','浏览次数',0,0);
			$value['state'] = $this->I_chk('post.state','是否显示',0,0);
			$value['adimg'] = $this->I_chk('post.adimg','广告图片',0,0);
			$value['img'] = $this->I_chk('post.img','商品图片',0,0);
			$value['userid'] = $this->I_chk('post.userid','用户ID',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人',0,0);
			$value['type'] = $this->I_chk('post.type','商品性质',0,0);
			$value['addtime'] = time();
			$value['tmno'] = $this->I_chk('post.tmno','申请号',0,0);
			$value['master'] = $this->I_chk('post.master','权利人',0,0);
			$value['mastertype'] = $this->I_chk('post.mastertype','权利人类型',0,0);
			$value['tmtype'] = $this->I_chk('post.tmtype','所属类别',0,0);
			$value['tmlimit'] = $this->I_chk('post.tmlimit','服务项目',0,0);
			$value['tmregdate'] = $this->I_chk('post.tmregdate','申请日',0,0);
			$value['tmregstart'] = $this->I_chk('post.tmregstart','注册日',0,0);
			$value['tmregend'] = $this->I_chk('post.tmregend','到期日',0,0);
			$value['tmregarea'] = $this->I_chk('post.tmregarea','商品地区',0,0);
			$value['tmtradeway'] = $this->I_chk('post.tmtradeway','交易方式',0,0);
			$value['singlesale'] = $this->I_chk('post.singlesale','单独转让',0,0);
			$value['tmscreening'] = $this->I_chk('post.tmscreening','首页推荐',0,0);
			$value['tmscreening1'] = $this->I_chk('post.tmscreening1','市场页推荐',0,0);
			$value['tmscreening2'] = $this->I_chk('post.tmscreening2','资讯页推荐',0,0);
			$value['tmscreening3'] = $this->I_chk('post.tmscreening3','商城推荐',0,0);
			$value['tmscreening4'] = $this->I_chk('post.tmscreening4','店铺推荐',0,0);
			$value['tuijian'] = $this->I_chk('post.tuijian','推荐方式',0,0);
			$value['tmcontent'] = $this->I_chk('post.tmcontent','商品内容详情',0,0);

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