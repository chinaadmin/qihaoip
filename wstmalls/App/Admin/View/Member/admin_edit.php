<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>用户账户编辑</title>
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
  			<li><a href="<?php echo U('admin_ShowList'); ?>">用户账户列表</a></li>
  			<li class="active">用户账户编辑</a></li>
		  </ol>
          <h4 class="sub-header">编辑用户账户-所有用户资料</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-edit" action="#" method="post" onsubmit="return toVaild('form-edit')">
  <div class="form-group">
    <label for="Admin-Member-ugroup"  class="col-sm-2 col-md-1 col-lg-1  control-label">用户组</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-ugroup" name="ugroup">
    <option value ="0">未选择</option>
<?php get_select('members', $data['ugroup']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-admin"  class="col-sm-2 col-md-1 col-lg-1  control-label">管理组</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-admin" name="admin">
    <option value ="0">未选择</option>
<?php get_select('admin', $data['admin']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-adminord" class="col-sm-2 col-md-1 col-lg-1  control-label">管理员排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="adminord" id="Admin-Member-adminord" <?php if(isset($data['adminord'])){echo 'value="'.$data['adminord'].'"'; } else {echo 'placeholder="管理员排序"'; } ?>  placeholder="管理员排序" value="100">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-username" class="col-sm-2 col-md-1 col-lg-1  control-label">用户账号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="username" id="Admin-Member-username" <?php if(isset($data['username'])){echo 'value="'.$data['username'].'"'; } else {echo 'placeholder="账号"'; } ?>  placeholder="用户账号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-email" class="col-sm-2 col-md-1 col-lg-1  control-label">邮箱</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="email" id="Admin-Member-email" <?php if(isset($data['email'])){echo 'value="'.$data['email'].'"'; } else {echo 'placeholder="邮箱账号"'; } ?>  placeholder="邮箱" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-mobile" class="col-sm-2 col-md-1 col-lg-1  control-label">手机号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="mobile" id="Admin-Member-mobile" <?php if(isset($data['mobile'])){echo 'value="'.$data['mobile'].'"'; } else {echo 'placeholder="手机号码"'; } ?>  placeholder="手机号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-tel" class="col-sm-2 col-md-1 col-lg-1  control-label">电话号码</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="tel" id="Admin-Member-tel" <?php if(isset($data['tel'])){echo 'value="'.$data['tel'].'"'; } else {echo 'placeholder="固定电话号码"'; } ?>  placeholder="电话号码" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-webname" class="col-sm-2 col-md-1 col-lg-1  control-label">昵称</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="webname" id="Admin-Member-webname" <?php if(isset($data['webname'])){echo 'value="'.$data['webname'].'"'; } else {echo 'placeholder="网名"'; } ?>  placeholder="昵称" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-aid"  class="col-sm-2 col-md-1 col-lg-1  control-label">经纪人</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-aid" name="aid">
    <option value ="0">未选择</option>
<?php get_select('member', $data['aid'], 'admin=3', 'adminord', 'id', 'name') ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-qq" class="col-sm-2 col-md-1 col-lg-1  control-label">qq号码</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="qq" id="Admin-Member-qq" <?php if(isset($data['qq'])){echo 'value="'.$data['qq'].'"'; } else {echo 'placeholder="个人qq号"'; } ?>  placeholder="qq号码" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-weixin" class="col-sm-2 col-md-1 col-lg-1  control-label">微信账号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="weixin" id="Admin-Member-weixin" <?php if(isset($data['weixin'])){echo 'value="'.$data['weixin'].'"'; } else {echo 'placeholder="个人微信账号"'; } ?>  placeholder="微信账号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-name" class="col-sm-2 col-md-1 col-lg-1  control-label">姓名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="name" id="Admin-Member-name" <?php if(isset($data['name'])){echo 'value="'.$data['name'].'"'; } else {echo 'placeholder="个人姓名"'; } ?>  placeholder="姓名" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-about" class="col-sm-2 col-md-1 col-lg-1  control-label">个人简介</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="about" id="Admin-Member-about" class="col-sm-12 col-md-12 col-lg-12"  placeholder="个人简介"><?php if(isset($data['about'])){echo $data['about']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-province"  class="col-sm-2 col-md-1 col-lg-1  control-label">省份</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-province" name="province">
    <option value ="0">未选择</option>
<?php get_select('province', $data['province']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-city" class="col-sm-2 col-md-1 col-lg-1  control-label">城市</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="city" id="Admin-Member-city" <?php if(isset($data['city'])){echo 'value="'.$data['city'].'"'; } else {echo 'placeholder="所在城市id"'; } ?>  placeholder="城市" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-address" class="col-sm-2 col-md-1 col-lg-1  control-label">地址</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="address" id="Admin-Member-address" class="col-sm-12 col-md-12 col-lg-12"  placeholder="地址"><?php if(isset($data['address'])){echo $data['address']; } ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-bank"  class="col-sm-2 col-md-1 col-lg-1  control-label">归属银行</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-bank" name="bank">
    <option value ="0">未选择</option>
<?php get_select('BANKS', $data['bank']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-bankcard" class="col-sm-2 col-md-1 col-lg-1  control-label">银行卡号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="bankcard" id="Admin-Member-bankcard" <?php if(isset($data['bankcard'])){echo 'value="'.$data['bankcard'].'"'; } else {echo 'placeholder="个人银行卡号"'; } ?>  placeholder="银行卡号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-idcard" class="col-sm-2 col-md-1 col-lg-1  control-label">身份证号</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="idcard" id="Admin-Member-idcard" <?php if(isset($data['idcard'])){echo 'value="'.$data['idcard'].'"'; } else {echo 'placeholder="个人身份号"'; } ?>  placeholder="身份证号" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-idcardimg" class="col-sm-2 col-md-1 col-lg-1  control-label">身份证照片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="idcardimg" id="Admin-Member-idcardimg" <?php if(isset($data['idcardimg'])){echo 'value="'.$data['idcardimg'].'"'; } else {echo 'placeholder="个人身份证照片"'; } ?>  placeholder="身份证照片" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-regip" class="col-sm-2 col-md-1 col-lg-1  control-label">注册ip</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="regip" id="Admin-Member-regip" <?php if(isset($data['regip'])){echo 'value="'.$data['regip'].'"'; } else {echo 'placeholder="注册时的ip地址"'; } ?>  placeholder="注册ip" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-regdate" class="col-sm-2 col-md-1 col-lg-1  control-label">注册日期</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="regdate" id="Admin-Member-regdate" <?php if(isset($data['regdate'])){echo 'value="'.$data['regdate'].'"'; } else {echo 'placeholder="注册时的日期"'; } ?>  placeholder="注册日期" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-regtime" class="col-sm-2 col-md-1 col-lg-1  control-label">注册时间</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="regtime" id="Admin-Member-regtime" <?php if(isset($data['regtime'])){echo 'value="'.$data['regtime'].'"'; } else {echo 'placeholder="注册时的时间"'; } ?>  placeholder="注册时间" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-jifen" class="col-sm-2 col-md-1 col-lg-1  control-label">用户积分</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="jifen" id="Admin-Member-jifen" <?php if(isset($data['jifen'])){echo 'value="'.$data['jifen'].'"'; } else {echo 'placeholder="用户个人积分"'; } ?>  placeholder="用户积分" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-money" class="col-sm-2 col-md-1 col-lg-1  control-label">金额</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="money" id="Admin-Member-money" <?php if(isset($data['money'])){echo 'value="'.$data['money'].'"'; } else {echo 'placeholder="个人账户余额"'; } ?>  placeholder="金额" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-lockmoney" class="col-sm-2 col-md-1 col-lg-1  control-label">冻结金额</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="lockmoney" id="Admin-Member-lockmoney" <?php if(isset($data['lockmoney'])){echo 'value="'.$data['lockmoney'].'"'; } else {echo 'placeholder="冻结金额"'; } ?>  placeholder="冻结金额" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-qmoney" class="col-sm-2 col-md-1 col-lg-1  control-label">七号币</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="qmoney" id="Admin-Member-qmoney" <?php if(isset($data['qmoney'])){echo 'value="'.$data['qmoney'].'"'; } else {echo 'placeholder="商城的抵用金"'; } ?>  placeholder="七号币" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-emailchk"  class="col-sm-2 col-md-1 col-lg-1  control-label">邮箱验证</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-emailchk" name="emailchk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $data['emailchk']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-mobilechk"  class="col-sm-2 col-md-1 col-lg-1  control-label">手机验证</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-mobilechk" name="mobilechk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $data['mobilechk']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-idcardchk"  class="col-sm-2 col-md-1 col-lg-1  control-label">身份验证</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-idcardchk" name="idcardchk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $data['idcardchk']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-bankcardchk"  class="col-sm-2 col-md-1 col-lg-1  control-label">银行卡验证</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-bankcardchk" name="bankcardchk">
    <option value ="0">未选择</option>
<?php get_select('USER_CHK', $data['bankcardchk']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-gender"  class="col-sm-2 col-md-1 col-lg-1  control-label">性别</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-gender" name="gender">
    <option value ="0">未选择</option>
<?php get_select('USER_SEX', $data['gender']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Member-img" class="col-sm-2 col-md-1 col-lg-1  control-label">头像图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="img" id="Admin-Member-img" <?php if(isset($data['img'])){echo 'value="'.$data['img'].'"'; } else {echo 'placeholder="个人头像"'; } ?>  placeholder="头像图片" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Member-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Member-state" name="state">
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