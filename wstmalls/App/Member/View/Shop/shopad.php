<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
  <!--左侧导航-->
 <include file="Public/left" />
  <!--左侧导航-->
  <!--右侧内容-->
  <div class="hconright zx_rightwidth">
    <div class="hconrightcon">
      <div class="hytit"> 您当前的位置：<a href="#" title="#">商城管理</a> > <a href="#" title="#">商城装修</a> </div>
      <div class="hgrzy">
        <div class="zx_select_left">
          <p>一键装修</p>
          <span>请选择模板</span> </div>
        <div class="zx_select_mid">
          <div class="zx_select_img <?php echo $data['shop']['template']=='1'?'moban_border':''?>" template="1"><img  src="<?php echo STATIC_V2;?>images/blue.png"/>科技蓝</div>
          <div class="zx_select_img <?php echo $data['shop']['template']=='2'?'moban_border':''?>" template="2"><img  src="<?php echo STATIC_V2;?>images/green.png"/>田园绿</div>
          <div class="zx_select_img <?php echo $data['shop']['template']=='3'?'moban_border':''?>" template="3"><img  src="<?php echo STATIC_V2;?>images/red.png"/>玛瑙红</div>
        </div>
        
        <div class="col-xs-12 zx_moban">

        </div>
      </div>
      
      
      <!--编辑广告弹框-->
      <div id="zzjs_net1" class="zzjs_net"></div>
      <div id="gg1" class="patupianss">
        
      </div>
      <!--编辑广告弹框-->
      
      
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
  </div>
  <!--右侧内容-->
</div>
<!--主体-->
<!--右侧热线-->
<!--右侧热线-->
<!--底部-->
 <include file="Public/foot" />
<!--底部-->
<script type='text/javascript'>
$(function(){
	var url = "<?php echo U('Member/shop/showtemplate')?>";
	$.post(url,{'template':<?php echo $data['shop']['template']?>},function(msg){
		$('.zx_moban').html(msg);
	});
})

/*选择模板*/
$('.zx_select_img').click(function(){
	$('.zx_select_img').removeClass('moban_border');
	$(this).addClass('moban_border');
	var template=$(this).attr('template');
	var url = "<?php echo U('Member/shop/edittemplate')?>";
	$.post(url,{'template':template},function(msg){
		if(msg.code!=2){
			$('.zx_moban').html(msg);
		}else{
			$.MsgBox.Alert('温馨提示',msg.msg);
		}
	});
})
/*选择模板*/
$('.add_ad').live('click',function(){
	var re = $(this).parents('.patupianss').find('.rel').last().attr('rel');
	var rel = parseInt(re)+1;
	var contents=' ';
	contents+="<div class='"+'col-xs-12 zx_dashborder rel'+"' rel='"+rel+"'>";
	
	contents+="<div class='"+'form-group zllefttt'+"'><div class='"+'col-xs-1 scrzgmc'+"'>标题:&nbsp; </div><div class='"+'col-xs-8 hjuli'+"'><input type="+'text'+" class='"+'form-control bt'+"' name='ad["+rel+"][name]' placeholder="+'标题'+"></div></div>";
	contents+="<div class='"+'form-group zllefttt'+"'><div class='"+'col-xs-1 scrzgmc'+"'>图片:&nbsp; </div><div class='"+'col-xs-2 hjuli zx_uploadimg'+"'><button type="+'button'+" class='"+'btn btn-primary posts'+"' name="+'3'+">上传图片</button></div><input type="+'hidden'+" name='ad["+rel+"][img]' id="+'img'+rel+"><div class='"+'col-xs-8 wdfbwz_updates'+"'>请上传jpg、gif、png等格式图片,尺寸为1920*430px,大小不超过500KB</div></div><div class="+'col-xs-12'+"><div class='"+'col-xs-offset-1 col-xs-8 zx_see'+"' ><img src="+'<?php echo STATIC_V2;?>images/zx_upload_defaultimg.jpg'+" id="+'showimg'+rel+"></div></div>";
	contents+="<div class='"+'form-group zllefttt'+"'><div class='"+'col-xs-1 scrzgmc'+"'>链接:&nbsp; </div><div class='"+'col-xs-8 hjuli'+"'><input type="+'text'+" class="+'form-control'+" name='ad["+rel+"][link]' placeholder="+'链接'+"></div></div><div class="+'col-xs-12'+"><div class='"+'col-xs-offset-1 col-xs-8'+"'><div class='"+'btn btn-primary zx_hidden'+"'><input type="+'checkbox'+" name='ad["+rel+"][state]' value="+'1'+">隐藏</div>  <button type="+'button'+" class='"+'btn btn-primary'+"' onClick="+'del_img(this);'+">删除</button></div></div>";
	contents+="</div>";
	$('.dashborder').append(contents);
	$('.rel').last().find('.bt').focus();
})

function del_img(obj){
$(obj).parents('.zx_dashborder').remove();
}
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
		$('#showimg'+xiabiao).attr('src', re[1]);
		$('#img'+xiabiao).val(re[1]);
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
		$('#showimg'+xiabiao).attr('src', re[1]);
		$('#img'+xiabiao).val(re[1]);
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
//$(document.body).css("overflow","visible");
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

$('.posts').live('click',function(){
xiabiao=$(this).parents('.rel').attr('rel');
$('#gg').css('display','block');
$('#zzjs_net').css('display','block');
})
//$('.hdendai img').click(function(){
//$('#gg').css('display','block');
//})
/*开启或关闭上传图片弹框*/
/*开启或关闭编辑广告弹框*/

function clocks2(){
$('#gg1').css('display','none');
$('#zzjs_net1').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.quxiaoss2 a').live('click',function(){
clocks2();
})
$('.quxiao2').click(function(){
clocks2();
})

var zx_id='';
$(".posts2").live('click',function(){
	zx_id=$(this).attr('rel');
	/* $('#zx_id').val(zx_id); */
	var url = "<?php echo U('Member/Shop/filebox')?>";
	$.post(url,{'type':zx_id},function(msg){
		$('#gg1').html(msg);
		$('#gg1').css('display','block');
		$('#zzjs_net1').css('display','block');
		$(document.body).css('overflow','hidden');
	})
})

/*开启或关闭编辑广告弹框*/


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

</script>
</body>
</html>
