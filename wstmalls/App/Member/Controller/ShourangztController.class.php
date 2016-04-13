<?php
namespace Member\Controller;
class ShourangztController extends MemberBaseController {
	
	/**
	 * 添加默认主体
	 */
	public function add(){
		if(IS_POST){
			$zt = M('shourangzt');
			if(!isset($_POST['type'])){$_POST['type']=1;}
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
	 * 编辑受让主体
	 * @param 主体id $id
	 */
	public function edit($id){
		if(IS_POST){
			$zt = M('shourangzt');
			$where['id'] = $id;
			$where['memberid'] = $this->userid;
			if(!isset($_POST['type'])){$_POST['type']=1;}
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
		$zt = M('shourangzt');
		$data = $zt->where($where)->find();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function chkout(){
		$post = I("post.");
		$post['memberid'] = $this->userid;
		$zt = M('shourangzt');
		if($post['id']){
			$re = $zt->save($post);
		} else {
			unset($post['id']);
			$re = $zt->add($post);
		}
		if(!$re && $zt->getDbError()){
			$data['success'] = false;
			$data['msg'] = $zt->getDbError();
			$this->ajaxReturn($data);
		} else {
			$v1 = $data['type']==2?'受让人：':'公司名称：';
			$v2 = $data['type']==2?'身份证号：':'公司地址：';
			$html  = $v1.$post['name'].'<br/>';
			$html .= $v2.$post['info'].'<br/>';
			$html .= '<span class="pull-left btn btn-sm btn-default" style="margin-top:10px;margin-bottom:10px;" onclick="return show_sr();">修改</span>';
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
		$zt = M('shourangzt');
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
			$zt = M('shourangzt');
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
		$count = M('shourangzt')->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Org\Util\Pagem($count, '10'); //传入总记录数和每页显示的记录数
    	$data['page'] = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data ['data'] = M('shourangzt')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		$this->assign('data',$data);
		$this->display();
	}
	
}