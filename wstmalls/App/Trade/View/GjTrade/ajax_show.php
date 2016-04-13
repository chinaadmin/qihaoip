<?php if($list['rel']=='1'||$list['rel']=='2'):?>	
<!--推荐注册-->
                    <div class="col-xs-12 allwidth <?php echo $list['uid'].$list['rel']?>">
                    <div class="col-xs-12 fbtjtith">
                      <p>关联类别</p><br/>
                      <p class="zlblacks" style="margin-top:10px;">选择您的所属行业，可查看商标的关联类别，了解商标保护是否完整</p>
                      <select class="form-control ajax_cat" name="cat" style="width:80px;height:30px;padding:0px;margin-top:10px;">
                      <option value="0">请选择</option>
                    	<?php foreach (C('TRADE_CAT') as $key=>$value):?>
                    	<option value="<?php echo $key?>"><?php echo $value['name']?></option>
                    	 <?php endforeach;?>
                    	</select>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                    </div>
                  </div>
                 <!--推荐注册11111111-->
                 <?php endif;?>
                 <?php if($list['rel']=='1'||$list['rel']=='3'):?>
				<!--商标状态-->
                  <div class="col-xs-12 allwidth <?php echo $list['uid'].$list['rel']?>">
                    <div class="col-xs-12 fbtjtith">
                      <p>商标状态</p>
                      <a href="javascript:void(0)" class="zltabaction posts" ><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <p class="zlblacks">商标状态错误，立即<a href="javascript:void(0)" class="posts">更改</a>！</p>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                      <table cellpadding="0" cellspacing="0" class="zljjtable">
                        <thead>
                          <tr>
                            <th width="20%">商标状态生效日</th>
                            <th width="60%">商标状态详情</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php if($list['trade_data']['trade_dynamic']):?>
                        <?php foreach ($list['trade_data']['trade_dynamic'] as $key=>$value):?>
                          <tr>
                            <td width="20%"><?php echo $value['time']?></td>
                            <td width="60%"><?php echo $value['type']?> </td>
                          </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td width="20%">无</td>
                            <td width="60%">无</td>
                          </tr>
                        <?php endif?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--商标状态-->
                  <?php endif;?>
                  <?php if($list['rel']=='1'||$list['rel']=='4'):?>
                  <!--商标续展-->
                  <div class="col-xs-12 allwidth <?php echo $list['uid'].$list['rel']?>">
                    <div class="col-xs-12 fbtjtith">
                      <p>商标续展</p>
                      <p class="zlblacks"><!-- <a href="#"  data-toggle="tooltip" data-placement="right" title="点击查看商标续展"><img src="<?php echo STATIC_V2;?>images/zljiao.png"/></a> --></p>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                      <table cellpadding="0" cellspacing="0" class="zljjtable">
                        <thead>
                          <tr>
                            <th width="20%">申请日期</th>
                            <th width="20%">有效期</th>
                            <th width="20%">续展状态</th>
                            <th width="20%">续展到期计时</th>
                            <th width="20%">续展费</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="20%"><?php echo $list['trade_data']["sq_date"]?date('Y-m-d',$list['trade_data']["sq_date"]):''?></td>
                            <td width="20%"><?php echo $list['trade_data']["zd_date"]?date('Y-m-d',$list['trade_data']["zd_date"]):''?></td>
                            <td width="20%"><span class="zlyell"><?php echo $list['xz']['type']?></span></td>
                            <td width="20%"><span class="zlyell"><?php echo $list['xz']['day']?></span><?php echo $list['xz']['content']?></td>
                            <td width="20%"><span class="zlyell"><?php echo $list['xz']['price']?></span> </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--商标续展-->
                  <?php endif?>
                  <?php if($list['rel']=='1'||$list['rel']=='5'):?>
                  <!--费用管理-->
                  <div class="col-xs-12 allwidth <?php echo $list['uid'].$list['rel']?>">
                    <div class="col-xs-12 fbtjtith">
                      <p>费用管理</p>
                      <a href="javascript:" class="zltabaction posts3"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <p class="zlblacks"><a href="<?php echo U('Trade/GjTrade/cost_list')?>"  data-toggle="tooltip" data-placement="right" title="点击查看费用清单"><img src="<?php echo STATIC_V2;?>images/zlfei.png"/></a></p>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                    <?php if($list['trade_data']['fee_state']):?>
                      <table cellpadding="0" cellspacing="0" class="zljjtable">
                        <thead>
                          <tr>
                            <th width="11%">注册官费</th>
                            <th width="11%">注册代理费</th>
                            <th width="11%">驳回复审费</th>
                            <th width="11%">异议答辩费</th>
                            <th width="11%">设计费</th>
                            <th width="11%">商标广告费</th>
                            <th width="11%">诉讼维权费</th>
                            <th width="11%">其他费用</th>
							<th width="12%">费用总计</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="11%"><?php echo $list['trade_data']['reg_fee']?></td>
                            <td width="11%"><?php echo $list['trade_data']['reg_agent_fee']?></td>
                            <td width="11%"><?php echo $list['trade_data']['re_chk_fee']?></td>
                            <td width="11%"><?php echo $list['trade_data']['replay_fee']?></td>
                            <td width="11%"><?php echo $list['trade_data']['design_fee']?></td>
                            <td width="11%"><?php echo $list['trade_data']['ad_fee']?></td>
                            <td width="11%"><?php echo $list['trade_data']['law_fee']?></td>
							<td width="11%"><?php echo $list['trade_data']['else_fee']?></td>
                            <td width="12%"><span class="zlyell"><?php echo $list['trade_data']['total_fee']?></span> </td>
                          </tr>
                        </tbody>
                      </table>
                       <?php else:?>
                      <div class="zljrjyks">该商标还未进行费用管理，立即<span><a class="posts3" href="javascript:void(0)">管理</a></span></div>
                      <?php endif;?>
                    </div>
                  </div>
                  <!--费用管理-->
                  <?php endif?>
                  <?php if($list['rel']=='1'||$list['rel']=='6'):?>
                  <!--文件管理-->
                  <div class="col-xs-12 allwidth <?php echo $list['uid'].$list['rel']?>">
                    <div class="col-xs-12 fbtjtith">
                      <p>文件管理</p>
                      <a href="javascript:void(0)" class="zltabaction posts4"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <p class="zlblacks"><a href="<?php echo U('file_list')?>"  data-toggle="tooltip" data-placement="right" title="点击查看文件清单"><img src="<?php echo STATIC_V2;?>images/zlwen.png"/></a></p>
                    </div>
                    <?php if($list['trade_data']['file_img']):?>
                    <div class="col-xs-12 fbtjlist">
                    <?php foreach ($list['trade_data']['file_img'] as $key=>$value):?>
                      <div class="zltulistt"> <img src="<?php echo $value['img']?>"/> <?php echo $value['name']?>
                        <div class="zldels file_del"><span rel="<?php echo $key?>" uid="<?php echo $list['trade_data']['uid']?>">×</span></div>
                      </div>
                      <?php endforeach;?>
                      <div class="zltulistt ">
                        <div class="zltianjia"> <a href="javascript:void(0)" class="posts4"><img src="<?php echo STATIC_V2;?>images/addzshu.jpg"/></a></div>上传证书 
                      </div>
                    </div>
                    <?php else:?>
                    <div class="zljrjyks">该商标还未进行文件上传，立即<span><a class="posts4" href="javascript:void(0)">上传</a></span></div>
                    <?php endif;?>
                  </div>
                  <!--文件管理-->
                  <?php endif?>
                  <?php if($list['rel']=='1'||$list['rel']=='7'):?>
                  <!--交易管理-->
                  <div class="col-xs-12 allwidth <?php echo $list['uid'].$list['rel']?>">
                  <?php if($list['trade_data']['trading_state']):?>
                    <div class="col-xs-12 fbtjtith">
                    <p>交易管理</p>
                    <p class="zlblacks"><a class="jy" href="javascript:void(0)"  data-toggle="tooltip" data-placement="right" title="已加入交易库"><img src="<?php echo STATIC_V2;?>images/sell.png"/></a></p>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                      <div class="zljrjyks">该商标已加入交易库，您可以去交易库中查看，若在交易库中没找到该商标，请稍后刷新重试！</div>
                    </div>
                  <?php else:?>
                   <div class="col-xs-12 fbtjtith">
                   <p>交易管理</p>
                   <a href="javascript:void(0)" class="zltabaction ajax_jy"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                    <p class="zlblacks"><a class="jy" href="javascript:void(0)"  data-toggle="tooltip" data-placement="right" title="点击查看交易列表"><img src="<?php echo STATIC_V2;?>images/sell.png"/></a></p>
                   </div>
                    <div class="col-xs-12 fbtjlist">
                      <div class="zljrjyks ts">该商标还未加入交易库，立即<span><a href="javascript:void(0)" class="ajax_jy" uid="<?php echo $list['trade_data']['uid']?>">加入交易库</a></span></div>
                    </div>
                  <?php endif?>
                  </div>
                  <!--交易管理-->
                  <?php endif?>
                  
                  
			      <!--费用管家弹框-->
			      <div id="zzjs_net2" class="zzjs_net"></div>
			      <div id="gg2" class="patupianss patupiansst">
			        <div class="quxiaoss quxiaoss3"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
			        <p>费用管家</p>
			        <form></form>
			        <form method="post" class="form-horizontal" action="" id='feeforms' uid="<?php echo $list['uid']?>">
			        	<input type="hidden" name="uid" value="<?php echo $list['trade_data']['uid']?>" />
			        	<input type="hidden" name="rel" value="<?php echo $list['rel']?>" />
			          <div class="col-xs-12 detailtable dashborders">
					  <div class="col-xs-12 sb_feiyou">
					  <div class="sb_feiyou_img"><span><b>商标图样：</b></span><img src="<?php $img = explode(',',$list['trade_data']['img']); echo $img[0]?$img[0]:U('tmimg',array('id'=>$list['trade_data']['trade_id'],'class'=>C('TYPE_CODE')[$list['trade_data']['trade_class_id']])); ?>"></div>
					  <div class="sb_feiyou_wenzi">
					  <p>注册号：<?php echo ttmid($list['trade_data']['trade_id'])?></p>
					  <p>商标名：<?php echo $list['trade_data']['trade_name']?></p>
					  </div>
					  </div>
			            <div class="form-group zllefttt">
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">注册官费:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee" name="reg_fee"  value="<?php echo isset($list['trade_data']['reg_fee'])?$list['trade_data']['reg_fee']:''?>">
			                </div>
			              </div>
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">注册代理费:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee" name="reg_agent_fee" value="<?php echo isset($list['trade_data']['reg_agent_fee'])?$list['trade_data']['reg_agent_fee']:''?>">
			                </div>
			              </div>
			            </div>
			            <div class="form-group zllefttt">
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">驳回复审费:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee"  name="re_chk_fee" value="<?php echo isset($list['trade_data']['re_chk_fee'])?$list['trade_data']['re_chk_fee']:''?>" >
			                </div>
			              </div>
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">异议答辩费:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee" name="replay_fee" value="<?php echo isset($list['trade_data']['replay_fee'])?$list['trade_data']['replay_fee']:''?>" >
			                </div>
			              </div>
			            </div>
			            <div class="form-group zllefttt">
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">设计费:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee" name="design_fee" value="<?php echo isset($list['trade_data']['design_fee'])?$list['trade_data']['design_fee']:''?>" >
			                </div>
			              </div>
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">商标广告费:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee" name="ad_fee" value="<?php echo isset($list['trade_data']['ad_fee'])?$list['trade_data']['ad_fee']:''?>" >
			                </div>
			              </div>
			            </div>
			            <div class="form-group zllefttt">
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">诉讼维权费:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee" name="law_fee"  id="year" value="<?php echo isset($list['trade_data']['law_fee'])?$list['trade_data']['law_fee']:''?>">
			                </div>
			              </div>
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">其他费用:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" class="form-control fee" name="else_fee" id="feiyon" value="<?php echo isset($list['trade_data']['else_fee'])?$list['trade_data']['else_fee']:''?>" >
			                </div>
			              </div>
			            </div>
			            <div class="form-group zllefttt">
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">商标总成本:&nbsp; </div>
			                <div class="col-xs-8 ">
			                  <input type="text" disabled="disabled" class="form-control total_fee" name="total_fee" id="zoji" value="<?php echo isset($list['trade_data']['total_fee'])?$list['trade_data']['total_fee']:''?>" >
			                  <input type="hidden" class="form-control total_fee" name="total_fee" id="zoji" value="<?php echo isset($list['trade_data']['total_fee'])?$list['trade_data']['total_fee']:''?>" >
			                </div>
			              </div>
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">
			                <button type="button" class="btn btn-primary" id="jisuan">计算</button>
			                </div>
			              </div>
			            </div>
			            <input type="hidden" name="fee_state" value="1"/>
			          </div>
			        <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks subclock" name="feeforms" url="<?php echo U('edit_fee')?>">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao3">取消</a></div>
			       </form>
			       
			      </div>
			      <!--费用管家弹框-->
			      
			      <!--商标状态弹框-->
			      <div id="zzjs_net" class="zzjs_net"></div>
			      <div id="gg" class="patupianss">
			        <div class="quxiaoss quxiaoss1"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
			         <form method="post" action="" id="dynamicforms" uid="<?php echo $list['uid']?>" rel="<?php echo $list['rel']?>">
			         <input type="hidden" name="uid" value="<?php echo $list['trade_data']['uid']?>" />
			         <input type="hidden" name="rel" value="<?php echo $list['rel']?>" />
			         <p>商标状态&nbsp;&nbsp;<button type="button" class="btn btn-primary adddynamic">添加</button></p>
			          <div class="col-xs-12 detailtable">
			            <table cellpadding="0" cellspacing="0" class="zljjtable">
			              <thead>
			                <tr>
			                  <th width="20%">商标状态生效日</th>
			                  <th width="60%">商标状态详情</th>
			                </tr>
			              </thead>
			              <tbody>
			               <?php foreach ($list['trade_data']['trade_dynamic'] as $key=>$value):?>
			                <tr rel="<?php echo $key?>">
			                  <td width="20%"><input type="text" name="trade_dynamic[<?php echo $key?>][time]" value="<?php echo $value['time']?>"/></td>
			                  <td width="60%"><input type="text" name="trade_dynamic[<?php echo $key?>][type]" value="<?php echo $value['type']?>"/>
			                  </td>
			                </tr>
			                <?php endforeach;?>
			              </tbody>
			            </table>
			          </div>
			       	<div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks subclock" name="dynamicforms" url="<?php echo U('edit_dynamic')?>">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao1">取消</a></div>
			      </form>
			      </div>
			      <!--商标状态弹框-->
			      
			      
			      <!--文件上传弹框-->
			      <div id="zzjs_net3" class="zzjs_net"></div>
			      <div id="gg3" class="patupianss patupiansst">
			        <div class="quxiaoss quxiaoss4"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
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
			              <?php if($list['trade_data']['file_img']):?>
			              <?php foreach ($list['trade_data']['file_img'] as $key=>$value):?>
			              <div id="<?php echo $key?>" class="zltulistt zltulisttss">
								<img src="">
								<input type="hidden" name="file_img[<?php echo $key?>][img]" value="<?php echo $value['img']?>">
								<div class="col-xs-12">
								<input class="form-control" type="text" value="<?php echo $value['name']?>" name="file_img[<?php echo $key?>][name]">
								</div>
								<div class="zldels">
									<span>×</span>
								</div>
							</div>
							<?php endforeach;?>
							<?php endif?>
			              </div>
			            </div>
			          <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks subclock" name="fileforms" url="<?php echo U('edit_file')?>">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao4">取消</a></div>
			         </form>
			        </div>
			      </div>
			      <!--文件上传弹框-->
      
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
    	                alert("您上传的图片超过了限制！");
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