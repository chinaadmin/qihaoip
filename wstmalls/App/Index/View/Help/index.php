<include file="Public/header" />
<include file="Public/header_nav_list" />
  <!--导航-->
  <!--专利-->
<div class="thrfloor1">
  <div class="col-xs-12 fagui-title">
   当前位置：<a href="__APP__">7号网</a> » <a href="__APP__/help/">帮助中心</a>
  </div>
  <div class="col-xs-2 fagui-lefts">
 <volist name="data['category']" id="vo"> 
  <div class="col-xs-12 fagui-lefts-dl">
  <dl>
  <dt>{$vo['name']}</dt>
  <volist name="vo['sub']" id="v">
  	<dd><a href="__APP__/help/{$v['ename']}/" <if condition="$data['action'] eq $v['ename']">class="fagui-ons"</if>>{$v['title']}</a></dd>
  </volist>
  </dl>
  </div>
</volist>
  </div>
  <div class="col-xs-10 fagui-rights">
	  <div class="col-xs-12 fagui-rights-lists-help">{$data['info']['content']|htmlspecialchars_decode}</div>
  </div>
</div>
  <!--专利-->
  <!--主体-->
<!--底部-->
<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=8579489980592173268' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
<include file="Public/foot" />
<!--底部-->
</div>
<script type='text/javascript'>
$('.shop_list_hover').hover(function(){
//alert('aaa');
$('.goods_shop_display').show();
},function(){
//alert('bbb');
$('.goods_shop_display').hide();
})
/*分类显示切换*/
$('.goods_shopt a').click(function(){
//alert('kkk');
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