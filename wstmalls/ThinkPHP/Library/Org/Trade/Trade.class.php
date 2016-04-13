<?php
namespace Org\Trade;
class Trade{
	private $url;
	private $cookie_jar;
	private $loginUrl = 'http://www.qihaoip.com/member/login.php';
	private $aloginUrl = 'http://www.qihaoip.com/7hipmc.php?file=login&forward=http%3A%2F%2Fwww.qihaoip.com%2F7hipmc.php';
	private $sellTM = 'http://www.qihaoip.com/7hipmc.php?rand=71&moduleid=23&action=add';
	public $state;
	function __construct(){
		$this->cookie_jar = dirname(__FILE__)."/pic.cookie";
	}
	
	public function login($u='haha7day',$p='421651zz'){
		if($u!='haha7day' && $p!='421651zz'){
			if(is_file($this->cookie_jar)){
				unlink($this->cookie_jar);
			}
			return $this->realLogin($u,$p);
		} else {
			if(is_file($this->cookie_jar) && filesize($this->cookie_jar)>10){
				return 'SUCCESS';
			} else {
				return $this->realLogin($u,$p);
			}
		}
	}
	
	public function logout(){
		if(is_file($this->cookie_jar)){
			unlink($this->cookie_jar);
		}
	}
	
	public function realLogin($u,$p){
		$data = array('forward'=>'http://www.qihaoip.com/','submit'=>' 登 录 ','username'=>$u,'password'=>$p,'cookietime'=>'1','submit'=>'');
		return $this->query($this->loginUrl,$data);
	}
	
	public function aLogin($u='haha7day',$p='421651zz'){
		if(is_file($this->cookie_jar) && filesize($this->cookie_jar)>10){
			return 'SUCCESS';
		} else {
			$data = array('file'=>'login','forward'=>'http://www.qihaoip.com/7hipmc.php?','username'=>$u,'password'=>$p,'submit'=>'登录','rmbUser'=>'');
			return $this->query($this->aloginUrl,$data);
		}
	
	}
	
	public function upimg($img,$mid=23){
		//moduleid 类别id
		//isremote = 0//是否网络图片
		//remote //网络图片地址
		//upalbum
		$url = 'http://www.qihaoip.com/upload.php';
		if(file_exists($img)){//上传文件
			echo '要上传的文件是'.$img;
			$isremote = '0';
			$remote = 'http://';
			$upalbum = curl_file_create($img);;
			$data = array('forward'=>'http://www.qihaoip.com/upload.php','fid'=>'','moduleid'=>$mid,'from'=>'album','old'=>'','isremote'=>$isremote,'remote'=>$remote,'upalbum'=>$upalbum,'width'=>'210','height'=>'180');
			$rehtml =  $this->query($url,$data,filesize($img));
		} else if(strstr($img, 'http://')){
			$isremote = '1';
			$remote = $img;
			$upalbum = '';
			$data = array('forward'=>'http://www.qihaoip.com/upload.php','fid'=>'','moduleid'=>$mid,'from'=>'album','old'=>'','isremote'=>$isremote,'remote'=>$remote,'upalbum'=>$upalbum,'width'=>'210','height'=>'180');
			$rehtml = $this->query($url,$data);
		} else {
			return 'ERROR';
		}
// 		echo $rehtml;
		$regex="/window.parent.getAlbum\(\"(.*?)\"/ism";//获取主要div
		preg_match_all($regex,$rehtml,$matches);//获取大段div中的内容
		return $matches[1][0];
	}
	
	public function sellTM($tmno,$tmlimit,$tmregister,$tmregdate,$title,$user,$content,$thumb,$catid,$state='1',$price='面议'){
		if($price==0){$price='面议';}
		$id_arr = array(1=>8,2=>9,3=>10,4=>11,5=>28,6=>29,7=>30,8=>31,9=>32,10=>33,11=>34,12=>35,13=>36,14=>37,15=>38,16=>39,17=>40,18=>41,19=>42,20=>43,21=>44,22=>45,23=>46,24=>47,25=>48,26=>49,27=>50,28=>51,29=>52,30=>53,31=>54,32=>55,33=>56,34=>57,35=>58,36=>59,37=>60,38=>61,39=>62,40=>63,41=>64,42=>65,43=>66,44=>67,45=>68);
		$data = array(
				'moduleid'=>"23",
				'file'=>"index",
				'action'=>"add",
				'itemid'=>"0",
				'forward'=>"http=>//www.qihaoip.com/7hipmc.php?action=left1&bb=3",
				'post'=>array(
						'mycatid'=>'',//"56",
						'catid'=>$id_arr[$catid+0],//"",
						'title'=>$title,
						'level'=>"0",
						'style'=>"",
						'price'=>$price,
						'amount'=>"1",
						'thumb'=>$thumb,
						'thumb1'=>"",
						'thumb2'=>"",
						'content'=>$content,
						'n1'=>"",
						'v1'=>"",
						'n2'=>"",
						'v2'=>"",
						'n3'=>"",
						'v3'=>"",
						'express_name_1'=>"",
						'fee_start_1'=>"",
						'fee_step_1'=>"",
						'express_1'=>"0",
						'express_name_2'=>"",
						'fee_start_2'=>"",
						'fee_step_2'=>"",
						'express_2'=>"0",
						'express_name_3'=>"",
						'fee_start_3'=>"",
						'fee_step_3'=>"",
						'express_3'=>"0",
						'username'=>$user,
						'elite'=>"0",
						'status'=>"3",
						'note'=>"",
						'addtime'=>date('y-m-d+h:i:s'),
						'hits'=>"",
						'fee'=>"",
						'template'=>"",
				),
				'post_ppt'=>array(1=>''),
				'post_fields'=>array(
						'tmno'=>$tmno,
						'tmstatus'=>"1",
						'tmscreening'=>"4",
						'tmtradeway'=>array(1),
						'tmtype'=>$state,
						'tmlimit'=>$tmlimit,//"商品服务列表",
						'tmregister'=>$tmregister,//"注册人",
						'tmregdate'=>$tmregdate,//"2015-08-01",
						'tmregpublication'=>"",
						'tmregstart'=>"",
						'tmregend'=>"",
						'tmregarea'=>"1",
						'tmtag'=>$tmlimit,
				),
				'submit'=>" 确 定 ",
		);
		// 		echo http_build_query($data);
		// 		exit;
		return $this->query($this->sellTM,$data);
	}
	
	public function sellPA($pano,$paregister,$inventor,$paregdate,$title,$user,$content,$thumb,$price='面议'){
		if($price==0){$price='面议';}
		$data = array(
				'moduleid'=>"24",//moduleid:"24"
				'file'=>"index",//file:"index"
				'action'=>"add",//action:"add"
				'itemid'=>"0",//itemid:"0"
				'forward'=>"http://www.qihaoip.com/7hipmc.php?action=left1&bb=3",//forward:"http://www.qihaoip.com/7hipmc.php?action=left1&bb=3"
				'post'=>array(
						'mycatid'=>'',
						'catid'=>'86',
						'title'=>$title,
						'level'=>"0",
						'style'=>"",
						'price'=>$price,
						'amount'=>"1",
						'thumb'=>$thumb,
						'thumb1'=>"",
						'thumb2'=>"",
						'content'=>$content,
						'n1'=>"",
						'v1'=>"",
						'n2'=>"",
						'v2'=>"",
						'n3'=>"",
						'v3'=>"",
						'express_name_1'=>"",
						'fee_start_1'=>"",
						'fee_step_1'=>"",
						'express_1'=>"0",
						'express_name_2'=>"",
						'fee_start_2'=>"",
						'fee_step_2'=>"",
						'express_2'=>"0",
						'express_name_3'=>"",
						'fee_start_3'=>"",
						'fee_step_3'=>"",
						'express_3'=>"0",
						'username'=>$user,
						'elite'=>"0",
						'status'=>"3",
						'note'=>"",
						'addtime'=>date('y-m-d+h:i:s'),
						'hits'=>"",
						'fee'=>"",
						'template'=>"",
				),
				'post_ppt'=>array(1=>''),
				'post_fields'=>array(
						'ptno'=>$pano,//post_fields[ptno]:"CN201010604254.6"
						'ptreposition'=>'1',//post_fields[ptreposition]:"1"//推荐位置
						'inventor'=>$inventor,//post_fields[inventor]:"专利发明人"
						'agency'=>'',//post_fields[agency]:"专利代理机构"
						'pttradeway'=>array(1),//post_fields[pttradeway][]:"1"
						'ptpatentees'=>1,//post_fields[ptpatentees]:"1"
						'ptpatentee'=>$paregister,//post_fields[ptpatentee]:"专利权人"
						'applytime'=>$paregdate,//"2015-08-01",//post_fields[applytime]:"2015-08-01"
						'pttype'=>'1',//post_fields[pttype]:"1"
						'pttag'=>'',//post_fields[pttag]:"标签"
				),
				'submit'=>' 确 定 ',
		);
		// 		echo http_build_query($data);
		// 		exit;
		return $this->query($this->sellTM,$data);
	}
	
	public function query($url,$data='',$filesize=0){//从URL获取数据//GET方式
		$urlarr = parse_url($url);
		if(!isset($urlarr['path'])){
			$urlarr['path'] = '';
		}
		if(!isset($urlarr['query'])){
			$urlarr['query'] = '';
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);//请求的url
		curl_setopt($ch, CURLOPT_REFERER, $url);//CURLOPT_REFERER
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0');
		// 		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);//文件头
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);//当根据Location:重定向时，自动设置header中的Referer:信息。
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
		curl_setopt($ch, CURLOPT_FAILONERROR, true);//显示状态码
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_jar);//将session写入到文件
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie_jar);
		// 	curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);//启用时curl会仅仅传递一个session cookie，忽略其他的cookie，默认状况下cURL会将所有的cookie返回给服务端。session cookie是指那些用来判断服务器端的session是否有效而存在的cookie。
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 60 second
		if($data || is_array($data)){
			curl_setopt($ch, CURLOPT_POST, 1);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
			// 			curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
			// 			if($file){
			// 				curl_setopt($ch, CURLOPT_UPLOAD, true);//CURLOPT_UPLOAD 	启用后允许文件上传。
			// 			}
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));//POST数据
			if($filesize){
				curl_setopt($ch, CURLOPT_INFILESIZE,$filesize);
			}
		}
	
		$restr = curl_exec($ch);//得到的字符串
		$state = curl_getinfo($ch,CURLINFO_HTTP_CODE);//最后一个收到的HTTP代码
		// 	$info = curl_getinfo($ch);//
		curl_close($ch);
		$this->state = $state;
		return $restr;
	}
}
// $t = new Trade();
// echo $t->login();
// echo $t->login('7hip','qihaoip!123');
// echo $t->query('http://www.qihaoip.com/member/my.php?mid=23&action=add');
// echo $t->upimg('http://www.qihaoip.com/file/upload/201505/11/15-59-49-64-2.jpg.thumb.jpg');
// echo $t->aLogin();
// echo $t->sellTM('123456789','商标1,2,3,4,5,6,7','江苏润宝注册','20150501','商标标题','haha6day','商标内容哦商标内容哦商标内容哦商标内容哦商标内容哦','http://www.qihaoip.com/file/upload/201505/11/15-59-49-64-2.jpg.thumb.jpg','56','面议');