<!--右侧热线-->
<div class="rexian">
	<ul>
		<li>
			<a href="javascript:;"><img src="<?php echo STATIC_V2;?>images/dh.jpg" /></a>
			<div class="fwrx">服务热线</div>
			<div class="fwtu0"><img src="<?php echo STATIC_V2;?>images/rexian.png" /></div>
		</li>
		<li id="sels">
			<a href="javascript:;"><img src="<?php echo STATIC_V2;?>images/qq.jpg" /></a>
			<div class="fwrx">在线QQ</div>
			<div class="fwtu1">
				<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" title="联系客服" target="_blank"><img src="<?php echo STATIC_V2;?>images/qq.png" /></a>
			</div>
		</li>
		<li>
			<a href="javascript:;"><img src="<?php echo STATIC_V2;?>images/wx.jpg" /></a>
			<div class="fwrx">扫扫微信</div>
			<div class="fwtu2"><img src="<?php echo STATIC_V2;?>images/weixin.png" /></div>
		</li>
		<li>
			<a href="javascript:scroll(0,0);" title="返回顶部"><img src="<?php echo STATIC_V2;?>images/top.jpg" /></a>
		</li>
	</ul>
</div>
<!--右侧热线-->


<!--底部-->
<div class="thrwid bottom bottom_bg">
<div class="thrbottom">
<div class="col-xs-12 indwx_fuwu">
<div class="col-xs-2 index_fuwus"><a href="http://wpa.qq.com/msgrd?v=3&uin=21556911&site=qq&menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/index_dianhua.png"/></a></div>
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
<div class="col-xs-12 index_fs">
<img src="<?php echo STATIC_V2;?>images/index_fs.png"/>
</div>
</div>
</div>
<div class="thrwid gao8 bottom_last">
	<div class="thrbottoms index_border">
	<volist name="data['help']['class']" id="vo">
		<div class="col-xs-1 help index_help">
			<dl>
			<dt>{$vo['name']}</dt>
			<volist name="vo['info']" id="v">
				<dd><a href="__APP__/news/{$v['date']}/{$v['id']}HTMLSUFFIX" rel="nofollow"  target="_blank">{$v['title']}</a></dd>
			</volist>	
			</dl>
		</div>
	</volist>
	</div>
<div class="thrbottoms">
<div class="col-xs-8 dizhi">
<p><a href="__APP__/news/20151125/1021.html" rel="nofollow" target="_blank">关于7号网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/news/20150508/1121.html" rel="nofollow" target="_blank">官方微信</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://weibo.com/7hip/" rel="nofollow" target="_blank">官方微博</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/siteMap/" title="网站地图" target="_blank">网站地图</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/trademark/" title="商标转让,商标交易与管理平台,商标转让全国NO.1" target="_blank">商标转让</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/patent/" title="专利转让,专利技术转让交易与管理平台" target="_blank">专利转让</a></p>
<p>{$data['siteInfo']['web_copyright']|htmlspecialchars_decode}{$data['siteInfo']['web_icp']}</p>
<p>
	客服热线：{$data['siteInfo']['web_400']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：{$data['siteInfo']['web_addr']}
	&nbsp;&nbsp;
	<!-- cnzz站长统计  --> 
	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255557615'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1255557615%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
</p>
</div>
<div class="col-xs-2 weixin">
<img src="<?php echo STATIC_V2;?>images/weixin.jpg"/><br/>关注七号网微信
</div>
<div class="col-xs-2 weibo">
<a href="http://weibo.com/7hip" rel="nofollow"  target="_blank">+关注</a>
</div>
<!-- <div class="col-xs-12 anquan">
	<a href="#" title="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/anquan.png"/></a><a href="#" title="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/anquan1.jpg"/></a><a href="#" title="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/anquan.png"/></a><a href="#" title="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/anquan1.jpg"/></a><a href="#" title="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/anquan1.jpg"/></a>
</div> -->
</div>
</div>
<!--底部-->

<script type='text/javascript'>
/*
*直接跳转分页功能
*/
$(".sub").click(function(){
    var go = $('#go').val();
    var pagenum = $('#pagecount').val();
 	if(parseInt(go) > parseInt(pagenum) || parseInt(go) < '1' || isNaN(go)){
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
</script>