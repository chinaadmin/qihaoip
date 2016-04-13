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
        <div class="paleft">您当前的位置：<a href="<?php echo U('Trade');?>" title="#">商标管家</a> > <a href="<?php echo U('Trade');?>" title="#">商标概况</a></div>
        <div class="paright"><a href="#" title="#" class="btn btn-default acolor" style="display: none;">下载</a> <a href="<?php echo U('Trade/Trade/showtrade');?>" class="btn btn-default acolor">添加商标</a></div>
      </div>
      <div class="hgrzy">
        <!--专利统计表-->
        <div class="col-xs-12 patjb">
          <div class="col-xs-12 patyhst"> 国内商标概况 </div>
          <div class="col-xs-3 patoatl">
            <p>已添加商标<?php echo $list['gn_mytrade_count']?>件<br/>
              权利人<?php echo count($list['gn_user'])?>个</p>
          </div>
          <div class="col-xs-9 patable">
            <table cellpadding="0" cellspacing="0" class="patobles">
              <tbody>
                <tr>
                  <td>需续展商标<br/>
                    <span><?php echo $list['gn_xz_count']?></span>件</td>
                  <td>续展费<br/>
                    <span><?php echo number_format($list['gn_xz_count']*2000,2)?></span>元</td>
                </tr>
                <tr>
                  <td >费用管理商标<br/>
                    <span><?php echo $list['gn_res_trade']?></span>件</td>
                  <td >费用管理总额<br/>
                    <span><?php echo number_format($list['gn_res_trade_fee'],2)?></span>元</td>
                </tr>
                <tr>
                  <td >加入交易库商标<br/>
                    <span><?php echo $list['gn_jy_trade']?></span>件</td>
                  <td >交易商标总额<br/>
                    <span><?php echo number_format($list['gn_jy_trade_price'],2)?></span>元</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!--专利统计表-->
        <!--图表-->
        <div class="col-xs-12 pafloor1">
          <div class="col-xs-12 payztustt">
            <div class="col-xs-12 patits"><span>法律状态状态统计</span>
              <div class="gsmc"><?php echo $list['gn_trade_user'];?><a href="javascript:void(0);"  class="btn btn-default posts">更换权利人</a></div>
            </div>
            <div class="col-xs-12 paborders">
              <div class="col-xs-4">
                <table cellpadding="0" cellspacing="0" class="patoblest">
                  <tbody>
                    <tr>
                      <td>商标总量</td>
                      <td><span><?php echo $list['gn_user_trade_count']?></span>件</td>
                    </tr>
                    <tr>
                      <td>已注册</td>
                      <td><span><?php echo $list['gn_w_yzc']?></span>件</td>
                    </tr>
                    <tr>
                      <td>申请中</td>
                      <td><span><?php echo $list['gn_w_sqz']?></span>件</td>
                    </tr>
                    <tr>
                      <td>驳回</td>
                      <td><span><?php echo $list['gn_w_ybh']?></span>件</td>
                    </tr>
                    <tr>
                      <td>已无效</td>
                      <td><span><?php echo $list['gn_w_ywx']?></span>件</td>
                    </tr>
                    <tr>
                      <td>其他</td>
                      <td><span><?php echo $list['gn_w_qt']?></span>件</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-xs-8">
                <div id="mains3" class="payztust"> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 pafloor1">
          <div class="col-xs-12 payztustt">
            <div class="col-xs-12 patits"><span>近五年申请概况统计</span>
              <div class="gsmc"><?php echo $list['gn_trade_user'];?><a href="javascript:void(0);" class="btn btn-default posts">更换权利人</a></div>
            </div>
            <div class="col-xs-12 paborders">
              <div class="col-xs-4">
                <table cellpadding="0" cellspacing="0" class="patoblest">
                  <tbody>
                  <?php foreach ($list['gn'] as $k=>$v){?>
                    <tr>
                      <td><?php echo $k;?></td>
                      <td><span><?php echo $v;?></span>件</td>
                    </tr>
                   <?php }?>
                      <td>最早申请时间<br>
                        <span><?php echo $list['gn_min_trade']?date('Y-m-d',$list['gn_min_trade']):''?></span></td>
                      <td>最近申请时间<br>
                        <span><?php echo $list['gn_max_trade']?date('Y-m-d',$list['gn_max_trade']):''?></span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-xs-8">
                <div id="mains4" class="payztust"> </div>
              </div>
            </div>
          </div>
        </div>
        <!--图表-->
        
        
        <?php if($list['gj_mytrade_count']):?>
         <!--专利统计表
        <div class="col-xs-12 patjb">
          <div class="col-xs-12 patyhst"> 国际商标概况 </div>
          <div class="col-xs-3 patoatl">
            <p>已添加商标<?php echo $list['gj_mytrade_count']?>件<br/>
              权利人<?php echo count($list['gj_user'])?>个</p>
          </div>
          <div class="col-xs-9 patable">
            <table cellpadding="0" cellspacing="0" class="patobles">
              <tbody>
                <tr>
                  <td>需续展商标<br/>
                    <span><?php echo $list['gj_xz_count']?></span>件</td>
                  <td>续展费<br/>
                    <span><?php echo number_format($list['gj_xz_count']*2000,2)?></span>元</td>
                </tr>
                <tr>
                  <td >费用管理商标<br/>
                    <span><?php echo $list['gj_res_trade']?></span>件</td>
                  <td >费用管理总额<br/>
                    <span><?php echo number_format($list['gj_res_trade_fee'],2)?></span>元</td>
                </tr>
                <tr>
                  <td >加入交易库商标<br/>
                    <span><?php echo $list['gj_jy_trade']?></span>件</td>
                  <td >交易商标总额<br/>
                    <span><?php echo number_format($list['gj_jy_trade_price'],2)?></span>元</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!--专利统计表
        <!--图表
        <div class="col-xs-12 pafloor1">
          <div class="col-xs-12 payztustt">
            <div class="col-xs-12 patits"><span>法律状态状态统计</span>
              <div class="gsmc"><?php echo $list['gj_trade_user'];?><a href="javascript:void(0);"  class="btn btn-default posts1">更换权利人</a></div>
            </div>
            <div class="col-xs-12 paborders">
              <div class="col-xs-4">
                <table cellpadding="0" cellspacing="0" class="patoblest">
                  <tbody>
                    <tr>
                      <td>商标总量</td>
                      <td><span><?php echo $list['gj_user_trade_count']?></span>件</td>
                    </tr>
                    <tr>
                      <td>已注册</td>
                      <td><span><?php echo $list['gj_w_yzc']?></span>件</td>
                    </tr>
                    <tr>
                      <td>申请中</td>
                      <td><span><?php echo $list['gj_w_sqz']?></span>件</td>
                    </tr>
                    <tr>
                      <td>驳回</td>
                      <td><span><?php echo $list['gj_w_ybh']?></span>件</td>
                    </tr>
                    <tr>
                      <td>已无效</td>
                      <td><span><?php echo $list['gj_w_ywx']?></span>件</td>
                    </tr>
                    <tr>
                      <td>其他</td>
                      <td><span><?php echo $list['gj_w_qt']?></span>件</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-xs-8">
                <div id="mains5" class="payztust"> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 pafloor1">
          <div class="col-xs-12 payztustt">
            <div class="col-xs-12 patits"><span>近五年申请概况统计</span>
              <div class="gsmc"><?php echo $list['gj_trade_user'];?><a href="javascript:void(0);" class="btn btn-default posts1">更换权利人</a></div>
            </div>
            <div class="col-xs-12 paborders">
              <div class="col-xs-4">
                <table cellpadding="0" cellspacing="0" class="patoblest">
                  <tbody>
                  <?php foreach ($list['gj'] as $k=>$v){?>
                    <tr>
                      <td><?php echo $k;?></td>
                      <td><span><?php echo $v;?></span>件</td>
                    </tr>
                   <?php }?>
                      <td>最早申请时间<br>
                        <span><?php echo $list['gj__min_trade']?date('Y-m-d',$list['gj__min_trade']):''?></span></td>
                      <td>最近申请时间<br>
                        <span><?php echo $list['gj__max_trade']?date('Y-m-d',$list['gj__max_trade']):''?></span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-xs-8">
                <div id="mains6" class="payztust"> </div>
              </div>
            </div>
          </div>
        </div>
        <!--图表-->
        
        
        
        <script type="text/javascript">

       /** function DrawCharts(ec) {
        	DrawbarEChart5(ec);
        	DrawbarEChart6(ec);
        	window.onresize = function () {
        	DrawbarEChart5(ec);
        	DrawbarEChart6(ec);
        	}
        	}
        function DrawbarEChart5(ec) {
            var myCharts5 = ec.init(document.getElementById('mains5')); 
        				
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
                },
        	width:20
            }
        };
        option = {
            
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
        	    show:false,
                x: 'center',
               
        		data:['商标状态']
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
                y: 30,
                y2: 40,
                x2: 40
            },
            xAxis: [
                {
                    type: 'category',
                    data: ['已注册','申请中','续展','驳回','无效','其他']
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: '商标状态',
                    type: 'bar',
                    itemStyle: itemStyle,
                    data: [<?php echo $list['gj_w_yzc']?>,<?php echo $list['gj_w_sqz']?>,<?php echo $list ['gj_xz_count']?>,<?php echo $list['gj_w_ybh']?>,<?php echo $list['gj_w_ywx']?>,<?php echo $list['gj_w_qt']?>]
                }
                
            ]
        };
                            
        myCharts5.resize();
        myCharts5.setOption(option,true);
        }

        function DrawbarEChart6(ec) {
            var myCharts6 = ec.init(document.getElementById('mains6')); 
        				
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
                },
        	width:20
            }
        };
        option = {
            
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
            
            calculable: true,
            grid: {
                y: 30,
                y2: 40,
                x2: 40
            },
            xAxis: [
                {
                    type: 'category',
                    
        			data: [ <?php foreach($list['gj'] as $k=>$v){ echo $k.','; }?>]
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: '申请概况',
                    type: 'bar',
                    itemStyle: itemStyle,
                    
        			data: [<?php foreach($list['gj'] as $k=>$v){ echo $v.','; }?>]
                }
                
            ]
        };        
        myCharts6.resize();
        myCharts6.setOption(option,true);
        }**/
        </script>
        
    <?php else:?>  
     <!--     <div class="col-xs-12 patyhstt"> 国际商标概况 </div>
        <div class="col-xs-12">
          <div class="paswsbs"> <img src="/qihaov2/images/swsbtt.jpg"/>
            <div class="paconts">
              <p>您暂无国际商标</p>
              <a href="<?php echo U('Trade/GjTrade/index')?>" class="btn btn-default">添加国际商标</a>
              <p>如需办理国际商标，请拨打7号网全国统一免费服务热线：<span>400-889-7080</span></p>
            </div>
          </div>
        </div>-->
	<?php endif;?>   
      </div>
      <!--上传图片弹框-->
      <div id="zzjs_net" class="zzjs_net"></div>
      <div id="gg" class="patupian">
        <div class="quxiaoss qx"><a href="javascript:void(0)" ><img src="/qihaov2/images/quxiaosstt.jpg"/></a></div>
        <p>更换权利人</p>
        <ul>
        <?php foreach ($list['gn_user'] as $key=>$val){?>
          <li><a href="<?php echo U('Trade/Index/index',array('trade_user'=>urlencode($val['trade_user'])))?>"  <?php echo $list['trade_user']==$val['trade_user']?'class="paaddbors"':'' ?> rel="all"><?php echo $val['trade_user']?></a></li>
         <?php }?>
        </ul>
      </div>
      <!--上传图片弹框-->
      <!--上传图片弹框-->
      <div id="zzjs_net1" class="zzjs_net"></div>
      <div id="gg1" class="patupian">
        <div class="quxiaoss qx1"><a href="javascript:void(0)" ><img src="/qihaov2/images/quxiaosstt.jpg"/></a></div>
        <p>更换权利人</p>
        <ul>
        <?php foreach ($list['gj_user'] as $key=>$val){?>
          <li><a href="<?php echo U('Trade/Index/index',array('trade_user'=>urlencode($val['trade_user'])))?>"  <?php echo $list['trade_user']==$val['trade_user']?'class="paaddbors"':'' ?> rel="all"><?php echo $val['trade_user']?></a></li>
         <?php }?>
        </ul>
      </div>
      <!--上传图片弹框-->
      <include file="Public/foot" />
    </div>
  </div>
  <!--右侧内容-->
</div>
<!--主体-->

<script type='text/javascript'>
/*权利人切换*/
$('.patupian li').click(function(){
$('.patupian li a').removeClass('paaddbors');
$(this).find("a").addClass('paaddbors');
var id=$(this).find("a").attr('rel');
$('#paqlren').val(id);
})
/*权利人切换*/
/*开启或关闭上传图片弹框*/
function clocks(){
$('#gg').css('display','none');
$('#zzjs_net').css('display','none');
$(document.body).css("overflow","visible");	
}
function clocks1(){
$('#gg1').css('display','none');
$('#zzjs_net1').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.qx a').click(function(){
clocks();
})
$('.qx1 a').click(function(){
clocks1();
})
$('.paquyu1 .clocks').click(function(){
clocks();
$('#paforms').submit();
})
//var xiabiao='';
$(".posts").click(function(){
//xiabiao=$(this).attr('name');
$('#gg').css('display','block');
$('#zzjs_net').css('display','block');
$(document.body).css('overflow','hidden');
})

$(".posts1").click(function(){
//xiabiao=$(this).attr('name');
$('#gg1').css('display','block');
$('#zzjs_net1').css('display','block');
$(document.body).css('overflow','hidden');
})
/*开启或关闭上传图片弹框*/

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
'echarts/chart/bar'
            ],
            ///将画多个图表的进行函数封装
           DrawCharts
);
function DrawCharts(ec) {
DrawbarEChart3(ec);
DrawbarEChart4(ec);
window.onresize = function () {
DrawbarEChart3(ec);
DrawbarEChart4(ec);
}
}

                // 基于准备好的dom，初始化echarts图表

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
        },
	width:20
    }
};
option = {
    
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
	    show:false,
        x: 'center',
       
		data:['商标状态']
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
        y: 30,
        y2: 40,
        x2: 40
    },
    xAxis: [
        {
            type: 'category',
            data: ['已注册','申请中','续展','驳回','无效','其他']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '商标状态',
            type: 'bar',
            itemStyle: itemStyle,
            data: [<?php echo $list['gn_w_yzc']?>,<?php echo $list['gn_w_sqz']?>,<?php echo $list ['gn_xz_count']?>,<?php echo $list['gn_w_ybh']?>,<?php echo $list['gn_w_ywx']?>,<?php echo $list['gn_w_qt']?>]
        }
        
    ]
};
                    
myCharts3.resize();
myCharts3.setOption(option,true);
}

function DrawbarEChart4(ec) {
    var myCharts4 = ec.init(document.getElementById('mains4')); 
				
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
        },
	width:20
    }
};
option = {
    
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
    
    calculable: true,
    grid: {
        y: 30,
        y2: 40,
        x2: 40
    },
    xAxis: [
        {
            type: 'category',
            
			data: [ <?php foreach($list['gn'] as $k=>$v){ echo $k.','; }?>]
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '申请概况',
            type: 'bar',
            itemStyle: itemStyle,
            
			data: [<?php foreach($list['gn'] as $k=>$v){ echo $v.','; }?>]
        }
        
    ]
};
                    
myCharts4.resize();
myCharts4.setOption(option,true);
}
/*图表引入*/




/*图表引入*/

$(document).ready(function(){

});
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
