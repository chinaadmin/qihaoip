<include file="Public/header" />
<include file="Public/header_nav_list" />
<style type="text/css">
#page_break {} 
#page_break .collapse {display: none;} 
#page_break .num {padding: 10px 0;text-align: center;} 
#page_break .num li{background-color: #fff;border: 1px solid #cccccc;color: #333333;cursor: pointer;display: inline;margin: 0 2px;overflow: hidden;padding: 5px 12px;text-align: center;} 
#page_break .num li.on{background-color:#ff6600;color:#fff;font-weight: bold;} 
</style>
  <!--导航-->
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 fagui-title"> 当前位置：<a href="__APP__">首页</a> » <a href="__APP__/news/">资讯首页</a> » <a href="{$data['modeltype']}">{$data['content']['name']}</a> » 正文</div>
    <div class="col-xs-9 news-list-left">
       <div class="col-xs-12 fagui-contents">
  <h2>{$data['content']['title']}</h2>
  <div class="col-xs-12 fagui-contents-clicknum">
 	 发布时间：{$data['content']['addtime']|date='Y-m-d',###}&nbsp;&nbsp;点击：{$data['content']['views']}
  </div>
 <div class="col-xs-12 fagui-contents-daodu">
 	 导读：{$data['content']['description']|htmlspecialchars_decode}
 </div>
<div class="col-xs-12 fagui-contents-content">
<?php 
$content = htmlspecialchars_decode($data['content']['content']);
$show = pageBreak($content);
echo $show;
function pageBreak($content){ 
    $content  = $content;
	$strSplit = preg_split('/_ueditor_page_break_tag_/', $content);
	//var_dump($strSplit);exit;
    $count    = count($strSplit); 
    $outStr   = ""; 
    $i        = 1; 
 
    if ($count > 1 ) { 
        $outStr   = "<div id='page_break'>"; 
        foreach($strSplit as $value) { 
            if ($i <= 1) { 
                $outStr .= "<div id='page_$i'>$value</div>"; 
            } else { 
                $outStr .= "<div id='page_$i' class='collapse'>$value</div>"; 
            } 
            $i++; 
        } 
 
        $outStr .= "<div class='num'>"; 
        for ($i = 1; $i <= $count; $i++) { 
            $outStr .= "<li>$i</li>"; 
        } 
        $outStr .= "</div></div>"; 
        return $outStr; 
    } else { 
        return $content; 
    } 
} 
?>
</div>
<div class="col-xs-12 fagui-fenxiang">
	<p>分享到：</p>
	<div class="bdsharebuttonbox col-xs-3"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
	<a href="javascript:;" class="btn btn-default shoucang" rel="{$data['content']['id']}"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><notempty name="data['collect']">您已收藏<else />收藏</notempty></a>
</div>
<div class="col-xs-12 fagui-shangxia">
<p>上一篇：
 <notempty name="data['prev']">	
	<a href="__APP__/news/{$data['prev']['date']}/{$data['prev']['id']}HTMLSUFFIX" title="{$data['prev']['title']}" target="_blank">{$data['prev']['title']}</a>
 <else />
 	没有了
 </notempty>
</p>
<p>上一篇：
 <notempty name="data['next']">
	<a href="__APP__/news/{$data['next']['date']}/{$data['next']['id']}HTMLSUFFIX" title="{$data['next']['title']}" target="_blank">{$data['next']['title']}</a>
 <else />
 	没有了
 </notempty>
</p>
</div>
  </div>
  <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">相关资讯</div>
	  <div class="col-xs-12 fagui-link-about">
	  <ul>
	 <notempty name="data['about']">
	  <volist name="data['about']" id="vo">
	  	<li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">▪&nbsp;{$vo['title']|htmlspecialchars_decode|msubstr=0,20}</a></li>
	  </volist>
	 <else/>
		暂无相关推荐
	 </notempty>	
	  </ul>
	  </div>
    </div>
	<div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">资讯问答</div>
	  <div class="col-xs-12 zldetail_allcontents">
  		<script type="text/javascript">
			(function(){
			var url = "http://widget.weibo.com/distribution/comments.php?width=0&url=auto&border=1&ralateuid=5518811791&appkey=564810431&dpc=1";
			url = url.replace("url=auto", "url=" + encodeURIComponent(document.URL)); 
			document.write('<iframe id="WBCommentFrame" src="' + url + '" scrolling="no" frameborder="0" style="width:100%"></iframe>');
			})();
		</script>
		<script src="http://tjs.sjs.sinajs.cn/open/widget/js/widget/comment.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			window.WBComment.init({
			    "id": "WBCommentFrame"
			});
		</script>
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
//收藏资讯
$('.shoucang').live('click',function(){
	$this = $(this);
	var id = $this.attr('rel');
	$.post('<?php echo U('/Index/Index/favorite');?>',{'sid':id,'type':'3'},function(data){
		if(data.state==1){
			$.MsgBox.Alerta("温馨提示：",data.data,function(){
				$this.html('<span class="glyphicon glyphicon-star" aria-hidden="true"></span>您已收藏');
			});
		}else{
			$.MsgBox.Alert("温馨提示：",data.data);
		}
	})
})

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

$(document).ready(function(){
$('.yanse li:eq(1)').css('border-left','none');
});

$('#page_break .num li').click(function(){
    //隐藏所有页内容 
       $("#page_break div[id^='page_']").hide(); 
    $('#page_break .num li').removeClass('on'); 
    $(this).addClass('on'); 
    //显示当前页内容。
    $('#page_break #page_' + $(this).text()).show(); 
    $(document).scrollTop(0);
}); 
$(document).ready(function(){
    $('#page_break .num li:first').addClass('on');
    $("#page_break #page_1").show(); 
});
</script>