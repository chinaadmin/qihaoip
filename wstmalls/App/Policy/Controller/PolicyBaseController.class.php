<?php
namespace Policy\Controller;
use Common\BaseController;
class PolicyBaseController extends BaseController {
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
	 * 商城首页横条广告
	 */
	public function adv($id,$limit){
		$arr = M('Ad')->field('id,name,img,link')->where('(endtime =0 or endtime >'.time().') and (starttime = 0 or starttime < '.time().') and state=1 and groupid='.$id)->order('sort desc')->limit($limit)->select();
	
		return $arr;
	}
	
}