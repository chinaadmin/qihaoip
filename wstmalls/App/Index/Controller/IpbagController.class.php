<?php
namespace Index\Controller;
class IpbagController extends IndexBaseController {
	
	/***
	 * 初始化函数，每次请求清空session类的搜索数据
	 * 构造查询where数组
	 */
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 空操作
	 */
	public function _empty(){
		$contro = strtolower(CONTROLLER_NAME);
		$action = strtolower(ACTION_NAME);
		if($action == 'cateid'&&is_numeric(I('path.2'))) {
			$id = I('path.2');
			$this->index($id);
		}elseif($contro == 'ipbag'&&is_numeric(I('path.1'))){
			$id = I('path.1');
			$this->detail($id);
		}else{
			$this->show_404('页面不存在！！！！');
		}
	}
	
	/***
	 * 显示默认首页
	 */
	public function index($cateid='',$p=1){
		$data = $this->get_data('1','6','8');//公共数据
		$data['category'] = $this->category();
		if($cateid){
			$data['cateid'] = $cateid;
			$where['type'] = $cateid;
		}
		$where['state'] = 1;
		$data['count'] = M('Zcb')->where($where)->count();
		$pagesize = '8';
		$newpage = new \Org\Util\Page($data['count'],$pagesize);//实例化分类页
		if($data['count'] && $data['count']>$pagesize){
			$data['page'] = $newpage->getPage();//数据分页
		}
		$data['zcb'] = M('Zcb')->where($where)->order(array('sort'=>'desc'))->limit(($p-1)*$pagesize,$pagesize)->select();
		foreach ($data['zcb'] as $key => $value){
			$wh['id'] = $value['type'];
			$data['zcb'][$key]['typename'] = M('Items')->where($wh)->getField('name');
		}
		/* 标题title，关键词keywords，描述description */
		$data['title'] = '知产包-知识产权资源包-7号网';
		$data['keywords'] = '知产包 专利资源 商标资源 知识产权资源 专利商标资源包 行业专利打包出售';
		$data['description'] = '知产包是7号网提供的一种将同一行业、同一类别下的商标或专利打包成的一个资源包，旨在为企业更便捷的找到其所在行业内想要的精选精品商标或专利资源，是各行业内知识产权资源大汇聚，精选商标、专利等知识产权资源包，为企业的知识产权之路保驾护航。';
		$data['nav_type'] = 1;
		
		$this->assign('data',$data);
		$this->display('index');
	}
	
	/***
	 * 显示详情页
	*/
	public function detail($id){
		$data = $this->get_data('1','6','8');//公共数据
		$where['id'] = $id;
		$data['dgzcb'] = M('Zcb')->where($where)->find();
		$whr['id'] = $data['dgzcb']['type'];
		$data['dgzcb']['typename'] = M('Items')->where($whr)->getField('name');
		if($data['dgzcb']['price'] > 0){
			$data['dgzcb']['price'] = '￥'.$data['dgzcb']['price'];
		}else{
			$data['dgzcb']['price'] = '面议';
		}
		//$wh['id'] = array('in',$data['dgzcb']['item']);
		//$data['dgzcb']['data'] = M('Item')->where($wh)->select();
		foreach (explode(',',$data['dgzcb']['item']) as $key=>$value){
			$data['dgzcb']['data'][] = M('Item')->where(array('id'=>$value))->find();
		}
		
		foreach ($data['dgzcb']['data'] as $key => $value){
			$condition['id'] = $value['groupid'];
			$data['dgzcb']['data'][$key]['catename'] = M('Items')->where($condition)->getField('name');
			if($value['tmpa']==1){
				$data['dgzcb']['data'][$key]['typename'] = C('ITEM_REG_TYPE')[$value['tmtype']];
			}else{
				$data['dgzcb']['data'][$key]['typename'] = C('ITEM_PA_TYPE')[$value['tmtype']];
			}
			$data['dgzcb']['data'][$key]['tradeway'] = C('ITEM_SELL_TYPE')[$value['tmtradeway']];
			$data['dgzcb']['data'][$key]['tmregdate'] = date('Y-m-d',strtotime($value['tmregdate']));
			$data['dgzcb']['data'][$key]['tmregend'] = date('Y-m-d',strtotime($value['tmregend']));
			if($data['dgzcb']['data'][$key]['singlesale']==1){
				$data['dgzcb']['data'][$key]['singlesale'] = '是';
			}else{
				$data['dgzcb']['data'][$key]['singlesale'] = '否';
			}
			$img = explode(',', $value['img']);
			$data['dgzcb']['data'][$key]['img'] = $img['0'];
		}
		/* 标题title，关键词keywords，描述description */
		$data['title'] = $data['menu'][0]['title'];
		$data['keywords'] = $data['menu'][0]['alt'];
		$data['description'] = $data['menu'][0]['about'];
		$data['nav_type'] = 1;
		
		$this->assign('data',$data);
		$this->display('detail');
	}
	
	/**
	 * 查询所有有数据的分类
	 */
	private function category(){
		$cate = M('Zcb')->field('type')->group('type')->select();
		foreach ($cate as $key => $value){
			$cateid[] .= $value['type'];
		}
		$where['id'] = array('in',implode(',', $cateid));
		$result = M('Items')->where($where)->field('id,tmpa,name')->select();
		
		return $result;
	}
}