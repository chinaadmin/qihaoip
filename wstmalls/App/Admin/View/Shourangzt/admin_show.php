<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>数据名称详情</title>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
	<link href="<?php echo STATIC_V2;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo STATIC_V2;?>css/admin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo STATIC_V2;?>js/admin.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<include file="Public/header" />
<div class="container-fluid">
	<div class="row">
<include file="Public/left" />
<!-- content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <ol class="breadcrumb">
  		    <li><a href="<?php echo U('/Admin'); ?>">首页</a></li>
  			<li><a href="<?php echo U('admin_ShowList'); ?>">数据名称列表</a></li>
  			<li class="active">数据名称查看数据</li>
		  </ol>
          <h4 class="sub-header">数据详情数据名称-数据备注</h4>
          <div class="container-fluid">
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>ID</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['id']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>归属id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['memberid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>类型</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['type']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>受让人</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['name']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>补充信息</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['info']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>默认主体</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['default']; ?></p></div>
          </div>

          </div> 
        </div>
<!-- content -->
    </div>
</div>
</body>
</html>