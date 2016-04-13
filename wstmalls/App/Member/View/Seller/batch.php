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
				您当前的位置：<a href="{:U('Seller/index')}">卖家中心</a> > <a href="{:U('Seller/batch',array('type'=>1))}">批量发布</a>
			</div>
			<div class="hgrzy">
				<div class="col-xs-12 sell_creat">
					<ul>
					<li><a href="<?php echo U('batch',array('type'=>'1'))?>" <?php echo $data['type']=='1'?'class="selcreat"':''?>>批量发布商标</a></li>
					<li><a href="<?php echo U('batch',array('type'=>'2'))?>" <?php echo $data['type']=='2'?'class="selcreat"':''?>>批量发布专利</a></li>
					</ul>
				</div>
				<div class="col-xs-12 sell_creatlist">
					详细填写相关信息，可以帮助您更快找到买家。您还可以批量上传！
				</div>
				<div class="col-xs-12 fbzlform creat_border" id="yqljs0">
				<form method="post" class="form-horizontal" action="<?php echo U('batch_upload'); ?>" enctype="multipart/form-data" >
				<p class="pilian">批量发布<?php echo $data['name']; ?></p>
				<div class="form-group ">
				<div class="col-xs-10 pilian_left">
					<input type='text' name='htextfields2' id='hstextfields2' class='txt' placeholder="文件上传"/>
					<input type='button' class='btn btn-warning' value='上传文件'/>
					<input type="file" name="myfile" class="file " multiple="multiple" onChange="document.getElementById('hstextfields2').value=this.value" />
				</div>
				</div>
				<div class="form-group ">
				 <div class="col-xs-10 pilian_left">
				 	<button type="submit" class="btn btn-warning button">确认上传</button> 
				 	<?php if($data['type']==1){?>
				 		<a href="/doc/trademark.xls" class="btn btn-warning">下载表单</a> &nbsp;&nbsp;请下载空的批量商标表单
				 	<?php }else{?>
				 		<a href="/doc/patent.xls" class="btn btn-warning">下载表单</a> &nbsp;&nbsp;请下载空的批量专利表单
				 	<?php }?>
				 </div>
				</div>
				<p class="pilian">确认上传后我们将在三个工作日内为您处理，请耐心等待!</p>
				<p class="pilian">请下载对应的excel文件，按照指定格式填写数据，然后上传此文件以便进行批量发布操作！<br /><span style="color: red;">注意：请删除示例数据。请勿修改文件名。每个excel文件不超过1000行！</span></p>
				</form>
				</div>
				</div>
				<div class="col-xs-12 zhlist" style="margin-top:10px;" id="dhconlist0">
					<table cellpadding="0" cellspacing="0" class="tablesth"
						id="fbtable1" rel="1">
						<thead>
							<tr>
								<th>序号</th>
								<th>类型</th>
								<th>上传的文件</th>
								<th>上传时间</th>
								<th>当前状态</th>
								<th>总条目</th>
								<th>成功条目</th>
								<th>失败条目</th>
								<th>导出处理结果</th>
								<th>删除</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($data['data'] as $value){ ?>
							<tr>
								<td><?php echo $value['uid']; ?></td>
								<td><?php echo C('ITEM_PATM')[$value['type']],'批量上传任务';?></td>
								<th><a href="<?php echo $value['filename']; ?>">查看</a></th>
								<td><?php echo date('Y-m-d H:i:s',$value['starttime']);?></td>
								<td><?php echo C('BATCH_STATE')[$value['state']];?></td>
								<td><?php echo $value['state']=='1'?'-':$value['nums'];?></td>
								<td><?php echo $value['state']=='1'?'-':$value['success'];?></td>
								<td><?php echo $value['state']=='1'?'-':$value['failed'];?></td>
								<td><?php echo $value['state']=='3'?'<a href="'.substr($value['filename'], 0,-3).'csv">下载</a>':'-';?></td>
								<td><a href="<?php echo U('batch_del',['uid'=>$value['uid'],'type'=>$value['type']]); ?>">删除</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<?php echo $data['page'];?>
				</div>
			<include file="Public/foot" />
		</div>
	</div>
	<!--右侧内容-->
</div>
<!--主体-->
<script type='text/javascript'>
/*判断是否有数据批量上传*/
var num = "{$data['count']}";
if(num!=0){
	setTimeout("window.location.reload()",60000);
}

/*选择显示页数*/
$('.xianshit').change(function(){
	var tmscreening3 = $(this).val();
	var id = $(this).attr('id');
	var  url ="<?php echo U('Member/Seller/edit_tmscreening')?>";
	$.post(url,{'id':id,'tmscreening3':tmscreening3},function(msg){
		$.MsgBox.Alert('温馨提示',msg.msg);
	})
})
/*选择显示页数*/
/*全选*/
$('.scxzall input').click(function(){
var xb=$(this).attr('rel');
if(this.checked){
$("#fbtable"+xb).find("input[name*='id']").attr("checked","checked");
}else{
$("#fbtable"+xb).find("input[name*='id']").removeAttr("checked");
}
})
$(".tablesth input[name*='id']").click(function(){
var xb=$(this).parents('.tablesth').attr('rel');
if(!(this.checked)){
$('#selall'+xb).removeAttr("checked");
}
})
/*全选*/



$(document).ready(function(){
$(".tablesth tr:odd").css('background','#F5F5F5');
});

$(".tablesth tr:odd").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','#F5F5F5');
  }
);
$(".tablesth tr:even").hover(function(){
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
});
/*发布审核未通过过期切换*/
$('.chgsc li').click(function(){
var tt=$(this).index();
$('.chgsc li a').removeClass('vselst1');
$(this).find("a").addClass('vselst1');
})
/*发布审核未通过过期切换*/


	$('#fballsel0').find('a').click(function(){
		var url = $(this).attr('url');
		var send_data = $('.id').serialize();
		if(url&&send_data){
		window.location.href = url+'?'+send_data;
		}
	})








</script>
</body>
</html>