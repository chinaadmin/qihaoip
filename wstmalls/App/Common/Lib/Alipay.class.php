<?php
namespace Common\Lib;
class Alipay{
	private $sign_key = 'i04l9y6z3wbannv8aidyfs1ajboo2330';//阿里密钥
	private $quest_url = 'https://mapi.alipay.com/gateway.do?';//前台请求地址
	private $chk_url;//单笔查询地址
	private $return_url;//返回地址
	private $notice_url;//通知地址
	private $params;//构造的参数数组
	private $merId = '2088911201136682';//商户号
	private $email = 'eips@qq.com';//商户账号
	private $sign_type = 'MD5';//加密方式
	private $charset = 'utf-8';//字符编码
	private $cacert = './cacert.pem';//公钥
	private $http = 'http';//本站支持的通讯方式
	public function __construct(){
		$this->return_url = C('QH_URL').U('/Index/Pay/alipay_return');
		$this->notice_url = C('QH_URL').U('/Index/Pay/alipay_notify');
	}
	
	public function order($orderid,$money,$title,$about,$show_url){
		$this->params = array(
			'service' => 'create_direct_pay_by_user',
			'partner' => $this->merId,
			'seller_email' => $this->email,
			'payment_type'	=> '1',//支付类型
			'notify_url'	=> $this->notice_url,
			'return_url'	=> $this->return_url,
			'out_trade_no'	=> $orderid,//订单号
			'subject'	=> $title,//订单名称
			'total_fee'	=> $money,//费用
			'body'	=> $about,//订单描述
			'show_url'	=> $show_url,//商品展示地址
// 			'anti_phishing_key'	=> '',//防钓鱼时间戳
			'exter_invoke_ip'	=> '120.24.174.135',//客户端的IP地址
			'_input_charset'	=> $this->charset//字符编码
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
		if(isset($this->params['sign_type'])){//签名类型
			unset($this->params['sign_type']);
		}
		ksort($this->params);//对数组进行排序
		reset($this->params);//排序后指针回归
		$sign = '';
		foreach ($this->params as $k=>$v){
			if(trim($v) == ''){//如果值为空字符串则删除
				unset($this->params[$k]);
			} else {
				$sign .= $k.'='.$v.'&';
			}
		}
		$sign = substr($sign, 0, strlen($sign)-1);//去掉最后一位
		$sign = md5($sign.$this->sign_key);//签名
		$this->params['sign'] = $sign;
		$this->params['sign_type'] = $this->sign_type;
	}

	/**
	 * 构造表单
	 * @return string
	 */
	private function build_html(){
		$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='".$this->quest_url."_input_charset=".$this->charset."' method='get'>";
		foreach ($this->params as $k=>$v){
			$sHtml.= "<input type='hidden' name='".$k."' value='".$v."'/>";
		}
		//submit按钮控件请不要含有name属性
		$sHtml = $sHtml."<input type='submit' value='确认'></form>";
		$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
		return $sHtml;
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
		if(isset($arr['sign'])){//签名
			$alisign = $arr['sign'];//签名值
			unset($arr['sign']);
		}
		if(isset($arr['sign_type'])){//签名类型
			unset($arr['sign_type']);
		}
		ksort($arr);//对数组进行排序
		reset($arr);//排序后指针回归
		$sign = '';
		foreach ($arr as $k=>$v){
			if(trim($v) == ''){//如果值为空字符串则删除
				unset($arr[$k]);
			} else {
				$sign .= $k.'='.$v.'&';
			}
		}
		$sign = substr($sign, 0, strlen($sign)-1);//去掉最后一位
		$sign = md5($sign.$this->sign_key);//签名
		if($sign == $alisign){//如果签名一致
			return true;
		} else {
			return false;
		}
	}
}