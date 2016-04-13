<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>用户账户列表</title>
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
  			<li><span>用户账户管理</span></li>
  			<li class="active">用户账户列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" target="_blank">新增用户账户</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline" action="<?php echo U('admin_ShowList'); ?>" id="form-search" method="post">
  <div class="form-group">
    <label for="Admin-Member-id">ID</label>
    <input type="text" class="form-control input-sm" name="id" id="Admin-Member-id" <?php if(isset($search['id'])){echo 'value="'.$search['id'].'"'; } else {echo 'placeholder="数据id"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-ugroup">用户组</label>
    <select class="form-control" id="Admin-Member-ugroup" name="ugroup">
    <option value ="0">未选择</option>
<?php get_select('members', $search['ugroup']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-admin">管理组</label>
    <select class="form-control" id="Admin-Member-admin" name="admin">
    <option value ="0">未选择</option>
<?php get_select('admin', $search['admin']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-adminord">管理员排序</label>
    <input type="text" class="form-control input-sm" name="adminord" id="Admin-Member-adminord" <?php if(isset($search['adminord'])){echo 'value="'.$search['adminord'].'"'; } else {echo 'placeholder="管理员排序"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-username">用户账号</label>
    <input type="text" class="form-control input-sm" name="username" id="Admin-Member-username" <?php if(isset($search['username'])){echo 'value="'.$search['username'].'"'; } else {echo 'placeholder="账号"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-email">邮箱</label>
    <input type="text" class="form-control input-sm" name="email" id="Admin-Member-email" <?php if(isset($search['email'])){echo 'value="'.$search['email'].'"'; } else {echo 'placeholder="邮箱账号"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-mobile">手机号</label>
    <input type="text" class="form-control input-sm" name="mobile" id="Admin-Member-mobile" <?php if(isset($search['mobile'])){echo 'value="'.$search['mobile'].'"'; } else {echo 'placeholder="手机号码"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-tel">电话号码</label>
    <input type="text" class="form-control input-sm" name="tel" id="Admin-Member-tel" <?php if(isset($search['tel'])){echo 'value="'.$search['tel'].'"'; } else {echo 'placeholder="固定电话号码"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-webname">昵称</label>
    <input type="text" class="form-control input-sm" name="webname" id="Admin-Member-webname" <?php if(isset($search['webname'])){echo 'value="'.$search['webname'].'"'; } else {echo 'placeholder="网名"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-aid">经纪人</label>
    <select class="form-control" id="Admin-Member-aid" name="aid">
    <option value ="0">未选择</option>
<?php get_select('member', $search['aid'], 'admin=3', 'adminord', 'id', 'name') ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-qq">qq号码</label>
    <input type="text" class="form-control input-sm" name="qq" id="Admin-Member-qq" <?php if(isset($search['qq'])){echo 'value="'.$search['qq'].'"'; } else {echo 'placeholder="个人qq号"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-weixin">微信账号</label>
    <input type="text" class="form-control input-sm" name="weixin" id="Admin-Member-weixin" <?php if(isset($search['weixin'])){echo 'value="'.$search['weixin'].'"'; } else {echo 'placeholder="个人微信账号"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-name">姓名</label>
    <input type="text" class="form-control input-sm" name="name" id="Admin-Member-name" <?php if(isset($search['name'])){echo 'value="'.$search['name'].'"'; } else {echo 'placeholder="个人姓名"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-about">个人简介</label>
    <input type="text" class="form-control input-sm" name="about" id="Admin-Member-about" <?php if(isset($search['about'])){echo 'value="'.$search['about'].'"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-province">省份</label>
    <select class="form-control" id="Admin-Member-province" name="province">
    <option value ="0">未选择</option>
<?php get_select('province', $search['province']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-idcard">身份证号</label>
    <input type="text" class="form-control input-sm" name="idcard" id="Admin-Member-idcard" <?php if(isset($search['idcard'])){echo 'value="'.$search['idcard'].'"'; } else {echo 'placeholder="个人身份号"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Member-emailchk">邮箱验证</label>
    <select class="form-control" id="Admin-Member-emailchk" name="emailchk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $search['emailchk']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-mobilechk">手机验证</label>
    <select class="form-control" id="Admin-Member-mobilechk" name="mobilechk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $search['mobilechk']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-idcardchk">身份验证</label>
    <select class="form-control" id="Admin-Member-idcardchk" name="idcardchk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $search['idcardchk']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-bankcardchk">银行卡验证</label>
    <select class="form-control" id="Admin-Member-bankcardchk" name="bankcardchk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $search['bankcardchk']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Member-state">状态</label>
    <select class="form-control" id="Admin-Member-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('USER_STATE', $search['state']) ?>
	</select>
  </div>
  <button type="submit" class="btn btn-info btn-sm">搜索</button>
  <button type="reset" class="btn btn-danger btn-sm" onclick="return freset()">清空</button>
</form>
		  </div>
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>用户组</th>
                  <th>管理组</th>
                  <th>管理员排序</th>
                  <th>用户账号</th>
                  <th>邮箱</th>
                  <th>手机号</th>
                  <th>昵称</th>
                  <th>经纪人</th>
                  <th>qq号码</th>
                  <th>微信账号</th>
                  <th>姓名</th>
                  <th>个人简介</th>
                  <th>省份</th>
                  <th>城市</th>
                  <th>地址</th>
                  <th>注册日期</th>
                  <th>性别</th>
                  <th>状态</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['ugroup'] ?></td>
                  <td><?php echo $row['admin'] ?></td>
                  <td><?php echo $row['adminord']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['mobile']; ?></td>
                  <td><?php echo $row['webname']; ?></td>
                  <td><?php echo $row['aid'] ?></td>
                  <td><?php echo $row['qq']; ?></td>
                  <td><?php echo $row['weixin']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['about'] ?></td>
                  <td><?php echo $row['province'] ?></td>
                  <td><?php echo $row['city']; ?></td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['regdate']; ?></td>
                  <td><?php echo $row['gender'] ?></td>
                  <td><?php echo $row['state'] ?></td>

                  <td><a href="admin_show/id/<?php echo $row['id']; ?>" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-search"></span> 查看</a><a href="<?php echo U('admin_edit',['id'=>$row['id']]); ?>" class="btn btn-warning btn-xs" target="_blank"><span class="glyphicon glyphicon-pencil"></span> 编辑</a><span class="btn btn-danger btn-xs"  onclick="del(<?php echo $row['id']; ?>)"><span class="glyphicon glyphicon-trash"></span> 删除</span></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
<div class="container-fluid">
  	<nav>
	<form class="navbar-form form-inline" action="<?php echo U('admin_ShowList'); ?>" method="get">
	<?php echo $data['page']; ?>
	</form>  
	</nav>
</div>
          </div>
        </div>
<script type="text/javascript">
function del(id){
	$.ajax({
		type:"GET",
		url:"<?php echo U('admin_del'); ?>",
		data:'id='+id,
		success:function(data){
			var re = eval(data);
			if(re.success){
				location.reload(true);
			} else {
				alert(re.errorMsg);
			}
		}
	});
	return false;
}
function freset(){
		$.ajax({
			type:"POST",
			url:"<?php echo U('admin_ShowList'); ?>",
			data:'cleanSearch=1',
			success:function(data){
				var re = eval(data);
				if(re.success){
					window.location.href=window.location.href;
				} else {
					alert(re.errorMsg);
				}
			}
		});
		return false;
	}
</script>
<!-- content -->
    </div>
</div>
</body>
</html>