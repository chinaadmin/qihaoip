<?php
namespace Admin\Controller;
class LoginController extends AdminBaseController {
	private $_where = array();//查询条件
	private $_data = array();//数据数组
	private $_db = 'ad';//数据库
	private $_name = '';
	
	/**
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){//重写_initialize方法。覆盖session验证效果
		
	}
	
	/**
	 * 登陆
	 */
	public function index($redirect=''){//登陆登陆
		$admin = session('admin');
		if(is_array($admin) && isset($admin['id'])){//如果已经登录
			return $this->redirect('/Admin/Index/index');
		}
		if(IS_POST){
			if($redirect){
				$loginurl = U('index',['redirect'=>$redirect]);
			} else {
				$loginurl = U('index');
			}
			$post = I('post.',0);
			session('login_adminname',$post['username']);//登陆账号加入session，用户无须重新填写
			if(is_array($post)){
				$Verify = new \Think\Verify();
				if(isset($post['pin']) && $Verify->check($post['pin'])){//验证码验证
					if(!isset($post['username'])){
						return $this->error('用户名不能为空。',$loginurl);
					}
					if(!isset($post['password'])){
						return $this->error('密码不能为空。',$loginurl);
					}
					$m = M('member');
					$re = $m->where(['username'=>$post['username'],'state'=>'1','admin'=>array('GT','1')])->find();
					if($re){//如果用户查找成功
						if($re['password'] == md5(md5($post['password']))){//如果密码验证通过
							$arr['id'] = $re['id'];//用户id
    						$arr['lv'] = $re['admin'];//会员组
    						$arr['username'] = $re['username'];//会员名
    						if(isset($post['rember']) && $post['rember']=='password'){//如果记住密码，则给一个比较长的过期时间。
    							$arr['time'] = time()+604800;
    						} else {
    							$arr['time'] = time();
    						}
    						session('admin',$arr);//登录成功session
    						if($redirect){
    							$url = base64_decode($redirect);
    							return header('Location: '.$url);
    						} else {
    							return $this->redirect('/Admin/Index/index');
    						}
						} else {
							return $this->error('登陆失败，密码不正确！',$loginurl);
						}	
					} else {
						return $this->error('账号被禁用或者不存在。',$loginurl);
					}
				} else {
					return $this->error('验证码错误。',$loginurl);
				}
			}
		} else {
			$this->assign('login_adminname',session('login_adminname'));
			$this->display();
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
    	if(session('?admin')){//清除用户登录信息
    		session('admin',null);
    	}
    	return $this->redirect('Login/index',$url);
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
}