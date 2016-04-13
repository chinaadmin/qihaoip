<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="hytit">
				您当前的位置：<a>买家中心</a> > <a>受让主体</a>
			</div>
			<div class="hgrzy">
				<span class="btn btn-warning" style="margin-bottom: 10px;" onclick="return add();">新增受让主体</span>
				<div class="col-xs-12 zhlist" style="border-top:0px;">
					<table cellpadding="0" cellspacing="0" class="table" style="border: solid 1px;border-color: #cccccc;">
						<thead>
							<tr>
								<th colspan="4" style="background-color: #EAEAEA;"><h4>受让甲方</h4></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" id="action-area" style="display: none;"></td>
							</tr>
<?php foreach ($data['data'] as $row){ ?>
							<tr id="data-row-<?php echo $row['id'] ?>">
								<td style="vertical-align: middle;line-height:24px; padding-left:20px;" width="60%">
								<div class="col-xs-12">
									<?php echo $row['type']==2?'受&nbsp;&nbsp;让&nbsp;人：':'公司名称：'; ?><?php echo $row['name']; ?>
								</div>
								<div class="col-xs-12">
									<?php echo $row['type']==2?'身份证号：':'公司地址：'; ?><?php echo $row['info']; ?>
								</div>
								</td>
								<td style="vertical-align: middle;" width="10%" id="set-default-btn-<?php echo $row['id']; ?>" ><?php echo $row['default']==2?'<a href="javascript:;">默认主体</a>':'<a href="javascript:;" onclick="return set_default('.$row['id'].');">设为默认</a>'; ?></td>
								<td style="vertical-align: middle;" width="10%"><span onclick="return edit('<?php echo $row['id']; ?>')"><a href="javascript:">修改</a></span></td>
								<td style="vertical-align: middle;" width="10%"><span onclick="return del('<?php echo $row['id']; ?>')"><a href="javascript:">删除</a></span></td>
							</tr>
<?php } ?>
</tbody>
					</table> 
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
//弹出添加数据表单
function add(){
	$.ajax({
		type:"GET",
		url:"/Member/Shourangzt/add",
		data:'',
		success:function(data){
			$("#action-area").show();
			$("#action-area").html(data);
		}
	});
	return true;
}

//弹出修改数据表单
function edit(id){
	$.ajax({
		type:"GET",
		url:"/Member/Shourangzt/edit/id/"+id,
		data:'',
		success:function(data){
			$("#action-area").show();
			$("#action-area").html(data);
		}
	});
	return true;
}

//删除数据，并且隐藏条目
function del(id){
	$.ajax({
		type:"GET",
		url:"/Member/Shourangzt/del/id/"+id,
		data:'',
		success:function(data){
			$("#data-row-"+id).hide();
		}
	});
	return true;
}

//提交表单，成功则刷新页面，失败返回失败原因
function do_post(form_id,act){
	$.ajax({
		type:"POST",
		url:"/Member/Shourangzt/"+act,
		data:$("#"+form_id).serialize(),
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

//设置默认主体
function set_default(id){
	$.ajax({
		type:"GET",
		url:"/Member/Shourangzt/set_default",
		data:'id='+id,
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

function s_type(id){
	if(id==2){
		$("#data-name").html("受让人：");
		$("#data-info").html("身份证号：");
	} else {
		$("#data-name").html("公司名称：");
		$("#data-info").html("公司地址：");
	}
}
</script>
</body>
</html>