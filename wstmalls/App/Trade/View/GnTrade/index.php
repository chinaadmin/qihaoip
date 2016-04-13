<include file="Public/header" />
<!--头部-->
<!--主体-->
<div class="hzlcon">
  <!--左侧导航-->
 <include file="Public/left" />
  <!--左侧导航-->
  <!--右侧内容-->
  <div class="hconright">
    <div class="hconrightcon" >
      <div class="hytit hy_tits">
        <div class="paleft">您当前的位置：<a href="<?php echo U('Trade/Index/Index')?>">商标管家</a> > <a href="<?php echo U('Trade/GnTrade/index')?>">国内商标管理</a></div>
        <div class="paright"><a href="<?php echo U('Trade/Trade/showtrade')?>" class="btn btn-default acolor add_tradest">添加商标</a></div>
        <div class="zlyjjyst1">
            <form method="post" action="<?php echo U('Trade/GnTrade/index')?>">
              <div class="formdivs">
                <input type="text" name="paseach"  class="pasearchs"  value="<?php echo $paseach?>" placeholder="注册号、商标名称、权利人等"/>
                <input type="submit" value="检索" class="pasubs"/>
              </div>
            </form>
          </div>
      </div>
      <?php if($list['trade']):?>
      <div class="hgrzy">
        <!--筛选-->
        <div class="col-xs-12 zlsellists sb_borders">
          <form action="" method="post" id="forms">
            <div class="col-xs-12 zlsellist noborder" id="selects">
              <p>您已选择</p>
              <ul>
              <?php $groupid = array(); foreach($list['groupid'] as $key => $value){
							$groupid[$value['id']] = $value['name'];
						}
						?>
						
				<?php foreach ($search as $key=>$value):?>
                <?php if($key=='trade_class_id'):?>
                	<?php foreach ($value as $k=>$v):?>
                	<?php $where = $search;
                			unset($where['trade_class_id'][$k]);
                			if($where['trade_class_id']){
                				$where['trade_class_id'] = implode('-',$where['trade_class_id']);
                			}else{
                				unset($where['trade_class_id']);
                			}
                			$where['trade_dynamic_state'] = implode('-',$where['trade_dynamic_state']);
	                		foreach ($where_c['trade_user'] as $k=>$v){
	                			$where['trade_user'][$k] = urlencode($v);
	                		}
	              			$where['trade_user'] = implode('-',$where['trade_user']);
	              			$where['year'] = implode('-',$where['year']);
                			if($paseach){
                				$where['paseach'] = urlencode($paseach);
                			}
                	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where)?>" title="<?php echo $groupid[$v]?>" id="se0" class="selon"><?php echo $groupid[$v]?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              	<?php endforeach;?>
              	<?php elseif($key=='trade_dynamic_state'):?>
              	<?php foreach ($value as $k=>$v):?>
              	<?php $where = $search;
                			unset($where['trade_dynamic_state'][$k]);
                			if($where['trade_dynamic_state']){
                				$where['trade_dynamic_state'] = implode('-',$where['trade_dynamic_state']);
                			}else{
                				unset($where['trade_dynamic_state']);
                			}
                			$where['trade_class_id'] = implode('-',$where['trade_class_id']);
                			foreach ($where_c['trade_user'] as $k=>$v){
                				$where['trade_user'][$k] = urlencode($v);
                			}
                			$where['trade_user'] = implode('-',$where['trade_user']);
                			$where['year'] = implode('-',$where['year']);
                			if($paseach){
                				$where['paseach'] = urlencode($paseach);
                			}
                	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where)?>" title="<?php echo C('TRADE_STATE')[$v]?>" id="se0" class="selon"><?php echo C('TRADE_STATE')[$v]?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              <?php endforeach;?>
              	<?php elseif($key=='trade_user'):?>
              	<?php foreach ($value as $k=>$v):?>
              	<?php $where = $search;
                			unset($where['trade_user'][$k]);
                			if($where['trade_user']){
                				foreach ($where_c['trade_user'] as $k=>$v){
                					$where['trade_user'][$k] = urlencode($v);
                				}
                				$where['trade_user'] = implode('-',$where['trade_user']);
                			}else{
                				unset($where['trade_user']);
                			}
                			$where['trade_class_id'] = implode('-',$where['trade_class_id']);
                			$where['trade_dynamic_state'] = implode('-',$where['trade_dynamic_state']);
                			$where['year'] = implode('-',$where['year']);
                			if($paseach){
                				$where['paseach'] = urlencode($paseach);
                			}
                	?>
              	 <li><a href="<?php echo U('Trade/GnTrade/index',$where)?>" title="<?php echo $v?>" id="se0" class="selon"><?php echo $v?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              	 <?php endforeach;?>
              	<?php elseif($key=='year'):?>
              	<?php foreach ($value as $k=>$v):?>
              	<?php $where = $search;
                			unset($where['year'][$k]);
                			if($where['year']){
                				$where['year'] = implode('-',$where['year']);
                			}else{
                				unset($where['year']);
                			}
                			$where['trade_class_id'] = implode('-',$where['trade_class_id']);
                			$where['trade_dynamic_state'] = implode('-',$where['trade_dynamic_state']);
                			foreach ($where_c['trade_user'] as $k=>$v){
                				$where['trade_user'][$k] = urlencode($v);
                			}
                			$where['trade_user'] = implode('-',$where['trade_user']);
                			if($paseach){
                				$where['paseach'] = urlencode($paseach);
                			}
                	?>
              	 <li><a href="<?php echo U('Trade/GnTrade/index',$where)?>" title="<?php echo $v?>" id="se0" class="selon"><?php echo $v?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              	 <?php endforeach;?>
              	<?php endif?>
              	<?php endforeach;?>
              </ul>
            </div>
            <div class="col-xs-12 zlsellist zls1 search_wid" id="zlzls1">
              <p>商标类别</p>
              <ul>
              		<?php $where_c = $search;
              		if($where_c['trade_class_id']){
              			unset($where_c['trade_class_id']);
              		}
                		$where_c['trade_dynamic_state'] = implode('-',$where_c['trade_dynamic_state']);
                		foreach ($where_c['trade_user'] as $k=>$v){
                			$where_c['trade_user'][$k] = urlencode($v);
                		}
              			$where_c['trade_user'] = implode('-',$where_c['trade_user']);
              			$where_c['year'] = implode('-',$where_c['year']);
                	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="全部" <?php echo !isset($search['trade_class_id'])?'class="selon"':''?>>全部</a></li>
                <?php foreach ($list['items'] as $key=>$value):?>
                <?php $where_c = $search;
                		if(!in_array($value['id'],$where_c['trade_class_id'])){
                			$where_c['trade_class_id'][] = $value['id'];
                		}
                		$where_c['trade_class_id'] = implode('-',$where_c['trade_class_id']);
                		$where_c['trade_dynamic_state'] = implode('-',$where_c['trade_dynamic_state']);
                		foreach ($where_c['trade_user'] as $k=>$v){
                			$where_c['trade_user'][$k] = urlencode($v);
                		}
              			$where_c['trade_user'] = implode('-',$where_c['trade_user']);
              			$where_c['year'] = implode('-',$where_c['year']);
              			if($paseach){
              				$where_c['paseach'] = urlencode($paseach);
              			}
                	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="<?php echo $value['name']?>" <?php echo in_array($value['id'],$search['trade_class_id'])?'class="selon"':''?>><?php echo $value['name']?></a></li>
                <?php endforeach;?>
              </ul>
			  <p class="ybs"><a href="javascript:void(0)" class="btn btn-default more" rel="1">更多</a></p>
            </div>
			<div class="col-xs-12 zlsellist zls3">
              <p>商标状态</p>
              <ul>
              	<?php $where_c = $search;
              		if($where_c['trade_dynamic_state']){
              			unset($where_c['trade_dynamic_state']);
              		}
	                	$where_c['trade_class_id'] = implode('-',$where_c['trade_class_id']);
              			foreach ($where_c['trade_user'] as $k=>$v){
                			$where_c['trade_user'][$k] = urlencode($v);
                		}
              			$where_c['trade_user'] = implode('-',$where_c['trade_user']);
              			$where_c['year'] = implode('-',$where_c['year']);
              	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="全部"  <?php echo !isset($search['trade_dynamic_state'])?'class="selon"':''?>>全部</a></li>
                <?php foreach ($list['trade_dynamic_state'] as $key=>$value):?>
                <?php $where_c = $search;
		                if(!in_array($value,$where_c['trade_dynamic_state'])){
		                	$where_c['trade_dynamic_state'][] = $value;
		                }
	                	$where_c['trade_dynamic_state'] = implode('-',$where_c['trade_dynamic_state']);
	                	$where_c['trade_class_id'] = implode('-',$where_c['trade_class_id']);
              			foreach ($where_c['trade_user'] as $k=>$v){
                			$where_c['trade_user'][$k] = urlencode($v);
                		}
              			$where_c['trade_user'] = implode('-',$where_c['trade_user']);
              			$where_c['year'] = implode('-',$where_c['year']);
              			if($paseach){
              				$where_c['paseach'] = urlencode($paseach);
              			}
                	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="<?php echo C('TRADE_STATE')[$value]?>" <?php echo in_array($value,$search['trade_dynamic_state'])?'class="selon"':''?>><?php echo C('TRADE_STATE')[$value]?></a></li>
                <?php endforeach;?>
              </ul>
            </div>
			<div class="col-xs-12 zlsellist zls1 zls1t" id="zlzls2">
              <p>&nbsp;&nbsp;&nbsp;权利人</p>
              <ul>
              <?php $where_c = $search;
              		if($where_c['trade_user']){
              			unset($where_c['trade_user']);
              		}
              		foreach ($where_c['trade_user'] as $k=>$v){
              			$where_c['trade_user'][$k] = urlencode($v);
              		}
              		$where_c['trade_dynamic_state'] = implode('-',$where_c['trade_dynamic_state']);
              		$where_c['trade_class_id'] = implode('-',$where_c['trade_class_id']);
              		$where_c['year'] = implode('-',$where_c['year']);
              	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="全部"  <?php echo !isset($search['trade_user'])?'class="selon"':''?>>全部</a></li>
                <?php foreach ($list['trade_user'] as $key=>$value):?>
                <?php $where_c = $search;
		                if(!in_array($value,$where_c['trade_user'])){
		                	$where_c['trade_user'][] = $value;
		                }
		                foreach ($where_c['trade_user'] as $k=>$v){
		                	$where_c['trade_user'][$k] = urlencode($v);
		                }
		                $where_c['trade_dynamic_state'] = implode('-',$where_c['trade_dynamic_state']);
		                $where_c['trade_class_id'] = implode('-',$where_c['trade_class_id']);
              			$where_c['trade_user'] = implode('-',$where_c['trade_user']);
              			$where_c['year'] = implode('-',$where_c['year']);
              			if($paseach){
              				$where_c['paseach'] = urlencode($paseach);
              			}
                	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="<?php echo $value?>"  <?php echo in_array($value,$search['trade_user'])?'class="selon"':''?>><?php echo $value?></a></li>
                <?php endforeach;?>
              </ul>
              <p class="ybs"><a href="javascript:void(0)" class="btn btn-default more1" rel="2">更多</a></p>
            </div>
           
            <div class="col-xs-12 zlsellist zls1" id="zlzls3">
              <p>申请时间</p>
              <ul>
              <?php $where_c = $search;
              		if($where_c['year']){
              			unset($where_c['year']);
              		}
              		foreach ($where_c['trade_user'] as $k=>$v){
		                	$where_c['trade_user'][$k] = urlencode($v);
		                }
		                $where_c['trade_dynamic_state'] = implode('-',$where_c['trade_dynamic_state']);
		                $where_c['trade_class_id'] = implode('-',$where_c['trade_class_id']);
              			$where_c['trade_user'] = implode('-',$where_c['trade_user']);
              	?>
               <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="全部"  <?php echo !isset($search['year'])?'class="selon"':''?>>全部</a></li>
              <?php foreach ($list['year'] as $key=>$value):?>
              	<?php $where_c = $search;
		              	if(!in_array($value,$where_c['year'])){
		              		$where_c['year'][] = $value;
		              	}
              			$where_c['year'] = implode('-',$where_c['year']);
              			 foreach ($where_c['trade_user'] as $k=>$v){
		                	$where_c['trade_user'][$k] = urlencode($v);
		                }
		                $where_c['trade_dynamic_state'] = implode('-',$where_c['trade_dynamic_state']);
		                $where_c['trade_class_id'] = implode('-',$where_c['trade_class_id']);
              			$where_c['trade_user'] = implode('-',$where_c['trade_user']);
              			if($paseach){
              				$where_c['paseach'] = urlencode($paseach);
              			} 
                	?>
                <li><a href="<?php echo U('Trade/GnTrade/index',$where_c)?>" title="<?php echo $value?>"  <?php echo in_array($value,$search['year'])?'class="selon"':''?>><?php echo $value?></a></li>
                <?php endforeach;?>
              </ul>
              <p class="ybs "><a href="javascript:void(0)" title="#" class="btn btn-default more2" rel="3">更多</a></p>
            </div>
          </form>
        </div>
        <!--筛选-->
        <!--查询-->
        <div class="col-xs-12 zlsearchs">
          <div class="zlyjjyst">您已筛选<span><?php echo $list['count']?></span>件商标，<span><?php echo count($list['trade_user'])?></span>个权利人<a href="<?php echo U('Trade/GnTrade/all_jy')?>"  class="btn btn-default postsh">一键交易</a><a href="<?php echo U('Trade/GnTrade/alldel')?>"class="btn btn-default postsh">一键删除</a><a href="<?php echo U('Trade/GnTrade/daochu')?>" class="btn btn-default acolor">导出清单</a> </div>
          
        </div>
        <!--查询-->
         <form method="post" action="">
        <!--查询结果-->
        <div class="col-xs-12 pazhlist pazhlists" >
          <table cellpadding="0" cellspacing="0" class="tablesths" id="tablesths" style="table-layout:fixed;">
            <thead>
              <tr>
                <th width="5%"></th>
                <th width="8%">序号</th>
                <th width="15%">类别</th>
                <th width="12%">注册号</th>
                <th width="11%" class="nowraps">名称</th>
                <th width="15%" class="nowraps">权利人</th>
                <th width="14%">商标状态</th>
                <th width="20%">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($list['trade'] as $key=>$value):?>
              <tr class="zlhover" id="<?php echo $value['uid']?>" >
                <td width="5%">
                <?php if($value['trading_state']):?>
                <img src="<?php echo STATIC_V2;?>/images/sell.png" title="已加入交易库"/>
                <?php endif?>
                </td>
                <td width="8%"><input type="checkbox" name="ids[]" class="ids" value="<?php echo $value['uid']?>"/>&nbsp;<?php echo $key+1?></td>
                <td width="15%"><?php echo $value['name']?></td>
                <td width="12%"><a href="<?php echo U('Trade/Index/detail',array('tmid'=>$value['reg_id'],'class'=>C('TYPE_CODE')[$value['trade_class_id']]))?>"><?php echo $value['reg_id']?$value['reg_id']:ttmid($value['trade_id'])?></a></td>
                <td width="11%" class="nowraps"><a href="<?php echo U('Trade/Index/detail',array('tmid'=>$value['reg_id'],'class'=>C('TYPE_CODE')[$value['trade_class_id']]))?>"><?php echo subtext($value['trade_name'],25)?></a></td>
                <td width="15%" class="nowraps"><a href="<?php echo U('Trade/Index/tmlist',array('paseach'=>urlencode($value['trade_user']),'name'=>'fsqr1'))?>"><?php echo subtext($value['trade_user'],30)?></a></td>
                <td width="14%"><?php echo C('TRADE_STATE')[$value['trade_dynamic_state']]?></td>
                <td width="20%">
	                <a title="管理" href="javascript:void(0)" class="tabaction tuijianclick1 tabactiont ajax_show" rel ="1" cl="0"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
	                <a title="关联类别" href="javascript:void(0)" class="tabaction tabactiont  ajax_show" rel ="2" cl="0"><span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span></a>
	                <a title="商标状态" href="javascript:void(0)" class="tabaction tabactiont ajax_show" rel ="3" cl="0"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span></a>
	                <a title="续展" href="javascript:void(0)" class="tabaction tabactiont ajax_show" rel ="4" cl="0"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	                <a title="费用管理" href="javascript:void(0)" class="tabaction tabactiont ajax_show" rel ="5" cl="0"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
	                <a title="文件管理" href="javascript:void(0)" class="tabaction tabactiont ajax_show" rel ="6" cl="0"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></a>
	                <a title="交易" href="javascript:void(0)" class="tabaction tabactiont ajax_show" rel ="7" cl="0"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
	                <a title="删除" href="javascript:void(0)" class="tabaction tabactiont del"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                </td>
              </tr>
              <tr class="fbtuijian zlfbtuijian dakaiones">
                <td>
                
                </td>
              </tr>
               <?php endforeach;?>
              <tr>
                <td colspan="8"><div class="paalls">
                    <input type="checkbox" name="alls" value="alls" id="alls"/>
                    &nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件商标</div>
                  <div class="seltot"><a href="javascript:void(0)" class="btn btn-default paadd bor_color" url="<?php echo U('Trade/GnTrade/all_jy')?>">交易</a> <a href="javascript:void(0)" class="btn btn-default adddel" url="<?php echo U('Trade/GnTrade/alldel')?>">删除</a></div></td>
              </tr>
            </tbody>
          </table>
           </form>
         <?php echo $list['page']?>
        </div>
        <?php else:?>
        <div class="hgrzy">
        <div class="add_zl paform" style="padding:0px;height:auto;margin:0 auto;margin-top:100px;width:450px;">
			<p>您还没有添加任何数据哦，赶快去添加吧!<a href="<?php echo U('Trade/Trade/showtrade')?>" class="btn btn-primary">去添加</a></p>
	 	 </div>
	 	</div>
        <?php endif;?>
        <!--查询结果-->
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
<!--底部-->
<script type='text/javascript'>
$('.ajax_show').live('click',function(){
	var id = $(this).parents('tr').attr('id');
	var rel = $(this).attr('rel');
	var obj = $(this);
	if($(this).parents('tr').next().find('.'+id+rel).length){
		$(this).parents('tr').next().find('td').html('');
		obj.parents('tr').next().hide();
	}else{
		var url = "<?php echo U('Trade/GnTrade/ajax_show')?>";
		$.post(url,{'id':id,'rel':rel},function(msg){
			$('.dakaiones').find('td').html('');
			$('.dakaiones').hide();
			obj.parents('tr').next().find('td').attr('colSpan','8');
			obj.parents('tr').next().find('td').html(msg);
			obj.parents('tr').next().show();
		})
	}
})

$('.ajax_cat').live('change',function(){
	var obj = $(this);
	var cat = $(this).val();
	var url = "<?php echo U('get_cat')?>";
	$.post(url,{'cat':cat},function(msg){
		obj.parent().next().html(msg);
	})
})

$('.del').live('click',function(){
	var uid = $(this).parents('tr').find('.ids').val();
	var obj = $(this);
	$.post("<?php echo U('Trade/GnTrade/del')?>",{'uid':uid},function(msg){
		$.MsgBoxgj.Alerta('温馨提示',msg.msg,function(){
			location.reload();
			/* obj.parents('tr').next().remove();
			obj.parents('tr').remove(); */
		});
	})
})

$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
});

$('.fee').live('focus',function(){
	$(this).val('');
})

$('#jisuan').live('click',function(){
	var total = 0;
	$('.fee').each(function(i,n){
		if(Boolean($(n).val())){
			total+=parseInt($(n).val());
			}
	})
	$('.total_fee').val(total);
})

/*$(function(){
	var url = "<?php echo U('Trade/GnTrade/ajax_show')?>";
	var id = $('tbody').find('tr').first().attr('id');
	$.post(url,{'id':id,'rel':1},function(msg){
		$('tbody').find('tr').first().next().find('td').attr('colSpan','7');
		$('tbody').find('tr').first().next().find('td').html(msg);
		$('tbody').find('tr').first().next().show();
	})

})*/

$('.ajax_jy').live('click',function(){
	var obj = $(this);
	var uid = obj.attr('uid');
	$.MsgBoxgj.Prompt('温馨提示','确定该商标加入7号网交易平台,如果您暂不填写交易价格，系统将为您自动设为“面议”，填写价格：',function(price){
		$.post("<?php echo U('Trade/GnTrade/ajax_jy')?>",{'uid':uid,'price':price},function(msg){
			$.MsgBoxgj.Alerta('温馨提示',msg.msg,function(){
				if(msg.code==1){
					$('.ajax_jy').remove();
					$('.ts').html('该商标已加入交易库，您可以去交易库中查看，若在交易库中没找到该商标，请稍后刷新重试！');
				}
			})
			
		})
	})
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
				clocks();
				clocks2();
				clocks3();
				clocks4();
				$.MsgBoxgj.Alerta('温馨提示',msg.msg,function(){
					if(msg.code==1){
						$.post("<?php echo U('Trade/GnTrade/ajax_show')?>", {'id':msg.uid,'rel':msg.rel}, function(data){
							$('#'+msg.uid).next().find('td').html('');
							$('#'+msg.uid).next().find('td').html(data);
						})
					}
					
				})
		   }
		});
})

$('.adddynamic').live('click',function(){
	var re = $(this).parents('#dynamicforms').find('.zljjtable').find('tr').last().attr('rel');
	var rel = parseInt(re);
	rel++;
	var content = "<tr rel=><td width='20%'><input type='text' name='trade_dynamic["+rel+"][time]' value=''/></td><td width='60%'><input type='text' name='trade_dynamic["+rel+"][type]' value=''/></td></tr>";
	$(this).parents('#dynamicforms').find('.zljjtable').append(content);
	$('input[name="trade_dynamic['+rel+'][time]"]').focus();
})

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



$('.jy').live('click',function(){
	$.MsgBoxgj.Confirm('温馨提示','您加入交易库中的商品需要到“卖家中心 > 我的商品”中查看，立即去查看！',function(){
		window.open("<?php echo U('Member/Seller/sell_list')?>");
	})
})

/*开启或关闭法律状态弹框*/
function clocks(){
$('#gg').css('display','none');
$('#zzjs_net').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.quxiaoss1 a').live('click',function(){
clocks();
})
$('.quxiao1').live('click',function(){
clocks();
})

//var xiabiao='';
$(".posts").live('click',function(){
//xiabiao=$(this).attr('rel');
$('#gg').css('display','block');
$('#zzjs_net').css('display','block');
$(document.body).css('overflow','hidden');
})
/*开启或关闭法律状态弹框*/
/*开启或关闭年费监控弹框*/

function clocks2(){
$('#gg1').css('display','none');
$('#zzjs_net1').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.quxiaoss2 a').live('click',function(){
clocks2();
})
$('.quxiao2').live('click',function(){
clocks2();
})

//var xiabiao='';
$(".posts2").live('click',function(){
//xiabiao=$(this).attr('rel');
$('#gg1').css('display','block');
$('#zzjs_net1').css('display','block');
$(document.body).css('overflow','hidden');
})

/*开启或关闭年费监控弹框*/
/*开启或关闭费用管家弹框*/

function clocks3(){
$('#gg2').css('display','none');
$('#zzjs_net2').css('display','none');
$(document.body).css("overflow","visible");	
}
$('.quxiaoss3 a').live('click',function(){
clocks3();
})
$('.quxiao3').live('click',function(){
clocks3();
})

//var xiabiao='';
$(".posts3").live('click',function(){
//xiabiao=$(this).attr('rel');
$('#gg2').css('display','block');
$('#zzjs_net2').css('display','block');
$(document.body).css('overflow','hidden');
})

/*开启或关闭费用管家弹框*/
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

//var xiabiao='';
$(".posts4").live('click',function(){
//xiabiao=$(this).attr('rel');
$('#gg3').css('display','block');
$('#zzjs_net3').css('display','block');
$(document.body).css('overflow','hidden');
})

/*开启或关闭上传文件弹框*/
 

/*删除证书*/
$('.zldels span').live('click',function(){
$(this).parents("div[class*='zltulistt']").remove();
})
/*删除证书*/
  
 
 
/*提示框*/
 $(function () { $("[data-toggle='tooltip']").tooltip(); });
/*提示框*/

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



/*选中数量*/
function zoushu(){
	var num=$(".ids:checked").length;
	$("#nums").html(num);
	}
/*选中数量*/

/*全选*/
$('#alls').click(function(){
if(this.checked){
$("#tablesths").find(".ids").prop("checked",true);
}else{
$("#tablesths").find(".ids").removeAttr("checked");
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

/*删除*/
$('.adddel').live('click',function(){
	var url  = $(this).attr('url');
	$(this).parents('form').attr('action',url);
	$(this).parents('form').submit();
})
/*删除*/

/*添加*/
$('.paadd').live('click',function(){
	var url  = $(this).attr('url');
	$(this).parents('form').attr('action',url);
	$(this).parents('form').submit();
})
/*添加*/




$(document).ready(function(){
//$(".tablesths tr:odd").css('background','#F5F5F5');
//$(".tablesths tr:odd").css('background','red');
//$(".tablesths .zljjtable tr").css('background','#ffffff');
//$(".tablesths tr:even").css('background','green');
});

//$(".tablesths tr:odd").css('background','red');
//$(".tablesths .zljjtable tr").css('background','#ffffff');

/*鼠标放上后tr改变颜色*/
$(".tablesths tr:odd").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','#ffffff');
  }
);
$(".tablesths tr:even").hover(function(){
	$(this).css('background','#EDFCFF');
},function(){
	$(this).css('background','none');
  }
);
$(".tablesths .zljjtable tr").hover(function(){
	$(this).css('background','#ffffff');
},function(){
	$(this).css('background','#ffffff');
  }
);
/*鼠标放上后tr改变颜色*/

/*鼠标放上后显示按钮*/
$('.zlhover').hover(function(){
	$(this).find('.tabactiont').css('display','block');
},function(){
	$(this).find('.tabactiont').css('display','none');
  }
);
/*鼠标放上后显示按钮*/

/*推荐弹出*/


/*推荐弹出*/
/*更多*/
var ff=1;
var hh=1;
var kk=1;
$('.more').click(function(){
if(ff==1){
$('#zlzls1').addClass('zlmores');
ff=0;
}else{
$('#zlzls1').removeClass('zlmores');
ff=1;
}
})
$('.more1').click(function(){
if(hh==1){
$('#zlzls2').addClass('zlmores');
hh=0;
}else{
$('#zlzls2').removeClass('zlmores');
hh=1;
}
})
$('.more2').click(function(){
if(kk==1){
$('#zlzls3').addClass('zlmores');
kk=0;
}else{
$('#zlzls3').removeClass('zlmores');
kk=1;
}
})
/*更多*/
 
 

</script>

 
</body>
</html>
