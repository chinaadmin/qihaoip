<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="col-xs-12" style="height: 40px;line-height: 40px;border-bottom: solid 1px;border-bottom-color: #D1D1D1;margin-bottom: 10px;">
				您当前的位置：<a>买家中心</a> > <a>订单详情</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-12"><!-- #EAEAEA   -->
				<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;padding-left: 20px;">
				<?php 
				$str='';
				if($data['order']['state']==1){
					$str = '&nbsp;&nbsp;<a href="'.U('/Index/Cart/pay',['uid'=>$data['order']['uid']]).'" target="_blank"><span class="btn btn-xs btn-success">去付款</span></a>';
				} ?>
					<?php echo '订单号：'.$data['order']['uid'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单状态：<span style="color: #FF6600;">'.C('ORDER_STATE')[$data['order']['state']].'</span>'.$str.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单总额：<span style="color: #FF6600;">'.$data['order']['amount'].'</span>'; ?>
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding:30px 0px;">
					<!--  <img src="/qihaov2/images/step<?php echo $data['order']['state']; ?>.png" style="padding: 30px 100px 30px 100px;width: 100%;">-->
					<div style="background:url(/qihaov2/images/steps<?php echo $data['order']['state']; ?>.png) no-repeat center top;height:55px;"></div>
				</div>
				<div class="col-xs-12" style="margin-top: 10px;height: 30px;line-height: 30px;">
				<span class="pull-left" style="font-size: 16px;font-weight: bold;">订单追踪</span>
				</div>
				<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;padding-left: 20px;font-size: 15px;font-weight: bold;">
				<div class="col-xs-8"><div class="col-xs-4">处理时间</div><div class="col-xs-4">处理信息</div><div class="col-xs-4">操作人</div></div>
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding-left: 20px;">
				<?php foreach($data['orderlog'] as $k=>$row){
					$row['adminid']?$person = '经纪人':$person = '用户';
					echo '<div class="col-xs-8" style="height: 40px;line-height: 40px;"><div class="col-xs-4" >'.date('Y-m-d H:i:s',$row['datetime']).'</div><div class="col-xs-4">'.$row['name'].'</div><div class="col-xs-4">'.$person.'</div></div>';
				} ?>
				</div>
				
				<div class="col-xs-12" style="margin-top: 10px;height: 30px;line-height: 30px;">
				<span class="pull-left" style="font-size: 16px;font-weight: bold;">订单信息</span>
				</div>
				<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;font-size: 15px;font-weight: bold;">
				<?php if($data['order']['type']=='1'){ ?>
				<div class="col-xs-5" style="padding-left: 20px;">商品信息</div><div class="col-xs-7"><div class="col-xs-2">卖家</div><div class="col-xs-2">交易类型</div><div class="col-xs-2">应付金额</div><div class="col-xs-4">订单状态</div></div>
				<?php } else { ?>
				<div class="col-xs-5" style="padding-left: 20px;">商品信息</div><div class="col-xs-7"><div class="col-xs-2">卖家</div><div class="col-xs-2">交易类型</div><div class="col-xs-2"></div><div class="col-xs-2"></div><div class="col-xs-4"></div></div>
				<?php } ?>
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding-left: 20px;padding-right: 20px;">
				<?php if($data['order']['type']=='1'){ ?>
				<div style="line-height: 84px;margin:0px -20px;">
				<div class="col-xs-5" style="display: block; font-weight: normal; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; line-height:20px;"><img style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;" src="<?php $img = explode(',', $data['data']['img']);echo $img[0]; ?>">
				<p style="height:5px; overflow:hidden;">&nbsp;</p>
				<?php echo $data['data']['tmpa']=='1'?'注册号':'专利号'; ?>：<?php echo $data['data']['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo C('ITEM_PATM')[$data['data']['tmpa']] ?>】</span><?php echo $data['data']['title']; ?></div>
				<div class="col-xs-7">
					<div class="col-xs-2 posi_tion"><?php echo $data['saler']['name']?$data['saler']['name']:$data['saler']['username']; ?>
					<div class="otherss othersst">
						<p>手机：<?php echo $data['saler']['mobile']; ?></p>
						<p>电话：<?php echo $data['saler']['tel']; ?></p>
						<p>邮箱：<?php echo $data['saler']['email']; ?></p>
						<p>QQ：<?php echo $data['saler']['qq']; ?></p>
					</div>
					</div>
				<div class="col-xs-2"><?php echo C('ITEM_SELL_TYPE')[$data['data']['tmtradeway']]; ?></div>
				<div class="col-xs-2"><?php echo $data['order']['amount']; ?></div>
				<div class="col-xs-4"><?php echo C('ORDER_STATE')[$data['order']['state']]; ?></div></div>
				</div>
				<?php } else if($data['order']['type']=='2'){
					foreach ($data['data']['items'] as $row){
				?>
				<div class="col-xs-12" style="line-height: 84px;">
				<div class="col-xs-5" style="display: block; font-weight: normal; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; line-height:20px;">
				<img style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;" src="<?php echo $row['picture']; ?>">
				<p style="height:5px; overflow:hidden;">&nbsp;</p>
				专利号：<?php echo $row['applynum']; ?><br /><span style="color: #FF6600;">【专利】</span><?php echo $row['cname']; ?></div>
				<div class="col-xs-7">
				<div class="col-xs-2" style="line-height: 20px;margin-top: 20px;">七号网</div>
				<div class="col-xs-2">代缴服务</div>
				<div class="col-xs-2"><?php echo $row['pay_total']; ?></div>
				<div class="col-xs-4"><?php echo C('ORDER_STATE')[$data['order']['state']]; ?></div>
				</div>
				</div>
				<?php }} ?>
				<?php if($data['order']['type']=='1'){ ?>
				<hr class="col-xs-12" style="height:1px;border:none;border-top:1px dashed #D1D1D1;">
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 30px;padding-left: 5px;font-weight: bold;">
				合同主体
				</div>
				<div class="col-xs-12" style="line-height:24px;">
				<p>卖家（乙方）</p>
				<p>乙方：深圳市前海七号网络科技有限公司（7号网）<br />联系地址：深圳市南山区南山大道3838号深圳设计产业园金栋219<br />联系人：吴丽贤<br />联系电话：0755-86210909</p>
				</div>
				<div class="col-xs-12" style="margin-top:20px;">
								<div class="col-xs-6" id="ht-form-div" style="display: none;">
								<p>买家（甲方）</p>
								  <form class="form-horizontal" id="ht-form">
								   <div class="form-group">
								   	<input type="hidden" name="id" id="ht-id" value="0">
								     <label for="ht-name" class="col-xs-2 control-label">甲 方：</label>
								     <div class="col-xs-5">
								     <input type="text" name="name" class="form-control" id="ht-name" required="required" value="<?php echo $data['hetong']['name']; ?>">
								     </div>
								     <div class="col-xs-4">
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
								     <span class="btn btn-default" onclick="return ht_post();">保存</span>
								     <input type="checkbox" value="2" name="default" id="ht-default">设为默认合同主体
								     </div>
								     </div>
								  </form>
								</div>
								<div class="col-xs-4" id="ht-show-div" style="line-height: 24px;padding-bottom:20px;">
								<p>买家（甲方）</p>
								<?php echo $data['hetonghtml']; ?>
								</div>
				</div>
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height:30px;line-height:30px;padding-left:5px;font-weight:bold;">
					受让主体
				</div>
				<div class="col-xs-12">
								<div class="col-xs-6" id="sr-form-div" style="display: none;">
								  <form class="form-horizontal" id="sr-form">
								  <div class="form-group">
								     <label class="col-xs-2 control-label">主体类型：</label>
								     <div class="col-xs-10">
								     <input type="hidden" name="id" id="sr-id" value="0">
								     <input type="radio" name="type" id="sr-type-1" class="radio-inline" onclick="return s_type('2');" value="2" <?php echo $data['shourang']['type']==2?'checked="checked"':''; ?>>个人&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="type" onclick="return s_type('1');" id="sr-type-2" class="radio-inline" value="1" <?php echo $data['shourang']['type']==1?'checked="checked"':''; ?>>公司
								     </div>
								    </div>
								   <div class="form-group">
								     <label for="name" class="col-xs-2 control-label" id="sr-name"><?php echo $data['shourang']['type']==2?'受让人：':'公司名称：'; ?></label>
								     <div class="col-xs-5">
								     <input type="text" name="name" class="form-control" id="sr-name-data" value="<?php echo $data['shourang']['name']; ?>" required="required">
								     </div>
								     <div class="col-xs-4">
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
								     <span class="btn btn-default" onclick="return sr_post();">保存</span>
								     <input type="checkbox" value="2" name="default" id="sr-default">设为默认受让主体
								     </div>
								     </div>
								  </form>
								</div>
								<div class="col-xs-4" id="sr-show-div" style="line-height:24px;padding-bottom:20px;">
									<?php echo $data['shouranghtml']; ?>
								</div>
				</div>
				<?php } ?>
				<div class="col-xs-12" style="margin:10px 0 10px 0;background-color: #EAEAEA;height: 30px;line-height: 30px;padding-left: 5px;font-weight: bold;">
				附加留言
				</div>
				<div class="col-xs-6" style="padding:5px 0px 20px 0px;line-height:24px;">
					<?php echo $data['order']['about']?$data['order']['about']:'暂无留言'; ?>
				</div>
				</div>
				<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;padding: 20px 50px 20px 0;background-color: #EAEAEA;">
				<div class="col-xs-3 pull-right" style="min-width: 300px;text-align: right;">
				<p><span style="color: #FF6600;font-size: 18px;"><?php echo $data['data']['count']; ?></span>件商品/服务，应付总额 <span style="color: #FF6600;font-size: 18px;">￥<?php echo $data['order']['amount']; ?></span></p>
				</div>
				</div>
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
/*显示联系方式*/
$('.posi_tion').hover(function(){
	$(this).find('.otherss').css('display','block');
	},function(){
	$(this).find('.otherss').css('display','none');
})
/*显示联系方式*/				
/*左侧导航*/
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').slideUp("slow");
	});
});
/*左侧导航*/
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