<?php
namespace Index\Controller;
class CityController extends IndexBaseController {
	public function city($province='110000'){
		$arr = M('city')->where(['province'=>$province])->select();
		$html = '';
		if($arr){
			foreach ($arr as $row){
				$html .= '  <option value="'.$row['id'].'">'.$row['name'].'</option>
';
			}
		} else {
			
		}
		$this->show($html,'utf8');exit;
	}
}