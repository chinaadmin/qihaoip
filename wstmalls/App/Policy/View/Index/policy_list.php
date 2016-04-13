<include file="Public/header" />
<include file="Public/header_nav_list" />
  <!--专利-->
  <div class="thrfloor1">
  <div class="col-xs-12 fagui-title">
  
   当前位置：<a href="http://www.qihaoip.com">7号网</a>  » <a href="<?php create_url('/')?>">政策法规</a>  » <?php echo $data['gpname'];?>
  </div>
  <div class="col-xs-2 fagui-lefts">
	  <div class="col-xs-12 fagui-lefts-dl">
		  <dl>
			  <dt>政策法规</dt>
			  <?php $where = $search;?>
			  <?php foreach ($data['gp'] as $key=>$value):?>
			  <?php $where['gp'] = $value['id'];?>
			  <?php unset($where['gp2']);?>
			   <?php unset($where['p']);?>
			  <dd><a href="<?php create_url('/policy',$where)?>"  <?php echo $search['gp']==$value['id']?'class="fagui-ons"':''?>><?php echo $value['name']?></a></dd>
			 <?php endforeach;?>
		  </dl>
	  </div>
	  <?php if($data['gp2']):?>
	  <div class="col-xs-12 fagui-lefts-dl">
		  <dl>
			  <dt>知识产权</dt>
			  <?php $where = $search;?>
			  <?php unset($where['gp2']);?>
			   <?php unset($where['p']);?>
			  <dd><a href="<?php create_url('/policy',$where)?>" <?php echo !$search['gp2']?'class="fagui-ons"':''?>>全部</a></dd>
			  <?php $where = $search;?>
			  <?php foreach ($data['gp2'] as $key=>$value):?>
			   <?php unset($where['p']);?>
			   <?php $where['gp2'] = $value['id'];?>
			  <dd><a href="<?php create_url('/policy',$where)?>" <?php echo $search['gp2']==$value['id']?'class="fagui-ons"':''?>><?php echo $value['name']?></a></dd>
			  <?php endforeach;?>
		  </dl>
	  </div>
	  <?php endif?>
	  <div class="col-xs-12 fagui-lefts-dl">
		  <dl>
			  <dt>地区</dt>
			  <?php $where = $search;?>
			  <?php unset($where['ads']);?>
			   <?php unset($where['p']);?>
			  <dd><a href="<?php create_url('/policy',$where)?>" <?php echo !$search['ads']?'class="fagui-ons"':''?>>全部</a></dd>
			  <?php foreach ($data['address'] as $key=>$value):?>
			   <?php unset($where['p']);?>
			   <?php $where['ads'] = $value['id'];?>
			  <dd><a href="<?php create_url('/policy',$where)?>" <?php echo $search['ads']==$value['id']?'class="fagui-ons"':''?>><?php echo $value['areaname']?></a></dd>
			  <?php endforeach;?>
		  </dl>
	  </div>
  </div>
  <div class="col-xs-10 fagui-rights">
	  <div class="col-xs-12 fagui-rights-lists">
		  <div class="col-xs-12 fagui-rights-list">
			  <ul>
			  <?php foreach ($data['article_data'] as $key=>$value):?>
				  <li>
				  <h2><span><?php if($search['gp']==279):?>【<?php echo $value['gpname']?>】<?php endif?></span><a href="<?php echo U('/'.$value['id'])?>"><?php echo $value['title']?></a><span class="fagui-h2-right"><?php echo $value['arename']?></span></h2>
				  <div class="fagui-jianjiett">
				  <?php echo subtext($value['description'],140)?><a href="<?php echo U('/'.$value['id'])?>">详情</a>
				  </div>
				  </li>
			  <?php endforeach;?>
			  </ul>
		  </div>
	  <?php echo $data['page']?>
	 </div>
  </div>
  </div>
 
  <!--专利-->
  <!--主体-->
    <include file="Public/foot" />
<script type='text/javascript'>
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
