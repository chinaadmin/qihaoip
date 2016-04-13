<?php
namespace Common;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize(){
		if($_SERVER['HTTP_HOST']=='qihaoip.com' || $_SERVER['HTTP_HOST']=='7hip.cn' || $_SERVER['HTTP_HOST']=='www.7hip.cn' || $_SERVER['HTTP_HOST']=='qhip.cn' || $_SERVER['HTTP_HOST']=='www.qhip.cn'){//7hip.cn123123
			Header("HTTP/1.1 301 Moved Permanently");
			Header("Location: http://www.qihaoip.com".$_SERVER['REQUEST_URI']);
		}
	}
	
	/**
	 * 触发404错误，并且显示404内容！
	 * @param string $str
	 * @throws \Think\Exception
	 */
	public function show_404($str=''){
		if(empty($str)){
			$str = '页面不存在！';
		}
		throw new \Think\Exception($str);
	}
	
	
	/**
	 *
	 * @param string $mail_to 收件人
	 * @param string $mail_subject 邮件标题
	 * @param string $mail_body 邮件内容
	 * @return string 返回SUCCESS为发送成功，返回其他字符串为失败，字符串内容为失败原因。
	 */
	public function sendEmail($mail_to='399390897@qq.com', $mail_subject='邮件标题', $mail_body='邮件内容'){
		$mail = new \Org\Email\Email();
		$re = $mail->sendMail($mail_to, $mail_subject, $mail_body);
		return $re;
	}
	
}