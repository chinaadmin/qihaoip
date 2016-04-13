<?php
namespace Index\Controller;
use Common\BaseController;

class AutoController extends BaseController {
	private $debugInfo;
    public function index(){
    	$this->show('请使用run方法启动自动同步功能','utf8');
    }
    
    public function main(){
    	set_time_limit(0);
    	session_write_close();
    	$order = new PayController();
    	$order->auto();//订单超期自动处理
    	$this->batch_auto();//批量上传自动处理
    	$this->renewalMsg();
    	$this->auto_trade();
    	$this->autoSellPA();//自动加入到专利市场中去
    	$this->autoNext();//专利管家计算下一年缴费功能
    	$this->autoPayment();//专利管家自动加入缴费清单功能
    	$this->runRemind();//专利管家邮件提醒功能
    }
    public function auto_trade(){
    	$item= M('item');
    	$data = M('user_trade')->where(array('trading_state'=>1))->select();
    	if($data){
    		foreach ($data as $key=>$value){
    			if($value['reg_id']){
    				$id = $value['reg_id'];
    			}else{
    				$id = ttmid($value['trade_id']);
    			}
    			$check = M('item')->where(array('tmno'=>$id,'userid'=>$value['user_id'],'state'=>array('neq',8)))->count();
    			if(!$check){
	    			$dir = UPLOAD_DIR.'Img/'.date('m').'/'.date('d');
	    			if(!is_dir('.'.$dir)){
	    				mkdir('.'.$dir,0777,true);
	    			}
	    			//$img_name = $dir.'/'.$value['reg_id'].'.jpg';
	    			/***
	    			$client = new \Org\Util\CloudsearchClient('osrrHZZJZ0vfji07', '6scd577yR3llzj8SzDOfbtipKSfjh9',array("host" => "http://opensearch.aliyuncs.com"), "aliyun");
	    			$search = new \Org\Util\CloudsearchSearch($client);
	    			$search->addIndex('tmserver');
	    			$search->setFormat('json');
	    			$opts = $value['reg_id']?array('query'=>'id:\''.$value['reg_id'].'\''):array('query'=>'id:\''.ttmid($value['trade_id']).'\'');
	    			$re = $search->search($opts);
	    			**/
	    			$qds = new \Common\Lib\Quands();
	    			$id = $value['reg_id']?$value['reg_id']:$value['trade_id'];
	    			$re = $qds->get($id);
	    			$re = json_decode($re,true);
	    			$row = $re['result']['items'][0];
	    			if($row){
		    			$add['title'] = $row['ftmchin']?$row['ftmchin']:($row['ftmeng']?$row['ftmeng']:($row['ftmpy']?$row['ftmpy']:$row['ftmjpm']));
		    			$add['groupid'] = array_search($row['fclass'],C('TYPE_CODE'));
		    			$add['tmno'] = $row['fid'];
		    			$add['master'] = $row['fsqr1'];
		    			$add['price'] = $value['price'];
		    			$add['tmregdate'] = $row['fsqdate'];
		    			$add['tmregstart'] = $row['fzcdate'];
		    			$add['tmregend'] = $row['fjzdate'];
		    			$add['tmtradeway'] = '1';
		    			$add['tmlimit'] = $row['fsysp'].$row['fspzb'];
		    			$add['tmregarea'] = $row['ftmtypeid']=='0'?'1':'3';
		    			$add['introduce'] = '';
		    			$add['tmscreening3'] = '1';
		    			$add['img'] =$value['img']?$value['img']:'/Trade/GnTrade/tmimg/id/'.$row['ftmid'].'/class/'.$row['fclass'].'.html';
		    			$add['tmpa'] = 1;
		    			$add['state'] = 2;
		    			$add['userid'] = $value['user_id'];
		    			$add['aid'] = M('member')->field('aid')->where(array('id'=>$value['user_id']))->find()['aid'];;
		    			$add['adddate'] = date('Ymd');
		    			$add['addtime'] = time();
		    			$add['edittime'] = time();
		    			$add['tmcontent'] = $add['tmlimit'];
		    			$re = M('item')->add($add);
		    			 if($re){
		    			 	M('user_trade')->where(array('trade_id'=>$value['trade_id']))->save(array('trading_state'=>2));
		    				//file_put_contents('.'.$img_name, file_get_contents('http://sbcx.saic.gov.cn:9080/tmois/wszhcx_getImageInputSterem.xhtml?regNum='.$value['reg_id'].'&intcls=1'));
		    			} 
	    			}else{
	    				$add['title'] = $value['trade_name'];
	    				$add['groupid'] = $value['trade_class_id'];
	    				$add['tmno'] = $value['reg_id'];
	    				$add['master'] = $value['trade_user'];
	    				$add['price'] = $value['price'];
	    				$add['tmregdate'] = date('Y-m-d',$value['sq_date']);
	    				$add['tmregstart'] = date('Y-m-d',$value['zc_date']);
	    				$add['tmregend'] = date('Y-m-d',$value['zd_date']);
	    				$add['tmtradeway'] = '1';
	    				$add['tmlimit'] = $value['service'];
	    				$add['tmregarea'] = $value['type'];
	    				$add['introduce'] = '';
	    				$add['tmscreening3'] = '1';
	    				$add['img'] = $value['img']?$value['img']:'/Trade/GnTrade/tmimg/id/'.$row['ftmid'].'/class/'.$row['fclass'].'.html';
	    				$add['tmpa'] = 1;
	    				$add['state'] = 2;
	    				$add['userid'] = $value['user_id'];
	    				$add['aid'] = M('member')->field('aid')->where(array('id'=>$value['user_id']))->find()['aid'];;
	    				$add['adddate'] = date('Ymd');
	    				$add['addtime'] = time();
	    				$add['edittime'] = time();
	    				$add['tmcontent'] = $add['tmlimit'];
	    				$re = M('item')->add($add);
	    				if($re){
	    					M('user_trade')->where(array('reg_id'=>$value['reg_id']))->save(array('trading_state'=>2));
	    					//file_put_contents('.'.$img_name, file_get_contents('http://sbcx.saic.gov.cn:9080/tmois/wszhcx_getImageInputSterem.xhtml?regNum='.$value['reg_id'].'&intcls=1'));
	    				}
	    			}
    			}else{
    				if($value['trade_id']){
    					M('user_trade')->where(array('trade_id'=>$value['trade_id']))->save(array('trading_state'=>'0'));
    				}else{
    					M('user_trade')->where(array('reg_id'=>$value['reg_id']))->save(array('trading_state'=>'0'));
    				}
    				 
    			}
    		}
    	}
    }
    
    public function batch_auto(){
    	$batch = M('batch');
    	$where['state'] = '1';
    	$where['type'] = '1';//仅处理商标11111
    	$re = $batch->field('*,(select aid from qh_member where qh_member.id = qh_batch.memberid)')->where($where)->select();
    	if($re){
    		foreach ($re as $batch_row){
    			$this->batch_tmpa($batch_row);
    		}
    	} 
    	
    	$map['state'] = '1';
    	$map['type'] = '2';//仅处理专利22222
    	$result = $batch->field('*,(select aid from qh_member where qh_member.id = qh_batch.memberid)')->where($map)->select();
    	if($result){
    		foreach ($result as $batch_pa){
    			$this->batch_tmpa($batch_pa);
    		}
    	}
    }
    
    public function batch_tmpa($batch_row){
    	$log_file_name = '.'.substr($batch_row['filename'], 0,-3).'csv';//日志文件
    	$data = $this->read_excel('.'.$batch_row['filename']);
		foreach ($data as $key => $value){
			if($value['0']){
				$count += 1;//统计数量
			}
		}
    	$batch = M('batch');
    	if(is_array($data) && $count){
    		if($count > '1001'){
    			$update['nums'] = $count;
    			$update['success'] = '0';
    			$update['failed'] = '0';
    			$update['state'] = '3';
    			$update['endtime'] = time();
    			$batch->where($where)->save($update);
    			return file_put_contents($log_file_name, '操作失败，每个excel文件不超过1000行！'.PHP_EOL);
    		}
    		$where['id'] = $batch_row['id'];
    		if($batch_row['type']=='1'){//商标
    			file_put_contents($log_file_name, '商标注册号（必填）,价格（元）（可不填，如不填则为“面议”）,卖点（可不填，用于显示商品卖点）,处理结果,商品链接'.PHP_EOL);
//     			$client = new \Org\Util\CloudsearchClient('osrrHZZJZ0vfji07', '6scd577yR3llzj8SzDOfbtipKSfjh9',array("host" => "http://opensearch.aliyuncs.com"), "aliyun");
//     			$search = new \Org\Util\CloudsearchSearch($client);
//     			$search->addIndex('tmserver');
//     			$search->setFormat('json');
//     			$search->setHits('5');
    			
    			$update['nums'] = $count;
    			$update['state'] = '2';
    			$update['success'] = '0';
    			$update['failed'] = '0';
    			$batch->where($where)->save($update);//更改状态
    			foreach ($data as $k=>$row){
    				$row1 = array();
//     				$opts = array('query'=>'id:\''.$row[0].'\'');
//     				$re = $search->search($opts);

    				$qds = new \Common\Lib\Quands();
    				$re = $qds->get($row[0]);
    				$re = json_decode($re,true);
    				if(isset($re['status']) && $re['status']=='OK'){
    					if(is_array($re['result']['items']) && count($re['result']['items'])){//
    						foreach ($re['result']['items'] as $v){
    							if($v['fid']==$row[0]){//成功
    								$row1 = $v;
    							}
    						}
    					}
    				}
    				if(!empty($row1)){//找到数据
    					
//     					$dir = UPLOAD_DIR.'Img/'.date('m').'/'.date('d');
//     					if(!is_dir('.'.$dir)){
//     						mkdir('.'.$dir,0777,true);
//     					}
//     					$img_name = $dir.'/'.$row[0].'.jpg';
						$img_name = 'http://www.qihaoip.com/Trade/GnTrade/tmimg/id/'.$row1['ftmid'].'/class/'.$row1['fclass'].'.html';
    					if(strstr($row[1], 'W') || strstr($row[1], 'w') || strstr($row[1], '万')){
    						$row[1] = ($row[1]+0)*10000;
    					} else {
    						$row[1] = $row[1]+0;
    					}
    					$itemid = false;
    					if(isset($row1['fid'])){
    						try{
    							
    							$itemid = $this->add_tm($row1, $batch_row['memberid'], $img_name, $row[1], $batch_row['(select aid from qh_member where qh_member.id = qh_batch.memberid)'], $row[2]);
    						} catch (Exception $e){
    							
    						}
    					} else {
    						
    					}
    					if($itemid){
    						//file_put_contents('.'.$img_name, file_get_contents('http://sbcx.saic.gov.cn:9080/tmois/wszhcx_getImageInputSterem.xhtml?regNum='.$row[0].'&intcls=1'));
    						$batch->where($where)->setInc('success',1);
    						file_put_contents($log_file_name, $row[0].','.$row[1].','.$row[2].',成功,http://www.qihaoip.com/trademark/'.$itemid.'.html'.PHP_EOL,FILE_APPEND);
    					} else {
    						$batch->where($where)->setInc('failed',1);
    						file_put_contents($log_file_name, $row[0].','.$row[1].','.$row[2].','.$this->debugInfo.',无'.PHP_EOL,FILE_APPEND);
    					}
    				} else {//未找到数据
    					$batch->where($where)->setInc('failed',1);
    					file_put_contents($log_file_name, $row[0].','.$row[1].','.$row[2].',找不到此商标请检查注册号是否正确，或手动发布此商标,无'.PHP_EOL,FILE_APPEND);
    				}
    			}
    			unset($update);
    			$update['nums'] = $count;
    			$update['state'] = '3';
    			$update['endtime'] = time();
    			$batch->where($where)->save($update);
    		} else if($batch_row['type']=='2'){//专利
    			file_put_contents($log_file_name, '专利申请号（必填）,价格（元）（可不填，如不填则为“面议”）,卖点（可不填，用于显示商品卖点）,处理结果,商品链接'.PHP_EOL);
    			$update['nums'] = $count;
    			$update['state'] = '2';
    			$update['success'] = '0';
    			$update['failed'] = '0';
    			$batch->where($where)->save($update);//更改状态 
    		foreach ($data as $k=>$row){
    			$row['0'] = str_replace(' ','',$row['0']);//去掉字符串空格
    			if($row['0']){
    				//替换CN,ZL
    				if(strstr($row['0'], 'CN') || strstr($row['0'], 'cn')){
    					$row['0'] = str_replace("cn","CN",$row['0']);
    				}elseif (strstr($row['0'], 'zl')){
    					$row['0'] = str_replace("zl","CN",$row['0']);
    			 	}elseif (strstr($row['0'], 'ZL')){
    			 		$row['0'] = str_replace("ZL","CN",$row['0']);
    				}else{
    					$row['0'] = 'CN'.$row['0'];
    				}
    				//给字符串最后一位字符串前面加点
    				if(!strstr($row['0'],'.')){
    					$sub = '.'.substr($row['0'],-1);
    					$row['0'] = substr_replace($row['0'],$sub,-1);
    				}
    				//获取专利申请号和页数
    				$pa = new \Org\Patent\Patent($row['0']);
    				$panum = $pa->getArr();
    				//判断是否在佰腾网获取到数据
	    			if(!empty($panum)){
	    				if(empty($panum['1'])){
		    				//通过专利申请号和页数，获取专利详情数据
		    				$padetail = new \Index\Controller\IndexBaseController();
		    				$get_detail = $padetail->get_baiten($panum['0']['4'], $panum['0']['5']);
		    				//获取图片地址
		    				$img_url = $this->get_paimg($panum['0']['0']);
		    				if(strstr($row[1], 'W') || strstr($row[1], 'w') || strstr($row[1], '万')){
		    					$row[1] = ($row[1]+0)*10000;
		    				} else {
		    					$row[1] = $row[1]+0;
		    				}
		    				$itemid = false;
		    				if(isset($get_detail['type'])){
		    					try{
		    						$itemid = $this->add_pa($get_detail, $batch_row['memberid'], $img_url, $row[1], $batch_row['(select aid from qh_member where qh_member.id = qh_batch.memberid)'], $row[2]);
		    					} catch (Exception $e){
		    						
		    					}
		    				} else {
		    					$this->debugInfo = '没有获取到该专利号的详细信息。';
		    				}
	    				}else {
	    					$itemid = '';
	    					$panum = '';
	    					$this->debugInfo = '该专利号查询的结果不唯一。';
	    				}
	    			}else {
	    				$itemid = '';
	    				$panum = '';
	    				$this->debugInfo = '该专利号数据不存在.';
	    			}
	    			if($itemid){
	    				$batch->where($where)->setInc('success',1);
	    				file_put_contents($log_file_name, $row[0].','.$row[1].','.$row[2].',成功,http://www.qihaoip.com/patent/'.$itemid.'.html'.PHP_EOL,FILE_APPEND);
	    			} else {
	    				$batch->where($where)->setInc('failed',1);
	    				file_put_contents($log_file_name, $row[0].','.$row[1].','.$row[2].','.$this->debugInfo.',无'.PHP_EOL,FILE_APPEND);
	    			}
    			}/*  else {//未找到数据
    					$batch->where($where)->setInc('failed',1);
    					file_put_contents($log_file_name, $row[0].','.$row[1].','.$row[2].',找不到此专利请检查申请号是否正确，或手动发布此专利,无'.PHP_EOL,FILE_APPEND);
    			} */
    		 }
    	   }
    		unset($update);
    		$update['nums'] = $count;
    		$update['state'] = '3';
    		$update['endtime'] = time();
    		$batch->where($where)->save($update);
    	} else {
    		$update['nums'] = '0';
    		$update['success'] = '0';
    		$update['failed'] = '0';
    		$update['state'] = '3';
    		$update['endtime'] = time();
    		$batch->where($where)->save($update);
    		return file_put_contents($log_file_name, '操作失败，读取excel文件失败，请检查文件格式并重新上传！'.PHP_EOL);
    	}
    }
    
    /**
     * 获取佰腾网的专利数据图片
     */
   private function get_paimg($url){
	   	$dir = UPLOAD_DIR.'Img/'.date('m').'/'.date('Y-m-d');
	   	$filename = $dir.'/'.date('his').rand('1111', '9999').'.jpg';
	   	$dir = '.'.$dir;
	   	if(!is_dir($dir)){//如果目录不存在
	   		mkdir($dir,0777,true);
	   	}
	   	$sell = new \Org\Trade\Trade();
	   	//$img_data = $sell->query($remsg['img']);//把专利图片抓取到本地
	   	$img_data = $sell->query($url);//把专利图片抓取到本地
	   	$result = file_put_contents('.'.$filename, $img_data);//把图片保存到指定的文件夹下面
	   	if($result){
	   		$restr .= '图片上传成功!';
	   		$img = $filename;
	   	}else{
	   		$restr .= $result.'=>上传图片失败';
	   		$img = '/Upload/Img/11/23/0603189137.jpg';
	   	}
	   
	 	return $img;
   }
    
    /**
     * 
     * @param 商标信息 $row
     * @param 用户id $userid
     * @param 图片地址 $img_name
     * @param 价钱 $price
     * @param 经纪人 $aid
     * @param 卖点 $introduce
     */
    private function add_tm($row,$userid,$img_name,$price,$aid,$introduce){
    	$tm = M('item');
    	$nums = $tm->where(array('tmno'=>$row['fid'],'userid'=>$userid))->count();
    	if($nums){
    		$this->debugInfo = '该商标已经上传，请勿重复上传！';
    		return false;
    	}
    	$add['title'] = $row['ftmchin']?$row['ftmchin']:($row['ftmeng']?$row['ftmeng']:($row['ftmpy']?$row['ftmpy']:$row['ftmjpm']));
    	$add['groupid'] = array_search($row['fclass'],C('TYPE_CODE'));
    	$add['tmno'] = $row['fid'];
    	$add['master'] = $row['fsqr1'];
    	$add['price'] = $price;
    	$add['tmregdate'] = $row['fsqdate'];
    	$add['tmregstart'] = $row['fzcdate'];
    	$add['tmregend'] = $row['fjzdate'];
    	$add['tmtradeway'] = '1';
    	$add['tmlimit'] = $row['fsysp'].$row['fspzb'];
    	$add['tmregarea'] = $row['ftmtypeid']=='0'?'1':'3';
    	$add['introduce'] = $introduce;
    	$add['tmscreening3'] = '1';
    	$add['img'] = $img_name;
    	$add['tmpa'] = 1;
    	$add['state'] = 2;
    	$add['userid'] = $userid;
    	$add['aid'] = $aid;
    	$add['adddate'] = date('Ymd');
    	$add['addtime'] = time();
    	$add['edittime'] = time();
    	$add['tmcontent'] = $add['tmlimit'];
    	$re = M('item')->add($add);
    	if($re){
    		return $re;
    	} else {
    		$this->debugInfo = M('item')->getDbError();
    		return false;
    	}
    }
    
    private function add_pa($row,$userid,$img_name,$price,$aid,$introduce){
    	$tm = M('item');
    	$nums  = $tm->where(array('tmno'=>$row['patentnum'],'userid'=>$userid))->count();
    	if($nums){
    		$this->debugInfo = '该专利已经上传，请勿重复上传！';
    		return false;
    	}
    	$add['title'] = $row['cname'];
    	$add['tmno'] = $row['patentnum'];
    	$add['groupid'] = '83';
    	$add['master'] = implode('、',$row['patentee']);//专利权人
    	$add['price'] = $price;
    	$add['tmregdate'] = date('Y-m-d',$row['applydate']);//申请日
    	$add['tmregstart'] = date('Y-m-d',$row['announcenum']);//公开/公告日
    	$add['tmtradeway'] = '1';
    	$add['introduce'] = $row['info'];//专利类型(发明，实用，外观)
    	$add['tmtype'] = $row['type'];
    	$add['tmregarea'] = '1';
    	$add['introduce'] = $row['info'];
    	$add['tmscreening3'] = '1';
    	$add['img'] = $img_name;
    	$add['tmpa'] = '2';
    	$add['state'] = '2';
    	$add['userid'] = $userid;
    	$add['aid'] = $aid;
    	$add['adddate'] = date('Ymd');
    	$add['addtime'] = time();
    	$add['edittime'] = time();
    	//$add['tmcontent'] = $row['info'];
    	$re = $tm->add($add);
    	if($re){
    		return $re;
    	} else {
    		$this->debugInfo = M('item')->getDbError();
    		return false;
    	}
    }
    
    public function test(){
    	header("Content-type: text/html; charset=utf-8");
    	echo array_search('24',C('TYPE_CODE'));
    }
    private function read_excel($filename){
    	$data = array();
    	import("Org.Util.PHPExcel");
    	$Excel=new \PHPExcel();
    	import("Org.Util.PHPExcel.Reader.Excel2007");
    	$PHPReader = new \PHPExcel_Reader_Excel2007();
    	if(!$PHPReader->canRead($filename)){
    		import("Org.Util.PHPExcel.Reader.Excel2005");
    		$PHPReader = new \PHPExcel_Reader_Excel5();
    		if(!$PHPReader->canRead($filename)){
    			return $data;
    		}
    	}
    	$PHPExcel = $PHPReader->load($filename);
    	$currentSheet = $PHPExcel->getSheet(0);/**读取excel文件中的第一个工作表*/
    	$allColumn = $currentSheet->getHighestColumn();/**取得最大的列号*/
    	$lines = $currentSheet->getHighestRow();/**取得一共有多少行*/
    	for($y = 2;$y <= $lines;$y++){/**从第二行开始输出，因为excel表中第一行为列名*/
    		for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){/**从第A列开始输出*/
    			$x = ord($currentColumn) - 65;/**ord()将字符转为十进制数*/
    			$val = $currentSheet->getCellByColumnAndRow($x,$y)->getValue();
    			$data[$y][$x] = $val;
    		}
    	}
    	return $data;
    }
    
    public function renewalMsg(){
    	$m = M('user_trade');
    	if(date('L',time()+31536000)==1){
    		$ymd = time()+31622400;
    	}else{
    		$ymd = time()+31536000;
    	}
    	$time_where = strtotime(date("Y-m-d",strtotime("-6 month")));
    	$where['zd_date'] = array(array('elt',$ymd),array('gt',1),array('gt',$time_where));
    	$where['trade_dynamic_state'] = array(array('eq','102'),array('eq','105'),'or');
    	$user_data = $m->field('qh_user_trade.user_id,qh_member.username,qh_member.name,qh_member.email,qh_member.mobile,qh_member.aid as parend_id')->join('left join qh_member on qh_user_trade.user_id = qh_member.id','LEFT')->group('user_id')->where($where)->select();
    
    	if($user_data){
    		foreach($user_data as $key=>$val){
    
    			$where['user_id'] = $val['user_id'];
    			//$user_trade_data = $m->field('qh_user_trade.id,qh_user_trade.uid,qh_user_trade.trade_name,qh_user_trade.user_id,qh_user_trade.trade_id,qh_user_trade.trade_class_id,qh_user_trade.trade_user,qh_user_trade.type,qh_user_trade.combination_state,qh_user_trade.state,qh_user_trade.zd_date,qh_user_trade.trade_dynamic_state,qh_user.username,qh_user.email,qh_user.email_msg,qh_user.mobile_phone,qh_user.mobile_phone_msg')->join('left join qh_user on qh_user_trade.user_id = qh_user.id','LEFT')->where($where)->select();
    			$user_trade_data = $m->where($where)->select();
    			$i0=0;$i1=0;$i2=0;$i3=0;$i4=0;
    			foreach($user_trade_data as $k =>$v){
    				if( strtotime(date("Y-m-d",strtotime("+12 month")))>=$v["zd_date"] && $v["email_msg_state"]=="0"){
    					$i0++;
    				}
    				if( strtotime(date("Y-m-d",strtotime("+6 month")))>=$v["zd_date"] && $v["email_msg_state"]=="1"){
    					$i1++;
    				}
    				if( strtotime(date("Y-m-d",strtotime("+1 month")))>=$v["zd_date"] && $v["email_msg_state"]=="2"){
    					$i2++;
    				}
    				if( time()>=$v["zd_date"] && $v["email_msg_state"]=="3"){
    					$i3++;
    				}
    				if(strtotime(date("Y-m-d",strtotime("-1 month")))>=$v['zd_date'] && $v["email_msg_state"]=="4"){
    					$i4++;
    				}
    			}
    			$total = $i0+$i1+$i2+$i3+$i4;
    			if($total>0){
    					
    				$conttent = '<table width="700" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;margin:0 auto; border:1px solid #dedede; font-size:13px; line-height:24px; font-family:microsoft yahei, Arial, Helvetica, sans-serif;">
  <tr>
    <td style="background-color:#ff6600; padding:5px 20px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网">7号网提醒商标续展</a></td>
  </tr>
    
  <tr>
    <td style="padding:50px 50px 30px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;">
          <tr>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网商标">商标</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网专利">专利</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">资讯</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">案例</a></td>
          </tr>
          <tr>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/trademark/" target="_blank" title="7号网商标交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com//member/nologin.php?act=tm" target="_blank" title="7号网商标管家">管家</a>
            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利管家">管家</a>
    
            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">热门</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">最新</a>
             </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">商标</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">专利</a>
            </td>
          </tr>
          <tr>
          	<td colspan="7" style="border-bottom:1px solid #ff6600; padding:30px 0; text-align:center;"><a style="color:#000000; text-decoration:none; font-size:18px;" href="http://www.qihaoip.com/" target="_blank" title="更多精彩尽在7号网">更多精彩尽在7号网...</a></td>
          </tr>
        </table>
    </td>
  </tr>
    
  <tr>
    <td style="padding:20px 40px 0; font-size:20px;">尊敬的7号网用户&nbsp;<span style="color:#ff6600;">'.$val["username"].'</span>：</td>
  </tr>
    
  <tr>
    <td  style="padding:40px 40px 20px;">7号网提醒您，最近您有'.$total.'件商标需续展，请您及时续展哦！</td>
  </tr>
    
  <tr>
    <td  style="padding:0 40px 10px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;line-height:35px; border-top:1px solid #dedede; border-left:1px solid #dedede;">
			<tr style="">
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">注册号</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">商标名称</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">截止日期</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">应办理续展时间</td>
          </tr>';
    				foreach ($user_trade_data as $k=>$v){
    					if( strtotime(date("Y-m-d",strtotime("+12 month")))>=$v["zd_date"] && $v["email_msg_state"]=="0"){
    						$conttent.=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前12个月</td>
									          </tr>';
    
    						$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'1'));
    					}
    					if( strtotime(date("Y-m-d",strtotime("+6 month")))>=$v["zd_date"] && $v["email_msg_state"]=="1"){
    						$conttent .=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前6个月</td>
									          </tr>';
    						$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'2'));
    					}
    					if( strtotime(date("Y-m-d",strtotime("+1 month")))>=$v["zd_date"] && $v["email_msg_state"]=="2"){
    						$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前1个月</td>
									          </tr>';
    						$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'3'));
    					}
    					if( time()>=$v["zd_date"] && $v["email_msg_state"]=="3"){
    						$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">今日到期</td>
									          </tr>';
    						$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'4'));
    					}
    					if(strtotime(date("Y-m-d",strtotime("-1 month")))>=$v['zd_date'] && $v["email_msg_state"]=="4"){
    						$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'后6个月</td>
									          </tr>';
    						$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'5'));
    					}
    						
    				}
    				$conttent .=' </table>
									    </td>
									  </tr>
						
									  <tr>
									    <td  style="padding:0 40px 50px; text-align:right;">以上信息仅供参考，实时信息以商标网公布为准。</td>
									  </tr>
						
									   <tr>
									    <td  style="padding:0 40px 20px;">
									    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
									          <tr>
									            <td><img width="110" src="http://www.qihaoip.com/skin/default/style/themes/v4/m/wap.png" alt="7号网微信号：qh7hip" /></td>
									            <td style="line-height:35px; font-size:14px;">如需帮助，请联系您的专属经纪人或拨打热线：<span style="color:#ff6600; font-size:18px;">400-889-7080</span><br />
									            7号网微信号：<span style="color:#ff6600; font-size:18px;">qh7hip</span><br />
									            感谢您对7号网的信任与支持！<br />
									            </td>
									          </tr>
									        </table>
									    </td>
									  </tr>
						
									    <tr>
									    	<td  style="padding:0 40px 30px; text-align:right;">7号网&nbsp;&nbsp;敬上</td>
									  	</tr>
							
									     <tr>
									    	<td  style="padding:20px 40px; text-align:center; background:#ff6600; color:#ffffff;">联系QQ：21556911&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;服务热线：400-889-7080<br />地址：深圳市南山区南山大道3838号深圳设计产业园金栋308-312、210-212</td>
									  	</tr>
									</table>';
    				$this->sendEmail($val['email'],'七号网商标管家商标续展',$conttent);
    				//发送经纪人邮件
    				if($val['parent_id']){
    					$this->sendParent($val,$user_trade_data,$total);
    				}
    			}
    		}
    	}
    }
    
    private function sendParent($val,$user_trade_data,$total){
    	$m = M('user_trade');
    	$user = M('User');
    	$user_data = $user->where(array('id'=>$val['parent_id']))->find();
    	$data_parent = '该客户邮箱：'.$val['email'];
    	if($val['mobile_phone']){
    		$data_parent .= '，电话：'.$val['mobile_phone'];
    	}
    	$conttent = '<table width="700" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;margin:0 auto; border:1px solid #dedede; font-size:13px; line-height:24px; font-family:microsoft yahei, Arial, Helvetica, sans-serif;">
  <tr>
    <td style="background-color:#ff6600; padding:5px 20px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网">7号网提醒商标续展</a></td>
  </tr>
    
  <tr>
    <td style="padding:50px 50px 30px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;">
          <tr>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网商标">商标</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网专利">专利</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">资讯</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">案例</a></td>
          </tr>
          <tr>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/trademark/" target="_blank" title="7号网商标交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com//member/nologin.php?act=tm" target="_blank" title="7号网商标管家">管家</a>
            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利管家">管家</a>
    
            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">热门</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">最新</a>
             </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">商标</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">专利</a>
            </td>
          </tr>
          <tr>
          	<td colspan="7" style="border-bottom:1px solid #ff6600; padding:30px 0; text-align:center;"><a style="color:#000000; text-decoration:none; font-size:18px;" href="http://www.qihaoip.com/" target="_blank" title="更多精彩尽在7号网">更多精彩尽在7号网...</a></td>
          </tr>
        </table>
    </td>
  </tr>
    
  <tr>
    <td style="padding:20px 40px 0; font-size:20px;">尊敬的7号网用户&nbsp;<span style="color:#ff6600;">'.$user_data["username"].'</span>：</td>
  </tr>
    
  <tr>
    <td  style="padding:40px 40px 20px;">7号网提醒您，最近您的客户'.$val['username'].'，有'.$total.'件专利需缴费，请您及时通知哦！<br>
    		 '.$data_parent.'
    		</td>
  </tr>
    
  <tr>
    <td  style="padding:0 40px 10px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;line-height:35px; border-top:1px solid #dedede; border-left:1px solid #dedede;">
			<tr style="">
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">注册号</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">商标名称</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">截止日期</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">应办理续展时间</td>
          </tr>';
    	foreach ($user_trade_data as $k=>$v){
    		if( strtotime(date("Y-m-d",strtotime("+12 month")))>=$v["zd_date"] && $v["email_msg_state"]=="0"){
    			$conttent.=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前12个月</td>
									          </tr>';
    
    			$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'1'));
    		}
    		if( strtotime(date("Y-m-d",strtotime("+6 month")))>=$v["zd_date"] && $v["email_msg_state"]=="1"){
    			$conttent .=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前6个月</td>
									          </tr>';
    			$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'2'));
    		}
    		if( strtotime(date("Y-m-d",strtotime("+1 month")))>=$v["zd_date"] && $v["email_msg_state"]=="2"){
    			$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前1个月</td>
									          </tr>';
    			$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'3'));
    		}
    		if( time()>=$v["zd_date"] && $v["email_msg_state"]=="3"){
    			$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">今日到期</td>
									          </tr>';
    			$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'4'));
    		}
    		if(strtotime(date("Y-m-d",strtotime("-1 month")))>=$v['zd_date'] && $v["email_msg_state"]=="4"){
    			$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'后6个月</td>
									          </tr>';
    			$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'5'));
    		}
    
    	}
    	$conttent .=' </table>
									    </td>
									  </tr>
    
									  <tr>
									    <td  style="padding:0 40px 50px; text-align:right;">以上信息仅供参考，实时信息以商标网公布为准。</td>
									  </tr>
    
									   <tr>
									    <td  style="padding:0 40px 20px;">
									    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
									          <tr>
									            <td><img width="110" src="http://www.qihaoip.com/skin/default/style/themes/v4/m/wap.png" alt="7号网微信号：qh7hip" /></td>
									            <td style="line-height:35px; font-size:14px;">如需帮助，请联系您的专属经纪人或拨打热线：<span style="color:#ff6600; font-size:18px;">400-889-7080</span><br />
									            7号网微信号：<span style="color:#ff6600; font-size:18px;">qh7hip</span><br />
									            感谢您对7号网的信任与支持！<br />
									            </td>
									          </tr>
									        </table>
									    </td>
									  </tr>
    
									    <tr>
									    	<td  style="padding:0 40px 30px; text-align:right;">7号网&nbsp;&nbsp;敬上</td>
									  	</tr>
				
									     <tr>
									    	<td  style="padding:20px 40px; text-align:center; background:#ff6600; color:#ffffff;">联系QQ：21556911&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;服务热线：400-889-7080<br />地址：深圳市南山区南山大道3838号深圳设计产业园金栋308-312、210-212</td>
									  	</tr>
									</table>';
    	$this->sendEmail($user_data['email'],'七号网商标管家商标续展',$conttent);
    
    }
    
    /*自动加入用户买家中心去*/
    public function autoSellPA(){
    	$where['salestatus'] = '3';
    	$m = M('patentMember');
    	$item = M('Item');
    	$arr = M('patentHousekeeper h')->join('left join qh_patent_member p ON p.applynum = h.patentnum')->field('p.id as pmid,p.memberid,p.applynum,p.salestatus,p.trade_price,h.userid,h.type,h.cname,h.zlpage,h.patentnum,h.applydate,h.opennum,h.announcenum,h.authnum,h.authdate,h.inventor,h.patentee,h.patenteeaddr,h.mainclassnum,h.subclassnum,h.priority,h.divisionapply,h.picture,h.agency,h.agent,h.info,h.sovereignitem,h.added,h.legalstatus,h.legalstatusdetail,h.citingliterature,h.kinpatent')->where($where)->select();
    	foreach ($arr as $key => $value){
    		$map['tmpa'] = '2';//专利
    		$map['userid'] = $value['memberid'];//用户id
    		$map['tmno'] = $value['applynum'];//专利号
    		$goods = $item->where($map)->find();
    		if($goods){
    			$wh['id'] = $value['pmid'];
    			$m->where($wh)->save(['salestatus'=>'9']);
    			$restr .= $value['applynum'].'已重复'.$goods['id'];
    		}else {
    			if($value['userid']&&strrchr($value['picture'],'.')){
    				$img = $value['picture'];
    			}else{
	    			//$pa = new \Org\Patent\Picture($value['applynum'],$value['zlpage']);
	    			//$remsg = $pa->getIMG();//获取到的专利信息
	    			$dir = UPLOAD_DIR.'Img/'.date('m').'/'.date('Y-m-d');
	    			$filename = $dir.'/'.date('his').rand('1111', '9999').'.jpg';
	    			$dir = '.'.$dir;
	    			if(!is_dir($dir)){//如果目录不存在
	    				mkdir($dir,0777,true);
	    			}
	    			$sell = new \Org\Trade\Trade();
	    			//$img_data = $sell->query($remsg['img']);//把专利图片抓取到本地
	    			$img_data = $sell->query($value['picture']);//把专利图片抓取到本地
	    			$result = file_put_contents('.'.$filename, $img_data);//把图片保存到指定的文件夹下面
	    			if($result){
	    					$restr .= '图片上传成功!';
	    					$img = $filename;
	    			}else{
	    					$restr .= $result.'=>上传图片失败';
	    					$img = '/Upload/Img/11/23/0603189137.jpg';
	    			}
	    		}
    			$condition['id'] = $value['memberid'];
    			$username = M('Member')->field('aid')->where($condition)->find();
    			$data['tmpa'] = '2';
    			$data['groupid'] = '83';
    			$data['title'] = $value['cname'];
    			$data['price'] = $value['trade_price'];
    			$data['views'] = '105';
    			$data['state'] = '2';
    			$data['img'] = $img;
    			$data['userid'] = $value['memberid'];
    			$data['aid'] = $username['aid'];
    			$data['adddate'] = date('Ymd',time());
    			$data['addtime'] = time();
    			$data['edittime'] = time();
    			$data['tmno'] = $value['applynum'];
    			$data['master'] = $value['patentee'];
    			$data['mastertype'] = '2';//权利人类型
    			$data['tmtype'] = $value['type'];//所属类型/类别
    			$data['tmregdate'] = date('Y-m-d',$value['applydate']);//申请日
    			$data['tmcontent'] = $value['info'];//专利摘要
    			$wh['userid'] = $value['memberid'];
    			$item = M('Item')->where($wh)->add($data);
    			//判断是否成功
    			if($item){
    				$restr .= '发布成功';
    				$m->where(['id'=>$value['pmid']])->save(['salestatus'=>'4']);
    			} else {
    				$restr .= '发布失败';
    				$restr .= $item;
    			}
    		}
    	}
    }
    
    /*程序自动计算下一年缴费记录*/
    public function autoNext(){
    	$where['annual_state'] = '2';//已付款
    	$where['_logic'] = 'OR';
    	$where['process_state'] = '2';//用户手动处理
    	$data['mypatentdb'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.memberid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price,p.pic_isdel,p.latetime,p.process_state,p.annual_state')->where($where)->select();
    	//echo M('patentHousekeeper h')->getLastSql();
    	foreach ($data['mypatentdb'] as $key => $value){
    		$nextyear = (date('Y',$value['should'])+1).'-'.date('m-d',$value['should']);
    		$yearnum = $value['annual']+1;//缴费第几年度
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
    		$feel = patent_fee(date("Y-m-d",$value['applydate']),$value['type'],0,$slow,date("Y-m-d",$value['authdate']),'',$nextyear,$yearnum);
    		if( $feel['dateyet'] >= '-180' AND -$feel['dateyet'] <= '180'){
    			$status = '1';//修改状态，加入缴费清单
    		}else {
    			$status = '0';//修改状态，未缴费状态
    		}
    		$map['applynum'] = $value['patentnum'];
    		$map['memberid'] = $value['memberid'];
    		$da['annual'] = $yearnum;//更新缴费年度
    		$da['annual_state'] = $status;//更新缴费清单状态
    		$da['should'] = strtotime($nextyear);//修改下一年应缴日期
    		$da['pay_total'] = $feel['money'];//修改下一年缴费金额
    		$da['daynum'] = $feel['dateyet'];//修改天数
    		$da['latefee'] = $feel['overfee'];//修改滞纳金额
    		$result = M('patentMember')->where($map)->save($da);
    		/* if($result){
    			echo '成功';
    		}else {
    			echo '失败';
    		} */
    	}
    }
    
    /*程序自动加入缴费清单*/
    public function autoPayment(){
    	$where['annual_state'] = '0';
    	$data['mypatentdb'] = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.id,h.applydate,h.authdate,h.type,h.cname,h.zlpage,h.patentnum,h.patentee,h.legalstatus,h.legalstatusdetail,p.id as pmid,p.reg_fee,p.sup_acc_fee,p.cut_fee,p.acc_fee,p.agent_fee,p.else_fee,p.years,p.total_fee,p.total_price,p.yearnum,p.annual,p.slow,p.should,p.salestatus,p.trade_price,p.pic_isdel,p.latetime,p.process_state,p.annual_state')->where($where)->select();
    	foreach ($data['mypatentdb'] as $key => $value){
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
    			$data['mypatentdb'][$key]['datepay'] = patent_fee(date("Y-m-d",$value['applydate']),$value['type'],0,$slow,date("Y-m-d",$value['authdate']),'',date('Y-m-d',$value['should']),$value['annual']);
    		}else {
    			/* 年费计算  */
    			$data['mypatentdb'][$key]['datepay'] = patent_fee(date("Y-m-d",$value['applydate']),$value['type'],0,1,date("Y-m-d",$value['authdate']),'');
    		}
    		if( -$data['mypatentdb'][$key]['datepay']['dateyet'] >= -180 && -$data['mypatentdb'][$key]['datepay']['dateyet'] <= 180){
    			$map['id']= $value['pmid'];
    			$da['annual_state'] = '1';
    			$result = M('patentMember')->where($map)->save($da);
    		}
    	}
    }
    
    /*邮件自动发送功能*/
    public function runRemind() {
    	/* ignore_user_abort(); //关掉浏览器，PHP脚本也可以继续执行。
    	 set_time_limit(0); //通过set_time_limit(0)可以让程序无限制的执行下去
    	$interval = 30; //每隔5s运行 */
    	$beginTime = strtotime(date('Y-m-d', mktime(0, 0,0, 1, 1, date('Y', time()))));
    	$endTime = strtotime(date('Y-m-d', mktime(0, 0, 0, 12, 31, date('Y', time()))));
    	$house= M('patentHousekeeper');
    	$con['payment_status'] = 3;//是否加入缴费清单状态
    	$con['payment_comtime'] = array('not between',array($beginTime,$endTime));//缴费完成时间
    	$dat['payment_status'] = 1;//是否加入缴费清单状态
    	$dat['payment_comtime'] = 0;//缴费完成时间
    	$dat['remind'] = 1;//提醒功能
    	$everYear = M('patentMember p')->join('left join qh_user u ON u.id = p.memberid')->where($con)->save($dat);
    	if($everYear) {
    		echo '用户id为'.$everYear['memberid'].'的数据更新成功';
    	} /* else {
    		echo '没有数据更新';
    	} */
    	echo '<br>';
    	$patent = M('patentHousekeeper h')->join('left join qh_patent_member p ON h.patentnum = p.applynum')->field('h.applydate,h.type,h.authdate,h.zlpage,h.cname,h.patentnum,p.id as pmid,p.memberid,p.should,p.annual,p.is_email,p.pay_total,p.latefee,p.daynum,p.annual_state')->select();
    	$k=$i=0;
    	foreach ($patent as $key => $value){
    		$month = date('m',time());
    		$smonth = date('m',$value['should']);
	    	if($smonth == $month && $value['is_email'] == '1') {
	    		if($value['type'] == 1) {
	    			$list[$k]['type'] = '发明';
	    		} elseif($value['type'] == 2) {
	    			$list[$k]['type'] = '外观';
	    		} elseif($value['type'] == 3) {
	    			$list[$k]['type'] = '实用';
	    		} elseif($value['type'] == 4) {
	    			$list[$k]['type'] = '中国台湾';
	    		} elseif($value['type'] == 2) {
	    			$list[$k]['type'] = '中国香港';
	    		}
	    		$list[$k]['zlpage'] = $value['zlpage'];
	    		$list[$k]['cname'] = $value['cname'];
	    		$list[$k]['patentnum'] = $value['patentnum'];
	    		$list[$k]['paydate'] = date('Y-m-d',$value['should']);
	    		$list[$k]['money'] = $value['pay_total'];
	    		$list[$k]['overfee'] = $value['latefee'];
	    		$list[$k]['userid'] = $value['memberid'];
	    		/*给经纪人发邮件*/
	    		$where['id'] = $value['memberid'];
	    		$useraid = M('Member')->field('id,username,aid,email,mobile')->where($where)->find();
	    		if($useraid['aid']){
	    			$wh['id'] = $useraid;
	    			$useragent = M('Member')->field('id,username,email')->where($wh)->find();
	    			$agentname = $useragent['username'];
	    			$agentemail = $useragent['email'];
	    		}
	    		/*给用户发邮件*/
	    		$useremail = $useraid['email'];
	    		$userphone = $useraid['mobile'];
	    		$username = $useraid['username'];
	    	}
    	}
    	$count = count($list);
    	/*提醒经纪人模板*/
    	if($agentemail){
    		if($userphone){
    			$usertel = '，'.'电话：'.$userphone;
    		}
    		$agenttitle = '<tr>
    						<td  style="padding:40px 40px 20px;">7号网提醒您，您的客户本月'.$username.'，有'.$count.'件专利需缴费，请您及时通知哦！
    							<br/>
    							该客户邮箱：'.$useremail.$usertel.
    	    				'</td>
    				   	  </tr>';
    		$agent = $this->sendEmailContent($list,$agentname,$agentemail,$agenttitle);
    	}
    	/*提醒用户模板*/
    	if($useremail){
    		$usertitle = '<tr>
    						<td  style="padding:40px 40px 20px;">7号网提醒您，您本月有'.$count.'件专利需缴费，请您及时缴费哦！
    						</td>
    				 	 </tr>';
    		$email = $this->sendEmailContent($list,$username,$useremail,$usertitle);
    		if($email == 'SUCCESS') {
    			echo "邮件发送成功。";
    			foreach ($list as $key => $value) {
    				$condition['memberid'] = $value['userid'];
    				$condition['applynum'] = $value['patentnum'];
    				$data['is_email'] = 2;
    				$ptmember = M('patentMember')->where($condition)->save($data);
    			}
    		}else {
    			echo "邮件发送失败，没有符合条件的数据。";
    		}
    	}
    }
    public function sendEmailContent($list,$username,$useremail,$proinfo){
    	$title = '来自7号网的邮件信息通知';
    	foreach ($list as $key => $value) {
    		$messge .='<tr>
		    				<td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="'."http://www.qihaoip.com/Zlgj/PatentTrade/detail".'/'.trim($value['patentnum']).'/'.trim($value['zlpage']).'" target="_blank" title="'.$value['cname'].'">【'.$value['type'].'】'.$value['patentnum'].'</a></td>
		    				<td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="'."http://www.qihapip.com/Zlgj/PatentTrade/detail".'/'.trim($value['patentnum']).'/'.trim($value['zlpage']).'" target="_blank" title="'.$value['cname'].'">'.$value['cname'].'</a></td>
		    				<td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.$value['paydate'].'</td>
		    				<td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.$value['money'].'/<span style="color:#ff6600">'.$value['overfee'].'</span></td>
			    	   </tr>';
    	}
    	 
    	$content ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
							<title>7号网-专利管家</title>
						</head>
					<body>
						<table width="700" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;margin:0 auto; border:1px solid #dedede; font-size:13px; line-height:24px; font-family:microsoft yahei, Arial, Helvetica, sans-serif;">
							  <tr>
							    <td style="background-color:#ff6600; padding:5px 20px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网">7号网提醒专利缴费</a></td>
							  </tr>
							  <tr>
							    <td style="padding:50px 50px 30px;">
							        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;">
							          <tr>
							            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/trademark/" target="_blank" title="7号网商标">商标</a></td>
							            <td width="15">&nbsp;</td>
							            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利">专利</a></td>
							            <td width="15">&nbsp;</td>
							            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">资讯</a></td>
							            <td width="15">&nbsp;</td>
							            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/news/case/" target="_blank" title="7号网案例">案例</a></td>
							  		  </tr>
							  		  <tr>
							            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
							                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/trademark/" target="_blank" title="7号网商标交易">交易</a>&nbsp;&nbsp;&nbsp;
							                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/Trade/Index/index.html" target="_blank" title="7号网商标管家">管家</a>
							            </td>
							            <td width="15">&nbsp;</td>
							            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
							            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利交易">交易</a>&nbsp;&nbsp;&nbsp;
							                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/Zlgj/Index/index.html" target="_blank" title="7号网专利管家">管家</a>
							            </td>
							            <td width="15">&nbsp;</td>
							            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
							            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/hot/" target="_blank" title="7号网资讯">热门</a>&nbsp;&nbsp;&nbsp;
							                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/ontime/" target="_blank" title="7号网资讯">最新</a>
							             </td>
							            <td width="15">&nbsp;</td>
							            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
							            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/case/" target="_blank" title="7号网案例">商标</a>&nbsp;&nbsp;&nbsp;
							                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/case/" target="_blank" title="7号网案例">专利</a>
							            </td>
							          </tr>
							          <tr>
							          	<td colspan="7" style="border-bottom:1px solid #ff6600; padding:30px 0; text-align:center;"><a style="color:#000000; text-decoration:none; font-size:18px;" href="http://www.qihaoip.com/" target="_blank" title="更多精彩尽在7号网">更多精彩尽在7号网...</a></td>
							          </tr>
							        </table>
						    	</td>
						  	</tr>
    						<tr>
    							<td style="padding:20px 40px 0; font-size:20px;">尊敬的7号网用户&nbsp;<span style="color:#ff6600;">'.$username.'</span>：</td>
    					  	</tr>
						    '.$proinfo.'
						  <tr>
						    <td  style="padding:0 40px 10px;">
						    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px; line-height:35px; border-top:1px solid #dedede; border-left:1px solid #dedede;">
						          <tr style="">
						            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">专利号</td>
						            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">专利名称</td>
						            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">应缴日期</td>
						            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">年费/<span style="color:#ff6600">滞纳</span></td>
						          </tr>
						    		'.$messge.'
						        </table>
						    </td>
						  </tr>
						  <tr>
						    <td  style="padding:0 40px 50px; text-align:right;">以上信息仅供参考，实时信息以商标网公布为准。</td>
						  </tr>
						  <tr>
						    <td  style="padding:0 40px 20px;">
						    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
						          <tr>
						            <td><img width="110" src="http://www.qihaoip.com/qihaov2/images/weixin.png" alt="7号网微信号：qh7hip" /></td>
						            <td style="line-height:35px; font-size:14px;">如需帮助，请联系您的专属经纪人或拨打热线：<span style="color:#ff6600; font-size:18px;">400-889-7080</span><br />
						            7号网微信号：<span style="color:#ff6600; font-size:18px;">qh7hip</span><br />
						           	 感谢您对7号网的信任与支持！<br />
						            </td>
						          </tr>
						        </table>
						    </td>
						  </tr>
						  <tr>
						    <td  style="padding:0 40px 30px; text-align:right;">7号网&nbsp;&nbsp;敬上</td>
						  </tr>
						  <tr>
						    <td  style="padding:20px 40px; text-align:center; background:#ff6600; color:#ffffff;">联系QQ：21556911&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;服务热线：400-889-7080<br />地址：深圳市南山区南山大道3838号深圳设计产业园金栋210-212、308-312</td>
						  </tr>
					</table>
				</body>
			</html>';
    	$sendEmail = new \Org\Email\Email();
    	$email = $sendEmail->sendMail($useremail,$title,$content);
    	return $email;
    }
}