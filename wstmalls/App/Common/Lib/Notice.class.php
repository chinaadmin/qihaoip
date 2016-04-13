<?php
namespace Common\Lib;
class Notice{
	public $errorMsg = '';
	/**
	 * @param 类型 $type
	 * @param 数据 $data
	 * @return 返回的数组 array
	 */
	public function send_pin($type,$arr='',$style='pin'){
		if(!is_array($arr)){
			$data['data'] = $arr;
		}
		if($type=='email'){
			if(strstr($data['data'], '@') && strstr($data['data'], '.')){
				$config = get_config(4);
				if(isset($config['time'])){
					$time = $config['time'];
				} else {
					$time = 5;
				}
				$m = M('email');//实例化
				if($m->where('datetime > '.(time()-$time*60))->find()){
					$redata['success'] = false;
					$redata['errorMsg'] = $time.'分钟内已发送过。请勿重复发送.';
				} else {
					$pin = rand(111111,999999);
					$mail = $data['data'];
				
					$row = M('emailstyle')->where(['method'=>$style])->find();//查找模板
					$sendstr = str_replace('#'.$style.'#', $pin, $row['data']);//替换验证码
					$sendstr = str_replace('#time#', $time, $sendstr);//替换时间
					foreach ($data as $k=>$v){
						$sendstr = str_replace('#'.$k.'#', $v, $sendstr);//替换数据
					}
				
					$email = new \Common\Lib\Email($config);
					$re = $email->sendMail($mail, $row['name'], $sendstr);//收件人 邮件主题 邮件内容 来自 是否签名
					if($re=='SUCCESS'){//发送成功
					
						$add['userid'] = get_userid();
						$add['typeid'] = $row['id'];
						$add['data'] = $sendstr;
						$add['useremail'] = $data['data'];
						$add['state'] = '1';
						$add['pin'] = $pin;
						$add['date'] = date('ymd');
						$add['datetime'] = time();
						$m->add($add);
						if(!$add['userid']){//如果id为0
							session('notice_pin',$pin);
						}
						$redata['success'] = true;
					} else {
						$redata['success'] = false;
						$redata['errorMsg'] = $re;
					}
				}	
			} else {
				$redata['success'] = false;
				$redata['errorMsg'] = '邮箱账号格式不正确！';
			}
		} else if($type='telmsg'){
			if(is_numeric($data['data']) && strlen($data['data'])==11){
				$config = get_config(3);
				if(isset($config['time'])){
					$time = $config['time'];
				} else {
					$time = 5;
				}
				
				$m = M('telmsg');//实例化
				if($m->where('datetime > '.(time()-$time*60))->find()){//如果5分钟内已发送
					$redata['errorMsg'] = $time.'分钟内已发送过。请勿重复发送。';
				} else {
					$send['mobile'] = $data['data'];
					$pin = rand(111111,999999);
				
					$row = M('telmsgstyle')->where(['method'=>$style])->find();//查找模板
					$send['text'] = str_replace('#'.$style.'#', $pin, $row['data']);//替换验证码
					$send['text'] = str_replace('#name#', $time, $send['text']);//替换时间
					$send['text'] = str_replace('#time#', $time, $send['text']);//替换时间
					foreach ($data as $k=>$v){
						$sendstr = str_replace('#'.$k.'#', $v, $sendstr);//替换数据
					}
				
					$msg = new \Common\Lib\Telmsg($config);//实例化
					$re = $msg->send_msg($send);//发送验证码
					if($re['state']==200){
// 						$re = json_decode($re['data'],true);
// 						if($re['code']==0){
						if(strstr($re['data'],'成功')){
							$add['userid'] = get_userid();
							$add['typeid'] = $row['id'];
							$add['data'] = $send['text'];
							$add['usermobile'] = $data['data'];
							$add['state'] = '1';
							$add['pin'] = $pin;
							$add['date'] = date('ymd');
							$add['datetime'] = time();
							$m->add($add);
							if(!$add['userid']){//如果id为0
								session('notice_pin',$pin);
							}
							$redata['success'] = true;
						} else {
// 							$redata['errorMsg'] = $re['msg'];
							$redata['errorMsg'] = $re['data'];
						}
					} else {
						$redata['success'] = false;
						$redata['errorMsg'] = '通讯故障，请重试！';
					}
				}
			} else {
				$redata['success'] = false;
				$redata['errorMsg'] = '手机号码不正确！';
			}
		} else {
			$redata['success'] = false;
			$redata['errorMsg'] = '发送类型错！';
		}
		return $redata;
	}
	
	/**
	 * 验证码验证
	 * @param 类型 $type
	 * @param 手机或者邮箱 $data
	 * @param 验证码 $pin
	 * @return boolean
	 */
	public function chk_pin($type,$data,$pin){//类型，数据（手机或邮箱），验证码
		if($type=='email'){
			$config = get_config(4);
			if(isset($config['time'])){
				$time = $config['time'];
			} else {
				$time = 5;
			}
			$m = M('email');//实例化
			$where['datetime'] = array('gt',(time()-$time*120));
			$where['useremail'] = $data;
			$where['pin'] = $pin;
			if($m->where($where)->find()){
				return true;
			} else {
				return false;
			}
		} else if($type=='telmsg'){
			$config = get_config(3);
			if(isset($config['time'])){
				$time = $config['time'];
			} else {
				$time = 5;
			}
			$m = M('telmsg');//实例化
			$where['datetime'] = array('gt',(time()-$time*120));
			$where['usermobile'] = $data;
			$where['pin'] = $pin;
			$re = $m->where($where)->order('id desc')->find();
			if($re){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}