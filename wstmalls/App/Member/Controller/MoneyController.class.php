<?php
namespace Member\Controller;
class MoneyController extends MemberBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 金额管理首页
	 */
    public function index(){
    	$this->redirect('jifen');
    }
    
    
    public function jifen($page=1,$clean=0){//积分流水
    	if($clean){session('member_jifen_search',null);}
    	if(IS_POST){
    		$search = I('post.value',0);
    		if($search){
    			session('member_jifen_search',$search);
    		}
    	}
    	 
    	if(session('?member_jifen_search')){
    		$search_data = session('member_jifen_search');
    		$s['id'] = $search_data;
    		$s['jifen'] = $search_data;
    		$s['datetime'] = array('like','%'.$search_data.'%');
    		$s['name'] = array('like','%'.$search_data.'%');
    		$s['_logic'] = 'OR';
    		$where['_complex'] = $s;
    		$data['search'] = $search_data;
    	}
    	$m = M('jifenlog');
    	$where['userid'] = $this->userid;
    	$num = $m->where($where)->count();
    	
    	$data['page'] = $this->get_page($num,$page);
    	
    	$data['data'] = $m->where($where)->order('id desc')->page($this->page,$this->rows)->select();
    	$data['user'] = M('member')->field('jifen,id')->where(['id'=>$this->userid])->find();
    	$this->assign('data',$data);
		$this->display();
    }
    
    public function jifenmall(){//积分兑换
    	$this->display();
    }
    
    public function paypass(){//修改支付密码
    	
    	$data['user'] = M('member')->field('id,paypass')->where(['id'=>$this->userid])->find();
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function money($page=1,$clean=0,$type=0){//资金流水
    	if($clean){session('member_money_search',null);}
    	if(IS_POST){
    		$search = I('post.search',0);
    		if($search){
    			session('member_money_search',$search);
    		}
    	}
    	if(session('?member_money_search')){
    		$search_data = session('member_money_search');
    		$s['id'] = $search_data;
    		$s['money'] = $search_data;
    		$s['datetime'] = array('like','%'.$search_data.'%');
    		$s['name'] = array('like','%'.$search_data.'%');
    		$s['_logic'] = 'OR';
    		$where['_complex'] = $s;
    		$data['search'] = $search_data;
    	}
    	$m = M('moneylog');
    	if($type){
    		$where['type'] = $type+0;
    	}
    	$where['userid'] = $this->userid;
    	$num = $m->where($where)->count();
//     	$data['user'] = M('member')->field('money,lockmoney')->where(['id'=>$this->userid])->find();
    	$data['page'] = $this->get_page($num,$page);
    	$data['data'] = $m->where($where)->page($this->page,$this->rows)->select();
//     	$shouru = $where;
//     	$shouru['type'] = '4';
//     	$data['shouru'] = $m->where($shouru)->sum('money');
    	$zhichu = $where;
    	$zhichu['type'] = '3';
    	$data['type'] = $type;
    	$data['zhichu'] = $m->where($zhichu)->sum('money');
    	
    	$this->assign('data',$data);
		$this->display();
    }
}