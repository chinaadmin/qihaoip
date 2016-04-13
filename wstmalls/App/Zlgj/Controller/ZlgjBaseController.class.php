<?php
namespace Zlgj\Controller;
use Common\BaseController;
class ZlgjBaseController extends BaseController {
	public function _initialize(){
		if(!session('user.id')){
			$this->redirect('/User/login',['redirect'=>base64_encode(get_url())]);
			exit;
		}
	}
	
    /* 专利管家获取详情数据方法  */
    public function getDetailDate($ptn,$num){
    	$getpath1 = $ptn;
    	$getpath2 = $num;
    	if($getpath1){
    		//先判断数据是否存在
    		$model = M('patentHousekeeper');
    		$legalmodel = M('legalstatusDetail');
    		$map['patentnum'] = $getpath1;
    		$result = $model->where($map)->find();
    		if($result){
    			$where['patentnum'] = $getpath1;
    			$detail = $model->where($where)->find();
    			if($detail['userid']&&strrchr($detail['picture'],'.')){
    				$pics = explode(',',$detail['picture']);
    				$detail['picture'] =$pics[0]; 
    			}
    			$wh['ptno'] = $getpath1;
    			$wh['itemid'] = $detail['id'] ;
    			$wh['userid'] = session('user.id');
    			$legal = $legalmodel->where($wh)->select();//获取法律状态详情
    			if($legal){
    				$detail['lawstatus'] = $legalmodel->where($wh)->select();
    			}
    			$detail['patentee'] = explode('、',$detail['patentee']);//专利权人
    			$detail['inventor'] = explode('、',$detail['inventor']);//发明人
    			/* else {
    				$detail['lawstatus'] = json_decode($result['legalstatusdetail'],true);
    			} */
    		} else { //抓取外部信息
    			$geturl = $getpath1.'/'.$getpath2;
    			$padetail = new \Org\Patent\Patent('','',$geturl);
    			$patentdetail = $padetail->getDetail();
    			$type = explode(' ',$patentdetail[0][0]);
    			if($type[0] == '[发明专利]'){
    				$detail['type'] = 1;//[发明专利]
    			} elseif ($type[0] == '[外观设计]'){
    				$detail['type'] = 2;//[外观设计]
    			} elseif ($type[0] == '[实用新型]'){
    				$detail['type'] = 3;//[实用新型]
    			} elseif ($type[0] == '[中国台湾]'){
    				$detail['type'] = 4;//[中国台湾]
    			} elseif ($type[0] == '[香港特区]'){
    				$detail['type'] = 5;//实用新型
    			}
    				$detail['cname'] = $patentdetail[2][0];//专利名称
    				$detail['applydate'] = strtotime($patentdetail[8][0]);//申请日
    				$detail['patentnum'] = $patentdetail[4][0];//申请/专利号
    				$detail['opennum'] = $patentdetail[10][0];//公开/公告号
    				$detail['announcenum'] = strtotime($patentdetail[12][0]);//公开/公告日
    			if($patentdetail[14]){
    					$detail['authnum'] = $patentdetail[14][0];//授权公告号
    					$detail['authdate'] = strtotime($patentdetail[16][0]);//授权公告日
    					$detail['patentee'] = explode('、',str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[18][0]))))));//专利权人
    					$detail['inventor'] = explode('、',str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[20][0]))))));//发明人
    					$detail['mainclassnum'] = $patentdetail[22][0];//主分类号
    					$detail['patenteeaddr'] = $patentdetail[26][0];//专利权人地址
    					$detail['provincecode'] = $patentdetail[28][0];//国省代码
    					$detail['certified'] = $patentdetail[30][0];//颁证日
    					$detail['cateclass'] = $patentdetail[32][0];//范畴分类
    					$detail['internatapply'] = $patentdetail[38][0];//国际申请
    					$detail['internatpublic'] = $patentdetail[40][0];//国际公布
    					$detail['intodate'] = $patentdetail[42][0];//进入国家日期
    					$detail['subclassnum'] = $patentdetail[68][0];//分类号
    					$detail['priority'] = $patentdetail[6][0];//优先权
    					$detail['divisionapply'] = $patentdetail[24][0];//分案申请
    					$detail['picture'] = $patentdetail[46][0];//附图
    				if($patentdetail[34][0] != strip_tags($patentdetail[34][0])){
    					$detail['agency'] = '暂无信息';
    				} else {
    					$detail['agency'] = strip_tags($patentdetail[34][0]);
    				}
    				if($patentdetail[36][0] != strip_tags($patentdetail[36][0])){
    					$detail['agent'] = '暂无信息';
    				} else {
    					$detail['agent'] = strip_tags($patentdetail[36][0]);
    				}
    					$detail['info'] = $patentdetail[44][0];//摘要
    					$detail['sovereignitem'] = $patentdetail[48][0];//主权项
    				if(strip_tags($patentdetail[52][0]) && strip_tags($patentdetail[54][0])){
    					$detail['citingliterature'] = '专利引证信息:'.strip_tags($patentdetail[52][0]).'<br />'.'非专利引证信息：'.strip_tags($patentdetail[54][0]);//专利引证信息和非专利引证信息
    				}
    				$legalcount =  count($patentdetail[50][0]);
    				switch($legalcount){
    					case'2':
    						$detail['lawstatus'] = array(
    						'0'=>array(
    							'andate'=>trim($patentdetail[50][0][0]),
    							'legalstatus'=>trim($patentdetail[50][0][0]),
    							'legalstatusdetails'=>trim($patentdetail[50][1][0]),
    						),);
    						break;
    					case'4':
    						$detail['lawstatus'] = array(
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
    						$detail['lawstatus'] = array(
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
    						$detail['lawstatus'] = array(
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
    					$detail['kinpatent'] = strip_tags($patentdetail[56][0]);//同族专利
    					$detail['legalstatus'] = strip_tags($patentdetail[70][0]);//法律状态
    			}else{
    					$detail['priority'] = $patentdetail[6][0];//优先权
    					$detail['patentee'] = explode('、',str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[16][0]))))));//专利权人
    					$detail['inventor'] = explode('、',str_replace(' ','',preg_replace('/\n/','、',trim(str_replace(';','',strip_tags($patentdetail[18][0]))))));//发明人
    					$detail['provincecode'] = $patentdetail[26][0];//国省代码
    					$detail['certified'] = $patentdetail[28][0];//颁证日
    					$detail['cateclass'] = $patentdetail[30][0];//范畴分类
    					$detail['internatapply'] = $patentdetail[36][0];//国际申请
    					$detail['internatpublic'] = $patentdetail[38][0];//国际公布
    					$detail['intodate'] = $patentdetail[40][0];//进入国家日期
    					$detail['info'] = $patentdetail[42][0];//摘要
    					$detail['picture'] = $patentdetail[44][0];//附图
    				if(strpos($patentdetail[20][0],"<label>") == false){	
    					$detail['mainclassnum'] = $patentdetail[20][0];//主分类号
    					$detail['patenteeaddr'] = $patentdetail[24][0];//专利权人地址
    					$detail['subclassnum'] = $patentdetail[68][0];//分类号
    					$detail['divisionapply'] = $patentdetail[22][0];//分案申请
    					if($patentdetail[32][0] != strip_tags($patentdetail[34][0])){
    						$detail['agency'] = '暂无信息';
    					} else {
    						$detail['agency'] = strip_tags($patentdetail[34][0]);
    					}
    					if($patentdetail[34][0] != strip_tags($patentdetail[36][0])){
    						$detail['agent'] = '暂无信息';
    					} else {
    						$detail['agent'] = strip_tags($patentdetail[36][0]);
    					}
    					$legalcount =  count($patentdetail[48][1]);
    					switch($legalcount){
    						case'2':
    							$detail['lawstatus'] = array(
    								'0'=>array(
    									'andate'=>trim($patentdetail[48][0][0]),
    									'legalstatus'=>trim($patentdetail[48][0][1]),
    									'legalstatusdetails'=>trim($patentdetail[48][1][0]),
    								),);
    						break;	
    						case'4':
    							$detail['lawstatus'] = array(
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
    							$detail['lawstatus'] = array(
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
    							$detail['lawstatus'] = array(
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
    					$detail['sovereignitem'] = $patentdetail[46][0];//主权项
    					if($patentdetail[64]){
    						$detail['legalstatus'] = strip_tags($patentdetail[64][0]);//法律状态
    					} else {
    						$detail['legalstatus'] = strip_tags($patentdetail[65][0]);//法律状态
    					}	
    				}
    				if(strip_tags($patentdetail[50][0]) && strip_tags($patentdetail[52][0] && $patentdetail[46][0])){
    						$detail['citingliterature'] = '专利引证信息:'.strip_tags($patentdetail[50][0]).'<br />'.'非专利引证信息：'.strip_tags($patentdetail[52][0]);//专利引证信息和非专利引证信息
    				} else {
    						$detail['citingliterature'] = '专利引证信息:'.strip_tags($patentdetail[48][0]).'<br />'.'非专利引证信息：'.strip_tags($patentdetail[50][0]);//专利引证信息和非专利引证信息
    				}
    				if($patentdetail[54][0]){
    					$detail['kinpatent'] = strip_tags($patentdetail[54][0]);//同族专利
    				} else {
    					$detail['kinpatent'] = strip_tags($patentdetail[52][0]);//同族专利
    				}
    			}
    		}
    	}
    	$this->assign('detail',$detail);
    }
}
