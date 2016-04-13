<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>index列表</title>
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
<?php include APP_PATH.'Common/view/header.php';?>
<div class="container-fluid">
	<div class="row">
<?php include APP_PATH.'Common/view/left.php';?>
<!-- content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <ol class="breadcrumb">
  		    <li><a href="/">首页</a></li>
  			<li><span>index管理</span></li>
  			<li class="active">index列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" >新增index</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline">
  <div class="form-group">
    <label for="Admin-Index-ids">ID</label>
    <input type="text" class="form-control input-sm" name="id" id="Admin-Index-ids" <?php if(isset($data['id'])){echo 'value="'.$data['id'].'"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Index-datas">数据</label>
    <input type="text" class="form-control input-sm" name="data" id="Admin-Index-datas" <?php if(isset($data['data'])){echo 'value="'.$data['data'].'"'; } ?>>
  </div>

  <button type="submit" class="btn btn-info btn-sm">搜索</button>
</form>
		  </div>
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>数据</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['data']; ?></td>

                  <td><a href="<?php echo U('admin_show',['id'=>$row['id']]); ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-search"></span> 查看</a><a href="<?php echo U('admin_edit',['id'=>$row['id']]); ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> 编辑</a><span class="btn btn-danger btn-xs"  onclick="del(<?php echo $row['id']; ?>)"><span class="glyphicon glyphicon-trash"></span> 删除</span></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
<div class="container-fluid">
  	<nav>
	<form class="navbar-form form-inline" action="<?php echo U(''); ?>" method="get">
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
</script>
<!-- content -->
    </div>
</div>
</body>
</html>