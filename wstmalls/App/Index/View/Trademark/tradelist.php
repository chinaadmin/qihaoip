<include file="Public/header" />
<include file="Public/header_nav_list" />
  <div class="thrfloor1">
    <div class="zllist_titlet">
      <div class="col-xs-12 shop_titles">商标</div><div style="clear:both"></div>
    </div>
  </div>
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 guowai_select zllist_select">
      <div class="col-xs-12 ">
      
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="selects">
            <p class="guowai_teshu">您已选择</p>
            <ul>
            <?php $groupid = array(); foreach($data['groupid'] as $key => $value){
				$groupid[$value['id']] = $value['name'];
			}
			$groupid2 = array(); foreach($data['groupid2'] as $key => $value){
				$groupid2[$value['id']] = $value['name'];
			}
			$groupid3 = array(); foreach($data['groupid3'] as $key => $value){
				$groupid3[$value['id']] = $value['name'];
			}
			?>
			<?php if(!empty($search)):?>
				<?php foreach($search as $key =>$value):?>
					<?php if($key=='groupid'):?>
							<?php 
								$where = $search;
								unset($where['groupid']);
								unset($where['groupid2']);
								unset($where['groupid3']);
							?>
              <li><a href="<?php create_url('trademark',$where)?>" class="selon"><?php echo $groupid[$search['groupid']]?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
           <?php elseif($key=='groupid2'):?>
           			<?php 
						$where = $search;
						unset($where['groupid2']);
						unset($where['groupid3']);
					?>
              <li><a href="<?php create_url('trademark',$where)?>" class="selon"><?php echo $groupid2[$search['groupid2']]?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
           <?php elseif($key=='groupid3'):?>
           			<?php 
						$where = $search;
						unset($where['groupid3']);
					?>
              <li><a href="<?php create_url('trademark',$where)?>" class="selon"><?php echo $groupid3[$search['groupid3']]?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
           
			<?php elseif($key=='tmtype'):?>
			<?php 
				$where = $search;
				unset($where['tmtype']);
			?>
			 <li><a href="<?php create_url('trademark',$where)?>" class="selon"><?php $type = C('ITEM_REG_TYPE'); echo $type[$search['tmtype']];?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            <?php elseif($key=='price'):?>
			<?php 
				$where = $search;
				unset($where['price']);
			?>
			 <li><a href="<?php create_url('trademark',$where)?>" class="selon"><?php  echo $data['price'][$search['price']];?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            <?php elseif($key=='shop'):?>
			<?php 
				$shop = array();
				foreach ($data['shop_data'] as $k => $v){
					$shop[$v['id']] = $v['name'];
				}
			?>
			<?php 
				$where = $search;
				unset($where['shop']);
			?>
			 <li><a href="<?php create_url('trademark',$where)?>" class="selon"><?php  echo $shop[$search['shop']];?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
			<?php endif;?>
			<?php endforeach;?>
			<?php endif;?>
            </ul>
            <p class="ybs"><a href="<?php echo U('trademark/type')?>" class="btn btn-xs btn-default delall">全部撤销</a></p>
          </div>
          
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="zlzls2">
            <p>商标类别</p>
            <ul>
            <?php foreach($data['groupid'] as $key=>$value):?>
           		<?php  
           		$where = $search;
           		$where['groupid'] = $value['id'];
           		unset($where['p']);
           		unset($where['groupid2']);
           		unset($where['groupid3']);
           		 ?>
              <li><a href="<?php create_url('trademark',$where)?>" <?php echo isset($search['groupid'])&&$search['groupid']==$value['id']?'class="selon"':''?>  id="se<?php echo $value['id']?>" title="<?php echo $value['name']?>" onClick="return check_num();"><?php echo $value['name']?></a></li>
			<?php endforeach;?>
            </ul>
			<p class="ybs"><a href="javascript:void(0)"  class="btn btn-xs btn-default more2" rel="1">更多</a></p>
          </div>
          
          <?php if($data['groupid2']):?>
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="zlzls3">
            <p>二级类别</p>
            <ul>
            <?php foreach($data['groupid2'] as $key=>$value):?>
				<?php 
				$where = $search;
				$where['groupid2'] = $value['id'];
				unset($where['p']);
				unset($where['groupid3']);
			?>
              <li><a href="<?php create_url('trademark',$where)?>" <?php echo isset($search['groupid2'])&&$search['groupid2']==$value['id']?'class="selon"':''?> id="se<?php echo $value['id']?>" title="<?php echo $value['name']?>" onClick="return check_num();"><?php echo $value['name']?></a></li>
			<?php endforeach;?>
            </ul>
			<p class="ybs"><a href="javascript:void(0)"  class="btn btn-xs btn-default more3" rel="1">更多</a></p>
          </div>
  	      <?php endif?>
  	      
  	      <?php if($data['groupid3']):?>
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="zlzls4">
            <p>三级类别</p>
            <ul>
            <?php foreach($data['groupid3'] as $key=>$value):?>
				<?php 
				$where = $search;
				$where['groupid3'] = $value['id'];
				unset($where['p']);
			?>
              <li><a href="<?php create_url('trademark',$where)?>" <?php echo isset($search['groupid3'])&&$search['groupid3']==$value['id']?'class="selon"':''?> id="se<?php echo $value['id']?>" title="<?php echo $value['name']?>" onClick="return check_num();"><?php echo $value['name']?></a></li>
			<?php endforeach;?>
            </ul>
			<p class="ybs"><a href="javascript:void(0)"  class="btn btn-xs btn-default more4" rel="1">更多</a></p>
          </div>
  	      <?php endif?>
  
           <div class="col-xs-12 zlsellist_guowai noborder_guowai">
            <p>组合类型</p>
            <ul>
             <?php 
				$where = $search;
				unset($where['p']);
			?>
				<li><a href="<?php create_url('trademark',$where)?>" <?php echo !isset($search['tmtype'])?'class="selon"':''?>>全部</a></li>
			<?php foreach (C('ITEM_REG_TYPE') as $key=>$value):?>
			<?php 
				$where = $search;
				$where['tmtype'] = $key;
				unset($where['p']);
			?>
			<li><a href="<?php create_url('trademark',$where);?>" <?php echo isset($search['tmtype'])&&$search['tmtype']==$key?'class="selon"':''?> title="<?php echo $value;?>"><?php echo $value;?></a></li>
			<?php endforeach;?>
            </ul>
          </div>
          
          <div class="col-xs-12 zlsellist_guowai noborder_guowai">
            <p>价格</p>
            <ul>
              <?php 
				$where = $search;
				unset($where['p']);
				?>
				<li><a href="<?php create_url('trademark',$where)?>" <?php echo !isset($search['price'])?'class="selon"':''?>>全部</a></li>
			 <?php foreach($data['price'] as $key => $value):?>
			 <?php 
				$where = $search;
				$where['price'] = $key;
				unset($where['p']);
			 ?>
				<li><a href="<?php create_url('trademark',$where)?>" <?php echo isset($search['price'])&&$search['price']==$key?'class="selon"':''?>><?php echo $value?></a></li>
			 <?php endforeach;?>
            </ul>
          </div>
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="zlzls1">
            <p>7号商城</p>
            <ul>
              <?php foreach ($data['shop_data'] as $key=>$value):?>
			  <?php 
				$where = $search;
				$where['shop'] = $value['id'];
				unset($where['p']);
			  ?>
				<li><a href="<?php create_url('trademark',$where)?>" <?php echo isset($search['shop'])&&$search['shop']==$value['id']?'class="selon"':''?> ><?php echo $value['name'];?></a></li>
			   <?php endforeach;?>
            </ul>
            <p class="ybs"><a href="javascript:void(0)" class="btn btn-xs btn-default more" rel="1">更多</a></p>
          </div>
      </div>
    </div>
  </div>
  <div class="thrfloor1">
    <div class="col-xs-12 zllist_sels">
      <ul>
      <?php 
		$where = $search;
		unset($where['views']);
		unset($where['prices']);
	?>
		<li><a href="<?php create_url('trademark',$where)?>" class="zllist_sels_ons">默认</a></li>
	<?php 
		$where_o = $search;
		if(!$where_o['prices']){
			$where_o['prices'] = 'desc';
		}elseif($where_o['prices']=='desc'){
			$where_o['prices'] ='asc';
		}else{
			$where_o['prices'] ='desc';
		}
		$where_s = $search;
		if(!$where_s['views']){
				$where_s['views'] = 'desc';
		}elseif($where_s['views']=='desc'){
				$where_s['views'] ='asc';
		}else{
				$where_s['views'] ='desc';
		}
							?>
        <li><a href="<?php create_url('trademark',$where_o)?>" >价格<span class="glyphicon glyphicon-arrow-<?php echo $search['prices']=='desc'?'down':'up'?>" aria-hidden="true"></span></a></li>
        <li><a href="<?php create_url('trademark',$where_s)?>" >热门<span class="glyphicon glyphicon-arrow-<?php echo $search['views']=='desc'?'down':'up'?>" aria-hidden="true"></span></a></li>
      </ul>
      <p> 共<span><?php echo $count;?></span>件 </p>
    </div>
  </div>
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 zllist_edit">
	<?php if($data ['item_data']):?>
		<?php foreach($data ['item_data'] as $key =>$value):?>
      <div class="shop_remen_one sblist_remen_one">
	     <a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img alt="<?php echo $value['title'].'商标转让'?>" src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
		 <p class="more_height"><span><?php echo $value['price']>0?$value['price']:'面议'?></span></p>
		 <p class="more_height">【<?php echo mb_substr($value['items'],0,3,'utf-8')?>】<?php echo subtext($value['title'],12)?></p>
		 <p class="fixed_height"><?php echo subtext($value['tmlimit'],32)?></p>
		<?php if($value['shop']):?>
       	 <a href="javascript:void(0);" class="shop_list_shou sc" id="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏商标</a>
       	 <a href="<?php echo U('shop/shop_list',array('shop'=>$value['shop']['id']))?>" class="shop_list_shou" title="<?php echo $value['shop']['name'].'旗舰店'?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 进入商城</a>
		<?php else:?>
		 <a href="javascript:void(0);" class="shop_list_shous sc" id="<?php echo $value['id']?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏商标</a>    			
		<?php endif?>
	</div>
     <?php endforeach;?>
	<?php else:?>
	<div class="col-xs-12 " style="margin-top: 10px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-size: 20px; padding: 20px; text-align: center;">
     	暂无数据  
   </div>
	<?php endif?>
    </div>
    <div class="col-xs-12 ">
      <?php echo $data['page'];?>
    </div>
  </div>
  <!--主体-->
  <include file="Public/foot" />
<script type='text/javascript'>

//收藏
$('.sc').live('click',function(){
	var id = $(this).attr('id');
	$.post('<?php echo U('/Index/Index/favorite');?>',{'sid':id,'type':'1'},function(data){
			$.MsgBox.Alert("温馨提示：",data.data);
		})
	})
//收藏
							
$('.shop_list_hover').hover(function(){
$('.goods_shop_display').show();
},function(){
$('.goods_shop_display').hide();
})
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
/*左侧二级导航11111*/

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
$('.sblist_remen_one:nth-child(5n)').css('margin-right','0');
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
$(this).html('收起');
},function(){
$('#zlzls1').removeClass('zlmores');
$(this).html('更多');
})

$('.more2').toggle(function(){
$('#zlzls2').addClass('zlmores');
$(this).html('收起');
},function(){
$('#zlzls2').removeClass('zlmores');
$(this).html('更多');
})

$('.more3').toggle(function(){
$('#zlzls3').addClass('zlmores');
$(this).html('收起');
},function(){
$('#zlzls3').removeClass('zlmores');
$(this).html('更多');
})

$('.more4').toggle(function(){
$('#zlzls4').addClass('zlmores');
$(this).html('收起');
},function(){
$('#zlzls4').removeClass('zlmores');
$(this).html('更多');
})

/*更多*/
</script>
</body>
</html>
