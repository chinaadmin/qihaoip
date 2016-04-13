<?php
namespace Index\Controller;
class PayController extends IndexBaseController {
	public $debugInfo;
	public function _initialize(){
		if(!strstr($_SERVER['SERVER_NAME'],'qihaoip.com')){
			$this->show_404('当前域名错误，无法支付！！！');
		}
	}
	/**
	 * 支付宝支付
	 */
	public function alipay($uid=0){//订单//
		return $this->error('该支付接口已暂停使用！');
		$row = $this->get_order($uid);
		$userid = get_userid();
		if($row){
			if($row['state']==1){
				$data = $this->get_data();
				$data['data'] = $row;
				$alipay = new \Common\Lib\Alipay();
				$data['html'] = $alipay->order($uid, $row['amount'], '7号网订单','7号网订单号：'.$uid,'http://www.qihaoip.com/');
				$this->assign('data',$data);
				return $this->display();
			} else {
				return $this->error('订单已支付，请刷新！');	
			}
		} else {
			return $this->error('订单不存在！');
		}
	}
	
	/**
	 * 支付宝支付返回页面
	 */
	public function alipay_return(){
		return $this->error('该支付接口已暂停使用！');
		$this->log_all();
		$alipay = new \Common\Lib\Alipay();
		if($alipay->verify()){//签名校验成功
			$get = I('get.');
			$out_trade_no = $get['out_trade_no'];//支付宝交易号
			$trade_no = $get['trade_no'];//支付流水号
			$trade_status = $get['trade_status'];//交易码
			if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
				if($this->order_success($out_trade_no, $trade_no)){
					return $this->redirect('/Member/Buyer/index');
				} else {
					$this->log($this->debugInfo, 'error');
					echo 'update fail';
				}
			} else {//否则怎么样
				$this->debugInfo = '交易码错误';
				$this->log($this->debugInfo, 'error');
				echo 'state fail';
			}
		} else {
			$this->debugInfo = '校验失败';
			$this->log($this->debugInfo, 'error');
			echo "fail";
		}
	}
	
	/**
	 * 支付宝支付异步通知页面
	 */
	public function alipay_notify(){
		return $this->error('该支付接口已暂停使用！');
		$this->log_all('POST');
		$alipay = new \Common\Lib\Alipay();
		if($alipay->verify()){//签名校验成功
			$out_trade_no = $_POST['out_trade_no'];//支付宝交易号
			$trade_no = $_POST['trade_no'];//交易状态
			$trade_status = $_POST['trade_status'];//交易码
			if($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {
				if($this->order_success($out_trade_no, $trade_no)){
					echo 'success';
				} else {
					$this->log($this->debugInfo, 'error');
					echo "fail";
				}
			} else {//否则怎么样
				$this->debugInfo = '交易码错误';
				$this->log($this->debugInfo, 'error');
				echo "fail";
			}
		} else {
			$this->debugInfo = '签名校验失败';
			$this->log($this->debugInfo, 'error');
			echo "fail";
		}
		exit;
	}
	
	
	/**
	 * 财付通支付
	 */
	public function tenpay($uid=0){//订单
		$row = $this->get_order($uid);
		$userid = get_userid();
		if($row){
			if($row['state']==1){
				$data = $this->get_data();
				$data['data'] = $row;
				$tenpay = new \Common\Lib\Tenpay();
				$data['html'] = $tenpay->order($uid, $row['amount'], '7号网订单','7号网订单号：'.$uid,'http://www.qihaoip.com/');
				$this->assign('data',$data);
				return $this->display();
			} else {
				return $this->error('订单已支付，请刷新！');
			}
		} else {
			return $this->error('订单不存在！');
		}
	}
	
	public function test(){
		$str = '{"bank_type":"BL","discount":"0","fee_type":"1","input_charset":"utf-8","notify_id":"NN1zI94i6h1Qhw-edE5TVhQIHeYvnrcnUt9y1W4qu-5QyAL4-3m8Qs7k0nHVo_gtkcZApkbhuClAm_Kh1XHjnZ609QB9RZVz","out_trade_no":"0118102947675250","partner":"1292875001","product_fee":"1","sign_type":"MD5","time_end":"20160118103506","total_fee":"1","trade_mode":"1","trade_state":"0","transaction_id":"1292875001201601180478186232","transport_fee":"0","sign":"BF14E8DAC2F849B53D905AEB20A3BFDF"}';
		$arr = json_decode($str,true);
		$_GET = $arr;
		$alipay = new \Common\Lib\Tenpay();
		dump($alipay->verify());
// 		print_r($arr);
	}
	/**
	 * 财付通支付返回页面
	 */
	public function tenpay_return(){
		$this->log_all();
		$alipay = new \Common\Lib\Tenpay();
		if($alipay->verify()){//签名校验成功
			$out_trade_no = $_GET['out_trade_no'];//订单号
			$trade_no = $_GET['transaction_id'];//支付流水号
			$trade_status = $_GET['trade_state'];//交易码
			if($trade_status == '0'){
				if($this->order_success($out_trade_no, $trade_no)){
					return $this->redirect('/Member/Buyer/index');
				} else {
					$this->log($this->debugInfo, 'error');
					echo 'update fail';
				}
			} else {//否则怎么样
				$this->debugInfo = '交易码错误';
				$this->log($this->debugInfo, 'error');
				echo 'state fail';
			}
		} else {
			$this->debugInfo = '签名校验失败！';
			$this->log($this->debugInfo, 'error');
			echo "fail";
		}
	}
	
	/**
	 * 财付通支付异步通知页面
	 */
	public function tenpay_notify(){
		return $this->error('该支付接口已暂停使用！');
		$this->log_all('GET');
		$alipay = new \Common\Lib\Tenpay();
		if($alipay->verify()){//签名校验成功
			$out_trade_no = $_GET['out_trade_no'];//订单号
			$trade_no = $_GET['transaction_id'];//支付流水号
			$trade_status = $_GET['trade_state'];//交易码
			if($trade_status == '0') {
				if($this->order_success($out_trade_no, $trade_no)){
					echo 'Success';
				} else {
					$this->log($this->debugInfo, 'error');
					echo "fail";
				}
			} else {//否则怎么样
				$this->debugInfo = '交易码错误！！！';
				$this->log($this->debugInfo, 'error');
				echo "fail";
			}
		} else {
			$this->debugInfo = '签名校验失败';
			$this->log($this->debugInfo, 'error');
			echo "fail";
		}
		exit;
	}
	
	/**
	 * 银联支付
	 */
	public function unionpay($uid=0){//订单
		$row = $this->get_order($uid);
		$userid = get_userid();
		if($row){
			if($row['state']==1){
				$data = $this->get_data();
				$data['data'] = $row;
				$unionpay = new \Common\Lib\Unionpay();
				$data['html'] = $unionpay->order($uid, $row['amount'], '7号网订单');
				$this->assign('data',$data);
				return $this->display();
			} else {
				return $this->error('订单已支付，请刷新！');
			}
		} else {
			return $this->error('订单不存在！');
		}
	}
	
	/**
	 * 银联支付返回页面
	 */
	public function unionpay_return(){
		$this->log_all('POST','Unionpay');
		if(IS_POST){
			$post = I('post.');
		} else {
			$post = I('get.');
		}
		$unionpay = new \Common\Lib\Unionpay();
		if($unionpay->notice()){
			if($this->order_success($post['orderId'], $post['queryId'])){
				return $this->redirect('/Member/Buyer/index');
			} else {
				$this->log($this->debugInfo, 'error');
				echo "fail";
			}
		} else {
			echo 'failed';
		}
	}
	
	/**
	 * 银联支付异步通知页面
	 */
	public function unionpay_notify(){
		$this->log_all('POST','Unionpay');
		$post = I('post.');
		$unionpay = new \Common\Lib\Unionpay();
		if($unionpay->notice()){
			if($this->order_success($post['orderId'], $post['queryId'])){
				echo 'success';
			} else {
				$this->log($this->debugInfo, 'error');
				echo "fail";
			}
		} else {
			echo 'failed';
		}
	}
	
	/**
	 * 京东支付
	 */
	public function jdpay($uid=0){//订单
		$row = $this->get_order($uid);
		$userid = get_userid();
		if($row){
			if($row['state']==1){
				$data = $this->get_data();
				$data['data'] = $row;
				$jdpay = new \Common\Lib\Jdpay();
				$data['html'] = $jdpay->order($uid, $row['amount'], '7号网订单','7号网订单号：'.$uid,'http://www.qihaoip.com/');
				$this->assign('data',$data);
				return $this->display();
			} else {
				return $this->error('订单已支付，请刷新！');
			}
		} else {
			return $this->error('订单不存在！');
		}
	}
	
	/**
	 * 京东支付返回页面
	 */
	public function jdpay_return(){
		$this->log_all('POST','jdpay');
		if(IS_POST){
			$post = I('post.');
		} else {
			$post = I('get.');
		}
		$jdpay = new \Common\Lib\Jdpay();
		if($jdpay->verify()){
			if($this->order_success($post['tradeNum'], $post['tradeNum'])){
				return $this->redirect('/Member/Buyer/index');
			} else {
				$this->log($this->debugInfo, 'error');
				echo "fail";
			}
		} else {
			echo 'failed';
		}
	}
	
	/**
	 * 京东支付异步通知页面
	 */
	public function jdpay_notify(){
		$this->log_all('POST','Jdpay');
		$post = I('post.');
		$jdpay = new \Common\Lib\Jdpay();
		if($jdpay->execute($post["resp"]) && '0000'==$jdpay->params_obj->RETURN->CODE){
			if($this->order_success($jdpay->params_obj->TRADE->ID, $jdpay->params_obj->TRADE->ID)){
				echo 'success';
			} else {
				$this->log($this->debugInfo, 'error');
				echo "fail";
			}
		} else {
			$this->log($jdpay->debugInfo, 'error');
			echo 'failed';
		}
	}
	
	/**
	 * 记录支付日志
	 * @param string $type
	 * @param string $method
	 */
	private function log_all($type='GET',$method='Alipay'){
		$logstr = ACTION_NAME.'-'.$type.'-'.date('y-m-d H:i:s').PHP_EOL;
		if($type=='GET'){
			$logstr .= json_encode($_GET);
		} else {
			$logstr .= json_encode($_POST);
		}
		$this->log($logstr, $method);
	}
	
	/**
	 * 日志记录
	 * @param 要记录的内容 $str
	 * @param 写入文件 $method
	 */
	private function log($str,$method){
		$logdir = LOG_PATH.'Pay/'.date('ym').'/';
		if(!is_dir($logdir)){
			mkdir($logdir,0777,true);
		}
		error_log($str.PHP_EOL,'3',$logdir.date('ymd').$method.'.log');
	}
	
	/**
	 * 获取订单
	 * @param 订单id $orderid
	 * @return 返回结果或者错误
	 */
	private function get_order($orderid){
		if($orderid){
			$where['uid'] = $orderid;//订单号
			$order = M('order');
			$re = $order->where($where)->find();
			if($re){
				return $re;
			} else {
				$this->debugInfo = $order->getDbError();
				return false;
			}
		} else {
			$this->debugInfo = '订单号错误！';
			return false;
		}
	}
	
	/**
	 * 支付成功，记录状态并且改变商品状态
	 * @param 订单号 $out_trade_no
	 * @param 支付流水 $trade_no
	 * @return 返回处理结果，成功或者失败
	 */
	private function order_success($out_trade_no,$trade_no){//订单号，支付流水号
		$nowdate = date('Ymd');
		$nowtime = time();
		$order = M('order');
	
		$where['uid'] = $out_trade_no;
		$row = $order->field('id,buyer,uid,amount')->where($where)->find();
		if($row){//如果订单存在
			$order->startTrans();//开启事务处理
			//保存支付流水
			unset($where);
			$where['payid'] = $trade_no;//查询条件
			
			$save['userid'] = $row['buyer'];//用户id
			$save['orderid'] = $row['uid'];//订单id
			$save['name'] = '订单支付';//名称
			$save['type'] = '3';//异动类型
			$save['date'] = $nowdate;//发生日期
			$save['datetime'] = $nowtime;//发生时间
			$save['money'] = $row['amount'];//支付金额
			$save['beginmoney'] = '-1';//此字段暂未用到
			$save['endmoney'] = '-1';//此字段暂未用到
			$save['adminid'] = '0';//操作员id，此逻辑未用到
			$moneylog = M('moneylog');
			if($moneylog->where($where)->find()){//一个支付订单对应一个流水！！！
				$pay = $moneylog->where($where)->save($save);//更新支付流水
			} else {
				$save['payid'] = $trade_no;//
				$pay = $moneylog->add($save);//添加支付流水
			}
			if(!$pay && $moneylog->getDbError()){//支付流水添加失败
				$order->rollback();//事务回滚
				$this->debugInfo = $moneylog->getDbError();
				return false;
			}
			$order_help = new \Common\Lib\Order_help($row['type']);//载入订单帮助类
			if($order_help->order_state($out_trade_no, '2',$trade_no)){//更改订单状态
				if($order_help->order_log($row['uid'], $row['buyer'], '0', '0', '2', '用户支付！')){//订单日志
					$order->commit();//事务提交
					return true;
				}
			}
			$this->debugInfo = $order_help->debugInfo;
			return false;
		} else {
			$this->debugInfo = '订单不存在。';
			return false;
		}
		return false;
	}
	
	/**
	 * 用户退款，订单作废
	 * @param 订单号 $out_trade_no
	 * @return boolean
	 */
	public function order_unset($out_trade_no){//订单作废
		$nowdate = date('Ymd');
		$nowtime = time();
	
		$order = M('order');
		$where['uid'] = $out_trade_no;
		$row = $order->where($where)->find();
		if(!$row){
			$this->debugInfo = '订单不存在！';
			return false;
		}
		if($row['state']!='1'){
			$this->debugInfo = '订单已支付，无法作废！';
			return false;
		}
		$order->startTrans();//开启事务处理
		$order_help = new \Common\Lib\Order_help($row['type']);//载入订单帮助类
		if($order_help->order_state($out_trade_no, '11')){//更改订单状态
			if($order_help->order_log($row['uid'], $row['buyer'], '0', '0', '11', '订单超时作废！')){//订单日志
				if($order_help->item_state($row['itemids'], '1')){//更改商品状态
					$order->commit();//事务提交
					return true;
				}
			}
		}
		$this->debugInfo = $order_help->debugInfo;
		$order->rollback();
		return false;
		//我操，还有积分和积分动态呢
	}
	
	
	
	
	/**
	 * 获取订单状态
	 * @param unknown $orders
	 * @return Ambigous <\Think\mixed, boolean, NULL, multitype:, unknown, mixed, string, object>|boolean
	 */
	private function get_orders($orders){
		if($orders){
			$uid = get_userid();
			$where['buyer'] = $uid;//买家正常
			$where['uid'] = $orders;//订单号（买家看到的）
			return M('orders')->where($where)->find();
		} else {
			return false;
		}
	}
	
	/**
	 * 支付成功，记录状态并且改变商品状态
	 * @param 订单号 $out_trade_no
	 * @param 支付流水 $trade_no
	 * @return boolean
	 */
	private function orders_success($out_trade_no,$trade_no){//订单号，支付流水号
		$nowdate = date('Ymd');
		$nowtime = time();
		$orders = M('orders');
		
		$where['uid'] = $out_trade_no;
		$row = $orders->field('id,buyer,uid,amount')->where($where)->find();
		if($row){//如果订单存在
		$orders->startTrans();//开启事务处理
		$save['state'] = '2';//状态
		$save['payid'] = $trade_no;
		$save['paydate'] = $nowdate;
		$save['paytime'] = $nowtime;
		$re = $orders->where($where)->save($save);//订单状态更改	
		//保存支付日志
		unset($where);
		$where['payid'] = $trade_no;//
		unset($save);
		
		$save['userid'] = $row['buyer'];//
		$save['orderid'] = $row['uid'];//
		$save['name'] = '订单支付';//
		$save['type'] = '3';//
		$save['date'] = $nowdate;//
		$save['datetime'] = $nowtime;//
		$save['money'] = $row['amount'];//
		$save['beginmoney'] = '-1';//
		$save['endmoney'] = '-1';//
		$save['adminid'] = '0';//
		$moneylog = M('moneylog');
		if(!$moneylog->where($where)->find()){//一个支付订单对应一个流水！！！
			$save['payid'] = $trade_no;//
			$pay = M('moneylog')->add($save);//添加支付流水
		}
		//支付记录
// 		$add[''] = '';//
		if($re!==false && $pay!==false){//状态更改成功且
			unset($save);
			$save['updatetime'] = $nowtime;//
			$save['state'] = '2';//
			//子订单状态修改
			$re = M('order')->where(['parent'=>$row['id']])->save($save);//订单状态更改
			if($re!==false){
				//订单日志创建
				$rows = M('order')->field('itemids,id')->where(['parent'=>$row['id']])->select();//购买的商品
				if(!empty($rows)){
					$ids = array();
					unset($row);
					foreach ($rows as $row){//获取商品的id
						//订单日志创建
						$ids[] = $row['itemids'];
					}
					$w['id'] = array('in',$ids);
					unset($save);
					
					$save['state'] = '6';//更改商品状态
					$re = M('item')->where($w)->save($save);
					
					if($re!==false){
						$orders->commit();//事务提交
						return true;
					} else {
						$orders->rollback();//事务回滚
					}
				} else {
					$orders->rollback();//事务回滚
				}
			} else {
				$orders->rollback();//事务回滚
			}
		} else {
			$orders->rollback();//事务回滚
		}
	} else {
		return false;
	}
		return false;
	}
	
	/**
	 * 用户退款，订单作废
	 * @param 订单号 $out_trade_no
	 * @return boolean
	 */
	public function orders_unset($out_trade_no){//订单作废
		$nowdate = date('Ymd');
		$nowtime = time();
		
		$orders = M('orders');
		$where['uid'] = $out_trade_no;
		$row = $orders->field('id')->where($where)->find();
		
		$orders->startTrans();//开启事务处理
		$save['state'] = '11';//状态
		$save['paydate'] = $nowdate;
		$save['paytime'] = $nowtime;
		$re = $orders->where($where)->save($save);//总订单状态更改
		if($re){
			unset($save);
			$save['updatetime'] = $nowtime;//
			$save['state'] = '11';//
			$re = M('order')->where(['parent'=>$row['id']])->save($save);//子订单状态更改
			if($re!==false){
				$rows = M('order')->field('itemids')->where(['parent'=>$row['id']])->select();
				if($rows && count($rows)){
					$ids = array();
					foreach ($rows as $row){
						$ids[] = $row['itemids'];
					}
					dump($rows);
					$w['id'] = array('in',$ids);
					unset($save);
					$save['state'] = '1';//商品状态更改
					$re = M('item')->where($w)->save($save);
					if($re!==false){
						$orders->commit();//事务提交
						return true;
					} else {
						$orders->rollback();//事务回滚
					}
				} else {
					$orders->rollback();//事务回滚
				}
			} else {
				$orders->rollback();//事务回滚
			}
		} else {
			$orders->rollback();//事务回滚
		}
		return false;
	}
	
	public function auto(){
		$where['datetime'] = array('LT',time()-3600*24);//时间小于24个小时内
		$where['state'] = '1';//状态为未支付
		$re = M('order')->where($where)->select();
		if($re){
			foreach ($re as $row){
				$this->order_unset($row['uid']);
			}
		}
	}
}