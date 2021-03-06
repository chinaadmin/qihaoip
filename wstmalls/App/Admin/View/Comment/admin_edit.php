<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>用户评论编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">用户评论列表</a></li>
  			<li class="active">用户评论编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑用户评论-用户在文章和商品下的评论</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Comment-artid" class="col-sm-2 col-md-1 col-lg-1  control-label">数据ID</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="artid" id="Admin-Comment-artid" <?php if(isset($data['artid'])){echo 'value="'.$data['artid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="数据ID" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-type"  class="col-sm-2 col-md-1 col-lg-1  control-label">评论的类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Comment-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('COMMENT_TYPE', $data['type']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Comment-upid" class="col-sm-2 col-md-1 col-lg-1  control-label">上级评论</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="upid" id="Admin-Comment-upid" <?php if(isset($data['upid'])){echo 'value="'.$data['upid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="上级评论" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-amountid" class="col-sm-2 col-md-1 col-lg-1  control-label">评论者账号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="amountid" id="Admin-Comment-amountid" <?php if(isset($data['amountid'])){echo 'value="'.$data['amountid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="评论者账号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-amountip" class="col-sm-2 col-md-1 col-lg-1  control-label">访客IP</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="amountip" id="Admin-Comment-amountip" <?php if(isset($data['amountip'])){echo 'value="'.$data['amountip'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="访客IP" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-content" class="col-sm-2 col-md-1 col-lg-1  control-label">评论内容</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="content" id="Admin-Comment-content" class="col-sm-12 col-md-12 col-lg-12"  placeholder="必填:评论内容" required><?php if(isset($data['content'])){echo $data['content']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-like" class="col-sm-2 col-md-1 col-lg-1  control-label">喜欢</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="like" id="Admin-Comment-like" <?php if(isset($data['like'])){echo 'value="'.$data['like'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="喜欢" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-unlike" class="col-sm-2 col-md-1 col-lg-1  control-label">不喜欢</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="unlike" id="Admin-Comment-unlike" <?php if(isset($data['unlike'])){echo 'value="'.$data['unlike'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="不喜欢" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Comment-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Comment-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('COMMENT_STATE', $data['state']) ?>
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