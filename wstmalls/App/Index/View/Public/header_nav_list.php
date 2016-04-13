<div class="thrwid shop_navs">
    <div class="thrfloor1 shop_navs_cont">
      <div class="shop_navs_left shop_list_hover"> <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'"> 商城热门分类 <else/> 热门分类</if> 
      <!-- 导航分类 -->
      <div class="goods_shop goods_shop_display">
         <?php if($data['nav_type']==1):?>
        <!-- 商标热门分类 -->
          <div class="goods_shopt">
            <h2><a href="javascript:void(0)"><span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span> 商标热门分类</a></h2>
          </div>
          <div class="all-goods_shop goods_sb">
	         <volist name="data['tmcategory']" id="vo" key="k">
	            <div class="item <if condition="$k eq '1'">btnone</if>">
	              <div class="product">
	              <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
	                <h4><a href="<?php echo U('shop/type'.$vo['id'])?>" target="_blank">{$vo['name']}</a></h4>
	              <else/>
	              	<h4><a href="<?php echo U('trademark/type'.$vo['id'])?>" target="_blank">{$vo['name']}</a></h4>
	              </if>
	              </div>
	             <notempty name="vo['subclass']">
	              <div class="product-wrap <if condition="$k eq '1'">posone<elseif condition="$k eq '2'"/>postwo<elseif condition="$k eq '3'"/>posthree<elseif condition="$k eq '4'"/>posfour<elseif condition="$k eq '5'"/>posfive<elseif condition="$k eq '6'"/>possix<elseif condition="$k eq '7'"/>posseven<elseif condition="$k eq '8'"/>poseight</if> erji_shop">
	                	<volist name="vo['subclass']" id="v">
	                	<div class="col-xs-12 erjist">
		                	 <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
			                	<span><a href="<?php create_url('shop',array('groupid'=>$vo['id'],'groupid2'=>$v['id']))?>" target="_blank">{$v['name']}</a></span>
			                 <else/>
			                 	<span><a href="<?php create_url('trademark',array('groupid'=>$vo['id'],'groupid2'=>$v['id']))?>" target="_blank">{$v['name']}</a></span>
			                 </if>	
		                	<volist name="v['lowclass']" id="vi">
		                	<if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
		                		<a href="<?php create_url('shop',array('groupid'=>$vo['id'],'groupid2'=>$v['id'],'groupid3'=>$vi['id']))?>" target="_blank">{$vi['name']}</a>
		                	<else/>
		                		<a href="<?php create_url('trademark',array('groupid'=>$vo['id'],'groupid2'=>$v['id'],'groupid3'=>$vi['id']))?>" target="_blank">{$vi['name']}</a>
		                	</if>
		                	</volist>
		                </div>
		                </volist>
	              </div>
	             </notempty> 
	            </div>
	          </volist>
                <div class="item">
                  <div class="product">
                  <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
                    <p><a href="{:U('shop/type')}" arget="_blank">更多商标分类</a></p>
                  <else/>
                      <p><a href="{:U('trademark/type')}" arget="_blank">更多商标分类</a></p>
                  </if>
                  </div>
                </div>
          </div>

          <div class="goods_shopt">
            <h2><a href="javascript:;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 专利热门分类</a></h2>
          </div>
          <div class="all-goods_shop goods_zl">
             <volist name="data['pacategory']" id="vo" key="k">
                <div class="item <eq name="k" value="1">btnone</eq>">
                  <div class="product">
                    <h4> 
                    <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'"> 
                    	<a href="__APP__/shop/patnetlist/list{$vo['id']}HTMLSUFFIX" target="_blank">{$vo['name']}</a>
                    <else/>
                    	<a href="__APP__/patent/list{$vo['id']}HTMLSUFFIX" target="_blank">{$vo['name']}</a>
                    </if>
                    </h4>
                  </div>
                 <notempty name="vo['subclass']">
                  <div class="product-wrap <if condition="$k eq '1'">posone<elseif condition="$k eq '2'"/>postwo<elseif condition="$k eq '3'"/>posthree<elseif condition="$k eq '4'"/>posfour<elseif condition="$k eq '5'"/>posfive<elseif condition="$k eq '6'"/>possix<elseif condition="$k eq '7'"/>posseven<elseif condition="$k eq '8'"/>poseight</if> erji_shop">
                    <volist name="vo['subclass']" id="v">
                        <div class="col-xs-12 erjist">
                            <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'"> 
                                <span><a href="__APP__/shop/patnetlist/list{$v['id']}HTMLSUFFIX" target="_blank">{$v['name']}</a></span>
                            <else/>
                                <span><a href="__APP__/patent/list{$v['id']}HTMLSUFFIX" target="_blank">{$v['name']}</a></span>
                            </if>
                            <volist name="v['lowclass']" id="vi">
                            <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'"> 
                                <a href="__APP__/shop/patnetlist/list{$vi['id']}HTMLSUFFIX" target="_blank">{$vi['name']}</a>
                            <else/>
                                <a href="__APP__/patent/list{$vi['id']}HTMLSUFFIX" target="_blank">{$vi['name']}</a>
                            </if>
                            </volist>
                        </div>
                    </volist>
                  </div>
                 </notempty>
                </div>
             </volist>
                <div class="item">
                  <div class="product">
                  <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
                    <p><a href="{:U('shop/patnetlist')}" target="_blank">更多专利分类</a></p>
                  <else/>
                      <p><a href="__APP__/patent/listHTMLSUFFIX" target="_blank">更多专利分类</a></p>
                  </if>
                  </div>
                </div>
          </div>
          <?php endif?>
           <?php if($data['nav_type']==2):?>
          <!-- 商标热门分类 -->
          <div class="all-goods_shop goods_sb">
	         <volist name="data['tmcategory']" id="vo" key="k">
	            <div class="item <if condition="$k eq '1'">btnone</if>">
	              <div class="product">
	              <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
	                <h4><a href="<?php echo U('shop/type'.$vo['id'])?>" target="_blank">{$vo['name']}</a></h4>
	              <else/>
	              	<h4><a href="<?php echo U('trademark/type'.$vo['id'])?>" target="_blank">{$vo['name']}</a></h4>
	              </if>
	              </div>
	             <notempty name="vo['subclass']">
	              <div class="product-wrap <if condition="$k eq '1'">posone<elseif condition="$k eq '2'"/>postwo<elseif condition="$k eq '3'"/>posthree<elseif condition="$k eq '4'"/>posfour<elseif condition="$k eq '5'"/>posfive<elseif condition="$k eq '6'"/>possix<elseif condition="$k eq '7'"/>posseven<elseif condition="$k eq '8'"/>poseight</if> erji_shop">
	                	<volist name="vo['subclass']" id="v">
	                	<div class="col-xs-12 erjist">
		                	 <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
			                	<span><a href="<?php create_url('shop',array('groupid'=>$vo['id'],'groupid2'=>$v['id']))?>" target="_blank">{$v['name']}</a></span>
			                 <else/>
			                 	<span><a href="<?php create_url('trademark',array('groupid'=>$vo['id'],'groupid2'=>$v['id']))?>" target="_blank">{$v['name']}</a></span>
			                 </if>	
		                	<volist name="v['lowclass']" id="vi">
		                	<if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
		                		<a href="<?php create_url('shop',array('groupid'=>$vo['id'],'groupid2'=>$v['id'],'groupid3'=>$vi['id']))?>" target="_blank">{$vi['name']}</a>
		                	<else/>
		                		<a href="<?php create_url('trademark',array('groupid'=>$vo['id'],'groupid2'=>$v['id'],'groupid3'=>$vi['id']))?>" target="_blank">{$vi['name']}</a>
		                	</if>
		                	</volist>
		                </div>
		                </volist>
	              </div>
	             </notempty> 
	            </div>
	          </volist>
            <div class="item">
              <div class="product">
                <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
                    <p><a href="{:U('shop/type')}" arget="_blank">更多商标分类</a></p>
                  <else/>
                      <p><a href="{:U('trademark/type')}" arget="_blank">更多商标分类</a></p>
                  </if>
              </div>
            </div>
          </div>
          <!-- 商标热门分类 -->

          <?php endif?>
           <?php if($data['nav_type']==3):?>
          <div class="all-goods_shop all-goods-zlindex goods_sb">
             <volist name="data['pacategory']" id="vo" key="k">
                <div class="item <eq name="k" value="1">btnone</eq>">
                  <div class="product">
                  <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
                    <h4> <a href="__APP__/shop/patnetlist/list{$vo['id']}HTMLSUFFIX" target="_blank">{$vo['name']}</a></h4>
                  <else/>
                      <h4> <a href="__APP__/patent/list{$vo['id']}HTMLSUFFIX" target="_blank">{$vo['name']}</a></h4>
                  </if>
                  </div>
                 <notempty name="vo['subclass']">
                  <div class="product-wrap <if condition="$k eq '1'">posone<elseif condition="$k eq '2'"/>postwo<elseif condition="$k eq '3'"/>posthree<elseif condition="$k eq '4'"/>posfour<elseif condition="$k eq '5'"/>posfive<elseif condition="$k eq '6'"/>possix<elseif condition="$k eq '7'"/>posseven<elseif condition="$k eq '8'"/>poseight<elseif condition="$k eq '9'"/>posnine<elseif condition="$k eq '10'"/>posten</if> erji_shop">
                    <volist name="vo['subclass']" id="v">
                        <div class="col-xs-12 erjist"> 
                            <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
                                <span><a href="__APP__/shop/patnetlist/list{$v['id']}HTMLSUFFIX" target="_blank">{$v['name']}</a></span>
                            <else/>
                                <span><a href="__APP__/patent/list{$v['id']}HTMLSUFFIX" target="_blank">{$v['name']}</a></span>
                            </if>
                            <volist name="v['lowclass']" id="vi">
                            <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
                                <a href="__APP__/shop/patnetlist/list{$vi['id']}HTMLSUFFIX" target="_blank">{$vi['name']}</a>
                            <else/>
                                <a href="__APP__/patent/list{$vi['id']}HTMLSUFFIX" target="_blank">{$vi['name']}</a>
                            </if>
                            </volist>
                        </div>
                    </volist>
                  </div>
                 </notempty>
                </div>
             </volist>
                <div class="item">
                  <div class="product">
                  <if condition=" $Think.const.CONTROLLER_NAME eq 'Shop'">
                    <p><a href="{:U('shop/patnetlist')}" target="_blank">更多专利分类</a></p>
                  <else/>
                      <p><a href="__APP__/patent/listHTMLSUFFIX" target="_blank">更多专利分类</a></p>
                  </if>
                  </div>
                </div>
          </div>
          <?php endif?>
        </div>
      </div>
      <ul>
        <volist name="data['menu']" id="vo">
          <li><a href="{$vo['link']}" title="{$vo['title']}" target="_blank" <if condition="'__SELF__' eq $vo['link']">class="shop_ons"</if>>{$vo['name']}</a></li>
        </volist>
      </ul>
    </div>
  </div>
  <!--导航-->