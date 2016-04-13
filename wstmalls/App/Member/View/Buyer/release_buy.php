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
您当前的位置：<a href="<?php echo U('Buyer/order_list');?>">买家中心</a> > <a href="<?php echo U('Buyer/release_buy');?>">发布求购</a>
</div>
<div class="hgrzy">
<div class="col-xs-12 hfbzltit">
<span>发布求购</span>
</div>
<div class="col-xs-12 fbzlform">
<form class="form-horizontal" id="btnsubmit" method='post'>
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
 <div class="form-group">
    <div class="col-xs-1 scrzgmc">求购信息标题:&nbsp;   </div>
    <div class="col-xs-6 ">
    	<input type="text" name="zlmcst" min="2" maxlength="30" class="form-control" <?php if($_GET['id']){?>value="<?php echo $data['buyInfo']['title'];?>"<?php }else {?>placeholder="想要求购的商品	"<?php }?> />
    </div>
	<div class="col-xs-2 wdfbwz">2-30个字</div>
  </div>
<div class="form-group">
  <div class="col-xs-1 scrzgmc">求购分类:&nbsp;   </div>
  <div class="col-xs-2 hjuli">
	<select class="form-control mainclass" name="zlflstt">
		<option value="1" <?php if($_GET['maincatid'] == 1){?>selected="selected"<?php }?>>商标</option>
		<option value="2" <?php if($_GET['maincatid'] == 2){?>selected="selected"<?php }?>>专利</option>
	</select>
  </div>
  <div class="col-xs-2 hjuli">
	<select class="form-control subclass" name="zlflst1s" style="display: none;">
		<?php foreach ($data['cate']['sb'] as $value){?>
	  		<option value="<?php echo $value['id'];?>" <?php if($_GET['subcatid'] == $value['id']){?>selected="selected"<?php }?>><?php echo $value['name'];?></option>
	  	<?php }?>	
	</select>
	<select class="form-control subclass" name="zlflst2s" style="display: none;">
		<?php foreach ($data['cate']['zl'] as $value){?>
	 		 <option value="<?php echo $value['id'];?>" <?php if($_GET['subcatid'] == $value['id']){?>selected="selected"<?php }?>><?php echo $value['name'];?></option>
	 	<?php }?>	 
	</select>
  </div>
</div>
  <div class="form-group">
    <div class="col-xs-1 scrzgmc">详细说明:&nbsp;   </div>
    <div class="col-xs-10">
    <textarea class="form-control" name="mdzs" rows="3" <?php if(!$_GET['id']){?>placeholder="为了更好的满足你的需求，请详细填写！"<?php }?>><?php echo $data['buyInfo']['content'];?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-1 scrzgmc">过期时间:&nbsp;   </div>
    <div class="col-xs-2 hjuli">
    	<input type="text" name="zlhst" class="form-control" <?php if($_GET['id']){?>value="<?php echo $data['buyInfo']['endtime'];?>"<?php }else {?>placeholder="过期时间"<?php }?> id="J-xl"/>
    </div>
	<div class="col-xs-2 ">
<select class="form-control" name="zlfls">
  <option value="0">也可选择有效期</option>
  <option value="1">12个月</option>
  <option value="2">6个月</option>
</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-1 scrzgmc">价格要求:&nbsp;   </div>
    <div class="col-xs-2 ">
    	<input type="text" name="zlckjst" class="form-control" <?php if($_GET['id']){?>value="<?php echo $data['buyInfo']['pricemax'];?>"<?php }else {?>placeholder="专利参考价"<?php }?>/>
    </div>
	<div class="col-xs-2 wdfbwz">不填则为“面议”</div>
  </div>
   <div class="col-xs-12">
  <!-- <button type="submit" class="btn btn-warning weizhidaxiao">确定</button> -->
  <input type="submit" class="btn btn-warning weizhidaxiao" value="确定"/>
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
/* 求购分类  */
$(document).ready(function(){
	$(".mainclass").change(function(){
        $(".mainclass option").each(function(i,o){
            if($(this).attr("selected"))
            {
                $(".subclass").hide();
                $(".subclass").eq(i).show();
            }
        });
    });
    $(".mainclass").change();
});
/* jquery from提交 */ 
$('form').submit(function(){
  var param = $(this).serialize();
  var url = '<?php echo U('Buyer/relbuy_add');?>';
  $.post(url, param, function(data,status) {  // 用POST方法提交，如为GET方法则改为$.get
       if(data == 1){
    	   $.MsgBox.Alert("温馨提示：",'更新成功');
    	   window.location.href = '<?php echo U('Buyer/buy_list',['type'=>$_GET['type']]);?>';
	   }else if(data == 2) {
		   $.MsgBox.Alert("温馨提示：",'更新失败');
		   window.location.reload();
	   }else if(data == 3){
		   $.MsgBox.Alert("温馨提示：",'添加成功');
		   window.location.href = '<?php echo U('Buyer/buy_list',['type'=>'2']);?>';
	   }else if(data == 4){
		   $.MsgBox.Alert("温馨提示：",'添加失败');
		   window.location.reload();
	   }
    });
     
  return false;
});


laydate({
            elem: '#J-xl'
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