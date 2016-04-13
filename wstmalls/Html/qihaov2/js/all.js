/*友情链接*/
function links(){
$('.yqlj li').hover(function(){
var tt=$(this).index();
$("div[id*='yqljs']").css('display','none');
$("#yqljs"+tt).css('display','block');
$('.yqlj li a').removeClass('selst');
$(this).find("a").addClass('selst');
})
}
/*友情链接*/
/*右侧热线*/
function rexian(){
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
$(document).ready(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
});
}
/*右侧热线*/

/*加入购物车*/
function add_cart(id){
$.get("/Index/Cart/add/id/"+id,null,function(data,ts){
		if(ts){
			$.MsgBox.Alert("温馨提示：",'成功加入购物车');
		}
	})	
}
/*加入购物车*/

/*从购物车删除*/
function del_cart(id){
$.get("/Index/Cart/del/id/"+id,null,function(data,ts){
		if(ts){
			$.MsgBox.Alert("温馨提示：",'成功从购物车删除！');
			window.location.reload();
		}
	})	
}
/*从购物车删除*/
/*公共载入*/
function commons(){
$(document).ready(function(){
$('.yanse li:eq(1)').css('border-left','none');
$('.help').first().removeClass('col-xs-offset-1');
});
}
/*公共载入*/

/*网站首页js*/
function indexfun(){
/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/
/*幻灯*/
$(".www51buycom").slide({ titCell:".num ul" , mainCell:".51buypic" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
/*幻灯*/
/*商标与专利图片鼠标放上后显示简介*/
$("div[class*='vsbtust']").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$("div[class*='vsbtust']").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
/*成功案例鼠标放上后显示简介*/
$("div[class*='vnewsmintu']").mouseover(function(){
$(this).children("div[class*='jianshaost']").css('display','block');
})
$("div[class*='vnewsmintu']").mouseout(function(){
$(this).children("div[class*='jianshaost']").css('display','none');
})
/*成功案例鼠标放上后显示简介*/
/*商标类别切换*/
$('.vqiehuandhsb li').click(function(){
var lastone=$('.vqiehuandhsb li').length-1;
var tt=$(this).index();
if(tt!=lastone){
$("div[id*='vsbxianqing']").css('display','none');
$("#vsbxianqing"+tt).css('display','block');
$('.vqiehuandhsb li a').removeClass('vselst');
$(this).find("a").addClass('vselst');
}
})
/*商标类别切换*/
/*专利类别切换*/
$('.vqiehuandhzl li').click(function(){
var lastone=$('.vqiehuandhzl li').length-1;
var tt=$(this).index();
if(tt!=lastone){
$("div[id*='vzlxianqing']").css('display','none');
$("#vzlxianqing"+tt).css('display','block');
$('.vqiehuandhzl li a').removeClass('vselst');
$(this).find("a").addClass('vselst');
}
})
/*专利类别切换*/
$(document).ready(function(){
$("div[class*='vnewsmintu']:nth-child(2n+1)").css('margin-right','10px');
$(".vnewsmintu:eq(0)").css('margin-bottom','8px');
$(".vnewsmintu:eq(1)").css('margin-bottom','8px');
});
links();
rexian();
commons();
}
/*网站首页js*/

/*商标首页js*/
function sbindexfun(){
/*banner*/
$(".www51buycoms").hover(function(){
	$(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
	$(this).find(".prev,.next").hide();
})
/*鼠标移过某个按钮 高亮显示*/
$(".prev,.next").hover(function(){
	$(this).fadeTo("show",0.7);
},function(){
	$(this).fadeTo("show",0.1);
})
$(".www51buycoms").slide({ titCell:".num ul" , mainCell:".51buypics" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
/*banner*/
/*商标与专利图片鼠标放上后显示简介*/
$("div[class*='tuijian']").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$("div[class*='tuijian']").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
$(document).ready(function(){
$("#scrollDiv").Scroll({line:1,speed:550,timer:1500,up:"but_up",down:"but_down"});
$(".jpsb:gt(4)").css('border-bottom','none');
$(".jpsb1:gt(4)").css('border-bottom','none');
$(".jpsb1:eq(4)").css('border-right','none');
$(".jpsb1:eq(10)").css('border-right','none');
$(".jpsb:eq(4)").css('border-right','none');
$(".jpsb:eq(10)").css('border-right','none');
$(".qjdcon1:nth-child(3n+3)").css('border-right','none');
$("div[class*='tuijians']:even").css('border-top','none');
$("div[class*='tuijiant']:nth-child(6n+1)").css('border-top','none');
$("div[class*='tuijiant']:nth-child(6n+2)").css('border-top','none');
});
/*左侧二级导航*/
$(function(){
	$('.all-goods .item').hover(function(){
	    $(this).addClass('active').find('s').hide();
		$(this).find('.product-wrap').show();
	},function(){
	    $(this).removeClass('active').find('s').show();
		$(this).find('.product-wrap').hide();
	});
	});
/*左侧二级导航*/
/*精品商标*/
$('.jpsbs li').hover(function(){
var tt=$(this).index();
$("div[id*='ykjsb']").css('display','none');
$("#ykjsb"+tt).css('display','block');
$('.jpsbs li').removeClass('ons');
$(this).addClass('ons');
})
/*精品商标*/
rexian();
links();
commons();
}
/*商标首页js*/

/*商标列表页js*/
function sblistfun(){
/*商标与专利图片鼠标放上后显示简介*/
$(".onetuhh").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$(".onetuhh").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
/*选中类别*/
var val = $('input[name="shu"]').val();
$('.sub').live('click',function(){
	var val = $('input[name="shu"]').val();
	var data = $(this).parent().parent().prev().find('a').attr('href');
	var url = data.replace(/p\/\d+/,'p/'+val);
	window.location.href= url;
})
/*选中类别*/
/*更多*/
var ff=1;
$('#more').click(function(){
if(ff==1){
$('.zls1').addClass('mores');
$('.mores .ybs a').html("<img src='/qihaov2/images/more1.jpg'>收起");
ff=0;
}else{
$('.mores .ybs a').html("<img src='/qihaov2/images/more.jpg'>更多");
$('.zls1').removeClass('mores');
ff=1;
}
})
/*更多*/
$(document).ready(function(){
$("div[class*='onetu']:nth-child(4n+4)").css('border-right','none');
});
rexian();
commons();
}
/*商标列表页js*/

/*专利列表页js*/
function zllistfun(){
/*商标与专利图片鼠标放上后显示简介*/
$(".onetuhh").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$(".onetuhh").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
/*选中类别*/
/* 专利分类  */
var n=1;
$('.zls1 li a').click(function(){
	$(this).addClass('selon');
	//$(this).attr('id','se'+n);
	var tt=$(this).parent();
	tt=tt.clone()
	var str="<span id='zls1' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
	$(tt).find('a').append(str);
})

/* 专利类型 */
$('.zls2 li a').click(function(){
	$('.zls2 li a').removeClass('selon');
	$(this).addClass('selon');
	var tt=$(this).parent();
	tt=tt.clone()
	var str="<span id='zls2' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
	$(tt).find('a').append(str);
	var names=$(this).text();
	$(this).parents('zls2').find('input').val(names);
})

$('.zls3 li a').click(function(){
$('.zls3 li a').removeClass('selon');
$(this).addClass('selon');
var tt=$(this).parent();
tt=tt.clone()
var str="<span id='zls3' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
$(tt).find('a').append(str);
//$('#selects').find('ul').append(tt);
//$('.zls3').css('display','none');
var names=$(this).text();
$(this).parents('zls3').find('input').val(names);
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
})

$('.zls5 li a').click(function(){
$('.zls5 li a').removeClass('selon');
$(this).addClass('selon');
var tt=$(this).parent();
tt=tt.clone()
var str="<span id='zls5' class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
$(tt).find('a').append(str);
//$('#selects').find('ul').append(tt);
//$('.zls5').css('display','none');
var names=$(this).text();
$(this).parents('zls5').find('input').val(names);
})

$('#selects').find('li').find('span').live('click',function() {
  var tt=$(this).attr('id');
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
$('.mores .ybs a').html("<img src='/qihaov2/images/more1.jpg'>收起");
ff=0;
}else{
$('.mores .ybs a').html("<img src='/qihaov2/images/more.jpg'>更多");
$('.zls1').removeClass('mores');
ff=1;
}
})
/*更多*/
$(document).ready(function(){
$("div[class*='onetu']:nth-child(4n+4)").css('border-right','none');
});
rexian();
commons();
}
/*专利列表页js*/

/*商标详情页面js*/
function sbdetail(){
/*商标与专利图片鼠标放上后显示简介*/
$(".onetuhh").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$(".onetuhh").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
/*详情切换*/
$('.xqdanhao li').hover(function(){
var tt=$(this).index();
$("div[id*='sbxqcon']").css('display','none');
$("#sbxqcon"+tt).css('display','block');
$('.xqdanhao li a').removeClass('sselt');
$(this).find("a").addClass('sselt');
})
/*详情切换*/
/*图片切换放大*/
$(function(){
	$("#thumblist li a").hover(function(){
		$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
		$(".jqzoom").attr('src',$(this).find("img").attr("mid"));	
	});
});
/*图片切换放大*/
$(document).ready(function(){
$("div[class*='onetu']:nth-child(4n+4)").css('border-right','none');
});
rexian();
commons();
}
/*商标详情页面js*/

/*新闻首页js*/
function newsindexfun(){
/*经典案例图片鼠标放上后显示简介*/
$("div[class*='jdbigtus']").mouseover(function(){
$(this).children("div[class*='jianshaost']").css('display','block');
})
$("div[class*='jdbigtus']").mouseout(function(){
$(this).children("div[class*='jianshaost']").css('display','none');
})
/*经典案例图片鼠标放上后显示简介*/
$(".www51buycomnew").slide({ titCell:".num ul" , mainCell:".51buypicnew" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
/*发明趣闻滚动*/
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 908;//显示框宽度
		scrollPic_02.pageWidth      = 153; //翻页宽度
		scrollPic_02.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
/*发明趣闻滚动*/
rexian();
links();
commons();
}
/*新闻首页js*/

/*新闻列表页js*/
function newslistfun(){
/*商标与专利图片鼠标放上后显示简介*/
$("div[class*='tuijian']").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$("div[class*='tuijian']").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
$(document).ready(function(){
$('.newmidconsts:eq(0)').css('border-top','none');
});
rexian();
commons();
}
/*新闻列表页js*/

/*新闻详情页面js*/
function newsdetailfun(){
/*商标与专利图片鼠标放上后显示简介*/
$("div[class*='tuijian']").mouseover(function(){
$(this).children("div[class*='jianshao']").css('display','block');
})
$("div[class*='tuijian']").mouseout(function(){
$(this).children("div[class*='jianshao']").css('display','none');
})
/*商标与专利图片鼠标放上后显示简介*/
$(document).ready(function(){
$('.newmidconsts:eq(0)').css('border-top','none');
$('.zixu li:even').css('margin-left','0px');
/*字体变化大小*/
var size=$('.details').css('fontSize');
var len=size.length;
len=len-2;
size=size.substring(0,len);
$('.da').click(function(){
size++;
$('.details').css('fontSize',size+'px');
})
$('.xiao').click(function(){
size--;
$('.details').css('fontSize',size+'px');
})
/*字体变化大小*/
});
rexian();
commons();
}
/*新闻详情页面js*/

