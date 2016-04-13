<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增积分记录</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">积分记录列表</a></li>
  			<li class="active">积分记录新增</li>
		  </ol>
          <h4 class="sub-header">新增积分记录-积分流水记录</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Jifenlog-userid" class="col-sm-2 col-md-1 col-lg-1  control-label">用户id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="userid" id="Admin-Jifenlog-userid" <?php if(isset($data['userid'])){echo 'value="'.$data['userid'].'"'; } else {echo 'placeholder="用户id"'; } ?>  placeholder="用户id" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-adminid" class="col-sm-2 col-md-1 col-lg-1  control-label">操作员id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="adminid" id="Admin-Jifenlog-adminid" <?php if(isset($data['adminid'])){echo 'value="'.$data['adminid'].'"'; } else {echo 'placeholder="管理员id"'; } ?>  placeholder="操作员id" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-typeid" class="col-sm-2 col-md-1 col-lg-1  control-label">积分项目</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="typeid" id="Admin-Jifenlog-typeid" <?php if(isset($data['typeid'])){echo 'value="'.$data['typeid'].'"'; } else {echo 'placeholder="项目id"'; } ?>  placeholder="积分项目" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-name" class="col-sm-2 col-md-1 col-lg-1  control-label">积分详情</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Jifenlog-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="积分详情说明"'; } ?>  placeholder="积分详情" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-date" class="col-sm-2 col-md-1 col-lg-1  control-label">积分日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="date" id="Admin-Jifenlog-date" <?php if(isset($data['date'])){echo 'value="'.$data['date'].'"'; } else {echo 'placeholder="积分日期"'; } ?>  placeholder="积分日期" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-datetime" class="col-sm-2 col-md-1 col-lg-1  control-label">积分时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="datetime" id="Admin-Jifenlog-datetime" <?php if(isset($data['datetime'])){echo 'value="'.$data['datetime'].'"'; } else {echo 'placeholder="积分时间戳"'; } ?>  placeholder="积分时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-jifen" class="col-sm-2 col-md-1 col-lg-1  control-label">积分</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="jifen" id="Admin-Jifenlog-jifen" <?php if(isset($data['jifen'])){echo 'value="'.$data['jifen'].'"'; } else {echo 'placeholder="积分值"'; } ?>  placeholder="积分" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-beginjifen" class="col-sm-2 col-md-1 col-lg-1  control-label">开始值</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="beginjifen" id="Admin-Jifenlog-beginjifen" <?php if(isset($data['beginjifen'])){echo 'value="'.$data['beginjifen'].'"'; } else {echo 'placeholder="开始积分值"'; } ?>  placeholder="开始值" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Jifenlog-endjifen" class="col-sm-2 col-md-1 col-lg-1  control-label">结束值</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="endjifen" id="Admin-Jifenlog-endjifen" <?php if(isset($data['endjifen'])){echo 'value="'.$data['endjifen'].'"'; } else {echo 'placeholder="最终积分值"'; } ?>  placeholder="结束值" value="">
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