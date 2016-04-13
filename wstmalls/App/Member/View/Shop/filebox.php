<?php if($data['ad']):?>
<div class="quxiaoss quxiaoss2"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
        <p>编辑广告</p>
        <form method="post" class="form-horizontal" action="<?php echo U('Member/Shop/save_ad')?>" id="paforms2">
        <input name="type" id="zx_id"  type="hidden" value="<?php echo $data['type']?>" />
          <div class="col-xs-12 detailtable dashborder">
            <div class="col-xs-12 zx_dashborder zx_dashborder_margin">
              <button type="button" class="btn btn-primary add_ad">添加广告</button>
              <button type='submit' class="btn btn-warning zx_public">确认发布</button>
            </div>
            <?php foreach ($data['ad'] as $key=>$value):?>
            <div class="col-xs-12 zx_dashborder rel" rel='<?php echo $key+1 ?>'>
              <div class="form-group zllefttt">
              <input type="hidden" class="form-control" name="ad[<?php echo $key+1?>][uid]" placeholder="标题" value="<?php echo $value['uid']?>">
                <div class="col-xs-1 scrzgmc">标题:&nbsp; </div>
                <div class="col-xs-8 hjuli">
                  <input type="text" class="form-control bt" name="ad[<?php echo $key+1?>][name]" placeholder="标题" value="<?php echo $value['name']?>">
                </div>
              </div>
              <div class="form-group zllefttt">
                <div class="col-xs-1 scrzgmc">图片:&nbsp; </div>
                <div class="col-xs-2 hjuli zx_uploadimg">
                  <button type="button" class="btn btn-primary posts">上传图片</button>
                </div>
                <input type="hidden" name="ad[<?php echo $key+1?>][img]"  id="img<?php echo $key+1?>" value="<?php echo $value['img']?>"/>
                <div class="col-xs-8 wdfbwz_updates"> 请上传jpg、gif、png等格式图片,尺寸为1920*430px,大小不超过500KB </div>
              </div>
              <div class="col-xs-12">
                <div class="col-xs-offset-1 col-xs-8 zx_see"><img src="<?php echo $value['img']?>" id="showimg<?php echo $key+1?>"/></div>
              </div>
              <div class="form-group zllefttt">
                <div class="col-xs-1 scrzgmc">链接:&nbsp; </div>
                <div class="col-xs-8 hjuli">
                  <input type="text" class="form-control" name="ad[<?php echo $key+1?>][link]" placeholder="链接" value="<?php echo $value['link']?>">
                </div>
              </div>
              <div class="col-xs-12 ">
                <div class="col-xs-offset-1 col-xs-8">
                  <div class="btn btn-primary zx_hidden">
                    <input type="checkbox" name="ad[<?php echo $key+1?>][state]" value="1" <?php echo  $value['state']==1?'checked=="checked"':''?> >隐藏</div>
                  <button type="button" class="btn btn-primary" onClick="del_img(this);">删除</button>
                </div>
              </div>
            </div>
            <?php endforeach;?>
          </div>
        </form>
<?php else:?>
<div class="quxiaoss quxiaoss2"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
        <p>编辑广告</p>
        <form method="post" class="form-horizontal" action="<?php echo U('Member/Shop/save_ad')?>" id="paforms2">
        <input name="type" id="zx_id"  type="hidden" value="<?php echo $data['type']?>"/>
          <div class="col-xs-12 detailtable dashborder">
            <div class="col-xs-12 zx_dashborder zx_dashborder_margin">
              <button type="button" class="btn btn-primary add_ad">添加广告</button>
              <button type='submit' class="btn btn-warning zx_public">确认发布</button>
            </div>
            <div class="col-xs-12 zx_dashborder rel" rel='1'>
              <div class="form-group zllefttt">
                <div class="col-xs-1 scrzgmc">标题:&nbsp; </div>
                <div class="col-xs-8 hjuli">
                  <input type="text" class="form-control bt" name="ad[1][name]" placeholder="标题">
                </div>
              </div>
              <div class="form-group zllefttt">
                <div class="col-xs-1 scrzgmc">图片:&nbsp; </div>
                <div class="col-xs-2 hjuli zx_uploadimg">
                  <button type="button" class="btn btn-primary posts">上传图片</button>
                </div>
                <input type="hidden" name="ad[1][img]"  id="img1"/>
                <div class="col-xs-8 wdfbwz_updates"> 请上传jpg、gif、png等格式图片,尺寸为1920*430px,大小不超过500KB </div>
              </div>
              <div class="col-xs-12">
                <div class="col-xs-offset-1 col-xs-8 zx_see"><img src="<?php echo STATIC_V2;?>images/zx_upload_defaultimg.jpg" id="showimg1"/></div>
              </div>
              <div class="form-group zllefttt">
                <div class="col-xs-1 scrzgmc">链接:&nbsp; </div>
                <div class="col-xs-8 hjuli">
                  <input type="text" class="form-control" name="ad[1][link]" placeholder="链接">
                </div>
              </div>
              <div class="col-xs-12 ">
                <div class="col-xs-offset-1 col-xs-8">
                  <div class="btn btn-primary zx_hidden">
                    <input type="checkbox" name="ad[1][state]" value="1">隐藏</div>
                  <button type="button" class="btn btn-primary" onClick="del_img(this);">删除</button>
                </div>
              </div>
            </div>
          </div>
        </form>
   <?php endif?>