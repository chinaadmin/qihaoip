<?php
namespace Common\Lib;
class Unionpay{
	private $sign_file;//签名证书路径
	private $sign_key = 'TCjECQ';//签名证书密码
	private $pass_sign_file;// 密码加密证书（这条用不到的请随便配）
	private $pub_file;//公钥路径
	private $file;//验签证书路径（请配到文件夹，不要配到具体文件）
	private $quest_url = 'https://gateway.95516.com/gateway/api/frontTransReq.do';//前台请求地址
	private $server_url = 'https://gateway.95516.com/gateway/api/backTransReq.do';//后台请求地址
	private $chk_url = 'https://gateway.95516.com/gateway/api/queryTrans.do';//单笔查询地址
	private $return_url;//返回地址
	private $notice_url;//通知地址
	private $PrivateKey;//私钥
	private $PublicKey;//公钥
	private $params;//构造的参数数组
	private $merId = '824440389990002';//商户号
	private $charSet = 'utf-8';//字符编码
	private $version = '5.0.0';//版本号1111111111111
	private $certId = '69392818311';//证书号
	public function __construct(){
		$this->sign_file = APP_PATH.'Common/Cer/webserver.pfx';
		$this->pass_sign_file = APP_PATH.'Common/Cer/RSA2048_PROD_index_22.cer';
		$this->pub_file = APP_PATH.'Common/Cer/acp20151027.cer';
		$this->file = APP_PATH.'Common/Cer/';
		$this->return_url = C('QH_URL').U('/Index/Pay/unionpay_return');
		$this->notice_url = C('QH_URL').U('/Index/Pay/unionpay_notify');
	}
	
	public function order($orderid,$money,$title){
		$money = $money*100;
		$money = ceil($money);//金额乘以100变成分
		$this->params = array(
			'version' => $this->version,				//版本号
			'encoding' => $this->charSet,				//编码方式
			'certId' => $this->certId,			//证书ID
			'txnType' => '01',				//交易类型
			'txnSubType' => '01',				//交易子类
			'bizType' => '000201',				//业务类型
			'frontUrl' =>  $this->return_url,  		//前台通知地址
			'backUrl' => $this->notice_url,		//后台通知地址
			'signMethod' => '01',		//签名方法
			'channelType' => '07',		//渠道类型，07-PC，08-手机
			'accessType' => '0',		//接入类型
			'merId' => $this->merId,		        //商户代码，请改自己的测试商户号
			'orderId' => $orderid,	//商户订单号
			'txnTime' => date('YmdHis'),	//订单发送时间
			'txnAmt' => $money,		//交易金额，单位分
			'currencyCode' => '156',	//交易币种
			'defaultPayType' => '0001',	//默认支付方式
			//'orderDesc' => '订单描述',  //订单描述，网关支付和wap支付暂时不起作用
			'reqReserved' =>$title, //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现
		);
		$this->sign();//签名
		$re = http_query($this->quest_url,$this->params);//向服务器请求并且发送POST数据。
		return $re['data'];
	}
	
	public function chk_order(){
		$params = array(
			'version' => $this->version,		//版本号
			'encoding' => $this->charSet,		//编码方式
			'certId' => $this->certId,	//证书ID
			'signMethod' => '01',		//签名方法
			'txnType' => '00',		//交易类型
			'txnSubType' => '00',		//交易子类
			'bizType' => '000000',		//业务类型
			'accessType' => '0',		//接入类型
			'channelType' => '07',		//渠道类型
			'orderId' => '20150206215110',	//请修改被查询的交易的订单号
			'merId' => $this->merId,	//商户代码，请修改为自己的商户号
			'txnTime' => time(),	//请修改被查询的交易的订单发送时间
		);
		$this->sign();//签名
		$re = http_query($this->chk_url,$this->params);//向服务器请求并且发送POST数据。
		echo $re['data'];
	}
	
	public function notice($arr=null){//通知
		if($arr){
			$post = $arr;
		} else if(IS_POST){
			$post = I('post.');
		} else {
			$post = I('get.');
		}
		$this->getPublicKey();//加载公钥
		if($this->verify($post)){
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 签名
	 *
	 * @param String $params_str
	 */
	private function sign() {
		$this->getPrivateKey();//加载私钥
		if(isset($this->params['signature'])){
			unset($this->params['signature']);
		}
		// 转换成key=val&串
		$params_str = $this->coverParamsToString($this->params);
		$params_sha1x16 = sha1($params_str,FALSE);
		
		// 签名
		$sign_falg = openssl_sign ( $params_sha1x16, $signature, $this->PrivateKey, OPENSSL_ALGO_SHA1 );
		if ($sign_falg) {//签名成功
			$signature_base64 = base64_encode($signature);
			$this->params['signature'] = $signature_base64;
		} else {//签名失败
	
		}
	}
	
	/**
	 * 验签
	 *
	 * @param String $params_str
	 * @param String $signature_str
	 */
	function verify($params) {
		$this->getPublicKey();//加载公钥
		$signature_str = $params ['signature'];
		unset ( $params ['signature'] );
		$params_str = $this->coverParamsToString($params );
		$signature = base64_decode ( $signature_str );
		//	echo date('Y-m-d',time());
		$params_sha1x16 = sha1 ( $params_str, FALSE );
		$isSuccess = openssl_verify ( $params_sha1x16, $signature,$this->PublicKey, OPENSSL_ALGO_SHA1 );
		return $isSuccess;
	}
	
	/**
	 * 取证书ID(.pfx)
	 *
	 * @return unknown
	 */
	private function getCertId() {
		$pkcs12certdata = file_get_contents($this->sign_file);
		openssl_pkcs12_read($pkcs12certdata,$certs,$this->sign_key );
		$x509data = $certs['cert'];
		openssl_x509_read($x509data);
		$certdata = openssl_x509_parse ( $x509data );
		return $certdata['serialNumber'];
	}
	
	/**
	 * 取证书ID(.cer)
	 *
	 * @param unknown_type $cert_path
	 */
	private function getCertIdByCerPath($file) {
		$x509data = file_get_contents ($file);
		openssl_x509_read ($x509data);
		$certdata = openssl_x509_parse($x509data);
		return $certdata ['serialNumber'];
	}
	
	
	/**
	 * 取证书公钥 -验签
	 *
	 * @return string
	 */
	private function getPublicKey() {
		$this->PublicKey = file_get_contents($this->pub_file);
	}
	
	/**
	 * 返回(签名)证书私钥 -
	 *
	 * @return unknown
	 */
	private function getPrivateKey() {
		$pkcs12 = file_get_contents($this->sign_file);
		openssl_pkcs12_read($pkcs12, $certs, $this->sign_key );
		$this->PrivateKey = $certs ['pkey'];
	}
	
	/**
	 * 加密 卡号
	 *
	 * @param String $pan
	 *        	卡号
	 * @return String
	 */
	function encryptPan($pan) {
		$cert_path = MPI_ENCRYPT_CERT_PATH;
		openssl_public_encrypt ( $pan, $cryptPan, $this->PublicKey );
		return base64_encode ($cryptPan);
	}
	/**
	 * pin 加密
	 *
	 * @param unknown_type $pan
	 * @param unknown_type $pwd
	 * @return Ambigous <number, string>
	 */
	function encryptPin($pan, $pwd) {
		$cert_path = $this->pub_file;
		return EncryptedPin($pwd, $pan, $this->PublicKey );
	}
	/**
	 * cvn2 加密
	 *
	 * @param unknown_type $cvn2
	 * @return unknown
	 */
	function encryptCvn2($cvn2) {
		$cert_path = $this->pub_file;
		openssl_public_encrypt ( $cvn2, $crypted, $this->PublicKey );
		return base64_encode($crypted );
	}
	/**
	 * 加密 有效期
	 *
	 * @param unknown_type $certDate
	 * @return unknown
	 */
	function encryptDate($certDate) {
		$cert_path = $this->pub_file;
		openssl_public_encrypt ( $certDate, $crypted, $this->PublicKey );
		return base64_encode($crypted );
	}
	
	/**
	 * 加密 数据
	 * @param unknown_type $certDatatype
	 * @return unknown
	 */
	function encryptDateType($certDataType) {
		$cert_path = $this->pub_file;
		openssl_public_encrypt ( $certDataType, $crypted, $this->PublicKey );
		return base64_encode ( $crypted );
	}
	
	/**
	 * 数组 排序后转化为字体串
	 *
	 * @param array $params
	 * @return string
	 */
	private function coverParamsToString($params) {
		$sign_str = '';
		// 排序
		ksort($params);
		foreach($params as $key => $val ) {
			if ($key == 'signature') {
				continue;
			}
			$sign_str .= sprintf ( "%s=%s&", $key, $val );
			// $sign_str .= $key . '=' . $val . '&';
		}
		return substr ( $sign_str, 0, strlen ( $sign_str ) - 1 );
	}
	
	/**
	 * 字符串转换为 数组
	 *
	 * @param unknown_type $str
	 * @return multitype:unknown
	 */
	private function coverStringToArray($str) {
		$result = array ();
	
		if (! empty ( $str )) {
			$temp = preg_split ( '/&/', $str );
			if (! empty ( $temp )) {
				foreach ( $temp as $key => $val ) {
					$arr = preg_split ( '/=/', $val, 2 );
					if (! empty ( $arr )) {
						$k = $arr ['0'];
						$v = $arr ['1'];
						$result [$k] = $v;
					}
				}
			}
		}
		return $result;
	}
	
	/**
	 * 处理返回报文 解码客户信息 , 如果编码为utf-8 则转为utf-8
	 *
	 * @param unknown_type $params
	 */
	private function deal_params(&$params) {
		if (!empty($params['customerInfo'])) {//如果非空
			$params ['customerInfo'] = base64_decode($params['customerInfo']);
		}
	
		if (!empty($params['encoding']) && strtoupper($params['encoding']) == 'utf-8') {
			foreach($params as $key => $val){
				$params [$key] = iconv('utf-8','UTF-8',$val);
			}
		}
	}
}