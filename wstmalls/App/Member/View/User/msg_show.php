<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<!--左侧导航-->
	<include file="Public/left" />
	<!--左侧导航-->
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="hytit">
				您当前的位置：<a href="<?php echo U('User/index'); ?>" title="会员中心">会员中心</a> ><span>查看站内信</span>
			</div>
			<div class="hgrzy">
				<h2>查看站内信</h2>
				<div class="hhym zsxmt">
					<div class="col-xs-2 hym1">流水号</div>
					<div class="col-xs-offset-1 col-xs-7 hym2"><?php echo $data['data']['uid']; ?></div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">发送者</div>
					<div class="col-xs-offset-1 col-xs-7 hym2"><?php echo $data['data']['usertype']==2?'管理员':$data['data']['username']; ?></div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">发送时间</div>
					<div class="col-xs-offset-1 col-xs-7 hym2"><?php echo date('Ymd H:i:s',$data['data']['sendtime']); ?></div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">站内信详情</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
					<?php echo htmlspecialchars($data['data']['data']); ?>
					</div>
				</div>
			<include file="Public/foot" />
		</div>
	</div>
	<!--右侧内容-->
</div>
<!--主体-->
<!--右侧热线-->

<!--右侧热线-->
</body>
</html>