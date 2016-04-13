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
				您当前的位置：<a>商城管理</a> > <a href="<?php echo U('Shop/index') ?>">商城资料</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-12 fbzlform">
					<form class="form-horizontal addform" action='' method='post'>
						<div class="col-xs-12 scfzr scfzr_update">
						<?php if($data['shop']['state']==1):?>
						<div class="col-xs-12 erro_message" id="erro_message">你还没有提交商城审核资料！<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</div>
						<?php endif;?>
						<?php if($data['shop']['state']==2):?>
						<div class="col-xs-12 erro_message" id="erro_message">你提交的商城审核资料正在审核中！<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</div>
						<?php endif;?>
						<?php if($data['shop']['state']==3&&$data['shop']['chkstate']==1):?>
						<div class="col-xs-12 erro_message erro_messages" id="erro_message"> 你的商城审核已通过！去进行商城装修吧！<span class="glyphicon glyphicon-remove removemsg" aria-hidden="true" title="关闭后将不在显示！"></span>
							</div>
						<?php endif;?>
						<?php if($data['shop']['state']==4):?>
						<div class="col-xs-12 erro_message" id="erro_message">你的商城审核未通过！原因：<?php echo $data['shop']['reason']?><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
						<?php endif;?>
							
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">
									<font>*</font>商城名称:&nbsp;
								</div>
								<div class="col-xs-2">
									<input datatype="*0-10" nullmsg="请填写商城名称！" errormsg="超出长度限制！"
										type="text" name="name" class="form-control"
										<?php echo $data['shop']['state']==3||$data['shop']['state']==2?'disabled="disabled"':''?>
										value="<?php echo isset($data['shop']['name'])?$data['shop']['name']:''?>"
										placeholder="16个字符以内" />
								</div>
								<div class="col-xs-1 wdfbwz_update">&nbsp;旗舰店</div>
								<div class="col-xs-2 wdfbwz_updates">提交后不能修改</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">
									<font>*</font>商城头像:&nbsp;
								</div>
								<div class="col-xs-2 img_update">
									<div class="yulan hdendai">
										<a href="javascript:void(0)"
											<?php echo $data['shop']['state']==3||$data['shop']['state']==2?'':'class="posts"'?>><img
											class="logoimg" width="140" height="120"
											src="<?php echo isset($data['shop']['logo'])?$data['shop']['logo']:STATIC_V2.'images/upload_img.jpg'?>" /></a>
										<input datatype="*" nullmsg="请上传图片！" type="hidden" name="logo"
											value="<?php echo isset($data['shop']['logo'])?$data['shop']['logo']:''?>"
											<?php echo $data['shop']['state']==3||$data['shop']['state']==2?'disabled="disabled"':''?>
											class="logo">
									</div>
								</div>
								<div class="col-xs-8 wdfbwz hhline">提交后商城头像不能修改&nbsp;&nbsp;&nbsp;&nbsp;请上传jpg、gif、png格式图片,尺寸为280px*240px,大小不超过500kb。</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">
									<font>*</font>联系人:&nbsp;
								</div>
								<div class="col-xs-2">
									<input datatype="*" nullmsg="请填写联系人！" errormsg="请填写联系人！" type="text" name="person"
										class="form-control"
										value="<?php echo isset($data['shop']['person'])?$data['shop']['person']:''?>"
										placeholder="联系人" />
								</div>

							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">
									<font>*</font>常用邮箱:&nbsp;
								</div>
								<div class="col-xs-2">
									<input datatype="*,e" nullmsg="请填写常用邮箱！" errormsg='请填写正确邮箱！' type="text" name="email"
										class="form-control"
										value="<?php echo isset($data['shop']['email'])?$data['shop']['email']:''?>"
										placeholder="常用邮箱" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">
									<font>*</font>手机号码:&nbsp;
								</div>
								<div class="col-xs-2">
									<input datatype="*,m" nullmsg="请填写手机号码！" errormsg='请填写正确手机号码！' type="text" name="phone"
										class="form-control"
										value="<?php echo isset($data['shop']['phone'])?$data['shop']['phone']:''?>"
										placeholder="手机号码" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">座机号码:&nbsp;</div>
								<div class="col-xs-2">
									<input type="text" name="tel" class="form-control"
										value="<?php echo isset($data['shop']['tel'])?$data['shop']['tel']:''?>"
										placeholder="座机号码" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">联系地址:&nbsp;</div>
								<div class="col-xs-4">
									<input type="text" name="address" class="form-control"
										value="<?php echo isset($data['shop']['address'])?$data['shop']['address']:''?>"
										placeholder="联系地址" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">商城简介:&nbsp;</div>
								<div class="col-xs-9">
									<textarea class="form-control" name="content" rows="4"
										placeholder="为了更好的展示您的商城,建议填写商城简介"><?php echo isset($data['shop']['content'])?$data['shop']['content']:''?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">企业名:&nbsp;</div>
								<div class="col-xs-4">
									<input type="text" name="qyname" class="form-control"
										value="<?php echo isset($data['shop']['qyname'])?$data['shop']['qyname']:''?>"
										placeholder="企业名" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">企业简介:&nbsp;</div>
								<div class="col-xs-9">
									<textarea class="form-control" name="about" rows="4"><?php echo isset($data['shop']['about'])?$data['shop']['about']:''?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-1 scrzgmc">荣誉资质:&nbsp;</div>
								<div class="col-xs-9">
									<textarea class="form-control" name="honor" rows="4"><?php echo isset($data['shop']['honor'])?$data['shop']['honor']:''?></textarea>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<button type="button" class="btn btn-warning weizhidaxiao_baocen">保存</button>
							<?php if($data['shop']['state']!=3):?>
							<button type="submit" class="btn btn-primary">提交审核</button>
							<?php endif;?>
						</div>
					</form>
				</div>
			</div>
			<include file="Public/foot" />
		</div>
	</div>
	<!--右侧内容-->
	<!--上传图片弹框-->
	<div id="zzjs_net" class="zzjs_net"></div>
	<div id="gg" class="tupian">
		<div class="quxiaoss">
			<a href="javascript:void(0)"><img
				src="<?php echo STATIC_V2;?>images/quxiaoss.png" /></a>
		</div>
		<p>图片上传</p>
		<ul>
			<li><a href="javascript:void(0)" class="addbors">本地图片</a></li>
			<li><a href="javascript:void(0)">网络图片</a></li>
		</ul>
		<div class="quyu" id="bedicon0">
			<form id='formFile' name='formFile' method="post"
				action="/Index/Upload/img" target='frameFile'
				enctype="multipart/form-data">
				<input id="ff" type="file" name="file" class="wanless" />
			</form>
			<iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
			<br /> <br /> <a href="javascript:void(0)" class="changekk">上传</a><a
				href="javascript:void(0)" class="clocks">取消</a>
		</div>
		<div class="quyu1" id="bedicon1">
			<input type="text" name="ffg" id="ljsst" class="wanless"
				placeholder="http://" /><br /> <br /> <a href="javascript:void(0)"
				class="changekk">上传</a><a href="javascript:void(0)" class="clocks">取消</a>
		</div>
	</div>
	<!--上传图片弹框-->
</div>
<!--主体-->
<!--右侧热线-->

<!--右侧热线-->
<!--底部-->


<!--底部-->
<script type='text/javascript'>
$(function(){
	$(".addform").Validform({
		tiptype:function(msg,o){
			if(o.type==3){
				$.MsgBox.Alerta("温馨提示", msg);
				}
			},
		postonce:true,
		tipSweep:true,
	});
});

$('.weizhidaxiao_baocen').click(function(){
	var arr = ['name','logo','person','email','phone'];
	for(i=0;i<arr.length;i++){
		var obj = $('.addform').find('input[name='+arr[i]+']');
		if(obj.val()!=''){
			obj.removeClass('Validform_error');
		}else{
			$.MsgBox.Alerta("温馨提示", obj.attr('nullmsg'),function(){
				obj.addClass('Validform_error');
			});
			return false;
		}
	}
	var send = $('.addform').serializeArray();
	var url = "<?php echo U('Member/Shop/ajax_save')?>";
	$.post(url,{'send':send},function(msg){
		$.MsgBox.Alerta("温馨提示", msg.msg);
	});
});

$('.removemsg').click(function(){
	var url ="<?php echo U('Member/Shop/removemsg')?>"
	$.post(url,{'chkstate':2},function(){

	})
})

$('.erro_message span').click(function(){
	$('#erro_message').hide();

})
$(document).ready(function(){

});
/*左侧导航切换*/
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
	$('.ddtits').click(function(){
	$(this).parent().children('.ddxiangqins').slideToggle("slow");
	})
});
/*左侧导航切换*/

/*本地与网络上传切换*/
$('.tupian li').click(function(){
var tt=$(this).index();
$("div[id*='bedicon']").css('display','none');
$("#bedicon"+tt).css('display','block');
$('.tupian li a').removeClass('addbors');
$(this).find("a").addClass('addbors');
})
/*本地与网络上传切换*/
/*本地图片上传处理*/
$('.quyu .changekk').click(function(){
$('#formFile').submit();
clocks();
})
function uploadSuccess(msg) {
           var re = msg.split('|');
    if (re[0] == 'success') {
		$('.logoimg').attr('src', re[1]);
		$('.logo').val(re[1]);
	} else {
		alert(re[1]);
	}
        }
/*本地图片上传处理*/
/*网络图片上传处理*/
$('.quyu1 .changekk').click(function(){
var tt=$('#ljsst').val();
alert(tt);
var send_data={'id':tt};
$.post("aaaa.php",send_data,function(data){
var re = data.split('|');
    if (re[0] == 'success') {
		$('#preview'+xiabiao).attr('src', re[1]);
		$('#thumb'+xiabiao).val(re[1]);
	} else {
		alert(re[1]);
	}
		})
		clocks();
})
/*网络图片上传处理*/
/*删除图片*/
var xbt='';
$('.deletes').click(function(){
xbt=$(this).attr('name');
$('#preview'+xbt).attr("src","<?php echo STATIC_V2;?>images/dendai.png");
$('#thumb'+xbt).val('');
})
/*删除图片*/
/*开启或关闭上传图片弹框*/
function clocks(){
$('#gg').css('display','none');	
$('#zzjs_net').css('display','none');
$(document.body).css("overflow","visible");
}
$('.quxiaoss a').click(function(){
clocks();
})
$('.quyu .clocks').click(function(){
clocks();
})
$('.quyu1 .clocks').click(function(){
clocks();
})
var xiabiao='';
$(".posts").click(function(){
xiabiao=$(this).attr('name');
$('#gg').css('display','block');
$('#zzjs_net').css('display','block');
$(document.body).css('overflow','hidden');
})
//$('.hdendai img').click(function(){
//$('#gg').css('display','block');
//})
/*开启或关闭上传图片弹框*/
</script>
</body>
</html>