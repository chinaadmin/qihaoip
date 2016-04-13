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
				<div class="paleft">
					您当前的位置：<a href="<?php echo U('Trade/Index/Index')?>">商标管家</a> > <a
						href="<?php echo U('Trade/GnTrade/cost_list')?>">费用管理</a>
				</div>
			</div>
			<div class="hgrzy">
				<!--查询-->
				<div class="col-xs-12 patjb">
					<div class="col-xs-12 ">
						<div class="zlyjjyst">
							费用管理商标<span><?php echo $list['count']?></span>件，费用管理总额<span><?php echo $list['total']?></span>件
							<a href="<?php echo U('xiazai_fee')?>" class="btn btn-default postsh">导出清单</a>
							<a href="<?php echo U('Trade/GnTrade/fee_del')?>" class="btn btn-default postsh">一键删除</a>
						</div>
						<div class="zlyjjyst1">
							<form method="post" action="<?php echo U('Trade/GnTrade/cost_list')?>">
								<div class="formdivs">
									<input type="text" name="paseach" class="pasearchs" value="<?php echo $list['paseach']?$list['paseach']:''?>" placeholder="注册号、商标名称、权利人等" />
									<input type="submit" value="检索" class="pasubs" />
								</div>
							</form>
						</div>
					</div>

				</div>
				<!--查询-->
				<!--查询结果-->
				<div class="col-xs-12 pazhlist">
				<form method="post" action="">
					<table cellpadding="0" cellspacing="0" class="tablesths">
						<thead>
							<tr>
								<th width="5%"></th>
								<th width="8%">序号</th>
								<th width="8%">注册号</th>
								<th width="8%">名称</th>
								<th width="7%">申请费</th>
								<th width="7%">驳回复审费</th>
								<th width="7%">异议答辩费</th>
								<th width="7%">设计费</th>
								<th width="7%">商标广告费</th>
								<th width="7%">诉讼维权费</th>
								<th width="7%">其他费用</th>
								<th width="7%">费用总计</th>
								<th width="15%">操作</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($list['trade'] as $key=>$value):?>
							<tr class="zlhover" id="<?php echo $value['uid']?>">
								<td width="5%"><a href="javascript:void(0)" class="tabaction tabactiont zltop" rel="1"><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></a></td>
								<td width="8%"><input type="checkbox" name="ids[]" class="ids" value="<?php echo $value['uid']?>" /> &nbsp;<?php echo $key+1?></td>
								<td width="8%"><a href="javascript:" data-toggle="tooltip" data-placement="bottom" title="类别：<?php echo $value['name']?>"><?php echo $value['reg_id']?$value['reg_id']:ttmid($value['trade_id']) ?></a></td>
								<td width="8%"><?php echo $value['trade_name']?></td>
								<td width="7%"><?php echo number_format($value['reg_fee']+$value['reg_agent_fee'],2)?></td>
								<td width="7%"><?php echo $value['re_chk_fee']?></td>
								<td width="7%"><?php echo $value['replay_fee']?></td>
								<td width="7%"><?php echo $value['design_fee']?></td>
								<td width="7%"><?php echo $value['ad_fee']?></td>
								<td width="7%"><?php echo $value['law_fee']?></td>
								<td width="7%"><?php echo $value['else_fee']?></td>
								<td width="7%" class="fycolors"><?php echo $value['total_fee']?></td>
								<td width="15%">
									<a href="javascript:void(0)" class="tabaction tabactiont posts3"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
									<a href="<?php echo U('Trade/GnTrade/fee_edit',array('uid'=>$value['uid']))?>"  class="tabaction tabactiont"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
								</td>
							</tr>
							<?php endforeach;?>
							<tr>
								<td colspan="13">
									<div class="paalls">
										<input type="checkbox" name="alls" value="alls" id="alls" />&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span
											id="nums">0</span>件商标
									</div>
									<div class="seltot">
										<a href="javascript:void(0)" class="btn btn-default paadd bor_color" url="<?php echo U('xiazai_fee')?>">导出</a>
										<a href="javascript:void(0)" class="btn btn-default adddel" url="<?php echo U('Trade/GnTrade/fee_del')?>">删除</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					</form>
					<?php echo $list['page']?>
				</div>
				<!--查询结果-->
			</div>
				<!--费用管家弹框-->
			      <div id="zzjs_net2" class="zzjs_net"></div>
			      <div id="gg2" class="patupianss patupiansst">
			        
			        
			      </div>
			      <!--费用管家弹框-->
			      
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
$('input[name="shu"]').live('keyup',function(){
	var min = parseInt($(this).parents('.qiehuan').find('ul').find('li').first().find('a').html());
	var max = parseInt($(this).parents('.qiehuan').find('ul').find('li').last().find('a').html());
	var now = parseInt($(this).val());
	if(now<min){
		$(this).val(min);
	}else if(now>max){
		$(this).val(max);
	}	
});
$('.sub').live('click',function(){
	var val = $('input[name="shu"]').val();
	var data = $(this).parent().prev().find('a').attr('href');
	var url = data.replace(/p\/\d+/,'p/'+val);
	window.location.href= url;
})

/*开启或关闭费用管家弹框*/
function clocks3(){
$('#gg2').css('display','none');
$('#zzjs_net2').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.quxiaoss3 a').live('click',function(){
clocks3();
})
$('.quxiao3').live('click',function(){
clocks3();
})
$('.subclock').live('click',function(){
	var name = $(this).attr('name');
	$('#'+name).submit();
})
//var xiabiao='';
$(".posts3").live('click',function(){
	var id = $(this).parents('tr').attr('id');
	var obj = $(this);
	var url = "<?php echo U('Trade/GnTrade/show_cost')?>";
	$.post(url,{'id':id},function(msg){
			$('#gg2').html(msg);	
	})
$('#gg2').css('display','block');
$('#zzjs_net2').css('display','block');
$(document.body).css('overflow','hidden');
})

/*开启或关闭费用管家弹框*/

/*费用计算*/
$('.fee').live('keyup',function(){
	var total = 0;
	$('.fee').each(function(i,n){
		if(Boolean($(n).val())){
			total+=parseInt($(n).val());
			}
	})
	$('.total_fee').val(total);
})
/*费用计算*/

/*置顶*/
$('.zltop').click(function(){
var hid=$(this).attr('rel');
//alert(hid);
var send_data={'id':hid,'name':'top'};
$.post("a.php",send_data,function(data,ts){
if(ts){
window.location.reload();
}
})	
})
/*置顶*/

/*提示框*/
 $(function () { $("[data-toggle='tooltip']").tooltip(); });
/*提示框*/

/*鼠标放上后显示按钮*/
$('.zlhover').hover(function(){
	$(this).find('.tabactiont').css('display','block');
},function(){
	$(this).find('.tabactiont').css('display','none');
  }
);
/*鼠标放上后显示按钮*/
  
 


/*选中数量*/
function zoushu(){
	var num=$(".ids:checked").length;
	$("#nums").html(num);
	}

/*全选*/
$('#alls').click(function(){
if(this.checked){
$(".tablesths").find(".ids").prop("checked",true);
}else{
$(".tablesths").find(".ids").removeAttr("checked");
}
zoushu();
})
$(".tablesths .ids").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
zoushu();
})
/*全选*/

/*删除*/
$('.adddel').live('click',function(){
	var url = $(this).attr('url');
	$(this).parents('form').attr('action',url);
	$(this).parents('form').submit();
})	
/*删除*/


$('.paadd').live('click',function(){
	var url = $(this).attr('url');
	$(this).parents('form').attr('action',url);
	$(this).parents('form').submit();
})

$(document).ready(function(){
$(".tablesths tr:odd").css('background','#F5F5F5');
});

$(".tablesths tr:odd").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','#F5F5F5');
  }
);
$(".tablesths tr:even").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','none');
  }
);
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
	$('.ddtits').click(function(){
	$(this).parent().children('.ddxiangqins').slideToggle("slow");

	})
});
</script>
</body>
</html>