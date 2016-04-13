<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>供求信息编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">供求信息列表</a></li>
  			<li class="active">供求信息编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑供求信息-商品供求信息</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Supply-uid" class="col-sm-2 col-md-1 col-lg-1  control-label">信息号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="uid" id="Admin-Supply-uid" <?php if(isset($data['uid'])){echo 'value="'.$data['uid'].'"'; } else {echo 'placeholder="信息流水"'; } ?>  placeholder="信息号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-supplytype"  class="col-sm-2 col-md-1 col-lg-1  control-label">供/求类型</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Supply-supplytype" name="supplytype">
    <option value ="0">未选择</option>
<?php get_select('SUPPLY_TYPE', $data['supplytype']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Supply-tmpa"  class="col-sm-2 col-md-1 col-lg-1  control-label">商标/专利</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Supply-tmpa" name="tmpa">
    <option value ="0">未选择</option>
<?php get_select('ITEM_PATM', $data['tmpa']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Supply-groupid" class="col-sm-2 col-md-1 col-lg-1  control-label">产品类别</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="groupid" id="Admin-Supply-groupid" <?php if(isset($data['groupid'])){echo 'value="'.$data['groupid'].'"'; } else {echo 'placeholder="其他"'; } ?>  placeholder="产品类别" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-userid" class="col-sm-2 col-md-1 col-lg-1  control-label">用户id</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="userid" id="Admin-Supply-userid" <?php if(isset($data['userid'])){echo 'value="'.$data['userid'].'"'; } else {echo 'placeholder="其他"'; } ?>  placeholder="用户id" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-title" class="col-sm-2 col-md-1 col-lg-1  control-label">标题</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Supply-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } else {echo 'placeholder="标题详情"'; } ?>  placeholder="必填:标题" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-content" class="col-sm-2 col-md-1 col-lg-1  control-label">内容</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="content" id="Admin-Supply-content" class="col-sm-12 col-md-12 col-lg-12"  placeholder="内容"><?php if(isset($data['content'])){echo $data['content']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-pricemin" class="col-sm-2 col-md-1 col-lg-1  control-label">价格</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="pricemin" id="Admin-Supply-pricemin" <?php if(isset($data['pricemin'])){echo 'value="'.$data['pricemin'].'"'; } else {echo 'placeholder="区间"'; } ?>  placeholder="必填:价格" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-pricemax" class="col-sm-2 col-md-1 col-lg-1  control-label">价格</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="pricemax" id="Admin-Supply-pricemax" <?php if(isset($data['pricemax'])){echo 'value="'.$data['pricemax'].'"'; } else {echo 'placeholder="区间"'; } ?>  placeholder="必填:价格" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-adddate" class="col-sm-2 col-md-1 col-lg-1  control-label">提交日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="adddate" id="Admin-Supply-adddate" <?php if(isset($data['adddate'])){echo 'value="'.$data['adddate'].'"'; } else {echo 'placeholder=""'; } ?>  placeholder="提交日期" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-addtime" class="col-sm-2 col-md-1 col-lg-1  control-label">开始时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="addtime" id="Admin-Supply-addtime" <?php if(isset($data['addtime'])){echo 'value="'.$data['addtime'].'"'; } else {echo 'placeholder=""'; } ?>  placeholder="开始时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-edittime" class="col-sm-2 col-md-1 col-lg-1  control-label">更新时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="edittime" id="Admin-Supply-edittime" <?php if(isset($data['edittime'])){echo 'value="'.$data['edittime'].'"'; } else {echo 'placeholder=""'; } ?>  placeholder="更新时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-endtime" class="col-sm-2 col-md-1 col-lg-1  control-label">结束时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="endtime" id="Admin-Supply-endtime" <?php if(isset($data['endtime'])){echo 'value="'.$data['endtime'].'"'; } else {echo 'placeholder=""'; } ?>  placeholder="结束时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-views" class="col-sm-2 col-md-1 col-lg-1  control-label">查看次数</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="views" id="Admin-Supply-views" <?php if(isset($data['views'])){echo 'value="'.$data['views'].'"'; } else {echo 'placeholder=""'; } ?>  placeholder="查看次数" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Supply-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Supply-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ITEM_STATE', $data['state']) ?>
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