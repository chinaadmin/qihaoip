<include file="Public/header" />
<!--banner-->
<div class="kuang cyrzgao">
	<div class="container kuangs">
		<div class="row">
			<div class="cyrzljrz">
				<a href="<?php echo U('Member/Shop/index')?>" title="立即入驻"
					target="_blank">立即入驻</a>
			</div>
			<div class="col-xs-12">
				<!--诚邀入驻商城简介-->
				<div class="col-xs-12 cyrzcon">
					<div class="col-xs-12 cyrzjj">
						<h2>了解7号商城</h2>
						7号商城是7号网基于知识产权交易特性自主开发的知识产权在线交易平台。入驻7号商城的商户，全部实名认证并经过7号网严格资质审核，保证是商城所有交易品的权利人或合法代理人；入驻7号商城的商户，自行进行日常店铺运营管理，买家可以自行与商户客服在线洽谈并交易。
						7号商城旗舰店提供多种类型店铺装修模板，商户可自定义装修店铺，多种店铺自营销功能，商户可自定义交易品分类，自定义交易品详情页多重关联推荐，设置店铺广告和活动，实现知识产权交易在线下单、支付、交易确认等全套功能，为广大用户提供一个全新知识产权展示和交易的O2O平台。

					</div>
					<div class="col-xs-12 cyrzbz">
					<img src="<?php echo STATIC_V2;?>images/zlliucheng.png"/>
					
						
					</div>
					<div class="col-xs-12 cyrzlxwm">
						<h2>联系我们</h2>
						<p>
							7号网免费服务热线：<span>400-889-7080</span>
						</p>
						<p>公司地址：广东省深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312</p>
						<div class="cyrzerweima">
							<img src="<?php echo STATIC_V2;?>images/weixinfwh.jpg" />7号网微信服务号：<span>qh7hip</span>
						</div>
						<div class="cyrzerweima">
							<img src="<?php echo STATIC_V2;?>images/weixindyh.jpg" />7号网微信订阅号：<span>qihaosub</span>
						</div>
						<div class="cyrzerweima">
							<img src="<?php echo STATIC_V2;?>images/weibowbs.jpg" />7号网微博：<span>前海七号</span>
						</div>
					</div>
				</div>
				<!--诚邀入驻商城简介-->
			</div>
		</div>
	</div>
</div>
<!--banner-->
<!--主体-->

<div class="kuang cyrzgao1">
	<div class="container kuangs"></div>
</div>
	<!--热门旗舰店-->
	<div class="kuang cyrzgao2">
		<div class="container kuangs">
			<div class="row">
				<div class="col-xs-12 cyrzrmscs">
					<div class="col-xs-12 cyrzrmsc">
						<span>热门旗舰店</span>
					</div>
					<div class="col-xs-12 guedou">
						<!--滚动图片 start-->
						<div class='rollphotos'>
							<div class='blk_29t'>
								<div class='LeftBotton' id='LeftArr'></div>
								<div class='Cont' id='ISL_Cont_1'>
									<!-- 图片列表 begin -->
									<?php foreach ($data['shop'] as $key=>$value):?>
									<div class='box'>
										<a href="<?php echo U('Shop/shop_list',array('shop'=>$value['id']))?>" title="<?php echo $value['name']?>" target='_blank'><img
											src="<?php echo $value['logo']?>" /></a>
										<div class="sblibiet">
											<a href="<?php echo U('Shop/shop_list',array('shop'=>$id))?>" title="<?php echo $value['name']?>" target="_blank"><?php echo $value['name']?></a>
										</div>
									</div>
									<?php endforeach;?>
									<!-- 图片列表 end -->
								</div>
								<div class='RightBotton' id='RightArr'></div>
							</div>
						</div>
						<!--滚动图片 end-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--热门旗舰店-->
<!--主体-->
<include file="Public/footlink" />
<include file="Public/foot" />
<script type='text/javascript'>
/*发明趣闻滚动*/
var scrollPic_02 = new ScrollPic();
scrollPic_02.scrollContId = "ISL_Cont_1"; //内容容器ID
scrollPic_02.arrLeftId = "LeftArr";//左箭头ID
scrollPic_02.arrRightId = "RightArr"; //右箭头ID
scrollPic_02.frameWidth = 800;//显示框宽度
scrollPic_02.pageWidth = 153; //翻页宽度
scrollPic_02.speed = 50; //移动速度(单位毫秒，越小越快)
scrollPic_02.space = 400; //每次移动像素(单位px，越大越快)
scrollPic_02.autoPlay = true; //自动播放
scrollPic_02.autoPlayTime = 1; //自动播放间隔时间(秒)
scrollPic_02.initialize(); //初始化
/*发明趣闻滚动*/
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
</script>
</body>
</html>