<?php
/**
 * 遇到sql数据库错误的处理方法
 */
function sql_err($sql,$e,$file='',$line=''){
	
}
/**
 * uid用于面向用户
 * 长度为16
 * 
 */
function get_uid(){
	$uid = date('mdhis');
	$uid .= rand('100000','999999');
	return $uid;
}

/**
 * 获取用户ip
 */
function get_ip(){
	
	if (getenv("HTTP_CLIENT_IP")){
		$ip = getenv("HTTP_CLIENT_IP");
	} else if(getenv("HTTP_X_FORWARDED_FOR")){
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	} else if(getenv("REMOTE_ADDR")){
		$ip = getenv("REMOTE_ADDR");
	} else {$ip = "Unknow";}
	return $ip;
}

/**
 * 用户积分，根据积分规则进行积分，如果没找到积分规则，则直接根据原因和积分异动修改用户积分
 * @param 积分规则id $id
 * @param 用户id $userid
 * @param 操作员id $adminid
 * @param 操作原因 $name
 * @param 积分异动 $jifen
 * @return 成功或者失败 boolean
 */
function jifen($id,$userid='',$adminid=0,$name='',$jifen=0){
	$row = M('jifen')->where(['id'=>$id])->find();//积分配置
	if(!$userid){//如果用户id未配置
		$userid = get_userid();//从session中获取
	}
	if($row && $userid && $row['value']){
		$row['value'] = $row['value'] + 0;//确保一定为数字
		//日志
		$m = M('jifenlog');
		$where['userid'] = $userid;
		$where['typeid'] = $row['id'];
		if($row['membertimes']){
			$mumbernum = $m->where($where)->count();
			if($mumbernum >= $row['membertimes']){//用户积分次数大于应积分次数
				$GLOBALS['jifen_err'] = '已达总积分上限。';
				return false;//什么都不做
			}
		}
		$where['date'] = date('ymd');
		if($row['datetimes']){
			$dailynum = $m->where($where)->count();//计算今天本项目积分次数
			if($dailynum >= $row['datetimes']){//用户每次积分次数大于每次积分次数
				$GLOBALS['jifen_err'] = '已达每日积分上限。';
				return false;//什么都不做
			}
		}
		$member = M('member');
		$mrow = $member->field('jifen')->where(['id'=>$userid])->find();
		$where['uid'] = get_uid();
		$where['jifen'] = $row['value'];
		$where['adminid'] = $adminid;
		$where['name'] = $row['name'];
		$where['datetime'] = time();
		$mrow['jifen'] = $mrow['jifen'] + 0;//确保一定为数字
		$where['beginjifen'] = $mrow['jifen'];
		$where['endjifen'] = $mrow['jifen'] + $row['value'];
		$re = $m->add($where);//积分日志$where['uid'] = get_uid();
		if(!$re){
			$GLOBALS['jifen_err'] = $m->getDbError();
			return false;
		}
		$re = $member->where(['id'=>$userid])->save(['jifen'=>$where['endjifen']]);
		if(!$re){
			$GLOBALS['jifen_err'] = $member->getDbError();
			return false;
		}
		return true;
	} else {//如果积分没有配置，则直接修改用户积分
		if($name && $jifen && is_numeric($jifen)){
			$member = M('member');
			$mrow = $member->field('jifen')->where(['id'=>$userid])->find();
			$save['userid'] = $userid;
			$save['typeid'] = $id;
			$save['date'] = date('ymd');
			$save['uid'] = get_uid();
			$save['jifen'] = $jifen;
			$save['adminid'] = $adminid;
			$save['name'] = $name;
			$save['datetime'] = time();
			$mrow['jifen'] = $mrow['jifen'] + 0;//确保一定为数字
			$save['beginjifen'] = $mrow['jifen'];
			$save['endjifen'] = $mrow['jifen'] + $jifen;
			$m = M('jifenlog');
			$re = $m->add($save);//积分日志$where['uid'] = get_uid();
			if(!$re){
				$GLOBALS['jifen_err'] = $m->getDbError();
				return false;
			}
			$re = $member->where(['id'=>$userid])->save(['jifen'=>$save['endjifen']]);
			if(!$re){
				$GLOBALS['jifen_err'] = $member->getDbError();
				return false;
			}
			return true;
		} else {
			$GLOBALS['jifen_err'] = '无积分规则和积分值，无法操作！';
			return false;
		}
	}
}
/**
 * 获取用户id
 * @return Ambigous <mixed, NULL, unknown>|number
 */
function get_userid(){
	global $_userid;
	if(is_numeric($_userid)){
		return $_userid;
	}
	if(session('?user.id')){
		$_userid = session('user.id');
		return $_userid;
	} else {
		$_userid = 0;
		return $_userid;
	}
}

/**
 * 当id位数不够时补全
 * @param 基数 $num
 * @param 当前id $uid
 */
function full_id($num,$id){
	if($id<$num){
		return $num+$id;
	} else {
		return $id;
	}
}
/**
 * 从配置组内获取相应数据配置
 * @param 配置组id $id
 * @return k=>v的数组
 */
function get_config($id){
	$rows = M('config')->field('name,data')->where(['groupid'=>$id])->select();
	$config = array();
	if(is_array($rows)){
		foreach ($rows as $row){
			$config[$row['name']] = $row['data'];
		}
	}
	return $config;
}

/**
 * 通过http方式从web获取数据
 * @param 请求的url地址 $url
 * @param 请求的数据，如果数组为空，则为GET请求，否则为POST $data
 * @return 返回状态和数据
 */
function http_query($url,$data=array()){//从URL获取数据//GET方式
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);//请求的url
	curl_setopt($ch, CURLOPT_REFERER, 1);//CURLOPT_REFERER
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
	curl_setopt($ch, CURLOPT_FAILONERROR, true);//显示状态码
	curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 60 second
	if(count($data)){//如果数据存在则POST方式
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));//POST数据
	}

	$restr = curl_exec($ch);//得到的字符串
	$state = curl_getinfo($ch,CURLINFO_HTTP_CODE);//最后一个收到的HTTP代码
	curl_close($ch);
	$re['state'] = $state;
	$re['data'] = $restr;
	return $re;
}

/**
 * 获取当前页面完整URL地址
 */
function get_url() {
	$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
	$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
	$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
	return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}
/**
 * 
 * @param 字符串或者数组 $db
 * @param 查询条件（适用于字符串）string $where
 * @param string $sort
 * @param $cache True/False
 * @param string $k
 * @param string $v
 * 无返回值
 */
function get_select($db,$find='',$where='',$sort='',$k='id',$v='name',$cache=FALSE){
	$cdb = C($db);
	if(is_array($cdb)){
		foreach ($cdb as $k=>$v){
			if($find==$k){
				echo '
                <option value="'.$k.'" selected="selected">'.$v.'</option>';
			} else {
				echo '
                <option value="'.$k.'">'.$v.'</option>';
			}
		}
	} else {
		$m = M($db);
		if($where){
			$m->where($where);
		}
		if($sort){
			$m->order($sort);
		}
		if($cache){
// 			$m->cache($cache);
		}
		$re = $m->field($k.','.$v)->select();
		if($re && is_array($re)){
			foreach ($re as $row){
				if($find == $row[$k]){
					echo '
                <option value="'.$row[$k].'" selected="selected">'.$row[$v].'</option>';
				} else {
					echo '
                <option value="'.$row[$k].'" >'.$row[$v].'</option>';
				}
			}
		}
	}
}

/**
 * 打印调试函数
 * @param unknown $arr  数组
 */
function p($arr){
	header('Content-type:text/html;charset=utf-8');//设定编码，防止输出乱码。
	if(!empty($arr)){
		echo '<pre>';
		echo '<hr/>';
		print_r($arr);
		echo '<hr/>';
		echo '</pre>';
	}else{
		echo '数据为空！';
	}
}

//字符串截取
function subtext($text, $length=100)
{
	if(mb_strlen($text, 'utf8') > $length)
		return mb_substr($text, 0, $length, 'utf8').'....';
	return $text;
}

//过滤路径中的.和多余的/
function J($str){
	return str_replace('./', '', str_replace('//', '/', $str));
}

/**
 * 
 * 输出时间
 * @param 时间 $time
 * @param 返回类型/日期/时间 $type
 */
function get_time($time,$type='date'){
	if($time=='0'){
		return '不限';
	} else {
		if(strtotime($time)){
			return $time;
		} else {
			if($type=='date'){
				return date('Y-m-d',$time);
			} else {
				return date('Y-m-d H:i:s',$time);
			}
		}
	}
}

/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
	if (function_exists("mb_substr")) {
		$slice = mb_substr($str, $start, $length, $charset);
	} elseif (function_exists('iconv_substr')) {
		$slice = iconv_substr($str,$start,$length,$charset);
	} else {
		$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("",array_slice($match[0], $start, $length));
	}

	if(mb_strlen($str,$charset) <= $length && $suffix=true){
		return $slice;
	} elseif (mb_strlen($str,$charset) <= $length && $suffix=false) {
		return $slice;
	} elseif (mb_strlen($str,$charset) > $length && $suffix=true) {
		return $slice.'...';
	} elseif (mb_strlen($str,$charset) >= $length && $suffix=false) {
		return $slice;
	} else {
		return $suffix ? $slice.'...' : $slice;
	}
}



/**
 * 商标管家注册号转换
 * @param unknown $str
 * @return string
 */
function ttmid($str){
	$arr[0] = array(  13=>'G',
			16=>'2',
			17=>'3',
			19=>'1',
			20=>'6',
			21=>'7',
			22=>'4',
			23=>'5',
			24=>'R',
			26=>'8',
			27=>'9',
			49=>'5',
			50=>'6',
			53=>'1',
			54=>'2',
			65=>'9',
			67=>'G',
			73=>'1',
			74=>'2',
			75=>'3',
			76=>'4',
			77=>'5',
			78=>'6',
			79=>'7',
			90=>'5',
			101=>'G',
			110=>'2',
			112=>'R',
			114=>'8',
			115=>'9',
			119=>'T',
			120=>'2',
			121=>'3',
			123=>'1',
			124=>'6',
			125=>'7',
			126=>'4',
			127=>'5',
			132=>'8',
			133=>'9',
			136=>'4',
			137=>'5',
			138=>'6',
			139=>'7',
			141=>array('1'=>array('d'=>13,'h'=>204), '5'=>array('d'=>21,'h'=>208)),
			142=>'2',
			143=>'3',
			151=>'T',
			152=>'3',
			155=>'1',
			157=>'6',
			158=>'5',
			159=>'4',
			162=>'5',
			164=>'3',
			176=>'6',
			178=>'4',
			179=>'5',
			183=>array('1'=>array('d'=>17,'h'=>204), '5'=>array('d'=>20,'h'=>207)),
			186=>'3',
			187=>'2',
			188=>'5',
			193=>'G',
			197=>'G',
			205=>'T',
			208=>array('G'=>array('d'=>19,'h'=>206), '9'=>array('d'=>11,'h'=>204)),
			216=>'1',
			218=>'3',
			219=>'2',
			220=>'5',
			221=>'4',
			222=>'7',
			240=>'1',
			242=>'3',
			243=>'2',
			244=>'5',
			246=>'7',
			247=>'6',
			248=>'9',
			249=>'8',
			253=>'T',
			255=>'G',
	);
	$arr[2] = array(
			0=>'3',
			1=>'2',
			2=>'1',
			3=>'0',
			4=>'7',
			5=>'6',
			6=>'5',
			7=>'4',
			10=>'9',
			11=>'8',
			18=>'8',
			19=>'9',
			20=>'7',
			21=>'6',
			22=>'5',

			24=>'2',
			25=>'3',
			26=>array('0'=>array('d'=>14,'h'=>205), '9'=>array('d'=>20,'h'=>207)),
			27=>array('1'=>array('d'=>14,'h'=>205), '8'=>array('d'=>20,'h'=>207)),
			28=>'6',
			29=>'7',
			30=>'4',
			31=>'5',
			32=>'7',
			35=>'4',
			36=>'3',
			37=>'2',
			38=>'1',
			39=>'0',
			46=>'9',
			47=>'8',
			48=>'0',
			49=>'1',
			50=>'2',
			51=>'3',
			52=>'4',
			53=>'5',
			54=>'6',
			55=>'7',
			56=>'8',
			57=>'9',
			64=>'3',
			65=>'2',
			66=>'1',
			67=>'0',
			68=>'7',
			69=>'6',
			70=>'5',
			71=>'4',
			74=>'9',
			75=>'8',
			81=>'7',
			82=>'R',
			97=>'0',
			98=>'3',
			99=>'2',
			100=>'5',
			101=>'4',
			102=>'7',
			103=>'6',
			104=>'9',
			105=>'8',
			131=>'3',

			133=>'5',
			134=>array('6'=>array('d'=>21,'h'=>208), '9'=>array('d'=>17,'h'=>204)),
			135=>array('7'=>array('d'=>21,'h'=>208), '8'=>array('d'=>17,'h'=>204)),
			136=>'8',
			137=>array('6'=>array('d'=>17,'h'=>204), '9'=>array('d'=>21,'h'=>208)),
			138=>'5',
			139=>'4',
			140=>'3',
			141=>'2',
			142=>'1',
			143=>'0',
			150=>'6',
			160=>'8',
			162=>'2',
			163=>'3',
			164=>'4',
			165=>'5',
			166=>'6',
			167=>'7',
			168=>'8',
			169=>array('9'=>array('d'=>19,'h'=>206), '1'=>array('d'=>10,'h'=>205)),
			170=>'2',
			171=>'3',
			172=>'4',

			174=>'6',
			175=>'7',
			186=>'5',
			187=>'4',
			188=>'3',
			189=>'2',
			190=>'1',
			192=>'0',
			193=>'1',
			194=>'2',
			195=>'3',
			196=>'4',
			197=>'5',
			198=>'6',
			199=>'7',
			200=>'8',
			201=>'9',
			205=>'6',
			208=>array('6'=>array('d'=>12,'h'=>205), '5'=>array('d'=>11,'h'=>204)),
			209=>array('7'=>array('d'=>12,'h'=>205), '4'=>array('d'=>11,'h'=>204)),
			210=>array('4'=>array('d'=>12,'h'=>205), '7'=>array('d'=>11,'h'=>204)),
			211=>array('5'=>array('d'=>12,'h'=>205), '6'=>array('d'=>11,'h'=>204)),
			212=>array('2'=>array('d'=>12,'h'=>205), '1'=>array('d'=>11,'h'=>204)),
			213=>array('3'=>array('d'=>12,'h'=>205), '0'=>array('d'=>11,'h'=>204)),
			214=>array('0'=>array('d'=>12,'h'=>205), '3'=>array('d'=>11,'h'=>204)),
			215=>array('1'=>array('d'=>12,'h'=>205), '2'=>array('d'=>11,'h'=>204)),
			220=>'9',
			222=>'8',
			223=>'9',

	);

	$arr[4] = array(
			0=>'7',
			1=>'6',
			2=>'5',
			3=>'4',
			4=>'3',
			5=>'2',
			6=>'1',
			7=>array('0'=>array('d'=>11,'h'=>204), '1'=>array('d'=>7,'h'=>204)),
			14=>'9',
			15=>'8',
			16=>array('8'=>array('d'=>13,'h'=>204), '6'=>array('d'=>15,'h'=>204)),
			17=>array('7'=>array('d'=>15,'h'=>204), '9'=>array('d'=>13,'h'=>204)),
			18=>'4',
			19=>'5',
			20=>'2',
			21=>'3',
			22=>'0',
			23=>'1',
			24=>'0',
			25=>'1',
			26=>'2',
			27=>array('3'=>array('d'=>13,'h'=>204), '1'=>array('d'=>8,'h'=>205)),
			28=>'4',
			29=>'5',
			30=>array('8'=>array('d'=>15,'h'=>204), '6'=>array('d'=>13,'h'=>204)),
			31=>array('7'=>array('d'=>13,'h'=>204), '9'=>array('d'=>15,'h'=>204)),
			34=>'8',
			35=>'9',
			40=>'2',
			41=>'3',
			42=>'0',
			43=>'1',
			44=>'6',
			45=>'7',
			46=>'4',
			47=>'5',
			48=>'6',
			49=>'7',
			50=>'4',
			51=>'5',
			52=>'2',
			53=>'3',
			54=>array('9'=>array('d'=>17,'h'=>204), '0'=>array('d'=>17,'h'=>206)),
			55=>array('8'=>array('d'=>17,'h'=>204), '1'=>array('d'=>17,'h'=>206)),
			56=>'7',
			57=>'6',
			58=>'5',
			59=>'4',
			60=>array('3'=>array('d'=>17,'h'=>204), '4'=>array('d'=>17,'h'=>206)),
			61=>'2',
			62=>array('1'=>array('d'=>17,'h'=>204), '8'=>array('d'=>17,'h'=>206)),
			63=>array('0'=>array('d'=>17,'h'=>204), '9'=>array('d'=>17,'h'=>206)),
			80=>'7',
			81=>'6',
			82=>'5',
			83=>'4',
			84=>'3',
			85=>'2',
			86=>'1',
			87=>'0',
			94=>'9',
			95=>'8',
			96=>array('4'=>array('d'=>21,'h'=>208), '6'=>array('d'=>19,'h'=>206)),
			97=>array('5'=>array('d'=>21,'h'=>208), '7'=>array('d'=>19,'h'=>206)),
			98=>array('6'=>array('d'=>21,'h'=>208), '4'=>array('d'=>19,'h'=>206)),
			99=>array('7'=>array('d'=>21,'h'=>208), '5'=>array('d'=>19,'h'=>206)),
			100=>array('0'=>array('d'=>21,'h'=>208), '2'=>array('d'=>19,'h'=>206)),
			101=>array('1'=>array('d'=>21,'h'=>208), '3'=>array('d'=>19,'h'=>206)),
			102=>array('2'=>array('d'=>21,'h'=>208), '0'=>array('d'=>19,'h'=>206)),
			103=>array('3'=>array('d'=>21,'h'=>208), '1'=>array('d'=>19,'h'=>206)),
			108=>'8',
			109=>'9',
			110=>'8',
			111=>'9',
			126=>'0',
			128=>'7',
			129=>'6',
			130=>'5',
			131=>'4',
			132=>'3',
			133=>'2',
			134=>'1',
			135=>'0',
			142=>'9',
			143=>'8',
			144=>array('2'=>array('d'=>18,'h'=>207), '1'=>array('d'=>21,'h'=>206)),
			145=>array('0'=>array('d'=>21,'h'=>206), '3'=>array('d'=>18,'h'=>207)),
			146=>array('0'=>array('d'=>18,'h'=>207), '3'=>array('d'=>21,'h'=>206)),
			147=>array('1'=>array('d'=>18,'h'=>207), '2'=>array('d'=>21,'h'=>206)),
			148=>array('5'=>array('d'=>11,'h'=>206), '6'=>array('d'=>18,'h'=>207), '8'=>array('d'=>20,'h'=>207)),
			149=>array('7'=>array('d'=>18,'h'=>207), '9'=>array('d'=>20,'h'=>207), '4'=>array('d'=>21,'h'=>206)),
			150=>array('7'=>array('d'=>21,'h'=>206), '4'=>array('d'=>18,'h'=>207)),
			151=>array('5'=>array('d'=>18,'h'=>207), '6'=>array('d'=>21,'h'=>206)),
			152=>array('4'=>array('d'=>20,'h'=>207), '9'=>array('d'=>21,'h'=>206)),
			153=>array('5'=>array('d'=>20,'h'=>207), '8'=>array('d'=>21,'h'=>206)),
			154=>'8',
			155=>array('9'=>array('d'=>18,'h'=>207), '7'=>array('d'=>20,'h'=>207)),
			156=>'0',
			157=>'1',
			158=>'2',
			159=>'3',
			194=>'8',
			195=>'9',
			200=>'2',
			201=>'3',
			202=>'0',
			203=>'1',
			204=>'6',
			205=>'7',
			206=>'4',
			207=>'5',
			208=>'1',
			209=>'5',
			210=>'3',
			211=>'2',
			213=>'4',

			215=>'6',
			216=>'9',
			217=>'8',

	);

	$arr[6] = array(
			0=>'1',
			1=>'0',
			2=>'3',
			3=>'2',
			4=>'5',
			5=>'4',
			6=>'7',
			7=>'6',
			8=>'9',
			9=>'8',
			18=>'9',
			19=>'8',
			24=>'3',
			25=>'2',
			26=>'1',
			27=>'0',
			28=>'7',
			29=>'6',
			31=>'4',
			47=>'0',
			48=>'7',
			49=>'6',
			50=>'5',
			51=>'4',
			52=>'3',
			53=>'2',
			54=>'1',
			55=>'0',
			62=>'9',
			63=>'8',
			64=>'5',
			65=>array('3'=>array('d'=>'10','h'=>'205'), '4'=>array('d'=>'21','h'=>'206')),
			66=>'7',
			67=>'6',
			68=>array('6'=>array('d'=>'10','h'=>'205'), '1'=>array('d'=>'21','h'=>'206')),
			69=>array('0'=>array('d'=>'21','h'=>'206'), '7'=>array('d'=>'10','h'=>'205')),
			70=>array('3'=>array('d'=>'21','h'=>'206'), '4'=>array('d'=>'10','h'=>'205')),
			71=>array('5'=>array('d'=>'10','h'=>'205'), '2'=>array('d'=>'21','h'=>'206')),
			74=>'1',
			75=>'9',
			76=>'9',
			77=>'8',
			132=>'9',
			133=>'8',
			136=>'5',
			137=>'4',
			138=>'7',
			139=>'6',
			141=>'0',
			142=>'3',
			143=>'2',
			160=>'9',
			161=>'8',
			162=>'8',
			163=>'9',
			166=>array('8'=>array('d'=>'17','h'=>'204'), '0'=>array('d'=>'9','h'=>'204')),
			167=>array('9'=>array('d'=>'17','h'=>'204'), '1'=>array('d'=>'9','h'=>'204')),
			168=>array('2'=>array('d'=>'18','h'=>'205'), '6'=>array('d'=>'17','h'=>'204'), '1'=>array('d'=>'16','h'=>'205')),
			169=>array('3'=>array('d'=>'18','h'=>'205'), '7'=>array('d'=>'17','h'=>'204'), '0'=>array('d'=>'16','h'=>'205')),
			170=>array('4'=>array('d'=>'17','h'=>'204'), '0'=>array('d'=>'16','h'=>'205'), '3'=>array('d'=>'18','h'=>'205')),
			171=>array('1'=>array('d'=>'18','h'=>'205'), '5'=>array('d'=>'17','h'=>'204'), '2'=>array('d'=>'16','h'=>'205')),
			172=>array('5'=>array('d'=>'16','h'=>'205'), '6'=>array('d'=>'18','h'=>'205'), '2'=>array('d'=>'17','h'=>'204')),
			173=>array('4'=>array('d'=>'16','h'=>'205'), '7'=>array('d'=>'18','h'=>'205'), '3'=>array('d'=>'17','h'=>'204')),
			174=>array('4'=>array('d'=>'18','h'=>'205'), '0'=>array('d'=>'17','h'=>'204'), '7'=>array('d'=>'16','h'=>'205')),
			175=>array('5'=>array('d'=>'18','h'=>'205'), '1'=>array('d'=>'17','h'=>'204'), '6'=>array('d'=>'16','h'=>'205')),
			178=>'8',
			179=>'9',
			184=>'2',
			185=>'3',
			186=>'0',
			187=>'1',
			188=>'6',
			189=>'7',
			190=>'4',
			191=>'5',
			192=>'4',
			193=>'5',
			194=>'6',
			195=>'7',
			196=>'0',
			197=>'1',
			198=>'2',
			199=>'3',
			204=>'8',
			205=>'9',
			208=>'7',
			209=>'6',
			210=>'5',
			211=>'4',
			212=>'3',
			213=>'2',
			214=>'1',
			215=>'0',
			222=>'9',
			223=>'8',
			224=>'2',
			225=>'3',
			226=>'0',
			227=>'1',
			228=>'6',
			229=>'7',
			230=>'4',
			231=>'5',
			234=>'8',
			235=>'9',
			246=>'8',
			247=>'9',
			248=>'6',
			249=>'7',
			250=>'4',
			251=>'5',
			252=>'2',
			253=>'3',
			254=>'0',
			255=>'1',

	);

	$arr[8] = array(
			0=>'4',
			1=>'5',
			2=>'6',
			3=>'7',
			4=>'0',
			5=>'1',
			6=>'2',
			7=>'3',
			12=>'8',
			13=>'9',
			22=>array('9'=>array('d'=>13,'h'=>204), '8'=>array('d'=>19,'h'=>206)),
			23=>array('8'=>array('d'=>13,'h'=>204), '9'=>array('d'=>19,'h'=>206)),
			24=>array('7'=>array('d'=>13,'h'=>204), '6'=>array('d'=>19,'h'=>206)),
			25=>array('6'=>array('d'=>13,'h'=>204), '7'=>array('d'=>19,'h'=>206)),
			26=>array('5'=>array('d'=>13,'h'=>204), '4'=>array('d'=>19,'h'=>206)),
			27=>array('4'=>array('d'=>13,'h'=>204), '5'=>array('d'=>19,'h'=>206)),
			28=>array('3'=>array('d'=>13,'h'=>204), '2'=>array('d'=>19,'h'=>206)),
			29=>array('2'=>array('d'=>13,'h'=>204), '3'=>array('d'=>19,'h'=>206)),
			30=>array('1'=>array('d'=>13,'h'=>204), '0'=>array('d'=>19,'h'=>206)),
			31=>array('0'=>array('d'=>13,'h'=>204), '1'=>array('d'=>19,'h'=>206)),
			32=>'1',
			33=>'0',
			34=>'3',
			35=>'2',
			36=>'5',
			37=>'4',
			38=>array('7'=>array('d'=>11,'h'=>204), '0'=>array('d'=>14,'h'=>205)),
			39=>array('6'=>array('d'=>14,'h'=>205), '1'=>array('d'=>11,'h'=>204)),
			40=>'9',
			41=>'8',
			96=>'5',
			97=>'4',
			98=>'7',
			99=>'6',
			100=>'1',
			101=>'0',
			102=>'3',
			103=>'2',
			108=>'9',
			109=>'8',
			112=>'4',
			113=>'5',
			114=>'6',
			115=>'7',
			116=>'0',
			117=>'1',
			118=>'2',
			119=>'3',
			124=>'8',
			125=>'9',
			160=>array('1'=>array('d'=>15,'h'=>204), '2'=>array('d'=>21,'h'=>206), '7'=>array('d'=>18,'h'=>207)),
			161=>array('0'=>array('d'=>15,'h'=>204), '6'=>array('d'=>18,'h'=>207), '3'=>array('d'=>21,'h'=>206)),
			162=>array('3'=>array('d'=>15,'h'=>204), '5'=>array('d'=>18,'h'=>207), '0'=>array('d'=>21,'h'=>206)),
			163=>array('2'=>array('d'=>15,'h'=>204), '4'=>array('d'=>18,'h'=>207), '1'=>array('d'=>21,'h'=>206)),
			164=>array('5'=>array('d'=>15,'h'=>204), '3'=>array('d'=>18,'h'=>207), '6'=>array('d'=>21,'h'=>206)),
			165=>array('4'=>array('d'=>15,'h'=>204), '2'=>array('d'=>18,'h'=>207), '7'=>array('d'=>21,'h'=>206)),
			166=>array('7'=>array('d'=>15,'h'=>204), '1'=>array('d'=>18,'h'=>207), '4'=>array('d'=>21,'h'=>206)),
			167=>array('6'=>array('d'=>15,'h'=>204), '0'=>array('d'=>18,'h'=>207), '5'=>array('d'=>21,'h'=>206)),
			168=>'9',
			169=>'8',
			170=>'8',
			171=>'9',
			174=>'9',
			175=>'8',
			176=>'8',
			177=>'9',
			186=>'2',
			187=>'3',
			188=>'4',
			189=>'5',
			190=>'6',
			191=>'7',
			214=>'9',
			215=>'8',
			216=>'7',
			217=>'6',
			218=>'5',
			219=>'4',
			220=>'3',
			221=>'2',
			222=>'1',
			223=>'0',
			224=>'0',
			225=>'1',
			226=>array('2'=>array('d'=>17,'h'=>204), '9'=>array('d'=>17,'h'=>206)),
			227=>array('3'=>array('d'=>17,'h'=>204), '8'=>array('d'=>17,'h'=>206)),
			228=>'4',
			229=>'5',
			230=>'6',
			231=>'7',
			232=>array('8'=>array('d'=>17,'h'=>206), '3'=>array('d'=>17,'h'=>204)),
			233=>array('9'=>array('d'=>17,'h'=>204), '2'=>array('d'=>17,'h'=>206)),
			234=>'1',
			235=>'0',
			236=>'7',
			237=>'6',
			238=>'5',
			239=>'4',
			244=>'8',
	);

	$arr[10] = array(
			0=>'2',
			1=>'3',
			2=>array('0'=>array('d'=>15,'h'=>204), '8'=>array('d'=>21,'h'=>206)),
			3=>array('1'=>array('d'=>15,'h'=>204), '9'=>array('d'=>21,'h'=>206)),
			4=>'6',
			5=>'7',
			6=>'4',
			7=>'5',
			8=>'2',
			9=>'3',
			10=>array('8'=>array('d'=>15,'h'=>204), '0'=>array('d'=>21,'h'=>206)),
			11=>array('9'=>array('d'=>15,'h'=>204), '1'=>array('d'=>21,'h'=>206)),
			12=>'6',
			13=>'7',
			14=>'4',
			15=>'5',
			20=>'8',
			21=>'9',
			24=>'4',
			25=>'5',
			26=>'6',
			27=>'7',
			28=>'0',
			29=>'1',
			30=>'2',
			31=>'3',
			38=>'8',
			39=>'9',
			40=>'6',
			41=>'7',
			42=>array('1'=>array('d'=>13,'h'=>204), '4'=>array('d'=>19,'h'=>206)),
			43=>array('0'=>array('d'=>13,'h'=>204), '5'=>array('d'=>19,'h'=>206)),
			44=>'2',
			45=>'3',
			46=>'0',
			47=>'1',
			48=>'4',
			49=>'5',
			50=>'6',
			51=>'7',
			52=>'0',
			53=>'1',
			54=>'2',
			55=>'3',
			60=>'8',
			61=>'9',
			112=>array('3'=>array('d'=>17,'h'=>204), '9'=>array('d'=>21,'h'=>208)),
			113=>array('2'=>array('d'=>17,'h'=>204), '8'=>array('d'=>21,'h'=>208)),
			114=>'1',
			115=>'0',
			116=>'7',
			117=>'6',
			118=>'5',
			119=>'4',
			120=>'1',
			121=>'0',
			122=>array('9'=>array('d'=>17,'h'=>204), '3'=>array('d'=>21,'h'=>208)),
			123=>array('8'=>array('d'=>17,'h'=>204), '2'=>array('d'=>21,'h'=>208)),
			124=>'5',
			125=>'4',
			126=>'7',
			127=>'6',
			128=>'3',
			129=>'2',
			132=>'7',
			133=>'6',
			134=>'5',
			135=>'4',
			138=>'9',
			139=>'8',
			192=>array('3'=>array('d'=>18,'h'=>205), '2'=>array('d'=>17,'h'=>206)),
			193=>array('2'=>array('d'=>18,'h'=>205), '3'=>array('d'=>17,'h'=>206)),
			194=>array('1'=>array('d'=>18,'h'=>205), '0'=>array('d'=>17,'h'=>206)),
			195=>array('0'=>array('d'=>18,'h'=>205), '1'=>array('d'=>17,'h'=>206)),
			196=>array('7'=>array('d'=>18,'h'=>205), '6'=>array('d'=>17,'h'=>206)),
			197=>array('6'=>array('d'=>18,'h'=>205), '7'=>array('d'=>17,'h'=>206)),
			198=>array('5'=>array('d'=>18,'h'=>205), '4'=>array('d'=>17,'h'=>206)),
			199=>array('4'=>array('d'=>18,'h'=>205), '5'=>array('d'=>17,'h'=>206)),
			202=>array('9'=>array('d'=>18,'h'=>205), '8'=>array('d'=>17,'h'=>206)),
			203=>array('8'=>array('d'=>18,'h'=>205), '9'=>array('d'=>17,'h'=>206)),
			228=>'9',
			229=>'8',
			232=>'5',
			233=>'4',
			234=>'7',
			235=>'6',
			236=>'1',
			237=>'0',
			238=>'3',
			239=>'2',
	);

	$arr[12] = array(
			0=>'3',
			4=>'9',
			5=>'8',
			8=>'5',
			9=>'4',
			10=>'7',
			11=>'6',
			12=>'1',
			13=>'0',
			14=>'3',
			15=>'2',
			23=>'G',
			29=>'G',
			49=>'G',
			62=>'H',
			80=>'3',
			81=>'2',
			84=>'7',
			85=>'6',
			86=>'5',
			87=>'4',
			90=>'9',
			91=>'8',
			97=>'1',
			98=>array('8'=>array('d'=>20,'h'=>207), '2'=>array('d'=>21,'h'=>208)),
			99=>array('9'=>array('d'=>20,'h'=>207), '3'=>array('d'=>21,'h'=>208)),
			100=>'4',
			101=>'5',
			102=>'6',
			103=>'7',
			104=>array('8'=>array('d'=>21,'h'=>208), '2'=>array('d'=>20,'h'=>207)),
			105=>array('3'=>array('d'=>20,'h'=>207), '9'=>array('d'=>21,'h'=>208)),
			106=>'0',
			107=>'1',
			108=>'6',
			109=>'7',
			110=>'4',
			111=>'5',
			122=>array('0'=>array('d'=>15,'h'=>204), 'G'=>array('d'=>18,'h'=>205)),
			123=>'1',
			160=>'7',
			161=>'6',
			162=>'5',
			163=>'4',
			164=>'3',
			165=>'2',
			166=>'1',
			167=>'0',
			172=>'A',
			174=>'9',
			175=>array('8'=>array('d'=>17,'h'=>204), 'B'=>array('d'=>17,'h'=>206)),
			191=>'G',
			192=>'8',
			193=>'9',
			200=>'0',
			201=>'1',
			202=>'2',
			203=>'3',
			204=>'4',
			205=>'5',
			206=>'6',
			207=>'7',
			208=>'G',
			240=>'7',
			241=>'6',
			242=>'5',
			243=>'4',
			244=>'3',
			245=>'2',
			246=>'1',
			247=>'0',
			254=>'9',
			255=>'8',

	);

	$arr[14] = array(
			9=>'Q',
			11=>'S',
			12=>'T',
			14=>'V',
			15=>'W',
			64=>'I',
			65=>'H',
			66=>'K',
			69=>'L',

			71=>'N',
			78=>'G',
			79=>'F',
			104=>'E',
			105=>'D',
			108=>'A',
			110=>'C',
			111=>'B',
			112=>'9',
			113=>'8',
			120=>'1',
			121=>'0',
			122=>'3',
			123=>'2',
			124=>'5',
			125=>'4',
			126=>'7',
			127=>'6',
			148=>'1',
			149=>'0',
			208=>'3',
			209=>'2',
			212=>'7',
			213=>'6',
			214=>'5',
			215=>'4',
			218=>'9',
			219=>'8',
	);

	$arr[16] = array(
			68=>'A',
	);

	$restr = '';
	$len = strlen($str)/2;
	$d = hexdec($str[6].$str[7]);
	$h = hexdec($str[14].$str[15]);
	for($i=0;$i<$len;$i+=2){
		$st = $str[$i*2].$str[$i*2+1];
		$b = hexdec($st);//dechex(ord($str[$i].$str[$i+1]));
		if(isset($arr[$i][$b])){
			if(is_array($arr[$i][$b])){
				$is_ok = false;
				foreach ($arr[$i][$b] as $k=>$v){
					if($v['d']==$d && $v['h']==$h){
						$restr .= $k;
						$n = $k;
						$is_ok = true;
						break;
					}
				}
				if($is_ok == false){
					return ($i/2+1).'位字符转化失败'.$st.'未匹配'.$b;
					// 					echo ($i/2+1),'位字符转化失败',$st,'未匹配'.$b;
				}
				// 				$restr .= $arr[$i][$b][0];
			} else {
				$n = $arr[$i][$b];
				$restr .= $arr[$i][$b];
			}
			// 			echo ($i/2+1).'=>'.$st.'=>'.$b.'=>'.$n.'<br />';
		} else {
			// 			echo ($i/2+1).'位字符转化失败'.$st.'=>'.$b;
			return ($i/2+1).'位字符转化失败'.$st.'无值'.$b;
		}
	}
	//     	echo 'haha';
	//     	echo $str;
	// 	echo $restr;
	return $restr;
}

