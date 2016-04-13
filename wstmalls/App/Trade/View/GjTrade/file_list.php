<include file="Public/header" />
<!--头部-->
<!--主体-->
<div class="hzlcon">
<!--左侧导航-->
<include file="Public/left" />
<!--左侧导航-->
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon">
<div class="hytit">
<div class="paleft">您当前的位置：<a href="<?php echo U('Trade')?>">商标管家</a> > <a href="<?php echo U('file_list')?>">文件清单</a></div>
</div>
<div class="hgrzy">
<!--查询-->
<div class="col-xs-12 patjb">
<div class="col-xs-12 ">
          <div class="zlyjjyst">文件管理<span><?php echo $list['count']?></span>件</div>
          <div class="zlyjjyst1">
            <form method="post" action="<?php echo U('Trade/GjTrade/file_list')?>">
				<div class="formdivs">
					<input type="text" name="paseach" class="pasearchs" value="<?php echo $list['paseach']?$list['paseach']:''?>" placeholder="注册号、商标名称、权利人等" />
					<input type="submit" value="检索" class="pasubs" />
				</div>
			</form>
          </div>
        </div>

</div>
<!--查询-->
<!--查询结果-->
<div class="col-xs-12 pazhlist pazhlists" >
<form method="post" action="">
          <table cellpadding="0" cellspacing="0" class="tablesths">
            <thead>
              <tr>
                <th width="5%"></th>
                <th width="8%">序号</th>
				<th width="10%" >类型</th>
                <th width="12%">注册号</th>
                <th width="20%">名称</th>
                <th width="20%">权利人</th>
				<th width="10%">文件总数</th>
                <th width="15%">操作</th>
              </tr>
            </thead>
            <tbody>
			<?php foreach ($list['trade'] as $key=>$value):?>
			<tr class="zlhover" id="<?php echo $value['uid']?>">
                <td width="5%"><a href="javascript:void(0)" class="tabaction tabactiont zltop" rel="1" ><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></a></td>
                <td width="8%"><input type="checkbox" name="ids[]" class="ids" value="<?php echo $value['uid']?>"/>&nbsp;<?php echo $key+1?></td>
                <td width="10%" ><?php echo $value['name']?></td>
                <td width="12%"><?php echo $value['reg_id']?></td>
                <td width="20%"><?php echo $value['trade_name']?></td>
                <td width="20%"><?php echo $value['trade_user']?></td>
                <td width="10%" ><?php echo count($value['file_img'])?></td>
                <td width="15%">
                <a href="javascript:void(0)" class="tabaction tuijianclick1 tabactiont show_img" uid="<?php echo $value['uid']?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                <a href="javascript:void(0)" class="tabaction tuijianclick1 tabactiont posts4" id="<?php echo $value['uid']?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                <a href="<?php echo U('Trade/GjTrade/del_file',array('uid'=>$value['uid']))?>" class="tabaction tabactiont"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
              </tr>
              <tr class="fbtuijian zlfbtuijian">
                <td colspan="8">
                  
                </td>
              </tr>
			<?php endforeach;?>
			
			  <tr>
                <td colspan="8">
				<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件商标</div>
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-default adddel" url="<?php echo U('Trade/GjTrade/file_delete')?>">删除</a></div>
				</td>
             </tr>
            </tbody>
          </table>
          </form>
          <?php echo $list['page']?>
        </div>
		<!--查询结果-->
		</div>
		<!--文件上传弹框-->
			      <div id="zzjs_net3" class="zzjs_net"></div>
			      <div id="gg3" class="patupianss patupiansst">


				   </div>
			      <!--文件上传弹框-->
			<include file="Public/foot" />
		</div>
	</div>
<!--右侧内容-->
</div>
<!--主体-->
<!--右侧热线-->

<!--右侧热线-->
<!--底部-->


<!--底部-->
<script type='text/javascript'>
 $('.show_img').live('click',function(){
	 var obj = $(this);
	 var uid = $(this).attr('uid');
	 if($(this).parents('tr').next().find('.'+uid).length){
		 $(this).parents('tr').next().find('td').html('');
		 $(this).parents('tr').next().hide();
		 
	 }else{
		$.post("<?php echo U('Trade/GjTrade/ajax_get_file')?>",{'uid':uid},function(msg){
			obj.parents('tr').next().show();
			obj.parents('tr').next().find('td').html(msg);
		})
	 }
})
 
$('.subclock').live('click',function(){
	var obj = $(this);
	var name = $(this).attr('name');
	var url = $(this).attr('url');
	var uid = $('#'+name).attr('uid');
	var data = $('#'+name).serialize();
	$.ajax({
		   type: "POST",
		   url: url,
		   data: data,
		   success: function(msg){
				clocks4();
				$.MsgBoxgj.Alerta('温馨提示',msg.msg,function(){
					if(msg.code==1){
						$.post("<?php echo U('Trade/GjTrade/ajax_get_file')?>", {'uid':msg.uid}, function(data){
							$('#'+msg.uid).next().find('td').html('');
							$('#'+msg.uid).next().find('td').html(data);
						})
					}
				})
		   }
		});
})

function clocks4(){
$('#gg3').css('display','none');
$('#zzjs_net3').css('display','none');
$(document.body).css("overflow","visible");	
}


$('.file_del span').live('click',function(){
	var rel = $(this).attr('rel');
	var uid = $(this).attr('uid');
	var obj = $(this);
	var url ="<?php echo U('file_del')?>";
	$.post(url,{'uid':uid,'rel':rel},function(msg){
		$.MsgBoxgj.Confirm('温馨提示',msg.msg,function(){
			if(msg.code==1){
				
			}
		})
	})
})
 

$('input[name="shu"]').live('keyup',function(){
	var min = parseInt($(this).parents('.qiehuan').find('ul').find('li').first().find('a').html());
	var max = parseInt($(this).parents('.qiehuan').find('ul').find('li').last().find('a').html());
	var now = parseInt($(this).val());
	if(now<min){
		$(this).val(min);
	}else if(now>max){
		$(this).val(max);
	}	
});
$('.sub').live('click',function(){
	var val = $('input[name="shu"]').val();
	var data = $(this).parent().prev().find('a').attr('href');
	var url = data.replace(/p\/\d+/,'p/'+val);
	window.location.href= url;
})

function tuijianclicks(tid,classname){
var send_data={'id':tid};
$.post("a.php",send_data,function(data,ts){
if(ts){
$('#trs'+tid).next('.fbtuijian').html(data);
}
})

$('.'+classname).parents('tr').next('.fbtuijian').slideToggle("slow");
$('.'+classname).parents('tr').next('.fbtuijian').siblings('.fbtuijian').slideUp("slow");
}
/*推荐弹出*/
$('.fycolors').hover(function(){
$(this).find('.others').css('display','block');
},function(){
$(this).find('.others').css('display','none');
}
)
/*开启或关闭上传文件弹框*/

/*开启或关闭上传文件弹框*/

function clocks4(){
$('#gg3').css('display','none');
$('#zzjs_net3').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.quxiaoss4 a').live('click',function(){
clocks4();
})
$('.quxiao4').live('click',function(){
clocks4();
})

$(".posts4").live('click',function(){
	var id = $(this).attr('id');
	var obj = $(this);
	var url = "<?php echo U('Trade/GjTrade/show_file')?>";
	$.post(url,{'id':id},function(msg){
			$('#gg3').html(msg);	
	})
$('#gg3').css('display','block');
$('#zzjs_net3').css('display','block');
$(document.body).css('overflow','hidden');
})

/*开启或关闭上传文件弹框*/

/*置顶*/
$('.zltop').click(function(){
var hid=$(this).attr('rel');
//alert(hid);
var send_data={'id':hid,'name':'top'};
$.post("a.php",send_data,function(data,ts){
if(ts){
window.location.reload();
}
})	
})
/*置顶*/



/*删除*/
$('.adddel').live('click',function(){
	var url = $(this).attr('url');
	$(this).parents('form').attr('action',url);
	$(this).parents('form').submit();
})	
/*删除*/


$('.paadd').live('click',function(){
	var url = $(this).attr('url');
	$(this).parents('form').attr('action',url);
	$(this).parents('form').submit();
})

/*鼠标放上后显示按钮*/
$('.zlhover').hover(function(){
	$(this).find('.tabactiont').css('display','block');
},function(){
	$(this).find('.tabactiont').css('display','none');
  }
);
/*鼠标放上后显示按钮*/

/*删除证书*/
$('.zldels span').live('click',function(){
$(this).parents("div[class*='zltulistt']").remove();
})
/*删除证书*/

/*选中数量*/
function zoushu(){
	var num=$(".ids:checked").length;
	$("#nums").html(num);
	}

/*全选*/
$('#alls').click(function(){
if(this.checked){
$(".tablesths").find(".ids").prop("checked",true);
}else{
$(".tablesths").find(".ids").removeAttr("checked");
}
zoushu();
})
$(".tablesths .ids").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
zoushu();
})
/*全选*/


$(document).ready(function(){
$(".tablesths tr:odd").css('background','#F5F5F5');
});

$(".tablesths tr:odd").hover(function(){
	$(this).css('background','#F5F5F5');
},function(){
	$(this).css('background','#F5F5F5');
  }
);
$(".tablesths tr:even").hover(function(){
	$(this).css('background','#F5F5F5');
},function(){
	$(this).css('background','none');
  }
 
);

$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
$('.dakaiones').slideToggle("slow");
});
</script>
</body>
</html>