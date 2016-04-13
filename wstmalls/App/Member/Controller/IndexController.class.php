<?php
namespace Member\Controller;
class IndexController extends MemberBaseController {
    public function index(){
    	$this->redirect('User/index');
    }
    
    public function nologin($act='tm',$test=''){
    	if($act!='tm' && $act!='pa'){
    		return $this->error('参数错误！');
    	}
    	$this->userid;
    	$data['Aurl'] = 'www.qihaoip.com';
    	$data['Auser'] = session('user.username');
    	$data['time'] = date('ymdHis');
    	$sign_key = 'wjefoij2343j4r89328jf3298jf9234f342f31';
    	$data['sign'] = sha1($sign_key.$data['Aurl'].$data['Auser'].$data['time']);
    	$data['act'] = $act;
    	$url = '';
    	foreach ($data as $k=>$v){
    		$url .= $k.'='.urlencode($v).'&';
    	}
    	if(isset($test) && $test=='test'){
    		header("Location:http://test.qihaoip.com/Home/Auto/login.html?".$url);
    	} else if($test=='zhouzheng'){
    		header("Location:http://zhouzheng.qihaoip.com/Home/Auto/login.html?".$url);
    	} else {
    		header("Location:http://v2.qihaoip.com/Home/Auto/login.html?".$url);
    	}
    }
}