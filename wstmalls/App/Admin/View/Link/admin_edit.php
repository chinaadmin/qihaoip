<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>友情链接编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">友情链接列表</a></li>
  			<li class="active">友情链接编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑友情链接-包含所有友情链接</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Link-groupid"  class="col-sm-2 col-md-1 col-lg-1  control-label">链接分组</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Link-groupid" name="groupid">
    <option value ="0">未选择</option>
<?php get_select('links', $data['groupid']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Link-name" class="col-sm-2 col-md-1 col-lg-1  control-label">网站名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Link-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } ?>  placeholder="必填:网站名称" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-link" class="col-sm-2 col-md-1 col-lg-1  control-label">网址</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="link" id="Admin-Link-link" <?php if(isset($data['link'])){echo 'value="'.$data['link'].'"'; } ?>  placeholder="必填:网址" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-img" class="col-sm-2 col-md-1 col-lg-1  control-label">图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="Admin-Link-img-show"><?php if(isset($data['img']) && $data['img']){echo '<a href="'.$data['img'].'" target="_blank"><img src="'.$data['img'].'" width="200px"></a>'; } ?></div>
    <input type="hidden" id="Admin-Link-img-hidden" name="img" <?php if(isset($data['img'])){echo 'value="'.$data['img'].'"'; } ?> ><input type="file" class="form-control" name="file" id="Admin-Link-img" onchange="return ajaxFileUpload('Admin-Link-img')">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-title" class="col-sm-2 col-md-1 col-lg-1  control-label">title标签</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Link-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } ?>  placeholder="title标签">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-nofollow"  class="col-sm-2 col-md-1 col-lg-1  control-label">nofollow标签</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Link-nofollow" name="nofollow">
    <option value ="0">未选择</option>
<?php get_select('NO_FOLLOW', $data['nofollow']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Link-alt" class="col-sm-2 col-md-1 col-lg-1  control-label">alt标签</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="alt" id="Admin-Link-alt" <?php if(isset($data['alt'])){echo 'value="'.$data['alt'].'"'; } ?>  placeholder="alt标签">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-about" class="col-sm-2 col-md-1 col-lg-1  control-label">关于</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="about" id="Admin-Link-about" class="col-sm-12 col-md-12 col-lg-12"  placeholder="关于"><?php if(isset($data['about'])){echo $data['about']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-addtime" class="col-sm-2 col-md-1 col-lg-1  control-label">开始时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="addtime" id="Admin-Link-addtime" <?php if(isset($data['addtime'])){echo 'value="'.$data['addtime'].'"'; } ?>  placeholder="开始时间">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-endtime" class="col-sm-2 col-md-1 col-lg-1  control-label">结束时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="endtime" id="Admin-Link-endtime" <?php if(isset($data['endtime'])){echo 'value="'.$data['endtime'].'"'; } ?>  placeholder="结束时间">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Link-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Link-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('USER_STATE', $data['state']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Link-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Link-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } ?>  placeholder="排序">
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