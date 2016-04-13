<?php
namespace Index\Controller;
use Common\BaseController;
class IndexBaseController extends BaseController {
	/**
	 * 模块控制器公共类，所有模块下其他控制器类继承此类
	*/
	public function _initialize(){
		$tg = I('get.tg_uid',false);
		if($tg && !isset($_COOKIE['tg_uid'])){//用户分享加积分
			jifen('5',$tg);//积分
			setcookie('tg_uid',1);
		}
		parent::_initialize();
	}
	
	/**
	 * 获取页面公共数据
	 * menu 导航菜单
	 * searchKeyWords 搜索词
	 * help 底部帮助数据
	 * siteInfo 网站通用信息：如网址等
	 * @return unknown
	 */
	protected function get_data($id=1,$link='',$num = '0'){
		$re['menu'] = $this->data_menu($id);
		$re['msg_num'] = $this->data_msg();//消息
		// 		$re['searchKeyWords'] = $this->data_keywords();
		$re['cart'] = $this->data_cart();//获取购物车信息
		$re['help'] = $this->data_help();
		if($link){
			$re['link'] = $this->data_link($link);
		}
		$re['siteInfo'] = $this->data_site_info();
		//获取商标分类
		$re['tmcategory'] = $this->tmcate($num);
		//获取专利分类
		$re['pacategory'] = $this->pacate($num);
		return $re;
	}
	
	/**
	 * 获取站内信条数
	 */
	protected function data_msg(){
		$userid = get_userid();
		if($userid){
			$where['toid'] = $userid;
			$where['totime'] = 0;
			return M('msg')->where($where)->count();
		} else return 0;
	}
	/**
	 * 获取导航菜单
	 */
	protected function data_menu($id){
		$m = M('menu');
		$re = $m->field('id,name,title,alt,link,about')->where(array('groupid'=>$id,'state'=>'1'))->order('sort desc')->select();
		return $re;
	}
	
	
	/**
	 * 根据广告组获取广告信息
	 * @return array
	 */
	protected function data_ad($groupid=28){//获取banner信息
		$m = M('ad');
		$re = $m->where('groupid = '.$groupid.' and state = 1 and (endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().')')->order('sort desc,id desc')->select();
		return $re;
	}
	
	/**
	 * 获取搜索的关键词
	 */
	protected function data_keywords(){
		$m = M('keywords');
		$re = $m->field('keywords')->where('groupid = 1')->limit(10)->order('sort,views')->select();
		return $re;
	}
	
	/**
	 * 获取底部帮助链接
	 */
	protected function data_help(){
		$where['upid'] = '3';
		$arr['class'] = M('Articles')->where($where)->order('sort desc')->select();
		foreach ($arr['class'] as $key => $value){
			$map['groupid2'] = $value['id'];
			$map['state'] = '1';
			$arr['class'][$key]['info'] = M('Article')->where($map)->order('sort desc')->select();
		}
		
		return $arr;
	}
/* 	protected function data_help(){
		$m = M('article');
		$help = $m->field('id,groupid,title,keywords,date')->where('groupid in(162,163,164,165,256) and state=1')->order('sort')->select();
		$re = array();
		foreach ($help as $row){
			switch ($row['groupid']){
				case 162:
					$re['0'][] = $row;
					break;
				case 163:
					$re['1'][] = $row;
					break;
				case 164:
					$re['2'][] = $row;
					break;
				case 165:
					$re['3'][] = $row;
					break;
				case 256:
					$re['4'][] = $row;
					break;
			}
		}
		return $re;
	} */
	
	/*
	 * 获取友情链接
	 * @return
	 */
	/* protected function data_link($id='1,2'){
		$link = M('link')->where('state=1 and groupid in('.$id.')')->order('sort desc,id desc')->select();
		return $link;
	} */
	
	
	/**
	 * 友情链接
	 * @return
	 */
	private function data_link($id){
		$map['id'] = $id;
		$arr = M('Links')->where($map)->order('sort desc')->select();
		foreach ($arr as $key => $value){
			$where['groupid'] = $value['id'];
			$where['state'] = '1';
			$arr[$key]['youlian'] = M('Link')->where($where)->order('sort desc,id desc')->select();
		}
	
		return $arr;
	}
	
	/**
	 获取网站的配置信息
	 */
	protected function data_site_info(){
		$m = M('config');
		$arr = $m->field('name,data')->where('groupid=2')->select();
		foreach ($arr as $row){
			$re[$row['name']] = $row['data'];
		}
		return $re;
	}
	
	/**
	 * 从购物车中获取商品id，无需关心是session购物车还是数据库购物车
	 * @return multitype:|multitype:Ambigous <multitype:, mixed>
	 */
	protected function get_cart_id(){
		$userid = get_userid();
		if($userid){
			$re = M('cart')->where(['id'=>$userid])->find();
			if($re){
				$cart = json_decode($re['item'],true);
			} else {
				$cart = array();
			}
		} else {
			if(session('?cart')){
				$cart = session('cart');
			} else {
				$cart = array();
			}
		}
		if(empty($cart)){
			return $cart;
		} else {
			$cartk = array();
			foreach ($cart as $k=>$v){//只获取其键
				$cartk[] = $k;
			}
			return $cartk;
		}
	}
	
	/**
	 * 获取购物车数量和具体产品信息
	 */
	protected function data_cart(){
		$cartk = $this->get_cart_id();
		if(!empty($cartk)){
			$where['id'] = array('in',$cartk);
			$re['data'] = M('item')->field('id,title,price,tmpa,tmno,img')->where($where)->select();
		 	if($re['data']){
		 		foreach ($re['data'] as $key => $value){
		 			$re['totalprice'] += $value['price'];
		 		}
				$re['num'] = count($re['data']);
			} else {
				$re['num'] = 0;
				$re['data'] = array();
			}
		} else {
			$re['num'] = 0;
			$re['data'] = array();
		}
		return $re;
	}
	
	/**
	 * 通过用户id来查找用户信息
	 * @param 个人 $id
	 * @return 返回用户数组信息通常用于显示用户
	 */
	protected function get_member($id){
		if($id){
			$id += 0;
			return M('member')->field('id,ugroup,aid,username,about,name,email,mobile,qq,img,tel')->where(['id'=>$id])->find();
		} else {
			return array();
		}
	}
	
	protected function chk_url(){
		$url = strtolower($_SERVER['PHP_SELF']);
		if($url!=$_SERVER['PHP_SELF'] || !strstr($url, '.html')){
			$url = str_replace('/index.php', '', $url);
			if(!strstr($url, '.html')){
				$url .= '.html';
			}
			Header("HTTP/1.1 301 Moved Permanently");
			if($_SERVER['QUERY_STRING']){
				Header("Location: ".$url."?".$_SERVER['QUERY_STRING']);
			} else {
				Header("Location: ".$url);
			}
			exit;
		}
	}
	
	/**
	 * 获取商标热门分类
	 */
	private function tmcate($num){
		$items = M('Items');
		$where['state'] = '1';
		$where['tmpa'] = '1';
		$where['level'] = '1';
		$arr = $items->field('id,name')->where($where)->limit($num)->order('sort desc')->select();
		foreach ($arr as $key => $value){
			$wh['state'] = '1';
			$wh['level'] = '2';
			$wh['parentid'] = $value['id'];
			$arr[$key]['subclass'] = $items->field('id,name')->where($wh)->limit(8)->order('sort desc')->select();
			foreach ($arr[$key]['subclass'] as $k => $v){
				$condition['parentid'] = $v['id'];
				$arr[$key]['subclass'][$k]['lowclass'] = $items->where($condition)->select();
				if(empty($arr[$key]['subclass'][$k]['lowclass']))unset($arr[$key]['subclass'][$k]['lowclass']);
			}
			if(empty($arr[$key]['subclass']))unset($arr[$key]['subclass']);
		}
		
		return $arr;
	}
	
	/**
	 * 获取专利热门分类
	 */
	private function pacate($num){
		$items = M('Items');
		$where['state'] = '1';
		$where['tmpa'] = '2';
		$where['level'] = '1';
		$arr = $items->field('id,name')->where($where)->limit($num)->order('sort desc')->select();
		foreach ($arr as $key => $value){
			$wh['state'] = '1';
			$wh['level'] = '2';
			$wh['parentid'] = $value['id'];
			$arr[$key]['subclass'] = $items->field('id,name')->where($wh)->limit(8)->order('sort desc')->select();
			foreach ($arr[$key]['subclass'] as $k => $v){
				$condition['parentid'] = $v['id'];
				$arr[$key]['subclass'][$k]['lowclass'] = $items->where($condition)->select();
				if(empty($arr[$key]['subclass'][$k]['lowclass']))unset($arr[$key]['subclass'][$k]['lowclass']);
			}
			if(empty($arr[$key]['subclass']))unset($arr[$key]['subclass']);
		}
	
		return $arr;
	}
	
	/**
	 *广告位
	 */
	public function adv($id,$limit){
		$arr = M('Ad')->field('id,name,img,link')->where('(endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().') and state=1 and groupid='.$id)->order('sort desc')->limit($limit)->select();
	
		return $arr;
	}
	
	/**
	 * 获取佰腾网专利数据
	 */
	public function get_baiten($ptn,$num){
		$getpath1 = $ptn;
		$getpath2 = $num;
		if($getpath1){
			//先判断数据是否在本地的数据库中
			/* $model = M('patentHousekeeper');
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
				}
			}  else {*/ //抓取外部信息
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
				$detail['patentnum'] = trim($patentdetail[4][0]);//申请/专利号
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
				/* } */
			}
		}
		
		return $detail;
	}
	
}