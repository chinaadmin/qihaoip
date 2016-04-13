<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增用户商铺广告</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">用户商铺广告列表</a></li>
  			<li class="active">用户商铺广告新增</li>
		  </ol>
          <h4 class="sub-header">新增用户商铺广告-包含banner、商标和专利广告</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Shopad-shopid" class="col-sm-2 col-md-1 col-lg-1  control-label">商城id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="shopid" id="Admin-Shopad-shopid" <?php if(isset($data['shopid'])){echo 'value="'.$data['shopid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="商城id" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shopad-type"  class="col-sm-2 col-md-1 col-lg-1  control-label">广告组</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shopad-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('SHOP_AD_TYPE', $data['type']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Shopad-name" class="col-sm-2 col-md-1 col-lg-1  control-label">广告名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Shopad-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="广告名称" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shopad-img" class="col-sm-2 col-md-1 col-lg-1  control-label">广告图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="img" id="Admin-Shopad-img" <?php if(isset($data['img'])){echo 'value="'.$data['img'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="广告图片" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shopad-link" class="col-sm-2 col-md-1 col-lg-1  control-label">广告链接</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="link" id="Admin-Shopad-link" <?php if(isset($data['link'])){echo 'value="'.$data['link'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="广告链接" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shopad-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">广告排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Shopad-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="广告排序" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shopad-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">广告状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shopad-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('SHOP_AD_STATE', $data['state']) ?>
	</select>
	</div>
  </div><div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Shopad-about">拒绝原因</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="about" id="Admin-Shopad-about" class="col-sm-12 col-md-12 col-lg-12"  placeholder="拒绝原因"><?php if(isset($data['about'])){echo $data['about']; } ?></textarea>
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