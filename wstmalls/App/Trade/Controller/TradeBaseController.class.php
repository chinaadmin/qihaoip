<?php
namespace Trade\Controller;
use Common\BaseController;
class TradeBaseController extends BaseController {
	protected $userid = 0;
	/***
	 * 模块控制器公共11类，所有模块下其他控制器类继承此类啊
	 */
	public function _initialize(){
		parent::_initialize();
		$user = session('user');
		if(ACTION_NAME!='tmimg'){
			if(is_array($user) && isset($user['id'])){
				$this->userid = $user['id'];
				/**
					$time = time();
					if($user['time'] && $user['time'] < $time){//如果有时间，且当前时间大于session时间
					if($time-$user['time']>3600){//如果超过3600秒未动作，即退出登陆。
					$this->redirect('Index/User/logout',['redirect'=>base64_encode(get_url())]);
					} else {//刷新session时间
					session('user.time',$time);//时间刷新
					}
					}
				**/
			} else {
				$this->redirect('/User/login',['redirect'=>base64_encode(get_url())]);
			}
		}
	}
	
	/**
	 * 获取一条商标详情信息
	 * @param unknown $id
	 * @return mixed
	 */
	public function get_one_trade($id){
		$qds = new \Common\Lib\Quands();
		$data = $qds->get($id);
		return json_decode($data,true);
	}
	
	
	
	/**
	 * 搜索商标信息
	 * @param 查询条件 $where
	 * @param 行数 $num
	 * @param 页数 $of
	 * @return mixed
	 */
	public function get_trade($where,$num='10',$of='1'){
		if($where){
			$qds = new \Common\Lib\Quands();
			/***
			* agency 代理机构
			* applicant 申请人
			* data_id 申请注册号
			* name 商标名称
			**/
			$type = 'all';
			$q = '';
			$fclass = 0;
			if(isset($where['fclass']) && $where['fclass']){
				$fclass = $where['fclass'];
			}
			if(isset($where['fsqr1'])){//申请人
				$q = $where['fsqr1'];
				$type = 'applicant';
			} else if(isset($where['name'])){//名称
				$q = $where['name'];
				$type = 'name';
			} else if(isset($where['id'])){
				$q = $where['id'];
				$type = 'data_id';
			} else if(isset($where['agency'])){
				$q = $where['agency'];
				$type = 'agency';
			}
			$data = $qds->search($q,$type,$fclass,$num,$of-1);

			return json_decode($data,true);
			
			
			/***
			$client = new \Org\Util\CloudsearchClient('osrrHZZJZ0vfji07', '6scd577yR3llzj8SzDOfbtipKSfjh9',array("host" => "http://opensearch.aliyuncs.com"), "aliyun");
			$search = new \Org\Util\CloudsearchSearch($client);
			$search->addIndex('tmserver');
			$sea;
			if($where){
				foreach ($where as $key=>$value){
					if($key!='fclass'){
						if($key!='ftmid'){
							$sea .= $key.':\''.$value.'\' OR ';
						}else{
							$sea .= $key.':"'.$value.'" OR ';//fsqr1='海思'
						}
					}
				}
				$sea = substr($sea, 0, -4);
			}
			$opts = array(
					'query'=>$sea,
			);
			if($where['fclass']){
				$search->addFilter("fclass=".$where['fclass'],'AND');
			}
			$search->setStartHit($of);
			$search->setHits($num);
			$search->setFormat('json');
			$re = $search->search($opts);
			return json_decode($re,true);
			**/
		}
		
		
		/**
		 * //faddr, fdlzz, fspzb, fsqr1, fsysp, ftmchin, ftmeng, ftmpy
		 fid   //搜索的时候用id:1234
		 fclass  //类别
		 ftmid        //id二进制
		 ftmchin        //中文
		 ftmeng        //英文
		 ftmpy        //拼音
		 ftmhead        //商标头（拼音缩写？）
		 fsqdate        //申请日期
		 fzcdate        //注册日期
		 fggq        //公告期
		 fbgq        //变更期
		 fsqr1        //申请人1
		 fbgqh1        //变更期号1
		 fbgdate1        //变更日期1
		 fsqr2        //申请人2（变更之前）
		 faddr        //地址
		 fdlzz        //代理组织
		 fbz        //备注
		 fsysp        //使用商品
		 fbguserid        //法律状态
		 ftmjpm        //商标简拼名
		 farea        //区域（数组）
		 fspzb        //群组（数字用“|”隔开）
		 fjzdate        //截止日期
		 fcsdate        //初始日期
		 fzdys        //
		 **/
		
	}
	
	/**
	 * 商标动态获取
	 * @param unknown $id 商标注册号（二进制）
	 * @param unknown $class 商标类别
	 */
	public function get_trade_dynamic($id, $class){
		$qds = new \Common\Lib\Quands();
		$data = json_decode($qds->get($id),true);
		$arr = array();
		foreach ($data['flowList'] as $k=>$v){
			$arr['flowlist'][$k] = ['fZTDM'=>$v['name'],'fZTRQ'=>$v['lastTime']];
		}

		
			if ($class < 10) {
				$class = '0' . ($class + 0);
			}
			$link = mssql_connect( '120.234.2.202:1433', 'sa', '421651zzZZ' );
			mssql_select_db ( 'qstmgood', $link );
			$sql1 = 'select top 10 * from tTMFlow' . $class . ' where fTMID = 0x' . $id.' order by fZTRQ desc';
			$query1 = mssql_query ( $sql1, $link );
			$row1 = array ();
			while ( $ro = mssql_fetch_assoc ( $query1 ) ) {
				foreach ( $ro as $k => $v ) {
					if ($k != 'fTMID') {
						$ro [$k] = $this->all2utf8 ( $v );
					} else {
						$ro [$k] = $v;
					}
				}
				$row1 [] = $ro;
			}
			return $row1;
	}
	
	private function all2utf8($str) {
		try {
			$str = iconv ( "GB2312", "UTF-8", $str ); // latin-1
			return $str;
		} catch ( \Exception $e ) {
		}
	
		try {
			$str = iconv ( "latin-1", "UTF-8", $str ); // latin-1
			return $str;
		} catch ( \Exception $e ) {
		}
		return $str;
	}
	
	
	/**
	 * excel导出
	 */
	public function excel($data,$name,$type){
		//$objPHPExcel = new \Org\Util\PHPExcel();
		//$objWriter = new \Org\Util\PHPExcel\Writer\PHPExcel_Writer_Excel5($objPHPExcel);
		import("Org.Util.PHPExcel");
		$objPHPExcel=new \PHPExcel();
		import("Org.Util.PHPExcel.Writer.Excel5");
		$objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
		//选择工作表
		$objPHPExcel->setActiveSheetIndex(0);
		if($type=='fee'){
			$x = array('A2'=>'类别','B2'=>'注册号','C2'=>'名称','D2'=>'权利人','E2'=>'商标状态','F2'=>'申请费','G2'=>'驳回复审费','H2'=>'异议答辩费','I2'=>'设计费','J2'=>'商标广告费','K2'=>'诉讼维权费','L2'=>'其他费用','M2'=>'费用总计','N2'=>'申请日期','O2'=>'注册日期','P2'=>'有效期',);
			//合并单元格
			$objPHPExcel->getActiveSheet()->mergeCells('A1:P1');
		}else{
			$x = array('A2'=>'类别','B2'=>'注册号','C2'=>'名称','D2'=>'权利人','E2'=>'商标状态','F2'=>'申请日期','G2'=>'注册日期','H2'=>'有效期');
			//合并单元格
			$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
		}
		
		
		
		//设置工作表名称
		$objPHPExcel->getActiveSheet()->setTitle('商标');
		foreach ($x as $key=>$value){
			$objPHPExcel->getActiveSheet()->setCellValue($key, $value);
		}
		//设置单元格的值
		$objPHPExcel->getActiveSheet()->setCellValue('A1', $name);
		
		$i=3;
		foreach ($data as $key=>$value){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$value['name']);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$value['reg_id']);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$value['trade_name'] );
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$value['trade_user'] );
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$value['state']);
			
			if($type=='fee'){
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,number_format($value['reg_fee']+$value['reg_agent_fee'],2));
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$value['re_chk_fee']);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$value['replay_fee']);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$value['design_fee']);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$value['ad_fee']);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$i,$value['law_fee']);
				$objPHPExcel->getActiveSheet()->setCellValue('L'.$i,$value['else_fee']);
				$objPHPExcel->getActiveSheet()->setCellValue('M'.$i,$value['total_fee']);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.$i,$value['sq_date']?date('Y-m-d',$value['sq_date']):'');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.$i,$value['zc_date']?date('Y-m-d',$value['zc_date']):'');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.$i,$value['zc_date']?date('Y-m-d',$value['zd_date']):'');
			}else{
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$value['sq_date']?date('Y-m-d',$value['sq_date']):'');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$value['zc_date']?date('Y-m-d',$value['zc_date']):'');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$value['zc_date']?date('Y-m-d',$value['zd_date']):'');
			}
			
			$i++;
		}
		$ua = $_SERVER["HTTP_USER_AGENT"];
		if (preg_match("/MSIE/", $ua)) {
			$savename = urlencode($name); //处理IE导出名称乱码
		}
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$name.'.xls"');  //日期为文件名后缀
		header('Cache-Control: max-age=0');
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel5为xls格式，excel2007为xlsx格式
		$objWriter->save('php://output');
			
	}
}