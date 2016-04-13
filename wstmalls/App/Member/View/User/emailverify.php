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
您当前的位置：<a href="{:U('User/showself')}">基本信息</a> > <a href="{:U('User/emailverify')}"><notempty name="data['email']">修改邮箱<else/>邮箱认证</notempty></a>
</div>
<div class="hgrzy">
<div class="col-xs-12 sell_creatlist">
	<notempty name="data['email']">修改邮箱<else/>邮箱认证</notempty>
</div>
<div class="col-xs-12 buzholist" >
<div class="col-xs-12" style="height:55px;background: url({$Think.STATIC_V2}images/email1.png) no-repeat center top;">
</div>
</div>
<div class="mmgl">
<form class="form-horizontal">
 <div class="form-group">
    <div class="col-xs-4 scrzgmc">邮箱:&nbsp;   </div>
    <div class="col-xs-3">
    <input type="text" name="newmima" class="form-control yx" id="phone" placeholder="邮箱" />
    </div>
  </div>
<div class="form-group">
    <div class="col-xs-4 scrzgmc">验证码:&nbsp;   </div>
    <div class="col-xs-2">
    <input type="text" name="dbnewmima" class="form-control yzm" placeholder="验证码" />
    </div>
	<div class="col-xs-1">
	<a href="javascript:" id="kkkst" class="throw_mess" onClick="send_pin()">获取验证码</a>
	</div>
  </div>

  <button type="button" class="btn btn-warning quedinstk">确定验证码</button>
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
/*确定验证码*/
$('.quedinstk').click(function(){
	var yzm = $('.yzm').val();
	var yx = $('.yx').val();
	if(!yx){
		$.MsgBoxgj.Alert("温馨提示：",'邮箱不能为空！');
		return false;
	}
	if(!yzm){
		$.MsgBoxgj.Alert("温馨提示：",'验证码不能为空！');
		return false;
	}
	var verify = $('.form-horizontal').serialize();
	$.post("{:U('Member/User/email_verify')}",verify,function(data){
		var obj = eval("(" + data+ ")");
		if(obj.data.state == '1'){
			$.MsgBoxgj.Alerta("温馨提示：",obj.data.data,function(){
				window.location.href="{:U('Member/User/showself')}";
	    	})
		}else{
			$.MsgBoxgj.Alert("温馨提示：",obj.data.data);
		}		
	});
});
/*发送验证码*/
var interval = 1000; 
var n=1;
function ShowCountDown(time,divname){ 
var leftTime=(2*60*1000)-(n*1000);
var leftsecond = parseInt(leftTime/1000); 
var cc = $(divname); 
if(n>120){
cc.html("获取验证码");
cc.removeClass("kkkst");
cc.attr('onclick','send_pin()');
cc.attr('href','javascript:');
}else{
cc.html(leftsecond+"秒"); 
cc.addClass("kkkst");
cc.removeAttr("onclick");
cc.removeAttr("href");
}
n++;
} 

function send_pin(){
	$.ajax({
		type:"POST",
		url:"/Index/User/send_pin",
		data:'data='+$('#phone').val(),
		success:function(data){
			var re = eval(data);
			if(re.success){
				alert('验证码发送成功，请等待接收并输入验证码。');
				//n=1;
				//var clock=window.setInterval(function(){ShowCountDown('','#kkkst');}, interval);
				n=1;
				var clock=window.setInterval(function(){ShowCountDown('','#kkkst');},interval);
			} else {
				alert(re.errorMsg);
			}
		}
	});
	return true;
}
/*发送验证码*/

/*导航切换*/
$(".newhnavlist li").hover(function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-4;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'s.png');
}
},function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-5;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'.png');
}
}
)
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