<?php
namespace Index\Controller;
class NewsController extends IndexBaseController {
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
		switch (ACTION_NAME){
			case 'focus':
				$catid = '1';//知产新闻
				$type = 'focus/';//知产新闻
				return $this->show_list($catid,$type);
			case 'case':
				$catid = '2';//经典案例
				$type = 'case/';//经典案例
				return $this->show_list($catid,$type);
			case 'interest':
				$catid = '167';//发明趣闻
				$type = 'interest/';//发明趣闻
				return $this->show_list($catid,$type);
			case 'ipbaike':
				$catid = '75';//7号知库
				$type = 'ipbaike/';//7号知库
				return $this->show_list($catid,$type);
			case 'dynamic':
				$catid = '69';//7号动态
				$type = 'dynamic/';//7号动态
				return $this->show_list($catid,$type);
			case 'baijia':
				$catid = '277';//大家名言
				$type = 'dynamic/';//大家名言
				return $this->show_list($catid,$type);
			case 'hot':
				$order = 'views desc';//热门资讯
				$type = 'hot/';//热门资讯
				return $this->show_list($order,$type);
			case 'ontime':
				$order = 'addtime desc';//最新资讯
				$type = 'ontime/';//最新资讯
				return $this->show_list($order,$type);
			default:
				if(is_numeric(ACTION_NAME)){
					if(!strstr($_SERVER['PHP_SELF'], '.html') || !strstr($_SERVER['PHP_SELF'], 'news')){
						Header("HTTP/1.1 301 Moved Permanently");
						Header("Location: /news/".I('path.1')."/".I('path.2').".html");
						exit;
					}
					$_GET['date'] = I('path.1');
					$_GET['id'] = I('path.2');
					return $this->detail();
				} else {
					$this->show_404('页面不存在！！！！');
				}
		}
	}
	
	/***
	 * 更新添加时间和date时间统一
	*/
	public function datetime(){
		$article = M('article');
		$rows = $article->select();
		foreach ($rows as $value){
			//echo $value['date'].':'.strtotime($value['date']).':'.date('Ymd',strtotime($value['date'])).'<br>';
			$data['addtime'] = strtotime($value['date']);
			$where['id'] = $value['id'];
			$article->where($where)->save($data);
		}
		echo '更新成功';
	}
	
	/***
	 * 显示默认首页
	 */
	public function index(){
		if($_SERVER['PHP_SELF']!='/index.php/news/'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /news/");
			exit;
		}
		$data = $this->get_data('5','5','8');
		$data['ad']=$this->index_ad();
		$data['art']=$this->index_art();
		//滑动式的热门分类标识
		$data['nav_type'] = '1';
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['menu'][0]['title'];
		$data['keywords'] = $data['menu'][0]['alt'];
		$data['description'] = $data['menu'][0]['about'];
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/***
	 * 显示列表页
	*/
	public function show_list($catid,$type){
		$article = M('Article');
		$data = $this->get_data('5','','8');
		$data['adv'] = $this->data_ad('183');//资讯列表轮播图
		if($catid=='views desc') {
			$condition = 'state=1 and groupid not in(162,163,164,165,256)';
			$data['catename']['name'] = '点击排行';
			$order = 'views desc';
		}elseif ($catid=='addtime desc'){
			$condition = 'state=1';
			$data['catename']['name'] = '最新资讯';
			$order = 'addtime desc';
		}else{
			$order = 'id desc';
			$condition ='state=1 and groupid in("'.$catid.'")';
			$data['catename'] = M('Articles')->field('id,name,keywords,description')->where('id='.$catid)->find();
		}
		/* 数据分页 */
		$data['count'] = $article->where($condition)->order($order)->count();
		if (empty($data['count'])){
			$this->show_404('该记录已删除或者不存在。');
		}
		$pagesize = '10';
		$page = new \Org\Util\Page($data['count'],$pagesize);//实例化分类页
		if($data['count'] && $data['count']>$pagesize){
			$data['page'] = $page->getPage();//数据分页
		}
		$data['content'] = $article->field('id,date,title,keywords,description,content,img,addtime,views,editor,date')->where($condition)->order($order)->limit($page->firstRow.','.$page->pagesize)->select();
		$data['hot'] = $this->hot_art();//热门资讯
		$data['latest'] = $this->latest_art();//最新资讯
		$data['tm'] = $this->recommended_tm();//推荐商标
		$data['pt'] =  $this->recommended_pt();//推荐专利
		//滑动式的热门分类标识
		$data['nav_type'] = 1;
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['catename']['name'];
		$data['keywords'] = $data['catename']['keywords'];
		$data['description'] = $data['catename']['description'];
		
		$this->assign('data',$data);
		$this->display('show_list');
	}
	
	/***
	 * 显示详情页
	*/
	public function detail(){
		if($_SERVER['REQUEST_URI']=='/news/detail/id/2105.html'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: ".'/news/20151209/2105.html');
			exit;
		}
		if(!is_numeric(ACTION_NAME)){
			$this->show_404('页面不存在！');
		}
		$data = $this->get_data('5','','8');
		$data['adv'] = $this->data_ad('183');//资讯详情轮播图
		$id = I('id');
		$id = full_id(1000, $id);//当id位数不够时补全
		$where = 'w.id="'.$id.'"';
		$date = I('date');
		if($date){
			$where .= ' and w.date="'.$date.'"';
		}
		$data['content'] = M('Article w')->join('qh_articles as c ON w.groupid = c.id ')->field('w.id,c.id as cid,c.upid,c.name,c.ename,w.title,w.keywords,w.description,w.content,w.addtime,w.views')->where($where)->find();
		$map['userid'] = session('user.id');
		$map['type'] = '3';
		$map['goodsid'] = $data['content']['id'];
		$map['state'] = '1';
		$data['collect'] = M('Favorite')->where($map)->find();//获取当前用户是否收藏了本资讯
		if(empty($data['content'])){
			$this->show_404('该记录已删除或者不存在。');
		}
		if($data['content']['upid'] == '258'){
			$data['modeltype'] = 'http://f.qihaoip.com/policy/'.$data['content']['ename'].'/';//知产新闻
		}elseif($data['content']['cid'] == '257'){
			$data['modeltype'] = 'http://f.qihaoip.com/news/';//科技金融新闻动态
		}else {
			switch ($data['content']['cid']){
				case '1':
					$data['modeltype'] = 'http://www.qihaoip.com/news/focus/';//知产新闻
					break;
				case '2':
					$data['modeltype'] = 'http://www.qihaoip.com/news/case/';//经典案例
					break;
				case '167':
					$data['modeltype'] = 'http://www.qihaoip.com/news/interest/';//发明趣闻
					break;
				case '75':
					$data['modeltype'] = 'http://www.qihaoip.com/news/ipbaike/';//7号知库
					break;
				case '69':
					$data['modeltype'] = 'http://www.qihaoip.com/news/dynamic/';//7号动态
					break;
				case '277':
					$data['modeltype'] = 'http://www.qihaoip.com/news/baijia/';//大家名言
					break;
			}
	    } 
		
 		$data['hot']    = $this->hot_art();
		$data['latest'] = $this->latest_art();
		$data['tm']     = $this->recommended_tm();
		$data['pt']     =  $this->recommended_pt();
		$data['prev']   = $this->prev_art($id);
		$data['next']   = $this->next_art($id);
		$data['about']  = $this->rel_info($data['content']['id'],$data['content']['keywords']);//相关资讯
		$data['views']  = $this->click_num($id);
		//滑动式的热门分类标识
		$data['nav_type'] = 1;
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['content']['title'].'-'.$data['content']['name'];
		$data['keywords'] = $data['content']['keywords'];
		$data['description'] = $data['content']['description'];
		
		$this->assign('data',$data);
		$this->display('detail');
	}
	
	/**
	 * 热门资讯
	 */
	public function hot_art(){
		$map['groupid'] = array('not in','3');
		$map['state'] = '1';
		$arr = M('Article')->field('id,title,date')->where($map)->order('views DESC')->limit(10)->select();
		
		return $arr;
	}
	
	/**
	 * 最新资讯
	 */
	public function latest_art(){
		$arr = M('Article')->field('id,title,date')->where('state=1')->order('addtime DESC')->limit(8)->select();
		
		return $arr;
	}
	
	/**
	 * 推荐商标
	 */
	public function recommended_tm(){
		$arr = M('Item as s')->join('qh_items as c ON c.id = s.groupid')->field('s.id,s.groupid,s.tmno,s.title,s.tmlimit,s.price,s.img,s.addtime,c.name')->where('s.state=1 and s.tmpa=1 and s.tuijian=1')->order('tmscreening1 desc')->limit(5)->select();
		foreach ($arr as $key => $value){
			$img = explode(',',$value['img']);
			$arr[$key]['img'] = $img['0'];
			if($value['price'] > '0'){
				$arr[$key]['price'] = '￥'.$value['price'];
			}else{
				$arr[$key]['price'] = '面议';
			}
			$cate = explode('-',$value['name']);
			$arr[$key]['catename'] = $cate['0'];
		}
		
		return $arr;
	}
	
	/**
	 * 推荐专利
	 */
	public function recommended_pt(){
		$items = M('Items');
		$arr = M('Item')->field('id,groupid,groupid2,groupid3,title,price,img,tmtype')->where('state=1 and tmpa=2 and tuijian=1')->order('tmscreening1 desc')->limit('5')->select();
		foreach ($arr as $key => $value){
			$img = explode(',',$value['img']);
			$arr[$key]['img'] = $img['0'];
			if($value['price'] > '0'){
				$arr[$key]['price'] = '￥'.$value['price'];
			}else{
				$arr[$key]['price'] = '面议';
			}
			$arr[$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			if($value['groupid3']){
				$map['id'] = $value['groupid3'];
			}elseif (!$value['groupid3']&&$value['groupid2']){
				$map['id'] = $value['groupid2'];
			}elseif (!$value['groupid3']&&!$value['groupid2']&&$value['groupid']) {
				$map['id'] = $value['groupid'];
			}
			$arr[$key]['category'] = $items->where($map)->getField('name');
		}
		
		return $arr;
	}
	
	/**
	 * 上一篇
	 */
	public function prev_art($id){
		$where['groupid'] = array('not in','3');//排除经典案例
		$where['id'] = array('lt',$id);
		$arr = M('Article')->field('id,title,date')->where($where)->order('id DESC')->find();
		
		return $arr;
	}
	
	/**
	 * 下一篇
	 */
	public function next_art($id){
		$where['groupid'] = array('not in','3');//排除经典案例
		$where['id'] = array('gt',$id);
		$arr = M('Article')->field('id,title,date')->where($where)->order('id ASC')->find();
		
		return $arr;
	}
	
	/**
	 * 相关资讯
	 */
	public function rel_info($id,$keyword){
		$kwd = explode(',',implode(',',explode(' ', trim($keyword))));
		switch (count($kwd)){
			case '1':
				$map['keywords'] = array('like','%'.$kwd[0].'%');
				break;
			case '2':
				$map['keywords'] = array('like',array('%'.$kwd[0].'%','%'.$kwd[1].'%'),'OR');
				break;
			case '3':
				$map['keywords'] = array('like',array('%'.$kwd[0].'%','%'.$kwd[1].'%','%'.$kwd[2].'%'),'OR');
				break;
			case '4':
				$map['keywords'] = array('like',array('%'.$kwd[0].'%','%'.$kwd[1].'%','%'.$kwd[2].'%','%'.$kwd[3].'%'),'OR');
				break;
			case '5':
				$map['keywords'] = array('like',array('%'.$kwd[0].'%','%'.$kwd[1].'%','%'.$kwd[2].'%','%'.$kwd[3].'%','%'.$kwd[4].'%'),'OR');
				break;
		}
		$map['state'] = '1';
		$map['id'] = array('neq',$id);
		$map['groupid'] = array('not in','3');
		$arr = M('Article')->field('id,title,date')->where($map)->order('views desc')->limit('10')->select();
		//echo M('Article')->getLastSql();die;
		return $arr;
	}
	
	/**
	 * 点击数量
	 */
	public function click_num($id){
		$arr = M('Article')->where('id='.$id)->setInc('views');

		return $arr;
	}
	
	private function index_art(){
		$re['art1'] = M('Article')->field('id,title,keywords,content,description,img,addtime,date')->where('state=1 and hot1=2')->order('sort desc,id desc')->limit(6)->select();//资讯首页顶部右上角的新闻
		$re['art2'] = M('Article')->field('id,title,keywords,content,description,img,addtime,date')->where('state=1 and groupid=1')->order('sort desc,id desc')->limit(13)->select();//知产新闻
		$re['art3'] = M('Article')->field('id,title,keywords,content,description,img,addtime,date')->where('state=1 and groupid=2')->order('sort desc,id desc')->limit(9)->select();//经典案例
		$re['art4'] = M('Article')->field('id,title,keywords,content,description,img,addtime,date')->where('state=1 and groupid=69')->order('sort desc,id desc')->limit(10)->select();//7号动态
		$re['art5'] = M('Article')->field('id,title,keywords,content,description,img,addtime,date')->where('state=1 and groupid=75')->order('sort desc,id desc')->limit(10)->select();//7号知库
		$re['art6'] = M('Article')->field('id,title,keywords,content,description,img,addtime,date')->where('state=1 and groupid=167')->order('sort desc,id desc')->limit(10)->select();//发明趣闻
		$re['art7'] = M('Article')->field('id,title,keywords,content,description,img,addtime,date')->where('state=1 and groupid=277')->order('sort desc,id desc')->limit(4)->select();//大家名言
		
		return $re;
	}
	
	/**
	 * 文章中心页的轮播广告
	 */
	private function index_ad(){
		$re['topad'] = M('Ad')->where('groupid = 156 and state=1 and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort desc')->select();
		$re['footad'] = M('Ad')->where('groupid in(154,155) and state=1 and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->limit(4)->order('id desc')->select();
		
		return $re;
	}

}