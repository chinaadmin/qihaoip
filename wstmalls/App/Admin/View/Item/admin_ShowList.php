<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商品列表</title>
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
  			<li><span>商品管理</span></li>
  			<li class="active">商品列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" target="_blank">新增商品</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline" action="<?php echo U('admin_ShowList'); ?>" id="form-search" method="post">
  <div class="form-group">
    <label for="Admin-Item-id">ID</label>
    <input type="text" class="form-control input-sm" name="id" id="Admin-Item-id" <?php if(isset($search['id'])){echo 'value="'.$search['id'].'"'; } else {echo 'placeholder="数据ID"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Item-tmpa">商品类型</label>
    <select class="form-control" id="Admin-Items-tmpa" name="tmpa" onchange="select('Admin-Items-tmpa','Admin-Item-groupid');">
    <option value ="0">未选择</option>
<?php get_select('ITEM_PATM', $search['tmpa']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-groupid">一级分类</label>
    <select class="form-control" id="Admin-Item-groupid" name="groupid" onchange="select1('Admin-Item-groupid','Admin-Item-groupid2');">
    <option value ="0">未选择</option>
<?php get_select('items', $search['groupid']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-groupid2">二级分类</label>
    <select class="form-control" id="Admin-Item-groupid2" name="groupid2" onchange="select1('Admin-Item-groupid2','Admin-Item-groupid3');">
    <option value ="0">未选择</option>
<?php get_select('items', $search['groupid2']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-groupid3">三级分类</label>
    <select class="form-control" id="Admin-Item-groupid3" name="groupid3" onchange="select1('Admin-Item-groupid3','select_2');">
    <option value ="0">未选择</option>
<?php get_select('items', $search['groupid3']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-title">商品名称</label>
    <input type="text" class="form-control input-sm" name="title" id="Admin-Item-title" <?php if(isset($search['title'])){echo 'value="'.$search['title'].'"'; } else {echo 'placeholder="商品名称详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Item-state">是否显示</label>
    <select class="form-control" id="Admin-Item-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ITEM_STATE', $search['state']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-userid">用户ID</label>
    <input type="text" class="form-control input-sm" name="userid" id="Admin-Item-userid" <?php if(isset($search['userid'])){echo 'value="'.$search['userid'].'"'; } else {echo 'placeholder=""'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Item-aid">经纪人</label>
    <select class="form-control" id="Admin-Item-aid" name="aid">
    <option value ="0">未选择</option>
<?php get_select('member', $search['aid'], 'admin=3', 'adminord', 'id', 'name') ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-type">商品性质</label>
    <select class="form-control" id="Admin-Item-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('ITEM_TYPE', $search['type']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-adddate">添加日期</label>
    <input type="text" class="form-control input-sm" name="adddate" id="Admin-Item-adddate" <?php if(isset($search['adddate'])){echo 'value="'.$search['adddate'].'"'; } else {echo 'placeholder="自动"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Item-tmno">申请号</label>
    <input type="text" class="form-control input-sm" name="tmno" id="Admin-Item-tmno" <?php if(isset($search['tmno'])){echo 'value="'.$search['tmno'].'"'; } else {echo 'placeholder=""'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Item-master">权利人</label>
    <input type="text" class="form-control input-sm" name="master" id="Admin-Item-master" <?php if(isset($search['master'])){echo 'value="'.$search['master'].'"'; } else {echo 'placeholder=""'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Item-mastertype">权利人类型</label>
    <select class="form-control" id="Admin-Item-mastertype" name="mastertype">
    <option value ="0">未选择</option>
<?php get_select('ITEM_MASTER_TYPE', $search['mastertype']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmtype">所属类别</label>
    <select class="form-control" id="Admin-Item-tmtype" name="tmtype">
    <option value ="0">未选择</option>
<?php get_select('ITEM_REG_TYPE', $search['tmtype']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening">首页推荐</label>
    <select class="form-control" id="Admin-Item-tmscreening" name="tmscreening">
    <option value ="0">未选择</option>
<?php get_select('ITEM_HOT', $search['tmscreening']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening1">市场页推荐</label>
    <select class="form-control" id="Admin-Item-tmscreening1" name="tmscreening1">
    <option value ="0">未选择</option>
<?php get_select('ITEM_HOT', $search['tmscreening1']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening2">资讯页推荐</label>
    <select class="form-control" id="Admin-Item-tmscreening2" name="tmscreening2">
    <option value ="0">未选择</option>
<?php get_select('ITEM_HOT', $search['tmscreening2']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening3">商城推荐</label>
    <select class="form-control" id="Admin-Item-tmscreening3" name="tmscreening3">
    <option value ="0">未选择</option>
<?php get_select('ITEM_SHOP', $search['tmscreening3']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening4">店铺推荐</label>
    <select class="form-control" id="Admin-Item-tmscreening4" name="tmscreening4">
    <option value ="0">未选择</option>
<?php get_select('ITEM_SHOP', $search['tmscreening4']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Item-tuijian">推荐方式</label>
    <select class="form-control" id="Admin-Item-tuijian" name="tuijian">
    <option value ="0">未选择</option>
<?php get_select('ITEM_TUIJIAN', $search['tuijian']) ?>
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
                  <th>类别</th>
                  <th>二级分类</th>
                  <th>三级分类</th>
                  <th>商品名称</th>
                  <th>商品价格</th>
                  <th>是否显示</th>
                  <th>用户ID</th>
                  <th>经纪人</th>
                  <th>商品性质</th>
                  <th>申请号</th>
                  <th>权利人</th>
                  <th>权利人类型</th>
                  <th>所属类别</th>
                  <th>申请日</th>
                  <th>注册日</th>
                  <th>到期日</th>
                  <th>商品地区</th>
                  <th>交易方式</th>
                  <th>首页推荐</th>
                  <th>市场页推荐</th>
                  <th>资讯页推荐</th>
                  <th>商城推荐</th>
                  <th>店铺推荐</th>
                  <th>推荐方式</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['tmpa'] ?></td>
                  <td><?php echo $row['groupid'] ?></td>
                  <td><?php echo $row['groupid2'] ?></td>
                  <td><?php echo $row['groupid3'] ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['state'] ?></td>
                  <td><?php echo $row['userid']; ?></td>
                  <td><?php echo $row['aid'] ?></td>
                  <td><?php echo $row['type'] ?></td>
                  <td><?php echo $row['tmno']; ?></td>
                  <td><?php echo $row['master']; ?></td>
                  <td><?php echo $row['mastertype'] ?></td>
                  <td><?php echo $row['tmtype'] ?></td>
                  <td><?php echo $row['tmregdate']; ?></td>
                  <td><?php echo $row['tmregstart']; ?></td>
                  <td><?php echo $row['tmregend']; ?></td>
                  <td><?php echo $row['tmregarea'] ?></td>
                  <td><?php echo $row['tmtradeway'] ?></td>
                  <td><?php echo $row['tmscreening'] ?></td>
                  <td><?php echo $row['tmscreening1'] ?></td>
                  <td><?php echo $row['tmscreening2'] ?></td>
                  <td><?php echo $row['tmscreening3'] ?></td>
                  <td><?php echo $row['tmscreening4'] ?></td>
                  <td><?php echo $row['tuijian'] ?></td>

                  <td><a href="<?php echo $row['tmpa']==1?'/trademark/'.$row['id']:'';echo $row['tmpa']==2?'/patent/'.$row['id']:''; ?>" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-search"></span> 查看</a><a href="<?php echo U('admin_edit',['id'=>$row['id']]); ?>" class="btn btn-warning btn-xs" target="_blank"><span class="glyphicon glyphicon-pencil"></span> 编辑</a><span class="btn btn-danger btn-xs"  onclick="del(<?php echo $row['id']; ?>)"><span class="glyphicon glyphicon-trash"></span> 删除</span></td>
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