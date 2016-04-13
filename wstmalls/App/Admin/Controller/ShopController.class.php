<?php
namespace Admin\Controller;
class ShopController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'shop';//数据库
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
		if(isset($search['name'])){$this->_where['name'] = $search['name'];}
		if(isset($search['qyname'])){$this->_where['qyname'] = $search['qyname'];}
		if(isset($search['person'])){$this->_where['person'] = $search['person'];}
		if(isset($search['template'])){$this->_where['template'] = $search['template'];}
		if(isset($search['province'])){$this->_where['province'] = $search['province'];}
		if(isset($search['aid'])){$this->_where['aid'] = $search['aid'];}
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
			$value['name'] = $this->I_chk('post.name','商城名称',0,0);
			$value['title'] = $this->I_chk('post.title','SEO标题',0,0);
			$value['keywords'] = $this->I_chk('post.keywords','SEO关键词',0,0);
			$value['description'] = $this->I_chk('post.description','SEO描述',0,0);
			$value['content'] = $this->I_chk('post.content','商城简介',0,0);
			$value['logo'] = $this->I_chk('post.logo','商城logo',0,0);
			$value['img'] = $this->I_chk('post.img','商城形象图',0,0);
			$value['qyname'] = $this->I_chk('post.qyname','企业名',0,0);
			$value['about'] = $this->I_chk('post.about','企业简介',0,0);
			$value['honor'] = $this->I_chk('post.honor','荣誉资质',0,0);
			$value['person'] = $this->I_chk('post.person','联系人姓名',0,0);
			$value['chkstate'] = $this->I_chk('post.chkstate','用户确认状态',0,0);
			$value['kfinfo'] = $this->I_chk('post.kfinfo','客服信息',0,0);
			$value['worktime'] = $this->I_chk('post.worktime','工作时间',0,0);
			$value['showphone'] = $this->I_chk('post.showphone','是否显示电话',0,0);
			$value['showtel'] = $this->I_chk('post.showtel','是否显示座机',0,0);
			$value['showtm'] = $this->I_chk('post.showtm','是否显示商标模块',0,0);
			$value['showpa'] = $this->I_chk('post.showpa','是否显示专利模块',0,0);
			$value['showtj'] = $this->I_chk('post.showtj','是否显示特别推荐模块',0,0);
			$value['template'] = $this->I_chk('post.template','商城模板',0,0);
			$value['phone'] = $this->I_chk('post.phone','手机号码',0,0);
			$value['tel'] = $this->I_chk('post.tel','电话号码',0,0);
			$value['email'] = $this->I_chk('post.email','邮箱',0,0);
			$value['qq'] = $this->I_chk('post.qq','qq',0,0);
			$value['weixin'] = $this->I_chk('post.weixin','微信',0,0);
			$value['province'] = $this->I_chk('post.province','省份',0,0);
			$value['city'] = $this->I_chk('post.city','城市',0,0);
			$value['address'] = $this->I_chk('post.address','联系地址',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人id',0,0);
			$value['tuijian'] = $this->I_chk('post.tuijian','商城推荐',0,0);
			$value['sort'] = $this->I_chk('post.sort','商城排序',0,4);
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
			$value['name'] = $this->I_chk('post.name','商城名称',0,0);
			$value['title'] = $this->I_chk('post.title','SEO标题',0,0);
			$value['keywords'] = $this->I_chk('post.keywords','SEO关键词',0,0);
			$value['description'] = $this->I_chk('post.description','SEO描述',0,0);
			$value['content'] = $this->I_chk('post.content','商城简介',0,0);
			$value['logo'] = $this->I_chk('post.logo','商城logo',0,0);
			$value['img'] = $this->I_chk('post.img','商城形象图',0,0);
			$value['qyname'] = $this->I_chk('post.qyname','企业名',0,0);
			$value['about'] = $this->I_chk('post.about','企业简介',0,0);
			$value['honor'] = $this->I_chk('post.honor','荣誉资质',0,0);
			$value['person'] = $this->I_chk('post.person','联系人姓名',0,0);
			$value['chkstate'] = $this->I_chk('post.chkstate','用户确认状态',0,0);
			$value['kfinfo'] = $this->I_chk('post.kfinfo','客服信息',0,0);
			$value['worktime'] = $this->I_chk('post.worktime','工作时间',0,0);
			$value['showphone'] = $this->I_chk('post.showphone','是否显示电话',0,0);
			$value['showtel'] = $this->I_chk('post.showtel','是否显示座机',0,0);
			$value['showtm'] = $this->I_chk('post.showtm','是否显示商标模块',0,0);
			$value['showpa'] = $this->I_chk('post.showpa','是否显示专利模块',0,0);
			$value['showtj'] = $this->I_chk('post.showtj','是否显示特别推荐模块',0,0);
			$value['template'] = $this->I_chk('post.template','商城模板',0,0);
			$value['phone'] = $this->I_chk('post.phone','手机号码',0,0);
			$value['tel'] = $this->I_chk('post.tel','电话号码',0,0);
			$value['email'] = $this->I_chk('post.email','邮箱',0,0);
			$value['qq'] = $this->I_chk('post.qq','qq',0,0);
			$value['weixin'] = $this->I_chk('post.weixin','微信',0,0);
			$value['province'] = $this->I_chk('post.province','省份',0,0);
			$value['city'] = $this->I_chk('post.city','城市',0,0);
			$value['address'] = $this->I_chk('post.address','联系地址',0,0);
			$value['aid'] = $this->I_chk('post.aid','经纪人id',0,0);
			$value['tuijian'] = $this->I_chk('post.tuijian','商城推荐',0,0);
			$value['sort'] = $this->I_chk('post.sort','商城排序',0,4);
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