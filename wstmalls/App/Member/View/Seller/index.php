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
				您当前的位置：<a href="#" title="#">卖家中心</a> > <a href="#" title="#">我的订单</a>
			</div>
			<div class="hgrzy">
<div class="col-xs-12 chgsc listweizhi">
<ul>
		<li><a href="<?php echo U('Seller/index');?>" <?php if($data['type'] == 0){?>class="vselst1"<?php }?>>全部订单</a></li>
		<li><a href="<?php echo U('Seller/index');?>?type=1" <?php if($data['type'] == 1){?>class="vselst1"<?php }?>>待支付</a></li>
		<li><a href="<?php echo U('Seller/index');?>?type=2" <?php if($data['type'] == 2){?>class="vselst1"<?php }?>>已支付</a></li>
		<li><a href="<?php echo U('Seller/index');?>?type=3" <?php if($data['type'] == 3){?>class="vselst1"<?php }?>>手续办理</a></li>
		<li><a href="<?php echo U('Seller/index');?>?type=4" <?php if($data['type'] == 4){?>class="vselst1"<?php }?>>待确认</a></li>
		<li><a href="<?php echo U('Seller/index');?>?type=5" <?php if($data['type'] == 5){?>class="vselst1"<?php }?>>已完成</a></li>
		<li><a href="<?php echo U('Seller/index');?>?type=11" <?php if($data['type'] == 11){?>class="vselst1"<?php }?>>已超时</a></li>
		<li><a href="<?php echo U('Seller/index');?>?type=12" <?php if($data['type'] == 12){?>class="vselst1"<?php }?>>已撤销</a></li>
</ul>
</div>
	<div class="col-xs-12" style="border: solid 1px;border-color: #D1D1D1;background-color: #EAEAEA;height: 50px;line-height: 50px;font-size: 15px;font-weight:bold;">
	  <div class="col-xs-8">
		<div class="col-xs-5" style="padding-left:20px;">商品信息</div>
		<div class="col-xs-3">买家</div>
		<div class="col-xs-2">交易类型</div>
		<div class="col-xs-2">应缴总额</div>
	  </div>
	<div class="col-xs-4">
		<div class="col-xs-5">订单状态</div>
		<div class="col-xs-7">操作</div>
	  </div>
	</div>
	<?php foreach ($data['data'] as $value){?>
	<div class="col-xs-12" style="border-style: solid solid solid solid;border-color: #D1D1D1;border-width: 1px;background-color: #E1E1E1;margin-top: 10px;padding-left: 10px;height: 30px;line-height: 30px;">
	订单号：<?php echo '<a href="'.U('order_show',['uid'=>$value['uid']]).'" target="_blank">'.$value['uid'].'</a>'.'<!-- | 创建时间：',date('Y-m-d H:i:s',$value['datetime']),'-->'; ?>
	<span class="pull-right" style="display: none;"><?php echo '最近更新：',date('Y-m-d H:i:s',$value['updatetime']); ?></span>
	</div>
	<div class="col-xs-12" style="border-style: none solid solid solid;border-color: #D1D1D1;border-width: 1px;line-height: 84px;">
	  <?php if($value['type'] == '1'){ ?>
	  <div class="col-xs-8">
	    <div class="col-xs-5" style="display: block; font-weight: normal; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; line-height:20px;">
	    <?php if($value['tmpa']==1){?>	
		    <a href="__APP__/trademark/<?php echo $value['sid']?>HTMLSUFFIX">
		  		<img src="<?php $img = explode(',', $value['img']);echo $img[0]; ?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;">
		    	<p style="height:5px; overflow:hidden;">&nbsp;</p>
		    	注册号：<?php echo $value['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo C('ITEM_PATM')[$value['tmpa']] ?>】</span><?php echo $value['title']; ?>
		  	</a>
		<?php }else{?>
			<a href="__APP__/patent/<?php echo $value['sid']?>HTMLSUFFIX">
		  		<img src="<?php $img = explode(',', $value['img']);echo $img[0]; ?>" style="border:1px solid #EAEAEA; margin: 10px 20px 10px 10px;width: 70px;height: 60px; float:left;">
		    	<p style="height:5px; overflow:hidden;">&nbsp;</p>
		    	申请号：<?php echo $value['tmno']; ?><br /><span style="color: #FF6600;">【<?php echo C('ITEM_PATM')[$value['tmpa']] ?>】</span><?php echo $value['title']; ?>
		  	</a>
	  	<?php }?>
	  	</div>
	  	<div class="col-xs-3 posi_tion"><?php echo $value['name']; ?>
	  	<div class="otherss othersst">
	  			<p>手机：<?php echo $value['mobile']; ?></p>
				<p>电话：<?php echo $value['tel']; ?></p>
				<p>邮箱：<?php echo $value['email']; ?></p>
				<p>QQ：<?php echo $value['qq']; ?></p>
		</div>
	  	</div>
		<div class="col-xs-2"><?php echo C('ITEM_SELL_TYPE')[$value['tmtradeway']]; ?></div>
		<div class="col-xs-2" style="color: #FF6600;"><?php echo $value['amount']; ?></div>
	  </div>
	  <?php } ?>
	  <div class="col-xs-4" >
		<div class="col-xs-5" style="line-height: 22px;padding-top:20px;"><span style="color: #FF6600;"><?php echo C('ORDER_STATE')[$value['state']]; ?></span><br/><?php echo '<a href="'.U('order_showseller',['uid'=>$value['uid']]).'">订单详情</a>'; ?></div>
		<div class="col-xs-7" style="line-height: 22px;padding-top:20px;">
		<?php
		if($value['state']=='1'){
            echo "<span id='divname".$value['id']."' style='margin-top:-15px;float:left;'>00:00:00</span>";
			echo "
		<script type='text/javascript'>
        $(document).ready(function(){
        ShowCountDown(".$value['id'].",1,".($value['datetime']+3600*24-time()).",0);
      	});
    </script>
		";
		} else if($value['state']=='2'){
			echo '等待办理手续';
		} else if($value['state']=='3'){
			echo '手续办理中...';
		}else if($value['state']=='11' || $value['state']=='12'){
			echo '<a href="'.U('order_del',['uid'=>$value['uid'],'redit'=>base64_encode(get_url())]).'" >删除订单</a>';
		}
		?>
		</div>
	  </div>
	</div>
	<?php } ?>

 
<?php if(isset($data['page'])){ echo $data['page']; }?>
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
/*倒计时*/
//var interval = 1000;
//var runtimes = 0;
function ShowCountDown(pid,status,lefttime,runtimes){
var leftTime= lefttime*1000-runtimes*1000;
if(leftTime<=0){
	window.location.reload();
} else {
	var leftsecond = parseInt(leftTime/1000); 
	var day1=parseInt(leftsecond/(24*60*60*6)); 
	var hour=Math.floor((leftsecond-day1*24*60*60)/3600); 
	var minute=Math.floor((leftsecond-day1*24*60*60-hour*3600)/60); 
	var second=Math.floor(leftsecond-day1*24*60*60-hour*3600-minute*60);
	var cc = document.getElementById('divname'+pid); 
	cc.innerHTML =hour+"小时"+minute+"分"+second+"秒"; 
}
runtimes++;
setTimeout(function(){ShowCountDown(pid,status,lefttime,runtimes)},1000);
}
/*倒计时*/
/*显示联系方式*/
$('.posi_tion').hover(function(){
	$(this).find('.otherss').css('display','block');
	},function(){
	$(this).find('.otherss').css('display','none');
	}
	)
/*显示联系方式*/
/*左侧导航*/
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
  $(this).parent().siblings('dl').children('dd').slideUp("slow");
	});
});
/*左侧导航*/
</script>
</body>
</html>