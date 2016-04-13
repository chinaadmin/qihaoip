<include file='Public:header'/>
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon">
<div class="hytit">
<div class="paleft">您当前的位置：<a href="{:U('Index/index')}">专利管家</a> > <a href="{:U('CostManage/index')}">费用管理</a></div>
</div>
<div class="hgrzy">
<!--查询-->
<div class="col-xs-12 patjb">
	<div class="col-xs-12 ">
	   <div class="zlyjjyst">费用管理专利<span>{$data['count']}</span>件,费用管理总额<span>{$data['totalprice']}</span>元
	   	<a href="{:U('CostManage/expAll')}"  class="btn btn-default postsh">一键导出清单</a>
	   	<a href="javascript:;"  class="btn btn-default postsh alldel">一键删除</a>
	   </div>
	   <div class="zlyjjyst1">
	   	<form method="get" action="{:U('CostManage/index')}">
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
<div class="col-xs-12 pazhlist" >
          <table cellpadding="0" cellspacing="0" class="tablesths">
            <thead>
              <tr>
                <th width="5%"></th>
                <th width="8%">序号</th>
				<th width="16%">申请号</th>
                <th width="7%">正常申请费</th>
                <th width="7%">超权费</th>
                <th width="7%">有减缓官费</th>
				<th width="7%">维持费</th>
                <th width="7%">授权登印费</th>
                <th width="7%">代理费</th>
				<th width="7%">其他费用</th>
                <th width="7%">费用总计</th>
                <th width="15%"> <div class="fgroupleft">每页显示</div>
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
           <volist name="data['costmanage']" id="vo"> 
              <tr class="zlhover">
                <td width="5%"><!-- <a href="javascript:;" title="置顶" class="tabaction tabactiont zltop" rel="{$i}" ><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></a> --></td>
                <td width="8%"><input type="checkbox" name="gwct{$i}" value="{$vo['pmid']}"/>&nbsp;{$i}</td>
                <td width="16%"><a href="{:U('Zlgj/PatentTrade/detail')}/{$vo['patentnum']}/{$vo['zlpage']}" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="{$vo['cname']|htmlspecialchars_decode}">{$vo['patentnum']}</a></td>
                <td width="7%">{$vo['reg_fee']}</td>
                <td width="7%">{$vo['sup_acc_fee']}</td>
                <td width="7%">{$vo['cut_fee']}</td>
				<td width="7%">{$vo['total_fee']}</td>
                <td width="7%">{$vo['acc_fee']}</td>
                <td width="7%">{$vo['agent_fee']}</td>
				<td width="7%">{$vo['else_fee']}</td>
                <td width="7%" class="fycolors">{$vo['total_price']}</td>
                <td width="15%">
                	<a href="javascript:;" onClick="edit('{$vo[id]}',this);" title="修改" class="tabaction tabactiont posts3{$vo['id']}" rel="{$i}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                	<a href="javascript:;" title="点击删除" onClick="del('{$vo[pmid]}',this);" class="tabaction tabactiont"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
              </tr>
            </volist>  
			  <tr>
                <td colspan="12">
				<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件专利</div>
				<div class="seltot"><a href="javascript:;" class="btn btn-default paadd paadds">导出清单</a>  <a href="javascript:;" class="btn btn-default adddel">删除</a></div>
				</td>
             </tr>
            </tbody>
          </table>
          {$data['page']}
        </div>
<!--查询结果-->
</div>
<!--费用管家弹框-->
<volist name="data['costmanage']" id="vo">
      <div id="zzjs_net2{$vo['id']}" class="zzjs_net"></div>
      <div id="gg2{$vo['id']}" class="patupianss patupiansst">
        <div class="quxiaoss quxiaoss3{$vo['id']}"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
        <p>费用管家</p>
        <form method="post" class="form-horizontal" id="paforms3{$vo['id']}">
          <div class="col-xs-12 detailtable dashborders">
            <div class="form-group zllefttt">
              <div class="col-xs-2 scrzgmc zltitiss">专利号/申请号:&nbsp; </div>
              <div class="col-xs-8 ">
                <input type="text" readonly="readonly" class="form-control" name="zlh" value="{$vo['patentnum']}" />
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">正常申请费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} sqf{$vo['id']}" name="sqf" value="{$vo['reg_fee']}"  />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">授权登印费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} dyf{$vo['id']}" name="dyf" value="{$vo['acc_fee']}" />
                </div>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">超权费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} cqf{$vo['id']}" name="cqf" value="{$vo['sup_acc_fee']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">代理费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} dlf{$vo['id']}" name="dlf" value="{$vo['agent_fee']}"  />
                </div>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">有减缓官费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control toth{$vo['id']} jhf{$vo['id']}" name="jhf" value="{$vo['cut_fee']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">其他费用:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} qtf{$vo['id']}" name="qtf" value="{$vo['else_fee']}" />
                </div>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">已维持年数:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control wns{$vo['id']}"  id="year{$vo['id']}" name="wns" value="{$vo['years']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">总维持费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" readonly="readonly" class="form-control tots{$vo['id']} wcf{$vo['id']}" id="feiyon{$vo['id']}" name="wcf"  placeholder="自动计算费用" value="{$vo['total_fee']}" />
                </div>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">总计费用:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" readonly="readonly" class="form-control zfy{$vo['id']}" id="zoji{$vo['id']}" name="zfy" value="{$vo['total_price']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">
                  <button type="button" class="btn btn-primary" id="jisuan{$vo['id']}" onClick="jisuan('{$vo[id]}',this);">计算</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" onClick="fyqd('{$vo[id]}','{$vo[pmid]}',this);" class="btn btn-primary clocks clocks3{$vo['id']}">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao3{$vo['id']}">取消</a></div>
      </div>
</volist>
      <!--费用管家弹框-->
<include file='Public:footer'/>
</div>
</div>
<!--右侧内容-->
</div>
<script type='text/javascript'>

/*选择显示页数*/
$('.xianshit').change(function(){
	var pse = $(".xianshit  option:selected").val();
	var parameter = {'pse':pse};
	$.post("{:U(CostHouse/index)}",parameter,function(data){
		if(data){
			window.location.reload();
		}
	});
})
/*选择显示页数*/

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
		$.post("{:U('CostManage/batchDel')}",send_data,function(data,status){
			if (data){
				window.location.reload();
			}
		});
	});		
});

/* 批量下载功能 */
$('.paadds').click(function(){
	var num = $("input[name*='gwct']:checked").length;
	$.MsgBoxgj.Confirm("温馨提示","您确定要下载选中的"+num+"件专利？",function (){
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
		window.location.href = "{:U('CostManage/expDownload')}"+'/id/'+rows;
	});		
});

/* 一键删除所有信息  */
$('.alldel').click(function(){
	$.MsgBoxgj.Confirm("温馨提示","您确定要删除所有的专利？",function (){
		$.post("{:U('CostManage/allDel')}",function(data){
			$.MsgBoxgj.Alert("温馨提示：",data);
			$('.pazhlist').remove();
		});
	});
});

/* 提交修改费用信息 */
function fyqd(id,pid,obj){
	var parameter = {};
	parameter['id'] = pid;
	parameter['sqf'] = $('.sqf'+id).val();
	parameter['dyf'] = $('.dyf'+id).val();
	parameter['cqf'] = $('.cqf'+id).val();
	parameter['dlf'] = $('.dlf'+id).val();
	parameter['jhf'] = $('.jhf'+id).val();
	parameter['qtf'] = $('.qtf'+id).val();
	parameter['wns'] = $('.wns'+id).val();
	parameter['wcf'] = $('.wcf'+id).val();
	parameter['zfy'] = $('.zfy'+id).val();
	$.post("{:U('CostManage/editInfo')}",parameter,function(data){
		if(data){
			window.location.reload();
		}
	});
}

/* 修改费用  */
function edit(id,obj){
		$('#gg2'+id).css('display','block');
		$('#zzjs_net2'+id).css('display','block');
		$(document.body).css('overflow','hidden');

		$('.quxiaoss3'+id+'  a').click(function(){
			$('#gg2'+id).css('display','none');
			$('#zzjs_net2'+id).css('display','none');
			$(document.body).css('overflow','visible');
		});
		
		$('.quxiao3'+id).click(function(){
			$('#gg2'+id).css('display','none');
			$('#zzjs_net2'+id).css('display','none');
			$(document.body).css('overflow','visible');	
		});

		$('.paquyu1ss .clocks'+id).click(function(){
			$('#gg2'+id).css('display','none');
			$('#zzjs_net2'+id).css('display','none');
			$(document.body).css('overflow','visible');	
			//$('#paforms2').submit();
		});
}

/* 正常申请费 授权登印费 超权费 代理费 有减缓官费 其他费用  */
$(".form-control").focus(function(){
	if($(this).attr('value') == '0.00'){
		$(this).attr("value","");
	}
}).blur(function(){
	if($(this).attr('value') == ''){	
		$(this).attr("value",'0.00');
	}
});

/* 费用计算 */
var money="";
var type=1;
var fee =new Array('900','900','900','900','1200','1200','1200','2000','2000','2000','4000','4000','4000','6000','6000','6000','8000','8000','8000','8000','8000');
var fees =new Array('600','600','600','600','900','900','1200','1200','1200','2000','2000');
var weichifeis=0;
var totals=0;

function jisuan(id,obj){
	weichifeis=0;
	totals=0;
	money=$('#year'+id).val();
	weichifei();
	$('#feiyon'+id).val(weichifeis);
	total(id);
	$('#zoji'+id).val(totals);
}

/* $('#year').change(function(){
	weichifeis=0;
	totals=0;
	money=$('#year').val();
	weichifei();
	$('#feiyon').val(weichifeis);
	total();
	$('#zoji').val(totals)
}) */

function total(id){
	$('input[class*=tots'+id+']').each(function(){	
		totals+=parseFloat($(this).val());	
	})
	totals-=$('.toth'+id).val();
}

function weichifei(){
	if(type==1){
		if(money<21){
			for(i=1;i<=money;i++){
	    		weichifeis+=parseFloat(fee[i]);
			}
		}else{
			alert('已超出维持年限，请重新输入!');
		}
	}else if(type==2){
		if(money<11){
			for(i=1;i<=money;i++){
		    	weichifeis+=parseFloat(fees[i]);
			}
		}else{
			alert('已超出维持年限，请重新输入!');
		}
	}else{
		if(money<11){
			for(i=1;i<=money;i++){
		    	weichifeis+=parseFloat(fees[i]);
			}
		}else{
			alert('已超出维持年限，请重新输入!');
		}
	}
}
/* 费用计算  */

/*开启或关闭费用管家弹框*/
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
	$.post("{:U('CostManage/delInfo')}",send_data,function(data){
		if(data){
			$.MsgBoxgj.Alert("温馨提示：",data);
			//$(obj).parent().parent().next().remove();
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
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','#F5F5F5');
  }
);
$(".tablesths tr:even").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','none');
  }
);
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
	$('.ddtits').click(function(){
	$(this).parent().children('.ddxiangqins').slideToggle("slow");

	})
});
</script>
</body>
</html>