<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="<?php echo U('Shop/index') ?>">商城管理</a> > 选择商城类型
</div>
<div class="hgrzy">
<div class="col-xs-12" style="text-align:center;">
<img src="<?php echo STATIC_V2; ?>images/ggtfst.jpg"/>
</div>
</div>
<div class="dibus">
<p>©2014-2018 7号网 版权所有ICP经营性许可证：粤ICP备注5024104号-1</p>
<p>客服热线：400-889-7080 地址：深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312 </p>
</div>
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