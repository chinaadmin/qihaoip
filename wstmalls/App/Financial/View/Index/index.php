<include file="Public/financial_header" />
<!--banner-->
<div class="kuang gao3 thrshangchengao">
<div class="flexslider">
        <ul class="slides">
        <volist name="data['banner']" id="vo">
            <li style="background:url({$vo['img']}) 50% 0 no-repeat;"><a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
        </volist>
        </ul> 
</div>
</div>
<!--banner-->

<div class="thrfloor1 kjjr_main">
	<div class="col-xs-9">
    	<div class="kjjr1">
            <h2 class="kjjr_h2_1">知识产权质押</h2>
            <p>知识产权质押是指知识产权权利人以合法拥有的专利权、注册商标专用权、著作权等知识产权中的财产权为质押标的物出质，经评估作价后向银行等融资机构获取资金，并按期偿还资金本息的一种融资行为。</p>
        </div>
    
    	<div class="kjjr2">
           <div class="kjjr2_1">
           		<p class="kjjr2_2">知识产权权利人</p>
                <p class="kjjr2_3">银行</p>
                <p class="kjjr2_4">评估</p>
                <p class="kjjr2_5">银行审核</p>
                <p class="kjjr2_6">签订《借款合同》<br>《知识产权质押合同》</p>
                <p class="kjjr2_7">办理知识产权<br>质押登记手续</p>
                <p class="kjjr2_8">放贷</p>
                <p class="kjjr2_9">申请</p>
                <p class="kjjr2_10">准入</p>
                <p class="kjjr2_11">提交</p>
           </div>
        </div>
    </div>
    
    <div class="col-xs-3"><br><img class="kjjr_right" width="278" height="238" align="middle" alt="知识产权质押" src="<?php echo STATIC_V2;?>images/kjjr_pic1.jpg"></div>
    <div class="clear"></div>
</div>

<div class="thrfloor1 kjjr_main">
	<h2 class="kjjr_h2_2"><span class="kjjr_right"><a target="_blank" href="http://f.qihaoip.com/policy/">更多>></a></span>政策支持</h2>
<volist name="data['policy']['class']" id="vo">	
	<dl class="col-xs-6 kjjr3">
	<if condition="($key eq 1) or ($key eq 2)">
		<dt class="kjjr_left kjjr3_1"><a target="_blank" title="{$vo['name']}" href="http://f.qihaoip.com/policy/{$vo['ename']}/">{$vo['name']}</a></dt>
        <dd class="kjjr_left kjjr3_2">
    <else />
    	<dt class="kjjr_left"><a target="_blank" title="{$vo['name']}" href="http://f.qihaoip.com/policy/{$vo['ename']}/">{$vo['name']}</a></dt>
        <dd class="kjjr_left">
    </if>
        	<ul>
        	<volist name="vo['zixun']" id="v">
                <li><a target="_blank" title="{$v['title']}" href="__APP__/news/{$v['date']}/{$v['id']}HTMLSUFFIX">>{$v['title']|msubstr=0,30}</a></li>
            </volist>
            </ul>
        </dd>
    </dl>
</volist>   
    <div class="clear"></div>
    
    <div class="kjjr3_3">
    	<p>其他地区政策支持</p>
    	<ul>
    	<volist name="data['policy']['qtnews']" id="vo">
            <li><a target="_blank" title="{$vo['title']}" href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX">>{$vo['title']|msubstr=0,30}</a></li>
        </volist>
        </ul>
        <div class="clear"></div>
    </div>
       
</div>


<div class="thrfloor1 kjjr_main">
	<h2 class="kjjr_h2_2"><span class="kjjr_right"><a target="_blank" href="http://f.qihaoip.com/news/">更多>></a></span>新闻动态</h2>
    <div class="kjjr3_3">
        <ul>
        <volist name="data['tech']" id="vo">
            <li><a target="_blank" title="{$vo['title']}" href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX">>{$vo['title']|htmlspecialchars_decode|msubstr=0,30}</a></li>
        </volist>
        </ul>
        <div class="clear"></div>
    </div>
      
</div>

<div class="thrfloor1 kjjr_main">
<volist name="data['link']" id="vo">
	<h2 class="kjjr_h2_2">{$vo['name']}</h2>
    <div class="kjjr4">
        <ul>
      <volist name="vo['youlian']" id="v">
         <li><a href="{$v['link']}"  title="{$v['name']}" <eq name="v['nofollow']" value="2">rel="nofollow"</eq> target="_blank" ><img align="middle" alt="{$v['alt']}" src="{$v['img']}"></a></li>
      </volist>
        </ul>
        <div class="clear"></div>
    </div>
</volist>      
</div>
<include file="Public/financial_footer"/>
<script type='text/javascript'>
$(".www51buycomnew").slide({ titCell:".num ul" , mainCell:".51buypicnew" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
/*放上后显示详情切换*/
$('.thrconlist1 li').hover(function(){
$('.thrconlist1 li').removeClass('listons');
$(this).addClass('listons');
})
$('.thrconlist2 li').hover(function(){
$('.thrconlist2 li').removeClass('listons');
$(this).addClass('listons');
})
$('.thrconlist3 li').hover(function(){
$('.thrconlist3 li').removeClass('listons');
$(this).addClass('listons');
})
$('.thrconlist4 li').hover(function(){
$('.thrconlist4 li').removeClass('listons');
$(this).addClass('listons');
})
$('.thrconlist5 li').hover(function(){
$('.thrconlist5 li').removeClass('listons');
$(this).addClass('listons');
})
$('.thrconlist6 li').hover(function(){
$('.thrconlist6 li').removeClass('listons');
$(this).addClass('listons');
})
$('.thrconlist7 li').hover(function(){
$('.thrconlist7 li').removeClass('listons');
$(this).addClass('listons');
})
$('.thrconlist8 li').hover(function(){
$('.thrconlist8 li').removeClass('listons');
$(this).addClass('listons');
})
/*放上后显示详情切换*/
/*精品商标*/
$('.thrjpsbzl li').hover(function(){
var tt=$(this).index();
$("div[id*='thrgd']").css('display','none');
$("#thrgd"+tt).css('display','block');
$('.thrjpsbzl li a').removeClass('thrses');
$(this).find("a").addClass('thrses');
})
/*精品商标*/

/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/
/*成功案例鼠标放上后显示简介*/
$("div[class*='thrcgaltu']").mouseover(function(){
$(this).children("div[class*='jianshaost']").css('display','block');
})
$("div[class*='thrcgaltu']").mouseout(function(){
$(this).children("div[class*='jianshaost']").css('display','none');
})
/*成功案例鼠标放上后显示简介*/
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
$('.remenlist li:even').css('background','#F9DFC1');
$('.qjdian:lt(2)').css('border-top','none');
$(".qjdian:eq(1)").css('border-right','none');
$(".qjdian:eq(5)").css('border-right','none');
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