<include file="Public/header" />
  <!--banner-->
  <div class="kuang gao3 thrshangchengao">
    <div class="flexslider">
      <ul class="slides">
      <?php if($data['ad']['1']):?>
      	<?php $i=0; foreach ($data['ad']['1'] as $key=>$value):?>
        <?php if($value['state']==3):?>
         <li style="background:url(<?php echo $value['img']?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>"  target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
        <?php else:?>
        	<?php $i++;?>
        	<?php if(count($data['ad']['1'])==$i||!$data['ad']['1']):?>
        		<li style="background:url(<?php echo STATIC_V2.'images/green1.jpg'?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
        	<?php endif;?>
        <?php endif?>
        <?php endforeach;?>
        <?php else:?>
       	    <li style="background:url(<?php echo STATIC_V2.'images/green1.jpg'?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
         <?php endif?>
       </ul>
    </div>
  </div>
  <!--banner-->
  <!--主体-->
  <!--4F 日化产品-->
  <div class="thrwid shop_index">
    <div class="thrfloor1 shopindex_con">
      <div class="shop_logo"> <a href="<?php echo U('Index/shop/shop_list',array('id'=>$data['shop_re']['id']))?>"><img src="<?php echo $data['shop_re']['logo']?$data['shop_re']['logo']:STATIC_V2.'images/logo_default.jpg'?>"/></a> </div>
      <div class="shop_title"><?php echo $data['shop_re']['name']?>旗舰店</div>
      <div class="shop_search">
        <form action="<?php echo U('search/index')?>" method="get">
          <input type="text" name="name" class="bdsearch" />
          <input type="hidden" name="type" value='3'/>
          <input type="hidden" name="shop" value="<?php echo $data['shop_id'];?>" />
          <button type="submit" class="tijiaosearch">| 搜本店</button>
        </form>
      </div>
      <div class="shop_mbx"> 当前位置：<a href="/">7号网</a> » <a href="/shop/" >商城首页</a> » <a><?php echo $data['shop_re']['name']?>旗舰店</a> </div>
    </div>
  </div>
   <?php if($data['trade']):?>
  <!--商标-->
  <div class="thrfloor1">
    <div class="col-xs-12 thrsbscst">
      <div class="col-xs-12 shopsb_tit"><b>商标</b><span><a href="<?php create_url('shop',array('shop'=>$data['shop_id']))?>">更多>> </a></span></div>
      <div class="col-xs-12 shopsb_con">
      <div class="col-xs-3 shopsb_img moban_img">
          <div class="www51buycom_moban">
            <ul class="51buypic">
            <?php if($data['ad']['2']):?>
             <?php $i=0; foreach ($data['ad']['2'] as $key=>$value):?>
        	 <?php if($value['state']==3):?>
              <li><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo $value['img']?>" /></a></li>
             <?php else:?>
	        	<?php $i++;?>
	        	<?php if(count($data['ad']['2'])==$i||!$data['ad']['2']):?>
	        		 <li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/green2.jpg'?>" /></a></li>
	        	<?php endif;?>
	        <?php endif?>
       	     <?php endforeach;?>
       	     <?php else:?>
       	     	<li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/green2.jpg'?>" /></a></li>
	        <?php endif?>
            </ul>
            <div class="num">
              <ul>
              </ul>
            </div>
        </div>
      </div>
       <?php foreach ($data['trade'] as $key => $value):?>
        <div class="col-xs-3 shop_one">
        <a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
          <p>商标名：<?php echo msubstr($value['title'],0,13);?></p>
          <p>注册号：<?php echo $value['tmno']?></p>
          <p>类别：<?php echo $value['items']['name']?></p>
          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
        </div>
        <?php endforeach;?>
      </div>
      <div class="col-xs-12 thrguangao"> <img src="<?php echo $data['ad']['3']['state']==3&&$data['ad']['3']?$data['ad']['3']['img']:STATIC_V2.'images/green3.jpg'?>"/> </div>
    </div>
  </div>
  <!--商标-->
  <?php endif;?>
   <?php if($data['pant']):?>
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 thrsbscst">
      <div class="col-xs-12 shopsb_tit"><b>专利</b><span><a href="#" title="#">更多>> </a></span></div>
      <div class="col-xs-12 shopsb_con">
        <div class="col-xs-3 shopsb_img moban_img">
          <div class="www51buycom_moban1">
            <ul class="51buypic">
            <?php if($data['ad']['4']):?>
             <?php $i=0; foreach ($data['ad']['4'] as $key=>$value):?>
        	 <?php if($value['state']==3):?>
             <li><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo $value['img']?>" /></a></li>
              <?php else:?>
	        	<?php $i++;?>
	        	<?php if(count($data['ad']['4'])==$i||!$data['ad']['4']):?>
	        		 <li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/green4.jpg'?>" /></a></li>
	        	<?php endif;?>
	        <?php endif?>
       	     <?php endforeach;?>
       	      <?php else:?>
       	     	<li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/green4.jpg'?>" /></a></li>
       	     <?php endif?>
            </ul>
            <div class="num">
              <ul>
              </ul>
            </div>
          </div>
        </div>
         <?php foreach ($data['pant'] as $key => $value):?>
        <div class="col-xs-3 shop_one"> <a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
          <p>专利：<?php echo msubstr($value['title'],0,13);?></p>
          <p>专利号：<?php echo $value['tmno']?></p>
          <p>行业：<?php echo $value['items']['name']?></p>
          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
        </div>
        <?php endforeach;?>
      </div>
      <div class="col-xs-12 thrguangao"> <img src="<?php echo $data['ad']['5']['state']==3&&$data['ad']['5']?$data['ad']['5']['img']:STATIC_V2.'images/green5.jpg'?>"/> </div>
    </div>
  </div>
  <!--专利-->
   <?php endif;?>
   <?php if($data['tj']):?>
  <!--精品专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 thrsbscst">
      <div class="col-xs-12 shopsb_tit"><b>特别推荐</b></div>
      <div class="col-xs-12 shopsb_con">
     	 <?php foreach ($data['tj'] as $key => $value):?>
        		<?php if($value['tmpa']==1):?>
        			<div class="col-xs-3 shop_one"> <a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
			          <p>商标名：<?php echo msubstr($value['title'],0,13);?></p>
			          <p>注册号：<?php echo $value['tmno']?></p>
			          <p>类别：<?php echo $value['items']['name']?></p>
			          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
			        </div>
        		<?php else:?>
        		<div class="col-xs-3 shop_one"> <a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
		          <p>专利：<?php echo msubstr($value['title'],0,13);?></p>
		          <p>专利号：<?php echo $value['tmno']?></p>
		          <p>行业：<?php echo $value['items']['name']?></p>
		          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
		        </div>
        		<?php endif?>
              <?php endforeach;?>
       
      </div>
    </div>
  </div>
  <!--精品专利-->
   <?php endif;?>
  <!--主体-->
 <!--客服-->
  <div class="kefu"> <a href="javascript:;"><img src="<?php echo STATIC_V2;?>images/kefu.png"/></a> </div>
  <div class="shop_qq">
    <div class="shop_qq_title"><?php echo $data['shop_re']['name']?><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </div>
    <div class="shop_qq_rule">
      <p>联系电话</p>
      <p><?php echo $data['shop_re']['phone']?></p>
    </div>
    <div class="shop_qq_con">
    <?php foreach ($data['shop_re']['kfinfo'] as $key=>$value):?>
    <?php if($value['qqchkshow']==1):?>
      <p> <a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq']?>&site=qq&menu=yes" target="_blank"> <img src="http://wpa.qq.com/pa?p=1:800020304:51"><?php echo $value['qqname']?></a></p>
    <?php endif;?>
    <?php endforeach;?>
    </div>
    <div class="shop_qq_rule">
      <p>工作时间</p>
       <?php foreach ($data['shop_re']['worktime'] as $key=>$value):?>
       <?php if($value['workshow']==1):?>
      <p><?php echo $value['wsta']?>至<?php echo $value['wend']?>:<?php echo $value['tsta']?>-<?php echo $value['tend']?></p>
      <?php endif;?>
      <?php endforeach;?>
    </div>
  </div>
  <!--客服-->
  
  
  <!--底部-->
<div class="thrwid bottom bottom_bg">
<div class="thrbottom">
<div class="col-xs-12 indwx_fuwu">
	<div class="col-xs-2 index_fuwus"><a href="http://wpa.qq.com/msgrd?v=3&uin=21556911&site=qq&menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/index_dianhua.png"/></a></div>
	<div class="col-xs-10 index_content">
		<div class="col-xs-2 index_fuwust">
			<h2>深圳运营中心</h2>
			<p>地址：深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312</p>
		</div>
		<div class="col-xs-2 index_fuwust">
			<h2>北京运营中心</h2>
			<p>地址：北京市朝阳区望京园602号楼23层2709室</p>
		</div>
		<div class="col-xs-2 index_fuwust">
			<h2>长沙运营中心</h2>
			<p>地址：长沙市开福区湘江中路万达广场B座7层</p>
		</div>
		<div class="col-xs-2 index_fuwust">
			<h2>武汉运营中心</h2>
			<p>地址：武汉市东湖新技术开发区光谷大道62号光谷总部国际1栋2307</p>
		</div>
	</div>
</div>
<div class="col-xs-12 index_fs">
<img src="<?php echo STATIC_V2;?>images/index_fs.png"/>
</div>

</div>
</div>
<div class="thrwid gao8 bottom_last">
<div class="thrbottoms index_border">
<div class="col-xs-1 help index_help">
<dl>
<dt>新手上路</dt>
<?php foreach ($data['help']['class'][0]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>在线交易</dt>
<?php foreach ($data['help']['class'][1]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>特色服务</dt>
<?php foreach ($data['help']['class'][2]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>帮助中心</dt>
<?php foreach ($data['help']['class'][3]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>关注我们</dt>
<?php foreach ($data['help']['class'][4]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
</div>
<div class="thrbottoms">
<div class="col-xs-8 dizhi">
<p><a href="__APP__/news/20151125/1021.html" rel="nofollow" target="_blank">关于7号网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/news/20150508/1121HTMLSUFFIX" rel="nofollow" target="_blank">官方微信</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://weibo.com/7hip"  rel="nofollow" target="_blank">官方微博</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/siteMap/" target="_blank">网站地图</a></p>
<p><?php echo htmlspecialchars_decode($data['siteInfo']['web_copyright']); ?><?php echo $data['siteInfo']['web_icp']; ?></p>
<p>
	客服热线：<?php echo $data['siteInfo']['web_400']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：<?php echo $data['siteInfo']['web_addr'];?>
	&nbsp;&nbsp;
	<!-- cnzz站长统计  --> 
	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255557615'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1255557615%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></p>
</div>
<div class="col-xs-2 weixin">
<img src="<?php echo STATIC_V2;?>images/weixin.jpg"/><br/>关注7号网微信
</div>
<div class="col-xs-2 weibo">
<a href="http://weibo.com/7hip" rel="nofollow" target="_blank" >+关注</a>
</div>
</div>
</div>
</div>
</div>
<!--底部-->
</div>

<!--底部-->
<script type='text/javascript'>
/*客服*/
$('.kefu a').click(function(){
$('.shop_qq').show("slow");
$('.kefu').css('display','none');
})
$('.shop_qq_title span').click(function(){
$('.shop_qq').css('display','none');
$('.kefu').show("slow");
})
/*客服*/

/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/

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
