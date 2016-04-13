<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>后台管理中心首页</title>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
	<link href="<?php echo STATIC_V2;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo STATIC_V2;?>css/admin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo STATIC_V2;?>js/admin.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<include file="Public/header" />
<div class="container-fluid">
	<div class="row">
<include file="Public/left" />
<!-- content -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<p>
<?php
$str='';
$notice = '';
$str .= '<div class="row"><div class="col-sm-5"><h3>会员概况</h3>';
foreach ($data['member_day'] as $row){
	$str .= $row['regdate'].'新增：'.$row['count(*)'].'<br />';
}
$str .= '总计：'.$data['members'].'<br />';


$ord_num = 0;
$str .= '</div><div class="col-sm-5"><h3>订单概况</h3>';
foreach ($data['orders'] as $row){
	$ord_num += $row['count(*)'];
	$str .= C('ORDER_STATE')[$row['state']].'：'.$row['count(*)'].'<br />';
}
$str .= '总计：'.$ord_num.'<br />';
// foreach ($data['order_day'] as $row){
// 	$str .= $row['date'].'新增：'.$row['count(*)'].'<br />';
// }
$str .= '</div></div><div class="row"><div class="col-sm-5"><h3>商城概况</h3>';
$shop_num = 0;
foreach ($data['shops'] as $row){
	$shop_num += $row['count(*)'];
	$str .= C('SHOP_STATE')[$row['state']].'：'.$row['count(*)'].'<br />';
	if($row['state']=='2'){
		$notice .= '<a href="/Admin/Shop/admin_ShowList.html" target="_blank">待审核商城：'.$row['count(*)'].'</a><br />';
	}
}
$str .= '总计：'.$shop_num.'<br />';
$str .= '</div><div class="col-sm-5"><h3>商品概况</h3>';
$item_num = 0;
foreach ($data['items'] as $row){
	$item_num += $row['count(*)'];
	$str .= C('ITEM_STATE')[$row['state']].'：'.$row['count(*)'].'<br />';
	if($row['state']=='2'){
		$notice .= '<a href="/Admin/Item/admin_ShowList.html" target="_blank">待审核商品：'.$row['count(*)'].'</a><br />';
	}
}
$str .= '总计：'.$item_num.'<br />';
$str .= '</div></div><div class="row"><div class="col-sm-5"><h3>供求概况</h3>';
$supply_num = 0;
foreach ($data['supplys'] as $row){
	$supply_num += $row['count(*)'];
	$str .= C('ITEM_STATE')[$row['state']].'：'.$row['count(*)'].'<br />';
	if($row['state']=='2'){
		$notice .= '<a href="/Admin/Sypply/admin_ShowList.html" target="_blank">待审核供求信息：'.$row['count(*)'].'</a><br />';
	}
}
$str .= '总计：'.$supply_num.'<br /></div><div class="col-sm-5"><h3>审核概况</h3>';

$str .= $notice;
$str .= '</div></div>';
echo $str;
?>
</div>
<!-- content -->
    </div>
</div>
</body>
</html>