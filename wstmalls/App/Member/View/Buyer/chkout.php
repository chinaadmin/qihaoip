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
				<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;padding-left: 20px;font-size: 15px;font-weight:bold;">
					填写并确认订单信息
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding:30px 0px;">
					<!--  <img src="/qihaov2/images/step1.png" style="padding: 30px 100px 30px 100px;width: 100%;">-->
					<div style="background:url(/qihaov2/images/steps1.png) no-repeat center top;height:55px;"></div>
				</div>
				<div class="col-xs-12" style="margin-top: 10px;height: 30px;line-height: 30px;">
				<span class="pull-left" style="font-size: 16px;">订单信息</span>
				<span class="pull-right" style="font-size: 14px;color: #FE6400;">本平台为保障交易安全，避免出现卖家对转让手续费弄虚作假，特强制由本平台指定第三方代理机构办理官方转让手续。<?php echo $data['data']['tmpa']==1?'商标转让费用为1000.00元/件':'专利转让费用为200.00元/件'; ?></span>
				</div>
				<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;font-size: 15px;font-weight:bold;">
				<div class="col-xs-5" style="padding-left:20px;">商品信息</div><div class="col-xs-7"><div class="col-xs-3">交易类型</div><div class="col-xs-3">售价</div><div class="col-xs-3">手续费</div><div class="col-xs-3">应付金额</div></div>
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding-left: 20px;padding-right: 20px;">
				<div style="line-height: 84px;margin:0px -20px;">
				<div class="col-xs-5" style="display: block; font-weight: normal; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; line-height:20px;">
				<?php if($data['data']['tmpa']==1){?>	
				<a href="__APP__/trademark/<?php echo $data['data']['id']?>HTMLSUFFIX">
					<img src="<?php $img = explode(',', $data['data']['img']);echo $img[0]; ?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;">
					<p style="height:5px; overflow:hidden;">&nbsp;</p>
					<?php echo '注册号'; ?>：<?php echo $data['data']['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo C('ITEM_PATM')[$data['data']['tmpa']] ?>】</span><?php echo $data['data']['title']; ?>
				</a>
				<?php }else{?>
				<a href="__APP__/patent/<?php echo $data['data']['id']?>HTMLSUFFIX">
					<img src="<?php $img = explode(',', $data['data']['img']);echo $img[0]; ?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;">
					<p style="height:5px; overflow:hidden;">&nbsp;</p>
					<?php echo '申请号'; ?>：<?php echo $data['data']['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo C('ITEM_PATM')[$data['data']['tmpa']] ?>】</span><?php echo $data['data']['title']; ?>
				</a>
				<?php }?>
				</div>
				<div class="col-xs-7"><div class="col-xs-3"><?php echo C('ITEM_SELL_TYPE')[$data['data']['tmtradeway']]; ?></div><div class="col-xs-3"><?php echo $data['data']['price']; ?></div><div class="col-xs-3"><?php echo $data['data']['tmpa']==1?'1000.00':'200.00'; ?></div><div class="col-xs-3" style="color:#FE6400;"><?php echo $data['data']['tmpa']==1?$data['data']['price']+1000.00:$data['data']['price']+200.00; ?></div></div>
				</div>
				<hr class="col-xs-12" style="height:1px;border:none;border-top:1px dashed #D1D1D1;margin:0px;">
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 30px;padding-left: 5px;font-weight: bold;">
				合同主体
				</div>
				<div class="col-xs-12" style="line-height:24px;">
				<p>卖家（乙方）</p>
				<p>乙方：深圳市前海七号网络科技有限公司（7号网）<br />联系地址：深圳市南山区南山大道3838号深圳设计产业园金栋219<br />联系人：吴丽贤<br />联系电话：0755-86210909</p>
				</div>
				<div class="col-xs-12" style="margin-top:20px;line-height:24px;">
						<div id="ht-show-div" class="col-xs-4" <?php if($data['hetong']){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
						<p>买家（甲方）</p>
						合同主体：<?php echo $data['hetong']['name']; ?><br/>
						联系地址：<?php echo $data['hetong']['address']; ?><br/>
						联系人：<?php echo $data['hetong']['contact']; ?><br/>
						联系电话：<?php echo $data['hetong']['tel']; ?><br/>
						<span class="pull-left btn btn-sm btn-default" style="margin-top:10px;margin-bottom:10px;" onclick="return show_ht();">修改</span>
						</div>
						<div class="col-xs-6" id="ht-form-div" <?php if($data['hetong']){?> style="display:none;" <?php }else{?> style="display:block;" <?php }?>>
								<p>买家（甲方）</p>
								  <form class="form-horizontal" id="ht-form">
								   <div class="form-group">
								   	<input type="hidden" name="id" id="ht-id" value="{$data['hetong']['id']}">
								     <label for="ht-name" class="col-xs-2 control-label">甲 方：</label>
								     <div class="col-xs-4 hjuli">
								     <input type="text" name="name" class="form-control" id="ht-name" required="required" value="<?php echo $data['hetong']['name']; ?>">
								     </div>
								     <div class="col-xs-4 hjuli">
								     <select class="col-xs-5 form-control" id="ht-select" onchange="return ht_select();">
								     <option value ="0">选择合同主体</option>
								     <?php foreach ($data['hetongs'] as $row){ echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; } ?>
								     </select>
								     </div>
								     <div class="col-xs-1"><span style="line-height: 34px;"><a href="<?php echo U('/Member/Hetongzt/showlist'); ?>" target="_blank">管理</a></span></div>
								    </div>
								    <div class="form-group">
								     <label for="ht-address" class="col-xs-2 control-label">联系地址：</label>
								     <div class="col-xs-10">
								     <input type="text" name="address" class="form-control" id="ht-address" value="<?php echo $data['hetong']['address']; ?>">
								     </div>
								     </div>
								     <div class="form-group">
								     <label for="ht-contact" class="col-xs-2 control-label">联系人：</label>
								     <div class="col-xs-10">
								     <input type="text" name="contact" class="form-control" id="ht-contact" value="<?php echo $data['hetong']['contact']; ?>">
								     </div>
								     </div>
								     <div class="form-group">
								     <label for="ht-tel" class="col-xs-2 control-label">联系电话：</label>
								     <div class="col-xs-10">
								     <input type="text" name="tel" class="form-control" id="ht-tel" value="<?php echo $data['hetong']['tel']; ?>">
								     </div>
								     </div>
								     <div class="form-group">
								     <div class="col-xs-10 pull-right">
								     <span class="btn btn-default" onclick="return ht_post();" style="float:left;">保存</span>
								     <input type="checkbox" value="2" name="default" id="ht-default" style="float:left;margin-top:12px;margin-left:30px;"><span style="float:left;margin-top:8px;">设为默认合同主体</span>
								     </div>
								     </div>
								  </form>
								</div>
				</div>
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 24px;padding-left: 5px;font-weight: bold;">
					受让主体
				</div>
				<div class="col-xs-12" style="line-height: 24px;">
							<div id="sr-show-div" class="col-xs-4" <?php if($data['shourang']){?> style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
							公司名称：<?php echo $data['shourang']['name']; ?><br/>
							公司地址：<?php echo $data['shourang']['info']; ?><br/>
							<span class="pull-left btn btn-sm btn-default" style="margin-top:10px;margin-bottom:10px;" onclick="return show_sr();">修改</span>
							</div>
								<div class="col-xs-6" id="sr-form-div" <?php if($data['shourang']){?> style="display:none;" <?php }else{?>style="display:block;"<?php }?>>
								  <form class="form-horizontal" id="sr-form">
								  <div class="form-group">
								     <label class="col-xs-2 form_float">主体类型：</label>
								     <div class="col-xs-10">
								     <input type="hidden" name="id" id="sr-id" value="{$data['shourang']['id']}">
								     <input type="radio" name="type" id="sr-type-1" class="radio-inline" onclick="return s_type('2');" value="2" <?php echo $data['shourang']['type']==2?'checked="checked"':''; ?>>个人&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="type" onclick="return s_type('1');" id="sr-type-2" class="radio-inline" value="1" <?php echo $data['shourang']['type']==1?'checked="checked"':''; ?> checked="checked">公司
								     </div>
								    </div>
								   <div class="form-group">
								     <label for="name" class="col-xs-2 control-label" id="sr-name"><?php echo $data['shourang']['type']==2?'受让人：':'公司名称：'; ?></label>
								     <div class="col-xs-4 hjuli">
								     <input type="text" name="name" class="form-control" id="sr-name-data" value="<?php echo $data['shourang']['name']; ?>" required="required">
								     </div>
								     <div class="col-xs-4 hjuli">
								     <select class="col-xs-5 form-control" id="sr-select" onchange="return sr_select();">
								     <option value="0">选择受让主体</option>
								     <?php foreach ($data['shourangs'] as $row){ echo '<option value="'.$row['id'].'">'.$row['name'].'</option>'; } ?>
								     </select>
								     </div>
								     <div class="col-xs-1"><span style="line-height: 34px;"><a href="<?php echo U('/Member/Shourangzt/showlist'); ?>" target="_blank">管理</a></span></div>
								    </div>
								    <div class="form-group">
								     <label for="info" class="col-xs-2 control-label" id="sr-info"><?php echo $data['shourang']['type']==2?'身份证号：':'公司地址：'; ?></label>
								     <div class="col-xs-10">
								     <input type="text" name="info" class="form-control" id="sr-info-data" value="<?php echo $data['shourang']['info']; ?>" required="required">
								     </div>
								     </div>
								     <div class="form-group">
								     <div class="col-xs-10 pull-right">
								     <span class="btn btn-default" onclick="return sr_post();" style="float:left;">保存</span>
								     <input type="checkbox" checked="checked" value="2" name="default" id="sr-default" style="float:left;margin-top:12px;margin-left:30px;"><span style="float:left;margin-top:8px;">设为默认受让主体</span>
								     </div>
								     </div>
								  </form>
								</div>
				</div>
				<form action="#" method="post">
				<input type="hidden" value="<?php echo $data['hetong']['id']+0; ?>" name="hetongid" id="hetongid">
				<input type="hidden" value="<?php echo $data['shourang']['id']+0; ?>" name="shourangid" id="shourangid">
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 30px;padding-left: 5px;font-weight: bold;">
				附加留言
				</div>
				<div class="col-xs-6">
				<textarea class="form-control" name="about" id="text-about"></textarea>
				</div>
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 30px;padding-left: 5px;font-weight: bold;">
				<input type="checkbox" id="allow-notice" checked="checked" value="1" name="allow" style="float:left;margin-top:8px;">同意<a href="/news/20150518/1162.html" target="_blank">七号网服务协议</a>
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
				<p>￥<?php echo $data['data']['tmpa']==1?1000.00:200.00; ?></p>
				<!-- 特么的积分兑换不要了，老子辛辛苦苦白写了。
				<p>￥<?php echo '-',$data['jifen']['jifen']/100; ?></p>
				-->
				<p style="color:#F96400;">￥<span id="total-money"><?php echo $data['data']['tmpa']==1?$data['data']['price']+1000.00:$data['data']['price']+200.00; ?></span></p>
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
//var ht_chk=false;
//var sr_chk=false;
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
		$("#total-money").html("<?php echo $data['data']['tmpa']==1?$data['data']['price']+1000.00-$data['jifen']['jifen']/100:$data['data']['price']+200.00-$data['jifen']['jifen']/100; ?>");
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
	var t = "<?php echo $data['hetong']['name']; ?>";
	var t1 = "<?php echo $data['hetong']['address']; ?>";
	var t2 = "<?php echo $data['hetong']['contact']; ?>";
	var t3 = "<?php echo $data['hetong']['tel']; ?>";
	if(!t&&t1&&t2&&t3){
		alert('合同主体内容必须都要填写！');
		return false;
	}
	var t4 = "<?php echo $data['shourang']['name']; ?>";
	var t5 = "<?php echo $data['shourang']['info']; ?>";
	if(!t4&&t5){
		alert('请确定受让主体必须都要填写！');
		return false;
	}
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
	//ht_chk=false;
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
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').slideUp("slow");
	});
});
</script>
</body>
</html>