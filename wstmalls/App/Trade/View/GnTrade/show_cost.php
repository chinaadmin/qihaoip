				<div class="quxiaoss quxiaoss3"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
			        <p>费用管家</p>
						<form method="post" class="form-horizontal" action="<?php echo U('edit_fee')?>" id='feeforms' >
			        	<input type="hidden" name="uid" value="<?php echo $list['trade_data']['uid']?>" />
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
			                  <input type="text" class="form-control total_fee" name="total_fee" id="zoji" value="<?php echo isset($list['trade_data']['total_fee'])?$list['trade_data']['total_fee']:''?>" >
			                </div>
			              </div>
			              <div class="col-xs-6">
			                <div class="col-xs-3 scrzgmc">
			                </div>
			              </div>
			            </div>
			            <input type="hidden" name="fee_state" value="1"/>
			          </div>
			        <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks subclock" name="feeforms">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao3">取消</a></div>
			       </form>