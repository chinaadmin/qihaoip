<include file='Public:header_list'/>
<!--logo与搜索-->
<div class="zllogo_search">
<div class="zllist_logo">
<a href="http://www.qihaoip.com/"><img src="<?php echo STATIC_V2;?>images/zl_logo.png"/></a>
</div>
<div class="zllist_search">
<div class="col-xs-12 patjb">
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
<input type="text" name="q" class="pasearch" placeholder="<notempty name="Think.get.q">{$Think.get.q}</notempty>"/>
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
<div class="zlhzlcon">
  <!--右侧内容-->
  <div class="zlhconright">
  <div class="zl_list">
  <div class="col-xs-12 zl_list_selall">
  <p>检索结果[{$count|default=0}] 耗时：{$htime|default=0}</p>
  </div>
  <div class="col-xs-12 zllist_content">
  <volist name="arr" id="vo">
	  <div class="col-xs-12 zllist_one">
	  	<div class="zllist_one_img"><a href="{:U('PatentTrade/detail')}/{$vo[4]}/{$vo[5]}"><img src="{$vo[0]}"/></a></div>
		  <div class="zllist_one_contents">
			  <div class="col-xs-12 zllist_one_title">
			  	<div class="zllist_one_titleright"><h2><a href="{:U('PatentTrade/detail')}/{$vo[4]}/{$vo[5]}">【{$vo[1]}】 {$vo[4]} {$vo[2]|htmlspecialchars_decode}</a><span class="gokai">{$vo[13]}</span></h2></div>
			  </div>
			  <div class="col-xs-12 zllist_one_p">
			  	<p><span>权利人:</span>{$vo[6]|htmlspecialchars_decode}</p>
			  	<p><span>申请日:</span>{$vo[7]}</p>
			  	<p><span>主分类号:</span>{$vo[8]}</p>
			  </div>
			  <div class="col-xs-12 zllist_one_jianjie">
			 	 <span>摘要:</span>{$vo[9]|htmlspecialchars_decode}
			  </div>
		  </div>
	  </div>
   </volist>
   <if condition="($arr neq '') AND ($count gt 10)">
	 {$page}
   </if>
  </div>
  </div>
  <div class="zl_list_right">
  <div class="col-xs-12 zllist_hot">
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
  <!--右侧内容-->
</div>
<include file='Public:footer_list'/>
<script type='text/javascript'>
/*选中数量*/
function zoushu(){
	var num=$("input[name*='gwtc']:checked").length;
	$("#nums").html(num);
}
	
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