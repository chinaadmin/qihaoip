<include file="Public/header" />
<!--logo与导航-->
<!--头部-->
<!--主体-->
<div class="hzlcon">
<!--左侧导航-->
<include file="Public/left" />
<!--左侧导航-->
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="{:U('User/showself')}">基本信息</a> > <a href="{:U('User/repass')}">修改密码</a>
</div>
<div class="hgrzy">
<div class="col-xs-12 sell_creatlist">
	修改密码
</div>
<div class="col-xs-12 buzholist" >
<div class="col-xs-12" style="height:55px;background: url({$Think.STATIC_V2}images/password.png) no-repeat center top;">
</div>
</div>
<div class="mmgl">
<form class="form-horizontal" action='#' method='post'>
	<div class="form-group">
	    <div class="col-xs-4 scrzgmc">新登录密码:&nbsp;   </div>
	    <div class="col-xs-3">
	    <input type="password" name="password1" class="form-control"  placeholder="新登录密码" required />
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-xs-4 scrzgmc">重复新密码:&nbsp;   </div>
	    <div class="col-xs-3">
	    	<input type="password" name="password2" class="form-control" placeholder="重复新密码" required />
	    </div>
	</div>
	<div class="form-group">
		<div class="col-xs-4 scrzgmc">原登录密码:&nbsp;</div>
		<div class="col-xs-3">
			<input type="password" name="password" class="form-control" placeholder="原登录密码" required />
		</div>
	</div>
	  <button type="submit" class="btn btn-warning quedinstk">确定更改登录密码</button>
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
/*导航切换*/
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