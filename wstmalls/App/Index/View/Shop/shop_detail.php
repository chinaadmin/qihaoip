<include file="Public/header" />
<style>
	body{ background:#ffffff;}
	.add12_24_1{ border:1px solid #ccc; margin-top:20px;}
	.add12_24_2{ border-bottom:1px solid #ccc; background:#f0f0f0; height:45px; line-height:45px; font-weight:bold; padding:0 0 0 20px; }
	.add12_24_3{ padding:20px; line-height:30px;}
	.add12_24_4{ border-top:1px solid #ccc; padding:10px 20px;}
	.add12_24_4 .scjjfren{ width:auto;}
	.add12_24_4 .scjjfren span{ padding:0 50px;}
</style>
<!--头部-->
<!--banner-->
<div class="kuang scdetailgao" >


<div class="flexslider">
       <ul class="slides">
        <?php foreach ($data['banner_ad'] as $key=>$value):?>
            <li style="background:url(<?php echo $value['img']?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>" target="_blank"><img src="images/blank.png" width="100%" height="430"></a></li>
        <?php endforeach;?>
        </ul> 
</div>


 
	<div class="container kuangs tthhkk">
		<div class="row">
		 
			<div class="col-xs-2 scdetailgaos">
				<a href="<?php echo U('Shop/shop_list',['shop'=>$data['shop']['id']]);?>"><img src="<?php echo $data['shop']['logo']?>" /></a>
				<p style="text-align:center;line-height:20px;background:#ffffff;"><?php echo $data['shop']['name']?>旗舰店</p>
			</div>
			
		</div>
	</div>
	
</div>
<!--banner-->
<!--主体-->
<!--面包屑-->
<div class="kuang scmbxgao">
	<div class="container kuangs scmbxtits">
		当前位置：<a href="/">7号网</a> » <a href="__APP__/shop/">商城</a> » <a href="__APP__/shop/shop_detail/shop/<?php echo $data['shop']['id'];?>HTMLSUFFIX" ><?php echo $data['shop']['name']?></a>
		<div class="col-xs-3 bdsst">
			<form action="b.html" method="post">
				<input type="text" name="bdss" class="bdsearch" />
				<button type="submit" class="tijiaosearch">| 搜本店</button>
			</form>
		</div>
	</div>
</div>
<!--面包屑-->
<!--商城简介-->
<div class="kuang">
	<div class="container kuangs scjjbantu">
		<div class="row">
			<div class="col-xs-1 scjjsb">商标</div>
			<div class="col-xs-offset-4 col-xs-2 scjjmmtu">
				<?php echo $data['shop']['name']?>旗舰店
			</div>
			<div class="col-xs-offset-4 col-xs-1 scjjzl">专利</div>
		</div>
	</div>
</div>
<div class="add12_24_1 thrfloor1">
	<div class="add12_24_2"><?php echo $data['shop']['qyname']?>旗舰店</div>
    <div class="add12_24_3"><?php echo htmlspecialchars_decode($data['shop']['content'])?></div>
    <div class="add12_24_4  scjjone">
    	<img src="http://www.qihaoip.com/qihaov2/images/scfzren.png" />
        <div class="scjjfren">联系人：<?php echo $data['shop']['person']?><span>手机号码：<?php echo $data['shop']['phone']?></span>座机号码：<?php echo $data['shop']['tel']?></div>
    </div>
</div>
<?php if($data['shop']['about']):?>
<div class="add12_24_1 thrfloor1">
	<div class="add12_24_2"><?php echo $data['shop']['qyname']?>简介</div>
    <div class="add12_24_3"><?php echo $data['shop']['about']?></div>

</div>
<?php endif?>
<?php if($data['shop']['honor']):?>
<div class="add12_24_1 thrfloor1">
	<div class="add12_24_2">荣誉资质</div>
    <div class="add12_24_3"><?php echo $data['shop']['honor']?></div>
</div>
<?php endif?>
<div class="kuang">
	<div class="container kuangs scjjlxs">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-4 searchtitt">
				<img src="<?php echo STATIC_V2;?>images/hotsearch.png" />
			</div>
			<div class="col-xs-12 guedou">
				<!--滚动图片 start-->
				<div class='rollphotos'>
					<div class='blk_29s'>
						<div class='LeftBotton' id='LeftArr'></div>
						<div class='Cont' id='ISL_Cont_1'>
							<!-- 图片列表 begin -->
							
						<?php foreach ($data['item'] as $key=>$value):?>
							<div class='box'>
								<a href="<?php echo U('Trademark/detail',array('id'=>$value['id']));?>" target='_blank'><img
									src="<?php $img = explode(',',$value['img']); echo $img['0'];?>" /></a>
								<div class="sblibiet">
									<a href="<?php echo U('Trademark/detail',array('id'=>$value['id']));?>" target="_blank"><?php echo $value['title']?>.</a>
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
			<div class="col-xs-4 col-xs-offset-4 searchtitt">
				<img src="<?php echo STATIC_V2;?>images/hotschbottom.png" />
			</div>
		</div>
	</div>
</div>
<!--商城简介-->

<!--客服-->
  <div class="kefu"> <a href="javascript:;"><img src="<?php echo STATIC_V2;?>images/kefu.png"/></a> </div>
  <div class="shop_qq">
    <div class="shop_qq_title"><?php echo $data['shop']['name']?><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </div>
    <div class="shop_qq_rule">
      <p>联系电话</p>
      <p><?php echo $data['shop']['phone']?></p>
    </div>
    <div class="shop_qq_con">
    <?php foreach ($data['shop']['kfinfo'] as $key=>$value):?>
    <?php if($value['qqchkshow']==1):?>
      <p> <a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq']?>&site=qq&menu=yes" target="_blank"> <img src="http://wpa.qq.com/pa?p=1:800020304:51"><?php echo $value['qqname']?></a></p>
    <?php endif;?>
    <?php endforeach;?>
    </div>
    <div class="shop_qq_rule">
      <p>工作时间</p>
       <?php foreach ($data['shop']['worktime'] as $key=>$value):?>
       <?php if($value['workshow']==1):?>
      <p><?php echo $value['wsta']?>至<?php echo $value['wend']?>:<?php echo $value['tsta']?>-<?php echo $value['tend']?></p>
      <?php endif;?>
      <?php endforeach;?>
    </div>
  </div>
  <!--客服-->
<!--主体-->
<include file="Public/footlink" />
<include file="Public/foot" />
<script type='text/javascript'>
/*发明趣闻滚动*/
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 800;//显示框宽度
		scrollPic_02.pageWidth      = 245; //翻页宽度
		scrollPic_02.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
/*发明趣闻滚动*/
/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/

/*客服*/
$('.kefu a').click(function(){
$('.shop_qq').show("slow");
$('.kefu').css('display','none');
})
$('.shop_qq_title span').click(function(){
$('.shop_qq').css('display','none');
$('.kefu').show("slow");
})
/*客服*/

$(document).ready(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
$("div[class*='tuijians']:nth-child(6n+1)").css('border-top','none');
$("div[class*='tuijians']:nth-child(6n+2)").css('border-top','none');
$("div[class*='tuijians']:nth-child(6n+3)").css('border-top','none');
$('.yanse li:eq(1)').css('border-left','none');
$('.help').first().removeClass('col-xs-offset-1');
});

</script>
</body>
</html>