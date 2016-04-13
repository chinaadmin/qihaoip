<?php
namespace Admin\Controller;
use Common\BaseController;
class AdminBaseController extends BaseController {
	/**
	 * 模块控制器公共类，所有模块下其他控制器类继承此类
	*/
	public function _initialize(){
		parent::_initialize();
		$admin = session('admin');
		if($admin['id']){
			/******
			 * $admin['lv'];
			 $time = time();
			 if($admin['time'] && $admin['time'] < $time){//如果有时间，且当前时间大于session时间
			 	if($time-$admin['time']>7200){//如果超过7200秒未动作，即退出登陆。
			 		$this->redirect('Login/logout',['redirect'=>base64_encode(get_url())]);
			 	} else {//刷新session时间
			 		session('admin.time',$time);//时间刷新
				}
			 }**/
		} else {
			return $this->redirect('Login/index',['redirect'=>base64_encode(get_url())]);
		}
	}
	protected $chk = true;
	public $debug = '';
	/**
	 * 管理端的分页设置
	 * @param unknown $total
	 * @param number $page
	 * @param number $rows
	 */
	public function admin_page($total,$page=1,$rows=20){
		$pagearr = array();
		if(isset($rows) && $rows != 20){
			$pagearr['rows'] = $rows;
		}
		$minp = 1;
		$maxp = ceil($total/$rows);
		if($page<1){//第一页
			$page = 1;
		} 
		if($page>$maxp){//最大页
			$page = $maxp;
		}
		$p = '';
		if($maxp<15){
			for($i=1;$i<=$maxp;$i++){
				if($i==$page){
					$p .= '    <li class="active"><span>'.$i.'</span></li>
';
				} else {
					$pagearr['page'] = $i;
					$p .= '    <li><a href="'.U('',$pagearr).'">'.$i.'</a></li>
';
				}
			}
		} else {
			if($page-1<6){
				for($i=1;$i<=9;$i++){
					if($i==3){
						$p .= '    <li class="disabled"><span>...</span></li>
';//第一个分隔位
					}
					if($i==$page){
						$p .= '    <li class="active"><span>'.$i.'</span></li>
';
					} else {
						$pagearr['page'] = $i;
						$p .= '    <li><a href="'.U('',$pagearr).'">'.$i.'</a></li>
';
					}
				}
				$p .= '    <li class="disabled"><span>...</span></li>
';//后一个分割
				$pagearr['page'] = $maxp-1;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.($maxp-1).'</a></li>
';
				$pagearr['page'] = $maxp;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.$maxp.'</a></li>
';
			} else if($maxp-$page<6){
				$pagearr['page'] = 1;
				$p .= '    <li><a href="'.U('',$pagearr).'">1</a></li>
';
				$pagearr['page'] = 2;
				$p .= '    <li><a href="'.U('',$pagearr).'">2</a></li>
';
				$p .= '    <li class="disabled"><span>...</span></li>
';//第一个分隔位
				for($i=$maxp-9;$i<=$maxp;$i++){
					if($i==$maxp-2){
						$p .= '    <li class="disabled"><span>...</span></li>
';//后一个分割
					}
					if($i==$page){
						$p .= '    <li class="active"><span>'.$i.'</span></li>
';
					} else {
						$pagearr['page'] = $i;
						$p .= '    <li><a href="'.U('',$pagearr).'">'.$i.'</a></li>
';
					}
				}
			} else {
				$pagearr['page'] = 1;
				$p .= '    <li><a href="'.U('',$pagearr).'">1</a></li>
';
				$pagearr['page'] = 2;
				$p .= '    <li><a href="'.U('',$pagearr).'">2</a></li>
';
				$p .= '    <li class="disabled"><span>...</span></li>
';//第一个分隔位
				for($i=0;$i<7;$i++){
					if($i==3){
						$p .= '    <li class="active"><span>'.($page-3+$i).'</span></li>
';
					} else {
						$pagearr['page'] = $page-3+$i;
						$p .= '    <li><a href="'.U('',$pagearr).'">'.($page-3+$i).'</a></li>
';
					}
				}
				
				$p .= '    <li class="disabled"><span>...</span></li>
';//后一个分割
				$pagearr['page'] = $maxp-1;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.($maxp-1).'</a></li>
';
				$pagearr['page'] = $maxp;
				$p .= '    <li><a href="'.U('',$pagearr).'">'.$maxp.'</a></li>
';
			}
		}
		if($page>1){
			$pagearr['page'] = $page-1;
			$p = '    <li>
      <a href="'.U('',$pagearr).'" aria-label="Previous">
        <span aria-hidden="true">&laquo;上一页</span>
      </a>
    </li>
'.$p;
		}
		if($page<$maxp){
			$pagearr['page'] = $page+1;
			$p .= '    <li>
      <a href="'.U('',$pagearr).'" aria-label="Next">
        <span aria-hidden="true">下一页&raquo;</span>
      </a>
    </li>
';
		}
		$p = '  <ul class="pagination pagination-sm">
'.$p;//ul头
		if($maxp<15){
			$p .= '    <li>&nbsp;共'.$total.'条/'.$maxp.'页&nbsp;&nbsp;&nbsp;&nbsp;</li>
  </ul>
';//ul尾
		} else {
			$p .= '    <li>&nbsp;共'.$total.'条/'.$maxp.'页&nbsp;&nbsp;&nbsp;&nbsp;转到</li>
     <li>
      <div class="input-group col-md-1 col-xs-1">
      <input type="text" name="page" class="form-control input-sm" placeholder="1" value="'.$page.'">
      <span class="input-group-btn">
      <button class="btn btn-default btn-sm" type="submit">页</button>
      </span>
      </div>
     </li>
  </ul>
';//ul尾
		}
		
		return $p;
	}
	
	/**
	 * 字符串验证函数如果验证未通过，后面的值不再验证
	 * @param unknown $k 数据的key
	 * @param string $name 数据中文名称
	 * @param number $min 数据最小值
	 * @param number $max 数据最大值
	 * @return Ambigous <mixed, NULL>|string
	 */
	protected function I_chk($k,$name='',$min=0,$max=0){
		if($this->chk){
			$re = I($k,'','');
			if(!$min && !$max){
				return $re;
			} else {
				$len = mb_strlen($re,'utf-8');
				if($min){//小于最小值
					if($len==0){
						$this->chk = FALSE;
						$this->debug = $name.'的值不能为空';
						return '';
					} 
					if($len<$min){
						$this->chk = FALSE;
						$this->debug = $name.'的长度不能小于'.$min.'个字符';
						return '';
					}
					
					
				}
				if($max && $len>$max){//大于最大值
					$this->chk = FALSE;
					$this->debug = $name.'的长度不能大于'.$max.'个字符';;
					return '';
				}
				return $re;
			}
		} else {
			return '';
		}
	}

}