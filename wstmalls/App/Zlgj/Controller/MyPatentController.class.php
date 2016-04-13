<?php
namespace Zlgj\Controller;
class MyPatentController extends ZlgjBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	public function test(){
		$ptn = I('ptn');
		//获取专利申请号和页数
		$pa = new \Org\Patent\Patent($ptn);
		$panum = $pa->getArr();
		$geturl = $panum['0']['4'].'/'.$panum['0']['5'];
		//print_r($geturl);die;
		$padetail = new \Org\Patent\Patent('','',$geturl);
		$patentdetail = $padetail->getDetail();
		print_r($patentdetail);die;
	}
	
	/*更新专利详情表*/
	public function addPaDetail(){
		ini_set("max_execution_time",'0');//表示程序没有执行时间的限制
		$result = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.zlpage,h.patentnum,h.legalstatusdetail,p.id as pmid,p.memberid')->select();
		foreach ($result as $key => $value){
		if($value['legalstatusdetail']){
			$geturl = $value['patentnum'].'/'.$value['zlpage'];
			$padetail = new \Org\Patent\Patent('','',$geturl);
			$patentdetail = $padetail->getDetail();
			if($patentdetail[14]){
				$legalcount =  count($patentdetail[50][0]);//法律状态详情
				switch($legalcount){
					case'2':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),);
						break;
					case'4':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
						),);
						break;
					case'6':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[50][0][4]),
						'legalstatus'=>trim($patentdetail[50][0][5]),
						'legalstatusdetails'=>trim($patentdetail[50][1][2]),
						),);
						break;
					case'8':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[50][0][4]),
						'legalstatus'=>trim($patentdetail[50][0][5]),
						'legalstatusdetails'=>trim($patentdetail[50][1][2]),
						),
						'3'=>array(
						'andate'=>trim($patentdetail[50][0][6]),
						'legalstatus'=>trim($patentdetail[50][0][7]),
						'legalstatusdetails'=>trim($patentdetail[50][1][3]),
						),);
						break;
				}
			}else{
				if($patentdetail[48][0]){
					$legalcount =  count($patentdetail[48][0]);//法律状态详情
					switch($legalcount){
						case'2':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),);
							break;
						case'4':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[48][0][2]),
							'legalstatus'=>trim($patentdetail[48][0][3]),
							'legalstatusdetails'=>trim($patentdetail[48][1][1]),
							),);
							break;
						case'6':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[48][0][2]),
							'legalstatus'=>trim($patentdetail[48][0][3]),
							'legalstatusdetails'=>trim($patentdetail[48][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[48][0][4]),
							'legalstatus'=>trim($patentdetail[48][0][5]),
							'legalstatusdetails'=>trim($patentdetail[48][1][2]),
							),);
							break;
						case'8':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[48][0][2]),
							'legalstatus'=>trim($patentdetail[48][0][3]),
							'legalstatusdetails'=>trim($patentdetail[48][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[48][0][4]),
							'legalstatus'=>trim($patentdetail[48][0][5]),
							'legalstatusdetails'=>trim($patentdetail[48][1][2]),
							),
							'3'=>array(
							'andate'=>trim($patentdetail[48][0][6]),
							'legalstatus'=>trim($patentdetail[48][0][7]),
							'legalstatusdetails'=>trim($patentdetail[48][1][3]),
							),);
							break;
					}
				}else{
					$legalcount =  count($patentdetail[47][0]);//法律状态详情
					switch($legalcount){
						case'2':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),);
							break;
						case'4':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[47][0][2]),
							'legalstatus'=>trim($patentdetail[47][0][3]),
							'legalstatusdetails'=>trim($patentdetail[47][1][1]),
							),);
							break;
						case'6':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[47][0][2]),
							'legalstatus'=>trim($patentdetail[47][0][3]),
							'legalstatusdetails'=>trim($patentdetail[47][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[47][0][4]),
							'legalstatus'=>trim($patentdetail[47][0][5]),
							'legalstatusdetails'=>trim($patentdetail[47][1][2]),
							),);
							break;
						case'8':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[47][0][2]),
							'legalstatus'=>trim($patentdetail[47][0][3]),
							'legalstatusdetails'=>trim($patentdetail[47][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[47][0][4]),
							'legalstatus'=>trim($patentdetail[47][0][5]),
							'legalstatusdetails'=>trim($patentdetail[47][1][2]),
							),
							'3'=>array(
							'andate'=>trim($patentdetail[47][0][6]),
							'legalstatus'=>trim($patentdetail[47][0][7]),
							'legalstatusdetails'=>trim($patentdetail[47][1][3]),
							),);
							break;
					}
				}
			}
			 foreach ($legalstatus as $k => $v){
			 	$condition['itemid'] = $value['id'];
			 	$condition['ptno'] = $value['patentnum'];
			 	$condition['userid'] = $value['memberid'];
			 	$sql = M('legalstatusDetail')->where($condition)->find();
			 	if(!$sql){
					$da['itemid'] = $value['id'];
					$da['ptno'] = $value['patentnum'];
					$da['userid'] = $value['memberid'];
					$da['andate'] = $v['andate'];
					$da['legalstatus'] = $v['legalstatus'];
					$da['legalstatusdetails'] = $v['legalstatusdetails'];
					$legal = M('legalstatusDetail')->add($da);
			 	}
			}
		}}
	}
	
	/*更新年费监控*/
	public function updateFee(){
		$result = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.memberid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price,p.pic_isdel,p.latetime,p.latefee,p.daynum,p.process_state,p.annual_state,p.pay_total')->select();
		foreach ($result as $key => $value){
			if(!$value['slow']){
				$jf = patent_fee(date("Y-m-d",$value['applydate']),$value['type'],0,1,date("Y-m-d",$value['authdate']));
				$wh['memberid'] = $value['memberid'];
				$wh['applynum'] = $value['patentnum'];
				$dat['annual'] = $jf['year'];//缴费第几年
				$dat['should'] = strtotime($jf['paydate']);//应缴日期
				$dat['slow'] = '3';//默认无减缓
				$dat['pay_total'] = $jf['money'];//总缴费金额
				$dat['daynum'] = $jf['dateyet'];//距离下次缴费天数或者时超过天数
				$dat['latefee'] = $jf['overfee'];//滞纳金额
				M('patentMember')->where($wh)->save($dat);
			}
		} 
	}
	
	/*更新专利数据信息*/
	public function updatePatent(){
		ini_set("max_execution_time",'0');//表示程序没有执行时间的限制
		$model = M('patentHousekeeper');
		$legalmodel = M('legalstatusDetail');
		$update = $model->select();
		foreach ($update as $key => $value){
			if(!$value['legalstatus']){
			$geturl = $value['patentnum'].'/'.$value['zlpage'];
			$padetail = new \Org\Patent\Patent('','',$geturl);
			$patentdetail = $padetail->getDetail();
			if($patentdetail[14]){ //有授权信息
				$data['patentnum'] = trim($patentdetail[4][0]);//申请/专利号
				$data['applydate'] = strtotime(trim($patentdetail[8][0]));//申请日
				$data['opennum'] = $patentdetail[10][0];//公开/公告号
				$data['announcenum'] = strtotime(trim($patentdetail[12][0]));//公开/公告日
				$data['authnum'] = $patentdetail[14][0];//授权公告号
				$data['authdate'] = strtotime($patentdetail[16][0]);//授权公告日
				$data['patentee'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[18][0])))));;//专利权人
				$data['inventor'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[20][0])))));//发明人
				$data['patenteeaddr'] = $patentdetail[26][0];//专利权人地址
				$data['provincecode'] = $patentdetail[28][0];//国省代码
				$data['certified'] = $patentdetail[30][0];//颁证日
				$data['cateclass'] = $patentdetail[32][0];//范畴分类
				$data['internatapply'] = $patentdetail[38][0];//国际申请
				$data['internatpublic'] = $patentdetail[40][0];//国际公布
				$data['intodate'] = $patentdetail[42][0];//进入国家日期
				$data['subclassnum'] = $patentdetail[68][0];//分类号
				$data['priority'] = $patentdetail[6][0];//优先权
				$data['divisionapply'] = $patentdetail[24][0];//分案申请
				$data['picture'] = $patentdetail[46][0];//附图
				$data['legalstatus'] = $patentdetail[70][0];//当前法律状态
				if($patentdetail[34][0] != strip_tags($patentdetail[34][0])){
					$data['agency'] = '暂无信息';
				} else {
					$data['agency'] = strip_tags($patentdetail[34][0]);
				}
				if($patentdetail[36][0] != strip_tags($patentdetail[36][0])){
					$data['agent'] = '暂无信息';
				} else {
					$data['agent'] = strip_tags($patentdetail[36][0]);
				}
				$data['sovereignitem'] = $patentdetail[48][0];//主权项
				$legalcount =  count($patentdetail[50][0]);//法律状态详情
				switch($legalcount){
					case'2':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),);
						break;
					case'4':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
						),);
						break;
					case'6':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[50][0][4]),
						'legalstatus'=>trim($patentdetail[50][0][5]),
						'legalstatusdetails'=>trim($patentdetail[50][1][2]),
						),);
						break;
					case'8':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[50][0][4]),
						'legalstatus'=>trim($patentdetail[50][0][5]),
						'legalstatusdetails'=>trim($patentdetail[50][1][2]),
						),
						'3'=>array(
						'andate'=>trim($patentdetail[50][0][6]),
						'legalstatus'=>trim($patentdetail[50][0][7]),
						'legalstatusdetails'=>trim($patentdetail[50][1][3]),
						),);
						break;
				}
				$data['legalstatusdetail'] = trim(json_encode($legalstatus));
				$data['citingliterature'] = '专利引证信息:'.strip_tags($patentdetail[52][0]).'<br />'.'非专利引证信息：'.strip_tags($patentdetail[54][0]);//专利引证信息和非专利引证信息
				$data['kinpatent'] = strip_tags($patentdetail[56][0]);//同族专利
				$where['patentnum'] = $patentdetail[4][0];
				$sql = $model->where($where)->filter('trim')->save($data);
			} else { //无授权信息的
				$data['patentnum'] = trim($patentdetail[4][0]);//申请/专利号
				$data['priority'] = $patentdetail[6][0];//优先权
				$data['applydate'] = strtotime($patentdetail[8][0]);//申请日
				$data['opennum'] = $patentdetail[10][0];//公开/公告号
				$data['announcenum'] = strtotime($patentdetail[12][0]);//公开/公告日
				$data['patentee'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[16][0])))));//专利权人
				$data['inventor'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[18][0])))));
				$data['mainclassnum'] = $patentdetail[20][0];//主分类号
				$data['patenteeaddr'] = $patentdetail[24][0];//专利权人地址
				$data['subclassnum'] = $patentdetail[68][0];//分类号
				$data['divisionapply'] = $patentdetail[22][0];//分案申请
				$data['provincecode'] = $patentdetail[26][0];//国省代码
				$data['certified'] = $patentdetail[28][0];//颁证日
				$data['cateclass'] = $patentdetail[30][0];//范畴分类
				$data['internatapply'] = $patentdetail[36][0];//国际申请
				$data['internatpublic'] = $patentdetail[38][0];//国际公布
				$data['intodate'] = $patentdetail[40][0];//进入国家日期
				if($patentdetail[65][0]){
					$data['legalstatus'] = $patentdetail[65][0];//当前法律状态
				}elseif($patentdetail[64][0]){
					$data['legalstatus'] = $patentdetail[64][0];//当前法律状态
				}else{
					$data['legalstatus'] = $patentdetail[63][0];//当前法律状态
				}
				$data['info'] = $patentdetail[42][0];//摘要
				if($data['info']){
					$data['picture'] = $patentdetail[44][0];//附图
				} else {
					$data['picture'] = $patentdetail[43][0];//附图
				}
				if($patentdetail[32][0] != strip_tags($patentdetail[32][0])){
					$data['agency'] = '暂无信息';
				} else {
					$data['agency'] = strip_tags($patentdetail[32][0]);
				}
				if($patentdetail[34][0] != strip_tags($patentdetail[34][0])){
					$data['agent'] = '暂无信息';
				} else {
					$data['agent'] = strip_tags($patentdetail[34][0]);
				}
				if($patentdetail[45][0]){
					$data['sovereignitem'] = $patentdetail[45][0];//主权项
				} else {
					$data['sovereignitem'] = $patentdetail[46][0];//主权项
				}
				if($patentdetail[48][0]){
					$legalcount =  count($patentdetail[48][0]);//法律状态详情
					switch($legalcount){
						case'2':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),);
							break;
						case'4':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[48][0][2]),
							'legalstatus'=>trim($patentdetail[48][0][3]),
							'legalstatusdetails'=>trim($patentdetail[48][1][1]),
							),);
							break;
						case'6':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[48][0][2]),
							'legalstatus'=>trim($patentdetail[48][0][3]),
							'legalstatusdetails'=>trim($patentdetail[48][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[48][0][4]),
							'legalstatus'=>trim($patentdetail[48][0][5]),
							'legalstatusdetails'=>trim($patentdetail[48][1][2]),
							),);
							break;
						case'8':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[48][0][0]),
							'legalstatus'=>trim($patentdetail[48][0][1]),
							'legalstatusdetails'=>trim($patentdetail[48][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[48][0][2]),
							'legalstatus'=>trim($patentdetail[48][0][3]),
							'legalstatusdetails'=>trim($patentdetail[48][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[48][0][4]),
							'legalstatus'=>trim($patentdetail[48][0][5]),
							'legalstatusdetails'=>trim($patentdetail[48][1][2]),
							),
							'3'=>array(
							'andate'=>trim($patentdetail[48][0][6]),
							'legalstatus'=>trim($patentdetail[48][0][7]),
							'legalstatusdetails'=>trim($patentdetail[48][1][3]),
							),);
							break;
					}
				}else{
					$legalcount =  count($patentdetail[47][0]);//法律状态详情
					switch($legalcount){
						case'2':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),);
							break;
						case'4':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[47][0][2]),
							'legalstatus'=>trim($patentdetail[47][0][3]),
							'legalstatusdetails'=>trim($patentdetail[47][1][1]),
							),);
							break;
						case'6':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[47][0][2]),
							'legalstatus'=>trim($patentdetail[47][0][3]),
							'legalstatusdetails'=>trim($patentdetail[47][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[47][0][4]),
							'legalstatus'=>trim($patentdetail[47][0][5]),
							'legalstatusdetails'=>trim($patentdetail[47][1][2]),
							),);
							break;
						case'8':
							$legalstatus = array(
							'0'=>array(
							'andate'=>trim($patentdetail[47][0][0]),
							'legalstatus'=>trim($patentdetail[47][0][1]),
							'legalstatusdetails'=>trim($patentdetail[47][1][0]),
							),
							'1'=>array(
							'andate'=>trim($patentdetail[47][0][2]),
							'legalstatus'=>trim($patentdetail[47][0][3]),
							'legalstatusdetails'=>trim($patentdetail[47][1][1]),
							),
							'2'=>array(
							'andate'=>trim($patentdetail[47][0][4]),
							'legalstatus'=>trim($patentdetail[47][0][5]),
							'legalstatusdetails'=>trim($patentdetail[47][1][2]),
							),
							'3'=>array(
							'andate'=>trim($patentdetail[47][0][6]),
							'legalstatus'=>trim($patentdetail[47][0][7]),
							'legalstatusdetails'=>trim($patentdetail[47][1][3]),
							),);
							break;
					}
				}
				
				$data['legalstatusdetail'] = trim(json_encode($legalstatus));
				if(strip_tags($patentdetail[50][0]) && strip_tags($patentdetail[52][0])){
					$data['citingliterature'] = '专利引证信息:'.strip_tags($patentdetail[50][0]).'<br />'.'非专利引证信息：'.strip_tags($patentdetail[52][0]);//专利引证信息和非专利引证信息
				}
				$data['kinpatent'] = strip_tags($patentdetail[54][0]);//同族专利
				$where['patentnum'] = $patentdetail[4][0];
				$sql = $model->where($where)->filter('trim')->save($data);
				}
			}
		}
	}
	
	/* 添加专利  */
	public function addpatent($q='',$px='0',$lawst='0',$p='1'){
		$data['member'] = M('Member')->where('id = '.session('user.id'))->find();

		echo 1122211;
		die;
		$url = explode('&', $_SERVER["QUERY_STRING"]);
		$data['paraurl'] = $url['1'];
			switch (I('st')){
	    			case 1:
						$q = trim($q);//综合
						break;
					case 2:
						$q = 'pa:("'.trim($q).'")';//专利权人
						break;
					case 3:
						$q = 'in:("'.trim($q).'")';//发明人
						break;
					case 4:
						$q = 'an:("'.trim($q).'")';//专利号
						break;
					case 5:
						$q = 'agc:("'.trim($q).'")';//代理机构
						break;
	    	}
			$t2 = $t3 = $t4 = $t5 = $t6 = '';
			if(I('Fruit1')){
				$data['type'] = I('Fruit1');
			} else {
				if(I('Fruit2')){
					$t2 = I('Fruit2');
				}
				if(I('Fruit3')){
					$t3 = I('Fruit3');
				}
				if(I('Fruit4')){
					$t4 = I('Fruit4');
				}
				if(I('Fruit5')){
					$t5 = I('Fruit5');
				}
				if(I('Fruit6')){
					$t6 = I('Fruit6');
				}
				$data['type'] = $t2+$t3+$t4+$t5+$t6;
			}
			/* 火狐，谷歌，IE转码 */
			$zmq = iconv("GBK","utf-8",$q);
			$q = $zmq?$zmq:$q;
			$patent = new \Org\Patent\Patent($q,$p,'',$px,$lawst,$data['type']);
			$data['arr'] = $patent->getArr();
			foreach ($data['arr'] as $key => $value){
				$data['arr'][$key]['6'] = strip_tags($data['arr'][$key]['6']);
				$data['arr'][$key]['10'] = explode('/',$value['10']);
				$data['arr'][$key]['10']['6'] = $data['arr'][$key]['10']['4'].'/'.$data['arr'][$key]['10']['5'];
				if(stristr($data['arr'][$key]['1'],'发明')){
					$data['arr'][$key]['1'] = '发明';
				}elseif (stristr($data['arr'][$key]['1'],'实用')){
					$data['arr'][$key]['1'] = '实用';
				}elseif (stristr($data['arr'][$key]['1'],'外观')){
					$data['arr'][$key]['1'] = '外观';
				}elseif (stristr($data['arr'][$key]['1'],'中国台湾专利')){
					$data['arr'][$key]['1'] = '中国台湾';
				}elseif (stristr($data['arr'][$key]['1'],'香港特区')){
					$data['arr'][$key]['1'] = '中国香港';
				}
				$map['applynum'] = $value[4];
				$map['status'] = 1;
				$map['memberid'] = session('user.id');
				$membersql = M('patentMember')->where($map)->find();
				if($membersql){
					$data['arr'][$key]['100'] = '已添加';
				} else {
					$data['arr'][$key]['100'] = '未添加';
				}
			}

			$patenttype = $patent->many();//检索结果的所有类型数量
			$count = $patent->count();//数量
			$pagesize = 10;
			$newpage = new \Org\Util\ZlgjPage($count,$pagesize);//实例化分类页
			if($count && $count > $pagesize){
				$data['page'] = $newpage->getPage();//数据分页
			}
		$this->assign('data',$data);
		$this->display();
	}
	
	/* 当数据不存在表patentHousekeeper中，需要把详情写入进去 */
	public function addDetail($ptn,$num){
		$getpath1 = $ptn;
		$getpath2 = $num;
		$model = M('patentHousekeeper');
		$legalmodel = M('legalstatusDetail');
		//数据库有信息的
		$geturl = $getpath1.'/'.$getpath2;
		$padetail = new \Org\Patent\Patent('','',$geturl);
		$patentdetail = $padetail->getDetail();
		if($patentdetail[14]){ //有授权信息
			$data['patentnum'] = trim($patentdetail[4][0]);//申请/专利号
			$data['opennum'] = $patentdetail[10][0];//公开/公告号
			$data['announcenum'] = strtotime($patentdetail[12][0]);//公开/公告日
			$data['authnum'] = $patentdetail[14][0];//授权公告号
			$data['authdate'] = strtotime($patentdetail[16][0]);//授权公告日
			$data['patentee'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[18][0])))));;//专利权人
			$data['inventor'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[20][0])))));//发明人
			$data['patenteeaddr'] = $patentdetail[26][0];//专利权人地址
			$data['provincecode'] = $patentdetail[28][0];//国省代码
			$data['certified'] = $patentdetail[30][0];//颁证日
			$data['cateclass'] = $patentdetail[32][0];//范畴分类
			$data['internatapply'] = $patentdetail[38][0];//国际申请
			$data['internatpublic'] = $patentdetail[40][0];//国际公布
			$data['intodate'] = $patentdetail[42][0];//进入国家日期
			$data['subclassnum'] = $patentdetail[68][0];//分类号
			$data['priority'] = $patentdetail[6][0];//优先权
			$data['divisionapply'] = $patentdetail[24][0];//分案申请
			$data['picture'] = $patentdetail[46][0];//附图
			if($patentdetail[34][0] != strip_tags($patentdetail[34][0])){
				$data['agency'] = '暂无信息';
			} else {
				$data['agency'] = strip_tags($patentdetail[34][0]);
			}
			if($patentdetail[36][0] != strip_tags($patentdetail[36][0])){
				$data['agent'] = '暂无信息';
			} else {
				$data['agent'] = strip_tags($patentdetail[36][0]);
			}
			$data['sovereignitem'] = $patentdetail[48][0];//主权项
			$legalcount =  count($patentdetail[50][0]);//法律状态详情
			switch($legalcount){
				case'2':
					$legalstatus = array(
					'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
					),);
					break;
				case'4':
					$legalstatus = array(
					'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
					),
					'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
					),);
					break;
				case'6':
					$legalstatus = array(
					'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
					),
					'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
					),
					'2'=>array(
						'andate'=>trim($patentdetail[50][0][4]),
						'legalstatus'=>trim($patentdetail[50][0][5]),
						'legalstatusdetails'=>trim($patentdetail[50][1][2]),
					),);
					break;
				case'8':
					$legalstatus = array(
					'0'=>array(
						'andate'=>trim($patentdetail[50][0][0]),
						'legalstatus'=>trim($patentdetail[50][0][1]),
						'legalstatusdetails'=>trim($patentdetail[50][1][0]),
					),
					'1'=>array(
						'andate'=>trim($patentdetail[50][0][2]),
						'legalstatus'=>trim($patentdetail[50][0][3]),
						'legalstatusdetails'=>trim($patentdetail[50][1][1]),
					),
					'2'=>array(
						'andate'=>trim($patentdetail[50][0][4]),
						'legalstatus'=>trim($patentdetail[50][0][5]),
						'legalstatusdetails'=>trim($patentdetail[50][1][2]),
					),
					'3'=>array(
						'andate'=>trim($patentdetail[50][0][6]),
						'legalstatus'=>trim($patentdetail[50][0][7]),
						'legalstatusdetails'=>trim($patentdetail[50][1][3]),
					),);
					break;
			}
			$data['legalstatusdetail'] = trim(json_encode($legalstatus));
			$data['citingliterature'] = '专利引证信息:'.strip_tags($patentdetail[52][0]).'<br />'.'非专利引证信息：'.strip_tags($patentdetail[54][0]);//专利引证信息和非专利引证信息
			$data['kinpatent'] = strip_tags($patentdetail[56][0]);//同族专利
			$where['patentnum'] = $patentdetail[4][0];
			$sql = $model->where($where)->filter('trim')->save($data);
			$detail = $model->where($where)->find();
			foreach ($legalstatus as $key => $value) {
				$add['itemid'] = $detail['id'];
				$add['userid'] = session('user.id');
				$add['ptno'] = $detail['patentnum'];
				$add['andate'] = $value['andate'];
				$add['legalstatus'] = $value['legalstatus'];
				$add['legalstatusdetails'] = $value['legalstatusdetails'];
				$lss = M('legalstatusDetail')->add($add);
			}
		} else { //无授权信息的
			$data['patentnum'] = trim($patentdetail[4][0]);//申请/专利号
			$data['priority'] = $patentdetail[6][0];//优先权
			$data['applydate'] = strtotime($patentdetail[8][0]);//申请日
			$data['opennum'] = $patentdetail[10][0];//公开/公告号
			$data['announcenum'] = strtotime($patentdetail[12][0]);//公开/公告日
			$data['patentee'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[16][0])))));//专利权人
			$data['inventor'] = str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[18][0])))));
			$data['mainclassnum'] = $patentdetail[20][0];//主分类号
			$data['patenteeaddr'] = $patentdetail[24][0];//专利权人地址
			$data['subclassnum'] = $patentdetail[68][0];//分类号
			$data['divisionapply'] = $patentdetail[22][0];//分案申请
			$data['provincecode'] = $patentdetail[26][0];//国省代码
			$data['certified'] = $patentdetail[28][0];//颁证日
			$data['cateclass'] = $patentdetail[30][0];//范畴分类
			$data['internatapply'] = $patentdetail[36][0];//国际申请
			$data['internatpublic'] = $patentdetail[38][0];//国际公布
			$data['intodate'] = $patentdetail[40][0];//进入国家日期
			$data['info'] = $patentdetail[42][0];//摘要
			if($data['info']){
				$data['picture'] = $patentdetail[44][0];//附图
			} else {
				$data['picture'] = $patentdetail[43][0];//附图
			}
			if($patentdetail[32][0] != strip_tags($patentdetail[32][0])){
				$data['agency'] = '暂无信息';
			} else {
				$data['agency'] = strip_tags($patentdetail[32][0]);
			}
			if($patentdetail[34][0] != strip_tags($patentdetail[34][0])){
				$data['agent'] = '暂无信息';
			} else {
				$data['agent'] = strip_tags($patentdetail[34][0]);
			}
			if($patentdetail[45][0]){
				$data['sovereignitem'] = $patentdetail[45][0];//主权项
			} else {
				$data['sovereignitem'] = $patentdetail[46][0];//主权项
			}
			if($patentdetail[48][0]){
				$legalcount =  count($patentdetail[48][0]);//法律状态详情
				switch($legalcount){
					case'2':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[48][0][0]),
						'legalstatus'=>trim($patentdetail[48][0][1]),
						'legalstatusdetails'=>trim($patentdetail[48][1][0]),
						),);
						break;
					case'4':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[48][0][0]),
						'legalstatus'=>trim($patentdetail[48][0][1]),
						'legalstatusdetails'=>trim($patentdetail[48][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[48][0][2]),
						'legalstatus'=>trim($patentdetail[48][0][3]),
						'legalstatusdetails'=>trim($patentdetail[48][1][1]),
						),);
						break;
					case'6':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[48][0][0]),
						'legalstatus'=>trim($patentdetail[48][0][1]),
						'legalstatusdetails'=>trim($patentdetail[48][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[48][0][2]),
						'legalstatus'=>trim($patentdetail[48][0][3]),
						'legalstatusdetails'=>trim($patentdetail[48][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[48][0][4]),
						'legalstatus'=>trim($patentdetail[48][0][5]),
						'legalstatusdetails'=>trim($patentdetail[48][1][2]),
						),);
						break;
					case'8':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[48][0][0]),
						'legalstatus'=>trim($patentdetail[48][0][1]),
						'legalstatusdetails'=>trim($patentdetail[48][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[48][0][2]),
						'legalstatus'=>trim($patentdetail[48][0][3]),
						'legalstatusdetails'=>trim($patentdetail[48][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[48][0][4]),
						'legalstatus'=>trim($patentdetail[48][0][5]),
						'legalstatusdetails'=>trim($patentdetail[48][1][2]),
						),
						'3'=>array(
						'andate'=>trim($patentdetail[48][0][6]),
						'legalstatus'=>trim($patentdetail[48][0][7]),
						'legalstatusdetails'=>trim($patentdetail[48][1][3]),
						),);
						break;
				}
			}else{
				$legalcount =  count($patentdetail[47][0]);//法律状态详情
				switch($legalcount){
					case'2':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[47][0][0]),
						'legalstatus'=>trim($patentdetail[47][0][1]),
						'legalstatusdetails'=>trim($patentdetail[47][1][0]),
						),);
						break;
					case'4':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[47][0][0]),
						'legalstatus'=>trim($patentdetail[47][0][1]),
						'legalstatusdetails'=>trim($patentdetail[47][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[47][0][2]),
						'legalstatus'=>trim($patentdetail[47][0][3]),
						'legalstatusdetails'=>trim($patentdetail[47][1][1]),
						),);
						break;
					case'6':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[47][0][0]),
						'legalstatus'=>trim($patentdetail[47][0][1]),
						'legalstatusdetails'=>trim($patentdetail[47][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[47][0][2]),
						'legalstatus'=>trim($patentdetail[47][0][3]),
						'legalstatusdetails'=>trim($patentdetail[47][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[47][0][4]),
						'legalstatus'=>trim($patentdetail[47][0][5]),
						'legalstatusdetails'=>trim($patentdetail[47][1][2]),
						),);
						break;
					case'8':
						$legalstatus = array(
						'0'=>array(
						'andate'=>trim($patentdetail[47][0][0]),
						'legalstatus'=>trim($patentdetail[47][0][1]),
						'legalstatusdetails'=>trim($patentdetail[47][1][0]),
						),
						'1'=>array(
						'andate'=>trim($patentdetail[47][0][2]),
						'legalstatus'=>trim($patentdetail[47][0][3]),
						'legalstatusdetails'=>trim($patentdetail[47][1][1]),
						),
						'2'=>array(
						'andate'=>trim($patentdetail[47][0][4]),
						'legalstatus'=>trim($patentdetail[47][0][5]),
						'legalstatusdetails'=>trim($patentdetail[47][1][2]),
						),
						'3'=>array(
						'andate'=>trim($patentdetail[47][0][6]),
						'legalstatus'=>trim($patentdetail[47][0][7]),
						'legalstatusdetails'=>trim($patentdetail[47][1][3]),
						),);
						break;
				}
			}
			$data['legalstatusdetail'] = trim(json_encode($legalstatus));
			if(strip_tags($patentdetail[50][0]) && strip_tags($patentdetail[52][0])){
				$data['citingliterature'] = '专利引证信息:'.strip_tags($patentdetail[50][0]).'<br />'.'非专利引证信息：'.strip_tags($patentdetail[52][0]);//专利引证信息和非专利引证信息
			}
			$data['kinpatent'] = strip_tags($patentdetail[54][0]);//同族专利
			$where['patentnum'] = $patentdetail[4][0];
			$sql = $model->where($where)->filter('trim')->save($data);
			$detail = $model->where($where)->find();
			foreach ($legalstatus as $key => $value) {
				$add['itemid'] = $detail['id'];
				$add['userid'] = session('user.id');
				$add['ptno'] = $detail['patentnum'];
				$add['andate'] = $value['andate'];
				$add['legalstatus'] = $value['legalstatus'];
				$add['legalstatusdetails'] = $value['legalstatusdetails'];
				$lss = M('legalstatusDetail')->add($add);
			}
		}
	}
	
	/* 手动添加数据 */
	public function addManual(){
		$da['memberid'] = session('user.id');
		$da['applynum'] = I('appnum');//申请号;
		$da['keystatus'] = '2';
		$da['addtime'] = time();
		$da['status'] = '1';
		$res = M('patentMember')->add($da);
		$dat['pmid'] = $res; 
		$dat['name'] ='图片1';
		$dat['url'] = R('Index/Upload/save_mfile',array('smwj',''));
		M('patentFile')->add($dat);
		$data['patentnum'] = I('appnum');//申请号
		$data['cname'] = I('ptname');//专利名称
		$data['patentee'] = I('holder');//权利人
		$data['inventor'] = I('inventor');//发明人
		$data['type'] = I('pttype');//专利类型
		$data['applydate'] = strtotime(I('appdate'));//申请日期
		$data['applyyear'] = date('Y',strtotime(I('appdate')));//获取申请日期的年份
		$data['legalstatus'] = I('legstatus');//法律状态
		$data['picture'] = I('postthumb1').','.I('postthumb2').','.I('postthumb3');//专利图片 
		$data['userid'] = session('user.id');
		$result = M('patentHousekeeper')->add($data);
		if($result){
			$this->success('添加成功！');
		}else {
			$this->error('添加失败！');
		}
	}
	

    /* 单个添加和删除数据 */
    public function addpatentajax(){
    	$data['type'] = I('type');
    	if($data['type'] =='发明') {
    		$data['type'] = 1;
    	} elseif($data['type'] == '外观') {
	    	$data['type'] = 2;
	    } elseif($data['type'] == '实用') {
	    	$data['type'] = 3;
	    } elseif($data['type'] == '中国台湾') {
    		$data['type'] = 4;
    	} elseif($data['type'] == '中国香港') {
    		$data['type'] = 5;
    	} else {
	    	$data['type'] = 1;
	    }
    	$data['cname'] = I('title');//标题
    	$data['patentnum'] = I('ptno','','strip_tags');//专利号
    	$data['patentee'] = I('ptp','','strip_tags');//专利权人
    	$data['applydate'] = strtotime(I('date'));//申请日
    	$yeartime = explode('-',I('date'));
    	$data['applyyear'] = $yeartime[0];//年
    	$data['mainclassnum'] = I('mclass');//主分类号
    	$data['info'] = I('info');//摘要信息
    	$data['zlpage'] = I('pagenum');//专利页数
    	if(I('intor')){
    		$data['inventor'] = I('intor','','strip_tags');//发明人
    	}
    	if(I('agency')){
    		$data['agency'] = I('agency','','strip_tags');//代理机构
    	}
    	if(I('legalstatus')){
    		$data['legalstatus'] = I('legalstatus');//法律状态
    	}
    	//先做数据判断，是否存在此数据。
    	$house = M('patentHousekeeper');
    	$patentmember = M('patentMember');
    	$patentDetail = M('legalstatusDetail');
    	/* 判断是添加功能还是删除功能 */
    	$where['patentnum'] = I('ptno','','strip_tags');
    	$where['memberid'] = session('user.id');
    	$selectsql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.userid')->where($where)->find();
    	/* 如果有数据那就是执行删除功能，否则添加功能 */
	    if($selectsql){
	    	$wh['applynum'] = $data['patentnum'];
	    	$wh['memberid'] = session('user.id');
	    	$delsql = $patentmember->where($wh)->delete();//删除功能
	    	/*删除对应表legalstatusDetail中的数据*/
	    	$wd['itemid'] = $selectsql['id'];
	    	$wd['ptno'] = $data['patentnum'];
	    	$wd['userid'] = session('user.id');
	    	$patentDetail->where($wd)->delete();//删除功能
	    	if($selectsql['userid']&&$data['patentnum']){
	    		$con['userid'] = session('user.id');
	    		$con['patentnum'] = $data['patentnum'];
	    		$house->where($con)->delete();//删掉用户手动添加的数据
	    	}
	    	if($delsql){
	    		echo '删除成功';
	    	}else{
	    		echo '删除失败';
	    	}
	    } else {
	    	/* 添加时查询patentHousekeeper表是否有此条数据，有则更新主表的法律状态数据，否则新增数据 */
	    	$map['patentnum'] = I('ptno','','strip_tags');
	    	$houseselectsql = $house->where($map)->find();
	    	if($houseselectsql){
	    		$upd['legalstatus'] = I('legalstatus','','trim');
	    		$housesql = $house->where($map)->save($upd);/* $houseselectsql */;
	    		/* 添加数据到patentMember表中  */
	    		$data1['memberid'] = session('user.id');
	    		$data1['applynum'] = I('ptno','','strip_tags');
	    		$data1['status'] = 1;
	    		$data1['addtime'] = time();
	    		$data1['keystatus'] = '2';
	    		$membersql = $patentmember->add($data1);//添加功能
	    		/*计算年费*/
	    		$ptsj = $house->field('id,type,patentnum,applydate,authdate,legalstatus,legalstatusdetail')->where($map)->find();//查询专利数据信息
	    		if($ptsj['legalstatus'] == '有效专利'){
	    			$jf = patent_fee(date("Y-m-d",$ptsj['applydate']),$ptsj['type'],0,1,date("Y-m-d",$ptsj['authdate']),'');
	    			$wh['memberid'] = session('user.id');
	    			$wh['applynum'] = $data1['applynum'];
	    			$dat['annual'] = $jf['year'];//缴费第几年
	    			$dat['should'] = strtotime($jf['paydate']);//应缴日期
	    			$dat['pay_total'] = $jf['money'];//总缴费金额
	    			$dat['daynum'] = $jf['dateyet'];//距离下次缴费天数或者时超过天数
	    			$dat['latefee'] = $jf['overfee'];//滞纳金额
	    			$patentmember->where($wh)->save($dat);
	    		}
	    		
	    		/*复制一份法律详情到legalstatusDetail表中*/
	    		$ztxq = json_decode($ptsj['legalstatusdetail'],true);
	    		foreach ($ztxq as $k => $v){
	    			$da['itemid'] = $ptsj['id'];
	    			$da['ptno'] = $ptsj['patentnum'];
	    			$da['userid'] = session('user.id');
	    			$da['andate'] = $v['andate'];
	    			$da['legalstatus'] = $v['legalstatus'];
	    			$da['legalstatusdetails'] = $v['legalstatusdetails'];
	    			$legal = $patentDetail->add($da);
	    		}
	    		
	    		if($membersql){
	    			echo '添加成功';
	    		} else {
	    			echo '添加失败';
	    		}
	    	} else {
	    		$housesql = $house->add($data);//添加功能
	    		$this->addDetail($data['patentnum'],$data['zlpage']);//把详情的其它信息也添加进去
	    		/* 添加数据到patentMember表中  */
	    		if($housesql){
	    			$data1['memberid'] = session('user.id');
	    			$data1['applynum'] = I('ptno','','strip_tags');
	    			$data1['status'] = '1';
	    			$data1['keystatus'] = '2';
	    			$data1['addtime'] = time();
	    			$membersql = $patentmember->add($data1);//添加功能
	    			/*计算年费*/
	    			$ptsj = $house->field('id,type,patentnum,applydate,authdate,legalstatus,legalstatusdetail')->where($map)->find();//查询专利数据信息
	    			if($ptsj['legalstatus'] == '有效专利'){
	    				$jf = patent_fee(date("Y-m-d",$ptsj['applydate']),$ptsj['type'],0,1,date("Y-m-d",$ptsj['authdate']),'');
	    				$wh['memberid'] = session('user.id');
	    				$wh['applynum'] = $data1['applynum'];
	    				$dat['annual'] = $jf['year'];//缴费第几年
	    				$dat['should'] = strtotime($jf['paydate']);//应缴日期
	    				$dat['pay_total'] = $jf['money'];//总缴费金额
	    				$dat['daynum'] = $jf['dateyet'];//距离下次缴费天数或者时超过天数
	    				$dat['latefee'] = $jf['overfee'];//滞纳金额
	    				$patentmember->where($wh)->save($dat);
	    			}
	    			/*复制一份法律详情到legalstatusDetail表中*/
	    			$ztxq = json_decode($ptsj['legalstatusdetail'],true);
	    			foreach ($ztxq as $k => $v){
	    				$da['itemid'] = $ptsj['id'];
	    				$da['ptno'] = $ptsj['patentnum'];
	    				$da['userid'] = session('user.id');
	    				$da['andate'] = $v['andate'];
	    				$da['legalstatus'] = $v['legalstatus'];
	    				$da['legalstatusdetails'] = $v['legalstatusdetails'];
	    				$legal = $patentDetail->add($da);
	    			}
	    			if($membersql){
	    				echo '添加成功';
	    			} else {
	    				echo '添加失败';
	    			}
	    		} else {
	    			echo '添加错误';
	    		}
	    	}
	    }
    }

    /* 一键添加，批量添加功能 */
    public function keyaddajax(){
    	$house = M('patentHousekeeper');
    	$patentmember = M('patentMember');
    	$legalstatus = M('legalstatusDetail');
     	$arr = I('id');
    	$row = explode(',|,',$arr);
    	$a=$b=$c=0;
    	foreach ($row as $key => $value){
    		$addarr[] = explode(',',$value);
    		$data['type'] =  $addarr[$key][2];
    		if ($data['type'] =='发明') {
    			$data['type'] = 1;
    		} elseif($data['type'] == '外观') {
    			$data['type'] = 2;
    		} elseif($data['type'] == '实用') {
    			$data['type'] = 3;
    		} elseif($data['type'] == '中国台湾') {
    			$data['type'] = 4;
    		} elseif($data['type'] == '中国香港') {
    			$data['type'] = 5;
    		} else{
    			$data['type'] = 1;
    		}
    		$data['cname'] =  $addarr[$key][3];
    		$data['patentnum'] =  trim($addarr[$key][5]);
    		$data['applydate'] =  strtotime($addarr[$key][8]);
    		$yeartime = explode('-',$addarr[$key][8]);
    		$data['applyyear'] = $yeartime[0];//年
    		$data['patentee'] =  $addarr[$key][7];
    		$data['mainclassnum'] =  $addarr[$key][9];
    		$data['info'] =  $addarr[$key][10];
    		$data['zlpage'] = $addarr[$key][6];//专利页数
      		if($addarr[$key][11]){
    			$data['invetor'] = $addarr[$key][11];//发明人
    		}
    		if($addarr[$key][12]){
    			$data['agency'] = $addarr[$key][12];//代理机构
    		}
    		if($addarr[$key][13]){
    			$data['legalstatus'] = $addarr[$key][13];//法律状态
    		}
    		//先做数据判断，是否存在此数据。
    		/* 添加功能 */
    		$where['patentnum'] = $addarr[$key][5];
    		$where['memberid'] = session('user.id');
    		$selectsql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,p.id as pmid')->where($where)->find();
    		/* 判断添加的数据是否存在数据库中  */
    		if(!$selectsql){
    			/*添加时查询patentHousekeeper表是否有此条数据，有则不将数据添加patentHousekeeper表中，否则添加 */
    			$map['patentnum'] = $data['patentnum'];
    			$hid = $house->field('id')->where($map)->find();
    			if($hid){
    				$upd['legalstatus'] = $data['legalstatus'];
    				$state = $house->where($map)->save($upd);/*更新最新法律状态*/;
    				/* 添加数据到patentMember表中  */
    				$data1['memberid'] = session('user.id');
    				$data1['applynum'] = $data['patentnum'];
    				$data1['status'] = 1;
    				$data1['keystatus'] = '2';
    				$data1['addtime'] = time();
    				$membersql = $patentmember->add($data1);//添加功能
    				/*计算年费*/
    				$ptsj = $house->field('id,type,patentnum,applydate,authdate,legalstatus,legalstatusdetail')->where($map)->find();//查询专利数据信息
    				if($ptsj['legalstatus'] == '有效专利'){
    					$jf = patent_fee(date("Y-m-d",$ptsj['applydate']),$ptsj['type'],0,1,date("Y-m-d",$ptsj['authdate']));
    					$wh['memberid'] = session('user.id');
    					$wh['applynum'] = $data1['applynum'];
    					$dat['annual'] = $jf['year'];//缴费第几年
    					$dat['should'] = strtotime($jf['paydate']);//应缴日期
    					$dat['pay_total'] = $jf['money'];//总缴费金额
    					$dat['daynum'] = $jf['dateyet'];//距离下次缴费天数或者时超过天数
    					$dat['latefee'] = $jf['overfee'];//滞纳金额
    					$patentmember->where($wh)->save($dat);
    				}
    				if($membersql){
    					$b++;
    				} else {
    					$c++;
    				}
    				/*复制一份法律详情到legalstatusDetail表中*/
    				$ztxq = json_decode($ptsj['legalstatusdetail'],true);
    				foreach ($ztxq as $k => $v){
    					$da['itemid'] = $ptsj['id'];
    					$da['ptno'] = $ptsj['patentnum'];
    					$da['userid'] = session('user.id');
    					$da['andate'] = $v['andate'];
    					$da['legalstatus'] = $v['legalstatus'];
    					$da['legalstatusdetails'] = $v['legalstatusdetails'];
    					$legal = $legalstatus->add($da);
    				}
    			} else {
    				$housesql = $house->add($data);//添加功能
    				$this->addDetail($data['patentnum'], $data['zlpage']);//把详情的其它信息也添加进去
    				/* 添加数据到patentMember表中  */
    				if($housesql){
    					$data2['memberid'] = session('user.id');
    					$data2['applynum'] = $data['patentnum'];
    					$data2['status'] = '1';
    					$data2['keystatus'] = '2';
    					$data2['addtime'] = time();
    					$membersql = $patentmember->add($data2);//添加功能
    					/*计算年费*/
    					$ptsj = $house->field('id,type,patentnum,applydate,authdate,legalstatus')->where($map)->find();//查询专利数据信息
    					if($ptsj['legalstatus'] == '有效专利'){
    						$jf = patent_fee(date("Y-m-d",$ptsj['applydate']),$ptsj['type'],0,1,date("Y-m-d",$ptsj['authdate']));
    						$wh['memberid'] = session('user.id');
    						$wh['applynum'] = $data['patentnum'];
    						$dat['annual'] = $jf['year'];//缴费第几年
    						$dat['should'] = strtotime($jf['paydate']);//应缴日期
    						$dat['pay_total'] = $jf['money'];//总缴费金额
    						$dat['daynum'] = $jf['dateyet'];//距离下次缴费天数或者时超过天数
    						$dat['latefee'] = $jf['overfee'];//滞纳金额
    						$patentmember->where($wh)->save($dat);
    					}
    					if($membersql){
    						$b++;
    					} else {
    						$c++;
    					}
    				}
    			}
    		}
    	}
    	if($b){
    		$msg = $b.'条数据添加成功 ! ';
    	}else{
    		$msg = '';
    	}
    	echo $msg;
    }
    /* 一键取消/删除功能  */
    public function keydelajax(){
    	$arr = I('id');
    	$row = explode(',|,',$arr);
    	foreach ($row as $key => $value){
    		$addarr[] = explode(',',$value);
    		$data['title'] =  $addarr[$key][2];
    		$data['cname'] =  $addarr[$key][3];
    		$data['patentnum'] =  $addarr[$key][5];
    		$data['applydate'] =  strtotime($addarr[$key][8]);
    		$data['patentee'] =  $addarr[$key][7];
    		$data['mainclassnum'] =  $addarr[$key][9];
    		$data['info'] =  $addarr[$key][10];
    		$data['zlpage'] = $addarr[$key][6];//专利页数
    		//先做数据判断，是否存在此数据。
    		$house = M('patentHousekeeper');
    		$patentmember = M('patentMember');
    
    		/* 判断是添加功能还是删除功能  */
    		$where['patentnum'] = $addarr[$key][5];
    		$where['memberid'] = session('user.id');
    		$selectsql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->find();
    		
    		/* 如果有数据那就是执行删除功能，否则添加功能  */
    		if($selectsql){
    			$condition['applynum'] = $addarr[$key][5];
    			$condition['memberid'] = session('user.id');
	    		$delsql = $patentmember->where($condition)->delete();//删除功能
	    		if($selectsql['userid']&&$data['patentnum']){
	    			$con['userid'] = session('user.id');
	    			$con['patentnum'] = $data['patentnum'];
	    			$house->where($con)->delete();//删掉用户手动添加的数据
	    		}
		    	if($delsql){
		    		echo '删除成功';
		    	}else{
		    		echo '删除失败';
		    	}
    		}
    	}
    }
    
    /* 我的专利数据库  */
    public function mypatentdb($p=1){
    	$data['member'] = M('Member')->where('id = '.session('user.id'))->find();
    	
    	/*查询当前用户是否添加数据*/
    	$condition['memberid'] = session('user.id');
    	$condition['status'] = '1';
    	$condition['keystatus'] = '2';
    	$data['nodata'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->count();
    	
    	/* 专利类型  */
    	$data['type'] = array(
    			'0'=>'全部',
    			'1'=>'发明',
    			'2'=>'外观设计',
    			'3'=>'实用新型'
    	);
    	
    	/* 权利人  */
    	$data['patee'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->distinct(true)->field('patentee')->select();
    	
    	/* 发明人  */
    	$con['memberid'] = session('user.id');
    	$con['status'] = '1';
    	$con['keystatus'] = '2';
    	$con['inventor'] = array('neq','');
    	$data['ivt'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->distinct(true)->field('inventor')->where($con)->select();
    	
    	/* 法律状态  */
    	$data['lss'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->distinct(true)->field('legalstatus')->where($condition)->select();
    	/* 申请年份  */
    	$data['aft'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->distinct(true)->field('applyyear')->where($condition)->select();
    	/* 专利数量  */
    	$data['ptnum'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->count();
    	/* 权利人数量  */
    	$data['pateenum'] = count($data['patee']);
    	/* 发明人数量  */
    	$data['ivtnum'] = count($data['ivt']);
    	/* 发明人数量  */
    	$data['aftnum'] = count($data['aft']);
    	/* 搜索功能  */
    	$parameter['search'] = trim(I('js'));
    	$map['patentnum'] = array('like','%'.$parameter['search'].'%');
    	$map['cname'] = array('like','%'.$parameter['search'].'%');
    	$map['patentee'] = array('like','%'.$parameter['search'].'%');
    	$map['inventor'] = array('like','%'.$parameter['search'].'%');
    	$map['_logic'] = 'OR';
    	$where['_complex'] = $map;
    	/* 获取get传过来的专利类型 */
    	if(I('type')){
    		$search['type'] = explode('-',I('type'));
    		$where['type'] = array('in',implode(',',$search['type']));
    	}
    	/* 权利人 */
    	if(I('patee')){
    		$where['patentee'] = trim(I('patee'));
    	}
    	/* 发明人 */
    	if(I('ivt')){
    		$where['inventor'] = trim(I('ivt'));
    	}
    	/* 法律状态  */
    	if(I('lss')){
    		$search['lss'] = explode('-',I('lss'));
    		$where['legalstatus'] = array('in',implode(',',$search['lss']));
    	}
    	/* 申请时间 */
    	if(I('aft')){
    		$where['applyyear'] = trim(I('aft'));
    	}
    	$where['memberid'] = session('user.id');//用户id
    	$where['status'] = '1';//已添加
    	$where['keystatus'] = '2';//已监控
    	$data['count'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->count();// 查询满足要求的总记录数
    	if(session('pse',I('pse'))){
    		$pagesize = session('pse',I('pse'));
    	}else{
    		$pagesize = 10;
    	}
    	$data['pagesize'] = $pagesize;
    	$newpage = new \Org\Util\ZlgjPage($data['count'],$pagesize);//实例化分类页
    	if($data['count'] && $data['count'] > $pagesize){
    		$data['page'] = $newpage->getPage();//数据分页
    	}
    	$data['mypatentdb'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price,p.pic_isdel,p.latetime,p.latefee,p.daynum,p.process_state,p.annual_state,p.pay_total')->order('id desc')->where($where)->limit(($p-1)*$pagesize,$pagesize)->select();
    	foreach ($data['mypatentdb'] as $key => $value){
    	if($value['pic_isdel'] == '1'){
    		$whe['pmid'] = $value['pmid'];
    		$data['mypatentdb'][$key]['pic'] = M('patentFile')->where($whe)->select();
    	}
    		$data['mypatentdb'][$key]['annualyear'] = array(
    				'1'=>'第1年度',
    				'2'=>'第2年度',
    				'3'=>'第3年度',
    				'4'=>'第4年度',
    				'5'=>'第5年度',
    				'6'=>'第6年度',
    				'7'=>'第7年度',
    				'8'=>'第8年度',
    				'9'=>'第9年度',
    				'10'=>'第10年度',
    				'11'=>'第11年度',
    				'12'=>'第12年度',
    				'13'=>'第13年度',
    				'14'=>'第14年度',
    				'15'=>'第15年度',
    				'16'=>'第16年度',
    				'17'=>'第17年度',
    				'18'=>'第18年度',
    				'19'=>'第19年度',
    				'20'=>'第20年度'
    		);
    		/* 年费监控 滞纳时间 */
    		$data['mypatentdb'][$key]['latetime'] = array(
    				'0'=>'无滞纳',
    				'1'=>'滞纳第1个月',
    				'2'=>'滞纳第2个月',
    				'3'=>'滞纳第3个月',
    				'4'=>'滞纳第4个月',
    				'5'=>'滞纳第5个月',
    				'6'=>'滞纳第6个月'
    		);
    		/* 年费监控 年度 */
    		$data['mypatentdb'][$key]['isslow'] = array(
    				'1'=>'个人减缓(85%)',
    				'2'=>'企业减缓(70%)',
    				'3'=>'不减缓'
    		);
    		/* 年费年度  */
    		$wh['itemid'] = $value['id'];
    		$wh['ptno'] = $value['patentnum'];
    		$wh['userid'] = session('user.id');
    		$data['mypatentdb'][$key]['lsd'] = M('legalstatusDetail')->where($wh)->order('andate desc')->select();
    	}
    	
    	$this->assign('search',$search);
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /*我的专利数据库 年费监控下拉应缴年度获取应缴日期 */
    public function nianDu(){
    	$where['patentnum'] = I('pn');
    	$result = M('patentHousekeeper')->where($where)->getField('applydate');
    	if($result){
    		$md = date('m-d',$result);
    		$yearnum = I('num')-1;
    		$msg = date('Y',$result)+$yearnum.'-'.date('m-d',$result);
    	}else {
    		$msg = '';
    	}
    	echo $msg;
    }
    
    /*我的专利数据库导出清单功能 */
    public function expAll(){
    	//读取所有对应的数据
    	$where['memberid'] = session('user.id');//用户id
    	$where['status'] = '1';//已添加
    	$where['keystatus'] = '2';//已监控
    	$data[][0]=array('我的专利数据库表','','','','','','','');
    	$data[][1]=array("类型","专利号","专利名","权利人","法律状态","申请日期","应缴日期","年费年度");
    	$data[] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.type,h.patentnum,h.cname,h.patentee,h.legalstatus,h.applydate,p.should,p.annual,h.authdate')->where($where)->select();
    	foreach ($data[2] as $key => $value){
    		switch ($value['type']){
    			case '1':
    				$data[2][$key]['type'] = '发明';
    				break;
    			case '2':
    				$data[2][$key]['type'] = '外观';
    				break;
    			case '3':
    				$data[2][$key]['type'] = '实用';
    				break;
    		}
    		$data[2][$key]['applydate'] = date('Y-m-d',$value['applydate']);
    		if($value['should']){
    			$data[2][$key]['should'] = date('Y-m-d',$value['should']);//应缴日期
    			$data[2][$key]['annual'] = $value['annual'];//年度年费
    		}else {
    			$tdsp = patent_fee(date("Y-m-d",$value['applydate']),$value['type'],0,1,date("Y-m-d",$value['authdate']),'');
    			if($tdsp['chk']){
    				$data[2][$key]['should'] = date('Y-m-d',strtotime($tdsp['paydate']));//应缴日期
    				$data[2][$key]['annual'] = $tdsp['year'];//年度年费
    			}else {
    				$data[2][$key]['should'] = '';//应缴日期
    				$data[2][$key]['annual'] = '';//年度年费
    			}	
    		}
    		unset($data[2][$key]['authdate']);
    	}
    	//导入PHPExcel类库
    	import("Org.Util.PHPExcel");
    	import("Org.Util.PHPExcel.Writer.Excel5");
    	import("Org.Util.PHPExcel.IOFactory.php");
    	$filename="test_excel";
    	$this->getExcel($filename,$data);
    }
    
    private function getExcel($fileName,$data){
    	//对数据进行检验
    	if(empty($data)||!is_array($data)){
    		die("data must be a array");
    	}
    	$date=date("Y_m_d",time());
    	$fileName.="_{$date}.xls";
    	//创建PHPExcel对象，注意，不能少了\
    	$objPHPExcel=new \PHPExcel();
    	$objProps=$objPHPExcel->getProperties();
    	$column=2;
    	$objActSheet=$objPHPExcel->getActiveSheet();
    	$objPHPExcel->getActiveSheet()->getStyle()->getFont()->setName('微软雅黑');//设置字体
    	$objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(25);//设置默认高度
    	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth('5');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('20');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('20');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('50');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('30');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('12');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('12');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('12');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('12');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('12');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('10');//设置列宽
    	//设置边框
    	$sharedStyle1=new \PHPExcel_Style();
    	$sharedStyle1->applyFromArray(array('borders'=>array('allborders'=>array('style'=>\PHPExcel_Style_Border::BORDER_THIN))));
    
    	foreach ($data as $ke=>$row){
    		foreach($row as $key=>$rows){
    			if(count($row)==1&&empty($row[0][1])&&empty($rows[1])&&!empty($rows)){
    				$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A{$column}:K{$column}");//设置边框
    				array_unshift($rows,$key+1);
    				//背景色填充
    				$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
    				$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFill()->getStartColor()->setARGB('FFB8CCE4');
    			}else{
    				if(!empty($rows)){
    					array_unshift($rows,$key+1);
    					$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1,"A{$column}:K{$column}");//设置边框
    				}
    			}
    			if($rows['1']=='类型'){
    				$rows[0]='ID';
    				//背景色填充
    				$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
    				$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFill()->getStartColor()->setARGB('FF4F81BD');
    			}
    			$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直居中
    			$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getAlignment()->setWrapText(true);//换行
    			//行写入
    			$span = ord("A");
    			foreach($rows as $keyName=>$value){
    				// 列写入
    				$j=chr($span);
    				$objActSheet->setCellValue($j.$column, $value);
    				$span++;
    			}
    			$column++;
    		}
    	}
    	$fileName = iconv("utf-8", "gb2312", $fileName);
    	//设置活动单指数到第一个表,所以Excel打开这是第一个表
    	$objPHPExcel->setActiveSheetIndex(0);
    	header('Content-Type: application/vnd.ms-excel');
    	header("Content-Disposition: attachment;filename=\"$fileName\"");
    	header('Cache-Control: max-age=0');
    	$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    	$objWriter->save('php://output'); //文件通过浏览器下载
    	exit;
    }
    /* 我的专利数据库 文件上传 */
    public function fileUpload(){
    	$id = I('id');
    	$rpic = R('Index/Upload/save_mfile',array('type'=>'file'));
    	if($rpic){
	    	$pic = explode(',', $rpic);
	    	rsort($pic);//以降序对数组排序
	    	$i='1';
	    	foreach ($pic as $key => $value){
	    		$da['pmid'] = I('mid');
	    		$da['name'] = '图片'.$i++;
	    		$da['url'] = $value;
	    		$result = M('patentFile')->add($da);
	    	}
    		/* 修改该专利的文件上传状态 */
    		$where['id'] = I('mid');
    		$dat['pic_isdel'] = '1';//修改状态 
    		$state = M('patentMember')->where($where)->save($dat);
			/*查询与当前数据相关的文件图片信息 */
    		$map['pmid'] = I('mid');
    		$data = M('patentFile')->where($map)->select();
	    	foreach ($data as $key=>$value){
	    		$name .= $value['name'].',';
	    		$pmid .=$value['id'].',';
	    		$img .=$value['url'].',';
	    	}
    		$picname = substr($name, 0, -1);
    		$pid = substr($pmid, 0, -1);
    		$url = substr($img, 0, -1);
    		$msg = '<script type=\'text/javascript\'>window.parent.plsc('.$id.','."'".$pid."'".','."'".$picname."'".','."'".$url."'".');</script>';
    	}else{
    		$msg = '';
    	}
    	echo $msg; 
    }
    
    /* 我的专利数据库 文件上传 */
    public function delFile(){
		$where['id'] = I('id');
		$result = M('patentFile')->where($where)->delete();
		if($result){
			$msg = '删除成功！';
		}else {
			$msg = '删除失败！';
		}
		echo $msg;
    }
    
    /* 我的专利数据库 修改文件上传功能 */
    public function editFile(){
    	$model = M('patentFile');
    	$legalarr = I('field');
    	$id = I('id');
    	$a=$b=$c=$d=0;
    	foreach ($legalarr as $key => $value){
    		$arr[] = explode(',',$value);
    		$where['id'] = $arr[$key][0];
    		$data['name'] = $arr[$key][1];//图片名称
    		$alledit = $model->where($where)->save($data);//更新文件名称
    	}
    	$map['pmid'] = I('pid');
    	$result = $model->where($map)->select();
    	foreach ($result as $key => $value){
    		$html.='
    			<div class="zltulistt wjtp'.$value['id'].'">
    			<a href="'.$value['url'].'" rel="prettyPhoto[]"><img src="'.$value['url'].'"/></a>'.$value['name'].'
    			<div class="zldels" onClick="delPic('.$value['id'].')"><span rel="'.$value['id'].'">×</span></div>
    			</div>';
    	}
    	$msg.='<div class="gallery">';
    	$msg.=$html;
    	$msg.='</div>';
    	$str ='<div class="zltulistt"><div class="zltianjia"><a href="javascript:;" onClick="posts4('."'".$id."'".','."'".'posts4'.$id."'".');"><img src="/static/style/images/addzshu.jpg"/></a></div>上传证书 </div>';
    	$msg = $msg.$str;
    	echo $msg;
    }
    
    /* 我的专利数据库 修改法律状态功能 */
    public function editLegal(){
    	$model = M('legalstatusDetail');
    	$legalarr = I('field');
    	$a=$b=$c=$d=0;
    		foreach ($legalarr as $key => $value){
    			$arr[] = explode(',',$value);
    			if($arr[$key][0]){
    				$where['userid'] = session('user.id');
    				$where['ptno'] = $arr[$key][2];//专利号
    				$where['id'] = $arr[$key][0];//id
    				if($arr[$key][3] ||$arr[$key][4] ||$arr[$key][5]){
    					$data['andate'] = $arr[$key][3];
    					$data['legalstatus'] = $arr[$key][4];
    					$data['legalstatusdetails'] = $arr[$key][5];
    					$alledit = $model->where($where)->save($data);
    				}else {
    					$alledit = $model->where($where)->delete();
    				}
    				if($alledit){
    					$a++;
    				}else {
    					$b++;
    				}
    			}else {
    				$data['itemid'] = $arr[$key][1];//相关id
    				$data['ptno'] = $arr[$key][2];//专利号
    				$data['userid'] = session('user.id');
    				if($arr[$key][3] || $arr[$key][4] || $arr[$key][5]){
	    				$data['andate'] = $arr[$key][3];
	    				$data['legalstatus'] = $arr[$key][4];
	    				$data['legalstatusdetails'] = $arr[$key][5];
	    				$alladd = $model->where($where)->add($data);
	    				if($alladd){
	    					$c++;
	    				}else {
	    					$d++;
	    				}
    				}
    			}
    		}
    	//查询当前用户，当前专利的法律详情	
		$map['ptno'] = I('pt');
		$map['userid'] = session('user.id');
    	$legal = $model->where($map)->select();
    	foreach ($legal as $key => $value){
    		$msg.='<tr>
                      <td width="20%">'.$value['andate'].'</td>
                      <td width="20%">'.$value['legalstatus'].'</td>
                      <td width="60%">'.$value['legalstatusdetails'].'</td>
                   </tr>';
    	}
    	echo $msg;
    }
    
    /* 我的专利数据库 修改年费监控功能 */
    public function editAnnual(){
    	$where['applynum'] = I('pnm');
    	$where['id'] = I('pid');
    	$where['memberid'] = session('user.id');
    	if(I('zlflsts4') == '2'){
    		$data['annual'] = I('zlflsts1')+1;//年度
    		$data['latetime'] = I('zlflsts3');//滞纳时间
    		$data['slow'] = I('zlflsts2');//减缓比例
    		/*加上1年*/
    		$md = date('m-d',strtotime(I('zlflsts5')));
    		$year = date('Y',strtotime(I('zlflsts5')))+1;
    		$nextyear = $year.'-'.$md;
    		$data['should'] = strtotime($nextyear);//应缴日期
    	}else {
	    	$data['annual'] = I('zlflsts1');//年度
	    	$data['slow'] = I('zlflsts2');//减缓比例
	    	$data['latetime'] = I('zlflsts3');//滞纳时间
	    	$data['should'] = strtotime(I('zlflsts5'));//应缴日期
    	}
    	switch ($data['slow']){
    		case 1:
    			$slow = '0.85';
    			break;
    		case 2:
    			$slow = '0.70';
    			break;
    		case 3:
    			$slow = '1';
    			break;
    	}
    	/* 计算缴费总额  */
    	$wh['patentnum'] = I('pnm');
    	$da = M('patentHousekeeper')->where($wh)->find();
	    $money = patent_fee(date("Y-m-d",$da['applydate']),$da['type'],0,$slow,date("Y-m-d",$da['authdate']),'',date('Y-m-d',$data['should']),$data['annual']);
	    $data['pay_total'] = $money['money'];//缴费总金额
	    $data['daynum'] = $money['dateyet'];//距离缴费天数
	    $data['latefee'] = $money['overfee'];//滞纳金额
	    $data['annual_state'] = '0';//修改加入缴费清单状态
    	M('patentMember')->where($where)->save($data);
    	$map['p.id'] = I('pid');
    	$result = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.type,h.authdate,h.applydate,h.legalstatus,p.id as pmid,p.should,p.annual,h.authdate,p.annual_state')->where($map)->find();
    	$nfjk = patent_fee(date("Y-m-d",$result['applydate']),$result['type'],0,$slow,date("Y-m-d",$result['authdate']),'',date('Y-m-d',$result['should']),$result['annual']);
    	if($result['legalstatus'] == '有效专利'){
    		if ($nfjk['dateyet'] <= '0' and $nfjk['dateyet'] > '-30' and $result['legalstatus'] == '有效专利'){
    			$status='<span class="bohuis">紧急</span>，剩余'.-$nfjk['dateyet'].'天';
    		}elseif ($nfjk['dateyet'] <= '0' and $nfjk['dateyet'] > '-30'){
    			$status='<span class="xgwx">已无效</span>';
    		}elseif ($nfjk['dateyet'] > '0' and $nfjk['dateyet'] < '180' and $result['legalstatus'] == '有效专利'){
    			$status='<span class="youx">滞纳</span>，超过'.$nfjk['dateyet'].'天';
    		}elseif ($nfjk['dateyet'] > '180' and $result['legalstatus'] == '有效专利'){
    			$status='<span class="youx">已过期</span>';
    		}else{
    			$status='<span class="zlgreen">正常</span>，剩余'.-$nfjk['dateyet'].'天';
    		}
    	}elseif($result['legalstatus'] == '实质审查' or $result['legalstatus'] == '公开发明'){
    		$status='<span class="scgk">申请中</span>';
    	}else{
    		$status='<span class="xgwx">失效</span>';
    	}
    	
    	if($result['annual_state'] >=  '1'){
    		$jiaofei = '已加入清单';
    	}else {
    		$jiaofei ='<a href="javascript:;" class="jrqd'.$result['id'].'" onClick="addlist('.$result['id'].','.$result['id'][pmid].',this)">加入清单</a>';
    	}
    			
    	$msg ='<tr>
                 <td width="16%">'.date('Y-m-d',$result['applydate']).'</td>
                 <td width="16%">'.date('Y-m-d',$result['should']).'</td>
                 <td width="16%">第'.$result['annual'].'年</td>    
                 <td width="16%">'.$status.'</td>
                 <td width="16%"><span class="zlyell">'.$nfjk['money'].'/'.$nfjk['overfee'].'</span></td>
             	 <td width="20%"><a href="http:www.qihaoip.com/Member/Buyer/tmpa_chkout/type/2/ids/'.$result['pmid'].'" target="_blank">缴费</a>&nbsp;&nbsp;'.$jiaofei.'</td>
              </tr>';
    	echo $msg;
    }
    
    /* 单个数据加入缴费  */
    public function addoneList(){
    	$data['annual_state'] = 1;//修改年费监控状态
    	$where['memberid'] = session('user.id');
    	$where['id'] = I('pmid');	
    	$result = M('patentMember')->where($where)->save($data);
    	if($result){
    		$msg = '添加成功';
    	}else {
    		$msg = '';
    	}
    	echo $msg;
    }
    
    public function addallList(){
    	$model = M('patentMember');
    	$where['annual_state'] = '0';//修改年费监控状态
    	$where['memberid'] = session('user.id');
    	$data['annual_state'] = '1';
    	$query = $model->where($where)->save($data);//查询没有加入缴费清单的数据
    	if($query){
    		$msg = '添加成功';
    	}else {
    		$msg = '';
    	}
    	echo $msg; 
    }
    
    /* 我的专利数据库 修改费用管理功能 */
    public function editCost(){
    	$where['applynum'] = I('pnm');
    	$where['id'] = I('pid');
    	$where['memberid'] = session('user.id');
    	
    	$data['reg_fee'] = I('sqf');//正常申请费
    	$data['acc_fee'] = I('dyf');//授权登印费
    	$data['sup_acc_fee'] = I('cqf');//超权费
    	$data['agent_fee'] = I('dlf');//代理费
    	$data['cut_fee'] = I('jhf');//有减缓官费
    	$data['else_fee'] = I('qtf');//其他费用
    	$data['years'] = I('wns');//已维持年数
    	$data['total_fee'] = I('wcf');//总维持费
    	$data['total_price'] = I('sqf')+I('dyf')+I('cqf')+I('dlf')-I('jhf')+I('qtf')+I('wcf');//总费用
    	$data['fee_state'] = '1';//已设置费用管理
    	$result = M('patentMember')->where($where)->save($data);
    	$msg ='<tr>
                  <td width="12%">'.$data['reg_fee'].'</td>
                  <td width="12%">'.$data['sup_acc_fee'].'</td>
                  <td width="12%">'.$data['cut_fee'].'</td>
                  <td width="12%">'.$data['total_fee'].'</td>
                  <td width="12%">'.$data['acc_fee'].'</td>
                  <td width="12%">'.$data['agent_fee'].'</td>
                  <td width="12%">'.$data['else_fee'].'</td>
                  <td width="16%"><span class="zlyell">'.$data['total_price'].'</span></td>
              </tr>';
    	echo $msg;
    }
    
    /* 我的专利数据库 一键删除功能 */
    public function allDel(){
    	$con['userid'] = session('user.id');
    	M('patentHousekeeper')->where($con)->delete();//删掉用户手动添加的数据
    	$where['memberid'] = session('user.id');
    	$pm = M('patentMember')->field('id')->where($where)->select();
    	foreach ($pm as $key => $value){
    		$id[].=$value['id'];
    	}
    	$alldel = M('patentMember')->where($where)->delete();
    	$map['pmid'] = array('in',$id);
    	M('patentFile')->where($map)->delete();//删掉专利文件
    	$wh['userid'] = session('user.id');
    	M('legalstatusDetail')->where($wh)->delete();//删掉专利详情
    	if($alldel){
    		$msg =  '成功删除'.$alldel.'件专利';
    	}
    	echo $msg;
    }

    
    /* 我的专利数据库单个交易功能 */
    public function onetrademypatent(){
    	$patentmember = M('patentMember');
    	$wh['applynum'] = I('pnm');
    	$wh['salestatus'] = 1;//未发布
    	$whtrade = $patentmember->where($wh)->find();
    	if($whtrade) {
    		$where['applynum'] = I('pnm');
    		$where['id'] = I('id');
    		$where['salestatus'] = 1;//未发布
    		$where['memberid'] = session('user.id');
    		$data['salestatus'] = 3;//发布中
    		$data['trade_price'] = I('price');
    		$updatesql = $patentmember->where($where)->save($data);
    		if($updatesql){
    			echo '您已成功发布'.$updatesql.'件专利交易';
    		} else {
    			echo "交易发布失败";
    		}
    	} else {
    		echo '该专利已有人交易过，请勿再交易。';
    	}
    }
    
    /* 我的专利数据库单个编辑价格 */
    public function oneditrade(){
    	$patentmember = M('patentMember');
    	$where['applynum'] = I('pnm');
    	$where['id'] = I('id');
    	$where['memberid'] = session('user.id');
    	$data['trade_price'] = I('price');
    	$updatesql = $patentmember->where($where)->save($data);
    	if($updatesql){
    		echo '修改成功！';
    	} else {
    		echo "修改失败！";
    	}
    }
    
    /*我的专利数据库批量删除功能  */
    public function batchDel(){
    	$id = explode(',',I('id'));
    	foreach ($id as $key => $value){
    		$where['id'] = $value;
    		$where['memberid'] = session('user.id');
    		$ptno = M('patentMember')->where($where)->getField('applynum');
    		$map['userid'] = session('user.id');
    		$map['ptno'] = $ptno;
    		$patentDetail = M('legalstatusDetail')->where($map)->delete();//删除法律详情数据
    		$results = M('patentMember')->where($where)->delete();
    		$condition['userid'] = session('user.id');
    		$condition['patentnum'] = $ptno;
    		$selectsql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->find();
    		if($selectsql['userid']){
    			$con['userid'] = session('user.id');
    			$con['patentnum'] = $ptno;
    			M('patentHousekeepe')->where($con)->delete();//删掉用户手动添加的数据
    		}
    		$a=$b='';
    		if($results){
    			$a++;
    		}else {
    			$b++;
    		}
    	}
    	$msg = $a?'成功删除'.$a.'条':''.$b?',删除失败'.$b.'条':'';
    
    	echo $msg;
    }
    
    /*我的专利数据库批量交易功能  */
    public function  bulkTrade(){
    	$id = explode(',',I('id'));
    	foreach ($id as $key => $value){
    		$where['id'] = $value;
    		$where['salestatus'] = '1';
    		$where['memberid'] = session('user.id');
    		$data['salestatus'] = '3';
    		$results = M('patentMember')->where($where)->save($data);
    		$a=$b='';
    		if($results){
    			$a++;
    		}else {
    			$b++;
    		}
    	}
    	$msg = $a?'交易成功'.$a.'条':''.$b?',交易失败'.$b.'条':'';
    
    	echo $msg;
    }
    
   
    
    /* 一键交易 */
    public function allTrade(){
    	$patentmember = M('patentMember');
    	$where['memberid'] = session('user.id');
    	$where['legalstatus'] = '有效专利';
    	$where['salestatus'] = 1;
    	$where['status'] = 1;
    	$patentMemberSql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->select();
    	$a=$b=0;
    	if($patentMemberSql){
    		foreach ($patentMemberSql as $key => $value) {
	    		$map['applynum'] =  $value['patentnum'];
			    $map['memberid'] = session('user.id');
			    $data['trade_price'] = I('price');
			    $data['salestatus'] = 3;
			 	$alltrade = $patentmember->where($map)->save($data);
				if($alltrade){
					$a++;
				}
    		}
    	} else {
    		$b = '有效专利已全部加入交易，不能再次交易';
   	 	}
    	
    	echo $a?$a.'件专利已加入交易':'',$b?$b:'';
    }
    
    /* 我的专利数据库交易功能 */
    public function trademypatent(){
		$patentmember = M('patentMember');
    	$id = I('id');
    	$where['applynum'] = array('in',$id);
    	$where['salestatus'] = 1;
    	$where['memberid'] = session('user.id');
    	$data['salestatus'] = 3;
    	$selectsql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->select();
    	if($selectsql){
	    	$a=$b=$c=$d=0;
	    	foreach ($selectsql as $key => $value) {
	    		if($value['legalstatus'] == '有效专利') {
	    			$wh['applynum'] = $value['patentnum'];
	    			$wh['salestatus'] = 1;
	    			$whtrade = $patentmember->where($wh)->find();
	    			if($whtrade) {
		    			$map['applynum'] =  $value['patentnum'];
		    			$map['salestatus'] = 1;
		    			$map['memberid'] = session('user.id');
		    			$data1['salestatus'] = 3;
		    			$updatesql = $patentmember->where($map)->save($data1);
		    			if($updatesql){
		    				$a++;
		    			} else {
		    				$b++;
		    			}
	    			}
	    		}else{
	    			$c++;
	    		}
	    	}
    	} else {
    		$d = '10条数据已添加过';
    	}
    	
    	echo $a?$a.'件专利已加入交易,':'',$b?$b.'件专利添加失败,':'',$c?$c.'件无效专利不能交易。':'',$d?$d:'';
    }
    
    /* 我的专利数据库 单个操作删除数据按钮  */
    public function delmypatentdb(){
    	$map['id'] = I('id') ;
    	$map['memberid'] = session('user.id');
    	$patentmember = M('patentMember')->where($map)->delete();
    	$where['userid'] = session('user.id');
    	$where['ptno'] = I('pt');
    	$patentDetail = M('legalstatusDetail')->where($where)->delete();
    	$con['userid'] = session('user.id');
    	$con['patentnum'] = I('pt');
        M('patentHousekeeper')->where($con)->delete();//删掉用户手动添加的数据
    	if($patentmember){
    		echo "删除成功";
    	} else {
    		echo "删除失败";
    	}
    }
     
    /* 我的专利数据库 一键取消添加操作*/
    public function canceladd(){
    	$where['applynum'] = array('in',I('id'));
    	$where['memberid'] = session('user.id');
    	$patentmember = M('patentMember')->where($where)->delete();
    	if($patentmember){
    		$msg = '成功取消添加'.$patentmember.'条';
    	}else{
    		$msg = '取消添加失败';
    	}
    	
    	echo $msg;
    }
    
    /* 我的专利数据库 筛选权利人删除功能操作*/
    public function delqlr(){
    	$where['patentee'] = array('in',I('tee'));
    	$house = M('patentHousekeeper')->where($where)->select();
    	$a=$b=0;
    	foreach ($house as $key => $value){
    		$map['applynum'] = $value['patentnum'];
    		$map['memberid'] = session('user.id');
    		$patentmember = M('patentMember')->where($map)->delete();
    		if($patentmember){
    			$a++;
    		}else{
    			$b++;
    		}
    	}
    	
    	echo '成功删除'.$a.'条'.'，'.'失败'.$b.'条';
    }
    
    /* 
    public function remindset() {
    	$user = M ( 'user', 'qh_', 'mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8' );
    	$user_data = $user->where(array('id'=>session('user.id')))->find();
    	$title='提醒设置';
    	
    	$this->assign('title',$title);
    	$this->assign('list',$user_data);
    	$this->display();
    }
    
    //ajax修改邮件通知状态
    public function editEmail_msg(){
    	$user = M ( 'user', 'qh_', 'mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8' );
    	$email_msg = I('post.email_msg');
    	$data = $email_msg=='1'?'2':'1';
    	$id = $user->where(array('id'=>session('user.id')))->save(array('email_msg'=>$data));
    	if($id){
    		$this->ajaxReturn(array('code'=>1,'id'=>$data));
    	}
    }
    
    //ajax修改手机通知状态
    public function editMobile_msg(){
    	$user = M ( 'user', 'qh_', 'mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8' );
    	$mobile_phone_msg = I('post.mobile_phone_msg');
    	$data = $mobile_phone_msg=='1'?'2':'1';
    	$id = $user->where(array('id'=>session('user.id')))->save(array('mobile_phone_msg'=>$data));
    	if($id){
    		$this->ajaxReturn(array('code'=>1,'id'=>$data));
    	}
    } */
}