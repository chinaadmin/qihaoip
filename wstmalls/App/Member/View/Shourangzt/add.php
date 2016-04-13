								<div class="col-xs-6">
								  <form class="form-horizontal" id="action-area-form">
								  <div class="form-group">
								     <label class="col-xs-2 form_float">主体类型：</label>
								     <div class="col-xs-10">
								     <input type="radio" name="type" checked="checked" class="radio-inline" onclick="return s_type('2');" value="2">个人&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="type" onclick="return s_type('1');" class="radio-inline" value="1">公司
								     </div>
								    </div>
								   <div class="form-group">
								     <label for="name" class="col-xs-2 control-label" id="data-name">受让人：</label>
								     <div class="col-xs-10">
								     <input type="text" name="name" class="form-control" id="name" required="required">
								     </div>
								    </div>
								    <div class="form-group">
								     <label for="info" class="col-xs-2 control-label" id="data-info">身份证号：</label>
								     <div class="col-xs-10">
								     <input type="text" name="info" class="form-control" id="info" required="required">
								     </div>
								     </div>
								     <div class="form-group">
								     <div class="col-xs-10 pull-right">
								     <span class="btn btn-default" onclick="return do_post('action-area-form','add');">提交</span>
								     </div>
								     </div>
								  </form>
								</div>