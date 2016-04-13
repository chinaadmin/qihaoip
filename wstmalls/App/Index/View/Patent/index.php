<include file="Public/header" />
<include file="Public/header_nav" />
<!--分类与banner
  <div class="thrfloor1">
    <div class="col-xs-12 shop_contents">
      <div class="col-xs-2 shop_contents_one">
        <div class="goods_shop">
          
        </div>
      </div>-->
    
      <div class="col-xs-8 shop_contents_two">
        <div class="flexslider">
          <ul class="slides">
          <?php foreach ($data['banner'] as $value){?>
            <li style="background:url(<?php echo $value['img'];?>) 50% 0 no-repeat;"><a href="<?php echo $value['link'];?>" title="<?php echo $value['name'];?>" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png"  alt="<?php echo $value['name'];?>" width="100%" height="430"></a></li>
          <?php }?>
           </ul>
        </div>
      </div>
      <div class="col-xs-2 shop_contents_three">
		<div class="col-xs-12 sbandzls sbandzls_index">
          <div class="col-xs-12 sbandzl sbandzl_index">
            <div class="col-xs-12 shop_zlimg change_img1"> <a href="<?php echo U('Zlgj/Index/index')?>"><img src="<?php echo STATIC_V2;?>images/shop_right_zl1.jpg"/></a> </div>
          </div>
          <div class="col-xs-12 shop_zishun shop_zishun_index">
            <div class="col-xs-12 fborqg"> <a href="<?php echo U('member/seller/releasegoods');?>" > 我要发布</a><a href="<?php echo U('member/buyer/supply_add');?>" > 我要求购</a> </div>
            <div class="col-xs-12 zishunimg"> <img src="<?php echo STATIC_V2;?>images/zl_indeximg.jpg"/><br/>
              <a href="__APP__/broker/" class="btn btn-warning zishuntitle">咨询经纪人</a> 
            </div>
          </div>
        </div>
        
		 <div class="col-xs-12 zlsc_index">
		  <div class="col-xs-12 zlsc_index_top">
		  <ul>
		  <!-- <li class="zlsc_index_top_ons"><a href="javascript:void(0)" >案例</a></li> -->
		  <li><a href="javascript:void(0)">专利百科</a></li>
		  </ul>
		  </div>
		<!--   <div class="col-xs-12 zlsc_index_bottom" id="zlsc_index_bottom0">
		  <ul>
		  <li><a href="#">光专利年费减缓光专...</a></li>
		  <li><a href="#">光专利年费减缓光专...</a></li>
		  <li><a href="#">光专利年费减缓光专...</a></li>
		  <li><a href="#">光专利年费减缓光专...</a></li>
		  </ul>
		  </div> -->
		  <div class="col-xs-12 zlsc_index_bottom " id="zlsc_index_bottom1">
		  <ul>
		  <?php foreach ($data['zlbk'] as $key=>$value):?>
		  	<li><a href="__APP__/news/<?php echo $value['date'];?>/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>"><?php echo subtext($value['title'],11)?></a></li>
		  <?php endforeach;?>
		  </ul>
		  </div>
		 </div>
		 
      </div>
    </div>
  </div>
  <!--分类与banner-->

<!--专利求购与特惠专区-->
<div class="thrfloor1">
<div class="col-xs-12 shop_margin">
<div class="col-xs-6 zlsc_index_left">
<div class="col-xs-12 shop_titles">特惠专区 <a href="__APP__/patent/price/">更多>></a></div>
<div class="col-xs-12 zlsc_qugolist">

<div class="scrollboxs">	
    <div id="scrollDivst">
        <ul>
        <?php foreach ($data['oneprice'] as $value){?>
            <li><img src="<?php echo STATIC_V2;?>images/sale_img.jpg"/> &nbsp;<a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>" target="_blank" ><?php echo '【'.C('ITEM_PA_TYPE')[$value['tmtype']].'】';?><?php echo $value['title'];?></a><a class="maibu">有效期到<?php echo $value['tmregend']?></a></li>
        <?php }?>	
        </ul>
    </div>
</div>

</div>

</div>
<div class="col-xs-6 zlsc_index_right">
<div class="col-xs-12 zlsc_index_right_padding">
<div class="col-xs-12 shop_titles">专利求购 <a href="<?php echo U('buy/show_list',array('t'=>2));?>">更多>></a></div>
<div class="col-xs-12 zlsc_qugous">
<?php foreach ($data['sell'] as $value){?>
	<div class="col-xs-6 zlsc_qugous_one">
		<p><?php echo msubstr($value['name'],0,20);?></p>
		<p><a href="<?php echo U('Buy/detail',array('uid'=>$value['uid']));?>" title="<?php echo $value['title'];?>" target="_blank"><?php echo msubstr($value['title'],0,20)?></a></p>
		<p class="qugous_color"><?php echo $value['pricemax']>0?'￥'.$value['pricemax']:'面议'?></p>
		<a href="<?php echo U('Buy/detail',array('uid'=>$value['uid']));?>" rel="nofollow" target="_blank" class="btn btn-default">我来卖</a>
	</div>
<?php }?>

</div>
</div>
</div>
</div>
<div class="col-xs-12 thrguangao"><a href="<?php echo $data['wad'][0]['link']?>" title="<?php echo $data['wad'][0]['name']?>"><img src="<?php echo $data['wad'][0]['img']?>" alt="<?php echo $data['wad'][0]['name']?>"/></a></div>
</div>
<!--专利求购与特惠专区-->
<!--明星旗舰店-->

<div class="thrfloor1">
<div class="col-xs-12 shop_margin">
<div class="col-xs-12 shop_titles">知产包<a href="__APP__/ipbag/">更多>></a></div>
<div class="zlsc_index_gudous">

<div class='rollphotostkk'>
  <div class='blk_29stkt_zlsc'>
   <div class='Cont' id='ISL_Cont_1'>
   <volist name="data['zcb']" id="vo">
    <div class="box">
		<a href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}"><img src="{$vo['smallimg']}" alt="{$vo['title']}"/></a>
		<p>{$vo['title']}</p>
		<a href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" class="shop_chakan">查看详情</a><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq']?$value['qq']:21556911;?>&site=qq&menu=yes" target="_blank" class="shop_chakan shop_ljzx">立即咨询</a>
	</div>
	</volist>
   </div>
  </div>
</div>

</div>
</div>
<div class="col-xs-12 thrguangao"><a href="<?php echo $data['wad'][1]['link']?>" title="<?php echo $data['wad'][1]['name']?>"><img src="<?php echo $data['wad'][1]['img']?>" alt="<?php echo $data['wad'][1]['name']?>"/></a></div>
</div>
<!--明星旗舰店-->
   <!--专利-->
<div class="thrfloor1">
<div class="col-xs-12">
<div class="col-xs-12 shop_margin">
<div class="col-xs-12 shop_titles">热门行业专区 <a href="<?php echo U('patent/show_list');?>">更多>></a></div>

<?php foreach ($data['items'] as $key=>$value):?>
<!--floor1-->
<div class="col-xs-12 zlsc_hot">
	<div class="zlsc_zhuanqu_img">
		<div class="zlsc_zhuanqu_img_title1" style="background:url(<?php echo $value['adimg']?>) no-repeat top center;">
			<?php echo $value['name']?>
		</div>
		<div class="col-xs-12 zlsc_zhuanqu_imgs" >
			<a href="<?php echo $value['bgimg']['link']?>" title="<?php echo $value['bgimg']['name']?>"><img src="<?php echo $value['bgimg']['img']?>" alt="<?php echo $value['bgimg']['name']?>"/></a>
			<div class="zlsc_libielist">
				<ul>
				<?php foreach ($value['next'] as $k=>$v):?>
					<li><a href="<?php echo U('patent/list'.$v["id"].'')?>" class="btn btn-default"><?php echo subtext($v['name'],5)?></a></li>
				<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<div class="zlsc_zhuanqu_content">
	<?php foreach ($value['item'] as $k=>$v):?>
		<div class="zlsc_zhuanqu_content_one">
			<a href="__APP__/patent/<?php echo $v['id'];?>HTMLSUFFIX" title="<?php echo $v['title']?>专利转让"><img src="<?php $img = explode(',',$v['img']);echo $img[0]?>" alt="<?php echo $v['title']?>专利转让"/></a>
			<p class="more_height more_heights"><span><?php echo $v['price']>0?$v['price']:'面议'?></span></p>
			<p class="more_height"><a href="__APP__/patent/<?php echo $v['id'];?>HTMLSUFFIX"><?php echo '【'.C('ITEM_PA_TYPE')[$v['tmtype']].'】';?><?php echo subtext($v['title'],8);?></a></p>
			<p><?php echo $value['name']?></p>
		</div>
	<?php endforeach;?>
	</div>
</div>
<!--floor1-->
<?php endforeach;?>

<div class="col-xs-12 thrguangao"><a href="<?php echo $data['wad'][2]['link']?>" title="<?php echo $data['wad'][2]['name']?>"><img src="<?php echo $data['wad'][2]['img']?>" alt="<?php echo $data['wad'][2]['name']?>"/></a></div>
</div>
</div>
</div>
  <!--专利-->
<div class="thrfloor1">
<div class="col-xs-12 shop_margin">
<div class="col-xs-12 zlsc_gwzl">
<div class="col-xs-12 shop_titles">国外专利 <a href="__APP__/patent/foreign/">更多>></div>
<div class="col-xs-12 zlsc_gwzl_content">

<div class="mod-main-c" >       
        <!-- mod-main-c轮播 -->
        <div id="switchimg1" class="focusBox slidetoleft">
          <ul class="bd">
          <?php foreach ($data['gjitem'] as $key=>$value):?>
            <li>
              	<a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title']?>专利转让"><img src="<?php $img = explode(',',$value['img']);echo $img[0]?>" alt="<?php echo $value['title']?>专利转让"/></a>
				<p class="more_height more_heights"><span><?php echo $value['price']>0?$value['price']:'面议'?></span></p>
				<p class="more_height"><a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><?php echo '【'.C('ITEM_PA_TYPE')[$v['tmtype']].'】';?><?php echo subtext($value['title'],8);?>.</a></p>
				<p><?php echo $value['name']?></p>
             </li>
           <?php endforeach;?>
          </ul>
          <a class="prev" href="javascript:void(0)"></a> <a class="next" href="javascript:void(0)"></a>
        </div>
        <!--mod-main-c轮播 end/-->
    </div>

</div>
</div>
</div>
</div>
  <!--主体-->

<include file="Public/footlink_new" />
</div>
<script type='text/javascript'>
$(document).ready(function(){
	sbindexfun();
});
$(function(){
	/*mod-main-c轮播*/
	$("#switchimg1").unbind('mouseenter').unbind('mouseleave');
	$("#switchimg1").slide({effect:"leftLoop",vis:5,autoPlay:true, delayTime:800, trigger:"click",easing:"easeInOutExpo"});  
});
/*推荐*/

var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
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
/*分类显示切换*/
$('.goods_shopt a').click(function(){
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
$("#scrollDivst").Scroll({line:1,speed:550,timer:3000,up:"but_up",down:"but_down"});
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
/* $('.zlsc_index_top li').click(function(){
var tt=$(this).index();
$("div[id*='zlsc_index_bottom']").css('display','none');
$("#zlsc_index_bottom"+tt).css('display','block');
$('.zlsc_index_top li').removeClass('zlsc_index_top_ons');
$(this).addClass('zlsc_index_top_ons');
})
 */
</script>
</body>
</html>
