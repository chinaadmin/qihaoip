<?php
namespace Zlgj\Controller;
class IndexController extends ZlgjBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	/* 专利概况 */
    public function index(){
    	$data['member'] = M('Member')->where('id = '.session('user.id'))->find();
    	
    	/* 公用条件和变量 */
    	$condition['memberid'] = session('user.id');
    	$condition['keystatus'] = 2;//已添加监控
    	$condition['status'] = 1;//未删除
    	$i=1;
    	
    	/* 统计已添加专利和权利人数量 */
    	$parameter['patentee'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->distinct(true)->field('patentee')->select();
    	$data['zlqrnum'] = count($parameter['patentee']);
    	$data['count'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->count();
    	
    	/* 滞纳专利应缴总额  */
    	$sumcount = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->select();
    	
    	/* 预计今年年费,急需缴费专利,已滞纳专利,滞纳专利数量 */
    	$beginTime = date('Y-m-d', mktime(0, 0,0, 1, 1, date('Y', time())));
    	$endTime = date('Y-m-d', mktime(0, 0, 0, 12, 31, date('Y', time())));
    	foreach ($sumcount as $key => $value){
    		if($value['should'] >= strtotime($beginTime) && $value['should'] <= strtotime($endTime)  && $value['legalstatus'] == '有效专利'){
    			$data['annualfee'] += $value['pay_total'];//预计今年年费
    		}
    		if($value['daynum'] > -30 && $value['daynum'] <= 0){
    			$data['needexpend'] += $i;//急需缴费专利数量
    		}
    		if($value['daynum'] > 0 && $value['daynum'] < 180 ){
    			$data['overdue'] += $i;//滞纳专利数量
    		}
    		/*专利类型统计*/
    		if($value['type'] == '1'){
    			$data['invention'] += $i;//发明
    		} elseif($value['type'] == '2') {
    			$data['appearance'] += $i;//外观
    		} elseif($value['type'] == '3') {
    			$data['practical'] += $i;//实用
    		}
    		$data['overdueamount'] += $value['latefee'];
    	}
    	
    	/*费用管理专利,费用管理总额*/
    	$where['memberid'] = session('user.id');
    	$where['status'] = '1';//未删除专利数据
    	$where['keystatus'] = '2';//已监控
    	$where['fee_state'] = '1';//已设置费用管理
    	$where['fee_isdel'] = '1';//未删除该专利的费用管理数据
    	$costmonitor = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->select();
    	foreach ($costmonitor as $key => $value){
    		$data['costprice'] += $value['total_price'];
    	}
    	$data['costcount'] = count($costmonitor);//统计当前费用管理专利条数
    	
    	/* 加入交易库专利  */
    	$map['salestatus'] = 3;
    	$map['memberid'] = session('user.id');
    	$tradecount = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($map)->count();
    	
    	/* 有效-授权专利统计 */
    	$data['countyear'] = M('patentHousekeeper h')->field('h.applyyear')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->group('h.applyyear')->where($condition)->order('h.applydate asc')->select();//统计年份
    	foreach ($data['countyear'] as $key => $value){
    		$wh2['memberid'] = session('user.id');
    		$wh2['status'] = 1;
    		$wh2['applyyear'] = $value['applyyear'];
    		$data['countyear'][$key]['yxdata'] = M('patentHousekeeper h')->field('h.id,h.applyyear,h.authnum,h.authdate,h.legalstatus')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($wh2)->order('h.applydate asc')->select();//有效
    		foreach ($data['countyear'][$key]['yxdata'] as $k => $v){
    			if($v['legalstatus'] == '有效专利'){
    				$data['countyear'][$key]['yxdatanum'] += $i;
    			}
    			if($v['authnum'] && $v['authdate']){
    				$data['countyear'][$key]['authdatanum'] += $i;
    			}
    		}
    	}
    	
    	/* 逐年申请量统计  */
    	$data['yearnum'] = M('patentHousekeeper h')->field('h.applyyear')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->group('h.applyyear')->where($condition)->select();
    	foreach ($data['yearnum'] as $key => $value){
    		$wh3['memberid'] = session('user.id');
    		$wh3['status'] = 1;
    		$wh3['applyyear'] = $value['applyyear'];
    		$data['yearnum'][$key]['zhuapply'] = M('patentHousekeeper h')->field('h.id,h.type,h.applyyear,h.authnum,h.authdate,h.legalstatus')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($wh3)->order('h.applydate asc')->select();
    		foreach ($data['yearnum'][$key]['zhuapply'] as $k => $v){
    			if($v['type'] == '1'){
    				$data['yearnum'][$key]['type1'] += $i; 
    			}
    			if($v['type'] == '2'){
    				$data['yearnum'][$key]['type2'] += $i;
    			}
    			if($v['type'] == '3'){
    				$data['yearnum'][$key]['type3'] += $i;
    			}
    		}
    	}
    	
    	/* 逐年授权量统计  */
    	$data['authnum'] = M('patentHousekeeper h')->field('h.applyyear')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->group('h.applyyear')->where($condition)->order('h.applydate asc')->select();
    	foreach ($data['authnum'] as $key => $value){
    		$wh4['memberid'] = session('user.id');
    		$wh4['status'] = 1;
    		$wh4['applyyear'] = $value['applyyear'];
    		$data['authnum'][$key]['authyear'] = M('patentHousekeeper h')->field('h.id,h.type,h.applyyear,h.authnum,h.authdate,h.legalstatus')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($wh4)->order('h.applydate asc')->select();
    		foreach ($data['authnum'][$key]['authyear'] as $k => $v){
    			if($v['authnum'] && $v['authdate']){
    				if($v['type'] == '1'){
    					$data['authnum'][$key]['type1'] += $i;
    				}
    				if($v['type'] == '2'){
    					$data['authnum'][$key]['type2'] += $i;
    				}
    				if($v['type'] == '3'){
    					$data['authnum'][$key]['type3'] += $i;
    				}
    			}
    		}
    	}
    	
    	/* 法律状态-专利类型统计 */
    	$data['legalstatus'] = M('patentHousekeeper h')->field('h.legalstatus')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->group('h.legalstatus')->where($condition)->order('h.applydate asc')->select();//统计法律状态
    	foreach ($data['legalstatus'] as $key => $value){
    		$wh['legalstatus'] = $value['legalstatus'];
    		$wh['memberid'] = session('user.id');
    		$wh['status'] = 1;
    		$data['legalstatus'][$key]['zltype'] = M('patentHousekeeper h')->field('count(*) as sum,h.type,h.legalstatus')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->group('h.type')->where($wh)->select();//获取法律状态下的专利类型
    		foreach ($data['legalstatus'][$key]['zltype'] as $k => $v){
    			if($v['type'] == '1'){
    				$data['legalstatus'][$key]['type1'] = $v['sum'];
    			}
    			if($v['type'] == '2'){
    				$data['legalstatus'][$key]['type2'] = $v['sum'];
    			}
    			if($v['type'] == '3'){
    				$data['legalstatus'][$key]['type3'] = $v['sum'];
    			}
    		}
    	}

    	$this->assign('data',$data);
    	$this->display();
    }
    
    /* 下载功能  */
    public function expUser(){
        /* 已添加专利数量 */
        $where['memberid'] = session('user.id');
        $where['status'] = 1;
        $where['keystatus'] = 2;
        $ptno = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->select();
        $cpt = count($ptno);
        /* 已添加专利的所有权利人数量 */
        $patee = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->distinct(true)->field('patentee')->count();
        $beginTime = date('Y-m-d', mktime(0, 0,0, 1, 1, date('Y', time())));
        $endTime = date('Y-m-d', mktime(0, 0, 0, 12, 31, date('Y', time())));
        $i = 1;
        foreach ($ptno as $key => $value){
        	$ptno[$key]['datepay'] =  patent_fee(date("Y-m-d",$value['applydate']),1,false,1,date("Y-m-d",$value['authdate']));
        	//预计今年年费
        	if(strtotime($ptno[$key]['datepay']['paydate']) >= strtotime($beginTime) && strtotime($ptno[$key]['datepay']['paydate']) <= strtotime($endTime)  && $value['legalstatus'] == '有效专利'){
        		$da['eaf'] += $ptno[$key]['datepay']['money'];
        	}
        	//急需缴费专利
        	if($ptno[$key]['datepay']['dateyet'] > -30 && $ptno[$key]['datepay']['dateyet'] <= 0){
        		$da['ntetp'] += $i;
        	}
        	//已滞纳专利和滞纳专利应缴总额
        	if($ptno[$key]['datepay']['dateyet'] > 0 && $ptno[$key]['datepay']['dateyet'] < 180 ){
        		$da['tlp'] += $i;
        		$da['lf'] += $ptno[$key]['datepay']['overfee'];
        	}
        }
        /* 费用管理专利数量以及总额 */
        $map['fee_state'] = 1;
        $map['keystatus'] = 2;
        $map['memberid'] = session('user.id');
        $fee = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($map)->select();
        foreach ($fee as $key => $value){
        	$da['costnum'] = count($fee);
        	$da['costprice'] += $value['reg_fee']+$value['acc_fee']+$value['sup_acc_fee']+$value['agent_fee']-$value['cut_fee']+$value['else_fee']+$value['total_fee'];
        }
        /* 加入交易库专利数量和已交易专利  */
        $wh['salestatus'] = '3';
        $wh['memberid'] = session('user.id');
        //加入交易库专利数量
        $da['tjtlpt'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($wh)->count();
        //已交易专利
        $condition['salestatus'] = '5';
        $condition['memberid'] = session('user.id');
        $da['hbtp'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($condition)->count();
        $data[][0]=array('专利概况表','','','','','','','','','');
        $data[][1]=array("已添加专利","权利人","预计今年年费","急需缴费专利","已滞纳专利","滞纳专利应缴总额","费用管理专利","费用管理总额","加入交易库专利","已交易专利");
        $da['tlp'] = '0';
        $da['lf'] = '0';
        $data[] = array('0'=>array('cpt'=>$cpt,'patee'=>$patee,'eaf'=>$da['eaf'],'ntetp'=>$da['ntetp'],'tlp'=>$da['tlp'],'lf'=>$da['lf'],'costnum'=>$da['costnum'],'costprice'=>$da['costprice'],'tjtlpt'=>$da['tjtlpt'],'hbtp'=>$da['hbtp']));
        //$data[] = M('patentMember')->field('id,memberid,applynum,status,remind,keystatus,salestatus,feestatus,addtime,tradestaus')->where('memberid='.session('user.id'))->find();       
        //导入PHPExcel类库 
        //print_r($data);die;        
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
    	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth('15');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('8');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('15');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('15');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('15');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('20');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('15');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('15');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('20');//设置列宽
    	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('15');//设置列宽
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
    			if($rows['1']=='已添加专利'){
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
    			
    /* 专利概况的一键监控  */
    public function oneKeyAdd(){
    	$where['id'] = array('in',I('id'));
    	$where['memberid'] = session('user.id');
    	$data['keystatus'] =  2;
    	$addsql = M('patentMember')->where($where)->save($data);
    	if($addsql){
    		echo '您已成功监控'.$addsql.'件专利';
    	} else {
    		echo '监控失败';
    	}
    }
    
    /* 专利概况的一键取消监控  */
    public function oneKeyDel(){
    	$where['id'] = array('in',I('id'));
    	$where['memberid'] = session('user.id');
    	$data['keystatus'] =  1;
    	$addsql = M('patentMember')->where($where)->save($data);
    	if($addsql){
    		echo '您已成功监控'.$addsql.'件专利';
    	} else {
    		echo '监控失败';
    	}
    }
    
    /* 修改监控状态  */
    public function jkztajax(){
    	$where['id'] = I('id');
    	$where['memberid'] = session('user.id');
    	$selectsql = M('patentMember')->where($where)->find();
    	if($selectsql['keystatus'] == 1){
    		$data['keystatus'] = 2;
    		$savesql = M('patentMember')->where($where)->save($data);
    		if($savesql){
    			echo '您已成功监控'.$savesql.'件专利';
    		} else {
    			echo "添加监控失败";
    		}
    	} else {
    		$data['keystatus'] = 1;
    		$savesql = M('patentMember')->where($where)->save($data);
    		if($savesql){
    			echo "取消监控成功";
    		} else {
    			echo "取消监控失败";
    		}
    	}
    }
    
    public function addpatent($q='',$p='1',$f=''){
    	//展示当前用户已添加多少专利
    	$where['memberid'] = session('user.id');
    	$where['status'] = 1;
    	$zlnum = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->count();
    	
    	//获取用户查询关键词
    	if($q == ''){
    		$arr = null;
    	} else {
    		if($f == 'zhss'){
    			$dealq = trim($q);
    			$patent = new \Org\Patent\Patent($dealq,$p);
    			$arr5 = $patent->getArr();
    			//print_r($arr5);die;
    			foreach ($arr5 as $key => $value){
    				$arr5[$key][10] = explode('/',$value[10]);
    				$arr5[$key][10][6] = $arr5[$key][10][4].'/'.$arr5[$key][10][5];
    			}
    			foreach ($arr5 as $key => $value){
    				if ($value[1] == '[发明专利] [发明授权专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[发明专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[外观设计]') {
    					$value[1] = '外观';
    				} elseif($value[1] == '[中国台湾]') {
    					$value[1] = '台湾';
    				} elseif($value[1] == '[香港特区]') {
    					$value[1] = '香港';
    				} else {
    					$value[1] = '实用';
    				}
    				/* if(strip_tags($value[6]) == trim($q)){
    					$value[6] = $q;
    				}else{
    					$value[6] = explode(',',$value[6]);
    					if($value[6][1]){
    						$value[6] = $q.','.$value[6][0].','.$value[6][1];
    					} else {
    						if($value[6] == trim($q)){
    							$value[6] = $value[6][0];
    						} else {
    							$value[6] = $q;
    						}
    					}
    				} */
    				$arr5[$key][6] = strip_tags($value[6]);
    				$arr5[$key][1] = $value[1];
    				$map['applynum'] = $value[4];
    				$map['status'] = 1;
    				$map['memberid'] = session('user.id');
    				$membersql = M('patentMember')->where($map)->find();
    				if($membersql){
    					$arr5[$key][100] = '已添加';
    				} else {
    					$arr5[$key][100] = '未添加';
    				}
    			}
    			//print_r($arr5);die;
    		} elseif ($f == 'zlqr'){
    			$dealq = 'pa:("'.trim($q).'")';
    			$patent = new \Org\Patent\Patent($dealq,$p);
    			$arr = $patent->getArr();
    			foreach ($arr as $key => $value){
    				$arr[$key][10] = explode('/',$value[10]);
    				$arr[$key][10][6] = $arr[$key][10][4].'/'.$arr[$key][10][5];
    			}
    			foreach ($arr as $key => $value){
    				if ($value[1] == '[发明专利] [发明授权专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[发明专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[外观设计]') {
    					$value[1] = '外观';
    				} elseif($value[1] == '[中国台湾]') {
    					$value[1] = '台湾';
    				} elseif($value[1] == '[香港特区]') {
    					$value[1] = '香港';
    				} else {
    					$value[1] = '实用';
    				}
    				//print_r($value);
    				if(strip_tags($value[6]) == trim($q)){
    					$value[6] = $q;
    				}else{
    					$value[6] = explode(',',$value[6]);
    					if($value[6][1]){
    						$value[6] = $q.','.$value[6][0].','.$value[6][1];
    					} else {
    						if($value[6] == trim($q)){
    							$value[6] = $value[6][0];
    						} else {
    							$value[6] = $q;
    						}
    					}
    				}
    				$value[6] = strip_tags($value[6]);
    				$value[6] = preg_replace("/$q/i", "<font color=red>$q</font>", $value[6]);
    				
    				$arr[$key][6] = $value[6];
    				$arr[$key][1] = $value[1];
    				$map['applynum'] = $value[4];
    				$map['status'] = 1;
    				$map['memberid'] = session('user.id');
    				$membersql = M('patentMember')->where($map)->find();
    				if($membersql){
    					$arr[$key][100] = '已添加';
    				} else {
    					$arr[$key][100] = '未添加';
    				}
    			}
    			//print_r($arr);
    		} elseif($f == 'intor') {
    			$dealq = 'in:("'.trim($q).'")';
    			$patent = new \Org\Patent\Patent($dealq,$p);
    			$arr1 = $patent->getArr();
    			
    			foreach ($arr1 as $key => $value){
    				$arr1[$key][10] = explode('/',$value[10]);
    				$arr1[$key][10][6] = $arr1[$key][10][4].'/'.$arr1[$key][10][5];
    			}

    			foreach ($arr1 as $key => $value){
    				if ($value[1] == '[发明专利] [发明授权专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[发明专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[外观设计]') {
    					$value[1] = '外观';
    				} elseif($value[1] == '[中国台湾]') {
    					$value[1] = '台湾';
    				} elseif($value[1] == '[香港特区]') {
    					$value[1] = '香港';
    				} else {
    					$value[1] = '实用';
    				}
    				if(strip_tags($value[11]) == trim($q)){
    					$value[11] = $q;
    				}else{
    					$value[11] = explode(',',$value[11]);
    					if($value[11][1]){
    						$value[11] = $q.','.$value[11][0].','.$value[11][1];
    					} else {
    						$value[11] = $value[11][0];
    					}
    				}
    				
    				$value[11] = strip_tags($value[11]);
    				$value[11] = preg_replace("/$q/i", "<font color=red>$q</font>", $value[11]);
    				
    				$arr1[$key][6] = strip_tags($value[6]);
    				$arr1[$key][11] = $value[11];
    				$arr1[$key][1] = $value[1];
    				$map['applynum'] = $value[4];
    				$map['status'] = 1;
    				$map['memberid'] = session('user.id');
    				$membersql = M('patentMember')->where($map)->find();
    				if($membersql){
    					$arr1[$key][100] = '已添加';
    				} else {
    					$arr1[$key][100] = '未添加';
    				}
    			}
    			//print_r($arr1);
    		} elseif($f == 'agency'){
    			$dealq = 'agc:("'.trim($q).'")';
    			$patent = new \Org\Patent\Patent($dealq,$p);
    			$arr2 = $patent->getArr();
    			foreach ($arr2 as $key => $value){
    				$arr2[$key][10] = explode('/',$value[10]);
    				$arr2[$key][10][6] = $arr2[$key][10][4].'/'.$arr2[$key][10][5];
    			}
    			foreach ($arr2 as $key => $value){
    				if ($value[1] == '[发明专利] [发明授权专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[发明专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[外观设计]') {
    					$value[1] = '外观';
    				} elseif($value[1] == '[中国台湾]') {
    					$value[1] = '台湾';
    				} elseif($value[1] == '[香港特区]') {
    					$value[1] = '香港';
    				} else {
    					$value[1] = '实用';
    				}
    				
    				if(strip_tags($value[12]) == trim($q)){
    					$value[12] = $q;
    				}else{
    					$value[12] = explode(',',$value[12]);
    					if($value[12][1]){
    						$value[12] = $q.','.$value[12][0].','.$value[12][1];
    					} else {
    						$value[12] = $value[12][0];
    					}
    				}
    				$value[12] = strip_tags($value[12]);
    				$value[12] = preg_replace("/$q/i", "<font color=red>$q</font>", $value[12]);
    				
    				$arr2[$key][6] = strip_tags($value[6]);
    				$arr2[$key][12] = $value[12];
    				$arr2[$key][1] = $value[1];
    				$map['applynum'] = $value[4];
    				$map['status'] = 1;
    				$map['memberid'] = session('user.id');
    				$membersql = M('patentMember')->where($map)->find();
    				if($membersql){
    					$arr2[$key][100] = '已添加';
    				} else {
    					$arr2[$key][100] = '未添加';
    				}
    			}
    			//print_r($arr2);
    		} elseif ($f == 'ptn'){
    			$dealq = 'an:("'.trim($q).'")';
    			$patent = new \Org\Patent\Patent($dealq,$p);
    			$arr4 = $patent->getArr();
    			foreach ($arr4 as $key => $value){
    				$arr4[$key][10] = explode('/',$value[10]);
    				$arr4[$key][10][6] = $arr4[$key][10][4].'/'.$arr4[$key][10][5];
    			}
    			foreach ($arr4 as $key => $value){
    				if($value[1] == '[发明专利] [发明授权专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[发明专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[外观设计]') {
    					$value[1] = '外观';
    				} elseif($value[1] == '[中国台湾]') {
    					$value[1] = '台湾';
    				} elseif($value[1] == '[香港特区]') {
    					$value[1] = '香港';
    				} else {
    					$value[1] = '实用';
    				}
    				
    				if(strip_tags($value[4]) == trim($q)){
    					$value[4] = $q;
    				}else{
    					$value[4] = explode(',',$value[4]);
    					if($value[4][1]){
    						$value[4] = $q.','.$value[4][0].','.$value[4][1];
    					} else {
    						$value[4] = $value[4][0];
    					}
    				}
    				$value[4] = strip_tags($value[4]);
    				$value[4] = preg_replace("/$q/i", "<font color=red>".strtoupper($q)."</font>", $value[4]);
    				
    				$arr4[$key][4] = $value[4];
    				$arr4[$key][6] = strip_tags($value[6]);
    				$arr4[$key][1] = $value[1];
    				$map['applynum'] = strip_tags($value[4]);
    				$map['status'] = 1;
    				$map['memberid'] = session('user.id');
    				$membersql = M('patentMember')->where($map)->find();
    				if($membersql){
    					$arr4[$key][100] = '已添加';
    				} else {
    					$arr4[$key][100] = '未添加';
    				}
    			}
    			//print_r($arr4);die;
    		} else {
    			$dealq = trim($q);
    			$patent = new \Org\Patent\Patent($dealq,$p);
    			$arr3 = $patent->getArr();
    			foreach ($arr3 as $key => $value){
    				$arr3[$key][10] = explode('/',$value[10]);
    				$arr3[$key][10][6] = $arr3[$key][10][4].'/'.$arr3[$key][10][5];
    			}
    			foreach ($arr3 as $key => $value){
    				if($value[1] == '[发明专利] [发明授权专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[发明专利]') {
    					$value[1] = '发明';
    				} elseif($value[1] == '[外观设计]') {
    					$value[1] = '外观';
    				} elseif($value[1] == '[中国台湾]') {
    					$value[1] = '台湾';
    				} elseif($value[1] == '[香港特区]') {
    					$value[1] = '香港';
    				} else {
    					$value[1] = '实用';
    				}
    				$arr3[$key][6] = strip_tags($value[6]);
    				$arr3[$key][1] = $value[1];
    				$map['applynum'] = $value[4];
    				$map['status'] = 1;
    				$map['memberid'] = session('user.id');
    				$membersql = M('patentMember')->where($map)->find();
    				if($membersql){
    					$arr3[$key][100] = '已添加';
    				} else {
    					$arr3[$key][100] = '未添加';
    				}
    			}
    		}
    		
    		$count = $patent->count();//数据总数量
    		$seachcount = $patent->count();//搜索数量
    		$pagesize = 10;
    		$newpage = new \Org\Util\Page($count,$pagesize);//实例化分类页
    		$page = $newpage->getPage();//数据分页
    	}
    	$title='添加专利';
    	 
    	$this->assign('title',$title);
    	$this->assign('seachnum',$seachcount);//搜索数量
    	$this->assign('page',$page);//赋值分页输出
    	$this->assign('q',$q);
    	$this->assign('f',$f);
    	$this->assign('count',$count);//统计已添加的专利总数
    	$this->assign('zlnum',$zlnum);
    	$this->assign('arr',$arr);
    	$this->assign('arr1',$arr1);
    	$this->assign('arr2',$arr2);
    	$this->assign('arr3',$arr3);
    	$this->assign('arr4',$arr4);
    	$this->assign('arr5',$arr5);
		$this->display();
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
	    } elseif($data['type'] == '台湾') {
    		$data['type'] = 4;
    	} elseif($data['type'] == '香港') {
    		$data['type'] = 5;
    	} else {
	    	$data['type'] = 1;
	    }
    	$data['cname'] = I('title');//标题
    	$data['patentnum'] = I('ptno','','strip_tags');//专利号
    	$data['patentee'] = I('ptp','','strip_tags');//专利权人
    	$data['applydate'] = strtotime(I('date'));//申请日
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
    	/* 判断是添加功能还是删除功能 */
    	$where['patentnum'] = I('ptno','','strip_tags');
    	$where['memberid'] = session('user.id');
    	$selectsql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->find();
    	//echo M('patentHousekeeper h')->getLastSql();die;
    	/* 如果有数据那就是执行删除功能，否则添加功能 */
	    if($selectsql){
	    	$wh['applynum'] = I('ptno','','strip_tags');
	    	$wh['memberid'] = session('user.id');
	    	$delsql = $patentmember->where($wh)->delete();//删除功能
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
	    		//$data1['yearfee_status'] = patent_fee(date("Y-m-d",$value['applydate']),1,false,1,date("Y-m-d",$value['authdate']));
	    		$membersql = $patentmember->add($data1);//添加功能
	    		if($membersql){
	    			echo '添加成功';
	    		} else {
	    			echo '添加失败';
	    		}
	    	} else {
	    		$housesql = $house->add($data);//添加功能
	    		/* 添加数据到patentMember表中  */
	    		if($housesql){
	    			$data1['memberid'] = session('user.id');
	    			$data1['applynum'] = I('ptno','','strip_tags');
	    			$data1['status'] = 1;
	    			$data1['addtime'] = time();
	    			//$data1['yearfee_status'] = patent_fee(date("Y-m-d",$value['applydate']),1,false,1,date("Y-m-d",$value['authdate']));
	    			$membersql = $patentmember->add($data1);//添加功能
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

    /* 一键添加功能  */
    public function keyaddajax(){
     	$arr = I('id');
    	$row = explode(',|,',$arr);
    	//print_r($row);
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
    		} elseif($data['type'] == '台湾') {
    			$data['type'] = 4;
    		} elseif($data['type'] == '香港') {
    			$data['type'] = 5;
    		} else{
    			$data['type'] = 1;
    		}
    		$data['cname'] =  $addarr[$key][3];
    		$data['patentnum'] =  trim($addarr[$key][5]);
    		$data['applydate'] =  strtotime($addarr[$key][8]);
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
    		//print_r($data);
    		//先做数据判断，是否存在此数据。
    		$house = M('patentHousekeeper');
    		$patentmember = M('patentMember');
    		
    		/* 添加功能 */
    		$where['patentnum'] = $addarr[$key][5];
    		$where['memberid'] = session('user.id');
    		$selectsql = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->find();
    		//echo M('patentHousekeeper h')->getLastSql();
    		/* 判断添加是否成功  */
    		if($selectsql){
    			$a++;				
    		} else {
    			/* 添加时查询patentHousekeeper表是否有此条数据，有则不添加主表数据，否则添加 */
    			$map['patentnum'] = $addarr[$key][5];
    			$houseselectsql = $house->where($map)->find();
    			if($houseselectsql){
    				$upd['legalstatus'] = $data['legalstatus'];
    				$housesql = $house->where($map)->save($upd);/* $houseselectsql */;
    				/* 添加数据到patentMember表中  */
    				$data1['memberid'] = session('user.id');
    				$data1['applynum'] = trim($data['patentnum']);
    				$data1['status'] = 1;
    				$data1['addtime'] = time();
    				//$data1['yearfee_status'] = patent_fee(date("Y-m-d",$value['applydate']),1,false,1,date("Y-m-d",$value['authdate']));
    				$membersql = $patentmember->add($data1);//添加功能
    				//echo $patentmember->getLastSql();die;
    				if($membersql){
    					$b++;
    				} else {
    					$c++;
    				}
    			} else {
    				$housesql = $house->add($data);//添加功能
    				/* 添加数据到patentMember表中  */
    				if($housesql){
    					$data1['memberid'] = session('user.id');
    					$data1['applynum'] = trim($data['patentnum']);
    					$data1['status'] = 1;
    					$data1['addtime'] = time();
    					//$data1['yearfee_status'] = patent_fee(date("Y-m-d",$value['applydate']),1,false,1,date("Y-m-d",$value['authdate']));
    					$membersql = $patentmember->add($data1);//添加功能
    					//echo $patentmember->getLastSql();die;
    					if($membersql){
    						$b++;
    					} else {
    						$c++;
    					}
    				}
    			}
    		}
    	}
    	//print_r($b);die;
    	//echo $a?$a.'条数据无需添加   ':'',$b?$b.'条数据添加成功   ':'',$c?$c.'条数据添加失败。':'';
    	echo $b?$b.'条数据添加成功   ':'无数据添加';
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
    	if(IS_GET){
    		$codition['memberid'] = session('user.id');
    		$codition['status'] = 1;
    		$parameter['inventor'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($codition)->distinct(true)->field('inventor')->select();
    		$parameter['patentee'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($codition)->distinct(true)->field('patentee')->select();
    		if(!isset($parameter['patentee'])){
    			$parameter['patentee'] = 0;
    		}
    		$parameter['zlqrnum'] = count($parameter['patentee']);
    		if(!isset($parameter['inventor'])){
    			$parameter['inventor'] = 0;
    		}
    		//print_r($parameter['inventor']);
    		$parameter['search'] = trim(I('jianst'));
    		$map['patentnum'] = array('like','%'.$parameter['search'].'%');
    		$map['cname'] = array('like','%'.$parameter['search'].'%');
    		$map['patentee'] = array('like','%'.$parameter['search'].'%');
    		$map['inventor'] = array('like','%'.$parameter['search'].'%');
    	}
    	$map['_logic'] = 'OR';
    	$where['_complex'] = $map;
    	
    	if(trim(I('type'))){
    		$where['type'] = trim(I('type'));
    	}
    	if(trim(I('fee'))){
    		$where['yearfee_status'] = trim(I('fee'));
    	}
    	if(trim(I('tee'))){
    		$where['patentee'] = trim(I('tee'));
    	}
    	if(trim(I('intor'))){
    		$where['inventor'] = trim(I('intor'));
    	}
    	if(trim(I('monitor'))){
    		$where['keystatus'] = trim(I('monitor'));
    	}
    	if(trim(I('ordertime')) == 'dsort'){
    		$order = 'p.id,applydate DESC';
    	} else {
    		$order = 'p.id DESC,applydate ASC';
    	}
    	$where['memberid'] = session('user.id');
    	$where['status'] = 1;
    	$countsqlarr = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->select();// 查询满足要求的总记录数
    	$count = count($countsqlarr);
    	$pagesize = 10;
    	$newpage = new \Org\Util\Page($count,$pagesize);//实例化分类页
    	$page = $newpage->getPage();//数据分页
    	$mypatentdb = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->limit(($p-1)*$pagesize,$pagesize)->order($order)->select();
    	$where['legalstatus'] = '有效专利';
    	$yxzl = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->count();// 统计有效专利
    	$title='我的专利数据库';
    	
    	$this->assign('yxzl',$yxzl);
    	$this->assign('title',$title);
    	$this->assign(parameter,$parameter);
    	$this->assign('count',$count);
    	$this->assign('page',$page);
    	$this->assign('mypatentdb',$mypatentdb);
    	$this->display();
    }
    
    /* 一键监控  */
    public function allMonitor(){
    	 $where['memberid'] = session('user.id');
    	 $where['status'] = 1;
    	 $data['keystatus'] = 2;
    	 $allmonitor = M('patentMember')->where($where)->save($data);
    	 if($allmonitor){
    	 	$msg =  '成功监控'.$allmonitor.'件专利';
    	 } else {
    	 	$msg = '您的专利已全部添加过了。';
    	 } 
    	 
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
    	//print_r(count($patentMemberSql));die;
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
    
    /* 一键删除 */
    public function allDel(){
    	$where['memberid'] = session('user.id');
    	$alldel = M('patentMember')->where($where)->delete();
    	if($alldel){
    		$msg =  '成功删除'.$alldel.'件专利';
    	}
    	 
    	echo $msg;
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

    /* 我的专利数据库单个交易功能 */
    public function onetrademypatent(){
    	$patentmember = M('patentMember');
    	$wh['applynum'] = I('id');
    	$wh['salestatus'] = 1;
    	$whtrade = $patentmember->where($wh)->find();
    	if($whtrade) {
	    	$where['applynum'] = I('id');
	    	$where['salestatus'] = 1;
	    	$where['memberid'] = session('user.id');
	    	$data['salestatus'] = 3;
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
    
    /* 我的专利数据库 操作删除数据按钮  */
    public function delmypatentdb(){
    	$map['applynum'] = I('id') ;
    	$map['memberid'] = session('user.id');
    	$patentmember = M('patentMember')->where($map)->delete();
    	if($patentmember){
    		echo "删除成功";
    	} else {
    		echo "删除失败";
    	}
    }
    
    /* 我的专利数据库 操作一键监控操作*/
    public function akeymonitor(){
    	$where['applynum'] = array('in',I('id'));
    	$where['keystatus'] = 1;
    	$where['memberid'] = session('user.id');
    	$data['keystatus'] = 2;
    	$patentmember = M('patentMember')->where($where)->save($data);
    	if($patentmember){
    		$msg = '成功监控'.$patentmember.'条';
    	}else{
    		$msg = '监控失败';
    	}
    
    	echo $msg;
    }
    
    /* 我的专利数据库 操作一键取消监控操作*/
    public function cancelmonitor(){
    	$where['applynum'] = array('in',I('id'));
    	$where['keystatus'] = 2;
    	$where['memberid'] = session('user.id');
    	$data['keystatus'] = 1;
    	$patentmember = M('patentMember')->where($where)->save($data);
    	if($patentmember){
    		$msg = '成功取消监控'.$patentmember.'条';
    	}else{
    		$msg = '取消监控失败';
    	}
    
    	echo $msg;
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
 
    /* public function remindset() {
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