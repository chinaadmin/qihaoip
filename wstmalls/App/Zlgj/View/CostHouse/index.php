<include file='Public:header'/>
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon">
<div class="hytit">
<div class="paleft">您当前的位置：<a href="{:U('Index/index')}">专利管家</a> > <a href="{:U('CostHouse/costlist')}">缴费清单</a></div>
</div>
<div class="hgrzy">
<!--查询-->
<div class="col-xs-12 patjb">
<div class="col-xs-12 ">
          <div class="zlyjjyst">清单中共<span>{$data['count']}</span>件专利，缴纳总额<span>{$data['totalprice']|default='0'}元</span>
          	<a href="javascript:;" title="一键缴费" class="btn btn-default postsh yjjf">一键结算</a>
          	<a href="javascript:;" title="一键删除" class="btn btn-default postsh yjsc">一键删除</a>
          	<a href="{:U('CostHouse/expAll')}" title="一键删除" class="btn btn-default postsh dcqd">导出清单</a>
          </div>
          <div class="zlyjjyst1">
            <form method="get" action="{:U('CostHouse/costlist')}">
              <div class="formdivs">
                <notempty name="Think.get.pse"><input type="hidden" name="pse" value="{$Think.get.pse}"/></notempty>
				<notempty name="Think.get.p"><input type="hidden" name="p" value="{$Think.get.p}"/></notempty>
                <input type="text" name="js"  class="pasearchs" placeholder="<empty name="Think.get.js">申请号、专利名称、权利人、发明人等<else />{$Think.get.js}</empty>" />
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
                <th width="5%">序号</th>
				<th width="5%">类型</th>
                <th width="12%">专利号</th>
                <th width="20%">专利名</th>
                <th width="10%">申请日期</th>
				<th width="10%">应缴日期</th>
                <th width="10%">缴纳总额</th>
                <th width="8%">处理状态</th>
                <th width="15%"> 
                <div class="fgroupleft">每页显示</div>
                  <div class="col-xs-5">
                      <select class="form-control xianshit" name="pse">
                        <option <eq name="data['pagesize']" value="10">selected = "selected"</eq> value="10">10</option>
                        <option <eq name="data['pagesize']" value="20">selected = "selected"</eq> value="20">20</option>
                        <option <eq name="data['pagesize']" value="30">selected = "selected"</eq> value="30">30</option>
                      </select>
                  </div>
                  <div class="fgroupleft">件</div>
                </th>
              </tr>
            </thead>
            <tbody>
            <volist name="data['costlist']" id="vo">
              <tr class="zlhover">
                <td width="5%"><!-- <a href="javascript:;" title="置顶功能" class="tabaction tabactiont zltop" rel="{$i}" ><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></a> --></td>
                <td width="5%"><input type="checkbox" name="gwct{$i}" value="{$vo['pmid']}"/>&nbsp;{$i}</td>
                <td width="5%" >
                <if condition="$vo['type'] eq '1'">
                	<span class="famin">发明</span>
                <elseif condition="$vo['type'] eq '2'"/>
                	<span class="waiguan">外观</span>
                <elseif condition="$vo['type'] eq '3'"/>
                	<span class="shiyou">实用</span>
                </if>
                </td>
                <td width="12%">{$vo['patentnum']}</td>
                <td width="20%">{$vo['cname']|htmlspecialchars_decode|msubstr=0,15}</td>
                <td width="10%">{$vo['applydate']|date="Y-m-d",###}</td>
				<td width="10%">{$vo[should]|date="Y-m-d",###}</td>
                <td width="10%" class="fycolors">{$vo['pay_total']}
				<div class="others">
				<p>年费：{$vo['pay_total']}</p>
				<p>滞纳金：{$vo['latefee']}</p>
				<p>官费减缓：
				 <if condition="$vo['slow'] eq '1'">
					<!-- {$vo[datepay][cutfee]} -->85%个人减缓
				 <elseif condition="$vo['slow'] eq '2'"/>
				 	<!-- {$vo[datepay][cutfee]} -->70%企业减缓
				 <elseif condition="$vo['slow'] eq '3'"/>
				 	<!-- {$vo[datepay][cutfee]} -->不减缓
				 </if>
				</p>
				</div>
				</td>
				<td width="8%">
				<if condition="$vo['annual_state'] elt 3">
					未缴费
				<elseif condition="$vo['annual_state'] eq 4"/>
					已缴费
				</if>
				</td>
                <td width="15%">
                	<a href="javascript:;" title="修改" onClick="posts2('{$vo[id]}','posts2{$vo[id]}');" class="tabaction tabactiont posts2" rel="{$i}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                	<!-- <a href="javascript:;" class="tabaction tabactiont" onClick="add(1);"><span class="glyphicon glyphicon-link" aria-hidden="true"></span></a> -->
                	<a href="javascript:;" title="删除" onClick="del('{$vo['id']}',this);" class="tabaction tabactiont"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
              </tr>
            </volist> 
			  <tr>
                <td colspan="10">
					<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件专利</div>
					<div class="seltot">
						<a href="javascript:;" class="btn btn-default paadd paadds">结算</a>  
						<a href="javascript:;" class="btn btn-default adddel">删除</a>
					</div>
				</td>
             </tr>
            </tbody>
          </table>
          {$data['page']}
        </div>
<!--查询结果-->
</div>
<!--年费监控弹框-->
<volist name="data['costlist']" id="vo">
      <div id="zzjs_net{$vo['id']}" class="zzjs_net"></div>
      <div id="gg{$vo['id']}" class="patupianss">
        <div class="quxiaoss quxiaoss{$vo['id']}"><a href="javascript:void(0)" ><img src="/static/style/images/quxiaosstt.jpg"/></a></div>
        <p>年费监控</p>
        <form class="form-horizontal" id="paforms{$vo['id']}">
          <div class="col-xs-12 detailtable dashborder">
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">应缴年度:&nbsp; </div>
              <div class="col-xs-3 hjuli">
                <select class="form-control niandu{$vo['id']}" onChange="yjnd('{$vo[id]}','{$vo[patentnum]}',this)" name="zlflsts1{$vo['id']}">
                	<volist name="vo['annualyear']" id="v" key='k'>
                  		<option <if condition="$vo['annual'] eq $k">selected="selected"</if>  value="{$k}">{$v}</option>
                  	</volist>
                </select>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">减缓比列:&nbsp; </div>
              <div class="col-xs-3 hjuli">
                <select class="form-control jianhuan{$vo['id']}" name="zlflsts2{$vo['id']}">
                	<volist name="vo['isslow']" id="v" key='k'>
                  		<option  <if condition="$vo['slow'] eq $k">selected="selected"</if> value="{$k}">{$v}</option>
                  	</volist>
                </select>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">滞纳时间:&nbsp; </div>
              <div class="col-xs-2 hjuli">
              	<select class="form-control zhina{$vo['id']}" name="zlflsts3{$vo['id']}">
                <volist name="vo['latetime']" id="v" key='k'>
                  <option  <if condition="$vo['latetime'] eq $k">selected="selected"</if> value="{$k}">{$v}</option>
                </volist>
                </select>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">处理状态:&nbsp; </div>
              <div class="col-xs-8 hjuli chuli{$vo['id']}">
              	<input  name="zlflsts4{$vo['id']}" <eq name="vo['process_state']" value="1">checked="checked"</eq> type="radio" value="1" />未处理
              	<input  name="zlflsts4{$vo['id']}" <eq name="vo['process_state']" value="2">checked="checked"</eq> type="radio" value="2" />已处理
             	<br><span style="color:red;">如果您确认"已处理"，系统将自动为您计算下一年的年费。</span>
              </div>
            </div>
            <input type="hidden" name="zlflsts5{$vo['id']}" class="form-control shouldtime{$vo['id']}" value="{$vo['should']|date='Y-m-d',###}"/>
          </div>
        </form>
        <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0);" onclick="qdan('{$vo[id]}','{$vo[pmid]}','{$vo[patentnum]}',this);" class="btn btn-primary clocks clocks{$vo['id']}">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao{$vo['id']}">取消</a></div>
      </div>
</volist>
      <!--年费监控弹框-->
<include file='Public:footer'/>
</div>
</div>
<!--右侧内容-->
</div>
<script type='text/javascript'>
/* 一键缴费 */
$('.yjjf').click(function(){
	$.post("{:U('CostHouse/onekeyCost')}",function(data){
		if(data){
			window.location.href = "{:U('/Member/Buyer/tmpa_chkout')}"+'/type/'+'2'+'/ids/'+data;
		}else{
			$.MsgBoxgj.Alert("温馨提示：",'缴费失败！');
		}	
	});
});
/* 批量缴费 */
$('.paadds').click(function(){
	var num = $("input[name*='gwct']:checked").length;
	$.MsgBoxgj.Confirm("温馨提示","您确定要批量缴费选中的"+num+"件专利？",function (){
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
		if(rows){
			window.location.href = "{:U('/Member/Buyer/tmpa_chkout')}"+'/type/'+'2'+'/ids/'+rows;
		}else{
			$.MsgBoxgj.Alert("温馨提示：",'请选中专利！');
		}	
	});		
});
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
		$.post("{:U('CostHouse/batchDel')}",send_data,function(data,status){
			if (data){
				window.location.reload();
			}
		})
	});		
})

/* 一键删除 yjsc */
$('.yjsc').click(function(){
	$.MsgBoxgj.Confirm("温馨提示","您确定要删除所有的专利？",function (){
		$.post("{:U('MyPatent/allDel')}",function(data){
			$.MsgBoxgj.Alert("温馨提示：",data);
			setTimeout("window.location.reload()",2000);
		});
	});
});

/*年费监控 确定按钮功能*/
function qdan(id,pid,pnm,obj){
	var gid = '{$Think.get.id}';
	var parameter = {};
	parameter['pid'] = pid;
	parameter['pnm'] = pnm;
	parameter['zlflsts1'] = $('.niandu'+id).val();//应缴年度
	parameter['zlflsts2'] = $('.jianhuan'+id).val();//减缓比列
	parameter['zlflsts3'] = $('.zhina'+id).val();//滞纳时间
	parameter['zlflsts4'] = $('input[name="zlflsts4'+id+'"]:checked').val();//处理状态
	parameter['zlflsts5'] = $('.shouldtime'+id).val();//应缴日期
	$.post("{:U('CostHouse/editCost')}",parameter,function(data){
		if(data){
			window.location.reload();
		}	
	});
}

/*年费监控 应缴年度下拉功能 */
function yjnd(id,pn,obj){
	var num = $(".niandu"+id+" option:selected").val();
	var parameter = {'pn':pn,'num':num};
	$.post("{:U('CostHouse/nianDu')}",parameter,function(data){
		if(data){
			$('.shouldtime'+id).attr('value',data);
		}else{
			$.MsgBoxgj.Alert('温馨提示','操作失败！');	
		}
	});
}
/* action="{:U('CostHouse/editCost')}"  */
/*单个删除*/
function del(id,obj){
	var send_data={'id':id};
	$.post("{:U('CostHouse/delCost')}",send_data,function(data){
		if(data){
			$.MsgBoxgj.Alert("温馨提示：",data);
			//$(obj).parent().parent().next().remove();
			$(obj).parent().parent().remove();
		}
	})		
}
/*单个删除*/

$('.fycolors').hover(function(){
$(this).find('.others').css('display','block');
},function(){
$(this).find('.others').css('display','none');
}
)
/*开启或关闭年费监控弹框*/
function posts2(id,classname){
	$('#gg'+id).css('display','block');
	$('#zzjs_net'+id).css('display','block');
	$(document.body).css("overflow","hidden");
	
	$('.quxiaoss'+id+'  a').click(function(){
		$('#gg'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');
	});
	
	$('.quxiao'+id).click(function(){
		$('#gg'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});

	$('.paquyu1ss .clocks'+id).click(function(){
		$('#gg'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
		//$('#paforms2').submit();
	});
};
/*开启或关闭年费监控弹框*/

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