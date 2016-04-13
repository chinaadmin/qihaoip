<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增管理组</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">管理组列表</a></li>
  			<li class="active">管理组新增</li>
		  </ol>
          <h4 class="sub-header">新增管理组-管理员角色配置</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Admin-name" class="col-sm-2 col-md-1 col-lg-1  control-label">管理组名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Admin-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="中文名称"'; } ?>  placeholder="必填:管理组名称" required>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Admin-data">权限列表</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="data" id="Admin-Admin-data" class="col-sm-12 col-md-12 col-lg-12"  placeholder="权限列表"><?php if(isset($data['data'])){echo $data['data']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Admin-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Admin-state" name="state">
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
	if(!chk_v_l('Admin-Admin-name','管理组名称',2,8)){return false;};

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