<?php
namespace Common\Lib;
class Order{
	public $debugInfo;
	public function order_add($seller,$aid,$buyer,$ht,$sr,$itemids,$price,$fees,$jifen,$voucher,$about,$type){
		$add['uid'] = get_uid();//uid订单id
		$add['parent'] = '0';//父类id，已弃用
		$add['type'] = $type;//订单类型
		$add['seller'] = $seller;//卖家
		$add['aid'] = $aid;//经纪人
		$add['buyer'] = $buyer;
		$add['htid'] = $ht;//合同id
		$add['srid'] = $sr;//受让id
		$add['itemids'] = $itemids;//商品id
		$add['price'] = $price;//商品金额
		$add['fees'] = $fees;//手续费
		$add['jifen'] = $jifen;//积分
		$add['voucher'] = $voucher;//优惠券
		$add['amount'] = $this->amount($price,$fees,$jifen,$voucher);//总计金额
		$add['date'] = date('Ymd');
		$add['datetime'] = time();
		$add['about'] = $about;
		$add['state'] = 1;
		$order = M('order');//创建订单
		$reorder = $order->add($add);
		if($reorder){//创建订单后，创建订单日志
			return true;
		} else {
			$this->debugInfo = $order->getDbError();
			return false;
		}
	}
	
	/**
	 * 更改订单状态
	 * @param 订单uid $uid
	 * @param 订单状态 $state
	 * @param 卖家 $seller
	 * @return boolean
	 */
	public function order_state($uid,$state,$seller=0){
		$where['uid'] = $uid;
		if($seller){
			$where['seller'] = $seller;
		}
		$order = M('order');
		$reorder = $order->where($where)->save(['state'=>$state]);
		if(!$reorder && $order->getDbError()){
			$this->debugInfo = $order->getDbError();
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * 更改商品状态
	 * @param 商品id $id
	 * @param 商品状态 $state
	 * @return boolean
	 */
	public function item_state($id,$state){
		$where['id'] = $id;
		$item = M('item');
		$re = $item->where($where)->save(['state'=>$state]);
		if(!$re && $item->getDbError()){
			$this->debugInfo = $item->getDbError();
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * 订单动态
	 * @param 订单uid $orderid
	 * @param 用户id $userid
	 * @param 管理员id $adminid
	 * @param 管理员类型 $admintype
	 * @param 操作类型 $type
	 * @param 操作名称 $name
	 * @return boolean
	 */
	public function order_log($orderid,$userid,$adminid,$admintype,$type,$name){
		$logdata['orderid'] = $orderid;
		$logdata['userid'] = $userid;
		$logdata['adminid'] = $adminid;
		$logdata['admintype'] = $admintype;
		$logdata['datetime'] = time();
		$logdata['type'] = $type;
		$logdata['name'] = $name;
		$orderlog = M('orderlog');//订单日志
		$logre = $orderlog->add($logdata);//日志创建成功
		if($logre){
			return true;
		} else {
			$this->debugInfo = $orderlog->getDbError();
			return false;
		}
	}
	
	
	
	
	/**
	 * 计算总计付款金额
	 * @param 商品价钱 $price
	 * @param 手续费 $fees
	 * @param 使用积分 $jifen
	 * @param 优惠券 $voucher
	 * @return 总计金额 number
	 */
	public function amount($price,$fees='1000.00',$jifen = '0',$voucher = '0'){
		return $price+$fees-($jifen/100);
	}
}