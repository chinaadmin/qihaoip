<include file="Public/header"/>
<include file="Public/header_nav"/>
      <div class="col-xs-8 shop_contents_two">
        <div class="flexslider">
          <ul class="slides">
          	<volist name="data['banner']" id="vo">
            	<li style="background:url({$vo[img]}) 50% 0 no-repeat;"><a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$Think.STATIC_V2}images/blank.png" width="100%" height="430"></a></li>
          	</volist>
          </ul>
        </div>
      </div>
      <div class="col-xs-2 shop_contents_three">
        <div class="col-xs-12 sbandzls">
          <div class="col-xs-12 sbandzl">
            <div class="col-xs-12 shop_sbimg change_img"> <a href="{:U('trade/index')}" target="_blank"><img src="{$Think.STATIC_V2}images/shop_right_sb1.jpg"/></a> </div>
            <div class="col-xs-12 shop_zlimg change_img1"> <a href="{:U('zlgj/index')}" target="_blank"><img src="{$Think.STATIC_V2}images/shop_right_zl1.jpg"/></a> </div>
          </div>
          <div class="col-xs-12 shop_zishun">
            <div class="col-xs-12 fborqg"> <a href="{:U('Member/Seller/releasegoods')}" target="_blank"> 我要发布</a><a href="{:U('Member/Buyer/supply_add')}" target="_blank">我要求购</a></div>
            <div class="col-xs-12 zishunimg"> <img src="{$Think.STATIC_V2}images/shop_zishunimg.jpg"/><br/>
              <a href="__APP__/broker/" target="_blank" class="btn btn-warning zishuntitle">立即咨询</a>
              <p class="shop_p1">专属经纪人</p>
              <p>专业服务，信誉保证</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--分类与banner-->
    <!--明星旗舰店-->
<div class="thrfloor1">
<div class="col-xs-12 shop_contentss">
<div class="col-xs-12 shop_titles">明星旗舰店<a href="__APP__/shop/store_list/" target="_blank">更多>></a></div>
<div class="col-xs-12 shop_gudous">

<div class='rollphotostkk'>
          <div class='blk_29stkt_shop'>
		  <div class='LeftBotton' id='LeftArr'></div>
            <div class='Cont' id='ISL_Cont_1'>
              <!-- 图片列表 begin -->
              <volist name="data['starshop']" id="vo">
	              <div class='box boxt'> 
	              	<a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['name']}"/></a>
	                <p><a href="{$vo['link']}" title="{$vo['name']}" target="_blank">{$vo['name']}</a></p>
	              	<a href="{$vo['link']}" title="{$vo['name']}" class="btn btn-default shop_shou" target="_blank">收藏本店</a>
	              </div>
              </volist>
              <!-- 图片列表 end -->
            </div>
			<div class='RightBotton' id='RightArr'></div>
          </div>
        </div>
        
</div>
</div>
<!-- <div class="col-xs-12 thrguangao"><a href="{$data['adv'][0]['link']}" title="{$data['adv'][0]['name']}" target="_blank"><img src="{$data['adv'][0]['img']}" alt="{$data['adv'][0]['name']}"/></a></div> -->
</div>

<!--明星旗舰店-->
<!--知产包与特惠专区-->
<div class="thrfloor1">
<div class="col-xs-12 shop_margin">
<div class="col-xs-7 shop_zcb">
<div class="col-xs-12 shop_titles">知产包 <a href="__APP__/ipbag/">更多>></a></div>
<div class="col-xs-12 shop_zcb_content">
<volist name="data['zcb']" id="vo">
	<div class="shop_zcb_one">
		<a href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX"><img src="{$vo['smallimg']}"/></a>
		<p>{$vo['title']|msubstr=0,12}</p>
		<a href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" class="shop_chakan">查看详情</a><a href="http://wpa.qq.com/msgrd?v=3&uin=21556911&site=qq&menu=yes" class="shop_chakan shop_ljzx">立即咨询</a>
	</div>
</volist>
</div>
</div>
<div class="col-xs-5 shop_tehui">
<div class="col-xs-12 shop_tehui_list">
<div class="col-xs-12 shop_titles">特惠专区 <a href="__APP__/trademark/price/">更多>></a></div>
<div class="col-xs-12 shop_qugolist">

<div class="scrollboxs">	
    <div id="scrollDivs">
        <ul>
        <volist name="data['ykj']" id="vo">
            <li>
            	<img src="{$Think.STATIC_V2}images/sale_img.jpg"/> &nbsp;
            <eq name="vo['tmpa']" value="1">
            	<a href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank" >【{$vo['groupname']}】{$vo['title']|msubstr=0,18}</a>
            <else/>
            	<a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank" >【{$vo['groupname']}】{$vo['title']|msubstr=0,18}</a>
            </eq>
            	<a class="maibu">有效期到{$vo['tmregend']}</a>
            </li>
        </volist>
        </ul>
    </div>
</div>

</div>
</div>
</div>
</div>
<div class="col-xs-12 thrguangao"><a href="{$data['adv'][1]['link']}" title="{$data['adv'][1]['name']}" target="_blank"><img src="{$data['adv'][1]['img']}" alt="{$data['adv'][1]['name']}"/></a></div>
</div>
<!--知产包与特惠专区-->
  <!--商标-->
<div class="thrfloor1">
<div class="col-xs-12">
<div class="col-xs-12 shop_zhuanqu">
<div class="col-xs-12 shop_titles">商标专区 <a href="__APP__/shop/tradelist/groupid/52HTMLSUFFIX">更多>></a></div>
<div class="col-xs-3 shop_zhuanqu_img">
	<a href="{$data['data_ad'][0]['link']}" title="{$data['data_ad'][0]['name']}" target="_blank"><img src="{$data['data_ad'][0]['img']}" alt="{$data['data_ad'][0]['name']}"/></a>
</div>
<div class="col-xs-9">
<volist name="data['tm']" id="vo">
	<div class="col-xs-3 shop_zhuanqu_one">
		<a href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img'][0]}" alt="{$vo['title']}"/></a>
		<p class="more_height"><span>{$vo['price']}</span></p>
		<p class="more_height">【{$vo['category'][0]}】{$vo['title']|msubstr=0,10}</p>
		<p>{$vo['tmlimit']|msubstr=0,30}</p>
	</div>
</volist>
</div>
</div>
</div>
<div class="col-xs-12 thrguangao"><a href="{$data['adv'][2]['link']}" title="{$data['adv'][2]['name']}" target="_blank"><img src="{$data['adv'][2]['img']}" alt="{$data['adv'][2]['name']}"/></a></div>
</div>
<!--商标-->
<!--专利-->
<div class="thrfloor1">
<div class="col-xs-12">
<div class="col-xs-12 shop_zhuanqu">
<div class="col-xs-12 shop_titles">专利专区 <a href="__APP__/shop/patnetlistHTMLSUFFIX">更多>></a></div>
<div class="col-xs-3 shop_zhuanqu_img">
	<a href="{$data['data_ad'][0]['link']}" title="{$data['data_ad'][1]['name']}" target="_blank"><img src="{$data['data_ad'][1]['img']}" alt="{$data['data_ad'][1]['name']}"/></a>
</div>
<div class="col-xs-9">
<volist name="data['pa']" id="vo">
	<div class="col-xs-3 shop_zhuanqu_one">
		<a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img'][0]}" alt="{$vo['title']}"/></a>
		<p class="more_height more_heights"><span>{$vo['price']}</span></p>
		<p class="more_height">【{$vo['tmtype']}】{$vo['title']|msubstr=0,9}</p>
		<p>{$vo['category']}</p>
	</div>
</volist>
</div>
</div>
</div>
</div>
  <!--专利-->
  <!--主体-->
  <!--底部-->
  <div class="thrwid bottom bottom_bg">
    <div class="thrbottom thrbot_margin">
      <div class="col-xs-12 index_fs"> <img src="{$Think.STATIC_V2}images/index_fs.png"/> </div>
      <div class="col-xs-12 yqlj">
        <ul>
          <li><a href="javascript:;" class="selst">友情链接</a></li>
        </ul>
      </div>
      <div class="row thrbottomst">
        <div class="col-xs-12 hzjg index_imglink" id="yqljs0">
          <ul>
          	<volist name="data['link'][0]['youlian']" id="vo">
            	<li><a href="{$vo['link']}" <notempty name="vo['title']">title="{$vo['title']}"</notempty> <eq name="vo['nofollow']" value="2">rel="nofollow"</eq> target="_blank"><notempty name="vo['img']"><img src="{$vo['img']}" alt="{$vo['alt']}"/><else/>{$vo['name']}</notempty></a></li>
          	</volist>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="thrwid gao8 bottom_last">
    <div class="thrbottoms index_border">
    <volist name="data['help']['class']" id="vo">
      <div class="col-xs-1 help index_help">
        <dl>
          <dt>{$vo['name']}</dt>
          <volist name="vo['info']" id="v">
          	<dd><a href="__APP__/news/{$v['date']}/{$v['id']}HTMLSUFFIX" rel="nofollow" target="_blank">{$v['title']}</a></dd>
          </volist>	
        </dl>
      </div>
    </volist>
    </div>
    <div class="thrbottoms">
      <div class="col-xs-8 dizhi">
        <p><a href="__APP__/news/20151125/1021HTMLSUFFIX" rel="nofollow" target="_blank">关于7号网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/news/20150508/1121HTMLSUFFIX" rel="nofollow" target="_blank">官方微信</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://weibo.com/7hip" rel="nofollow" target="_blank">官方微博</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/siteMap/"  target="_blank">网站地图</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/trademark/" title="商标转让,商标交易与管理平台,商标转让全国NO.1" target="_blank">商标转让</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/patent/" title="专利转让,专利技术转让交易与管理平台" target="_blank">专利转让</a></p>
        <p>{$data['siteInfo']['web_copyright']|htmlspecialchars_decode}{$data['siteInfo']['web_icp']}</p>
        <p>客服热线：{$data['siteInfo']['web_400']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：{$data['siteInfo']['web_addr']}</p>
      </div>
      <div class="col-xs-2 weixin"><img src="{$Think.STATIC_V2}images/weixin.jpg"/><br/>关注七号网微信 </div>
      <div class="col-xs-2 weibo"><a href="http://weibo.com/7hip" rel="nofollow" target="_blank">+关注</a></div>
      
    </div>
  </div>
  <!--底部-->
</div>
<script type='text/javascript'>
//收藏功能
$('.shop_shou').click(function(){
	alert('111');
	return false
	/* var parameter = {};
	parameter['type'] = '4';
	parameter['sid'] = '';
	parameter['url'] = $(this).prev().attr('href'); */
	/* $.post("{:U('Index/IndexBase/collect')}",parameter,function(data){
		var obj = eval("(" + data+ ")");
	}); */
});
/*推荐*/
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 1200;//显示框宽度
		scrollPic_02.pageWidth      = 300; //翻页宽度
		scrollPic_02.speed          = 100; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 2; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
/*推荐*/
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
/*专利管家商标管家鼠标放上效果*/
$('.change_img').hover(function(){
$(this).css('background','#FF6A06');
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-4;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'s.jpg');
},function(){
$(this).css('background','#EBEBEB');
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-5;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'.jpg');
})
$('.change_img1').hover(function(){
$(this).css('background','#FE4800');
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-4;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'s.jpg');
},function(){
$(this).css('background','#EBEBEB');
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-5;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'.jpg');
})
/*专利管家商标管家鼠标放上效果*/
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
$("#scrollDivs").Scroll({line:1,speed:1000,timer:3000,up:"but_up",down:"but_down"});
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