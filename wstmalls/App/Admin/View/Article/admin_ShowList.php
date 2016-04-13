<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>文章管理列表</title>
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
  			<li><span>文章管理管理</span></li>
  			<li class="active">文章管理列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" target="_blank">新增文章管理</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline" action="<?php echo U('admin_ShowList'); ?>" id="form-search" method="post">
  <div class="form-group">
    <label for="Admin-Article-id">ID</label>
    <input type="text" class="form-control input-sm" name="id" id="Admin-Article-id" <?php if(isset($search['id'])){echo 'value="'.$search['id'].'"'; } else {echo 'placeholder="数据id"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Article-groupid">一级分类</label>
    <select class="form-control" id="Admin-Article-groupid" name="groupid" onchange="select('Admin-Article-groupid','Admin-Article-groupid2');">
    	<option value ="0">未选择</option>
		<?php get_select('articles', $search['groupid'],'level=1') ?>
	</select>
  </div>
  <div class="form-group">
    <label for="Admin-Article-groupid2">二级分类</label>
    <select class="form-control" id="Admin-Article-groupid2" name="groupid2" onchange="select('Admin-Article-groupid2','Admin-Article-groupid3');">
    	<option value ="0">未选择</option>
		<?php get_select('articles', $search['groupid2'],'level=2') ?>
	</select>
  </div>
  <div class="form-group">
    <label for="Admin-Article-groupid3">三级分类</label>
    <select class="form-control" id="Admin-Article-groupid3" name="groupid3" onchange="select('Admin-Article-groupid3','Admin-Item-groupid');">
    	<option value ="0">未选择</option>
		<?php get_select('articles', $search['groupid3'],'level=3') ?>
	</select>
  </div>  
  <div class="form-group">
    <label for="Admin-Article-style">模板式样</label>
    <input type="text" class="form-control input-sm" name="style" id="Admin-Article-style" <?php if(isset($search['style'])){echo 'value="'.$search['style'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Article-title">标题</label>
    <input type="text" class="form-control input-sm" name="title" id="Admin-Article-title" <?php if(isset($search['title'])){echo 'value="'.$search['title'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Article-date">添加日期</label>
    <input type="text" class="form-control input-sm" name="date" id="Admin-Article-date" <?php if(isset($search['date'])){echo 'value="'.$search['date'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Article-editor">发布者</label>
    <input type="text" class="form-control input-sm" name="editor" id="Admin-Article-editor" <?php if(isset($search['editor'])){echo 'value="'.$search['editor'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Article-state">状态</label>
    <select class="form-control" id="Admin-Article-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ITEM_STATE', $search['state']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Article-hot">首页推荐</label>
    <select class="form-control" id="Admin-Article-hot" name="hot">
    <option value ="0">未选择</option>
<?php get_select('ARTICLE_TYPE', $search['hot']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Article-hot1">资讯首页推荐</label>
    <select class="form-control" id="Admin-Article-hot1" name="hot1">
    <option value ="0">未选择</option>
<?php get_select('ARTICLE_TYPE', $search['hot1']) ?>
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
                  <th>分类</th>
                  <th>模板式样</th>
                  <th>标题</th>
                  <th>添加日期</th>
                  <th>添加时间</th>
                  <th>查看次数</th>
                  <th>发布者</th>
                  <th>状态</th>
                  <th>排序</th>
                  <th>首页推荐</th>
                  <th>资讯首页推荐</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['groupid'] ?></td>
                  <td><?php echo $row['style']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo date('Y-m-d H:i:s',$row['addtime']); ?></td>
                  <td><?php echo $row['views']; ?></td>
                  <td><?php echo $row['editor']; ?></td>
                  <td><?php echo $row['state'] ?></td>
                  <td><?php echo $row['sort']; ?></td>
                  <td><?php echo $row['hot'] ?></td>
                  <td><?php echo $row['hot1'] ?></td>

                  <td><a href="/news/<?php echo $row['date'],'/',$row['id']; ?>" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-search"></span> 查看</a><a href="<?php echo U('admin_edit',['id'=>$row['id']]); ?>" class="btn btn-warning btn-xs" target="_blank"><span class="glyphicon glyphicon-pencil"></span> 编辑</a><span class="btn btn-danger btn-xs"  onclick="del(<?php echo $row['id']; ?>)"><span class="glyphicon glyphicon-trash"></span> 删除</span></td>
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
function select(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	$.get("/Admin/Articles/get_select/id/"+id,function(data,status){
		$("#"+id2).html(data);
	});
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