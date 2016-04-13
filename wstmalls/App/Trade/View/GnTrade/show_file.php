
			        <p>文件上传</p>
			        <form method="post" class="form-horizontal" action="" enctype="multipart/form-data" target='frameFile' id="">
			          <div class="col-xs-12 detailtable dashborders">
			            <div class="form-group zllefttt">
			              <div class="col-xs-2 scrzgmc ">文件上传:&nbsp; </div>
			              <div class="col-xs-8 ">
			                <!--
			                <input type="file" class="scrzgmct"  multiple >
							  -->
			                <input type='button' id="btn" class='btnt btn' value='浏览...' />
			                <!-- <input type="file" name="hfileFields2" class="file" multiple="multiple" onChange="document.getElementById('hstextfields2').value=this.value" /> -->
			              </div>
			            </div>
			           <!--  <div class="form-group">
			              <div class="col-xs-offset-4 col-xs-4">
			                <button type="submit" class="btn btn-default">批量上传</button>
			              </div>
			            </div> -->
			          </div>
			        </form>
			        
			        <iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
			        <div id="zltulistkk">
			          <form method="post" class="form-horizontal" action="" id="fileforms" uid="<?php echo $list['uid']?>" rel="<?php echo $list['rel']?>">
			          <input type="hidden" name="uid" value="<?php echo $list['trade_data']['uid']?>" />
			          <input type="hidden" name="rel" value="<?php echo $list['rel']?>" />
			            <div class="col-xs-12 detailtable dashborders" >
			              <div class="col-xs-12 fbtjlist" id="ul_pics">
			              
			              </div>
			            </div>
			          <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks subclock" name="fileforms" url="<?php echo U('edit_file')?>">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao4">取消</a></div>
			         </form>
			        </div>
			   
      
      <script type="text/javascript">
      var uploader = new plupload.Uploader({ //创建实例的构造方法 
    	    runtimes: 'html5,flash,silverlight,html4', 
    	    //上传插件初始化选用那种方式的优先级顺序 
    	    browse_button: 'btn', 
    	    // 上传按钮 
    	    url: "<?php echo U('ajax_upload')?>", 
    	    //远程上传地址 
    	    flash_swf_url: '<?php echo STATIC_V2;?>/js/plupload/Moxie.swf', 
    	    //flash文件地址 
    	    silverlight_xap_url: '<?php echo STATIC_V2;?>/js/plupload/Moxie.xap', 
    	    //silverlight文件地址 
    	    filters: { 
    	        max_file_size: '500kb', 
    	        //最大上传文件大小（格式100b, 10kb, 10mb, 1gb） 
    	        mime_types: [ //允许文件上传类型 
    	        { 
    	            title: "files", 
    	            extensions: "jpg,png,gif" 
    	        }] 
    	    }, 
    	    multi_selection: true, 
    	    //true:ctrl多文件上传, false 单文件上传 
    	    init: {
    	        FilesAdded: function(up, files) { //文件上传前
    	            if ($("#ul_pics").children("div").length > 30) {
    	                alert("您上传的图片太多了！");
    	                uploader.destroy();
    	            } else {
    	                var div = '';
    	                plupload.each(files, function(file) { //遍历文件
							div +="<div class='zltulistt zltulisttss' id='"+file['id']+"'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></div>";   
	        	            });
    	                $("#ul_pics").append(div);
    	                uploader.start();
    	            }
    	        },
    	        UploadProgress: function(up, file) { //上传中，显示进度条
    	     var percent = file.percent;
    	            $("#" + file.id).find('.bar').css({"width": percent + "%"});
    	            $("#" + file.id).find(".percent").text(percent + "%");
    	        },
    	        FileUploaded: function(up, file, info) { //文件上传成功的时候触发
    	           var data = eval("(" + info.response + ")");
    	            $("#" + file.id).html(" <img src='"+data.pic+"'/><input type='hidden' value='"+data.pic+"' name='file_img["+file.id+"][img]'><div class='col-xs-12'><input class='form-control' type='text' name='file_img["+file.id+"][name]' value='"+data.name+"'></div><div class='zldels'><span>×</span>");
    	        },
    	        Error: function(up, err) { //上传出错的时候触发
    	            alert(err.message);
    	        }
    	    }
    	}); 
    	uploader.init();
      </script>