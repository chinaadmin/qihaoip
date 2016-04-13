<!doctype html>
<html lang="zh-cn">
<head>
<title>会员中心商标管家商标详情</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="icon" href="<?php echo STATIC_V2;?>images/favicon.ico"
	type="image/x-icon">
<link rel="shortcut icon"
	href="<?php echo STATIC_V2;?>images/favicon.ico" type="image/x-icon">
<link href="<?php echo STATIC_V2;?>css/bootstrap.css" rel="stylesheet"
	type="text/css" />
<link href="<?php echo STATIC_V2;?>css/minimal/orange.css"
	rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/sun.css" rel="stylesheet"
	type="text/css" />
<link href="<?php echo STATIC_V2;?>css/qihao.css" rel="stylesheet"
	type="text/css" />
<link href="<?php echo STATIC_V2;?>css/addimg.css" rel="stylesheet"
	type="text/css" />
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/jquery.min-1.1.0.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/jq_scroll.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/msgbox.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/newmsgbox.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/laydate.dev.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/formcheck.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/ajaxfileupload.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/jquery.imgareaselect.min.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/Validform_Datatype.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/Validform_v5.3.2.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>dist/echarts.js"></script>
<script type="text/javascript"
	src="<?php echo STATIC_V2;?>js/laydate.dev.js"></script>


<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type='text/javascript'>

</script>
<style type="text/css">
body {
	background: #ffffff;
}
</style>
</head>
<body>
	<!--头部-->
	<div class="zllisttop">
		<div class="zllisttop_left">
			<a href="/" target="_blank">7号网首页</a>
			<a href="/trademark/" title="商标转让-商标交易与管理平台,商标转让全国NO.1" target="_blank">商标市场</a>
			<a href="/patent/" title="专利转让-专利技术转让交易与管理平台" target="_blank">专利市场</a>
			<a href="/Trade/" title="商标管家" target="_blank">商标管家</a>
			<a href="#" title="#"
				target="_blank">专利管家</a>客服热线：400-889-7080
		</div>
		<div class="zllisttop_right">
			您好，<a href="<?php echo U('Member/User/index')?>" target="_blank"><?php echo $_SESSION['user']['name']?$_SESSION['user']['name']:$_SESSION['user']['username'];?></a>
			&nbsp;&nbsp;<a href="<?php echo U('/Index/User/logout'); ?>">退出</a>
		</div>
	</div>
	<!--头部-->
	<!--logo与搜索-->
	<div class="zllogo_search">
		<div class="zllist_logo">
			<img src="<?php echo STATIC_V2;?>images/zl_logo.png" />
		</div>
		<div class="zllist_search">
			<div class="col-xs-12 patjb">
				<div class="col-xs-12">
					<div class="zlpaform">
						<form method="post" action="<?php echo U('Trade/Index/tmlist')?>">
							<div class="formdiv">
								<select name="name" class="pazlm">
									<option value="fsqr1" <?php echo $list['post']['name']=='fsqr1'?'selected="selected"':'' ?>>权利人</option>
									<option value="name" <?php echo $list['post']['name']=='name'?'selected="selected"':'' ?>>商标名</option>
									<option value="id" <?php echo $list['post']['name']=='id'?'selected="selected"':'' ?>>注册号</option>
								</select> <select name="fclass" class="pazlm">
									<option value="">全类</option>
									<?php foreach ($list['items'] as $key => $value):?>
									<option value="<?php echo $value['id']?>" <?php echo $list['post']['fclass']==$value['id']?'selected="selected"':'' ?>><?php echo $value['name']?></option>
									<?php endforeach;?>
								</select> <input type="text" name="paseach" class="hand_search" value="<?php echo $list['post']['paseach']?$list['post']['paseach']:''?>"/>
								<input type="submit" value="检索" class="pasub" />
							</div>
						</form>
					</div>
					<div class="tips">温馨提示：可输入注册号,权利人,商标名称等信息,输入全称查询结果最佳</div>
				</div>
			</div>
		</div>
	</div>
	<!--logo与搜索-->
	<div class="zlhzlcon">
		<!--左侧导航-->
		<!-- <div class="zlhconleft">
			<div class="zllist_title">数据筛选</div>
			<div class="zlhconlefts">
					<dl>
						<dt>
							<a href="javascript:" title="#">申请日</a>
						</dt>
						<dd>
							<input type="checkbox" name="famins" value="famins">&nbsp;2015(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="shiyous">&nbsp;2014(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="waiguans">&nbsp;2013(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="xianggans">&nbsp;2012(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="taiwans">&nbsp;2011(273)
						</dd>
						<dd>
							<button type="submit" class="btn btn-default zllist_tijiao">确定</button>
						</dd>
					</dl>

					<dl>
						<dt>
							<a href="javascript:" title="#">注册日</a>
						</dt>
						<dd>
							<input type="checkbox" name="famins" value="famins">&nbsp;2015(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="shiyous">&nbsp;2014(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="waiguans">&nbsp;2013(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="xianggans">&nbsp;2012(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="taiwans">&nbsp;2011(273)
						</dd>
						<dd>
							<button type="submit" class="btn btn-default zllist_tijiao">确定</button>
						</dd>
					</dl>
					
					<dl>
						<dt>
							<a href="javascript:" title="#">商标状态</a>
						</dt>
						<dd>
							<input type="checkbox" name="famins" value="famins">&nbsp;商标状态1(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="shiyous">&nbsp;商标状态2(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="waiguans">&nbsp;商标状态3(273)
						</dd>
						<dd>
							<input type="checkbox" name="famins" value="xianggans">&nbsp;商标状态4(273)
						</dd>
						<dd>
							<button type="submit" class="btn btn-default zllist_tijiao">确定</button>
						</dd>
					</dl>
				
			</div>
		</div> -->
		<!--左侧导航-->
		<!--右侧内容-->
		<div class="zlhconright">
		<form action="" method="post">
			<div class="zl_list">
				<div class="col-xs-12 zl_list_selall">
					<div class="zl_listall">
						<input type="checkbox" name="alls" id="alls" />&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span
							id="nums">0</span>件商标
					</div>
					<a href="javascript:void(0)" class="btn btn-default paadd" act="<?php echo U('Trade/Trade/alladd')?>">添加商标</a>
				</div>
				<div class="col-xs-12 zllist_content">
				<?php foreach ($list['trade']['result']['items'] as $key=>$value):?>
					<div class="col-xs-12 zllist_one">
						<div class="zllist_one_img">
							<a href="<?php echo U('detail',array('tmid'=>$value['ftmid'],'class'=>$value['fclass']))?>"><img src="<?php echo U('Trade/GnTrade/tmimg',array('id'=>$value['ftmid'],'class'=>$value['fclass'])); ?>" /></a>
						</div>
						<div class="zllist_one_contents">
							<div class="col-xs-12 zllist_one_title">
								<input type="checkbox" name="ids[]" class="ids" value="<?php echo $value['ftmid']?>" />
								<div class="zllist_one_titleright">
									<h2>
										<a href="<?php echo U('detail',array('tmid'=>$value['ftmid'],'class'=>$value['fclass']))?>">【<?php echo $value['name']?>】注册号:<?php echo $value['fid']?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value['ftmchin']?></a><span
											class="youxiao"><?php echo C('TRADE_STATE')[$value['fbguserid']]?></span>
									</h2>
								</div>
							</div>
							<div class="col-xs-12 zllist_one_p">
								<p>
									<span>申请人:</span><?php echo $value['fsqr1']?>
								</p>
								<p>
									<span>申请日:</span>
									<?php 
										if($value['fsqdate']) {
											echo date('Y年m月d日',strtotime($value['fsqdate']));
										}
									?>
								</p>
								<p>
									<span>有效期:</span>
									<?php 
										if($value['fjzdate']) {
									 		echo date('Y年m月d日',strtotime($value['fjzdate']));
									 	}
									?>
								</p>
							</div>
							<div class="col-xs-12 zllist_one_jianjie">
								<span>服务项目:</span><?php echo $value['fsysp']?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<?php echo $list['page']?>
				</div>
			</div>
			</form>
			<div class="zl_list_right">
				<div class="col-xs-12 zllist_hot">
					<div class="col-xs-12 zllist_hots">
						<div class="col-xs-12 zllist_hots_title">相关推荐</div>
						<?php foreach ($list['sy'] as $key=>$value):?>
							<div class="zllist_hots_img">
								<div class="zllist_hots_imgs">
									<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" ><img src="<?php $img = explode(',',$value['img']);echo $img[0]?>" /></a>
								</div>
								<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" ><?php echo $value['name']?></a>
							</div>
							<?php endforeach;?>
					</div>
					<div class="col-xs-12 zllist_hots">
						<div class="col-xs-12 zllist_hots_title">热门商标</div>
						<?php foreach ($list['sc'] as $key=>$value):?>
							<div class="zllist_hots_img">
								<div class="zllist_hots_imgs">
									<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']);echo $img[0]?>" /></a>
								</div>
								<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><?php echo $value['name']?></a>
							</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>

		</div>
		<!--右侧内容-->

	</div>
	<div class="zllist_bottom">©2014-2018 7号网
		版权所有ICP经营性许可证：粤ICP备注5024104号-2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客服热线：400-889-7080&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312</div>
<script type='text/javascript'>

$('.paadd').live('click',function(){
	var act = $(this).attr('act');
	$(this).parents('form').attr('action',act);
	$(this).parents('form').submit();
})

$('input[name="shu"]').live('keyup',function(){
	var min = parseInt($(this).parents('.qiehuan').find('ul').find('li').first().find('a').html());
	var max = parseInt($(this).parents('.qiehuan').find('ul').find('li').last().find('a').html());
	var now = parseInt($(this).val());
	if(now<min){
		$(this).val(min);
	}else if(now>max){
		$(this).val(max);
	}	
});
$('.sub').live('click',function(){
	var val = $('input[name="shu"]').val();
	var data = $(this).parent().prev().find('a').attr('href');
	var url = data.replace(/p\/\d+/,'p/'+val);
	window.location.href= url;
})

/*选中数量*/
function zoushu(){
	var num=$(".ids:checked").length;
	$("#nums").html(num);
	}

/*全选*/
$('#alls').click(function(){
if(this.checked){
$(".zllist_content").find(".ids").prop("checked",true);
}else{
$(".zllist_content").find(".ids").removeAttr("checked");
}
zoushu();
})
$(".zllist_content .ids").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
zoushu();
})
/*全选*/
$(document).ready(function(){
$('.zllist_ons').parent().children('dd').slideToggle("slow");
});
$(function(){
	$(".zlhconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});

});
$(function () {
		$(window).scroll(function(){
			if ($(window).scrollTop()>183){
				$(".zlhconleft").addClass("zlhconleft_fixed");
			}else{
				$(".zlhconleft").removeClass("zlhconleft_fixed");
			}
		});
	});
/*搜索全选*/
$('.allsel').click(function(){
if(this.checked){
$(".pacheckbox").find("input[name*='Fruit']").prop("checked",true);
}else{
$(".pacheckbox").find("input[name*='Fruit']").removeAttr("checked");
}
})
$(".allone").click(function(){
if(!(this.checked)){
$('.allsel').removeAttr("checked");
}
})

/*搜索全选*/

</script>
</body>
</html>
