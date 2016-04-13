<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<!--左侧导航-->
	<include file="Public/left" />
	<!--左侧导航-->
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="hytit">
				您当前的位置：<a>商城管理</a> > <a href="<?php echo U('shop/shopcus')?>">客服设置</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-12 kefus_title">客服设置</div>
				<div class="col-xs-12 kefus_add">
					<a href="javascript:void(0)" class="btn btn-primary">添加客服</a><span>请添加1-4个客服</span>
				</div>
				<div class="col-xs-12 ">
					<form class="form-horizontal" action="<?php echo U('Member/shop/shopcus');?>" method="post">
						<table cellpadding="0" cellspacing="0" class="kefus_list">
							<tbody>
							<?php if($data['kfinfo']):?>
							<?php $rel = '1';foreach ($data['kfinfo'] as $key=>$value):?>
								<tr rel=<?php echo $rel?>>
									<td width="30%"><span>客服QQ:&nbsp; </span><input type="text" value="<?php echo $value['qq']?>" name="kfinfo[<?php echo $rel?>][qq]" class="form-control kefus_input" placeholder="QQ" /></td>
									<td width="30%"><span>客服名称:&nbsp; </span><input type="text" value="<?php echo $value['qqname']?>" name="kfinfo[<?php echo $rel?>][qqname]" class="form-control kefus_input" placeholder="客服名称" /></td>
									<td width="20%"><span>排序:&nbsp; </span><input type="text" value="<?php echo $value['qqsort']?>" name="kfinfo[<?php echo $rel?>][qqsort]" class="form-control kefus_input" placeholder="数字大的显示靠前" /></td>
									<td width="20%"><a href="javascript:void(0)" onClick="dels(this);">删除</a><input type="checkbox" name="kfinfo[<?php echo $rel?>][qqchkshow]" <?php echo $value['qqchkshow']==2?'checked="checked"':''?> value="2">&nbsp;隐藏</td>
								</tr>
							<?php $rel++; endforeach;?>
							<?php else:?>
								<tr rel='1'>
									<td width="30%"><span>客服QQ:&nbsp; </span><input type="text" value="<?php echo $value['qq']?>" name="kfinfo[1][qq]" class="form-control kefus_input" placeholder="QQ" /></td>
									<td width="30%"><span>客服名称:&nbsp; </span><input type="text" value="<?php echo $value['qqname']?>" name="kfinfo[1][qqname]" class="form-control kefus_input" placeholder="客服名称" /></td>
									<td width="20%"><span>排序:&nbsp; </span><input type="text" value="<?php echo $value['qqsort']?>" name="kfinfo[1][qqsort]" class="form-control kefus_input" placeholder="数字大的显示靠前" /></td>
									<td width="20%"><a href="javascript:void(0)" onClick="dels(this);">删除</a><input type="checkbox" name="kfinfo[1][qqchkshow]" <?php echo $value['qqchkshow']==2?'checked="checked"':''?> value="2">&nbsp;隐藏</td>
								</tr>
							<?php endif;?>
							</tbody>
						</table>
						<div class="col-xs-12 kefus_phone">
							<div class="kefus_phone_title">联系方式</div>
							<div class="kefus_phone_contents">
								<span>手机：<?php echo $data['phone']?></span><a href="<?php echo U('Member/shop/index')?>" >编辑</a><input type="checkbox" <?php echo $data['showphone']==2?'checked="checked"':''?> name="showphone" value="2">&nbsp;隐藏
							</div>
							<div class="kefus_phone_contents">
								<span>座机：<?php echo $data['tel']?></span><a href="<?php echo U('Member/shop/index')?>" >编辑</a><input type="checkbox" <?php echo $data['showtel']==2?'checked="checked"':''?> name="showtel" value="2">&nbsp;隐藏
							</div>
						</div>
						<div class="col-xs-12 kefus_phone">
							<div class="kefus_phone_title">工作时间</div>
							<?php if($data['worktime']):?>
								<?php foreach ($data['worktime'] as $key=>$value):?>
								<div class="form-group kefus_time">
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[<?php echo $key?>][wsta]">
										<?php foreach ($data['work'] as $k=>$v):?>
										<option value="<?php echo $k?>" <?php echo $value['wsta']==$k?'selected="selected"':''?>><?php echo $v?></option>
										<?php endforeach;?>
									</select>
								</div>
								<span>至</span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[<?php echo $key?>][wend]">
										<?php foreach ($data['work'] as $k=>$v):?>
										<option value="<?php echo $k?>" <?php echo $value['wend']==$k?'selected="selected"':''?>><?php echo $v?></option>
										<?php endforeach;?>
									</select>
								</div>
								<span></span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[<?php echo $key?>][tsta]">
									<?php for ($i=0;$i<48;$i++):?>
										<?php if($i%2==0){
											$h=$i/2;
											$m ='00';
										}else{
											$h = $i/2-0.5;
											$m = '30';
										}?>
										<option value="<?php echo $h.':'.$m?>" <?php echo $value['tsta']==$h.':'.$m?'selected="selected"':''?>><?php echo $h.':'.$m?></option>
									<?php endfor;?>
									</select>
								</div>
								<span>-</span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[<?php echo $key?>][tend]">
										<?php for ($i=0;$i<48;$i++):?>
										<?php if($i%2==0){
											$h=$i/2;
											$m ='00';
										}else{
											$h = $i/2-0.5;
											$m = '30';
										}?>
										<option value="<?php echo $h.':'.$m?>" <?php echo $value['tend']==$h.':'.$m?'selected="selected"':''?>><?php echo $h.':'.$m?></option>
									<?php endfor;?>
									</select>
								</div>
								<div class="col-xs-1 kefus_time_hidden">
									<input type="checkbox" name="worktime[<?php echo $key?>][workshow]" value="2" <?php echo $value['workshow']==2?'checked="checked"':''?>> <span>&nbsp;隐藏</span>
								</div>
							</div>
							<?php endforeach;?>
							<?php else:?>
							<div class="form-group kefus_time">
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[1][wsta]">
										<?php foreach ($data['work'] as $key=>$value):?>
										<option value="<?php echo $key?>" ><?php echo $value?></option>
										<?php endforeach;?>
									</select>
								</div>
								<span>至</span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[1][wend]">
										<?php foreach ($data['work'] as $key=>$value):?>
										<option value="<?php echo $key?>" ><?php echo $value?></option>
										<?php endforeach;?>
									</select>
								</div>
								<span></span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[1][tsta]">
									<?php for ($i=0;$i<48;$i++):?>
										<?php if($i%2==0){
											$h=$i/2;
											$m ='00';
										}else{
											$h = $i/2-0.5;
											$m = '30';
										}?>
										<option value="<?php echo $h.':'.$m?>"><?php echo $h.':'.$m?></option>
									<?php endfor;?>
									</select>
								</div>
								<span>-</span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[1][tend]">
										<?php for ($i=0;$i<48;$i++):?>
										<?php if($i%2==0){
											$h=$i/2;
											$m ='00';
										}else{
											$h = $i/2-0.5;
											$m = '30';
										}?>
										<option value="<?php echo $h.':'.$m?>"><?php echo $h.':'.$m?></option>
									<?php endfor;?>
									</select>
								</div>
								<div class="col-xs-1 kefus_time_hidden">
									<input type="checkbox" name="worktime[1][workshow]" value="2"> <span>&nbsp;隐藏</span>
								</div>
							</div>
							<div class="form-group kefus_time">
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[2][wsta]">
										<?php foreach ($data['work'] as $key=>$value):?>
										<option value="<?php echo $key?>" ><?php echo $value?></option>
										<?php endforeach;?>
									</select>
								</div>
								<span>至</span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[2][wend]">
										<?php foreach ($data['work'] as $key=>$value):?>
										<option value="<?php echo $key?>" ><?php echo $value?></option>
										<?php endforeach;?>
									</select>
								</div>
								<span></span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[2][tsta]">
										<?php for ($i=0;$i<48;$i++):?>
										<?php if($i%2==0){
											$h=$i/2;
											$m ='00';
										}else{
											$h = $i/2-0.5;
											$m = '30';
										}?>
										<option value="<?php echo $h.':'.$m?>"><?php echo $h.':'.$m?></option>
									<?php endfor;?>
									</select>
								</div>
								<span>-</span>
								<div class="col-xs-1 hjuli">
									<select class="form-control" name="worktime[2][tend]">
										<?php for ($i=0;$i<48;$i++):?>
										<?php if($i%2==0){
											$h=$i/2;
											$m ='00';
										}else{
											$h = $i/2-0.5;
											$m = '30';
										}?>
										<option value="<?php echo $h.':'.$m?>"><?php echo $h.':'.$m?></option>
									<?php endfor;?>
									</select>
								</div>
								<div class="col-xs-1 kefus_time_hidden">
									<input type="checkbox" name="worktime[2][workshow]" value="2"> <span>&nbsp;隐藏</span>
								</div>
							</div>
							<?php endif;?>
						</div>
						<div class="col-xs-12 kefus_phone">
							<button type="submit" class="btn btn-warning">确认提交</button>
						</div>
					</form>
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

$('.kefus_add a').click(function(){
var length = $('.kefus_list tbody').find('tr').length;
var re = $('.kefus_list tbody').find('tr').last().attr('rel');
	var rel = parseInt(re)+1;
if(length<4){
	var contents=' ';
	contents+="<tr rel="+rel+"><td width='"+'30%'+"'><span>客服QQ:&nbsp;</span><input type="+'text'+" name="+'kfinfo['+rel+'][qq]'+" class='"+'form-control kefus_input'+"' placeholder="+'QQ'+" /></td>";
	contents+="<td width="+'30%'+"><span>客服名称:&nbsp; </span><input type="+'text'+" name="+'kfinfo['+rel+'][qqname]'+" class='"+'form-control kefus_input'+"' placeholder="+'客服名称'+" /></td>";
	contents+="<td width="+'20%'+"><span>排序:&nbsp; </span><input type="+'text'+" name="+'kfinfo['+rel+'][qqsort]'+" class='"+'form-control kefus_input'+"' placeholder="+'数字大的显示靠前'+" /></td>";
	contents+="<td width="+'20%'+"><a href="+'javascript:'+" title="+'#'+" onClick="+'dels(this);'+">删除</a><input type="+'checkbox'+" name="+'kfinfo['+rel+'][qqchkshow]'+" value="+'2'+">&nbsp;隐藏</td>";
	contents+="</tr>";
	$('.kefus_list tbody').append(contents);
}else{
	$.MsgBox.Alerta("温馨提示",'最多能添加四个客服！');
}
})

function dels(obj){
	var length = $('.kefus_list tbody').find('tr').length;
	if(length>1){
		$.MsgBox.Confirm('温馨提示','确定删除此客服！',function(){
			$(obj).parents('tr').remove();
		})
	}else{
		$.MsgBox.Alerta("温馨提示",'客服不能少于一个！');
	}
}

$(document).ready(function(){

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

</script>
</body>
</html>