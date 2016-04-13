<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
<!--左侧导航-->
<div class="hconleft">
<include file="Public/left" />
</div>
<!--左侧导航-->
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：<a href="#">买家中心</a> > <a href="<?php echo U('Buyer/buy_list');?>">我的求购</a>
</div>
<div class="hgrzy">
<div class="col-xs-12 hfbzltit">
<span>我的求购</span><a href="<?php echo U('Buyer/release_buy');?>" target="_blank">发布求购</a>
</div>
<div class="col-xs-12 dqzhs dqzhst">
<div class="col-xs-8 ">
<div class="col-xs-2 scxzall" id="fballsel1">
<input type="checkbox"  id="selall1" /> &nbsp;全选
<a id="deletes1">删除</a>
</div>
<div class="col-xs-10 chgsc listweizhi">
<ul>
		<li><a href="<?php echo U('Buyer/buy_list');?>" <?php if($data['type'] == 0){?>class="vselst1"<?php }?>>全部</a></li>
			
		<li><a href="<?php echo U('Buyer/buy_list');?>?type=1" <?php if($data['type'] == 1){?>class="vselst1"<?php }?>>已发布</a></li>

		<li><a href="<?php echo U('Buyer/buy_list');?>?type=2" <?php if($data['type'] == 2){?>class="vselst1"<?php }?>>审核中</a></li>
	
		<li><a href="<?php echo U('Buyer/buy_list');?>?type=3" <?php if($data['type'] == 3){?>class="vselst1"<?php }?>>未通过</a></li>
	
		<li><a href="<?php echo U('Buyer/buy_list');?>?type=4" <?php if($data['type'] == 4){?>class="vselst1"<?php }?>>已过期</a></li>
	
</ul>
</div>
</div>
<div class="col-xs-4">
<form action="" method="get">
<div class="hsose">
<input type="text" name="search" class="sosest" <?php if(isset($_GET['search'])){?>placeholder="<?php echo $_GET['search'];?>"<?php }?>/>
<input type="hidden" name="type" value="<?php echo $data['type'];?>"/>
<input type="submit" value="搜索" class="sosetj"/>
</div>
</form>
</div>
</div>
<div class="col-xs-12" id="fbtable2">
<table cellpadding="0" cellspacing="0" class="tablesth" id="fbtable4">
		<thead>
			<tr>
				<th width="10%">流水号</th>
				<th width="30%">标题</th>
				<th width="20%">行业</th>
				<th width="20%">发布时间</th>
				<th width="20%">操作</th>
			</tr>
		</thead>
		<tbody>
				<?php foreach ($data['data'] as $value){?>
					<tr>
						<td width="10%"><input type="checkbox" name="uid" value="<?php echo $value['uid'];?>"/><a href="<?php echo U('/Index/Buy/detail',['uid'=>$value['uid']]);?>"><?php echo $value['uid'];?></a></td>
						<td width="30%"><?php echo $value['title'];?></td>
						<td width="20%"><?php echo $value['name'];?></td>
						<td width="20%"><?php echo $value['addtime'];?></td>
						<td width="20%"><a href="<?php echo U('Buyer/release_buy',['uid'=>$value['uid']]);?>" title="修改" class="tabaction"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a><a title="删除" onClick="deleteRe('<?php echo $value['uid'];?>',this);" class="tabaction fbdel"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
					</tr>
				<?php }?>
		</tbody>
</table>
<?php if(isset($data['page'])){ echo $data['page']; }?>
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
/*单个删除*/
function deleteRe(fid,obj){
		var send_data={'sid':fid};
		$.post("<?php echo U('Buyer/release_del');?>",send_data,function(data,status){
			if(data == 1){
				$.MsgBox.Alert("温馨提示：",'删除成功');
				$(obj).parent().parent().remove();
			}else{
				$.MsgBox.Alert("温馨提示：",'删除失败');
			}
		})
}  
/*全选*/
$('#selall1').click(function(){
	if(this.checked){
		$("#fbtable2 input[name*='uid']").attr("checked","checked");
	}else{
		$("#fbtable2 input[name*='uid']").removeAttr("checked");
	}
})
/*全选*/
/*删除*/
$('#deletes1').click(function(){
	 var row=new Array();
	 var n=0;
	 $("#fbtable2 input[name*='uid']").each(function(){
		 if(this.checked){
		 	var ids=$(this).attr("value");
		 	row[n]=ids;
		 	n++;
		 }
	 })
	 rows = row.join(",");
	 var send_data={'sid':rows};
	 $.post("<?php echo U('Buyer/review_del');?>",send_data,function(data,status){
		 if(data == 1){
			$.MsgBox.Alert("温馨提示：",'删除成功');
			setTimeout("window.location.reload()",1000);
		 }else{
			$.MsgBox.Alert("温馨提示：",'删除失败');
		 }
	 })		
})
/*删除*/
</script>
</body>
</html>