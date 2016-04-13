<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>Dashboard Template for Bootstrap</title>
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
    <div class="container-fluid">
      <form class="form-signin" method="POST" autocomplete="on">
        <h2 class="form-signin-heading">请登陆</h2>
        <label for="inputEmail" class="sr-only">账号</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="账号" <?php if($login_adminname){echo 'value="'.$login_adminname.'"';} ?> required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="密码" required>
        <label for="inputPin" class="sr-only">验证码</label>
        <input type="text" id="inputPin" name="pin" class="form-control" placeholder="验证码" required>
        <a href="javascript:"><img src="<?php echo U('captcha',['id'=>rand(1000,9999)]); ?>" name="verify" id="refresh" title="刷新验证码" onclick="document.getElementById('refresh').src='<?php echo U('captcha'); ?>#'+Math.random()" /></a>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="rember" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
      </form>

    </div> <!-- /container -->
</body>
</html>