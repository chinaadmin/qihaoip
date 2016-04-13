<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增站内信</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">站内信列表</a></li>
  			<li class="active">站内信新增</li>
		  </ol>
          <h4 class="sub-header">新增站内信-站内信</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Msg-uid" class="col-sm-2 col-md-1 col-lg-1  control-label">用户id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="uid" id="Admin-Msg-uid" <?php if(isset($data['uid'])){echo 'value="'.$data['uid'].'"'; } else {echo 'placeholder="数据流水"'; } ?>  placeholder="用户id" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Msg-userid" class="col-sm-2 col-md-1 col-lg-1  control-label">发送者</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="userid" id="Admin-Msg-userid" <?php if(isset($data['userid'])){echo 'value="'.$data['userid'].'"'; } else {echo 'placeholder="发送者id"'; } ?>  placeholder="发送者" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Msg-toid" class="col-sm-2 col-md-1 col-lg-1  control-label">接收者</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="toid" id="Admin-Msg-toid" <?php if(isset($data['toid'])){echo 'value="'.$data['toid'].'"'; } else {echo 'placeholder="接收者id"'; } ?>  placeholder="接收者" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Msg-usertype"  class="col-sm-2 col-md-1 col-lg-1  control-label">用户类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Msg-usertype" name="usertype">
    <option value ="0">未选择</option>
<?php get_select('USER_TYPE', $data['usertype']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Msg-sendtime" class="col-sm-2 col-md-1 col-lg-1  control-label">发送时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sendtime" id="Admin-Msg-sendtime" <?php if(isset($data['sendtime'])){echo 'value="'.$data['sendtime'].'"'; } else {echo 'placeholder="数据发送时间"'; } ?>  placeholder="发送时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Msg-totime" class="col-sm-2 col-md-1 col-lg-1  control-label">接收时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="totime" id="Admin-Msg-totime" <?php if(isset($data['totime'])){echo 'value="'.$data['totime'].'"'; } else {echo 'placeholder="数据接收时间"'; } ?>  placeholder="接收时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Msg-data" class="col-sm-2 col-md-1 col-lg-1  control-label">数据详情</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="data" id="Admin-Msg-data" <?php if(isset($data['data'])){echo 'value="'.$data['data'].'"'; } else {echo 'placeholder=""'; } ?>  placeholder="数据详情" value="">
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