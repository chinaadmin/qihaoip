<?php
namespace Index\Controller;
class SearchController extends IndexBaseController {
	
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){
		parent::_initialize();
	}
	
	/***
	 * 显示默认首页
	 */
	public function index(){
		$data = $this->get_data('4');//公共数据
		$data['type'] = $type= I('get.type')?I('get.type'):'0';
		$id = I('get.shop');
		$data['name'] = $name = I('get.name');
		if(!empty($name)){
			if($name && $type < '4'){
				$where_or['title'] = array('like','%'.$name.'%');
				$where_or['tmno'] = array('like','%'.$name.'%');
				$where_or['master'] = array('like','%'.$name.'%');
				$where_or['_logic'] = 'or';
				$where['_complex'] = $where_or;
				$where['state'] = '1';
			}
			switch ($type){
				case '1':
					$m = M('item');
					$where['tmpa'] = '1';
					$sum = '16';
					break;
				case '2':
					$m = M('item');
					$where['tmpa'] = '2';
					$sum = '16';
					break;
				case '3':
					$m = M('item');
					if(!$id){
						$shop_name = M('shop')->where(array('name'=>array('like','%'.$name.'%')))->select();
						if($shop_name){
							$shop_id_data = array();
							foreach ($shop_name as $key=>$value){
								$shop_id_data[] = $value['id'];
							}
							$where_or['userid'] = array('in',$shop_id_data);
						}
						$shop_id = M('shop')->field('id')->select();
						$id =array();
						foreach ($shop_id as $key=>$value){
							$id[$key] = $value['id'];
						}
						
						$where_or['title'] = array('like','%'.$name.'%');
						$where_or['tmno'] = array('like','%'.$name.'%');
						$where_or['master'] = array('like','%'.$name.'%');
						$where_or['_logic'] = 'or';
						$where['_complex'] = $where_or;
					}
					$where['userid'] = array('in',$id);
					$sum = '16';
					break;
				default:
					$m = M('item');
					$sum = '16';
					break;
				/* case '4':
					$m = M('article');
					$art_type = array('1','2','69','75','167');
					
					$where_or['title'] = array('like','%'.$name.'%');
					$where_or['description'] = array('like','%'.$name.'%');
					$where_or['_logic'] = 'or';
					$where['_complex'] = $where_or;
					$where['groupid'] = array('in',$art_type);
					$sum = '8';
					break; */
			}
			$data['count'] = $count = $m->where($where)->count();
			$Page = new \Org\Util\Pagenew ( $count, $sum); // 实例化分页类 传入总记录数和每页显示的记录数(10)
			$data ['page'] = $Page->show (); // 分页显示输出
			$data ['item_data'] = $m->where($where)->order('addtime asc')->limit ( $Page->firstRow . ',' . $Page->listRows )->select();
		}
		$data['item_view'] = M('item')->order('views desc')->limit(9)->select();
		$data['title'] = '知识产权搜索-商标搜索-专利搜索';
		
		$this->assign('data',$data);
		$this->display();
	}
	
}