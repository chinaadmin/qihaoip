<div class="thrwid bottom bottom_bg">
    <div class="thrbottom thrbot_margin">
    <notempty name="data['index']">
      <div class="col-xs-12 indwx_fuwu">
		<div class="col-xs-2 index_fuwus"><img src="{$Think.STATIC_V2}images/index_dianhua.png"/></div>
		<div class="col-xs-10 index_content">
		<div class="col-xs-2 index_fuwust">
		<h2>深圳运营中心</h2>
		<p>地址：深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312</p>
		</div>
		<div class="col-xs-2 index_fuwust">
		<h2>北京运营中心</h2>
		<p>地址：北京市朝阳区望京园602号楼23层2709室</p>
		</div>
		<div class="col-xs-2 index_fuwust">
		<h2>长沙运营中心</h2>
		<p>地址：长沙市开福区营盘路通泰街欧陆经典B座2805、2806号</p>
		</div>
		<div class="col-xs-2 index_fuwust">
		<h2>武汉运营中心</h2>
		<p>地址：武汉市东湖新技术开发区光谷大道62号光谷总部国际1栋2307</p>
		</div>
		</div>
	</div>
  </notempty>
      <div class="col-xs-12 index_fs"><img src="{$Think.STATIC_V2}images/index_fs.png"/></div>
      <include file="Public/footlink" />
    </div>
</div>

<div class="thrwid gao8 bottom_last">
  <div class="thrbottoms index_border">
  <volist name="data['help']['class']" id="vo">
     <div class="col-xs-1 help index_help">
       <dl>
         <dt>{$vo['name']}</dt>
         <volist name="vo['info']" id="v">
          <dd><a href="__APP__/help/{$v['ename']}/" rel="nofollow" target="_blank">{$v['title']}</a></dd>
         </volist>
       </dl>
     </div>
  </volist>
</div>
    <!--右侧热线-->
<div class="rexian">
	<ul>
		<li><a href="javascript:;"><img
				src="<?php echo STATIC_V2;?>images/dh.jpg" /></a>
			<div class="fwrx">服务热线</div>
			<div class="fwtu0">
				<img src="<?php echo STATIC_V2;?>images/rexian.png" />
			</div></li>
		<li id="sels"><a href="javascript:;"><img
				src="<?php echo STATIC_V2;?>images/qq.jpg" /></a>
			<div class="fwrx">在线QQ</div>
			<div class="fwtu1">
				<a
					href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes"
					title="联系客服" target="_blank"><img
					src="<?php echo STATIC_V2;?>images/qq.png" /></a>
			</div></li>
		<li><a href="javascript:;"><img
				src="<?php echo STATIC_V2;?>images/wx.jpg" /></a>
			<div class="fwrx">扫扫微信</div>
			<div class="fwtu2">
				<img src="<?php echo STATIC_V2;?>images/weixin.png" />
			</div></li>
		<li><a href="javascript:scroll(0,0);" title="返回顶部"><img
				src="<?php echo STATIC_V2;?>images/top.jpg" /></a></li>
	</ul>
</div>
<!--右侧热线-->
    <div class="thrbottoms">
      <div class="col-xs-8 dizhi">
        <p><a href="__APP__/help/about/" rel="nofollow" target="_blank">关于7号网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/news/20150508/1121HTMLSUFFIX" rel="nofollow" target="_blank">官方微信</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://weibo.com/7hip/" rel="nofollow" target="_blank">官方微博</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/siteMap/" title="网站地图" target="_blank">网站地图</a>&nbsp;&nbsp;<?php if(!$data['isindex']):?>|&nbsp;&nbsp;<a href="__APP__/trademark/" title="商标转让,商标交易与管理平台,商标转让全国NO.1" target="_blank">商标转让</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/patent/" title="专利转让,专利技术转让交易与管理平台" target="_blank">专利转让</a><?php endif?></p>
        <p>{$data['siteInfo']['web_copyright']|htmlspecialchars_decode}{$data['siteInfo']['web_icp']}</p>
        <p>
                              客服热线：{$data['siteInfo']['web_400']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：{$data['siteInfo']['web_addr']}
           &nbsp;&nbsp;
		   <!-- cnzz站长统计  --> 
		   <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255557615'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1255557615%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
      	</p>
      </div>
      <div class="col-xs-2 weixin"> <img src="{$Think.STATIC_V2}images/weixin.jpg"/><br/> 关注七号网微信 </div>
      <div class="col-xs-2 weibo"> <a href="http://weibo.com/7hip" rel="nofollow" target="_blank">+关注</a> </div>
    </div>
  </div>
  <script type='text/javascript'>
/*从购物车删除*/
function del_cart(id){
$.get("/Index/Cart/del/id/"+id,null,function(data,ts){
		if(ts){
			$.MsgBox.Alerta("温馨提示：",'成功从购物车删除！',function(){
				window.location.reload();
			});
		}
	});	
}

/* 百度统计  */
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?a1406fecc996d12794f31a14042da8f6";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();

/* CNZZ统计 */
var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255557615'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1255557615%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));

/*搜索类别切换*/
$('.searchs_libie li').click(function(){
	$('.searchs_libie li a').removeClass('libie_ons');
	$(this).find("a").addClass('libie_ons');
	var ffh=$(this).find('a').attr('name');
	$('#ymyys').val(ffh);
})
/*搜索类别切换*/

/*右侧热线*/
$('.rexian li').mouseover(function(){
	var tt=$(this).index();
	$("div[class*='fwtu']").css('display','none');
	$(".fwtu"+tt).css('display','block');
	$('.rexian li').children('.fwrx').css('display','none');
	$(this).children('.fwrx').css('display','block');
});
$('.rexian li').mouseout(function(){
	var tt=$(this).index();
	$(".fwtu"+tt).css('display','none');
	$(this).children('.fwrx').css('display','none');
});

/*友情链接*/
$('.yqlj li').hover(function(){
	var tt=$(this).index();
	$("div[id*='yqljs']").css('display','none');
	$("#yqljs"+tt).css('display','block');
	$('.yqlj li a').removeClass('selst');
	$(this).find("a").addClass('selst');
});
</script>
</body>
</html>