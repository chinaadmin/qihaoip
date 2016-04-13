<?php
namespace Member\Controller;
class SellerController extends MemberBaseController {
	
	public function _initialize(){
		parent::_initialize();
		$this->_where['id'] = $this->userid;//用户的id永远等于session内的id
	}
	
    public function index($type='0'){
    	$where['seller'] =  $this->userid;
    	if($type){
    		$where['qh_order.state'] = $type;
    	} else {
    		$where['qh_order.state'] = array('lt','21');
    		$where['qh_order.sellerdel'] = '1';
    	}
    	$data['type'] = $type;
    	$order = M('order');
    	$total = $order->where($where)->count();
    	$Page = new \Org\Util\Pagem($total, '10'); //传入总记录数和每页显示的记录数
    	$data['page'] = $Page->show(); // 分页显示输出
		$data['data'] = $order->field('id,uid,type,buyer,itemids,amount,state,datetime,updatetime')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		foreach ($data['data'] as $k=>$row){
			$member = M('member');
			$member_arr = $member->field('name,mobile,email,qq,tel')->where(['id'=>$row['buyer']])->find();
			if($member_arr){//如果查找到买家名字
				$data['data'][$k] = array_merge($data['data'][$k],$member_arr);
			}
			$item = M('item');
			$item_arr = $item->field('id as sid,img,tmno,tmpa,title,tmtradeway')->where(['id'=>$row['itemids']])->find();
			if($item_arr){//如果找到了商品属性
				$data['data'][$k] = array_merge($data['data'][$k],$item_arr);
			}
			if($row['datetime']+3600*24-time()<=0){
				$wh['uid'] = $row['uid'];
				$state['state'] = '11';
				$order->where($wh)->save($state);
			};
		}
		
		$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 通过类型选择
     * @param number $id
     */
    public function get_select($tmpa=0,$id=0,$find=''){
    	$data = '    <option value ="0">未选择</option>';
    	if($tmpa){
    		$where['tmpa'] = $tmpa;
    	}
    	$where['parentid'] = $id;
    	$where['state'] = '1';
    	$re = M('items')->field('id,name')->where($where)->order('sort desc,id desc')->select();
    	if($re){
    		foreach ($re as $row){
    			if($find && $find==$row['id']){
    				$data .= '
                <option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
    			} else {
    				$data .= '
                <option value="'.$row['id'].'" >'.$row['name'].'</option>';
    			}
    		}
    	}
    	echo $data;
    }
    
    /**
     * 卖家显示订单
     * @param 订单id $uid
     */
    public function order_showseller($uid=0){
    	$where['seller'] = $this->userid;
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
    		$data['buyer'] = M('member')->where(['id'=>$re['buyer']])->find();
    		$data['data'] = $itemarr;
    		$data['hetong'] = $this->ajax_hetongzt($re['hetongid']);//合同主体
    		//$wh['default'] = '2';
    		//$wh['memberid'] = $data['buyer']['id']; 
    		//$data['hetong'] = M('hetongzt')->where($wh)->find();
    		$data['shourang'] = $this->ajax_shourangzt($re['shourangid']);//受让主体
    		//$data['shourang'] = M('shourangzt')->where($wh)->find();
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
     * ajax返回合同主体数据
     * 如果不传id，则返回默认主体
     * @param number $id
     */
    public function ajax_hetongzt($id=0){
    	$where['memberid'] = $this->userid;
    	if($id==0){
    		$where['default'] = '2';
    	} else {
    		$where['id'] = $id;
    	}
    	$ht = M('hetongzt');
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
     * 订单删除
     * @param 订单id $uid
     */
    public function order_del($uid=0,$redit=''){//只有超时，取消的订单才能删除
    	$where['uid'] = $uid;
    	$where['seller'] = $this->userid;
    	$order = M('order');
    	$row = $order->where($where)->find();
    	if($row){
    		if($row['state']=='11' || $row['state']=='12'){
    			//$re = $order->where($where)->save(['state'=>'22']);
    			$re = $order->where($where)->save(['sellerdel'=>'2']);
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
    
    public function sell_list(){
    	$name = trim(I("post.name"));
    	if(IS_GET){
	    	if(I('get.state')){
	    		$data['state'] = $where['state'] = I('get.state');
	    	}else{
	    		$where['state'] = array('neq',8);
	    	}
	    	if(I('get.tmpa')){
	    		$data['tmpa'] = $where['tmpa'] = I('get.tmpa');
	    	}
    	}
    	if(I('post.name')){
    		$where_p['title']  = array('like', '%'.$name.'%');
    		$where_p['tmno']  = array('like','%'.$name.'%');
    		$where_p['_logic'] = 'or';
    		$where['_complex'] = $where_p;
    		$data['name'] = I('post.name');
    	}
    	$where['userid'] = $this->userid;
    	$count = M('Item')->where($where)->count(); // 查询满足要求的总记录数
    	$Page = new \Org\Util\Pagenew ( $count, '10' ); // 实例化分页类 传入总记录数和每页显示的记录数
    	$data ['page'] = $Page->show (); // 分页显示输出
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$data ['item_data'] = M('Item')->where($where)->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function batch($type='0',$page='1'){
    	$data['type'] = $type;
    	if($type=='0'){
    		$data['name'] = '';
    	} else if($type=='1'){
    		$data['name'] = '商标';
    	} else {
    		$data['name'] = '专利';
    	}
    	$where['memberid'] = $this->userid;
    	$where['state'] = array('LT','10');
    	$batch = M('batch');
    	$num = $batch->where($where)->count();
    	$data['page'] = $this->get_page($num,$page);
    	$re = $batch->where($where)->page($this->page,$this->rows)->select();
    	$data['data'] = $re;
    	//获取当前用户上传的批量商品状态为正在上传的数量
    	$map['state'] = '2';
    	$map['memberid'] = $this->userid;
    	$data['count'] = $batch->where($map)->count();
    	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function batch_del($uid,$type){
    	$batch = M('batch');
    	$batch->where(['uid'=>$uid])->save(['state'=>'11']);
    	if($type=='1'){
    		$this->redirect("/Member/Seller/batch/type/1");
    	}else{
    		$this->redirect("/Member/Seller/batch/type/2");
    	}
    }
    
    /**
     * 批量上传商品
     */
    public function batch_upload(){
    	if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['name']){
    		if(strstr($_FILES['myfile']['name'], 'trademark')){//商标
    			$type = '1';
    		} else if(strstr($_FILES['myfile']['name'], 'patent')){//专利
    			$type = '2';
    		} else {
    			return $this->error('文件名不正确！');
    		}
    		$upload = new \Index\Controller\UploadController();//上传类
    		$filename = $upload->save_file('myfile','file');//上传文件
    		if($filename){//上传成功
    			$add['uid'] = get_uid();
    			$add['memberid'] = $this->userid;
    			$add['filename'] = $filename;
    			$add['starttime'] = time();
    			$add['type'] = $type;
    			$add['nums'] = '0';
    			$batch = M('batch');
    			$re = $batch->add($add);
    			if($re){
    				if($type=='1'){
    					$this->redirect("/Member/Seller/batch/type/1");
    				}else{
    					$this->redirect("/Member/Seller/batch/type/2");
    				}
    			} else {
    				return $this->error($batch->getDbError());
    			}
    			echo $filename;
    		} else {//上传失败
    			return $this->error($upload->debugInfo);
    		}
    		
    	} else {
    		return $this->error('请选择一个文件上传！');
    	}
    }
    
    public function edit(){
    	$data = I('get.');
    	$re = M('item')->where(array('id'=>$data['id']))->save($data);
    	if($data['state']==8){
    		$msg = '删除成功！';
    		$nmsg = '删除失败！';
    	}else{
    		$msg = '修改成功!';
    		$nmsg = '修改失败!';
    	}
    	if($re){
    		$trade = M('item')->where(array('id'=>$data['id']))->find();
    		$this->edit_gj(array('reg_id'=>$trade['tmno']));
    		$this->success($msg);
    	}else{
    		$this->error($nmsg);
    	}
    }
    
    /**
     * 发布商品(包含发布专利和发布商标两个版块)
     */
    public function releasegoods(){
    	$this->chk_state();
    	$model = M('Items');
    	//商标类别
    	$where['tmpa'] = '1';
    	$where['parentid'] = '0';
    	$data['trade']['category'] = $model->where($where)->select();
    	$data['trade']['region'] = C('ITEM_AREA_TYPE');//商标地区
    	$data['trade']['tradeway'] = C('ITEM_SELL_TYPE');//交易方式
    	$data['trade']['comtype'] = C('ITEM_REG_TYPE');//组合类型
    	//print_r($data['trade']);
    	//专利分类
    	$wh['tmpa'] = '2';
    	$wh['parentid'] = '0';
    	$data['patent']['category'] = $model->where($wh)->select();
    	$data['patent']['type'] = C('ITEM_PA_TYPE');//专利类型
    	$data['patent']['patentway'] = C('ITEM_SELL_TYPE');//交易方式
    	$data['patent']['patenteetype'] = C('ITEM_MASTER_TYPE');//专利权人类型
    	//print_r($data['patent']);
    	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 发布商品信息
     */
   	public function addgoods(){
   		$where['id'] = session('user.id');
   		$userinfo = M('Member')->where($where)->find();
	   	if(I('type') == 'trade'){
	   		$data['tmpa'] = '1';
	   		$data['groupid'] = I('tradecate');
	   		$data['groupid2'] = I('tradecate1');
	   		$data['groupid3'] = I('tradecate2');
	   		$data['title'] = I('tradename');
	   		$data['introduce'] = I('tradesellpoint');
	   		$data['price'] = I('tradeprice');
	   		if(I('tradepoundage')){
	   			$data['poundage'] = I('tradepoundage');//商品价格是否包含转让手续费
	   		}else{
	   			$data['poundage'] = '2';
	   		}
	   		$data['views'] = '27';
	   		$data['state'] = '2';
	   		$data['img'] = implode(',', I('tradeimg'));
	   		$data['userid'] = session('user.id');
	   		$data['aid'] = $userinfo['aid'];
	   		$data['adddate'] = date('Ymd');
	   		$data['addtime'] = time();
	   		$data['tmno'] = I('tradeno');
	   		$data['tmtype'] = I('tradecomtype');//组合类别
	   		$data['tmlimit'] = I('tradeproject');//商品服务项目
	   		$data['tmregdate'] = date('Ymd',strtotime(I('tradesqr')));//申请日
	   		$data['tmregstart'] = date('Ymd',strtotime(I('tradezcr')));//注册日
	   		if(I('tradejzr')){
	   			$data['tmregend'] = date('Ymd',strtotime(I('tradejzr')));//截止日期
	   		}
	   		$data['tmregarea'] = I('traderegion');//商品地区
	   		$data['tmtradeway'] = implode(',',I('tradeway'));//交易方式
	   	}elseif (I('type') == 'patent'){
	   		$data['tmpa'] = '2';
	   		$data['groupid'] = I('patentcate');
	   		$data['groupid2'] = I('patentcate1');
	   		$data['groupid3'] = I('patentcate2');
	   		$data['title'] = I('patentname');
	   		$data['introduce'] = I('patentsellpoint');
	   		$data['price'] = I('patentprice');
	   		if(I('patentpoundage')){
	   			$data['poundage'] = I('patentpoundage');//商品价格是否包含转让手续费
	   		}else{
	   			$data['poundage'] = '2';
	   		}
	   		$data['views'] = '27';
	   		$data['state'] = '2';
	   		$data['img'] = implode(',', I('patentimg'));
	   		$data['userid'] = session('user.id');
	   		$data['aid'] = $userinfo['aid'];
	   		$data['adddate'] = date('Ymd');
	   		$data['addtime'] = time();
	   		$data['tmno'] = I('patentsqh');
	   		//$data['inventor'] = I('patentinventor');
	   		//$data['agency'] = I('patentagency');
	   		$data['tmtype'] = I('patenttype');//专利类型
	   		$data['master'] = I('patentee');//专利权人
	   		$data['mastertype'] = I('patentholdertype');//专利权人类型
	   		if(I('patentsqr')){
	   			$data['tmregdate'] = date('Ymd',strtotime(I('patentsqr')));//申请日
	   		}
	   		$data['tmtradeway'] = implode(',',I('patentway'));//交易方式
	   		$data['introduce'] = I('patentsellpoint');//卖点展示
	   		$data['tmcontent'] = I('patentdetail');//专利详情（摘要）
	   	}
	   	$result = M('Item')->add($data);
	   	if($result){
	   		$msg['data'] = '添加成功！';
	   		$msg['state'] = '1';
	   	}else{
	   		$msg['data'] = '添加失败！';
	   		$msg['state'] = '2';
	   	}
	   	$this->ajaxReturn($msg);
   	}

   	/**
   	 *编辑专利页面
   	 **/
   	public function edit_pa(){
   		$condition['id'] = I('id');
   		$data['pa'] = M('Item')->where($condition)->find();
   		$data['pa']['tmregdate'] = date('Y-m-d',strtotime($data['pa']['tmregdate']));
   		$where['tmpa']= '2';
   		$where['parentid']= '0';
   		$data['pa']['category'] = M('Items')->where($where)->select();
   		$data['pa']['img'] = explode(',', $data['pa']['img']);
   		$data['pa']['patype'] = C('ITEM_PA_TYPE');//专利类型
   		$data['pa']['paway'] = C('ITEM_SELL_TYPE');//交易方式
   		$data['pa']['pateetype'] = C('ITEM_MASTER_TYPE');//专利权人类型
   		//print_r($data['pa']);
   		//print_r(ACTION_NAME);
   		 
   		$this->assign('data',$data);
   		$this->display('sendpatent');
   	}

   	/**
   	 *编辑商标页面
   	 **/
   	public function edit_tm(){
   		$condition['id'] = I('id');
   		$data['tm'] = M('Item')->where($condition)->find();
   		$data['tm']['tmregdate'] = date('Y-m-d',strtotime($data['tm']['tmregdate']));//申请日期
   		$data['tm']['tmregstart'] = date('Y-m-d',strtotime($data['tm']['tmregstart']));//注册日期
   		$data['tm']['tmregend'] = date('Y-m-d',strtotime($data['tm']['tmregend']));//截止日期
   		$data['tm']['img'] = explode(',', $data['tm']['img']);
   		$data['tm']['tmregion'] = C('ITEM_AREA_TYPE');//商标地区
    	$data['tm']['tmway'] = C('ITEM_SELL_TYPE');//交易方式
    	$data['tm']['tmcomtype'] = C('ITEM_REG_TYPE');//组合类型
    	//print_r($data['tm']);
   		
   		$this->assign('data',$data);
   		$this->display('sendtrade');
   	}
   	
   	/**
   	 * 修改商品信息
   	 */
   	public function editgoods(){
   		$where['id'] = I('uid');
   		if(I('type') == 'trade'){
   			$data['groupid'] = I('tradecate');
   			$data['groupid2'] = I('tradecate1');
   			$data['groupid3'] = I('tradecate2');
   			$data['title'] = I('tradename');
   			$data['introduce'] = I('tradesellpoint');
   			$data['price'] = I('tradeprice');
   			if(I('tradepoundage')){
   				$data['poundage'] = I('tradepoundage');//商品价格是否包含转让手续费
   			}else{
   				$data['poundage'] = '2';
   			}
   			$data['img'] = implode(',', I('tradeimg'));
   			$data['edittime'] = time();
   			$data['tmno'] = I('tradeno');
   			$data['tmtype'] = I('tradecomtype');//组合类别
   			$data['tmlimit'] = I('tradeproject');//商品服务项目
   			$data['tmregdate'] = date('Ymd',strtotime(I('tradesqr')));//申请日
   			$data['tmregstart'] = date('Ymd',strtotime(I('tradezcr')));//注册日
   			if(I('tradejzr')){
   				$data['tmregend'] = date('Ymd',strtotime(I('tradejzr')));//截止日期
   			}
   			$data['tmregarea'] = I('traderegion');//商品地区
   			$data['tmtradeway'] = implode(',',I('tradeway'));//交易方式
   		}elseif (I('type') == 'patent'){
   			$data['groupid'] = I('patentcate');
   			$data['groupid2'] = I('patentcate1');
   			$data['groupid3'] = I('patentcate2');
   			$data['title'] = I('patentname');
   			$data['introduce'] = I('patentsellpoint');
   			$data['price'] = I('patentprice');
   			if(I('patentpoundage')){
   				$data['poundage'] = I('patentpoundage');//商品价格是否包含转让手续费
   			}else{
   				$data['poundage'] = '2';
   			}
   			$data['img'] = implode(',', I('patentimg'));
   			$data['edittime'] = time();
   			$data['tmno'] = I('patentsqh');
   			//$data['inventor'] = I('patentinventor');
   			//$data['agency'] = I('patentagency');
   			$data['tmtype'] = I('patenttype');//专利类型
   			$data['master'] = I('patentee');//专利权人
   			$data['mastertype'] = I('patentholdertype');//专利权人类型
   			if(I('patentsqr')){
   				$data['tmregdate'] = date('Ymd',strtotime(I('patentsqr')));//申请日
   			}
   			$data['tmtradeway'] = implode(',',I('patentway'));//交易方式
   			$data['introduce'] = I('patentsellpoint');//卖点展示
   			$data['tmcontent'] = I('patentdetail');//专利详情（摘要）
   		}
   		$result = M('Item')->where($where)->save($data);
   		if($result){
   			$msg['data'] = '编辑成功！';
   			$msg['state'] = '1';
   		}else{
   			$msg['data'] = '编辑失败！';
   			$msg['state'] = '2';
   		}
   		$this->ajaxReturn($msg);
   	}

    public function edit_all(){
    	$data = array();
    	switch (I('get.act')){
    		case 'shangjia':
    			$data['state'] = 1;
    			$msg = '修改成功!';
    			$nmsg = '修改失败!';
    			break;
    		case 'xiajia':
    			$data['state'] = 4;
    			$msg = '修改成功!';
    			$nmsg = '修改失败!';
    			break;
    		case 'shangchu':
    			$data['state'] = 8;
    			$msg = '删除成功！';
    			$nmsg = '删除失败！';
    			break;
    		
    	}
    	$where['id'] = array('in',I('get.id'));
    	$re = M('item')->where($where)->save($data);
    	if($re){
    		$trade_data = M('item')->where($where)->select();
    		$ids = array();
    		foreach ($trade_data as $key=>$value){
    			$ids[] = $value['tmno'];
    		}
    		$this->edit_gj(array('reg_id'=>array('in',$ids)));
    			$this->success($msg);
    		}else{
    			$this->error($nmsg);
    		}
    }
    
   public function edit_gj($where){
   	$count = M('user_trade')->where($where)->count();
   	if($count){
   		M('user_trade')->where($where)->save(array('trading_state'=>'0'));
   	}
   }
    
    public function save_patent(){
    	if(IS_POST){
    		$aid = M('Member')->where(array('id'=>$this->userid))->find();
    		$save_data = I('post.');
    		$save_data['tmtradeway'] = implode(',',$save_data['tmtradeway']);
    		$save_data['img'] = implode(',',$save_data['img']);
    		$save_data['master'] = implode(',',$save_data['master']);
    		$save_data['tmpa'] = 2;
    		$save_data['state'] = 2;
    		$save_data['userid'] = $this->userid;
    		$save_data['aid'] =$aid['aid'];
    		$save_data['adddate'] = date('Ymd');
    		$save_data['addtime'] = time();
    		$save_data['edittime'] = time();
    		$re = M('item')->save($save_data);
    		if($re){
    			$this->success('发布成功!',U('Member/Seller/sell_list'));
    		}else{
    			$this->error('发布失败!');
    		} 
    	}
    }
    
    
    public function save_trade(){
    	if(IS_POST){
    		$aid = M('Member')->field('aid')->where(array('id'=>$this->userid))->find();
    		$save_data = I('post.');
    		$save_data['tmtradeway'] = implode(',',$save_data['tmtradeway']);
    		$save_data['img'] = implode(',',$save_data['img']);
    		$save_data['tmpa'] = 1;
    		$save_data['userid'] = $this->userid;
    		$save_data['aid'] =$aid['aid'];
    		$save_data['adddate'] = date('Ymd');
    		$save_data['addtime'] = time();
    		$save_data['edittime'] = time();
    		$re = M('item')->save($save_data);
    		if($re){
    			$this->success('发布成功!',U('Member/Seller/sell_list'));
    		}else{
    			$this->error('发布失败!');
    		}
    	
    	}
    }
    
    public function edit_tmscreening(){
    	$where = I('post.');
    	$re = M('item')->where(array('id'=>$where['id']))->save($where);
    	if($re){
    		$this->ajaxReturn(array('code'=>1,'msg'=>'修改成功！'));
    	}else{
    		$this->ajaxReturn(array('code'=>1,'msg'=>'修改失败！'));
    	}
    }
    
    
}