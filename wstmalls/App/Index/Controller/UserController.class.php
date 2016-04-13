<?php
namespace Index\Controller;
class UserController extends IndexBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	
	public function test(){
		$aids = M('member')->field('id')->where('admin=3')->select();
		dump($aids);
    	$rand = rand(0,count($aids));
    	$aid = $aids[$rand]['id'];
    	dump($rand);
    	dump($aid);
	}
	
    public function login($redirect=''){
    	$uid = session('user');
    	if(is_array($uid) && isset($uid['id'])){
    		return $this->redirect('/Member/User/index');
    	}
    	if(IS_POST){
    		if($redirect){
    			$loginurl = U('login',['redirect'=>$redirect]);
    		} else {
    			$loginurl = U('login');
    		}
    		$post = I('post.',0);
    		session('login_username',$post['username']);//登陆账号加入session，用户无须重新填写
    		if(is_array($post)){
    			if(false && !isset($post['captcha'])){//无须在这里验证码
    				return $this->error('验证码不能为空。',$loginurl);
    			} else {
    				if(!session('captcha_chk')){//如果验证失败
    					return $this->error('验证码校验未通过。',$loginurl);
    				} else {//验证码验证成功
    					if(!isset($post['username'])){
    						return $this->error('用户名不能为空。',$loginurl);
    					} else {
    						$m = M('member');
    						$re = $m->where(['username'=>$post['username'],'state'=>'1'])->find();
    						if(!$re){//如果没有查到用户,则多次查找
    							if(is_numeric($post['username'])){//是数字
    								$re = $m->where(['mobile'=>$post['username'],'state'=>'1'])->find();
    							} else if(strstr($post['username'], '@')){//是邮箱
    								$re = $m->where(['email'=>$post['username'],'state'=>'1'])->find();
    							}
    						}
    						if($re){
    							if(!isset($post['password'])){
    								return $this->error('密码不能为空。',$loginurl);
    							} else {
    								if($re['password'] == md5(md5($post['password']))){
    									jifen(1,$re['id']);//登录成功积分
    									$this->do_login($re,$redirect);
    								} else {
    									return $this->error('登陆失败，密码不正确！',$loginurl);
    								}
    							}
    						} else {
    							return $this->error('账号被禁用或者不存在。',$loginurl);
    						}
    					}
    				}
    			}
    		}
    	}
    	session('captcha_chk',false);//验证码是否验证通过改为false
    	$data = $this->get_data('4');
    	$data['title'] = '用户登陆';
    	
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 
     * @param 用户参数 $re
     * @param 跳转url $redirect
     */
    private function do_login($re,$redirect=''){//登陆要做的事情
    	$arr['id'] = $re['id'];//用户id
    	$garrname = M('Member')->where(['id'=>$re['id'],'idcardchk'=>'3'])->find();
    	if($garrname){
    		$arr['name'] = $garrname['name'];
    		$arr['img'] = $garrname['img'];
    	}
    	$arr['ugroup'] = $re['ugroup'];//会员组
    	$arr['username'] = $re['username'];//会员名
    	$garr = M('members')->where(['id'=>$re['ugroup']])->field('name')->find();
    	$arr['groupname'] = $garr['name'];//会员组名称
    	$rember = I('post.rember');
    	if($rember=='password'){//如果记住密码，则给一个比较长的过期时间....
    		$arr['time'] = time()+604800;
    	} else {
    		$arr['time'] = time();
    	}
    	session('user',$arr);//登录成功session
    	if(session('?cart')){//登录成功购物车移动到数据库
    		$cart = M('cart');
    		$cartdata = $cart->where(['id'=>$re['id']])->find();
    		$data['edittime'] = time();
    		if($cartdata){
    			$arr = json_decode($cartdata['item'],true);//取出数据库内的购物车
    			foreach (session('cart') as $k=>$v){
    				if(isset($arr[$k])){
    					$arr[$k] += $v;
    				} else {
    					$arr[$k] = $v;
    				}
    			}
    			$data['item'] = json_encode($arr);//更新到数据库内
    			$cart->where(['id'=>$re['id']])->save($data);
    		} else {
    			$data['item'] = json_encode(session('cart'));
    			$data['id'] = $re['id'];
    			$cart->add($data);
    		}
    		session('cart',null);
    	}
    	if($redirect){
    		$url = base64_decode($redirect);
    		return header('Location: '.$url);
    	} else {
    		return $this->redirect('/Member/User/index');
    	}
    }
    
    /**
     * 用户退出登陆
     * @param 登陆后定向url $redirect
     */
    public function logout($redirect=''){
    	$url = array();
    	if($redirect){
    		$url['redirect'] = $redirect;
    	}
    	if(session('?user')){//清除用户登录信息
    		session('user',null);
    	}
    	return $this->redirect('login',$url);
    }
    
    /**
     * 显示验证码
     */
    public function captcha(){//CAPTCHA
    	$Verify = new \Think\Verify();
    	$Verify->imageW = '160';
    	$Verify->imageH = '40';
    	$Verify->fontSize = '18';
    	$Verify->length = '4';
    	$Verify->useNoise = false;
    	$Verify->entry();
    }
    
    /**
     * 验证码验证
     */
    public function captcha_chk(){//验证码识别
    	$verify = new \Think\Verify();
    	if(IS_POST){
    		$captcha = I('post.captcha');
    	} else {
    		$captcha = I('get.captcha');
    	}
    	if(!$verify->check($captcha)){//如果验证失败
    		$restr = 'false';
    		session('captcha_chk',false);//验证码是否验证通过改为true
    	} else {
    		session('captcha_chk',true);//验证码是否验证通过改为true
    		$restr = 'true';
    	}
    	echo $restr;exit;
    }
    
    /**
     * 用户注册页面
     */
    public function register(){//注册
    	if(IS_POST){
    		$post = I('post.');
    		$data = array();
    		if(is_numeric($post['username']) && strlen($post['username'])==11){//手机号码
    			$type = 'telmsg';
    			$data['mobile'] = $post['username'];
    			$data['mobilechk'] = '3';//已验证
    		} else if(strstr($post['username'], '.') && strstr($post['username'], '@')){
    			$type = 'email';
    			$data['email'] = $post['username'];
    			$data['emailchk'] = '3';//已验证
    		} else {
    			return $this->error('用户名必须是手机号或者邮箱。');
    		}
    		if(strlen($post['password'])<6){
    			return $this->error('密码长度必须大于6位。');
    		}
    		
    		//随机获取经纪人
    		$aids = M('member')->field('id')->where('admin=3')->select();
    		$rand = rand(0,count($aids));
    		$aid = $aids[$rand]['id'];
    		//获取经纪人完毕
    		
    		$notice = new \Common\Lib\Notice();
    		if($notice->chk_pin($type,$post['username'],$post['pin'])){
    			$m = M('member');
    			$data['username'] = $post['username'];
    			$data['ugroup'] = '5';
    			$data['aid'] = $aid;
    			$data['regdate'] = date('Ymd');//
    			$data['regtime'] = time();
    			$data['password'] = md5(md5($post['password']));
    			$renum = $m->add($data);
    			if($renum){
    				jifen(4,$renum);
    				$re['id'] = $renum;//用户id
    				$arr['ugroup'] = '5';//会员组
    				$arr['username'] = $post['username'];//会员名
    				$this->success('注册成功，请登陆。',U('login'));
    				return $this->do_login($re);
    			} else {
    				return $this->error('注册失败！验证码错误或者已过期！');
    			}
    		} else {
    			return $this->error('验证码校验失败！');
    		}
    	}
    	$data = $this->get_data('4');
    	$data['title'] = '用户注册';
    	
    	$this->assign('data',$data);
    	return $this->display();
    }
    
    /**
     * 发送验证码到用户手机或者邮箱
     */
    public function send_pin(){//发送验证码
    	if(IS_AJAX){
    		$re = array();
    		$data = I('post.data');
    		$where['username'] = $data;
    		$where['mobile'] = $data;
    		$where['email'] = $data;
    		$where['_logic'] = 'OR';
    		if(strlen($data) && M('member')->where($where)->count()){
    			$re['success'] = false;
    			$re['errorMsg'] = '该用户已注册。';
    		} else {
    			if(is_numeric($data) && strlen($data)==11){//手机号码
    				$notice = new \Common\Lib\Notice();
    				$re = $notice->send_pin('telmsg',$data);
    			} else if(strstr($data, '.') && strstr($data, '@')){
    				$notice = new \Common\Lib\Notice();
    				$re = $notice->send_pin('email',$data);
    			} else {
    				$re['success'] = false;
    				$re['errorMsg'] = '手机号码或者邮箱填写不正确。';
    			}
    		}
    		
    		$this->ajaxReturn($re);
    	}
    }
    
    /**
     * 用户忘记密码
     */
    public function forget(){//忘记密码
    	if(IS_POST){
    		$post = I('post.');
    		$data = array();
    		if(is_numeric($post['username']) && strlen($post['username'])==11){//手机号码
    			$type = 'telmsg';
    			$where['mobile'] = $post['username'];
    			$data['mobilechk'] = '2';
    		} else if(strstr($post['username'], '.') && strstr($post['username'], '@')){
    			$type = 'email';
    			$where['email'] = $post['username'];
    			$data['emailchk'] = '2';
    		} else {
    			$type = '';
    		}
    		$notice = new \Common\Lib\Notice();
    		if($notice->chk_pin($type,$post['username'],$post['pin'])){
    			$m = M('member');
    			$where['username'] = $post['username'];
    			
    			$where['_logic'] = 'OR';
    			$row = $m->where($where)->count();//用户是否存在
    			if($row){//如果用户存在
    				$data['password'] = md5(md5($post['password']));
    				$m->where($where)->save($data);//修改密码，顺便验证手机或者邮箱
    				return $this->success('密码找回成功，请重新登陆！',U('login'));
    			} else {//用户不存在
    				return $this->error('用户不存在！');
    			}
    		} else {
    			return $this->error('验证码不正确！');
    		}
    	}
    	$data = $this->get_data();
    	$this->assign('data',$data);
    	$this->display();
    }
    
    /**
     * 忘记密码时发送验证码
     */
    public function send_forget_pin(){//发送验证码
    	if(IS_AJAX){
    		$re = array();
    		$data = I('post.data');
    		$where['username'] = $data;
    		$where['mobile'] = $data;
    		$where['email'] = $data;
    		$where['_logic'] = 'OR';
    		if(strlen($data) && M('member')->where($where)->count()){
    			if(is_numeric($data) && strlen($data)==11){//手机号码
    				$notice = new \Common\Lib\Notice();
    				$re = $notice->send_pin('telmsg',$data);
    			} else if(strstr($data, '.') && strstr($data, '@')){
    				$notice = new \Common\Lib\Notice();
    				$re = $notice->send_pin('email',$data);
    			} else {
    				$re['success'] = false;
    				$re['errorMsg'] = '手机号码或者邮箱填写不正确。';
    			}
    		} else {
    			$re['success'] = false;
    			$re['errorMsg'] = '该用户不存在';
    		}
    
    		$this->ajaxReturn($re);
    	}
    }
}