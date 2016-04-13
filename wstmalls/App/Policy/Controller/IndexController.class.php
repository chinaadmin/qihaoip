<?php
namespace Policy\Controller;
class IndexController extends PolicyBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	/* 政策法规首页  */
    public function index(){
     	$data = $this->get_data('5','12','8');//公共数据,第一个数字代表获取分类导航数据，第二个数字表示获取友情链接，第三个数字表示获取分类导航数据的个数
    	$data['banner'] = $this->data_ad('181');//获取banner
    	$data['hotlabel'] = $this->data_ad('182');//获取热门标签
    	$data['hotrecommend'] = $this->get_recommend('278');//热门推荐，在热门标签下
    	$data['data'] = $this->get_content('278');//获取政策法规下面的分类以及下面的数据
    	//滑动式的热门分类标识
    	$data['nav_type'] = 1;
    	/* 标题title，关键词keywords，描述description */
    	$data['title'] = '知识产权政策法规-最新知识产权法律法规';
    	$data['keywords'] = '知识产权政策法规 知识产权法律 IP政策解读';//seo关键词keywords
    	$data['description'] = '7号网知识产权法律法规（z.qihaoip.com）速递报道每日为您更新知识产权的最新法律法规，最新政府扶持知识产权法律法规查询就上7号网知识产权政策法规频道，知识产权专家免费为您解读！';//seo描述description
    	
    	$this->assign('data',$data); 
    	$this->display();
    }
    
    /* 获取政策法规热门推荐信息 */
    private function get_recommend($id){
    	$article = M('Article');
    	$region = M('Region');
    	$where['groupid'] = $id;
    	$where['state'] = '1';
    	$where['sort'] = array('egt','1000');
    	$result = $article->where($where)->order('sort desc')->limit(10)->select();
    	foreach ($result as $key => $value){
    		if($value['city']){
    			$whr['id'] = $value['city'];
    			$whr['level'] = '2';
    			$result[$key]['cityname'] = $region->where($whr)->getfield('areaname');
    		}elseif ($value['province']){
    			$whr['id'] = $value['province'];
    			$whr['level'] = '1';
    			$result[$key]['cityname'] = $region->where($whr)->getfield('areaname');
    		}else {
    			$result[$key]['cityname'] = '';
    		}
    	}
    	
    	return $result;
    }
    
    /* 获取政策法规下面的分类以及数据  */
    private function get_content($id){
    	$article = M('Article');
    	$articles = M('Articles');
    	$region = M('Region');
    	$where['upid'] = $id;
    	$where['state'] = '1';
    	$result = $articles->where($where)->order('sort desc')->select();
    	foreach ($result as $key => $value){
    		$whr['groupid2'] = $value['id'];
    		$whr['state'] = '1';
    		$whr['sort'] = array('lt','1000');
    		$result[$key]['content'] = $article->where($whr)->limit(8)->select();
    		foreach ($result[$key]['content'] as $k => $v){
    			if($v['city']){
    				$wh['id'] = $v['city'];
    				$wh['level'] = '2';
    				$result[$key]['content'][$k]['cityname'] = $region->where($wh)->getField('areaname');
    			}elseif ($v['province']){
    				$wh['id'] = $v['province'];
    				$wh['level'] = '1';
    				$result[$key]['content'][$k]['cityname'] = $region->where($wh)->getfield('areaname');
    			}else {
    				$result[$key]['content'][$k]['cityname'] = '';
    			}
    			
    			if($v['groupid3']){
    				$wh['id'] = $v['groupid3'];
    				$wh['level'] = '3';
    				$result[$key]['content'][$k]['cate'] = $articles->where($wh)->getfield('name');
    			}elseif ($v['groupid2']){
    				$wh['id'] = $v['groupid2'];
    				$wh['level'] = '2';
    				$result[$key]['content'][$k]['cate'] = $articles->where($wh)->getfield('name');
    			}elseif ($v['groupid']){
    				$wh['id'] = $v['groupid'];
    				$wh['level'] = '1';
    				$result[$key]['content'][$k]['cate'] = $articles->where($wh)->getfield('name');
    			}else {
    				$result[$key]['content'][$k]['cate'] = '';
    			}
    		}
    		if(empty($result[$key]['content']))unset($result[$key]);
    	}
    	
    	return $result;
    }
    
    /***
     * 获取url
    */
    private function getUrl(){
    	$url = array_filter(explode('/',$_SERVER['REQUEST_URI']));
    
    	return $url;
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
    
    public function detail($id,$p){
    	$search = I('get.');
    	$p = $search['p']?$search['p']:1;
    	$data = $this->get_data('5','12','8');//公共数据,第一个数字代表获取分类导航数据，第二个数字表示获取友情链接，第三个数字表示获取分类导航数据的个数
    	$data['article'] = M('Article')->where(array('id'=>$id))->find();
    	if(!$data['article']){
    		return $this->show_404();
    	}
    	$article = explode('_ueditor_page_break_tag_',$data['article']['content']);
		$Page = new \Org\Util\Pagenew( count($article), '1',$search,TRUE,'/'.$id); // 实例化分页类 传入总记录数和每页显示的记录数(10);marktype为自定义分类连接标识
		$data ['page'] = $Page->show(); // 分页显示输出
    	$data['article']['content'] = $article[$p-1];
    	$data['next'] = M('Article')->where(array('id'=>array('gt',$id),'groupid'=>'278'))->find();
    	$data['prev'] = M('Article')->where(array('id'=>array('lt',$id),'groupid'=>'278'))->find();
    	$data['r_article'] = M('Article')->where(array('id'=>array('neq',$id),'groupid'=>'278','state'=>3))->limit(10)->order('rand()')->select();
    	$data['nav_type'] = 1;
    	$data['gpname'] = M('articles')->where(array('id'=>$data['article']['groupid2']))->find();
    	
    	$data['title'] = $data['article']['title'];
    	$data['keywords'] = $data['article']['title'];//seo关键词keywords
    	$data['description'] = $data['article']['title'];
    	$this->assign('data',$data);
    	$this->display('Index/detail');
    }
    
    
    
    public function policy_list(){
    	$search = I('get.');
    	if(!$search['gp']){
    		$search['gp'] = 279; 
    	}
    	$data = $this->get_data('5','12','8');//公共数据,第一个数字代表获取分类导航数据，第二个数字表示获取友情链接，第三个数字表示获取分类导航数据的个数
    	$data['gp'] = M('Articles')->where(array('upid'=>'278'))->select();
    	foreach ($data['gp'] as $key=>$value){
    		if($value['id']==$search['gp']){
    			$data['gpname'] = $value['name'];
    			break;
    		}
    	}
    	$data['gp2'] = M('Articles')->where(array('upid'=>$search['gp']))->select();
    	$are = M('Article')->where(array('groupid'=>'278'))->field('province')->group('province')->select();
    	$are_id = array();
    	foreach ($are as $key=>$value){
    		if($value['province']){
    		$are_id[] = $value['province'];
    		}
    	}
    	$data['address'] = M('region')->where(array('id'=>array('in',$are_id)))->select();
    	$where = array();
    	if($search['gp']){
    		$where['a.groupid2']=$search['gp'];
    	}
    	if($search['gp2']){
    		$where['a.groupid3']=$search['gp2'];
    	}
    	if($search['ads']){
    		$where['a.province']=$search['ads'];
    	}
    	$where['a.state'] = 1;
    	$count = M('Article as a')->where($where)->count();
    	$Page = new \Org\Util\Pagenew( $count, '10',$search,TRUE,FALSE); // 实例化分页类q 传入总记录数和每页显示的记录数(10);marktype为自定义分类连接标识
    	$data ['page'] = $Page->show(); // 分页显示输出
    
    	$data['article_data'] = M('Article as a')->field('a.id,a.title,a.description,p.name as arename,s.name as gpname')->join('qh_province as p on a.province=p.id','LEFT')->join('qh_Articles as s on s.id=a.groupid3','LEFT')->where($where)->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
    	
    	
    	$data['nav_type'] = 1;
    	$data['title'] = $data['gpname'].'-政策法规';
    	$data['keywords'] = '知识产权政策法规 知识产权法律 IP政策解读';//seo关键词keywords
    	$data['description'] = '7号网知识产权法律法规（z.qihaoip.com）速递报道每日为您更新知识产权的最新法律法规，最新政府扶持知识产权法律法规查询就上7号网知识产权政策法规频道，知识产权专家免费为您解读！';//seo描述description
       	$this->assign('search',$search);
    	$this->assign('data',$data);
    	$this->display('Index/policy_list');
    }
}