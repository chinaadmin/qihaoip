<include file="Public/header"/>
<include file="Public/header_nav_list"/>
<!--知产包列表-->
<div class="thrwid zhichanbao_banner">

</div>
<div class="thrfloor1 zhichanbao_list">
<div class="col-xs-12 zhichanbao_select">
<div class="col-xs-10 zhichanbao_selects">
<ul>
<li><a href="__APP__/ipbag/" <empty name="data['cateid']">class="zhichanbao_ons"</empty>>全部</a></li>
<volist name="data['category']" id="vo">
	<li><a href="__APP__/ipbag/cateid/{$vo['id']}HTMLSUFFIX" <if condition="$data['cateid'] eq $vo['id']">class="zhichanbao_ons"</if> title="{$vo['name']}">{$vo['name']}</a></li>
</volist>
</ul>
</div>
<if condition="$data['count'] gt 5">
<div class="col-xs-2 zhichanbao_more">
	<a href="javascript:">更多</a>
</div>
</if>
</div>
<div class="col-xs-12 zhichanbao_content">
<div class="col-xs-12 zhichanbao_contents">
<ul>
<volist name="data['zcb']" id="vo">
	<li>
		<div class="zhichanbao_img">
			<a href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}"><img src="{$vo['img']}"/></a>
		</div>
		<div class="zhichanbao_img_right">
			<h2><a href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}">【{$vo['typename']}】{$vo['title']}</a></h2>
			<div class="zhichanbao_detail">
				{$vo['content']|msubstr=0,100}
			</div>
			<div>
				<a href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" class="shop_chakan">查看详情</a><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" target="_blank" class="shop_chakan shop_ljzx">立即咨询</a>
			</div>
		</div>
	</li>
</volist>
</ul>
</div>
<div class="col-xs-12">
	{$data['page']}
</div>
</div>
</div>
<!--知产包列表-->
  <!--主体-->
  <!--底部-->
  <include file="Public/foot"/>
  <!--底部-->
</div>
<script type='text/javascript'>
/*知产包选择类别*/
$(".zhichanbao_more a").toggle(function () {
 $(this).html('收起');
$('.zhichanbao_selects').addClass("autoss");
  },function () {
    $('.zhichanbao_selects').removeClass("autoss");
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
