<include file="Public/header" />
<include file="Public/header_nav_list" />
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 pay">
      <div class="col-xs-12 pay_top">
        <div class="col-xs-8 pay_top_left">
          <p>请您及时付款，以便订单尽快处理！订单号：<span><?php echo $data['data']['uid']; ?></span></p>
          <p>请您在提交订单后<span>24小时</span>内完成支付，否则订单会自动取消</p>
        </div>
        <div class="col-xs-4 pay_top_right">
          <p>应付金额<span><?php echo $data['data']['amount']; ?></span>元</p>
          <p><a href="<?php echo U('/Member/Buyer/order_list'); ?>" target="_blank">查看订单详情</a></p>
        </div>
      </div>
      <div class="col-xs-12 pay_middle">
        <p>在线支付</p>
        <ul>
          <li><a href="<?php echo U('/Index/Pay/unionpay',['uid'=>$data['data']['uid']]); ?>" target="_blank"><img src="{$Think.STATIC_V2}images/pay_teyue.png"/></a></li>
          <li><a href="<?php echo U('/Index/Pay/tenpay',['uid'=>$data['data']['uid']]); ?>"  target="_blank"><img src="{$Think.STATIC_V2}images/pay_cft.png"/></a></li> 
          <li><a href="<?php echo U('/Index/Pay/jdpay',['uid'=>$data['data']['uid']]); ?>"  target="_blank"><img src="{$Think.STATIC_V2}images/jdpay.png"/></a></li>
          <li style="display:none;"><a href="<?php echo U('/Index/Pay/alipay',['uid'=>$data['data']['uid']]); ?>"  target="_blank"><img src="{$Think.STATIC_V2}images/zhifubaotu.png"/></a></li>
          <li style="display:none;"><a href=""  target="_blank"><img src="{$Think.STATIC_V2}images/pay_wxzf.jpg"/></a></li>
        </ul>
      </div>
	  <div class="col-xs-12 pay_bottom">
        <p style="font-weight:bold;">对账支付（对公）</p>
        <ul>
          <li>
            <p>开户行：上海浦东发展银行股份有限公司深圳科技园支行</p>
            <p>帐号：<span>79210155200001488</span></p>
            <p>户名：深圳市前海七号网络科技有限公司</p>
          </li>
          
        </ul>
      </div>
      <div class="col-xs-12 pay_bottom">
        <p style="font-weight:bold;">对账支付（对私）</p>
        <ul>
          <li>
            <p>开户行：农业银行深圳分行</p>
            <p>帐号：<span>6228480128105617871</span></p>
            <p>户名：胡海国</p>
          </li>
          <li>
            <p>开户行：中国民生银行深圳分行</p>
            <p>帐号：<span>6226170600032102</span></p>
            <p>户名：胡海国</p>
          </li>
          <li>
            <p>开户行：中国工商银行深圳支行</p>
            <p>帐号：<span>6222024000023260975</span></p>
            <p>户名：胡海国</p>
          </li>
          <li>
            <p>开户行：平安银行深圳分行</p>
            <p>帐号：<span>6222980008764377</span></p>
            <p>户名：胡海国</p>
          </li>
          <li>
            <p>支付宝账号：<span>sipr@qq.com</span></p>
            <p>支付宝户名：胡海国</p>
          </li>
        </ul>
      </div>
      <div class="col-xs-12 tip">
        <div class="col-xs-12 tiptt"> 对账汇款后，请提交回单至我们的客服人员 </div>
      </div>
    </div>
  </div>
  <!--专利-->
  <!--主体-->
  <!--底部-->
<include file="Public/foot" />
  <!--底部-->
</div>
<script type='text/javascript'>
$('.shop_list_hover').hover(function(){
//alert('aaa');
$('.goods_shop_display').show();
},function(){
//alert('bbb');
$('.goods_shop_display').hide();
})
/*分类显示切换*/
$('.goods_shopt a').click(function(){
//alert('kkk');
$('.all-goods_shop').hide();
$(this).parents('.goods_shopt').next().show();
})
/*左侧二级导航*/
$(function(){
	$('.all-goods_shop .item').hover(function(){
	    $(this).addClass('active').find('s').hide();
		$(this).find('.product-wrap').show();
	},function(){
	    $(this).removeClass('active').find('s').show();
		$(this).find('.product-wrap').hide();
	});
	});
/*左侧二级导航*/


/*搜索类别切换*/
$('.searchs_libie li').click(function(){
$('.searchs_libie li a').removeClass('libie_ons');
$(this).find("a").addClass('libie_ons');
var ffh=$(this).find('a').attr('name');
$('#ymyys').val(ffh);
})
/*搜索类别切换*/


$(document).ready(function(){
$('.yanse li:eq(1)').css('border-left','none');
});

/*友情链接*/
$('.yqlj li').hover(function(){
var tt=$(this).index();
$("div[id*='yqljs']").css('display','none');
$("#yqljs"+tt).css('display','block');
$('.yqlj li a').removeClass('selst');
$(this).find("a").addClass('selst');
})
/*友情链接*/

</script>
</body>
</html>
