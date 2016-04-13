<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商铺详情</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">商铺列表</a></li>
  			<li class="active">商铺查看数据</li>
		  </ol>
          <h4 class="sub-header">数据详情商铺-数据备注</h4>
          <div class="container-fluid">
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>ID</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['id']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城名称</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['name']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>SEO标题</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['title']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>SEO关键词</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['keywords']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>SEO描述</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['description']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城简介</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['content']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城logo</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['logo']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城形象图</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['img']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>企业名</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['qyname']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>企业简介</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['about']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>荣誉资质</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['honor']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>联系人姓名</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['person']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>用户确认状态</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['chkstate']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>客服信息</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['kfinfo']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>工作时间</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['worktime']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>是否显示电话</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['showphone']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>是否显示座机</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['showtel']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>是否显示商标模块</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['showtm']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>是否显示专利模块</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['showpa']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>是否显示特别推荐模块</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['showtj']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城模板</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['template']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>企业用户身份id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['companyid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>企业用户认证状态</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['companychk']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>个人用户身份id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['personid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>个人用户身份认证状态</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['personchk']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城负责人身份id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['masterid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>手机号码</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['phone']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>电话号码</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tel']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>邮箱</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['email']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>qq</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['qq']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>微信</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['weixin']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>省份</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['province']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>城市</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['city']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>联系地址</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['address']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>经纪人id</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['aid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城推荐</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tuijian']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>商城排序</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['sort']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>验证状态</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['state']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>验证原因</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['reason']; ?></p></div>
          </div>

          </div> 
        </div>
<!-- content -->
    </div>
</div>
</body>
</html>