<?php
function clearhtml($html){
	$search = array ("'<script[^>]*?>.*?</script>'si", "'<[/!]*?[^<>]*?>'si", "'([rn])[s]+'", "'&(quot|#34);'i", "'&(amp|#38);'i", "'&(lt|#60);'i", "'&(gt|#62);'i", "'&(nbsp|#160);'i", "'&(iexcl|#161);'i", "'&(cent|#162);'i", "'&(pound|#163);'i", "'&(copy|#169);'i", "'&#(d+);'e");
	$replace = array ("", "", "1", "\"", "&", "<", ">", " ", chr(161), chr(162), chr(163), chr(169), "chr(1)");
	return preg_replace($search, $replace, $html);
}
/*计算添加专利的费用缴费*/
function patent_fee($datereg,$type,$overdue=0,$per=1,$dateacc='',$num=0,$paydate='',$years=''){//注册年度 ，专利类型，是否过期，减缓比例，授权年度，，应缴日期，第几年度
	$datereg = strtotime($datereg);
	$dateacc = strtotime($dateacc);
	if($type==1){
		$fee = array(900,900,900,900,1200,1200,1200,2000,2000,2000,4000,4000,4000,6000,6000,6000,8000,8000,8000,8000,8000);//发明专利
	} else {
		$fee = array(600,600,600,600,900,900,1200,1200,1200,2000,2000);//外观专利和实用新型
	}
	if(!$years){
		$years = math_year($datereg,$overdue,$num);
	}
	$data['chk'] = true;
	if($years>20){//超过20年的专利都过期了
		$data['chk'] = false;
		$data['msg'] = '发明专利已过期';
		return $data;
	} else if($years>10 && $type!=1){//超过10年的非发明专利也过期了
		$data['chk'] = false;
		$data['msg'] = '专利已过期';
		return $data;
	}
	$data['year'] = $years;//专利年
	$data['basefee'] = $fee[$years];//基础费率
	$m = date('m',$datereg);//专利申请月
	$d = date('d',$datereg);//专利申请日
	if(!$paydate){
		if($m<date('m') || ($m==date('m') && $d<=date('d'))){//如果缴费日小于今天
			$paydate = (date('Y')+1+$num).'-'.$m.'-'.$d;
		} else {//大于今天
			$paydate = (date('Y')+$num).'-'.$m.'-'.$d;
		}
	}

	$data['paydate'] = $paydate;
	$data['dateyet'] = floor((strtotime(date("Ymd"))-strtotime($paydate))/86400);//计算天数为正则超期，为负则不超期
	if($overdue==-1){//如果超期了
		$m = (date('m',$paydate)+12-date('m'))%12;//超期月数
		if(date('d')>$d){//日期大于注册日期,月份加1
			$m++;
		}
		$data['date'] = (-strtotime(date("Y-m-d",time())))/86400+1;
		if($m <= 6 && $m>1){
			$data['overfee'] = $data['basefee']*0.05*($m-1);
		} else if($m==1){
			$data['overfee'] = 0;
		} else {
			$data['chk'] = false;
			$data['msg'] = '超期时间过长:'.$m.'个月';
			return $data;
		}
	} else {
		$data['overfee'] = 0;
	}

	if($data != '' && $per != 1){//已授权，并且有减缓
		$yearsacc = math_year($dateacc,$overdue);//计算授权年度
		if($yearsacc<7){
			$date['yearacc'] = $yearsacc;
			$data['cutfee'] = $data['basefee']*$per;//年费减缓
		} else {
			$data['cutfee'] = 0;
		}
	} else {
		$data['cutfee'] = 0;
	}
	$data['money'] = $data['basefee'] + $data['overfee'] - $data['cutfee'];
	return $data;
}

function math_year($date,$overdue=0,$num){
	$y = date('Y');//年
	$m = date('m');//月
	$d = date('d');//日
	$py = date('Y',$date);//专利年度
	$pm = date('m',$date);
	$pd = date('d',$date);
	$years = $y-$py;
	if($m>$pm || ($m==$pm && $d>$pd)){//如果月份超过，或者月份相同，但是日期超过，则为下一个年度。
		$years++;
	}
	$years = $years+$num+1;
	return $years;
}

function create_url($controller,$where){
	$type = $where['groupid'];
	if($type){
		unset($where['groupid']);
		if($where){
			$url = '?';
			foreach ($where as $key=>$value){
				$url.=$key.'='.$value.'&';
			}
			$newurl = substr($url, 0, -1);
		}
		echo U($controller.'/type'.$type).$newurl;
	}else{
		if($where){
			$url = '?';
			foreach ($where as $key=>$value){
				$url.=$key.'='.$value.'&';
			}
			$newurl = substr($url, 0, -1);
		}
		echo U($controller).$newurl;
	}
}




?>