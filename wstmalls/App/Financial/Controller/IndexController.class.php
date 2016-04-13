<?php
namespace Financial\Controller;
class IndexController extends FinancialBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	

	/* 科技金融首页  */
    public function index(){
     	$data = $this->get_data('9','11');//公共数据
    	$data['banner'] = $this->banner();//获取banner
    	$data['policy'] = $this->article();//获取政策支持 
    	$data['tech'] = $this->techfin();//获取新闻动态
    	/* 标题title，关键词keywords，描述description */
    	$data['title'] = $data['menu'][6]['title'];//seo标题title
    	$data['keywords'] = $data['menu'][6]['alt'];//seo关键词keywords
    	$data['description'] = $data['menu'][6]['about'];//seo描述description
    	
    	$this->assign('data',$data); 
    	$this->display();
    }
    
    /***
     * 获取url
    */
    private function getUrl(){
    	$url = array_filter(explode('/',$_SERVER['REQUEST_URI']));
    
    	return $url;
    }

    /**
     * 获取首页banner信息
     * @return array
     */
    private function banner(){
    	return $this->data_ad(173);
    }
    
    /**
     * 获取首页政策支持信息
     * @return array
     */
    private function article(){
    	$where['upid'] = '258';
    	$arr['class'] = M('Articles')->where($where)->order('sort desc')->limit('4')->select();
    	foreach ($arr['class'] as $key => $value){
    		$map['groupid'] = $value['id'];
    		$map['state'] = '1';
    		$arr['class'][$key]['zixun'] = M('Article')->where($map)->order('sort desc')->limit('4')->select();
    		$classid[].= $value['id'];
    	}
    	$arr['allclass'] = M('Articles')->where($where)->order('sort desc')->select();
    	foreach ($arr['allclass'] as $key => $value){
    		$allclassid[] .= $value['id'];
    	};
    	$wh['groupid'] = array(array('not in',implode(',',$classid)),array('in',implode(',',$allclassid)),'AND');
    	$wh['state'] = '1';
    	$arr['qtnews'] = M('Article')->where($wh)->order('sort desc')->limit('8')->select();
		//echo M('Article')->getLastSql();
    	return $arr;
    }
    
    /**
     * 获取首页新闻动态
     * @return array
     */
    private function techfin(){
    	$where['upid'] = '0';
    	$where['groupid'] = '257';
    	$where['state'] = '1';
    	$arr = M('Article')->where($where)->order('sort desc')->limit('8')->select();
    	
    	return $arr;
    }
}