								<div class="col-xs-6">
								  <form class="form-horizontal" id="action-area-form">
								  <div class="form-group">
								     <label class="col-xs-2 control-label">主体类型：</label>
								     <div class="col-xs-10">
								     个人：<input type="radio" name="type" class="radio-inline" onclick="return s_type('2');" value="2"  <?php echo $data['type']==2?'checked="checked"':''; ?>>&nbsp;&nbsp;&nbsp;&nbsp;公司：<input type="radio" name="type" onclick="return s_type('1');" class="radio-inline" value="1" <?php echo $data['type']==2?'':'checked="checked"'; ?>>
								     </div>
								    </div>
								   <div class="form-group">
								     <label for="name" class="col-xs-2 control-label" id="data-name"><?php echo $data['type']==2?'受让人：':'公司名称：'; ?></label>
								     <div class="col-xs-10">
								     <input type="text" name="name" class="form-control" id="name" required="required" value="<?php echo $data['name']; ?>" >
								     </div>
								    </div>
								    <div class="form-group">
								     <label for="info" class="col-xs-2 control-label" id="data-info"><?php echo $data['type']==2?'身份证号：':'公司地址：'; ?></label>
								     <div class="col-xs-10">
								     <input type="text" name="info" class="form-control" id="info" required="required" value="<?php echo $data['info']; ?>" >
								     </div>
								     </div>
								     <div class="form-group">
								     <div class="col-xs-10 pull-right">
								     <span class="btn btn-default" onclick="return do_post('action-area-form','edit/id/<?php echo $data['id']; ?>');">提交</span>
								     </div>
								     </div>
								  </form>
								</div>