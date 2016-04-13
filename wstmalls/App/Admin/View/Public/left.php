        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar nav-stacked">
            <li <?php echo in_array(strtolower(CONTROLLER_NAME), ['item','items','order','supply','cart','index','zcb'])?'class="active"':''; ?>><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="glyphicon glyphicon-folder-open"></span> 商城管理</a>
            	<ul  id="collapseOne" role="tabpanel" aria-labelledby="headingOne" class="nav nav-list panel-collapse collapse <?php echo in_array(strtolower(CONTROLLER_NAME), ['item','items','order','supply','cart','index','zcb'])?'in':''; ?>">
				<li><a href="<?php echo U('Items/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 商品类别</a></li>
				<li><a href="<?php echo U('Item/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 商品管理</a></li>
				<li><a href="<?php echo U('Order/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 订单管理</a></li>
				<li><a href="<?php echo U('Supply/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 供求管理</a></li>
				<li><a href="<?php echo U('Cart/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 购物车管理</a></li>
				<li><a href="<?php echo U('Zcb/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 知产包管理</a></li>			
				</ul>
            </li>
            <li <?php echo in_array(strtolower(CONTROLLER_NAME), ['articles','article','keywords','ads','ad','shopad','comment'])?'class="active"':''; ?>><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><span class="glyphicon glyphicon-folder-open"></span> 内容管理</a>
            	<ul  id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" class="nav nav-list panel-collapse collapse <?php echo in_array(strtolower(CONTROLLER_NAME), ['articles','article','keywords','ads','ad','shopad','comment'])?'in':''; ?>">
				<li><a href="<?php echo U('Articles/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 文章类别</a></li>
				<li><a href="<?php echo U('Article/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 文章列表</a></li>
				<li><a href="<?php echo U('Keywords/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 搜索词列表</a></li>
				<li><a href="<?php echo U('Ads/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 广告位置</a></li>
				<li><a href="<?php echo U('Ad/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 广告列表</a></li>
				<li><a href="<?php echo U('Shopad/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 用户商铺广告</a></li>
				<li><a href="<?php echo U('Comment/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 评论列表</a></li>		
				</ul>
            </li>
            <li <?php echo in_array(strtolower(CONTROLLER_NAME), ['configs','config','db','pay','report'])?'class="active"':''; ?>><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><span class="glyphicon glyphicon-folder-open"></span> 系统设置</a>
               <ul  id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="nav nav-list panel-collapse collapse <?php echo in_array(strtolower(CONTROLLER_NAME), ['configs','config','db','pay','report'])?'in':''; ?>">
				<li><a href="<?php echo U('Configs/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 配置类别</a></li>
				<li><a href="<?php echo U('Config/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 配置管理</a></li>
				<li><a href="<?php echo U('Db/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 数据库</a></li>
				<li><a href="<?php echo U('Pay/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 支付管理</a></li>
				<li><a href="<?php echo U('Report/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 系统报告</a></li>		
				</ul>
            </li>
<!--           </ul> -->
<!--           <ul class="nav nav-sidebar"> -->
            <li <?php echo in_array(strtolower(CONTROLLER_NAME), ['links','link','menus','menu'])?'class="active"':''; ?>><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><span class="glyphicon glyphicon-folder-open"></span> 链接管理</a>
               <ul  id="collapseFour" role="tabpanel" aria-labelledby="headingFour" class="nav nav-list panel-collapse collapse <?php echo in_array(strtolower(CONTROLLER_NAME), ['links','link','menus','menu'])?'in':''; ?>">
				<li><a href="<?php echo U('Links/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 友情链接分类</a></li>
				<li><a href="<?php echo U('Link/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 友情链接</a></li>
				<li><a href="<?php echo U('Menus/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 导航类别</a></li>
				<li><a href="<?php echo U('Menu/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 导航列表</a></li>	
				</ul>
            </li>
            <li <?php echo in_array(strtolower(CONTROLLER_NAME), ['members','admin','member','shop','company','person'])?'class="active"':''; ?>><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive"><span class="glyphicon glyphicon-folder-open"></span> 会员管理</a>
               <ul  id="collapseFive" role="tabpanel" aria-labelledby="headingFive" class="nav nav-list panel-collapse collapse <?php echo in_array(strtolower(CONTROLLER_NAME), ['members','admin','member','shop','company','person'])?'in':''; ?>">
				<li><a href="<?php echo U('Members/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 会员组</a></li>
				<li><a href="<?php echo U('Admin/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 管理员管理</a></li>
				<li><a href="<?php echo U('Member/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 会员管理</a></li>
				<li><a href="<?php echo U('Shop/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 商城管理</a></li>
				<li><a href="<?php echo U('Company/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 企业身份验证</a></li>
				 <!-- style="background-color: #FFF" glyphicon-forward -->
				<li><a href="<?php echo U('Person/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 个人身份验证</a></li>
			   </ul>
            </li>
            <li <?php echo in_array(strtolower(CONTROLLER_NAME), ['jifen','jifenlog','moneylog','orderlog','orderstyle'])?'class="active"':''; ?>><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix"><span class="glyphicon glyphicon-folder-open"></span> 流水管理</a>
               <ul  id="collapseSix" role="tabpanel" aria-labelledby="headingSix" class="nav nav-list panel-collapse collapse <?php echo in_array(strtolower(CONTROLLER_NAME), ['jifen','jifenlog','moneylog','orderlog','orderstyle'])?'in':''; ?>">
                <li><a href="<?php echo U('Jifen/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 积分设置</a></li>
				<li><a href="<?php echo U('Jifenlog/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 积分流水</a></li>
				<li><a href="<?php echo U('Moneylog/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 资金流水</a></li>
				<li><a href="<?php echo U('Orderlog/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 订单动态流水</a></li>
				<li><a href="<?php echo U('Orderstyle/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 订单事由</a></li>	
				</ul>
            </li>
            <li <?php echo in_array(strtolower(CONTROLLER_NAME), ['telmsgstyle','telmsg','emailstyle','email','msg'])?'class="active"':''; ?>><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven"><span class="glyphicon glyphicon-folder-open"></span> 信息管理</a>
               <ul  id="collapseSeven" role="tabpanel" aria-labelledby="headingSeven" class="nav nav-list panel-collapse collapse <?php echo in_array(strtolower(CONTROLLER_NAME), ['telmsgstyle','telmsg','emailstyle','email','msg'])?'in':''; ?>">
                <li><a href="<?php echo U('Telmsgstyle/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 短信模板</a></li>
				<li><a href="<?php echo U('Telmsg/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 短信流水</a></li>
				<li><a href="<?php echo U('Emailstyle/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 邮件模板</a></li>
				<li><a href="<?php echo U('Email/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 邮件流水</a></li>
				<li><a href="<?php echo U('Msg/admin_ShowList'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-play"></span> 站内信流水</a></li>
				</ul>
            </li>
          </ul>
        </div>