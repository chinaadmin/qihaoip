<?php
namespace Common\Lib;
class Telmsg{
	private $config = array(
			'apikey' => '20e13d9a05b3ec2e77e94d9792352503',//'sms_uid'=>//'sms_key'=>//'sms_charset'=>utf8
			'url'=>'http://yunpian.com/v1/sms/send.json',//http://sms.destoon.com:8820/send.php
	);
	
	public function __construct($config=array()){//设置配置参数
		foreach ($config as $k=>$v){
			if(isset($this->config[$k])){
				$this->config[$k] = $v;
			}
		}
	}
	
	/**
	 * haha7day
	 * 421651zz
	 * @param unknown $data
	 * @return Ambigous <返回状态和数据, mixed>
	 */
	public function send_msg($data = array()){//发送短信
		$send['sms_uid'] = '36820';
		$send['sms_key'] = 'ozlur7rmgxkd6d0u';
		$send['sms_charset'] = 'UTF-8';
		$send['sms_mobile'] = $data['mobile'];
		$send['sms_message'] = urlencode($data['text']);
		return http_query('http://sms.destoon.com:8820/send.php',$send);
// 		$send['apikey'] = $this->config['apikey'];
// 		$send['mobile'] = $data['mobile'];
// 		$send['text'] = $data['text'];
// 		return http_query($this->config['url'],$send);
	}
}