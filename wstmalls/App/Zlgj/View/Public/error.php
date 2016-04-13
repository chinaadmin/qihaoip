<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!doctype html>
<html lang="zh-cn">
<head>
<title>7号网-首家知识产权交易与管理平台-跳转提示：操作失败</title>
<meta charset="utf-8">
<link href="/qihaov2/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="/qihaov2/css/qihao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/qihaov2/js/jquery.min.js"></script>
<script type="text/javascript" src="/qihaov2/js/bootstrap.min.js"></script>
</head>

<body>
<!--头部-->
<div class="htop">
<div class="htopleft"><a href="<?php echo U('Member/User/index');?>">7号网会员中心</a> &nbsp;&nbsp;客服热线：400-889-7080</div>
<div class="htopright"><a href="<?php echo U('Member/User/index');?>"><img src="<?php echo $data['member']['img']?$data['member']['img']:STATIC_V2.'images/member.jpg';?>"></a><a href="<?php echo U('Member/User/index');?>"><?php echo $_SESSION['user']['name']?$_SESSION['user']['name']:$_SESSION['user']['username'];?></a>&nbsp;<a href="<?php echo U('/Index/User/logout');?>">【退出】</a> </div>
</div>
<!--logo与导航-->
<div class="hnavs newhnavs">
<div class="col-xs-2 hlogo newhlogo"><a href="http://www.qihaoip.com/"><img src="/qihaov2/images/memlogo.png"/></a></div>
<div class="col-xs-10 hnavlist newhnavlist">
<ul>
<li><a href="http://www.qihaoip.com/member/"><img src="/qihaov2/images/nav1.png"/><br/>会员首页</a></li>
<li><a href="http://www.qihaoip.com/member/money/money/"><img src="/qihaov2/images/nav2.png"/><br/>资金管理</a></li>
<li><a href="http://www.qihaoip.com/member/buyer/order_list/"><img src="/qihaov2/images/nav3.png"/><br/>买家中心</a></li>
<li><a href="http://www.qihaoip.com/member/seller/sell_list/"><img src="/qihaov2/images/nav4.png"/><br/>卖家中心</a></li>
<li><a href="http://www.qihaoip.com/member/shop/"><img src="/qihaov2/images/nav7.png"/><br/>商城管理</a></li>
<li><a href="http://v2.qihaoip.com/trade/"><img src="/qihaov2/images/nav5.png"/><br/>商标管家</a></li>
<li><a href="{:U('Zlgj/index')}" class="selnav"><img src="/qihaov2/images/nav6s.png"/><br/>专利管家</a></li>
</ul>
</div>
</div>
<!--logo与导航-->
<!--头部-->
<!--左侧导航-->
<div class="hconleft">
<div class="hconlefts">
	<dl>
		<dt><a href="__APP__/Zlgj/">我的专利</a></dt>
		<dd><a href="__APP__/Zlgj/" id="hons2">专利概况</a></dd>
		<dd><a href="__APP__/Zlgj/MyPatent/addpatent/" id="hons3" class="onth">添加专利</a></dd>
		<dd><a href="__APP__/Zlgj/MyPatent/mypatentdb/" id="hons4">我的专利数据库</a></dd>
	</dl>
</div>
</div>
<!--左侧导航-->
<!--content-->
<div class="kuang">
<div class="container kuangs">
<div class="row">
<div class="col-xs-12" style="background:#ffffff;margin-top: 130px;margin-bottom: 130px;">
<div class="col-xs-4">
<img src="/qihaov2/cartoon/06.png"/>
</div>

<div class="col-xs-8 pgs404">
<!-- <h1>操作失败！</h1> -->
<h1 class="error"><?php echo($error); ?></h1>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</div>
</div>
</div>
</div>
<!--content-->
<!--底部-->
<div class="dibus">
<p>©2014-2018 7号网 版权所有ICP经营性许可证：粤ICP备15024104号-2</p>
<p>客服热线：400-889-7080 地址：深圳市南山区南山大道3838号深圳设计产业园金栋210-212、308-312</p>
</div>
<!--底部-->
</body>
</html>