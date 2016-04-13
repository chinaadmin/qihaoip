
                      <table cellpadding="0" cellspacing="0" class="zljjtable"> 
                        <tbody>
                         <?php if($list['hcat']):?>
                          <tr>
                            <td width="20%" rowspan="<?php echo count($list['hcat'])+1?>" class="sb_center"><b>核心类别</b></td>
                            <td width="20%"><b>商标类别</b></td>
                            <td width="60%"><b>服务项目</b></td>
                          </tr>
                           <?php foreach ($list['hcat'] as  $key=>$value):?>
                          <tr>
                            <td width="20%"><?php echo $key?></td>
                            <td width="60%"><?php echo $value?></td>
                          </tr>
                          <?php endforeach;?>
						 <?php endif;?>
                         <?php $i=1;foreach ($list['gcat'] as  $key=>$value):?>
						 <?php if($i==1):?>
						  <tr>
                            <td width="20%" rowspan="<?php echo $list['hcat']?count($list['gcat']):count($list['gcat'])?>" class="sb_center"><b>关联类别</b></td>
                            <?php if($list['hcat']):?>
                            <td width="20%"><?php echo $key?></td>
                            <td width="60%"><?php echo $value?></td>
                            <?php else:?>
                            <td width="20%">商标类别</td>
                            <td width="60%">服务项目</td>
                            <?php endif?>
                          </tr>
                          <?php else:?>
						  <tr>
                            <td width="20%"><?php echo $key?></td>
                            <td width="60%"><?php echo $value?></td>
                          </tr>
                           <?php endif?>
                          <?php $i++; endforeach;?>
                        </tbody>
                      </table>