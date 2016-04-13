<?php
namespace Trade\Controller;
class TradeController extends TradeBaseController {
    public function showtrade(){
    	$data['items'] = M('Items')->where(array('parentid'=>'0','tmpa'=>'1','state'=>'1'))->select();
    	$data['type'] = IS_POST?true:I('get.p')?true:false;
    	$data['post'] = $post = I('post.')?I('post.'):I('get.');
    	$data['showtype'] = I('get.showtype')?I('get.showtype'):'';
    	$where = array();
    	if($post['name']=='name'){
    		$where['name'] = $post['paseach'];
    	}elseif($post['name']=='fsqr1'){
    		$where['fsqr1'] = $post['paseach'];
    	}elseif($post['name']=='id'){
    		$where['id'] = $post['paseach'];
    	}
    	if(isset($post['fclass']) && $post['fclass']){
    		$where['fclass'] = C('TYPE_CODE')[$post['fclass']];
    	}
    	$p = 0;
    	if(isset($post['p'])){
    		$p = $post['p'];
    	}
    	$data['trade'] = $this->get_trade($where,'10',$p);
    	$Page = new \Org\Util\Pagem( $data['trade']['result']['total'], '10' ); // 实例化分页类 传入总记录数和每页显示的记录数(10)
    	if($post['name']=='name'){
    		$where['ftmchin'] = $post['paseach'];
    		$where['ftmeng'] = $post['paseach'];
    		$where['ftmpy'] = $post['paseach'];
    		$Page->parameter['name']   =  'name';
    		$Page->parameter['paseach']   =  $post['paseach'];
    	}elseif($post['name']=='fsqr1'){
    		$where['fsqr1'] = $post['paseach'];
    		$Page->parameter['name']   =  'fsqr1';
    		$Page->parameter['paseach']   =  $post['paseach'];
    	}elseif($post['name']=='id'){
    		$where['id'] = $post['paseach'];
    		$Page->parameter['name']   =  'id';
    		$Page->parameter['paseach']   =  $post['paseach'];
    	}
    	if(isset($post['fclass']) && $post['fclass']){
    		$where['fclass'] = C('TYPE_CODE')[$post['fclass']];
    		$Page->parameter['fclass']   =  C('TYPE_CODE')[$post['fclass']];
    	}
    	$data ['page'] = $Page->show(); // 分页显示输出
    	foreach ($data['trade']['result']['items'] as $key=>$value){
    		$items_id = array_search($value['fclass'],C("TYPE_CODE"));
    		$items = M('items')->where(array('id'=>$items_id))->find();
    		$se['trade_id'] = $value['ftmid'];
    		$se['user_id'] = get_userid();
    		$re = M('user_trade')->where($se)->count();
    		if($re){
    			$data['trade']['result']['items'][$key]['tj'] = '1';
    		}else{
    			$data['trade']['result']['items'][$key]['tj'] = '2';
    		}
    		$data['trade']['result']['items'][$key]['name'] = $items['name'];
    	}
    	$this->assign('list',$data);
    	$this->display();
   	}
   	
   	public function ajax_delete(){
   		$post = I('post.reg_id');
   		$where['trade_id'] = $post;
    	$re = M('user_trade')->where($where)->delete();
    	if($re){
    		$this->ajaxReturn(array('code'=>1,'msg'=>'删除成功！'),'json');
    	}else{
    		$this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'),'json');
    	}
   	}
   	
   	public function ajax_add(){
   		$post = I('post.reg_id');
   		$count = M('user_trade')->where(array('trade_id'=>$post,'user_id'=>get_userid()))->count();
   		if($count){
   			$this->ajaxReturn(array('code'=>2,'msg'=>'商标已添加！'),'json');
   		}
   		$re = $this->get_one_trade($post);
//    		$trade_dynamic = $this->get_trade_dynamic($re['result']['items'][0]['ftmid'],$re['result']['items'][0]['fclass']);
//    		$trade_dynamic = array_reverse($trade_dynamic);
   		$insert = array(
   				'uid'=>get_uid(),
   				'trade_name'=>$re['result']['items'][0]['ftmchin'].$re['result']['items'][0]['ftmeng'].$re['result'][0]['items']['ftmpy'],
   				'user_id'=>get_userid(),
   				'trade_id'=>$re['result']['items'][0]['ftmid'],
   				'reg_id'=>$re['result']['items'][0]['fid'],
   				'trade_class_id'=>array_search($re['result']['items'][0]['fclass'],C('TYPE_CODE')),
   				'trade_user'=>$re['result']['items'][0]['fsqr1'],
   				'type'=>'1',
   				'tm_state'=>'1',
   				'email_msg_state'=>'0',
   				'combination_state'=>'',
   				'res_address'=>$re['result']['items'][0]['faddr'],
   				'sq_date'=>strtotime($re['result']['items'][0]['fsqdate']),
   				'zc_date'=>strtotime($re['result']['items'][0]['fzcdate']),
   				'zd_date'=>strtotime($re['result']['items'][0]['fjzdate']),
   				'service'=>$re['result']['items'][0]['fsysp'],
   				'trade_dynamic_state'=>$re['result']['items'][0]['fbguserid'],
   				'trade_dynamic'=>json_encode($re['dynamic']),
   		);
   		/* $where['trade_id'] = $re['result']['items'][0]['ftmid'];
   		$where['reg_id'] = $re['result']['items'][0]['fid'];
   		$where['_logic'] = 'OR'; */
   		$re = M('user_trade')->add($insert);
   		if($re){
   			$this->ajaxReturn(array('code'=>1,'msg'=>'添加成功！'),'json');
   		}else{
   			$this->ajaxReturn(array('code'=>2,'msg'=>'添加失败！'),'json');
   		}
   	}
  /**
   * 
   */
   	public function alladd(){
   		$ids = I('post.ids');
   		$cg = 0;
   		$sb = 0;
   		foreach ($ids as $key=>$value){
   			$post = $value;
//    			$where['ftmid'] = $post;
   			$re = $this->get_one_trade($post);
//    			$trade_dynamic = $this->get_trade_dynamic($re['result']['items'][0]['ftmid'],$re['result']['items'][0]['fclass']);
//    			$trade_dynamic = array_reverse($trade_dynamic);
//    			$dynamic = array();
//    			foreach ($trade_dynamic as $key=>$value){
//    				$dynamic[$key]['time'] = $value['fZTRQ'];
//    				$dynamic[$key]['type'] = $value['fZTDM'];
//    			}

   			$insert = array(
   					'trade_name'=>$re['result']['items'][0]['ftmchin'].$re['result']['items'][0]['ftmeng'].$re['result'][0]['items']['ftmpy'],
   					'user_id'=>get_userid(),
   					'trade_id'=>$re['result']['items'][0]['ftmid'],
   					'reg_id'=>$re['result']['items'][0]['fid'],
   					'trade_class_id'=>array_search($re['result']['items'][0]['fclass'],C('TYPE_CODE')),
   					'trade_user'=>$re['result']['items'][0]['fsqr1'],
   					'type'=>'1',
   					'tm_state'=>'1',
   					'email_msg_state'=>'0',
   					'combination_state'=>'',
   					'res_address'=>$re['result']['items'][0]['faddr'],
   					'sq_date'=>strtotime($re['result']['items'][0]['fsqdate']),
   					'zc_date'=>strtotime($re['result']['items'][0]['fzcdate']),
   					'zd_date'=>strtotime($re['result']['items'][0]['fjzdate']),
   					'service'=>$re['result']['items'][0]['fsysp'],
   					'trade_dynamic_state'=>$re['result']['items'][0]['fbguserid'],
   					'trade_dynamic'=>json_encode($re['dynamic']),
   			);
   			$wherea['trade_id'] = $re['result']['items'][0]['ftmid'];
   			$wherea['user_id'] = get_userid();
   			$res = M('user_trade')->where($wherea)->count();
   			if($res){
   				M('user_trade')->where($wherea)->save($insert);
   			}else{
   				$insert['uid'] = get_uid();
   				$redata = M('user_trade')->add($insert);
   				if($redata){
   					$cg++;
   				}else{
   					$sb++;
   				}
   			} 
   		}
   		$this->ajaxReturn(array('code'=>1,'msg'=>'您已成功添加'.$cg.'条商标信息！'));
   	}
   	
   	public function alldelete(){
   		$ids = I('post.ids');
   		$re = M('user_trade')->where(array('trade_id'=>array('in',$ids),'user_id'=>get_userid()))->delete();
   		if($re){
   			$this->ajaxReturn(array('code'=>1,'msg'=>'您已成功删除'.$re.'条商标信息！'));
   		}else{
   			$this->ajaxReturn(array('code'=>2,'msg'=>'删除失败！'));
   		}
   	}
   	
   	public function addtrade(){
   		$post = I('post.');
   		$dynamic = array(
   				'0'=>array(
   					'type'=>$post['trade_dynamic']	
   				)
   		);
   		$insert = array(
   				'uid'=>get_uid(),
   				'trade_name'=>$post['trade_name'],
   				'user_id'=>get_userid(),
   				'reg_id'=>$post['reg_id'],
   				'trade_class_id'=>$post['trade_class_id'],
   				'trade_user'=>$post['trade_user'],
   				'img'=>implode(',', $post['img']),
   				'type'=>$post['type']=='1'?$post['type']:'2',
   				'tm_state'=>'1',
   				'email_msg_state'=>'0',
   				'combination_state'=>'',
   				'sq_date'=>strtotime($post['sq_date']),
   				'zc_date'=>strtotime($post['zc_date']),
   				'zd_date'=>strtotime($post['zd_date']),
   				'service'=>$post['service'],
   				'trade_dynamic_state'=>$re['result']['items'][0]['fbguserid'],
   				'trade_dynamic'=>json_encode($dynamic),
   				'trade_dynamic_state'=>$post['trade_dynamic_state'],
   		);
   		$re = M('user_trade')->add($insert);
   		if($re){
   			$this->ajaxReturn(array('code'=>1,'msg'=>'添加商标成功！'));
   		}else{
   			$this->ajaxReturn(array('code'=>2,'msg'=>'添加商标失败！'));
   		}
   	}
}