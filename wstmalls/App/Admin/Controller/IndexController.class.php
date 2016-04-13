<?php
namespace Admin\Controller;
class IndexController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'index';//数据库
	private $_name = '';
	
	/***
	 * 显示默认首页
	 */
	public function index(){
		//总会员，每日新增会员。总订单，每日新增订单，待审核订单，待支付订单。商城数，待审核商城数。供求信息总数，待审核信息。
		$date = date('Ymd',strtotime('-7 days'));
		$today=date('Ymd');
		//注册会员
		$member = M('member');
		$data['members'] = $member->count();
		$data['member_day'] = $member->where('regdate > '.$date.' and admin <= 1')->field('regdate,count(*)')->group('regdate')->order('regdate desc')->select();//七日注册
		//订单数
		$order = M('order');
		$data['orders'] = $order->field('state,count(*)')->group('state')->select();
// 		$data['order_day'] = $order->where('date >'.$date)->field('date,count(*)')->group('date')->select();//
		//店铺
		$shop = M('shop');
		$data['shops'] = $shop->field('state,count(*)')->group('state')->select();
		//商品
		$item = M('item');
		$data['items'] = $item->field('state,count(*)')->group('state')->select();
		//供求
		$supply = M('supply');
		$data['supplys'] = $supply->field('state,count(*)')->group('state')->select();
		
		$this->assign('data',$data);
 		$this->display();
	}
	
	public function test(){
		$member = M('supply');
		$members = $member->select();
		foreach ($members as $row){
			if($row['addtime']){
				$data['adddate'] = date('Ymd',$row['addtime']);
				$member->where(['id'=>$row['id']])->save($data);
				echo 'success<br />';
			}
		}
	}
}