<include file="Public/header" />
<include file="Public/header_nav_list" />
  <div class="thrfloor1">
    <div class="col-xs-12 zldetail_mianbiaoxie">
		当前位置：<a href="/" title="7号网" >7号网</a> » <a href="__APP__/patent/" title="专利市场">专利市场</a> » <a href="__APP__/patent/list{$data['ptinfo']['category']['id']}HTMLSUFFIX" title="<?php echo $data['ptinfo']['category']['name'];?>"><?php echo $data['ptinfo']['category']['name'];?></a>
    </div> 
	<!--左侧图-->

<div class="boxt">
	<div class="tb-booth tb-pic tb-s310">
		<img alt="<?php echo $data['ptinfo']['title'].'专利';?>" src="<?php $img = explode(',',$data['ptinfo']['img']); echo $img['0'];?>" class="jqzoom" />
	</div>
	<div class="tb-thumb">
	<ul  id="thumblist">
	<?php $img =  explode(',', $data['ptinfo']['img']); ?>
		<?php foreach ($img as $kye=>$value){?>
			<?php if($value):?>
		<li class="tb-selected">
		<p><span>∧</span></p>
		<div class="tb-pic tb-s40"><a href="javascript:void(0)"><img src="<?php echo $value;?>" mid="<?php echo $value;?>" ></a></div>
		</li>
			<?php endif;?>
		<?php }?>	
	</ul>
	<div class="zldetail_shoucan "><a href="javascript:void(0);" class="btn btn-default shoucang" rel="<?php echo $data['ptinfo']['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><notempty name="data['ptinfo']['scid']">您已收藏<else />收藏</notempty></a></div>
	</div>
</div>

<!--左侧图-->
<!--右侧内容-->
<div class="zldetail_sbdetailcon">
<div class="col-xs-12 zldetail_contitle">
<?php echo $data['ptinfo']['title'];?>
</div>
<p class="zldetail_xiaolimu_lts">所属行业：<span><?php echo $data['ptinfo']['category']['name'];?></span></p><p class="zldetail_xiaolimu_rts">专利类型：<span><?php echo $data['ptinfo']['tmtype'];?></span></p>
<p class="zldetail_xiaolimu_lts">专利/申请号：<span><?php echo $data['ptinfo']['tmno'];?></span></p><p class="zldetail_xiaolimut"><span>交易方式：</span><?php foreach ($data['ptinfo']['tmtradeway'] as $key => $value){?>
	<a><?php echo $value;?></a>
<?php }?></p>
<?php if($data['ptinfo']['tmregend']):?>
<p class="zldetail_xiaolimu_lts">有效期限：<span><?php echo $data['ptinfo']['tmregdate'];?>至<?php echo $data['ptinfo']['tmregend'];?></span></p>
<?php else:?>
<p class="zldetail_xiaolimu_lts">申请日期：<span><?php echo $data['ptinfo']['tmregdate'];?></span></p>
<?php endif?>
<p class="zldetail_xiaolimu_rts">所属国家/地区：<span><?php echo $data['ptinfo']['tmregarea']?C('ITEM_AREA_TYPE')[$data['ptinfo']['tmregarea']]:'中国大陆'?></span></p>
<div class="col-xs-12 zldetail_fwxmst">参考价：<span><?php echo $data['ptinfo']['price']>0?$data['ptinfo']['price']:'面议'; ?></span></div>

<div class="col-xs-12 zldetail_tijiaogm">
<?php if($data['ptinfo']['price'] > '0'){ ?>
	<a href="<?php echo U('/Index/Cart/add',['id'=>$data['ptinfo']['id']]); ?>"><button type="submit" class="gomais">立即购买</button></a>
	<button type="button" class="gomais gomaistk jrgwc" onclick="add_cart(<?php echo $data['ptinfo']['id']; ?>)">加入购物车</button>
<?php }else{?>
	<a class="buyerqq" data-qq="<?php echo $data['seller']['qq'];?>" href="javascript:void(0)"><button type="button" class="gomais">面议</button></a>
<?php }?>
	<!-- <a href="#" title="#" target="_blank" class="gomaist">详情</a> -->

</div>
<div class="bdsharebuttonbox here">
	<a href="#" class="bds_more" data-cmd="more"></a><a href="#"
		class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#"
		class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#"
		class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#"
		class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a
		href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<div class="zldetail-wxts">
温馨提示：7号网提供在线支付功能，您可选择7号网在线支付功能向交易相对方支付款项。如您选择其他方式自行与交易相对方支付款项的，由此产生的所有风险以及纠纷或损失等任何问题，由您自行承担，7号网概不承担任何责任。
</div>
</div>
<!--右侧内容-->
<!--专属经纪人-->
<div class="zldetail-jjren">
	<?php if($data['seller']['username'] == '7hip'){?>
	<div class="zldetail-jjren-top">
	<div class="zldetail-jjren-toptitle">
	专属经纪人
	</div>
		<div class="zldetail-jjren-topimg">
			<?php if($data['agent']['img']){?>
						<img src="<?php echo $data['agent']['img'];?>" />
					<?php }else {?>
						<img src="<?php echo STATIC_V2;?>images/jjrentu.jpg" />
					<?php }?>
		</div>
		<div class="zldetail-jjren-topcontent">
			<p>经纪人：<?php echo $data['agent']['name'];?> &nbsp;<a
							href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['agent']['qq'];?>&amp;site=qq&amp;menu=yes"
							target="_blank" rel="nofollow"><img
							src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言"
							alt="" onerror="this.src=images/qq-off.gif';"
							onload="if(this.width==77){this.src='images/qq-off.gif';}else if(this.width==23){this.src='images/qq.gif';}"
							align="absmiddle"></a>
			<p>手机：<?php if($data['agent']['mobile']){echo $data['agent']['mobile'];}else {echo '暂无';}?></p>
			<p>电话：<?php if($data['agent']['tel']){echo $data['agent']['tel'];}else {echo '暂无';}?></p>
			<p>邮件：<?php if($data['agent']['email']){echo $data['agent']['email'];}else {echo '暂无';}?></p>
		</div>
		<div class="zldetail-jjren-topjianjie">
		<?php if($data['agent']['about']):?>
		简介：<?php echo subtext($data['agent']['about'],15)?><a href="__APP__/brokerHTMLSUFFIX">更多</a>
		<?php else:?>
		简介：<?php echo '暂无'?>
		<?php endif?>
		</div>
	</div>
	<div class="zldetail-jjren-bottom" style="padding:60px;">
	该商品卖家已全权委托7号网处理，请直接联系经纪人。
	</div>
	<?php }else{?>
	<div class="zldetail-jjren-top">
	<div class="zldetail-jjren-toptitle">
	专属经纪人
	</div>
		<div class="zldetail-jjren-topimg">
			<?php if($data['agent']['img']){?>
						<img src="<?php echo $data['agent']['img'];?>" />
					<?php }else {?>
						<img src="<?php echo STATIC_V2;?>images/jjrentu.jpg" />
					<?php }?>
		</div>
		<div class="zldetail-jjren-topcontent">
			<p>经纪人：<?php echo $data['agent']['name'];?> &nbsp;<a
							href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['agent']['qq'];?>&amp;site=qq&amp;menu=yes"
							target="_blank" rel="nofollow"><img
							src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言"
							alt="" onerror="this.src=images/qq-off.gif';"
							onload="if(this.width==77){this.src='images/qq-off.gif';}else if(this.width==23){this.src='images/qq.gif';}"
							align="absmiddle"></a>
			<p>手机：<?php if($data['agent']['mobile']){echo $data['agent']['mobile'];}else {echo '暂无';}?></p>
			<p>电话：<?php if($data['agent']['tel']){echo $data['agent']['tel'];}else {echo '暂无';}?></p>
			<p>邮件：<?php if($data['agent']['email']){echo $data['agent']['email'];}else {echo '暂无';}?></p>
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
	<?php if($data['shop']){?>
		<div class="zldetail-jjren-toptitle">
			<?php echo $data['shop']['name'];?><?php echo strlen($data['shop']['name'])<24?'旗舰店':''?><a href="<?php echo U('Shop/shop_list',['shop'=>$data['shop']['id']]);?>" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>进入商城</a>
		</div>
	<?php }else{?>
		<div class="zldetail-jjren-toptitle">
			卖家
		</div>
	<?php }?>
		
		<div class="zldetail-jjren-topimg">
			<?php if($data['seller']['img']){?>
						<img src="<?php echo $data['seller']['img'];?>" />
					<?php }else {?>
						<img src="<?php echo STATIC_V2;?>images/jjrentu.jpg" />
					<?php }?>
		</div>
		<div class="zldetail-jjren-topcontent">
			<p>卖家：<?php echo $data['seller']['name'];?> &nbsp;<a
							href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $data['seller']['qq']?>&amp;site=qq&amp;menu=yes"
							target="_blank" rel="nofollow">
							<img src="<?php echo STATIC_V2;?>images/qq.gif" title="点击QQ交谈/留言" alt="" onerror="this.src=images/qq-off.gif';" onload="if(this.width==77){this.src='images/qq-off.gif';}else if(this.width==23){this.src='images/qq.gif';}" align="absmiddle"></a>
			<p>手机：<?php echo $data['seller']['mobile']?$data['seller']['mobile']:'暂无'?></p>
			<p>电话：<?php echo $data['seller']['tel']?$data['seller']['tel']:'暂无';?></p>
			<p>邮件：<?php echo $data['seller']['email']?$data['seller']['email']:'暂无'?></p>
		</div>
		<div class="zldetail-jjren-topjianjie">
		<?php if($data['seller']['about']):?>
		简介：<?php echo subtext($data['seller']['about'],15)?><a href="<?php echo U('Shop/shop_list',['shop'=>$data['shop']['id']]);?>">更多</a>
		<?php else:?>
		简介：<?php echo '暂无'?>
		<?php endif?>
		</div>
	</div>
	<?php }?>
</div>
<!--专属经纪人-->
   </div>
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">专利详情</div>
	  <div class="col-xs-12 zldetail_allcontent">
	  <?php if($data['ptinfo']['mastertype']):?>
	  <p><a>•</a><span>【专利权人类型】：</span><?php echo C('ITEM_MASTER_TYPE')[$data['ptinfo']['mastertype']]?></p>
	  <?php endif?>
	  <?php if($data['ptinfo']['master']):?>
	  <p><a>•</a><span>【专利权人】：</span><?php echo $data['ptinfo']['master']?></p>
	  <?php endif?>
	  <?php if($data['ptinfo']['tmcontent']):?>
	  <p><a>•</a><span>【摘要】：</span><?php echo $data['ptinfo']['tmcontent']?></p>
	  <?php endif?>
	  <?php if($data['ptinfo']['introduce']):?>
	  <p><a>•</a><span>【卖点展示】：</span><?php echo $data['ptinfo']['introduce']?></p>
	  <?php endif?>
	  </div>
    </div>
	<div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">专利交易流程</div>
	  <div class="col-xs-12 zldetail_allcontents">
		<b>第一步：</b> <span class="zldetail_allcontent">买家选定所需专利，点击"立即购买"（参考价商标可"议价"或"委托经纪人"）。</span><br />
		<b>第二步：</b> <span class="zldetail_allcontent">卖家确认专利可交易。</span><br />
		<b>第三步：</b> <span class="zldetail_allcontent">买家在线下单，网上确认交易合同，支付交易款项。</span><br />
		<b>第四步：</b> <span class="zldetail_allcontent">交易经纪人联系买卖双方签订《专利交易合同》、《转让协议》、《代理委托书》等文件。</span><br />
		<b>第五步：</b> <span class="zldetail_allcontent">我网向卖家支付50%定金，卖家收到定金后将相关文件资料一并寄到我网。</span><br />
		<b>第六步：</b> <span class="zldetail_allcontent">交易经纪人将双方签字的相关材料递交国家知识产权局办理国家转让手续。</span><br />
		<b>第七步：</b> <span class="zldetail_allcontent">国家专利局一个月左右下发《专利手续合同通知书》。</span><br />
		<b>第八步：</b> <span class="zldetail_allcontent">交易经纪人将《专利证》原件、《专利手续合格通知书》一并快递给买家，同时向卖家支付50%尾款，至此专利转让合同完成。</span><br />
	  </div>
    </div>
	<div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">安全保障</div>
	  <div class="col-xs-12 zldetail_allcontents">
		<b>保障一：</b> <span class="zldetail_allcontent">通过本平台交易的交易品，均由我网验证交易品的有效性。</span><br />
		<b>保障二：</b> <span class="zldetail_allcontent">通过本平台交易，均由我网核实并确保买卖双方身份信息真实有效。</span><br />
		<b>保障三：</b> <span class="zldetail_allcontent">通过本平台交易，均由我网专属律师事务所全程监督，确保所有交易合同及相关文件合法有效。</span><br />
		<b>保障四：</b> <span class="zldetail_allcontent">通过本平台交易，均由我网代收买家交易款项，代付卖家定金，卖家办理完商标公证，并经我网核实公证书的真实有效后，支付卖家尾款，全程资金代管，保障买卖双方资金安全。</span><br />
		<b>保障五：</b> <span class="zldetail_allcontent">通过本平台交易，均由我网代办国家手续，办理过程公开透明，进度随时查询，确保交易真实可靠。</span><br />
		<hr>
		<b>注意：</b><br/>
		<b>1.</b> <span class="zldetail_allcontent">7号网2.0版开通了商城互通功能，对于买卖双方不通过7号网自主进行的交易，我网均无法确保所有交易合同及相关文件合法有效，且对资金安全也不做保障。</span><br />
		<b>2.</b> <span class="zldetail_allcontent">对于买卖双方自主进行的交易，若由我网代收买家交易款项，7号网提供全程资金代管，并保障买卖双方资金安全。</span><br />
		<b>3.</b> <span class="zldetail_allcontent">自主交易的交易品将由卖家直接为买家提供售后服务，如对处理结果有异议，7号网鼓励买卖双方协商解决，如无法协商一致的，请直接“联系7号网客服”。</span><br />
		<b>4.</b> <span class="zldetail_allcontent">委托7号网代交易，按成交金额的10%收取服务费。</span><br />
	  </div>
    </div>
	<div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">专利问答</div>
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
  
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
	<div class="col-xs-12 shop_titles">您浏览过的专利</div>
	<div class="col-xs-12 view_zldetail">
		<div class='rollphotostkk'>
          <div class='blk_29stkt_zlsczl'>
            <div class='Cont' id='ISL_Cont_2'>
            <?php foreach ($data['readpt'] as $key => $value){?>
			<?php if($key < 11){?>
              <div class="box">
				<a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
				<p class="more_height"><span><?php if($value['price'] > '0'){echo $value['price'];}else {echo '面议';}?></span></p>
        		<p class="more_height"><?php echo '【'.$value['tmtype'].'】';?><?php echo subtext($value['title'],10);?></p>
        		<p><?php echo $value['category']['name']?></p>
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
  </div>
  
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
	<div class="col-xs-12 shop_titles">您可能感兴趣的专利</div>
	<div class="col-xs-12 view_zldetail" >
		<div class='rollphotostkk'>
          <div class='blk_29stkt_zlsczl'>
            <div class='Cont' id='ISL_Cont_1'>
            <?php foreach ($data['interest'] as $key => $value){?>
              <div class="box">
				<a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
				<p class="more_height"><span><?php if($value['price'] > '0'){echo $value['price'];}else {echo '面议';}?></span></p>
        		<p class="more_height"><?php echo '【'.$value['tmtype'].'】';?><?php echo subtext($value['title'],10);?></p>
       			<p><?php echo $value['category']['name']?></p>
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
  </div>
  <!--专利-->
 
  <!--主体-->
  <include file="Public/foot" />
</div>
<script type='text/javascript'>
$(document).ready(function(){
	sbindexfun();
});
$(function(){
	/*推荐*/
	var scrollPic_01 = new ScrollPic();
			scrollPic_01.scrollContId   = "ISL_Cont_1"; //内容容器ID
			scrollPic_01.arrLeftId      = "LeftArr";//左箭头ID
			scrollPic_01.arrRightId     = "RightArr"; //右箭头ID
			scrollPic_01.frameWidth     = 1200;//显示框宽度
			scrollPic_01.pageWidth      = 300; //翻页宽度
			scrollPic_01.speed          = 100; //移动速度(单位毫秒，越小越快)
			scrollPic_01.space          = 50; //每次移动像素(单位px，越大越快)
			scrollPic_01.autoPlay       = true; //自动播放
			scrollPic_01.autoPlayTime   = 5; //自动播放间隔时间(秒)
			scrollPic_01.initialize(); //初始化
			
	var scrollPic_02 = new ScrollPic();
			scrollPic_02.scrollContId   = "ISL_Cont_2"; //内容容器ID
			scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
			scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
			scrollPic_02.frameWidth     = 1200;//显示框宽度
			scrollPic_02.pageWidth      = 300; //翻页宽度
			scrollPic_02.speed          = 100; //移动速度(单位毫秒，越小越快)
			scrollPic_02.space          = 50; //每次移动像素(单位px，越大越快)
			scrollPic_02.autoPlay       = true; //自动播放
			scrollPic_02.autoPlayTime   = 5; //自动播放间隔时间(秒)
			scrollPic_02.initialize(); //初始化

	/*推荐*/
});

//收藏专利
$('.shoucang').live('click',function(){
	$this = $(this);
	var id = $this.attr('rel');
	$.post('<?php echo U('/Index/Index/favorite');?>',{'sid':id,'type':'2'},function(data){
		if(data.state==1){
			$.MsgBox.Alerta("温馨提示：",data.data,function(){
				$this.html('<span class="glyphicon glyphicon-star" aria-hidden="true"></span>您已收藏');
			});
		}else{
			$.MsgBox.Alert("温馨提示：",data.data);
		}
	})
})

$(function(){
	$("#thumblist li a").hover(function(){
		$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
		$(".jqzoom").attr('src',$(this).find("img").attr("mid"));
	});
});

$('.sc').live('click',function(){
	var id = $(this).attr('id');
	$.post('<?php echo U('/Index/Index/favorite');?>',{'sid':id,'type':'2'},function(data){
			$.MsgBox.Alert("温馨提示：",data.data);
		})
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
