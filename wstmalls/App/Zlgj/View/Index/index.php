<include file='Public:header'/>
<!--右侧内容-->
<div class="hconright">
<div class="hconrightcon">
<div class="hytit">
<div class="paleft">您当前的位置：<a href="{:U('Index/index')}">专利管家</a> > <a href="{:U('Index/index')}">专利概况</a></div><div class="paright"><a href="{:U('Index/expUser')}" class="btn btn-default acolor">导出</a>  <a href="{:U('MyPatent/addpatent')}" class="btn btn-default acolor">添加专利</a></div>
</div>
<notempty name="data['count']">
<div class="hgrzy">
<!--专利统计表-->
<div class="col-xs-12 patjb">
<div class="col-xs-3 patoatl">
<p>已添加专利{$data['count']|default=0}件<br/>权利人{$data['zlqrnum']|default=0}个</p>
</div>
<div class="col-xs-9 patable">
<table cellpadding="0" cellspacing="0" class="patobles">
<tbody>
<tr>
<td>预计今年年费<br/><span>{$data['annualfee']|default=0}</span>元</td><td>急需缴费专利<br/><span>{$data['needexpend']|default=0}</span>件</td><td>已滞纳专利<br/><span>{$data['overdue']|default=0}</span>件</td><td>滞纳专利应缴总额<br/><span>{$data['overdueamount']|default=0}</span>元</td>
</tr>
<tr>
<td colspan="2">费用管理专利<br/><span>{$data['costcount']|default=0}</span>件</td><td colspan="2">费用管理总额<br/><span>{$data['costprice']|default=0}</span>元</td>
</tr>
<tr>
<td colspan="2">加入交易库专利<br/><span>{$tradecount|default=0}</span>件</td><td colspan="2">已交易专利<br/><span>0</span>件</td>
</tr>
</tbody>
</table>
</div>
</div>
<!--专利统计表-->
<!--图表-->
<div class="col-xs-12 pafloor1">
<div class="col-xs-6 payztu">
<div class="col-xs-12 patits">专利类型统计<!--<p><span class="glyphicon glyphicon-th" aria-hidden="true"></span><a href="#" title="#">表格</a></p>--></div>
<div class="col-xs-12 paborder">
<div id="main" class="payztus">

</div>
</div>
</div>
<div class="col-xs-6 pazxtu">
<div class="col-xs-12 pazxtus">
<div class="col-xs-12 patits">有效-授权专利统计<!--<p><span class="glyphicon glyphicon-th" aria-hidden="true"></span><a href="#" title="#">表格</a></p>--></div>
<div class="col-xs-12 paborder">
<div id="mains" class="payztus">
</div>
</div>
</div>
</div>
</div>
<div class="col-xs-12 pafloor1">
<div class="col-xs-6 payztu">
<div class="col-xs-12 patits">逐年申请量统计<!--<p><span class="glyphicon glyphicon-th" aria-hidden="true"></span><a href="#" title="#">表格</a></p>--></div>
<div class="col-xs-12 paborder">
<div id="mains1" class="payztus">

</div>
</div>
</div>
<div class="col-xs-6 pazxtu">
<div class="col-xs-12 pazxtus">
<div class="col-xs-12 patits">逐年授权量统计<!--<p><span class="glyphicon glyphicon-th" aria-hidden="true"></span><a href="#" title="#">表格</a></p>--></div>
<div class="col-xs-12 paborder">
<div id="mains2" class="payztus">

</div>
</div>
</div>
</div>
</div>
<div class="col-xs-12 pafloor1">
<div class="col-xs-12 payztu">
<div class="col-xs-12 patits">法律状态-专利类型统计<!--<p><span class="glyphicon glyphicon-th" aria-hidden="true"></span><a href="#" title="#">表格</a></p>--></div>
<div class="col-xs-12 paborder">
<div id="mains3" class="payztus">

</div>
</div>
</div>
</div>
<!--图表-->
</div>
<else/>
<div class="add_zl paform" style="padding:120px 0 0 0;">
<p>您还没有添加任何数据哦，赶快去添加吧!<a href="{:U('MyPatent/addpatent')}" class="btn btn-primary">去添加</a></p>
</div>
</notempty>
<include file='Public:footer'/>
</div>
</div>
<!--右侧内容-->
<!--主体-->
<script type='text/javascript'>
/*图表引入*/
        // 路径配置
        require.config({
            paths: {
                echarts: '/qihaov2/dist'
            }
        });
		// 使用
        require(
            [
				'echarts',
				'echarts/chart/line', // 使用柱状图就加载bar模块，按需加载
				'echarts/chart/pie',
				'echarts/chart/bar'
            ],
            ///将画多个图表的进行函数封装
           DrawCharts
);
function DrawCharts(ec) {
DrawlineEChart(ec);
DrawpieEChart(ec);
DrawlineEChart1(ec);
DrawlineEChart2(ec);
DrawbarEChart3(ec);
window.onresize = function () {
DrawlineEChart(ec);
DrawpieEChart(ec);
DrawlineEChart1(ec);
DrawlineEChart2(ec);
DrawbarEChart3(ec);
}
}

                // 基于准备好的dom，初始化echarts图表
function DrawpieEChart(ec) {
                var myChart = ec.init(document.getElementById('main')); 
				
				option = {
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient : 'vertical',
        x : 'left',
        data:['发明','实用新型','外观设计']
    },
    toolbox: {
        show : false,
        feature : {
            //mark : {show: true},
            dataView : {show: true, readOnly: true}
          
        }
    },
    calculable : true,
    series : [
        {
            name:'访问来源',
            type:'pie',
            radius : ['50%', '70%'],
            itemStyle : {
                normal : {
                    label : {
                        show : false
                    },
                    labelLine : {
                        show : false
                    }
                },
                emphasis : {
                    label : {
                        show : true,
                        position : 'center',
                        textStyle : {
                            fontSize : '30',
                            fontWeight : 'bold'
                        }
                    }
                }
            },
            data:[
                {value:{$data['invention']|default=0}, name:'发明',
				 itemStyle : {
                        normal : {                                                                 
                            color : "#FF7F50",
							}
				}
				},
                {value:{$data['practical']|default=0}, name:'实用新型',
				 itemStyle : {
                        normal : {                                                                 
                            color : "#87CEFA",
							}
				}
				},
                {value:{$data['appearance']|default=0}, name:'外观设计',
				 itemStyle : {
                        normal : {                                                                 
                            color : "#DA70D6",
							}
				}
				}
            ]
        }
    ]
};                  
myChart.resize();
myChart.setOption(option,true); 
}


function DrawlineEChart(ec) {
    var myCharts = ec.init(document.getElementById('mains')); 
				
				/*拆线图*/
				option = {
    title : {
	    show:false,
        text: '未来一周气温变化',
        subtext: '纯属虚构'
		
    },
    tooltip : {
        trigger: 'axis',
		//backgroundColor:'rgba(239,118,0,0.7)',
		//showDelay:20
    },
    legend: {
        data:['有效','授权']
    },
    toolbox: {
        show : false,
        feature : {
            //mark : {show: true},
            dataView : {show: true, readOnly: true}
            //magicType : {show: true, type: ['line', 'bar']},
            //restore : {show: true},
            //saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : [
	                   <?php 
	                   	foreach ($data['countyear'] as $key => $value){
	                   		echo $value['applyyear'].',';
	                   	}
					   ?>
               	    ]
        }
    ],
    yAxis : [
        {
            type : 'value',
            axisLabel : {
                formatter: '{value} '
            }
        }
    ],
    series : [
        {
            name:'有效',
            type:'line',
			//color:'#F72C03',
			/*
			itemStyle:{
			normal:{
			lineStyle:{
			color:'#F72C03',
			width:5
			}
			}
			},*/
            data:[
					  <?php 
				       	foreach ($data['countyear'] as $key => $value){
				       		echo $value['yxdatanum']?$value['yxdatanum'].',':'0'.',';
				       	}
					  ?>
                 ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        },
        {
            name:'授权',
            type:'line',
            data:[
					  <?php 
				       	foreach ($data['countyear'] as $key => $value){
				       		echo $value['authdatanum']?$value['authdatanum'].',':'0'.',';
				       	}
					  ?>
                 ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name : '平均值'}
                ]
            }
        },
		
    ]
};
myCharts.resize();
myCharts.setOption(option,true);
}

function DrawlineEChart1(ec) {
    var myCharts1 = ec.init(document.getElementById('mains1')); 
				
				/*拆线图*/
				option = {
    title : {
	    show:false,
        text: '未来一周气温变化',
        subtext: '纯属虚构'
		
    },
    tooltip : {
        trigger: 'axis',
		//backgroundColor:'rgba(239,118,0,0.7)',
		//showDelay:20
    },
    legend: {
        data:['发明','实用新型','外观设计']
    },
    toolbox: {
        show : false,
        feature : {
            //mark : {show: true},
            dataView : {show: true, readOnly: true}
            //magicType : {show: true, type: ['line', 'bar']},
            //restore : {show: true},
            //saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : [
					<?php 
				       	foreach ($data['yearnum'] as $key => $value){
				       		echo $value['applyyear'].',';
				       	}
					 ?>	
                   ]
        }
    ],
    yAxis : [
        {
            type : 'value',
            axisLabel : {
                formatter: '{value} '
            }
        }
    ],
    series : [
        {
            name:'发明',
            type:'line',
			//color:'#F72C03',
			/*
			itemStyle:{
			normal:{
			lineStyle:{
			color:'#F72C03',
			width:5
			}
			}
			},*/
            data:[
					<?php 
				       	foreach ($data['yearnum'] as $key => $value){
				       		echo $value['type1']?$value['type1'].',':'0'.',';
				       	}
					?>
                 ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        },
        {
            name:'实用新型',
            type:'line',
            data:[
					<?php 
				       	foreach ($data['yearnum'] as $key => $value){
				       		echo $value['type3']?$value['type3'].',':'0'.',';
				       	}
					?>
                 ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name : '平均值'}
                ]
            }
        },
		{
            name:'外观设计',
            type:'line',
			//color:'#F72C03',
            data:[
					<?php 
				       	foreach ($data['yearnum'] as $key => $value){
				       		echo $value['type2']?$value['type2'].',':'0'.',';
				       	}
					?>
                 ],
            markPoint : {
			
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
			
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        },
    ]
};
myCharts1.resize();
myCharts1.setOption(option,true);
}

function DrawlineEChart2(ec) {
    var myCharts2 = ec.init(document.getElementById('mains2')); 
				
				/*拆线图*/
				option = {
    title : {
	    show:false,
        text: '未来一周气温变化',
        subtext: '纯属虚构'
		
    },
    tooltip : {
        trigger: 'axis',
		//backgroundColor:'rgba(239,118,0,0.7)',
		//showDelay:20
    },
    legend: {
         data:['发明','实用新型','外观设计']
    },
    toolbox: {
        show : false,
        feature : {
            //mark : {show: true},
            dataView : {show: true, readOnly: true}
            //magicType : {show: true, type: ['line', 'bar']},
            //restore : {show: true},
            //saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : [
						<?php 
					       	foreach ($data['authnum'] as $key => $value){
					       		echo $value['applyyear'].',';
					       	}
						?>
                   ]
        }
    ],
    yAxis : [
        {
            type : 'value',
            axisLabel : {
                formatter: '{value} '
            }
        }
    ],
    series : [
        {
            name:'发明',
            type:'line',
			//color:'#F72C03',
			/*
			itemStyle:{
			normal:{
			lineStyle:{
			color:'#F72C03',
			width:5
			}
			}
			},*/
            data:[
					<?php 
				       	foreach ($data['authnum'] as $key => $value){
				       		echo $value['type1']?$value['type1'].',':'0'.',';
				       	}
					?>
                 ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        },
        {
            name:'实用新型',
            type:'line',
            data:[
					<?php 
				       	foreach ($data['authnum'] as $key => $value){
				       		echo $value['type3']?$value['type3'].',':'0'.',';
				       	}
					?>
                 ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name : '平均值'}
                ]
            }
        },
		{
            name:'外观设计',
            type:'line',
			//color:'#F72C03',
			/*
			itemStyle:{
			normal:{
			lineStyle:{
			color:'#F72C03',
			width:5
			}
			}
			},*/
            data:[
					<?php 
				       	foreach ($data['authnum'] as $key => $value){
				       		echo $value['type2']?$value['type2'].',':'0'.',';
				       	}
					?>
                 ],
            markPoint : {
                data : [
                    {type : 'max', name: '最大值'},
                    {type : 'min', name: '最小值'}
                ]
            },
            markLine : {
                data : [
                    {type : 'average', name: '平均值'}
                ]
            }
        },
		
    ]
};
myCharts2.resize();
myCharts2.setOption(option,true);
}

function DrawbarEChart3(ec) {
    var myCharts3 = ec.init(document.getElementById('mains3')); 
				
				var zrColor = require('zrender/tool/color');
var colorList = [
  '#ff7f50','#87cefa','#da70d6','#32cd32','#6495ed',
  '#ff69b4','#ba55d3','#cd5c5c','#ffa500','#40e0d0'
];
var itemStyle = {
    normal: {
        color: function(params) {
          if (params.dataIndex < 0) {
            // for legend
            return zrColor.lift(
              colorList[colorList.length - 1], params.seriesIndex * 0.1
            );
          }
          else {
            // for bar
            return zrColor.lift(
              colorList[params.dataIndex], params.seriesIndex * 0.1
            );
          }
        }
    }
};
option = {
    title: {
	    show:false,
        text: '2010-2013年中国城镇居民家庭人均消费构成（元）',
        subtext: '数据来自国家统计局',
        sublink: 'http://data.stats.gov.cn/search/keywordlist2?keyword=%E5%9F%8E%E9%95%87%E5%B1%85%E6%B0%91%E6%B6%88%E8%B4%B9'
    },
    tooltip: {
        trigger: 'axis',
        backgroundColor: 'rgba(255,255,255,0.7)',
        axisPointer: {
            type: 'shadow'
        },
        formatter: function(params) {
            // for text color
            var color = colorList[params[0].dataIndex];
            var res = '<div style="color:' + color + '">';
            res += '<strong>' + params[0].name + '</strong>'
            for (var i = 0, l = params.length; i < l; i++) {
                res += '<br/>' + params[i].seriesName + ' : ' + params[i].value 
            }
            res += '</div>';
            return res;
        }
    },
    legend: {
        x: 'center',
        data:['发明','实用新型','外观设计']
    },
    toolbox: {
        show: false,
        orient: 'vertical',
        y: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    grid: {
        y: 80,
        y2: 40,
        x2: 40
    },
    xAxis: [
        {
            type: 'category',
            data: [
					<?php 
				       	foreach ($data['legalstatus'] as $key => $value){
				       		echo "'".$value['legalstatus']."'".',';
				       	}
					?>
                 ]
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '发明',
            type: 'bar',
            itemStyle: itemStyle,
            data: [
					<?php 
				       	foreach ($data['legalstatus'] as $key => $value){
							echo $value['type1']?$value['type1'].',':'0'.',';
				       	}
					?>
                  ]
        },
        {
            name: '实用新型',
            type: 'bar',
            itemStyle: itemStyle,
            data: [
		            <?php 
					   foreach ($data['legalstatus'] as $key => $value){
							echo $value['type3']?$value['type3'].',':'0'.',';
					   }
					?>		  
				 ]
        },
        {
            name: '外观设计',
            type: 'bar',
            itemStyle: itemStyle,
            data: [
					<?php 
					   foreach ($data['legalstatus'] as $key => $value){
							echo $value['type2']?$value['type2'].',':'0'.',';
			 	  	   }
					?>	
                  ]
        },
        
    ]
};
                    
myCharts3.resize();
myCharts3.setOption(option,true);
}
/*图表引入*/

/*导航切换*/
$(".newhnavlist li").hover(function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-4;
tu=tu.substring(0,len);
//alert(tu+'s.png');
$(this).find('img').attr('src',tu+'s.png');
}
},function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-5;
tu=tu.substring(0,len);
//alert(tu+'.png');
$(this).find('img').attr('src',tu+'.png');
}
}
)
/*导航切换*/
$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
});
</script>
</body>
</html>