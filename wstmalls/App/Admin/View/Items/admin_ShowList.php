<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商品分类列表</title>
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
  			<li><span>商品分类管理</span></li>
  			<li class="active">商品分类列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" target="_blank">新增商品分类</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline" action="<?php echo U('admin_ShowList'); ?>" id="form-search" method="post">
  <div class="form-group">
    <label for="Admin-Items-id">ID</label>
    <input type="text" class="form-control input-sm" name="id" id="Admin-Items-id" <?php if(isset($search['id'])){echo 'value="'.$search['id'].'"'; } else {echo 'placeholder="数据ID"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Items-tmpa">商品类型</label>
    <select class="form-control" id="Admin-Items-tmpa" name="tmpa" onchange="select('Admin-Items-tmpa','Admin-Item-groupid');">
    <option value ="0">未选择</option>
<?php get_select('ITEM_PATM', $search['tmpa']) ?>
	</select>
  </div>  
  <div class="form-group">
    <label for="Admin-Item-groupid">一级分类</label>
    <select class="form-control" id="Admin-Item-groupid" name="groupid" onchange="select1('Admin-Item-groupid','Admin-Item-groupid2');">
    <option value ="0">未选择</option>
<?php get_select('items', $search['groupid'],'level=1') ?>
	</select>
  </div>
  <div class="form-group">
    <label for="Admin-Item-groupid2">二级分类</label>
    <select class="form-control" id="Admin-Item-groupid2" name="groupid2" onchange="select1('Admin-Item-groupid2','Admin-Item-groupid3');">
    <option value ="0">未选择</option>
<?php get_select('items', $search['groupid2'],'level=2') ?>
	</select>
  </div>
  <div class="form-group">
    <label for="Admin-Item-groupid3">三级分类</label>
    <select class="form-control" id="Admin-Item-groupid3" name="groupid3" onchange="select1('Admin-Item-groupid3','select_2');">
    <option value ="0">未选择</option>
<?php get_select('items', $search['groupid3'],'level=3') ?>
	</select>
  </div>
   <div class="form-group">
    <label for="Admin-Items-name">类别名称</label>
    <input type="text" class="form-control input-sm" name="name" id="Admin-Items-name" <?php if(isset($search['name'])){echo 'value="'.$search['name'].'"'; } else {echo 'placeholder="类别名称"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Items-state">状态</label>
    <select class="form-control" id="Admin-Items-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('USER_STATE', $search['state']) ?>
	</select>
  </div>
    <div class="form-group">
    <label for="Admin-Item-level">级别</label>
    <select class="form-control" id="Admin-Items-level" name="level">
    <option value ="0">未选择</option>
<?php get_select('CATE_LEVEL', $search['level']) ?>
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
                  <th>商品类型</th>
                  <th>一级分类</th>
                  <th>二级分类</th>
                  <th>类别名称</th>
                  <th>类别说明</th>
                  <th>级别</th>
                  <th>排序</th>
                  <th>状态</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['tmpa'] ?></td>
                  <td><?php echo $row['pcate']['name'] ?></td>
                  <td><?php echo $row['scate']['name'] ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['about'] ?></td>
                  <td><?php echo $row['level']; ?></td>
                  <td><?php echo $row['sort']; ?></td>
                  <td><?php echo $row['state'] ?></td>

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
function select(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	if (id==0){return false;}
	$.get("/Admin/Items/get_select/tmpa/"+id,function(data,status){
		$("#"+id2).html(data);
	});
}

function select1(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	if (id==0){return false;}
	$.get("/Admin/Items/get_select/id/"+id,function(data,status){
		$("#"+id2).html(data);
	});
}

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