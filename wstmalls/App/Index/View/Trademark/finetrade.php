<include file="Public/header" />
<include file="Public/header_nav_list" />
<!--知产包列表-->
<div class="thrwid tuijian_banner">

</div>
<div class="thrfloor1 zhichanbao_list">
	<div class="col-xs-12 tuijian_sb_select">
		<div class="col-xs-11 tuijian_selects">
			<ul>
				<li><a href="<?php echo U('trademark/fine')?>" <?php echo !$search['groupid']?'class="zhichanbao_ons"':''?>>全部</a></li>
				<?php foreach ($data['items'] as $key=>$value):?>
				<li><a href="<?php echo U('trademark/fine',array('groupid'=>$value['id']))?>" <?php echo $search['groupid']==$value['id']?'class="zhichanbao_ons"':''?>><?php echo $value['name']?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="col-xs-1 tuijian_more">
			<a href="javascript:void(0)">更多</a>
		</div>
	</div>
	<div class="col-xs-12 zhichanbao_content">
		<div class="col-xs-12 zhichanbao_contents">
			<ul>
			<?php foreach ($data['item_data'] as $key=>$value):?>
				<li>
					<div class="zhichanbao_img">
						<a href="<?php echo U('trademark/'.$value['id'])?>"><img src="<?php echo $value['adimg']?>"/></a>
					</div>
					<div class="zhichanbao_img_right">
						<p><?php echo $value['price']>0?'￥'.$value['price']:'面议'?></p>
						<h2><a href="<?php echo U('trademark/'.$value['id'])?>" >【<?php echo mb_substr($value['name'],0,3,'utf-8')?>】<?php echo subtext($value['title'],30)?></a></h2>
							<div class="zhichanbao_details">
							<?php echo $value['tmlimit']?>
							</div>
						<div>
							<a href="<?php echo U('trademark/'.$value['id'])?>" class="shop_chakan">查看详情</a><a href="<?php echo U('Index/Cart/add',array('id'=>$value['id']))?>" class="shop_chakan shop_ljzx">立即购买</a>
						</div>
					</div>
				</li>
			<?php endforeach;?>
			</ul>
		</div>
	<?php echo $data['page']?>
	</div>
</div>
<!--知产包列表-->
  <!--主体-->
   <include file="Public/foot" />
<script type='text/javascript'>
/*知产包选择类别*/
$(".tuijian_more a").toggle(function () {
 $(this).html('收起');
$('.tuijian_selects').addClass("autoss");
  },function () {
    $('.tuijian_selects').removeClass("autoss");
	$(this).html('更多');
  }
);

/*知产包选择类别*/
$('.shop_list_hover').hover(function(){
$('.goods_shop_display').show();
},function(){
$('.goods_shop_display').hide();
})

/*分类显示切换*/
$('.goods_shopt a').click(function(){
$('.all-goods_shop').hide();
$(this).parents('.goods_shopt').next().show();
})

/*左侧二级导航*/
$(function(){
	$('.all-goods_shop .item').hover(function(){
	    $(this).addClass('active').find('s').hide();
		$(this).find('.product-wrap').show();
	},function(){
	    $(this).removeClass('active').find('s').show();
		$(this).find('.product-wrap').hide();
	});
	});
/*左侧二级导航*/

/*搜索类别切换*/
$('.searchs_libie li').click(function(){
$('.searchs_libie li a').removeClass('libie_ons');
$(this).find("a").addClass('libie_ons');
var ffh=$(this).find('a').attr('name');
$('#ymyys').val(ffh);
})
/*搜索类别切换*/

$(document).ready(function(){
$('.yanse li:eq(1)').css('border-left','none');
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
