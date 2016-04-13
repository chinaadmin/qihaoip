<?php
namespace Member\Controller;
class HetongztController extends MemberBaseController {
	
	/**
	 * 添加默认主体
	 */
	public function add(){
		if(IS_POST){
			$zt = M('hetongzt');
			$add = I('post.');
			$add['memberid'] = $this->userid;
			$re = $zt->add($add);
			
			$data['success'] = true;
			if(!$re){
				$err = $zt->getDbError();
				if($err){
					$data['success'] = false;
					$data['msg'] = '添加失败：'.$err;
					return $this->ajaxReturn($data);
				}
			}
			$data['msg'] = '添加成功！';
			return $this->ajaxReturn($data);
		}
		$this->display();
	}
	
	/**
	 * 编辑合同主体
	 * @param 主体id $id
	 */
	public function edit($id){
		if(IS_POST){
			$zt = M('hetongzt');
			$where['id'] = $id;
			$where['memberid'] = $this->userid;
			$re = $zt->where($where)->save(I('post.'));
			$data['success'] = true;
			if(!$re){
				$err = $zt->getDbError();
				if($err){
					$data['success'] = false;
					$data['msg'] = '修改失败：'.$err;
					return $this->ajaxReturn($data);
				}
			}
			$data['msg'] = '修改成功！';
			return $this->ajaxReturn($data);
		}
		$where['memberid'] = $this->userid;
		$where['id'] = $id;
		$zt = M('hetongzt');
		$data = $zt->where($where)->find();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function chkout(){
		$post = I("post.");
		$zt = M('hetongzt');
		if($post['id']){
			if($post['default']=='2'){
				$where['memberid'] = $this->userid;
				$where['id'] = array('neq',$post['id']);
				$data['default'] = '1';
				$update = $zt->where($where)->save($data);
			}else{
				$re = $zt->save($post);
			}
		} else {
			unset($post['id']);
			$post['memberid'] = $this->userid;
			$re = $zt->add($post);
		}
		if(!$re && $zt->getDbError()){
			$data['success'] = false;
			$data['msg'] = $zt->getDbError();
			$this->ajaxReturn($data);
		} else {
			$html .='<p>买家（甲方）</p>';
			$html .= '合同主体：'.$post['name'].'<br/>';
			$html .= '联系地址：'.$post['address'].'<br/>';
			$html .= '联系人：'.$post['contact'].'<br/>';
			$html .= '联系电话：'.$post['tel'].'<br/>';
			$html .= '<span class="pull-left btn btn-sm btn-default" style="margin-top:10px;margin-bottom:10px;" onclick="return show_ht();">修改</span>';
			$data['html'] = $html;
			$data['success'] = true;
			$this->ajaxReturn($data);
		}
	}
	
	/**
	 * 设置默认主体
	 * @param unknown $id
	 */
	public function set_default($id){
		$zt = M('hetongzt');
		$where['memberid'] = $this->userid;
		$zt->where($where)->save(['default'=>'1']);//撤销所有默认主体
		
		$where['id'] = $id;
		$re = $zt->where($where)->save(['default'=>'2']);//添加当前默认主体
		$data['success'] = true;
		if(!$re){
			$err = $zt->getDbError();
			if($err){
				$data['success'] = false;
				$data['msg'] = '修改失败：'.$err;
				return $this->ajaxReturn($data);
			}
		}
		$data['msg'] = '修改成功！';
		return $this->ajaxReturn($data);
	}
	
	/**
	 * 删除默认主体
	 * @param unknown $id
	 */
	public function del($id){
		if(IS_AJAX){
			$zt = M('hetongzt');
			$where['id'] = $id;
			$where['memberid'] = $this->userid;
			$re = $zt->where($where)->delete();
			$data['success'] = true;
			if(!$re){
				$err = $zt->getDbError();
				if($err){
					$data['success'] = false;
					$data['msg'] = '删除失败：'.$err;
					return $this->ajaxReturn($data);
				}
			}
			$data['msg'] = '删除完毕！';
			return $this->ajaxReturn($data);
		}
	}
	
	/**
	 * 显示默认主体列表
	 * @param number $page
	 */
	public function showlist($page=1){
		$where['memberid'] = $this->userid;
		$count = M('hetongzt')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagem($count, '10'); //传入总记录数和每页显示的记录数
    	$data['page'] = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data ['data'] = M('hetongzt')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$this->assign('data',$data);
		$this->display();
	}
	
}