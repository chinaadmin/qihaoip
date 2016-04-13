<include file="Public/header" />
<include file="Public/header_nav_list" />
  <!--导航-->
  <!--分类与banner-->
  <div class="thrfloor1">
    <div class="col-xs-12 shop_contents">
      <div class="col-xs-8 shop_contents_twos">
        <div class="flexslider">
          <ul class="slides">
          <volist name="data['ad']['topad']" id="vo">
            <li style="background:url({$vo['img']}) 50% 0 no-repeat;"><a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$Think.STATIC_V2}images/blank.png" alt="{$vo['name']}" width="100%" height="430"></a></li>
          </volist>
          </ul>
        </div>
      </div>
      <div class="col-xs-4 shop_contents_three" >
        <div class="col-xs-12 news-erweima">
          <div class="col-xs-6 news-erweima-content">
          	<img src="{$Think.STATIC_V2}images/qihao_weixin.png" />
            <div class="news-erweima-contents">
              <p>手机扫一扫</p>
              <p>微信：<span>qihaosub</span></p>
            </div>
          </div>
          <div class="col-xs-6 news-erweima-content">
          	<img src="{$Think.STATIC_V2}images/qihao_weibo.jpg" />
            <div class="news-erweima-contents">
              <p>7号网微博</p>
              <p><a href="http://weibo.com/7hip" target="_blank" rel="nofollow">+关注</a></p>
            </div>
          </div>
        </div>
        <div class="col-xs-12 news-right-list">
        <volist name="data['art']['art1']" id="vo">
        <if condition="$i elt 2">
          <div class="col-xs-12 fagui-content-jianjie news-size">
            <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,20}</a></h2>
            <div class="col-xs-12 fagui-content-jianjies">{$vo['description']|msubstr=0,50}<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" target="_blank">详细</a> </div>
          </div>
        </if>
        </volist> 
          <div class="col-xs-12 news-list-ul">
            <ul>
            <volist name="data['art']['art1']" id="vo">
            <if condition="$i gt 2">
              <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">▪ {$vo['title']|msubstr=0,20}</a></li>
            </if>
            </volist>
            </ul>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!--分类与banner-->
  <!--商标与7号动态-->
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-9 zhichan-news">
        <div class="col-xs-12 shop_titles "><a href="__APP__/news/focus/" class="add_20160323" target="_blank">知产新闻</a><a href="__APP__/news/focus/" target="_blank">更多>></a></div>
        <div class="col-xs-12 zhichan-news-left">
          <div class="zhichan-news-left-left">
          <volist name="data['art']['art2']" id="vo" offset="0" length='3'>
            <div class="col-xs-12 zhichan-news-left-lt"> 
          <notempty name="vo['img']">
            <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}" /></a>
          <else/>
            <img src="{$Think.STATIC_V2}images/newban1.jpg"/>
          </notempty>
            <div class="zhichan-news-left-con">
              <div class="col-xs-12 fagui-content-jianjie news-size">
                  <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX"  title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,15}</a></h2>
                  <div class="col-xs-12 fagui-content-jianjies">{$vo['description']|msubstr=0,50}<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" target="_blank">详细</a></div>
              </div>
            </div>
           </div>
          </volist>
          </div>
          <div class="zhichan-news-left-right">
            <div class="col-xs-12 news-list-uls">
              <ul>
              <volist name="data['art']['art2']" id="vo" offset="3" length='10'>
                <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">▪ {$vo['title']|msubstr=0,25}</a></li>
              </volist>  
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-3 dotai-news">
        <div class="col-xs-12 shop_titles"><a href="__APP__/news/dynamic/" class="add_20160323" target="_blank">7号动态</a><a href="__APP__/news/dynamic/" target="_blank">更多>></a></div>
        <div class="col-xs-12 dotai-news-con">
          <div class="col-xs-12 news-list-uls">
            <ul>
            <volist name="data['art']['art4']" id="vo">
              <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">▪ {$vo['title']|msubstr=0,18}</a></li>
            </volist>  
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--商标与7号动态-->
  <!--大家名言与7号知库-->
 <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-9 zhichan-news">
        <div class="col-xs-12 shop_titles"><a href="__APP__/news/baijia/" class="add_20160323" target="_blank">大家名言</a><a href="__APP__/news/baijia/" target="_blank">更多>></a></div>
        <div class="col-xs-12 zhichan-news-left">
        <volist name="data['art']['art7']" id="vo" offset="0" length='1'>
          <div class="minyan-news-left-left">
            <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}"/></a>
            <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,20}</a>
          </div>
        </volist>
          <div class="minyan-news-left-right">
          <volist name="data['art']['art7']" id="vo" offset="1" length='3'>
            <div class="col-xs-12 zhichan-news-left-lt"> 
              <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}" /></a>
              <div class="minyan-news-left-con">
                <div class="col-xs-12 fagui-content-jianjie news-size">
                  <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,20}</a></h2>
                  <div class="col-xs-12 fagui-content-jianjies">{$vo['description']|msubstr=0,70}<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" target="_blank">详细</a></div>
                </div>
              </div>
            </div>
           </volist> 
          </div>
        </volist>
        </div>
      </div>
      <div class="col-xs-3 dotai-news">
        <div class="col-xs-12 shop_titles"><a href="__APP__/news/ipbaike/" class="add_20160323" target="_blank">7号知库</a><a href="__APP__/news/ipbaike/" target="_blank">更多>></a></div>
        <div class="col-xs-12 dotai-news-con">
          <div class="col-xs-12 news-list-uls">
            <ul>
            <volist name="data['art']['art5']" id="vo">
              <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">▪ {$vo['title']|msubstr=0,18}</a></li>
            </volist>  
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--大家名言与7号知库-->
  <!--专题活动-->
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-9 zhichan-news">
        <div class="col-xs-12 shop_titles"><a href="__APP__/news/case/" class="add_20160323" target="_blank">经典案例</a><a href="__APP__/news/case/" target="_blank">更多>></a></div>
        <div class="col-xs-12 zhichan-news-lefts">

          <div class="anli-left">
         <volist name="data['art']['art3']" id="vo" offset="0" length='3'>
          <eq name="i" value="1">
            <div class="anli-big-img">
              <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}"/></a>
              <div class="anli-title"><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX">{$vo['title']|msubstr=0,20}</a></div>
            </div>
          <else/>
            <div class="anli-min-img"> 
              <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}"/></a>
              <div class="anli-title"><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX">{$vo['title']|msubstr=0,10}</a></div>
            </div>
          </eq>
         </volist>
          </div>

          <div class="anli-right">
          <volist name="data['art']['art3']" id="vo" offset="3" length='1'>
            <div class="col-xs-12 fagui-content-jianjie news-size">
              <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,20}</a></h2>
              <div class="col-xs-12 fagui-content-jianjies">{$vo['description']|msubstr=0,60}<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" target="_blank">详细</a> </div>
            </div>
          </volist>
            <div class="col-xs-12 news-list-uls anli-list-uls">
              <ul>
              <volist name="data['art']['art3']" id="vo" offset="4" length='5'>
                <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">▪ {$vo['title']|msubstr=0,20}</a></li>
              </volist> 
              </ul>
            </div>
          </div>

        </div>
      </div>
      <div class="col-xs-3 dotai-news">
        <div class="col-xs-12 shop_titles"><a href="__APP__/special/" class="add_20160323" target="_blank">专题▪活动</a><a href="__APP__/special/" target="_blank">更多>></a></div>
        <div class="col-xs-12 dotai-news-cons">
        <volist name="data['ad']['footad']" id="vo">
           <div class="col-xs-12 minyan-news-left-lt"> 
           <notempty name="vo['img']">
                 <a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['name']}"/></a>
           <else/>
                 <img src="{$Think.STATIC_V2}images/newban1.jpg"/>
           </notempty>
              <div class="huodong-news-left-con">
                <div class="col-xs-12 fagui-content-jianjie news-size fagui-content-jianjiet">
                  <h2><a href="{$vo['link']}" title="{$vo['name']}" target="_blank">{$vo['name']|msubstr=0,10}</a></h2>
                  <div class="col-xs-12 fagui-content-jianjies">{$vo['about']|msubstr=0,10}<a href="{$vo['link']}" target="_blank">详细</a> </div>
                </div>
              </div>
            </div>
        </volist>    
        </div>
      </div>
    </div>
  </div>
  <!--专题活动-->
  <!--发明趣闻-->

  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles"><a href="__APP__/news/interest/" class="add_20160323" target="_blank">发明趣闻</a><a href="__APP__/news/interest/" target="_blank">更多>></a></div>
      <div class="col-xs-12 famin-content">
        <div class='rollphotostkk'>
          <div class='blk_29stkt_news'>
            <div class='LeftBotton' id='LeftArr'></div>
            <div class='Cont' id='ISL_Cont_1'>
            <volist name="data['art']['art6']" id="vo">
              <div class='box boxt'> 
                  <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}"/></a>
                <div class="anli-title"><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,10}</a></div>
              </div>
            </volist>  
            </div>
            <div class='RightBotton' id='RightArr'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--发明趣闻-->
  <!--主体-->
  <!--底部-->
<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=8579489980592173268' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
<include file="Public/foot" />
  <!--底部-->
</div>
<script type='text/javascript'>
/*推荐*/
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 1100;//显示框宽度
		scrollPic_02.pageWidth      = 300; //翻页宽度
		scrollPic_02.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化

/*推荐*/

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
</script>