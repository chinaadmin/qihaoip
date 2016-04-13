<include file="Public/header" />
<include file="Public/header_nav_list"/>
  <!--导航-->
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 zt_titles">
        <ul>
          <li><a href="<?php echo U('special/topic')?>" <?php echo $data['catid']=='154'?'class="zt_titles_ons"':''?>>专题</a></li>
          <li><a href="<?php echo U('special/activity')?>" <?php echo $data['catid']=='155'?'class="zt_titles_ons"':''?>>活动</a></li>
        </ul>
      </div>
      <div class="col-xs-12 zt_list_content" id="zt_list_content0">
      <?php foreach ($data['content'] as $key => $value):?>
        <div class="zt_list_content_one"> 
		  <a href="<?php echo $value['link'];?>"><img src="<?php echo $value['img'];?>" /></a>
		  <h2><a href="<?php echo $value['link'];?>"><?php echo $value['name'];?></a></h2>
          <p><?php echo msubstr(strip_tags($value['about']),0,40);?></p>
        </div>
        <?php endforeach;?>
       <?php echo $data['page'];?>
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

/*专题与活动切换
$('.zt_titles li').click(function(){
var tt=$(this).index();
$("div[id*='zt_list_content']").css('display','none');
$("#zt_list_content"+tt).css('display','block');
$('.zt_titles li a').removeClass('zt_titles_ons');
$(this).find("a").addClass('zt_titles_ons');
})
专题与活动切换*/
</script>
</body>
</html>
