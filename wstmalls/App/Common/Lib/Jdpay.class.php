<?php
namespace Common\Lib;
class Jdpay{
	/**
	 * 京东支付
	 * 京东支付真是一个花样作死的奇葩支付接口。demo里把重要数据保存在session，居然都不写一个session_start()，然而session没获取到数据也不报错！！！
	 * 一个类就能写完的demo，偏要分成几十个文件，跳转来跳转去的……是比代码行数吗？
	 * 配置文件不用php格式的array偏要用ini格式。
	 * 提交过去的数据使用哈希签名然后再用Rsa加密，同步返回的数据使用公钥解密然后跟哈希签名校验（然而并不用MD5密钥），然而异步通知的数据用MD5签名和DES加密！！！
	 * RSA带签名带加密不够用么？
	 * @var 够了！
	 */
	private $merchantNum='110173541002';//商户开通的商户号
	private $desKey='bjJFUUCRoQ1z/c6U9F2dUtOz7Fez6kDc';//商户DES密钥
	private $md5Key='GljUvhnTdnudKVnagrkAliNzhqmzRezl';//商户MD5密钥
	private $privateKey='';//我方私钥（用于用户加密）
	private $mypublicKey='';//我方公钥（上传至京东）
	private $publicKey='';//京东公钥（用于服务端数据解密）
	private $serverPayUrl='https://plus.jdpay.com/nPay.htm';//网银支付服务地址
	private $serverQueryUrl='https://m.jdpay.com/wepay/query';//网银查询服务地址
	private $serverRefundUrl='https://m.jdpay.com/wepay/refund';//网银退款服务地址
	private $successCallbackUrl='http://localhost/jd/wangyin/wepay/join/demo/api/WebSuccess.php';//支付成功 商户展示地址
	private $failCallbackUrl='';//支付失败 商户展示地址
	private $notifyUrl='http://localhost/jd/wangyin/wepay/join/demo/api/WebAsynNotificationCtrl.php';//接收异步通知地址
	private $params;//参数数组
	public $params_obj;//参数数组,对象格式
	public $debugInfo;//错误信息
	public function __construct(){
		$this->privateKey = APP_PATH.'Common/Cer/jdpay_my_rsa_private_pkcs8_key.pem';//我方私钥，用于加密
		$this->mypublicKey = APP_PATH.'Common/Cer/jdpay_my_rsa_public_key_backup.pem';//我方公钥
		$this->publicKey = APP_PATH.'Common/Cer/jdpay_jd_rsa_public_key.pem';//京东公钥，用于解密
		$this->successCallbackUrl = C('QH_URL').U('/Index/Pay/jdpay_return');
		$this->notifyUrl = C('QH_URL').U('/Index/Pay/jdpay_notify');
	}

	public function order($orderid,$money,$title,$about,$show_url){
		$money = $money*100;
		$money = ceil($money);//金额乘以100变成分
		$this->params = array(
				'currency' => 'CNY',//币种
				'ip' => get_ip(),
				'merchantNum' => $this->merchantNum,//商户号
				'merchantRemark'	=> '七号网交易付款',//商户备注，描述
				'notifyUrl'	=> $this->notifyUrl,
				'successCallbackUrl'	=> $this->successCallbackUrl,
				'tradeAmount'	=> $money,//费用
				'tradeDescription'=>$about,//交易描述
				'tradeName'=>$title,//商品名称
				'tradeNum'	=> $orderid,//订单号
				'tradeTime'	=> date('Y-m-d H:i:s', time()),//交易时间
				'version'	=> '1.1.5',//版本
				'token'	=> ''//用于用户免输手机号快速支付，留空就行了，不留空会报错我擦
		);
		$this->sign();//签名
		return $this->build_html();
	}
	
	
	/**
	 * 签名校验
	 */
	public function verify($arr=null){
		if($arr != null){
	
		} else if(IS_POST){
			$arr = I('post.');
		} else {
			$arr = I('get.');
		}
		$param = array();
		$param["token"] = $arr["token"];
		$param["tradeAmount"] = $arr["tradeAmount"];
		$param["tradeCurrency"] = $arr["tradeCurrency"];
		$param["tradeDate"] = $arr["tradeDate"];
		$param["tradeNote"] = $arr["tradeNote"];
		$param["tradeNum"] = $arr["tradeNum"];
		$param["tradeStatus"] = $arr["tradeStatus"];
		$param["tradeTime"] = $arr["tradeTime"];
		$sign = $this->arr2str($param);
		$sign = hash("sha256",$sign);
		$jdsign = $this->decryptByPublicKey($arr["sign"]);//公钥解密
		if($sign == $jdsign){//如果签名一致
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
		ksort($this->params);//对数组进行排序
		$sign = $this->arr2str($this->params);
		$sign = hash("sha256",$sign,true);
		$sign = $this->encryptByPrivateKey($sign);
		$this->params['merchantSign'] = $sign;
	}
	
	/**
	 * 构造表单
	 * @return string
	 */
	private function build_html(){
		$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='".$this->serverPayUrl."' method='post'>";
		foreach ($this->params as $k=>$v){
			$sHtml.= "<input type='hidden' name='".$k."' value='".$v."'/>";
		}
		//submit按钮控件请不要含有name属性
		$sHtml = $sHtml."<input type='submit' value='确认'></form>";
		$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
		return $sHtml;
	}
	
	/**
	 * 私钥加密
	 * @param 原始数据 $data
	 * @return 密文结果 string
	 */
	private function encryptByPrivateKey($data) {
		$pi_key =  openssl_pkey_get_private(file_get_contents($this->privateKey));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
		$encrypted="";
		openssl_private_encrypt($data,$encrypted,$pi_key,OPENSSL_PKCS1_PADDING);//私钥加密
		$encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的
		return $encrypted;
	}
	
	/**
	 * 公钥验解密
	 * @param 密文数据 $data
	 * @return 解密结果 string
	 */
	private function decryptByPublicKey($data) {
		$pu_key =  openssl_pkey_get_public(file_get_contents($this->publicKey));//这个函数可用来判断公钥是否是可用的，可用返回资源id Resource id
		$decrypted = "";
		$data = base64_decode($data);
		openssl_public_decrypt($data,$decrypted,$pu_key);//公钥解密
		return $decrypted;
	}
	
	/**
	 * 可与java的DES(DESede/CBC/PKCS5Padding)加密方式兼容
	 * @param unknown $input
	 * @param unknown $key
	 * @return string
	 */
	public function encrypt($input,$key) {
		$key = base64_decode ($key);
	
		$key = $this->pad2Length ($key, 8 );
	
		$size = mcrypt_get_block_size ( 'des', 'ecb' );
		$input = $this->pkcs5_pad ( $input, $size );
		$td = mcrypt_module_open ( 'des', '', 'ecb', '' );
		$iv = @mcrypt_create_iv ( mcrypt_enc_get_iv_size ( $td ), MCRYPT_RAND );
		@mcrypt_generic_init ( $td, $key, $iv );
		$data = mcrypt_generic ( $td, $input );
		mcrypt_generic_deinit ( $td );
		mcrypt_module_close ( $td );
		$data = base64_encode ( $data );
		return $data;
	}
	
	public function decrypt($encrypted,$key) {
		$encrypted = base64_decode ($encrypted);
		$key = base64_decode ($key);
		$key = $this->pad2Length ( $key, 8 );
		$td = mcrypt_module_open ( 'des', '', 'ecb', '' );
		// 使用MCRYPT_DES算法,cbc模式
		$iv = @mcrypt_create_iv ( mcrypt_enc_get_iv_size ( $td ), MCRYPT_RAND );
		$ks = mcrypt_enc_get_key_size ( $td );
		@mcrypt_generic_init ( $td, $key, $iv );
		// 初始处理
		$decrypted = mdecrypt_generic ( $td, $encrypted );
		// 解密
		mcrypt_generic_deinit ( $td );
		// 结束
		mcrypt_module_close ( $td );
		$y = $this->pkcs5_unpad ( $decrypted );
		return $y;
	}
	
	function pad2Length($text, $padlen) {
		$len = strlen ( $text ) % $padlen;
		$res = $text;
		$span = $padlen - $len;
		for($i = 0; $i < $span; $i ++) {
			$res .= chr ( $span );
		}
		return $res;
	}
	
	function pkcs5_pad($text, $blocksize) {
		$pad = $blocksize - (strlen ( $text ) % $blocksize);
		return $text . str_repeat ( chr ( $pad ), $pad );
	}
	
	function pkcs5_unpad($text) {
		$pad = ord ( $text {strlen ( $text ) - 1} );
		if ($pad > strlen ( $text ))
			return false;
		if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad)
			return false;
		return substr ( $text, 0, - 1 * $pad );
	}
	
	/**
	 * MD5签名
	 * @param 传入的数组 $data
	 * @return 签名结果
	 */
	public function generateSign($data) {
		$sb = $data ['VERSION'] . $data ['MERCHANT'] . $data ['TERMINAL'] . $data ['DATA'] . $this->md5Key;
		return md5 ( $sb );
	}
	
	public function execute($resp) {
		if (null == $resp) {
			$this->debugInfo = '传入的数据为空';
			return false;
		}
		$params = (array)simplexml_load_string (base64_decode ($resp));// 解析XML
		$ownSign = $this->generateSign($params);//MD5签名校验
		if ($params ['SIGN'] != $ownSign) {
			$this->debugInfo = "签名验证错误!" ;
			return false;
		}
		// 验签成功，业务处理
		// 对Data数据进行解密
		$decryptArr = $this->decrypt ( $params ['DATA'] , $this->desKey ); // 解密字符串
		$this->params_obj = simplexml_load_string ($decryptArr);// 解析XML;
		return true;
	}
	
	/**
	 * 参数数组转字符串
	 * @param 参数数组 $arr
	 * @return 字符串 string
	 */
	private function arr2str($arr){
		$unSignKeyList = array (//不参与签名的字段
				"merchantSign",
				"version",
				"successCallbackUrl",
				"forPayLayerUrl"
		);
		$sign = '';
		foreach ($arr as $k=>$v){
			if(!in_array($k, $unSignKeyList)){
				$sign .= $k.'='.($v==null?"":$v).'&';
			}
		}
		return substr($sign, 0, -1);//去掉最后一位
	}
}