<!doctype html>
<html lang="zh-cn">
<head>
<title>会员中心-专利管家-7号网</title>
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
<link type="text/css" href="<?php echo STATIC_V2;?>css/prettyPhoto.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min-1.1.0.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/laydate.dev.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jq_scroll.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>dist/echarts.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/newmsgbox.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.prettyPhoto.js"></script>
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
<div class="htopleft"><a href="<?php echo U('Member/User/index');?>">7号网会员中心</a> &nbsp;&nbsp;客服热线：400-889-7080</div>
<div class="htopright"><a href="<?php echo U('Member/User/index');?>"><img src="<?php echo $data['member']['img']?$data['member']['img']:STATIC_V2.'images/member.jpg';?>"></a><a href="<?php echo U('Member/User/index');?>"><?php echo $_SESSION['user']['name']?$_SESSION['user']['name']:$_SESSION['user']['username'];?></a>&nbsp;<a href="<?php echo U('/User/logout');?>">【退出】</a> </div>
</div>
<!--logo与导航-->
<div class="hnavs newhnavs">
<div class="col-xs-2 hlogo newhlogo"><a href="{:C('QH_URL')}"><img src="<?php echo STATIC_V2;?>images/memlogo.png"/></a></div>
<div class="col-xs-10 hnavlist newhnavlist">
<ul>
<li><a href="http://www.qihaoip.com/member/"><img src="<?php echo STATIC_V2;?>images/nav1.png"/><br/>会员首页</a></li>
<li><a href="http://www.qihaoip.com/member/money/money/"><img src="<?php echo STATIC_V2;?>images/nav2.png"/><br/>资金管理</a></li>
<li><a href="http://www.qihaoip.com/member/buyer/order_list/"><img src="<?php echo STATIC_V2;?>images/nav3.png"/><br/>买家中心</a></li>
<li><a href="http://www.qihaoip.com/member/seller/sell_list/"><img src="<?php echo STATIC_V2;?>images/nav4.png"/><br/>卖家中心</a></li>
<li><a href="http://www.qihaoip.com/member/shop/"><img src="<?php echo STATIC_V2;?>images/nav7.png"/><br/>商城管理</a></li>
<li><a href="{:U('Trade/Index/index')}"><img src="<?php echo STATIC_V2;?>images/nav5.png"/><br/>商标管家</a></li>
<li><a href="{:U('Zlgj/Index/index')}" class="selnav"><img src="<?php echo STATIC_V2;?>images/nav6s.png"/><br/>专利管家</a></li>
</ul>
</div>
</div>
<!--logo与导航-->
<!--头部-->
<!--主体-->
<div class="hzlcon">
<!--左侧导航-->
<div class="hconleft">
<div class="hconlefts">
	<dl>
		<dt><a>我的专利</a></dt>
		<dd><a href="" id="hons2" <if condition="$Think.const.ACTION_NAME eq 'index'">class="onth"</if>>专利概况</a></dd>
		<dd><a href="<?php echo U('Zlgj/MyPatent/addpatent/')?>" id="hons3" <if condition="$Think.const.ACTION_NAME eq 'addpatent'">class="onth"</if>>查询专利（添加）</a></dd>
		<dd><a href="<?php echo U('Zlgj/MyPatent/mypatentdb/')?>" id="hons4" <if condition="$Think.const.ACTION_NAME eq 'mypatentdb'">class="onth"</if>>我的专利数据库</a></dd>
	</dl>
</div>
</div>
<!--左侧导航-->