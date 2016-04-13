<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>个人身份编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">个人身份列表</a></li>
  			<li class="active">个人身份编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑个人身份-个人身份数据</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Person-name" class="col-sm-2 col-md-1 col-lg-1  control-label">用户姓名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Person-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="用户姓名"'; } ?>  placeholder="用户姓名" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-sex"  class="col-sm-2 col-md-1 col-lg-1  control-label">性别</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Person-sex" name="sex">
    <option value ="0">未选择</option>
<?php get_select('USER_SEX', $data['sex']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Person-cardid" class="col-sm-2 col-md-1 col-lg-1  control-label">身份号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="cardid" id="Admin-Person-cardid" <?php if(isset($data['cardid'])){echo 'value="'.$data['cardid'].'"'; } else {echo 'placeholder="身份证号码"'; } ?>  placeholder="身份号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-img1" class="col-sm-2 col-md-1 col-lg-1  control-label">身份证正面</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="img1" id="Admin-Person-img1" <?php if(isset($data['img1'])){echo 'value="'.$data['img1'].'"'; } else {echo 'placeholder="身份证正面"'; } ?>  placeholder="身份证正面" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-img2" class="col-sm-2 col-md-1 col-lg-1  control-label">身份证反面</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="img2" id="Admin-Person-img2" <?php if(isset($data['img2'])){echo 'value="'.$data['img2'].'"'; } else {echo 'placeholder="身份证反面"'; } ?>  placeholder="身份证反面" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-img3" class="col-sm-2 col-md-1 col-lg-1  control-label">手持身份照</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="img3" id="Admin-Person-img3" <?php if(isset($data['img3'])){echo 'value="'.$data['img3'].'"'; } else {echo 'placeholder="手持身份证照"'; } ?>  placeholder="手持身份照" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-bank"  class="col-sm-2 col-md-1 col-lg-1  control-label">收款行</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Person-bank" name="bank">
    <option value ="0">未选择</option>
<?php get_select('BANKS', $data['bank']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Person-bankname" class="col-sm-2 col-md-1 col-lg-1  control-label">支行名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="bankname" id="Admin-Person-bankname" <?php if(isset($data['bankname'])){echo 'value="'.$data['bankname'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="支行名称" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-cardname" class="col-sm-2 col-md-1 col-lg-1  control-label">收款账户名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="cardname" id="Admin-Person-cardname" <?php if(isset($data['cardname'])){echo 'value="'.$data['cardname'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="收款账户名" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-card" class="col-sm-2 col-md-1 col-lg-1  control-label">银行卡号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="card" id="Admin-Person-card" <?php if(isset($data['card'])){echo 'value="'.$data['card'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="银行卡号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Person-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">验证状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Person-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('PERSON_CHK', $data['state']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Person-reason" class="col-sm-2 col-md-1 col-lg-1  control-label">验证原因</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="reason" id="Admin-Person-reason" class="col-sm-12 col-md-12 col-lg-12"  placeholder="验证原因"><?php if(isset($data['reason'])){echo $data['reason']; } ?></textarea>
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