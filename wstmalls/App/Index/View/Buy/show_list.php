<include file="Public/header" />
<include file="Public/header_nav_list" />
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 fagui-title"> 当前位置：<a href="/">7号网</a> » 求购信息</div>
    <div class="col-xs-9 news-list-left">
	   <div class="col-xs-12 qugo-libie-list">
	     <div class="col-xs-12 qugo-libie-list-ul">
		   <ul>
		   <li><a href="<?php echo U('show_list',array('t'=>1));?>" <?php echo $search['t']=='1'?'class="qugo-libie-list-ons"':'';?>>商标求购</a></li>
		   <li><a href="<?php echo U('show_list',array('t'=>2));?>" <?php echo $search['t']=='2'?'class="qugo-libie-list-ons"':'';?>>专利求购</a></li>
		   </ul>
		 </div>
		 <div class="col-xs-12 qugo-libie-list-uls <?php echo $search['t']!=1?'display_none':''?>" id="qugo-libie-list-uls0">
		   <ul>
		   <?php $where = $search;?>
		   <?php unset($where['p'])?>
		   <?php foreach ($data['tm_items'] as $key=>$value):?>
		   	<?php $where['i'] = $key?>
		  	 <li><a href="<?php echo U('show_list',$where)?>" <?php echo $search['i'] == $key?'class="qugo-libie-list-uls-ons"':''?>><?php echo $value?></a></li>
		   <?php endforeach;?>
		   </ul>
		 </div>
		
		 <div class="col-xs-12 qugo-libie-list-uls <?php echo $search['t']!=2?'display_none':''?>" id="qugo-libie-list-uls1">
		   <ul>
		   <?php $where = $search;?>
		   <?php unset($where['p'])?>
		   <?php foreach ($data['pa_items'] as $key=>$value):?>
		   <?php $where['i'] = $key?>
		  	 <li><a href="<?php echo U('show_list',$where)?>" <?php echo $search['i'] == $key?'class="qugo-libie-list-uls-ons"':''?>><?php echo $value?></a></li>
		    <?php endforeach;?>
		   </ul>
		 </div>
		 
	   </div>
	   
	  
      <div class="col-xs-12 news-list-lefts">
	  <div class="col-xs-12 qugo-content-title">
	  <?php 
	  if($search['t']==1){
	  	echo $search['i']?$data['tm_items'][$search['i']]:'商标求购';
	  }else{
	  	echo $search['i']?$data['pa_items'][$search['i']]:'专利求购';
	  }
	  ?>
	  </div>
        <div class="col-xs-12 qugo-list-lefts-con">
          <ul>
          <?php foreach ($data['supply_data'] as $key=>$value):?>
			  <li>
				  <div class="col-xs-12 qugo-list-lefts-con-one">
					  <h2><span>【<?php echo $value['name']?>】</span><a href="<?php echo U('Buy/detail',['uid'=>$value['uid']]);?>"><?php echo subtext($value['title'],30);?><?php echo $value['endtime']>time()?'':'【已过期】';?></a><span class="span-float">发布日期：<?php echo date('Y-m-d',$value['addtime'])?></span></h2>
						  <div class="col-xs-12 qugo-list-lefts-con-jianjie">
						 	<?php echo msubstr(strip_tags($value['content']),0,100,'utf-8');?>	
						  </div>
					  <div class="col-xs-12 qugo-list-lefts-con-price">
					  价格要求：<?php echo $value['pricemax']>0?'￥'.$value['pricemax']:'面议'?><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq']?$value['qq']:21556911;?>&site=qq&menu=yes" class="btn btn-default">我来卖</a>
					  </div>
				  </div>
			  </li>
		  <?php endforeach;?>
		  </ul>
        </div>
        <?php echo $data['page']?>
      </div>
	  
    </div>
<include file="Public/right" />
  </div>
  <!--专利-->
  <!--主体-->
<include file="Public/foot" />
</div>
<script type='text/javascript'>
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
/*商标求购与专利求购*/
/* $('.qugo-libie-list-ul li').click(function(){
var tt=$(this).index();
$("div[id*='qugo-libie-list-uls']").css('display','none');
$("#qugo-libie-list-uls"+tt).css('display','block');
$('.qugo-libie-list-ul li a').removeClass('qugo-libie-list-ons');
$(this).find("a").addClass('qugo-libie-list-ons');
}) */
/*商标求购与专利求购*/
</script>
</body>
</html>
