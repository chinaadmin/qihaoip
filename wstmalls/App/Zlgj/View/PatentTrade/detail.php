<include file='Public:header_list'/>
<!--logo与搜索-->
<div class="zllogo_search">
<div class="zllist_logo">
<img src="<?php echo STATIC_V2;?>images/zl_logo.png"/>
</div>
<div class="zllist_search">
<div class="col-xs-12 patjb">
<!--
<div class="col-xs-12 patyhs">
您当前为<span>普通会员</span>,共能添加<span>100</span>件商标,已添加商标<span>92</span>件专利。
</div>
-->
<div class="col-xs-12">
<div class="zlpaform">
<form method="get" action="{:U('PatentTrade/show')}">
<div class="formdiv">
<select name="st" class="pazlm">
	<option <eq name="Think.get.st" value='1'>selected="selected"</eq> value="1">综合</option>
	<option <eq name="Think.get.st" value='2'>selected="selected"</eq> value="2">专利权人</option>
	<option <eq name="Think.get.st" value='3'>selected="selected"</eq> value="3">发明人</option>
	<option <eq name="Think.get.st" value='4'>selected="selected"</eq> value="4">专利号</option>
	<option <eq name="Think.get.st" value='5'>selected="selected"</eq> value="5">代理机构</option>
</select>
<input type="text" name="q" class="pasearch" placeholder="<notempty name="Think.get.q">{$Think.get.q}</notempty>" />
<input type="submit" value="检索" class="pasub"/>
</div>
<div class="pacheckbox">
	<span><input name="Fruit1" <if condition="$Think.get.Fruit1 neq '' OR $type eq ''">checked="checked"</if> type='checkbox' value='63' class="allsel">全选</span>
	<span><input name="Fruit2" <if condition="$Think.get.Fruit2 neq '' OR $type eq ''">checked="checked"</if> type='checkbox' value='1' class="allone">发明专利</span>
	<span><input name="Fruit3" <if condition="$Think.get.Fruit3 neq '' OR $type eq ''">checked="checked"</if> type='checkbox' value='2' class="allone">实用新型</span>
	<span><input name="Fruit4" <if condition="$Think.get.Fruit4 neq '' OR $type eq ''">checked="checked"</if> type='checkbox' value='4' class="allone">外观设计</span>
	<span><input name="Fruit5" <if condition="$Think.get.Fruit5 neq '' OR $type eq ''">checked="checked"</if> type='checkbox' value='8' class="allone">发明授权</span>
	<span><input name="Fruit6" <if condition="$Think.get.Fruit6 neq '' OR $type eq ''">checked="checked"</if> type='checkbox' value='16' class="allone">中国台湾</span>
	<span><input name="Fruit7" <if condition="$Think.get.Fruit7 neq '' OR $type eq ''">checked="checked"</if> type='checkbox' value='32' class="allone">香港特区</span>
</div>
</form>
</div>
<div class="tips">温馨提示：可输入权利人,专利名称等信息,输入全称查询结果最佳</div>
</div>
</div>
</div>
</div>
<!--logo与搜索-->
<div class="zlhzlcon_detail">
 <div class="zldetail_nav">
 <ul>
 <li><a href="javascript:;" class="zldetail_navon">公开详情</a></li>
<notempty name="detail['authnum']">
 <li><a href="javascript:;">授权详情</a></li>
</notempty>
 <li style="display:none;"><a href="#" title="#">申请全文</a></li>
 <li style="display:none;"><a href="#" title="#">授权全文</a></li>
 </ul>
 <div class="detail_addzl"><a href="{:U('MyPatent/addpatent')}">添加专利</a></div>
 <div class="detail_addzl" style="display:none;"><a href="#" title="#">下载</a></div>
</div>
</div>
<div class="zldetail_con">
<div class="zldetail_cons" >
<div class="zldetail_cons_left" id="yqljs0">
<div class="col-xs-12 zldetail_floor1">
<div class="zllist_one_titleright zllist_one_titlerights">
	<h2>
		<if condition="$detail['type'] eq 1">
			【发明】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 2"/>
			【外观】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 3"/>
			【实用】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 4"/>
			【中国台湾】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 5"/>
			【中国香港】&nbsp;&nbsp;
		</if>
		{$detail['patentnum']|default="暂无信息"} {$detail['cname']|default="暂无信息"|htmlspecialchars_decode}<span class="youxiao">{$detail['legalstatus']|default="暂无信息"}</span>
	</h2>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【优先权】：{$detail['priority']|default="暂无信息"}</p>
<p class="pright">【申请日】：<span>{$detail['applydate']|date="Y-m-d",###}</span></p>
</div>
<div class="col-xs-12 zldetail_col">
	<p class="pleft">【发明/设计人】：
		<span>
			<volist name="detail['inventor']" id="vo">
		    	<a href="{:U('PatentTrade/show')}?q={$vo}" title="{$vo}" target="_blank">{$vo}<if condition="$i neq count($detail['inventor'])">、</if></a>
		    </volist>
		</span>
	</p>
<p class="pright">【公开/公告号】：{$detail['opennum']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【申请/专利权人】：
	<span>
	   <volist name="detail['patentee']" id="vo">
	    	<a href="{:U('PatentTrade/show')}?q={$vo}" title="{$vo}" target="_blank">{$vo}<if condition="$i neq count($detail['patentee'])">、</if></a>
	   </volist>	
	</span>
</p>
<p class="pright">【公开/公告日】：{$detail['announcenum']|date="Y-m-d",###}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【专利权人地址】：{$detail['patenteeaddr']|default="暂无信息"};</p>
<p class="pright">【国省代码】:{$detail['provincecode']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【专利代理机构】：{$detail['agency']|default="暂无信息"}</p>
<p class="pright">【主分类号】：<span>{$detail['mainclassnum']|default="暂无信息"}</span></p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【代理人】：{$detail['agent']|default="暂无信息"}</p>
<p class="pright">【分类号】：<span>B32B33/00;B32B15/18</span></p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【分案申请】：{$detail['divisionapply']|default="暂无信息"}</p>
<p class="pright">【范畴分类】：{$detail['cateclass']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【颁证日】：{$detail['certified']|default="暂无信息"}</p>
<p class="pright">【国际申请】：{$detail['internatapply']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【国际公布】：{$detail['internatpublic']|default="暂无信息"}</p>
<p class="pright">【进入国家日期】：{$detail['intodate']|default="暂无信息"}</p>
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_futu">
<div class="zldetail_tit">【附图】:</div>
<img src="{$detail['picture']|default='暂无信息'}"/>
</div>
<div class="zldetail_zhaiyao">
<div class="zldetail_tit">【摘要】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['info']|default="暂无信息"|htmlspecialchars_decode}
</div>
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_tit">【主权项】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['sovereignitem']|default="暂无信息"}
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_tit">【法律状态】：</div>
<div class="zldetail_zhaiyaos">
<table cellpadding="0" cellspacing="0" class="zldetail_law">
<thead>
<tr>
<th width="25%">法律状态公告日</th>
<th width="20%">法律状态</th>
<th width="55%">法律状态详情</th>
</tr>
</thead>
<tbody>
<volist name="detail['lawstatus']" id="vo">
	<tr>
	<td width="25%">{$vo['andate']}</td>
	<td width="20%">{$vo['legalstatus']}</td>
	<td width="55%">{$vo['legalstatusdetails']}</td>
	</tr>
</volist>
</tbody>
</table>
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_tit">【引证文献】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['citingliterature']|default="暂无信息"}
</div>
</div>
<div class="col-xs-12 zldetail_floor3">
<div class="zldetail_tit">【同族专利】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['kinpatent']|default="暂无信息"}
</div>
</div>
</div>
<notempty name="detail['authnum']">
<div class="zldetail_cons_lefts" id="yqljs1">
<div class="col-xs-12 zldetail_floor1">
<div class="zllist_one_titleright zllist_one_titlerights">
	<h2>
		<if condition="$detail['type'] eq 1">
			【发明】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 2"/>
			【外观】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 3"/>
			【实用】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 4"/>
			【中国台湾】&nbsp;&nbsp;
		<elseif condition="$detail['type'] eq 5"/>
			【中国香港】&nbsp;&nbsp;
		</if>
		{$detail['patentnum']|default="暂无信息"} {$detail['cname']|default="暂无信息"|htmlspecialchars_decode}<span class="youxiao">{$detail['legalstatus']|default="暂无信息"}</span></h2></div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【优先权】：{$detail['priority']|default="暂无信息"}</p>
<p class="pright">【申请日】：<span>{$detail['applydate']|date="Y-m-d",###}</span></p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【发明/设计人】：
	<span>
		<volist name="detail['inventor']" id="vo">
		    <a href="{:U('PatentTrade/show')}?q={$vo}" title="{$vo}" target="_blank">{$vo}<if condition="$i neq count($detail['inventor'])">、</if></a>
		</volist>
	</span>
</p>
<p class="pright">【授权公告号】：{$detail['authnum']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【申请/专利权人】：
	<span>
	   <volist name="detail['patentee']" id="vo">
	    	<a href="{:U('PatentTrade/show')}?q={$vo}" title="{$vo}" target="_blank">{$vo}<if condition="$i neq count($detail['patentee'])">、</if></a>
	   </volist>
    </span>
</p>
<p class="pright">【授权公告日】：{$detail['authdate']|date="Y-m-d",###}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【专利权人地址】：{$detail['patenteeaddr']|default="暂无信息"};</p>
<p class="pright">【国省代码】:{$detail['provincecode']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【专利代理机构】：{$detail['agency']|default="暂无信息"}</p>
<p class="pright">【主分类号】：<span>{$detail['mainclassnum']|default="暂无信息"}</span></p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【代理人】：{$detail['agent']|default="暂无信息"}</p>
<p class="pright">【分类号】：<span>B32B33/00;B32B15/18</span></p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【分案申请】：{$detail['divisionapply']|default="暂无信息"}</p>
<p class="pright">【范畴分类】：{$detail['cateclass']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【颁证日】：{$detail['certified']|default="暂无信息"}</p>
<p class="pright">【国际申请】：{$detail['internatapply']|default="暂无信息"}</p>
</div>
<div class="col-xs-12 zldetail_col">
<p class="pleft">【国际公布】：{$detail['internatpublic']|default="暂无信息"}</p>
<p class="pright">【进入国家日期】：{$detail['intodate']|default="暂无信息"}</p>
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_futu">
<div class="zldetail_tit">【附图】：</div>
<img src="{$detail['picture']|default='暂无信息'}"/>
</div>
<div class="zldetail_zhaiyao">
<div class="zldetail_tit">【摘要】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['info']|default="暂无信息"|htmlspecialchars_decode}
</div>
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_tit">【主权项】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['sovereignitem']|default="暂无信息"}
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_tit">【法律状态】：</div>
<div class="zldetail_zhaiyaos">
<table cellpadding="0" cellspacing="0" class="zldetail_law">
<thead>
<tr>
<th width="25%">法律状态公告日</th>
<th width="20%">法律状态</th>
<th width="55%">法律状态详情</th>
</tr>
</thead>
<tbody>
<volist name="detail['lawstatus']" id="vo">
	<tr>
	<td width="25%">{$vo['andate']}</td>
	<td width="20%">{$vo['legalstatus']}</td>
	<td width="55%">{$vo['legalstatusdetails']}</td>
	</tr>
</volist>
</tbody>
</table>
</div>
</div>
<div class="col-xs-12 zldetail_floor2">
<div class="zldetail_tit">【引证文献】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['citingliterature']|default="暂无信息"}
</div>
</div>
<div class="col-xs-12 zldetail_floor3">
<div class="zldetail_tit">【同族专利】：</div>
<div class="zldetail_zhaiyaos">
	{$detail['kinpatent']|default="暂无信息"}
</div>
</div>
</div>
</notempty>
<div style="display:none;" class="zldetail_cons_lefts zldetail_imgwid" id="yqljs2">
<img src="/static/style/images/zldetail_img.jpg"/>
2
</div>
<div style="display:none;" class="zldetail_cons_lefts zldetail_imgwid" id="yqljs3">
<img src="/static/style/images/zldetail_img.jpg"/>
3
</div>
<div class="zldetail_cons_right">
<div class="zl_list_right">
  <div class="col-xs-12 zllist_hot zldetail_hot">
  <div class="col-xs-12 zllist_hots">
  <div class="col-xs-12 zllist_hots_title">相关推荐</div>
  <volist name="data['recommend']" id="vo">
	  <div class="zllist_hots_img">
		  <div class="zllist_hots_imgs">
		  	<a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}"/></a>
		  </div>
	  	  <a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,10}</a>
	  </div>
   </volist>
  </div>
  <div class="col-xs-12 zllist_hots">
  <div class="col-xs-12 zllist_hots_title">热门专利</div>
  <volist name="data['zl']" id="vo">
  	<volist name="vo['array']" id="v">
	  <div class="zllist_hots_img">
		  <div class="zllist_hots_imgs">
		  	<a href="__APP__/patent/{$v['id']}HTMLSUFFIX" title="{$v['title']}" target="_blank"><img src="{$v['img']}"/></a>
		  </div>
	  	  <a href="__APP__/patent/{$v['id']}HTMLSUFFIX" title="{$v['title']}" target="_blank">{$v['title']|msubstr=0,10}</a>
	  </div>
	</volist>
  </volist>
  </div>
  </div>
  </div>
</div>
</div>
</div>
<include file='Public:footer_list'/>
<script type='text/javascript'>
/* 下载功能 */
$(".down").click(function(){
	var ptno = "{$detail['patentnum']}";
	window.location.href = "{:U('PatentTrade/expOne')}"+'/ptno/'+ptno;
})
/*
 * 检索时判断用户是否输入内容和选择了专利类型
 */
$(".pasub").click(function(){  
	var num = $("input[name*='Fruit']:checked").length;
	var pasearch = $(".pasearch").val();
    if(num == ''){  
    	$.MsgBoxgj.Alert('温馨提示：','至少选中一种专利类型！');
        return false;  
    }else if(pasearch == ''){
    	$.MsgBoxgj.Alert('温馨提示：','请输入内容！');
    	return false;
    }// 禁用 form 提交，页面不会跳转  
}); 

/*导航切换*/
$('.zldetail_nav li').click(function(){
var tt=$(this).index();
$("div[id*='yqljs']").css('display','none');
$("#yqljs"+tt).css('display','block');
$('.zldetail_nav li a').removeClass('zldetail_navon');
$(this).find("a").addClass('zldetail_navon');
})
/*导航切换*/
$(document).ready(function(){
$('.zllist_ons').parent().children('dd').slideToggle("slow");
});
$(function(){
	$(".zlhconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});

});
$(function () {
		$(window).scroll(function(){
			if ($(window).scrollTop()>183){
				$(".zlhconleft").addClass("zlhconleft_fixed");
			}else{
				$(".zlhconleft").removeClass("zlhconleft_fixed");
			}
		});
	});
/*搜索全选*/
$('.allsel').click(function(){
if(this.checked){
$(".pacheckbox").find("input[name*='Fruit']").prop("checked",true);
}else{
$(".pacheckbox").find("input[name*='Fruit']").removeAttr("checked");
}
})
$(".allone").click(function(){
if(!(this.checked)){
$('.allsel').removeAttr("checked");
}
})

/*搜索全选*/

</script>
</body>
</html>
