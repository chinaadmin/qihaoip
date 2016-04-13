<?php
namespace Policy\Controller;
class EmptyController extends PolicyBaseController {
	public function _initialize(){
		parent::_initialize();
	}
	

	/***
	 * 空操作
	*/
	public function _empty(){
		 $contro = strtolower(CONTROLLER_NAME);
		if(is_numeric($contro)){
			A('Index')->detail($contro,$p);
			exit;
		}elseif ($contro == 'policy'){
			A('Index')->policy_list();
			exit;
		}else {
			return $this->show_404();
		}
	}
} 