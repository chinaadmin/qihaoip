<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>数据名称编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">数据名称列表</a></li>
  			<li class="active">数据名称编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑数据名称-数据备注</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Telmsg-userid" class="col-sm-2 col-md-1 col-lg-1  control-label">用户id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="userid" id="Admin-Telmsg-userid" class="col-sm-12 col-md-12 col-lg-12"  placeholder="用户id"><?php if(isset($data['userid'])){echo $data['userid']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Telmsg-typeid" class="col-sm-2 col-md-1 col-lg-1  control-label">模板id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="typeid" id="Admin-Telmsg-typeid" <?php if(isset($data['typeid'])){echo 'value="'.$data['typeid'].'"'; } else {echo 'placeholder="模板id"'; } ?>  placeholder="模板id" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Telmsg-data" class="col-sm-2 col-md-1 col-lg-1  control-label">发送数据</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="data" id="Admin-Telmsg-data" <?php if(isset($data['data'])){echo 'value="'.$data['data'].'"'; } else {echo 'placeholder="发送的数据"'; } ?>  placeholder="发送数据" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Telmsg-usermobile" class="col-sm-2 col-md-1 col-lg-1  control-label">用户手机</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="usermobile" id="Admin-Telmsg-usermobile" <?php if(isset($data['usermobile'])){echo 'value="'.$data['usermobile'].'"'; } else {echo 'placeholder="用户手机"'; } ?>  placeholder="用户手机" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Telmsg-state" class="col-sm-2 col-md-1 col-lg-1  control-label">数据发送状态</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="state" id="Admin-Telmsg-state" <?php if(isset($data['state'])){echo 'value="'.$data['state'].'"'; } else {echo 'placeholder="发送状态"'; } ?>  placeholder="数据发送状态" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Telmsg-pin" class="col-sm-2 col-md-1 col-lg-1  control-label">验证码</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="pin" id="Admin-Telmsg-pin" <?php if(isset($data['pin'])){echo 'value="'.$data['pin'].'"'; } else {echo 'placeholder="发送验证码"'; } ?>  placeholder="验证码" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Telmsg-date" class="col-sm-2 col-md-1 col-lg-1  control-label">发送日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="date" id="Admin-Telmsg-date" <?php if(isset($data['date'])){echo 'value="'.$data['date'].'"'; } else {echo 'placeholder="发送日期"'; } ?>  placeholder="发送日期" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Telmsg-datetime" class="col-sm-2 col-md-1 col-lg-1  control-label">发送时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="datetime" id="Admin-Telmsg-datetime" <?php if(isset($data['datetime'])){echo 'value="'.$data['datetime'].'"'; } else {echo 'placeholder="发送时间"'; } ?>  placeholder="发送时间" value="">
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