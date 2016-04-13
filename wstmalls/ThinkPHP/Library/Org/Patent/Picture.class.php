<?php

namespace Org\Patent;

class Picture {
private $url;
private $purl;
private $ptn;
private $zlp;
	/**
	 *
	 * @param String $q 检索的数据
	 * @param String $url 搜索的url
	 */
	function __construct($ptn='',$zlp='',$baiurl='http://so.baiten.cn/detail/patentdetail/63/'){
		$url = $baiurl.$ptn.'/'.$zlp;
		$this->url = $url;
	}
	
	function getPicUrl(){//从URL获取数据//GET方式
		$detailurl = parse_url($this->url);
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
		curl_setopt($ch1, CURLOPT_URL, $this->url);//请求的url
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
	
	/**
	 * 从html字符串中提取指定的内容并且返回字符串数组
	 * @param String $string
	 * @return Array string
	 */
	function getIMG(){//从html中提取数据
		$string = $this->getPicUrl();
		$reg['img'] = "/id=\"pd-d-nonePic\" src=\"(.*?)\"/ism";//附图
		$reg['applydate'] = "/申请日：<\/label>.*?target=\"_blank\">(.*?)<\/a>/ism";//申请日期
		$reg['cname'] = "/id=\"patTitle\">(.*?)<\/a>/ism";//标题
		$reg['info1'] = "/【摘要】：<\/h2>.*?>(.*?)<\/p>/ism";//摘要
		$reg['info2'] = "/【主权项】：<\/h2>.*?>(.*?)<\/p>/ism";//主权项
		foreach ($reg as $k=>$reg1){
			$re1=null;
			preg_match_all($reg1,$string,$re1);
			if(isset($re1[1][0])){
				$arr[$k] = $re1[1][0];
			} else {
				$arr[$k] = '';
			}
		}
		$regu['patentee'] = array("/申请\/专利权人：<\/label>.*?target=\"_blank\">(.*?)<\/td>/ism"=>"/_blank\">(.*?)<\/a>/ism");//申请人
		$regu['inventor'] = array("/发明\/设计人：<\/label>.*?target=\"_blank\">(.*?)<\/td>/ism"=>"/_blank\">(.*?)<\/a>/ism");//发明人
		foreach ($regu as $k=>$v){
			$re1=null;
			foreach ($v as $k1=>$v1){
				preg_match_all($k1,$string,$re1);
				$string1 = isset($re1[0][1])?$re1[0][1]:$re1[0][0];
				$re1=null;
				preg_match_all($v1,$string1,$re1);
				if(isset($re1)){
					if(is_array($re1[1])){
						$arr[$k] = '';
						foreach ($re1[1] as $a){
							$arr[$k] .= $a.' | ';
						}
						$arr[$k] = substr($arr[$k], 0, strlen($arr[$k])-3);
					} else {
						$arr[$k] = $re1[1];
					}
				} else {
					$arr[$k] = '';
				}
			}
			
		}
		return $arr;
	}
	
}
?>