<include file="Public/header" />
<script type='text/javascript'>
/*验证表单*/
function checkyzm(val){
	 var result=true; 
	 $.ajax({  
	        type:'GET',  
	        url:'/Index/User/captcha_chk.html?captcha='+val, 
	        cache : false,   
	        async : false,  
	        success:function(data){
	            if(data=="false"){
	            	result= false; 
		            }
	            else{result=true;}
	        },  
	        error : function(error) {  
	            result= false;  
	        }  
	    });
	return result;
}
function formCheck(){
	var value=$('#yzm').val();
	if(!checkyzm(value)){
		$.MsgBox.Alert("温馨提示：", '验证码填写错误!');
		document.getElementById('refresh').src='<?php echo U('captcha'); ?>#'+Math.random();
		return false;
		}
}
/*验证表单*/
</script>
<!--主体-->
<!--注册-->
<div class="kuang zhuce">
	<div class="container kuangs zhucecon">
		<div class="row">
			<div class="col-xs-9 col-xs-offset-3 zhucecons">
				<p>会员登录</p>
				<div class="touxiang">
					<img src="<?php echo STATIC_V2;?>images/delutu.png" />
				</div>
				<form action="#" onSubmit="return formCheck();" method="post">
					<div class="biaodan">
						<div class="biaodans">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span><input
								type="text" name="username" id="imails" class="inputs"
								placeholder="手机号/邮箱"
								<?php echo session('login_username')?'value="'.session('login_username').'"':''; ?> />
						</div>
						<span>手机号/邮箱不规范</span>
					</div>
					<div class="biaodan">
						<div class="biaodans">
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span><input
								type="password" name="password" id="mima" class="inputs"
								placeholder="密码" />
						</div>
						<span>密码不能为空</span>
					</div>
					<div class="biaodanss">
						<div class="biaodant">
							<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><input
								type="text" name="captcha" id="yzm" class="inputs"
								placeholder="验证码" />
						</div>
						<div class="yzmtu">
							<a href="javascript:"><img
								src="<?php echo U('captcha',['id'=>rand(1000,9999)]); ?>"
								name="verify" id="refresh" title="刷新验证码"
								onclick="document.getElementById('refresh').src='<?php echo U('captcha'); ?>#'+Math.random()" /></a>
						</div>
					</div>
					<div class="fwtk">
						<p>
							<input type="checkbox" name="rember" value="password" /> 记住密码
						</p>
						<span><a href="<?php echo U('forget'); ?>" title="忘记密码"
							target="_blank">忘记密码？</a></span>
					</div>
					<div class="zhucet">
						<button type="submit" class="btns">登 录</button>
					</div>
					<div class="qzhuces">
						<a href="<?php echo U('register'); ?>" title="免费注册"
							target="_blank">还没有帐号？立即免费注册</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--注册-->
<!--主体-->
<include file="Public/foot" />
<script type='text/javascript'>
/*右侧热线*/
$('.rexian li').mouseover(function(){
var tt=$(this).index();
$("div[class*='fwtu']").css('display','none');
$(".fwtu"+tt).css('display','block');
$('.rexian li').children('.fwrx').css('display','none');
$(this).children('.fwrx').css('display','block');
})
$('.rexian li').mouseout(function(){
var tt=$(this).index();
$(".fwtu"+tt).css('display','none');
$(this).children('.fwrx').css('display','none');
})
$('.rexian').mouseout(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
})
/*右侧热线*/
$(document).ready(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
$('input').iCheck({
    checkboxClass: 'icheckbox_minimal-orange',
    radioClass: 'iradio_minimal-orange',
    increaseArea: '20%' // optional
  });
});

</script>