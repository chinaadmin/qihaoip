<include file="Public/header" />
<include file="Public/header_nav_list" />
<!--导航-->
<!--分类与banner-->
  <div class="thrfloor1">
    <div class="col-xs-12 shop_contents">
      <div class="col-xs-8 shop_contents_twos">
        <div class="flexslider">
          <ul class="slides">
          <volist name="data['banner']" id="vo">
            <li style="background:url({$vo['img']}) 50% 0 no-repeat;"><a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$Think.STATIC_V2}images/blank.png" alt="{$vo['name']}" width="100%" height="430"></a></li>
		  </volist>         
          </ul>
        </div>
      </div>
      <div class="col-xs-4 shop_contents_three" >
       <div class="col-xs-12 biaoqian-top">
		 <div class="col-xs-12 biaoqian-top-title">
		 热门标签
		 </div>
		<volist name="data['hotlabel']" id="vo"> 
		 	<a href="{$vo['link']}" title="{$vo['name']}" target="_blank" class="btn btn-default">{$vo['name']}</a>
		</volist> 
		</div> 
		<div class="col-xs-12 list-ul">
		<ul>
		<volist name="data['hotrecommend']" id="vo">
			<li><notempty name="vo['cityname']"><span class="list-li-color">【{$vo['cityname']}】</span></notempty><a href="<?php echo U('/'.$vo['id'])?>" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,20}</a><span>{$vo['addtime']|date='Y-m-d',###}</span></li>
		</volist>
		</ul>
		</div>
      </div>
    </div>
  </div>
  <!--分类与banner-->
 
<div class="thrfloor1">
	<div class="col-xs-12 shop_margin">
	<volist name="data['data']" id="vo" mod="2">
		<if condition="$i elt 2">
		 <!--商标专利相关政策-->
			<div class="col-xs-6 <eq name="i" value="1">fagui-left</eq> <eq name="i" value="2">fagui-right</eq> ">
				<div class="col-xs-12 shop_titles shop_titles_ul fagui_titles_ul fagui_titles_ul{$i}"><span>{$vo['name']}</span><a href="<?php create_url('/policy',array('gp'=>$vo['id']))?>">更多>></a></div>
				<div class="col-xs-12 fagui-content" <eq name="i" value="1">id="zlsc_hott0"</eq> <eq name="i" value="2">id="zlsc_hots0"</eq>>
				<div class="col-xs-12 fagui-content-ul">
				<volist name="vo['content']" id="v" key="n">	
				<if condition="$n elt 2">
				   <div class="col-xs-12 fagui-content-jianjie">
						<h2><span><notempty name="v['cityname']">【{$v['cityname']}】</notempty></span><a href="<?php echo U('/'.$v['id'])?>" title="{$v['title']}" target="_blank">{$v['title']|msubstr=0,25}</a></h2>
						<div class="col-xs-12 fagui-content-jianjies">
							{$v['description']|msubstr=0,80}<a href="#" target="_blank">详细</a>
						</div>
					</div>
				<else/>
					
						<li><span class="list-li-color"><notempty name="v['cityname']">【{$v['cityname']}】</notempty></span><a href="<?php echo U('/'.$v['id'])?>" title="{$v['title']}" target="_blank">{$v['title']|msubstr=0,25}</a><span>{$v['addtime']|date='Y-m-d',###}</span></li>
					
				</if>
				</volist>
				</div>
				</div>
			</div>
		<!--商标专利相关政策-->
		<else/>
		<!--版权其他知识产权相关政策-->
			<div class="col-xs-6  <eq name="mod" value="0">fagui-left<else/>fagui-right</eq>">
				<div class="col-xs-12 shop_titles shop_titles_ul fagui_titles_ul "><span>{$vo['name']}</span><a href="<?php create_url('/policy',array('gp'=>$vo['id']))?>">更多>></a></div>
				<div class="col-xs-12 fagui-content">
				<div class="col-xs-12 fagui-content-ul">
				<volist name="vo['content']" id="v" key="m">	
				<if condition="$m elt 2">
					<div class="col-xs-12 fagui-content-jianjie">
						<h2><span><notempty name="v['cityname']">【{$v['cityname']}】</notempty></span><a href="<?php echo U('/'.$v['id'])?>" title="{$v['title']}" target="_blank">{$v['title']|msubstr=0,25}</a></h2>
						<div class="col-xs-12 fagui-content-jianjies">
							{$v['description']|msubstr=0,80}<a href="<?php echo U('/'.$v['id'])?>" target="_blank">详细</a>
						</div>
					</div>
				<else/>
					
						<li><span class="list-li-color"><notempty name="v['cityname']">【{$v['cityname']}】</notempty></span><a href="<?php echo U('/'.$v['id'])?>" title="{$v['title']}" target="_blank">{$v['title']|msubstr=0,25}</a><span>{$v['addtime']|date='Y-m-d',###}</span></li>
					
				</if>
				</volist>
				
				</div>
				</div>
			</div>
		<!--版权其他知识产权相关政策-->
		</if>
	</volist>
	</div>
</div> 
<!--主体-->
<!--底部-->
<include file="Public/foot" />
<!--底部-->
</div>
<script type='text/javascript'>
/*商标切换*/
$('.fagui_titles_ul1 li').click(function(){
var tt=$(this).index();
$("div[id*='zlsc_hott']").css('display','none');
$("#zlsc_hott"+tt).css('display','block');
$('.fagui_titles_ul1 li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})
/*专利切换*/
$('.fagui_titles_ul2 li').click(function(){
var tt=$(this).index();
$("div[id*='zlsc_hots']").css('display','none');
$("#zlsc_hots"+tt).css('display','block');
$('.fagui_titles_ul2 li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})
/*版权切换*/
$('.fagui_titles_ul3 li').click(function(){
var tt=$(this).index();
$("div[id*='zlsc_hoth']").css('display','none');
$("#zlsc_hoth"+tt).css('display','block');
$('.fagui_titles_ul3 li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})
/*其他知识产权切换*/
$('.fagui_titles_ul4 li').click(function(){
var tt=$(this).index();
$("div[id*='zlsc_hotk']").css('display','none');
$("#zlsc_hotk"+tt).css('display','block');
$('.fagui_titles_ul4 li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})

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

/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/
/*搜索类别切换*/
$('.searchs_libie li').click(function(){
$('.searchs_libie li a').removeClass('libie_ons');
$(this).find("a").addClass('libie_ons');
var ffh=$(this).find('a').attr('name');
$('#ymyys').val(ffh);
})
/*搜索类别切换*/


$(document).ready(function(){
$("#scrollDivst").Scroll({line:1,speed:550,timer:3000,up:"but_up",down:"but_down"});
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