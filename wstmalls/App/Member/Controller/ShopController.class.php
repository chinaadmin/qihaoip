<?php
namespace Member\Controller;
class ShopController extends MemberBaseController {
	public function _initialize(){
		parent::_initialize();
		$member = M('member')->field('mobilechk')->where(['id'=>get_userid()])->find();
		if($member){
			if($member['mobilechk']!=3){
				return $this->error('您的手机验证尚未通过，请验证后再来！',U('User/showme'));
			}
		}
	}
	
	public function checkshop(){
		$shop_data = M('shop')->where(array('id'=>get_userid()))->find();
		if(!$shop_data){
			$this->error('开通商城才能进行客服设置！',U('shop/index'));
			exit;
		}
		if($shop_data['state'] != 3){
			$this->error('您的商城审核还未通过！',U('shop/index'));
			exit;
		}
	}
	
	/**
	 * 商城审核资料添加修改
	 */
	public function index(){
		$member = M('member')->where(array('id'=>get_userid()))->find();
		$data['shop'] = M('shop')->where(array('id'=>get_userid()))->find();
		if(!$data['shop']['phone']&&$member['mobile']){
			$data['shop']['phone'] = $member['mobile'];
		}
		if(!$data['shop']['email']&&$member['email']){
			$data['shop']['email'] = $member['email'];
		}
		if(IS_POST){
			$post = I('post.');
			$post['id'] = get_userid();
			$post['state'] = 2;
			$post['sort'] = 100;
			if(M('shop')->where(array('id'=>get_userid()))->find()){
				$res = M('shop')->save($post);
			}else{
				$res = M('shop')->add($post);
			}
			if($res){
				$this->success('提交审核成功！');
			}
		}
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 商城ajax保存资料
	 */
	public function ajax_save(){
		$send = I('post.send');
		$insert = array();
		$shop = M('shop');
		foreach ($send as $key=>$value){
			$insert[$value['name']] = $value['value'];
		}
		$insert['id'] = get_userid();
		$insert['sort'] = 100;
		if($shop->where(array('id'=>get_userid()))->find()){
			$res = $shop->save($insert);
		}else{
			$res = $shop->add($insert);
		}
	
		if($res){
			$this->ajaxReturn(array('code'=>1,'msg'=>'保存成功！'));
		}else{
			$this->ajaxReturn(array('code'=>0,'msg'=>'保存失败！'));
		}
	}
	
	/**
	 * ajax修改提示框的显示
	 */
	public function removemsg(){
		$chkstate = I('post.chkstate');
		$res = M('shop')->where(array('id'=>get_userid()))->save(array('chkstate'=>$chkstate));
	}
	
	/**
	 * 商城客服设置
	 */
	public function shopcus(){
		$this->checkshop();
		if(IS_POST){
			$post = I('post.');	
			foreach ($post['kfinfo'] as $key=>$value){
				if(!$value['qqchkshow']) $post['kfinfo'][$key]['qqchkshow'] =1;
			}
			if(!$post['showphone']) $post['showphone'] = 1;
			if(!$post['showtel']) $post['showtel'] = 1;
			foreach ($post['worktime'] as $key=>$value){
				if(!$value['workshow']) $post['worktime'][$key]['workshow'] =1;
			}
			$post['kfinfo'] = json_encode($post['kfinfo']);
			$post['worktime'] = json_encode($post['worktime']);
			$re = M('shop')->where(array('id'=>get_userid()))->save($post);
			if($re){
				$this->success('客服设置成功！');
			}else{
				$this->error('客服设置失败！');
			}
			exit;
		}
		$data = M('shop')->where(array('id'=>get_userid()))->find();
		$data['work'] = array(
				'周一'=>'周一',
				'周二'=>'周二',
				'周三'=>'周三',
				'周四'=>'周四',
				'周五'=>'周五',
				'周六'=>'周六',
				'周日'=>'周日',
		
		);
		$data['kfinfo'] = json_decode($data['kfinfo'],true);
		$data['worktime'] = json_decode($data['worktime'],true);
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 * 商品管理页面
	 */
	public function shopitem(){
		$this->checkshop();
		$data['shop'] = M('shop')->where(array('id'=>get_userid()))->find();
		$this->assign('data',$data);
		$this->display();
	}
	
	/**
	 *商品模块状态修改
	 */
	public function editshow(){
		if(IS_AJAX){
			$name = I('post.name');
			$value = I('post.value');
			$value = $value==1?'2':'1';	
			if($value=='2'){
				$type = '显示';
			}else{
				$type = '隐藏';
			}
			if($name == "showtm"){
				$show_name = '商标';
			}elseif($name == 'showpa'){
				$show_name = '专利';
			}else{
				$show_name = '特别推荐';
			}
			$re = M('shop')->where(array('id'=>get_userid()))->save(array($name=>$value));
			if($re){
				$this->ajaxReturn(array('code'=>1,'msg'=>'修改成功！','showmsg'=>$type.$show_name.'模块','value'=>$value));
			}else{
				$this->ajaxReturn(array('code'=>2,'msg'=>'修改失败！','showmsg'=>$type.$show_name.'模块','value'=>$value));
			}
			exit;
		}
	}

	public function shopad(){
		$data['shop'] = M('shop')->field('template')->where(array('id'=>get_userid()))->find();
		$tmp = C('TEMPLATE_TYPE')[$data['template']];
		
		$this->assign('data',$data);
		$this->display();
	}
	
	
	//根据groupid获取当前商品分类
	public function get_items($groupid){
		$re = M('items')->where(array('id'=>$groupid))->find();
		if(!$re['parentid']){
			return $re;
		}else{
			return $this->get_items($re['parentid']);
		}
	}
	
	public function showtemplate(){
		$template = I('post.template');
		$tmp = C('TEMPLATE_TYPE')[$template];
		$data['shop_re'] = M('shop')->where(array('id'=>get_userid()))->find();
		$data[ad][1] = M('shopad')->where(array('shopid'=>get_userid(),type=>1))->find();
		$data[ad][2] = M('shopad')->where(array('shopid'=>get_userid(),type=>2))->find();
		$data[ad][3] = M('shopad')->where(array('shopid'=>get_userid(),type=>3))->find();
		$data[ad][4] = M('shopad')->where(array('shopid'=>get_userid(),type=>4))->find();
		$data[ad][5] = M('shopad')->where(array('shopid'=>get_userid(),type=>5))->find();
		$data[ad][6] = M('shopad')->where(array('shopid'=>get_userid(),type=>6))->find();
		$data[ad][7] = M('shopad')->where(array('shopid'=>get_userid(),type=>7))->find();
		$num = $template == 2?'6':'7';
		$numtj = $template == 2?'8':'4';
			$data['trade'] = M('item')->where(array('tmpa'=>1,'state'=>'1','userid'=>get_userid(),'tmscreening3'=>'2'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($num)->select();
			$nid = array();
			foreach ($data['trade'] as $key=>$value){
				$nid[] = $value['id'];
				$data['trade'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total1 = count($data['trade']);
			$where = array('tmpa'=>1,'state'=>'1','userid'=>get_userid());
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total1<$num){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($num-$total1)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['trade'][$total1+$i] = $value;
					$data['trade'][$total1+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
			$data['pant'] = M('item')->where(array('tmpa'=>2,'state'=>'1','userid'=>get_userid(),'tmscreening3'=>'2'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($num)->select();
			$nid = array();
			foreach ($data['pant'] as $key=>$value){
				$nid[] = $value['id'];
				$data['pant'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total2 = count($data['pant']);
			$where = array('tmpa'=>2,'state'=>'1','userid'=>get_userid());
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total2<$num){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($num-$total2)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['pant'][$total2+$i] = $value;
					$data['pant'][$total2+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
		
			$data['tj'] = M('item')->where(array('state'=>'1','userid'=>get_userid(),'tmscreening3'=>'3'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($numtj)->select();
			$nid = array();
			foreach ($data['tj'] as $key=>$value){
				$nid[] = $value['id'];
				$data['tj'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total3 = count($data['tj']);
			$where = array('state'=>'1','userid'=>get_userid());
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total3<$numtj){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($numtj-$total3)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['tj'][$total3+$i] = $value;
					$data['tj'][$total3+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
		$this->assign('data',$data);
		$this->display($tmp);
		
	}
	
	public function edittemplate(){
		$shopm = M('shop');
		$template = I('post.template');
		$re = $shopm->where(array('id'=>get_userid()))->save(array('template'=>$template));
		$data['shop_re'] = M('shop')->where(array('id'=>get_userid()))->find();
		if($re){
			$tmp = C('TEMPLATE_TYPE')[$template];
			$data[ad][1] = M('shopad')->where(array('shopid'=>get_userid(),type=>1))->find();
			$data[ad][2] = M('shopad')->where(array('shopid'=>get_userid(),type=>2))->find();
			$data[ad][3] = M('shopad')->where(array('shopid'=>get_userid(),type=>3))->find();
			$data[ad][4] = M('shopad')->where(array('shopid'=>get_userid(),type=>4))->find();
			$data[ad][5] = M('shopad')->where(array('shopid'=>get_userid(),type=>5))->find();
			$data[ad][6] = M('shopad')->where(array('shopid'=>get_userid(),type=>6))->find();
			$data[ad][7] = M('shopad')->where(array('shopid'=>get_userid(),type=>7))->find();
			$num = $template == 2?'6':'7';
			$numtj = $template == 2?'8':'4';
			$data['trade'] = M('item')->where(array('tmpa'=>1,'state'=>'1','userid'=>get_userid(),'tmscreening3'=>'2'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($num)->select();
			$nid = array();
			foreach ($data['trade'] as $key=>$value){
				$nid[] = $value['id'];
				$data['trade'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total1 = count($data['trade']);
			$where = array('tmpa'=>1,'state'=>'1','userid'=>get_userid());
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total1<$num){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($num-$total1)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['trade'][$total1+$i] = $value;
					$data['trade'][$total1+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
			$data['pant'] = M('item')->where(array('tmpa'=>2,'state'=>'1','userid'=>get_userid(),'tmscreening3'=>'2'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($num)->select();
			$nid = array();
			foreach ($data['pant'] as $key=>$value){
				$nid[] = $value['id'];
				$data['pant'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total2 = count($data['pant']);
			$where = array('tmpa'=>2,'state'=>'1','userid'=>get_userid());
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total2<$num){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($num-$total2)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['pant'][$total2+$i] = $value;
					$data['pant'][$total2+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
			
			$data['tj'] = M('item')->where(array('state'=>'1','userid'=>get_userid(),'tmscreening3'=>'3'))->order(array('addtime'=>'desc','id'=>'asc'))->limit($numtj)->select();
			$nid = array();
			foreach ($data['tj'] as $key=>$value){
				$nid[] = $value['id'];
				$data['tj'][$key]['items'] = $this->get_items($value['groupid']);
			}
			$total3 = count($data['tj']);
			$where = array('state'=>'1','userid'=>get_userid());
			if($nid){
				$where['id']=array('not in'=>$nid);
			}
			if($total3<$numtj){
				$res = M('item')->where($where)->order(array('addtime'=>'desc','id'=>'asc'))->limit($numtj-$total3)->select();
				$i=0;
				foreach ($res as $key => $value){
					$data['tj'][$total3+$i] = $value;
					$data['tj'][$total3+$i]['items'] = $this->get_items($value['groupid']);
					$i++;
				}
			}
			$this->assign('data',$data);
			$this->display($tmp);
			exit;
		}else{
			$this->ajaxReturn(array('code'=>2,'msg'=>' 切换模板失败！'));
		}
	}
	
	public function save_ad(){
		$type = I('post.type');
		$insert = I('post.ad');
		foreach ($insert as $kye=>$value){
			$value['state'] = $value['state']?'1':'3';
			if($value['uid']){
				M('shopad')->where(array('uid'=>$value['uid']))->save($value);
			}else{
				$value['uid'] = get_uid();
				$value['shopid'] = get_userid();
				$value['sort'] = 100;
				$value['type'] = $type;
				M('shopad')->add($value); 
			}			
		}
		$this->redirect('Member/shop/shopad');
	}
	
	public function filebox(){
		$data['type'] = $type = I('post.type');
		$data['ad'] = M('shopad')->where(array('shopid'=>get_userid(),'type'=>$type))->select();
		$this->assign('data',$data);
		$this->display();
	}
	
	
	
}