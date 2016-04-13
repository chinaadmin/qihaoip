<?php
namespace Index\Controller;
class SiteMapController extends IndexBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
    public function index(){
    	$data = $this->get_data('4');//获取公共数据据
    	$data['tmcate'] = $this->get_tradecate();//商标市场分类
    	$data['tmsubcate'] = $this->get_tdsubcate();//商标子分类
    	$data['ptcate'] = $this->get_patentcate();//专利市场
    	$data['ptsubcate'] = $this->get_ptsubcate();//专利小类
    	$data['ptmin'] = $this->get_zlmin();//专利类别
    	$data['news'] = $this->get_news();//新闻分类
    	/* 标题title，关键词keywords，描述description */
    	$data['title'] = '网站地图';
    	$data['keywords'] = $data['menu'][0]['alt'];
    	$data['description'] = $data['menu'][0]['about'];
    	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /* 商标分类 */
    private function get_tradecate(){
    	$map['tmpa'] = '1';
    	$map['parentid'] = '0';
    	$map['state'] = '1';
    	$order = 'sort,id DESC';
    	$items = M('Items')->where($map)->order($order)->select();
    	
    	return $items;
    }
    
    /* 商标分类 */
    private function get_tdsubcate(){
    	$map['groupid'] = '2';
    	$map['id'] = array('in','16,17,18');
    	$map['state'] = '1';
    	$order = 'sort,id DESC';
    	$menu = M('Menu')->where($map)->order($order)->select();
    	 
    	return $menu;
    }
    
    /* 专利市场大类 */
    private function get_patentcate(){
    	$map['tmpa'] = '2';
    	$map['parentid'] = '0';
    	$map['state'] = '1';
    	$order = 'sort,id DESC';
    	$items = M('Items')->where($map)->order($order)->select();
    	 
    	return $items;
    }
    
    /* 专利小类  */
    private function get_ptsubcate(){
    	$map['tmpa'] = '2';
    	$map['parentid'] = array('neq','0');
    	$map['state'] = '1';
    	$order = 'sort,id DESC';
    	$items = M('Items')->where($map)->order($order)->select();
    
    	return $items;
    }
    
    /* 专利类别  */
    private function get_zlmin(){
    	$map['id'] = array('in','25,26');
    	$map['groupid'] = array('eq','3');
    	$map['state'] = '1';
    	$order = 'sort,id DESC';
    	$zlmin = M('Menu')->where($map)->order($order)->select();
    
    	return $zlmin;
    }
    
    /* 新闻资讯 */
    private function get_news(){
    	$map['upid'] = '0';
    	$map['groupid'] = array('eq','5');
    	$order = 'sort,id DESC';
    	$news = M('Menu')->where($map)->order($order)->select();
    	
    	return $news;
    }
    
}