<include file="Public/header" />
<!--banner-->
<div class="kuang scdetailgao" >
<div class="flexslider">
        <ul class="slides">
        <?php foreach ($data['banner_ad'] as $key=>$value):?>
            <li style="background:url(<?php echo $value['img']?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>" title="<?php echo $value['name'];?>" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" alt="<?php echo $value['name'];?>" width="100%" height="430"></a></li>
        <?php endforeach;?>
        </ul> 
</div>
	<div class="container kuangs tthhkk">
		<div class="row">
			<div class="col-xs-2 scdetailgaos">
				<a href="<?php echo U('shop/shop_list',['shop'=>$data['shop_re']['id']]);?>" title="<?php echo $data['shop_re']['name'];?>"><img src="<?php echo $data['shop_re']['logo']?>" alt="<?php echo $data['shop_re']['name'];?>"/></a>
				<p style="text-align:center;line-height:20px;background:#ffffff;"><?php echo $data['shop_re']['name']?></p>
			</div>
		</div>
	</div>
</div>
<!--banner-->
<!--主体-->
<!--面包屑-->
<div class="kuang scmbxgao">
	<div class="container kuangs scmbxtits">
		当前位置：<a href="/">7号网</a> » 
			<a href="__APP__/shop/" >商城首页</a> » 
			<a href="__APP__/shop/shop_list/shop/<?php echo $data['shop_re']['id'];?>HTMLSUFFIX"><?php echo $data['shop_re']['name']?></a>
		<div class="col-xs-3 bdsst">
			<form action="<?php echo U('search/index')?>" method="get">
				<input type="text" name="name" class="bdsearch" />
				<input type="hidden" name="type" value='3'/>
				<input type="hidden" name="shop" value="<?php echo $data['shop_id'];?>" />
				<button type="submit" class="tijiaosearch">| 搜本店</button>
			</form>
		</div>
	</div>
</div>
<!--面包屑-->
<!--推荐商标-->
<?php if($data['trade']):?>
	<!--推荐商标-->
	<div class="kuang">
		<div class="container kuangs" style="margin-top:20px;">
			<div class="row">
				<div class="col-xs-12  ">
					<div class="col-xs-11" style="padding-left:40px;">
						<div class="vtubiao"></div>
						<div class="vwenzi"><a href="<?php echo U('shop/tradelist',array('shop'=>$data['shop_id']))?>" target="_blank">商标</a></div>
					</div>
					<p style="margin:20px 0 0 0;" class="col-xs-1"><a style="background-color: #ff6600;color:#ffffff;line-height:16px;padding:0 8px;" href="<?php echo U('shop/tradelist',array('shop'=>$data['shop_id']))?>" target="_blank">更多</a></p>
					<div class="col-xs-12 vsbxianqings vskkhhh" id="vsbxianqing0">
					<?php foreach ($data['trade'] as $key=>$value):?>
						<div class="col-xs-3 vsbtus">
							<div class="vsbtust">
								<img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>" alt="<?php echo $value['title'];?>商标" />
								<div class="sblibie">价格：<?php echo $value['price']>'0'?$value['price']:'面议';?></div>
								<div class="jianshaos1 vsbyese">
									<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>商标转让"  target="_blank">
										<p>商标名：<?php echo $value['title']?></p>
										<p>注册号：<?php echo $value['tmno']?></p>
										<p>类别：<?php echo $value['items']['name'];?></p>
										<p>价格：<?php echo $value['price'] > '0'?$value['price']:'面议';?></p>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--推荐商标-->
<?php endif;?>
<!--推荐商标-->
<!--推荐专利-->
<?php if($data['pant']):?>
<!--推荐专利-->
	<div class="kuang">
		<div class="container kuangs" style="margin-top:20px;">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-11" style="padding-left:40px;">
						<div class="vtubiao"></div>
						<div class="vwenzi"><a href="<?php echo U('shop/patnetlist',array('shop'=>$data['shop_id']))?>" target="_blank">专利</a></div>
					</div>
					<p style="margin:20px 0 0 0;" class="col-xs-1"><a style="background-color: #ff6600;color:#ffffff;line-height:16px;padding:0 8px;" href="<?php echo U('shop/patnetlist',array('shop'=>$data['shop_id']))?>" target="_blank">更多</a></p>
					<div class="col-xs-12 vsbxianqings vskkhhh" id="vsbxianqing0">
					
					<?php foreach ($data['pant'] as $key=>$value):?>
						<div class="col-xs-3 vsbtus">
							<div class="vsbtust">
								<img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>" alt="<?php echo $value['title'];?>专利" />
								<div class="sblibie"><?php echo subtext($value['title'],12)?></div>
								<div class="jianshaos1 vsbyese">
									<a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>专利转让"  target="_blank">
										<p>专利名：<?php echo msubstr($value['title'],0,12);?></p>
										<p>专利号：<?php echo $value['tmno']?></p>
										<p>价格：<?php echo $value['price']>'0'?$value['price']:'面议'?></p>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach;?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--推荐专利-->
<?php endif;?>
<!--推荐专利-->
<!--主体-->
<include file="Public/footlink" />
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
/*商标与专利图片鼠标放上后显示简介*/
		$("div[class*='vsbtust']").mouseover(function() {
			$(this).children("div[class*='jianshao']").css('display', 'block');
		})
		$("div[class*='vsbtust']").mouseout(function() {
			$(this).children("div[class*='jianshao']").css('display', 'none');
		})
		/*商标与专利图片鼠标放上后显示简介*/
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
$("div[class*='tuijians']:nth-child(6n+1)").css('border-top','none');
$("div[class*='tuijians']:nth-child(6n+2)").css('border-top','none');
$("div[class*='tuijians']:nth-child(6n+3)").css('border-top','none');
$('.yanse li:eq(1)').css('border-left','none');
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