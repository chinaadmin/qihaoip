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
				<div class="paleft">
					您当前的位置：<a href="/Trade">商标管家</a> > <a href="/Trade/Trade/showtrade">添加商标</a>
				</div>
			</div>
			<div class="hgrzy">
			<?php if(empty($list['showtype'])):?>
				<!--查询-->
				<div class="col-xs-12 patjb">
					<div class="col-xs-12">
						<div class="paform">
							<form method="post" action="<?php echo U('Trade/Trade/showtrade')?>">
								<div class="formdiv">
									<select name="name" class="pazlm">
										<option value="fsqr1" <?php echo $list['post']['name']=='fsqr1'?'selected="selected"':'' ?>>权利人</option>
										<option value="name" <?php echo $list['post']['name']=='name'?'selected="selected"':'' ?>>商标名</option>
										<option value="id" <?php echo $list['post']['name']=='id'?'selected="selected"':'' ?>>注册号</option>
									</select> <select name="fclass" class="pazlm">
										<option value="">全类</option>
										<?php foreach ($list['items'] as $key => $value):?>
										<option value="<?php echo $value['id']?>" <?php echo isset($list['post']['fclass'])&&($list['post']['fclass']==$value['id'])?'selected="selected"':'' ?>><?php echo $value['name']?></option>
										<?php endforeach;?>
									</select> <input type="text" name="paseach" class="hand_search" value="<?php echo $list['post']['paseach']?$list['post']['paseach']:''?>"/>
									<input type="submit" value="检索" class="pasub" />
								</div>

							</form>
						</div>
					</div>
				</div>
				<!--查询-->
				<?php endif?>
				<?php if($list['trade']['result']['items']):?>
				<!--查询结果-->
<div class="col-xs-12 pazhlist" >
 <form action="" method="post">
          <table cellpadding="0" cellspacing="0" class="tablesths" style="table-layout:fixed;">
            <thead>
              <tr>
                <th width="8%">序号</th>
                <th width="16%">类型</th>
                <th width="13%">申请号</th>
                <th width="15%" class="nowraps">商标名</th>
                <th width="16%" class="nowraps">权利人</th>
                <th width="12%">添加状态</th>
                <th width="20%">操作 <!--<div class="fgroupleft">每页显示</div>
                  <div class="col-xs-5">
                    <form action="a.html" method="post">
                      <select class="form-control xianshit" name="zlflst1">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                      </select>
                    </form>
                  </div>
                  <div class="fgroupleft">件</div></th> -->
              </tr>
            </thead>
            <tbody>
            <?php foreach ($list['trade']['result']['items'] as $key=>$value):?>
              <tr>
                <td width="8%"><input type="checkbox" name="ids[]" class="ids" value="<?php echo $value['ftmid']?>" />
                  &nbsp;<?php echo $key+1?></td>
                <td width="16%"><?php echo $value['name']?></td>
                <td width="13%" ><a href="<?php echo U('Trade/Index/detail',array('tmid'=>$value['ftmid'],'class'=>$value['fclass']))?>"><?php echo $value['fid']?></a></td>
                <td width="15%" class="nowraps"><a href="<?php echo U('Trade/Index/detail',array('tmid'=>$value['ftmid'],'class'=>$value['fclass']))?>"><?php echo $value['ftmchin'].'&nbsp;'.$value['ftmeng'].'&nbsp;'.$value['ftmpy']?></a></td>
                <td width="16%" class="nowraps"><a href="<?php echo U('Trade/Index/tmlist',array('paseach'=>urlencode($value['fsqr1']),'name'=>'fsqr1'))?>"><?php echo $value['fsqr1']?></a></td>
                <td width="12%" class="<?php echo $value['tj']=='1'?'ckjgs':'ckjg'?> tj"><?php echo $value['tj']=='1'?'已添加':'未添加'?></td>
                <td width="20%">
                <a href="<?php echo U('Trade/Index/detail',array('tmid'=>$value['ftmid'],'class'=>$value['fclass']))?>"class="tabaction"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                <?php if($value['tj']=='1'):?>
                <a href="javascript:void(0)" title="删除" class="tabaction delete"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                <?php else:?>
                <a href="javascript:void(0)" title="添加" class="tabaction add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                <?php endif?>
                </td>
              </tr>
              <?php endforeach;?>
			  <tr>
                <td colspan="7">
				<div class="paalls"><input type="checkbox" name="alls" value="alls" id="alls"/>&nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件商标</div>
				<div class="seltot"><a href="javascript:void(0)" class="btn btn-default paadd" act="<?php echo U('Trade/Trade/alladd')?>">添加</a>  <a href="javascript:void(0)" class="btn btn-default adddel" act="<?php echo U('Trade/Trade/alldelete')?>">删除</a></div>
				</td>
             </tr>
            </tbody>
          </table>
           </form>
          <?php echo $list['page']?>
        </div>
<!--查询结果-->
				<?php else:?>
				<?php if($list['type']):?>
				<!--手动添加-->
				<div class="col-xs-offset-4 col-xs-6 add_zl">
					<p>对不起,没有找到相关信息,再试一试吧！</p>
					<p>
						您也可以手动添加<a href="javascript:void(0)"class="btn btn-primary addshow">手动添加商标</a>
					</p>
				</div>
				<div class="col-xs-12 hand_zl" style="display:none">
					<div class="col-xs-12 patits">手动添加国内商标</div>
					<form class="form-horizontal" action='<?php echo U('Trade/Trade/addtrade')?>' method='post' id="form">
						<div class="col-xs-12 hand_content">
							<div class="col-xs-6">
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标分类:&nbsp;</div>
									<div class="col-xs-3 hjuli">
										<select class="form-control" name="trade_class_id">
										<?php foreach ($list['items'] as $key => $value):?>
											<option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
										<?php endforeach;?>
										</select>
									</div>
								</div>
								 <div class="form-group">
									<div class="col-xs-3 scrzgmc">商标注册国家/地区：&nbsp;</div>
									<div class="col-xs-3 hjuli">
										<select class="form-control" name="type">
										<?php foreach (C('ITEM_AREA_TYPE') as $key => $value):?>
											<option value="<?php echo $key?>"><?php echo $value?></option>
										<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标注册号:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="reg_id" class="form-control"
											placeholder="注册号" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标名称:&nbsp;</div>
									<div class="col-xs-7 ">
										<input type="text" name="trade_name" class="form-control"
											placeholder="商标名称" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">申请人:&nbsp;</div>
									<div class="col-xs-7 ">
										<input type="text" name="trade_user" class="form-control"
											placeholder="申请人" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标状态：&nbsp;</div>
									<div class="col-xs-3 hjuli">
										<select class="form-control" name="trade_dynamic_state">
										<?php foreach (C('TRADE_STATE') as $key => $value):?>
											<option value="<?php echo $key?>"><?php echo $value?></option>
										<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">申请日期:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="sq_date" class="form-control"
											placeholder="申请日期" id="J-xl" />
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">注册日期:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="zc_date" class="form-control"
											placeholder="注册日期" id="J-x2" />
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">有效期:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="zd_date" class="form-control"
											placeholder="有效期" id="J-x3" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标服务项目:&nbsp;</div>
									<div class="col-xs-7 ">
										<input type="text" name="service" class="form-control"
											placeholder="请输入服务列表,每项服务以|隔开" />
									</div>
								</div>

								<!-- <div class="form-group">
									<div class="col-xs-3 scrzgmc">申请证书扫描件:&nbsp;</div>
									<div class="col-xs-9">
										<input type='text' name='htextfields1' id='hrtextfields1'
											class='txt' placeholder="申请证书扫描件" /> <input type='button'
											class='btnt posts' value='上传文件' /> <input type="file"
											name="hfileFields3" class="file"
											onChange="document.getElementById('hrtextfields1').value=this.value" />
									</div>
								</div> -->
								<a class="btn btn-warning hand_right ajax_add">保存添加</a>
							</div>
							<div class="col-xs-6">
								<input type="hidden" name="img[]" id="thumb1" value="" /> <input
									type="hidden" name="img[]" id="thumb2" value="" /> <input
									type="hidden" name="img[]" id="thumb3" value="" />
								<div class="form-group">
									<div class="col-xs-2 scrzgmc">商标图样:&nbsp;</div>
									<div class="col-xs-10 allimg">
										<div class="hsqtp hand_img_width">
											<div class="yulan hand_img">
												<a href="javascript:void(0)" class="posts" name="1"><img
													id="preview1" width="100" height="100"
													src="<?php echo STATIC_V2;?>images/dendai.png" /></a>
											</div>
											<div class="dianji dianji_zl">
												<p>
													<a href="javascript:void(0)" class="posts" name="1"><img
														src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a
														href="javascript:void(0)" class="selects"><img
														src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)"
														class="deletes" name="1"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a>
												</p>
											</div>
										</div>
										<div class="hsqtp hand_img_width">
											<div class="yulan hand_img">
												<a href="javascript:void(0)" class="posts" name="2"><img
													id="preview2" width="100" height="100"
													src="<?php echo STATIC_V2;?>images/dendai.png" /></a>
											</div>
											<div class="dianji dianji_zl">
												<p>
													<a href="javascript:void(0)" class="posts" name="2"><img
														src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a
														href="javascript:void(0)" class="selects"><img
														src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)"
														class="deletes" name="2"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a>
												</p>
											</div>
										</div>
										<div class="hsqtp hand_img_width">
											<div class="yulan hand_img">
												<a href="javascript:void(0)" class="posts" name="3"><img
													id="preview3" width="100" height="100"
													src="<?php echo STATIC_V2;?>images/dendai.png" /></a>
											</div>
											<div class="dianji dianji_zl">
												<p>
													<a href="javascript:void(0)" class="posts" name="3"><img
														src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a
														href="javascript:void(0)" class="selects"><img
														src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)"
														class="deletes" name="3"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="hand_bigimg">
									<img src="<?php echo STATIC_V2;?>images/blank.png" id="bigimgs" />
								</div>
							</div>
						</div>
					</form>
				</div>
				<script type="text/javascript">
				 laydate({
			            elem: '#J-xl'
						
			        });
				 laydate({
			           
						elem: '#J-x2'
			        });
				 laydate({
			           
						elem: '#J-x3'
			        });
				</script>
				<!--手动添加-->
				<?php else:?>
				<?php if(empty($list['showtype'])):?>
				<div class="col-xs-offset-4 col-xs-6 add_zl">
					<p>请输入您要查询的信息，进行查询添加!</p>
					<p>
						您也可以手动添加<a href="javascript:void(0)"class="btn btn-primary addshow1">手动添加商标</a>
					</p>
				</div>
				<?php endif;?>
				<div class="col-xs-12 hand_zl add1" <?php echo empty($list['showtype'])?'style="display:none"':''?>>
					<div class="col-xs-12 patits">手动添加国内商标</div>
					<form class="form-horizontal" action='<?php echo U('Trade/Trade/addtrade')?>' method='post' id="form">
						<div class="col-xs-12 hand_content">
							<div class="col-xs-6">
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标分类:&nbsp;</div>
									<div class="col-xs-3 hjuli">
										<select class="form-control" name="trade_class_id">
										<?php foreach ($list['items'] as $key => $value):?>
											<option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
										<?php endforeach;?>
										</select>
									</div>
								</div>
								 <div class="form-group">
									<div class="col-xs-3 scrzgmc">商标注册国家/地区：&nbsp;</div>
									<div class="col-xs-3 hjuli">
										<select class="form-control" name="type">
										<?php foreach (C('ITEM_AREA_TYPE') as $key => $value):?>
											<option value="<?php echo $key?>"><?php echo $value?></option>
										<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标注册号:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="reg_id" class="form-control"
											placeholder="注册号" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标名称:&nbsp;</div>
									<div class="col-xs-7 ">
										<input type="text" name="trade_name" class="form-control"
											placeholder="商标名称" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">申请人:&nbsp;</div>
									<div class="col-xs-7 ">
										<input type="text" name="trade_user" class="form-control"
											placeholder="申请人" />
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标状态：&nbsp;</div>
									<div class="col-xs-3 hjuli">
										<select class="form-control" name="trade_dynamic_state">
										<?php foreach (C('TRADE_STATE') as $key => $value):?>
											<option value="<?php echo $key?>"><?php echo $value?></option>
										<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">申请日期:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="sq_date" class="form-control"
											placeholder="申请日期" id="J-xl" />
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">注册日期:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="zc_date" class="form-control"
											placeholder="注册日期" id="J-x2" />
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">有效期:&nbsp;</div>
									<div class="col-xs-3 ">
										<input type="text" name="zd_date" class="form-control"
											placeholder="有效期" id="J-x3" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-3 scrzgmc">商标服务项目:&nbsp;</div>
									<div class="col-xs-7 ">
										<input type="text" name="service" class="form-control"
											placeholder="请输入服务列表,每项服务以|隔开" />
									</div>
								</div>

								<!-- <div class="form-group">
									<div class="col-xs-3 scrzgmc">申请证书扫描件:&nbsp;</div>
									<div class="col-xs-9">
										<input type='text' name='htextfields1' id='hrtextfields1'
											class='txt' placeholder="申请证书扫描件" /> <input type='button'
											class='btnt posts' value='上传文件' /> <input type="file"
											name="hfileFields3" class="file"
											onChange="document.getElementById('hrtextfields1').value=this.value" />
									</div>
								</div> -->
								<a class="btn btn-warning hand_right ajax_add">保存添加</a>
							</div>
							<div class="col-xs-6">
								<input type="hidden" name="img[]" id="thumb1" value="" /> <input
									type="hidden" name="img[]" id="thumb2" value="" /> <input
									type="hidden" name="img[]" id="thumb3" value="" />
								<div class="form-group">
									<div class="col-xs-2 scrzgmc">商标图样:&nbsp;</div>
									<div class="col-xs-10 allimg">
										<div class="hsqtp hand_img_width">
											<div class="yulan hand_img">
												<a href="javascript:void(0)" class="posts" name="1"><img
													id="preview1" width="100" height="100"
													src="<?php echo STATIC_V2;?>images/dendai.png" /></a>
											</div>
											<div class="dianji dianji_zl">
												<p>
													<a href="javascript:void(0)" class="posts" name="1"><img
														src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a
														href="javascript:void(0)" class="selects"><img
														src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)"
														class="deletes" name="1"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a>
												</p>
											</div>
										</div>
										<div class="hsqtp hand_img_width">
											<div class="yulan hand_img">
												<a href="javascript:void(0)" class="posts" name="2"><img
													id="preview2" width="100" height="100"
													src="<?php echo STATIC_V2;?>images/dendai.png" /></a>
											</div>
											<div class="dianji dianji_zl">
												<p>
													<a href="javascript:void(0)" class="posts" name="2"><img
														src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a
														href="javascript:void(0)" class="selects"><img
														src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)"
														class="deletes" name="2"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a>
												</p>
											</div>
										</div>
										<div class="hsqtp hand_img_width">
											<div class="yulan hand_img">
												<a href="javascript:void(0)" class="posts" name="3"><img
													id="preview3" width="100" height="100"
													src="<?php echo STATIC_V2;?>images/dendai.png" /></a>
											</div>
											<div class="dianji dianji_zl">
												<p>
													<a href="javascript:void(0)" class="posts" name="3"><img
														src="<?php echo STATIC_V2;?>images/shanchuan.png"></a><a
														href="javascript:void(0)" class="selects"><img
														src="<?php echo STATIC_V2;?>images/selects.png"></a><a href="javascript:void(0)"
														class="deletes" name="3"><img src="<?php echo STATIC_V2;?>images/deletes.jpg"></a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="hand_bigimg">
									<img src="<?php echo STATIC_V2;?>images/blank.png" id="bigimgs" />
								</div>
							</div>
						</div>
					</form>
				</div>
				<script type="text/javascript">
				 laydate({
			            elem: '#J-xl'
						
			        });
				 laydate({
			           
						elem: '#J-x2'
			        });
				 laydate({
			           
						elem: '#J-x3'
			        });
				</script>
				<?php endif;?>
				<?php endif?>
			</div>
			<include file="Public/foot" />
		</div>
	</div>
	<!--右侧内容-->
	<!--上传图片弹框-->
	<div id="zzjs_net" class="zzjs_net"></div>
	<div id="gg" class="tupian">
		<div class="quxiaoss">
			<a href="javascript:void(0)"><img src="<?php echo STATIC_V2;?>images/quxiaoss.png" /></a>
		</div>
		<p>图片上传</p>
		<ul>
			<li><a href="javascript:void(0)" class="addbors">本地图片</a></li>
			<li><a href="javascript:void(0)">网络图片</a></li>
		</ul>
		<div class="quyu" id="bedicon0">
			<form id='formFile' name='formFile' method="post" action="<?php echo U('Index/Upload/img')?>"
				target='frameFile' enctype="multipart/form-data">
				<input id="ff" type="file" name="file" class="wanless" />
			</form>
			<iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
			<br />
			<br /> <a href="javascript:void(0)" class="changekk">上传</a><a
				href="javascript:void(0)" class="clocks">取消</a>
		</div>
		<div class="quyu1" id="bedicon1">
			<input type="text" name="ffg" id="ljsst" class="wanless"
				placeholder="http://" /><br />
			<br />
			<a href="javascript:void(0)" class="changekk">上传</a><a
				href="javascript:void(0)" class="clocks">取消</a>
		</div>
	</div>
	<!--上传图片弹框-->
</div>
<!--主体-->
<!--右侧热线-->

<!--右侧热线-->
<!--底部-->


<!--底部-->
<script type='text/javascript'>
$('.delete').live('click',function(){
	var obj = $(this);
	$.MsgBoxgj.Confirm('温馨提示',"你确定删除本此商标？",function(){
		var fid = obj.parents('tr').find('.ids').val();
		var url = "<?php echo U('Trade/Trade/ajax_delete')?>";
		$.post(url,{'reg_id':fid},function(msg){
			$.MsgBoxgj.Confirm('温馨提示',msg.msg,function(){
				if(msg.code==1){
					obj.parents('tr').find('.tj').removeClass('ckjgs');
					obj.parents('tr').find('.tj').addClass('ckjg');
					obj.parents('tr').find('.tj').html('未添加');
					obj.html('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>');
					obj.removeClass('delete');
					obj.addClass('add');
					obj.attr('title','添加');
				}
			})
		})
	})
})
/**
 * 111111111
 */
$('.add').live('click',function(){
	var obj = $(this);
	var fid = obj.parents('tr').find('.ids').val();
	var url = "<?php echo U('Trade/Trade/ajax_add')?>";
	$.post(url,{'reg_id':fid},function(msg){
		$.MsgBoxgj.Confirm('温馨提示',msg.msg,function(){
			if(msg.code==1){
				obj.parents('tr').find('.tj').removeClass('ckjg');
				obj.parents('tr').find('.tj').addClass('ckjgs');
				obj.parents('tr').find('.tj').html('已添加');
				obj.html('<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>');
				obj.removeClass('add');
				obj.addClass('delete');
				obj.attr('title','删除');
			}
		})
		
	})
})

$('.paadd').live('click',function(){
	var act = $(this).attr('act');
	var data = $(this).parents('form').serialize();
	if(data){
		$.ajax({
			type: "POST",
			url: act,
			data: data,
			success: function(msg){
				$.MsgBoxgj.Alerta('温馨提示',msg.msg,function(){
					if(msg.code=='1'){
						$("input:checked").each(function(i,n){
							$(n).parents('tr').find('.tj').removeClass('ckjg');
							$(n).parents('tr').find('.tj').addClass('ckjgs');
							$(n).parents('tr').find('.tj').html('已添加');
							$(n).parents('tr').find('.add').html('<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>');
							$(n).parents('tr').find('.add').addClass('delete');
							$(n).parents('tr').find('.add').attr('title','删除');
							$(n).parents('tr').find('.add').removeClass('add');
						})
					}
				})
			}
		});
	}else{
		$.MsgBoxgj.Alert('温馨提示','请选择要添加的商标！')
	}
})

$('.adddel').live('click',function(){
	var act = $(this).attr('act');
	var data = $(this).parents('form').serialize();
	if(data){
		$.ajax({
			type: "POST",
			url: act,
			data: data,
			success: function(msg){
				$.MsgBoxgj.Alerta('温馨提示',msg.msg,function(){
					if(msg.code=='1'){
						$("input:checked").each(function(i,n){
							$(n).parents('tr').find('.tj').removeClass('ckjgs');
							$(n).parents('tr').find('.tj').addClass('ckjg');
							$(n).parents('tr').find('.tj').html('未添加');
							$(n).parents('tr').find('.delete').html('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>');
							$(n).parents('tr').find('.delete').addClass('add');
							$(n).parents('tr').find('.delete').attr('title','添加');
							$(n).parents('tr').find('.leted').removeClass('delete');
						})
					}
				})
			}
		});
	}else{
		$.MsgBoxgj.Alert('温馨提示','请选择要添加的商标！')
	}
})

$('.ajax_add').live('click',function(){
	var act = $(this).parents('form').attr('action');
	var data = $(this).parents('form').serialize();
	if(data){
		$.ajax({
			type: "POST",
			url: act,
			data: data,
			success: function(msg){
				$.MsgBoxgj.Alerta('温馨提示',msg.msg,function(){
					$(':input','#form') 
					.not(':button, :submit, :reset, :hidden,select') 
					.val('') 
					.removeAttr('checked') 
					.removeAttr('selected');
					$('select[name=trade_class_id]').val('8');
					$('select[name=trade_dynamic_state]').val('102');
					$('#thumb1').val('');
					$('#preview1').attr('src','<?php echo STATIC_V2;?>images/dendai.png');
					$('#thumb2').val('');
					$('#preview2').attr('src','<?php echo STATIC_V2;?>images/dendai.png');
					$('#thumb3').val('');
					$('#preview3').attr('src','<?php echo STATIC_V2;?>images/dendai.png');
					$('#bigimgs').attr('src','<?php echo STATIC_V2;?>images/blank.png');
				});
			}
		});
	}
})


$('.addshow').live('click',function(){
	$('.hand_zl').show();
})


$('.addshow1').live('click',function(){
	$('.add1').show();
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



/*本地与网络上传切换*/
$('.tupian li').click(function(){
var tt=$(this).index();
$("div[id*='bedicon']").css('display','none');
$("#bedicon"+tt).css('display','block');
$('.tupian li a').removeClass('addbors');
$(this).find("a").addClass('addbors');
})
/*本地与网络上传切换*/
/*本地图片上传处理*/
$('.quyu .changekk').click(function(){
/*
var tt=$('#ff').val();
alert(tt);
var send_data={'id':tt};

$.post("aaaa.php",send_data,function(data,ts){
if(ts){
		alert('服务器返回'+data);
		$('#preview'+xiabiao).attr("src",data);
		$('#thumb'+xiabiao).val(data);
		}
		})
		clocks();
*/
$('#formFile').submit();
clocks();
})
function uploadSuccess(msg) {
    var re = msg.split('|');
    if (re[0] == 'success') {
		$('#preview'+xiabiao).attr('src', re[1]);
		$('#thumb'+xiabiao).val(re[1]);
		$('#bigimgs').attr('src', re[1]);
	} else {
		alert(re[1]);
	}
        }
/*本地图片上传处理*/
/*网络图片上传处理*/
$('.quyu1 .changekk').click(function(){
var tt=$('#ljsst').val();
var send_data={'file':tt};
$.post("/Index/Upload/img",send_data,function(data){
var re = data.split('|');
    if (re[0] == 'success') {
		$('#preview'+xiabiao).attr('src', re[1]);
		$('#thumb'+xiabiao).val(re[1]);
	} else {
		alert(re[1]);
	}
		})
		clocks();
})
/*网络图片上传处理*/
/*删除图片*/
var xbt='';
$('.deletes').click(function(){
xbt=$(this).attr('name');
$('#preview'+xbt).attr("src","<?php echo STATIC_V2;?>images/dendai.png");
$('#thumb'+xbt).val('');
})
/*删除图片*/
/*开启或关闭上传图片弹框*/
function clocks(){
$('#gg').css('display','none');	
$('#zzjs_net').css('display','none');
$(document.body).css("overflow","visible");
}
$('.quxiaoss a').click(function(){
clocks();
})
$('.quyu .clocks').click(function(){
clocks();
})
$('.quyu1 .clocks').click(function(){
clocks();
})
var xiabiao='';
$(".posts").click(function(){
xiabiao=$(this).attr('name');
$('#gg').css('display','block');
$('#zzjs_net').css('display','block');
$(document.body).css('overflow','hidden');
})
/*开启或关闭上传图片弹框*/

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

function zoushu(){
	var num=$(".ids:checked").length;
	$("#nums").html(num);
	}

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