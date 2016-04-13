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
			<a href="#" title="#" target="_blank">专利管家</a>客服热线：400-889-7080
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
	<div class="zlhzlcon_detail">
		<div class="zldetail_nav">
			<ul>
				<li><a href="#" title="#" class="zldetail_navon">公开详情</a></li>
			</ul>
			<div class="detail_addzl">
				<a href="javascript:void(0)" class="add" tmid="<?php echo $list['trade']['result']['items'][0]['ftmid'] ?>">添加商标</a>
			</div>
			<!-- <div class="detail_addzl">
				<a href="#" title="#">下载</a>
			</div> -->
		</div>
	</div>
	<div class="zldetail_con">
		<div class="zldetail_cons">
			<div class="zldetail_cons_left" id="yqljs0">

				<div class="col-xs-12 zldetail_floor2">
					<div class="zllist_one_titleright zllist_one_titlerights">
						<h2>
							<?php echo $list['trade']['result']['items'][0]['ftmchin'].$list['trade']['result']['items'][0]['ftmeng'].$list['trade']['result']['items'][0]['ftmpy']?$list['trade']['result']['items'][0]['ftmchin'].$list['trade']['result']['items'][0]['ftmeng'].$list['trade']['result']['items'][0]['ftmpy']:$list['trade']['trade_name']?> (注册号：<?php echo $list['trade']['result']['items'][0]['fid']?$list['trade']['result']['items'][0]['fid']:$list['trade']['reg_id']?>)<span
							class="youxiao"><?php echo  $list['trade']['result']['items'][0]['fbguserid']?C('TRADE_STATE')[$value['fbguserid']]:C('TRADE_STATE')[$list['trade']['trade_dynamic_state']]?></span>
						</h2>
					</div>
					<div class="zldetail_futu sbdetail_img">
						<img
							src="<?php echo $list['trade']['result']['items'][0]['fid']?U('Trade/GnTrade/tmimg',array('id'=>$list['trade']['result']['items'][0]['ftmid'],'class'=>$list['trade']['result']['items'][0]['fclass'])):$list['trade']['img'][0]; ?>" />
					</div>
					<div class="zldetail_zhaiyao sbdetail_zhaiyao">
						<div class="zldetail_zhaiyaos sbdetail_zhaiyaos">
							<p>
								【商标类别】：<span><?php echo $list['trade']['result']['items'][0]['name']?$list['trade']['result']['items'][0]['name']:$list['trade']['name']?></span>
							</p>
							<p>【申请日期】：
								<?php 
									if($list['trade']['result']['items'][0]['fsqdate']){
										echo $list['trade']['result']['items'][0]['fsqdate'];
									}elseif ($list['trade']['sq_date']){
										echo $list['trade']['sq_date'];	
									}
								?>
							</p>
							<p>
								【权利人（中文/英文）】：<span><?php echo $list['trade']['result']['items'][0]['fsqr1']?$list['trade']['result']['items'][0]['fsqr1']:$list['trade']['trade_user']?></span>
							</p>
							<p>【权利人地址（中文/英文）】：<?php echo $list['trade']['result']['items'][0]['faddr']?$list['trade']['result']['items'][0]['faddr']:$list['trade']['res_address']?></p>
							<p>【代理组织】：<?php echo $list['trade']['result']['items'][0]['fdlzz']?$list['trade']['result']['items'][0]['fdlzz']:''?></p>
							<p>【商品/服务项目】：<?php echo $list['trade']['result']['items'][0]['fsysp']?$list['trade']['result']['items'][0]['fsysp']:$list['trade']['service']?></p>
							<p>【类似群组】：<?php echo $list['trade']['result']['items'][0]['fspzb']?$list['trade']['result']['items'][0]['fspzb']:''?></p>
							<p>【初审公告期号】：<?php echo $list['trade']['result']['items'][0]['fggq']>0?$list['trade']['result']['items'][0]['fggq']:''?></p>
							<p>【初审日期】：<?php echo $list['trade']['result']['items'][0]['fcsdate']?date('Y年m月d日',strtotime($list['trade']['result']['items'][0]['fcsdate'])):''?></p>
							<!-- <p>【注册公告期号】：1111</p> -->
							<p>【注册日期】：<?php 
								if($list['trade']['result']['items'][0]['fzcdate']){
									echo date('Y年m月d日',strtotime($list['trade']['result']['items'][0]['fzcdate']));
								}else{
									if($list['trade']['zc_date']){
										echo date('Y年m月d日',$list['trade']['zc_date']);
									}else{
										echo "";
									}
								}?>
							
							</p>
							<p>【截止日期】：<?php 
								if($list['trade']['result']['items'][0]['fjzdate']){
									echo date('Y年m月d日',strtotime($list['trade']['result']['items'][0]['fjzdate']));
								}else{
									if($list['trade']['zd_date']){
										echo date('Y年m月d日',$list['trade']['zd_date']);
									}else{
										echo "";
									}
								}?></p>
						</div>
					</div>
				</div>

				<div class="col-xs-12 zldetail_floor3">
					<div class="zldetail_tit">【商标动态】:</div>
					<div class="zldetail_zhaiyaos">
						<table cellpadding="0" cellspacing="0" class="zldetail_law">
							<thead>
								<tr>
									<th width="35%">商标状态公告日</th>
									<th width="65%">法律状态详情</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($list['trade_dynamic'] as $key=>$value):?>
							<?php if($value['fZTRQ']):?>
								<tr>
									<td width="35%"><?php echo $value['fZTRQ']?></td>
									<td width="65%"><?php echo $value['fZTDM']?></td>
								</tr>
							<?php elseif($value['type']):?>
								<tr>
									<td width="35%"><?php echo $value['time']?></td>
									<td width="65%"><?php echo $value['type']?></td>
								</tr>
							<?php endif?>
							<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>

			</div>

			<div class="zldetail_cons_right">
				<div class="zl_list_right">
					<div class="col-xs-12 zllist_hot zldetail_hot">
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
		</div>
	</div>
	<div class="zllist_bottom">©2014-2018 7号网
		版权所有ICP经营性许可证：粤ICP备注5024104号-2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客服热线：400-889-7080&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312</div>
<script type='text/javascript'>
$('.add').live('click',function(){
	var obj = $(this);
	var fid = $(this).attr('tmid');
	var url = "<?php echo U('Trade/Trade/ajax_add')?>";
	$.post(url,{'reg_id':fid},function(msg){
		$.MsgBoxgj.Confirm('温馨提示',msg.msg,function(){
			
		})
		
	})
})



/*导航切换*/
$('.zldetail_nav li').click(function(){
var tt=$(this).index();
$("div[id*='yqljs']").css('display','none');
$("#yqljs"+tt).css('display','block');
$('.zldetail_nav li a').removeClass('zldetail_navon');
$(this).find("a").addClass('zldetail_navon');

})
/*导航切换*/

</script>
</body>
</html>
