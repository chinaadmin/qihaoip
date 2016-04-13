<?php
if (C ( 'LAYOUT_ON' )) {
	echo '{__NOLAYOUT__}';
}
?>
<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<!--左侧导航-->
	<include file="Public/left" />
	<!--左侧导航-->
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<!--content-->
			<div class="row">
				<div class="col-xs-12"
					style="background: #ffffff; margin-top: 130px; margin-bottom: 130px;">
					<div class="col-xs-4">
						<img src="/qihaov2/cartoon/01.png" />
					</div>
					<div class="col-xs-8 pgs404">
						<!-- <h1>操作成功！</h1> -->
						<h1 class="error"><?php echo($message); ?></h1>
						<p class="detail"></p>
						<p class="jump">
							页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b
								id="wait"><?php echo($waitSecond); ?></b>
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
			<!--content-->
		</div>
		<include file="Public/foot" />
	</div>
</div>
<!--右侧内容-->
</body>
</html>