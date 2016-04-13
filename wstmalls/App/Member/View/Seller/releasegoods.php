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
您当前的位置：<a href="{:U('Seller/index')}">卖家中心</a> > <a href="{:U('releasegoods/index')}">发布商品</a>
</div>
<div class="hgrzy">
<div class="col-xs-12 sell_creat">
<ul>
<li><a href="javascript:;" class="selcreat">发布商标</a></li>
<li><a href="javascript:;">发布专利</a></li>
</ul>
</div>
<div class="col-xs-12 sell_creatlist">
	详细填写相关信息，可以帮助您更快找到买家。您还可以批量上传！<a href="{:U('Seller/batch',array('type'=>1))}" class="btn btn-warning batch">立即批量上传</a>
</div>
<div class="col-xs-12 fbzlform creat_border" id="yqljs0">
<form class="form-horizontal" id="retrade">
 <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标名称：&nbsp;   </div>
    <div class="col-xs-4 ">
    <input type="text" name="tradename" class="form-control" placeholder="商标名称" />
    </div>
	<div class="col-xs-2 wdfbwz">图形商标则填“图形”</div>
  </div>
   <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标类别：&nbsp;   </div>
    <div class="col-xs-2 hjuli">
	<select class="form-control" id="Member-Items-tmpa" name="tradecate" onchange="select1('Member-Items-tmpa','Member-Items-groupid2');">
		<option value ="0">未选择</option>
		<volist name="data['trade']['category']" id="vo">
		  <option value="{$vo['id']}">{$vo['name']}</option>
		</volist>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">二级类别：&nbsp;   </div>
    <div class="col-xs-2 hjuli">
	<select class="form-control" id="Member-Items-groupid2" name="tradecate1" onchange="select1('Member-Items-groupid2','Member-Items-groupid3');">
		<option value ="0">未选择</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">三级类别：&nbsp;   </div>
    <div class="col-xs-2 hjuli">
	<select class="form-control" id="Member-Items-groupid3" name="tradecate2" onchange="select1('Member-Items-groupid3','select_2');">
		<option value ="0">未选择</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标注册号：&nbsp;   </div>
    <div class="col-xs-3">
    <input type="text" name="tradeno" class="form-control" placeholder="商标注册号" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>权利人：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradeholder" class="form-control" placeholder="权利人" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">商标参考价：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradeprice" class="form-control" placeholder="商标参考价" />
    </div>
	<div class="col-xs-3 wdfbwz">
		<input type="checkbox" name="tradepoundage" value="1"/>该价格包含<span style="color:#FF6600;">1000.00</span>商标转让手续费
	</div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>申请日期：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradesqr" class="form-control" placeholder="申请日期" id="J-xl"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">注册日期：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradezcr" class="form-control" placeholder="申请日期" id="J-x2"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">截止日期：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="tradejzr" class="form-control" placeholder="申请日期" id="J-x3"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">交易方式：&nbsp;   </div>
    <div class="col-xs-4 ">
    <volist name="data['trade']['tradeway']" id="vo">
	    <label class="checkbox-inline">
	  		<input type="checkbox" <eq name="key" value="1">checked ='checked'</eq> name="tradeway[]" value="{$key}">{$vo}
		</label>
	</volist>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">组合类型：&nbsp;   </div>
    <div class="col-xs-8 ">
    <volist name="data['trade']['comtype']" id="vo">
	    <label class="radio-inline">
	  		<input type="radio" <eq name="key" value="1">checked ='checked'</eq> name="tradecomtype" value="{$key}">{$vo}
		</label>
	</volist>	
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商品服务/项目:&nbsp;   </div>
    <div class="col-xs-9">
    <textarea class="form-control" name="tradeproject" rows="3" placeholder="请输入服务列表，每项服务以|隔开"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">商标注册所在地区：&nbsp;   </div>
	<div class="col-xs-2 hjuli">
<select class="form-control" name="traderegion">
	<volist name="data['trade']['region']" id="vo">
	  <option value="{$key}">{$vo}</option>
	</volist>
</select>
    </div>
  </div>
  <input type="hidden" name="type" value="trade"/>
  <input type="hidden" name="tradeimg[]" id="thumb1" value=""/>
  <input type="hidden" name="tradeimg[]" id="thumb2" value=""/>
  <input type="hidden" name="tradeimg[]" id="thumb3" value=""/>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>商标图样：&nbsp;   </div>
    <div class="col-xs-10 allimg">
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="1"><img id="preview1" width="140" height="120" src="/qihaov2/images/dendai.png"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="1"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="1"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="2"><img id="preview2" width="140" height="120" src="/qihaov2/images/dendai.png"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="2"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="2"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="3"><img id="preview3" width="140" height="120" src="/qihaov2/images/dendai.png"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="3"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="3"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">卖点展示：&nbsp;   </div>
    <div class="col-xs-9">
    <textarea class="form-control" name="tradesellpoint" rows="3" placeholder="为了更好的展示您的商品，建议填写卖点展示"></textarea>
    </div>
  </div>
  
   <div class="col-xs-12">
  <button type="button" class="btn btn-warning weizhidaxiao tradequeding">确定</button>
  </div>
</form>
</div>

<div class="col-xs-12 fbzlform creat_border display_none" id="yqljs1">
<form class="form-horizontal" id="repatent">
 <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>专利名称：&nbsp;   </div>
    <div class="col-xs-4 ">
    <input type="text" name="patentname" class="form-control" placeholder="专利名称" />
    </div>
	
  </div>
   <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>专利分类：&nbsp;   </div>
    <div class="col-xs-2 hjuli">
		<select class="form-control" id="Member-patent-Items-groupid" name="patentcate" onchange="select1('Member-patent-Items-groupid','Member-patent-Items-groupid2');">
			<option value ="0">未选择</option>
			<volist name="data['patent']['category']" id="vo">
			  <option value="{$vo['id']}">{$vo['name']}</option>
			</volist>
		</select>
    </div>
  </div>
    <div class="form-group">
    <div class="col-xs-2 scrzgmc">二级类别：&nbsp;   </div>
    <div class="col-xs-2 hjuli">
		<select class="form-control" id="Member-patent-Items-groupid2" name="patentcate1" onchange="select1('Member-patent-Items-groupid2','Member-patent-Items-groupid3');">
			<option value ="0">未选择</option>
		</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">三级类别：&nbsp;   </div>
    <div class="col-xs-2 hjuli">
		<select class="form-control" id="Member-patent-Items-groupid3" name="patentcate2" onchange="select1('Member-patent-Items-groupid3','select_2');">
			<option value ="0">未选择</option>
		</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>申请号：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="patentsqh" class="form-control" placeholder="申请号" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">专利参考价：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="patentprice" class="form-control" placeholder="专利参考价" />
    </div>
	<div class="col-xs-3 wdfbwz">
		<input type="checkbox" name="patentpoundage" value="1"/>该价格包含<span style="color:#FF6600;">200.00</span>专利转让手续费
	</div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">申请日期：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="patentsqr" class="form-control" placeholder="申请日期" id="J-x4"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>专利类型：&nbsp;   </div>
    <div class="col-xs-4 ">
    	<volist name="data['patent']['type']" id="vo">
		    <label class="radio-inline">
		  		<input type="radio" <eq name="key" value="1">checked ='checked'</eq> name="patenttype" value="{$key}">{$vo}
			</label>
		</volist>
    </div>
  </div>
   <div class="form-group">
    <div class="col-xs-2 scrzgmc">交易方式：&nbsp;   </div>
    <div class="col-xs-4 ">
	    <volist name="data['patent']['patentway']" id="vo">
	    	<label class="checkbox-inline">
	  			<input type="checkbox" <eq name="key" value="1">checked ='checked'</eq> name="patentway[]" value="{$key}">{$vo}
			</label>
		</volist>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">专利权人类型：&nbsp;   </div>
    <div class="col-xs-4 ">
	    <volist name="data['patent']['patenteetype']" id="vo">
		    <label class="radio-inline">
		  		<input type="radio" <eq name="key" value="1">checked ='checked'</eq> name="patentholdertype" value="{$key}">{$vo}
			</label>
		</volist>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>专利权人：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="patentee" class="form-control" placeholder="专利权人" />
    </div>
  </div>
<!--   <div class="form-group">
    <div class="col-xs-2 scrzgmc">发明人：&nbsp;   </div>
    <div class="col-xs-3 ">
    <input type="text" name="patentinventor" class="form-control" placeholder="发明人" />
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>专利摘要：&nbsp;   </div>
    <div class="col-xs-9">
    <textarea class="form-control" name="patentdetail" rows="3" placeholder="专利摘要"></textarea>
    </div>
  </div>
<!--   <div class="form-group">
    <div class="col-xs-2 scrzgmc">代理机构：&nbsp;   </div>
    <div class="col-xs-3">
    <input type="text" name="patentagency" class="form-control" placeholder="代理机构" />
    </div>
  </div> -->
  <input type="hidden" name="type" value="patent"/>
  <input type="hidden" name="patentimg[]" id="thumb4" value=""/>
  <input type="hidden" name="patentimg[]" id="thumb5" value=""/>
  <input type="hidden" name="patentimg[]" id="thumb6" value=""/>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc"><font>*</font>专利附图：&nbsp;   </div>
    <div class="col-xs-10 allimg">
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="4"><img id="preview4" width="140" height="120" src="/qihaov2/images/dendai.png"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="4"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="4"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="5"><img id="preview5" width="140" height="120" src="/qihaov2/images/dendai.png"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="5"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="5"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
	<div class="hsqtp">
    <div class="yulan"><a href="javascript:void(0)" class="posts" name="6"><img id="preview6" width="140" height="120" src="/qihaov2/images/dendai.png"/></a></div>
	<div class="dianji"><p><a href="javascript:void(0)" class="posts" name="6"><img src="/qihaov2/images/shanchuan.png"></a><a href="javascript:void(0)" class="selects"><img src="/qihaov2/images/selects.png"></a><a href="javascript:void(0)" class="deletes" name="6"><img src="/qihaov2/images/deletes.jpg"></a></p></div>
	</div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-2 scrzgmc">卖点展示：&nbsp;   </div>
    <div class="col-xs-9">
    <textarea class="form-control" name="patentsellpoint" rows="3" placeholder="为了更好的展示您的商品，建议填写卖点展示"></textarea>
    </div>
  </div>
   <div class="col-xs-12">
  	<button type="button" class="btn btn-warning weizhidaxiao patentqueding">确定</button>
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
	if($("input[name='tradeproject']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'商标服务项目不能为空！',function(){
			$("input[name='tradeproject']").focus();
		});
		return false;
	}
	if($('#thumb1').val() == '' && $('#thumb2').val() == '' && $('#thumb3').val() == ''){
		$.MsgBoxgj.Alert('温馨提示：','商标图样不能为空！');
		return false;
	}	
	var trade = $('#retrade').serialize();
	$.post("{:U('Member/Seller/addgoods')}",trade,function(data){
		if(data.state == 1){
			$.MsgBoxgj.Alert("温馨提示：",data.data);
			$('#retrade :input').not(':button,:hidden').val('');//核心
			$('#preview1').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview2').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview3').attr('src','/qihaov2/images/dendai.png');//核心
		}else{
			$.MsgBoxgj.Alert("温馨提示：",data.data);
		}	
	});
});

//发布专利信息
$('.patentqueding').click(function(){
	if($("input[name='patentname']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'专利名称不能为空！',function(){
			$("input[name='patentname']").focus();
		});
		return false;
	}
	if($("input[name='patentsqh']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'申请号不能为空！',function(){
			$("input[name='patentsqh']").focus();
		});
		return false;
	}
	if($("input[name='patentee']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'专利权利人不能为空！',function(){
			$("input[name='patentee']").focus();
		});
		return false;
	}
	if($("input[name='patentdetail']").val() == ""){
		$.MsgBoxgj.Alerta("温馨提示：",'专利摘要不能为空！',function(){
			$("input[name='patentdetail']").focus();
		});
		return false;
	}
	if($('#thumb4').val() == '' && $('#thumb5').val() == '' && $('#thumb6').val() == ''){
		$.MsgBoxgj.Alert('温馨提示：','专利附图不能为空！');
		return false;
	}
	var patent = $('#repatent').serialize();
	$.post("{:U('Member/Seller/addgoods')}",patent,function(data){
		if(data.state == 1){
			$.MsgBoxgj.Alert("温馨提示：",data.data);
			$('#repatent :input').not(':button,:hidden').val('');//核心
			$('#preview4').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview5').attr('src','/qihaov2/images/dendai.png');//核心
			$('#preview6').attr('src','/qihaov2/images/dendai.png');//核心
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
laydate({
	elem: '#J-x4'
});
/*发布商标与专利切换*/
$('.sell_creat li').click(function(){
	var tt=$(this).index();
	if(tt==1){
		$('.sell_creatlist').show();
		$('.batch').attr('href',"{:U('Seller/batch',array('type'=>2))}");
	}else{
		$('.sell_creatlist').show();
		$('.batch').attr('href',"{:U('Seller/batch',array('type'=>1))}");
	}		
	$("div[id*='yqljs']").css('display','none');
	$("#yqljs"+tt).css('display','block');
	$('.sell_creat li a').removeClass('selcreat');
	$(this).find("a").addClass('selcreat');
})
/*发布商标与专利切换*/

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