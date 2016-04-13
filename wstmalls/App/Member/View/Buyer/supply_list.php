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
您当前的位置：<a href="<?php echo U('index'); ?>">买家中心</a> > <a href="<?php echo U('Buyer/supply_list');?>">我的求购</a>
</div>

<div class="hgrzy">
<div class="col-xs-12 sell_creat">
<ul>
<li><a href="<?php echo U('Buyer/supply_list');?>" <empty name="Think.get.tmpa">class="selcreat"</empty>>全部求购</a></li>
<li><a href="<?php echo U('Buyer/supply_list',['tmpa'=>'1']);?>" <eq name="Think.get.tmpa" value="1">class="selcreat"</eq>>商标求购</a></li>
<li><a href="<?php echo U('Buyer/supply_list',['tmpa'=>'2']);?>" <eq name="Think.get.tmpa" value="2">class="selcreat"</eq>>专利求购</a></li>
</ul>
<div class="zlyjjyst1 shop_padding">
            <form method="get" action="#">
              <div class="formdivs">
                <input type="text" name="search"  class="pasearchs" placeholder="标题、行业、时间等"/>
                <input type="submit" value="搜索" class="pasubs"/>
              </div>
            </form>
 </div>
</div>


<div class="col-xs-12 " id="dhconlist0">
<table cellpadding="0" cellspacing="0" class="tablesth_shop" id="fbtable1" rel="1">
<thead>
<tr class="first">
<th width="37%">标题</th>
<th width="15%">行业/类别</th>
<th width="15%">发布时间</th>
<th width="15%">
<form action="<?php $url_arr = $data['url'];unset($url_arr['type']);echo U($url_arr); ?>" method="GET">
					 <select class="form-control xianshit" name="type">
                        <option value="0">状态</option>
                        <option value="1" <?php echo $data['type']=='1'?'selected="selected"':''; ?>>已发布</option>
                        <option value="2" <?php echo $data['type']=='2'?'selected="selected"':''; ?>>审核中</option>
						<option value="3" <?php echo $data['type']=='3'?'selected="selected"':''; ?>>未通过</option>
                      </select>
                      
</form>
</th>
<th width="18%">操作</th>
</tr>
</thead>
<tbody>

<?php foreach ($data['data'] as $row){ ?>
<tr>
<td width="37%">
<input type="checkbox" name="gwct1" value="<?php echo $row['uid']; ?>"/> &nbsp;<span class="price_color"><?php echo C('ITEM_PATM')[$row['tmpa']]; ?></span>
<a href="{:U('/buy/detail',array('uid'=>$row['uid']))}"><?php echo $row['title']; ?></a>
</td>
<td width="15%"><?php echo $row['name']; ?></td>
<td width="15%" ><?php echo date('Y-m-d',$row['addtime']); ?></td>
<td width="15%"><?php echo C('ITEM_STATE')[$row['state']]; ?></td>
<td width="18%">
	<a href="<?php echo U('/Index/Buy/detail',['uid'=>$row['uid']]); ?>">查看</a>&nbsp;
	<eq name="row['tmpa']" value="1">
		<a href="<?php echo U('supply_tmedit',['uid'=>$row['uid']]); ?>">编辑</a> 
	<else/>
		<a href="<?php echo U('supply_paedit',['uid'=>$row['uid']]); ?>">编辑</a> 
	</eq>
	&nbsp;
	<a href="javascript:;" class="fbdel" onClick="deleteRe('<?php echo $row['uid'];?>',this);">删除</a>
</td>
</tr>
<?php } ?>
<tr style="background:#EBEBEB;">
                <td colspan="5">
				<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:" id="deletes1">删除</a></div>
				
				</td>
             </tr>
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
/*全选*/
$('#alls').click(function(){
if(this.checked){
$(".tablesth_shop").find("input[name*='gwct']").prop("checked",true);
}else{
$(".tablesth_shop").find("input[name*='gwct']").removeAttr("checked");
}
//zoushu();
})
$(".tablesth_shop input[name*='gwct']").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
//zoushu();
})
/*全选*/
/*选择状态*/
$('.xianshit').change(function(){
$(this).parent().submit();
})
/*选择状态*/
/*发布商标与专利切换*/
$('.sell_creat li').click(function(){
$('.sell_creat li a').removeClass('selcreat');
$(this).find("a").addClass('selcreat');
})
/*发布商标与专利切换*/
/*左侧导航*/
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').slideUp("slow");
	});
});
/*左侧导航*/
/*单个删除*/
function deleteRe(fid,obj){
		var send_data={'sid':fid};
		$.post("<?php echo U('supply_del');?>",send_data,function(data,status){
			if(data == 1){
				window.location.reload();
			}
		})
}  

/*删除*/
$('#deletes1').click(function(){
	 var row=new Array();
	 var n=0;
	 $(".tablesth_shop input[name*='gwct']").each(function(){
		 if(this.checked){
		 	var ids=$(this).attr("value");
		 	row[n]=ids;
		 	n++;
		 }
	 })
	 rows = row.join(",");
	 var send_data={'sid':rows};
	 $.post("<?php echo U('supply_del');?>",send_data,function(data,status){
		 if(data == 1){
			$.MsgBoxgj.Alerta("温馨提示：",'删除成功',function(){
				window.location.reload();
			});
		 }else{
			$.MsgBoxgj.Alerta("温馨提示：",'删除失败');
		 }
	 })		
})
/*删除*/
</script>
</body>
</html>