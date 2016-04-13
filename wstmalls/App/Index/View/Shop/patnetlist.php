<include file="Public/header" />
<include file="Public/header_nav_list" />
  <!--导航-->
  <div class="thrfloor1">
    <div class="col-xs-12 zllist_titlet">
      <div class="col-xs-12 shop_titles">专利</div>
    </div>
  </div>
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 guowai_select zllist_select">
      <div class="col-xs-12 ">
        <form action="" method="post" id="forms">
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="selects">
          <p class="guowai_teshu">您已选择</p>
            <ul>
            <notempty name="data['countryname']">
            	<li><a href="javascript:;" data-id="1" class="selon se0">{$data['countryname']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty> 
            <notempty name="data['onecatename']">
              	<li><a href="javascript:;" data-id="2" class="selon se0">{$data['onecatename']['name']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty>
            <notempty name="data['twocatename']">	
            	<li><a href="javascript:;" data-id="3" class="selon se0">{$data['twocatename']['name']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty>
            <notempty name="data['threecatename']">
            	<li><a href="javascript:;" data-id="4" class="selon se0">{$data['threecatename']['name']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty>
            <notempty name="data['typename']">
            	<li><a href="javascript:;" data-id="5" class="selon se0">{$data['typename']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty>
            <notempty name="data['teename']">
            	<li><a href="javascript:;" data-id="6" class="selon se0">{$data['teename']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty>
            <notempty name="data['pricename']">
            	<li><a href="javascript:;" data-id="7" class="selon se0">{$data['pricename']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty>
            <notempty name="data['shopname']">
            	<li><a href="javascript:;" data-id="8" class="selon se0">{$data['shopname']} <span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
            </notempty>
            </ul>
          <p class="ybs"><a href="__APP__/patent/listHTMLSUFFIX" class="btn btn-default  btn-xs delall">全部撤销</a></p>
          </div>
          <div class="col-xs-12 zlsellist_guowai noborder_guowai">
            <p>国家</p>
            <ul>
            <volist name="data['country']" id="vo">
              <li><a href="javascript:;" data-id="{$key}" <if condition="$Think.get.country eq $key">class="selon gjcs"<else/>class="gjcs"</if>>{$vo}</a></li>
            </volist>  
            </ul>
          </div>
          <div class="col-xs-12 zlsellist_guowai noborder_guowai">
            <p>行业</p>
            <ul>
            <volist name="data['onecate']" id="vo">
              <li><a href="javascript:;" data-id="{$vo['id']}" <if condition="$data['groupid'] eq $vo['id']">class="selon yjfl"<else/>class="yjfl"</if>>{$vo['name']}</a></li>
             </volist> 
            </ul>
          </div>
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="zlzls2">
            <p>二级分类</p>
            <ul>
            <volist name="data['twocate']" id="vo">
              <li><a href="javascript:;" data-id="{$vo['id']}" <if condition="$data['groupid2'] eq $vo['id']">class="selon ejfl"<else/>class="ejfl"</if>>{$vo['name']}</a></li>
             </volist> 
            </ul>
           <if condition="count($data['twocate']) gt '9'">
            <p class="ybs"><a href="javascript:;" class="btn btn-default btn-xs more2" rel="1">更多</a></p>
		   </if>          
          </div>
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="zlzls3">
            <p>三级分类</p>
            <ul>
            <volist name="data['threecate']" id="vo">
              <li><a href="javascript:;" data-id="{$vo['id']}" <if condition="$data['groupid3'] eq $vo['id']">class="selon sjfl"<else/>class="sjfl"</if>>{$vo['name']}</a></li>
             </volist> 
            </ul>
            <if condition="count($data['threecate']) gt '20'">
            <p class="ybs"><a href="javascript:;" class="btn btn-default btn-xs more3" rel="1">更多</a></p>
          	</if>
          </div>
          <div class="col-xs-12 zlsellist_guowai noborder_guowai">
            <p>类型</p>
            <ul>
            <volist name="data['tmtype']" id="vo">
              <li><a href="javascript:;" data-id="{$key}" <if condition="($Think.get.type eq $key) OR ($Think.get.type eq '' AND $key eq '0')">class="selon lx"<else/>class="lx"</if>>{$vo}</a></li>
            </volist>  
            </ul>
          </div>
          <div class="col-xs-12 zlsellist_guowai noborder_guowai">
            <p>专利权人</p>
            <ul>
            <volist name="data['tee']" id="vo">
              <li><a href="javascript:;" data-id="{$key}" <if condition="($Think.get.tee eq $key) OR ($Think.get.tee eq '' AND $key eq '0')">class="selon zlqr"<else/>class="zlqr"</if>>{$vo}</a></li>
            </volist>  
            </ul>
          </div>
          <div class="col-xs-12 zlsellist_guowai noborder_guowai">
            <p>价格</p>
            <ul>
            <volist name="data['price']" id="vo">
              <li><a href="javascript:;" data-id="{$key}" <if condition="($Think.get.maxPrice eq $vo['maxPrice']) OR ($Think.get.maxPrice eq '' AND $key eq '0')">class="selon price"<else/>class="price"</if>><if condition="$vo['minPrice'] egt '0'">{$vo['minPrice']}-</if>{$vo['maxPrice']}</a></li>
            </volist> 
            </ul>
          </div>
          <div class="col-xs-12 zlsellist_guowai zls1 noborder_guowai" id="zlzls1">
            <p>7号商城</p>
            <ul>
            <li><a href="javascript:;" data-id="0" <empty name="Think.get.shop">class="selon shop"</empty>>全部</a></li>
            <volist name="data['shop']" id="vo">
              <li><a href="javascript:;" data-id="{$vo['id']}" <if condition="($Think.get.shop eq $vo['id'])">class="selon shop"<else/>class="shop"</if>>{$vo['name']}</a></li>
            </volist>  
            </ul>
            <if condition="count($data['shop']) gt '14'">
            <p class="ybs"><a href="javascript:;" class="btn btn-default btn-xs more" rel="1">更多</a></p>
			</if>          
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="thrfloor1">
    <div class="col-xs-12 zllist_sels">
      <ul>
        <li><a href="javascript:;" data-id='1' <notempty name="Think.get.sortType">class="zllist_sels_default"<else/>class="zllist_sels_ons zllist_sels_default"</notempty>>默认</a></li>
        <li><a href="javascript:;" <if condition="$Think.get.sortType eq '1' and $Think.get.isAsc eq '1'">data-id='1'<else/>data-id='2'</if> <eq name="Think.get.sortType" value="1">class="zllist_sels_ons zllist_price_down"<else/>class="zllist_price_down"s</eq>>价格<span <if condition="$Think.get.sortType eq '1' and $Think.get.isAsc eq '1'">class="glyphicon glyphicon-arrow-down"<else/>class="glyphicon glyphicon-arrow-up"</if> aria-hidden="true"></span></a></li>
        <li><a href="javascript:;" <if condition="$Think.get.sortType eq '2' and $Think.get.isAsc eq '1'">data-id='1'<else/>data-id='2'</if> <eq name="Think.get.sortType" value="2">class="zllist_sels_ons zllist_hot_down"<else/>class="zllist_hot_down"</eq>>热门<span <if condition="$Think.get.sortType eq '2' and $Think.get.isAsc eq '1'">class="glyphicon glyphicon-arrow-down"<else/>class="glyphicon glyphicon-arrow-up"</if> aria-hidden="true"></span></a></li>
      </ul>
      <p> 共<span>{$data['count']}</span>件 </p>
    </div>
  </div>
  <!--专利-->
  <div class="thrfloor1">
  <notempty name="data['goods']">
    <div class="col-xs-12 zllist_edit">
	<volist name="data['goods']" id="vo">   
      <div class="shop_remen_one zllist_remen_one"> <a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}专利"/></a>
        <p class="more_height"><span>{$vo['price']}</span></p>
        <p class="more_height">【{$vo['tmtype']}】{$vo['title']|msubstr=0,10}</p>
        <p>{$vo['category']['name']}</p>
      <eq name="vo['shopstate']" value="3">
      <notempty name="vo['scid']">  
        <a href="javascript:;" data-type="{$vo[tmpa]}" data-id="{$vo['id']}" class="shop_list_shou sczl"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 已收藏</a>
      <else/>
      	<a href="javascript:;" data-type="{$vo[tmpa]}" data-id="{$vo['id']}" class="shop_list_shou sczl"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏专利</a>
      </notempty>
        <a href="{:U('shop/shop_list',array('shop'=>$vo['shopid']))}" title="{$vo['shopname']}" class="shop_list_shou"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 进入商城</a> 
      <else/>
      <notempty name="vo['scid']">  
        <a href="javascript:;" data-type="{$vo[tmpa]}" data-id="{$vo['id']}" class="shop_list_shous sczl"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 已收藏</a>
      <else/>
      	<a href="javascript:;" data-type="{$vo[tmpa]}" data-id="{$vo['id']}" class="shop_list_shous sczl"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏专利</a>
      </notempty>
      </eq>
      </div>
   </volist>
    </div>
   <notempty name="data['page']">
    <div class="col-xs-12 ">
		{$data['page']}
    </div>
   </notempty>
 <else/>
      <div style="margin-top: 10px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-size: 20px; padding: 20px; text-align: center;" class="col-xs-12 ">
     	暂无数据  
   </div>
 </notempty>
  </div>
  <!--主体-->
  <!--底部-->
  <include file="Public/foot" />
  <!--底部-->
</div>
<script type='text/javascript'>
//获取url参数
function get_url(id,type){
	if(type == '1'){
		var gj = id;
		var yjfl = "{$data['groupid']}";
		var ejfl = "{$data['groupid2']}";
		var sjfl = "{$data['groupid3']}";
		var lx = "{$Think.get.type}";
		var zlqr = "{$Think.get.tee}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var shop = "{$Think.get.shop}";
		var p = "{$Think.get.p}";
	}else if(type == '2'){
		var yjfl = id;
		var gj = "{$Think.get.country}";
		//var ejfl = "{$Think.get.twocate}";
		//var sjfl = "{$Think.get.threecate}";
		var lx = "{$Think.get.type}";
		var zlqr = "{$Think.get.tee}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var shop = "{$Think.get.shop}";
	}else if(type == '3'){
		var ejfl = id;
		var gj = "{$Think.get.country}";
		var yjfl = "{$data['groupid']}";
		//var sjfl = "{$Think.get.threecate}";
		var lx = "{$Think.get.type}";
		var zlqr = "{$Think.get.tee}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var shop = "{$Think.get.shop}";
	}else if(type == '4'){
		var sjfl = id;
		var gj = "{$Think.get.country}";
		var yjfl = "{$data['groupid']}";
		var ejfl = "{$data['groupid2']}";
		var lx = "{$Think.get.type}";
		var zlqr = "{$Think.get.tee}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var shop = "{$Think.get.shop}";
	}else if(type == '5'){
		var lx = id;
		var gj = "{$Think.get.country}";
		var yjfl = "{$data['groupid']}";
		var ejfl = "{$data['groupid2']}";
		var sjfl = "{$data['groupid3']}";
		var zlqr = "{$Think.get.tee}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var shop = "{$Think.get.shop}";
		var p = "{$Think.get.p}";
	}else if(type == '6'){
		var zlqr = id;
		var gj = "{$Think.get.country}";
		var yjfl = "{$data['groupid']}";
		var ejfl = "{$data['groupid2']}";
		var sjfl = "{$data['groupid3']}";
		var lx = "{$Think.get.type}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var shop = "{$Think.get.shop}";
		var p = "{$Think.get.p}";
	}else if(type == '7'){
		price = id.split('-');
		if(price=='全部'||price=='面议'||price=='100000以上'){
			var maxPrice = price;
		}else{
			var minPrice = price[0];
			var maxPrice = price[1];
		}	
		var gj = "{$Think.get.country}";
		var yjfl = "{$data['groupid']}";
		var ejfl = "{$data['groupid2']}";
		var sjfl = "{$data['groupid3']}";
		var lx = "{$Think.get.type}";
		var zlqr = "{$Think.get.tee}";
		var shop = "{$Think.get.shop}";
		var p = "{$Think.get.p}";
	}else if(type == '8'){
		var shop = id;
		var gj = "{$Think.get.country}";
		var yjfl = "{$data['groupid']}";
		var ejfl = "{$data['groupid2']}";
		var sjfl = "{$data['groupid3']}";
		var lx = "{$Think.get.type}";
		var zlqr = "{$Think.get.tee}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var p = "{$Think.get.p}";
	}else{
		var gj = "{$Think.get.country}";
		var yjfl = "{$data['groupid']}";
		var ejfl = "{$data['groupid2']}";
		var sjfl = "{$data['groupid3']}";
		var lx = "{$Think.get.type}";
		var zlqr = "{$Think.get.tee}";
		var minPrice = "{$Think.get.minPrice}";
		var maxPrice = "{$Think.get.maxPrice}";
		var shop = "{$Think.get.shop}";
		var p = "{$Think.get.p}";
	}
	var sorttype = "{$Think.get.sortType}";	
	var isasc = "{$Think.get.isAsc}";
	var url='';
	if(gj){
	  url += "country="+gj;
	}
	if(yjfl){
	  url += "&onecate="+yjfl;
	}
	if(ejfl){
	  url += "&twocate="+ejfl;
	}
	if(sjfl){
	  url += "&threecate="+sjfl;
	}
	if(lx){
	  url += "&type="+lx;
	}
	if(zlqr){
	  url += "&tee="+zlqr;
	}
	if(minPrice){
	  url += "&minPrice="+minPrice;
	}
	if(maxPrice){
	  url += "&maxPrice="+maxPrice;
	}
	if(shop){
	  url += "&shop="+shop;
	}
	if(id){
		if(sorttype == '1'&&isasc=='1'){
		  url += "&sortType=1&isAsc=1";
		}
		if(sorttype == '2'&&isasc=='1'){
		  url += "&sortType=2&isAsc=1";
		}
		if(sorttype == '1'&&!isasc){
		  url += "&sortType=1";
		}
		if(sorttype == '2'&&!isasc){
		  url += "&sortType=2";
		}
	}
	if(p){
	  url += "&p="+p;
	}		
	
	return url;
}
//点击已选择修改url链接地址
$('.se0').click(function(){
	$id = $(this).attr('data-id');
	window.location.href = patent_url('',$id);
});
//整合url链接地址
function patent_url(id,type){
	var patenturl;
	var url = get_url(id,type);
	if(url){
		patenturl = "__APP__/shop/patnetlist/listHTMLSUFFIX?";
	}else{
		patenturl = "__APP__/shop/patnetlist/listHTMLSUFFIX";
	}		
	return patenturl+url;
}
//默认排序
$('.zllist_sels_default').click(function(){
	window.location.href = patent_url();
})
//价格排序
$('.zllist_price_down').click(function(){
	var psort =  $(this).attr('data-id');
	if(psort == '1'){
		window.location.href = patent_url()+"&sortType=1";
	}else{
		window.location.href = patent_url()+"&sortType=1&isAsc=1";
	}
})
//热门排序
$('.zllist_hot_down').click(function(){
	var hsort =  $(this).attr('data-id');
	if(hsort == '1'){
		window.location.href = patent_url()+"&sortType=2";
	}else{
		window.location.href = patent_url()+"&sortType=2&isAsc=1";
	}
})
//国家，类型为1。
$('.gjcs').click(function(){
	var gj =  $(this).attr('data-id');
	window.location.href = patent_url(gj,'1');
});
//行业，类型为2。
$('.yjfl').click(function(){
	var yjfl =  $(this).attr('data-id');
	window.location.href = patent_url(yjfl,'2');
});
//二级分类，类型为3。
$('.ejfl').click(function(){
	var ejfl =  $(this).attr('data-id');
	window.location.href = patent_url(ejfl,'3');
});
//三级分类，类型为4。
$('.sjfl').click(function(){
	var sjfl =  $(this).attr('data-id');
	window.location.href = patent_url(sjfl,'4');
});
//类型，类型为5。
$('.lx').click(function(){
	var lx =  $(this).attr('data-id');
	window.location.href = patent_url(lx,'5');
});
//专利权人，类型为6。
$('.zlqr').click(function(){
	var zlqr =  $(this).attr('data-id');
	window.location.href = patent_url(zlqr,'6');
});
//价格，类型为7。
$('.price').click(function(){
	var price =  $(this).text();
	window.location.href = patent_url(price,'7');
});
//商城，类型为8。
$('.shop').click(function(){
	var shop =  $(this).attr('data-id');
	window.location.href = patent_url(shop,'8');
});
//收藏商标专利
$('.sczl').click(function(){
	var parameter={};
	var $this = $(this);
	var sid = $(this).attr('data-id');
	var type = $(this).attr('data-type');
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
$('.zllist_remen_one:nth-child(5n)').css('margin-right','0');
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
/*更多*/
$('.more2').toggle(function(){
$('#zlzls2').addClass('zlmores');
$(this).html('收起');
},function(){
$('#zlzls2').removeClass('zlmores');
$(this).html('更多');
})
/*更多*/
$('.more3').toggle(function(){
$('#zlzls3').addClass('zlmores');
$(this).html('收起');
},function(){
$('#zlzls3').removeClass('zlmores');
$(this).html('更多');
})
/*
*直接跳转分页功能
*/
$(".sub").click(function(){
    var go = $('#go').val();
    var pagenum = $('#pagecount').val();
 	if( parseInt(go) > parseInt(pagenum) || parseInt(go) < '1' || isNaN(go) ){
    	$.MsgBox.Alert("温馨提示：",'对不起，当前页无效！');
    	return false;
    } 
    $url = changeURL(window.location.href,'p',go);
    window.location.href = $url;
});
/*
* url 目标url
* arg 需要替换的参数名称
* arg_val 替换后的参数的值
* return url 参数替换后的url
*/
function changeURL(url,arg,arg_val){
    var pattern=arg+'=([^&]*)';
    var replaceText=arg+'='+arg_val; 
    if(url.match(pattern)){
        var tmp='/('+ arg+'=)([^&]*)/gi';
        tmp=url.replace(eval(tmp),replaceText);
        return tmp;
    }else{
        if(url.match('[\?]')){
            return url+'&'+replaceText;
        }else{
            return url+'?'+replaceText;
        }
    }
    return url+'\n'+arg+'\n'+arg_val;
}
/*更多*/
</script>
</body>
</html>