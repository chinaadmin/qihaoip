<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增公司数据</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">公司数据列表</a></li>
  			<li class="active">公司数据新增</li>
		  </ol>
          <h4 class="sub-header">新增公司数据-公司注册信息等数据</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Company-name" class="col-sm-2 col-md-1 col-lg-1  control-label">企业名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Company-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="企业名称" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-frname" class="col-sm-2 col-md-1 col-lg-1  control-label">法人姓名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="frname" id="Admin-Company-frname" <?php if(isset($data['frname'])){echo 'value="'.$data['frname'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="法人姓名" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-frsex"  class="col-sm-2 col-md-1 col-lg-1  control-label">法人性别</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Company-frsex" name="frsex">
    <option value ="0">未选择</option>
<?php get_select('USER_SEX', $data['frsex']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Company-yyzhizhao" class="col-sm-2 col-md-1 col-lg-1  control-label">营业执照</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="yyzhizhao" id="Admin-Company-yyzhizhao" <?php if(isset($data['yyzhizhao'])){echo 'value="'.$data['yyzhizhao'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="营业执照" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-province1"  class="col-sm-2 col-md-1 col-lg-1  control-label">省份</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Company-province1" name="province1">
    <option value ="0">未选择</option>
<?php get_select('province', $data['province1']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Company-city1" class="col-sm-2 col-md-1 col-lg-1  control-label">城市</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="city1" id="Admin-Company-city1" <?php if(isset($data['city1'])){echo 'value="'.$data['city1'].'"'; } else {echo 'placeholder="所在城市id"'; } ?>  placeholder="城市" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-regaddress" class="col-sm-2 col-md-1 col-lg-1  control-label">注册地址</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="regaddress" id="Admin-Company-regaddress" <?php if(isset($data['regaddress'])){echo 'value="'.$data['regaddress'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="注册地址" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-province2"  class="col-sm-2 col-md-1 col-lg-1  control-label">省份</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Company-province2" name="province2">
    <option value ="0">未选择</option>
<?php get_select('province', $data['province2']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Company-city2" class="col-sm-2 col-md-1 col-lg-1  control-label">城市</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="city2" id="Admin-Company-city2" <?php if(isset($data['city2'])){echo 'value="'.$data['city2'].'"'; } else {echo 'placeholder="所在城市id"'; } ?>  placeholder="城市" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-address" class="col-sm-2 col-md-1 col-lg-1  control-label">联系地址</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="address" id="Admin-Company-address" <?php if(isset($data['address'])){echo 'value="'.$data['address'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="联系地址" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-regmoney" class="col-sm-2 col-md-1 col-lg-1  control-label">注册资本(万元)</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="regmoney" id="Admin-Company-regmoney" <?php if(isset($data['regmoney'])){echo 'value="'.$data['regmoney'].'"'; } else {echo 'placeholder="以万元为单位"'; } ?>  placeholder="注册资本(万元)" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-business" class="col-sm-2 col-md-1 col-lg-1  control-label">经营范围</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="business" id="Admin-Company-business" <?php if(isset($data['business'])){echo 'value="'.$data['business'].'"'; } else {echo 'placeholder="数字排序"'; } ?>  placeholder="经营范围" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-bank"  class="col-sm-2 col-md-1 col-lg-1  control-label">收款行</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Company-bank" name="bank">
    <option value ="0">未选择</option>
<?php get_select('BANKS', $data['bank']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Company-bankname" class="col-sm-2 col-md-1 col-lg-1  control-label">支行名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="bankname" id="Admin-Company-bankname" <?php if(isset($data['bankname'])){echo 'value="'.$data['bankname'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="支行名称" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-cardname" class="col-sm-2 col-md-1 col-lg-1  control-label">收款账户名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="cardname" id="Admin-Company-cardname" <?php if(isset($data['cardname'])){echo 'value="'.$data['cardname'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="收款账户名" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-card" class="col-sm-2 col-md-1 col-lg-1  control-label">银行卡号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="card" id="Admin-Company-card" <?php if(isset($data['card'])){echo 'value="'.$data['card'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="银行卡号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Company-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">验证状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Company-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('PERSON_CHK', $data['state']) ?>
	</select>
	</div>
  </div><div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Company-reason">验证原因</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="reason" id="Admin-Company-reason" class="col-sm-12 col-md-12 col-lg-12"  placeholder="验证原因"><?php if(isset($data['reason'])){echo $data['reason']; } ?></textarea>
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