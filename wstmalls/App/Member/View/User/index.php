<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="{:U('User/index')}">会员首页</a>
</div>
<div class="hgrzy">
<div class="col-xs-12 hfloor1 zhanmutt">
<div class="col-xs-6 hjijie zhanmutts">
<div class="col-xs-12 member_indeximg">
<a href="{:U('User/showself')}"><img src="<?php echo $data['member']['img']?$data['member']['img']:STATIC_V2.'images/member.jpg';?>"/></a>
<div class="member_indexmess">
<p class="member_phones"><?php echo $data['member']['username'];?></p>
<div class="member_messlist">
	<p class="col-xs-6">
		<span class="glyphicon glyphicon-user messlist_name" aria-hidden="true"></span> &nbsp;
		<notempty name="data['member']['name']">
			{$data['member']['name']}
		<else/>
			<a href="{:U('User/showself')}">未填写</a>
		</notempty>
	</p>
	<p class="col-xs-6">
		<span class="glyphicon glyphicon-credit-card messlist_card" aria-hidden="true"></span> &nbsp;
		<notempty name="data['member']['bank']">
			{$data['member']['bank']}
		<else/>
			<a href="{:U('User/showself')}">未填写</a>
		</notempty>
	</p>
</div>
<div class="member_messlist">
	<p class="col-xs-6">	
		<span class="glyphicon glyphicon-envelope messlist_renzhen" aria-hidden="true"></span> &nbsp;
		<if condition="$data['member']['emailchk'] eq '3' AND $data['member']['email']">
			{$data['member']['email']}
		<else/>
			<a href="{:U('User/emailverify')}">未认证</a>
		</if>
	</p>
	<p class="col-xs-6">
		<span class="glyphicon glyphicon-phone messlist_phone" aria-hidden="true"></span> &nbsp;
		<notempty name="data['member']['mobile']">
			{$data['member']['mobile']}
		<else/>
			<a href="{:U('User/showself')}">未认证</a>
		</notempty>
	</p>
</div>
</div>
</div>
<div class="col-xs-offset-1 col-xs-10 hjijiebottom">
<div class="col-xs-2 member_shopimg"><img src="<?php echo STATIC_V2; ?>images/nav7s.png"/></div>
<div class="col-xs-8 member_wenzi">
<?php if(isset($data['shop']['state']) && $data['shop']['state']=='3'){ ?>
<p>恭喜您，您已开启了商城！</p>
<a href="<?php echo '/shop/shop_list/shop/'.$data['shop']['id'].'.html'; ?>" class="btn btn-warning" target="_blank">查看商城</a>
<?php } else { ?>
<p>您还没有开通商城，立即去开通吧！</p>
<a href="<?php echo U('Shop/index'); ?>" class="btn btn-warning">立即开通商城</a>
<?php } ?>
</div>
</div>
</div>
<div class="col-xs-6 zhanmu zhanmutt">
<div class="member_index_list">
<div class="col-xs-12 member_index_lists">
<div class=" col-xs-6 htonji htonji_index">
<div class="col-xs-4 htonjis">
<a href="{:U('Seller/sell_list',array('tmpa'=>'1'))}">
	<img src="<?php echo STATIC_V2; ?>images/sbmintu.png"/>
</a>	
</div>
<p><a href="{:U('Seller/sell_list',array('tmpa'=>'1'))}">商标</a><br/><?php echo $data['count']['tm']+0; ?>件</p>
</div>
<div class=" col-xs-6 htonji htonji_index">
<div class="col-xs-4 htonjis htonjis1">
<a href="{:U('Seller/sell_list',array('tmpa'=>'2'))}">
	<img src="<?php echo STATIC_V2; ?>images/zlmintu.png"/>
</a>
</div>
<p><a href="{:U('Seller/sell_list',array('tmpa'=>'2'))}">专利</a><br/><?php echo $data['count']['pa']+0; ?>件</p>
</div>
<div class=" col-xs-6 htonji htonji_index">
<div class="col-xs-4 htonjis htonjis3">
<a href="{:U('Buyer/supply_list')}">
	<img src="<?php echo STATIC_V2; ?>images/ckmintu.png"/>
</a>
</div>
<p><a href="{:U('Buyer/supply_list')}">求购</a><br/><?php echo $data['count']['qg']+0; ?>件</p>
</div>
<div class=" col-xs-6 htonji htonji_index">
<div class="col-xs-4 htonjis htonjis2">
<a href="{:U('Buyer/order_list',array('type'=>1))}">
	<img src="<?php echo STATIC_V2; ?>images/qgmintu.png"/>
</a>
</div>
<p><a href="{:U('Buyer/order_list',array('type'=>1))}">未付款订单</a><br/><?php echo $data['count']['wfk']+0; ?>件</p>
</div>
</div>
<div class="col-xs-12 member_index_lists member_index_lists_margin">

<div class="col-xs-12 ldzjtit ldzjtit_edit">
资金流动
</div>
<div class="col-xs-4 htotal htotalss">
<p>收入总额（卖家）<br/><span><?php echo $data['money']['sr']+0; ?>元</span></p>
</div>

<div class="col-xs-4 htotal htotalss">
<p>支付总额<br/><span class="ys1"><?php echo $data['money']['zc']+0; ?>元</span></p>
</div>

<div class="col-xs-4 htotal htotalss">
<p>退款总额<br/><span class="ys2"><?php echo $data['money']['tk']+0; ?>元</span></p>
</div>
</div>
</div>
</div>
</div>
<!--我的专属经纪人-->
<div class="col-xs-12 member_divbor">
<div class="col-xs-12 member_divtit">
我的专属经纪人
</div>
<div class="member_divcontent">
<img src="{$data['agent']['img']}"/>
</div>
<div class="member_div_content">
<div class="col-xs-12 div_top">
<div class="div_top_left">
<p>经纪人：<?php echo $data['agent']['name'];?></p>
<p>手机：<?php echo $data['agent']['mobile'];?></p>
</div>
<div class="div_top_right">
<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['agent']['qq']?>&amp;site=qq&amp;menu=yes" class="btn btn-warning" target="_blank">立即咨询</a>
</div>
</div>
<div class="col-xs-12 div_top">
<p>邮件：<?php echo $data['agent']['email'];?></p>
<p>电话：<?php echo $data['agent']['tel'];?></p>
<p>简介：<?php echo $data['agent']['about'];?></p>
</div>
</div>
</div>
<!--我的专属经纪人-->
<!--推荐-->
<div class="col-xs-12 member_divbor">
<div class="col-xs-12 member_divtit">
为您推荐
</div>
<div class="col-xs-12 member_imggudou">

<div class='rollphotostkk'>
          <div class='blk_29stkt'>
            <div class='Cont' id='ISL_Cont_1'>
              <!-- 图片列表 begin -->
              <?php
              foreach ($data['item'] as $row){
              	$row['img'] = explode(',', $row['img']);
              	$img = $row['img'][0];
              	?>
              <div class='box boxt'>
              	<a href="<?php echo $row['tmpa']=='1'?'/trademark/'.$row['id'].'.html':'/patent/'.$row['id'].'.html'; ?>"><img src="<?php echo $img; ?>"/></a>
                <p><?php echo $row['tmpa']=='1'?'商标名':'专利号'; ?>：<?php echo $row['title']; ?></p>
                <p><?php echo $row['tmpa']=='1'?'注册号':'申请号'; ?>：<?php echo $row['tmno']; ?></p>
                <p>类别：<?php echo $row['groupname']; ?></p>
                <span>价格：<?php echo $row['price']?$row['price']:'面议'; ?></span>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>

</div>
</div>
<!--推荐-->
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
/*推荐*/
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 1800;//显示框宽度
		scrollPic_02.pageWidth      = 300; //翻页宽度
		scrollPic_02.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
/*推荐*/
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