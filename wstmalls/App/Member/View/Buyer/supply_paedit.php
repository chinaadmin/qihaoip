<include file="Public/header"/>
<!--logo与导航-->
<!--头部-->
<!--主体-->
<div class="hzlcon">
<!--左侧导航-->
<include file="Public/left"/>
<!--左侧导航-->
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="{:U('Buyer/index')}">买家中心</a> > 专利求购
</div>
<div class="hgrzy">
<div class="col-xs-12 sell_creat">
<ul>
<li><a href="javascript:;" class="selcreat">专利求购</a></li>
</ul>
</div>
<div class="col-xs-12 fbzlform creat_border" id="yqljs0">
<form class="form-horizontal" id="repatent">
 <div class="form-group">
 <input type="hidden" name="uid" value="{$data['pa']['uid']}"/>
 <input type="hidden" name="type" value="patent"/>
	<div class="col-xs-12 scrzgmc fbqgxx1">
	    <font>*</font>求购标题：&nbsp;
	    <input type="text" name="paname" class="form-control fbqgxx" placeholder="求购标题" value="{$data['pa']['title']}"/>
	</div>
   <div class="col-xs-12 scrzgmc fbqgxx1">
    <font>*</font>求购分类：&nbsp;
		<select class="form-control fbqgxx" name="pacate">
		<volist name="data['cate']['zl']" id="vo">
		  <option <if condition="$vo['id'] eq $data['pa']['groupid']">selected = "selected"</if> value="{$vo['id']}">{$vo['name']}</option>
		</volist>
		</select>
  </div>
    <div class="col-xs-12 scrzgmc fbqgxx1">
    	价格要求：&nbsp;
    <input type="text" name="paprice" class="form-control fbqgxx" placeholder="价格要求" value="{$data['pa']['price']}"/>不填则为“面议”
  </div>
  <div class="col-xs-12">
    <div class="col-xs-1 scrzgmc fbqgxx1"><font>*</font>过期日期：&nbsp;   </div>
    	<input type="text" name="paendtime" class="form-control fbqgxx" id="J-xl" placeholder="过期日期" value="{$data['pa']['endtime']}"/>
		<select class="form-control fbqgxx" name="paselecttime">
		  <option value="0">也可选择有效期</option>
		  <option value="1">12个月</option>
		  <option value="2">6个月</option>
		</select>
  </div>
  <div class="col-xs-12 scrzgmc fbqgxx1">
   	 <span style="float: left;">&nbsp;&nbsp;详细说明：&nbsp;</span>
    <textarea class="form-control fbqgxx" name="painstruct" rows="3" placeholder="为了更好的展示您的求购，建议填写详细说明">{$data['pa']['content']}</textarea>
  </div>
   <div class="col-xs-12">
  <button type="button" class="btn btn-warning weizhidaxiao patentqueding">确定</button>
  </div>
</form>
</div>
</div>
<include file="Public/foot"/>
</div>
</div>
<!--右侧内容-->
</div>
<!--主体-->
<script type='text/javascript'>
//发布商标信息
$('.patentqueding').click(function(){
	if($("input[name='paname']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'求购标题不能为空！',function(){
			$("input[name='paname']").focus();
		});
		return false;
	}
	if($("input[name='pacate']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'求购分类不能为空！',function(){
			$("input[name='pacate']").focus();
		});
		return false;
	}
	if(isNaN($("input[name='paprice']").val())){
		$.MsgBoxgj.Alerta("温馨提示：",'价格必须为数字！',function(){
			$("input[name='paprice']").focus();
		});
		return false;
	}
	if($("input[name='paendtime']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'过期日期不能为空！',function(){
			$("input[name='paendtime']").focus();
		});
		return false;
	}	
	var patent = $('#repatent').serialize();
	$.post("{:U('Member/Buyer/supply_edit')}",patent,function(data){
		if(data.state == 1){
			$.MsgBoxgj.Alerta("温馨提示：",data.data,function(){
				window.location.href = "{:U('Member/Buyer/supply_list',array('tmpa'=>'2'))}";
			});
			/* $('#retrade :input').not(':button,:hidden').val('');//核心
			$('#preview1').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview2').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview3').attr('src','/qihaov2/images/dendai.png');//核心 */
		}else{
			$.MsgBoxgj.Alert("温馨提示：",data.data);
		}	
	});
});

laydate({
            elem: '#J-xl'
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
		$('#preview'+xiabiao).attr('src', re[1]);
		$('#thumb'+xiabiao).val(re[1]);
	} else {
		alert(re[1]);
	}
}
/*本地图片上传处理*/
/*网络图片上传处理*/
$('.quyu1 .changekk').click(function(){
var tt=$('#ljsst').val();
var send_data={'file':tt};
$.post("/Index/Upload/img",send_data,function(data){
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
$('#preview'+xbt).attr("src","images/dendai.png");
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
/*开启或关闭上传图片弹框*/
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
</script>
</body>
</html>