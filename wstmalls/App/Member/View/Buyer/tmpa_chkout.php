<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="col-xs-12" style="height: 40px;line-height: 40px;border-bottom: solid 1px;border-bottom-color: #D1D1D1;margin-bottom: 10px;">
				您当前的位置：<a>买家中心</a> > <a>提交订单</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-12"><!-- #EAEAEA   -->
				<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;padding-left: 20px;font-size: 16px;">
					填写并确认订单信息
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;">
					<img src="/qihaov2/images/step1.png" style="padding: 30px 100px 30px 100px;width: 100%;">
				</div>
				<div class="col-xs-12" style="margin-top: 10px;height: 30px;line-height: 30px;">
				<span class="pull-left" style="font-size: 16px;">订单信息</span>
				</div>
				<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;padding-left: 20px;font-size: 16px;">
				<div class="col-xs-5">商品信息</div><div class="col-xs-7"><div class="col-xs-3">交易类型</div><div class="col-xs-3">售价</div><div class="col-xs-3">手续费</div><div class="col-xs-3">应付金额</div></div>
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding-left: 20px;padding-right: 20px;">
				<div style="line-height: 84px;">
				<div class="col-xs-5"><div style="float: left;"><img src="<?php $img = explode(',', $data['data']['img']);echo $img[0]; ?>" style="border:solid 1px;border-color: #EAEAEA;margin: 10px 20px 10px 10px;width: 64px;height: 64px;"></div>
	<div style="height: 40px;line-height: 20px;margin-top:22px;float: left;">注册号：<?php echo $data['data']['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo C('ITEM_PATM')[$data['data']['tmpa']] ?>】</span><?php echo $data['data']['title']; ?></div></div><div class="col-xs-7"><div class="col-xs-3"><?php echo C('ITEM_SELL_TYPE')[$data['data']['tmtradeway']]; ?></div><div class="col-xs-3"><?php echo $data['data']['price']; ?></div><div class="col-xs-3">1000.00</div><div class="col-xs-3"><?php echo $data['data']['price']+1000.00; ?></div></div>
				</div>
				<hr class="col-xs-12" style="height:1px;border:none;border-top:1px dashed #D1D1D1;">

				<form action="#" method="post">
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 30px;padding-left: 5px;font-weight: bold;">
				附加留言
				</div>
				<div class="col-xs-6">
				<textarea class="form-control" name="about" id="text-about"></textarea>
				</div>
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 30px;padding-left: 5px;font-weight: bold;">
				<input type="checkbox" id="allow-notice" value="1" name="allow">同意<a href="/news/20150518/1162.html" target="_blank">七号网服务协议</a>
				</div>
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding: 20px 50px 20px 0;background-color: #EAEAEA;">
				<div class="col-xs-3 pull-right" style="min-width: 300px;text-align: right;">
				<div class="col-xs-8" style="min-width: 200px;">
				<p>售价</p>
				<p>手续费</p>
				<!-- 特么的积分兑换不要了，老子辛辛苦苦白写了。
				<p><input type="checkbox" value="1" name="use_jifen" onclick="return jifen(this);">使用积分，可用积分<?php echo $data['jifen']['jifen']; ?></p>
				 -->
				<p>实付金额</p>
				<p><a href="<?php echo U('cart'); ?>"><span class="btn btn-default btn-sm">返回购物车修改</span></a></p>
				</div>
				<div class="col-xs-4" style="min-width: 100px;">
				<p>￥<?php echo $data['data']['price']; ?></p>
				<p>￥<?php echo 1000.00; ?></p>
				<!-- 特么的积分兑换不要了，老子辛辛苦苦白写了。
				<p>￥<?php echo '-',$data['jifen']['jifen']/100; ?></p>
				-->
				<p>￥<span id="total-money"><?php echo $data['data']['price']+1000.00; ?></span></p>
				<p><a><button class="btn btn-warning btn-sm" type="submit" onclick="return chk_form();">提交订单并支付</button></a></p>
				</div>
				</div>
				</div>
				</form>
			</div>
			<include file="Public/foot" />
		</div>
	</div>
	<!--右侧内容-->
</div>
<!--主体-->
<!--右侧热线-->

<!--右侧热线-->
<!--底部-->


<!--底部-->
<script type='text/javascript'>
var ht_chk=false;
var sr_chk=false;
function ht_select(){
	var id = $("#ht-select").find("option:selected").val();
	$.ajax({
		type:"GET",
		url:"<?php echo U('ajax_hetongzt'); ?>",
		data:'id='+id,
		success:function(data){
			var re = eval(data);
			if(re.success){
				$("#ht-name").val(re.name);
				$("#ht-address").val(re.address);
				$("#ht-contact").val(re.contact);
				$("#ht-tel").val(re.tel);
				$("#hetongid").val(re.id);
				$("#ht-id").val(re.id);
			} else {
				alert(re.msg);
			}
		}
	});
	return true;
}

function jifen(jf){
	if($(jf).attr("checked")){
		$("#total-money").html("<?php echo $data['data']['price']+1000.00-$data['jifen']['jifen']/100; ?>");
	} else {
		$("#total-money").html("<?php echo $data['data']['price']+1000.00; ?>");
	}
	return true;
}

function chk_form(){
	if(!$("#allow-notice").attr("checked")){
		alert('请阅读并点击同意《七号网服务协议》');
		return false;
	}
	if(!ht_chk){alert('请确认合同主体。');return false;}
	if(!sr_chk){alert('请确定受让主体。');return false;}
	return true;
}

function sr_select(){
	var id = $("#sr-select").find("option:selected").val();
	$.ajax({
		type:"GET",
		url:"<?php echo U('ajax_shourangzt'); ?>",
		data:'id='+id,
		success:function(data){
			var re = eval(data);
			if(re.success){
				if(re.type==2){
					$('input[id="sr-type-1"]').get(0).checked=true;
				} else {
					$('input[id="sr-type-2"]').get(0).checked=true;
				}
				s_type(re.type);
				$("#sr-name-data").val(re.name);
				$("#sr-info-data").val(re.info);
				$("#shourangid").val(re.id);
				$("#sr-id").val(re.id);
				//location.reload(true);
			} else {
				alert(re.msg);
			}
		}
	});
	return true;
}

function s_type(id){
	if(id==2){
		$("#sr-name").html("受让人：");
		$("#sr-info").html("身份证号：");
	} else {
		$("#sr-name").html("公司名称：");
		$("#sr-info").html("公司地址：");
	}
	return true;
}

//提交合同表单
function ht_post(){
	$.ajax({
		type:"POST",
		url:"/Member/Hetongzt/chkout",
		data:$("#ht-form").serialize(),
		success:function(data){
			var re = eval(data);
			if(re.success){
				$("#ht-show-div").html(re.html);
				$("#ht-show-div").show();
				$("#ht-form-div").hide();
				$("#text-about").focus();
				ht_chk=true;
			} else {
				alert(re.msg);
			}
		}
	});
	return true;
}

function show_ht(){
	$("#ht-show-div").hide();
	$("#ht-form-div").show();
	ht_chk=false;
	return true;
}

//提交受让表单
function sr_post(){
	$.ajax({
		type:"POST",
		url:"/Member/Shourangzt/chkout",
		data:$("#sr-form").serialize(),
		success:function(data){
			var re = eval(data);
			if(re.success){
				$("#sr-show-div").html(re.html);
				$("#sr-show-div").show();
				$("#sr-form-div").hide();
				$("#text-about").focus();
				sr_chk = true;
			} else {
				alert(re.msg);
			}
		}
	});
	return true;
}

function show_sr(){
	$("#sr-show-div").hide();
	$("#sr-form-div").show();
	sr_chk = false;
	return true;
}
</script>
</body>
</html>