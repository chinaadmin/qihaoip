<include file="Public/header" />
<!--主体-->
<!--购物车-->
<div class="kuang">
<div class="container kuangs gwcgao1">
<div class="row">
<div class="col-xs-12 delgao">
<a href="<?php echo U('del_all'); ?>" title="清空购物车">清空购物车</a>
</div>

<div class="col-xs-12 gwccon">
<ul>
<?php 
$money = 0;
$num = 0;
foreach ($data['data'] as $row){
$num += 1;
$money += $row['price'];
 ?>
<li>
<div class="imgs"><img src="<?php echo $row['img']; ?>"/></div>
<div class="col-xs-9 gwcjianjie">
<h2><a href="<?php if($row['tmpa']==1){echo U('Trademark/detail',['id'=>$row['id']]);} else {echo U('Patent/detail',['id'=>$row['id']]);} ?>" title="#" target="_blank"><?php echo $row['title']; ?>（注册号：<?php echo $row['tmno']; ?>）</a></h2>
<p><span class="span1">卖家：<?php echo $row['a']?$row['a']:$row['c']; ?></span><span class="span1">经纪人：<?php echo $row['b'];?> &nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言" alt="" onerror="this.src=<?php echo STATIC_V2;?>images/qq-off.gif';" onload="if(this.width==77){this.src=<?php echo STATIC_V2;?>images/qq-off.gif';}else if(this.width==23){this.src=<?php echo STATIC_V2;?>images/qq.gif';}" align="absmiddle"></a></span><span class="pricess"><?php echo $row['price']; ?></span>元</p>
<p class="gwcp1"><?php echo subtext($row['tmlimit'],100); ?></p>
<div class="delone">
<a href="<?php echo U('del',['id'=>$row['id']]); ?>"><img src="<?php echo STATIC_V2;?>images/del.jpg"/></a>
</div>
</div>
</li>
<?php } ?>
</ul>
<div class="fwtk">
	<p><input type="checkbox" checked="checked" class="agreed" name="toyi" />同意<a href="__APP__/news/20150518/1162.html" target="_blank">7号网交易服务协议</a></p>
</div>
<div class="col-xs-12 gwctjdd">
<p>共选中<span id="num"><?php echo $num; ?></span>种商品，总价：<span id="totprice"><?php echo $money; ?></span>元<a href="<?php echo U('check_out'); ?>"><button type="button" class="tjddbut">提交订单</button></a></p>
<p>您也可以返回到<a href="/">首页</a>,继续挑选商品，如果您已经完成挑选，请您点下一步进入提交订单</p>
</div>
</div>
</div>
</div>
</div>
<!--购物车-->
<!--主体-->
<!--主体-->
<include file="Public/footlink" />
<include file="Public/foot" />
<script type='text/javascript'>
$('.tjddbut').bind('click',function(){
	/* 判断是否点击同意服务条款  */
	if($('.agreed').attr('checked')!='checked'){
		$.MsgBox.Alert("温馨提示：",'需要同意7号网交易服务协议！');
		return false;
	}
});
 
/*右侧热线*/
$('.rexian li').mouseover(function(){
var tt=$(this).index();
$("div[class*='fwtu']").css('display','none');
$(".fwtu"+tt).css('display','block');
$('.rexian li').children('.fwrx').css('display','none');
$(this).children('.fwrx').css('display','block');
})
$('.rexian li').mouseout(function(){
var tt=$(this).index();
$(".fwtu"+tt).css('display','none');
$(this).children('.fwrx').css('display','none');
})
$('.rexian').mouseout(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
})
/*右侧热线*/

$(document).ready(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
});

</script>
</body>
</html>