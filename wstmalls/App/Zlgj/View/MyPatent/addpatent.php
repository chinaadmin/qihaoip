<include file='Public:header'/>
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon">
<div class="hytit">
<div class="paleft">您当前的位置：<a href="{:U('Index/index')}">专利管家</a> > <a href="{:U('MyPatent/addpatent')}">添加专利</a></div>
</div>
<div class="hgrzy">
<!--查询-->
<div class="col-xs-12 patjb">
<div class="col-xs-12">
<div class="paform">
<form method="get" class="submitform" action="{:U('MyPatent/addpatent')}">
<div class="formdiv" style="width:628px;">
<select name="st" class="pazlm" style="text-align:center;">
	<option  <eq name="Think.get.st" value='1'>selected="selected"</eq> value="1">综合</option>
	<option  <eq name="Think.get.st" value='2'>selected="selected"</eq> value="2">专利权人</option>
	<option  <eq name="Think.get.st" value='3'>selected="selected"</eq> value="3">发明人</option>
	<option  <eq name="Think.get.st" value='4'>selected="selected"</eq> value="4">专利号</option>
	<option  <eq name="Think.get.st" value='5'>selected="selected"</eq> value="5">代理机构</option>
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
</div>
</div>
<!--查询-->
<!--查询结果-->
<div id="AjaxLoading" class="showbox">
	<div class="loadingWord"><img src="<?php echo STATIC_V2;?>images/waiting.gif">加载中，请稍候...</div>
</div>
<div class="overlay"></div>
<notempty name="data['arr']">
<div class="col-xs-12 pazhlist" >
          <table cellpadding="0" cellspacing="0" class="tablesths">
            <thead>
              <tr>
                <th width="8%">序号</th>
                <th width="7%">类型</th>
                <th width="15%">专利号</th>
                <th width="20%">专利名</th>
                <th width="20%">权利人</th>
                <th width="10%">添加状态</th>
                <th width="10%">操作</th>
              </tr>
            </thead>
            <tbody>
            <volist name="data['arr']" id="vo">
              <tr>
                <td width="8%"><input type="checkbox" name="gwct{$i}" value="{$i}"/>&nbsp;{$i}</td>
                <td width="7%">
	                <if condition="$vo['1'] eq '发明'">
		                <span class="famin">{$vo.1}</span>
		            <elseif condition="$vo['1'] eq '实用'"/>
		                <span class="shiyou">{$vo.1}</span>
		            <elseif condition="$vo['1'] eq '外观'"/>
		                <span class="waiguan">{$vo.1}</span>
		            <elseif condition="$vo['1'] eq '中国台湾'"/>
		                <span class="taiwan">{$vo.1}</span>
		            <elseif condition="$vo['1'] eq '中国香港'"/>
		                <span class="xianggang" >{$vo.1}</span>
	                </if>
                </td>
                <td width="15%" ><a href="{:U('PatentTrade/detail')}/{$vo[4]}/{$vo[5]}" target="_blank">{$vo.4}</a></td>
                <td width="20%"><div><a href="{:U('PatentTrade/detail')}/{$vo[4]}/{$vo[5]}" target="_blank">{$vo.2|htmlspecialchars_decode|msubstr=0,15}</a></div></td>
                <td width="20%"><div><a href="{:U('PatentTrade/show')}?st={$Think.get.st}&q={$vo.6}&Fruit1={$Think.get.Fruit1}&Fruit2={$Think.get.Fruit2}&Fruit3={$Think.get.Fruit3}&Fruit4={$Think.get.Fruit4}&Fruit5={$Think.get.Fruit5}&Fruit6={$Think.get.Fruit6}&Fruit7={$Think.get.Fruit7}" target="_blank">{$vo.6|msubstr=0,15}</a></div></td>
                <td width="10%">
                	<eq name="vo[100]" value="已添加">
						<a href="javascript:;" title="点击删除" onClick="del('{$vo[0]}','{$vo[1]}','{$vo[2]}','{$vo[3]}','{$vo[4]}','{$vo[5]}','{$vo[6]}','{$vo[7]}','{$vo[8]}','{$vo[9]}','{$vo[11]}','{$vo[12]}','{$vo[13]}',this);"><span class="ckjgs">{$vo[100]}</span></a>
					<else/>
						<a href="javascript:;" title="点击添加" onClick="add('{$vo[0]}','{$vo[1]}','{$vo[2]}','{$vo[3]}','{$vo[4]}','{$vo[5]}','{$vo[6]}','{$vo[7]}','{$vo[8]}','{$vo[9]}','{$vo[11]}','{$vo[12]}','{$vo[13]}',this);"><span class="ckjg">{$vo[100]}</span></a>
					</eq>
                </td>
                <td width="20%">
                	<a href="{:U('PatentTrade/detail')}/{$vo[4]}/{$vo[5]}" target="_blank" title="查看详情" class="tabaction"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                	<eq name="vo[100]" value="已添加">
	                	<a href="javascript:;" title="点击删除" onClick="andel('{$vo[0]}','{$vo[1]}','{$vo[2]}','{$vo[3]}','{$vo[4]}','{$vo[5]}','{$vo[6]}','{$vo[7]}','{$vo[8]}','{$vo[9]}','{$vo[11]}','{$vo[12]}','{$vo[13]}',this);" class="tabaction"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                	<else/>
                		<a href="javascript:;" title="点击添加" onClick="anadd('{$vo[0]}','{$vo[1]}','{$vo[2]}','{$vo[3]}','{$vo[4]}','{$vo[5]}','{$vo[6]}','{$vo[7]}','{$vo[8]}','{$vo[9]}','{$vo[11]}','{$vo[12]}','{$vo[13]}',this);" class="tabaction"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
	                </eq>
                </td>
              </tr>
                  <input type="hidden" id="{$vo.0}" name="gwct{$i}" value="{$vo.0}"/>
				  <input type="hidden" id="{$vo.1}" name="gwct{$i}" value="{$vo.1}"/>
				  <input type="hidden" id="{$vo.2|str_replace=',','，',###}" name="gwct{$i}" value="{$vo.2|str_replace=',','，',###}"/>
				  <input type="hidden" id="{$vo.3}" name="gwct{$i}" value="{$vo.3}"/>
				  <input type="hidden" id="{$vo.4}" name="gwct{$i}" value="{$vo.4}"/>
				  <input type="hidden" id="{$vo.5}" name="gwct{$i}" value="{$vo.5}"/>
				  <input type="hidden" id="{$vo.6|strip_tags}" name="gwct{$i}" value="{$vo.6|strip_tags}"/>
				  <input type="hidden" id="{$vo.7}" name="gwct{$i}" value="{$vo.7}"/>
				  <input type="hidden" id="{$vo.8}" name="gwct{$i}" value="{$vo.8}"/>
				  <input type="hidden" id="{$vo.9}" name="gwct{$i}" value="{$vo.9}"/>
				  <input type="hidden" id="{$vo.11}" name="gwct{$i}" value="{$vo.11}"/>
				  <input type="hidden" id="{$vo.12}" name="gwct{$i}" value="{$vo.12}"/>
				  <input type="hidden" id="{$vo.13}" name="gwct{$i}" value="{$vo.13}"/>
				  <input type="hidden" id="|" name="gwct{$i}" value="|"/>
             </volist>
			  <tr>
                <td colspan="7">
				<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件专利</div>
				<div class="seltot"><a href="javascript:;" class="btn btn-default paadd">添加</a>  <a href="javascript:;" class="btn btn-default adddel">删除</a></div>
				</td>
             </tr>
            </tbody>
          </table>
	  	{$data['page']}
	</div>
<else />
	<!--手动添加-->
	<div class="add_zl paform" style="padding:120px 0 0 0;">
	<notempty name="data['paraurl']">
		<p>对不起,没有找到相关信息,再试一试吧！</p>
	<else/>
		<p>请输入您要查询的信息，进行查询添加！</p>
	</notempty>
		<p>您也可以手动添加<a href="javascript:;"  class="btn btn-primary">手动添加专利</a></p>
	</div>
</notempty>
<div class="col-xs-12 hand_zl" style="display:none;">
<div class="col-xs-12 patits">手动添加专利 </div>
<form class="form-horizontal" action="{:U('MyPatent/addManual')}" method="post" enctype="multipart/form-data">
<!-- <form class="form-horizontal"> -->
<div class="col-xs-12 hand_content">
<div class="col-xs-6">
<div class="form-group">
    <div class="col-xs-2 scrzgmc">申请号:&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="appnum" value="" class="form-control sqh" placeholder="申请号" />
    </div>
  </div>
 <div class="form-group">
    <div class="col-xs-2 scrzgmc">专利名称:&nbsp;   </div>
    <div class="col-xs-7 ">
    <input type="text" name="ptname" value="" class="form-control zlm" placeholder="专利名称" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">权利人:&nbsp;   </div>
    <div class="col-xs-7 ">
    <input type="text" name="holder" value="" class="form-control qlr" placeholder="权利人" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">发明人:&nbsp;   </div>
    <div class="col-xs-7 ">
    <input type="text" name="inventor" value="" class="form-control fmr" placeholder="发明人" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">专利类型:&nbsp;   </div>
    <div class="col-xs-10 ">
<label class="radio-inline">
  <input type="radio" name="pttype" value="1" checked="checked">发明
</label>
<label class="radio-inline">
  <input type="radio" name="pttype" value="2">实用新型
</label>
<label class="radio-inline">
  <input type="radio" name="pttype" value="3">外观设计
</label>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">申请日期:&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="appdate" value="" class="form-control sqr" placeholder="申请日期" id="J-xl"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">法律状态:&nbsp;   </div>
    <div class="col-xs-7 ">
    <input type="text" name="legstatus" value="" class="form-control flzt" placeholder="请输入该专利的当前法律状态" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">申请证书扫描件:&nbsp;   </div>
	<div class="col-xs-10">
    <input type='text' id='hrtextfields1' class='txt' placeholder="申请证书扫描件"/>  
    <input type='button' class='btnt posts' value='上传文件' />
    <input type="file" name="smwj" class="file" onChange="document.getElementById('hrtextfields1').value=this.value" />
  </div>
  </div>
  <button class="btn btn-warning hand_right" type="submit">保存添加</button>
  <!-- <button class="btn btn-warning hand_right" type="button">保存添加</button> -->
</div>
<div class="col-xs-6">
<input type="hidden" name="postthumb1" id="thumb1" value=""/>
  <input type="hidden" name="postthumb2" id="thumb2" value=""/>
  <input type="hidden" name="postthumb3" id="thumb3" value=""/>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">专利图片:&nbsp;   </div>
    <div class="col-xs-10 allimg">
	<div class="hsqtp hand_img_width">
    <div class="yulan hand_img"><a href="javascript:void(0)" class="posts" name="1"><img id="preview1" width="100" height="100" src="<?php echo STATIC_V2;?>images/dendai.png"/></a></div>
	<div class="dianji dianji_zl"><p><a href="javascript:void(0)" class="posts" name="1"><img src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="1"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp hand_img_width">
    <div class="yulan hand_img"><a href="javascript:void(0)" class="posts" name="2"><img id="preview2" width="100" height="100" src="<?php echo STATIC_V2;?>images/dendai.png"/></a></div>
	<div class="dianji dianji_zl"><p><a href="javascript:void(0)" class="posts" name="2"><img src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="2"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp hand_img_width">
    <div class="yulan hand_img"><a href="javascript:void(0)" class="posts" name="3"><img id="preview3" width="100" height="100" src="<?php echo STATIC_V2;?>images/dendai.png"/></a></div>
	<div class="dianji dianji_zl"><p><a href="javascript:void(0)" class="posts" name="3"><img src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="3"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a></p></div>
	</div>
    </div>
  </div>
  <div class="hand_bigimg">
  <img src="<?php echo STATIC_V2;?>images/hand_bigimg.jpg" id="bigimgs"/>
  </div>
</div>
</div>
</form>
</div>
<!--手动添加-->
<!--查询结果-->
</div>
<include file='Public:footer'/>
</div>
</div>
<!--右侧内容-->
<!--上传图片弹框-->
<div id="zzjs_net" class="zzjs_net"></div>
<div id="gg" class="tupian">
	<div class="quxiaoss">
		<a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaoss.png"/></a>
	</div>
     <p>图片上传</p>
	 <ul>
	 	<li><a href="javascript:void(0)"  class="addbors">本地图片</a></li>
	 	<li><a href="javascript:void(0)" >网络图片</a></li>
	 </ul>
	 <div class="quyu" id="bedicon0">
		 <form id='formFile' name='formFile' method="post" action="/Index/Upload/img"  target='frameFile' enctype="multipart/form-data">
		 	<input id="ff" type="file" name="file" class="wanless"/>
		 </form>
		 <iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
	 	<br/><br/>
	 	<a href="javascript:void(0)" class="changekk" >上传</a><a href="javascript:void(0)" class="clocks">取消</a>
	 </div>
	 <div class="quyu1" id="bedicon1">
	 	<input type="text" name="ffg" id="ljsst" class="wanless" placeholder="http://"/><br/><br/>
	 	<a href="javascript:void(0)" class="changekk">上传</a><a href="javascript:void(0)" class="clocks">取消</a>
	 </div>
</div>
<!--上传图片弹框-->
</div>
<!--主体-->
<script type='text/javascript'>
//手动添加数据保存
/* $('.hand_right').click(function(){
	var from = $('.form-horizontal').serialize();
	alert(from);
	return false; 
	$.post("{:U('MyPatent/addManual')}')",from,function(data){
		$.MsgBoxgj.Alert("温馨提示：",'添加成功！');
	})
}); */
$(".form-horizontal").submit(function(){
	/* 判断表单数据是否为空  */
	if($('.sqh').val() == ''){
		$.MsgBoxgj.Alert("温馨提示：",'请填写申请号！');
		//alert('请填写申请号！');
		//$(".sqh").focus();
		return false;
	}
	if($('.zlm').val() == ''){
		$.MsgBoxgj.Alert("温馨提示：",'请填写专利名称！');
		return false;
	}
	if($('.qlr').val() == ''){
		$.MsgBoxgj.Alert("温馨提示：",'请填写权利人！');
		return false;
	}
	if($('.fmr').val() == ''){
		$.MsgBoxgj.Alert("温馨提示：",'请填写发明人！');
		return false;
	}
	if($('#J-xl').val() == ''){
		$.MsgBoxgj.Alert("温馨提示：",'请填写申请日期！');
		return false;
	}
	if($('.flzt').val() == ''){
		$.MsgBoxgj.Alert("温馨提示：",'请填写法律状态！');
		return false;
	}
	 
});
//手动添加数据保存

//点击手动添加专利
$('.btn-primary').click(function(){
	$('.hand_zl').css('display','block');
});

//申请日期时间控件
laydate({
    elem: '#J-xl'
});

/*本地与网络上传切换*/
$('.tupian li').click(function(){
var tt=$(this).index();
$("div[id*='bedicon']").css('display','none');
$("#bedicon"+tt).css('display','block');
$('.tupian li a').removeClass('addbors');
$(this).find("a").addClass('addbors');
})
/*本地与网络上传切换*/

/*本地图片上传处理*/
$('.quyu .changekk').click(function(){
	$('#formFile').submit();
	clocks();
})

function uploadSuccess(msg) {
    var re = msg.split('|');
    if (re[0] == 'success') {
		$('#preview'+xiabiao).attr('src', re[1]);
		$('#thumb'+xiabiao).val(re[1]);
		$('#bigimgs').attr('src', re[1]);
	} else {
		alert(re[1]);
	}
}
/*本地图片上传处理*/

/*网络图片上传处理*/
$('.quyu1 .changekk').click(function(){
var tt=$('#ljsst').val();
var send_data={'file':tt};
$.post("/Index/Upload/img",send_data,function(data){
var re = data.split('|');
    if (re[0] == 'success') {
		$('#preview'+xiabiao).attr('src', re[1]);
		$('#thumb'+xiabiao).val(re[1]);
	} else {
		alert(re[1]);
	}
		})
		clocks();
})
/*网络图片上传处理*/

/*开启或关闭上传图片弹框*/
function clocks(){
$('#gg').css('display','none');	
$('#zzjs_net').css('display','none');
$(document.body).css("overflow","visible");
}
$('.quxiaoss a').click(function(){
clocks();
})
$('.quyu .clocks').click(function(){
clocks();
})
$('.quyu1 .clocks').click(function(){
clocks();
})
var xiabiao='';
$(".posts").click(function(){
xiabiao=$(this).attr('name');
$('#gg').css('display','block');
$('#zzjs_net').css('display','block');
$(document.body).css('overflow','hidden');
})
/*开启或关闭上传图片弹框*/

/*删除图片*/
var xbt='';
$('.deletes').click(function(){
xbt=$(this).attr('name');
$('#preview'+xbt).attr("src","images/dendai.png");
$('#thumb'+xbt).val('');
})
/*删除图片*/

/*选择显示页数*/
$('.xianshit').change(function(){
$(this).parent().submit();
})
/*选择显示页数*/

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

/*选中数量*/
function zoushu(){
	var num=$("input[name*='gwct']:checked").length;
	$("#nums").html(num);
}

/*全选*/
$('#alls').click(function(){
if(this.checked){
$(".tablesths").find("input[name*='gwct']").prop("checked",true);
}else{
$(".tablesths").find("input[name*='gwct']").removeAttr("checked");
}
zoushu();
})
$(".tablesths input[name*='gwct']").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
zoushu();
})
/*全选*/
$('.submitform').submit(function(){
	loading();
})
/*批量删除*/
$('.adddel').click(function(){
	var num = $("input[name*='gwct']:checked").length;
	$.MsgBoxgj.Confirm("温馨提示","您确定要取消添加选中的"+num+"件专利？",function (){
		var row=new Array();
		var str = new Array();
		var n=0;
		var ctc = 0;
		$("input[name*='gwct']").each(function(){
			if(this.checked){
				ctc = $(this).attr("name");
				$("input[name*='"+ctc+"']").each(function(){
					var ids=$(this).val();
					row[n]=ids;
					n++;
				})
			}
		})
		rows = row.join(",");
		loading();
		var send_data={'id':rows};
		$.post("__APP__/Zlgj/MyPatent/keydelajax",send_data,function(data,status){
			if (data){
				delloading();
				window.location.reload();
			}
		})
	});		
})
/*批量删除*/
function loading(){
	var h = $(document).height();
	$(".overlay").css({"height": h});	
	$(".overlay").css({'display':'block','opacity':'0.5'});
	$(".showbox").stop(true).animate({'margin-top':'300px','opacity':'1'},200);
}
function delloading(){
	$(".overlay").css({"height": 0});	
	$(".overlay").css({'display':'none'});
	$(".showbox").stop(true).animate({'margin-top':'0px','opacity':'0'},200);
}
/*批量添加*/
$('.paadd').click(function(){
	var row=new Array();
	var n=0;
	var ctc = 0;
	var num = $("input[name*='gwct']:checked").length;
	if(!num){
		$.MsgBoxgj.Alert("温馨提示：","您未选中，请选择！");
		return false;
	}
	$(".tablesths input[name*='gwct']").each(function(){
		if(this.checked){
			ctc = $(this).attr("name");
			$("input[name*='"+ctc+"']").each(function(){
				var ids=$(this).val();
				row[n]=ids;
				n++;
			})
		}
	})
	rows = row.join(",");
	loading();
	var send_data={'id':rows};
	$.post("__APP__/Zlgj/MyPatent/keyaddajax",send_data,function(data){
		if(data){
			delloading();
			$.MsgBoxgj.Alerta("温馨提示：",data,function(){
				window.location.reload();
			});
		}	
	})	
}) 
/*批量添加*/

/* 单个添加 */
var add = function(pic,type,title,typeid,zlh,zlpage,ptp,applydate,mclass,zy,intor,agency,legalstatus,obj){
	loading();
	var send_data={'pic':pic,'type':type,'title':title,'typeid':typeid,'ptno':zlh,'pagenum':zlpage,'ptp':ptp,'date':applydate,'mclass':mclass,'info':zy,'intor':intor,'agency':agency,'legalstatus':legalstatus};
	$.post("__APP__/Zlgj/MyPatent/addpatentajax",send_data,function(data,status){
	 	if(data){
	 		delloading();
	 		$.MsgBoxgj.Alert("温馨提示：",data);
			$(obj).find('.ckjg').removeClass();
			$(obj).find('span').addClass('ckjgs').text('已添加');
			$(obj).attr('title','点击删除');
			$(obj).attr('onClick','del("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
			$(obj).parent().next().find('a').eq(1).attr('title','点击删除');
			$(obj).parent().next().find('a').eq(1).attr('onclick','andel("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
			$(obj).parent().next().find('a').eq(1).find('span').attr('class','glyphicon glyphicon-minus');
		}	
	})
}


/* 单个按钮添加 */
var anadd = function(pic,type,title,typeid,zlh,zlpage,ptp,applydate,mclass,zy,intor,agency,legalstatus,obj){
	loading();
	var send_data={'pic':pic,'type':type,'title':title,'typeid':typeid,'ptno':zlh,'pagenum':zlpage,'ptp':ptp,'date':applydate,'mclass':mclass,'info':zy,'intor':intor,'agency':agency,'legalstatus':legalstatus};
	$.post("__APP__/Zlgj/MyPatent/addpatentajax",send_data,function(data,status){
	 	if(data){
	 		delloading();
	 		$.MsgBoxgj.Alert("温馨提示：",data);
	 		$(obj).attr('title','点击删除');
	 		$(obj).find('span').attr('class','glyphicon glyphicon-minus');
	 		$(obj).attr('onClick','andel("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
	 		$(obj).parent().prev().find('a').attr('title','点击删除');
	 		$(obj).parent().prev().find('a').attr('onClick','del("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
	 		$(obj).parent().prev().find('.ckjg').removeClass();
	 		$(obj).parent().prev().find('span').addClass('ckjgs').text('已添加');
		}	
	})
}

/* 单个删除 */
var del = function(pic,type,title,typeid,zlh,zlpage,ptp,applydate,mclass,zy,intor,agency,legalstatus,obj){
	$.MsgBoxgj.Confirm("温馨提示","您确定要删除选中的1件专利？",function (){
		loading();
		var send_data={'pic':pic,'type':type,'title':title,'typeid':typeid,'ptno':zlh,'pagenum':zlpage,'ptp':ptp,'date':applydate,'mclass':mclass,'info':zy,'intor':intor,'agency':agency,'legalstatus':legalstatus};
		$.post("__APP__/Zlgj/MyPatent/addpatentajax",send_data,function(data,status){
			if(data){
				delloading();
				$.MsgBoxgj.Alert("温馨提示：",data);
				$(obj).find('.ckjgs').removeClass();
				$(obj).find('span').addClass('ckjg').text('未添加');
				$(obj).attr('title','点击添加');
				$(obj).attr('onClick','add("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
				$(obj).parent().next().find('a').eq(1).attr('title','点击添加');
				$(obj).parent().next().find('a').eq(1).attr('onclick','anadd("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
				$(obj).parent().next().find('a').eq(1).find('span').attr('class','glyphicon glyphicon-plus');
			}	
		})
	});
}

/* 单个按钮删除 */
var andel = function(pic,type,title,typeid,zlh,zlpage,ptp,applydate,mclass,zy,intor,agency,legalstatus,obj){
	$.MsgBoxgj.Confirm("温馨提示","您确定要删除选中的1件专利？",function (){ 
		loading();
		var send_data={'pic':pic,'type':type,'title':title,'typeid':typeid,'ptno':zlh,'pagenum':zlpage,'ptp':ptp,'date':applydate,'mclass':mclass,'info':zy,'intor':intor,'agency':agency,'legalstatus':legalstatus};
		$.post("__APP__/Zlgj/MyPatent/addpatentajax",send_data,function(data,status){
		 	if(data){
		 		delloading();
		 		$.MsgBoxgj.Alert("温馨提示：",data);
		 		$(obj).attr('title','点击添加');
		 		$(obj).find('span').attr('class','glyphicon glyphicon-plus');
		 		$(obj).attr('onClick','anadd("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
		 		$(obj).parent().prev().find('a').attr('title','点击添加');
		 		$(obj).parent().prev().find('a').attr('onClick','add("'+pic+'","'+type+'","'+title+'","'+typeid+'","'+zlh+'","'+zlpage+'","'+ptp+'","'+applydate+'","'+mclass+'","'+zy+'","'+intor+'","'+agency+'","'+legalstatus+'",this)');
		 		$(obj).parent().prev().find('.ckjgs').removeClass();
		 		$(obj).parent().prev().find('span').addClass('ckjg').text('未添加');
			}	
		})
	});
}

/*导航切换*/
$(".newhnavlist li").hover(function(){
	if(!$(this).find('a').hasClass('selnav')){
		var tu=$(this).find('img').attr('src');
		var len=tu.length;
		len=len-4;
		tu=tu.substring(0,len);
		$(this).find('img').attr('src',tu+'s.png');
	}
},function(){
	if(!$(this).find('a').hasClass('selnav')){
		var tu=$(this).find('img').attr('src');
		var len=tu.length;
		len=len-5;
		tu=tu.substring(0,len);
		$(this).find('img').attr('src',tu+'.png');
	}
}
)
/*导航切换*/
$(document).ready(function(){
$(".tablesths tr:odd").css('background','#F5F5F5');
});

$(".tablesths tr:odd").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','#F5F5F5');
  }
);
$(".tablesths tr:even").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','none');
  }
);
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
	$('.ddtits').click(function(){
	$(this).parent().children('.ddxiangqins').slideToggle("slow");

	})
});
</script>
</body>
</html>