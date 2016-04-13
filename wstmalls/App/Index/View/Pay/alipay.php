<include file="Public/header" />
<include file="Public/header_nav_list" />
<!--主体-->
<!--支付方式-->
<div class="kuang">
<div class="container kuangs zhifugao">
<div class="row">
<div class="col-xs-12 zhifuxz">
<p><h4>订单号：<?php echo $data['data']['uid']; ?> 的订单支付页面！</h4></p>
<p>共选中<span><?php echo $data['data']['num']; ?></span>件商品，总价：<span><?php echo $data['data']['amount']; ?></span>元。查看<a href="<?php echo U('/Member/Buyer/order_list'); ?>" title="#" target="_blank">订单详情</a></p>
</div>
<div class="col-xs-12 zhifuxz1">
<h3>支付宝付款</h3>
<p>正在创建支付订单，请稍等...！</p>
<div style="display: none"><?php echo $data['html']; ?></div>
</div>
</div>
</div>
</div>
<!--支付方式-->
<!--主体-->
<!--主体-->
<include file="Public/foot" />
</body>
</html>