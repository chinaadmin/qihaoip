<?php
if(!defined('APP_PATH')){exit;}
if(C('LAYOUT_ON')) {
	echo '{__NOLAYOUT__}';
}
?>
<!doctype html>
<html lang="zh-cn">
<head>
<title>7号网_首家知识产权交易与管理平台-服务器内部错误！</title>
<meta charset="utf-8">
<link href="/qihaov2/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="/qihaov2/css/qihao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/qihaov2/js/jquery.min.js"></script>
<script type="text/javascript" src="/qihaov2/js/bootstrap.min.js"></script>
</head>

<body>
<!--头部-->
	<div class="kuang vtop">
		<div class="col-xs-6 vlefts">
			
						<p>
				<a href="/" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;
			</p>
						</div>
		<div class="col-xs-6 yanse vrights">
			<ul>
				<li><a href="/Index/Search/index.html" title="搜索" target="_blank" class="vsoses">搜索</a></li>
								<li><a href="javascript:;"><span>网站导航</span></a>
					<div class="xialas">
						<ul>
							<li><a href="/" title="" target="_blank">首页</a></li>
<li><a href="/Index/Trademark/index" title="" target="_blank">商标市场</a></li>
<li><a href="/Index/Patent/index" title="专利市场" target="_blank">专利市场</a></li>
<li><a href="/Index/Shop/index" title="7号商城" target="_blank">7号商城</a></li>
<li><a href="/Index/Special/index" title="专题.活动" target="_blank">专题.活动</a></li>
						</ul>
					</div></li>
				<li><a href="/Index/news/show_list/catid/162.html" title="帮助中心"
					target="_blank">帮助中心</a></li>
				<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" title="联系客服"
					target="_blank">联系客服</a></li>
			</ul>
		</div>
	</div>
	<!--logo与导航-->
	<div class="kuang vlogos">
		<div class="container kuangs vlogosgao">
			<div class="row">
				<div class="col-xs-4 vlogo">
					<a href="/" title="7号网-首家知识产权交易与管理平台"><img src="/qihaov2/images/logo.png" /><img src="/qihaov2/images/logo3.png"/></a>
				</div>
				<div class="col-xs-7 vdaohan">
					<ul>
<li><a href="/" title="" target="_blank">首页</a></li>
<li><a href="/Index/Trademark/index" title="" target="_blank">商标市场</a></li>
<li><a href="/Index/Patent/index" title="专利市场" target="_blank">专利市场</a></li>
<li><a href="/Index/Shop/index" title="7号商城" target="_blank">7号商城</a></li>
<li><a href="/Index/Special/index" title="专题.活动" target="_blank">专题.活动</a></li>
</ul>
				</div>
			</div>
		</div>
	</div>
	<!--logo与导航--->
	<!--头部-->
<!--content-->
<div class="kuang">
<div class="container kuangs">
<div class="row">
<div class="col-xs-12" style="background:#ffffff;margin-top: 130px;margin-bottom: 130px;">
<div class="col-xs-4">
<img src="/qihaov2/cartoon/06.png"/>
</div>
<div class="col-xs-8 pgs404">
<h2>Sorry,页面没有找到！</h2>
<h4><?php echo strip_tags($e['message']);?></h4>
<hr>
<p>
似乎你所寻找的网页已移动或丢失了。
<p>或者也许你只是键入错误了一些东西。</p>
</p>
<p>
火星不太安全，我可以免费送你回地球
</p>
<a href="/" title="首页">
首页
</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:history.go(-1);">
返回上一页
</a>
<div class="content">
<?php if(isset($e['file'])) {?>
	<div class="info">
		<div class="title">
			<h3>错误位置</h3>
		</div>
		<div class="text">
			<p>FILE: <?php echo $e['file'] ;?> &#12288;LINE: <?php echo $e['line'];?></p>
		</div>
	</div>
<?php }?>
<?php if(isset($e['trace'])) {?>
	<div class="info">
		<div class="title">
			<h3>TRACE</h3>
		</div>
		<div class="text">
			<p><?php echo nl2br($e['trace']);?></p>
		</div>
	</div>
<?php }?>
</div>
</div>
</div>
</div>
</div>
</div>
<!--content-->
<!--底部-->
<div class="kuang gao8">
<div class="container kuangs">
<div class="row">
<div class="col-xs-8 dizhi">
<p><a href="/" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/Index/news/detail/id/1121.html" target="_blank">官方微信</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://weibo.com/7hip" target="_blank">官方微博</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/Index/SiteMap/index.html" title="网站地图" target="_blank">网站地图</a></p>
<p>©2014-2015 7号网 版权所有 All Rights Reserved.</p>
<p>客服热线：400-889-7080&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312</p>
</div>
<div class="col-xs-2 weixin">
<img src="/qihaov2/images/weixin.jpg"/><br/>关注7号网微信
</div>
<div class="col-xs-2 weibo">
<a href="http://weibo.com/7hip" target="_blank" rel="nofollow">+关注</a>
</div>
</div>
</div>
</div>
<!--底部-->
</body>
</html>