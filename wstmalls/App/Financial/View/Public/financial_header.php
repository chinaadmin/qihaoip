<!doctype html>
<html lang="zh-cn">
<head>
<title>{$data['title']}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="description" content="{$data['description']}"/>
<meta name="keywords" content="{$data['keywords']}"/>
<link rel="icon" href="<?php echo STATIC_V2;?>images/favicon.ico" type="image/x-icon">  
<link rel="shortcut icon" href="<?php echo STATIC_V2;?>images/favicon.ico" type="image/x-icon">
<link href="<?php echo STATIC_V2;?>css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/sun.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/qihao.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/kjjr.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jq_scroll.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/ScrollPic.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/msgbox.js"></script>
<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
	body{background:#ffffff;}
</style>
</head>
<body>
<!--头部-->
<div class="kuang vtop">
<div class="col-xs-6 vlefts">
<?php 
	$user = session('user');
	if(is_array($user) && isset($user['id'])){
	if($user['name']){
			echo '<p>
			<a href="__APP__" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="__APP__/Member/User/" rel="nofollow" target="_blank">'.$user['name'].'</a>，欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;
			</p>';
		}else {
			echo '<p>
			<a href="__APP__" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="__APP__/Member/User/" rel="nofollow" target="_blank">'.$user['username'].'</a>，欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;
			</p>';
		}
		echo '&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="__APP__/Member/User/" title="会员中心"
		target="_blank">会员中心</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="__APP__/User/logout/" title="退出登录">退出登录</a>';
	} else { ?>
	<p>
		<a href="__APP__" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;
	</p>
	&nbsp;
	<a href="__APP__/User/login/" title="用户登录" rel="nofollow" target="_blank" class="vdelu">登录</a>
	<a href="__APP__/User/register/" title="用户注册" rel="nofollow" target="_blank" class="vdelu">注册</a>
<?php } ?>
</div>
<div class="col-xs-6 yanse vrights">
			<ul>
				<li><a href="__APP__/Search/" title="搜索" rel="nofollow" target="_blank" class="vsoses">搜索</a></li>
				<li><a href="__APP__/Cart/" title="购物车" rel="nofollow" target="_blank"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 购物车<span><?php echo $data['cart']['num']?></span> </a>
					<div class="xiala">
					<?php if(!$data['cart']['num']):?>
						<p class="gwcmysp">
							<span class="glyphicon glyphicon-shopping-cart"
								aria-hidden="true"></span> 购物车中还没有商品！
						</p>
					<?php else:?>
						<ul>
						<?php $total = 0 ;foreach ($data['cart']['data'] as $key=>$value):?>
							<li>
								<div class="gwctu">
									<if condition="$value['tmpa'] eq '1'">
										<a href="__APP__/Trademark/detail/id/{$value['id']}HTMLSUFFIX" title="{$value['title']}" rel="nofollow" target="_blank"><img style="width:70px;height:60px;" src="{$value['img']}" /></a>
									<else />
										<a href="__APP__/Patent/detail/id/{$value['id']}HTMLSUFFIX" title="{$value['title']}" rel="nofollow" target="_blank"><img style="width:70px;height:60px;" src="{$value['img']}" /></a>
									</if>
								</div>
								<div class="jianjiest">
									<p>
									<if condition="$value['tmpa'] eq '1'">
										<a href="__APP__/Trademark/detail/id/{$value['id']}HTMLSUFFIX" rel="nofollow" target="_blank"><eq name="value['tmpa']" value="1">【商标】<else/>【专利】</eq>,{$value['tmno']}</a>
									<else />
										<a href="__APP__/Patent/detail/id/{$value['id']}HTMLSUFFIX" rel="nofollow" target="_blank"><eq name="value['tmpa']" value="1">【商标】<else/>【专利】'</eq>,{$value['tmno']}</a>
									</if>
									</p>
									<p><?php echo $value['title'];?></p>
									<p>
										<span><?php echo $value['price'];?></span>元 | <a href="javascript:;" onclick="del_cart(<?php echo $value['id']; ?>)">删除</a>
									</p>
									<?php $total+=$value['price'];?>
								</div>
							</li>
							<?php endforeach;?>
						</ul>
						
						<div class="zouji">
							共计<span><?php echo $data['cart']['num'];?></span>件商品<span><?php echo sprintf("%0.2f", $total);?></span>元<a href="__APP__/Cart/"  rel="nofollow" target="_blank">去结算</a>
						</div>
						<?php endif;?>
					</div>
				</li>
				<?php if($data['msg_num']){ echo '<li><a href="__APP__/Member/User/msg_rcv/" rel="nofollow" title="站内信" target="_blank">站内信<span>'.$data['msg_num'].'</span></a></li>';} ?>
				<li><a href="javascript:;"><span>网站导航</span></a>
					<div class="xialas">
						<ul>
							<?php foreach ($data['menu'] as $row){ ?>
								<li><a href="<?php echo $row['link'];?>" title="<?php echo $row['title'];?>" target="_blank"><?php echo $row['name'];?></a></li>
							<?php }?>
						</ul>
					</div>
				</li>
				<li><a href="__APP__/news/show_list/catid/162/" title="帮助中心" rel="nofollow" target="_blank">帮助中心</a></li>
				<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" title="联系客服" rel="nofollow" target="_blank">联系客服</a></li>
			</ul>
		</div>
</div>
<!--logo与导航-->
<div class="thrgao">
    <div class="col-xs-4 vlogo">
    	<a href="__APP__" title="<?php echo $data['siteInfo']['web_title'];?>"><img src="<?php echo STATIC_V2;?><?php echo $data['siteInfo']['web_logo'];?>"/></a>
    	<img src="<?php echo STATIC_V2;?>images/logo3.png"/>
    </div>
    <div class="col-xs-8 vdaohan">
        <div class="moban_search">
            <form id="moban_forms" target="_blank"  method="get" action="__APP__/Search/">
              <div class="search_myself">
                <input type="hidden" value="0" name="type">
                <input type="text" class="my_search" name="name">
                <input type="submit" type_valuye="3" class="search_jijiao form_search" value="搜索">
              </div>
            </form>
        </div>
    </div>
</div>
<div class="kjjr_menu">
	<div class="thrfloor1">
        <ul>
        <volist name="data['menu']" id="vo">
        	<li><a href="{$vo['link']}" <if condition="'__SELF__' eq $vo['link']">class="kjjr_over"</if> target="_blank">{$vo['name']}</a></li>
        </volist>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!--logo与导航-->
<!--头部-->