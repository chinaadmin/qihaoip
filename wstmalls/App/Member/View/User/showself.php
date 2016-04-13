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
	您当前的位置：<a href="{:U('User/index')}">会员首页</a> > <a href="{:U('User/showself')}">基本信息</a>
</div>
<div class="hgrzy">
<!--账号信息-->
<div class="col-xs-12 member_divbor">
<div class="col-xs-12 member_divtit">
帐号信息
</div>
<div class="member_divcontent">
	<input type='hidden' name='img' class='form-control hval' id="pics"/>
	<a href="javascript:void(0)" class="OpenDialog" title="修改头像"><img class="img-thumbnail" src=<notempty name="data['img']">"{$data['img']}"<else />"{$Think.STATIC_V2}images/member.jpg"</notempty> /></a>
</div>
<div class="member_div_content" >
<div class="col-xs-12 div_top">
<div class="col-xs-12 div_top_left">
<div class="member_message_left mar_left">会员名：{$data['username']}</div>
<div class="col-xs-12 member_message">
<form class="form-horizontal"  id="realname">
	<input type="hidden" name="uid" value="{$data['id']}">
	<input type="hidden" name="type" value="realname">
	<div class="form-group realname">
		<div class="member_message_left"><font>*</font>真实姓名：&nbsp;   </div> 
		<div class="zj">
			<div class="col-xs-4 ">
				<notempty name="data['name']">
					<label style="font-weight: normal;line-height: 34px;">{$data['name']}</label>
				<span>
					<if condition="$data['gender'] eq '1'">
						先生
					<elseif condition="$data['gender'] eq '2'"/>
						女士
					</if>
				</span>
				<else/>
					<label style="font-weight: normal;line-height: 34px;">未填写</label>
				</notempty>
				<span class="wdfbwztt realbutton">
					<a href="javascript:;" class="mar_left_a realnamexg">修改</a>
				</span>
			</div>
		</div>
	</div>
</form>
 
</div>
<div class="member_message_left mar_left">
	<notempty name="data['mobile']">
		<font>*</font>手机：&nbsp; {$data['mobile']} 
		<a href="{:U('User/mobileverify')}" class="mar_left_a">修改</a>
	<else />
		<font>*</font>手机：&nbsp; 未认证
		<a href="{:U('User/mobileverify')}" class="btn btn-warning mar_left_btn" >去验证</a>
	</notempty>
</div>
<div class="member_message_left mar_left">
	<notempty name="data['email']">
		<font>*</font>邮箱：&nbsp; {$data['email']}  
		<a href="{:U('User/emailverify')}" class="mar_left_a">修改</a>
	<else />
		<font>*</font>邮箱：&nbsp; 未认证 
		<a href="{:U('User/emailverify')}" class="btn btn-warning mar_left_btn">去认证</a>
	</notempty>
</div>
</div>
</div>

</div>
</div>
<!--账号信息-->
<!--联系人信息-->
<div class="col-xs-12 member_divbor">
<div class="col-xs-12 member_divtit">
联系人信息
</div>
<div class="member_div_content" >
<div class="col-xs-12 div_top">
<div class="col-xs-12 div_top_left">
<div class="col-xs-12 " id="member_lxren">
<form class="form-horizontal" id="form_lxren">
	<input type="hidden" name="uid" value="{$data['id']}">
	<input type="hidden" name="type" value="contact">
	<div class="form-group remove_margin_bottom tel">
		<div class="member_message_left">电话：&nbsp;   </div>
		<div class="col-xs-4 ">
			<label style="font-weight: normal;line-height: 34px;">{$data['tel']}</label>
		</div>
	</div>
	<div class="form-group remove_margin_bottom qq">
		<div class="member_message_left">QQ：&nbsp;   </div>
		<div class="col-xs-4 ">
			<label style="font-weight: normal;line-height: 34px;">{$data['qq']}</label>
		</div>
	</div>
<div class="form-group remove_margin_bottom addr">
<div class="member_message_left">联系地址：&nbsp;   </div>
<div class="col-xs-4">
<label style="font-weight: normal;line-height: 34px;">{$data['province']}{$data['city']}{$data['address']}</label>
</div>
  </div>
<div class="form-group remove_margin_bottom info">
<div class="member_message_left">个人简介：&nbsp;   </div>
    <div class="col-xs-10">
    	<label style="font-weight: normal;line-height: 34px;">{$data['about']}</label>
    </div>
  </div>
  <div class="contactinfo"><button type="button" class="btn btn-warning butyes btn_creatss modify">修改</button></div>
</form> 
</div>
</div>
</div>

</div>
</div>
<!--联系人信息-->
<!--银行帐户信息-->
<div class="col-xs-12 member_divbor">
<div class="col-xs-12 member_divtit">
	银行帐户信息
</div>
<div class="member_div_content" >
	<div class="col-xs-12 div_top">
		<div class="col-xs-12 div_top_left">
		<form id="yhzhxx"  class="form-horizontal">
			<input type="hidden" name="uid" value="{$data['id']}">
			<input type="hidden" name="type" value="bank">
			<div class="form-group remove_margin_bottom yhyh">
				<div class="member_message_left">银行：</div>
				<div class="col-xs-4">
					<label style="font-weight: normal;line-height: 34px;">{$data['bank']}</label>
				</div>
			</div>
			<div class="form-group remove_margin_bottom yhhm">
				<div class="member_message_left">户名：</div>
				<div class="col-xs-4 ">
				<label style="font-weight: normal;line-height: 34px;">{$data['acname']}</label>
				</div>
			</div>
			<div class="form-group remove_margin_bottom yhzh">
				<div class="member_message_left">账号：</div>
				<div class="col-xs-4 ">
					<label style="font-weight: normal;line-height: 34px;">{$data['bankcard']}</label>
				</div>	
			</div>
			<div class="yhedit"><button type="button" class="btn btn-warning butyes account">修改</button></div>
		</form>
		</div>
	</div>
</div>
</div>
<!--银行帐户信息-->
</div>
<include file="Public/foot" />
</div>
</div>
</div>
<!--主体-->
<!--右侧热线-->
<!--裁切图片-->
	<div class="dialog">
		<div class="span12">
				<div class="jc-demo-box">
					<img src="<?php echo STATIC_V2;?>images/pics_default.png" id="target" alt="图片预览" class="bigtutts"  />
					<div id="preview-pane">
						<div class="preview-container" >
							<img src="<?php echo STATIC_V2;?>images/pics_default.png" class="jcrop-preview"/>
						</div>
						<form action="<?php echo U('Member/User/uploadsImg')?>" class="ajaxPic" enctype="multipart/form-data" method="post">
								<input type="button" value="选择图片" onclick="document.all.tt.click()" class="btn btn-info"/>
								<INPUT TYPE="file" name="tt" style="display:none" id="tt" >
								<!-- <input type="submit" value="提交上传"  class="btn btn-danger"/> -->
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<form action="__URL__/cutImg" method="post" class="ajaxCut" style="padding-top:10px;padd-bottom:20px;">  
            <input type="hidden" id="x" name="x" />  
            <input type="hidden" id="y" name="y" />
			<input type="hidden" id="x1" name="x1" />  
            <input type="hidden" id="y1" name="y1" />
            <input type="hidden" id="w" name="w" />  
            <input type="hidden" id="h" name="h" />
            <input type="hidden" name="filename" value="">
            <input type="submit" value="完成裁切" class="btn btn-primary"/>
			<input type="button" value="取消" class="btn btn-default closeDialog"/> 
        </form>
	</div>
	<!--裁切图片-->
<!--右侧热线-->
<!--底部-->


<!--底部-->
<script type='text/javascript'>
//修改银行账号信息
$('.account').live('click',function(){
	var yhyh = $('#yhzhxx .yhyh').find('label').html();
	var yhhm = $('#yhzhxx .yhhm').find('label').html();
	var yhzh = $('#yhzhxx .yhzh').find('label').html();
	$('#yhzhxx').find('div').removeClass('remove_margin_bottom');
	$('#yhzhxx .yhyh').find('.col-xs-4').html('<input type="text" name="gsyh" class="form-control" placeholder="银行" value="'+yhyh+'"/>');
	$('#yhzhxx .yhhm').find('.col-xs-4').html('<input type="text" name="yhxm" class="form-control" placeholder="户名" value="'+yhhm+'"/>');
	$('#yhzhxx .yhzh').find('.col-xs-4').html('<input type="text" name="yhkh" class="form-control" placeholder="银行" value="'+yhzh+'"/>');
	$(this).remove();
	$('.yhedit').html('<button type="button" class="btn btn-warning butyes btn_editss">保存</button>');
});
//提交修改银行账户信息功能
$('.btn_editss').live("click",function(){
	var yhinfo = $('#yhzhxx').serialize();
	$.post("{:U('Member/User/edit')}",yhinfo,function(data){
		var obj = eval("(" + data+ ")");
		if(obj.data.state == 1){
			$.MsgBoxgj.Alert("温馨提示：",obj.data.data);
			$('#yhzhxx').find('div').addClass('remove_margin_bottom');
			$('#yhzhxx .yhyh').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.bank+'</label>');
			$('#yhzhxx .yhhm').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.acname+'</label>');
			$('#yhzhxx .yhzh').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.bankcard+'</label>');
			$(this).remove();
			$('#yhzhxx .yhedit').html('<button type="button" class="btn btn-warning butyes account">修改</button>');
		}else{
			$.MsgBoxgj.Alert("温馨提示：",obj.data.data);
			$('#yhzhxx').find('div').addClass('remove_margin_bottom');
			$('#yhzhxx .yhyh').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.bank+'</label>');
			$('#yhzhxx .yhhm').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.acname+'</label>');
			$('#yhzhxx .yhzh').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.bankcard+'</label>');
			$(this).remove();
			$('#yhzhxx .yhedit').html('<button type="button" class="btn btn-warning butyes account">修改账户</button>');
		}	
	})
});

//联系人信息修改
$('.modify').live('click',function(){
	var tel = $('#member_lxren .tel').find('label').html();
	var qq = $('#member_lxren .qq').find('label').html();
	var addr = $('#member_lxren .addr').find('label').html();
	var uid = "{$data['id']}";
	var info = $('#member_lxren .info').find('label').html();
	$('#form_lxren').find('div').removeClass('remove_margin_bottom');
	$('#member_lxren .tel').find('.col-xs-4').html('<input type="text" name="lxtel" class="form-control" placeholder="电话" value="'+tel+'"/>');
	$('#member_lxren .qq').find('.col-xs-4').html('<input type="text" name="lxqq" class="form-control" placeholder="qq" value="'+qq+'"/>');
	var lxrinfo = {'uid':uid};
	$.post("{:U('Member/User/contact')}",lxrinfo,function(data){
		$('#member_lxren .addr').html(data);
	})	
	$('#member_lxren .info').find('.col-xs-10').html('<textarea class="form-control" name="mdzs" rows="3" placeholder="个人简介">'+info+'</textarea>');
	$('.modify').remove();
	
	$('#member_lxren .contactinfo').html('<button type="button" class="btn btn-warning butyes contactsave">保存</button>');
});

//提交修改联系人信息功能
$('.contactsave').live("click",function(){
	var lxrinfo = $('#form_lxren').serialize();
	$.post("{:U('Member/User/edit')}",lxrinfo,function(data){
		var obj = eval("("+data+")");
		if(obj.data.state == 1){
			$.MsgBoxgj.Alert("温馨提示：",obj.data.data);
			$('#form_lxren').find('div').addClass('remove_margin_bottom');
			$('#form_lxren .tel').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.tel+'</label>');
			$('#form_lxren .qq').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.qq+'</label>');
			$('#form_lxren .addr').find('.col-xs-10').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.addr+'</label>');
			$('#form_lxren .info').find('.col-xs-10').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.about+'</label>');
			$('.contactinfo').find('.contactsave').remove();
			$('.contactinfo').html('<button type="button" class="btn btn-warning butyes modify">修改</button>');
		}else{
			$.MsgBoxgj.Alert("温馨提示：",obj.data.data);
			$('#form_lxren').find('div').addClass('remove_margin_bottom');
			$('#form_lxren .tel').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.tel+'</label>');
			$('#form_lxren .qq').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.qq+'</label>');
			$('#form_lxren .addr').find('.col-xs-10').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.addr+'</label>');
			$('#form_lxren .info').find('.col-xs-10').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.about+'</label>');
			$('.contactinfo').find('.contactsave').remove();
			$('.contactinfo').html('<button type="button" class="btn btn-warning butyes modify">修改</button>');
		}	
	})
});

//获取省份下拉框的值传给后台
$('.sheng').live('change',function(){
	var sg = $(".sheng option:selected").val();
	var parameter = {'sfid':sg};
	$.post("{:U('Member/User/chengshi')}",parameter,function(data){
		$('.shi').html(data);
	});
})

//真实姓名修改功能
$('.realnamexg').live('click',function(){
	var uid = "{$data['id']}";
	var xbinfo = {'uid':uid};
	$.post("{:U('Member/User/account_info')}",xbinfo,function(data){
		$('#realname .realname').find('.zj').append(data);
		$(this).prev().remove();
		$('#realname .realname').find('.zj').append('<div class="col-xs-2 wdfbwztt realbutton"><button type="button" class="btn btn-warning realdetermine">保存</button></div>');
	})
	var realname = $('.realname .col-xs-4').find('label').html();
	if(realname == '未填写'){
		$('.realname').find('.col-xs-4').html('<input type="text" name="zlmcst" class="form-control" placeholder="真实姓名" value=""/>');
	}else{
		$('.realname').find('.col-xs-4').html('<input type="text" name="zlmcst" class="form-control" placeholder="真实姓名" value="'+realname+'"/>');
	}	
	
});

//提交修改真实姓名功能
$('.realdetermine').live("click",function(){
	var realdata = $('#realname').serialize();
	$.post("{:U('Member/User/edit')}",realdata,function(data){
		var obj = eval("(" + data+ ")");
		if(obj.data.state == 1){
			$.MsgBoxgj.Alert("温馨提示：",obj.data.data);
			if(obj.data.realname == ''){
				$('.realname').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">未填写</label>');
			}else{
				$('.realname').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.realname+'</label>'+'<span>'+obj.data.gender+'</span>');
			}	
			$('.realname .fxk').remove();
			$('#realname .realname .zj .realbutton').remove();
			$('#realname .realname .zj').find('.col-xs-4').append('<span class="wdfbwztt realbutton"><a href="javascript:;" class="mar_left_a realnamexg">修改</a></span>');
		}else{
			$.MsgBoxgj.Alert("温馨提示：",obj.data.data);
			if(obj.data.realname == ''){
				$('.realname').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">未填写</label>');
			}else{
				$('.realname').find('.col-xs-4').html('<label style="font-weight: normal;line-height: 34px;">'+obj.data.realname+'</label>'+'<span>'+obj.data.gender+'</span>');
			}
			$('.realname .fxk').remove();
			$('#realname .realname .zj .realbutton').remove();
			$('#realname .realname .zj').find('.col-xs-4').append('<span class="wdfbwztt realbutton"><a href="javascript:;" class="mar_left_a realnamexg">修改</a></span>');
		}	
	})
});

$(function(){
	$('.OpenDialog').click(function(){
		$('div.dialog').show();
		$('<div class="modal-backdrop"></div>').appendTo('body');
		return false;
	})
	
$('#tt').change(function(){
	$('.ajaxPic').submit();
})
	
//ajax上传图片并且裁切生成缩略图
$('form.ajaxPic').submit(function(){
	$.ajaxFileUpload({
	    url: $(this).attr('action'),
	    secureuri: false,
	    fileElementId: 'tt',
	    dataType: 'json',
	    success: function(ajax){
	        var img1 = $('div.jc-demo-box').find('img');
	        var $pimg = $('.jcrop-preview');
	        var $pcnt = $('#preview-pane .preview-container'), xsize = $pcnt.width(), ysize = $pcnt.height();
	        var $preview = $('#preview-pane');
	        img1.attr('src', ajax.data);
	        $('input[type=hidden][name=filename]').val(ajax.data);
	        $('<img/>').attr('src', ajax.data).load(function(){
	            $('#target').css({
	                width: this.width,
	                height: this.height,
	            })
	            $pimg.css({
	                width: this.width,
	                height: this.height,
	            })
	            
	        })
	        
	        $('#target').imgAreaSelect({
	            aspectRatio: '120:120',
	            onSelectChange: preview
	        });
	        
	        function preview(img, selection){
	            var scaleX = 120 / selection.width;
	            var scaleY = 120 / selection.height;
	            var width = $('#target').width();
	            var height = $('#target').height();
	            $('.jcrop-preview').css({
	                width: Math.round(scaleX * width) + 'px',
	                height: Math.round(scaleY * height) + 'px',
	                marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
	                marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
	            });
	            $('#x').val(selection.x1);
	            $('#y').val(selection.y1);
	            $('#x1').val(selection.x2);
	            $('#y1').val(selection.y2);
	            $('#w').val(selection.width);
	            $('#h').val(selection.height);
	        }
	    }
	})
	return false;
})
	//ajax上传裁切
	$('form.ajaxCut').submit(function(){
		var thumbnail = $('.img-thumbnail');
		var dialog = $('.dialog');
		$.ajax({
		    url: $(this).attr('action'),
		    type: 'post',
		    data: $(this).serialize(),
		    dataType: 'json',
		    success: function(ajax){
		        thumbnail.attr('src', ajax.data);
		        $('#pics').val(ajax.data);
		        $('input[type=button].closeDialog').trigger('click');
		    }
		})
		return false;
	})

	$('div.dialog input[type=button].closeDialog').click(function(){
		$('div.dialog').hide();
		$('div.modal-backdrop').remove();
		//缩略图裁切框隐藏
		$('div.imgareaselect-outer').hide();
		$('div.imgareaselect-border1').hide();
		$('div.imgareaselect-border2').hide();
		$('div.imgareaselect-selection').hide();
		return false;
	})
})

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
    $(this).parent().siblings('dl').children('dd').slideUp("slow");
	});
	
});
</script>
</body>
</html>