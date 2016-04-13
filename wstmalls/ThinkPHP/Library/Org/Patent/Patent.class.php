<?php
namespace Org\Patent;
class Patent{
private $q;
private $url;
private $pages;
private $p;
private $durl;
private $geturl;
private $s;
private $a;
/**
 * 
 * @param String $q 检索的数据
 * @param String $url 搜索的url
 */
function __construct($q,$p,$geturl,$px,$lawst,$type,$baiurl='http://so.baiten.cn/detail/patentdetail/63/'){
	$url = 'http://so.baiten.cn/results?type='.$type.'&s='.$px.'&law='.$lawst.'&v=s&q=';
	$this->url = $url.urlencode($q).'&page='.$p;
	$this->durl = $baiurl.$geturl;
	$str = $this->getUrl();
	/********************* 获取详情内容 ******************************/
	$durl = $this->getDetailUrl();
	$arrdetail = $this->getMainXq($durl);//获取主要内容
	if($arrdetail[0]){
		$this->arrcontent = $this->getItemDetail($arrdetail[0][0]);
		if($this->arrcontent[47]){
			$this->arrcontent[47] = $this->getLegalStatus($this->arrcontent[47][0]);//获取法律状态详情
		}elseif(!$this->arrcontent[14] && $this->arrcontent[48]){
			$this->arrcontent[48] = $this->getLegalStatus($this->arrcontent[48][0]);//获取法律状态详情
		}elseif($this->arrcontent[50]){
			$this->arrcontent[50] = $this->getLegalStatus($this->arrcontent[50][0]);//获取法律状态详情
		}
	}
	/********************* 获取详情内容 ******************************/
	$type = $this->getManyMain($str);//获取所有专利类型
	$this->typemany = $this->getManyCount($type[0][0]);
	if($str){
		$arr = $this->getMain($str);
		if($arr){//获取主要部分内容
			foreach ($arr[0] as $row){
				$this->arr[] = $this->getItems($row);
			}
			/* 分页 */
			$this->num = $this->getNum($str);
			$this->page = $this->getPage($str);
			$count = $this->getCount($str);
			$this->count = $this->getItemsCount($count[0][0]);
			$this->protime = $this->getItemsTime($count[0][0]);
		} else {
			$this->arr = null;
		}
	} else {
		$this->arr = null;
	}
}
	
	public function getArr(){
		return $this->arr;
	}
	
	/* 分页 */
	public function page(){
		return $this->page[0][0];
	}
	
	/* 抓取分页内容数量 */
	public function num(){
		return $this->num[0][0];
	}
	
	/* 获取详情内容 */
	public function getDetail(){
		return $this->arrcontent;
	}
	
	/* 获取搜索内容的数量 */
	public function count(){
		return $this->count[0];
	}
	
	/* 获取搜索内容的耗时 */
	public function protime(){
		return $this->protime[0];
	}
	
	/* 获取搜索内容的数量 */
	public function many(){
		return $this->typemany;
	}
/**
 * 从html字符串中提取指定的内容并且返回字符串数组
 * @param String $string
 * @return Array string
 */
function getItems($string){//从html中提取数据
		$reg[] = "/class=\"sm-c-left fl imgscrolling\" xSrc=\"(.*?)\"/ism";//缩微图//url地址
// 		$str[] = "缩微图";
		$reg[] = "/<span class=\"mlr256\".*?>(.*?) <\/span>/ism";//专利类型//
// 		$str[] = "专利类型";
		$reg[] = "/data-al-ti=\"(.*?)\"/ism";//专利名称
// 		$str[] = "专利名称";
		$reg[] = "/data-type=\"(.*?)\"/ism";//专利类型、有什么用？
// 		$str[] = "专利类型";
		$reg[] = "/data-al-an=\"(.*?)\"/ism";//专利号
// 		$str[] = "专利号";
		$reg[] = "/data-pages=\"(.*?)\"/ism";//专利页数
// 		$str[] = "专利页数";
		$reg[] = "/申请人.*?_blank\">(.*?)<\/a><\/span>/ism";//申请人
		//$reg[] = "/申请人：<\/label>(.*?)<\/a><\/span>(.*?)<\/li>/ism";//申请人
		//$reg2[] = "/申请\/专利权人：<\/label>(.*?)<\/td>/ism";//专利权人
// 		$str[] = "申请人";
		$reg[] = "/申请日.*?_blank\" >(.*?)<\/a>/ism";//申请日
// 		$str[] = "申请日";
		$reg[] = "/主分类号.*?_blank\" >(.*?)<\/a>/ism";//主分类号
// 		$str[] = "主分类号";
		$reg[] = "/data-summary=\"(.*?)\"/ism";//摘要
// 		$str[] = "摘要";
		$reg[] = "/href=\"(.*?)\"/ism";//链接地址
// 		$str[] = "链接地址";	
		$reg[] = "/发明人.*?_blank\" >(.*?)<\/a>.*?<\/li>/ism";//发明人
		//$reg[] = "/发明人：<\/label>(.*?)<\/li>/ism";//发明人
// 		$str[] = "发明人";
		$reg[] = "/专利代理机构.*?_blank\" >(.*?)<\/a>/ism";//专利代理机构
// 		$str[] = "专利代理机构";
		$reg[] = "/<span class=\"mrl6.*?\">(.*?)<\/span>/ism";//法律状态
// 		$str[] = "法律状态";
// 		$i=0;
		foreach ($reg as $reg1){
			preg_match_all($reg1,$string,$re1);
			if(isset($re1[1][0])){
				$arr[] = $re1[1][0];
			} else {
				$arr[] = '';
			}
		}
		
		return $arr;
	}
	
	/**
	 * 从html字符串中提取指定的内容并且返回字符串数组
	 * @param String $string
	 * @return Array string
	 */
	function getItemsCount($string){//从html中提取数据
		$arr = array();
		$regea = "/<span class=\"count\" id=\"sop-totalCount\">(.*?)<\/span>/ism";//检索结果
	// 	$str[] = "检索结果";
	// 	$i=0;
		preg_match_all($regea,$string,$renew);
		if(isset($renew[1][0])){
			$num[] = $renew[1][0];
		} else {
			$num[] = '';
		}
		return $num;
	}
	
	/**
	 * 从html字符串中提取指定的内容并且返回字符串数组
	 * @param String $string
	 * @return Array string
	 */
	function getItemsTime($string){//从html中提取数据
		$arr = array();
		$regt = "/<span class=\"processTime\">(.*?)<\/span>/ism";//检索结果
		preg_match_all($regt,$string,$rentime);
		if(isset($rentime[1][0])){
			$htime[] = $rentime[1][0];
		} else {
			$htime[] = '';
		}
		
		return $htime;
	}
	
	/**
	 * 从详情的HTML中获取主要区块内容
	 * @param String $string 要查找的字符串
	 * @return String 返回的字符串
	 */
	function getManyMain($string){
		$regmany ="/<div id=\"resultsCount\" class=\"srl-m-h-l-menu\">.*?<\/div>.*?<span class=\"arrow\"><\/span>/ism";//获取主要div
		preg_match_all($regmany,$string,$matchemay);//获取大段div中的内容
		return $matchemay;
	}
	
	/**
	 * 从html字符串中提取有多少发明专利，实用新型，外观设计内容并且返回字符串数组
	 * @param String $string
	 * @return Array string
	 */
	function getManyCount($string){//从html中提取数据
		$rlt[] = "/<span>发明专利（(.*?)）<\/span>/ism";//发明专利数量
// 		$str[] = "发明专利";
		$rlt[] = "/<span>实用新型（(.*?)）<\/span>/ism";//实用新型
//		$str[] = "实用新型";
		$rlt[] = "/<span>外观设计（(.*?)）<\/span>/ism";//外观设计
//		$str[] = "外观设计";
		$rlt[] = "/<span>发明授权专利（(.*?)）<\/span>/ism";//发明授权专利
//		$str[] = "发明授权专利";
		$rlt[] = "/<span>中国台湾专利（(.*?)）<\/span>/ism";//中国台湾专利
//		$str[] = "中国台湾专利";
		$rlt[] = "/<span>香港特区（(.*?)）<\/span>/ism";//香港特区
//		$str[] = "香港特区";		
		foreach ($rlt as $result){
			preg_match_all($result,$string,$many1);
			//print_r($many1);
			if(isset($many1[1][0])){
				$many[] = $many1[1][0];
				//$detailcontent[101] = $reg2[];
			}else{
				$many[] = '';
			}
		}
	
		return $many;
	}
	
	/**
	 * 从全部HTML中获取主要区块内容
	 * @param String $string 要查找的字符串
	 * @return String 返回的字符串
	 */
	function getMain($string){
		$regex="/<div class=\"sm-c clearfix\" data-isCnMain=\".*?\">.*?<div class=\"mright\">.*?<\/div>/ism";//获取主要div
		preg_match_all($regex,$string,$matches);//获取大段div中的内容
		return $matches;
	}
	
	/**
	 * 从全部HTML中获取主要区块内容
	 * @param String $string 要查找的字符串
	 * @return String 返回的字符串
	 */
	function getCount($string){
		$regnum="/<div id=\"srl_main\">.*?<\/div>.*?<div id=\"srl-m-vc\" class=\"\" >/ism";//获取主要div
		preg_match_all($regnum,$string,$matc);//获取大段div中的内容

		return $matc;
	}
	/**
	 * 从html字符串中提取指定的内容并且返回字符串数组
	 * @param String $string
	 * @return Array string
	 */
	function getItemDetail($string){ //从html中提取数据
		//print_r($string);die;
		$reg2[] = "/<label class=\"f16 fl\">(.*?)<\/label>/ism";//专利类型
// 		$str[] = "专利类型";
		$reg2[] = "/<a id=\"patTitle\">(.*?)<\/a>/ism";//标题
// 		$str[] = "标题";
		$reg2[] = "/<span class=\"detail-an\">(.*?)<\/span>/ism";//申请号
// 		$str[] = "申请号";
		$reg2[] = "/<span class=\"detail-an\">.*?<\/span>.*?<\/label>(.*?)<\/td>/ism";//优先权
// 		$str[] = "优先权";
		$reg2[] = "/申请日：<\/label>.*?>(.*?)<\/a>/ism";//申请日
// 		$str[] = "申请日";	
		$reg2[] = "/公开\/公告号：<\/label>.*?>(.*?)<\/a>/ism";//公告号
// 		$str[] = "公告号";
		$reg2[] = "/公开\/公告日：<\/label>.*?>(.*?)<\/a>/ism";//公告日
// 		$str[] = "公告日";
		$reg2[] = "/授权公告号：<\/label>.*?>(.*?)<\/a>/ism";//授权公告号
// 		$str[] = "授权公告号";
		$reg2[] = "/授权公告日：<\/label>.*?>(.*?)<\/a>/ism";//授权公告日
// 		$str[] = "授权公告日";
		$reg2[] = "/申请\/专利权人：<\/label>(.*?)<\/td>/ism";//专利权人
// 		$str[] = "专利权人";
		$reg2[] = "/发明\/设计人：<\/label>(.*?)<\/td>/ism";//设计人
// 		$str[] = "设计人";
		$reg2[] = "/主分类号：<\/label>.*?>(.*?)<\/a>/ism";//主分类号
// 		$str[] = "主分类号";
		$reg2[] = "/分案申请：<\/label>(.*?)<\/td>/ism";//分案申请
// 		$str[] = "分案申请";
		$reg2[] = "/地址：<\/label>(.*?)<\/td>/ism";//地址
// 		$str[] = "地址";
		$reg2[] = "/国省代码：<\/label>(.*?)<\/td>/ism";//国省代码
// 		$str[] = "国省代码";
		$reg2[] = "/颁证日：<\/label>(.*?)<\/td>/ism";//颁证日
// 		$str[] = "颁证日";
		$reg2[] = "/范畴分类：<\/label>(.*?)<\/td>/ism";//范畴分类
// 		$str[] = "范畴分类";
		$reg2[] = "/专利代理机构：<\/label>.*?>(.*?)<\/a>/ism";//专利代理机构
// 		$str[] = "专利代理机构";
		$reg2[] = "/代理人：<\/label>.*?>(.*?)<\/a>/ism";//代理人
// 		$str[] = "代理人";
		$reg2[] = "/国际申请：<\/label>(.*?)<\/td>/ism";//国际申请
// 		$str[] = "国际申请";
		$reg2[] = "/国际公布：<\/label>(.*?)<\/td>/ism";//国际公布
// 		$str[] = "国际公布";
		$reg2[] = "/进入国家日期：<\/label>(.*?)<\/td>/ism";//进入国家日期
// 		$str[] = "进入国家日期";
		$reg2[] = "/【摘要】：<\/h2>.*?>(.*?)<\/p>/ism";//摘要
// 		$str[] = "摘要";
		$reg2[] = "/【附图】：<\/h2>.*?class=\"pd-d-nonePic\" id=\"pd-d-nonePic\" src=\"(.*?)\"/ism";//附图
// 		$str[] = "附图";
		$reg2[] = "/【主权项】：<\/h2>.*?>(.*?)<\/p>/ism";//主权项
// 		$str[] = "主权项";
		//$reg2[] = "/<td class=\"tc\">(.*?)<\/td>/ism";//法律状态
		$reg2[] = "/<table class=\"pd-d-c-g-table\">(.*?)<\/table>/ism";//法律状态
// 		$str[] = "法律状态";
		$reg2[] = "/专利引证信息：(.*?)<div style=\"padding-left: 30px;\">.*?<\/div>/ism";//专利引证信息
// 		$str[] = "专利引证信息";
		$reg2[] = "/非专利引证信息：(.*?)<\/div>/ism";//非专利引证信息
// 		$str[] = "非专利引证信息";
		$reg2[] = "/【同族专利】：<\/h2>.*?>(.*?)<\/div>/ism";//同族专利
// 		$str[] = "同族专利";
		$reg2[] = "/<span style=\"display: inline-table;\">(.*?)<\/span>/ism";//法律状态详情
// 		$str[] = "法律状态详情";		
		$reg2[] = "/<li class=\"pd-d-c-n-item nav fl f14 c\"><a .*?>(.*?)<\/a><\/li>/ism";//专利公开详情
// 		$str[] = "专利公开详情";
		$reg2[] = "/<li class=\"pd-d-c-n-item nav fl f14\"><a id=\"pd-d-c-n-i-sqdetailLink\".*?>(.*?)<\/a><\/li>/ism";//专利授权详情
// 		$str[] = "专利授权详情";
		$reg2[] = "/<li class=\"pd-d-c-n-item nav fl f14\"><a id=\"pd-d-c-n-i-ftLink\".*?>(.*?)<\/a><\/li>/ism";//申请全文
// 		$str[] = "申请全文";
		$reg2[] = "/<li class=\"pd-d-c-n-item nav fl f14\"><a id=\"pd-d-c-n-i-sqLink\".*?>(.*?)<\/a><\/li>/ism";//授权全文
// 		$str[] = "授权全文";
		$reg2[] = "/>分类号：<\/label>.*?>(.*?)<\/a>.*?>(.*?)<\/a>.*?>(.*?)<\/a>/ism";//分类号
// 		$str[] = "分类号";
		$reg2[] = "/<span class=\"lawState f12\">(.*?)<\/span>/ism";//法律状态
// 		$str[] = "法律状态";
		foreach ($reg2 as $reg3){
			preg_match_all($reg3,$string,$re2);
			//print_r($re2);
  			if(isset($re2[1][0])){
				$detailcontent[] = $re2[1];
				$detailcontent[] = $re2[2];
				//$detailcontent[101] = $reg2[];
			}else{
				$detailcontent[] = '';
			} 
		}
		//print_r($detailcontent);die;
		return $detailcontent;
	}
	
	/**
	 * 从html字符串中提取指定的内容并且返回字符串数组
	 * @param String $string
	 * @return Array string
	 */
	function getLegalStatus($string){ //从html中提取数据
		//print_r($string);die;
		$regst[] = "/<td class=\"tc\">(.*?)<\/td>/ism";//法律状态,法律状态公告日
		//$str[] = "法律状态";
		$regst[] = "/<span style=\"display: inline-table;\">(.*?)<\/span>/ism";//法律状态详情
		//$str[] = "法律状态详情";
		foreach ($regst as $regst1){
			preg_match_all($regst1,$string,$regst2);
			//print_r($re2);
			if(isset($regst2[1][0])){
				$legal[] = $regst2[1];
			}else{
				$legal[] = '';
			}
		}
		//print_r($legal);die;
		return $legal;
	}
	
	/**
	 * 从详情的HTML中获取主要区块内容
	 * @param String $string 要查找的字符串
	 * @return String 返回的字符串
	 */
	function getMainXq($string){
		$regexq="/<div id=\"pd-dialog-bg\">.*?<div id=\"pd-fullscreen-dialog-bg\">.*?<\/div>/ism";//获取主要div
		preg_match_all($regexq,$string,$matchesxq);//获取大段div中的内容
		
		return $matchesxq;
	}
	
	/**
	 * 从全部html中获取分页的内容
	 * @param String $string 要查找的字符串
	 * @return String 返回的字符串
	 */
	function getPage($string){
		$repage = "/<div class=\"pages\" style=\"text-align:center\">.*?<\/div>/ism";//获取分页内容
		preg_match_all($repage,$string,$mapage);//获取导航内容
		return $mapage;
	}
	
	/**
	 * 从全部html中获取分页的pages
	 * @param String $string 要查找的字符串
	 * @return String 返回的字符串
	 */
	function getItemPage($string){
		$reitem = "/<span class=\"item\">.*?<\/span>/ism";//获取分页数
		preg_match_all($reitem,$string,$itempage);//获取导航内容
		return $itempage;
	}

	function getUrl(){//从URL获取数据//GET方式
		$urlarr = parse_url($this->url);
		if(!isset($urlarr['path'])){
			$urlarr['path'] = '';
		}
		if(!isset($urlarr['query'])){
			$urlarr['query'] = '';
		}
		$headers = array(
				"GET ".$urlarr['path'].'?'.$urlarr['query']." HTTP/1.0",
				"Host: ".$urlarr['host'],
				'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0',
				"Content-type: text/xml",
				"Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3",
				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*\/*;q=0.8",
				'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
				// 		"Content-length: ".strlen($xml_data)
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);//请求的url
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);//文件头
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);//当根据Location:重定向时，自动设置header中的Referer:信息。
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
		curl_setopt($ch, CURLOPT_FAILONERROR, true);//显示状态码
		// 	curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);//启用时curl会仅仅传递一个session cookie，忽略其他的cookie，默认状况下cURL会将所有的cookie返回给服务端。session cookie是指那些用来判断服务器端的session是否有效而存在的cookie。
		// 	curl_setopt($ch, CURLOPT_TIMEOUT, 60); // 60 second
		// curl_setopt($ch, CURLOPT_POST, true);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。//CURLOPT_UPLOAD 	启用后允许文件上传。
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);//POST数据
		$restr = curl_exec($ch);//得到的字符串
		$state = curl_getinfo($ch,CURLINFO_HTTP_CODE);//最后一个收到的HTTP代码
		// 	$info = curl_getinfo($ch);//
		curl_close($ch);
		if($restr || $state=='200'){
			return $restr;
		} else {
			return '';
		}
	}
	
	/**
	 * 从全部HTML中获取内容总数
	 * @param String $string 要查找的字符串
	 * @return String 返回的字符串
	 */
	function getNum($string){
		$pagenum="/<span class=\"count\" id=\"sop-totalCount\">.*?<\/span>/ism";
		preg_match_all($pagenum,$string,$nums);//获取内容
		return $nums;
	}
	
	function getDetailUrl(){//从URL获取数据//GET方式
		$detailurl = parse_url($this->durl);
		if(!isset($detailurl['path'])){
			$detailurl['path'] = '';
		}
		$headers1 = array(
				"GET ".$detailurl['path']." HTTP/1.0",
				"Host: ".$detailurl['host'],
				'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0',
				"Content-type: text/xml",
				"Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3",
				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*\/*;q=0.8",
				'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
				// 		"Content-length: ".strlen($xml_data)
		);
		$ch1 = curl_init();
		curl_setopt($ch1, CURLOPT_URL, $this->durl);//请求的url
		curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);//文件头
		curl_setopt($ch1, CURLOPT_AUTOREFERER, true);//当根据Location:重定向时，自动设置header中的Referer:信息。
		curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);//启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER,true);//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
		curl_setopt($ch1, CURLOPT_FAILONERROR, true);//显示状态码
		// 	curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);//启用时curl会仅仅传递一个session cookie，忽略其他的cookie，默认状况下cURL会将所有的cookie返回给服务端。session cookie是指那些用来判断服务器端的session是否有效而存在的cookie。
		// 	curl_setopt($ch, CURLOPT_TIMEOUT, 60); // 60 second
		// curl_setopt($ch, CURLOPT_POST, true);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。//CURLOPT_UPLOAD 	启用后允许文件上传。
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);//POST数据
		$restr1 = curl_exec($ch1);//得到的字符串
		$state1 = curl_getinfo($ch1,CURLINFO_HTTP_CODE);//最后一个收到的HTTP代码
		// 	$info = curl_getinfo($ch);//
		curl_close($ch1);
		if($restr1 || $state1=='200'){
			return $restr1;
		} else {
			return '';
		}
	}
}