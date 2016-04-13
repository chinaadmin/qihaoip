<!doctype html>
<html lang="zh-cn">
<head>
<title>会员中心首页</title>
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
<link href="<?php echo STATIC_V2;?>css/addimg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jq_scroll.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/ScrollPic.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/newmsgbox.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/laydate.dev.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/formcheck.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/Validform_Datatype.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/Validform_v5.3.2.js"></script>
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
<div class="htop">
<div class="htopleft"><a href="<?php echo U('Member/User/index')?>">7号网会员中心</a> &nbsp;&nbsp;客服热线：400-889-7080</div>
<div class="htopright"><a href="<?php echo U('Member/User/index')?>"><img src="<?php echo session('user.img')?session('user.img'):STATIC_V2.'images/member.jpg';?>"></a><a href="<?php echo U('Member/User/index')?>" target="_blank"><?php echo session('user.name')?session('user.name'):session('user.username');?></a>&nbsp;&nbsp;<a href="<?php echo U('/User/logout'); ?>">【退出】</a> </div>
</div>
<!--logo与导航-->
<div class="hnavs newhnavs">
  <div class="col-xs-2 hlogo newhlogo"><a href="/" title="首页"><img src="<?php echo STATIC_V2;?>images/memlogo.png"/></a></div>
  <div class="col-xs-10 hnavlist newhnavlist">
    <ul>
      <li><a href="<?php echo U('Member/User/index')?>" title="会员首页" <?php if(CONTROLLER_NAME == 'User'){echo 'class="selnav"'; }?>><img src="<?php echo CONTROLLER_NAME == 'User'?STATIC_V2.'images/nav1s.png':STATIC_V2.'images/nav1.png'?>"/><br/>会员首页</a></li>
      <li><a href="<?php echo U('Member/Money/index')?>" title="资金管理" <?php if(CONTROLLER_NAME == 'Money'){echo 'class="selnav"'; }?>><img src="<?php echo CONTROLLER_NAME == 'Money'?STATIC_V2.'images/nav2s.png':STATIC_V2.'images/nav2.png'?>"/><br/>资金管理</a></li>
      <li><a href="<?php echo U('Member/Buyer/index');?>" title="买家中心" <?php if(CONTROLLER_NAME == 'Buyer' OR CONTROLLER_NAME == 'Hetongzt' OR CONTROLLER_NAME == 'Shourangzt'){?>class="selnav"<?php }?>><img src="<?php echo CONTROLLER_NAME == 'Buyer'?STATIC_V2.'images/nav3s.png':STATIC_V2.'images/nav3.png'?>"/><br/>买家中心</a></li>
      <li><a href="<?php echo U('Member/Seller/index');?>" title="卖家中心" <?php if(CONTROLLER_NAME == 'Seller'){echo 'class="selnav"'; }?>><img src="<?php echo CONTROLLER_NAME == 'Seller'?STATIC_V2.'images/nav4s.png':STATIC_V2.'images/nav4.png'?>"/><br/> 卖家中心</a></li>
      <li><a href="<?php echo U('Member/Shop/index');?>" title="商城管理" <?php if(CONTROLLER_NAME == 'Shop'){echo 'class="selnav"'; }?>><img src="<?php echo CONTROLLER_NAME == 'Shop'?STATIC_V2.'images/nav7s.png':STATIC_V2.'images/nav7.png'?>"/><br/> 商城管理</a></li>
      <li><a href="<?php echo U('Trade/Index/index');?>" title="商标管家" <?php if(MODULE_NAME == 'Trade'){echo 'class="selnav"'; }?>><img src="<?php echo MODULE_NAME == 'Trade'?STATIC_V2.'images/nav5s.png':STATIC_V2.'images/nav5.png'?>"/><br/>商标管家</a></li>
      <li><a href="<?php echo U('Zlgj/Index/index');?>" title="专利管家" <?php if(MODULE_NAME == 'Zlgj'){echo 'class="selnav"'; }?>><img src="<?php echo MODULE_NAME == 'Zlgj'?STATIC_V2.'images/nav6s.png':STATIC_V2.'images/nav6.png'?>"/><br/>专利管家</a></li>
    </ul>
  </div>
</div>
<!--logo与导航-->
<!--头部-->