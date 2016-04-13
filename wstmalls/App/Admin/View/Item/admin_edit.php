<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商品编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">商品列表</a></li>
  			<li class="active">商品编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑商品-包含所有商标和专利，以及以后可能出现的商品。</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Item-tmpa"  class="col-sm-2 col-md-1 col-lg-1  control-label">商品类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmpa" name="tmpa" onchange="select('Admin-Item-tmpa','Admin-Item-groupid');">
    <option value ="0">未选择</option>
<?php get_select('ITEM_PATM', $data['tmpa']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-groupid"  class="col-sm-2 col-md-1 col-lg-1  control-label">类别</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-groupid" name="groupid" onchange="select1('Admin-Item-groupid','Admin-Item-groupid2');">
    <option value ="0">未选择</option>
<?php get_select('items', $data['groupid'],'level=1 and tmpa='.$data['tmpa']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-groupid2"  class="col-sm-2 col-md-1 col-lg-1  control-label">二级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-groupid2" name="groupid2" onchange="select1('Admin-Item-groupid2','Admin-Item-groupid3');">
    <option value ="0">未选择</option>
<?php get_select('items', $data['groupid2'],'level=2 and parentid='.$data['groupid']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-groupid3"  class="col-sm-2 col-md-1 col-lg-1  control-label">三级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-groupid3" name="groupid3" onchange="select1('Admin-Item-groupid3','Admin-Item-groupid4');">
    <option value ="0">未选择</option>
<?php get_select('items', $data['groupid3'],'level=3 and parentid='.$data['groupid2']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-title" class="col-sm-2 col-md-1 col-lg-1  control-label">商品名称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Item-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } ?>  placeholder="必填:商品名称" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-keywords" class="col-sm-2 col-md-1 col-lg-1  control-label">关键词</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="keywords" id="Admin-Item-keywords" class="col-sm-12 col-md-12 col-lg-12"  placeholder="关键词"><?php if(isset($data['keywords'])){echo $data['keywords']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-description" class="col-sm-2 col-md-1 col-lg-1  control-label">描述</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="description" id="Admin-Item-description" class="col-sm-12 col-md-12 col-lg-12"  placeholder="描述"><?php if(isset($data['description'])){echo $data['description']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-introduce" class="col-sm-2 col-md-1 col-lg-1  control-label"><?php echo $data['tmpa']==1?'商标卖点展示':'专利卖点展示' ?></label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="introduce" id="Admin-Item-introduce" class="col-sm-12 col-md-12 col-lg-12"  placeholder="商品简介"><?php if(isset($data['introduce'])){echo $data['introduce']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-price" class="col-sm-2 col-md-1 col-lg-1  control-label">商品价格</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="price" id="Admin-Item-price" <?php if(isset($data['price'])){echo 'value="'.$data['price'].'"'; } ?>  placeholder="商品价格">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-count" class="col-sm-2 col-md-1 col-lg-1  control-label">库存</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="count" id="Admin-Item-count" <?php if(isset($data['count'])){echo 'value="'.$data['count'].'"'; } ?>  placeholder="库存">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-views" class="col-sm-2 col-md-1 col-lg-1  control-label">浏览次数</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="views" id="Admin-Item-views" <?php if(isset($data['views'])){echo 'value="'.$data['views'].'"'; } ?>  placeholder="浏览次数">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">是否显示</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ITEM_STATE', $data['state']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-adimg" class="col-sm-2 col-md-1 col-lg-1  control-label">广告图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="Admin-Item-adimg-show"><?php if(isset($data['adimg']) && $data['adimg']){echo '<a href="'.$data['adimg'].'" target="_blank"><img src="'.$data['adimg'].'" width="200px"></a>'; } ?></div>
    <input type="hidden" id="Admin-Item-adimg-hidden" name="adimg" <?php if(isset($data['adimg'])){echo 'value="'.$data['adimg'].'"'; } ?> ><input type="file" class="form-control" name="file" id="Admin-Item-adimg" onchange="return ajaxFileUpload('Admin-Item-adimg')">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-img" class="col-sm-2 col-md-1 col-lg-1  control-label">商品图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="img" id="Admin-Item-img" <?php if(isset($data['img'])){echo 'value="'.$data['img'].'"'; } ?>  placeholder="商品图片">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-userid" class="col-sm-2 col-md-1 col-lg-1  control-label">用户ID</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="userid" id="Admin-Item-userid" <?php if(isset($data['userid'])){echo 'value="'.$data['userid'].'"'; } ?>  placeholder="用户ID">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-aid"  class="col-sm-2 col-md-1 col-lg-1  control-label">经纪人</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-aid" name="aid">
    <option value ="0">未选择</option>
<?php get_select('member', $data['aid'], 'admin=3', 'adminord', 'id', 'name') ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-type"  class="col-sm-2 col-md-1 col-lg-1  control-label">商品性质</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('ITEM_TYPE', $data['type']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmno" class="col-sm-2 col-md-1 col-lg-1  control-label">申请号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="tmno" id="Admin-Item-tmno" <?php if(isset($data['tmno'])){echo 'value="'.$data['tmno'].'"'; } ?>  placeholder="必填:申请号" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-master" class="col-sm-2 col-md-1 col-lg-1  control-label">权利人</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="master" id="Admin-Item-master" <?php if(isset($data['master'])){echo 'value="'.$data['master'].'"'; } ?>  placeholder="权利人">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-mastertype"  class="col-sm-2 col-md-1 col-lg-1  control-label">权利人类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-mastertype" name="mastertype">
    <option value ="0">未选择</option>
<?php get_select('ITEM_MASTER_TYPE', $data['mastertype']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmtype"  class="col-sm-2 col-md-1 col-lg-1  control-label">所属类别</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmtype" name="tmtype">
    <option value ="0">未选择</option>
<?php get_select('ITEM_TMPA_TYPE', $data['tmtype']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmlimit" class="col-sm-2 col-md-1 col-lg-1  control-label">服务项目</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="tmlimit" id="Admin-Item-tmlimit" <?php if(isset($data['tmlimit'])){echo 'value="'.$data['tmlimit'].'"'; } ?>  placeholder="必填:服务项目" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-tmregdate" class="col-sm-2 col-md-1 col-lg-1  control-label">申请日</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="tmregdate" id="Admin-Item-tmregdate" <?php if(isset($data['tmregdate'])){echo 'value="'.$data['tmregdate'].'"'; } ?>  placeholder="申请日">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-tmregstart" class="col-sm-2 col-md-1 col-lg-1  control-label">注册日</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="tmregstart" id="Admin-Item-tmregstart" <?php if(isset($data['tmregstart'])){echo 'value="'.$data['tmregstart'].'"'; } ?>  placeholder="注册日">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-tmregend" class="col-sm-2 col-md-1 col-lg-1  control-label">到期日</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="tmregend" id="Admin-Item-tmregend" <?php if(isset($data['tmregend'])){echo 'value="'.$data['tmregend'].'"'; } ?>  placeholder="到期日">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Item-tmregarea"  class="col-sm-2 col-md-1 col-lg-1  control-label">商品地区</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmregarea" name="tmregarea">
    <option value ="0">未选择</option>
<?php get_select('ITEM_AREA_TYPE', $data['tmregarea']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmtradeway"  class="col-sm-2 col-md-1 col-lg-1  control-label">交易方式</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmtradeway" name="tmtradeway">
    <option value ="0">未选择</option>
<?php get_select('ITEM_SELL_TYPE', $data['tmtradeway']) ?>
	</select>
	</div>
  </div>  
  
  <div class="form-group">
    <label for="Admin-Item-tmtradeway"  class="col-sm-2 col-md-1 col-lg-1  control-label">单独转让</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmtradeway" name="singlesale">
    <option value ="0">未选择</option>
<?php get_select('ITEM_SALE', $data['singlesale']) ?>
	</select>
	</div>
  </div>
  
  <div class="form-group">
    <label for="Admin-Item-tmscreening"  class="col-sm-2 col-md-1 col-lg-1  control-label">首页推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmscreening" name="tmscreening">
    <option value ="0">未选择</option>
<?php get_select('ITEM_HOT', $data['tmscreening']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening1"  class="col-sm-2 col-md-1 col-lg-1  control-label">市场页推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmscreening1" name="tmscreening1">
    <option value ="0">未选择</option>
<?php get_select('ITEM_HOT', $data['tmscreening1']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening2"  class="col-sm-2 col-md-1 col-lg-1  control-label">资讯页推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmscreening2" name="tmscreening2">
    <option value ="0">未选择</option>
<?php get_select('ITEM_HOT', $data['tmscreening2']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening3"  class="col-sm-2 col-md-1 col-lg-1  control-label">商城推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmscreening3" name="tmscreening3">
    <option value ="0">未选择</option>
<?php get_select('ITEM_SHOP', $data['tmscreening3']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tmscreening4"  class="col-sm-2 col-md-1 col-lg-1  control-label">店铺推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tmscreening4" name="tmscreening4">
    <option value ="0">未选择</option>
<?php get_select('ITEM_SHOP', $data['tmscreening4']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Item-tuijian"  class="col-sm-2 col-md-1 col-lg-1  control-label">推荐方式</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Item-tuijian" name="tuijian">
    <option value ="0">未选择</option>
<?php get_select('ITEM_TUIJIAN', $data['tuijian']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="ckeditor" class="col-sm-2 col-md-1 col-lg-1  control-label"><?php echo $data['tmpa']==1?'':'专利摘要'?></label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="tmcontent" id="ckeditor" class="col-sm-12 col-md-12 col-lg-12"  placeholder="商品内容详情"><?php if(isset($data['tmcontent'])){echo $data['tmcontent']; } ?></textarea>
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