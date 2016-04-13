<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>友情链接列表</title>
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
  			<li><span>友情链接管理</span></li>
  			<li class="active">友情链接列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" target="_blank">新增友情链接</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline" action="<?php echo U('admin_ShowList'); ?>" id="form-search" method="post">
  <div class="form-group">
    <label for="Admin-Link-id">ID</label>
    <input type="text" class="form-control input-sm" name="id" id="Admin-Link-id" <?php if(isset($search['id'])){echo 'value="'.$search['id'].'"'; } else {echo 'placeholder="数据id"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Link-groupid">链接分组</label>
    <select class="form-control" id="Admin-Link-groupid" name="groupid">
    <option value ="0">未选择</option>
<?php get_select('links', $search['groupid']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Link-name">网站名称</label>
    <input type="text" class="form-control input-sm" name="name" id="Admin-Link-name" <?php if(isset($search['name'])){echo 'value="'.$search['name'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Link-link">网址</label>
    <input type="text" class="form-control input-sm" name="link" id="Admin-Link-link" <?php if(isset($search['link'])){echo 'value="'.$search['link'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Link-nofollow">nofollow标签</label>
    <select class="form-control" id="Admin-Link-nofollow" name="nofollow">
    <option value ="0">未选择</option>
<?php get_select('NO_FOLLOW', $search['nofollow']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Link-state">状态</label>
    <select class="form-control" id="Admin-Link-state" name="state">
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
                  <th>链接分组</th>
                  <th>网站名称</th>
                  <th>网址</th>
                  <th>图片</th>
                  <th>nofollow标签</th>
                  <th>关于</th>
                  <th>开始时间</th>
                  <th>结束时间</th>
                  <th>状态</th>
                  <th>排序</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['groupid'] ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['link']; ?></td>
                  <td><?php echo '<a href="'.$row['img'].'" target="_blank"><img src="'.$row['img'].'" width="200px">'; ?></td>
                  <td><?php echo $row['nofollow'] ?></td>
                  <td><?php echo $row['about'] ?></td>
                  <td><?php echo $row['addtime']; ?></td>
                  <td><?php echo $row['endtime']; ?></td>
                  <td><?php echo $row['state'] ?></td>
                  <td><?php echo $row['sort']; ?></td>

                  <td><a href="admin_show/id/<?php echo $row['id'] ?>" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-search"></span> 查看</a><a href="<?php echo U('admin_edit',['id'=>$row['id']]); ?>" class="btn btn-warning btn-xs" target="_blank"><span class="glyphicon glyphicon-pencil"></span> 编辑</a><span class="btn btn-danger btn-xs"  onclick="del(<?php echo $row['id']; ?>)"><span class="glyphicon glyphicon-trash"></span> 删除</span></td>
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