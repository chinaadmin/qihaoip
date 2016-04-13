<include file="Public/header"/>
<include file="Public/header_nav"/>
      <div class="col-xs-8 shop_contents_two">
        <div class="flexslider">
          <ul class="slides">
          <volist name="data['banner']" id="vo">
            <li style="background:url({$vo['img']}) 50% 0 no-repeat;"><a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$Think.STATIC_V2}images/blank.png" width="100%" height="430"></a></li>
          </volist>
          </ul>
        </div>
      </div>
      <div class="col-xs-2 shop_contents_three">
        <div class="col-xs-12 tonew-index-right">
          <ul>
            <li><a target="_blank" href="{:U('/Trade/Index/index')}"><img src="{$Think.STATIC_V2}images/tonew-sbgj1.png" /></a></li>
            <li><a target="_blank" href="{:U('/Zlgj/Index/index')}"><img src="{$Think.STATIC_V2}images/tonew-zlgj2.png" /></a></li>
            <li><a target="_blank" href="http://e.qihaoip.com"><img src="{$Think.STATIC_V2}images/tonew-qigj3.png" /></a></li>
            <li><a target="_blank" href="__APP__/broker/"><img src="{$Think.STATIC_V2}images/tonew-jjren4.jpg" /></a></li>
            <li><a target="_blank" href="{:U('/member/seller/releasegoods')}"><img src="{$Think.STATIC_V2}images/tonew-fb5.jpg" /></a></li>
            <li><a target="_blank" href="{:U('/member/buyer/supply_add')}"><img src="{$Think.STATIC_V2}images/tonew-qg6.jpg" /></a></li>
          </ul>
        </div>
        <div class="col-xs-12 zlsc_index tonew_zlsc_index">
          <div class="col-xs-12 zlsc_index_top zlsc_index_topss">
            <ul>
              <li class="zlsc_index_top_ons"><a href="javascript:void(0)" >求购信息</a></li>
              <!-- <li><a href="javascript:">成功案例</a></li> -->
            </ul>
          </div>
          <div class="col-xs-12 zlsc_index_bottom" id="zlsc_index_bottom0">
            <ul>
            <volist name="data['purchasing']" id="vo">
              <li><a href="{:U('Buy/detail',array('uid'=>$vo['uid']))}" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,12}</a></li>
            </volist> 
            </ul>
          </div>
<!--           <div class="col-xs-12 zlsc_index_bottom zlsc_index_bottom_display" id="zlsc_index_bottom1">
            <ul>
              <li><a href="#">光专利年费减缓光专11...</a></li>
              <li><a href="#">光专利年费减缓光专...</a></li>
              <li><a href="#">光专利年费减缓光专...</a></li>
              <li><a href="#">光专利年费减缓光专...</a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <!--分类与banner-->
  <!--特惠专区与知产包-->
  
  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-5 tonew-tehui">
        <div class="col-xs-12 shop_titles shop_titles_ul fagui_titles_ul"><span>特惠专区</span>
          <ul>
            <li><a href="javascript:void(0)" class="shop_titles_libieons tehui">特惠商标</a></li>
            <li><a href="javascript:void(0)">特惠专利</a></li>
          </ul>
          <a href="__APP__/trademark/price/" class="tehuimore" target="_blank">更多>></a>
        </div>
        <div class="col-xs-12 tonew-tehuis" id="tonew-nav0">
        <volist name="data['special_trademark']" id="vo">
          <div class="scindex_th_one tonew_th_one">
            <div class="scindex_th_oneimg"><a target="_blank" href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}商标转让"><img src="{$vo['img']}" alt="{$vo['title']}商标转让"/></a></div>
            <div class="scindex_th_onecon tonew_th_onecon">
              <p><span>{$vo['price']}</span></p>
              <p>【{$vo['category']}】<a target="_blank" href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}商标转让">{$vo['title']|msubstr=0,5}</a></p>
              <p class="p_color">{$vo['tmlimit']|msubstr=0,10}</p>
            </div>
          </div>
         </volist> 
        </div>
        <div class="col-xs-12 tonew-tehuis display_none" id="tonew-nav1">
         <volist name="data['special_patent']" id="vo"> 
          <div class="scindex_th_one tonew_th_one">
            <div class="scindex_th_oneimg"><a target="_blank" href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}专利转让"><img src="{$vo['img']}" alt="{$vo['title']}专利转让"/></a></div>
            <div class="scindex_th_onecon tonew_th_onecon">
              <p><span>{$vo['price']}</span></p>
              <p>【{$vo['tmtype']}】<a target="_blank" href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}专利转让">{$vo['title']|msubstr=0,15}</a></p>
              <!-- <p class="p_color">{$vo['introduce']|msubstr=0,5}</p> -->
            </div>
          </div>
          </volist>
        </div>
      </div>
      <div class="col-xs-7">
        <div class="col-xs-12 shop_titles">知产包<a href="__APP__/ipbag/" target="_blank">更多>></a></div>
        <div class="col-xs-12 shop_zcb_content">
        <volist name="data['zcb']" id="vo">
          <div class="shop_zcb_one"> <a target="_blank" href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}"><img src="{$vo['smallimg']}" alt="{$vo['title']}"/></a>
            <p>{$vo['title']}</p>
            <a target="_blank" href="__APP__/ipbag/{$vo['id']}HTMLSUFFIX" class="shop_chakan">查看详情</a><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq']?$value['qq']:21556911;?>&site=qq&menu=yes" class="shop_chakan shop_ljzx">立即咨询</a> 
          </div>
        </volist> 
        </div>
      </div>
    </div>
  </div>

  <!--特惠专区与知产包-->
  <!--特惠专区-->

  <div class="thrfloor1">
    <div class="col-xs-12 shop_margin">
      <div class="col-xs-12 shop_titles">热门推荐 </div>
      <div class="col-xs-12 tonew-hottuijian">
      <volist name="data['hot_recommend']" id="vo">
      	<eq name="i" value="1">
        	<div class="col-xs-3 tonew-hottuijian-left"><a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['name']}"/></a></div>
		<else/>
			<div class="col-xs-3 tonew-hottuijian-min"><a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['name']}"/></a></div>
      	</eq>
      </volist>
      </div>
    </div>
  </div>
 
  <!--特惠专区-->
  <!--明星旗舰店-->
 
  <div class="thrfloor1">
    <div class="col-xs-12 shop_contentss">
      <div class="col-xs-12 shop_titles">明星旗舰店</div>
      <div class="col-xs-12 shop_gudous">
        <div class='rollphotostkk'>
          <div class='blk_29stkt_shop'>
            <div class='LeftBotton' id='LeftArr'></div>
            <div class='Cont' id='ISL_Cont_1'>
             <volist name="data['star_store']" id="vo">  
              <div class='box boxt'>
              	<a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['name']}"/></a>
                <p><a href="{$vo['link']}" title="{$vo['name']}" target="_blank">{$vo['name']}</a></p>
                <a href="{$vo['link']}" title="{$vo['name']}" target="_blank" class="btn btn-default shop_shou">收藏本店</a> 
              </div>
             </volist> 
            </div>
            <div class='RightBotton' id='RightArr'></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 thrguangao"><a target="_blank" href="{$data['adv_space']['0']['link']}" title="{$data['adv_space']['0']['name']}"><img src="{$data['adv_space']['0']['img']}" alt="{$data['adv_space']['0']['name']}"/></a></div>
  </div>
  <!--明星旗舰店-->
  
  <!--专111利-->
    <div class="thrfloor1">
    <div class="col-xs-12">
      <div class="col-xs-12 shop_margin">
        <div class="col-xs-12 shop_titles shop_titles_ul shop_titles_ul1"><span>商标市场</span>
          <ul>
          <volist name="data['trademark']" id="vo">
          <?php $y = 0;?>
            <li><a target="_blank" href="javascript:void(0);" data-id="{$vo['id']}" <eq name="i" value="1">class="shop_titles_libieons"</eq>>{$vo['name']}</a></li>
          </volist>  
          </ul>
          <a href="__APP__/trademark/type{$data['trademark']['0']['id']}HTMLSUFFIX" target="_blank" class="tmmore">更多>></a>
        </div>
        <!--floor1-->
       <volist name="data['trademark']" id="vo">
        <div class="col-xs-12 <eq name="key" value="0">zlsc_hot<else/>zlsc_hot1</eq>" <eq name="key" value="0">id="zlsc_hot0"<else/>id="zlsc_hot{$key++}"</eq>>
          <div class="zlsc_zhuanqu_img">
            <div class="zlsc_zhuanqu_img_title3" style="background:url(<?php echo $data['tm_ad_list'][$y]['img']?>) no-repeat top center;">{$vo['name']}</div>
            <div class="col-xs-12 zlsc_zhuanqu_imgs">
              <a href="<?php echo $data['adv_trademark'][$y]['link']?>" title="<?php echo $data['adv_trademark'][$y]['name']?>" target="_blank"><img src="<?php echo $data['adv_trademark'][$y]['img']?>" alt="<?php echo $data['adv_trademark'][$y]['name']?>"/></a>
              <div class="zlsc_libielist">
                <ul>
                <volist name="vo['sub']" id="v">
                  <li><a href="__APP__/trademark/type{$v['id']}HTMLSUFFIX" target="_blank" class="btn btn-default">{$v['name']|msubstr=0,6}</a></li>
                </volist> 
                </ul>
              </div>
            </div>
          </div>
          <div class="zlsc_zhuanqu_content">
          <volist name="vo['info']" id="v">
            <div class="zlsc_zhuanqu_content_one">
              <a href="__APP__/trademark/{$v['id']}HTMLSUFFIX" title="{$v['title']}商标转让" target="_blank"><img src="{$v['img']}" alt="{$v['title']}商标转让"/></a>
              <p class="more_height "><span>{$v['price']}</span></p>
              <p class="more_height"><a href="__APP__/trademark/{$v['id']}HTMLSUFFIX" title="{$v['title']}商标转让" target="_blank">【{$vo['catename']}】{$v['title']|msubstr=0,10}</a></p>
              <p>{$v['tmlimit']|msubstr=0,32}</p>
            </div>
          </volist>  
          </div>
        </div>
        <?php $y++;?>
       </volist>
      <!--floor1-->
      </div>
	  <div class="col-xs-12 thrguangao"><a target="_blank" href="{$data['adv_space']['1']['link']}" title="{$data['adv_space']['1']['name']}"><img src="{$data['adv_space']['1']['img']}" alt="{$data['adv_space']['1']['name']}"/></a></div>
    </div>
  </div>
  <!--专利-->
  
  <div class="thrfloor1">
    <div class="col-xs-12">
      <div class="col-xs-12 shop_margin">
        <div class="col-xs-12 shop_titles shop_titles_ul shop_titles_ul2" ><span>专利市场</span>
          <ul>
          <volist name="data['patent']" id="vo">
           <?php $y = 0;?>
             <li><a href="javascript:void(0);" data-id="{$vo['id']}" <eq name="i" value="1">class="shop_titles_libieons"</eq>>{$vo['name']}</a></li>
          </volist>
          </ul>
          <a href="__APP__/patent/list{$data['patent']['0']['id']}HTMLSUFFIX" target="_blank" class="pamore">更多>></a>
        </div>
        <!--floor1-->
        <volist name="data['patent']" id="vo">
        
         <div class="col-xs-12 <eq name="key" value="0">zlsc_hot<else/>zlsc_hot1</eq>" <eq name="key" value="0">id="zlsc_hoot0"<else/>id="zlsc_hoot{$key++}"</eq>>
          <div class="zlsc_zhuanqu_img">
            <div class="zlsc_zhuanqu_img_title1" style="background:url(<?php echo $data['pa_ad_list'][$y]['img']?>) no-repeat top center;">{$vo['name']}</div>
            <div class="col-xs-12 zlsc_zhuanqu_imgs" > 
              <a href="<?php echo $data['adv_patent'][$y]['link']?>" title="<?php echo $data['adv_patent'][$y]['name']?>" target="_blank"><img src="<?php echo $data['adv_patent'][$y]['img']?>" alt="<?php echo $data['adv_patent'][$y]['name']?>"/></a>
              <div class="zlsc_libielist">
                <ul>
                <volist name="vo['sub']" id="v">
                  <li><a href="__APP__/patent/list{$v['id']}HTMLSUFFIX" target="_blank" class="btn btn-default">{$v['name']|msubstr=0,6}</a></li>
                </volist>
                </ul>
              </div>
            </div>
          </div>
          <div class="zlsc_zhuanqu_content">
          <volist name="vo['info']" id="v">
            <div class="zlsc_zhuanqu_content_one"> 
              <a href="__APP__/patent/{$v['id']}HTMLSUFFIX" title="{$v['title']}专利转让" target="_blank"><img src="{$v['img']}" alt="{$v['title']}专利转让"/></a>
              <p class="more_height more_heights"><span>{$v['price']}</span></p>
              <p class="more_height"><a href="__APP__/patent/{$v['id']}HTMLSUFFIX" title="{$v['title']}专利转让" target="_blank">【{$v['tmtype']}】{$v['title']|msubstr=0,10}</a></p>
              <p>{$vo['name']}</p>
            </div>
          </volist>
          </div>
        </div>
        <?php $y++;?>
        </volist>
        <!--floor1-->
      </div>
	  <div class="col-xs-12 thrguangao"><a target="_blank" href="{$data['adv_space']['2']['link']}" title="{$data['adv_space']['2']['name']}"><img src="{$data['adv_space']['2']['img']}" alt="{$data['adv_space']['2']['name']}"/></a></div>
    </div>
  </div>
  
  <!--资讯-->
<div class="thrfloor1">
<div class="col-xs-12 shop_margin">
<div class="col-xs-12 shop_titles">资讯 <a href="__APP__/news/" target="blank">更多>></a></div>
<div class="col-xs-12 tonew-thrnews">
<div class="col-xs-3 tonew_index_thrnewleft">
<div class="newbans" >
	<div class="www51buycomnew">
	    <ul class="51buypicnew">
	    <volist name="data['article']['zxtj']" id="vo" offset="2" length="10">
	        <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}"  alt="{$vo['title']}" height="238" width="278"/></a>
			<div class="biaotis"><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']}</a></div>
			</li> 
		</volist>      
	    </ul>
	    <a class="prev" href="javascript:void(0)"></a>
	    <a class="next" href="javascript:void(0)"></a>
	    <div class="num">
	    	<ul></ul>
	    </div>
	</div>
</div>
<div class="col-xs-12 thrnewleft tonew-thrnewleft">
	<ul>
	<volist name="data['article']['zixun']" id="vo" offset="5" length="4">
		<li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,20}</a></li>
	</volist>
	</ul>
</div>
</div>
<div class="thrnewmid tonew-thrnewmid">
<div class="col-xs-12 thrvnewstit">
<img src="{$Think.STATIC_V2}images/vrdzxs.png"/>
</div>
<volist name="data['article']['zxtj']" id="vo" offset="0" length="2">
	<div class="col-xs-12 thrnewtwo tonew-thrnewtwo">
		<h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><b>{$vo['title']|msubstr=0,30}</b></a></h2>
		<div class="thrnewtwocon">
			{$vo['description']|msubstr=0,75}
			<span><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">[详情]</a></span>
		</div>
	</div>
</volist>
<ul>
<volist name="data['article']['zixun']" id="vo" offset="0" length="5">
	<li><a target="_blank" href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}">{$vo['title']|msubstr=0,30}</a><span>{$vo['addtime']|date="Y-m-d",###}</span></li>
</volist>
</ul>
</div>
<div class="thrnewright tonew-thrnewright">
<div class="col-xs-12 tonew-thrvnewstit">
<ul>
<li class="tonew-thrvnewstit-ons"><a href="javascript:void(0)">经典案例</a></li>
<li><a href="javascript:void(0)">政策法规</a></li>
</ul>
</div>
<div class="col-xs-12 tonew-thrnewrighttu" id="tonew-thrnewrighttu0">
<volist name="data['article']['anli']" id="vo" offset="0" length="3">
 			<div class="col-xs-12 zhichan-news-left-lt"> 
 			 <a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}"/></a>
              <div class="tonew-news-left-con">
                <div class="col-xs-12 fagui-content-jianjie news-size">
                  <h2><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,8}</a></h2>
                  <div class="col-xs-12 fagui-content-jianjies">{$vo['description']|msubstr=0,20}<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" target="_blank">详细</a> </div>
                </div>
              </div>
            </div>
</volist>
</div>
<div class="col-xs-12 tonew-thrnewrighttu display_none" id="tonew-thrnewrighttu1">
<volist name="data['policy']" id="vo">
 	<div class="col-xs-12 zhichan-news-left-lt"> 
 		 <a href="http://z.qihaoip.com/<?php echo $vo['id']?>.html" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}"/></a>
         <div class="tonew-news-left-con">
           <div class="col-xs-12 fagui-content-jianjie news-size">
             <h2><a href="http://z.qihaoip.com/<?php echo $vo['id']?>.html" target="_blank">{$vo['title']|msubstr=0,8}</a></h2>
            <div class="col-xs-12 fagui-content-jianjies">{$vo['description']|msubstr=0,20}<a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" target="_blank">详细</a></div>
           </div>
          </div>
      </div>
 </volist>
</div>
</div>
</div>
</div>
</div>
<!--资讯-->
  <!--主体-->
  <!--底部-->
<include file="Public/foot" />
  <!--底部-->
</div>
<script type='text/javascript'>
/* 图片资讯滚动js */
$(".www51buycomnew").slide({ titCell:".num ul" , mainCell:".51buypicnew" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
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
/*商标市场切换*/
$('.shop_titles_ul1 li').click(function(){
var dataid = $(this).find('a').attr('data-id');
$('.tmmore').attr('href',"__APP__/trademark/type"+dataid+"HTMLSUFFIX");
var tt=$(this).index();
$("div[id*='zlsc_hot']").css('display','none');
$("#zlsc_hot"+tt).css('display','block');
$('.shop_titles_ul1 li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})
/*专利市场切换*/
$('.shop_titles_ul2 li').click(function(){
var dataid = $(this).find('a').attr('data-id');
$('.pamore').attr('href',"__APP__/patent/list"+dataid+"HTMLSUFFIX");
var tt=$(this).index();
$("div[id*='zlsc_hoot']").css('display','none');
$("#zlsc_hoot"+tt).css('display','block');
$('.shop_titles_ul2 li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})
/*特惠专区切换*/
$('.fagui_titles_ul li').click(function(){
var tt=$(this).index();
if(tt==1){
	$('.tehuimore').attr('href',"__APP__/patent/price/");
}else{
	$('.tehuimore').attr('href',"__APP__/trademark/price/");
}
$("div[id*='tonew-nav']").css('display','none');
$("#tonew-nav"+tt).css('display','block');
$('.fagui_titles_ul li a').removeClass('shop_titles_libieons');
$(this).find("a").addClass('shop_titles_libieons');
})
/*经典案例政策法规切换*/
$('.tonew-thrvnewstit li').click(function(){
var tt=$(this).index();
$("div[id*='tonew-thrnewrighttu']").css('display','none');
$("#tonew-thrnewrighttu"+tt).css('display','block');
$('.tonew-thrvnewstit li ').removeClass('tonew-thrvnewstit-ons');
$(this).addClass('tonew-thrvnewstit-ons');
})
</script>