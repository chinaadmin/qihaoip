<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商品订单详情</title>
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
          <ol class="breadcrumb">
  		    <li><a href="<?php echo U('/Admin'); ?>">首页</a></li>
  			<li><a href="<?php echo U('admin_ShowList'); ?>">商品订单列表</a></li>
  			<li class="active">商品订单查看数据</li>
		  </ol>
          <h4 class="sub-header">数据详情商品订单-查看用户的商品订单</h4>
          <div class="container-fluid">
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>ID</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['id']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>订单号</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['uid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>父类id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['parent']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>支付流水</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['payid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>订单类型</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['type']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>卖家</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['seller']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>经纪人id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['aid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>买家</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['buyer']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>合同主体id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['htid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>受让主体id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['srid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['itemids']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>售价</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['price']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>手续费</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['fees']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>积分抵扣</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['jifen']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>代金券</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['voucher']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>总计</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['amount']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>订单日期</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['date']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>订单时间</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['datetime']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>更新时间</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['updatetime']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>订单留言</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['about']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>订单状态</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['state']; ?></p></div>
          </div>

          </div> 
        </div>
<!-- content -->
    </div>
</div>
</body>
</html>