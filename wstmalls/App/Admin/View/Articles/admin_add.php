<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增文章分类</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">文章分类列表</a></li>
  			<li class="active">文章分类新增</li>
		  </ol>
          <h4 class="sub-header">新增文章分类-包含新闻资讯帮助文档等分类</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Articles-upid"  class="col-sm-2 col-md-1 col-lg-1  control-label">上级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Articles-upid" name="upid" onchange="select('Admin-Articles-upid','Admin-Articles-twoid');">
    <option value ="0">未选择</option>
		<?php get_select('articles', $data['upid'],'level=1') ?>
	</select>
	</div>
  </div>
 <div class="form-group">
    <label for="Admin-Articles-upid"  class="col-sm-2 col-md-1 col-lg-1  control-label">二级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Articles-twoid" name="twoid" onchange="select('Admin-Articles-twoid','Admin-Articles-threeid');">
    <option value ="0">未选择</option>
	</select>
	</div>
  </div>
<!--   <div class="form-group">
    <label for="Admin-Articles-upid"  class="col-sm-2 col-md-1 col-lg-1  control-label">三级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Articles-threeid" name="threeid" onchange="select('Admin-Articles-threeid','select_2');">
    <option value ="0">未选择</option>
	</select>
	</div>
  </div> -->
 <!--  <div class="form-group">
    <label for="Admin-Items-parentid"  class="col-sm-2 col-md-1 col-lg-1  control-label">省</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Region-pid" name="proid" onchange="select1('Admin-Region-pid','Admin-Region-cid');">
    <option value ="0">未选择</option>
		<?php get_select('region','','level=1','','id','areaname') ?>
	</select>
	</div>
	<label for="Admin-Items-parentid"  class="col-sm-2 col-md-1 col-lg-1  control-label">市</label>
	<div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Region-cid" name="cityid" onchange="select1('Admin-Region-cid','select_2');" >
	<option value ="0">未选择</option>
	</select>
	</div>
  </div>   -->
  <div class="form-group">
    <label for="Admin-Articles-name" class="col-sm-2 col-md-1 col-lg-1  control-label">分类名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Articles-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } ?>  placeholder="必填:分类名称" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Articles-ename" class="col-sm-2 col-md-1 col-lg-1  control-label">分类英文名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="ename" id="Admin-Articles-ename" <?php if(isset($data['ename'])){echo 'value="'.$data['ename'].'"'; } ?>  placeholder="分类英文名称">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Articles-indexstyle" class="col-sm-2 col-md-1 col-lg-1  control-label">首页式样</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="indexstyle" id="Admin-Articles-indexstyle" <?php if(isset($data['indexstyle'])){echo 'value="'.$data['indexstyle'].'"'; } ?>  placeholder="首页式样">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Articles-liststyle" class="col-sm-2 col-md-1 col-lg-1  control-label">列表式样</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="liststyle" id="Admin-Articles-liststyle" <?php if(isset($data['liststyle'])){echo 'value="'.$data['liststyle'].'"'; } ?>  placeholder="列表式样">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Articles-title" class="col-sm-2 col-md-1 col-lg-1  control-label">标题</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Articles-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } ?>  placeholder="标题">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Articles-keywords">关键词</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="keywords" id="Admin-Articles-keywords" class="col-sm-12 col-md-12 col-lg-12"  placeholder="关键词"><?php if(isset($data['keywords'])){echo $data['keywords']; } ?></textarea>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Articles-description">描述</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="description" id="Admin-Articles-description" class="col-sm-12 col-md-12 col-lg-12"  placeholder="描述"><?php if(isset($data['description'])){echo $data['description']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Articles-about" class="col-sm-2 col-md-1 col-lg-1  control-label">说明</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="about" id="Admin-Articles-about" <?php if(isset($data['about'])){echo 'value="'.$data['about'].'"'; } ?>  placeholder="说明">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Articles-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Articles-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } ?>  placeholder="排序">
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

function select(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	$.get("/Admin/Articles/get_select/id/"+id,function(data,status){
		$("#"+id2).html(data);
	});
}

function select1(id1,id2){
	//当前select1，要改变的select1，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	$.get("/Admin/Articles/get_city/id/"+id,function(data,status){
		$("#"+id2).html(data);
	});
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