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
				您当前的位置：<a href="#" title="#">商城管理</a> > <a href="#" title="#">商品管理</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-offset-3 col-xs-6 shop_manager">
					<div class="col-xs-12">
						请到“<a href="#" title="#">卖家中心</a> > <a href="#" title="#">我的发布</a>”中进行商品管理
					</div>
					<div class="col-xs-12 shop_alink">
						<a href="<?php echo U('Member/seller/sell_list')?>" class="btn btn-warning">立即管理</a>
					</div>
					<div class="col-xs-12">当您的商标或专利数量不够时,您也可以手动隐藏模块</div>
					<div class="col-xs-12 shop_alink">
					<?php if($data['shop']['showtm']==1):?>
						<a href="javascript:void(0);" class="btn btn-primary editshow" value='<?php echo $data['shop']['showtm']?>' name="showtm">隐藏商标模块</a>
					<?php else:?>
						<a href="javascript:void(0);" class="btn btn-primary editshow" value='<?php echo $data['shop']['showtm']?>' name="showtm">显示商标模块</a>
					<?php endif;?>
					<?php if($data['shop']['showpa']==1):?>
						<a href="javascript:void(0);" class="btn btn-primary editshow" value='<?php echo $data['shop']['showpa']?>' name="showpa">隐藏专利模块</a>
					<?php else:?>
						<a href="javascript:void(0);" class="btn btn-primary editshow" value='<?php echo $data['shop']['showpa']?>' name="showpa">显示专利模块</a>
					<?php endif;?>
					<?php if($data['shop']['showtj']==1):?>
						<a href="javascript:void(0);" class="btn btn-primary editshow" value='<?php echo $data['shop']['showtj']?>' name="showtj">隐藏特别推荐模块</a>
					<?php else:?>
						<a href="javascript:void(0);" class="btn btn-primary editshow" value='<?php echo $data['shop']['showtj']?>' name="showtj">显示特别推荐模块</a>
					<?php endif;?>
					</div>
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
/*隐藏或显示商标*/
$('.editshow').click(function(){
	var value = $(this).attr('value');
	var name = $(this).attr('name');
	var obj = $(this);
		var url = "<?php echo U('Member/shop/editshow')?>";
		$.post(url,{'value':value,'name':name},function(msg){
			if(msg.code=='1'){
				$.MsgBox.Confirm('温馨提示',msg.msg,function(){
					obj.attr('value',msg.value);
					obj.html(msg.showmsg);
				})
			}else{
				$.MsgBox.Confirm('温馨提示',msg.msg,function(){
				
				})
			}	
		})
})
/*隐藏或显示商标*/
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