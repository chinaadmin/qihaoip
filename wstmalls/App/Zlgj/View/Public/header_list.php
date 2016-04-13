<!doctype html>
<html lang="zh-cn">
<head>
<title>会员中心-专利列表-专利管家-7号网</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="icon" href="<?php echo STATIC_V2;?>images/favicon.ico" type="image/x-icon">  
<link rel="shortcut icon" href="<?php echo STATIC_V2;?>images/favicon.ico" type="image/x-icon">  
<link href="<?php echo STATIC_V2;?>css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/sun.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/qihao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min-1.1.0.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jq_scroll.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>dist/echarts.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/msgbox.js"></script>
<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type='text/javascript'>

</script>
<style type="text/css">
body{background:#ffffff;}
</style>
</head>
<body>
<!--头部-->
<div class="zllisttop">
<div class="zllisttop_left">
<a href="{:C('QH_URL')}" target="_blank">7号网首页</a><a href="__APP__/trademark/" target="_blank">商标市场</a><a href="__APP__/patent/" target="_blank">专利市场</a><a href="{:U('Trade/Index/index')}" target="_blank">商标管家</a><a href="{:U('Zlgj/Index/index')}" target="_blank">专利管家</a><a href="/" target="_blank">更多</a>客服热线：400-889-7080
</div>
<div class="zllisttop_right">
<notempty name="Think.session.user.id">
	您好，<a href="<?php echo U('Member/User/index');?>" target="_blank"><?php echo $_SESSION['user']['name']?$_SESSION['user']['name']:$_SESSION['user']['username'];?></a> &nbsp;&nbsp;<a href="<?php echo U('/Index/User/logout');?>">退出</a>
<else/>
	<li>欢迎您，请<a href="{:U('Index/User/login')}">登录</a>或者<a href="{:U('Index/User/register')}">免费注册</a></li>
</notempty>
</div>
</div>
<!--头部-->