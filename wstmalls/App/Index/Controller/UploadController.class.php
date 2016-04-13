<?php
namespace Index\Controller;
class UploadController extends IndexBaseController {
	public $debugInfo = '';
	
	/**
	 * 专用于易驰写的ajax图片上传
	 */
	public function img(){
		$img = $this->save_file();
		if($img){
			$value = 'success|'.$img;
		} else {
			$value = 'error|'.$this->debugInfo;
		}
		$str = '<script type=\'text/javascript\'>
				window.parent.uploadSuccess(\''.$value.'|\');
				</script>
				';
		header("Content-type:text/html;charset=utf-8");
		echo $str;
		exit;
	}
	
	/**
	 * 此方法用于文件上传保存
	 * @param string $name 上传文件的name属性值
	 * @param string $type 上传文件的类型，可选为 img和file
	 * @return string|boolean 上传成功或者失败，失败以后从 $this->debugInfo里面查看错误
	 */
	public function save_file($name='file',$type='img'){
		if($type=='img'){
			$dir = UPLOAD_DIR.'Img/';
			$exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		} else {
			$dir = UPLOAD_DIR.'File/';
			$exts = array('jpg', 'gif', 'png', 'jpeg','zip','rar','doc','docx','xls','xlsx','ppt','pptx','txt','pdf');// 设置附件上传类型
		}
		if(isset($_FILES[$name])){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     5120000;// 设置附件上传大小
			$upload->saveName  =    date('his').rand('1111', '9999');
			$upload->exts      =     $exts;// 设置附件上传类型
			$upload->rootPath  =     '.'.$dir; // 设置附件上传根目录
			$upload->savePath  =     date('m').'/'; // 设置附件上传（子）目录
			$info = $upload->upload();
			if($info){
				return $dir.$info[$name]['savepath'].$info[$name]['savename'];
			} else {
				$this->debugInfo = $upload->getError();
				return false;
			}
		} else {
			$this->debugInfo = '上传的文件'.$name.'不存在。';
			return false;
		}
	}
	
	/**
	 * 此方法用于文件上传保存
	 * @param string $name 上传文件的name属性值
	 * @param string $type 上传文件的类型，可选为 img和file
	 * @return string|boolean 上传成功或者失败，失败以后从 $this->debugInfo里面查看错误
	 */
	public function save_mfile($type='img'){
		if($type=='img'){
			$dir = UPLOAD_DIR.'Img/';
			$exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		} else {
			$dir = UPLOAD_DIR.'File/';
			$exts = array('jpg', 'gif', 'png', 'jpeg','zip','rar','doc','docx','xls','xlsx','ppt','pptx','txt','pdf');// 设置附件上传类型
		}
		if(count($_FILES)){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     5120000;// 设置附件上传大小
			$upload->exts      =     $exts;// 设置附件上传类型
			$upload->rootPath  =     '.'.$dir; // 设置附件上传根目录
			$upload->savePath  =     date('m').'/'; // 设置附件上传（子）目录
			$info = $upload->upload();
			if($info){
				$str = '';
				foreach ($info as $name=>$v){
					$str .= $dir.$info[$name]['savepath'].$info[$name]['savename'].',';
				}
				$str = substr($str, 0, -1);
				return $str;
			} else {
				$this->debugInfo = $upload->getError();
				return false;
			}
		} else {
			$this->debugInfo = '上传的文件'.$name.'不存在。';
			return false;
		}
	}
	/**
	 * 专用于ajax图片上传，返回json格式数据
	 */
	public function ajax_img(){
		$img = $this->save_file();
		if(!$img) {// 上传错误提示错误信息
			$value['success'] = false;
			$value['msg'] = $this->debugInfo;
		}else{// 上传成功
			$value['success'] = true;
			$value['msg'] = $img;
		}
		header("Content-type:text/html;charset=utf-8");
		echo json_encode($value);exit;
	}
	
	/**
	 * CKEditor上传图片处理
	 * 图片上传并且返回js处理代码！111
	 */
	public function ck_img(){
		$img = $this->save_file('upload');
		if($img){
			$value = '<script type="text/javascript">'.
					'window.parent.CKEDITOR.tools.callFunction('.$_GET['CKEditorFuncNum'].',\''.$img.'\',\'\');'.
					'</script>';
		} else {
			$value = '<font color="red" size="2">*'.$this->debugInfo.'</font>';
		}
		header("Content-type:text/html;charset=utf-8");
		echo $value;
		exit;
	}
	
	/**
	 * 专用于易驰的ajax网络图片上传
	 */
	public function webimg(){
		$img = I('post.img',I('get.img',false));
		if($img){//如果图片名字存在
			$dir = UPLOAD_DIR.'Img/'.date('m').'/'.date('d');
			$filename = $dir.'/'.date('his').rand('1111', '9999');
			$dir = '.'.$dir;
			if(!is_dir($dir)){//如果目录不存在
				mkdir($dir,0777,true);
			}
			
			$len = strlen($img);
			$imgtype = substr($img, $len-3,$len);
			$imgtype = strtolower($imgtype);
			$type = array('jpg','png','gif','jpg');
			if(in_array($imgtype, $type)){
				$filename .= '.'.$imgtype;
				$imgcon = file_get_contents($img);
				if($imgcon){
					$re = file_put_contents('.'.$filename, $imgcon);
					if($re){
						$this->show('success|'.$filename,'utf8');
					} else {
						$this->show('error|文件保存失败，请联系管理员！','utf8');
					}
				} else {
					$this->show('error|网络图片下载失败，请检查路径是否正确！','utf8');
				}
			} else {
				$this->show('error|上传失败：只能上传jpg、png、gif格式图片！','utf8');
			}
		} else {
			$this->show('error|图片文件不存在！','utf8');
		}	
	}
	
	/**
	 * 专用于文件上传
	 */
	public function file(){
		$file = $this->save_file();
		if($file){
			$value = 'success|'.$file;
		} else {
			$value = 'error|'.$this->debugInfo;
		}
		$str = '<script type=\'text/javascript\'>
				window.parent.uploadSuccess(\''.$value.'|\');
				</script>
				';
		header("Content-type:text/html;charset=utf-8");
		echo $str;
		exit;
	}
}