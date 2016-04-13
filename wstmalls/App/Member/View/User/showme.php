<include file="Public/header" />
<!--主体-->
<div class="hzlcon">
	<!--左侧导航-->
	<include file="Public/left" />
	<!--左侧导航-->
	<!--右侧内容-->
	<div class="hconright">
		<div class="hconrightcon">
			<div class="hytit">
				您当前的位置：<a href="<?php echo U('User/index'); ?>" title="会员中心">会员中心</a> ><span>修改资料</span>
			</div>
			<div class="hgrzy">
				<h2>个人资料</h2>
				<div class="col-xs-12 addimgst">
					<div class="col-xs-2 hym1">头像</div>
					<div class="col-xs-offset-1 col-xs-7">
						<div class="col-xs-6 hweizhi">
							<input type='hidden' name='img' class='form-control hval' id="pics"/>
							<a href="javascript:void(0)" class="OpenDialog"><img class="img-thumbnail" src="<?php echo $data['img']?$data['img']:STATIC_V2.'images/member.jpg';?>" width="120px" height="120px"/></a>
						</div>
					</div>
				</div>
				
				
				<div class="hhym">
					<div class="col-xs-2 hym1">会员名</div>
					<div class="col-xs-offset-1 col-xs-6 hym2"><?php echo $data['username']?></div>
					<div class="col-xs-3 hym3 hym3s">
						<!-- <a href="javascript:;" title="#" class="hphone">应用手机号码登录</a> ｜ <a
							href="javascript:;" title="#" class="hemail">应用邮箱登录</a> -->
					</div>
				</div>
				
				<div class="hhym zsxmt">
					<div class="col-xs-2 hym1"><font style="color:#ff3333">*</font>真实姓名</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='name' class='form-control hval'
								value="<?php echo $data['name']?>" />
						</div>
						<div class="col-xs-2 hweizhis gender">
							<div class="col-xs-8" style="line-height:20px;">
									<label class="radio-inline">
										<input type="radio" name="gender" value="1" <?php echo $data['gender']==1||$data['gender']!=2?'checked':''; ?>> 男
									</label>
									<label class="radio-inline">
										<input type="radio" name="gender" value="2" <?php echo $data['gender']==2?'checked':''; ?>> 女
									</label>
								</div>
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1"><font style="color:#ff3333">*</font>手机</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='mobile' class='form-control hval'
								value="<?php echo $data['mobile']?>" />
						</div>
						<div class="col-xs-2 hweizhis code">
							<input type='text' name='mobile_code' class='form-control'
								placeholder="输入验证码" />
						</div>
						<div class="col-xs-2 hweizhist">
							<button type="button" class="btn btn-primary send_code">发送验证码</button>
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1"><font style="color:#ff3333">*</font>邮箱</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='email' class='form-control hval'
								value="<?php echo $data['email']?>" />
						</div>
						<div class="col-xs-2 hweizhis code">
							<input type='text' name='email_code' class='form-control'
								placeholder="输入验证码" />
						</div>
						<div class="col-xs-2 hweizhist">
							<button type="button" class="btn btn-primary send_code">发送验证码</button>
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">银行卡</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-2 hweizhiss">
							<select class="form-control" name="bank">
							<?php foreach (C('BANKS') as $key=>$value):?>
								<option value="<?php echo $key?>" <?php echo isset($data['bank'])&&$data['bank']==$key?'selected="selected"':''?>><?php echo $value; ?></option>
							<?php endforeach;?>
							</select>
						</div>
						<div class="col-xs-6 hweizhi">
							<input type='text' name='bankcard' class='form-control hval'
								placeholder="银行卡开户人需为会员实名认证人" value="<?php echo $data['bankcard']?>"/>
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">电话</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='tel' class='form-control hval' placeholder="格式：0755-86210909" value="<?php echo $data['tel']?>" />
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">QQ</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='qq' class='form-control hval'
								value="<?php echo $data['qq']?>" />
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">微信</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='weixin' class='form-control hval'
								value="<?php echo $data['weixin']?>" />
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">所在地区</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='province' class='form-control hval'
								value="<?php echo $data['province']?>" />
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhym">
					<div class="col-xs-2 hym1">联系地址</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<input type='text' name='address' class='form-control hval'
								value="<?php echo $data['address']?>" />
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				<div class="hhymst">
					<div class="col-xs-2 hym1">个人简介</div>
					<div class="col-xs-offset-1 col-xs-7 hym2">
						<div class="col-xs-6 hweizhi">
							<textarea name='about' class='form-control hval'><?php echo $data['about']?> </textarea>
						</div>
					</div>
					<div class="col-xs-2 hym3">
						<button type="button" class="btn btn-success quedin">确定</button>
					</div>
				</div>
				
				<div class="hhym">
					<div class="col-xs-2 hym1">专属经纪人</div>
					<div class="col-xs-offset-1 col-xs-6 hym2"><?php echo $data['aid']?></div>
				</div>
			</div>
			<include file="Public/foot" />
		</div>
	</div>
	<!--右侧内容-->
</div>
<!--主体-->
<!--右侧热线-->

<!--右侧热线-->
<!--底部-->
<!--上传图片弹框-->
	<div id="zzjs_net" class="zzjs_net"></div>
	<div id="gg" class="tupian">
		<div class="quxiaoss">
			<a href="javascript:void(0)"><img src="<?php echo STATIC_V2;?>images/quxiaoss.png" /></a>
		</div>
		<p>图片上传</p>
		<ul>
			<li><a href="javascript:void(0)" class="addbors">本地图片</a></li>

		</ul>
		<div class="quyu" id="bedicon0">
			<form id='formFile' name='formFile' method="post"
				action="/Index/Upload/img" target='frameFile'
				enctype="multipart/form-data">
				<input id="ff" type="file" name="file" class="wanless" />
			</form>
			<iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
			<br />
			<br /> <a href="javascript:void(0)" class="changekk">上传</a><a
				href="javascript:void(0)" class="clocks">取消</a>
		</div>

	</div>
	<!--上传图片弹框-->

<!--底部-->
	<!--裁切图片-->
	<div class="dialog">
		<div class="span12">
				<div class="jc-demo-box">
					<img src="<?php echo STATIC_V2;?>images/pics_default.png" id="target" alt="图片预览" class="bigtutts"  />
					<div id="preview-pane">
						<div class="preview-container" >
							<img src="<?php echo STATIC_V2;?>images/pics_default.png" class="jcrop-preview"/>
						</div>
						<form action="<?php echo U('Member/User/uploadsImg')?>" class="ajaxPic" enctype="multipart/form-data" method="post">
								<input type="button" value="选择图片" onclick="document.all.tt.click()" class="btn btn-info"/>
								<INPUT TYPE="file" name="tt" style="display:none" id="tt" >
								<!-- <input type="submit" value="提交上传"  class="btn btn-danger"/> -->
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<form action="__URL__/cutImg" method="post" class="ajaxCut" style="padding-top:10px;padd-bottom:20px;">  
            <input type="hidden" id="x" name="x" />  
            <input type="hidden" id="y" name="y" />
			<input type="hidden" id="x1" name="x1" />  
            <input type="hidden" id="y1" name="y1" />
            <input type="hidden" id="w" name="w" />  
            <input type="hidden" id="h" name="h" />
            <input type="hidden" name="filename" value="">
            <input type="submit" value="完成裁切" class="btn btn-primary"/>
			<input type="button" value="取消" class="btn btn-default closeDialog"/> 
        </form>
	</div>
	<!--裁切图片-->
<script type='text/javascript'>
$(document).ready(function(){

});

$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
        $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
});	
/*应用手机或邮箱登录*/
/*确认提交*/
$('.quedin').click(function(){
	var values=$(this).parents('.hhym').find('.hval').val();
	var name=$(this).parents('.hhym').find('.hval').attr('name');
	if(values){
		if(name=='bankcard'){
			var values1 = $(this).parents('.hhym').find('select').val();
			var name1 = $(this).parents('.hhym').find('select').attr('name');
			var send_data={'value':name+','+values,'value1':name1+','+values1};
		}else if(name=='mobile' || name == 'email'){
			var name1 = $(this).parent().parent().find('.code').find('input').attr('name');
			var values1 = $(this).parent().parent().find('.code').find('input').val();
			var send_data={'value':name+','+values,'value1':name1+','+values1};
		}else if(name=='name'){
			var name1 = $(this).parent().parent().find('.gender').find('input:checked').attr('name');
			var values1 = $(this).parent().parent().find('.gender').find('input:checked').val();
			var send_data={'value':name+','+values,'value1':name1+','+values1};
		}else{
			var send_data={'value':name+','+values};
		}
		var url = "<?php echo U('Member/User/edit');?>"
			$.post(url,send_data,function(msg){
				var re = $.parseJSON(msg);
				$.MsgBox.Alert("温馨提示：",re.data.msg);
			})
	}
})

//发送验证码
$('.send_code').click(function(){
	var name = $(this).parent().parent().find('.code').find('input').attr('name');
	var val = $(this).parent().parent().find('.hval').val();
	var url = "<?php echo U('Member/User/sendmsg')?>";
	$.post(url,{'name':name,'val':val},function(msg){
		var re = $.parseJSON(msg);
		$.MsgBox.Alert("温馨提示：",re.data.msg);

	})
})

/*确认提交*/
	var ff=1;
	$('.xialabiaodan a').click(function(){
		if(ff==1){
			$('.zsxmt').addClass('autos');
			ff=0;
		}else{
			$('.zsxmt').removeClass('autos');
			ff=1;
		}
	})
</script>
<script type='text/javascript'>
		/*左侧导航切换*/
		$(function() {
			$(".hconlefts dt").click(
					function() {
						$(this).parent().children('dd').slideToggle("slow");
						$(this).parent().siblings('dl').children('dd')
								.siblings("dd:visible").slideUp("slow");
					});
			$('.ddtits').click(function() {
				$(this).parent().children('.ddxiangqins').slideToggle("slow");
			})
		});
		/*左侧导航切换*/
		/*本地图片上传处理*/
		$('.quyu .changekk').click(function() {
			$('#formFile').submit();
			clocks();
		})
		function uploadSuccess(msg) {
			var re = msg.split('|');
			if (re[0] == 'success') {
				$('#preview' + xiabiao).attr('src', re[1]);
				$('#thumb' + xiabiao).val(re[1]);
			} else {
				alert(re[1]);
			}
		}
		/*本地图片上传处理*/
		/*删除图片*/
		var xbt = '';
		$('.deletes').click(function() {
			xbt = $(this).attr('name');
			$('#preview' + xbt).attr("src", "<?php echo STATIC_V2;?>images/dendai.png");
			$('#thumb' + xbt).val('');
		})
		/*删除图片*/
		/*开启或关闭上传图片弹框*/
		function clocks() {
			$('#gg').css('display', 'none');
			$('#zzjs_net').css('display', 'none');
			$(document.body).css("overflow", "visible");
		}
		$('.quxiaoss a').click(function() {
			clocks();
		})
		$('.quyu .clocks').click(function() {
			clocks();
		})
		$('.quyu1 .clocks').click(function() {
			clocks();
		})
		var xiabiao = '';
		$(".posts").click(function() {
			xiabiao = $(this).attr('name');
			$('#gg').css('display', 'block');
			$('#zzjs_net').css('display', 'block');
			$(document.body).css('overflow', 'hidden');
		})
		
		$('input[name=bankcard]').blur(function(){
			var obj = $(this);
			var val = $(this).val();
			if(isNaN(val)){
				$.MsgBox.Alerta("温馨提示：",'卡号只能为数字！',function(){
					obj.focus();
					obj.val('');	
				});
				
				
			}
		})
		/*开启或关闭上传图片弹框*/
	</script>
	<script type="text/javascript">
		$(function(){
			$('.OpenDialog').click(function(){
				$('div.dialog').show();
				$('<div class="modal-backdrop"></div>').appendTo('body');
        		return false;
			})
			
		$('#tt').change(function(){
			$('.ajaxPic').submit();
		})
			
	//ajax上传图片并且裁切生成缩略图
    $('form.ajaxPic').submit(function(){
        $.ajaxFileUpload({
            url: $(this).attr('action'),
            secureuri: false,
            fileElementId: 'tt',
            dataType: 'json',
            success: function(ajax){

                var img1 = $('div.jc-demo-box').find('img');
                var $pimg = $('.jcrop-preview');
                var $pcnt = $('#preview-pane .preview-container'), xsize = $pcnt.width(), ysize = $pcnt.height();
                var $preview = $('#preview-pane');
                img1.attr('src', ajax.data);
                $('input[type=hidden][name=filename]').val(ajax.data);
                
                $('<img/>').attr('src', ajax.data).load(function(){
                    $('#target').css({
                        width: this.width,
                        height: this.height,
                    })
                    $pimg.css({
                        width: this.width,
                        height: this.height,
                    })
                    
                })
                
                $('#target').imgAreaSelect({
                    aspectRatio: '120:120',
                    onSelectChange: preview
                });
                
                function preview(img, selection){
                    var scaleX = 120 / selection.width;
                    var scaleY = 120 / selection.height;
                    var width = $('#target').width();
                    var height = $('#target').height();
                    $('.jcrop-preview').css({
                        width: Math.round(scaleX * width) + 'px',
                        height: Math.round(scaleY * height) + 'px',
                        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
                        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
                    });
                    $('#x').val(selection.x1);
                    $('#y').val(selection.y1);
                    $('#x1').val(selection.x2);
                    $('#y1').val(selection.y2);
                    $('#w').val(selection.width);
                    $('#h').val(selection.height);
                }
            }
        })
        return false;
    })
    //ajax上传裁切
    $('form.ajaxCut').submit(function(){
        var thumbnail = $('.img-thumbnail');
        var dialog = $('.dialog');
        $.ajax({
            url: $(this).attr('action'),
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(ajax){
                thumbnail.attr('src', ajax.data);
                $('#pics').val(ajax.data);
                $('input[type=button].closeDialog').trigger('click');
            }
        })
        return false;
    })
	
	 $('div.dialog input[type=button].closeDialog').click(function(){
        $('div.dialog').hide();
        $('div.modal-backdrop').remove();
		//缩略图裁切框隐藏
        $('div.imgareaselect-outer').hide();
        $('div.imgareaselect-border1').hide();
        $('div.imgareaselect-border2').hide();
        $('div.imgareaselect-selection').hide();
        return false;
    })
		})
	</script>
</body>
</html>