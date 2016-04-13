<include file="Public/financial_header" />
<div class="thrfloor1">
	<div class="moban_mbx"> 当前位置：<a href="__APP__">7号网</a> » <a href="http://f.qihaoip.com/">科技金融</a> » <a>{$data['dname']}</a> </div>
</div>
<div class="thrfloor1">
	 <div class="col-xs-3">
	 <if condition="$Think.const.CONTROLLER_NAME  eq 'News'">
	 	<div class="kjjr5">
        	<div class="kjjr5_h2">{$data['dname']}</div>
	            <div class="kjjr5_1">
	                <ul>
	                <volist name="data['cate']" id="vo">    
	                    <li><a href="http://f.qihaoip.com/news/" class="kjjr5_hover"><span class="glyphicon glyphicon-menu-right"></span>{$vo['name']}</a></li>
	                </volist>
	                </ul>
	            </div>
            <p><img src="<?php echo STATIC_V2;?>images/kjjr_pic5.jpg"></p>
        </div>
      <elseif condition="$Think.const.CONTROLLER_NAME eq 'Policy'" />  
     	<div class="kjjr5">
        	<div class="kjjr5_h2">{$data['dname']}</div>
	            <div class="kjjr5_1">
	                <ul>
	                <li><a <if condition="$Think.const.ACTION_NAME eq 'index'">class="kjjr5_hover"</if>  href="http://f.qihaoip.com/policy/" ><span class="glyphicon glyphicon-menu-right"></span>全部</a></li>
	               <volist name="data['cate']" id="vo">    
	                <li><a href="http://f.qihaoip.com/policy/{$vo['ename']}/" <if condition="$Think.const.ACTION_NAME eq $vo['ename']">class="kjjr5_hover"</if>><span class="glyphicon glyphicon-menu-right"></span>{$vo['name']}</a></li>
	               </volist>
	                <!-- <li><a href="http://f.qihaoip.com/policy/other/" <if condition="$Think.const.ACTION_NAME eq 'other'">class="kjjr5_hover"</if>><span class="glyphicon glyphicon-menu-right"></span>其他地区</a></li> -->
	                </ul>
	            </div>
        </div>
     </if> 
     </div>
     <div class="col-xs-9">	
     	<ul class="kjjr6">
     	<volist name="data['content']" id="vo">
            	<li>
            		<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">
            	<if condition="$Think.const.CONTROLLER_NAME eq 'News'">
            		<span>{$vo['addtime']|date="Y-m-d",###}</span>
            	<else/>
            		<span>{$vo['catename']}</span>
            	</if>
            		{$vo['title']|msubstr=0,30}
            		</a>
            	</li>
        	</volist>
        </volist>
        </ul>
        <div class="kjjr6_1">
	       {$data['page']}
        </div>
     </div>
     <div class="clear"></div>
     
</div>
<include file="Public/financial_footer" />
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