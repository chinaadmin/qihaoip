<?php
namespace Zlgj\Controller;
class CostManageController extends ZlgjBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	/* 费用管理首页  */
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
		$where['fee_state'] = '1';//已设置费用管理
		$where['fee_isdel'] = '1';//未删除
		$count = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->count();// 查询满足要求的总记录数
		if(session('pse',I('pse'))){
			$pagesize = session('pse',I('pse'));
		}else{
			$pagesize = 10;
		}
		$data['pagesize'] = $pagesize;
		$newpage = new \Org\Util\ZlgjPage($count,$pagesize);//实例化分类页
		if($count && $count > $pagesize){
			$data['page'] = $newpage->getPage();//数据分页
		}
		$data['costmanage'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price')->where($where)->limit(($p-1)*$pagesize,$pagesize)->select();
		foreach ($data['costmanage'] as $key => $value){
			/* 统计缴纳总额 */
			$data['totalprice'] += $value['total_price'];
			$data['costmanage'][$key]['cname1'] = $value['cname'];
		}
		$data['count'] = $count;//专利数量
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/* 一键下载功能  */
	public function expAll(){
		//读取所有对应的数据
		$where['memberid'] = session('user.id');//用户id
		$where['status'] = '1';//已添加
		$where['keystatus'] = '2';//已监控
		$where['fee_state'] = '1';//已设置费用管理
		$where['fee_isdel'] = '1';//未删除
		$data[][0]=array('费用管理表','','','','','','','','','');
		$data[][1]=array("申请号","专利名","正常申请费","超权费","有减缓官费","维持费","授权登印费","代理费","其他费用","费用总计");
		$data[] =  M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.patentnum,h.cname,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.total_fee,p.acc_fee,p.agent_fee,p.else_fee,p.total_price')->where($where)->select();
		//print_r($data);die;
		//导入PHPExcel类库
		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Writer.Excel5");
		import("Org.Util.PHPExcel.IOFactory.php");
		$filename="test_excel";
		$this->getExcel($filename,$data);
	}

	/* 选中下载功能  */
	public function expDownload(){
		//读取所有对应的数据
		$data[][0]=array('费用管理表','','','','','','','','','');
		$data[][1]=array("申请号","专利名","正常申请费","超权费","有减缓官费","维持费","授权登印费","代理费","其他费用","费用总计");
		$id = explode(',',I('id'));
		foreach ($id as $key => $value){
			$where['p.id'] = $value;
			$where['p.memberid'] = session('user.id');
			$result[] = M('patentMember p')->join('left join qh_patent_housekeeper h ON h.patentnum = p.applynum')->field('h.patentnum,h.cname,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.total_fee,p.acc_fee,p.agent_fee,p.else_fee,p.total_price')->where($where)->find();
		}
		$data[] = $result;
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
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth('50');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth('12');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth('12');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth('12');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth('12');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth('12');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth('12');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth('12');//设置列宽
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth('12');//设置列宽
		//设置边框
		$sharedStyle1=new \PHPExcel_Style();
		$sharedStyle1->applyFromArray(array('borders'=>array('allborders'=>array('style'=>\PHPExcel_Style_Border::BORDER_THIN))));
	
		foreach ($data as $ke=>$row){
			foreach($row as $key=>$rows){
				if(count($row)==1&&empty($row[0][1])&&empty($rows[1])&&!empty($rows)){
	
					$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A{$column}:K{$column}");//设置边框
					array_unshift($rows,$rows['0']);
					$objPHPExcel->getActiveSheet()->mergeCells("A{$column}:K{$column}");//合并单元格
					$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFont()->setSize(12);//字体
					$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFont()->setBold(true);//粗体
					//背景色填充
					$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
					$objPHPExcel->getActiveSheet()->getStyle("A{$column}:K{$column}")->getFill()->getStartColor()->setARGB('FFB8CCE4');
				}else{
					if(!empty($rows)){
						array_unshift($rows,$key+1);
						$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1,"A{$column}:K{$column}");//设置边框
					}
				}
				if($rows['1']=='申请号'){
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
					//print_r($value);die;
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
	
	/* 费用管理 修改信息  */
	public function editInfo(){
		$where['id'] = I('id');//修改的id
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
		
		$patentmember = M('patentMember')->where($where)->save($data);
		echo M('patentMember')->getLastSql();die;
		if($patentmember){
			echo "修改成功！";
		} else {
			echo "修改失败！";
		}
	}
	
	/* 费用管理 单个操作删除数据  */
	public function delInfo(){
		$map['id'] = I('id') ;
		$map['memberid'] = session('user.id');
		$data['fee_isdel'] = '2';//已删除
		$patentmember = M('patentMember')->where($map)->save($data);
		if($patentmember){
			echo "删除成功";
		} else {
			echo "删除失败";
		}
	}
	
    /* 费用管理 一键删除  */
    public function allDel(){
   	 $where['memberid'] = session('user.id');
   	 $data['fee_isdel'] = '2';//已删除
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
	   		$data['fee_isdel'] = '2';//已删除
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
}