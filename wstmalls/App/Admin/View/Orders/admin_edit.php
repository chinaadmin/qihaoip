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
    <label for="Admin-Orders-uid" class="col-sm-2 col-md-1 col-lg-1  control-label">订单号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="uid" id="Admin-Orders-uid" <?php if(isset($data['uid'])){echo 'value="'.$data['uid'].'"'; } else {echo 'placeholder="订单流水"'; } ?>  placeholder="订单号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-buyer" class="col-sm-2 col-md-1 col-lg-1  control-label">买家</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="buyer" id="Admin-Orders-buyer" <?php if(isset($data['buyer'])){echo 'value="'.$data['buyer'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="买家" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-amount" class="col-sm-2 col-md-1 col-lg-1  control-label">总计</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="amount" id="Admin-Orders-amount" <?php if(isset($data['amount'])){echo 'value="'.$data['amount'].'"'; } else {echo 'placeholder="总计金额"'; } ?>  placeholder="总计" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-num" class="col-sm-2 col-md-1 col-lg-1  control-label">订单商品格式</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="num" id="Admin-Orders-num" <?php if(isset($data['num'])){echo 'value="'.$data['num'].'"'; } else {echo 'placeholder="商品个数"'; } ?>  placeholder="订单商品格式" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-date" class="col-sm-2 col-md-1 col-lg-1  control-label">订单日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="date" id="Admin-Orders-date" <?php if(isset($data['date'])){echo 'value="'.$data['date'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="订单日期" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-datetime" class="col-sm-2 col-md-1 col-lg-1  control-label">订单时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="datetime" id="Admin-Orders-datetime" <?php if(isset($data['datetime'])){echo 'value="'.$data['datetime'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="订单时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">订单状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Orders-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ORDERS_STATE', $data['state']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Orders-payid" class="col-sm-2 col-md-1 col-lg-1  control-label">支付流水号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="payid" id="Admin-Orders-payid" <?php if(isset($data['payid'])){echo 'value="'.$data['payid'].'"'; } else {echo 'placeholder="订单支付"'; } ?>  placeholder="支付流水号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-paydate" class="col-sm-2 col-md-1 col-lg-1  control-label">支付日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="paydate" id="Admin-Orders-paydate" <?php if(isset($data['paydate'])){echo 'value="'.$data['paydate'].'"'; } else {echo 'placeholder="数据详情"'; } ?>  placeholder="支付日期" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Orders-paytime" class="col-sm-2 col-md-1 col-lg-1  control-label">支付时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="paytime" id="Admin-Orders-paytime" <?php if(isset($data['paytime'])){echo 'value="'.$data['paytime'].'"'; } else {echo 'placeholder="支付时间"'; } ?>  placeholder="支付时间" value="">
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