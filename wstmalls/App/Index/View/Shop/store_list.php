<include file="Public/header"/>
<include file="Public/header_nav_list"/>
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12">
      <div class="shop_list_left">
        <div class="col-xs-12 shop_list_lefts">
          <div class="col-xs-12 shop_titles">旗舰店</div>
          <volist name="data['flagshipshop']" id="vo">
	          <div class="col-xs-3 shop_list_one"> <a href="{:U('shop/shop_list',array('shop'=>$vo['id']))}" title="{$vo['name']}"><img src="{$vo['logo']}"/></a>
	            <p><a href="{:U('shop/shop_list',array('shop'=>$vo['id']))}" title="{$vo['name']}"><eq name="vo['id']" value="1820">{$vo['name']}<else/>{$vo['name']}旗舰店</eq></a></p>
	           <notempty name="vo['shoucang']">
	           		<a href="javascript:;" data-type="4" data-id="{$vo['id']}" class="btn btn-default shop_shou scdp">您已收藏本店</a> 
	           <else/>
	           		<a href="javascript:;" data-type="4" data-id="{$vo['id']}" class="btn btn-default shop_shou scdp">收藏本店</a> 
	           </notempty>
	          </div>
	      </volist>
        </div>
        <div class="col-xs-12">
        	{$data['page']}
        </div>
      </div>
      <div class="shop_list_right">
        <div class="col-xs-12 shop_titles">热门推荐</div>
        <volist name="data['recommended']" id="vo">
	        <div class="col-xs-12 shop_remen_one"> 
	        <eq name="vo['tmpa']" value="1">
	          <a href="__APP__/trademark/{$vo['id']}HTMLSUFFIX"><img src="{$vo['img']}"/></a>
	        <else/>
	       	 <a href="__APP__/patent/{$vo['id']}HTMLSUFFIX"><img src="{$vo['img']}"/></a>
	        </eq>
	          <p class="more_height"><span>{$vo['price']}</span></p>
	          <p class="more_height">【{$vo['groupname']}】楠丁</p>
	          <p>{$vo['tmlimit']|msubstr=0,35}</p>
	          <a href="javascript:;" data-type="{$vo[tmpa]}" data-id="{$vo['id']}"  class="shop_list_shou scsp"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		          <if condition="$vo['tmpa'] eq '1' AND $vo['shoucang']">
		          	该商标已收藏
		          <elseif condition="$vo['tmpa'] eq '2' AND $vo['shoucang']"/>
		          	该专利已收藏
		          <else/>
		          	<eq name="vo['tmpa']" value="1">收藏商标<else/>收藏专利</eq>
				  </if>
	          </a>
	          <a href="{:U('shop/shop_list',array('shop'=>$vo['userid']))}" <eq name="vo['userid']" value="1820">title="{$vo['name']}"<else/>title="{$vo['name']}旗舰店"</eq> class="shop_list_shou"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 进入商城</a> 
	        </div>
	    </volist>
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
//收藏商标专利
$('.scsp').click(function(){
	$this = $(this);
	var parameter={};
	var sid = $this.attr('data-id');
	var type = $this.attr('data-type');
	parameter['sid'] = sid;
	parameter['type'] = type;
	$.post("{:U('Index/Index/favorite')}",parameter,function(data){
		if(data.state==1){
			$.MsgBox.Alerta("温馨提示：",data.data,function(){
				$this.html('<span class="glyphicon glyphicon-star" aria-hidden="true"></span>您已收藏');
			});
		}else{
			$.MsgBox.Alert("温馨提示：",data.data);
		}
	});
});
//收藏店铺
$('.scdp').click(function(){
	$this = $(this);
	var parameter={};
	var sid = $this.attr('data-id');
	var type = $this.attr('data-type');
	parameter['sid'] = sid;
	parameter['type'] = type;
	$.post("{:U('Index/Index/favorite')}",parameter,function(data){
		if(data.state==1){
			$.MsgBox.Alerta("温馨提示：",data.data,function(){
				$this.html('您已收藏');
			});
		}else{
			$.MsgBox.Alert("温馨提示：",data.data);
		}
	});
});
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
