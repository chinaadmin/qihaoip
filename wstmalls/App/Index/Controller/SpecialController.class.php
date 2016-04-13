<?php
namespace Index\Controller;
class SpecialController extends IndexBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	/***
	 * 显示首页
	*/
    public function index(){
    	if($_SERVER['PHP_SELF']!='/index.php/special/index' && $_SERVER['PHP_SELF']!='/index.php/special/index/'){
    		Header("HTTP/1.1 301 Moved Permanently");
    		Header("Location: /special/index");
    		exit;
    	}
    	$data = $this->get_data(5,'',8);
    	$data['banner'] = $this->zt_banner('159');
    	$data['zt'] = $this->zt_info('154');
    	$data['hd'] = $this->hd_info('155');
    	//$data = array_merge($data,$this->zt_data());
    	/* 标题title，关键词keywords，描述description */
    	$data['title'] = $data['menu'][5]['title'];
    	$data['keywords'] = $data['menu'][5]['title'];
    	$data['description'] = $data['menu'][5]['about'];
    	$data['nav_type'] = 1;
    	$this->assign('data',$data);
    	$this->display('index');
    }
    
    /**
     * 空操作
     */
    public function _empty(){
    	switch (ACTION_NAME){
    		case 'topic':
    			$_GET['catid'] = '154';//专题
    			$_GET['modeltype'] = 'topic/';//专题
    			return $this->show_list();
    		case 'activity':
    			$_GET['catid'] = '155';//活动
    			$_GET['modeltype'] = 'activity/';//活动
    			return $this->show_list();
    		default:
    				$this->show_404('页面不存在！！！！');
    	}
    }
	
    /***
     * 显示列表页
    */
    public function show_list($p=1){
    	$data = $this->get_data(5,'',8);
    	if(I('p')){
    		$p = I('p');
    	}
    	
    	$data['catid'] = $catid = I('catid');
    	$data['catename'] = M('Ads')->where('id='.$catid)->find();//面包线
    	/* 数据分页 */
    	$count = M('Ad')->where('state=1 and groupid in("'.$catid.'") and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->count();
    	if(empty($count)){
    		$this->show_404('页面不存在！！！！');
    	}
    	
    	$Page = new \Org\Util\Pagenew( $count, '12'); // 实例化分页类 传入总记录数和每页显示的记录数(10);marktype为自定义分类连接标识
    	$data ['page'] = $Page->show(); // 分页显示输出
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$data['content'] = M('Ad')->field('id,name,img,link,about,starttime')->where('state=1 and groupid in("'.$catid.'") and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort')->limit($Page->firstRow . ',' . $Page->listRows)->select();
    	
    	/* $data['hot'] = $this->hot_zt($catid);//热门 专题
    	$data['latest'] = $this->latest_zt($catid);//最新专题
    	$data['tm'] = $this->recommended_tm();//推荐商标
    	$data['pt'] =  $this->recommended_pt();//推荐专利 */
    	/* 标题title，关键词keywords，描述description */
    	$data['title'] = $data['catename']['name'];
    	$data['keywords'] = $data['catename']['name'];
    	$data['description'] = $data['catename']['about'];
    	$data['nav_type'] = 1;
    	$this->assign('data',$data);
    	$this->display('show_list');
    }
    
    /**
     * 热门专题
     */
    public function hot_zt($catid){
    	$arr = M('ad')->field('id,name,link')->where('state=1 and groupid in("'.$catid.'")')->order('sort DESC')->limit(8)->select();
    	return $arr;
    }
    
    /**
     * 最新专题
     */
    public function latest_zt($catid){
    	$arr = M('ad')->field('id,name,link')->where('state=1 and groupid in("'.$catid.'")')->order('starttime DESC')->limit(8)->select();
    	return $arr;
    }
    
    /**
     * 推荐商标
     */
    public function recommended_tm(){
    	$arr = M('item as s')->join('qh_items as c ON c.id = s.groupid')->field('s.id,s.groupid,s.tmno,s.title,s.introduce,s.price,s.img,s.addtime,c.name')->where('s.tmscreening2=2 and s.state=1 and s.tmpa=1')->order('addtime DESC')->limit(3)->select();
    	
    	return $arr;
    }
    
    /**
     * 推荐专利
     */
    public function recommended_pt(){
    	$arr = M('item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmno,c.name')->where('z.tmscreening2=2 and z.state=1 and z.tmpa=2')->order('addtime DESC')->limit(3)->select();
    	
    	return $arr;
    }
    
    /**
     * 专题.活动幻灯片
     */
    public function zt_banner($id){
    	$arr = M('ad')->field('id,name,img,link')->where('state=1 and groupid='.$id.' and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort,id DESC')->select();
    	return $arr;
    }
    
    
    private function zt_data(){
    	$arr = M('ad')->where('state=1 and groupid in("154,155") and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort')->limit(16)->select();
    	if($arr){
    		for($i=0;$i<16;$i++){
    			if($i<4){
    				$re['banner'][] = $arr[$i];
    			} else if($i<6){
    				$re['hot'][] = $arr[$i];
    			} else if($i<10){
    				$re['content'][] = $arr[$i];
    			} else if($i<12){
    				$re['hot1'][] = $arr[$i];
    			} else if($i<16){
    				$re['content1'][] = $arr[$i];
    			} 
    			
    		}
    	}
    	return $re;
    }
    /**
     * 专题.活动-专题
     */
    public function zt_info($catid){
    	$arr = M('ad')->field('id,name,img,link,about')->where('state=1 and groupid in("'.$catid.'") and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort,id DESC')->limit(5)->select();
    	return $arr;
    }
    
    /**
     * 专题.活动-活动
     */
    public function hd_info($catid){
    	$arr = M('ad')->field('id,name,img,link,about')->where('state=1 and groupid in("'.$catid.'") and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort,id DESC')->limit(5)->select();
    	return $arr;
    }
   
}