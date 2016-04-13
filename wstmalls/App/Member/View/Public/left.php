<!--左侧导航-->
<?php if(CONTROLLER_NAME=='User'){ ?>
<div class="hconleft">
<div class="hconlefts">
	<dl>
		<dt><a>会员中心</a></dt>
		<dd><a <?php if(ACTION_NAME=='index'){echo 'class="onth"';} ?> href="<?php echo U('User/index');?>" title="首页" id="hons1">首页</a></dd>
		<dd><a <?php if(ACTION_NAME=='showself' OR ACTION_NAME=='mobileverify' OR ACTION_NAME=='emailverify'){echo 'class="onth"';} ?> href="<?php echo U('User/showself');?>" title="基本信息" id="hons1">基本信息</a></dd>
		<dd><a <?php if(ACTION_NAME=='repass'){echo 'class="onth"';} ?> href="<?php echo U('User/repass');?>" title="修改密码" id="hons3">修改密码</a></dd>
		<!-- dd><a <?php if(ACTION_NAME=='favorite'){echo 'class="onth"';} ?> href="<?php echo U('User/favorite');?>" title="我的收藏" id="hons4">我的收藏</a></dd -->
		<dd><a <?php if(ACTION_NAME=='msg_rcv'){echo 'class="onth"';} ?> href="<?php echo U('User/msg_rcv');?>" title="我的消息" id="hons4">我的消息</a></dd>
	</dl>
</div>
</div>
<?php } else if(CONTROLLER_NAME=='Money'){ ?>
<div class="hconleft">
<div class="hconlefts">
	<dl>
		<dt><a>资金管理</a></dt>
		<dd><a <?php if(ACTION_NAME=='jifen'){echo 'class="onth"';} ?> href="<?php echo U('Money/jifen');?>" title="积分流水" id="hons1">积分明细</a></dd>
		<dd><a <?php if(ACTION_NAME=='money' && $data['type']==0){echo 'class="onth"';} ?> href="<?php echo U('Money/money',['clean'=>'1']);?>" title="资金流水" id="hons1">资金明细</a></dd>
		<dd><a <?php if(ACTION_NAME=='money' && $data['type']==3){echo 'class="onth"';} ?> href="<?php echo U('Money/money',['clean'=>'1','type'=>'3']);?>" title="支付记录查询" id="hons1">支付记录查询</a></dd>
		<dd><a <?php if(ACTION_NAME=='money' && $data['type']==5){echo 'class="onth"';} ?> href="<?php echo U('Money/money',['clean'=>'1','type'=>'5']);?>" title="退款记录查询" id="hons1">退款记录查询</a></dd>
		
	</dl>
</div>
</div>
<?php } else if(CONTROLLER_NAME=='Buyer' || CONTROLLER_NAME=='Hetongzt' || CONTROLLER_NAME=='Shourangzt'){ ?>
<div class="hconleft">
<div class="hconlefts">
	<dl>
	<dt><a>购物车</a></dt>
	<dd><a <?php if(ACTION_NAME=='cart'){echo 'class="onth"';} ?> href="<?php echo U('/Member/Buyer/cart'); ?>">我的购物车</a></dd>
	
	</dl>
	<dl>
	<dt><a>订单管理</a></dt>
	<dd><a <?php if(ACTION_NAME=='order_list'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/order_list');?>">我的订单</a></dd>
	</dl>
	<dl>
	<dt><a>求购管理</a></dt>
	<dd><a <?php if(ACTION_NAME=='supply_add'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/supply_add');?>">发布求购</a></dd>
	<dd><a <?php if(ACTION_NAME=='supply_list' OR ACTION_NAME=='supply_tmedit' OR ACTION_NAME=='supply_paedit'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/supply_list');?>">我的求购</a></dd>
	</dl> 
	<dl>
		<dt><a>收藏</a></dt>
		<dd><a <?php if(ACTION_NAME=='collect_shop'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/collect_shop');?>">收藏的店铺</a></dd>
		<dd><a <?php if(ACTION_NAME=='collect_goods'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/collect_goods');?>">收藏的商品</a></dd>
		<dd><a <?php if(ACTION_NAME=='collect_info'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/collect_info');?>">收藏的资讯</a></dd>
	</dl>
	<dl>
	<dt><a>设置</a></dt>
	<dd><a <?php if(ACTION_NAME=='showlist' && CONTROLLER_NAME=='Hetongzt'){echo 'class="onth"';} ?> href="<?php echo U('Hetongzt/showlist');?>" id="hons4">合同主体</a></dd>
	<dd><a <?php if(ACTION_NAME=='showlist' && CONTROLLER_NAME=='Shourangzt'){echo 'class="onth"';} ?> href="<?php echo U('Shourangzt/showlist');?>" id="hons4">受让主体</a></dd>
    </dl>
		<!--  
		<dt><a>买家中心</a></dt>
		<dd><a <?php if(ACTION_NAME=='cart'){echo 'class="onth"';} ?> href="<?php echo U('/Member/Buyer/cart'); ?>" id="hons2" >购物车</a></dd>
		<dd><a <?php if(ACTION_NAME=='order_list'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/order_list');?>" id="hons3">我的订单</a></dd>
		<dd><a <?php if(ACTION_NAME=='supply_add'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/supply_add');?>" id="hons4">发布求购信息</a></dd>
		<dd><a <?php if(ACTION_NAME=='supply_list'){echo 'class="onth"';} ?> href="<?php echo U('Buyer/supply_list');?>" id="hons4">我的求购</a></dd>
		<dd><a <?php if(ACTION_NAME=='showlist' && CONTROLLER_NAME=='Hetongzt'){echo 'class="onth"';} ?> href="<?php echo U('Hetongzt/showlist');?>" id="hons4">合同主体</a></dd>
		<dd><a <?php if(ACTION_NAME=='showlist' && CONTROLLER_NAME=='Shourangzt'){echo 'class="onth"';} ?> href="<?php echo U('Shourangzt/showlist');?>" id="hons4">受让主体</a></dd>
		-->
</div>
</div>
<?php } else if(CONTROLLER_NAME=='Seller'){ ?>
<div class="hconleft">
		<div class="hconlefts">
			<dl>
				<dt>
					<a href="#" title="发布管理">发布管理</a>
				</dt>
				<dd>
					<a href="<?php echo U('Member/Seller/sell_list')?>" title="我的商品" id="hons3" <?php if(ACTION_NAME=='sell_list' OR ACTION_NAME=='edit_pa' OR ACTION_NAME=='edit_tm'){echo 'class="onth"';} ?>>我的商品</a>
				</dd>
				<dd>
					<a href="<?php echo U('Member/Seller/releasegoods')?>" title="发布商品" id="hons4" <?php if(ACTION_NAME=='releasegoods' OR ACTION_NAME=='batch'){echo 'class="onth"';} ?>>发布商品</a>
				</dd>
			</dl>
			<dl>
				<dt>
					<a href="#" title="订单管理">订单管理</a>
				</dt>
				<dd>
					<a href="<?php echo U('Member/Seller/index')?>" title="我的订单" id="hons2" <?php if(ACTION_NAME=='index'){echo 'class="onth"';} ?>>我的订单</a>
				</dd>
			</dl>
		</div>
	</div>
<?php } else if(CONTROLLER_NAME=='Seller1'){ ?>
<div class="hconleft">
		<div class="hconlefts">
			<dl>
				<dt>
					<a href="#" title="卖家中心">卖家中心</a>
				</dt>
				<dd>
					<a href="<?php echo U('Member/Seller/index')?>" title="我的订单" id="hons2" <?php if(ACTION_NAME=='index'){echo 'class="onth"';} ?>>我的订单</a>
				</dd>
				<dd>
					<a href="<?php echo U('Member/Seller/sell_list')?>" title="我的发布" id="hons3" <?php if(ACTION_NAME=='sell_list'){echo 'class="onth"';} ?>>我的发布</a>
				</dd>
			</dl>
		</div>
	</div>
<?php }else if(CONTROLLER_NAME=='Shop'){ ?>
<div class="hconleft">
<div class="hconlefts">
	<dl>
		<dt><a href="#" title="#">商城管理</a></dt>
		<dd><a href="<?php echo U('Shop/index'); ?>" id="hons3" <?php if(ACTION_NAME=='index'){echo 'class="onth"';} ?>>商城资料</a></dd>
		<dd><a href="<?php echo U('Shop/shopcus'); ?>" title="#" id="hons2" <?php if(ACTION_NAME=='shopcus'){echo 'class="onth"';} ?>>客服设置</a></dd>
		<dd><a href="<?php echo U('Shop/shopad'); ?>" id="hons2" <?php if(ACTION_NAME=='shopad'){echo 'class="onth"';} ?>>商城装修</a></dd>
		<dd><a href="<?php echo U('Shop/shopitem'); ?>" id="hons2" <?php if(ACTION_NAME=='shopitem'){echo 'class="onth"';} ?>>商品管理</a></dd>
	</dl>
</div>
</div>
<?php } else if(MODULE_NAME == 'Trade'){?>

 <div class="hconleft">
    <div class="hconlefts">
      <dl>
        <dt><a title="我的商标">我的商标</a></dt>
        <dd><a href="<?php echo U('Trade/Index/index')?>" title="商标概况" id="hons2" <?php if(CONTROLLER_NAME=='Index'){echo 'class="onth"';} ?>>商标概况</a></dd>
        <dd><a href="#" title="#" id="hons3">添加商标</a></dd>
        <dd><a href="#" title="#" id="hons4">国内商标管理</a></dd>
        <dd><a href="#" title="#" id="hons4">国际商标管理</a></dd>
      </dl>
    </div>
  </div>
  <?php }?>
<!--左侧导航-->