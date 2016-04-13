<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商品分类编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">商品分类列表</a></li>
  			<li class="active">商品分类编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑商品分类-商品分类模块，包含所有商品类别和子分类。</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Items-tmpa"  class="col-sm-2 col-md-1 col-lg-1  control-label">商品类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Items-tmpa" name="tmpa" onchange="select('Admin-Items-tmpa','Admin-Items-parentid');">
    <option value ="0">未选择</option>
<?php get_select('ITEM_PATM', $data['tmpa']) ?>
	</select>
	</div>
  </div>  
  <div class="form-group">
    <label for="Admin-Items-parentid"  class="col-sm-2 col-md-1 col-lg-1  control-label">上级ID</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Items-parentid" name="parentid" onchange="select1('Admin-Items-parentid','select_1');">
    <option value ="0">未选择</option>
	<?php 
		get_select('items',$data['pcate']['id'],'level=1 and tmpa='.$data['pcate']['tmpa']) 
	?>
	</select>
	</div>
	<div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="select_1" name="parentid1" onchange="select1('select_1','select_2');" >
	<option value ="0">未选择</option>
		<?php
			if($data['scate']){
				get_select('items',$data['scate']['id'],'level=2 and parentid='.$data['pcate']['id']); 
			}else{
				get_select('items','','parentid='.$data['pcate']['id']);
			}
		?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Items-name" class="col-sm-2 col-md-1 col-lg-1  control-label">类别名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Items-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } ?>  placeholder="必填:类别名称" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Items-about" class="col-sm-2 col-md-1 col-lg-1  control-label">类别说明</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="about" id="Admin-Items-about" class="col-sm-12 col-md-12 col-lg-12"  placeholder="类别说明"><?php if(isset($data['about'])){echo $data['about']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Items-level" class="col-sm-2 col-md-1 col-lg-1  control-label">级别</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="level" id="Admin-Items-level" <?php if(isset($data['level'])){echo 'value="'.$data['level'].'"'; } ?>  placeholder="级别">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Items-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Items-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } ?>  placeholder="排序">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Items-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Items-state" name="state">
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

	return true;
}

function select(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	if (id==0){return false;}
	$.get("/Admin/Items/get_select/tmpa/"+id,function(data,status){
		$("#"+id2).html(data);
	});
}

function select1(id1,id2){
	//当前select，要改变的select，数据类型tmpa
	var id = $("#"+id1).find("option:selected").val();
	if (id==0){return false;}
	$.get("/Admin/Items/get_select/id/"+id,function(data,status){
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