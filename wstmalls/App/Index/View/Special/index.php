<include file="Public/header" />
<include file="Public/header_nav_list"/>
  <!--导航-->
  <div class="thrfloor1">
    <div class="col-xs-12">
      <div class="flexslider" style="margin-top:5px; ">
        <ul class="slides">
        <?php foreach ($data['banner'] as $value){?>
          <li style="background:url(<?php echo $value['img'];?>) 50% 0 no-repeat;"><a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><img alt="<?php echo $value['name'];?>" src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
        <?php }?>  
          </ul>
      </div>
    </div>
  </div>
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">专题 <a href="__APP__/special/topic/">更多>></a></div>
      <div class="col-xs-12 zllist-new-list">
      <?php foreach ($data['zt'] as $key => $value){?>
      <?php if($key < 2){?>
        <div class="zllist-new-list-left">
	        <a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><img src="<?php echo $value['img'];?>" alt="<?php echo $value['name'];?>" /></a>
	        <a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><?php echo msubstr(strip_tags($value['name']),0,20);?></a>
        </div>
       <?php }}?> 
        
        <div class="zllist-new-list-right">
        <?php foreach ($data['zt'] as $key => $value){?>
			<?php if($key >= 2 ){?>
          <div class="col-xs-12 zhichan-news-left-lt"> <img src="<?php echo $value['img'];?>" alt="<?php echo $value['name'];?>" />
            <div class="ztlist-new-left-con">
              <div class="col-xs-12 fagui-content-jianjie news-size">
                <h2><a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><?php echo msubstr(strip_tags($value['name']),0,20);?></a></h2>
                <div class="col-xs-12 fagui-content-jianjies">
                <?php if($value['about']):?>
                <?php echo msubstr(strip_tags($value['about']),0,50);?>
                <a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>">详细</a>
                <?php endif?>
                </div>
              </div>
            </div>
          </div>
       <?php }}?>
        </div>
      </div>
    </div>
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">活动 <a href="__APP__/special/activity/">更多>></a></div>
      <div class="col-xs-12 zllist-new-list">
       <?php foreach ($data['hd'] as $key => $value){?>
      <?php if($key < 2){?>
        <div class="zllist-new-list-left">
	        <a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><img src="<?php echo $value['img'];?>" alt="<?php echo $value['name'];?>" /></a>
	        <a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><?php echo msubstr(strip_tags($value['name']),0,20);?></a>
        </div>
       <?php }}?> 
        
        <div class="zllist-new-list-right">
        <?php foreach ($data['hd'] as $key => $value){?>
			<?php if($key >= 2 ){?>
          <div class="col-xs-12 zhichan-news-left-lt"> <img src="<?php echo $value['img'];?>" alt="<?php echo $value['name'];?>" />
            <div class="ztlist-new-left-con">
              <div class="col-xs-12 fagui-content-jianjie news-size">
                <h2><a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><?php echo msubstr(strip_tags($value['name']),0,20);?></a></h2>
                <div class="col-xs-12 fagui-content-jianjies">
                <?php if($value['about']):?>
                <?php echo msubstr(strip_tags($value['about']),0,50);?>
                <a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>">详细</a>
                <?php endif?>
                </div>
              </div>
            </div>
          </div>
       <?php }}?>
        </div>
      </div>
    </div>
  </div>
  <!--专利-->
  <!--主体-->
  <!--底部-->
   <include file="Public/foot" />
  <!--底部-->
</div>
<script type='text/javascript'>
/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/
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
