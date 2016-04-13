<include file="Public/header" />
<include file="Public/header_nav_list" />
  <div class="thrfloor1">
    <div class="col-xs-12 fagui-title">当前位置：<a href="/">7号网</a> » <a href="<?php if($data['buyinfo']['tmpa'] == '1'){?><?php echo U('Buy/show_list',['t'=>'1']);}else {echo U('Buy/show_list',['t'=>'2']);}?>">求购信息</a> » <?php echo $data['buyinfo']['tmpa'] == '1'?'商标求购':'专利求购'?> </div>
    <div class="col-xs-12 qugo-detail-top">
	<div class="qugo-detail-left">
	    <h2><?php echo $data['buyinfo']['title'];?></h2>
        <div class="col-xs-12 fagui-contents-clicknum"> 发布时间：<?php echo $data['buyinfo']['addtime']?date('Y-m-d',$data['buyinfo']['addtime']):'';?> &nbsp;&nbsp;&nbsp;&nbsp;点击：<?php echo $data['buyinfo']['views'];?> </div>
		<div class="col-xs-12 qugo-detail-top-con">
          <p class="qugo-detail-top-p"><span>所属类别：</span><?php echo $data['buyinfo']['name'];?></p>
          <p class="qugo-detail-top-p"><span>有效期至：</span><?php echo $data['buyinfo']['endtime']?date('Y-m-d',$data['buyinfo']['endtime']):'长期有效';?></p>
          <div class="col-xs-12 qugo-detail-top-all"><span class="span-bold">详情：</span><?php echo $data['buyinfo']['content']?$data['buyinfo']['content']:'暂无';?></div>
        </div>
		<div class="bshare-custom here bdsharebuttonbox weizhistt">
		<a href="javascript:void(0)" class="bds_more" data-cmd="more"></a>
		<a href="javascript:void(0)" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
		<a href="javascript:void(0)" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		<a href="javascript:void(0)" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
		<a href="javascript:void(0)" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
		<a href="javascript:void(0)" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
		
		</div>
        <div class="zldetail-wxts"> 温馨提示：7号网提供在线支付功能，您可选择7号网在线支付功能向交易相对方支付款项。如您选择其他方式自行与交易相对方支付款项的，由此产生的所有风险以及纠纷或损失等任何问题，由您自行承担，7号网概不承担任何责任。 </div>
	</div>
	
	 
      <div class="zldetail-jjren qugo-zldetail-jjren">
      <?php if($data['seller']['username'] == '7hip'){?>
        <div class="zldetail-jjren-top">
          <div class="zldetail-jjren-toptitle"> 专属经纪人 </div>
          <div class="zldetail-jjren-topimg">
         	<?php if($data['agent']['img']){?>
				<img src="<?php echo $data['agent']['img'];?>" />
			<?php }else {?>
				<img src="<?php echo STATIC_V2;?>images/zldetail_jjrenimg.jpg" />
			<?php }?>
          </div>
          <div class="zldetail-jjren-topcontent">
            <p>经纪人：<?php echo $data['agent']['name'];?> &nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['agent']['qq'];?>&amp;site=qq&amp;menu=yes"
							target="_blank" rel="nofollow"><img
							src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言"
							alt="" onerror="this.src=images/qq-off.gif;"
							onload="if(this.width==77){this.src=images/qq-off.gif;}else if(this.width==23){this.src=images/qq.gif;}"
							align="absmiddle"></a></p>
            <p>手机：<?php echo $data['agent']['mobile'];?></p>
            <p>电话：<?php echo $data['agent']['tel'];?></p>
            <p>邮件：<?php echo $data['agent']['email'];?></p>
          </div>
          <div class="zldetail-jjren-topjianjie">
        <?php if($data['agent']['about']):?>
		简介：<?php echo subtext($data['agent']['about'],15)?><a href="__APP__/brokerHTMLSUFFIX">更多</a>
		<?php else:?>
		简介：<?php echo '暂无'?>
		<?php endif?></div>
        </div>
        <?php }else {?>
        <div class="zldetail-jjren-top">
          <div class="zldetail-jjren-toptitle"> 专属经纪人 </div>
          <div class="zldetail-jjren-topimg">
         	 <?php if($data['agent']['img']){?>
				<img src="<?php echo $data['agent']['img'];?>" />
			 <?php }else {?>
				<img src="<?php echo STATIC_V2;?>images/zldetail_jjrenimg.jpg"/>
			 <?php }?>
          </div>
          <div class="zldetail-jjren-topcontent">
            <p>经纪人：<?php echo $data['agent']['name'];?> &nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['agent']['qq'];?>&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言" alt="" onerror="this.src=images/qq-off.gif;" onload="if(this.width==77){this.src=images/qq-off.gif;}else if(this.width==23){this.src=images/qq.gif;}" align="absmiddle"></a></p>
            <p>手机：<?php echo $data['agent']['mobile'];?></p>
            <p>电话：<?php echo $data['agent']['tel'];?></p>
            <p>邮件：<?php echo $data['agent']['email'];?></p>
          </div>
          <div class="zldetail-jjren-topjianjie"> 
          <?php if($data['agent']['about']):?>
		简介：<?php echo subtext($data['agent']['about'],15)?><a href="__APP__/brokerHTMLSUFFIX">更多</a>
		<?php else:?>
		简介：<?php echo '暂无'?>
		<?php endif?>
          </div>
        </div>
        
        
        <div class="zldetail-jjren-bottom">
          <div class="zldetail-jjren-toptitle"> <?php if($data['buyinfo']['tmpa'] == '1'){echo '商标买家';}else {echo '专利买家';}?> <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['seller']['qq'];?>&amp;site=qq&amp;menu=yes" target="_blank" class="btn btn-default">联系买家</a> </div>
          <div class="zldetail-jjren-topimg">
            <?php if($data['seller']['img']){?>
				<img src="<?php echo $data['seller']['img'];?>" />
			<?php }else {?>
				<img src="<?php echo STATIC_V2;?>images/zldetail_jjrenimg.jpg"/>
			<?php }?>
          </div>
          <div class="zldetail-jjren-topcontent">
            <p>经纪人：<?php echo $data['seller']['name'];?> &nbsp;<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['seller']['qq']?>&amp;site=qq&amp;menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言" alt="" onerror="this.src=images/qq-off.gif;" onload="if(this.width==77){this.src=images/qq-off.gif;}else if(this.width==23){this.src=images/qq.gif;}" align="absmiddle"></a></p>
            <p>手机：<?php echo $data['seller']['mobile'];?></p>
            <p>电话：<?php echo $data['seller']['tel'];?></p>
            <p>邮件：<?php echo $data['seller']['email'];?></p>
          </div>
          <div class="zldetail-jjren-topjianjie"> <?php if($data['agent']['about']):?>
		简介：<?php echo subtext($data['seller']['about'],15)?>
		<?php else:?>
		简介：<?php echo '暂无'?>
		<?php endif?></div>
        </div>
      </div>
	  <?php }?>
      <!--专属经纪人-->
    </div>
  </div>
  
  <!--专利-->

  <div class="thrfloor1">
    <?php if($data['buyinfo']['tmpa'] == '1'):?>
    <div class="col-xs-12 shop_margin">
	<div class="col-xs-12 shop_titles">根据您的求购信息，推荐以下商标</div>
	<div class="col-xs-12 view_zldetail">
		<div class='rollphotostkk'>
          <div class='blk_29stkt_zlsczl blk_29stkt_zlscsb'>
            <div class='Cont' id='ISL_Cont_1'>
			 <?php foreach ($data['interest'] as $key=>$value):?>
              <div class="box">
				<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
				<p class="more_height"><span><?php echo $value['price']>0?$value['price']:'面议'?></span></p>
				<p class="more_height">【<?php echo mb_substr($value['name'],0,3,'utf-8')?>】<?php echo $value['title']?></p>
				<p class="fixed_height"><?php echo subtext($value['tmlimit'],30)?></p>
				<?php if($value['shop']):?>
       			<a href="javascript:void(0);" class="shop_list_shou sc" id="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏商标</a>
       			<a href="<?php echo U('shop/shop_list',array('shop'=>$value['shop']['id']))?>" class="shop_list_shou" title="<?php echo $value['shop']['name'].'旗舰店'?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 进入商城</a>
				<?php else:?>
				<a href="javascript:void(0);" class="shop_list_shous sc" id="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏商标</a>    			
				<?php endif?>
			  </div>
			  <?php endforeach;?>

            </div>
          </div>
        </div>
	</div>
	</div>
    <?php else:?>
    <div class="col-xs-12 shop_margin">
	<div class="col-xs-12 shop_titles">根据您的求购信息，推荐以下专利</div>
	<div class="col-xs-12 view_zldetail" >
		<div class='rollphotostkk'>
          <div class='blk_29stkt_zlsczl'>
            <div class='Cont' id='ISL_Cont_1'>
            <?php foreach ($data['interest'] as $key => $value){?>
              <div class="box">
				<a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
				<p class="more_height"><span><?php if($value['price'] > '0'){echo $value['price'];}else {echo '面议';}?></span></p>
        		<p class="more_height"><?php echo '【'.$value['tmtype'].'】';?><?php echo subtext($value['title'],10);?></p>
       			<p><?php echo $value['name']?></p>
       			<?php if($value['shop']):?>
       			<a href="javascript:void(0);" class="shop_list_shou shoucang" rel="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><notempty name="value['scid']">您已收藏<else />收藏专利</notempty></a>
       			<a href="<?php echo U('shop/shop_list',array('shop'=>$value['shop']['id']))?>" class="shop_list_shou" title="<?php echo $value['shop']['name'].'旗舰店'?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 进入商城</a>
				<?php else:?>
				<a href="javascript:void(0);" class="shop_list_shous shoucang" rel="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><notempty name="value['scid']">您已收藏<else />收藏专利</notempty></a>    			
				<?php endif?>
			 </div>
			 <?php }?>			
           </div>
          </div>
        </div>
	</div>
	</div>
    <?php endif?>
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">专利问答</div>
      <div class="col-xs-12 zldetail_allcontents"><script type="text/javascript">
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
		</script></div>
    </div>
  </div>
  
  <div class="thrfloor1">
   <?php if($data['buyinfo']['tmpa'] == '1'):?>
   	<div class="col-xs-12 shop_margin">
	<div class="col-xs-12 shop_titles">您浏览过的商标</div>
	<div class="col-xs-12 view_zldetail">
		<div class='rollphotostkk'>
          <div class='blk_29stkt_zlsczl blk_29stkt_zlscsb'>
            <div class='Cont' id='ISL_Cont_2'>
            <?php foreach ($data['readinfo'] as $key=>$value):?>
            <?php if($key<11):?>
              <div class="box">
				<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
				<p class="more_height"><span><?php echo $value['price']>0?$value['price']:'面议'?></span></p>
				<p class="more_height">【<?php echo mb_substr($value['name'],0,3,'utf-8')?>】<?php echo $value['title']?></p>
				<p class="fixed_height"><?php echo subtext($value['tmlimit'],35)?></p>
				<?php if($value['shop']):?>
       			<a href="javascript:void(0);" class="shop_list_shou sc" id="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏商标</a>
       			<a href="<?php echo U('shop/shop_list',array('shop'=>$value['shop']['id']))?>" class="shop_list_shou" title="<?php echo $value['shop']['name'].'旗舰店'?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 进入商城</a>
				<?php else:?>
				<a href="javascript:void(0);" class="shop_list_shous sc" id="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏商标</a>    			
				<?php endif?>
			  </div>
			  <?php endif?>
			  <?php endforeach;?>
            </div>
          </div>
        </div>
	</div>
	</div>
   <?php else:?>
   	<div class="col-xs-12 shop_margin">
	<div class="col-xs-12 shop_titles">您浏览过的专利</div>
	<div class="col-xs-12 view_zldetail">
		<div class='rollphotostkk'>
          <div class='blk_29stkt_zlsczl'>
            <div class='Cont' id='ISL_Cont_2'>
            <?php foreach ($data['readinfo'] as $key => $value){?>
			<?php if($key < 11){?>
              <div class="box">
				<a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
				<p class="more_height"><span><?php if($value['price'] > '0'){echo $value['price'];}else {echo '面议';}?></span></p>
        		<p class="more_height"><?php echo '【'.$value['tmtype'].'】';?><?php echo subtext($value['title'],10);?></p>
        		<p><?php echo $value['name']?></p>
       			<?php if($value['shop']):?>
       			<a href="javascript:void(0);" class="shop_list_shou shoucang" rel="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><notempty name="value['scid']">您已收藏<else />收藏专利</notempty></a>
       			<a href="<?php echo U('shop/shop_list',array('shop'=>$value['shop']['id']))?>" class="shop_list_shou" title="<?php echo $value['shop']['name'].'旗舰店'?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 进入商城</a>
				<?php else:?>
				<a href="javascript:void(0);" class="shop_list_shous shoucang" rel="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><notempty name="value['scid']">您已收藏<else />收藏专利</notempty></a>    			
				<?php endif?>
			</div>
			<?php }}?>
           </div>
         </div>
       </div>
	</div>
	</div>
   <?php endif?>
  </div>
  
  <!--专利-->
  <!--主体-->
  <!--底部-->
 <include file="Public/foot" />
  <!--底部-->
</div>
<script type='text/javascript'>
/*推荐*/

var scrollPic_01 = new ScrollPic();
		scrollPic_01.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_01.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_01.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_01.frameWidth     = 1200;//显示框宽度
		scrollPic_01.pageWidth      = 300; //翻页宽度
		scrollPic_01.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_01.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_01.autoPlay       = true; //自动播放
		scrollPic_01.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_01.initialize(); //初始化
		
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_2"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 1200;//显示框宽度
		scrollPic_02.pageWidth      = 300; //翻页宽度
		scrollPic_02.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化

/*推荐*/



/*加入购物车*/
$('.jrgwc').click(function(){
var id=$('#hids').attr('name');
var send_data={'id':id};
	$.post("a.php",send_data,function(data,ts){
		if(ts){
			alert('成功加入购物车');
		}
	})	
})
/*加入购物车*/


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
$('.zllist_remen_one:nth-child(5n)').css('margin-right','0');
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
/*更多*/
$('.more').toggle(function(){
$('#zlzls1').addClass('zlmores');
},function(){
$('#zlzls1').removeClass('zlmores');
})

/*更多*/
</script>
</body>
</html>
