<?php
namespace Zlgj\Controller;
class PatentTradeController extends ZlgjBaseController {
	public function _initialize(){
		parent::_initialize();
		parent::getDetailDate();
	}
	
	/* 列表页  */
	public function show($q='',$px='0',$lawst='0',$type='',$p='1'){
		if(session('user.id')){
			$data['member'] = M('Member')->where('id = '.session('user.id'))->find();
		}
		if($q==''){
			$arr = null;
		} else {
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
				$type = I('Fruit1');
			} else {
				if(I('Fruit2')){
					$type2 = I('Fruit2');
				}
				if(I('Fruit3')){
					$type3 = I('Fruit3');
				}
				if(I('Fruit4')){
					$type4 = I('Fruit4');
				}
				if(I('Fruit5')){
					$t5 = I('Fruit5');
				}
				if(I('Fruit6')){
					$t6 = I('Fruit6');
				}
				$type = $t2+$t3+$t4+$t5+$t6;
			}
			/* 火狐，谷歌，IE转码 */
			$zmq = iconv("GBK","utf-8",$q);
			$q = $zmq?$zmq:$q;
			$patent = new \Org\Patent\Patent($q,$p,'',$px,$lawst,$type);
			$arr = $patent->getArr();
			foreach ($arr as $key => $value){
				$arr[$key]['6'] = strip_tags($arr[$key]['6']);
				$arr[$key][10] = explode('/',$value[10]);
				$arr[$key][10][6] = $arr[$key][10][4].'/'.$arr[$key][10][5];
				if(stristr($arr[$key]['1'],'发明')){
					$arr[$key]['1'] = '发明';
				}elseif (stristr($arr[$key]['1'],'实用')){
					$arr[$key]['1'] = '实用';
				}elseif (stristr($arr[$key]['1'],'外观')){
					$arr[$key]['1'] = '外观';
				}elseif (stristr($data['arr'][$key]['1'],'中国台湾专利')){
					$data['arr'][$key]['1'] = '中国台湾';
				}elseif (stristr($data['arr'][$key]['1'],'香港特区')){
					$data['arr'][$key]['1'] = '中国香港';
				}
			}
			$patenttype = $patent->many();//检索结果的所有类型数量
			$count = $patent->count();//数量
			$protime = $patent->protime();//耗时时间
			$pagesize = 10;
			$newpage = new \Org\Util\ZlgjPage($count,$pagesize);//实例化分类页
			$page = $newpage->getPage();//数据分页
		}
		$title='专利检索';
		 
		/* 相关推荐  */
		$where['tmpa'] = '2';//专利
		$where['state'] = '1';//状态
		$where['count'] = array('egt','1');//数量
		$where['tmscreening1'] = '2';//市场页推荐
		$data['recommend'] = M('Item')->field('id,title,img')->where($where)->limit(4)->select();
		 
		/* 获取首页推荐每个分类的第一个专利信息 */
		$wh['tmpa'] = 2;
		$wh['state'] = 1;
		$wh['parentid'] = 0;
		$items = M('items')->where($wh)->order('sort DESC')->limit(4)->select();
		$item = M('item');
		$i = 0;
		foreach ($items as $row){
			$data['zl'][$i]['data'] = $row;
			$wh['groupid'] = $row['id'];
			$wh['tmscreening'] = 2;
			$data['zl'][$i]['array'] = $item->where($wh)->order('tmscreening desc,id asc')->limit(1)->select();
			$i++;
		}
		 
		$this->assign('type',$type);//数据类型
		$this->assign('data',$data);
		$this->assign('title',$title);
		$this->assign('patenttype',$patenttype);//检索结果类型
		$this->assign('count',$count);//检索结果总数
		$this->assign('htime',$protime);//检索结果耗时时间
		$this->assign('page',$page);//赋值分页输出
		$this->assign('q',$q);
		$this->assign('arr',$arr);
		$this->display();
	}
	
    public function detail(){
    	$getpath1 = I('path.2');
    	$getpath2 = I('path.3');
    	$this->getDetailDate($getpath1,$getpath2);
    	$title='专利详情';
    	$ptno=$getpath1;
    	/* 相关推荐  */
    	$where['tmpa'] = '2';//专利
    	$where['state'] = '1';//状态
    	$where['count'] = array('egt','1');//数量
    	$where['tmscreening1'] = '2';//市场页推荐
    	$data['recommend'] = M('Item')->field('id,title,img')->where($where)->limit(4)->select();
    	 
    	/* 获取首页推荐每个分类的第一个专利信息 */
    	$wh['tmpa'] = 2;
    	$wh['state'] = 1;
    	$wh['parentid'] = 0;
    	$items = M('items')->where($wh)->order('sort DESC')->limit(4)->select();
    	$item = M('item');
    	$i = 0;
    	foreach ($items as $row){
    		$data['zl'][$i]['data'] = $row;
    		$wh['groupid'] = $row['id'];
    		$wh['tmscreening'] = 2;
    		$data['zl'][$i]['array'] = $item->where($wh)->order('tmscreening desc,id asc')->limit(1)->select();
    		$i++;
    	}
    	
    	
    	$this->assign('data',$data);
    	$this->assign('ptno',$ptno);
    	$this->assign('title',$title);
    	$this->display();
    }
    
    /* 选中下载功能  */
    public function expOne(){
    	//读取所有对应的数据
    	$data[][0]=array('专利详情表','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
    	$data[][1]=array('专利类型','专利号','专利名','当前法律状态','优先权','申请日','发明/设计人','公开/公告号','公开/公告日','授权公告号','授权公告日','申请/专利权人','专利权人地址','国省代码','专利代理机构','主分类号','代理人','分类号','分案申请','范畴分类','颁证日','国际申请','国际公布','进入国家日期','摘要','主权项','法律状态','引证文献','同族专利','附图');
    	//$where['memberid'] = session('user.id');
    	$where['patentnum'] = I('ptno');
    	$data[] = M('patentHousekeeper')->field('type,patentnum,cname,legalstatus,priority,applydate,inventor,opennum,announcenum,authnum,authdate,patentee,patenteeaddr,provincecode,agency,mainclassnum,agent,subclassnum,divisionapply,cateclass,certified,internatapply,internatpublic,intodate,info,sovereignitem,legalstatusdetail,citingliterature,kinpatent,picture')->where($where)->find();
    	print_r(I('ptno'));die;
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
    			if($rows['1']=='专利类型'){
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
   
}