<?php
function classLoader($class)
{
	$path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$file = __DIR__ . DIRECTORY_SEPARATOR .'src'. DIRECTORY_SEPARATOR . $path . '.php';
	if (file_exists($file)) {
		require_once $file;
	}
}
spl_autoload_register('classLoader');

final class Config
{
	const OSS_ACCESS_ID = 'osrrHZZJZ0vfji07';
	const OSS_ACCESS_KEY = '6scd577yR3llzj8SzDOfbtipKSfjh9';
	const OSS_ENDPOINT = 'http://oss-cn-hangzhou.aliyuncs.com';
	const OSS_TEST_BUCKET = 'sjhcoss';
}

use OSS\OssClient;
use OSS\Core\OssException;

/**
 * Class Common
 *
 * 示例程序【Samples/*.php】 的Common类，用于获取OssClient实例和其他公用方法
 */
class Common
{
    const endpoint = Config::OSS_ENDPOINT;
    const accessKeyId = Config::OSS_ACCESS_ID;
    const accessKeySecret = Config::OSS_ACCESS_KEY;
    const bucket = Config::OSS_TEST_BUCKET;


    /**
     * 根据Config配置，得到一个OssClient实例
     *
     * @return OssClient 一个OssClient实例
     */
    public static function getOssClient()
    {
        try {
            $ossClient = new OssClient(self::accessKeyId, self::accessKeySecret, self::endpoint, false);
        } catch(OssException $e) {
            printf(__FUNCTION__ . "creating OssClient instance: FAILED\n");
            printf($e->getMessage()."\n");
            return null;
        }
        return $ossClient;
    }

    public static function getBucketName()
    {
        return self::bucket;
    }

    /**
     * 工具方法，创建一个存储空间，如果发生异常直接exit
     */
    public static function createBucket()
    {
        $ossClient = self::getOssClient();
        if(is_null($ossClient)) exit(1);
        $bucket = self::getBucketName();
        $acl = OssClient::OSS_ACL_TYPE_PUBLIC_READ;
        if($ossClient->doesBucketExist($bucket)){
        	//echo 'Bucket already exists!';
        	return;
        }
        try {
            $ossClient->createBucket($bucket,$acl);
        } catch (OssException $e) {

            $message = $e->getMessage();
            if(\OSS\Core\OssUtil::startsWith($message, 'http status: 403')) {
                echo "Please Check your AccessKeyId and AccessKeySecret" . "\n";
                exit(0);
            } elseif(strpos($message, "BucketAlreadyExists") !== false) {
                echo "Bucket already exists. Please check whether the bucket belongs to you, or it was visited with correct endpoint. " . "\n";
                exit(0);
            }
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage()."\n");
            return;
        }
        print(__FUNCTION__ . ": OK" . "\n");
    }

    public static function println($message) {
        if(!empty($message)) {
            echo strval($message) . "\n";
        }
    }
}

// Common::createBucket();
