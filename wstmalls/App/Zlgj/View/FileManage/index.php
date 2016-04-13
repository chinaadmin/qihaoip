<include file='Public:header'/>
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon">
<div class="hytit">
<div class="paleft">您当前的位置：<a href="{:U('Index/index')}">专利管家</a> > <a href="{:U('FileManage/index')}">文件清单</a></div>
</div>
<div class="hgrzy">
<!--查询-->
<div class="col-xs-12 patjb">
	<div class="col-xs-12 ">
	   <div class="zlyjjyst">文件管理专利<span>{$data['count']}</span>件<!-- <a href="{:U('FileManage/expAll')}" class="btn btn-default postsh yjxz">一键下载</a> --><a href="javascript:;" class="btn btn-default postsh yjsc">一键删除</a></div>
	     <div class="zlyjjyst1">
	       <form method="get" action="{:U('FileManage/index')}">
	         <notempty name="Think.get.pse"><input type="hidden" name="pse" value="{$Think.get.pse}"/></notempty>
			 <notempty name="Think.get.p"><input type="hidden" name="p" value="{$Think.get.p}"/></notempty>
	         <div class="formdivs">
	            <input type="text" name="js"  class="pasearchs" placeholder="<empty name="Think.get.js">申请号、专利名称、权利人、发明人等<else />{$Think.get.js}</empty>"/>
	            <input type="submit" value="检索" class="pasubs"/>
	         </div>
	       </form>
	     </div>
	</div>
</div>
<!--查询-->
<!--查询结果-->
<div class="col-xs-12 pazhlist pazhlists" >
          <table cellpadding="0" cellspacing="0" class="tablesths">
            <thead>
              <tr>
                <th width="5%"></th>
                <th width="8%">序号</th>
				<th width="10%" >类型</th>
                <th width="12%">专利号</th>
                <th width="20%">专利名</th>
                <th width="20%">权利人</th>
				<th width="10%">文件总数</th>
                <th width="15%"> 
                  <div class="fgroupleft">每页显示</div>
                  <div class="col-xs-5">
                      <select class="form-control xianshit" name="pse">
                        <option <eq name="data['pagesize']" value="10">selected = "selected"</eq> value="10">10</option>
                        <option <eq name="data['pagesize']" value="20">selected = "selected"</eq> value="20">20</option>
                        <option <eq name="data['pagesize']" value="30">selected = "selected"</eq> value="30">30</option>
                      </select>
                  </div>
                  <div class="fgroupleft">件</div></th>
              </tr>
            </thead>
            <tbody>
            <volist name="data['filemanage']" id="vo" key="key">
              <tr class="zlhover" id="trs{$vo['id']}">
                <td width="5%"><!-- <a href="#" title="#" class="tabaction tabactiont zltop" rel="{$vo['id']}" ><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></a> --></td>
                <td width="8%"><input type="checkbox" name="gwct{$key}" value="{$vo['pmid']}"/>&nbsp;{$key}</td>
                <td width="10%">
                	<if condition="$vo['type'] eq '1'">
                		<span class="famin">发明</span>
                	<elseif condition="$vo['type'] eq '2'"/>
                		<span class="waiguan">外观</span>
                	<elseif condition="$vo['type'] eq '3'"/>
                		<span class="shiyou">实用</span>
                	</if>
                </td>
                <td width="12%">{$vo['patentnum']}</td>
                <td width="20%">{$vo['cname']|htmlspecialchars_decode}</td>
                <td width="20%">{$vo['patentee']}</td>
                <td width="10%">{$vo['picnum']}</td>
                <td width="15%">
                	<a href="javascript:;" title="修改" class="tabaction tuijianclick{$vo['id']} tabactiont " onClick="tuijianclicks('{$vo[id]}','tuijianclick{$vo[id]}');" ><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                	<a href="javascript:;" title="点击删除" onClick="del('{$vo[pmid]}',this);" class="tabaction tabactiont"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
              </tr>
              <notempty name="Think.get.id">
             	 <tr class="fbtuijian <if condition=" $Think.get.id  eq $vo['id'] ">dakaiones</if>"  rel="{$vo[id]}">
              <else />
                 <tr class="fbtuijian zlfbtuijian <eq name="key" value="1">dakaiones</eq>"  rel="{$vo[id]}">
              </notempty>
                <td colspan="8">
                  <div class="col-xs-12 allwidth">
                    <div class="col-xs-12 fbtjlist fbtjfile{$vo['id']}">
                    <volist name="vo['pic']" id="v">
                      <div class="zltulistt wjtp{$v['id']}"> 
                      	<img src="{$v['url']}"/> 
                      	{$v['name']}
                        <div class="zldels" onClick="delPic('{$v[id]}')"><span rel="{$v['id']}">×</span></div>
                      </div>
                     </volist> 
                      <div class="zltulistt ">
                        <div class="zltianjia"> 
                        	<a href="javascript:;" onClick="posts4('{$vo[id]}','posts4{$vo[id]}');" class="posts4{$vo['id']}"><img src="/static/style/images/addzshu.jpg"/></a> 
                        </div>
                        	上传证书 		
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
         </volist>
			  <tr>
                <td colspan="8">
				<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件专利</div>
				<div class="seltot"><!-- <a href="javascript:" class="btn btn-default paadd paadds">下载</a> -->  <a href="javascript:" class="btn btn-default adddel">删除</a></div>
				</td>
             </tr>
            </tbody>   
          </table>
          {$data['page']}
        </div>
<!--查询结果-->
</div>
<!--文件上传弹框-->
<volist name="data['filemanage']" id="vo">
      <div id="zzjs_net4{$vo['id']}" class="zzjs_net"></div>
      <div id="posts4{$vo['id']}" class="patupianss patupiansst">
        <div class="quxiaoss quxiaoss4{$vo['id']}"><a href="javascript:void(0)" ><img src="/static/style/images/quxiaosstt.jpg"/></a></div>
        <p>文件上传</p>
        <form method="post" class="form-horizontal" action="{:U('FileManage/fileUpload')}" enctype="multipart/form-data" target='frameFile'>
          <div class="col-xs-12 detailtable dashborders">
            <div class="form-group zllefttt">
              <div class="col-xs-2 scrzgmc ">文件上传:&nbsp; </div>
              <div class="col-xs-8 ">
                <!--
                <input type="file" class="scrzgmct"  multiple >
				  -->
                <input type='text' id="hstextfields2{$vo['id']}" class='txt' placeholder="文件上传"/>
                <input type='button' class='btnt' value='浏览...' />
                <input type="hidden" name="id" value="{$vo['id']}"/>
                <input type="hidden" name="mid" value="{$vo['pmid']}"/>
                <input type="hidden" name="pn" value="{$vo['patentnum']}"/>
                <input type="file" name="img{$vo['id']}[]" class="file" multiple="multiple" onChange="document.getElementById('hstextfields2{$vo['id']}').value=this.value" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-offset-4 col-xs-4">
                <button type="submit" class="btn btn-default">批量上传</button>
              </div>
            </div>
          </div>
        </form>
        <iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
        <div id="zltulistkk{$vo['id']}">
          <form class="form-horizontal" id="paforms4{$vo['id']}">
            <div class="col-xs-12 detailtable dashborders" >
              <div class="col-xs-12 fbtjlist zltulist{$vo['id']}">
              <volist name="vo['pic']" id="v">
                <div class="zltulistt zltulisttss wjtp{$v['id']}"> 
                <img src="{$v['url']}"/>
                  <input type="hidden" value="{$v['id']}" name="picid{$v['id']}">
                  <input type="text" name="picname" value="{$v['name']}">
                  <div class="zldels" onClick="delPics('{$v[id]}')"><span rel="{$v['id']}">×</span></div>
                </div>
              </volist> 
              </div>
            </div>
          </form>
          <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks clocks4{$vo['id']}" onclick="scwjqd('{$vo[id]}','{$vo[pmid]}',this);">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao4{$vo['id']}">取消</a></div>
        </div>
      </div>
</volist>
      <!--文件上传弹框-->
<include file='Public:footer'/>
</div>
</div>
<!--右侧内容-->
</div>
<!--主体-->
<script type='text/javascript'>
/* 一键下载功能  */
/* function yjxz(){
	
} */

/* 批量删除功能 */
$('.adddel').click(function(){
	var num = $("input[name*='gwct']:checked").length;
	$.MsgBoxgj.Confirm("温馨提示","您确定要取消添加选中的"+num+"件专利？",function (){
		var row=new Array();
		var str = new Array();
		var n=0;
		var ctc = 0;
		$("input[name*='gwct']").each(function(){
			if(this.checked){
				ctc = $(this).attr("name");
				$("input[name='"+ctc+"']").each(function(){
					var ids=$(this).val();
					row[n]=ids;
					n++;
				})
			}
		})
		rows = row.join(",");
		var send_data={'id':rows};
		$.post("{:U('FileManage/batchDel')}",send_data,function(data,status){
			if (data){
				window.location.reload();
			}
		})
	});		
})

/* 一键删除 yjsc */
$('.yjsc').click(function(){
	$.MsgBoxgj.Confirm("温馨提示","您确定要删除所有的专利？",function (){
		$.post("{:U('FileManage/allDel')}",function(data){
			$.MsgBoxgj.Alert("温馨提示：",data);
			setTimeout("window.location.reload()",2000);
		});
	});
});

/*文件弹出框删除证书 */
function delPics(ids){
	var send_data={'id':ids};
	$.post("{:U('FileManage/delFile')}",send_data,function(data){
		$('.wjtp'+ids).remove();
	})
}
/*文件管理 删除证书 */
function delPic(ids){
	var send_data={'id':ids};
	$.post("{:U('FileManage/delFile')}",send_data,function(data){
		$('.wjtp'+ids).remove();
	})
}
/* 上传证件确定功能  */
function scwjqd(id,pid,obj){
	var row = new Array();
	var arr = new Array();
	var i=0;
	var gid = '{$Think.get.id}';
	$(".zltulist"+id).find(".zltulisttss").each(function(){
        var tdArr = $(this).children();
        var picid = $(this).find("input").eq(0).val();//图片id
        var picname = $(this).find("input").eq(1).val();//图片名称
        arr[i] = picid+','+picname;
        i++;
    });
	var parameter={'field':arr,'pid':pid,'id':id};
	$.post("{:U('FileManage/editFile')}",parameter,function(data){
		if(data){
			//window.location.href = window.location.href;
			$('.fbtjfile'+id).html(data);
		}else{
			window.location.href = "{:U('FileManage/index')}"+'/id/'+id;	
		}
	});
}
/* 文件上传功能 */
function plsc(id,pid,name,image){
	var strs = new Array(); //定义数组
	var str = new Array(); //定义数组
	var str1 = new Array(); //定义数组
	var str2 = new Array(); //定义数组
	var str3 = new Array(); //定义一数组
	var str4 = new Array(); //定义一数组
	var num = ''; //定义一数组
	strs = image.split(",");//图片地址
	str1 = name.split(",");//图片名称
	str2 = pid.split(",");//图片id
	for(i=0;i<strs.length ;i++ ){ 
		//str+='<div class="zltulistt zltulisttss wjtp'+str2[i]+'"><img src="'+strs[i]+'"/><input type="hidden" value="/static/style/images/zlzshu.jpg" name="hidden1"><div class="form-group zllefttt"><div class="col-xs-offset-1 col-xs-10 "><input type="text" name="picname[]" value="'+str1[i]+'"></div></div><div class="zldels" onClick=delPics("'+str2[i]+'")><span rel="'+str2[i]+'">×</span></div></div>';
		str+='<div class="zltulistt zltulisttss wjtp'+str2[i]+'"><img src="'+strs[i]+'"/><input type="hidden" value="'+str2[i]+'" name="picid'+str2[i]+'"><input type="text" name="picname[]" value="'+str1[i]+'"><div class="zldels" onClick=delPics("'+str2[i]+'")><span rel="'+str2[i]+'">×</span></div></div>';
	}
	for(i=0;i<strs.length ;i++ ){ 
		//str+='<div class="zltulistt zltulisttss wjtp'+str2[i]+'"><img src="'+strs[i]+'"/><input type="hidden" value="/static/style/images/zlzshu.jpg" name="hidden1"><div class="form-group zllefttt"><div class="col-xs-offset-1 col-xs-10 "><input type="text" name="picname[]" value="'+str1[i]+'"></div></div><div class="zldels" onClick=delPics("'+str2[i]+'")><span rel="'+str2[i]+'">×</span></div></div>';
		str3+='<div class="zltulistt wjtp'+str2[i]+'"><img src="'+strs[i]+'"/>'+str1[i]+'<div class="zldels" onClick=delPics("'+str2[i]+'")><span rel="'+str2[i]+'">×</span></div></div>';
	}
	str4 = str3+'<div class="zltulistt"><div class="zltianjia"><a href="javascript:;" onClick=posts4('+"'"+id+"'"+','+"'"+'posts4'+id+"'"+');><img src="/static/style/images/addzshu.jpg"/></a></div>上传证书 </div>'
	$('.zltulist'+id).html(str);
	$('.fbtjfile'+id).html(str4);
	//$('.trs'+id).find('td').eq('6').attr(num);
}
/*选择显示页数*/
$('.xianshit').change(function(){
	var pse = $(".xianshit  option:selected").val();
	var parameter = {'pse':pse};
	$.post("{:U(FileManage/index)}",parameter,function(data){
		if(data){
			window.location.reload();
		}
	});
});
/*选择显示页数*/

/*删除证书*/
/* $('.zldels span').click(function(){
var ids=$(this).attr('rel');
alert(ids);
var send_data={'id':ids};
$.post("a.php",send_data,function(data,ts){
if(ts){
window.location.reload();
}
})	
$(this).parents("div[class*='zltulistt']").remove();
}) */
/*删除证书*/
/*推荐弹出*/
/*
$('.tuijianclick').click(function(){

var tid=$(this).parents('tr').next('.fbtuijian').attr('rel');
var send_data={'id':tid};
$.post("a.php",send_data,function(data,ts){
if(ts){
//alert(tid);
//window.location.reload();
}

})

$(this).parents('tr').next('.fbtuijian').slideToggle("slow");
$(this).parents('tr').next('.fbtuijian').siblings('.fbtuijian').slideUp("slow");
})
*/
function tuijianclicks(tid,classname){
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

/* function clocks4(){
$('#gg3').css('display','none');
$('#zzjs_net3').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.quxiaoss4 a').click(function(){
clocks4();
})
$('.quxiao4').click(function(){
clocks4();
})
$('.paquyu1ss .clocks4').click(function(){
clocks4();
$('#paforms4').submit();
})
//var xiabiao='';
$(".posts4").click(function(){
//xiabiao=$(this).attr('rel');
$('#gg3').css('display','block');
$('#zzjs_net3').css('display','block');
$(document.body).css('overflow','hidden');
}) */

/*开启或关闭上传文件弹框*/
function posts4(id,classname){
	/* $('.'+classname).find('.flzt'+id).css('display','block');
	$('.'+classname).find('.nfjk'+id).css('display','none');
	$('.'+classname).find('.fygl'+id).css('display','none');
	$('.'+classname).find('.wjgl'+id).css('display','none');
	$('.'+classname).find('.jygl'+id).css('display','none'); */

	$('#posts4'+id).css('display','block');
	$('#zzjs_net4'+id).css('display','block');
	$(document.body).css("overflow","hidden");
	
	$('.quxiaoss4'+id+'  a').click(function(){
		$('#posts4'+id).css('display','none');
		$('#zzjs_net4'+id).css('display','none');
		$(document.body).css('overflow','visible');
	});
	
	$('.quxiao4'+id).click(function(){
		$('#posts4'+id).css('display','none');
		$('#zzjs_net4'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});

	$('.paquyu1ss .clocks4'+id).click(function(){
		$('#posts4'+id).css('display','none');
		$('#zzjs_net4'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});
};

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

/*提示框*/
 $(function () { $("[data-toggle='tooltip']").tooltip(); });
/*提示框*/

/*鼠标放上后显示按钮*/
$('.zlhover').hover(function(){
	$(this).find('.tabactiont').css('display','block');
},function(){
	$(this).find('.tabactiont').css('display','none');
  }
);
/*鼠标放上后显示按钮*/

/*搜索全选*/
$('.allsel').click(function(){
if(this.checked){
$(".pacheckbox").find("input[name*='Fruit']").attr("checked","checked");
}else{
$(".pacheckbox").find("input[name*='Fruit']").removeAttr("checked");
}
})
$(".allone").click(function(){
if(!(this.checked)){
$('.allsel').removeAttr("checked");
}
})
/*搜索全选*/

/*选中数量*/
function zoushu(){
	var num=$("input[name*='gwct']:checked").length;
	$("#nums").html(num);
	}

/*全选*/
$('#alls').click(function(){
if(this.checked){
$(".tablesths").find("input[name*='gwct']").prop("checked",true);
}else{
$(".tablesths").find("input[name*='gwct']").removeAttr("checked");
}
zoushu();
})
$(".tablesths input[name*='gwct']").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
zoushu();
})
/*全选*/

/*添加*/
$('.paadd').click(function(){
var row=new Array();
var n=0;
$(".tablesths input[name*='gwct']").each(function(){
if(this.checked){
var ids=$(this).val();
row[n]=ids;
n++;
}
})
rows = row.join(",");
alert(rows);
var send_data={'id':rows};
$.post("a.php",send_data,function(data,ts){
if(ts){
window.location.reload();
}
})		
})
/*添加*/

/*单个添加*/
function add(id){
var send_data={'id':id};
$.post("a.php",send_data,function(data,ts){
if(ts){
window.location.reload();
}
})		
}
/*单个添加*/

/*单个删除*/
function del(id,obj){
	var send_data={'id':id};
	$.post("{:U('FileManage/delData')}",send_data,function(data){
		if(data){
			$.MsgBoxgj.Alert("温馨提示：",data);
			$(obj).parent().parent().next().remove();
			$(obj).parent().parent().remove();
		}
	})		
}
/*单个删除*/

/*导航切换*/
$(".newhnavlist li").hover(function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-4;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'s.png');
}
},function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-5;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'.png');
}
}
)
/*导航切换*/
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