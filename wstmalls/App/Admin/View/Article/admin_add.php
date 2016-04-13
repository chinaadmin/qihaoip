<include file="Public/header_nav"/>
  			<li><a href="<?php echo U('admin_ShowList'); ?>">文章管理列表</a></li>
  			<li class="active">文章管理新增</li>
		  </ol>
          <h4 class="sub-header">新增文章管理-文章包含新闻资讯帮助等各种图文数据</h4>
          <div class="container-fluid">
<form class="form-horizontal" id="form-add" action="#" method="post" onsubmit="return toVaild('form-add')">
  <div class="form-group">
    <label for="Admin-Article-groupid"  class="col-sm-2 col-md-1 col-lg-1  control-label">一级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Article-groupid" name="groupid" onchange="select('Admin-Article-groupid','Admin-Article-groupid2');">
    	<option value ="0">未选择</option>
		<?php get_select('articles',$data['groupid'],'level=1') ?>
	</select>
	</div>
  </div>  
  <div class="form-group">
    <label for="Admin-Article-groupid"  class="col-sm-2 col-md-1 col-lg-1  control-label">二级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Article-groupid2" name="groupid2" onchange="select('Admin-Article-groupid2','Admin-Article-groupid3');">
    	<option value ="0">未选择</option>
	</select>
	</div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-groupid"  class="col-sm-2 col-md-1 col-lg-1  control-label">三级分类</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Article-groupid3" name="groupid3">
    	<option value ="0">未选择</option>
	</select>
	</div>
  </div>
  <div class="form-group">
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
  </div>
  <div class="form-group">
    <label for="Admin-Article-style" class="col-sm-2 col-md-1 col-lg-1  control-label">模板式样</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="style" id="Admin-Article-style" <?php if(isset($data['style'])){echo 'value="'.$data['style'].'"'; } ?>  placeholder="模板式样">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-title" class="col-sm-2 col-md-1 col-lg-1  control-label">标题</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="title" id="Admin-Article-title" <?php if(isset($data['title'])){echo 'value="'.$data['title'].'"'; } ?>  placeholder="必填:标题" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-ename" class="col-sm-2 col-md-1 col-lg-1  control-label">英文名</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="ename" id="Admin-Article-ename" <?php if(isset($data['ename'])){echo 'value="'.$data['ename'].'"'; } ?>  placeholder="英文名">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-keywords" class="col-sm-2 col-md-1 col-lg-1  control-label">关键词</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="keywords" id="Admin-Article-keywords" <?php if(isset($data['keywords'])){echo 'value="'.$data['keywords'].'"'; } ?>  placeholder="关键词">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="Admin-Article-description">描述</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="description" id="Admin-Article-description" class="col-sm-12 col-md-12 col-lg-12"  placeholder="描述"><?php if(isset($data['description'])){echo $data['description']; } ?></textarea>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="ckeditor">内容</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="content" id="ckeditor" class="col-sm-12 col-md-12 col-lg-12"  placeholder="必填:内容" required><?php if(isset($data['content'])){echo $data['content']; } ?></textarea>
    <!-- <script id="container" name="content" type="text/plain">
       	 这里写你的初始化内容
    </script> -->
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-img" class="col-sm-2 col-md-1 col-lg-1  control-label">文章图片</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="Admin-Article-img-show"><?php if(isset($data['img']) && $data['img']){echo '<a href="'.$data['img'].'" target="_blank">'.$data['img'].'</a>'; } ?></div>
    <input type="text" class="form-control" id="Admin-Article-img-hidden" name="img" <?php if(isset($data['img'])){echo 'value="'.$data['img'].'"'; } ?> ><input type="file" class="form-control" name="file" id="Admin-Article-img" onchange="return ajaxFileUpload('Admin-Article-img','file')">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-views" class="col-sm-2 col-md-1 col-lg-1  control-label">查看次数</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="views" id="Admin-Article-views" <?php if(isset($data['views'])){echo 'value="'.$data['views'].'"'; } ?>  placeholder="查看次数">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-editor" class="col-sm-2 col-md-1 col-lg-1  control-label">发布者</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="editor" id="Admin-Article-editor" <?php if(isset($data['editor'])){echo 'value="'.$data['editor'].'"'; } ?>  placeholder="发布者">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-state"  class="col-sm-2 col-md-1 col-lg-1  control-label">状态</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Article-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ITEM_STATE', $data['state']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Article-sort" class="col-sm-2 col-md-1 col-lg-1  control-label">排序</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="sort" id="Admin-Article-sort" <?php if(isset($data['sort'])){echo 'value="'.$data['sort'].'"'; } ?>  placeholder="排序">
    </div>
  </div>
  <div class="form-group">
    <label for="Admin-Article-hot"  class="col-sm-2 col-md-1 col-lg-1  control-label">首页推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Article-hot" name="hot">
    <option value ="0">未选择</option>
<?php get_select('ARTICLE_TYPE', $data['hot']) ?>
	</select>
	</div>
  </div>  <div class="form-group">
    <label for="Admin-Article-hot1"  class="col-sm-2 col-md-1 col-lg-1  control-label">资讯首页推荐</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="Admin-Article-hot1" name="hot1">
    <option value ="0">未选择</option>
<?php get_select('ARTICLE_TYPE', $data['hot1']) ?>
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
	if(!chk_v_l('Admin-Article-title','标题',4,60)){return false;};

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
/* var ue = UE.getEditor('container'); */
//var ue = UE.getContent();
//对编辑器的操作最好在编辑器ready之后再做
/* ue.ready(function() {
//设置编辑器的内容
ue.setContent('hello');
//获取html内容，返回: <p>hello</p>
var html = ue.getContent();
//获取纯文本内容，返回: hello
var txt = ue.getContentTxt();
}); */
initSample();
</script>
<!-- content -->
    </div>
</div>
</body>
</html>