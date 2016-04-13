<include file="Public/header" />
<!--logo与导航-->
<!--头部-->
<!--主体-->
<div class="hzlcon">
<!--左侧导航-->
<include file="Public/left" />
<!--左侧导航-->
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon" >
<div class="hytit">
您当前的位置：卖家中心 > <a href="{:U('Seller/sell_list')}">我的商品</a>
</div>
<div class="hgrzy">
<div class="col-xs-12 sell_creat">
<ul>
<li><a href="<?php echo U('Member/Seller/sell_list',array('state'=>$data['state']))?>" <?php echo empty($data['tmpa'])?'class="selcreat"':''?>">全部商品</a></li>
<li><a href="<?php echo U('Member/Seller/sell_list',array('tmpa'=>'1','state'=>$data['state']))?>" <?php echo  isset($data['tmpa'])&&$data['tmpa']=='1'?'class="selcreat"':''?>">商标</a></li>
<li><a href="<?php echo U('Member/Seller/sell_list',array('tmpa'=>'2','state'=>$data['state']))?>" <?php echo  isset($data['tmpa'])&&$data['tmpa']=='2'?'class="selcreat"':''?>">专利</a></li>
</ul>
<div class="zlyjjyst1 shop_padding">
  <form action="" method="post">
      <div class="formdivs">
        <input type="text" name="name"  class="pasearchs" placeholder="名称、注册号、申请号等" value="<?php echo  isset($data['name'])?$data['name']:''?>"/>
        <input type="submit" value="搜索" class="pasubs"/>
      </div>
  </form>
 </div>
</div>


<div class="col-xs-12 " id="dhconlist0">
<table cellpadding="0" cellspacing="0" class="tablesth_shop" id="fbtable1" rel="1">
<thead>
<tr class="first">
<th width="9%">序号</th>
<th width="29%">商品信息</th>
<th width="14%">发布时间</th>
<th width="8%">参考价</th>
<th width="13%">
	<select class="form-control xianshit">
		<option <if condition="$Think.get.state eq '' ">selected = "selected"</if> value="">状态</option>
		<option <if condition="$Think.get.state eq '1' ">selected = "selected"</if> value="1">已发布</option>
		<option <if condition="$Think.get.state eq '2' ">selected = "selected"</if> value="2">审核中</option>
		<option <if condition="$Think.get.state eq '3' ">selected = "selected"</if> value="3">未通过</option>
		<option <if condition="$Think.get.state eq '4' ">selected = "selected"</if> value="4">已下架</option>
	</select>                  
</th>
<th width="12%">商城推荐</th>
<th width="15%">操作</th>
</tr>
</thead>
<tbody>
<?php foreach($data['item_data'] as $key=>$value):?>
	<?php if($value['tmpa']==1){
		$url = '/Index/Trademark/detail';
	 }elseif($value['tmpa']==2){
		$url = '/Index/Patent/detail';
	 }?>
<tr>
<td width="9%"><input type="checkbox" class="id" name="id[]" value="<?php echo $value['id'];?>"/> &nbsp;<?php echo $key+1;?></td>
<td width="29%">
<div  style="display: block; font-weight: normal; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; line-height:20px;">
<?php if($value['tmpa']=='1'){?>
<a href="__APP__/trademark/<?php echo $value['id']?>HTMLSUFFIX">
	<img src="<?php $img = explode(',',$value['img']); echo $img[0];?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;"/>
	<p style="height:5px; float:none; overflow:hidden;">&nbsp;</p>
		<?php echo '注册号：'.$value['tmno'];?>
		<br/>
		<span class="price_color">
		<?php echo '【商标】';?>
		</span>
		<?php echo $value['title'];?>
</a>
<?php }else{?>
<a href="__APP__/patent/<?php echo $value['id']?>HTMLSUFFIX">
	<img src="<?php $img = explode(',',$value['img']); echo $img[0];?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;"/>
	<p style="height:5px; float:none; overflow:hidden;">&nbsp;</p>
		<?php echo '专利号：'.$value['tmno'];?>
		<br/>
		<span class="price_color">
		<?php echo '【专利】';	?>
		</span>
		<?php echo $value['title'];?>
</a>
<?php }?>
</div>
</td>
<td width="14%" ><?php echo date('Y-m-d',$value['addtime']);?></td>
<td width="8%"><span class="price_color"><?php echo $value['price'];?></span></td>
<td width="13%">
	<?php 
		if($value['state']==1){
			echo '已发布';
		}elseif ($value['state']==2){
			echo '审核中';
		}elseif ($value['state']==3){
			echo '未通过';
		}else {
			echo '已下架';
		} 
	?>
</td>
<td width="12%">
<select class="form-control xianshits" name="tmscreening3" id="<?php echo $value['id']?>">
	<?php foreach (C('ITEM_SHOP') as $k => $v):?>
		<option value="<?php echo $k?>" <?php echo $value['tmscreening3']==$k?'selected="selected"':''?>><?php echo $v?></option>
	<?php endforeach;?>
</select>
</td>
<td width="15%">
<?php if($value['tmpa']=='1'):?>
	<a href="<?php echo U('Member/Seller/edit_tm',array('id'=>$value['id']))?>">编辑</a> 
<?php else:?>
	<a href="<?php echo U('Member/Seller/edit_pa',array('id'=>$value['id']))?>">编辑</a>
<?php endif?>
	&nbsp;
	<a href="<?php echo U('Member/Seller/edit',array('id'=>$value['id'],'state'=>'8'))?>" class="fbdel">删除</a>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<?php echo $data['page'];?>
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
/*发布商标与专利切换*/
$('.sell_creat li').click(function(){
$('.sell_creat li a').removeClass('selcreat');
$(this).find("a").addClass('selcreat');
})
/*发布商标与专利切换*/
/*选择显示页数*/
$('.xianshit').change(function(){
	if($(this).val() == '1'){
		window.location.href = "<?php echo U('Member/Seller/sell_list',array('state'=>'1','tmpa'=>$data['tmpa']))?>";
	}else if($(this).val() == '2'){
		window.location.href = "<?php echo U('Member/Seller/sell_list',array('state'=>'2','tmpa'=>$data['tmpa']))?>";
	}else if($(this).val() == '3'){
		window.location.href = "<?php echo U('Member/Seller/sell_list',array('state'=>'3','tmpa'=>$data['tmpa']))?>";
	}else if($(this).val() == '4'){
		window.location.href = "<?php echo U('Member/Seller/sell_list',array('state'=>'4','tmpa'=>$data['tmpa']))?>";
	}else{
		window.location.href = "{:U('Member/Seller/sell_list')}";
	}	
})
/*选择显示页数*/

/*选择推荐*/
$('.xianshits').change(function(){
	var tmscreening3 = $(this).val();
	var id = $(this).attr('id');
	var  url ="<?php echo U('Member/Seller/edit_tmscreening')?>";
	$.post(url,{'id':id,'tmscreening3':tmscreening3},function(msg){
		$.MsgBoxgj.Alert('温馨提示',msg.msg);
	})		
})
/*选择推荐*/

/*全选*/
$('.scxzall input').click(function(){
var xb=$(this).attr('rel');
if(this.checked){
$("#fbtable"+xb).find("input[name*='gwct']").attr("checked","checked");
}else{
$("#fbtable"+xb).find("input[name*='gwct']").removeAttr("checked");
}
})
$(".tablesth input[name*='gwct']").click(function(){
var xb=$(this).parents('.tablesth').attr('rel');
if(!(this.checked)){
$('#selall'+xb).removeAttr("checked");
}
})
/*全选*/
/*删除*/
/* $('.salldel').click(function(){
var xb=$(this).attr('name');
var row=new Array();
var n=0;
$("#fbtable"+xb).find("input[name*='gwct']").each(function(){
if(this.checked){
var ids=$(this).val();
row[n]=ids;
n++;
}
})
rows = row.join(",");
alert(rows);
var send_data={'id':rows};
$.post("a.php",send_data,function(data,ts){
if(ts){
window.location.reload();
}
})		
}) */
/*删除*/

/*单个删除*/
/* $('.fbdel').click(function(){
var hval=$(this).parents('tr').find("input[name*='gwct']").val();
alert(hval);
var send_data={'id':hval};
$.post("a.php",send_data,function(data,ts){
if(ts){
window.location.reload();
}
})
}) */
/*单个删除*/

$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
        $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
});

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