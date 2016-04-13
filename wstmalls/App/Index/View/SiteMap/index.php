<include file="Public/header" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="http://www.qihaoip.com/skin/default/ie6.css"/>
<![endif]-->
<style>
.pad20{ padding:10px 0px; line-height:35px; font-size:14px;}
.about_dl{ padding:10px 0; border-bottom:1px dotted #CCC;}
.about_dl dt{ font-size:18px; padding-bottom:15px; }
.about_dl dt a:link, .about_dl dt a:visited, .about_dl dt a:active{color:#ff6600;}
.about_dl dd a{ margin:0 8px; line-height:30px; white-space:nowrap;}
.about_dl a:link, .about_dl a:visited, .about_dl a:active {  color:#555; text-decoration:none;}
.thrbottom{min-height:20px;padding-top:10px;width:960px;}
</style>
</head>
<body>

<div class="w listgao">
<div class="pos thrbottom" style=" background:none;">当前位置: <a href="/">首页</a> &raquo; <a  class="ctitle" href="__APP__/siteMap/">网站地图</a></div>
<div class="bgw thrbottom">
<div style="border-bottom:#C0C0C0 1px dotted;margin:5px 15px 5px 15px;line-height:50px; font-size:18px; text-align:center" class="t_c pad20">网站地图</div>
<div class="pad20">
	<dl class="about_dl"> 	
		<dt><a target="_blank" title="商标市场" href="__APP__/trademark/">商标市场</a></dt>     
		<dd>     
			<?php foreach ($data['tmcate'] as $value){?>
				<a target="_blank" title="<?php echo $value['name'];?>" href="<?php echo U('trademark/type'.$value['id']);?>"><?php echo $value['name'];?></a>     
			<?php }?>
		</dd>   
	</dl>   
	<dl class="about_dl"> 	   
		<dt style="color:#ff6600;">商标类别</dt>      
		<dd> 
			<?php foreach ($data['tmsubcate'] as $value){?>
				<a target="_blank" title="<?php echo $value['name'];?>" href="<?php echo $value['link'];?>"><?php echo $value['name'];?></a> 
			<?php }?>	
		</dd> 
	</dl>             
	<dl class="about_dl"> 	
		<dt><a target="_blank" title="专利市场" href="__APP__/patent/">专利市场</a></dt>     
		<dd> 
			<?php foreach ($data['ptcate'] as $value){?>
				<a target="_blank" title="<?php echo $value['name'];?>" href="__APP__/patent/list<?php echo $value['id'];?>HTMLSUFFIX"><?php echo $value['name'];?></a>          
			<?php }?>
		</dd>  
	</dl>      
	<dl class="about_dl"> 	
		<dt style="color:#ff6600;">专利小类</dt>     
		<dd> 
			<?php foreach ($data['ptsubcate'] as $value){?>
				<a target="_blank" title="<?php echo $value['name'];?>" href="__APP__/patent/list<?php echo $value['id'];?>HTMLSUFFIX"><?php echo $value['name'];?></a>  
			<?php }?>
		</dd> 
	</dl>   
	<dl class="about_dl"> 	  
		<dt style="color:#ff6600;">专利类别</dt>     
		<dd>
			<?php foreach ($data['ptmin'] as $value){?>
				<a target="_blank" title="<?php echo $value['name'];?>"  href="<?php echo $value['link'];?>"><?php echo $value['name'];?></a> 
			<?php }?>
		</dd> 
	</dl>         
	<dl class="about_dl"> 	
		<dt><a target="_blank" title="新闻资讯" href="__APP__/news/">新闻资讯</a></dt>     
		<dd> 
			<?php foreach ($data['news'] as $value){?>
				<a target="_blank" title="<?php echo $value['name'];?>" href="<?php echo $value['link'];?>"><?php echo $value['name'];?></a>   
			<?php }?>	         
		</dd> 
	</dl>
</div>
<br/>
</div>
</div>
<include file="Public/footlink_home" />
<include file="Public/foot" />
<script type='text/javascript'>
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
$("div[class*='vnewsmintu']:nth-child(2n+1)").css('margin-right','10px');
$('.yanse li:eq(1)').css('border-left','none');
$(".vnewsmintu:eq(0)").css('margin-bottom','8px');
$(".vnewsmintu:eq(1)").css('margin-bottom','8px');
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
</script>
 */