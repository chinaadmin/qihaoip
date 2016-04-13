<?php
namespace Index\Controller;
class CartController extends IndexBaseController {
	public $debugInfo;
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 购物车首页
	 */
	public function index(){
		return $this->redirect('/Member/Buyer/cart');
		$data = $this->get_data('4');
		$cartid = $this->get_cart_id();
		if(!empty($cartid)){
			$data['data'] = M('item')->field('*,(select name from qh_member where qh_member.id = qh_item.userid) as a,(select name from qh_member where qh_member.id = qh_item.aid) as b,(select name from qh_shop where qh_shop.id = qh_item.userid) as c')->where(['id'=>array('in',$cartid)])->select();
		} else {
			$data['data'] = array();
		}
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 订单支付
	 */
	public function pay($uid=0){
		$data = $this->get_data('1');
		if($uid){//订单id来支付
			$where['uid'] = $uid;//订单号
			$data['data'] = M('order')->where($where)->find();
			if($data['data']){
				if($data['data']['state'] != '1'){//如果状态不为1
					return $this->error('订单状态不对无法支付！',U('/Member/Buyer/order_list'));
				}
			} else {
				return $this->error('订单不存在！',U('/Member/Buyer/order_list'));
			}
			$data['item'] = M('item')->where(['id'=>['in',$data['data']['itemids']]])->select();//商品数据
		} else {
			return $this->error('订单不存在！',U('/Member/Buyer/order_list'));
		}
		
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	public function pay($ordersid=0,$orderid=0){
		$data = $this->get_data();
		$uid = get_userid();//获取用户id
		$where['buyer'] = $uid;//买家正常
		if($ordersid){//父订单id来支付
			$where['uid'] = $ordersid;//订单号
			$data['data'] = M('orders')->where($where)->find();
			if($data['data']){
				if($data['data']['state'] != '1'){//如果状态不为1
					return $this->error('订单状态不对无法支付！',U('/Member/Buyer/index'));
				}
			} else {
				return $this->error('订单不存在！',U('/Member/Buyer/index'));
			}
				
			$ordrow = M('order')->field('itemids')->where(['parent'=>$data['data']['id']])->select();//查找商品id
			$items = array();
			foreach ($ordrow as $row){
				$items[] = $row['itemids'];
			}
			$data['item'] = M('item')->where(['id'=>['in',$items]])->select();//商品数据
		} else if($orderid){
			$where['uid'] = $orderid;//订单号
			$order = M('order')->field('parent')->where($where)->find();
			if($order){
				$wh['id'] = $order['parent'];
				$wh['buyer'] = $uid;//买家正常
				$data['data'] = M('orders')->where($wh)->find();
				if($data['data']){
					if($data['data']['state'] != '1'){//如果状态不为1
						return $this->error('订单状态不对无法支付！',U('/Member/Buyer/index'));
					}
				} else {
					return $this->error('订单不存在！',U('/Member/Buyer/index'));
				}
			} else {
				return $this->error('订单不存在！',U('/Member/Buyer/index'));
			}
				
			$ordrow = M('order')->field('itemids')->where(['parent'=>$order['parent']])->select();//查找商品id
			$items = array();
			foreach ($ordrow as $row){
				$items[] = $row['itemids'];
			}
			$data['item'] = M('item')->where(['id'=>['in',$items]])->select();//商品数据
		} else {
			return $this->error('订单不存在！',U('/Member/Buyer/index'));
		}
	
		$this->assign('data',$data);
		$this->display();
	}
	**/
	
	/**
	 * 订单结账
	 */
	public function check_out(){//结账并且生成订单
		exit;
		$uid = get_userid();
		if($uid){
			$orders = M('orders');//创建父订单
			$order = M('order');//创建子订单
			$cartid = $this->get_cart_id();
			$orderlog = M('orderlog');//订单日志
			if(!empty($cartid)){
				$where['id'] = array('in',$cartid);
				$where['state'] = '1';//商品状态正常
				$re = M('item')->field('*')->where($where)->select();
				if($re){
					$amount = 0;
					$i=0;
					foreach ($re as $row){
						$amount += $row['price'];
						$i++; 
					}
					$date = date('Ymd');//
					$datetime = time();
					$ordersid = get_uid();//用户查看的流水号
					$data['uid'] = $ordersid;//用户查看的流水号
					$data['buyer'] = $uid;
					$data['amount'] = $amount;//金额
					$data['num'] = $i;
					$data['date'] = $date;
					$data['datetime'] = $datetime;
					$data['state'] = 1;
					$reorders = $orders->add($data);
					if($reorders){//主订单创建成功
						$logdata['orderid'] = $reorders;
						$logdata['userid'] = $uid;
						$logdata['adminid'] = '0';
						$logdata['admintype'] = '0';
						$logdata['datetime'] = $datetime;
						$logdata['type'] = '1';
						$logdata['name'] = '创建订单';
						$orderlog->add($logdata);
						foreach ($re as $row){
							unset($data);
							$data['uid'] = get_uid();
							$data['parent'] = $reorders;
							$data['seller'] = $row['userid'];
							$data['aid'] = $row['aid'];
							$data['buyer'] = $uid;
							$data['itemids'] = $row['id'];
							$data['price'] = $row['price'];
							$data['date'] = $date;
							$data['datetime'] = $datetime;
							$data['state'] = 1;
							$reorder = $order->add($data);
							if($reorder){//子订单创建成功
								$logdata['orderid'] = $reorder;
								$logdata['userid'] = $uid;
								$logdata['adminid'] = '0';
								$logdata['admintype'] = '0';
								$logdata['datetime'] = $datetime;
								$logdata['type'] = '1';
								$logdata['name'] = '创建订单';
								$orderlog->add($logdata);
							}
						}
						$itemdata['state'] = '5';
						M('item')->where($where)->save($itemdata);//更改商品状态
						$this->clean();//清空购物车
						$this->redirect('pay',['ordersid'=>$ordersid]);
					} else {//子订单
						//
					}
					
				} else {
					return $this->error('创建订单出错，商品已售出或者缺货！');
				}
			} else {
				return $this->error('创建订单出错，购物车为空！');
			}
			//
		} else {
			$url = U('/Member/Buyer/cart');
			$redirect = base64_encode($url);
			$this->error('你尚未登录，请登录后提交订单！',U('User/login',['redirect'=>$redirect]));
		}
	}
	
	/**
	 * 获取购物车的商品id数据
	 */
	private function get_fcart(){
		if(session('?cart')){
			$cart = session('cart');
		} else {
			$re = M('cart')->where(['id'=>get_userid()])->find();
			if($re){
				$cart = json_decode($re['item'],true);
			} else {
				$cart = array();
			}
		}
		if(is_array($cart) && !empty($cart)){
			$re['num'] = count($cart);
			foreach ($cart as $k=>$v){//只获取其键
				$cartk[] = $k;
			}
			$where['id'] = array('in',$cartk);
			$re['data'] = M('item')->field('id,title,price,tmpa,tmno,img')->where($where)->select();
		} else {
			$re['num'] = 0;
			$re['data'] = array();
		}
	}
	
	/**
	 * 产品加入购物车。
	 * 通过get方式发送参数到这个页面。
	 * 加入购物车格式为/id/10000134,10000135
	 * id必须为数字，或者用英文逗号分割的数字
	 */
	public function add($id){
		if(!isset($id)){return;}
		$cart = $this->cart();
		if(strstr($id, ',')){
			$id = explode(',', $id);
			foreach ($id as $row){
				if($this->chk_price($row)){//检查价格
					if(!empty($row) && is_numeric($row)){
						if(isset($cart[$row])){
							$cart[$row] += 1;
						} else {
							$cart[$row] = 1;
						}
					}
				}
			}
		} else {
			if(is_numeric($id)){
				if($this->chk_price($id)){
					if(isset($cart[$id])){
						$cart[$id] += 1;
					} else {
						$cart[$id] = 1;
					}
				}
			}
		}
		$userid = get_userid();
		if($userid){
			$data['item'] = json_encode($cart);
			$data['edittime'] = time();
			M('cart')->where(['id'=>$userid])->save($data);
		} else {
			session('cart',$cart);
		}
		if(IS_AJAX){
			$return['success'] = true;
			return $this->ajaxReturn($return);
		} else {
			return $this->redirect('/Member/Buyer/cart');
		}
	}
	
	/**
	 * 检查价格，如果为面议商品，将无法加入购物车。
	 * @param unknown $id
	 * @return boolean|number
	 */
	private function chk_price($id){
		$re = M('item')->field('price')->where(['id'=>$id,'state'=>'1'])->find();//id和状态（状态为“已发布”）
		if($re){
			if($re['price']>0){
				return true;
			} else {
				return 0;
			}
		} else {
			return false;
		}
	}
	
	/**
	 * 清空购物车
	 */
	public function del_all(){
		$this->clean();//清空购物车
		if(IS_AJAX){
			$this->ajaxReturn(['success'=>true]);
		} else {
			$this->redirect('index');	
		}
	}
	
	private function clean(){
		$uid = get_userid();
		if($uid){
			$where['id']=$uid;
			$data['item'] = json_encode(array());
			$data['edittime'] = time();
			M('cart')->where($where)->save($data);
		} else {
			if(session('?cart')){
				session('cart',null);
			}
		}
	}
	
	/**
	 * 产品从购物车删除。
	 * 通过get方式发送参数到这个页面。
	 * 加入购物车格式为/id/10000134,10000135
	 * id必须为数字，或者用英文逗号分割的数字
	 */
	public function del($id=''){
		if($this->data_del($id)){
			if(IS_AJAX){
				$return['success'] = true;
				return $this->ajaxReturn($return);
			} else {
				return $this->redirect('/Member/Buyer/cart');
			}
		} else {
			if(IS_AJAX){
				$return['success'] = false;
				$return['msg'] = $this->debugInfo;
				return $this->ajaxReturn($return);
			} else {
				return $this->error($this->debugInfo,'/Member/Buyer/cart');
			}
		}
	}
	
	
	public function data_del($id=''){
		if($id==''){
			$this->debugInfo = '未选择任何商品';
			return false;
		}
		$cart = $this->cart();
		if(strstr($id, ',')){
			$id = explode(',', $id);
			foreach ($id as $row){
				if(!empty($row) && is_numeric($row)){
					if(isset($cart[$row])){
						unset($cart[$row]);
					}
				}
			}
		} else {
			if(is_numeric($id)){
				if(isset($cart[$id])){
					unset($cart[$id]);
				}
			}
		}
		$userid = get_userid();
		if($userid){
			$data['item'] = json_encode($cart);
			$data['edittime'] = time();
			$ca = M('cart');
			$re = $ca->where(['id'=>$userid])->save($data);
			if(!$re){
				$this->debugInfo = $ca->getDbError();
				return false;
			}
		} else {
			session('cart',$cart);
		}
		return true;
	}
	/**
	 * 从购物车获取数据，支持sesson和数据库智能判断
	 * @return Ambigous <multitype:, mixed, NULL, unknown>
	 */
	private function cart(){
		if(session('?cart')){
			$cart = session('cart');
		} else {
			$userid = get_userid();
			if($userid){
				$re = M('cart')->where(['id'=>$userid])->find();
				if($re){
					$cart = json_decode($re['item'],true);
				} else {
					$cart = array();
					$data['id'] = $userid;
					$data['item'] = json_encode($cart);
					$data['edittime'] = time();
					M('cart')->add($data);//添加数据库购物车
				}
			} else {
				$cart = array();
			}
		}
		return $cart;
	}
}