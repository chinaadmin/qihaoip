<?php
namespace Index\Controller;
class HelpController extends IndexBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'article';//数据库
	private $_name = '';
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组//
	 */
	public function _initialize(){
		parent::_initialize();
		$this->_name = MODULE_NAME.'-'.CONTROLLER_NAME;
		$search = session('search-'.$this->_name);
		if($search && is_array($search) && ACTION_NAME=='ajax_ShowList'){//只有当搜索列表时，才载入搜索条件
			$this->_where = array_merge($search,$this->_where);
		}
	
	}
	
	/***
	 * 空操作
	 */
	public function _empty(){
		if(ACTION_NAME){
			return $this->index(ACTION_NAME);
		}else {
			$this->show_404('页面不存在！！！！');
		}
	}
	
	/***
	 * 显示默认首页
	 */
	public function index($ename=''){
		if($ename&&$_SERVER['REQUEST_URI']!='/help/'.$ename.'/'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /help/".$ename."/");
			exit;
		}
		if($_SERVER['REQUEST_URI']=='/index.php/help/'||$_SERVER['REQUEST_URI']=='/index.php/help'||$_SERVER['REQUEST_URI']=='/help'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /help/");
			exit;
		}
		
		$data = $this->get_data('5','','8');
		$data['category'] = $this->get_category();//获取帮助中心分类
		if(!$ename){
			$ename = 'release';
		}
		$data['info'] = $this->get_info($ename);//获取英文名对应的资讯
		$data['action'] = $ename;//获取action英文名
		//滑动式的热门分类标识
		$data['nav_type'] = '1';
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['info']['title'].'-帮助中心';
		$data['keywords'] = $data['info']['keywords'];
		$data['description'] = $data['info']['description'];
		
		$this->assign('data',$data);
		$this->display('index');
	}
	
	/**
	 * 获取帮助中心的分类以及分类下的资讯
	 */
	private function get_category(){
		$article = M('Article');
		$where['upid'] = '3';//帮助中心下的分类
		$where['state'] = '1';//状态正常
		$arr = M('Articles')->field('id,upid,state,name')->where($where)->order('sort desc')->select();
		foreach ($arr as $key=>$value){
			$map['groupid2'] = $value['id'];
			$map['state'] = '1';
			$arr[$key]['sub'] = $article->field('id,title,groupid,ename')->where($map)->order('sort desc')->select();
		}
		
		return $arr;
	}
	
	/**
	 * 获取资讯内容
	 */
	private function get_info($ename){
		$where['ename'] = $ename;//获取英文名
		$where['state'] = '1';//状态正常
		$arr = M('Article')->where($where)->find();
		
		return $arr;
	}
}