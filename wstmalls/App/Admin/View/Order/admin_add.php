<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增商品订单</title>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/ckeditor/sample.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/ajaxfileupload.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/upimg.js"></script>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">商品订单列表</a></li>
  			<li class="active">商品订单新增</li>
		  </ol>
          <h4 class="sub-header">新增商品订单-查看用户的商品订单</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Order-uid" class="col-sm-2 col-md-1 col-lg-1  control-label">订单号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="uid" id="Admin-Order-uid" <?php if(isset($data['uid'])){echo 'value="'.$data['uid'].'"'; } ?>  placeholder="订单号">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-parent" class="col-sm-2 col-md-1 col-lg-1  control-label">父类id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="parent" id="Admin-Order-parent" <?php if(isset($data['parent'])){echo 'value="'.$data['parent'].'"'; } ?>  placeholder="父类id">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-seller" class="col-sm-2 col-md-1 col-lg-1  control-label">卖家</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="seller" id="Admin-Order-seller" <?php if(isset($data['seller'])){echo 'value="'.$data['seller'].'"'; } ?>  placeholder="卖家">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-aid" class="col-sm-2 col-md-1 col-lg-1  control-label">经纪人id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="aid" id="Admin-Order-aid" <?php if(isset($data['aid'])){echo 'value="'.$data['aid'].'"'; } ?>  placeholder="经纪人id">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-buyer" class="col-sm-2 col-md-1 col-lg-1  control-label">买家</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="buyer" id="Admin-Order-buyer" <?php if(isset($data['buyer'])){echo 'value="'.$data['buyer'].'"'; } ?>  placeholder="买家">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-htid" class="col-sm-2 col-md-1 col-lg-1  control-label">合同主体id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="htid" id="Admin-Order-htid" <?php if(isset($data['htid'])){echo 'value="'.$data['htid'].'"'; } ?>  placeholder="合同主体id">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-srid" class="col-sm-2 col-md-1 col-lg-1  control-label">受让主体id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="srid" id="Admin-Order-srid" <?php if(isset($data['srid'])){echo 'value="'.$data['srid'].'"'; } ?>  placeholder="受让主体id">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-itemids" class="col-sm-2 col-md-1 col-lg-1  control-label">商品id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="itemids" id="Admin-Order-itemids" <?php if(isset($data['itemids'])){echo 'value="'.$data['itemids'].'"'; } ?>  placeholder="商品id">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-price" class="col-sm-2 col-md-1 col-lg-1  control-label">售价</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="price" id="Admin-Order-price" <?php if(isset($data['price'])){echo 'value="'.$data['price'].'"'; } ?>  placeholder="售价">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-fees" class="col-sm-2 col-md-1 col-lg-1  control-label">手续费</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="fees" id="Admin-Order-fees" <?php if(isset($data['fees'])){echo 'value="'.$data['fees'].'"'; } ?>  placeholder="手续费">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-date" class="col-sm-2 col-md-1 col-lg-1  control-label">订单日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="date" id="Admin-Order-date" <?php if(isset($data['date'])){echo 'value="'.$data['date'].'"'; } ?>  placeholder="订单日期">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-datetime" class="col-sm-2 col-md-1 col-lg-1  control-label">订单时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="datetime" id="Admin-Order-datetime" <?php if(isset($data['datetime'])){echo 'value="'.$data['datetime'].'"'; } ?>  placeholder="订单时间">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-updatetime" class="col-sm-2 col-md-1 col-lg-1  control-label">更新时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="updatetime" id="Admin-Order-updatetime" <?php if(isset($data['updatetime'])){echo 'value="'.$data['updatetime'].'"'; } ?>  placeholder="更新时间">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-about" class="col-sm-2 col-md-1 col-lg-1  control-label">订单留言</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="about" id="Admin-Order-about" <?php if(isset($data['about'])){echo 'value="'.$data['about'].'"'; } ?>  placeholder="订单留言">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Order-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">订单状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Order-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ORDER_STATE', $data['state']) ?>
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

function ajaxFileUpload(upfile)
{
  $.ajaxFileUpload(
  {
       url:"/Upload/ajax_img",
       //用于文件上传的服务器端文件
       secureuri:false,
       //一般设置为false
       fileElementId:upfile,
       //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
       dataType: 'json',
       //返回值类型
       success: function(data){
           //服务器成功响应处理函数
         var re = eval(data);
         if(re.success){
        	 var str='<a href="'+re.msg+'" target="_blank"><img src="'+re.msg+'" width="200px"></a>';
             $("#"+upfile+"-show").html(str);
             $("#"+upfile+"-hidden").val(re.msg);
         } else {
             alert(re.msg);
         }
       }
  }    
  );               
  return false;
}

initSample();
</script>
<!-- content -->
    </div>
</div>
</body>
</html>