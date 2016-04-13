<include file="Public/header" />
<include file="Public/header_nav_list" />
  <!--导航-->
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 fagui-title"> 当前位置：<a href="__APP__">首页</a> » <a href="__APP__/news/">资讯首页</a> » <a href="__APP__/news/{$Think.const.ACTION_NAME}/">{$data['catename']['name']}</a> </div>
    <div class="col-xs-9 news-list-left">
      <div class="col-xs-12 news-list-lefts">
        <div class="col-xs-12 news-list-lefts-con">
          <ul>
          <volist name="data['content']" id="vo">
          <if condition="$i eq 1">
            <li>
              <div class="news-list-img"> 
              	<img src="{$vo['img']}" alt="{$vo['title']}"/> 
              </div>
              <div class="news-list-content-size news-list-content">
                <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX">{$vo['title']|msubstr=0,40}</a></h2>
                <div class="col-xs-12 news-list-contents">{$vo['description']|msubstr=0,280}&nbsp;<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" class="color_chengse" target="_blank">[详情]</a></div>
                <p class="shop_margins">发布时间：{$vo['addtime']|date='Y-m-d',###}</p>
              </div>
            </li>
          <elseif condition="$i gt 1 && $vo['img']"/>  
            <li>
              <div class="news-list-imgs"> 
              	<img src="{$vo['img']}" alt="{$vo['title']}"/> 
              </div>
              <div class="news-list-content-size news-list-content1">
                <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX">{$vo['title']|msubstr=0,40}</a></h2>
                <div class="col-xs-12 news-list-contents">{$vo['description']|msubstr=0,150}&nbsp;<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" class="color_chengse" target="_blank">[详情]</a></div>
                <p class="shop_margins">发布时间：{$vo['addtime']|date='Y-m-d',###}</p>
              </div>
            </li>
          <else/>  
            <li>
              <div class="col-xs-12 news-list-content-size">
                <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX">{$vo['title']|msubstr=0,40}</a></h2>
                <div class="col-xs-12 news-list-contents">{$vo['description']|msubstr=0,150}&nbsp;<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" class="color_chengse" target="_blank">[详情]</a></div>
                <p class="shop_margins">发布时间：{$vo['addtime']|date='Y-m-d',###}</p>
              </div>
            </li>
           </if>
           </volist> 
          </ul>
        </div>
        <div class="col-xs-12 ">
          {$data['page']}
        </div>
      </div>
    </div>
<include file="Public/right" />
  </div>
  <!--专利-->
  <!--主体-->
  <!--底部-->
  <script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=8579489980592173268' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
  <include file="Public/foot" />
  <!--底部-->
</div>
<script type='text/javascript'>
/*右侧图片切换*/
$(".www51buycomss").hover(function(){
	$(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
	$(this).find(".prev,.next").hide();
})

$(".www51buycomss").slide({ titCell:".num ul" , mainCell:".51buypic" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
/*右侧图片切换*/
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

/*
*直接跳转分页功能
*/
$(".sub").click(function(){
    var go = $('#go').val();
    var pagenum = $('#pagecount').val();
 	if( parseInt(go) > parseInt(pagenum) || parseInt(go) < '1' || isNaN(go) ){
    	$.MsgBox.Alert("温馨提示：",'对不起，当前页无效！');
    	return false;
    } 
    $url = changeURL(window.location.href,'p',go);
    window.location.href = $url;
});
/*
* url 目标url
* arg 需要替换的参数名称
* arg_val 替换后的参数的值
* return url 参数替换后的url
*/
function changeURL(url,arg,arg_val){
    var pattern=arg+'=([^&]*)';
    var replaceText=arg+'='+arg_val; 
    if(url.match(pattern)){
        var tmp='/('+ arg+'=)([^&]*)/gi';
        tmp=url.replace(eval(tmp),replaceText);
        return tmp;
    }else{
        if(url.match('[\?]')){
            return url+'&'+replaceText;
        }else{
            return url+'?'+replaceText;
        }
    }
    return url+'\n'+arg+'\n'+arg_val;
}
</script>
</body>
</html>