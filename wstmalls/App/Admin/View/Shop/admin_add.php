<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>新增商铺</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">商铺列表</a></li>
  			<li class="active">商铺新增</li>
		  </ol>
          <h4 class="sub-header">新增商铺-数据备注</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Shop-name" class="col-sm-2 col-md-1 col-lg-1  control-label">商城名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Shop-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } ?>  placeholder="商城名称">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-title" class="col-sm-2 col-md-1 col-lg-1  control-label">SEO标题</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Shop-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } ?>  placeholder="SEO标题">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-keywords" class="col-sm-2 col-md-1 col-lg-1  control-label">SEO关键词</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="keywords" id="Admin-Shop-keywords" <?php if(isset($data['keywords'])){echo 'value="'.$data['keywords'].'"'; } ?>  placeholder="SEO关键词">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Shop-description">SEO描述</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="description" id="Admin-Shop-description" class="col-sm-12 col-md-12 col-lg-12"  placeholder="SEO描述"><?php if(isset($data['description'])){echo $data['description']; } ?></textarea>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="ckeditor">商城简介</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="content" id="ckeditor" class="col-sm-12 col-md-12 col-lg-12"  placeholder="商城简介"><?php if(isset($data['content'])){echo $data['content']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-logo" class="col-sm-2 col-md-1 col-lg-1  control-label">商城logo</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="logo" id="Admin-Shop-logo" <?php if(isset($data['logo'])){echo 'value="'.$data['logo'].'"'; } ?>  placeholder="商城logo">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-img" class="col-sm-2 col-md-1 col-lg-1  control-label">商城形象图</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="img" id="Admin-Shop-img" <?php if(isset($data['img'])){echo 'value="'.$data['img'].'"'; } ?>  placeholder="商城形象图">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-qyname" class="col-sm-2 col-md-1 col-lg-1  control-label">企业名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="qyname" id="Admin-Shop-qyname" <?php if(isset($data['qyname'])){echo 'value="'.$data['qyname'].'"'; } ?>  placeholder="企业名">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Shop-about">企业简介</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="about" id="Admin-Shop-about" class="col-sm-12 col-md-12 col-lg-12"  placeholder="企业简介"><?php if(isset($data['about'])){echo $data['about']; } ?></textarea>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Shop-honor">荣誉资质</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="honor" id="Admin-Shop-honor" class="col-sm-12 col-md-12 col-lg-12"  placeholder="荣誉资质"><?php if(isset($data['honor'])){echo $data['honor']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-person" class="col-sm-2 col-md-1 col-lg-1  control-label">联系人姓名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="person" id="Admin-Shop-person" <?php if(isset($data['person'])){echo 'value="'.$data['person'].'"'; } ?>  placeholder="联系人姓名">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-chkstate" class="col-sm-2 col-md-1 col-lg-1  control-label">用户确认状态</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="chkstate" id="Admin-Shop-chkstate" <?php if(isset($data['chkstate'])){echo 'value="'.$data['chkstate'].'"'; } ?>  placeholder="用户确认状态">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-kfinfo" class="col-sm-2 col-md-1 col-lg-1  control-label">客服信息</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="kfinfo" id="Admin-Shop-kfinfo" <?php if(isset($data['kfinfo'])){echo 'value="'.$data['kfinfo'].'"'; } ?>  placeholder="客服信息">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-worktime" class="col-sm-2 col-md-1 col-lg-1  control-label">工作时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="worktime" id="Admin-Shop-worktime" <?php if(isset($data['worktime'])){echo 'value="'.$data['worktime'].'"'; } ?>  placeholder="工作时间">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-showphone" class="col-sm-2 col-md-1 col-lg-1  control-label">是否显示电话</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="showphone" id="Admin-Shop-showphone" <?php if(isset($data['showphone'])){echo 'value="'.$data['showphone'].'"'; } ?>  placeholder="是否显示电话">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-showtel" class="col-sm-2 col-md-1 col-lg-1  control-label">是否显示座机</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="showtel" id="Admin-Shop-showtel" <?php if(isset($data['showtel'])){echo 'value="'.$data['showtel'].'"'; } ?>  placeholder="是否显示座机">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-showtm" class="col-sm-2 col-md-1 col-lg-1  control-label">是否显示商标模块</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="showtm" id="Admin-Shop-showtm" <?php if(isset($data['showtm'])){echo 'value="'.$data['showtm'].'"'; } ?>  placeholder="是否显示商标模块">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-showpa" class="col-sm-2 col-md-1 col-lg-1  control-label">是否显示专利模块</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="showpa" id="Admin-Shop-showpa" <?php if(isset($data['showpa'])){echo 'value="'.$data['showpa'].'"'; } ?>  placeholder="是否显示专利模块">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-showtj" class="col-sm-2 col-md-1 col-lg-1  control-label">是否显示特别推荐模块</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="showtj" id="Admin-Shop-showtj" <?php if(isset($data['showtj'])){echo 'value="'.$data['showtj'].'"'; } ?>  placeholder="是否显示特别推荐模块">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-template"  class="col-sm-2 col-md-1 col-lg-1  control-label">商城模板</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shop-template" name="template">
    <option value ="0">未选择</option>
<?php get_select('SHOP_TEMPLATE', $data['template']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Shop-phone" class="col-sm-2 col-md-1 col-lg-1  control-label">手机号码</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="phone" id="Admin-Shop-phone" <?php if(isset($data['phone'])){echo 'value="'.$data['phone'].'"'; } ?>  placeholder="手机号码">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-tel" class="col-sm-2 col-md-1 col-lg-1  control-label">电话号码</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="tel" id="Admin-Shop-tel" <?php if(isset($data['tel'])){echo 'value="'.$data['tel'].'"'; } ?>  placeholder="电话号码">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-email" class="col-sm-2 col-md-1 col-lg-1  control-label">邮箱</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="email" id="Admin-Shop-email" <?php if(isset($data['email'])){echo 'value="'.$data['email'].'"'; } ?>  placeholder="邮箱">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-qq" class="col-sm-2 col-md-1 col-lg-1  control-label">qq</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="qq" id="Admin-Shop-qq" <?php if(isset($data['qq'])){echo 'value="'.$data['qq'].'"'; } ?>  placeholder="qq">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-weixin" class="col-sm-2 col-md-1 col-lg-1  control-label">微信</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="weixin" id="Admin-Shop-weixin" <?php if(isset($data['weixin'])){echo 'value="'.$data['weixin'].'"'; } ?>  placeholder="微信">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-province"  class="col-sm-2 col-md-1 col-lg-1  control-label">省份</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shop-province" name="province">
    <option value ="0">未选择</option>
<?php get_select('province', $data['province']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Shop-city" class="col-sm-2 col-md-1 col-lg-1  control-label">城市</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="city" id="Admin-Shop-city" <?php if(isset($data['city'])){echo 'value="'.$data['city'].'"'; } ?>  placeholder="城市">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-address" class="col-sm-2 col-md-1 col-lg-1  control-label">联系地址</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="address" id="Admin-Shop-address" <?php if(isset($data['address'])){echo 'value="'.$data['address'].'"'; } ?>  placeholder="联系地址">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-aid" class="col-sm-2 col-md-1 col-lg-1  control-label">经纪人id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="aid" id="Admin-Shop-aid" <?php if(isset($data['aid'])){echo 'value="'.$data['aid'].'"'; } ?>  placeholder="经纪人id">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-tuijian"  class="col-sm-2 col-md-1 col-lg-1  control-label">商城推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shop-tuijian" name="tuijian">
    <option value ="0">未选择</option>
<?php get_select('ITEM_HOT', $data['tuijian']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Shop-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">商城排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Shop-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } ?>  placeholder="商城排序">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Shop-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">验证状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Shop-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('SHOP_STATE', $data['state']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Shop-reason" class="col-sm-2 col-md-1 col-lg-1  control-label">验证原因</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="reason" id="Admin-Shop-reason" <?php if(isset($data['reason'])){echo 'value="'.$data['reason'].'"'; } ?>  placeholder="验证原因">
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
	if(!chk_v_l('Admin-Shop-sort','商城排序',,4)){return false;};

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