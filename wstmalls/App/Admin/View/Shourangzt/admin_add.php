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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">数据名称列表</a></li>
  			<li class="active">数据名称新增</li>
		  </ol>
          <h4 class="sub-header">新增数据名称-数据备注</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Shourangzt-memberid" class="col-sm-2 col-md-1 col-lg-1  control-label">归属id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="memberid" id="Admin-Shourangzt-memberid" <?php if(isset($data['memberid'])){echo 'value="'.$data['memberid'].'"'; } ?>  placeholder="归属id">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shourangzt-type"  class="col-sm-2 col-md-1 col-lg-1  control-label">类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shourangzt-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('ZT_TYPE', $data['type']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Shourangzt-name" class="col-sm-2 col-md-1 col-lg-1  control-label">受让人</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Shourangzt-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } ?>  placeholder="受让人">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shourangzt-info" class="col-sm-2 col-md-1 col-lg-1  control-label">补充信息</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="info" id="Admin-Shourangzt-info" <?php if(isset($data['info'])){echo 'value="'.$data['info'].'"'; } ?>  placeholder="补充信息">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shourangzt-default"  class="col-sm-2 col-md-1 col-lg-1  control-label">默认主体</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shourangzt-default" name="default">
    <option value ="0">未选择</option>
<?php get_select('ZT_DEFAULT', $data['default']) ?>
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