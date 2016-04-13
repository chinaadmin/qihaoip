<?php
namespace Common\Lib;
class Email{
	//private $mailconfig;
	private $mailconfig = array(
			'mail_sender'=>'noreply@qihaoip.com',//发送者
			'mail_name'=>'7号网邮件服务',//名称,先显示这个
			'sitename'=>'7号网',//站点名称
			'mail_sign'=>'<br /><hr>深圳市前海七号网络科技有限公司<br />总部地址：深圳市南山大道3838号深圳设计产业园金栋210-223、308-312室',//签名223
			'mail_delimiter'=>'2',//分隔符
			'smtp_host'=>'smtp.mxhichina.com',//服务器
			'smtp_port'=>'25',//端口
			'smtp_auth'=>'7号网',//作者
			'smtp_user'=>'noreply@qihaoip.com',//用户
			'smtp_pass'=>'421651ZZzz',//密码
	);
	
	public function __construct($config=array()){
		foreach ($config as $k=>$v){
			if(isset($this->mailconfig[$k])){
				$this->mailconfig[$k] = $v;
			}
		}
	}
	
	public function sendMail($mail_to, $mail_subject, $mail_body, $mail_from = '', $mail_sign = true) {//收件人 邮件主题 邮件内容 来自 是否签名
		$sendmail_from = $mail_from ? $mail_from : $this->mailconfig['mail_sender'];
		$mail_from = "=?".strtolower('UTF-8')."?B?".base64_encode($this->mailconfig['mail_name'] ? $this->mailconfig['mail_name'] : $this->mailconfig['sitename'])."?= <".$sendmail_from.">";
		$mail_subject = stripslashes($mail_subject);
		$mail_subject = str_replace("\r", '', str_replace("\n", '', $mail_subject));
		$mail_subject = "=?".strtolower('UTF-8')."?B?".base64_encode($mail_subject)."?=";
		if($this->mailconfig['mail_sign'] && $mail_sign) $mail_body .= $this->mailconfig['mail_sign'];
		$mail_body = stripslashes($mail_body);
		$mail_body = chunk_split(base64_encode(str_replace("\r\n.", " \r\n..", str_replace("\n", "\r\n", str_replace("\r", "\n", str_replace("\r\n", "\n", str_replace("\n\r", "\r", $mail_body)))))));
		$mail_dlmt = $this->mailconfig['mail_delimiter'] == 1 ? "\r\n" : ($this->mailconfig['mail_delimiter'] == 2 ? "\n" : "\r");
		$headers = '';
		$headers .= "From: $mail_from".$mail_dlmt;
		$headers .= "X-Priority: 3".$mail_dlmt;
		$headers .= "X-Mailer: Destoon".$mail_dlmt;
		$headers .= "MIME-Version: 1.0".$mail_dlmt;
		$headers .= "Content-type: text/html; charset=".'UTF-8'.$mail_dlmt;
		$headers .= "Content-Transfer-Encoding: base64".$mail_dlmt;
		$host = $this->mailconfig['smtp_host'].':'.$this->mailconfig['smtp_port'].' ';
		if(!$fp = fsockopen($this->mailconfig['smtp_host'], $this->mailconfig['smtp_port'], $errno, $errstr, 30)) {
			$errmsg = $host.'can not connect to the SMTP server';
			return $errmsg;
		}
		stream_set_blocking($fp, true);
		$RE = fgets($fp, 512);
		if(substr($RE, 0, 3) != '220') {
			$errmsg = $host.$RE;
			return $errmsg;
		}
		fputs($fp, ($this->mailconfig['smtp_auth'] ? 'EHLO' : 'HELO')." Sjhcip\r\n");
		$RE = fgets($fp, 512);
		if(substr($RE, 0, 3) != 220 && substr($RE, 0, 3) != 250) {
			$errmsg = $host.'HELO/EHLO - '.$RE;
			return $errmsg;
		}
		while(1) {
			if(substr($RE, 3, 1) != '-' || empty($RE)) break;
			$RE = fgets($fp, 512);
		}
		if($this->mailconfig['smtp_auth']) {
			fputs($fp, "AUTH LOGIN\r\n");
			$RE = fgets($fp, 512);
			if(substr($RE, 0, 3) != 334) {
				$errmsg = $host.'AUTH LOGIN - '.$RE;
				return $errmsg;
			}
			fputs($fp, base64_encode($this->mailconfig['smtp_user'])."\r\n");
			$RE = fgets($fp, 512);
			if(substr($RE, 0, 3) != 334) {
				$errmsg = $host.'USERNAME - '.$RE;
				return $errmsg;
			}
			fputs($fp, base64_encode($this->mailconfig['smtp_pass'])."\r\n");
			$RE = fgets($fp, 512);
			if(substr($RE, 0, 3) != 235) {
				$errmsg = $host.'PASSWORD - '.$RE;
				return $errmsg;
			}
			$mail_from = strpos($this->mailconfig['smtp_user'], '@') !== false ? $this->mailconfig['smtp_user'] : $this->mailconfig['mail_sender'];
		} else {
			$mail_from = $this->mailconfig['mail_sender'];
		}
		fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $mail_from).">\r\n");
		$RE = fgets($fp, 512);
		if(substr($RE, 0, 3) != 250) {
			fputs($fp, "MAIL FROM: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $mail_from).">\r\n");
			$RE = fgets($fp, 512);
			if(substr($RE, 0, 3) != 250) {
				$errmsg = $host.'MAIL FROM - '.$RE;
				return $errmsg;
			}
		}
		foreach(explode(',', $mail_to) as $touser) {
			$touser = trim($touser);
			if($touser) {
				fputs($fp, "RCPT TO: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $touser).">\r\n");
				$RE = fgets($fp, 512);
				if(substr($RE, 0, 3) != 250) {
					fputs($fp, "RCPT TO: <".preg_replace("/.*\<(.+?)\>.*/", "\\1", $touser).">\r\n");
					$RE = fgets($fp, 512);
					$errmsg = $host.'RCPT TO - '.$RE;
					return $errmsg;
				}
			}
		}
		fputs($fp, "DATA\r\n");
		$RE = fgets($fp, 512);
		if(substr($RE, 0, 3) != 354) {
			$errmsg = $host.'DATA - '.$RE;
			return $errmsg;
		}
		list($msec, $sec) = explode(' ', microtime());
		$headers .= "Message-ID: <".date('YmdHis', $sec).".".($msec*1000000).".".substr($mail_from, strpos($mail_from,'@')).">".$mail_dlmt;
		fputs($fp, "Date: ".date('r')."\r\n");
		fputs($fp, "To: ".$mail_to."\r\n");
		fputs($fp, "Subject: ".$mail_subject."\r\n");
		fputs($fp, $headers."\r\n");
		fputs($fp, "\r\n\r\n");
		fputs($fp, "$mail_body\r\n.\r\n");
		$RE = fgets($fp, 512);
		if(substr($RE, 0, 3) != 250) {
			$errmsg = $host.'END - '.$RE;
			return $errmsg;
		}
		fputs($fp, "QUIT\r\n");
		return 'SUCCESS';
	}
}