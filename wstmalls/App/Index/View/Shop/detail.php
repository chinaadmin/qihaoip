<include file="Public/header" />
<!--主体-->
<!--放大图-->
<div class="kuang newsgao">
<div class="container kuangs sbdetailgao">
<div class="row">
<div class="col-xs-12 mianbiaoxie">
当前位置：<a href="/" target="_blank">7号网</a> » <a href="<?php echo U('Patent/index');?>" target="_blank">专利市场</a> » <a href="<?php echo U('Patent/show_list',['id'=>$data['ptinfo']['catid']]);?>" target="_blank"><?php echo $data['ptinfo']['name'];?></a> » <?php echo $data['ptinfo']['title'];?>
</div>
<!--左侧图-->
<div class="col-xs-6 sbdetailbigtu">
<div class="box">
	<div class="tb-booth tb-pic tb-s310">
		<img src="<?php echo $data['ptinfo']['img'];?>" class="jqzoom" />
	</div>
	<div class="tb-thumb">
	<ul  id="thumblist">
		<li class="tb-selected">
			<p><span>∧</span></p>
			<div class="tb-pic tb-s40"><img src="<?php echo $data['ptinfo']['img'];?>" mid="<?php echo $data['ptinfo']['img'];?>" ></div>
		</li>
	</ul>
	<div class="shoucan"><a href="#">收藏</a></div>
	</div>
</div>
</div>
<!--左侧图-->
<!--右侧内容-->
<div class="col-xs-6 sbdetailcon">
<div class="col-xs-12 contitle">
<?php echo $data['ptinfo']['title'];?>
</div>
<div class="col-xs-12 fwxmst">专利号/申请号：<?php echo $data['ptinfo']['tmno'];?></div>
<p class="xiaolimu">专利类型：<?php echo $data['ptinfo']['tmtype'];?></p><p class="xiaolimu">所属行业：<?php echo $data['ptinfo']['name'];?></p>
<p class="xiaolimu">申请日期：<?php echo $data['ptinfo']['tmregdate'];?></p>
<p class="xiaolimut"><span>交易方式：</span>
<?php foreach ($data['ptinfo']['tmtradeway'] as $key => $value){?>
	<a><?php echo $value;?></a>
<?php }?>
</p>
<div class="col-xs-12 fwxmst">参考价：<span><?php if($data['ptinfo']['price'] == '0.00'){?>面议<?php }else {?><?php echo $data['ptinfo']['price'];?><?php }?></span></div>
<div class="bdsharebuttonbox here"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<div class="col-xs-12 tijiaogm">
<form action="a.html" method="post">
<input type="hidden" id="hids" name="1">
<button type="submit" class="gomais">立即购买</button>
<button type="button" class="gomais jrgwc">加入购物车</button>
<a href="#" title="#" target="_blank" class="gomaist">议价</a>
</form>
</div>
</div>
<!--右侧内容-->
</div>
</div>
</div>
<!--放大图-->
<!--热度人气价值-->
<div class="kuang" style="display: none;">
<div class="container kuangs sbdetailgao1">
<div class="row">
<div class="col-xs-12 itachs">
<p>浏览次数：<?php echo $data['ptinfo']['views'];?>次</p>
<p>热度：<span>10分</span><span class="s_star_1"><i class="s_d10"></i></span></p>
<p>人气：<span>7分</span><span class="s_star_1"><i class="s_d7"></i></span></p>
<p>价值度：<span>6分</span><span class="s_star_1"><i class="s_d6"></i></span></p>
</div>
</div>
</div>
</div>
<!--热度人气价值-->
<!--经纪人-->
<div class="kuang">
<div class="container kuangs sbdetailgao2">
<div class="row">
<div class="col-xs-6 sbjjren">
<div class="col-xs-12 jjrenname">
<span>专利经纪人</span><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['agent']['qq']?>&amp;site=qq&amp;menu=yes" target="_blank">委托经纪人</a>
</div>
<div class="jjrentx">
	<?php if($data['agent']['img']){?>
		<img src="<?php echo $data['agent']['img'];?>"/>
	<?php }else {?>
		<img src="<?php echo STATIC_V2;?>images/jjrentu.jpg"/>
	<?php }?>
</div>
<div class="jjrencon">
<p>经纪人：吴小姐 &nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['agent']['qq'];?>&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言" alt="" onerror="this.src=images/qq-off.gif';" onload="if(this.width==77){this.src=images/qq-off.gif';}else if(this.width==23){this.src=images/qq.gif';}" align="absmiddle"></a></p>
<p>邮件：<?php echo $data['agent']['email'];?></p>
<p>电话：<?php echo $data['agent']['tel'];?></p>
<p>手机：<?php echo $data['agent']['mobile'];?></p>
</div>
<div class="col-xs-12 jjrenjianjie">
简介：通过本平台交易，均由我网代办国家手续，办理过程公开透明，进度随时查询，确保交易真实可靠；通过...
</div>
</div>
<div class="col-xs-6 sbmaijia">
<div class="col-xs-12 jjrenname">
<span>专利卖家</span><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['seller']['qq']?>&amp;site=qq&amp;menu=yes" target="_blank">联系卖家</a>
</div>
<div class="jjrentx">
	<?php if($data['seller']['img']){?>
		<img src="<?php echo $data['seller']['img'];?>"/>
	<?php }else {?>
		<img src="<?php echo STATIC_V2;?>images/jjrentu.jpg"/>
	<?php }?>
</div>
<div class="jjrencon">
<p>经纪人：吴小姐 &nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['seller']['qq']?>&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言" alt="" onerror="this.src=images/qq-off.gif';" onload="if(this.width==77){this.src=images/qq-off.gif';}else if(this.width==23){this.src=images/qq.gif';}" align="absmiddle"></a></p>
<p>邮件：<?php echo $data['seller']['email']?></p>
<p>电话：<?php echo $data['agent']['tel'];?></p>
<p>手机：<?php echo $data['seller']['mobile']?></p>
</div>
<div class="col-xs-12 jjrenjianjie">
简介：通过本平台交易，均由我网代办国家手续，办理过程公开透明，进度随时查询，确保交易真实可靠；通过...
</div>
<div class="jrqjdst">
<span><a href="#" title="#" target="_blank">进入中兴旗舰店</a></span>
</div>
</div>
</div>
</div>
</div>
<!--经纪人-->
<!--详情-->
<div class="kuang">
<div class="container kuangs sbxiangqin">
<div class="row">
<div class="col-xs-12 xqdanhao">
<ul>
<li><a href="#" title="#" target="_blank" class="sselt">专利详情</a></li>
<li><a href="#" title="#" target="_blank">卖点展示</a></li>
<li><a href="#" title="#" target="_blank">交易流程</a></li>
<li><a href="#" title="#" target="_blank">安全保障</a></li>
<li><a href="#" title="#" target="_blank">专利问答<span>10</span></a></li>
</ul>
</div>
<div class="col-xs-12 xqcontents" id="sbxqcon0">
<div class="col-xs-12 xxcontents">
<?php echo $data['ptinfo']['tmcontent'];?>
</div>
</div>
<div class="col-xs-12 xqcontents1" id="sbxqcon1">
<img src="<?php echo STATIC_V2;?>images/xianqin1.png"/>
</div>
<div class="col-xs-12 xqcontents1" id="sbxqcon2">
<img src="<?php echo STATIC_V2;?>images/xianqin2.png"/>
</div>
<div class="col-xs-12 xqcontents1" id="sbxqcon3">
<img src="<?php echo STATIC_V2;?>images/xianqin1.png"/>
</div>
<div class="col-xs-12 xqcontents1" id="sbxqcon4">
<img src="<?php echo STATIC_V2;?>images/weibopl.png"/>
</div>
</div>
</div>
</div>
<!--详情-->
<!--浏览过的专利-->
<div class="kuang">
<div class="container kuangs listgao1">
<div class="row">
<div class="col-xs-12 xiangguang">
<div class="col-xs-4 f1titst">
<span>您浏览过的专利</span>
</div>
</div>
</div>
<div class="row">
	<?php foreach ($data['readpt'] as $key => $value){?>
		<?php if($key < 4){?>
				<div class="col-xs-3 onetust">
					<div class="onetu">
						<a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank"><?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
						<p class="toone"><a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank"><span>[<?php echo $value['tmtype'];?>]</span><?php echo msubstr(strip_tags($value['title']),0,12);?></a></p>
						<p>行业：<?php echo $value['name'];?></p>
						<p><span>价格：<?php if($value['price'] == '0.00'){?>面议<?php }else {?><?php echo $value['price'];?><?php }?></span></p>
						<div class="jianshaos1">
							<a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank">
								<p><?php echo msubstr(strip_tags($value['title']),0,12);?></p>
								<p><span>价格：<?php if($value['price'] == '0.00'){?>面议<?php }else {?><?php echo $value['price'];?><?php }?></span></p>
								<p>专利号：<?php echo $value['tmno'];?></p>
								<p>行业：<?php echo $value['name'];?></p>
							</a>
						</div>
					</div>
				</div>
	<?php }}?>
</div>
</div>
</div>
<!--浏览过商标-->
<!--感兴趣商标-->
<div class="kuang">
<div class="container kuangs listgao1">
<div class="row">
<div class="col-xs-12 xiangguang">
<div class="col-xs-4 f1titst">
<span>您可能感兴趣的专利</span>
</div>
</div>
</div>
<div class="row">
	<?php foreach ($data['interest'] as $key => $value){?>
				<div class="col-xs-3 onetust">
					<div class="onetu">
						<a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
						<p class="toone"><a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank"><span>[<?php echo $value['tmtype'];?>]</span><?php echo msubstr(strip_tags($value['title']),0,12);?></a></p>
						<p>行业：<?php echo $value['name'];?></p>
						<p><span>价格：<?php if($value['price'] == '0.00'){?>面议<?php }else {?><?php echo $value['price'];?><?php }?></span></p>
						<div class="jianshaos1">
							<a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank">
								<p><?php echo msubstr(strip_tags($value['title']),0,12);?></p>
								<p><span>价格：<?php if($value['price'] == '0.00'){?>面议<?php }else {?><?php echo $value['price'];?><?php }?></span></p>
								<p>专利号：<?php echo $value['tmno'];?></p>
								<p>行业：<?php echo $value['name'];?></p>
							</a>
						</div>
					</div>
				</div>
	<?php }?>			
</div>
</div>
</div>
<!--感兴趣商标-->
<!--主体-->
<include file="Public/footlink" />
<include file="Public/foot" />
<script type='text/javascript'>
/*商标与专利图片鼠标放上后显示简介*/
$(".onetu").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$(".onetu").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介
/*详情切换*/
$('.xqdanhao li').hover(function(){
var tt=$(this).index();
$("div[id*='sbxqcon']").css('display','none');
$("#sbxqcon"+tt).css('display','block');
$('.xqdanhao li a').removeClass('sselt');
$(this).find("a").addClass('sselt');
})
/*详情切换*/
/*加入购物车*/
$('.jrgwc').click(function(){
var id=$('#hids').attr('name');
var send_data={'id':id};
	$.post("a.php",send_data,function(data,ts){
		if(ts){
			$.MsgBox.Alert("温馨提示：",'成功加入购物车');
		}
	})	
})
/*加入购物车*/
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
$("div[class*='onetu']:nth-child(4n+4)").css('border-right','none');
$('.xiaolimu:nth-child(2n+1)').css('margin-left','0px');
$('.help').first().removeClass('col-xs-offset-1');
});
$(function(){
	$("#thumblist li a").hover(function(){
		$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
		$(".jqzoom").attr('src',$(this).find("img").attr("mid"));
	});
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