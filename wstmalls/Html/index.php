<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
//define('APP_DEBUG',false);
//define('BIND_MODULE','Trade');// 自动构建某个模块
define('WEB_ROOT', realpath('../'));// 定义根目录
define('APP_PATH',WEB_ROOT.'/App/');// 定义应用目录
define('LOG_PATH', WEB_ROOT.'/Log/');
define('STATIC_DIR','/Static/');// 定义静态文件路径
define('STATIC_V2','/qihaov2/');// 定义V2的静态文件路径
define('UPLOAD_DIR','/Upload/');// 定义上传文件路径
// 引入ThinkPHP入口文件
require '../ThinkPHP/ThinkPHP.php';
// 亲^_^ 后面不需要任何代码了 就是如此简单