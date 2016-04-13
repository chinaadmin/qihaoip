<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="hytit">
				您当前的位置：<a href="<?php echo U('User/index'); ?>" title="会员中心">会员中心</a> ><span>支付密码管理</span>
			</div>
			<div class="hgrzy">
				<h2>支付密码管理</h2>
				<div class="mmgl">
					<form class="form-horizontal" action='#' method='post'>
						<div class="form-group">
							<div class="col-xs-3 scrzgmc">新支付密码:&nbsp;</div>
							<div class="col-xs-3">
								<input type="password" name="password1" class="form-control"
									placeholder="新支付密码" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-3 scrzgmc">重复新支付密码:&nbsp;</div>
							<div class="col-xs-3">
								<input type="password" name="password2" class="form-control"
									placeholder="重复新密码" required />
							</div>
						</div>
						<?php if($data['user']['paypassword']){ ?>
						<div class="form-group">
							<div class="col-xs-3 scrzgmc">原支付密码:&nbsp;</div>
							<div class="col-xs-3">
								<input type="password" name="paypassword" class="form-control"
									placeholder="原支付密码" />
							</div>
						</div>
						<?php } ?>
						<button type="submit" class="btn btn-success quedinst">确定更改支付密码</button>
					</form>
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
<!--底部-->


<!--底部-->
<script type='text/javascript'>
$(document).ready(function(){

});
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
        $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
});
</script>
</body>
</html>