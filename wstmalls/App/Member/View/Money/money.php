<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="#" title="#">资金管理</a> > <a href="#" title="#"><?php if($data['type']==3){echo '支付记录查询';} else if($data['type']==5){echo '退款记录查询';} else {echo '资金明细';} ?></a>
</div>
<div class="hgrzy">
<div class="col-xs-12 dqzhs dqzhst">
<div class="col-xs-6 ljdh">
总计消费：<span><?php echo $data['zhichu']+0; ?></span>元
</div>
<div class="zlyjjyst1 shop_padding">
<form action="<?php echo U('money'); ?>" method="post">
<div class="formdivs" style="margin-top:0;>
	<input type="text" name="search" class="pasearchs" <?php if($data['search']){echo 'value="'.$data['search'].'"';} ?> placeholder="流水号、资金、时间、事由"/>
	<input type="submit" value="搜索" class="pasubs"/>
</div>
</form>
</div>
</div>
<div class="col-xs-12 zhlist">
<table cellpadding="0" cellspacing="0" class="tablesth_shop">
<thead>
<tr class="first">
<th width="25%"><h4>流水号</h4></th>
<th width="25%"><h4>金额</h4></th>
<th width="25%"><h4>发生时间</h4></th>
<th width="25%"><h4>事由</h4></th>
</tr>
</thead>
<tbody>
<?php foreach ($data['data'] as $row){ ?>
<tr>
<td width="25%"><?php echo $row['id']; ?></td>
<td width="25%" class="<?php if($row['money']>0){echo 'zhifu';} else if($row['money']<0){echo 'tuikuan';} ?>"><?php if($row['money']>0){echo '支付';} else if($row['money']<0){echo '退款';} ?><?php echo abs($row['money']); ?></td>
<td width="25%"><?php echo date('Y-m-d H:i:s',$row['datetime']); ?></td>
<td width="25%"><?php echo $row['name']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php echo $data['page']; ?>
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
/*订单切换*/
$('.ldzjtit li').click(function(){
var tt=$(this).index();
$("div[id*='ddcon']").css('display','none');
$("#ddcon"+tt).css('display','block');
$('.ldzjtit li a').removeClass('chcolor');
$(this).find("a").addClass('chcolor');
})
/*订单切换*/
$(document).ready(function(){

});
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