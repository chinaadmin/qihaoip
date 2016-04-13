<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商品详情</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">商品列表</a></li>
  			<li class="active">商品查看数据</li>
		  </ol>
          <h4 class="sub-header">数据详情商品-包含所有商标和专利，以及以后可能出现的商品。</h4>
          <div class="container-fluid">
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>ID</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['id']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品类型</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmpa']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>类别</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['groupid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>二级分类</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['groupid2']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>三级分类</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['groupid3']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品名称</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['title']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>关键词</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['keywords']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>描述</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['description']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品简介</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['introduce']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品价格</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['price']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>库存</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['count']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>浏览次数</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['views']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>是否显示</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['state']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>广告图片</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['adimg']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品图片</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['img']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>用户ID</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['userid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>经纪人</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['aid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品性质</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['type']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>添加日期</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['adddate']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>添加时间</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['addtime']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>修改时间</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['edittime']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>申请号</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmno']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>权利人</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['master']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>权利人类型</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['mastertype']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>所属类别</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmtype']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>服务项目</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmlimit']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>申请日</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmregdate']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>注册日</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmregstart']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>到期日</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmregend']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品地区</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmregarea']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>交易方式</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmtradeway']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>首页推荐</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmscreening']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>市场页推荐</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmscreening1']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>资讯页推荐</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmscreening2']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城推荐</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmscreening3']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>店铺推荐</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmscreening4']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>推荐方式</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tuijian']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商品内容详情</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tmcontent']; ?></p></div>
          </div>

          </div> 
        </div>
<!-- content -->
    </div>
</div>
</body>
</html>