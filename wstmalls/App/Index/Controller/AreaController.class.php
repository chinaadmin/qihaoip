<?php
namespace Index\Controller;
class AreaController extends IndexBaseController {
	public function province(){
		if(IS_AJAX){
			return $this->ajaxReturn(M('province')->select());
		}
	}
	
	public function city($province){
		if(IS_AJAX){
			return $this->ajaxReturn(M('province')->where(['father'=>$province])->select());
		}
	}
	
}