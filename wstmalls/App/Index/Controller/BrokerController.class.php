<?php
namespace Index\Controller;
class BrokerController extends IndexBaseController {
	
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){
		parent::_initialize();
	}
	
	/***
	 * 显示默认首页
	 */
	public function index(){
		$url_self = strtolower($_SERVER['PHP_SELF']);
		if($url_self!='/index.php/broker/'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /broker/");
			exit;
		}
		$data = $this->get_data();//公共数据
		$data['agent'] = $this->gold_agent();//金牌经纪人
		/* 标题title，关键词keywords，描述description */
		$data['title'] = '专属经纪人';
		$data['keywords'] = '专属经纪人';
		$data['description'] = '专属经纪人';
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 金牌经纪人
	 */
	private function gold_agent(){
		$arr = M('Member')->field('id,username,name,about,email,mobile,tel,qq,img')->where('admin=3 and state=1')->order('adminord desc')->select();

		return $arr;
	}
	
}