<?php
namespace Common\Lib;
class Order_help{
	public $debugInfo;
	public $uid;
	public $type;
	
	/**
	 * 构造函数
	 * 设置操作类型
	 * 类型1，商品订单
	 * 类型2，专利续费
	 * 类型3，商标续费
	 * @param 类型 $type
	 */
	public function __construct($type='1'){
		$this->type = $type;
	}
	
	/**
	 * 设置操作类型
	 * @param 操作类型 $type
	 */
	public function set_type($type){
		$this->type = $type;
	}
	/**
	 * 创建订单
	 * @param 卖家 $seller
	 * @param 经纪人 $aid
	 * @param 买家 $buyer
	 * @param 合同主体 $ht
	 * @param 受让主体 $sr
	 * @param 商品id $itemids
	 * @param 价钱 $price
	 * @param 手续费 $fees
	 * @param 使用积分 $jifen
	 * @param 使用优惠券 $voucher
	 * @param 关于 $about
	 * @param 订单类型 $type
	 * @return boolean
	 */
	public function order_add($seller,$aid,$buyer,$ht,$sr,$itemids,$price,$fees,$jifen,$voucher,$about){
		$this->uid = get_uid();
		$add['uid'] = $this->uid;//uid订单id
		$add['parent'] = '0';//父类id，已弃用
		$add['type'] = $this->type;//订单类型
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
		$add['updatetime'] = $add['datetime'];
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
	 * @param 支付流水号 $payid
	 * @return boolean
	 */
	public function order_state($uid,$state,$payid='0'){
		$where['uid'] = $uid;
		$order = M('order');
		$data['state'] = $state;
		$data['updatetime'] = time();
		$data['payid'] = '';
		if($trade_no){
			$data['payid'] = $payid;
		}
// 		$data[''] = '';
		$reorder = $order->where($where)->save($data);
		$save['updatetime'] = $nowtime;
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
		if($this->type=='1'){//如果不是类型1，则不用更改商品状态
			$where['id'] = $id;
			$item = M('item');
			$re = $item->where($where)->save(['state'=>$state]);
			if(!$re && $item->getDbError()){
				$this->debugInfo = $item->getDbError();
				return false;
			} else {
				return true;
			}
		} else if($this->type=='2'){
			$m = M('patent_member');
			$where['id'] = array('in',$id);
			$re = $m->where($where)->save(['annual_state'=>$state]);
			if(!$re && $m->getDbError()){
				$this->debugInfo = $m->getDbError();
				return false;				
			}
			return true;
		} else if($this->type=='3'){
			return true;
		}
	}
	
	/**
	 * 订单日志
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