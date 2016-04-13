<include file="Public/header" />
<!--分类与banner-->
  <include file="Public/header_nav" />
      <div class="col-xs-8 shop_contents_two">
        <div class="flexslider">
          <ul class="slides">
          <?php foreach ($data['banner'] as $key=>$value):?>
            <li style="background:url(<?php echo $value['img']?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>" title="<?php echo $value['name']?>" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" alt="<?php echo $value['name']?>" width="100%" height="430"></a></li>
          <?php endforeach;?>
          </ul>
        </div>
      </div>
      <div class="col-xs-2 shop_contents_three">

		<div class="col-xs-12 sbandzls sbandzls_index">
          <div class="col-xs-12 sbandzl sbandzl_index">
            
            <div class="col-xs-12 shop_zlimg change_img1"> <a href="<?php echo U('Trade/Index/index')?>"><img src="<?php echo STATIC_V2;?>images/shop_right_sb1.jpg"/></a> </div>
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
		  <li><a href="javascript:">商标百科</a></li>
		  </ul>
		  </div>
		  <div class="col-xs-12 zlsc_index_bottom id="zlsc_index_bottom1">
		  <ul>
		 <?php foreach ($data['sbbk'] as $key=>$value):?>
		  	<li><a href="__APP__/news/<?php echo $value['date'];?>/<?php echo $value['id'];?>HTMLSUFFIX"><?php echo subtext($value['title'],11)?></a></li>
		  <?php endforeach;?>
		  </ul>
		  </div>
		 </div>
      </div>
    </div>
  </div>
  <!--分类与banner-->
   


<!--推荐商标-->

<div class="thrfloor1">
<div class="col-xs-12 shop_margin">
<div class="col-xs-12 ">
<div class="col-xs-12 shop_titles">推荐商标 <a href="__APP__/trademark/fine/">更多>></a></div>
<div class="col-xs-12 zlsc_gwzl_content">

<div class="mod-main-c" >       
<!-- mod-main-c轮播 -->
	<div id="switchimg1" class="focusBox slidetoleft">
		<ul class="bd">
		<?php foreach ($data['trade_fine'] as $key=>$value):?>
			<li>
				<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>商标转让"><img src="<?php $img = explode(',',$value['img']);echo $img[0]?>" alt="<?php echo $value['title'];?>商标转让"/></a>
				<p class="more_height "><span><?php echo $value['price']>0?'￥'.$value['price']:'面议'?></span></p>
				<p class="more_height"><a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>商标转让">【<?php echo mb_substr($value['name'],0,3,'utf-8')?>】<?php echo subtext($value['title'],12)?></a></p>
				<p><?php echo subtext($value['tmlimit'],32)?></p>
			</li>   
		<?php endforeach;?>
		</ul>
		<a class="prev" href="javascript:void(0)"></a> <a class="next" href="javascript:void(0)"></a>
	</div>
<!--mod-main-c轮播 end/-->
</div>

</div>
<div class="col-xs-12 thrguangao"><a href="<?php echo $data['tgav'][0]['link']?>" title="<?php echo $data['tgav'][0]['name']?>"><img src="<?php echo $data['tgav'][0]['img']?>" alt="<?php echo $data['tgav'][0]['name']?>"/></a></div>
</div>
</div>
</div>
<!--推荐商标11-->
<!--特惠专区-->
<div class="thrfloor1">
	<div class="col-xs-12 shop_margin">
	<div class="col-xs-12 shop_titles">特惠专区<a href="__APP__/trademark/price/">更多>></a></div>
		<div class="col-xs-12 scindex_th">
		<?php foreach ($data['trade_price'] as $key=>$value):?>
			<div class="col-xs-3 scindex_th_one">
				<div class="scindex_th_oneimg">
					<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title']?>商标转让"><img src="<?php $img = explode(',',$value['img']);echo $img[0]?>" alt="<?php echo $value['title']?>商标转让"/></a>
				</div>
				<div class="scindex_th_onecon">
					<p><span><?php echo $value['price']>0?'￥'.$value['price']:'面议'?></span></p>
					<p>【<?php echo mb_substr($value['name'],0,3,'utf-8')?>】<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title']?>商标转让"><?php echo subtext($value['title'],10)?></a></p>
					<p class="p_color"><?php echo subtext($value['tmlimit'],15)?></p>
				</div>
			</div>
		<?php endforeach;?>
		</div>
	</div>
</div>
<!--特惠专区-->

<!--知产包与特惠专区-->
<div class="thrfloor1">
<div class="col-xs-12 shop_margin">
<div class="col-xs-7 shop_zcb sb_zcb">
<div class="col-xs-12 shop_titles">商城展示 <a href="__APP__/shop/">更多>></a></div>
<div class="col-xs-12 shop_zcb_content shop_zcb_contentss">

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
<div class="col-xs-5 shop_tehui">
<div class="col-xs-12 shop_tehui_list sb_tehui_list">
<div class="col-xs-12 shop_titles">商标求购 <a href="<?php echo U('buy/show_list',array('t'=>1));?>">更多>></a></div>
<div class="col-xs-12 shop_qugolist shop_qugolistss">

<div class="scrollboxs">	
    <div id="scrollDivss">
        <ul>
        	<?php foreach ($data['supply'] as $key=>$value):?>
            <li><span class="span_color"><?php $value['pricemax']>0?'￥'.$value['price']:'面议'?></span> &nbsp;<a href="<?php echo U('buy/detail',['uid'=>$value['uid']]);?>" title="<?php echo $value['title'];?>">【<?php echo mb_substr($value['name'],0,3,'utf-8')?>】<?php echo $value['title']?></a><a href="<?php echo U('buy/detail',['uid'=>$value['uid']]);?>" class="btn btn-default wo_mai">我来卖</a></li>
        	<?php endforeach;?>
        </ul>
    </div>
</div>

</div>
</div>
</div>
</div>
<div class="col-xs-12 thrguangao"><a href="<?php echo $data['tgav'][1]['link']?>" title="<?php echo $data['tgav'][1]['name']?>"><img src="<?php echo $data['tgav'][1]['img']?>" alt="<?php echo $data['tgav'][1]['name']?>"/></a></div>
</div>
<!--知产包与特惠专区-->
<div class="thrfloor1">
<div class="col-xs-12">
<div class="col-xs-12 shop_margin">
<div class="col-xs-12 shop_titles shop_titles_ul"><span>热门行业专区</span>
	<ul>
	<?php foreach ($data['trade'] as $key=>$value):?>
		<li><a href="javascript:" <?php echo $key?'':'class="shop_titles_libieons"'?>><?php echo $value['name']?></a></li>
	<?php endforeach;?>
	</ul>
	<a href="<?php echo U('trademark/type')?>">更多>></a>
</div>
<!--floor1-->
<?php foreach ($data['trade'] as $key=>$value):?>
<div class="col-xs-12 <?php echo $key?'zlsc_hot1':'zlsc_hot'?>" id="<?php echO 'zlsc_hot'.$key?>">
	<div class="zlsc_zhuanqu_img">
		<div class="zlsc_zhuanqu_img_title1" style="background:url(<?php echo $data['lbav'][$key]['img']?>) no-repeat top center;">
			<?php echo $value['name']?>
		</div>
		<div class="col-xs-12 zlsc_zhuanqu_imgs" >
			<a href="<?php echo $data['artbanner'][$key]['link']?>" title="<?php echo $data['artbanner'][$key]['name']?>"><img src="<?php echo $data['artbanner'][$key]['img']?>" alt="<?php echo $data['artbanner'][$key]['name']?>"/></a>
			<div class="zlsc_libielist">
				<ul>
				<?php foreach ($value['items_data']as $k=>$v):?>
					<li><a href="<?php create_url('trademark',array('groupid'=>$value['id'],'groupid2'=>$v['id']))?>" class="btn btn-default"><?php echo $v['name']?></a></li>
				<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<div class="zlsc_zhuanqu_content">
	<?php foreach ($value['item'] as $k=>$v):?>
		<div class="zlsc_zhuanqu_content_one">
			<a href="__APP__/trademark/<?php echo $v['id'];?>HTMLSUFFIX" title="<?php echo $v['title'];?>商标转让"><img src="<?php $img = explode(',',$v['img']);echo $img[0]?>" alt="<?php echo $v['title'];?>商标转让"/></a>
			<p class="more_height "><span><?php echo $v['price']>0?'￥'.$v['price']:'面议'?></span></p>
			<p class="more_height"><a href="__APP__/trademark/<?php echo $v['id'];?>HTMLSUFFIX" title="<?php echo $v['title'];?>商标转让">【<?php echo mb_substr($value['name'],0,3,'utf-8')?>】<?php echo subtext($v['title'],12)?></a></p>
			<p><?php echo subtext($v['tmlimit'],32)?></p>
		</div>
		<?php endforeach;?>
	</div>
</div>
<?php endforeach;?>
<!--floor1-->
<!--floor2-->
</div>
</div>
</div>
<include file="Public/footlink_new" />
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
$("#scrollDivss").Scroll({line:1,speed:550,timer:3000,up:"but_up",down:"but_down"});
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
$('.zlsc_index_top li').click(function(){
var tt=$(this).index();
$("div[id*='zlsc_index_bottom']").css('display','none');
$("#zlsc_index_bottom"+tt).css('display','block');
$('.zlsc_index_top li').removeClass('zlsc_index_top_ons');
$(this).addClass('zlsc_index_top_ons');
})
/*热门行业切换*/
$('.shop_titles_ul li').click(function(){
var tt=$(this).index();
$("div[id*='zlsc_hot']").css('display','none');
$("#zlsc_hot"+tt).css('display','block');
$('.shop_titles_ul li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})
</script>
</body>
</html>
