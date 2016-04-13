<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>用户评论列表</title>
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
  			<li><span>用户评论管理</span></li>
  			<li class="active">用户评论列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" target="_blank">新增用户评论</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline" action="<?php echo U('admin_ShowList'); ?>" id="form-search" method="post">
  <div class="form-group">
    <label for="Admin-Comment-id">ID</label>
    <input type="text" class="form-control input-sm" name="id" id="Admin-Comment-id" <?php if(isset($search['id'])){echo 'value="'.$search['id'].'"'; } else {echo 'placeholder="数据id"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-artid">数据ID</label>
    <input type="text" class="form-control input-sm" name="artid" id="Admin-Comment-artid" <?php if(isset($search['artid'])){echo 'value="'.$search['artid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-type">评论的类型</label>
    <select class="form-control" id="Admin-Comment-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('COMMENT_TYPE', $search['type']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Comment-upid">上级评论</label>
    <input type="text" class="form-control input-sm" name="upid" id="Admin-Comment-upid" <?php if(isset($search['upid'])){echo 'value="'.$search['upid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-amountid">评论者账号</label>
    <input type="text" class="form-control input-sm" name="amountid" id="Admin-Comment-amountid" <?php if(isset($search['amountid'])){echo 'value="'.$search['amountid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-amountip">访客IP</label>
    <input type="text" class="form-control input-sm" name="amountip" id="Admin-Comment-amountip" <?php if(isset($search['amountip'])){echo 'value="'.$search['amountip'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>

  <button type="submit" class="btn btn-info btn-sm">搜索</button>
  <button type="reset" class="btn btn-danger btn-sm" onclick="return freset()">清空</button>
</form>
		  </div>
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>数据ID</th>
                  <th>评论的类型</th>
                  <th>上级评论</th>
                  <th>评论者账号</th>
                  <th>访客IP</th>
                  <th>评论内容</th>
                  <th>喜欢</th>
                  <th>不喜欢</th>
                  <th>状态</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['artid']; ?></td>
                  <td><?php echo $row['type'] ?></td>
                  <td><?php echo $row['upid']; ?></td>
                  <td><?php echo $row['amountid']; ?></td>
                  <td><?php echo $row['amountip']; ?></td>
                  <td><?php echo $row['content'] ?></td>
                  <td><?php echo $row['like']; ?></td>
                  <td><?php echo $row['unlike']; ?></td>
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