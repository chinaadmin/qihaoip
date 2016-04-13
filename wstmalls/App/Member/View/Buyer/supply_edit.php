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
您当前的位置：<a href="<?php echo U('index');?>">买家中心</a> > 编辑求购信息
</div>
<div class="hgrzy">
<div class="col-xs-12 hfbzltit">
<span>编辑求购信息</span>
</div>
<div class="col-xs-12 fbzlform">
<form class="form-horizontal" action="#" method='post'>
 <div class="form-group">
    <div class="col-xs-1 scrzgmc">求购信息标题:&nbsp;   </div>
    <div class="col-xs-6 ">
    	<input type="text" name="title" min="2" required maxlength="30" class="form-control" <?php echo 'value="'.$data['data']['title'].'"'; ?> placeholder="想要求购的商品" />
    </div>
	<div class="col-xs-2 wdfbwz">2-30个字</div>
  </div>
<div class="form-group">
  <div class="col-xs-1 scrzgmc">求购分类:&nbsp;   </div>
  <div class="col-xs-2 hjuli">
	<select class="form-control mainclass" required name="tmpa">
		<option value="1" <?php if($data['data']['tmpa'] == 1){?>selected="selected"<?php }?>>商标</option>
		<option value="2" <?php if($data['data']['tmpa'] == 2){?>selected="selected"<?php }?>>专利</option>
	</select>
  </div>
  <div class="col-xs-2 hjuli">
	<select class="form-control subclass" name="groupid1" style="display: none;">
		<?php foreach ($data['cate']['sb'] as $value){?>
	  		<option value="<?php echo $value['id'];?>" <?php if($data['data']['groupid'] == $value['id']){?>selected="selected"<?php }?>><?php echo $value['name'];?></option>
	  	<?php }?>	
	</select>
	<select class="form-control subclass" name="groupid2" style="display: none;">
		<?php foreach ($data['cate']['zl'] as $value){?>
	 		 <option value="<?php echo $value['id'];?>" <?php if($data['data']['groupid'] == $value['id']){?>selected="selected"<?php }?>><?php echo $value['name'];?></option>
	 	<?php }?>	 
	</select>
  </div>
</div>
  <div class="form-group">
    <div class="col-xs-1 scrzgmc">详细说明:&nbsp;   </div>
    <div class="col-xs-10">
    <textarea class="form-control" name="content" required rows="3" placeholder="为了更好的满足你的需求，请详细填写！"><?php echo $data['data']['content']; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-1 scrzgmc">过期时间:&nbsp;   </div>
    <div class="col-xs-2 hjuli">
    	<input type="text" name="endtime" <?php echo 'value="'.date('Y-m-d',$data['data']['endtime']).'"'; ?> class="form-control" placeholder="过期时间" id="J-xl"/>
    </div>
	<div class="col-xs-2 ">
<select class="form-control" name="selecttime">
  <option value="0">也可选择有效期</option>
  <option value="1">12个月</option>
  <option value="2">6个月</option>
</select>
    </div>
  </div>
   <div class="form-group">
    <div class="col-xs-1 scrzgmc">价格要求:&nbsp;   </div>
    <div class="col-xs-2 ">
    	<input type="text" name="pricemax" <?php echo 'value="'.$data['data']['pricemax'].'"'; ?> class="form-control" placeholder="价格"/>
    </div>
	<div class="col-xs-2 wdfbwz">不填则为“面议”</div>
  </div>
   <div class="col-xs-12">
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