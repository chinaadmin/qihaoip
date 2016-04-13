<?php
namespace Member\Controller;
class BuyerController extends MemberBaseController {
	public function index(){
		$this->redirect('order_list');
	}
	
	/**
	 * 订单列表
	 */
    public function order_list($type='0'){
    	$where['buyer'] =  $this->userid;
    	if($type){
    		$where['qh_order.state'] = $type;
    	} else {
    		$where['qh_order.state'] = array('lt','21');
    		$where['qh_order.buyerdel'] = '1';
    	}
    	$data['type'] = $type;
    	$order = M('order');
    	$total = $order->where($where)->count();
    	$Page = new \Org\Util\Pagem($total, '10'); //传入总记录数和每页显示的记录数
    	$data['page'] = $Page->show(); // 分页显示输出
		$data['data'] = $order->field('id,uid,type,seller,itemids,amount,state,datetime,updatetime')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		foreach ($data['data'] as $k=>$row){
			if($row['type']=='1'){
				$member = M('member');
				$member_arr = $member->field('name,username,mobile,email,qq,tel')->where(['id'=>$row['seller']])->find();
				if($member_arr){//如果查找到卖家名字
					$data['data'][$k] = array_merge($data['data'][$k],$member_arr);
				}
				$item = M('item');
				$item_arr = $item->field('id as sid,img,tmno,tmpa,title,tmtradeway')->where(['id'=>$row['itemids']])->find();
				if($item_arr){//如果找到了商品属性
					$data['data'][$k] = array_merge($data['data'][$k],$item_arr);
				}
			} else if($row['type']=='2'){
				$item = M('patent_member');
				$item_arr = $item->field('qh_patent_member.applynum,qh_patent_housekeeper.cname,qh_patent_housekeeper.picture,qh_patent_member.pay_total,qh_patent_member.annual')->join('qh_patent_housekeeper on qh_patent_housekeeper.patentnum =  qh_patent_member.applynum')->where(['qh_patent_member.id'=>array('in',$row['itemids'])])->select();
				if($item_arr){
					$data['data'][$k]['items'] = $item_arr;
				}
			}
			if($row['datetime']+3600*24-time()<=0){
				$wh['uid'] = $row['uid'];
				$state['state'] = '11';
				$order->where($wh)->save($state);
			};
		}
		//print_r($data['data']);
		
		$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 买家显示订单
     * @param 订单id $uid
     */
    public function order_show($uid=0){
    	$where['buyer'] = $this->userid;
    	$where['uid'] = $uid;
    	$order = M('order');
    	$re = $order->where($where)->find();
    	if(!$re){
    		return $this->error('出错了，该订单不存在。');
    	}
    	$data['order'] = $re;
    	if($re['type']=='1'){
    		$data['data']['count'] = 1;
    		$item = M('item');
    		$itemarr = $item->where(['id'=>$re['itemids']])->find();
    		$data['saler'] = M('member')->where(['id'=>$re['seller']])->find();
    		$data['data'] = $itemarr;
    		$data['hetong'] = $this->ajax_hetongzt($re['hetongid']);//合同主体
    		$data['shourang'] = $this->ajax_shourangzt($re['shourangid']);//受让主体
    		$data['hetongs'] = M('hetongzt')->field('name,id')->where(['memberid'=>$this->userid])->select();
    		$data['shourangs'] = M('shourangzt')->field('name,id')->where(['memberid'=>$this->userid])->select();
    		$v1 = $data['shourang']['type']==2?'受让人：':'公司名称：';
    		$v2 = $data['shourang']['type']==2?'身份证号：':'公司地址：';
    		$html = '<div class="col-xs-12"><span class="pull-left btn btn-sm btn-default" onclick="return show_sr();" style="display: none;">修改</span></div>';
    		$html .= $v1.$data['shourang']['name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<br/>';
    		$html .= $v2.$data['shourang']['info'];
    		$data['shouranghtml'] = $html;
    		 
    		$html = '<div class="col-xs-12"><span class="pull-left btn btn-sm btn-default" onclick="return show_ht();" style="display: none;">修改</span></div>';
    		$html .= '合同主体：'.$data['hetong']['name'].'<br/>';
    		$html .= '联系地址：'.$data['hetong']['address'].'<br/>';
    		$html .= '联系人：'.$data['hetong']['contact'].'<br/>';
    		$html .= '联系电话：'.$data['hetong']['tel'].'<br/>';
    		$data['hetonghtml'] = $html;
    	} else if($re['type']=='2'){
			$item = M('patent_member');
			$item_arr = $item->field('qh_patent_member.applynum,qh_patent_housekeeper.cname,qh_patent_housekeeper.picture,qh_patent_member.pay_total,qh_patent_member.annual')->join('qh_patent_housekeeper on qh_patent_housekeeper.patentnum =  qh_patent_member.applynum')->where(['qh_patent_member.id'=>array('in',$re['itemids'])])->select();
			if($item_arr){
				$data['data']['items'] = $item_arr;
				$data['data']['count'] = count($item_arr);
			}
		}
    	$data['orderlog'] = M('orderlog')->where(['orderid'=>$re['uid']])->order('id desc')->select();
    	$this->assign('data',$data);
    	return $this->display();
    }
    
    /**
     * 订单确认成功
     * @param 订单id $uid
     */
    public function order_success($uid=0){//只有待确认的订单才能确认成功
    	$where['uid'] = $uid;
    	$where['buyer'] = $this->userid;
    	$order = M('order');
    	$row = $order->where($where)->find();
    	if($row){
    		if($row['state']=='5'){
    			return $this->error('订单已确认成功，请勿重复确认。');
    		}
    		if($row['state']=='4'){
    			$order->startTrans();
    			$order_help = new \Common\Lib\Order_help($row['type']);//载入订单帮助类
    			if($order_help->order_state($uid, '5')){//更改订单状态
    				if($order_help->order_log($row['uid'], $this->userid, '0', '0', '5', '用户确认订单处理完毕！')){//订单日志
    					if($order_help->item_state($row['itemids'], '6')){//商品已售出
    						$order->commit();
    						return $this->success('订单确认成功！');
    					}
    				}
    			}
    			$order->rollback();
    			return $this->error($order_help->debugInfo);
    		} else {
    			return $this->error('订单状态不对，无法进行确认！');
    		}
    	} else {
    		return $this->error('订单不存在！');
    	}
    }
    
    /**
     * 订单删除
     * @param 订单id $uid
     */
    public function order_del($uid=0,$redit=''){//只有超时，取消的订单才能删除
    	$where['uid'] = $uid;
    	$where['buyer'] = $this->userid;
    	$order = M('order');
    	$row = $order->where($where)->find();
    	if($row){
    		if($row['state']=='11' || $row['state']=='12'){
    			//$re = $order->where($where)->save(['state'=>'21']);
    			$re = $order->where($where)->save(['buyerdel'=>'2']);
    			if(!$re && $order->getDbError()){
    				return $this->error($order->getDbError());
    			} else {
    				return header('Location: '.base64_decode($redit));
    			}
    		} else {
    			return $this->error('订单当前状态无法被删除！');
    		}
    	} else {
    		return $this->success('订单已删除或者不存在，请勿重复操作！');
    	}
    }
    
    /**
     * 订单撤销
     * @param 订单id $uid
     */
    public function order_unset($uid=0){//只有代付款订单才能撤销
    	$where['uid'] = $uid;
    	$where['buyer'] = $this->userid;
    	$order = M('order');
    	$row = $order->where($where)->find();
    	if($row){
    		if($row['state']=='11' || $row['state']=='12'){
    			return $this->error('订单已撤销，请勿重复操作。');
    		}
    		if($row['state']=='1'){
    			$order->startTrans();
    			$order_help = new \Common\Lib\Order_help($row['type']);//载入订单帮助类
    			if($order_help->order_state($uid, '12')){//订单状态更改成功
    				if($order_help->order_log($row['uid'], $this->userid, '0', '0', '12', '用户撤销订单！')){//订单日志添加成功
    					if($order_help->item_state($row['itemids'], '1')){//商品状态更改成功
    						//已消费积分返还呢？？？
    						$order->commit();
    						return $this->success('订单作废成功！');
    					}
    				}
    			}
    			$order->rollback();
    			return $this->error($order_help->debugInfo);
    		} else {
    			return $this->error('订单状态不对，无法进行撤销！');
    		}
    	} else {
    		return $this->error('订单不存在！');
    	}
    }
    /**
     * 求购信息列表
     */
    public function supply_list($tmpa='0'){
    	$userid = $this->userid;
    	$type = I('get.type');
    	$search = trim(I('get.search'));
    	if($search){
    		$data['url']['search'] = $search;
    		$where['title'] = array('like','%'.$search.'%');
    		$where['content'] = array('like','%'.$search.'%');
    		$where['_logic'] = 'OR';
    		$map['_complex'] = $where;
    	}
    	
    	$map['userid'] = $userid;
    	if($type){//如果type存在
    		$data['url']['type'] = $type;
    		$map['state'] = $type;
    		$data['type'] = $type;
    	} else {//否则
    		$data['type'] = 0;
    	}
    	if($tmpa){//如果tmpa存在
    		$data['url']['tmpa'] = $tmpa;
    		$map['tmpa'] = $tmpa;
    		$data['tmpa'] = $tmpa;
    	} else {//否则
    		$data['tmpa'] = 0;
    	}
    	$map['supplytype'] = 2;
    	$count = M('supply')->where($map)->count();
    	$Page = new \Org\Util\Pagem($count, '10' ); //传入总记录数和每页显示的记录数
    	$data['page'] = $Page->show(); // 分页显示输出
    	$data['data'] = M('supply')->field('*,(select name from qh_items where qh_items.id = qh_supply.groupid) as name')->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();//已发布	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 发布求购信息类别（包括商标和专利）
     */
    public function supply_add(){
    	$this->chk_state();
    	//发布商标求购信息类别
    	$where['tmpa'] = '1';
    	$where['parentid'] = '0';
    	$where['state'] = '1';
    	$data['tm'] = M('Items')->where($where)->select();
    	
    	//发布专利求购信息类别
    	$wh['tmpa'] = '2';
    	$wh['parentid'] = '0';
    	$wh['state'] = '1';
    	$data['pa'] = M('Items')->where($wh)->select();
    	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 添加求购信息（包括商品和专利）
     */
    public function addpurchaseinfo(){
    	$this->chk_state();
    	if(I('type')=='trade'){
    		$data['uid'] = get_uid();
    		$data['supplytype'] = '2';
    		$data['tmpa'] = '1';
    		$data['groupid'] = I('tradecate');
    		$data['userid'] = $this->userid;
    		$data['title'] = I('tradename');
    		$data['content'] = I('tradeinstruct');
    		$data['price'] = I('tradeprice');
    		$data['adddate'] = date('Ymd');
    		$data['addtime'] = time();
    		$data['views'] = '16';
    		if(I('tradecustime')=='1'){
    			$data['endtime'] = time()+2592000*6;
    		}elseif(I('tradecustime')=='2'){
    			$data['endtime'] = time()+2592000*12;
    		}else{
    			$data['endtime'] = I('tradeduetime');
    		}
    		$data['state'] = '2';
    	}elseif (I('type')=='patent'){
    		$data['uid'] = get_uid();
    		$data['supplytype'] = '2';
    		$data['tmpa'] = '2';
    		$data['groupid'] = I('patentcate');
    		$data['userid'] = $this->userid;
    		$data['title'] = I('patentname');
    		$data['content'] = I('patentinstruct');
    		$data['price'] = I('patentprice');
    		$data['adddate'] = date('Ymd');
    		$data['addtime'] = time();
    		$data['views'] = '16';
    		if(I('patentcustime')=='1'){
    			$data['endtime'] = time()+2592000*6;
    		}elseif(I('patentcustime')=='2'){
    			$data['endtime'] = time()+2592000*12;
    		}else{
    			$data['endtime'] = I('patentduetime');
    		}
    		$data['state'] = '2';
    	}else{
    		$this->show_404('该页面不存在！');
    	}
    	$result = M('Supply')->add($data);
    	if($result){
    		$msg['state'] = '1';
    		$msg['data'] = '发布成功！';
    	}else{
    		$msg['state'] = '2';
    		$msg['data'] = '发布失败！';
    	}
    	
    	$this->ajaxReturn($msg);
    }

    /**
     * 编辑专利求购信息
     */
    public function supply_paedit(){
    	$data['cate'] = $this->mybuy_cate();
    	$condition['tmpa'] = '2';
    	$condition['userid'] = $this->userid;
    	$condition['uid'] = I('uid');
    	$data['pa'] = M('Supply')->where($condition)->find();
    	$data['pa']['endtime'] = date('Y-m-d',$data['pa']['endtime']);
    	if($data['pa']['price'] > 0){
    		$data['pa']['price'] = $data['pa']['price'];
    	}else{
    		$data['pa']['price'] = '';
    	}
    	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 编辑商标求购信息
     */
    public function supply_tmedit(){
    	$data['cate'] = $this->mybuy_cate();
    	$condition['tmpa'] = '1';
    	$condition['userid'] = $this->userid;
    	$condition['uid'] = I('uid');
    	$data['tm'] = M('Supply')->where($condition)->find();
    	$data['tm']['endtime'] = date('Y-m-d',$data['tm']['endtime']);
    	if($data['tm']['price'] > 0){
    		$data['tm']['price'] = $data['tm']['price'];
    	}else{
    		$data['tm']['price'] = '';
    	}
		   	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 提交编辑商标求购和专利求购信息处理
     */
   	public function supply_edit(){
   		$where['uid'] = I('uid');
   		$where['userid'] = $this->userid;
   		if(I('type')=='trade'){
   		 $data['title'] = I('tmname');
   		 $data['groupid'] = I('tmcate');
   		 $data['price'] = I('tmprice');
   		 $data['content'] = I('tminstruct');
   		 $time = time();
   		 if(I('tmselecttime') == '0'){
   		 	$data['endtime'] = strtotime(I('tmendtime'));
   		 	if(!$data['endtime']){
   		 		$data['endtime'] = $time+86400*7;
   		 	}
   		 }elseif(I('tmselecttime') == '1'){
   		 	$data['endtime'] = $time+2592000*12;
   		 }elseif(I('tmselecttime') == '2'){
   		 	$data['endtime'] = $time+2592000*6;
   		 }
   		 $data['edittime'] = $time;
   		 $data['state'] = '2';//审核中
   		}elseif(I('type')=='patent'){
   			$data['title'] = I('paname');
   			$data['groupid'] = I('pacate');
   			$data['price'] = I('paprice');
   			$data['content'] = I('painstruct');
   			$time = time();
   			if(I('paselecttime') == '0'){
   				$data['endtime'] = strtotime(I('paendtime'));
   				if(!$data['endtime']){
   					$data['endtime'] = $time+86400*7;
   				}
   			}elseif(I('paselecttime') == '1'){
   				$data['endtime'] = $time+2592000*12;
   			}elseif(I('paselecttime') == '2'){
   				$data['endtime'] = $time+2592000*6;
   			}
   			$data['edittime'] = $time;
   			$data['state'] = '2';//审核中
   		}else{
    		$this->show_404('该页面不存在！');
    	}
    	$result = M('Supply')->where($where)->save($data);
    	if($result){
    		$msg['state'] = '1';
    		$msg['data'] = '编辑成功！';
    	}else{
    		$msg['state'] = '2';
    		$msg['data'] = '您没有做任何操作，编辑失败！';
    	}
    	$this->ajaxReturn($msg);
   	}
    /**
     * 求购信息列表的已发布的删除功能
     */
    public function supply_del(){
		$id = I('sid');
		$map['uid'] = array('in',$id);
		$map['userid'] = $this->userid;//用户id
		$releasedel = M('supply')->where($map)->delete();
		if(IS_AJAX){
			if($releasedel){
				$result = '1';
			}else {
				$result = '2';
			}
			echo $result;exit;
		} else {
			if($releasedel){
				$this->redirect('/Member/Buyer/supply_list');
			}else {
				$this->error(M('supply')->getDbError());
			}
		}
    }
    
    /**
     * 根据用户id获取订单信息
     */
    
    private function order_info($userid){
    //获取当前用户买进的订单
		$data['buy_data'] = M('order')->where(array('buyer'=>$userid))->order(array('id'=>'desc'))->select();
		foreach($data['buy_data'] as $key=>$value){
			$data['buy_data'][$key]['item'] = M('item')->where(array('id'=>$value['itemids']))->find();
			$data['sel_aid'] = M('member')->field('id,ugroup,aid,username,about,name,email,mobile,qq,img,tel')->where(array('id'=>$value['seller']))->find();
			$data['buy_data'][$key]['aidname'] = M('member')->field('id,ugroup,aid,username,about,name,email,mobile,qq,img,tel')->where(array('id'=>$data['sel_aid']['aid']))->find();
		}
    	return $data;
    }
    
    /**
     * 求购信息分类
     */
    private function mybuy_cate(){
		$map['parentid'] = '0';
		$map['state'] = '1';
		$cate = M('Items')->field('id,tmpa,name')->where($map)->order('sort DESC')->select();
		foreach ($cate as $key => $value){
			if($value['tmpa'] == 1){
				$arr['sb'][$key] = $value;
			}elseif ($value['tmpa'] == 2){
				$arr['zl'][$key] = $value;
			}
		}
    	return $arr;
    }
    
    /**
     * 购物车
     * @param number $page
     */
    public function cart(){
    	$userid = $this->userid;
    	$re = M('cart')->where(['id'=>$userid])->find();
    	if($re){
    		$cart = json_decode($re['item'],true);
    	} else {
    		$cart = array();
    	}
    	$cartid = array();
    	foreach ($cart as $k=>$v){//只获取其键
    		$cartid[] = $k;
    	}
    	if(!empty($cartid)){
    		$item = M('item');
    		$items = M('Items');
    		$count = $item->where(['id'=>array('in',$cartid)])->count();
    		$Page = new \Org\Util\Pagem($count, '10' ); //传入总记录数和每页显示的记录数
    		$data['page'] = $Page->show(); // 分页显示输出
    		$data['data'] = $item->where(['id'=>array('in',$cartid)])->limit($Page->firstRow.','.$Page->listRows)->select();
    		foreach ($data['data'] as $key => $value){
    			$where['goodsid'] = $value['id'];
    			$where['type'] = $value['tmpa'];
    			$where['state'] = '1';
    			$data['data'][$key]['collect'] = M('Favorite')->where($where)->find();
    			$wh['id'] = $value['groupid'];
    			$groupname = $items->where($wh)->getField('name');
    			$groupname = explode('-', $groupname);
    			$data['data'][$key]['groupname'] = $groupname['0'];
    		}
    	} else {
    		$data['page'] = '';
    		$data['data'] = array();
    	}
    	
    	$this->assign('data',$data);
		$this->display();
    }
    
    /**
     * 结账
     * @param number $id
     */
    public function chkout($id=0){
    	//$id = I('id');
    	//$where['memberid'] = $this->userid;
    	$where['id'] = $id;
    	$item = M('item');
    	$re = $item->where($where)->find();
    	//echo $item->getLastSql();
    	if(!$re){
    		return $this->error('出错了，该商品不存在。');
    	}
    	if($re['state']!='1'){
    		return $this->error('无法结算，商品可能已经被其他用户购买而锁定！');
    	}
    	if(IS_POST){
    		$post = I('post.');
    		if(!isset($post['allow']) || $post['allow']!='1'){
    			return $this->error('请阅读并点击同意《七号网服务协议》.');
    		}
    		if($re['tmpa']=='1'){//商标手续费
    			$fees = '1000.00';//手续费
    		} else {
    			$fees = '200.00';//手续费
    		}
    		$voucher = '0';//优惠券
    		$jifen = 0;//默认不使用积分
    		if(isset($post['use_jifen']) && $post['use_jifen']=='1'){//使用积分
    			$m = M('member');
    			$member = $m->where(['id'=>$this->userid])->find();
    			if(!$member){
    				$this->error('用户已过期,请重新登陆！','/Index/User/logout.html');
    			}
    			$jifen = $member['jifen'];
    		}
    		$item->startTrans();
    		$order_help = new \Common\Lib\Order_help('1');//载入订单帮助类
    		if($order_help->order_add($re['userid'], $re['aid'], $this->userid, $post['hetongid'], $post['shourangid'], $id, $re['price'], $fees, $jifen, $voucher, $post['about'])){//订单创建成功
    			if($order_help->order_log($order_help->uid, $this->userid, '0', '0', '1', '创建商品购买订单')){
    				if(isset($post['use_jifen']) && $post['use_jifen']=='1' && $jifen){//使用积分
    					if(!jifen('0',$this->userid,'0','积分抵现金（消费）',-$jifen)){//积分清空
    						return $this->error($GLOBALS['jifen_err']);
    					}
    				}
    				if($order_help->item_state($id, '5')){//更改商品状态
    					$item->commit();//提交事务
    					$cart = A('Index/Cart');//清空购物车
    					$cart->data_del($id);
    					return $this->redirect('/Index/Cart/pay',['uid'=>$order_help->uid]);
    				}
    			}
    			$item->rollback();//事务回滚
    			return $this->error($order_help->debugInfo);
    		} else {
    			$item->rollback();//事务回滚
    			return $this->error($order_help->debugInfo);
    		}
    	} else {
    		$data['item']['id'] = $id;
    		$data['saler'] = M('member')->where(['id'=>$re['userid']])->find();
    		$data['data'] = $re;
    		$data['hetong'] = $this->ajax_hetongzt();//合同主体
    		$data['shourang'] = $this->ajax_shourangzt();//受让主体
    		$data['hetongs'] = M('hetongzt')->field('name,id')->where(['memberid'=>$this->userid])->select();
    		$data['shourangs'] = M('shourangzt')->field('name,id')->where(['memberid'=>$this->userid])->select();
    		$data['jifen'] = M('member')->field('jifen')->where(['id'=>$this->userid])->find();
    		//print_r($data['hetong']);
    		
    		$this->assign('data',$data);
    		return $this->display();
    	}
    	
    }
    
    /**
     * 结账
     * @param number $id
     */
    public function tmpa_chkout($type='0',$ids='0'){
    	if($type!='2' && $type!='3'){
    		return $this->error('参数类型错误！');
    	}
    	$where['id'] = array('in',$ids);
    	if($type=='2'){
    		$m = M('patent_member');
    		$arr = $m->where($where)->select();
    		if($arr){
    			$money = 0;
    			$id = 0;
    			foreach ($arr as $row){
    				if($row['pay_total']>0){
    					$money += $row['pay_total'];
    					$id .= $row['id'].',';
    				}
    			}
    			$id = substr($id, 0, -1);
//     			echo $money;
    		} else {
    			return $this->error('指定的商标不存在！');
    		}
    	} else {
    		$m = M('user_trade');
    		$arr = $m->where($where)->select();
    		if($arr){
    			$money = 0;
    			foreach ($arr as $row){
    				$money += $row['is_paycost'];
    			}
    			 
    		} else {
    			return $this->error('指定的专利不存在！');
    		}
    		 
    	}
    	$m->startTrans();
    	$order_help = new \Common\Lib\Order_help($type);//载入订单帮助类
    	if($order_help->order_add('0', '0', $this->userid, '0', '0', $id, $money, '0.00', '0', '0', '')){//订单创建成功
    		if($order_help->order_log($order_help->uid, $this->userid, '0', '0', '1', '创建专利年费代缴订单')){
    			$m->commit();//提交事务
    			return $this->redirect('order_list');
    		}
    	}
    	$m->rollback();//事务回滚
    	return $this->error($order_help->debugInfo);
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
    /**
     * ajax返回合同主体数据
     * 如果不传id，则返回默认主体
     * @param number $id
     */
    public function ajax_hetongzt($id=0){	
    	$ht = M('hetongzt');
    	if($id==0){
    		$where['memberid'] = $this->userid;
    		$where['default'] = '2';
    		$re = $ht->where($where)->find();
    		if(!$re){
    			$wh['memberid'] = $this->userid;
    			$wh['default'] = '1';
    			$re = $ht->where($wh)->find();
    		}
    	} else {
    		$where['id'] = $id;
    		$re = $ht->where($where)->find();
    	}
    	if(IS_AJAX){
    		if($re){
    			$re['success'] = true;
    			$this->ajaxReturn($re);
    		} else {
    			$return['success'] = false;
    			$return['msg'] = '暂无数据';
    			$this->ajaxReturn($return);
    		}
    	} else {
    		return $re;
    	}
    }
    
    /**
     * 返回受让主体信息
     * 如果不传id，则返回默认主体
     * @param number $id
     */
    public function ajax_shourangzt($id=0){
    	$where['memberid'] = $this->userid;
    	if($id==0){
    		$where['default'] = '2';
    	} else {
    		$where['id'] = $id;
    	}
    	$ht = M('shourangzt');
    	$re = $ht->where($where)->find();
    	if(IS_AJAX){
    		if($re){
    			$re['success'] = true;
    			$this->ajaxReturn($re);
    		} else {
    			$return['success'] = false;
    			$return['msg'] = '暂无数据';
    			$this->ajaxReturn($return);
    		}
    	} else {
    		return $re;
    	}
    }
    
   /**
    * 收藏资讯
    */
    public function collect_info($p=1){
    	$where['f.userid'] = $this->userid;//用户id
    	$where['title'] = array('like','%'.I('search').'%');
    	$where['type'] = '3';//1为商标，2为专利，3为资讯，4为店铺类型
    	$where['a.state'] = '1';//1为数据正常
    	/* 数据分页 */
    	$count = M('Favorite f')->join('left join qh_article a ON a.id = f.goodsid')->where($where)->count();
    	$pagesize = 8;
    	$page = new \Org\Util\ZlgjPage($count,$pagesize);//实例化分类页
    	if($count && $count > $pagesize){
    		$data['page'] = $page->getPage();//数据分页
    	}
    	$data['info'] = M('Favorite f')->where($where)->join('left join qh_article a ON a.id = f.goodsid')->field('f.id,f.goodsid,f.addtime,a.date,a.title,a.state')->limit(($p-1)*$pagesize,$pagesize)->select();
    	//print_r($data['info']);
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 收藏店铺
     */
    public function collect_shop($p=1){
    	$where['f.userid'] = $this->userid;//用户id
    	$where['name'] = array('like','%'.I('search').'%');
    	$where['type'] = '4';//1为商标，2为专利，3为资讯，4为店铺类型
    	$where['f.state'] = '1';//1为数据正常
    	/* 数据分页 */
    	$count = M('Favorite f')->join('left join qh_shop s ON s.id = f.goodsid')->where($where)->count();
    	$pagesize = 8;
    	$page = new \Org\Util\ZlgjPage($count,$pagesize);//实例化分类页
    	if($count && $count > $pagesize){
    		$data['page'] = $page->getPage();//数据分页
    	}
    	$data['shop'] = M('Favorite f')->join('left join qh_shop s ON s.id = f.goodsid')->field('f.id,f.addtime,f.state,s.id as sid,s.name,s.logo')->where($where)->limit(($p-1)*$pagesize,$pagesize)->select();
		
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 收藏商品（包括商标和专利）
     */
    public function collect_goods($p=1){
    	$data['search'] = trim(I('search'));
    	$data['type'] = I('type');
    	$map['title'] = array('like','%'.$data['search'].'%');
    	$map['tmno'] = array('like','%'.$data['search'].'%');
    	$map['_logic'] = 'OR';
    	$where['_complex'] = $map;
    	if(I('type')=='1'){
    		$where['tmpa'] = '1';//1为商标，2为专利，3为资讯，4为店铺类型
    	}elseif (I('type')=='2'){
    		$where['tmpa'] = '2';//1为商标，2为专利，3为资讯，4为店铺类型
    	}else{
    		$where['tmpa'] = array(array('eq','1'),array('eq','2'),'OR');//1为商标，2为专利，3为资讯，4为店铺类型
    	}
    	$where['f.state'] = '1';//1为数据正常
    	$where['f.userid'] = $this->userid;//用户id
    	/* 数据分页 */
    	$count = M('Favorite f')->join('left join qh_item i ON i.id = f.goodsid')->where($where)->count();
    	$pagesize = 8;
    	$page = new \Org\Util\ZlgjPage($count,$pagesize);//实例化分类页
    	if($count && $count > $pagesize){
    		$data['page'] = $page->getPage();//数据分页
    	}
    	$data['goods'] = M('Favorite f')->join('left join qh_item i ON i.id = f.goodsid')->field('f.id,f.type,f.goodsid,f.addtime,i.img,i.title,i.groupid,i.tmno,i.price')->where($where)->limit(($p-1)*$pagesize,$pagesize)->select();
		foreach ($data['goods'] as $key => $value){
			$map['id'] = $value['groupid'];
			$groupname = M('Items')->where($map)->getField('name');
			$groupname = explode('-', $groupname);
			$data['goods'][$key]['groupname'] = $groupname[0];
			$img = explode(',', $value['img']);
			$data['goods'][$key]['img'] = $img[0];
			if($value['price'] > 0){
				$data['goods'][$key]['price'] = $value['price'];
			}else{
				$data['goods'][$key]['price'] = '面议';
			}
		}
		
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 买家中心会员收藏删除功能
     */
    public function collect_delete(){
    	$where['id'] = array('in',I('id'));
    	$result = M('Favorite')->where($where)->delete();
    	if($result){
    		$msg['state'] = '1';
    		$msg['data'] = '删除成功！';
    	}else{
    		$msg['state'] = '2';
    		$msg['data'] = '删除成功！';
    	}
    	
    	$this->ajaxReturn($msg);
    }
}