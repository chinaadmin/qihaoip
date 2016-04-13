<include file="Public/header"/>
<!--logo与导航-->
<!--头部-->
<!--主体-->
<div class="hzlcon">
<!--左侧导航-->
<include file="Public/left"/>
<!--左侧导航-->
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="{:U('Seller/index')}">卖家中心</a> > 编辑商标
</div>
<div class="hgrzy">
<div class="col-xs-12 sell_creat">
<ul>
<li><a href="javascript:;" class="selcreat">编辑商标</a></li>
</ul>
</div>
<div class="col-xs-12 fbzlform creat_border" id="yqljs0">
<form class="form-horizontal" id="retrade">
 <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标名称:&nbsp;   </div>
    <div class="col-xs-4 ">
    <input type="text" name="tradename" class="form-control" placeholder="商标名称" value="{$data['tm']['title']}"/>
    </div>
	<div class="col-xs-2 wdfbwz">图形商标则填“图形”</div>
  </div>
   <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标类别:&nbsp;   </div>
    <div class="col-xs-2 hjuli">
	<select class="form-control" id="Member-Seller-Items-groupid"  name="tradecate" onchange="select1('Member-Seller-Items-groupid','Member-Seller-Items-groupid2');">
		<?php get_select('items', $data['tm']['groupid'],'level=1 and tmpa='.$data['tm']['tmpa']) ?>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">二级分类:&nbsp;   </div>
    <div class="col-xs-2 hjuli">
	<select class="form-control" id="Member-Seller-Items-groupid2"  name="tradecate1" onchange="select1('Member-Seller-Items-groupid2','Member-Seller-Items-groupid3');">
		<option value ="0">未选择</option>
		<?php get_select('items', $data['tm']['groupid2'],'level=2 and parentid='.$data['tm']['groupid']) ?>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">三级分类:&nbsp;   </div>
    <div class="col-xs-2 hjuli">
	<select class="form-control" id="Member-Seller-Items-groupid3"  name="tradecate2" onchange="select1('Member-Seller-Items-groupid3','Member-Seller-Items-groupid4');">
		<option value ="0">未选择</option>
		<?php get_select('items', $data['tm']['groupid3'],'level=3 and parentid='.$data['tm']['groupid2']) ?>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标注册号:&nbsp;   </div>
    <div class="col-xs-3">
    <input type="text" name="tradeno" class="form-control" placeholder="商标注册号" value="{$data['tm']['tmno']}"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>权利人:&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradeholder" class="form-control" placeholder="权利人" value="{$data['tm']['master']}"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">商标参考价:&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradeprice" class="form-control" placeholder="商标参考价" value="{$data['tm']['price']}"/>
    </div>
	<div class="col-xs-2 wdfbwz">
		<input type="checkbox" name="tradepoundage" <eq name="data['tm']['poundage']" value="1">checked="checked"</eq> value="1"/>该价格包含<span style="color:#FF6600;">1000.00</span>商标转让手续费
	</div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>申请日期:&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradesqr" class="form-control" placeholder="申请日期" id="J-xl" value="{$data['tm']['tmregdate']}"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">注册日期:&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradezcr" class="form-control" placeholder="注册日期" id="J-x2" value="{$data['tm']['tmregstart']}"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">截止日期:&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradejzr" class="form-control" placeholder="申请日期" id="J-x3" value="{$data['tm']['tmregend']}"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">交易方式:&nbsp;   </div>
    <div class="col-xs-4 ">
    <volist name="data['tm']['tmway']" id="vo">
	    <label class="checkbox-inline">
	  		<input type="checkbox" <if condition="$data['tm']['tmtradeway'] eq $key">checked ='checked'</if> name="tradeway[]" value="{$key}">{$vo}
		</label>
	</volist>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">组合类型:&nbsp;   </div>
    <div class="col-xs-8 ">
    <volist name="data['tm']['tmcomtype']" id="vo">
	    <label class="radio-inline">
	  		<input type="radio" <if condition="$data['tm']['tmtype'] eq $key">checked ='checked'</if> name="tradecomtype" value="{$key}">{$vo}
		</label>
	</volist>	
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商品服务/项目:&nbsp;   </div>
    <div class="col-xs-9">
    <textarea class="form-control" name="tradeproject" rows="3" placeholder="请输入服务列表，每项服务以|隔开">{$data['tm']['tmlimit']}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">商标注册所在地区:&nbsp;   </div>
	<div class="col-xs-2 hjuli">
<select class="form-control" name="traderegion">
	<volist name="data['tm']['tmregion']" id="vo">
	  <option <if condition="$data['tm']['tmregarea'] eq $vo['id']">selected = "selected"</if> value="{$key}">{$vo}</option>
	</volist>
</select>
    </div>
  </div>
  <input type="hidden" name="type" value="trade"/>
  <input type="hidden" name="uid" value="{$data['tm']['id']}"/>
  <input type="hidden" name="tradeimg[]" id="thumb1" value="{$data['tm']['img']['0']}"/>
  <input type="hidden" name="tradeimg[]" id="thumb2" value="{$data['tm']['img']['1']}"/>
  <input type="hidden" name="tradeimg[]" id="thumb3" value="{$data['tm']['img']['2']}"/>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标图样:&nbsp;   </div>
    <div class="col-xs-9 allimg">
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="1"><img id="preview1" width="140" height="120" src="{$data['tm']['img']['0']|default='/qihaov2/images/dendai.png'}"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="1"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="1"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="2"><img id="preview2" width="140" height="120" src="{$data['tm']['img']['1']|default='/qihaov2/images/dendai.png'}"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="2"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="2"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="3"><img id="preview3" width="140" height="120" src="{$data['tm']['img']['2']|default='/qihaov2/images/dendai.png'}"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="3"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="3"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">卖点展示:&nbsp;   </div>
    <div class="col-xs-9">
    <textarea class="form-control" name="tradesellpoint" rows="3" placeholder="为了更好的展示您的商品，建议填写卖点展示">{$data['tm']['introduce']}</textarea>
    </div>
  </div>
  
   <div class="col-xs-12">
  <button type="button" class="btn btn-warning weizhidaxiao tradequeding">确定</button>
  </div>
</form>
</div>
</div>
<include file="Public/foot"/>
</div>
</div>
<!--右侧内容-->
<!--上传图片弹框-->
<div id="zzjs_net" class="zzjs_net"></div>
<div id="gg" class="tupian">
<div class="quxiaoss"><a href="javascript:void(0)" ><img src="/qihaov2/images/quxiaoss.png"/></a></div>
     <p>图片上传</p>
	 <ul>
	 <li><a href="javascript:void(0)"  class="addbors">本地图片</a></li>
	 <li><a href="javascript:void(0)" >网络图片</a></li>
	 </ul>
	 <div class="quyu" id="bedicon0">
	 <form id='formFile' name='formFile' method="post" action="/Index/Upload/img" target='frameFile' enctype="multipart/form-data">
	 <input id="ff" type="file" name="file"  class="wanless"/>
	 </form>
	 <iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
	 <br/><br/>
	 <a href="javascript:void(0)" class="changekk" >上传</a><a href="javascript:void(0)" class="clocks">取消</a></div>
	 <div class="quyu1" id="bedicon1"><input type="text" name="ffg" id="ljsst" class="wanless" placeholder="http://"/><br/><br/><a href="javascript:void(0)" class="changekk">上传</a><a href="javascript:void(0)" class="clocks">取消</a></div>
</div>
<!--上传图片弹框-->
</div>
<!--主体-->
<!--右侧热线-->

<!--右侧热线-->
<!--底部-->


<!--底部-->
<script type='text/javascript'>
//获取select选择器下面的子分类
function select(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	if (id==0){return false;}
	$.get("/Member/Seller/get_select/tmpa/"+id,function(data,status){
		$("#"+id2).html(data);
	});
}

function select1(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	if (id==0){return false;}
	$.get("/Member/Seller/get_select/id/"+id,function(data,status){
		$("#"+id2).html(data);
	});
}
//发布商标信息
$('.tradequeding').click(function(){
	if($("input[name='tradename']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'商标名称不能为空！',function(){
			$("input[name='tradename']").focus();
		});
		return false;
	}
	if($("input[name='tradeno']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'商标注册号不能为空！',function(){
			$("input[name='tradeno']").focus();
		});
		return false;
	}
	if(isNaN($("input[name='tradeno']").val())){
		$.MsgBoxgj.Alerta("温馨提示：",'商标注册号必须为数字！',function(){
			$("input[name='tradeno']").focus();
		});
		return false;
	}
	if($("input[name='tradeholder']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'权利人不能为空！',function(){
			$("input[name='tradeholder']").focus();
		});
		return false;
	}
	if($("input[name='tradesqr']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'申请日不能为空！',function(){
			$("input[name='tradesqr']").focus();
		});
		return false;
	}
	if($("textarea[name='tradeproject']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'商标服务项目不能为空！',function(){
			$("textarea[name='tradeproject']").focus();
		});
		return false;
	}
	if($('#thumb1').val() == '' && $('#thumb2').val() == '' && $('#thumb3').val() == ''){
		$.MsgBoxgj.Alert('温馨提示：','商标图样不能为空！');
		return false;
	}	
	var trade = $('#retrade').serialize();
	$.post("{:U('Member/Seller/editgoods')}",trade,function(data){
		if(data.state == 1){
			$.MsgBoxgj.Alerta("温馨提示：",data.data,function(){
				window.location.href = "{:U('Member/Seller/sell_list',array('tmpa'=>'1'))}";
			});
			/* $('#retrade :input').not(':button,:hidden').val('');//核心
			$('#preview1').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview2').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview3').attr('src','/qihaov2/images/dendai.png');//核心 */
		}else{
			$.MsgBoxgj.Alert("温馨提示：",data.data);
		}	
	});
});

laydate({
            elem: '#J-xl'
        });
laydate({
            elem: '#J-x2'
        });
laydate({
            elem: '#J-x3'
        });

/*左侧导航切换*/
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
	$('.ddtits').click(function(){
	$(this).parent().children('.ddxiangqins').slideToggle("slow");
	})
});
/*左侧导航切换*/
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
/*删除图片*/
var xbt='';
$('.deletes').click(function(){
xbt=$(this).attr('name');
$('#preview'+xbt).attr("src","images/dendai.png");
$('#thumb'+xbt).val('');
})
/*删除图片*/
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
</script>
</body>
</html>