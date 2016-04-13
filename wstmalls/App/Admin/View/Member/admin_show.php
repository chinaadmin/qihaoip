<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>用户账户详情</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">用户账户列表</a></li>
  			<li class="active">用户账户查看数据</li>
		  </ol>
          <h4 class="sub-header">数据详情用户账户-所有用户资料</h4>
          <div class="container-fluid">
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>ID</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['id']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>用户组</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['ugroup']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>管理组</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['admin']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>管理员排序</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['adminord']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>用户账号</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['username']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>邮箱</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['email']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>手机号</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['mobile']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>电话号码</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['tel']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>昵称</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['webname']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>经纪人</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['aid']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>qq号码</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['qq']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>微信账号</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['weixin']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>姓名</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['name']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>个人简介</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['about']; ?></p></div>
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
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>地址</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['address']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>归属银行</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['bank']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>银行卡号</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['bankcard']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>身份证号</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['idcard']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>身份证照片</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['idcardimg']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>注册ip</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['regip']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>注册日期</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['regdate']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>注册时间</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['regtime']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>用户积分</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['jifen']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>金额</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['money']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>冻结金额</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['lockmoney']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>七号币</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['qmoney']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>邮箱验证</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['emailchk']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>手机验证</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['mobilechk']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>身份验证</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['idcardchk']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>银行卡验证</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['bankcardchk']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>用户密码</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['password']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>支付密码</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['paypassword']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>性别</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['gender']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>头像图片</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['img']; ?></p></div>
          </div>
          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>状态</strong></div>
          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data['state']; ?></p></div>
          </div>

          </div> 
        </div>
<!-- content -->
    </div>
</div>
</body>
</html>