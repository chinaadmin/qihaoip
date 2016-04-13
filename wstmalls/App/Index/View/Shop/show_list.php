<include file="Public/header" />
<!--主体-->
<!--类别选择-->
<div class=kuang listgao">
<div class="container kuangs bgyese">
<div class="row">
<form action="" method="post" id="forms">
<div class="col-xs-12 sellist" id="selects">
<p>您已选择</p>
<ul>
	<?php if($_GET['catid']){?>
		<li><a href="javascript:void(0)" id="se0" class="selon" data-url="<?php echo U('Patent/show_list');?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>"><?php echo $data['patentCategory']['name'];?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
	<?php }?>
	<?php if($_GET['type']){?>
		<li><a href="javascript:void(0)" class="selon" data-url="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>"><?php echo $data['PatentType'];?><span class="glyphicon glyphicon-remove"></span></a></li>
	<?php }?>
	<?php if($_GET['minPrice']||$_GET['maxPrice']){?>
		<li>
			<a href="javascript:void(0)" class="selon" data-url="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">
				<?php if($_GET['maxPrice'] == '面议' || $_GET['minPrice'] == ''){?>
					<?php echo $_GET['maxPrice'];?>
				<?php }elseif($_GET['minPrice'] == '0'|| $_GET['minPrice'] && $_GET['maxPrice']) {?>
					<?php echo $_GET['minPrice'];?>-<?php echo $_GET['maxPrice'];?>
				<?php }?>
				<span class="glyphicon glyphicon-remove"></span>
			</a>
		</li>
	<?php }?>
	<?php if($_GET['brand']){?>
		<li><a href="javascript:void(0)" class="selon" data-url="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>"><?php echo $_GET['brand'];?><span class="glyphicon glyphicon-remove"></span></a></li>
	<?php }?>
	
	
	
</ul>
<p class="ybs">共找到<span><?php echo $data['count']?></span>件</p>
</div>
<?php if(empty($_GET['catid'])){?>
	<div class="col-xs-12 sellist zls1 ">
	<p>专利分类</p>
	<ul>
		<?php foreach ($data['cate'] as $key => $value){?>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$value['id']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>"><?php echo $value['name'];?></a></li>
		<?php }?>
	</ul>
	<p class="ybs"><a href="javascript:" id="more"><img src="<?php echo STATIC_V2;?>images/more.jpg">更多</a></p>
	</div>
<?php }?>
<?php if(empty($_GET['type'])){?>
	<div class="col-xs-12 sellist zls2">
		<input type="hidden" name="libie2"/>
		<p>专利类型</p>
		<ul>
			<li><a href="<?php echo U('Patent/show_list');?>" class="selon">全部</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=1&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">发明专利</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=2&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">实用新型专利</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=3&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">外观设计专利</a></li>
		</ul>
	</div>
<?php }?>
<?php if(empty($_GET['minPrice']||$_GET['maxPrice'])){?>
	<div class="col-xs-12 sellist zls3">
		<input type="hidden" name="libie3"/>
		<p>交易价格</p>
		<ul>
			<li><a href="javascript:void(0)" class="selon">全部</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&maxPrice=面议&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">面议</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=0&maxPrice=2000&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">0-2000</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=2000&maxPrice=10000&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">2000-10000</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=10000&maxPrice=50000&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">10000-50000</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=50000&maxPrice=100000&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">50000-100000</a></li>
			<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&maxPrice=100000&brand=<?php echo $_GET['brand'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>">100000以上</a></li>
		</ul>
	</div>
<?php }?>
<?php if(empty($_GET['brand'])){?>
	<div class="col-xs-12 sellist zls4">
		<input type="hidden" name="libie4"/>
		<p>&nbsp;7号商城</p>
		<ul>
			<?php foreach ($data['brand'] as $value){?>
				<li><a href="<?php echo U('Patent/show_list',['catid'=>$_GET['catid']])?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $value['master'];?>&sortType=<?php echo $_GET['sortType'];?>&isASC=<?php echo $_GET['isASC'];?>&zoneType=<?php echo $_GET['zoneType'];?>" title="<?php echo $value['master'];?>"><?php echo msubstr(strip_tags($value['master']),0,4);?></a></li>
			<?php }?>	
		</ul>
	</div>
<?php }?>
</form>
</div>
</div> 
</div>
<!--类别选择-->
<!--专利列表-->
<div class="kuang">
<div class="container kuangs listgao1">
<div class="row">
<div class="col-xs-12 floor1">
<div class="col-xs-6 f1tit">
<ul><li><a href="javascript:void(0)" class="<?php if($_GET['sortType'] == '1'){?>moren<?php }?> sort-default-{$_GET['sortType']}" id="sort-default">默认排序</a></li><li><a href="javascript:void(0)" class="<?php if($_GET['sortType'] == '2'){?>moren<?php }?> sort-price-{$_GET['sortType']}" id="sort-price">价格</a></li><li><a href="javascript:void(0)" class="<?php if($_GET['sortType'] == '3'){?>moren<?php }?> sort-hot-{$_GET['sortType']}" id="sort-hot">热门</a></li></ul>
</div>
</div>
</div>
<div class="row">
	<?php foreach ($data['content'] as $value){?>
					<div class="col-xs-3 onetus">
						<div class="onetu">
							<a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
							<p class="toone"><a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank"><span>[<?php echo $value['tmtype'];?>]</span><?php echo msubstr(strip_tags($value['title']),0,12);?></a></p>
							<p>行业：<?php echo $value['name'];?></p>
							<p><span>价格：<?php echo $value['price']>'0'?$value['price']:'面议';?></span></p>
							<div class="jianshaos1">
								<a href="<?php echo U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank">
									<p><?php echo msubstr(strip_tags($value['title']),0,16);?></p>
									<p><span>价格：<?php echo $value['price']>'0'?$value['price']:'面议';?></span></p>
									<p>专利号：<?php echo $value['tmno'];?></p>
									<p>行业：<?php echo $value['name'];?></p>
								</a>
							</div>
						</div>
					</div>
	<?php }?>
<div class="col-xs-12">
{$data['page']}
</div>
</div>
</div>
</div>
<!--专利列表-->
<!--主体-->
<include file="Public/footlink" />
<include file="Public/foot" />
<script type='text/javascript'>

var sortType = '<?php echo $_GET['sortType'];?>';

var sortASC = '<?php echo $_GET['isASC'];?>';

/* 默认排序  */
$('#sort-default').click(function(){
	if(sortType == 1 && sortASC == 1){
		//window.location.href = "__APP__/Index/Patent/show_list?sortDefault="+'asc';
		window.location.href = '<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=1';
		//window.location.href = '<?php echo U('Patent/show_list',array('sortDefault'=>asc));?>';
	}else{
		//window.location.href = '<?php echo U('Patent/show_list',array('sortDefault'=>desc));?>';
		window.location.href = '<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=1&isASC=1';
		//window.location.href = "__APP__/Index/Patent/show_list?sortDefault="+'desc';
	}
})

/* 价格排序  */
$('#sort-price').click(function(){
	if(sortType == 2 && sortASC == 1){
		window.location.href = '<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=2';
		//window.location.href = "__APP__/Index/Patent/show_list?sortPrice="+'asc';
	}else{
		window.location.href = '<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=2&isASC=1';
		//window.location.href = "__APP__/Index/Patent/show_list?sortPrice="+'desc';
	}
})

/* 热门排序  */
$('#sort-hot').click(function(){
	if(sortType == 3 && sortASC == 1){
		window.location.href = '<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=3';
		//window.location.href = "__APP__/Index/Patent/show_list?sortHot="+'asc';
	}else{
		window.location.href = '<?php echo U('Patent/show_list',['catid'=>$_GET['catid']]);?>?type=<?php echo $_GET['type'];?>&minPrice=<?php echo $_GET['minPrice'];?>&maxPrice=<?php echo $_GET['maxPrice'];?>&brand=<?php echo $_GET['brand'];?>&sortType=3&isASC=1';
		//window.location.href = "__APP__/Index/Patent/show_list?sortHot="+'desc';
	}
})

/* 专利分类  */

//var n=1;
$('.zls1 li a').click(function(){
	$(this).addClass('selon');
	//$(this).attr('id','se'+n);
	var tt=$(this).parent();
	tt=tt.clone()
	var str="<span id='zls1' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
	$(tt).find('a').append(str);
})


/* $('.zls1 li a').click(function(){
	$('.zls1 li a').removeClass('selon');
	$(this).addClass('selon');
	var tt=$(this).parent();
	tt=tt.clone()
	var str="<span id='zls1' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
	$(tt).find('a').append(str);
	//$('#selects').find('ul').append(tt);
	//$('.zls2').css('display','none');
	var names=$(this).text();
	//$(this).parents('zls1').find('input').val(names);
}) */

/* 专利类型 */
$('.zls2 li a').click(function(){
	$('.zls2 li a').removeClass('selon');
	$(this).addClass('selon');
	var tt=$(this).parent();
	tt=tt.clone()
	var str="<span id='zls2' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
	$(tt).find('a').append(str);
	//$('#selects').find('ul').append(tt);
	//$('.zls2').css('display','none');
	var names=$(this).text();
	$(this).parents('zls2').find('input').val(names);
})

$('.glyphicon-remove').click(function(){
	var dataurl = $(this).parent().attr('data-url');
	var w = window.location.href = "http://www.qhw.com"+dataurl;
	//var w = window.location.href = "http://www.baidu.com";
	//alert(w);
})


/*商标与专利图片鼠标放上后显示简介*/
$(".onetu").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$(".onetu").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
/*右侧热线*/
$('.rexian li').mouseover(function(){
var tt=$(this).index();
$("div[class*='fwtu']").css('display','none');
$(".fwtu"+tt).css('display','block');
$('.rexian li').children('.fwrx').css('display','none');
$(this).children('.fwrx').css('display','block');
})
$('.rexian li').mouseout(function(){
var tt=$(this).index();
$(".fwtu"+tt).css('display','none');
$(this).children('.fwrx').css('display','none');
})
$('.rexian').mouseout(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
})
/*右侧热线*/
$(document).ready(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
$("div[class*='onetu']:nth-child(4n+4)").css('border-right','none');
$('.help').first().removeClass('col-xs-offset-1');
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
/*精品商标*/
$('.jpsbs li').hover(function(){
var tt=$(this).index();
$("div[id*='ykjsb']").css('display','none');
$("#ykjsb"+tt).css('display','block');
$('.jpsbs li').removeClass('ons');
$(this).addClass('ons');
})
/*精品商标*/

$('.zls3 li a').click(function(){
$('.zls3 li a').removeClass('selon');
$(this).addClass('selon');
var tt=$(this).parent();
tt=tt.clone()
var str="<span id='zls3' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
$(tt).find('a').append(str);
$('#selects').find('ul').append(tt);
$('.zls3').css('display','none');
var names=$(this).text();
$(this).parents('zls3').find('input').val(names);
//$('#forms').submit();
})
$('.zls4 li a').click(function(){
$('.zls4 li a').removeClass('selon');
$(this).addClass('selon');
var tt=$(this).parent();
tt=tt.clone()
var str="<span id='zls4' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
$(tt).find('a').append(str);
$('#selects').find('ul').append(tt);
$('.zls4').css('display','none');
var names=$(this).text();
$(this).parents('zls4').find('input').val(names);
//$('#forms').submit();
})

$('#selects').find('li').find('span').live('click',function() {
  var tt=$(this).attr('id');
/*   var names=$(this).parent().text();
  var send_data={'name':names};
	$.post("a.php",send_data,function(data,ts){
		if(ts){
			window.location.reload();
		}
	}) */	
  if('.'+tt=='.zls1'){
   var hh=$(this).parent().attr('id');
  $(this).parent().parent().remove();
  $('#'+hh).removeClass('selon');
  }else{
   $('.'+tt).css('display','block');
  $(this).parent().parent().remove();
  $('.'+tt).find('a').removeClass('selon');
  $('.'+tt).find('a').first().addClass('selon');
  }
});
/*选中类别*/
/*更多*/
var ff=1;
$('#more').click(function(){
if(ff==1){
$('.zls1').addClass('mores');
$('.mores .ybs a').html("<img src='<?php echo STATIC_V2;?>/images/more1.jpg'>收起");
ff=0;
}else{
$('.mores .ybs a').html("<img src='<?php echo STATIC_V2;?>/images/more.jpg'>更多");
$('.zls1').removeClass('mores');
ff=1;
}
})
/*更多*/
</script>