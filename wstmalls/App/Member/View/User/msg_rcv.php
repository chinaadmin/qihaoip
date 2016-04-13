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
您当前的位置：<a href="{:U('User/index')}">会员首页</a> > <a href="{:U('User/msg_rcv')}">我的消息</a>
</div>
<div class="hgrzy">

<div class="col-xs-12 " id="dhconlist0">
<table cellpadding="0" cellspacing="0" class="tablesth_shop" id="fbtable1" rel="1">
<thead>
	<tr class="first">
		<th width="37%">标题</th>
		<th width="15%">发送人</th>
		<th width="15%">发布时间</th>
		<th width="15%">
			<select class="form-control xianshit" name="pse">
			     <option <eq name="data['zt']" value="0">selected = "selected"</eq> value="0">全部</option>
			     <option <eq name="data['zt']" value="1">selected = "selected"</eq> value="1">已读</option>
			     <option <eq name="data['zt']" value="2">selected = "selected"</eq> value="2">未读</option>
			</select>
		</th>
		<th width="18%">操作</th>
	</tr>
</thead>
<tbody>

<volist name="data['msg']" id="vo">
	<tr>
		<td width="37%"><input type="checkbox" name="gwct{$vo['id']}" value="{$vo['id']}"/> &nbsp;{$vo['title']}</td>
		<td width="15%">{$vo['sender']}</td>
		<td width="15%">{$vo['sendtime']|date="Y-m-d",###}</td>
	<eq name="vo['state']" value="1">
		<td width="15%">已读 <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>
	<else />
		<td width="15%" class="no_read">未读 <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>
	</eq>
	<eq name="vo['state']" value="1">
		<td width="18%"><a href="javascript:;" class="tuijianclick" rel="{$vo['id']}">查看</a> &nbsp;<a href="javascript:;" class="fbdel" onClick="deleteRe('{$vo['id']}',this);">删除</a></td>
	<else />	
		<td width="18%"><a href="javascript:;" class="read_ing" rel="{$vo['id']}">查看</a> &nbsp;<a href="javascript:;" class="fbdel" onClick="deleteRe('{$vo['id']}',this);">删除</a></td>
	</eq>
	</tr>
	<tr class="all_message">
		<td colspan="5">{$vo['data']}</td>
	</tr>
</volist>
<notempty name="data['msg']">
	<tr style="background:#EBEBEB;">
		<td colspan="5">
			<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:" id="deletes1">删除</a></div>
		</td>
	</tr>
</notempty>
</tbody>
</table>
{$data['page']}
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
/*查看功能*/
$('.tuijianclick').live('click',function(){
	$(this).parents('tr').next('.all_message').slideToggle("slow");
	$(this).parents('tr').next('.all_message').siblings('.all_message').slideUp("slow");
});

$('.read_ing').click(function(){
	var sid = $(this).attr('rel');
	var send_data = {'sid':sid};
	var obj = $(this);
	$.post("{:U('Member/User/view_state')}",send_data,function(data){
		var ob = eval("(" + data+ ")");
		if(ob.data.state == 1){
			obj.removeClass('read_ing');
			obj.addClass('tuijianclick');
			obj.parents('td').prev().removeClass('no_read');
			obj.parents('td').prev().html("已读 <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>");
			obj.parents('tr').next('.all_message').slideToggle("slow");
			obj.parents('tr').next('.all_message').siblings('.all_message').slideUp("slow");
		}
	})	
})
/*查看功能*/

/*全选*/
$('#alls').click(function(){
if(this.checked){
$(".tablesth_shop").find("input[name*='gwct']").prop("checked",true);
}else{
$(".tablesth_shop").find("input[name*='gwct']").removeAttr("checked");
}
//zoushu();
})
$(".tablesth_shop input[name*='gwct']").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
//zoushu();
})
/*全选*/

/*选择状态*/
$('.xianshit').change(function(){
	var pse = $(".xianshit option:selected").val();
	var parameter = {'zt':pse};
	$.post("{:U('Member/User/msg_rcv')}",parameter,function(data){
		if(data){
			window.location.reload();
		}
	});
})
/*选择状态*/
 
/*单个删除*/
function deleteRe(fid,obj){
	var send_data={'sid':fid};
	$.post("{:U('Member/User/batch_del')}",send_data,function(data){
		var ob = eval("(" + data+ ")");
		if(ob.data.state == 1){
			$.MsgBox.Alert("温馨提示：",ob.data.msg);
			$(obj).parent().parent().remove();
		}else{
			$.MsgBox.Alert("温馨提示：",ob.data.msg);
		}
	})
}  

/*删除*/
$('#deletes1').click(function(){
	 var row=new Array();
	 var n=0;
	 $(".tablesth_shop input[name*='gwct']").each(function(){
		 if(this.checked){
		 	var ids=$(this).attr("value");
		 	row[n]=ids;
		 	n++;
		 }
	 })
	 var rows = row.join(",");
	 var send_data={'sid':rows};
	 $.post("{:U('Member/User/batch_del')}",send_data,function(data){
		 var obj = eval("(" + data+ ")");
		 if(obj.data.state == 1){
			$.MsgBox.Alerta("温馨提示：",obj.data.data,function(){
				window.location.reload();
	    	})
		 }else{
			$.MsgBox.Alert("温馨提示：",obj.data.msg);
		 }
	 })		
})
/*删除*/
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