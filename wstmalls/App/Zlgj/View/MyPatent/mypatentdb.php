<include file='Public:header'/>
  <!--右侧内容-->
  <div class="hconright">
    <div class="hconrightcon" >
      <div class="hytit hy_tits">
        <div class="paleft">您当前的位置：<a href="{:U('Index/index')}">专利管家</a> > <a href="{:U('MyPatent/mypatentdb')}">我的专利数据库</a></div>
        <div class="paright"><a href="{:U('MyPatent/addpatent')}" class="btn btn-default acolor add_tradest">添加专利</a></div>
        <div class="zlyjjyst1">
            <form method="get" action="{:U('MyPatent/mypatentdb')}">
              <div class="formdivs">
              	<notempty name="Think.get.type"><input type="hidden" name="type" value="{$Think.get.type}"/></notempty>
			 	<notempty name="Think.get.patee"><input type="hidden" name="patee" value="{$Think.get.patee}"/></notempty>
				<notempty name="Think.get.ivt"><input type="hidden" name="ivt" value="{$Think.get.ivt}"/></notempty>
				<notempty name="Think.get.lss"><input type="hidden" name="lss" value="{$Think.get.lss}"/></notempty>
				<notempty name="Think.get.aft"><input type="hidden" name="aft" value="{$Think.get.aft}"/></notempty>
				<notempty name="Think.get.pse"><input type="hidden" name="pse" value="{$Think.get.pse}"/></notempty>
				<notempty name="Think.get.p"><input type="hidden" name="p" value="{$Think.get.p}"/></notempty>
                <input type="text" name="js"  class="pasearchs" placeholder="<empty name="Think.get.js">申请号、专利名称、权利人、发明人等<else />{$Think.get.js}</empty>"/>
                <input type="submit" value="检索" class="pasubs"/>
              </div>
            </form>
          </div>
      </div>
  <notempty name="data['nodata']">
      <div class="hgrzy">
        <!--筛选-->
        <div class="col-xs-12 zlsellists">
          <form action="" method="post" id="forms">
            <div class="col-xs-12 zlsellist noborder" id="selects">
              <p>您已选择</p>
             <ul>
	         <?php foreach ($search as $key=>$value):?>
                <?php if($key=='type'):?>
                	<?php foreach ($value as $k=>$v):?>
                	<?php $where = $search;
                		unset($where['type'][$k]);
                		if($where['type']){
                			$where['type'] = implode('-',$where['type']);
                		}else{
                			unset($where['type']);
                		}
                	?>
                <li><a href="{:U('MyPatent/mypatentdb')}?<?php if($where['type']){?>type=<?php echo $where['type'];?><?php }?><notempty name="Think.get.patee">&patee={$Think.get.patee}</notempty><notempty name="Think.get.ivt">&ivt={$Think.get.ivt}</notempty><notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" title="<?php echo $data['type'][$v]?>" id="se0" class="selon"><?php echo $data['type'][$v]?><span id="zls1" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              	<?php endforeach;?>
              	<?php endif?>
	         	<?php endforeach;?>
              <notempty name="Think.get.patee">
                <li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}</notempty><notempty name="Think.get.ivt">&ivt={$Think.get.ivt}</notempty><notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>"  class="selon">{$Think.get.patee}<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              </notempty>
              <notempty name="Think.get.ivt">
                <li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}</notempty><notempty name="Think.get.patee">&patee={$Think.get.patee}</notempty><notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" class="selon">{$Think.get.ivt}<span  class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              </notempty>
              <?php foreach ($search as $key=>$value){?>
              <?php if($key=='lss'){?>
              <?php 
              foreach ($value as $k=>$v){?>
              <?php $where = $search;
                	unset($where['lss'][$k]);
                	if($where['lss']){
                		$where['lss'] = implode('-',$where['lss']);
                	}else{
                		unset($where['lss']);
                	}
               ?>
                <li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}</notempty><notempty name="Think.get.patee">&patee={$Think.get.patee}</notempty><notempty name="Think.get.ivt">&ivt={$Think.get.ivt}</notempty><?php if($where['lss']){?>&lss=<?php echo $where['lss'];?><?php }?><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" class="selon"><?php echo $v;?><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              <?php }}}?>
              <notempty name="Think.get.aft">
                <li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}</notempty><notempty name="Think.get.patee">&patee={$Think.get.patee}</notempty><notempty name="Think.get.ivt">&ivt={$Think.get.ivt}</notempty><notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" class="selon">{$Think.get.aft}<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></li>
              </notempty>
             </ul>
            </div>
            <div class="col-xs-12 zlsellist zls2">
              <input type="hidden" name="libie2"/>
              <p>专利类型</p>
              <ul>
              <?php foreach ($data['type'] as $key=>$value):?>
              	<?php $where = $search;?>
              	<?php 
              	if(!in_array($key,$where['type'])){
              			$where['type'][] = $key; 
              	}?>
              	<?php $where['type'] = implode('-',$where['type'])?>
                <li><a href="{:U('MyPatent/mypatentdb')}?type=<?php echo $where['type'];?><notempty name="Think.get.patee">&patee={$Think.get.patee}</notempty><notempty name="Think.get.ivt">&ivt={$Think.get.ivt}</notempty><notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" <if condition="in_array($key,$search['type'])">class="selon"</if>><?php echo $value?></a></li>
             <?php endforeach;?>
              </ul>
            </div>
           <empty name="Think.get.patee">
            <div class="col-xs-12 zlsellist zls1 zls1ts" id="zlzls1">
              <input type="hidden" name="libie1"/>
              <p>&nbsp;权利人</p>
              <ul>
                	<li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}&</notempty>patee=全部<notempty name="Think.get.ivt">&ivt={$Think.get.ivt}</notempty><notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" class="selon patee">全部</a></li>
                <volist name="data['patee']" id="vo">
                	<li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}&</notempty>patee={$vo['patentee']}<notempty name="Think.get.ivt">&ivt={$Think.get.ivt}</notempty><notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>">{$vo['patentee']}</a></li>
              	</volist>
              </ul>
              <if condition="$data['pateenum'] gt '4'">
              	<p class="ybs"><a href="javascript:;" class="btn btn-default more" rel="1">More</a></p>
              </if>
            </div>
           </empty>
           <empty name="Think.get.ivt">
            <div class="col-xs-12 zlsellist zls1 zls1t" id="zlzls2">
              <input type="hidden" name="libie1t"/>
              <p>&nbsp;发明人</p>
              <ul>
                	<li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}&</notempty><notempty name="Think.get.patee">patee={$Think.get.patee}&</notempty>ivt=全部<notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" class="selon">全部</a></li>
                <volist name="data['ivt']" id="vo">
                	<li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}&</notempty><notempty name="Think.get.patee">patee={$Think.get.patee}&</notempty>ivt={$vo['inventor']}<notempty name="Think.get.lss">&lss={$Think.get.lss}</notempty><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>">{$vo['inventor']}</a></li>
                </volist>
              </ul>
              <if condition="$data['ivtnum'] gt '8'">
              	<p class="ybs"><a href="javascript:;" class="btn btn-default more1" rel="2">More</a></p>
              </if>
            </div>
           </empty>
            <div class="col-xs-12 zlsellist zls3">
              <input type="hidden" name="libie3"/>
              <p>法律状态</p>
              <ul>
                	<li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}&</notempty><notempty name="Think.get.patee">patee={$Think.get.patee}&</notempty><notempty name="Think.get.ivt">ivt={$Think.get.ivt}&</notempty>lss=全部<notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" <if condition="($Think.get.lss eq '') OR ($Think.get.lss eq '全部') ">class="selon"</if>>全部</a></li>
                
                <?php foreach ($data['lss'] as $key => $value){?>
                <?php $where = $search;?>
              	<?php 
	              	if(!in_array($value['legalstatus'],$where['lss'])){
	              			$where['lss'][] = $value['legalstatus']; 
					}
				?>
              	<?php $where['lss'] = implode('-',$where['lss']);
              	?>
                	<li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}&</notempty><notempty name="Think.get.patee">patee={$Think.get.patee}&</notempty><notempty name="Think.get.ivt">ivt={$Think.get.ivt}&</notempty>lss=<?php echo $where['lss'];?><notempty name="Think.get.aft">&aft={$Think.get.aft}</notempty><notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>" <?php echo in_array($value['legalstatus'],$search['lss'])?'class="selon"':''?>>{$value['legalstatus']}</a></li>
              	<?php }?>
              </ul>
            </div>
           <empty name="Think.get.aft">
            <div class="col-xs-12 zlsellist zls1s" id="zlzls3">
              <input type="hidden" name="libie1s"/>
              <p>申请时间</p>
              <ul>
                <!-- <li><a href="javascript:void(0)" title="#"  class="selon">2015</a></li> -->
                <volist name="data['aft']" id="vo">	
                	<li><a href="{:U('MyPatent/mypatentdb')}?<notempty name="Think.get.type">type={$Think.get.type}&</notempty><notempty name="Think.get.patee">patee={$Think.get.patee}&</notempty><notempty name="Think.get.ivt">ivt={$Think.get.ivt}&</notempty><notempty name="Think.get.lss">lss={$Think.get.lss}&</notempty>aft={$vo['applyyear']}<notempty name="Think.get.pse">&pse={$Think.get.pse}</notempty><notempty name="Think.get.js">&js={$Think.get.js}</notempty><notempty name="Think.get.p">&p={$Think.get.p}</notempty>">{$vo['applyyear']}</a></li>
                </volist>	
              </ul>
              <if condition="$data['aftnum'] gt '10'">
              	<!-- <p class="ybs ybstt"> --><p class="ybs"><a href="javascript:;" class="btn btn-default more2" rel="3">More</a></p>
              </if>	
            </div>
           </empty>
          </form>
        </div>
        <!--筛选-->
        <!--查询-->
        <div class="col-xs-12 zlsearchs">
          <div class="zlyjjyst">
            <span>您已筛选{$data['count']}件专利</span>
          	<!-- 共添加<span>{$data['ptnum']|default='0'}</span>件专利,
          	<span>{$data['pateenum']|default='0'}</span>个权利人 -->
          	<a href="javascript:;" class="btn btn-default postsh yjjf">一键缴费</a>
          	<a href="javascript:;" title="一键交易" class="btn btn-default postsh" onClick="jiansouth();">一键交易</a>
          	<a href="javascript:;" class="btn btn-default postsh yjsc">一键删除</a>
          	<a href="{:U('MyPatent/expAll')}" class="btn btn-default acolor">导出清单</a>
          </div>
        </div>
        <!--查询-->
        <!--查询结果-->
        <div class="col-xs-12 pazhlist pazhlists" >
          <table cellpadding="0" cellspacing="0" class="tablesths" id="tablesths">
            <thead>
              <tr>
                <th width="1%"></th>
                <th width="5%">序号</th>
                <th width="21%">专利信息</th>
                <th width="14%">权利人</th>
                <th width="10%">法律状态</th>
                <th width="9%">应缴日期</th>
                <th width="7%">年费状态</th>
                <th width="25%">
                	<div class="fgroupleft">操作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;每页显示</div>
	                <div class="col-xs-5">
                      <select class="form-control xianshit" name="pse">
                        <option <eq name="data['pagesize']" value="10">selected = "selected"</eq> value="10">10</option>
                        <option <eq name="data['pagesize']" value="20">selected = "selected"</eq> value="20">20</option>
                        <option <eq name="data['pagesize']" value="30">selected = "selected"</eq> value="30">30</option>
                      </select>
	                </div>
	                <div class="fgroupleft">件</div>
	           </th>
              </tr>
            </thead>
            <tbody>
            <volist name="data['mypatentdb']" id="vo" key="key">
              <tr class="zlhover" id="trs{$key}">
                <td width="1%" class="tds{$vo['id']}"><if condition="$vo['salestatus'] egt '3'"><img src="<?php echo STATIC_V2;?>images/sell.png" title="该专利已加入交易库"></if><!-- <a href="#" title="#" class="tabaction tabactiont zltop"  rel="{$key}" ><span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span></a> --></td>
                <td width="5%"><input type="checkbox" name="gwctt{$key}" value="{$vo['pmid']}"/>&nbsp;{$key}</td>
                <td width="21%">
                <if condition="$vo['type'] eq '1'">	
                	<span class="famin">发明</span>
                <elseif condition="$vo['type'] eq '2'"/>
                	<span class="waiguan">外观</span>
                <elseif condition="$vo['type'] eq '3'"/>
                	<span class="shiyou">实用</span>
                <elseif condition="$vo['type'] eq '4'"/>
                	<span class="taiwan">中国台湾</span>
                <elseif condition="$vo['type'] eq '5'"/>
                	<span class="xianggang">中国香港</span>
                </if>
                <a href="{:U('Zlgj/PatentTrade/detail')}/{$vo['patentnum']}/{$vo['zlpage']}" target="_blank">{$vo['patentnum']}</a>
                <br>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('Zlgj/PatentTrade/detail')}/{$vo['patentnum']}/{$vo['zlpage']}" target="_blank">{$vo['cname']|htmlspecialchars_decode|msubstr=0,15}</a></div>
                </td>
                <td width="14%"><div class="add2016_01_22"><a href="{:U('PatentTrade/show')}?st=1&q={$vo['patentee']}&Fruit1=63&Fruit2=1&Fruit3=2&Fruit4=4&Fruit5=8&Fruit6=16&Fruit7=32" target="_blank">{$vo['patentee']|msubstr=0,15}</a></div></td>
                <td width="10%">{$vo['legalstatus']}</td>
                <td width="9%">
	                <if condition="($vo['legalstatus'] eq '有效专利') AND $vo['should']">
	                	{$vo['should']|date="Y-m-d",###}
	                <else/>
	                	<span>无</span>
	                </if>
                </td>
                <td width="7%">
 					<if condition="$vo['legalstatus'] eq '有效专利' ">
						<if condition="($vo['daynum'] elt '0') AND ($vo['daynum'] gt '-30')">
							<span class="jinji">紧急</span>
						<elseif condition="($vo['daynum'] gt '0') AND ($vo['daynum'] lt '180')"/>
							<span class="youx">滞纳</span>
						<else />
							<span class="zlgreen">正常</span>
						</if>
						<elseif condition="($vo['legalstatus'] eq '实质审查') OR  ($vo['legalstatus'] eq '公开发明')" />
							<span class="scgk">申请中</span>
						<else />
							<span class="shixiao">失效</span>
					</if>               				
				</td>
                <td width="25%">
                	<a href="javascript:;" title="查看全部" class="tabaction  tabactiont tuijianclick{$vo['id']} anmark" mark="1" onClick="tuijianclicks('{$vo[id]}',this);"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a> 
                	<a href="javascript:;" title="法律状态"  class="tabaction tabactiont posts{$vo[id]} anmark" mark="1" onClick="flzt('{$vo[id]}',this);"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span></a> 
                	<a href="javascript:;" title="年费监控"  class="tabaction tabactiont posts2{$vo[id]} anmark" mark="1" onClick="nfjk('{$vo[id]}',this);"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
                	<a href="javascript:;" title="费用管理"  class="tabaction tabactiont posts3{$vo[id]} anmark" mark="1" onClick="fygl('{$vo[id]}',this);"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> 
                	<a href="javascript:;" title="文件管理"  class="tabaction tabactiont posts4{$vo[id]} anmark" mark="1" onClick="wjgl('{$vo[id]}',this);"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></a> 
                	<a href="javascript:;" title="加入交易库"  class="tabaction tabactiont anmark" mark="1" onClick="jyk('{$vo[id]}',this);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                	<a href="javascript:;" title="删除" onClick="del('{$vo[pmid]}','{$vo[patentnum]}',this);" class="tabaction tabactiont"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> 
                </td>
              </tr>
               <tr class="fbtuijian{$vo['id']} tabactiont my_open" pubmark='1' rel="{$vo['id']}">
                <td colspan="8"><!--法律状态-->
                  <div class="col-xs-12 allwidth flzt{$vo['id']}">
                    <div class="col-xs-12 fbtjtith">
                      <p>法律状态</p>
                      <a href="javascript:;" onClick="posts('{$vo[id]}','posts{$vo[id]}');" class="zltabaction posts{$vo['id']}" ><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <p class="zlblacks">法律状态错误，立即<a href="javascript:;" onClick="posts('{$vo[id]}','posts{$vo[id]}');" class="posts{$vo['id']}">更改</a>!</p>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                      <table cellpadding="0" cellspacing="0" class="zljjtable">
                        <thead>
                          <tr>
                            <th width="20%">法律状态生效日</th>
                            <th width="20%">法律状态</th>
                            <th width="60%">法律状态详情</th>
                          </tr>
                        </thead>
                        <tbody class="lsf{$vo['id']}">
                       <volist name="vo['lsd']" id="v">
                          <tr>
                            <td width="20%">{$v['andate']}</td>
                            <td width="20%">{$v['legalstatus']}</td>
                            <td width="60%">{$v['legalstatusdetails']|htmlspecialchars_decode}</td>
                          </tr>
                        </volist>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--法律状态-->
                  <!--年费监控-->
                  <div class="col-xs-12 allwidth nfjk{$vo['id']}">
                    <div class="col-xs-12 fbtjtith">
                      <p>年费监控</p>
                      <a href="javascript:;" onClick="posts2('{$vo[id]}','posts2{$vo[id]}');" class="zltabaction posts2{$vo['id']}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <p class="zlblacks"><a href="{:U('CostHouse/index')}" target="_blank" data-toggle="tooltip" data-placement="right" title="点击查看缴费清单"><img src="<?php echo STATIC_V2;?>images/zljiao.png"/></a></p>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                      <table cellpadding="0" cellspacing="0" class="zljjtable">
                        <thead>
                          <tr>
                            <th width="16%">申请日期</th>
                            <th width="16%">应缴日期</th>
                            <th width="16%">年费年度</th>
                            <th width="16%">年费状态</th>
                            <th width="16%">年费金额/滞纳金</th>
                            <th width="20%">缴费操作</th>
                          </tr>
                        </thead>
                        <tbody class="ananul{$vo['id']}">
                          <tr>
                            <td width="16%">{$vo[applydate]|date="Y-m-d",###}</td>
                            <td width="16%">
	                            <if condition="($vo['legalstatus'] eq '有效专利') AND $vo['should']">
	                            	{$vo[should]|date="Y-m-d",###}
	                            <else/>
	                            	无
	                            </if>
                            </td>
                            <td width="16%">第{$vo['annual']}年</td>    
                            <td width="16%">
	                            <if condition="$vo['legalstatus'] eq '有效专利' ">
									<if condition="($vo['daynum'] elt '0') AND ($vo['daynum'] gt '-30')">
										<span class="bohuis">紧急</span>，剩余{-$vo['daynum']}天
									<elseif condition="($vo['daynum'] gt '0') AND ($vo['daynum'] lt '180')"/>
										<span class="youx">滞纳</span>，超过{$vo['daynum']}天
									<else />
										<span class="zlgreen">正常</span>，剩余{-$vo['daynum']}天
									</if>
								<elseif condition="($vo['legalstatus'] eq '实质审查') OR  ($vo['legalstatus'] eq '公开发明')" />
									<span class="scgk">申请中</span>
								<else />
									<span class="xgwx">失效</span>
								</if>
							</td>
                            <td width="16%"><span class="zlyell">{$vo['pay_total']}/{$vo['latefee']}</span></td>
                            <td width="20%">
                            	<a href="{:U('/Member/Buyer/tmpa_chkout')}/type/2/ids/{$vo['pmid']}" target="_blank">缴费</a>
                            	&nbsp;&nbsp;
                            	<if condition="$vo['annual_state'] egt '1'">
                          			已加入清单	
                            	<else/>
                            		<a href="javascript:;" class="jrqd{$vo['id']}" onClick="addlist('{$vo[id]}','{$vo[pmid]}',this)">加入清单</a>  	
                            	</if>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--年费监控-->
                  <!--费用管理-->
                  <div class="col-xs-12 allwidth fygl{$vo['id']}">
                    <div class="col-xs-12 fbtjtith">
                      <p>费用管理</p>
                      <a href="javascript:;" onClick="posts3('{$vo[id]}','posts3{$vo[id]}');" class="zltabaction posts3{$vo['id']}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <p class="zlblacks"><a href="{:U('CostManage/index')}" target="_blank" data-toggle="tooltip" data-placement="right" title="点击查看费用清单"><img src="<?php echo STATIC_V2;?>images/zlfei.png"/></a></p>
                    </div>
                    <div class="col-xs-12 fbtjlist">
                      <table cellpadding="0" cellspacing="0" class="zljjtable">
                        <thead>
                          <tr>
                            <th width="12%">正常申请费</th>
                            <th width="12%">超权费</th>
                            <th width="12%">有减缓官费</th>
                            <th width="12%">维持费</th>
                            <th width="12%">授权登印费</th>
                            <th width="12%">代理费</th>
                            <th width="12%">其他费用</th>
                            <th width="16%">费用总计</th>
                          </tr>
                        </thead>
                        <tbody class="costm{$vo['id']}">
                          <tr>
                            <td width="12%">{$vo['reg_fee']}</td>
                            <td width="12%">{$vo['sup_acc_fee']}</td>
                            <td width="12%">{$vo['cut_fee']}</td>
                            <td width="12%">{$vo['total_fee']}</td>
                            <td width="12%">{$vo['acc_fee']}</td>
                            <td width="12%">{$vo['agent_fee']}</td>
                            <td width="12%">{$vo['else_fee']}</td>
                            <td width="16%"><span class="zlyell">{$vo['total_price']}</span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--费用管理-->
                  <!--文件管理-->
                  <div class="col-xs-12 allwidth wjgl{$vo['id']}">
                    <div class="col-xs-12 fbtjtith">
                      <p>文件管理</p>
                      <a href="javascript:;" onClick="posts4('{$vo[id]}','posts4{$vo[id]}');" class="zltabaction posts4{$vo['id']}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                      <p class="zlblacks"><a href="{:U('FileManage/index')}" target="_blank" data-toggle="tooltip" data-placement="right" title="点击查看文件清单"><img src="<?php echo STATIC_V2;?>images/zlwen.png"/></a></p>
                    </div>
                    <div class="col-xs-12 fbtjlist fbtjfile{$vo['id']}">
                    <div class="gallery">
                    <volist name="vo['pic']" id="v">
	                      <div class="zltulistt wjtp{$v['id']}">
	                       <img src="{$v['url']}"/>{$v['name']}
	                       <div class="zldels" onClick="delPic('{$v[id]}')"><span rel="{$v['id']}">×</span></div>
	                      </div>
                    </volist>
                    </div>
                      <div class="zltulistt "><div class="zltianjia"><a href="javascript:;" onClick="posts4('{$vo[id]}','posts4{$vo[id]}');"><img src="<?php echo STATIC_V2;?>images/addzshu.jpg"/></a></div>上传证书 </div>
                    </div>
                  </div>
                  <!--文件管理-->
                  <!--交易管理-->
                  <div class="col-xs-12 allwidth jygl{$vo['id']}">
                    <div class="col-xs-12 fbtjtith">
                      <p>交易管理</p>
                      <if condition="$vo['salestatus'] eq 1 ">
	                    <a href="javascript:;" title="加入交易库" class="zltabaction" onClick="onebttrade('{$vo[patentnum]}','{$vo[pmid]}','{$vo[id]}',this);"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
	                  </if>
	                  <p class="zlblacks">
						<a href="javascript:void(0)" class="jy" title="点击查看交易列表" data-placement="right" data-toggle="tooltip">
							<img src="<?php echo STATIC_V2;?>images/sell.png">
						</a>
					 </p>
	                </div>
                    <div class="col-xs-12 fbtjlist jrjy{$vo['id']}">
	                    <eq name="vo['salestatus']" value="1">
	                        <div class="zljrjyks tjjyk{$vo['id']}">该专利还未加入交易库，立即<span><a href="javascript:;"  title="加入交易库" onClick="onetxtrade('{$vo[patentnum]}','{$vo[pmid]}','{$vo[id]}',this);">加入交易库</a></span></div>
	                    <else/>
	                    	<div class="zljrjyks tjjyk{$vo['id']}">该专利已加入交易库，立即<span><a href="{:U('Member/Seller/sell_list',array('tmpa'=>'2'))}"  title="查看交易库" target="_blank">查看交易库</a>，若在交易库中没找到该专利，请稍后刷新重试！</span></div>
	                    </eq>
                    </div>
                  </div>
                  <!--交易管理-->
                </td>
              </tr>
             </volist> 
              <tr>
                <td colspan="8"><div class="paalls">
                    <input type="checkbox" name="alls" value="alls" id="alls"/>
                    &nbsp;全选&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您选中了<span id="nums">0</span>件专利</div>
                  <div class="seltot"><a href="javascript:;" class="btn btn-default paadd bor_color">交易</a> <a href="javascript:;" class="btn btn-default adddel">删除</a></div></td>
              </tr>
            </tbody>
          </table>
	 		{$data['page']}
        </div>
        <!--查询结果-->
        </div>
      <!--法律状态弹框-->
     <volist name="data['mypatentdb']" id="vo">
      <div id="zzjs_net{$vo['id']}" class="zzjs_net"></div>
      <div id="posts{$vo['id']}" class="patupianss">
        <div class="quxiaoss quxiaoss{$vo['id']}"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
        <p>法律状态<button type="button" class="btn btn-primary add_ls{$vo['id']}" onClick="tjan('{$vo[id]}','{$vo[patentnum]}',this)">添加</button></p>
        <form id="paforms{$vo['id']}">
          <div class="col-xs-12 detailtable">
            <table cellpadding="0" cellspacing="0" class="zljjtable">
              <thead>
                <tr>
                  <th width="20%">法律状态生效日</th>
                  <th width="20%">法律状态</th>
                  <th width="60%">法律状态详情</th>
                </tr>
              </thead>
              <tbody id="addTr{$vo['id']}">
                <volist name="vo['lsd']" id="v" key="k">
	                <tr>
	                  <td width="20%" style="display:none;"><input type="hidden" value="{$v['id']}"/></td>
	                  <td width="20%" style="display:none;"><input type="hidden" value="{$v['ptno']}"/></td>
	                  <td width="20%"><input type="text" value="{$v['andate']}"/></td>
	                  <td width="20%"><input type="text" value="{$v['legalstatus']}"/></td>
	                  <td width="60%"><input type="text" value="{$v['legalstatusdetails']|htmlspecialchars_decode}"/></td>                
	                </tr>
              	</volist>
              </tbody>
            </table>
          </div>
        </form>
        <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks clocks1{$vo['id']}" onClick="flqd('{$vo[id]}','{$vo[patentnum]}',this);" >确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao{$vo['id']}">取消</a></div>
      </div>
      <!--法律状态弹框-->
      <!--年费监控弹框-->
      <div id="zzjs_net{$vo['id']}"  class="zzjs_net"></div>
      <div id="posts2{$vo['id']}" class="patupianss">
        <div class="quxiaoss quxiaoss{$vo['id']}"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
        <p>年费监控</p>
        <form class="form-horizontal"  id="paforms2{$vo['id']}">
          <div class="col-xs-12 detailtable dashborder">
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">应缴年度:&nbsp; </div>
              <div class="col-xs-2 hjuli">
                <select class="form-control niandu{$vo['id']}" onChange="yjnd('{$vo[id]}','{$vo[patentnum]}',this)" name="zlflsts1{$vo['id']}">
	                <volist name="vo['annualyear']" id="v" key='k'>
	                  <option <if condition="$vo['annual'] eq $k">selected="selected"</if>  value="{$k}">{$v}</option>
	                </volist> 
                </select>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">减缓比列:&nbsp; </div>
	              <div class="col-xs-4 hjuli">
	                <select class="form-control jianhuan{$vo['id']}" name="zlflsts2{$vo['id']}">
	                <volist name="vo['isslow']" id="v" key='k'>
	                  <option  <if condition="$vo['slow'] eq $k">selected="selected"</if> value="{$k}">{$v}</option>
	                </volist>
	                </select>注意：专利授权后第7年，将不予减缓专利年费。
              	  </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">滞纳时间:&nbsp; </div>
              <div class="col-xs-2 hjuli">
              	<select class="form-control zhina{$vo['id']}" name="zlflsts3{$vo['id']}">
                <volist name="vo['latetime']" id="v" key='k'>
                  <option  <if condition="$vo['latetime'] eq $k">selected="selected"</if> value="{$k}">{$v}</option>
                </volist>
                </select>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-3 scrzgmc">处理状态:&nbsp; </div>
              <div class="col-xs-8 hjuli chuli{$vo['id']}">
              	<label><input  name="zlflsts4{$vo['id']}" <eq name="vo['process_state']" value="1">checked="checked"</eq> type="radio" value="1" />未处理</label>
              	<label><input  name="zlflsts4{$vo['id']}" <eq name="vo['process_state']" value="2">checked="checked"</eq> type="radio" value="2" />已处理</label>
              	&nbsp;&nbsp;&nbsp;&nbsp;如果您确认"已处理"，系统将自动为您计算下一年的年费。
              </div>
            </div>
            <input type="hidden" name="zlflsts5{$vo['id']}" class="form-control shouldtime{$vo['id']}" value="{$vo['should']|date='Y-m-d',###}"/>
          </div>
        </form>
        <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks clocks2{$vo['id']}" onclick="nfqdan('{$vo[id]}','{$vo[pmid]}','{$vo[patentnum]}',this);">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao{$vo['id']}">取消</a></div>
      </div>
      <!--年费监控弹框-->
      <!--费用管家弹框-->
      <div id="zzjs_net{$vo['id']}" class="zzjs_net"></div>
      <div id="posts3{$vo['id']}" class="patupianss patupiansst">
        <div class="quxiaoss quxiaoss{$vo['id']}"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
        <p>费用管家</p>
        <form class="form-horizontal" id="paforms3{$vo['id']}">
          <div class="col-xs-12 detailtable dashborders">
            <div class="form-group zllefttt">
              <div class="col-xs-2 scrzgmc zltitiss">专利号/申请号:&nbsp; </div>
              <div class="col-xs-8 ">
                <input type="text" disabled="disabled"  class="form-control" name="zlh" value="{$vo['patentnum']}" />
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">正常申请费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']}  sqf{$vo['id']}" name="sqf" value="{$vo['reg_fee']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">授权登印费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} dyf{$vo['id']}" name="dyf" value="{$vo['acc_fee']}" />
                </div>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">超权费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} cqf{$vo['id']}" name="cqf" value="{$vo['sup_acc_fee']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">代理费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} dlf{$vo['id']}" name="dlf" value="{$vo['agent_fee']}" />
                </div> 
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">有减缓官费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control toth{$vo['id']} tots jhf{$vo['id']}" name="jhf" value="{$vo['cut_fee']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">其他费用:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control tots{$vo['id']} qtf{$vo['id']}" name="qtf" value="{$vo['else_fee']}" />
                </div>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">已维持年数:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" class="form-control toty wns{$vo['id']}" id="year{$vo['id']}" name="wns" value="{$vo['years']}" />
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">总维持费:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text" disabled="disabled"  class="form-control tots{$vo['id']} wcf{$vo['id']}" name="wcf" id="feiyon{$vo['id']}" placeholder="自动计算费用"  value="{$vo['total_fee']}"  />
                </div>
              </div>
            </div>
            <div class="form-group zllefttt">
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">总计费用:&nbsp; </div>
                <div class="col-xs-8 ">
                  <input type="text"  disabled="disabled" class="form-control zfy{$vo['id']}" name="zfy" id="zoji{$vo['id']}" value="{$vo['total_price']}">
                </div>
              </div>
              <div class="col-xs-6">
                <div class="col-xs-3 scrzgmc">
                  <button type="button" class="btn btn-primary" id="jisuan{$vo['id']}" onClick="jisuan('{$vo[id]}',this);">计算</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks clocks3{$vo['id']}" onclick="fygjan('{$vo[id]}','{$vo[pmid]}','{$vo[patentnum]}',this);">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao{$vo['id']}">取消</a></div>
      </div>
      <!--费用管家弹框-->
      <!--文件上传弹框-->
      <div id="zzjs_net{$vo['id']}" class="zzjs_net"></div>
      <div id="posts4{$vo['id']}" class="patupianss patupiansst">
        <div class="quxiaoss quxiaoss{$vo['id']}"><a href="javascript:void(0)" ><img src="<?php echo STATIC_V2;?>images/quxiaosstt.jpg"/></a></div>
        <p>文件上传</p>
        <form method="post" class="form-horizontal fileuplode{$vo['id']}" action="{:U('MyPatent/fileUpload')}" enctype="multipart/form-data" target='frameFile'>
          <div class="col-xs-12 detailtable dashborders">
            <div class="form-group zllefttt">
            <div class="col-xs-2 scrzgmc ">文件上传:&nbsp; </div>
              <div class="col-xs-8 ">
                <input type='text' id="hstextfields2{$vo['id']}" class='txt' placeholder="文件上传"/>
                <input type='button' class='btnt' value='批量上传...' />
                <input type="hidden" name="id" value="{$vo['id']}"/>
                <input type="hidden" name="mid" value="{$vo['pmid']}"/>
                <input type="hidden" name="pn" value="{$vo['patentnum']}"/>
                <input type="file" name="img{$vo['id']}[]" class="file" onClick="fileuplode('{$vo['id']}',this)" multiple="multiple" onChange="document.getElementById('hstextfields2{$vo['id']}').value=this.value" />
              </div>
            </div>
          </div>
        </form>
        <iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
        <div id="zltulistkk{$vo['id']}">
          <form class="form-horizontal" id="paforms4{$vo['id']}">
            <div class="col-xs-12 detailtable dashborders" >
              <div class="col-xs-12 fbtjlist zltulist{$vo['id']}" >
              <volist name="vo['pic']" id="v">
              <span>
                <div class="zltulistt zltulisttss wjtp{$v['id']}"> 
                  <img src="{$v['url']}"/>
                  <input type="hidden" value="{$v['id']}" name="picid{$v['id']}">
                  <div class="form-group zllefttt">
                    <div class="col-xs-offset-1 col-xs-10">
                   <input type="text" class="form-control" name="picname" value="{$v['name']}">
                    </div>
                  </div>
                  <div class="zldels" onClick="delPics('{$v[id]}')"><span rel="{$v['id']}">×</span></div>
                </div>
              </span>
              </volist>
              </div>
            </div>
          </form>
          <div class="col-xs-12 paquyu1ss"><a href="javascript:void(0)" class="btn btn-primary clocks clocks4{$vo['id']}" onclick="scwjqd('{$vo[id]}','{$vo[pmid]}',this);">确定</a> <a href="javascript:void(0)" class="btn btn-default quxiao quxiao{$vo['id']}">取消</a></div>
        </div>
      </div>
      </volist>
  <else/>
	  <div class="add_zl paform" style="padding:120px 0 0 0;">
		<p>您还没有添加任何数据哦，赶快去添加吧!<a href="{:U('MyPatent/addpatent')}" class="btn btn-primary">去添加</a></p>
	  </div>
  </notempty>
      <!--文件上传弹框-->
      <include file='Public:footer'/>
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
/*图片放大功能*/ 
/* $(function(){	
	$("area[rel^='prettyPhoto']").prettyPhoto();
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
}) */
/*图标交易功能*/
$('.jy').click(function(){
	$.MsgBoxgj.Confirm("温馨提示","您加入交易库中的商品需要到“卖家中心 > 我的商品”中查看，立即去查看！",function (){
		window.open("{:U('Member/Seller/sell_list',array('tmpa'=>2))}");
	});
})
/*一键缴费*/
$('.yjjf').click(function(){
	$.MsgBoxgj.Confirm("温馨提示","您确定要一键添加到缴费清单中？",function (){
		$.post("{:U('MyPatent/addallList')}",function(data){
			if(data){
				$.MsgBoxgj.Alerta("温馨提示：",data,function(){
					window.location.reload();
				});
			}else{
				$.MsgBoxgj.Alert("温馨提示：",'添加失败！原因：您已添加过，请勿重复添加！');
			}	
		});
	});
});
/* 单条数据添加缴费清单列表  */
function addlist(id,pmid,obj){
	var parameter={'pmid':pmid};
	$.post("{:U('MyPatent/addoneList')}",parameter,function(data){
		if(data){
			$.MsgBoxgj.Alert('温馨提示','添加成功！');
			$('.jrqd'+id).text('已加入清单');	
		}else{
			$.MsgBoxgj.Alert('温馨提示','添加失败！');	
		}		
	});
};

/* 修改法律状态信息  */
function flqd(id,ptn,obj){
	var date;
	var status;
	var detail;
	var row = new Array();
	var arr = new Array();
	var i=0;
	var gid = '{$Think.get.id}';
	$("#addTr"+id).find("tr").each(function(){
        var tdArr = $(this).children();
        var did = tdArr.eq(0).find("input").val();//收入类别
        var tid = id;
        var ptno = tdArr.eq(1).find("input").val();//收入类别
        var date = tdArr.eq(2).find("input").val();//收入类别
        var status = tdArr.eq(3).find("input").val();//收入金额
        var detail = tdArr.eq(4).find("input").val();//备注
        arr[i] = did+','+tid+','+ptno+','+date+','+status+','+detail;
        i++;
    });
	var parameter={'field':arr,'pt':ptn};
	$.post("{:U('MyPatent/editLegal')}",parameter,function(data){
		if(data){
			$('.lsf'+id).html(data);	
		}
	});
} 

/* 上传证件确定功能 */
function scwjqd(id,pid,obj){
	var row = new Array();
	var arr = new Array();
	var i=0;
	var gid = '{$Think.get.id}';
	$(".zltulist"+id).find(".zltulisttss").each(function(){
        var tdArr = $(this).children();
        var picid = $(this).find("input").eq(0).val();//图片id
        var picname = $(this).find("input").eq(1).val();//图片名称
        arr[i] = picid+','+picname;
        i++;
    });
	var parameter={'field':arr,'pid':pid,'id':id};
	$.post("{:U('MyPatent/editFile')}",parameter,function(data){
		if(data){
			$('.fbtjfile'+id).html(data);
		}else{
			window.location.href = window.location.href+'id/'+id;	
		}
	});
}

/*文件弹出框删除证书 */
function delPics(ids){
	var send_data={'id':ids};
	$.post("{:U('MyPatent/delFile')}",send_data,function(data){
		$('.wjtp'+ids).remove();
	})
}
/*文件管理 删除证书 */
function delPic(ids){
	var send_data={'id':ids};
	$.post("{:U('MyPatent/delFile')}",send_data,function(data){
		$('.wjtp'+ids).remove();
	})
}
/*点击文件打开按钮自动提交图片*/
function fileuplode(id,obj){
	$(obj).change(function(){
		$('.fileuplode'+id).submit();
	});
}
/* 文件上传功能 */
function plsc(id,pid,name,image){
	var strs = new Array(); //定义一数组
	var str = new Array(); //定义一数组
	var str1 = new Array(); //定义一数组
	var str2 = new Array(); //定义一数组
	var str3 = new Array(); //定义一数组
	var str4 = new Array(); //定义一数组
	var str5 = new Array(); //定义一数组
	strs = image.split(",");
	str1 = name.split(",");
	str2 = pid.split(",");
	for(i=0;i<strs.length ;i++ ){ 
		str+='<div class="zltulistt zltulisttss wjtp'+str2[i]+'"><img src="'+strs[i]+'"/><input type="hidden" value="'+str2[i]+'" name="picid'+str2[i]+'"><div class="form-group zllefttt"><div class="col-xs-offset-1 col-xs-10 "><input type="text" class="form-control" name="picname[]" value="'+str1[i]+'"></div></div><div class="zldels" onClick=delPics("'+str2[i]+'")><span rel="'+str2[i]+'">×</span></div></div>';
	}
	for(i=0;i<strs.length ;i++ ){ 
		str5+='<div class="zltulistt wjtp'+str2[i]+'"><a href="'+strs[i]+'" rel="prettyPhoto[]"><img src="'+strs[i]+'"/></a>'+str1[i]+'<div class="zldels" onClick=delPics("'+str2[i]+'")><span rel="'+str2[i]+'">×</span></div></div>';
	}
	str3+='<div class="gallery">';
	str3+=str5;
	str3+='<div class="pic_prev"></div><div class="pic_next"></div></div>';
	str4 = str3+'<div class="zltulistt"><div class="zltianjia"><a href="javascript:;" onClick=posts4('+"'"+id+"'"+','+"'"+'posts4'+id+"'"+');><img src="<?php echo STATIC_V2;?>images/addzshu.jpg"/></a></div>上传证书 </div>';

	$('.zltulist'+id).html(str);
	$('.fbtjfile'+id).html(str4);
}
/* 费用管家修改 */
function fygjan(id,pid,pnm,obj){
	var gid = '{$Think.get.id}';
	var parameter = {};
	parameter['pid'] = pid;
	parameter['pnm'] = pnm;
	parameter['sqf'] = $('.sqf'+id).val();
	parameter['dyf'] = $('.dyf'+id).val();
	parameter['cqf'] = $('.cqf'+id).val();
	parameter['dlf'] = $('.dlf'+id).val();
	parameter['jhf'] = $('.jhf'+id).val();
	parameter['qtf'] = $('.qtf'+id).val();
	parameter['wns'] = $('.wns'+id).val();
	parameter['wcf'] = $('.wcf'+id).val();
	parameter['zfy'] = $('.zfy'+id).val();
	$.post("{:U('MyPatent/editCost')}",parameter,function(data){
		$('.costm'+id).html(data);
	});
}

/* 年费监控修改  */
function nfqdan(id,pid,pnm,obj){
	var gid = '{$Think.get.id}';
	var parameter = {};
	parameter['pid'] = pid;
	parameter['pnm'] = pnm;
	parameter['zlflsts1'] = $('.niandu'+id).val();//应缴年度
	parameter['zlflsts2'] = $('.jianhuan'+id).val();//减缓比列
	parameter['zlflsts3'] = $('.zhina'+id).val();//滞纳时间
	parameter['zlflsts4'] = $('input[name="zlflsts4'+id+'"]:checked').val();//处理状态
	parameter['zlflsts5'] = $('.shouldtime'+id).val();//应缴日期
	$.post("{:U('MyPatent/editAnnual')}",parameter,function(data){
		$('.ananul'+id).html(data);
	});
}

/*年费监控 应缴年度下拉功能 */
function yjnd(id,pn,obj){
	var num = $(".niandu"+id+" option:selected").val();
	var parameter = {'pn':pn,'num':num};
	$.post("{:U('MyPatent/nianDu')}",parameter,function(data){
		if(data){
			$('.shouldtime'+id).attr('value',data);
		}else{
			$.MsgBoxgj.Alert('温馨提示','操作失败！');	
		}
	});
}

/*添加法律状态*/
 
function tjan(id,ptno,obj){
	var i=1;
	var contents=' ';
	contents+="<tr>";
	contents+="<td width="+'20%'+" style="+'display:none;'+"><input type="+'hidden'+" value='' /></td>";
	contents+="<td width="+'20%'+" style="+'display:none;'+"><input type="+'hidden'+" value="+ptno+" /></td>";
	contents+="<td width="+'20%'+"><input type="+'text'+" value='' /></td>";
	contents+="<td width="+'20%'+"'><input type='"+'text'+"' value='' /></td>";
	contents+="<td width="+'60%'+"><input type="+'text'+" value='' /></td>";
	contents+="</tr>";
	$('#addTr'+id).append(contents);
	i++;
}

/* 单个交易管理 加入交易库  */
function onebttrade(pnm,pid,id,obj){
	$.MsgBoxgj.Prompt('温馨提示','您已选择1件专利,加入7号网平台交易,如果您暂未填写交易价格，系统将为您自动设为“面议”，填写价格：',function(tradeprice){
	    if(!isNaN(tradeprice)){
	    	var send_data={'pnm':pnm,'id':pid,'price':tradeprice};
	    	$.post("{:U('MyPatent/onetrademypatent')}",send_data,function(data){
		    	if(data){
		    		$('.tds'+id).html('<img title="该专利已加入交易库" src="/qihaov2/images/sell.png">');
		    		$(obj).parent().next().find('.zljrjyks').remove();
		    		$('.tjjyk'+pid).remove();
		    		var ptno = $('#ptno').val();
		    		var contents='';
		    		contents+="<div class='zljrjyks tjjyk'"+pid+">";
		    		contents+="该专利已加入交易库，立即<span><a href='{:U('Member/Seller/sell_list',array('tmpa'=>'2'))}' title='查看交易库' target='_blank' >查看交易库</a>，若在交易库中没找到该专利，请稍后刷新重试！</span>";
		    		contents+="</div>";
		    		$(obj).parent().next().append(contents);
			    	$(obj).remove();
			    	$.MsgBoxgj.Alert('温馨提示','交易成功！');
		    	}
	    	})
	    }else {
	    	$.MsgBoxgj.Alert('温馨提示','交易失败！');
	    	return false;
	    }
	});
};

/* 文字加入交易库  */
function onetxtrade(pnm,pid,id,obj){
	$.MsgBoxgj.Prompt('温馨提示','您已选择1件专利,加入7号网平台交易,如果您暂未填写交易价格，系统将为您自动设为“面议”，填写价格：',function(tradeprice){
	    if(!isNaN(tradeprice)){
	    	var send_data={'pnm':pnm,'id':pid,'price':tradeprice};
	    	$.post("{:U('MyPatent/onetrademypatent')}",send_data,function(data){
	    		$('.tds'+id).html('<img title="该专利已加入交易库" src="/qihaov2/images/sell.png">');
	    		$(obj).parent().prev().find('.zltabaction').remove();
	    		$('.tjjyk'+id).remove();
	    		var ptno = $('#ptno').val();
	    		var contents='';
	    		contents+="<div class='zljrjyks tjjyk'"+id+">";
	    		contents+="该专利已加入交易库，立即<span><a href='{:U('Member/Seller/sell_list',array('tmpa'=>'2'))}' title='查看交易库' target='_blank'>查看交易库</a>，若在交易库中没找到该专利，请稍后刷新重试！</span>";
	    		contents+="</div>";
	    		$('.jrjy'+id).append(contents);
		    	$.MsgBoxgj.Alert('温馨提示','交易成功！');
	    	})
	    }else {
	    	$.MsgBoxgj.Alert('温馨提示','交易失败！');
	    	return false;
	    }
	});
}

/*一键交易*/
function jiansouth(){
	var num = $("input[name*='gwctt']:checked").length;
	$.MsgBoxgj.Prompt('温馨提示','您已选择'+num+'件专利加入7号网平台交易，由于您暂未填写交易价格，系统将为您自动设为“面议”',function(tradeprice){
	    if(!isNaN(tradeprice) && tradeprice != null){
	    	var send_data={'price':tradeprice};
	    	$.post("{:U('MyPatent/allTrade')}",send_data,function(data){
	    		$.MsgBoxgj.Alerta("温馨提示：",data,function(){
	    			window.location.reload();
		    	});
	    	})
	    }else {
	    	$.MsgBoxgj.Alert("温馨提示：",'非法字符');
	    	return false;
	    }
	});
}

/* 一键删除 yjsc */
$('.yjsc').click(function(){
	$.MsgBoxgj.Confirm("温馨提示","您确定要删除所有的专利？",function (){
		$.post("{:U('MyPatent/allDel')}",function(data){
			if(data){
				$.MsgBoxgj.Alerta("温馨提示：",data,function(){
					window.location.reload();
				});
			}
		});
	});
});

/*选择显示页数*/
$('.xianshit').change(function(){
	var pse = $(".xianshit  option:selected").val();
	var parameter = {'pse':pse};
	$.post("{:U(MyPatent/mypatentdb)}",parameter,function(data){
		if(data){
			window.location.reload();
		}
	});
})

/*上传成功后显示图片*/
function uploadSuccess(msg) {
	var re = msg.split('|');
    if (re[0] == 'success') {
		$('#zltulistkk').html(rel[1]);
	} else {
		alert(re[1]);
	}
}
/*上传成功后显示图片*/

/* 正常申请费 授权登印费 超权费 代理费 有减缓官费 其他费用  */
$(".form-control").focus(function(){
	if($(this).attr('value') == '0.00'){
		$(this).attr("value","");
	}
}).blur(function(){
	if($(this).attr('value') == ''){	
		$(this).attr("value",'0.00');
	}
});

/* 已维持年数 */
$(".toty").focus(function(){
	if($(this).attr('value') == '0'){
		$(this).attr("value","");
	}
}).blur(function(){
	if($(this).attr('value') == ''){
		$(this).attr("value",'0');
	}
});

var money="";
var type=1;
var fee =new Array('900','900','900','900','1200','1200','1200','2000','2000','2000','4000','4000','4000','6000','6000','6000','8000','8000','8000','8000','8000');
var fees =new Array('600','600','600','600','900','900','1200','1200','1200','2000','2000');
var weichifeis=0;
var totals=0;

function jisuan(id,obj){
	weichifeis=0;
	totals=0;
	money=$('#year'+id).val();
	weichifei();
	$('#feiyon'+id).val(weichifeis);
	total(id);
	$('#zoji'+id).val(totals);
}

/* $('#year').change(function(){
	weichifeis=0;
	totals=0;
	money=$('#year').val();
	weichifei();
	$('#feiyon').val(weichifeis);
	total();
	$('#zoji').val(totals)
}) */

function total(id){
	$('input[class*=tots'+id+']').each(function(){	
		totals+=parseFloat($(this).val());	
	})
	totals-=$('.toth'+id).val();
	//alert(totals);
}

function weichifei(){
	if(type==1){
		if(money<21){
			for(i=1;i<=money;i++){
	    		weichifeis+=parseFloat(fee[i]);
			}
		}else{
			alert('已超出维持年限，请重新输入!');
		}
	}else if(type==2){
		if(money<11){
			for(i=1;i<=money;i++){
		    	weichifeis+=parseFloat(fees[i]);
			}
		}else{
			alert('已超出维持年限，请重新输入!');
		}
	}else{
		if(money<11){
			for(i=1;i<=money;i++){
		    	weichifeis+=parseFloat(fees[i]);
			}
		}else{
			alert('已超出维持年限，请重新输入!');
		}
	}
}
/*费用计算*/

/*查看全部弹出功能*/
function tuijianclicks(id,obj){
	$('.flzt'+id).css('display','block');
	$('.nfjk'+id).css('display','block');
	$('.fygl'+id).css('display','block');
	$('.wjgl'+id).css('display','block');
	$('.jygl'+id).css('display','block');
	var mark = $(obj).attr('mark');//获取当前按钮状态
	var pubmark = $(obj).parents('tr').next('.my_open').attr('pubmark');//获取当前按钮下的内容是否打开
	$('.my_open').slideUp('show');//把所有内容隐藏
	$('.anmark').attr('mark','1');//把所有的按钮状态标记为隐藏
	if(mark == 1&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}else if(mark == 2&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','1');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 2&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 1&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}			
}
/*查看全部弹出功能*/

/*显示法律状态*/
function flzt(id,obj){
	$('.flzt'+id).css('display','block');
	$('.nfjk'+id).css('display','none');
	$('.fygl'+id).css('display','none');
	$('.wjgl'+id).css('display','none');
	$('.jygl'+id).css('display','none');
	var mark = $(obj).attr('mark');//获取当前按钮状态
	var pubmark = $(obj).parents('tr').next('.my_open').attr('pubmark');//获取当前按钮下的内容是否打开
	$('.my_open').slideUp('show');//把所有内容隐藏
	$('.anmark').attr('mark','1');//把所有的按钮状态标记为隐藏
	if(mark == 1&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}else if(mark == 2&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','1');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 2&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 1&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}	
}

/*开启或关闭法律状态弹框*/
function posts(id,classname){
	$('#posts'+id).css('display','block');
	$('#zzjs_net'+id).css('display','block');
	$(document.body).css("overflow","hidden");
	
	$('.quxiaoss'+id+' a').click(function(){
		$('#posts'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');
	});
	
	$('.quxiao'+id).click(function(){
		$('#posts'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});

	$('.paquyu1ss .clocks1'+id).click(function(){
		$('#posts'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});
};
/*开启或关闭法律状态弹框*/

/*显示年费监控管理*/
function nfjk(id,obj){
	$('.flzt'+id).css('display','none');
	$('.nfjk'+id).css('display','block');
	$('.fygl'+id).css('display','none');
	$('.wjgl'+id).css('display','none');
	$('.jygl'+id).css('display','none');
	var mark = $(obj).attr('mark');//获取当前按钮状态
	var pubmark = $(obj).parents('tr').next('.my_open').attr('pubmark');//获取当前按钮下的内容是否打开
	$('.my_open').slideUp('show');//把所有内容隐藏
	$('.anmark').attr('mark','1');//把所有的按钮状态标记为隐藏
	if(mark == 1&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}else if(mark == 2&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','1');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 2&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 1&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}
}

/*开启或关闭年费监控弹框*/
function posts2(id,classname){
	$('#posts2'+id).css('display','block');
	$('#zzjs_net'+id).css('display','block');
	$(document.body).css("overflow","hidden");
	
	$('.quxiaoss'+id+'  a').click(function(){
		$('#posts2'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');
	});
	
	$('.quxiao'+id).click(function(){
		$('#posts2'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});

	$('.paquyu1ss .clocks2'+id).click(function(){
		$('#posts2'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});
};
/*开启或关闭年费监控弹框*/

/*显示费用管理*/
function fygl(id,obj){
	$('.flzt'+id).css('display','none');
	$('.nfjk'+id).css('display','none');
	$('.fygl'+id).css('display','block');
	$('.wjgl'+id).css('display','none');
	$('.jygl'+id).css('display','none');
	var mark = $(obj).attr('mark');//获取当前按钮状态
	var pubmark = $(obj).parents('tr').next('.my_open').attr('pubmark');//获取当前按钮下的内容是否打开
	$('.my_open').slideUp('show');//把所有内容隐藏
	$('.anmark').attr('mark','1');//把所有的按钮状态标记为隐藏
	if(mark == 1&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}else if(mark == 2&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','1');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 2&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 1&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}
}

/*开启或关闭费用管家弹框*/
function posts3(id,classname){
	$('#posts3'+id).css('display','block');
	$('#zzjs_net'+id).css('display','block');
	$(document.body).css("overflow","hidden");
	
	$('.quxiaoss'+id+'  a').click(function(){
		$('#posts3'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');
	});
	
	$('.quxiao'+id).click(function(){
		$('#posts3'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});

	$('.paquyu1ss .clocks3'+id).click(function(){
		$('#posts3'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});
};
/*开启或关闭费用管家弹框*/

/*显示文件管理*/
function wjgl(id,obj){
	$('.flzt'+id).css('display','none');
	$('.nfjk'+id).css('display','none');
	$('.fygl'+id).css('display','none');
	$('.wjgl'+id).css('display','block');
	$('.jygl'+id).css('display','none');
	var mark = $(obj).attr('mark');//获取当前按钮状态
	var pubmark = $(obj).parents('tr').next('.my_open').attr('pubmark');//获取当前按钮下的内容是否打开
	$('.my_open').slideUp('show');//把所有内容隐藏
	$('.anmark').attr('mark','1');//把所有的按钮状态标记为隐藏
	if(mark == 1&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}else if(mark == 2&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','1');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 2&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 1&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}
}

/*开启或关闭上传文件弹框*/
function posts4(id,classname){
	$('#posts4'+id).css('display','block');
	$('#zzjs_net'+id).css('display','block');
	$(document.body).css("overflow","hidden");
	
	$('.quxiaoss'+id+'  a').click(function(){
		$('#posts4'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');
	});
	
	$('.quxiao'+id).click(function(){
		$('#posts4'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});

	$('.paquyu1ss .clocks4'+id).click(function(){
		$('#posts4'+id).css('display','none');
		$('#zzjs_net'+id).css('display','none');
		$(document.body).css('overflow','visible');	
	});
};
/*开启或关闭上传文件弹框*/

/*显示加入交易管理*/
function jyk(id,obj){
	$('.flzt'+id).css('display','none');
	$('.nfjk'+id).css('display','none');
	$('.fygl'+id).css('display','none');
	$('.wjgl'+id).css('display','none');
	$('.jygl'+id).css('display','block');
	var mark = $(obj).attr('mark');//获取当前按钮状态
	var pubmark = $(obj).parents('tr').next('.my_open').attr('pubmark');//获取当前按钮下的内容是否打开
	$('.my_open').slideUp('show');//把所有内容隐藏
	$('.anmark').attr('mark','1');//把所有的按钮状态标记为隐藏
	if(mark == 1&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}else if(mark == 2&&pubmark=='2'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','1');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 2&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideUp('show');
		$(obj).attr('mark','1');
	}else if(mark == 1&&pubmark=='1'){
		$('.my_open').attr('mark','1');
		$('.my_open').attr('pubmark','2');
		$(obj).parents('tr').next('.my_open').slideDown('show');
		$(obj).attr('mark','2');
	}
}

/*提示框*/
 $(function () { $("[data-toggle='tooltip']").tooltip(); });
/*提示框*/
 
/*选中数量*/
function zoushu(){
	var num=$("input[name*='gwct']:checked").length;
	$("#nums").html(num);
	}
/*选中数量*/

/*全选*/
$('#alls').click(function(){
if(this.checked){
$("#tablesths").find("input[name*='gwctt']").prop("checked",true);
}else{
$("#tablesths").find("input[name*='gwctt']").removeAttr("checked");
}
zoushu();
})
$(".tablesths input[name*='gwct']").click(function(){
if(!(this.checked)){
$('#alls').removeAttr("checked");
}
zoushu();
})
/*全选*/

/*批量删除*/
$('.adddel').click(function(){
		var num = $("input[name*='gwctt']:checked").length;
		$.MsgBoxgj.Confirm("温馨提示","您确定要取消添加选中的"+num+"件专利？",function (){
			var row=new Array();
			var str = new Array();
			var n=0;
			var ctc = 0;
			$("input[name*='gwctt']").each(function(){
				if(this.checked){
					ctc = $(this).attr("name");
					$("input[name='"+ctc+"']").each(function(){
						var ids=$(this).val();
						row[n]=ids;
						n++;
					})
				}
			})
			rows = row.join(",");
			var send_data={'id':rows};
			$.post("{:U('MyPatent/batchDel')}",send_data,function(data,status){
				if (data){
					window.location.reload();
				}
			});
		});		
	});
/*批量删除*/

/*批量交易*/
$('.paadd').click(function(){
	var num = $("input[name*='gwctt']:checked").length;
	$.MsgBoxgj.Confirm("温馨提示","您已选择"+num+"件专利加入7号网平台交易，由于您暂未填写交易价格，系统将为您自动设为“面议”，请到“卖家中心>我的商品“中修改价格！",function (){
		var row=new Array();
		var str = new Array();
		var n=0;
		var ctc = 0;
		$("input[name*='gwctt']").each(function(){
			if(this.checked){
				ctc = $(this).attr("name");
				$("input[name='"+ctc+"']").each(function(){
					var ids=$(this).val();
					row[n]=ids;
					n++;
				})
			}
		})
		rows = row.join(",");
		var send_data={'id':rows};
		$.post("{:U('MyPatent/bulkTrade')}",send_data,function(data,status){
			if (data){
				$.MsgBoxgj.Alert("温馨提示：",'交易成功！');
			}else{
				$.MsgBoxgj.Alert("温馨提示：",'交易失败！');
			}	
		});
	});
});
/*批量交易*/

/*单个删除*/
function del(id,pt,obj){
	var send_data={'id':id,'pt':pt};
	$.post("{:U('MyPatent/delmypatentdb')}",send_data,function(data){
		if(data){
			$.MsgBoxgj.Alert("温馨提示：",data);
			$(obj).parent().parent().next().remove();
			$(obj).parent().parent().remove();
		}
	})		
}
/*单个删除*/

/*导航切换*/
$(".newhnavlist li").hover(function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-4;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'s.png');
}
},function(){
if(!$(this).find('a').hasClass('selnav')){
var tu=$(this).find('img').attr('src');
var len=tu.length;
len=len-5;
tu=tu.substring(0,len);
$(this).find('img').attr('src',tu+'.png');
}
}
)
/*导航切换*/
$(document).ready(function(){
$(".tablesths tr:odd").css('background','#F5F5F5');
$(".tablesths .zljjtable tr").css('background','#ffffff');
});
/*鼠标放上后tr改变颜色*/
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

$(function(){
	$(".hconlefts dt").click(function(){ 
	$(this).parent().children('dd').slideToggle("slow");
    $(this).parent().siblings('dl').children('dd').siblings("dd:visible").slideUp("slow");
	});
	
	$('.dakaiones').slideToggle("slow");
});

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
