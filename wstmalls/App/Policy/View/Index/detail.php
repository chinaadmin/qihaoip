<include file="Public/header" />
<include file="Public/header_nav_list" />

  <!--专利-->
  <div class="thrfloor1">
  <div class="col-xs-12 fagui-title">
   当前位置：<a href="http://www.qihaoip.com">首页</a> » <a href="<?php create_url('/')?>">政策法规</a> » <a href="<?php create_url('/policy',array('gp'=>$data['gpname']['id']))?>"> <?php echo $data['gpname']['name'];?></a> » 正文
  </div>
  <div class="col-xs-12 fagui-contents">
  <h2><?php echo $data['article']['title']?></h2>
  <div class="col-xs-12 fagui-contents-clicknum">
  发布时间：<?php echo date('Y-m-d',$data['article']['addtime'])?> 点击：<?php echo $data['article']['views']?>
  </div>
  <div class="col-xs-12 fagui-contents-daodu">
  导读：<?php echo $data['article']['description']?>
  </div>
  <div class="col-xs-12 fagui-contents-content">
	<?php echo $data['article']['content']?>
  </div>
<?php echo $data['page']?>
	<div class="col-xs-12 fagui-fenxiang"><p>分享到：</p>
<div class="bdsharebuttonbox fudouymyss">
		<a href="javascript:void(0)" class="bds_more" data-cmd="more"></a>
		<a href="javascript:void(0)" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="javascript:void(0)" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="javascript:void(0)" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		<a href="javascript:void(0)" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		<a href="javascript:void(0)" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
	
<a href="javascript:void(0)" class="btn btn-default sc"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>收藏</a>
</div>
<div class="col-xs-12 fagui-shangxia">
<p>上一篇：<a href="<?php create_url('/'.$data['prev']['id'])?>" ><?php echo $data['prev']['title']?></a></p>
<p>上一篇：<a href="<?php create_url('/'.$data['next']['id'])?>" ><?php echo $data['next']['title']?></a></p>
</div>
  </div>
  <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">相关资讯</div>
	  <div class="col-xs-12 fagui-link-about">
	  <ul>
	  <?php foreach ($data['r_article'] as $key =>$value):?>
	   <li><a href="<?php create_url('/'.$value['id'])?>">▪ <?php echo subtext($value['title'],35)?></a></li>
	  <?php endforeach;?>
	  </ul>
	  </div>
    </div>
	<div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">政策法规问答</div>
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
  
  <!--专利-->
  <!--主体-->
  <include file="Public/foot" />
<script type='text/javascript'>

//收藏
$('.sc').live('click',function(){
	var id = $(this).attr('id');
	$.post('<?php echo U('/Index/Index/favorite');?>',{'sid':id,'type':'3'},function(data){
			$.MsgBox.Alert("温馨提示：",data.data);
		})
	})
//收藏
	
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
</body>
</html>
