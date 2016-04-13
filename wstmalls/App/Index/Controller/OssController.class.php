<?php
namespace Index\Controller;
require_once APP_PATH.'Common/Lib/oss/Common.php';
use OSS\OssClient;
use OSS\Core\OssUtil;
use OSS\Core\OssException;
class OssController extends IndexBaseController {
	public function index(){
		$this->ossClient = \Common::getOssClient();
		echo $this->ossClient->putObject('sjhcoss','123/test1.html', '1122334455test');
	}
	
}