<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="col-xs-12" style="height: 40px;line-height: 40px;border-bottom-color: #D1D1D1;">
				您当前的位置：<a>买家中心</a> > <a>购物车</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-12 zhlist" style="border-top:0px;padding-top:0px;margin-top:0px;">
					<table cellpadding="0" cellspacing="0" class="table" style="border: solid 1px;border-color: #EAEAEA;">
						<thead>
							<tr style="background-color: #EAEAEA;font-size: 15px;font-weight:bold;">
								<th><h4>商品信息</h4></th>
								<th><h4>交易类型</h4></th>
								<th><h4>售价</h4></th>
								<th><h4>操作</h4></th>
							</tr>
						</thead>
						<form id="main-form">
						<tbody>
<?php if(count($data['data'])){
	foreach ($data['data'] as $row){ ?>
							<tr id="data-row-<?php echo $row['id']; ?>">
								<td style="vertical-align: middle;" width="55%">
								<input type="checkbox" name="items" value="<?php echo $row['id']; ?>" style="float:left;margin-top:30px;">	
								<?php if($row['tmpa']==1){?>
								<a href="__APP__/trademark/<?php echo $row['id']?>HTMLSUFFIX">
									<img src="<?php $img = explode(',', $row['img']);echo $img[0]; ?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;">
									<p style="height:5px; overflow:hidden;">&nbsp;</p>
									注册号：<?php echo $row['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo $row['groupname'] ?>】</span><?php echo $row['title']; ?>
								</a>
								<?php }else{?>
								<a href="__APP__/patent/<?php echo $row['id']?>HTMLSUFFIX">
									<img src="<?php $img = explode(',', $row['img']);echo $img[0]; ?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;">
									<p style="height:5px; overflow:hidden;">&nbsp;</p>
									申请号：<?php echo $row['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo C('ITEM_PA_TYPE')[$row['tmtype']] ?>】</span><?php echo $row['title']; ?>
								</a>
								<?php }?>
								</td>
								<td style="vertical-align: middle;" width="15%"><?php echo C('ITEM_SELL_TYPE')[$row['tmtradeway']]; ?></td>
								<td style="vertical-align: middle;color:#FF7115;" width="15%"><?php echo $row['price'] ?></td>
								<td style="vertical-align: middle;" width="15%">
								<?php if($row['tmpa']==1){?>
									<a href="__APP__/trademark/<?php echo $row['id'];?>HTMLSUFFIX">查看</a></span>&nbsp;&nbsp;
									<notempty name="row['collect']">
										<span>已收藏</span>
									<else/>
										<span onclick="return shoucang('<?php echo $row['id']; ?>','<?php echo 1;?>')"><a href="javascript:">收藏</a></span>
									</notempty>
									&nbsp;&nbsp;
								<?php }elseif($row['tmpa']==2){?>
									<a href="__APP__/patent/<?php echo $row['id'];?>HTMLSUFFIX">查看</a></span>&nbsp;&nbsp;
									<notempty name="row['collect']">
										<span>已收藏</span>
									<else/>
										<span onclick="return shoucang('<?php echo $row['id']; ?>','<?php echo 2;?>')"><a href="javascript:">收藏</a></span>
									</notempty>
									&nbsp;&nbsp;
								<?php }?>
								<span onclick="return del('<?php echo $row['id']; ?>')"><a href="javascript:">删除</a></span>
								<br /><a href="<?php echo U('chkout',['id'=>$row['id']]); ?>"><span class="btn btn-warning">&nbsp;&nbsp;去结算&nbsp;&nbsp;</span></a>
								</td>
							</tr>
<?php  } ?>
							<tr style="background-color: #EAEAEA;">
								<td colspan="4">
								<div style="float: left;margin:8px 0px;"><input type="checkbox" onclick="return get_all();" style="float:left;margin-top:3px;"><a href="javascript:" onclick="return get_all();">全选</a>
								<a href="javascript:" onclick="return del_all('main-form');">删除</a>
								</div>
								<a href="__APP__" class="btn btn-default" style="float:right;">继续浏览</a>
								</td>
							</tr>
<?php } else { ?>
							<tr>
							<td colspan="4"><h5>购物车空空如也，请挑选商品。</h5></td>
							</tr>
<?php } ?>
						</tbody>
					</table>
					</form>
<?php echo $data['page']; ?>
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
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').slideUp("slow");
	});
});

//加入收藏
function shoucang(id,type){
	var parameter={};
	parameter['sid'] = id;
	parameter['type'] = type;
	$.post("{:U('Index/Index/favorite')}",parameter,function(data){
		$.MsgBoxgj.Alerta("温馨提示：",data.data,function(){
			window.location.reload();
		});
	});
}

//删除数据，并且隐藏条目
function del(id){
	$.ajax({
		type:"GET",
		url:"/Index/Cart/del/id/"+id,
		data:'',
		success:function(data){
			$("#data-row-"+id).hide();
		}
	});
	return true;
}

//全选
var checked = true;
function get_all(){
	$('input[type=checkbox]').attr('checked',checked);
	if(checked){
		checked = false;
	} else {
		checked = true;
	}
	return true;
}

//删除
function del_all(form_id){
	var da = $("#"+form_id).serialize();
	da = da.replace("&items=", ",")
	da = da.replace("items=", "")
	$.ajax({
		type:"GET",
		url:"/Index/Cart/del/id/"+da,
		data:"",
		success:function(data){
			var re = eval(data);
			if(re.success){
				location.reload(true);
			} else {
				alert(re.msg);
			}
		}
	});
	return true;
}
</script>
</body>
</html>