<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增资金流水</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">资金流水列表</a></li>
  			<li class="active">资金流水新增</li>
		  </ol>
          <h4 class="sub-header">新增资金流水-用户账户资金异动流水</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Moneylog-userid" class="col-sm-2 col-md-1 col-lg-1  control-label">用户账号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="userid" id="Admin-Moneylog-userid" <?php if(isset($data['userid'])){echo 'value="'.$data['userid'].'"'; } else {echo 'placeholder="用户账号id"'; } ?>  placeholder="用户账号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-orderid" class="col-sm-2 col-md-1 col-lg-1  control-label">订单号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="orderid" id="Admin-Moneylog-orderid" <?php if(isset($data['orderid'])){echo 'value="'.$data['orderid'].'"'; } else {echo 'placeholder="订单流水号"'; } ?>  placeholder="订单号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-payid" class="col-sm-2 col-md-1 col-lg-1  control-label">支付号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="payid" id="Admin-Moneylog-payid" <?php if(isset($data['payid'])){echo 'value="'.$data['payid'].'"'; } else {echo 'placeholder="支付订单号"'; } ?>  placeholder="支付号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-name" class="col-sm-2 col-md-1 col-lg-1  control-label">异动名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Moneylog-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="名称描述"'; } ?>  placeholder="异动名称" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-type"  class="col-sm-2 col-md-1 col-lg-1  control-label">异动类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Moneylog-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('MONEY_LOG_TYPE', $data['type']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Moneylog-date" class="col-sm-2 col-md-1 col-lg-1  control-label">发生日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="date" id="Admin-Moneylog-date" <?php if(isset($data['date'])){echo 'value="'.$data['date'].'"'; } else {echo 'placeholder="异动日期"'; } ?>  placeholder="发生日期" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-datetime" class="col-sm-2 col-md-1 col-lg-1  control-label">发生时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="datetime" id="Admin-Moneylog-datetime" <?php if(isset($data['datetime'])){echo 'value="'.$data['datetime'].'"'; } else {echo 'placeholder="异动发生时间"'; } ?>  placeholder="发生时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-money" class="col-sm-2 col-md-1 col-lg-1  control-label">异动金额</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="money" id="Admin-Moneylog-money" <?php if(isset($data['money'])){echo 'value="'.$data['money'].'"'; } else {echo 'placeholder="异动金额"'; } ?>  placeholder="异动金额" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-beginmoney" class="col-sm-2 col-md-1 col-lg-1  control-label">开始余额</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="beginmoney" id="Admin-Moneylog-beginmoney" <?php if(isset($data['beginmoney'])){echo 'value="'.$data['beginmoney'].'"'; } else {echo 'placeholder="用户账户为变动前金额"'; } ?>  placeholder="开始余额" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-endmoney" class="col-sm-2 col-md-1 col-lg-1  control-label">结束金额</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="endmoney" id="Admin-Moneylog-endmoney" <?php if(isset($data['endmoney'])){echo 'value="'.$data['endmoney'].'"'; } else {echo 'placeholder="用户账号最终金额"'; } ?>  placeholder="结束金额" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Moneylog-adminid"  class="col-sm-2 col-md-1 col-lg-1  control-label">操作员</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Moneylog-adminid" name="adminid">
    <option value ="0">未选择</option>
<?php get_select('member', $data['adminid'], 'admin>3') ?>
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