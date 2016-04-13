<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="#" title="#">资金管理</a> > <a href="#" title="#">积分兑换</a>
</div>
<div class="hgrzy">
<h2>广告投放</h2>
<div class="col-xs-12" style="text-align:center;">
<img src="images/ggtfst.jpg"/>
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