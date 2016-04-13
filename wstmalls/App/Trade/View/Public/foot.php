<!-- div class="dibus">
<p>©2014-2018 7号网 版权所有ICP经营性许可证：粤ICP备注5024104号-1</p>
<p>客服热线：400-889-7080 地址：深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312 </p>
</div -->
<script type='text/javascript'>
/*导航切换*/
$(".newhnavlist li").hover(function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-4;
tu=tu.substring(0,len);
//alert(tu+'s.png');
$(this).find('img').attr('src',tu+'s.png');
}
},function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-5;
tu=tu.substring(0,len);
//alert(tu+'.png');
$(this).find('img').attr('src',tu+'.png');
}
}
)
/*导航切换*/
 $(document).ready(function(){
$('.onth').parents('dl').children('dd').slideToggle("slow");
});
</script>