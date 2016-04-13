<?php
require_once __DIR__ . '/Common.php';

use OSS\OssClient;
use OSS\Core\OssUtil;
use OSS\Core\OssException;

$ossClient = Common::getOssClient();
if(is_null($ossClient)) exit(1);
$bucket = Common::getBucketName();
echo '<br />';
echo $bucket;
// $ossClient->putBucketAcl($bucket, OssClient::OSS_ACL_TYPE_PUBLIC_READ);
// print_r($ossClient->getBucketAcl($bucket));
$prefix = '123/';
$delimiter = '/';
$nextMarker = '';
$maxkeys = 1000;
$options = array(
		'delimiter' => $delimiter,
		'prefix' => $prefix,
		'max-keys' => $maxkeys,
		'marker' => $nextMarker,
);
$listObjectInfo = $ossClient->listObjects('posp',$options);
$objectList = $listObjectInfo->getObjectList();
$prefixList = $listObjectInfo->getPrefixList();
    if(!empty($objectList)) {
        print("objectList:\n");
        foreach ($objectList as $objectInfo) {
            print($objectInfo->getKey() . "\n");
        }
    }
    if(!empty($prefixList)) {
        print("prefixList: \n");
        foreach ($prefixList as $prefixInfo) {
            print($prefixInfo->getPrefix() . "\n");
        }
    }
exit;
$signedUrl = $ossClient->signUrl($bucket, "a.file.test", 3600, "PUT", array('Content-Type' => 'txt'));
Common::println($signedUrl);

exit;
$re = $ossClient->multiuploadFile($bucket, "123/image3.png", 'D:\tmupload\13\image003.png', array());
print_r($re);

// 简单上传变量的内容到文件
$ossClient->putObject($bucket, "123/b/file.txt", "hi, oss");
Common::println("123/b/file.txt is created");

// 上传本地文件
$ossClient->uploadFile($bucket, "123/c/image3.png", 'D:\tmupload\13\image003.png');
Common::println("123/c/image3.png is created");

// 下载object到本地变量
$content = $ossClient->getObject($bucket, "123/b/file.txt");
Common::println("123/b/file.txt is fetched, the content is: ". $content);


// 下载object到本地文件
$options = array(
		OssClient::OSS_FILE_DOWNLOAD => "./b.file.localcopy",
);
$ossClient->getObject($bucket, "123/b/file.txt", $options);
Common::println("123/b/file.txt is fetched to the local file: b.file.localcopy");

// 拷贝object
$ossClient->copyObject($bucket, "123/b/file.txt", $bucket, "123/b/file_copy.txt");
Common::println("123/b/file.txt is copied to 123/b/file_copy.txt");

// 判断object是否存在
$doesExist = $ossClient->doesObjectExist($bucket, "123/b/file.txt");
Common::println("file 123/b/file.txt exist? " .($doesExist ? "yes" : "no"));

// 删除object
$ossClient->deleteObject($bucket, "123/b/file_copy.txt");
Common::println("123/b/file_copy.txt is deleted");

// 判断object是否存在
$doesExist = $ossClient->doesObjectExist($bucket, "123/b/file_copy.txt");
Common::println("file 123/b/file_copy.txt exist? " .($doesExist ? "yes" : "no"));
exit;
// 批量删除object
$ossClient->deleteObjects($bucket, array("123/b/file.txt","123/c/image3.png"));
Common::println("b.file, c.file are deleted");

exit;
