<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增数据名称</title>
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
  			<li class="active">数据名称新增</li>
		  </ol>
          <h4 class="sub-header">新增数据名称-数据备注</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Orderlog-orderid">订单id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="orderid" id="Admin-Orderlog-orderid" class="col-sm-12 col-md-12 col-lg-12"  placeholder="订单id"><?php if(isset($data['orderid'])){echo $data['orderid']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orderlog-userid" class="col-sm-2 col-md-1 col-lg-1  control-label">排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="userid" id="Admin-Orderlog-userid" <?php if(isset($data['userid'])){echo 'value="'.$data['userid'].'"'; } else {echo 'placeholder="数字排序"'; } ?>  placeholder="排序" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orderlog-adminid"  class="col-sm-2 col-md-1 col-lg-1  control-label">操作人</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Orderlog-adminid" name="adminid">
    <option value ="0">未选择</option>
<?php get_select('member', $data['adminid'], 'admin>3') ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Orderlog-admintype"  class="col-sm-2 col-md-1 col-lg-1  control-label">操作人类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Orderlog-admintype" name="admintype">
    <option value ="0">未选择</option>
<?php get_select('USER_TYPE', $data['admintype']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Orderlog-datetime" class="col-sm-2 col-md-1 col-lg-1  control-label">处理时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="datetime" id="Admin-Orderlog-datetime" <?php if(isset($data['datetime'])){echo 'value="'.$data['datetime'].'"'; } else {echo 'placeholder="订单处理时间"'; } ?>  placeholder="处理时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orderlog-type"  class="col-sm-2 col-md-1 col-lg-1  control-label">事由id</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Orderlog-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('orderstyle', $data['type']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Orderlog-name" class="col-sm-2 col-md-1 col-lg-1  control-label">订单事由</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Orderlog-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="数据状态"'; } ?>  placeholder="订单事由" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orderlog-about" class="col-sm-2 col-md-1 col-lg-1  control-label">事由详情</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="about" id="Admin-Orderlog-about" <?php if(isset($data['about'])){echo 'value="'.$data['about'].'"'; } else {echo 'placeholder="详情说明"'; } ?>  placeholder="事由详情" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orderlog-file" class="col-sm-2 col-md-1 col-lg-1  control-label">相关文件</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="file" id="Admin-Orderlog-file" <?php if(isset($data['file'])){echo 'value="'.$data['file'].'"'; } else {echo 'placeholder="文件压缩包"'; } ?>  placeholder="相关文件" value="">
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
	if(!chk_v_l('Admin-Orderlog-userid','排序',0,4)){return false;};

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