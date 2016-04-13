<?php
namespace Member\Controller;
use Common\BaseController;
class MemberBaseController extends BaseController {
	protected $_where = array();
	protected $userid = 0;
	protected $page = 1;
	protected $rows = 10;
	/***
	 * 模块控制器公共11类，所有模块下其他控制器类继承此类啊
	*/
	public function _initialize(){
		parent::_initialize();
		$user = session('user');
		if(is_array($user) && isset($user['id'])){
			$this->userid = $user['id'];
			/*******
			 $time = time();
			if($user['time'] && $user['time'] < $time){//如果有时间，且当前时间大于session时间
				if($time-$user['time']>5){//如果超过3600秒未动作，即退出登陆。
					$this->redirect('Index/User/logout',['redirect'=>base64_encode(get_url())]);
				} else {//刷新session时间
					session('user.time',$time);//时间刷新
				}
			}
			**/
		} else {
			$this->redirect('Index/User/login',['redirect'=>base64_encode(get_url())]);
		}
	}
	
	/**
	 * 检查用户的认证状态
	 */
	protected function chk_state(){
		$aid = M('Member')->where(array('id'=>$this->userid))->find();
		$error = false;
		$msg = '';
		if(!$aid['name']){
			$msg .= '请填写个人姓名！';
			$error = true;
		}
		if($aid['mobilechk'!='3']){
			$msg .= '请通过手机认证！';
			$error = true;
		}
		if($aid['emailchk']!='3'){
			$msg .= '请通过邮箱认证！';
			$error = true;
		}
		if($error){
			$this->error($msg,'/Member/User/showself');
			exit;
		}
	}
	
	protected function get_page($total,$page=1){
		$pagearr = I('get.');
		$rows = $this->rows;
		$minp = 1;
		$maxp = ceil($total/$rows);
		if($page<1){//第一页
			$this->page = $page = 1;
		} else if($page>$maxp){//最大页
			$this->page = $page = $maxp;
		} else {
			$this->page = $page;
		}
		$p = '';
		if($maxp<15){
			for($i=1;$i<=$maxp;$i++){
				if($i==$page){
					$p .= '    <li class="active"><span>'.$i.'</span></li>';
				} else {
					$pagearr['page'] = $i;
					$p .= '    <li><a href="'.U('',$pagearr).'">'.$i.'</a></li>';
				}
			}
		} else {
			if($page-1<6){
				for($i=1;$i<=9;$i++){
					if($i==3){
						$p .= '    <li class="disabled"><span>...</span></li>';//第一个分隔位
					}
					if($i==$page){
						$p .= '    <li class="active"><span>'.$i.'</span></li>';
					} else {
						$pagearr['page'] = $i;
						$p .= '    <li><a href="'.U('',$pagearr).'">'.$i.'</a></li>';
					}
				}
				$p .= '    <li class="disabled"><span>...</span></li>';//后一个分割
				$pagearr['page'] = $maxp-1;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.($maxp-1).'</a></li>';
				$pagearr['page'] = $maxp;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.$maxp.'</a></li>';
			} else if($maxp-$page<6){
				$pagearr['page'] = 1;
				$p .= '    <li><a href="'.U('',$pagearr).'">1</a></li>';
				$pagearr['page'] = 2;
				$p .= '    <li><a href="'.U('',$pagearr).'">2</a></li>';
				$p .= '    <li class="disabled"><span>...</span></li>';//第一个分隔位
				for($i=$maxp-9;$i<=$maxp;$i++){
					if($i==$maxp-2){
						$p .= '    <li class="disabled"><span>...</span></li>';//后一个分割
					}
					if($i==$page){
						$p .= '    <li class="active"><span>'.$i.'</span></li>';
					} else {
						$pagearr['page'] = $i;
						$p .= '    <li><a href="'.U('',$pagearr).'">'.$i.'</a></li>';
					}
				}
			} else {
				$pagearr['page'] = 1;
				$p .= '    <li><a href="'.U('',$pagearr).'">1</a></li>';
				$pagearr['page'] = 2;
				$p .= '    <li><a href="'.U('',$pagearr).'">2</a></li>';
				$p .= '    <li class="disabled"><span>...</span></li>';//第一个分隔位
				for($i=0;$i<7;$i++){
					if($i==3){
						$p .= '    <li class="active"><span>'.($page-3+$i).'</span></li>';
					} else {
						$pagearr['page'] = $page-3+$i;
						$p .= '    <li><a href="'.U('',$pagearr).'">'.($page-3+$i).'</a></li>';
					}
				}
	
				$p .= '    <li class="disabled"><span>...</span></li>';//后一个分割
				$pagearr['page'] = $maxp-1;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.($maxp-1).'</a></li>';
				$pagearr['page'] = $maxp;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.$maxp.'</a></li>';
			}
		}
		$p = '<ul>'.$p.'</ul>';
		if($page>1){
			$pagearr['page'] = $page-1;
			$p = '    <div class="qieleft"><a href="'.U('',$pagearr).'"><<上一页</a></div>'.$p;
		}
		if($page<$maxp){
			$pagearr['page'] = $page+1;
			$p .= '    <div class="qieleft"><a href="'.U('',$pagearr).'">下一页>></a></div>';
		}
		$p = '<div class="daohan">
<div class="qiehuan">
'.$p;//ul头
		if($maxp<15){
			$p .= '<div class="tiao">
<span>共'.$maxp.'页/'.$total.'条</span>
</div>
</div>
</div>
';//ul尾
		} else {
			$p .= '<div class="tiao">
<span>共'.$maxp.'页/'.$total.'条</span>
<form method="get" action="#" class="fudons">
<input type="text" name="page" value="'.$page.'" class="inps"/>
<input type="submit" value="GO" class="sub"/>
</form>
</div>
</div>
</div>
';//ul尾
		}
	
		return $p;
	}
}