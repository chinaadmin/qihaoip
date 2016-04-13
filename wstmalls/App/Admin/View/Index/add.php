        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          	<strong>通知：</strong>你好，<a href="#" class="alert-link">数据处理成功！</a>
          </div>
          <ol class="breadcrumb">
  		    <li><a href="#">首页</a></li>
  			<li><a href="#">用户管理</a></li>
  			<li class="active">用户列表</li>
		  </ol>
          <h4 class="sub-header">Section title</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" onkeydown="if(event.keyCode==13)return false;">
  <div class="form-group">
    <label for="exampleInputEmail1" class="col-sm-2 col-md-1 col-lg-1  control-label">输入框</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="email" class="form-control" name="asdf" placeholder="必填：请输入邮箱" id="exampleInputEmail1" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
  	<label class="col-sm-2 col-md-1 col-lg-1  control-label">多选项</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <label class="form-control">
      <input type="checkbox"> Check me out
      <input type="checkbox"> Check he out
      <input type="checkbox"> Check me out
    </label>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputFile2"  class="col-sm-2 col-md-1 col-lg-1  control-label">下拉框</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="exampleInputFile2">
  	<option>1</option>
  	<option>2</option>
  	<option>3</option>
  	<option>4</option>
  	<option>5</option>
	</select>
	</div>
  </div>
  <div class="form-group">
  	<label class="col-sm-2 col-md-1 col-lg-1  control-label">单选框</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <label class="form-control">
      <input type="radio" name="sex" value="male"> set off
      <input type="radio" name="sex" value="fmale"> set on
      <input type="radio" name="sex" value="nothing"> set nothing
    </label>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="textarea1">文本框</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" id="textarea1" class="col-sm-12 col-md-12 col-lg-12"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label"></label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div class="btn btn-default" onclick="add('form-add')">提交</div>
    </div>
  </div>
</form>
          </div> 
        </div>
<script type="text/javascript">
function add(formid){
	if(!chk_v_l('exampleInputEmail1','邮箱地址',0,5)){return false;};
	$.ajax({
		type:"POST",
		url:"/admin/index/add",
		data:$('#'+formid).serialize(),
		success:function(data){
			var re = eval(data);
			if(re.success){
				window.location.href="/admin/index/showList";
			} else {
				alert(re.errorMsg);
			}
		}
	});
	return false;
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
</script>