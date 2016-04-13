<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="hytit">
				您当前的位置：<a href="#" title="#">资金管理</a> > <a href="#" title="#">积分明细</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-12">
					<div class="col-xs-6 ljdh" style="margin-top:15px;">
						当前账户总积分：<span><?php echo $data['user']['jifen']; ?></span>
						<!-- <a href="#" title="#" target="_blank">立即兑换</a> -->
					</div>
					<div class="zlyjjyst1 shop_padding">
						<form action="<?php echo U('jifen'); ?>" method="post">
							<div class="formdivs" style="margin-top:0;">
								<input type="text" name="soses"  class="pasearchs" <?php if($data['search']){echo 'value="'.$data['search'].'"';} ?> placeholder="流水号、资金、时间、事由" />
								<input type="submit" value="搜索" class="pasubs" />
							</div>
						</form>
					</div>
				</div>
				<div class="col-xs-12 sell_creatlist">
					<div class="col-xs-12 col-lg-5 tgwz1">
						<div class="col-xs-2">推广网址</div>
						<div class="col-xs-10">
							<div class="col-xs-3" style="display: none">
								<select class="form-control" name="selbanktt">
									<option value="网站首页">网站首页</option>
									<option value="商标首页">商标首页</option>
									<option value="专利首页">专利首页</option>
								</select>
							</div>
							<div class="col-xs-8 zhjfweizhi">
								<input type='text' name='banks' class='form-control hval'
									value="http://www.qihaoip.com/?tg_uid=<?php echo $data['user']['id']; ?>" />
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-lg-7 tgwz1">
						每引导一个IP访问您可以获赠1积分（24小时内最多积50积分）,每引导一个用户注册您可以获赠5积分。</div>
				</div>
				<div class="col-xs-12 zhlist">
					<table cellpadding="0" cellspacing="0" class="tablesth_shop">
						<thead>
							<tr class="first">
								<th width="20%"><h4>流水号</h4></th>
								<th width="20%"><h4>收入/支出</h4></th>
								<th width="20%"><h4>总积分</h4></th>
								<th width="20%"><h4>发生时间</h4></th>
								<th width="20%"><h4>事由</h4></th>
							</tr>
						</thead>
						<tbody>
<?php foreach ($data['data'] as $row){ ?>
<tr>
								<td width="20%"><?php echo $row['uid']; ?></td>
								<td width="20%" class="<?php if($row['jifen']>0){echo 'zhifu';} else if($row['jifen']<0){echo 'tuikuan';} ?>"><?php echo $row['jifen']; ?></td>
								<td width="20%"><?php echo $row['endjifen']; ?></td>
								<td width="20%"><?php echo date('Y-m-d H:i:s',$row['datetime']); ?></td>
								<td width="20%"><?php echo $row['name']; ?></td>
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