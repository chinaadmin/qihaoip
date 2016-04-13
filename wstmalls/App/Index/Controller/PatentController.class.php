<?php
namespace Index\Controller;
class PatentController extends IndexBaseController {
	
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 空操作
	 */
	public function _empty(){
		$url_self = $_SERVER['PHP_SELF'];
		$url_self = strtolower($_SERVER['PHP_SELF']);
		if(strstr($url_self, 'show-htm-itemid')){
			$id = str_replace('/index.php/patent/show-htm-itemid-', '', $url_self);
			$id = str_replace('.html', '', $id);
			$id = $id + 20000000;
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /patent/".$id.".html");
			exit;
		}
		switch (ACTION_NAME){
			case 'recommend':
				$tj = '1';//推荐专利
				return $this->show_list('',$tj);
			case 'price':
				$tj = '2';//特惠专利
				return $this->show_list('',$tj);
			default:
				if(is_numeric(ACTION_NAME)){
					if(!strstr($_SERVER['PHP_SELF'], '.html') || !strstr($_SERVER['PHP_SELF'], 'patent')){
						Header("HTTP/1.1 301 Moved Permanently");
						Header("Location: /patent/".ACTION_NAME.".html");
						exit;
					}
					$_GET['id'] = I('path.1');
					return $this->detail();
				}else{
					$list = explode('list',I('path.1'));
					if(stristr(I('path.1'),'list')&&!$list['0']&&is_numeric($list['1'])||empty($list['1'])){
						return $this->show_list($list['1']);
					}else {
						$this->show_404('页面不存在！！！！');
					}
			    }
		}	
	}
	
	/***
	 * 显示默认首页
	 */
	public function index(){
		if(strtolower($_SERVER['PHP_SELF'])!='/index.php/patent/'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /patent/");
			exit;
		}
		$data = $this->get_data(3,'4','11');//公共数据
		$data['banner'] = $this->patent_banner('162');//专利市场banner
		$bigimg = $this->patent_banner('166');//专利市场大图
		$data['items'] = M('items')->where(array('tmpa'=>2,'parentid'=>0))->order(array('sort'=>'desc'))->limit(3)->select();
		$hyad = M('Ad')->field('id,name,img,link,sort')->where(array('state'=>1,'groupid'=>176))->order(array('sort'=>'asc'))->limit(4)->select();//专利市行业分类广告
		$data['wad'] = M('Ad')->field('id,name,img,link,sort')->where(array('state'=>1,'groupid'=>175))->order(array('sort'=>'asc'))->limit(4)->select();//专利市场长条广告
		foreach ($data['items'] as $key=>$value){
			$data['items'][$key]['next'] = M('items')->where(array('tmpa'=>2,'parentid'=>$value['id']))->order(array('sort'=>'desc'))->limit(8)->select();
			$data['items'][$key]['item'] = M('item')->where(array('state'=>'1','groupid'=>$value['id']))->order(array('tmscreening1'=>'desc'))->limit(8)->select();
			$data['items'][$key]['adimg'] = $hyad[$key]['img'];
			$data['items'][$key]['bgimg'] = $bigimg[$key];
		}
		$data['gjitem'] = M('item as i')->field('i.id,i.title,i.price,i.tmno,i.img,s.name,i.price')->where(array('i.tmpa'=>2,'i.tmregarea'=>array('gt',1)))->join('qh_items as s on i.groupid = s.id ')->order(array('tmscreening1'=>'desc'))->limit(12)->select();
		
		$data['mall'] = $this->qihao_mall();//七号商城
		$data['sell'] = $this->patent_sell();//专利求购
		$data['recommend'] = $this->recommended_pt();//推荐专利
		$data['oneprice'] = $this->one_price();//一口价专利
		$data['zcb'] = M('zcb')->order(array('sort'=>'desc'))->select();
		foreach ($data['zcb'] as $key=>$value){
			$item_id = explode(',',$value['item']);
			$where['id'] = array('in',$item_id);
			$data['zcb'][$key]['item'] = M('item')->where($where)->select();	
		}
		$data['zlbk'] =M('article')->where(array('groupid'=>75,'tmpa'=>2))->order(array('addtime'=>'desc'))->limit(4)->select();
		/* 标题title，关键词keywords，描述description */
		$data['isindex'] = TRUE;
		$data['title'] = $data['menu'][0]['title'];
		$data['keywords'] = $data['menu'][0]['alt'];
		$data['description'] = $data['menu'][0]['about'];
		$data['nav_type'] = '3';
		
		//print_r($data['items']);
		$this->assign('data',$data);
		$this->display('index');
	}
	
	
	/***
	 * 显示列表页
	*/
	public function show_list($catid='',$th=''){
		$url = explode('?',__SELF__);
		if(($url[1]&&$url[0] =='/patent/show_list/catid/'.$catid)||($url[1]&&$url[0] == '/patent/show_list/catid/'.$catid.'.html')||($url[1]&&$url[0] == '/index.php/patent/show_list/catid/'.$catid)||($url[1]&&$url[0] == '/index.php/patent/show_list/catid/'.$catid.'.html')){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /patent/list".$catid.'.html?'.$url[1]);
			exit;
		}elseif((!$url[1]&&$url[0] =='/patent/show_list/catid/'.$catid)||(!$url[1]&&$url[0] == '/patent/show_list/catid/'.$catid.'.html')||(!$url[1]&&$url[0] == '/index.php/patent/show_list/catid/'.$catid)||(!$url[1]&&$url[0] == '/index.php/patent/show_list/catid/'.$catid.'.html')||(!$url[1]&&$url[0] == '/index.php/patent/list'.$catid.'.html')||(!$url[1]&&$url[0] == '/index.php/Patent/list'.$catid.'.html')||($url[1]&&$url[0] == '/index.php/patent/list'.$catid.'.html')||($url[1]&&$url[0] == '/index.php/Patent/list'.$catid.'.html')){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /patent/list".$catid.'.html');
			exit;
		}elseif(!$url[1]&&($url[0] == '/index.php/patent/show_list')){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /patent/list.html");
			exit;
		}
		$data = $this->get_data('3','','11');//公共数据
		$data['catid'] = $catid;//获取id
		$item = M('Item as i');
		$items = M('Items');
		$favorite = M('Favorite');
		$shop = M('Shop');
		
		/**筛选条件---开始**/
		//获取国家筛选条件
		if(I('country')){
			$where['tmregarea'] = I('country');
		}
		//获取一级分类筛选条件
		if(I('onecate')){
			$where['groupid'] = I('onecate');	
		}elseif($catid){
			//获取网站地图传过来的参数
			$category = $items->field('id,name,level')->where(array('id'=>$catid))->find();
			if($category['level'] == '1'){
				$data['onecatename']['name'] = $category['name'];
				$data['groupid'] = $category['id'];
				$where['groupid'] = $category['id'];
			}elseif ($category['level'] == '2'){
				$data['twocatename']['name'] = $category['name'];
				$data['groupid2'] = $category['id'];
				$where['groupid2'] = $category['id'];
			}elseif ($category['level'] == '3'){
				$data['threecatename']['name'] = $category['name'];
				$data['groupid3'] = $category['id'];
				$where['groupid3'] = $category['id'];
			}
			$whr['groupid'] = $catid;
			$whr['groupid2'] = $catid;
			$whr['groupid3'] = $catid;
			$whr['_logic'] = 'or';
			$where['_complex'] = $whr;
		}elseif($th){
			//获取特惠专区筛选条件
			$where['i.tuijian'] = $th;
		}
		if((!I('get.')||(count(I('get.'))=='1'&&I('get.p')))&&!$catid){
			$where['groupid'] = '83';//默认分类
		}
		if($where['groupid']){
			$data['groupid'] = $where['groupid'];//一级分类
		}
		//获取二级分类筛选条件
		if(I('twocate')){
			$where['groupid2'] = I('twocate');
			$data['groupid2'] = $where['groupid2'];//二级分类
		}
		
		//获取三级分类筛选条件
		if(I('threecate')){
			$where['groupid3'] = I('threecate');//三级分类
			$data['groupid3'] = $where['groupid3'];
			$data['groupid2'] = $items->where(array('id'=>$where['groupid3']))->getField('parentid');//二级分类id
			$data['twocatename'] = $items->field('id,name')->where(array('id'=>$data['groupid2']))->find();//二级分类信息
			$data['groupid'] = $items->where(array('id'=>$data['groupid2']))->getField('parentid');//一级分类id
			$data['onecatename'] = $items->field('id,name')->where(array('id'=>$data['groupid']))->find();//一级分类信息	
		}
		//获取专利类型筛选条件
		if(I('type')){
			$where['tmtype'] = I('type');//专利类型
		}
		
		//获取专利权人类型筛选条件
		if(I('tee')){
			$where['mastertype'] = I('tee');//专利权人类型
		}
		
		//获取价格筛选条件
		$minPrice = I('minPrice');//最小价格
		$maxPrice = I('maxPrice');//最大价格
		if(($minPrice=='0'&&$maxPrice)||($minPrice&&$maxPrice)){
			$where['price'] = array(array('gt',$minPrice),array('elt',$maxPrice),'AND');
		}elseif (!$minPrice&&$maxPrice=='面议'){
			$where['price'] = '0';
		}elseif (!$minPrice&&$maxPrice){
			$maxPrice = preg_replace('/\D/s', '', $maxPrice);//截取数字
			$where['price'] = array('gt',$maxPrice);
		}
		if(I('shop')){
			$where['p.id'] = I('shop');//商城id
		}
		
		//获取排序筛选条件
		$sortType = I('sortType');
		$isAsc = I('isAsc');
		if($sortType=='1'&&$isAsc=='1'){
			$order = 'price asc';
		}elseif ($sortType=='2'&&$isAsc=='1'){
			$order = 'views asc';
		}elseif ($sortType=='1'&&!$isAsc){
			$order = 'price desc';
		}elseif ($sortType=='2'&&!$isAsc){
			$order = 'views desc';
		}else{
			$order = 'id';
		}
		
		$where['i.tmpa'] = '2';//类型
		$where['i.state'] = '1';//状态
		/**筛选条件---结束**/
		
		/**已选择条件--开始**/
		//国家
		$data['countryname'] = C('ITEM_AREA_TYPE')[$where['tmregarea']];
		//行业
		//一级分类
		if($where['groupid']){
			$data['onecatename'] = $items->field('id,name')->where(array('id'=>$where['groupid']))->find();
		}
		//二级分类
		if($where['groupid2']){
			$data['twocatename'] = $items->field('id,name')->where(array('id'=>$where['groupid2']))->find();
		}
		//三级分类
		if($where['groupid3']){
			$data['threecatename'] = $items->field('id,name')->where(array('id'=>$where['groupid3']))->find();
		}
		//类型
		$data['typename'] = C('ITEM_PA_TYPE')[$where['tmtype']];
		//专利权人
		$data['teename'] = C('ITEM_MASTER_TYPE')[$where['mastertype']];
		//价格
		if($minPrice&&$maxPrice){
			$price = $minPrice.'-'.$maxPrice;
		}elseif(!$minPrice&&$maxPrice){
			$price = $maxPrice;
		}
		$data['pricename'] = $price;
		//7号商城
		$data['shopname'] = $shop->where(array('id'=>$where['p.id']))->getField('name');
		/**已选择条件--结束**/
		
		/**默认显示数据---开始**/
		//国家
		$data['country'] = C('ITEM_AREA_TYPE');
		
		//行业
		/*一级*/
		$wh['tmpa'] = '2';
		$wh['state'] = '1';
		$wh1['_complex'] = $wh;
		$wh1['_logic'] = 'AND';
		$wh1['level'] = '1';
		$data['onecate'] = $items->where($wh1)->select();
		
		/*二级*/
		$wh2['_complex'] = $wh;
		$wh2['_logic'] = 'AND';
		$wh2['level'] = '2';
		if($where['groupid']){
			$wh2['parentid'] = $where['groupid'];
		}
		$data['twocate'] = $items->where($wh2)->select();
		foreach ($data['twocate'] as $key => $value){
			$pid[] .= $value['id'];
		}

		/*三级*/
		$wh3['_complex'] = $wh;
		$wh3['_logic'] = 'AND';
		$wh3['level'] = '3';
		if($where['groupid2']){
			$wh3['parentid'] = $where['groupid2'];
		}elseif ($pid){
			$wh3['parentid'] = array('in',implode(',',$pid));
		}else{
			$wh3['parentid'] = '';
		}
		$data['threecate'] = $items->where($wh3)->select();
		
		//先点击三级分类处理效果
		if($where['groupid3']&&!$where['groupid2']&&!$where['groupid']){
			$twocate = $items->where(array('level'=>'3','id'=>$where['groupid3']))->getField('parentid');//获得二级分类id
			$onecate = $items->where(array('level'=>'2','id'=>$twocate))->getField('parentid');//获得一级分类id
			
			$data['groupid'] = $items->where(array('level'=>'1','id'=>$onecate))->getField('id');//获取一级分类id
			$data['groupid2'] = $items->where(array('level'=>'2','id'=>$twocate))->getField('id');//获取二级分类id
			
			$data['twocate'] = $items->where(array('level'=>'2','parentid'=>$onecate))->select();//获取同级分类信息
			$data['threecate'] = $items->where(array('parentid'=>$twocate))->select();//获取同级分类信息
		}
		
		//先点击二级分类处理效果
		if($where['groupid2']&&!$where['groupid3']&&!$where['groupid']){
			$onecate = $items->where(array('level'=>'2','id'=>$where['groupid2']))->getField('parentid');//获得一级分类id
			$data['groupid'] = $items->where(array('level'=>'1','id'=>$onecate))->getField('id');//获取二级的一级分类
			$data['twocate'] = $items->where(array('level'=>'2','parentid'=>$onecate))->select();//获取二级同级分类信息
		}
		
		//类型
		$data['tmtype'] = C('ITEM_PA_TYPE');
		$data['tmtype']['0'] = '全部';
		ksort($data['tmtype']);
		
		//专利权人
		$data['tee'] = C('ITEM_MASTER_TYPE');
		$data['tee']['0'] = '全部';
		ksort($data['tee']);
		
		//价格
		$data['price'] = array(
			'0'=>array(
					'maxPrice'=>'全部',
				),
			'1'=>array(
					'maxPrice'=>'面议',
				),
			'2'=>array(
					'minPrice'=>'0',
					'maxPrice'=>'2000',
				),
			'3'=>array(
					'minPrice'=>'2000',
					'maxPrice'=>'10000',
				),
			'4'=>array(
					'minPrice'=>'10000',
					'maxPrice'=>'50000',
				),
			'5'=>array(
					'minPrice'=>'50000',
					'maxPrice'=>'100000',
			),
			'6'=>array(
					'maxPrice'=>'100000以上',
			),
		);
		//7号商城
		$wh4['state'] = '3';
		$data['shop'] = M('Shop')->where($wh4)->select();
		/**默认显示数据---结束**/
		
		//获取数据条数
		$data['count'] = $item->join('left join qh_items as s ON s.id = i.groupid')->join('left join qh_shop p ON p.id = i.userid')->where($where)->count();
		$pagesize = '20';
		$page = new \Org\Util\Page($data['count'],$pagesize);//实例化分类页
		if($data['count'] && $data['count']>$pagesize){
			$data['page'] = $page->getPage();//数据分页
		}
		//获取筛选后的数据
		//$data['goods'] = $item->join('left join qh_items as s ON s.id = i.groupid')->join('left join qh_shop p ON p.id = i.userid')->field('i.id,i.tmpa,i.userid,i.groupid,i.groupid2,i.groupid3,i.title,i.price,i.img,i.tmtype,s.id as catid,s.name,p.id as shopid,p.name as shopname,p.state as shopstate')->where($where)->order($order)->limit($page->firstRow.','.$page->pagesize)->select();
		$data['goods'] = $item->join('left join qh_shop p ON p.id = i.userid')->field('i.id,i.tmpa,i.userid,i.groupid,i.groupid2,i.groupid3,i.title,i.price,i.img,i.tmtype,p.id as shopid,p.name as shopname,p.state as shopstate')->where($where)->order($order)->limit($page->firstRow.','.$page->pagesize)->select();
		foreach ($data['goods'] as $key => $value){
			if($value['groupid3']){
				$map['id'] = $value['groupid3'];
			}elseif (!$value['groupid3']&&$value['groupid2']){
				$map['id'] = $value['groupid2'];
			}elseif (!$value['groupid3']&&!$value['groupid2']&&$value['groupid']) {
				$map['id'] = $value['groupid'];
			}
			$data['goods'][$key]['category'] = $items->field('id,name')->where($map)->find();
			$wh['userid'] = session('user.id');//收藏用户id
			$wh['goodsid'] = $value['id'];//收藏商品id
			$wh['type'] = '2';//收藏类型
			$wh['state'] = '1';//收藏状态
			$data['goods'][$key]['scid'] = $favorite->where($wh)->getField('id');
			if($value['price'] > '0'){
				$data['goods'][$key]['price'] = '￥'.$value['price'];
			}else {
				$data['goods'][$key]['price'] = '面议';
			}
			$data['goods'][$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			if($value['img']){
				$img = explode(',', $value['img']);
				$data['goods'][$key]['img'] = $img['0'];
			}else{
				$data['goods'][$key]['img'] = '/Upload/Img/11/27/0947478956.jpg';
			}
		}
		//print_r($data['goods']);
		//滑动式的热门分类标识
		$data['nav_type'] = 3;
		//title，关键词，描述
		if($data['onecatename']['name']){
			$data['seo']['title'] = $data['onecatename']['name'];
		}elseif ($data['twocatename']['name']){
			$data['seo']['title'] = $data['twocatename']['name'];
		}elseif ($data['threecatename']['name']){
			$data['seo']['title'] = $data['threecatename']['name'];
		}else{
			$data['seo']['title'] = $data['goods']['title'];
		}
		$data['title'] = $data['seo']['title'].'专利技术转让-专利交易列表';
		$data['keywords'] = $data['seo']['title'].'专利转让 专利交易列表 '.$data['seo']['title'].'专利分类';
		$data['description'] = $data['seo']['title'].'专利技术转让列表，7号网专利经纪人为您提供精准专利匹配，拥有国内外的'.$data['seo']['title'].'类的发明专利、实用新型专利、外观设计专利的转让，让为专利权人提供专利技术转移流程，专利技术推广服务，服务热线4008897080';
		
		$this->assign('data',$data);
		$this->display('show_list');
	}
	
	/***
	 * 国外专利
	*/
	public function foreign(){
		$data = $this->get_data('3','','11');//公共数据
		$item = M('Item as i');
		$items = M('Items');
		$favorite = M('Favorite');
		$shop = M('Shop');
		
		/**筛选条件---开始**/
		//获取国家筛选条件
		if(I('country')){
			$where['tmregarea'] = I('country');
		}else{
			$where['tmregarea'] = array('egt','3');//国外商品
		}
		//获取一级分类筛选条件
		if(I('onecate')){
			$where['groupid'] = I('onecate');
		}
		if((!I('get.')||(count(I('get.'))=='1'&&I('get.p')))){
			$where['groupid'] = '83';//默认分类
		}
		if($where['groupid']){
			$data['groupid'] = $where['groupid'];//一级分类
		}
		//获取二级分类筛选条件
		if(I('twocate')){
			$where['groupid2'] = I('twocate');
			$data['groupid2'] = $where['groupid2'];//二级分类
		}
		
		//获取三级分类筛选条件
		if(I('threecate')){
			$where['groupid3'] = I('threecate');//三级分类
			$data['groupid3'] = $where['groupid3'];
			$data['groupid2'] = $items->where(array('id'=>$where['groupid3']))->getField('parentid');//二级分类id
			$data['twocatename'] = $items->field('id,name')->where(array('id'=>$data['groupid2']))->find();//二级分类信息
			$data['groupid'] = $items->where(array('id'=>$data['groupid2']))->getField('parentid');//一级分类id
			$data['onecatename'] = $items->field('id,name')->where(array('id'=>$data['groupid']))->find();//一级分类信息
		}
		//获取专利类型筛选条件
		if(I('type')){
			$where['tmtype'] = I('type');//专利类型
		}
		
		//获取专利权人类型筛选条件
		if(I('tee')){
			$where['mastertype'] = I('tee');//专利权人类型
		}
		
		//获取价格筛选条件
		$minPrice = I('minPrice');//最小价格
		$maxPrice = I('maxPrice');//最大价格
		if(($minPrice=='0'&&$maxPrice)||($minPrice&&$maxPrice)){
			$where['price'] = array(array('gt',$minPrice),array('elt',$maxPrice),'AND');
		}elseif (!$minPrice&&$maxPrice=='面议'){
			$where['price'] = '0';
		}elseif (!$minPrice&&$maxPrice){
			$maxPrice = preg_replace('/\D/s', '', $maxPrice);//截取数字
			$where['price'] = array('gt',$maxPrice);
		}
		if(I('shop')){
			$where['p.id'] = I('shop');//商城id
		}
		
		//获取排序筛选条件
		$sortType = I('sortType');
		$isAsc = I('isAsc');
		if($sortType=='1'&&$isAsc=='1'){
			$order = 'price asc';
		}elseif ($sortType=='2'&&$isAsc=='1'){
			$order = 'views asc';
		}elseif ($sortType=='1'&&!$isAsc){
			$order = 'price desc';
		}elseif ($sortType=='2'&&!$isAsc){
			$order = 'views desc';
		}else{
			$order = 'id';
		}
		
		$where['i.tmpa'] = '2';//类型
		$where['i.state'] = '1';//状态
		/**筛选条件---结束**/
		
		/**已选择条件--开始**/
		//国家
		$data['countryname'] = C('ITEM_AREA_TYPE')[$where['tmregarea']];
		
		//行业
		//一级分类
		if($where['groupid']){
			$data['onecatename'] = $items->field('id,name')->where(array('id'=>$where['groupid']))->find();
		}
		//二级分类
		if($where['groupid2']){
			$data['twocatename'] = $items->field('id,name')->where(array('id'=>$where['groupid2']))->find();
		}
		//三级分类
		if($where['groupid3']){
			$data['threecatename'] = $items->field('id,name')->where(array('id'=>$where['groupid3']))->find();
		}
		//类型
		$data['typename'] = C('ITEM_PA_TYPE')[$where['tmtype']];
		//专利权人
		$data['teename'] = C('ITEM_MASTER_TYPE')[$where['mastertype']];
		//价格
		if($minPrice&&$maxPrice){
			$price = $minPrice.'-'.$maxPrice;
		}elseif(!$minPrice&&$maxPrice){
			$price = $maxPrice;
		}
		$data['pricename'] = $price;
		//7号商城
		$data['shopname'] = $shop->where(array('id'=>$where['p.id']))->getField('name');
		/**已选择条件--结束**/
		
		/**默认显示数据---开始**/
		//国家
		$data['country'] = C('ITEM_AREA_TYPE');
		unset($data['country']['1']);
		unset($data['country']['2']);
		//行业
		/*一级*/
		$wh['tmpa'] = '2';
		$wh['state'] = '1';
		$wh1['_complex'] = $wh;
		$wh1['_logic'] = 'AND';
		$wh1['level'] = '1';
		$data['onecate'] = $items->where($wh1)->select();
		
		/*二级*/
		$wh2['_complex'] = $wh;
		$wh2['_logic'] = 'AND';
		$wh2['level'] = '2';
		if($where['groupid']){
			$wh2['parentid'] = $where['groupid'];
		}
		$data['twocate'] = $items->where($wh2)->select();
		foreach ($data['twocate'] as $key => $value){
			$pid[] .= $value['id'];
		}
		
		/*三级*/
		$wh3['_complex'] = $wh;
		$wh3['_logic'] = 'AND';
		$wh3['level'] = '3';
		if($where['groupid2']){
			$wh3['parentid'] = $where['groupid2'];
		}elseif($pid){
			$wh3['parentid'] = array('in',implode(',',$pid));
		}else{
			$wh3['parentid'] = '';
		}
		$data['threecate'] = $items->where($wh3)->select();
		//先点击三级分类处理效果
		if($where['groupid3']&&!$where['groupid2']&&!$where['groupid']){
			$twocate = $items->where(array('level'=>'3','id'=>$where['groupid3']))->getField('parentid');//获得二级分类id
			$onecate = $items->where(array('level'=>'2','id'=>$twocate))->getField('parentid');//获得一级分类id
				
			$data['groupid'] = $items->where(array('level'=>'1','id'=>$onecate))->getField('id');//获取一级分类id
			$data['groupid2'] = $items->where(array('level'=>'2','id'=>$twocate))->getField('id');//获取二级分类id
				
			$data['twocate'] = $items->where(array('level'=>'2','parentid'=>$onecate))->select();//获取同级分类信息
			$data['threecate'] = $items->where(array('parentid'=>$twocate))->select();//获取同级分类信息
		}
		
		//先点击二级分类处理效果
		if($where['groupid2']&&!$where['groupid3']&&!$where['groupid']){
			$onecate = $items->where(array('level'=>'2','id'=>$where['groupid2']))->getField('parentid');//获得一级分类id
			$data['groupid'] = $items->where(array('level'=>'1','id'=>$onecate))->getField('id');//获取二级的一级分类
			$data['twocate'] = $items->where(array('level'=>'2','parentid'=>$onecate))->select();//获取二级同级分类信息
		}
		
		//类型
		$data['tmtype'] = C('ITEM_PA_TYPE');
		$data['tmtype']['0'] = '全部';
		ksort($data['tmtype']);
		
		//专利权人
		$data['tee'] = C('ITEM_MASTER_TYPE');
		$data['tee']['0'] = '全部';
		ksort($data['tee']);
		
		//价格
		$data['price'] = array(
				'0'=>array(
						'maxPrice'=>'全部',
				),
				'1'=>array(
						'maxPrice'=>'面议',
				),
				'2'=>array(
						'minPrice'=>'0',
						'maxPrice'=>'2000',
				),
				'3'=>array(
						'minPrice'=>'2000',
						'maxPrice'=>'10000',
				),
				'4'=>array(
						'minPrice'=>'10000',
						'maxPrice'=>'50000',
				),
				'5'=>array(
						'minPrice'=>'50000',
						'maxPrice'=>'100000',
				),
				'6'=>array(
						'maxPrice'=>'100000以上',
				),
		);
		//7号商城
		$wh4['state'] = '3';
		$data['shop'] = M('Shop')->where($wh4)->select();
		/**默认显示数据---结束**/
		
		//获取数据条数
		$data['count'] = $item->join('left join qh_shop p ON p.id = i.userid')->where($where)->count();
		//echo $item->getLastSql();
		$pagesize = '20';
		$page = new \Org\Util\Page($data['count'],$pagesize);//实例化分类页
		if($data['count'] && $data['count']>$pagesize){
			$data['page'] = $page->getPage();//数据分页
		}
		//获取筛选后的数据
		//$data['goods'] = $item->join('left join qh_items as s ON s.id = i.groupid')->join('left join qh_shop p ON p.id = i.userid')->field('i.id,i.tmpa,i.userid,i.groupid,i.groupid2,i.groupid3,i.title,i.price,i.img,i.tmtype,s.id as catid,s.name,p.id as shopid,p.name as shopname,p.state as shopstate')->where($where)->order($order)->limit($page->firstRow.','.$page->pagesize)->select();
		$data['goods'] = $item->join('left join qh_shop p ON p.id = i.userid')->field('i.id,i.tmpa,i.userid,i.groupid,i.groupid2,i.groupid3,i.title,i.price,i.img,i.tmtype,p.id as shopid,p.name as shopname,p.state as shopstate')->where($where)->order($order)->limit($page->firstRow.','.$page->pagesize)->select();
		foreach ($data['goods'] as $key => $value){
			if($value['groupid3']){
				$map['id'] = $value['groupid3'];
			}elseif (!$value['groupid3']&&$value['groupid2']){
				$map['id'] = $value['groupid2'];
			}elseif (!$value['groupid3']&&!$value['groupid2']&&$value['groupid']){
				$map['id'] = $value['groupid'];
			}
			$data['goods'][$key]['category'] = $items->field('id,name')->where($map)->find();
			$wh['userid'] = session('user.id');//收藏用户id
			$wh['goodsid'] = $value['id'];//收藏商品id
			$wh['type'] = '2';//收藏类型
			$wh['state'] = '1';//收藏状态
			$data['goods'][$key]['scid'] = $favorite->where($wh)->getField('id');
			if($value['price'] > '0'){
				$data['goods'][$key]['price'] = '￥'.$value['price'];
			}else {
				$data['goods'][$key]['price'] = '面议';
			}
			$data['goods'][$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			if($value['img']){
				$img = explode(',', $value['img']);
				$data['goods'][$key]['img'] = $img['0'];
			}else{
				$data['goods'][$key]['img'] = '/Upload/Img/11/27/0947478956.jpg';
			}
		}
		
		//滑动式的热门分类标识
		$data['nav_type'] = 3;
		//title，关键词，描述
		if($data['onecatename']['name']){
			$data['seo']['title'] = $data['onecatename']['name'];
		}elseif ($data['twocatename']['name']){
			$data['seo']['title'] = $data['twocatename']['name'];
		}elseif ($data['threecatename']['name']){
			$data['seo']['title'] = $data['threecatename']['name'];
		}else{
			$data['seo']['title'] = $data['goods']['title'];
		}
		$data['title'] = '国外专利技术转让-专利交易列表';
		$data['keywords'] = '国外专利列表 专利交易列表 国外专利分类';
		$data['description'] = '汇聚国外专利技术转让资源列表一览，7号网专利经纪人为您提供精准专利匹配，提供优质的国外的发明专利、实用新型专利、外观设计专利的转让，让为专利权人提供专利技术转移流程，国外专利技术推广服务，服务热线4008897080';
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/***
	 * 显示详情页
	*/
	public function detail(){
		$actname = ACTION_NAME;
		$actname = strtolower($actname);
		if($actname=='detail'){
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: /patent/".I('id',0).".html");
			exit;
		}
		$data = $this->get_data(3);
		$data['pacategory'] = $this->hot_category();//专利市场热门分类
		$data['nav_type'] = 3;
		$uid = I('id',0);
		$uid=full_id(20000000, $uid);//当id位数不够时补全
		$data['ptinfo'] = $this->patent_info($uid);//专利市场的详细信息
		$ptno = M ('patentHousekeeper', 'qh_', 'mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8');
		$data['gjptf'] = $ptno->where(array('patentnum'=>$data['ptinfo']['tmno']))->find();
		//print_r($data['ptinfo']);
		if(!$data['ptinfo']){
			return $this->show_404();
		}
		$data['views'] = $this->views_num($uid);//浏览次数
		$data['seller'] = $this->get_member($data['ptinfo']['userid']);//卖家信息
		$data['shop'] = $this->seller_shop($data['seller']['id']);//个人商城
		if($data['seller']['aid']){
			$data['agent'] = $this->get_member($data['seller']['aid']);
		}//经纪人信息
		$data['readpt'] = $this->read_pt($uid);//浏览过的专利
		$data['interest'] = $this->interest_pt();//感兴趣的专利
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['ptinfo']['title'].$data['ptinfo']['tmtype'].'专利转让-'.$data['ptinfo']['name'];
		$data['keywords'] = $data['ptinfo']['title'].'专利转让,'.$data['ptinfo']['tmtype'].'专利转让,'.$data['ptinfo']['name'].'专利';
		$data['description'] = $data['ptinfo']['title'].'专利转让,专利申请号'.$data['ptinfo']['tmno'].'专利转让,上7号网专利转让技术供求平台,'.$data['ptinfo']['name'].'专利技术自由交易！';
	
		$this->assign('data',$data);
		$this->display('detail');
	}
	
	/**
	 * 热门分类
	 */
	private function hot_category(){
		$arr = M('Items')->field('id,name')->where('state=1 and tmpa=2 and parentid=0')->order('sort DESC')->select();
		foreach ($arr as $key => $value){
			$arr[$key]['subclass'] = M('Items')->field('id,name')->where('state=1 and parentid ='.$value['id'])->order('sort DESC')->select();
			if(empty($arr[$key]['subclass']))unset($arr[$key]['subclass']);
		}
		unset($arr[count($arr)-1]);
		return $arr;
	}
	
	/**
	 * 专利市场幻灯片
	 */
	private function patent_banner($id){
		$arr = M('Ad')->field('id,name,img,link,sort')->where('state=1 and groupid='.$id.' and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort,id DESC')->limit(4)->select();
		
		return $arr;
	}
	
	/**
	 * 专利市场热门企业或高校或个人
	 */
	private function hot_banner($id){
		$arr = M('Ad')->field('id,name,img,link')->where('state=1 and groupid='.$id.' and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort,id DESC')->limit(6)->select();
		
		return $arr;
	}
	
	/**
	 * 获取 专利首页，七号商城商标
	 */
	private function qihao_mall(){
		$arr = M('Shop')->field('id,name,logo')->where('state=3')->order('tuijian desc,sort desc,id desc')->limit(6)->select();
		
		return $arr;
	}
	
	/**
	 * 专利求购
	 */
	private function patent_sell(){
		$arr = M('Supply as s')->join('qh_member as m ON m.id = s.userid')->join('qh_items as i on i.id = s.groupid')->field('s.id,s.uid,s.userid,s.endtime,s.groupid,s.title,s.pricemax,m.qq,i.name')->where('s.tmpa=2 and s.state=1 and (s.endtime = 0 or s.endtime >'.time().')')->order('s.addtime desc,s.id desc')->limit(4)->select();
		
		return $arr;
	}
	
	/**
	 * 推荐专利
	 */
	private function recommended_pt(){
		$arr = M('Item')->field('id,title,img')->where('tmpa=2 and state=1 and tuijian=1')->limit(11)->order('tmscreening1 desc,id DESC')->select();
	
		return $arr;
	}
	
	/**
	 * 一口价专利
	 */
	private function one_price(){
		$arr = M('Item')->field('id,title,tmtype,tmregend')->where('tmpa=2 and state=1 and tuijian=2')->limit(11)->order('tmscreening1 desc,id DESC')->select();
	
		return $arr;
	}
	
	/**
	 * 企业专利专区
	 */
	private function enterprise_pt(){
		$arr = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmno,c.name')->where('z.state=1 and z.tmpa=2 and z.mastertype=1')->order('tmscreening1 desc,id DESC')->limit(10)->select();
		
		return $arr;
	}
	
	/**
	 * 高校科研专利专区
	 */
	private function university_pt(){
		$arr = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmno,c.name')->where('z.state=1 and z.tmpa=2 and z.mastertype=3')->order('tmscreening1 desc,id desc')->limit(10)->select();
	
		return $arr;
	}
	
	/**
	 * 个人专利专区
	 */
	private function personal_pt(){
		$arr = M('Item as z')->join('qh_items as c ON c.id = z.groupid')->field('z.id,z.groupid,z.title,z.introduce,z.price,z.img,z.addtime,z.tmno,c.name')->where('z.state=1 and z.tmpa=2 and z.mastertype=2')->order('tmscreening1 desc,id DESC')->limit(10)->select();
	
		return $arr;
	}
	
	/**
	 * 专利分类
	 */
	private function patent_category(){
		$arr = M('Items')->field('id,parentid,name')->where('tmpa=2 and state=1 and parentid=0')->order('sort DESC')->select();
	
		return $arr;
	}
	
	/**
	 * 7号商城
	 */
	private function brand_shop(){
		$arr = M('Shop')->field('id,name')->where('state=3')->order('tuijian desc,sort desc')->limit(7)->select();
		
		return $arr;
	}
	
	
	/**
	 * 专利详细信息
	 */
	private function patent_info($id){
		$items = M('Items');
		$arr = M('Item')->where('tmpa=2 and id='.$id)->find();
		if($arr){
			$arr['tmtype'] = C('ITEM_PA_TYPE')[$arr['tmtype']];
			$arr['tmtradeway'] = explode(',',$arr['tmtradeway']);
			foreach ($arr['tmtradeway'] as $key => $value){
				$arr['tmtradeway'][$key] = C('ITEM_SELL_TYPE')[$value];
			}
			if($arr['groupid3']){
				$map['id'] = $arr['groupid3'];
			}elseif (!$arr['groupid3']&&$arr['groupid2']){
				$map['id'] = $arr['groupid2'];
			}elseif (!$arr['groupid3']&&!$arr['groupid2']&&$arr['groupid']) {
				$map['id'] = $arr['groupid'];
			}
			$arr['category'] = $items->field('id,name')->where($map)->find();
			$pa_name = $items->field('id,name')->where(array('id'=>$arr['groupid']))->find();
			$arr['name'] = $pa_name['name'];
			$wh['userid'] = session('user.id');//收藏用户id
			$wh['goodsid'] = $arr['id'];//收藏商品id
			$wh['type'] = '2';//收藏类型
			$wh['state'] = '1';//收藏状态
			$arr['scid'] = M('Favorite')->where($wh)->getField('id');
		}
		return $arr;
	}
	
	/**
	 * 浏览次数
	 */
	public function views_num($id){
		$arr = M('Item')->where('id='.$id)->setInc('views');
		//$arr = M('Article')->where('views='.views+1)->save();
		
		return $arr;
	}

	/**
	 * 专利卖家信息商店
	 */
	private function seller_shop($id){
		if($id){
			$arr = M('Shop')->field('id,name')->where('state=3 and id='.$id)->find();
			return $arr;
		} else {
			return array();
		}
		
	}
	
	/**
	 * 浏览过的专利
	 */
	public function read_pt($id){
		$content_id = array();//1.创建一个数组
		$content_id[] = $id; //2.对接收到的ID插入到数组中去
		if(isset($_COOKIE['content_id'])){//3.判定cookie是否存在,第一次不存在(如果存在的话)
			$now_content = str_replace("\\","",$_COOKIE['content_id']);//(4).您可以查看下cookie,此时如果unserialize的话出问题的,我把里面的斜杠去掉了。
			$now = unserialize($now_content); //(5).把cookie 中的serialize生成的字符串反实例化成数组
			foreach($now as $n=>$w) {//(6).里面很多元素,所以我要foreach 出值
				if(!in_array($w,$content_id)){//(7).判定这个值是否存在,如果存在的化我就不插入到数组里面去;
					$content_id[] = $w; //(8).插入到数组
				}
			}
			$content= serialize($content_id); //(9).把数组实例化成字符串
			setcookie("content_id",$content, time()+3600*24,"/"); //(10).插入到cookie
		}else {
			$content= serialize($content_id);//4.把数组实例化成字符串
			setcookie("content_id",$content, time()+3600*24,"/"); //5.生成cookie
		}
		//print_r($_COOKIE['content_id']);
		//$getcontent = unserialize(str_replace("\\", "", $_COOKIE['content_id']));
		$getcontent = unserialize($_COOKIE['content_id']);
		if(count($getcontent)<6){
			$stj = M('item')->where(array('tmpa'=>2,'tmscreening'=>2))->limit(10-count($getcontent))->select();
		}
		foreach ($stj as $key => $value){
			$getcontent[] = $value['id'];
		}
		$favorite = M('Favorite');
		foreach($getcontent as $row => $r){
			$items = M('Items');
			$arr[$row] = M('Item')->where('tmpa=2 and id='.$r)->find();
			$arr[$row]['tmtype'] = C('ITEM_PA_TYPE')[$arr[$row]['tmtype']];
			if($arr[$row]['groupid3']){
				$map['id'] = $arr[$row]['groupid3'];
			}elseif (!$arr[$row]['groupid3']&&$arr[$row]['groupid2']){
				$map['id'] = $arr[$row]['groupid2'];
			}elseif (!$arr[$row]['groupid3']&&!$arr[$row]['groupid2']&&$arr[$row]['groupid']) {
				$map['id'] = $arr[$row]['groupid'];
			}
			$arr[$row]['category'] = $items->field('id,name')->where($map)->find();
			$wh['userid'] = session('user.id');//收藏用户id
			$wh['goodsid'] = $arr[$row]['id'];//收藏商品id
			$wh['type'] = '2';//收藏类型
			$wh['state'] = '1';//收藏状态
			$arr[$row]['scid'] = $favorite ->where($wh)->getField('id');
			$res = M('shop')->field('id,name')->where(array('id'=>$arr[$row]['userid'],'state'=>3))->find();
			if($res) $arr[$row]['shop'] = $res;
		}
		
		return $arr;
	}
	
	/**
	 * 感兴趣的专利
	 */
	private function interest_pt(){
		$favorite = M('Favorite');
		$items = M('Items');
		$arr = M('Item')->where('state=1 and tmpa=2')->order('rand()')->limit(10)->select();
		foreach($arr as $key=>$value){
			$arr[$key]['tmtype'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			$res = M('shop')->field('id,name')->where(array('id'=>$arr[$key]['userid'],'state'=>3))->find();
			if($value['groupid3']){
				$map['id'] = $value['groupid3'];
			}elseif (!$value['groupid3']&&$value['groupid2']){
				$map['id'] = $value['groupid2'];
			}elseif (!$value['groupid3']&&!$value['groupid2']&&$value['groupid']) {
				$map['id'] = $value['groupid'];
			}
			$arr[$key]['category'] = $items->field('id,name')->where($map)->find();
			$wh['userid'] = session('user.id');//收藏用户id
			$wh['goodsid'] = $value['id'];//收藏商品id
			$wh['type'] = '2';//收藏类型
			$wh['state'] = '1';//收藏状态
			$arr[$key]['scid'] = $favorite ->where($wh)->getField('id');
			if($res) $arr[$key]['shop'] = $res;
		}
		
		return $arr;
	}
}