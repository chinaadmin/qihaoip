					
					<div class="col-xs-12 allwidth <?php echo $list['uid']?>">
                    <div class="col-xs-12 fbtjlist">
					<?php foreach ($list['trade_data']['file_img'] as $k =>$v):?>
                      <div class="zltulistt"> <img src="<?php echo $v['img']?>"/><?php echo $v['name']?>
                        <div class="zldels file_del"><span rel="<?php echo $k?>" uid="<?php echo $list['uid']?>">×</span></div>
                      </div>
                       <?php endforeach;?>
                      <div class="zltulistt shangchuan">
                        <div class="zltianjia"> <a href="javascript:void(0)" class="posts4" id="<?php echo $list['uid']?>"><img src="<?php echo STATIC_V2;?>images/addzshu.jpg"/></a></div>上传证书
                      </div>
                       </div>
                  </div>