<include file="Public/header" />
<!--banner-->
<div class="kuang jjrengao">
<div class="container kuangs">
<div class="row">
<div class="col-xs-8 col-xs-offset-2 zsjjren">
<p>您的专属经纪人</p>
<a href="http://wpa.qq.com/msgrd?v=3&uin=21556911&site=qq&menu=yes" target="_blank">咨询</a>
<a href="http://wpa.qq.com/msgrd?v=3&uin=21556911&site=qq&menu=yes" target="_blank">委托</a>
<a href="http://wpa.qq.com/msgrd?v=3&uin=21556911&site=qq&menu=yes" target="_blank">代理</a>
</div>
</div>
</div>
</div>
<!--banner-->
<!--主体-->
<!--专属经纪人-->
<div class="kuang">
<div class="container kuangs jjrengao1" style="background:none;">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3 searchtitt">
			<img src="<?php echo STATIC_V2;?>images/broker.png"/>
		</div>
		<div class="col-xs-12 zsjjrencon">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<p>7号网作为国内领先的集交易与管理于一体的大型综合知识产权云服务平台。7号网线上线下具备各行业商标资源库，轻轻松松获得高质商标，开创品牌之路；同时具有海量专利资源和客户资源，自助买卖，线上线下同步服务，供求双方各取所需。提供全方位、分层次、一站式的知识产权交易、管理等创新服务，专属经纪人也是其特色服务之一。</p>
			<p>强大的专利分析与知识产权顾问团队，专业领域覆盖计算机、通信、机械、电子、化学、材料、医药、生物等众多技术领域，一对一专为你排忧解难，助你在知识产权道路畅通无阻。为客户提供专业的知识产权领域一对一客服。主要包括：一、为用户提供所有关于知识产权专业性的解答服务。二、对用户提供转让、许可、合作以及延伸的相关咨询服务。三、为用户提供交易品的推荐，以及对交易过程的管控、撮合、相关手续的办理。</p>
			<p>精准的信息分类和管理——个性匹配服务，分类明确，省时省力。</p>
			<p>简单快捷的操作流程——求购出售知产方便快速，简单几步完成交易。</p>
			<p>安全、稳定的交易保障——权威第三方担保，买得放心，卖得安心。</p>
		</div>
	</div>
</div>
</div>
<!--专属经纪人-->
<!--金牌经纪人-->
<div class="kuang">
<div class="container kuangs jjrengao2" style="background:none;">
<div class="row">
<div class="col-xs-6 col-xs-offset-3 searchtitt" >
	<img src="<?php echo STATIC_V2;?>images/brokers.png"/>
</div>
<div class="col-xs-12 jbjjrencon" style="background:none;">
	<?php foreach ($data['agent'] as $value){?>
		<div class="jjrenonecon" style="background:#fff;">
			<div class="jjrmintu">
				<?php if($value['img']){?>
					<img src="<?php echo $value['img'];?>"/>
				<?php }else {?>
					<img src="<?php echo STATIC_V2;?>images/jjrmintu.jpg"/>
				<?php }?>	
				<div class="ljzxyyb"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $value['qq'];?>&amp;site=qq&amp;menu=yes" target="_blank">立即咨询</a></div>
			</div>
			<div class="jjrcons">
				<p>经纪人：<?php echo $value['name'];?>&nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $value['qq'];?>&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言" alt="" onerror="this.src=images/qq-off.gif';" onload="if(this.width==77){this.src=images/qq-off.gif;}else if(this.width==23){this.src=images/qq.gif;}" align="absmiddle"></a></p>
				<p>邮件：<?php echo $value['email'];?></p>
				<p>电话：<?php echo $value['tel'];?></p>
				<p>手机：<?php echo $value['mobile'];?></p>
			</div>
			<div class="jjrjianjiecon">
				简介：<?php echo $value['about'];?>
			</div>
		</div>
	<?php }?>
</div>
</div>
</div>
</div>
<!--金牌经纪人-->
<!--主体-->
<include file="Public/footlink_home" />
<include file="Public/foot" />
<script type='text/javascript'>
/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/
/*鼠标放上后显示立即咨询*/
$("div[class*='jjrmintu']").mouseover(function(){
$(this).children("div[class*='ljzxyyb']").css('display','block');
})
$("div[class*='jjrmintu']").mouseout(function(){
$(this).children("div[class*='ljzxyyb']").css('display','none');
})
/*鼠标放上后显示立即咨询*/
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
$('.jjrenonecon:even').css('margin-left','0px');
$('.help').first().removeClass('col-xs-offset-1');
});
/*友情链接*/
$('.yqlj li').hover(function(){
var tt=$(this).index();
$("div[id*='yqljs']").css('display','none');
$("#yqljs"+tt).css('display','block');
$('.yqlj li a').removeClass('selst');
$(this).find("a").addClass('selst');
})
/*友情链接*/
</script>
</body>
</html>