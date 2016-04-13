<include file="Public/header"/>
<include file="Public/header_nav_list"/>
<!--知产包-->
<div class="thrwid zhichanbao_banner">

</div>
<div class="thrfloor1 zhichanbao_list">
<div class="col-xs-12 zhichanbao_jianjie">
	<h2><a href="__APP__/ipbag/{$data['dgzcb']['id']}HTMLSUFFIX">【{$data['dgzcb']['typename']}】{$data['dgzcb']['title']}</a></h2>
	<div class="col-xs-12 zhichanbao_ckj">参考价：<span>{$data['dgzcb']['price']}</span><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" target="_blank" class="btn btn-default zhichanbao_zixun">立即咨询</a></div>
	<div class="col-xs-12 zhichanbao_jianjie_con">
		简介：{$data['dgzcb']['content']}
	</div>
	<div class="one_img"><img src="{$data['dgzcb']['img']}"></div>
</div>
<div class="col-xs-12 zhichanbao_content_one">
<ul>
<volist name="data['dgzcb']['data']" id="vo">
	<li>
		<div class="one_zhichanbaoimg">
		<eq name="vo['tmpa']" value="1">
			<a href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}"><img src="{$vo['img']}"/></a>
		<else/>
			<a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}"><img src="{$vo['img']}"/></a>
		</eq>	
		</div>
		<div class="one_zhichanbao_content">
		<eq name="vo['tmpa']" value="1">
			<h2><a href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}">{$vo['title']}</a></h2>
			<p>所属类别：{$vo['catename']}</p><p>组合类型：{$vo['typename']}</p>
			<p>注册号：{$vo['tmno']}</p><p>有效期：{$vo['tmregdate']}至{$vo['tmregend']}</p>
			<p>交易方式：<span>{$vo['tradeway']}</span></p><p>是否单独转让：<span>{$vo['singlesale']}</span></p>
			<div class="col-xs-12 one_zhichanbao_jianjie">服务项目：{$vo['tmlimit']|msubstr=0,130}</div>
		<else/>
			<h2><a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}">{$vo['title']}</a></h2>
			<p>所属行业：{$vo['catename']}</p><p>专利类型：{$vo['typename']}</p>
			<p>申请号：{$vo['tmno']}</p><p>有效期：{$vo['tmregdate']}至{$vo['tmregend']}</p>
			<p>交易方式：<span>{$vo['tradeway']}</span></p><p>是否单独转让：<span>{$vo['singlesale']}</span></p>
			<div class="col-xs-12 one_zhichanbao_jianjie">摘要：{$vo['tmlimit']|msubstr=0,130}</div>
		</eq>
		</div>
	</li>
</volist>
</ul>
</div>
</div>
<!--知产包-->
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
