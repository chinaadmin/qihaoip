<include file="Public/header" />
<!--主体-->
<!--注册-->
<div class="kuang zhuce">
<div class="container kuangs zhucecon">
<div class="row">
<div class="col-xs-9 col-xs-offset-3 zhucecons">
<p>密码找回</p>
<div class="touxiang"><img src="<?php echo STATIC_V2;?>images/delutu.png"/></div>
<span>通过手机号或者邮箱验证码来找回密码。亦可通过人工申诉来找回密码！</span>
<form action="#" method="post">
<div class="biaodan">
<div class="biaodans">
<span class="glyphicon glyphicon-user" aria-hidden="true"></span><input type="text" name="username" id="username" class="inputs" placeholder="手机号/邮箱" required/>
</div><span>手机号/邮箱不规范</span>
</div>
<div class="biaodan">
<div class="biaodans">
<span class="glyphicon glyphicon-lock" aria-hidden="true"></span><input type="password" name="password" id="mima" class="inputs" placeholder="密码" required/>
</div><span>密码不能为空</span>
</div>
<div class="biaodan">
<div class="biaodans">
<span class="glyphicon glyphicon-lock" aria-hidden="true"></span><input type="password" name="password1" id="dbmima" class="inputs" placeholder="重复密码" required/>
</div><span>两次密码不一致</span>
</div>
<div class="biaodan">
<div class="biaodant">
<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><input type="text" name="pin" id="yzm" class="inputs" placeholder="验证码" required/>
</div><a href="javascript:" onclick="send_pin()">发送验证码至手机/邮箱</a>
</div>
<div class="zhucet"><button type="submit" class="btns" onclick="return chk_form()">提交</button></div>
</form>
</div>
</div>
</div>
</div>
<!--注册-->
<!--主体-->
<include file="Public/foot" />
<script type='text/javascript'>
/*注册验证*/
/*判断是否为移动电话*/
function isChinaMob(ui){ 
	var valid=/^1[3|4|5|8][0-9]\d{8}$/; 
	return (valid.test(ui));
}

function isMail(ui){ 
	var valid=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
	return (valid.test(ui));
}

//表单提交前检查
function chk_form(){
	if(!isMail($('#username').val()) && !isChinaMob($('#username').val())){
		$('#username').parent().parent().children('span').css('display','block');
		$('#username').focus();
		return false;
	};
	if($('#mima').val() != $('#dbmima').val()){
		$('#dbmima').parent().parent().children('span').css('display','block');
		$('#dbmima').focus();
		return false;
	};
	return true;
}

//验证码发送
function send_pin(){
	if($('#username').val().length<6){
		alert('用户名长度不能少于6位！');
		return false;
	}
	$.ajax({
		type:"POST",
		url:"/Index/User/send_forget_pin",
		data:'data='+$('#username').val(),
		success:function(data){
			var re = eval(data);
			if(re.success){
				alert('验证码发送成功，请等待接收并输入验证码。');
			} else {
				alert(re.errorMsg);
			}
		}
	});
	return true;
}
$('.biaodans input').blur(function(){
	$(this).parent().parent().children('span').css('display','none');
	if ($(this).val() == '') {
		$(this).parent().parent().children('span').css('display','block');
	}
})
$('#username').blur(function(){
	$(this).parent().parent().children('span').css('display','none');
	if(!(isMail($('#username').val())||isChinaMob($('#username').val()))){
		$(this).parent().parent().children('span').css('display','block');
	}
})
$('#dbmima').blur(function(){
	$(this).parent().parent().children('span').css('display','none');
	if($('#mima').val()!= $('#dbmima').val()){
		$(this).parent().parent().children('span').css('display','block');
	}
})
/*注册验证*/
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