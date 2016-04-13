<!doctype html>
<html lang="zh-cn">
<head>
<title><?php echo $data['title']?$data['title']:$data['siteInfo']['web_title']; ?>-7号网</title>
<meta name="keywords" content="<?php echo $data['keywords']?$data['keywords']:$data['siteInfo']['web_keywords'];?>"/>
<meta name="description" content="<?php echo $data['description']?$data['description']:$data['siteInfo']['web_desc'];?>"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<link rel="icon" href="{$Think.STATIC_V2}images/favicon.ico" type="image/x-icon">  
<link rel="shortcut icon" href="{$Think.STATIC_V2}images/favicon.ico" type="image/x-icon">  
<link href="{$Think.STATIC_V2}css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$Think.STATIC_V2}css/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="{$Think.STATIC_V2}css/sun.css" rel="stylesheet" type="text/css" />
<link href="{$Think.STATIC_V2}css/qihao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$Think.STATIC_V2}js/jquery.min.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/jq_scroll.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/ScrollPic.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/msgbox.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/laydate.dev.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/icheck.js"></script>
<script type="text/javascript" src="{$Think.STATIC_V2}js/all.js"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type='text/javascript'>

</script>
<style type="text/css">
body{background:#ffffff;}
</style>
</head>
<body>
<!--  -->
<div class="thrwid">
  <!--头部-->
  <div class="kuang vtop">
    <div class="col-xs-6 vlefts">
    	<notempty name="Think.session.user">
    		<p><a href="__APP__" title="7号网">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="U('/Member/User/index')" target="_blank"><notempty name="Think.session.user.name">{$Think.session.user.name}<else />{$Think.session.user.username}</notempty></a>，欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;</p>
    		&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('/Member/User/index')}" title="会员中心" rel="nofollow" target="_blank">会员中心</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="{:U('User/logout')}" title="退出登录" rel="nofollow">退出登录</a>
    	<else />
    		<p><a href="__APP__" title="7号网" >7号网首页</a> &nbsp;欢迎来到7号网 </p>
       		<a href="{:U('User/login')}" title="用户登录" rel="nofollow"  class="vdelu">登录</a>
      		<a href="{:U('User/register')}" title="用户注册" rel="nofollow"  class="vdelu">注册</a> 
    	</notempty>
    </div>
    <div class="col-xs-6 yanse vrights">
      <ul>
        <li><a href="<?php echo U('Search/index'); ?>" title="搜索" rel="nofollow"  target="_blank" class="vsoses">搜索</a></li>
        <li> 
        	<a href="{:U('/Member/Buyer/cart')}" rel="nofollow" target="_blank"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>购物车<span>{$data['cart']['num']}</span></a>
	        <div class="xiala">
	          <notempty name="data['cart']['num']">
	            <ul>
	            <volist name="data['cart']['data']" id="vo">
	              <li>
	                <div class="gwctu">
	                	<eq name="vo['tmpa']" value="1">
	                		<a href="{:U('trademark/detail',array('id'=>$vo['id']))}" rel="nofollow" target="_blank"><img style="width:70px;height:60px;" src="{$vo['img']}"/></a>
	                	<else/>
	                		<a href="{:U('trademark/detail',array('id'=>$vo['id']))}" rel="nofollow" target="_blank"><img style="width:70px;height:60px;" src="{$vo['img']}"/></a>
	                	</eq>
	                </div>
	                <div class="jianjiest">
	                <eq name="vo['tmpa']" value="1">
	                	<p><a href="{:U('trademark/detail',array('id'=>$vo['id']))}" rel="nofollow" target="_blank">【商标】{$vo['tmno']}</a></p>
	                <else/>
	                	<p><a href="{:U('patent/detail',array('id'=>$vo['id']))}" rel="nofollow" target="_blank">【专利】{$vo['tmno']}</a></p>
	                </eq>  
	                  <p>{$vo['title']}</p>
	                  <p><span>{$vo['price']}</span>元|<span onclick="del_cart({$vo['id']})">删除</span></p>
	                </div>
	              </li>
	            </volist>  
	            </ul>
	            <div class="zouji">共计<span>{$data['cart']['num']}</span>件商品,<span>{$data['cart']['totalprice']}</span>元<a href="{:U('/Member/Buyer/cart')}" rel="nofollow" target="_blank">去结算</a></div>
	          <else /> 
	            <p class="gwcmysp"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>购物车中还没有商品！</p>
	          </notempty>
	       </div>
        </li>
        <li>
        	<span>网站导航</span>
            <div class="xialas">
	            <ul>
	            	<volist name="data['menu']" id="vo">
	              		<li><a href="{$vo['link']}" title="{$vo['title']}" target="_blank">{$vo['name']}</a></li>
	              	</volist>
	            </ul>
           </div>
        </li>
        <li><a href="__APP__/news/20151125/162HTMLSUFFIX" rel="nofollow" target="_blank">帮助中心</a></li>
        <li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" rel="nofollow" target="_blank">联系客服</a></li>
      </ul>
    </div>
  </div>
  <!--logo与搜索-->
  <div class="thrgao thrgao_shop">
  <div class="thrfloor1">
    <div class="col-xs-4 vlogo"> <a href="__APP__" title="{$data['siteInfo']['web_title']}"><img src="{$Think.STATIC_V2}images/shops_logo.png"/></a><img src="{$Think.STATIC_V2}images/shops_logo1.png"/></div>
    <div class="col-xs-8 top_search">
      <div class="top_searchs">
        <div class="searchs_libie">
          <ul>
          <if condition="CONTROLLER_NAME eq 'Patent'">
            <li><a href="javascript:;" class="libie_ons" name="2">专利</a></li>
          <elseif condition="CONTROLLER_NAME eq 'Trademark'" />
            <li><a href="javascript:;" class="libie_ons" name="1">商标</a></li>
          <else/> 
          	<li><a href="javascript:;" class="libie_ons" name="0">全部</a></li>
            <li><a href="javascript:;" name="1">商标</a></li>
            <li><a href="javascript:;" name="2">专利</a></li>
            <!-- <li><a href="#" name="4">资讯</a></li> -->
            <li><a href="javascript:;" name="3">店铺</a></li>
          </if>
          </ul>
        </div>
        <form action="{:U('search/index')}" target="_blank"  method="get">
        <if condition="CONTROLLER_NAME eq 'Patent'">
       	 	<input type="hidden" name="type" value="2" id="ymyys" />
        <elseif condition="CONTROLLER_NAME eq 'Trademark'" />
        	<input type="hidden" name="type" value="1" id="ymyys" />
        <else/>
        	<input type="hidden" name="type" value="0" id="ymyys" />
        </if> 
          <div class="searchs_conts">
            <input name="name" type="text" class="top_searchst" placeholder="请输入关键词"/>
            <input type="submit" class="top_searchtijiao" value="搜索"/>
          </div>
        </form>
      </div>
    </div>
	</div>
  </div>
  <!--logo与搜索-->