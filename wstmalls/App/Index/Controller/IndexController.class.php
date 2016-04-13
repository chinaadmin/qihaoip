<?php
namespace Index\Controller;
class IndexController extends IndexBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 删除某个账号下的商品（包含商标和专利）
	 * @param username 用户名
	 * @param type 数据类型（1表示商标，2表示专利）
	 * 也可以不传type参数，默认是用户user其下所有商品（包括商标和专利）
	 * 链接地址：http://www.qihaoip.com/index/index/delgoods/username/13701227773/type/1
	 */
	public function delgoods(){
		header('Content-type:text/html;charset=utf-8');
		$username = I('username','','trim');
		$tmpa = I('type','','trim');
		$item = M('Item');
		$member = M('Member');
		if(!$username){
			echo '必须要填用户账号！';die;
		}
		$where['username'] = $username;
		$userid = $member->where($where)->getField('id');
		if($tmpa=='1'){
			$wh['tmpa'] = '1';
		}elseif($tmpa=='2'){
			$wh['tmpa'] = '2';
		}
		$wh['userid'] = $userid;
		$goods = $item->where($wh)->delete();
		if($goods){
			if($tmpa=='1'){
				echo '成功删除商标'.$goods.'条数据';die;
			}elseif ($tmpa=='2'){
				echo '成功删除专利'.$goods.'条数据';die;
			}else {
				echo '成功删除'.$goods.'条数据（包括商标和专利）';die;
			}
		}else{
			echo '没有需要删除的数据!请检测该用户是否上传了专利或者商标！';die;
		}
	}
	
	/**
	 * 批量审核商品
	 * @param username 用户名
	 * @param type 审核类型（1表示审核商标，2表示审核专利）
	 * 也可以不传type参数，默认是审核当前用户所有未审核的数据
	 * 链接地址：http://www.qihaoip.com/index/index/batch/username/用户账号/type/1
	 */
	public function batch(){
		header('Content-type:text/html;charset=utf-8');
		$username = I('username','','trim');
		$tmpa = I('type','','trim');
		$item = M('Item');
		$member = M('Member');
		if(!$username){
			echo '必须要填用户账号！';die;
		}
		$where['username'] = $username;
		$userid = $member->where($where)->getField('id');
		if($tmpa=='1'){
			$wh['tmpa'] = '1';
		}elseif($tmpa=='2'){
			$wh['tmpa'] = '2';
		}
		$wh['userid'] = $userid;
		$wh['state'] = '2';
		$data['state'] = '1';
		$shop = $item->where($wh)->save($data);
		if($shop){
			if($tmpa=='1'){
				echo '成功审核商标'.$shop.'条数据';die;
			}elseif ($tmpa=='2'){
				echo '成功审核专利'.$shop.'条数据';die;
			}else {
				echo '成功审核'.$shop.'条数据（包括商标和专利）';die;
			}
		}else{
			echo '没有需要审核的数据!请检测该用户是否有专利或者商标！';die;
		}
	}
	
	/**
	 * 某个账号下的商标或者专利或者所有商品转移到另外一个账号
	 * @param user1 用户名1
	 * @param user2 用户名2
	 * @param type 数据类型（1表示商标，2表示专利）
	 * 也可以不传type参数，默认是用户user1其下所有商品（包括商标和专利）
	 * 链接地址：http://www.qihaoip.com/index/index/tninfo/user1/用户1账号/user2/用户2账号/type/1
	 */
	public function tninfo(){
		header('Content-type:text/html;charset=utf-8');
		$username1 = I('user1','','trim');
		$username2 = I('user2','','trim');
		$tmpa = I('type','','trim');
		$item = M('Item');//商品表
		$member = M('Member');//用户表
		if($username1&&$username2){
			//要转信息的账号
			$where1['username'] = $username1;//被转账号
			$userid1 = $member->field('id,aid')->where($where1)->find();
			//被转信息的账号
			$where2['username'] = $username2;//被转账号
			$userid2 = $member->field('id,aid')->where($where2)->find();
			if($tmpa=='1'){
				$wh1['tmpa'] = '1';
				$wh2['tmpa'] = '1';
			}elseif($tmpa=='2'){
				$wh1['tmpa'] = '2';
				$wh2['tmpa'] = '2';
			}
			//查找要转账号的商品信息
			$wh1['userid'] = $userid1['id'];
			$goods1 = $item->where($wh1)->select();
			foreach ($goods1 as $key => $value){
				$sid[] .= $value['id'];
			}
			if(!$sid){
				if($tmpa == '1'){
					echo '用户:'.$username1.'，其下没有商标数据可以转到，用户:'.$username2.'，中去。';die;
				}elseif ($tmpa == '2'){
					echo '用户:'.$username1.'，其下没有专利数据可以转到，用户:'.$username2.'，中去。';die;
				}else{
					echo '用户:'.$username1.'，其下没有任何数据（包括商标和专利）可以转到，用户:'.$username2.'，中去。';die;
				}
			}
			$wh2['id'] = array('in',$sid);
			$data['userid'] = $userid2['id'];
			$data['aid'] = $userid2['aid'];
			$goods2 = $item->where($wh2)->save($data);
			if($goods2){
				if($tmpa=='1'){
					echo '成功处理商标'.$goods2.'条数据。';die;
				}elseif ($tmpa=='2'){
					echo '成功处理专利'.$goods2.'条数据。';die;
				}else{
					echo '成功处理所有商品（包括商标和专利）'.$goods2.'条数据。';die;
				}
			}
		}else{
			echo '必须要填用户账号！';die;
		}
	}
	
    public function index(){
    	if(!($_SERVER['PHP_SELF']=='/index.php' || $_SERVER['PHP_SELF']=='/index.php/')){
    		Header("HTTP/1.1 301 Moved Permanently");
    		Header("Location: /");
    		exit;
    	}
    	$data = $this->get_data(1,'1,2','8');
    	$data['banner'] = $this->banner();//获取banner
    	$data['purchasing'] = $this->purchasing_info();//求购信息
    	$data['special_trademark'] = $this->trade_price();//特惠商标
    	$data['special_patent'] = $this->one_price();//特惠专利
    	$data['zcb'] = $this->zcb();//知产包
    	$data['hot_recommend'] = $this->adv('14','7');//热门推荐广告位
    	$data['star_store'] = $this->adv('174');//明星旗舰店广告位
    	$data['adv_space'] = $this->adv('20','3');//网站首页横条广告位
    	$data['trademark'] = $this->shop_info('1');//商标市场
    	$data['adv_trademark'] = $this->adv('171','7');//获取商标市场分类广告
    	$data['patent'] = $this->shop_info('2');//专利市场
    	$data['adv_patent'] = $this->adv('172','7');//获取专利市场分类广告
    	$data['article'] = $this->index_supply();//资讯和案例
    	$data['policy'] = $this->policy();//政策法规
    	$data['tm_ad_list'] = $this->adv('24','7');//商标列表广告
    	$data['pa_ad_list'] = $this->adv('25','7');//商标列表广告
    	$data['index'] = '1';//标识符，显示首页运营中心信息
    	$data['link'] = $this->index_link();//首页友情链接
    	//滑动式的热门分类标识
		$data['nav_type'] = '1';
    	/* 标题title，关键词keywords，描述description */
    	$data['title'] = $data['menu'][0]['title'];
    	$data['keywords'] = $data['menu'][0]['alt'];
    	$data['description'] = $data['menu'][0]['about'];
    	$data['isindex'] = TRUE;
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 获取政策法规
     */
    private function policy(){
    	$where['state'] = '1';
    	$where['groupid'] = '278';
    	$arr = M('Article')->where($where)->limit('3')->order('sort desc')->select();
    	
    	return $arr;
    }
    
    /**
     * 商品信息（包括商标市场和专利市场）
     */
    private function shop_info($type){
    	$items = M('Items');
    	$item = M('Item');
    	$where['state'] = '1';//状态
    	if($type == '1'){
    		$where['tmpa'] = '1';//商标
    		$where['level'] = '1';//级别
    		$arr = $items->field('id,name')->where($where)->order('sort desc')->limit('7')->select();
    		foreach ($arr as $key => $value){
    			$map['tmpa'] = '1';//商标
    			$map['state'] = '1';//状态
    			$map['level'] = '2';//级别
    			$map['parentid'] = $value['id'];//父级分类
    			$arr[$key]['sub'] = $items->field('id,name')->where($map)->order('sort desc')->select();
    			$wh['tmpa'] = '1';//商标
    			$wh['groupid'] = $value['id'];
    			$wh['state'] = '1';
    			$arr[$key]['info'] = $item->field('id,groupid,title,price,img,tmlimit')->where($wh)->order('tmscreening desc')->limit('8')->select();
    			foreach ($arr[$key]['info'] as $k => $v){
    				if($v['price'] > '0'){
    					$arr[$key]['info'][$k]['price'] = '￥'.$v['price'];
    				}else{
    					$arr[$key]['info'][$k]['price'] = '面议';
    				}
    				$img = explode(',',$v['img']);
    				$arr[$key]['info'][$k]['img'] = $img['0'];
    			}
    			$cate = explode('-',$value['name']);
    			$arr[$key]['catename'] = $cate['0'];
    		}
    	}elseif ($type == '2'){
    		$where['tmpa'] = '2';//专利
    		$where['level'] = '1';//级别
    		$arr = $items->field('id,name')->where($where)->order('sort desc')->limit('7')->select();
    		foreach ($arr as $key => $value){
    			$map['tmpa'] = '2';//专利
    			$map['state'] = '1';//状态
    			$map['level'] = '2';//级别
    			$map['parentid'] = $value['id'];//父级分类
    			$arr[$key]['sub'] = $items->field('id,name')->where($map)->order('sort desc')->select();
    			$wh['tmpa'] = '2';//专利
    			$wh['groupid'] = $value['id'];
    			$wh['state'] = '1';
    			$arr[$key]['info'] = $item->field('id,groupid,title,price,img,introduce,tmtype')->where($wh)->order('tmscreening desc')->limit('8')->select();
    			foreach ($arr[$key]['info'] as $k => $v){
    				if($value['groupid3']){
    					$map['id'] = $value['groupid3'];
    				}elseif (!$value['groupid3']&&$value['groupid2']){
    					$map['id'] = $value['groupid2'];
    				}elseif (!$value['groupid3']&&!$value['groupid2']&&$value['groupid']){
    					$map['id'] = $value['groupid'];
    				}
    				$map['state'] = '1';
    				$arr[$key]['info'][$k]['category'] = $items->where($map)->getField('name');
    				if($v['price'] > '0'){
    					$arr[$key]['info'][$k]['price'] = '￥'.$v['price'];
    				}else{
    					$arr[$key]['info'][$k]['price'] = '面议';
    				}
    				$arr[$key]['info'][$k]['tmtype'] = C('ITEM_PA_TYPE')[$v['tmtype']];
    				$img = explode(',',$v['img']);
    				$arr[$key]['info'][$k]['img'] = $img['0'];
    			}
    		}
    	}else {
    		
    	}
    	
    	return $arr;
    }
    
    /**
     * 知产包
     */
    private function zcb(){
	    $where['state'] = '1';
	    $arr= M('Zcb')->where($where)->limit('3')->order(array('sort'=>'desc'))->select();
	    foreach ($arr as $key=>$value){
	    	$item_id = explode(',',$value['item']);
	    	$where['id'] = array('in',$item_id);
	    	$arr[$key]['item'] = M('item')->where($where)->select();
	    }
	    
	    return $arr;
    }
    
    /**
     * 求购信息
     */
    private function purchasing_info(){
    	$arr = M('Supply as s')->join('qh_member as m ON m.id = s.userid')->join('qh_items as i on i.id = s.groupid')->field('s.id,s.uid,s.userid,s.endtime,s.groupid,s.title,s.pricemax,m.qq,i.name')->where('s.state=1 and (s.endtime = 0 or s.endtime >'.time().')')->order('s.addtime desc,s.id desc')->limit(4)->select();
    	
    	return $arr;
    }
    
    /**
     * 测试页面
     */
    public function edimg(){
    	header("Content-type: text/html; charset=utf-8");
    	ini_set('max_execution_time', '0');
 		$where['img'] = 'http://www.qihaoip.com/Trade/GnTrade/tmimg/id/9012690/class/48.html,http://www.qihaoip.com/Trade/GnTrade/tmimg/id/3377987/class/48.html,http://www.qihaoip.com/Trade/GnTrade/tmimg/id/3462446/class/48.html,http://www.qihaoip.com/Trade/GnTrade/tmimg/id/36996';
 		
    	$data = M('item')->where($where)->select();
    	foreach ($data as $k=>$v){
    		$new_b = array();
    		$new_b[] = 'http://www.qihaoip.com/Trade/GnTrade/tmimg/id/'.$v["tmno"].'/class/'.$v["groupid"].'.html';
    		$new_img = implode(',',$new_b);
    		//$re = M('item')->where(array('id'=>$v['id']))->save(array('img'=>$new_img));
    		if(re){
    		echo $v['id'].'修改成功！'.$k+1;
    		echo '<br/>';
    		}else{
    		echo $v['id'].'修改失败！'.$k+1;
    		echo '<br/>';
    		}
    	}
    	
    }

    /**
     * 测试页面，没什么用
     */
    public function test($q='test'){
    	$qds = new \Common\Lib\Quands();
    	$this->show(' ','utf8');
    	print_r(json_decode($qds->get('4795157','','test'),true));
	}
    
    /**
     * 用户收藏功能
     */
    public function favorite(){
    	if(session('user.id')){
    	$map['userid'] = session('user.id');
    	$map['goodsid'] = I('sid');
    	$map['type'] = I('type');
    	$map['state'] = '1';
    	$sql = M('Favorite')->where($map)->find();
    	if($sql){
    		$msg['state'] = '3';
    		$msg['data'] = '您已收藏过，请勿重复收藏！';
    	}else{
	    	$data['userid'] = session('user.id');
	    	$data['type'] = I('type');
	    	$data['goodsid'] = I('sid');
	    	$data['addtime'] = time();
	    	$data['state'] = '1';
	    	$result = M('Favorite')->add($data);
	    	if($result){
	    		$msg['state'] = '1';
	    		$msg['data'] = '收藏成功！';
	    	}else {
	    		$msg['state'] = '2';
	    		$msg['data'] = '收藏失败！';
	    	}
    	}
    	}else{
    		$msg['state'] = '4';
    		$msg['data'] = '请登录后收藏！';
    	}
    	
    	$this->ajaxReturn($msg);
    }
    
    /**
     * 获取首页banner信息
     * @return array
     */
    private function banner(){//获取banner信息
    	return $this->data_ad(28);
    }
    
    /**
     * 获取首页商品分类（包括商标和专利）
     */
    
    private function category($catid){
    	$arr = M('Items')->where('state=1 and parentid=0 and tmpa='.$catid)->order('sort desc,id desc')->limit(4)->select();

    	return $arr;
    }
    
    /**
     * 首页友情链接
     * @return
     */
    private function index_link(){
    	$map['id'] = array('in','1,2,9,10');
    	$arr = M('Links')->where($map)->order('sort desc')->select();
    	foreach ($arr as $key => $value){
    		$where['groupid'] = $value['id'];
    		$where['state'] = '1';
    		$arr[$key]['youlian'] = M('Link')->where($where)->order('sort desc,id desc')->select();
    	}

    	return $arr;
    }
    
    /**
     * 推荐商标
     */
    private function trade_fine(){
    	 $arr = M('Item')->order('tmscreening1 desc,id desc')->where(array('tmpa'=>'1','tuijian'=>'1','state'=>'1'))->select();

    	 return $arr;
    }
    
    /**
     * 推荐专利
     */
    private function recommended_pt(){
    	$arr = M('Item')->field('id,title,img')->where('tmpa=2 and state=1 and tuijian=1')->order('tmscreening1 desc,id DESC')->select();
    
    	return $arr;
    }
    
    /**
     * 获取商标市场广告位
     * @return array
     */
    private function tm_ad($groupid){
    	$arr = M('Ad')->field('id,name,img,link')->where('groupid = '.$groupid.' and state = 1 and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->find();
    	
    	return $arr;
    }
    
    /**
     * 获取首页文章轮播信息
     * @return array
     */
    private function artbanner(){//获取文章轮播信息
    	return $this->data_ad(158);
    }
    
    /**
     * 获取首页商标信息
     * @return array
     */
    private function index_tm(){
    	$where['tmpa'] = 1;
    	$where['state'] = 1;
    	$where['parentid'] = '0';
    	$items = M('items')->where($where)->limit(4)->order('sort DESC')->select();
    	$item = M('item');
    	$i = 0;
    	foreach ($items as $k => $row){
    		$re[$i]['data'] = $row;
    		$where['groupid'] = $row['id'];
//     		$where['tmscreening'] = 2;
    		$exp = explode('-', $re[$i]['data']['name']);
			$re[$i]['data']['shuzi'] = $exp[0];
			$re[$i]['data']['catename'] = $exp[1];
    		$re[$i]['array'] = $item->where($where)->order('tmscreening desc,id asc')->limit(5)->select();
    		foreach ($re[$i]['array'] as $key => $value){
    			if($value['price'] == '0.00'){
    				$re[$i]['array'][$key]['price'] = '面议';
    			}
    		}
    		$i++;
    	}
    	return $re;
    }
    
    /**
     * 获取首页专利信息
     */
    private function index_pa(){
    	$where['tmpa'] = 2;
    	$where['state'] = 1;
    	$where['parentid'] = 0;
    	$items = M('items')->where($where)->order('sort DESC')->limit(4)->select();
    	$item = M('item');
    	$i = 0;
    	foreach ($items as $row){
    		$re[$i]['data'] = $row;
    		$where['groupid'] = $row['id'];
     		$where['tmscreening'] = 2;
    		$re[$i]['array'] = $item->where($where)->order('tmscreening desc,id asc')->limit(5)->select();
    		foreach ($re[$i]['array'] as $key => $value){
    			if($value['price'] == '0.00'){
    				$re[$i]['array'][$key]['price'] = '面议';
    			}
    		}
    		$i++;
    	}
    	
    	return $re;
    }
    
    /**
     * 特惠商标
     */
    private function trade_price(){
    	//$arr =  M('Item as m')->join('qh_items as s ON s.id = m.groupid')->field('m.id,m.title,m.img,m.tmno,s.id as sid,s.name')->order('m.tmscreening1 desc,m.id desc')->where(array('m.tmpa'=>'1','m.tuijian'=>'2','m.state'=>'1'))->limit(6)->select();
    	$items = M('Items');
    	$where['tmpa'] = '1';
    	$where['state'] = '1';
    	$where['tuijian'] = '2';
    	$arr = M('Item')->where($where)->field('id,groupid,title,introduce,img,tmlimit')->order('tmscreening1 desc,id desc')->limit('8')->select();
    	foreach ($arr as $key=>$value){
    		if($value['price'] > '0'){
    			$arr[$key]['price'] = '￥'.$value['price'];
    		}else{
    			$arr[$key]['price'] = '面议';
    		}
    		$map['state'] = '1';
    		$map['id'] = $value['groupid'];
    		$cate = $items->where($map)->getField('name');
    		$cate = explode('-', $cate);
    		$arr[$key]['category'] = $cate['0'];
    		$img = explode(',',$value['img']);
    		$arr[$key]['img'] = $img['0'];
    	}
    	 
    	//print_r($arr);
    	return $arr;
    }
    
    /**
     * 特惠专利
     */
    private function one_price(){
    	//$arr = M('Item as m')->join('qh_items as s ON s.id = m.groupid')->field('m.id,m.title,m.img,s.id as sid,s.name')->where('m.tmpa=2 and m.state=1 and m.tuijian=2')->limit(6)->order('m.tmscreening1 desc,m.id DESC')->select();
    	$items = M('Items');
    	$where['tmpa'] = '2';
    	$where['state'] = '1';
    	$where['tuijian'] = '2';
    	$arr = M('Item')->where($where)->field('id,groupid,title,introduce,img,tmtype')->order('tmscreening1 desc,id desc')->limit('8')->select();
    	foreach ($arr as $key=>$value){
    		if($value['price'] > '0'){
    			$arr[$key]['price'] = '￥'.$value['price'];
    		}else{
    			$arr[$key]['price'] = '面议';
    		}
    		$arr[$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
    		$img = explode(',',$value['img']);
    		$arr[$key]['img'] = $img['0'];
    	}
    	
    	//print_r($arr);
    	return $arr;
    }
    
    /**
     * 资讯和案例
     * @return 
     */
    private function index_supply(){
    	/* 资讯上半部分 */
    	$where['state'] = '1';
    	$where['hot'] = '2';//首页推荐
    	$where['groupid'] = array('not in','2,3,278');//排除经典案例
    	$re['zxtj'] = M('article')->field('id,title,keywords,img,addtime,date,description')->where($where)->limit(5)->order('addtime desc')->select();//资讯推荐
    	/* 资讯下半部分 */
    	$map['upid'] = '258';
    	$catid = M('Articles')->where($map)->select();
    	$classid=array();
    	foreach ($catid as $key => $value){
    		$classid[] .= $value['id'];
    	}
    	$wh['state'] = '1';
    	$wh['hot'] = array('neq','2');//首页推荐
    	$wh['groupid'] = array(array('not in','2,3,278'),array('not in',implode(',', $classid)),'AND');//排除经典案例
    	$re['zixun'] = M('article')->field('id,title,keywords,addtime,date,description')->where($wh)->limit(10)->order('addtime desc')->select();//最新资讯信息
    	/* 经典案例 */
    	$whr['state'] = '1';
    	$whr['hot'] = '2';//首页推荐
    	$whr['groupid'] = '2';//经典案例
    	$re['anli'] = M('article')->field('id,title,keywords,img,addtime,date,description')->where($whr)->limit(11)->order('addtime desc')->select();//经典案例
    	
    	return $re;
    }
}