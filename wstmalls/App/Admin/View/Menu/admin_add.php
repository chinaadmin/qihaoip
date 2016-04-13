<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增导航菜单</title>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/ckeditor/sample.js"></script>
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
        <?php if(isset($msg) && $msg){ ?>
          <script type="text/javascript">
            alert('<?php echo $msg; ?>');
          </script>
        <?php } ?>
          <ol class="breadcrumb">
  		    <li><a href="<?php echo U('/Admin'); ?>">首页</a></li>
  			<li><a href="<?php echo U('admin_ShowList'); ?>">导航菜单列表</a></li>
  			<li class="active">导航菜单新增</li>
		  </ol>
          <h4 class="sub-header">新增导航菜单-页面的导航菜单</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Menu-groupid"  class="col-sm-2 col-md-1 col-lg-1  control-label">所在类别</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Menu-groupid" name="groupid">
    <option value ="0">未选择</option>
<?php get_select('menus', $data['groupid']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Menu-upid" class="col-sm-2 col-md-1 col-lg-1  control-label">上级导航</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="upid" id="Admin-Menu-upid" <?php if(isset($data['upid'])){echo 'value="'.$data['upid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="上级导航" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Menu-name" class="col-sm-2 col-md-1 col-lg-1  control-label">名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Menu-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="名称" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Menu-title" class="col-sm-2 col-md-1 col-lg-1  control-label">title标签</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Menu-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="title标签" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Menu-alt" class="col-sm-2 col-md-1 col-lg-1  control-label">alt标签</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="alt" id="Admin-Menu-alt" <?php if(isset($data['alt'])){echo 'value="'.$data['alt'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="alt标签" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Menu-link" class="col-sm-2 col-md-1 col-lg-1  control-label">链接地址</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="link" id="Admin-Menu-link" <?php if(isset($data['link'])){echo 'value="'.$data['link'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="必填:链接地址" required>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Menu-about">链接说明</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="about" id="Admin-Menu-about" class="col-sm-12 col-md-12 col-lg-12"  placeholder="链接说明"><?php if(isset($data['about'])){echo $data['about']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Menu-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Menu-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="排序" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Menu-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">是否显示</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Menu-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('USER_STATE', $data['state']) ?>
	</select>
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label"></label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input class="btn btn-default" type="submit" value="提交">
    </div>
  </div>
</form>
          </div> 
        </div>
<script type="text/javascript">
function toVaild(formid){

	return true;
}

function chk_v_l(id,name,len,max){
	if(len && $('#'+id).val()==''){
		alert(name+'不能为空');//
		$('#'+id).focus();
		return false;
	} else {
		if(len && $('#'+id).val().length<len){
			alert(name+'不能少于'+len+'字');//
			$('#'+id).focus();
			return false;
		}
		if(max && $('#'+id).val().length>max){
			alert(name+'不能大于'+max+'字');//
			$('#'+id).focus();
			return false;
		}
		return true;
	}
}
initSample();
</script>
<!-- content -->
    </div>
</div>
</body>
</html>