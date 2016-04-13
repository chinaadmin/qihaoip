<?php
namespace Common\Lib;
class Tenpay{
	private $sign_key = 'cdba13d144e69ecf7d96a6730b5ea56a';//密钥
	private $quest_url = 'https://gw.tenpay.com/gateway/pay.htm';//前台请求地址
	private $merId = '1292875001';//商户号
	private $params = array();//参数数组
	public function __construct(){
		$this->return_url = C('QH_URL').U('Index/Pay/tenpay_return');
		$this->notice_url = C('QH_URL').U('Index/Pay/tenpay_notify');
	}
	
	public function order($orderid,$money,$title,$about,$show_url){
		$this->params = array(
				'partner'=>$this->merId,
				'out_trade_no'=>$orderid,
				'total_fee'=>ceil($money*100),  //总金额,单位为分
				'return_url'=>$this->return_url,
				'notify_url'=>$this->notice_url,
				'body'=>$about,
				'bank_type'=>'DEFAULT',  	  //银行类型，默认为财付通
				//用户ip
				'spbill_create_ip'=>get_ip(),//客户端IP
				'fee_type'=>'1',               //币种
				'subject'=>$title,          //商品名称，（中介交易时必填）
				
				//系统可选参数
				'sign_type'=>'MD5',  	 	  //签名方式，默认为MD5，可选RSA
				'service_version'=>'1.0', 	  //接口版本号
				'input_charset'=>'utf-8',   	  //字符集
				'sign_key_index'=>'1',    	  //密钥序号
				
				//业务可选参数
// 				'attach'=>'',             	  //附件数据，原样返回就可以了
// 				'product_fee'=>'',        	  //商品费用
// 				'transport_fee'=>'0',      	  //物流费用
// 				'time_start'=>date('YmdHis'),  //订单生成时间
// 				'time_expire'=>'',             //订单失效时间
// 				'buyer_id'=>'',                //买方财付通帐号
				'goods_tag'=>$show_url,               //商品标记
				'trade_mode'=>'1',              //交易模式（1.即时到帐模式，2.中介担保模式，3.后台选择（卖家进入支付中心列表选择））
// 				'transport_desc'=>'',              //物流说明
// 				'trans_type'=>'1',              //交易类型
// 				'agentid'=>'',                  //平台ID
// 				'agent_type'=>'',               //代理模式（0.无代理，1.表示卡易售模式，2.表示网店模式）
// 				'seller_id'=>'',                //卖家的商户号
		);
		$this->sign();//签名
		return $this->build_html();
	}

	public function chk_order(){
		
	}
	/**
	 * 签名
	 *
	 * @param String $params_str
	 */
	private function sign() {
		if(isset($this->params['sign'])){//签名
			unset($this->params['sign']);
		}
		$sign = '';
		ksort($this->params);
		foreach ($this->params as $k=>$v){
			if($v != ''){
				$sign .= $k.'='.$v.'&';
			}
		}
		$sign = strtoupper(md5($sign.'key='.$this->sign_key));//签名
		$this->params['sign'] = $sign;
	}

	/**
	 * 构造表单
	 * @return string
	 */
	private function build_html(){
		$sHtml = "<form id='alipaysubmit' name='tenpaysubmit' action='".$this->quest_url."' method='post'>".PHP_EOL;
		foreach ($this->params as $k=>$v){
			$sHtml .= "<input type='hidden' name='".$k."' value='".$v."'/>".PHP_EOL;
		}
		//submit按钮控件请不要含有name属性
		$sHtml .= "<input type='submit' value='确认'></form>".PHP_EOL;
		$sHtml = $sHtml."<script>document.forms['tenpaysubmit'].submit();</script>";
		return $sHtml;
	}
	
	/**
	 * 签名校验
	 */
	public function verify($arr=null){
		if($arr == null){
			if(IS_POST){
				$arr = I('post.');
			} else {
				$arr = I('get.');
			}
		}
		if(isset($arr['sign'])){//签名
			$alisign = strtoupper($arr['sign']);//签名值
			unset($arr['sign']);
		}
		$sign = '';
		ksort($arr);
		foreach ($arr as $k=>$v){
			if($v != ''){
				$sign .= $k.'='.$v.'&';
			}
		}
		$sign = strtoupper(md5($sign.'key='.$this->sign_key));//签名
		if($sign == $alisign){//如果签名一致
			return true;
		} else {
			return false;
		}
	}
}