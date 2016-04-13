<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<include file="Public/left" />
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="hytit">
				您当前的位置：<a href="<?php echo U('User/index'); ?>" title="会员中心">会员中心</a> ><span>我的收藏</span>
			</div>
			<div class="hgrzy">
				<h2>我的收藏</h2>
				<div class="col-xs-12 scxz">
					<div class="col-xs-3 scxzall">
						<input type="checkbox" id="selall" /> &nbsp;全选 
						<!--<a href="javascript:void(0);" url="<?php echo U('Member/User/add_cart_all')?>" title="加入购物车" class="formsub">加入购物车</a>-->
						<a href="javascript:void(0);" url="<?php echo U('Member/User/remove_favorite_all')?>" title="删除" class="formsub">删除</a>
					</div>
					<div class="col-xs-9 chgsc">
						<ul>
							<li><a href="<?php echo U('Member/User/favorite');?>" title="全部收藏" <?php echo empty($tmpa)?'class="vselst1"':'' ?>>全部收藏</a></li>
							<li><a href="<?php echo U('Member/User/favorite',array('tmpa'=>'1'));?>" title="商标收藏" <?php echo isset($tmpa)&& $tmpa=='1'?'class="vselst1"':'';?>>商标收藏</a></li>
							<li><a href="<?php echo U('Member/User/favorite',array('tmpa'=>'2'));?>" title="专利收藏" <?php echo isset($tmpa)&& $tmpa=='2'?'class="vselst1"':'';?>>专利收藏</a></li>
							<!-- <li><a href="javascript:;" title="#">创客收藏</a></li>
							<li><a href="javascript:;" title="#">商城收藏</a></li> -->
						</ul>
					</div>
				</div>
				<form method="post" id="myform">
				<div class="col-xs-12 dhconlist" id="dhconlist0">
				<?php foreach ($data['item_data'] as $key=>$value):?>
					<div class="col-xs-3 dihui">
						<div class="col-xs-12 dihuis">
							<div class="col-xs-12 kkll">
								<img src="<?php echo $value['img'];?>" />
								<div class="scbg">
									<div class="datus">
										 <input type="checkbox" name="add[]" value="<?php echo $value['id'];?>" />&nbsp;选择
										<p>
										<!--	<a href="javascript:;" title="#" class="dthds">大图</a>｜▼
										</p> -->
										<div class="xialajiaru">
											<div class="hjrgwctt hjrgwctt1"><a class="add_cart" data = "<?php echo $value['id']?>">加入购物车</a></div>
											<div class="hjrgwctt hjrgwctt2">删除</div>
										</div>
									</div>
								</div>
							</div>
							<p class="jifenp">
								<a href="#" title="#" target="_blank"><?php echo $value['title']?></a>
							</p>
							<p class="jifenp1">注册号：<?php echo $value['tmno']?></p>
							<p class="jifenp1">
								积分：<span>18000</span>
							</p>
							<!-- <div class="hlibies">25类</div> -->
						</div>
					</div>
					<?php endforeach;?>
					
					<?php echo $data['page'];?>
				</div>
				</form>
			</div>
			<include file="Public/foot" />
		</div>
	</div>
	<!--右侧内容-->
</div>
<div id="zzjs_net" class="zzjs_net"></div>
<div id="tanchu" class="tanchus">
	<div class="wwwhyzx">
		<ul class="51buypic">
			<li><a href="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/dhimgs.jpg" /></a></li>
			<li><a href="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/dhimgs1.jpg" /></a></li>
			<li><a href="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/dhimgs2.jpg" /></a></li>
			<li><a href="#" target="_blank"><img src="<?php echo STATIC_V2;?>images/dhimgs3.jpg" /></a></li>

		</ul>
		<a class="prev" href="javascript:void(0)"></a> <a class="next"
			href="javascript:void(0)"></a>
		<div class="hyoff">
			<a href="javascript:"><img src="<?php echo STATIC_V2;?>images/guanbi.png" /></a>
		</div>
	</div>
</div>
<!--主体-->
<script type='text/javascript'>
$(document).ready(function(){
$(".tablest tr:odd").css('background','#F5F5F5');
});
/*鼠标移过，左右按钮显示*/
$(".wwwhyzx").hover(function(){
	$(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
	$(this).find(".prev,.next").hide();
})
/*鼠标移过某个按钮 高亮显示*/
$(".prev,.next").hover(function(){
	$(this).fadeTo("show",0.7);
},function(){
	$(this).fadeTo("show",0.1);
})
$(".wwwhyzx").slide({ titCell:".num ul" , mainCell:".51buypic" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });
/*弹出框*/
function gbtt(){
$('#tanchu').css('visibility','hidden');
$('#zzjs_net').css('display','none');
$(document.body).css("overflow","visible");
}
function qdtt(){
$('#tanchu').css('visibility','visible');
$('#zzjs_net').css('display','block');
$(document.body).css('overflow','hidden');
}
/*弹出框*/

/*加入购物车或者删除*/
/*全选*/
$('#selall').click(function(){
	if(this.checked){
		$("input[name*='add']").attr("checked","checked");
	}else{
		$("input[name*='add']").removeAttr("checked");
	}
})
$("input[name*='add']").click(function(){
	if(!(this.checked)){
		$('#selall').removeAttr("checked");
	}
})
/*全选*/

/*单个删除*/
$('.hjrgwctt2').click(function(){
	var hval=$(this).parents('.datus').find("input[name*='add']").val();
	var send_data={'item':hval};
	var url = "<?php echo U('Member/User/remove_favorite')?>";
	var obj = $(this);
	$.post(url,send_data,function(msg){
		if(msg.success==true){
			$.MsgBox.Alerta("温馨提示：",'删除成功！',function(){
				obj.parents('.dihui').remove();
				});
			
		}
	})
})
/*单个删除*/
/*加入购物车或者删除*/
/*收藏切换*/
$('.chgsc li').click(function(){
var tt=$(this).index();
$("div[id*='dhconlist']").css('display','none');
$("#dhconlist"+tt).css('display','block');
$('.chgsc li a').removeClass('vselst1');
$(this).find("a").addClass('vselst1');
})
/*收藏切换*/
/*鼠标放上后显示选择大图*/
$("div[class*='kkll']").mouseover(function(){
$(this).children("div[class*='scbg']").css('display','block');
})
$("div[class*='kkll']").mouseout(function(){
$(this).children("div[class*='scbg']").css('display','none');
})
/*鼠标放上后显示选择大图*/
$(function(){
$(".hconlefts dt").click(function(){ 
$(this).parent().children('dd').slideToggle("slow");
$(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
});
});

var val = $('input[name="shu"]').val();
$('.sub').live('click',function(){
	var val = $('input[name="shu"]').val();
	var data = $(this).parent().parent().prev().find('a').attr('href');
	var url = data.replace(/p\/\d+/,'p/'+val);
	window.location.href= url;
})

$('.formsub').click(function(){
	var url = $(this).attr('url');
	$('#myform').attr('action',url);
	$('#myform').submit();
})

$('.add_cart').click(function(){
	var obj = $(this);
	var data =obj.attr('data');
	var url ="<?php echo U('Index/Cart/add')?>";
	if(data){
		$.get(url,{'id':data},function(msg){
			if(msg.success==true){
				$.MsgBox.Alerta("温馨提示：",'添加成功！')
			}
		})
	}
})
</script>
</body>
</html>