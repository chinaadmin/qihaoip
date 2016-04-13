<?php
namespace Zlgj\Controller;
class FileManageController extends ZlgjBaseController {
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
		$where['pic_isdel'] = '1';//文件未删除状态
		$data['count'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->where($where)->count();// 查询满足要求的总记录数
		if(session('pse',I('pse'))){
			$data['pagesize'] = session('pse',I('pse'));
		}else{
			$data['pagesize'] = 10;
		}
		$newpage = new \Org\Util\ZlgjPage($data['count'],$data['pagesize']);//实例化分类页
		if($data['count'] && $data['count'] > $data['pagesize']){
			$data['page'] = $newpage->getPage();//数据分页
		}
		$data['filemanage'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price')->where($where)->limit(($p-1)*$data['pagesize'],$data['pagesize'])->select();
		foreach ($data['filemanage'] as $key => $value){
			$condition['pmid'] = $value['pmid'];
			$data['filemanage'][$key]['pic'] = M('patentFile')->where($condition)->select();
			if($data['filemanage'][$key]['pic']){
				$data['filemanage'][$key]['picnum'] = count($data['filemanage'][$key]['pic']);
			}else {
				unset($data['filemanage'][$key]);
			}
		}
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/* 文件清单一键下载功能  */
	/* public function expAll(){
		//读取所有对应的数据
		$where['memberid'] = session('user.id');//用户id
		$where['status'] = '1';//已添加
		$where['keystatus'] = '2';//已监控
		$where['pic_isdel'] = '1';//文件未删除
		$data[][0]=array('文件清单表','','','','');
		$data[][1]=array("类型","专利号","专利名","权利人","文件总数");
		$data[] =  M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.type,h.patentnum,h.cname,h.patentee')->where($where)->select();
		foreach ($data[] as $key => $value){
			$condition['pmid'] = $value['pmid'];
			$data[][$key]['url'] = M('patentFile')->field('url')->where($condition)->select();
			if($data[][$key]['url']){
				$data[][$key]['picnum'] = count($data[][$key]['url']);
			}else {
				unset($data[][$key]['pic']);
			}
		}
		//print_r($data);die;
		//导入PHPExcel类库
		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Writer.Excel5");
		import("Org.Util.PHPExcel.IOFactory.php");
		$filename="test_excel";
		$this->getExcel($filename,$data);
	} */
	
	/* private function getExcel($fileName,$data){
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
	} */
	
	/* 文件清单的文件上传 */
	public function fileUpload(){
		$id = I('id');
		$rpic = R('Index/Upload/save_mfile',array('img'));
		if($rpic){
			$pic = explode(',', $rpic);
			rsort($pic);//以降序对数组排序
			$i='1';
			foreach ($pic as $key => $value){
				$da['pmid'] = I('mid');
				$da['name'] = '图片'.$i++;
				$da['url'] = $value;
				$result = M('patentFile')->add($da);
				if($result){
					$reid .= $result.',';
				}
			}
			/* 修改该专利的文件上传状态 */
			$where['id'] = I('mid');
			$dat['pic_isdel'] = '1';
			$state = M('patentMember')->where($where)->save($dat);
			/*查询与当前数据相关的文件图片信息 */
			$map['pmid'] = I('mid');
			$data = M('patentFile')->where($map)->select();
			foreach ($data as $key=>$value){
				$name .= $value['name'].',';
				$pmid .= $value['id'].',';
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
	/* 文件上传 修改文件上传功能 */
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
    		$msg.='
    			<div class="zltulistt wjtp'.$value['id'].'">
    			<img src="'.$value['url'].'"/>'.$value['name'].'
    			<div class="zldels" onClick="delPic('.$value['id'].')"><span rel="'.$value['id'].'">×</span></div>
    			</div>';
    	}
    	$str ='<div class="zltulistt "><div class="zltianjia"><a href="javascript:;" onClick="posts4('."'".$id."'".','."'".'posts4'.$id."'".');"><img src="/static/style/images/addzshu.jpg"/></a></div>上传证书 </div>';
    	$msg = $msg.$str;
    	echo $msg;
	}
	
	/* 文件上传删除功能 */
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
	
	/*文件清单 单个按钮删除功能  */
	public function delData(){
		$where['id'] = I('id') ;
		$where['memberid'] = session('user.id');
		$map['pic_isdel'] = '2';//文件删除状态
		$patentmember = M('patentMember')->where($where)->save($map);
		if($patentmember){
			echo "删除成功";
		} else {
			echo "删除失败";
		}
	}
	
    /* 文件清单 一键删除  */
    public function allDel(){
     /* 查询是否存在文件图片
      * 由于没有添加图片是否上传字段所有要先查询一遍图片表
      */
     $condition['memberid'] = session('user.id');
     $condition['pic_isdel'] = '1';//文件删除状态,
     $result = M('patentMember')->where($condition)->select();
     foreach ($result as $key => $value){
     	$wh['pmid'] = $value['id']; 
     	$pictrue = M('patentFile')->where($wh)->select();
     	if($pictrue){
     		$getid .= $value['id'].',';
     	}
     }
     $getid = substr($getid, 0, -1);
     /* 文件删除 */
     $whe['pmid'] = array('in',$getid);
     $delflie = M('patentFile')->where($whe)->delete();
     /* 更改状态  */
   	 $where['memberid'] = session('user.id');
   	 $where['id'] = array('in',$getid);
   	 $map['pic_isdel'] = '2';//文件删除状态,
   	 $alldel = M('patentMember')->where($where)->save($map);
   	 if($alldel){
   		$msg =  '成功删除'.$alldel.'件专利';
   	 }
   	 echo $msg;
    }
    
   /* 文件清单批量删除功能  */
   public function batchDel(){
   	$id = explode(',',I('id'));
   	foreach ($id as $key => $value){
   		$where['id'] = $value;
   		$where['memberid'] = session('user.id');
   		$map['pic_isdel'] = '2';//文件删除状态
   		$results = M('patentMember')->where($where)->save($map);
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