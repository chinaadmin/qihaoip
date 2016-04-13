<?php
namespace Financial\Controller;
class EmptyController extends FinancialBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	

	/***
	 * 空操作
	*/
	public function _empty(){
		$contro = strtolower(CONTROLLER_NAME);
		if($contro == 'news'){
			$map['id'] = '257';//科技金融新闻动态
			$data['cate'] = M('Articles')->where($map)->select();
			$data['dname'] = '科技金融新闻动态';
			return $this->show($map['id'],$data['cate'],$data['dname']);
		}elseif ($contro == 'policy'){
			$action = strtolower(ACTION_NAME);
			$where['upid'] = '258';
			$data['cate'] = M('Articles')->where($where)->order('sort desc')->select();
			$data['dname'] = '科技金融政策支持';
			switch ($action){
				case 'index':
					$data['allid'] = M('Articles')->where($where)->select();
		    		foreach ($data['allid'] as $key => $value){
		    			$classid[].=$value['id'];
		    		}
		    		$map['groupid'] = array('in',implode(',',$classid));
					return $this->show($map['groupid'],$data['cate'],$data['dname']);
				case 'other':
					$data['allid'] = M('Articles')->where($where)->select();//政策支持下所有的分类
    				foreach ($data['allid'] as $key => $value){
    					$allcatid[].=$value['id'];
    				}
    				foreach ($data['cate'] as $key => $value){//已经显示过的分类
    					$classid[].=$value['id'];
    				}
    				$map['groupid'] = array(array('in',implode(',',$allcatid)),array('not in',implode(',',$classid)),'AND');
    				
    				//print_r($map['groupid']);
					return $this->show($map['groupid'],$data['cate'],$data['dname']);
				default:
					$where['ename'] = $action;
					$cityid= M('Articles')->where($where)->getField('id');
					if($cityid){
						$map['groupid'] = $cityid;
						return $this->show($map['groupid'],$data['cate'],$data['dname']);
					}else {
						return $this->show_404();
					}
			}
		}else {
			return $this->show_404();
		}
	}
	
    public function show($gid,$cate,$dname,$p=1){
    	if($_SERVER['REQUEST_URI']=='/financial/policy' || $_SERVER['REQUEST_URI']=='/financial/news'){
    		Header("HTTP/1.1 301 Moved Permanently");
    		Header("Location: ".$_SERVER['REQUEST_URI']."/");
    		exit;
    	}
    	
	    $data = $this->get_data('9','11');//公共数据
	    if(I('p')){
	    	$p = I('p');
	    }else {
	    	$p = 1;
	    }
	    $data['dname'] = $dname;
	    $data['cate'] = $cate;
	    
	    $map['state'] = '1';
	    $map['groupid'] = $gid;
	    $count = M('Article')->where($map)->count();// 查询满足要求的总记录数
	    
	    $pagesize = 15;
	    $data['pagesize'] = $pagesize;
	    $newpage = new \Org\Util\Page($count,$pagesize);//实例化分类页
	    if($count && $count > $pagesize){
	    	$data['page'] = $newpage->getPage();//数据分页
	    }
	    $data['content'] = M('Article')->where($map)->limit(($p-1)*$pagesize,$pagesize)->order('id desc')->select();
	    
	    foreach ($data['content'] as $key => $value){
	    	$wh['id'] = $value['groupid'];
	    	$data['content'][$key]['catename'] = M('Articles')->where($wh)->getField('name');
	    }
	    $contro = CONTROLLER_NAME;
	    $action = ACTION_NAME;
	    $whr['ename'] = $action;
	    if($contro == 'Policy'){
	    	switch ($action){
	    		case 'index':
	    			$data['seo']['title'] ='知识产权政策支持-科技金融-7号网';
	    			$data['seo']['keywords'] ='知识产权政策,知识产权金融政策,知识产权质押政策,知识产权政策解读';
	    			$data['seo']['description'] ='知识产权政策大全，知识产权质押政策支持，全国地方知识产权政策一览，知识产权科技金融政策解读';
	    			break;
	    		default:
	    			$data['seo'] = M('Articles')->where($whr)->find();
	    	}
	    }elseif ($contro == 'News'){
	    	switch ($action){
	    		case 'index':
	    			$data['seo']['title'] ='知识产权科技金融新闻动态-7号网';
	    			$data['seo']['keywords'] ='知识产权科技金融新闻,知识产权投资新闻,知识产权金融新闻';
	    			$data['seo']['description'] ='最新最全的知识产权科技金融新闻第一资讯，尽在7号网知识产权科技金融新闻频道。';
	    			break;
	    		default:
	    			return $this->show_404();
	    	}
	    }else {
	    	return $this->show_404();
	    }
	    
	    $data['title'] = $data['seo']['title'];
	    $data['keywords'] = $data['seo']['keywords'];
	    $data['description'] = $data['seo']['description'];
	    
	    $this->assign('data',$data);
	    $this->display('Index/show');
    }
}