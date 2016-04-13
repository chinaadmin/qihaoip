<?php
namespace Zlgj\Controller;
class CostHouseController extends ZlgjBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	public function index($p=1){
		$data['member'] = M('Member')->where('id = '.session('user.id'))->find();
		/* 搜索功能  */
		$parameter['search'] = trim(I('js'));
		$map['patentnum'] = array('like','%'.$parameter['search'].'%');
		$map['cname'] = array('like','%'.$parameter['search'].'%');
		$map['patentee'] = array('like','%'.$parameter['search'].'%');
		$map['inventor'] = array('like','%'.$parameter['search'].'%');
		
		$map['_logic'] = 'OR';
		$where['_complex'] = $map;
		
		$where['memberid'] = session('user.id');//用户id
		$where['status'] = '1';//已添加
		$where['keystatus'] = '2';//已监控
		$where['annual_state'] = array('egt','1');//已加入缴费清单
		$where['annual_isdel'] = '1';//未被删除
		//$where['is_paycost'] = '2';//未缴费
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
		$data['costlist'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price,p.latetime,p.process_state,p.latefee,p.daynum,p.annual_state,p.pay_total')->where($where)->limit(($p-1)*$pagesize,$pagesize)->select();
		foreach ($data['costlist'] as $key => $value){
			if($value['annual']){
				switch ($value['slow']){
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
				//$should = $value['should'].'-'.date("m-d",$value['applydate']);
				$data['costlist'][$key]['datepay'] = patent_fee(date("Y-m-d",$value['applydate']),$value['type'],0,$slow,date("Y-m-d",$value['authdate']),'',date('Y-m-d',$value['should']),$value['annual']);
			}else {
				/* 年费计算  */
				$data['costlist'][$key]['datepay'] = patent_fee(date("Y-m-d",$value['applydate']),$value['type'],0,1,date("Y-m-d",$value['authdate']),'','','');
			}
			/* 年费监控 年度 */
			$data['costlist'][$key]['annualyear'] = array(
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
			$data['costlist'][$key]['latetime'] = array(
					'0'=>'无滞纳',
					'1'=>'滞纳第1个月',
					'2'=>'滞纳第2个月',
					'3'=>'滞纳第3个月',
					'4'=>'滞纳第4个月',
					'5'=>'滞纳第5个月',
					'6'=>'滞纳第6个月'
			);
			/* 年费监控 年度 */
			$data['costlist'][$key]['isslow'] = array(
					'1'=>'个人减缓(85%)',
					'2'=>'企业减缓(70%)',
					'3'=>'不减缓'
			);
		}
		/* 统计缴纳总额 */
		$price = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price,p.latetime,p.process_state,p.latefee,p.daynum,p.annual_state,p.pay_total')->where($where)->select();
		foreach ($price as $key => $value){
			$data['totalprice'] += $value['pay_total'];
		}
		if($data['totalprice']){
			$data['totalprice'] = $data['totalprice'].'.00';
		}
		$this->assign('data',$data);
		$this->display();
	}
	
	/*缴费清单 导出清单功能 */
	public function expAll(){
		//读取所有对应的数据
		$where['memberid'] = session('user.id');//用户id
		$where['status'] = '1';//已添加
		$where['keystatus'] = '2';//已监控
		$where['annual_state'] = array('egt','1');//已加入缴费清单
		$where['annual_isdel'] = '1';//未被删除
		$data[][0]=array('我的专利数据库表','','','','','','','');
		$data[][1]=array("类型","专利号","专利名","权利人","法律状态","申请日期","应缴日期","年费年度","缴费金额");
		$data[] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.type,h.patentnum,h.cname,h.patentee,h.legalstatus,h.applydate,p.should,p.annual,h.authdate,p.pay_total')->where($where)->select();
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
			$totalprice += $value['pay_total'];
			unset($data[2][$key]['authdate']);
		}
		$key = $key+1;
		$data[2][$key]['type'] = '总额';
		$data[2][$key]['patentnum'] = '';
		$data[2][$key]['cname'] = '';
		$data[2][$key]['patentee'] = '';
		$data[2][$key]['legalstatus'] = '';
		$data[2][$key]['applydate'] = '';
		$data[2][$key]['should'] = '';
		$data[2][$key]['annual'] = '';
		$data[2][$key]['totalprice'] = $totalprice;
		//print_r($data);die;
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
					//array_unshift($rows,$rows['0']);
					array_unshift($rows,$key+1);
					//$objPHPExcel->getActiveSheet()->mergeCells("A{$column}:K{$column}");//合并单元格
					//$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFont()->setSize(12);//字体
					//$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFont()->setBold(true);//粗体
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
    
	/*缴费清单 年费监控下拉应缴年度获取应缴日期 */
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
	
	/* 一键缴费功能  */
	public function onekeyCost(){
		$where['memberid'] = session('user.id');
		$where['annual_state'] = array('gt','0');//已设置缴费清单以及计算好总金额
		$data = M('patentMember')->field('id')->where($where)->select();//获取id
		foreach ($data as $key => $value){
			$result .= $value['id'].',';
		}
		$result = substr($result, 0, -1);
		echo $result;
	}
	
    public function addcost(){
    	$info = explode(',',I('rows'));
     	if(IS_POST && I('rows')){
    		$data['reg_fee'] = $info[1];//申请费
    		$data['acc_fee'] = $info[2];//授权费
    		$data['sup_acc_fee'] = $info[3];//超权费
    		$data['agent_fee'] = $info[4];//代理费
    		$data['cut_fee'] = $info[5];//有减缓官费
    		$data['else_fee'] = $info[6];//其他费用
    		$data['years'] = $info[7];//已维持年数
    		$data['total_fee'] = $info[8];//总维持费
    		$id = $info[9];//当前id
    		$data['fee_state'] = 1;//已设置费用状态
    		
    		$table = M('patentMember');
    		$where['applynum'] = $info[0];//专利号/申请号
    		$where['id'] = $info[9];//自增id
    		$where['memberid'] = session('user_id');//用户id
    		$ptn = $table->where($where)->save($data);//直接保存
    		if($ptn){
    			echo '您已成功修改'.$ptn.'条费用设置';
    		}else{
    			echo '修改失败';
    		}
    	}
    }
    
    /* 费用设置，操作删除数据按钮  */
   public function delmypatentdb(){
    	$map['id'] = I('id') ;
    	$map['memberid'] = session('user_id');
    	//$data['status'] = '2';//已删除
    	$patentmember = M('patentMember')->where($map)->delete();
    	if($patentmember){
    		echo '您已成功删除'.$patentmember.'件专利';
    	} else {
    		echo "删除失败";
    	}
    }
   
   /* 缴费清单 单个操作删除数据  */
   public function delCost(){
   	$map['id'] = I('id') ;
   	$map['memberid'] = session('user.id');
   	$data['annual_isdel'] = '2';//已删除
   	$patentmember = M('patentMember')->where($map)->save($data);
   	if($patentmember){
   		echo "删除成功";
   	} else {
   		echo "删除失败";
   	}
   }
   
   /* 修改缴费清单功能 */
   public function editCost(){
   	$where['applynum'] = I('pnm');
   	$where['id'] = I('pid');
   	$where['memberid'] = session('user.id');
   	if(I('zlflsts4') == '2'){
   		$data['annual'] = I('zlflsts1')+1;//年度
   		$data['slow'] = I('zlflsts2');//减缓比例
   		$data['latetime'] = I('zlflsts3');//滞纳时间
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
   	$wh['applynum'] = I('pnm');
   	$da = M('patentHousekeeper')->where($wh)->find();
   	$money = patent_fee(date("Y-m-d",$da['applydate']),$da['type'],0,$slow,date("Y-m-d",$da['authdate']),'',date('Y-m-d',$data['should']),$da['annual']);
   	$data['pay_total'] = $money['money'];//缴费总金额
   	$data['daynum'] = $money['dateyet'];//距离缴费天数
   	$data['latefee'] = $money['overfee'];//滞纳金额
   	$data['annual_state'] = '0';//修改加入缴费清单状态
   	$result = M('patentMember')->where($where)->save($data);
   	if($result){
   	 $msg = '修改成功！';
   	}else {
   	 $msg = '';
   	}
   	 
   	echo $msg;
   }
   
   /* 缴费清单 一键删除功能 */
   public function allDel(){
   	$where['memberid'] = session('user.id');
   	$data['annual_isdel'] = '2';//已删除
   	$alldel = M('patentMember')->where($where)->save($data);
   	if($alldel){
   		$msg =  '成功删除'.$alldel.'件专利';
   	}
   
   	echo $msg;
   }
   
   /* 缴费清单批量删除功能  */
   public function batchDel(){
	   	$id = explode(',',I('id'));
	   	foreach ($id as $key => $value){
	   		$where['id'] = $value;
	   		$where['memberid'] = session('user.id');
	   		$data['annual_isdel'] = '2';//已删除
	   		$results = M('patentMember')->where($where)->save($data);
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
    
    /* 删除费用清单的单个数据功能 */
   public function onedelajax(){
    	$where['id'] = I('id');
    	$where['fee_state'] = 1;//已设置费用状态
    	$data['fee_state'] = 0;//未设置费用状态
    	$savesql = M('patentMember')->where($where)->save($data);
    	if($savesql){
    		echo '你已成功取消'.$savesql.'件专利费用清单';
    	} else {
    		echo "删除失败";
    	}
    }
    
    /* 取消添加功能 */
   public function oneKeyQxtj(){   
	    $map['id'] = array('in',I('id')) ;
	    $map['memberid'] = session('user_id');
	    $patentmember = M('patentMember')->where($map)->delete();
	    if($patentmember){
	    	echo '您已成功删除'.$patentmember.'件专利';
	    } else {
	    	echo "删除失败";
	    }
    }
}