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
您当前的位置：<a href="{:U('Buyer/order_list')}">买家中心</a> > <a href="{:U('Buyer/collect_info')}">我收藏的资讯</a>
</div>
<div class="hgrzy">
<!-- <div class="col-xs-12">
<div class="zlyjjyst1 shop_padding">
  <form action="{:U('Buyer/collect_info')}"  method="get">
      <div class="formdivs">
        <input type="text" name="search" class="pasearchs" placeholder="资讯标题" value="{$Think.get.search}"/>
        <input type="submit" value="搜索" class="pasubs"/>
      </div>
  </form>
 </div>
</div> -->
<div class="col-xs-12 zhlist" id="dhconlist0">
<table cellpadding="0" cellspacing="0" class="tablesth_shop" id="fbtable1" rel="1">
	<thead>
		<tr class="first">
			<th width="9%"><h4>序号</h4></th>
			<th width="29%"><h4>资讯标题</h4></th>
			<th width="14%"><h4>收藏时间</h4></th>
			<th width="15%"><h4>操作</h4></th>
		</tr>
	</thead>
	<tbody>
	<notempty name="data['info']">
	<volist name="data['info']" id="vo">
		<tr>
			<td width="9%"><input type="checkbox" name="gwctt{$i}" value="{$vo['id']}"/> &nbsp;{$i}</td>
			<td width="29%"><a href="__APP__/news/{$vo['date']}/{$vo['goodsid']}HTMLSUFFIX">{$vo['title']|msubstr=0,50}</a></td>
			<td width="14%">{$vo['addtime']|date="Y-m-d",###}</td>
			<td width="15%"><a href="javascript:;" class="fbdel">删除</a></td>
		</tr>
	</volist>
		<tr>
			<td colspan="4">
				<div class="paalls">
					<input type="checkbox" name="alls" value="alls" id="alls"/>
					&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>条数据
				</div>
				<div class="seltot"><a href="javascript:;" class="btn btn-default batchdel">批量删除</a></div>
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
<script type='text/javascript'>
/*全选*/
$('#alls').click(function(){
	if(this.checked){
		$("#fbtable1").find("input[name*='gwctt']").prop("checked",true);
	}else{
		$("#fbtable1").find("input[name*='gwctt']").removeAttr("checked");
	}
	zoushu();
})
function zoushu(){
	var num=$("input[name*='gwct']:checked").length;
	$("#nums").html(num);
}
/*全选*/
/*批量删除*/
$('.batchdel').click(function(){
	var num = $("input[name*='gwctt']:checked").length;
	if(num == '0'){
		$.MsgBoxgj.Alert("温馨提示：",'您没有选择数据！');
		return false;
	}
	$.MsgBoxgj.Confirm("温馨提示","您确定要取消添加选中的"+num+"件专利？",function (){
		var row=new Array();
		var str = new Array();
		var n=0;
		var ctc = 0;
		$("input[name*='gwctt']").each(function(){
			if(this.checked){
				ctc = $(this).attr("name");
				$("input[name='"+ctc+"']").each(function(){
					var ids=$(this).val();
					row[n]=ids;
					n++;
				})
			}
		})
		rows = row.join(",");
		var send_data={'id':rows};
		$.post("{:U('Buyer/collect_delete')}",send_data,function(data,status){
			if(data.state == 1){
				$.MsgBoxgj.Alerta("温馨提示：",data.data,function(){
					window.location.reload();
				});
			}else{
				$.MsgBoxgj.Alert("温馨提示：",data.data);
			}
		});
	});		
});
/*批量删除*/

/*单个删除*/
$('.fbdel').click(function(){
	var hval = $(this).parents('tr').find("input[name*='gwct']").val();
	var send_data={'id':hval};
	$.post("{:U('Buyer/collect_delete')}",send_data,function(data){
		if(data.state == 1){
			$.MsgBoxgj.Alerta("温馨提示：",data.data,function(){
				window.location.reload();
			});
		}else{
			$.MsgBoxgj.Alert("温馨提示：",data.data);
		}
	})
})
/*单个删除*/

/*左侧导航*/
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').slideUp("slow");
	});
});
/*左侧导航*/

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