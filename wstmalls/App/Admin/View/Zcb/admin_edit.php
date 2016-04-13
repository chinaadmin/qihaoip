<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>知产包编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">知产包列表</a></li>
  			<li class="active">知产包编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑知产包-数据备注</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Zcb-type"  class="col-sm-2 col-md-1 col-lg-1  control-label">分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Zcb-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('items', $data['type']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Zcb-title" class="col-sm-2 col-md-1 col-lg-1  control-label">标题</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Zcb-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } ?>  placeholder="必填:标题" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-keywords" class="col-sm-2 col-md-1 col-lg-1  control-label">关键词</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="keywords" id="Admin-Zcb-keywords" <?php if(isset($data['keywords'])){echo 'value="'.$data['keywords'].'"'; } ?>  placeholder="关键词">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-description" class="col-sm-2 col-md-1 col-lg-1  control-label">描述</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="description" id="Admin-Zcb-description" class="col-sm-12 col-md-12 col-lg-12"  placeholder="描述"><?php if(isset($data['description'])){echo $data['description']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-smallimg" class="col-sm-2 col-md-1 col-lg-1  control-label">缩略图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="Admin-Zcb-smallimg-show"><?php if(isset($data['smallimg']) && $data['smallimg']){echo '<a href="'.$data['smallimg'].'" target="_blank">'.$data['smallimg'].'</a>'; } ?></div>
    <input type="text" class="form-control" id="Admin-Zcb-smallimg-hidden" name="smallimg" <?php if(isset($data['smallimg'])){echo 'value="'.$data['smallimg'].'"'; } ?> ><input type="file" class="form-control" name="file" id="Admin-Zcb-smallimg" onchange="return ajaxFileUpload('Admin-Zcb-smallimg','file')">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-img" class="col-sm-2 col-md-1 col-lg-1  control-label">图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="Admin-Zcb-img-show"><?php if(isset($data['img']) && $data['img']){echo '<a href="'.$data['img'].'" target="_blank">'.$data['img'].'</a>'; } ?></div>
    <input type="text" class="form-control" id="Admin-Zcb-img-hidden" name="img" <?php if(isset($data['img'])){echo 'value="'.$data['img'].'"'; } ?> ><input type="file" class="form-control" name="file" id="Admin-Zcb-img" onchange="return ajaxFileUpload('Admin-Zcb-img','file')">
    </div>
  </div>
  <div class="form-group">
    <label for="ckeditor" class="col-sm-2 col-md-1 col-lg-1  control-label">内容</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="content" id="ckeditor" class="col-sm-12 col-md-12 col-lg-12"  placeholder="必填:内容" required><?php if(isset($data['content'])){echo $data['content']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-price" class="col-sm-2 col-md-1 col-lg-1  control-label">价格</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="price" id="Admin-Zcb-price" <?php if(isset($data['price'])){echo 'value="'.$data['price'].'"'; } ?>  placeholder="必填:价格" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-item" class="col-sm-2 col-md-1 col-lg-1  control-label">包内商品</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="item" id="Admin-Zcb-item" <?php if(isset($data['item'])){echo 'value="'.$data['item'].'"'; } ?>  placeholder="必填:包内商品" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Zcb-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } ?>  placeholder="排序">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Zcb-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Zcb-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('USER_STATE', $data['state']) ?>
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
	if(!chk_v_l('Admin-Zcb-title','标题',4,60)){return false;};
	if(!chk_v_l('Admin-Zcb-sort','排序',0,4)){return false;};

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