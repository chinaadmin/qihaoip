<!doctype html>
<html lang="zh-cn">
<head>
<title><?php echo $data['shop_re']['title']?$data['shop_re']['title']:$data['siteInfo']['web_title']; ?>-7号网</title>
<meta name="keywords" content="<?php echo $data['shop_re']['keywords']?$data['shop_re']['keywords']:$data['siteInfo']['web_keywords'];?>"/>
<meta name="description" content="<?php echo $data['shop_re']['description']?$data['shop_re']['description']:$data['siteInfo']['web_desc'];?>"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<link rel="icon" href="<?php echo STATIC_V2;?>images/favicon.ico" type="image/x-icon">  
<link rel="shortcut icon" href="<?php echo STATIC_V2;?>images/favicon.ico" type="image/x-icon">  
<link href="<?php echo STATIC_V2;?>css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/minimal/orange.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/sun.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATIC_V2;?>css/qihao.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.superslide.2.1.1.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jq_scroll.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/ScrollPic.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/msgbox.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/laydate.dev.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/icheck.js"></script>
<script type="text/javascript" src="<?php echo STATIC_V2;?>js/all.js"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]11111111111-->
</head>
<body>
	<!--头部 --->
	<div class="kuang vtop">
		<div class="col-xs-6 vlefts">
			
			<?php 
			$user = session('user');
			if(is_array($user) && isset($user['id'])){
				if($user['name']){
					echo '<p>
					<a href="/" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.U('/Member/User/index').'" target="_blank">'.$user['name'].'</a>，欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;
					</p>';
				}else {
					echo '<p>
					<a href="/" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.U('/Member/User/index').'" target="_blank">'.$user['username'].'</a>，欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;
					</p>';
				}
				echo '&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.U('/Member/User/index').'" title="会员中心"
				target="_blank">会员中心</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.U('User/logout').'" title="退出登录">退出登录</a>';
			} else { ?>
			<p>
				<a href="/" title="7号网" target="_blank">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;欢迎来到7号网&nbsp;&nbsp;&nbsp;&nbsp;
			</p>
			&nbsp;
			<a href="<?php echo U('User/login'); ?>" title="用户登录" rel="nofollow" target="_blank" class="vdelu">登录</a>
			<a href="<?php echo U('User/register'); ?>" title="用户注册" rel="nofollow" target="_blank" class="vdelu">注册</a>
			<?php } ?>
		</div>
		<div class="col-xs-6 yanse vrights">
			<ul>
				<li><a href="<?php echo U('Search/index'); ?>" title="搜索" rel="nofollow" target="_blank" class="vsoses">搜索</a></li>
				<li><a href="<?php echo U('/Member/Buyer/cart');?>" title="购物车" rel="nofollow" target="_blank"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 购物车<span><?php echo $data['cart']['num']?></span> </a>
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
									<a href="<?php echo $value['tmpa']=='1'?U('Trademark/detail',['id'=>$value['id']]):U('Patent/detail',['id'=>$value['id']]);?>" title="<?php echo $value['title'];?>" target="_blank"><img style="width:70px;height:60px;" src="<?php echo $value['img'];?>" /></a>
								</div>
								<div class="jianjiest">
									<p>
										<a href="<?php echo $value['tmpa']=='1'?U('Trademark/detail',['id'=>$value['id']]):U('Patent/detail',['id'=>$value['id']]);?>" target="_blank"><?php echo $value['tmpa']=='1'?'【商标】':'【专利】',$value['tmno'];?></a>
									</p>
									<p><?php echo $value['title'];?></p>
									<p>
										<span><?php echo $value['price'];?></span>元 | <span onclick="del_cart(<?php echo $value['id']; ?>)">删除</span>
									</p>
									<?php $total+=$value['price'];?>
								</div>
							</li>
							<?php endforeach;?>
						</ul>
						
						<div class="zouji">
							共计<span><?php echo $data['cart']['num'];?></span>件商品<span><?php echo sprintf("%0.2f", $total);?></span>元<a href="<?php echo U('/Member/Buyer/cart');?>" target="_blank">去结算</a>
						</div>
						<?php endif;?>
					</div>
				</li>
				<?php if($data['msg_num']){ echo '<li><a href="'.U('/Member/User/msg_rcv').'" title="站内信" target="_blank">站内信<span>'.$data['msg_num'].'</span></a></li>';} ?>
				<li><a href="javascript:;"><span>网站导航</span></a>
					<div class="xialas">
						<ul>
							<?php foreach ($data['menu'] as $row){ ?>
									<li><a href="<?php echo $row['link'];?>" title="<?php echo $row['title'];?>" target="_blank"><?php echo $row['name'];?></a></li>
							<?php }?>
						</ul>
					</div>
				</li>
				<li><a href="<?php echo U('/Index/news/show_list',['catid'=>162]);?>" title="帮助中心" rel="nofollow" target="_blank">帮助中心</a></li>
				<li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=21556911&amp;site=qq&amp;menu=yes" title="联系客服" rel="nofollow" target="_blank">联系客服</a></li>
			</ul>
		</div>
	</div>
	<!--logo与导航-->
  <div class="thrgao">
    <div class="col-xs-4 vlogo"> <a href="/"><img src="<?php echo STATIC_V2;?>images/logo.png"/><img src="<?php echo STATIC_V2;?>images/logo3.png"/></a> </div>
    <div class="col-xs-8 vdaohan" >
      <div class="moban_search">
       <form action="<?php echo U('search/index')?>" method="get" id="moban_forms">
          <div class="search_myself">
            <input type="text" name="name" class="my_search"/>
           <input type="hidden" name="type" value='0'/>
           <input type="hidden" name="shop" value="<?php echo $data['shop_id'];?>" />
            <input type="button" value="搜本店" class="search_jijiao form_search" type_valuye="3"/>
          </div>
          <button type="button" class="search_all form_search" type_valuye="0">搜全站</button>
        </form>
      </div>
    </div>
  </div>

  <div class="thrwid moban2_nav">
    <div class="thrfloor1 moban2_navs">
      <ul>
	 <?php foreach ($data['menu'] as $row){ ?>
			<li><a <?php if('__SELF__' == $row['link']){echo 'class=istrue';}?> href="<?php echo $row['link'];?>"  title="<?php echo $row['title'];?>" <?php if(($row['link'] == '/trademark/' or $row['link'] == '/patent/' or $row['link'] == '/shop/' or $row['link'] == '/special/' or $row['link'] == '/news/') and '__SELF__' != $row['link']){ echo 'target="_blank"';}?>><?php echo $row['name'];?></a></li>
		  <?php }?>
	  </ul>
    </div>
  </div>
  <!--banner-->
  <div class="thrwid moban_banner">
    <div class="thrfloor1 moban_banners">
	<div class="col-xs-2 moban2_logo">
	<div class="col-xs-12 moban2_logos">
	<a href="<?php echo U('Index/shop/shop_list',array('id'=>$data['shop_re']['id']))?>"><img src="<?php echo $data['shop_re']['logo']?$data['shop_re']['logo']:STATIC_V2.'images/logo_default.jpg'?>"/></a>
	<div class="col-xs-12 moban2_shopname">
	<?php echo $data['shop_re']['name']?>旗舰店
	</div>
	</div>
	
	<div class="col-xs-12 moban2_imgs"><a href="#" title="#"><img src="<?php echo $data['ad']['7']['state']==3&&$data['ad']['7']?$data['ad']['7']['img']:STATIC_V2.'images/red7.jpg'?>"/></a></div>
	</div>
	<div class="col-xs-10">
      <div class="flexslider">
        <ul class="slides">
         <?php if($data['ad']['1']):?>
	        <?php $i=0; foreach ($data['ad']['1'] as $key=>$value):?>
	        <?php if($value['state']==3):?>
	         <li style="background:url(<?php echo $value['img']?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>"  target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
	        <?php else:?>
	        	<?php $i++;?>
	        	<?php if(count($data['ad']['1'])==$i||!$data['ad']['1']):?>
	        		<li style="background:url(<?php echo STATIC_V2.'images/red1.jpg'?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
	        	<?php endif;?>
	        <?php endif?>
	        <?php endforeach;?>
	        <?php else:?>
       	     	<li style="background:url(<?php echo STATIC_V2.'images/red1.jpg'?>) 50% 0 no-repeat;"><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></a></li>
	        <?php endif?>
        </ul>
      </div>
	  </div>
    </div>
  </div>
  <!--banner-->
  <div class="thrwid">
    <div class="thrfloor1">
      <div class="moban_mbx"> 当前位置：<a href="/">7号网</a> » <a href="/shop/" >商城首页</a> » <a><?php echo $data['shop_re']['name']?>旗舰店</a> </div>
    </div>
  </div>
  <?php if($data['trade']):?>
  <!--商标-->
  <div class="thrfloor1">
    <div class="col-xs-12 thrsbscst">
      <div class="col-xs-12 shopsb_tit"><img src="<?php echo STATIC_V2;?>images/moban_f1.png"/><b>商标</b><span><a href="<?php create_url('shop',array('shop'=>$data['shop_id']))?>">更多>> </a></span></div>
      <div class="col-xs-12 shopsb_con">
        <div class="col-xs-3 shopsb_img moban_img">
          <div class="www51buycom_moban">
            <ul class="51buypic">
             <?php if($data['ad']['2']):?>
             <?php $i=0; foreach ($data['ad']['2'] as $key=>$value):?>
        	 <?php if($value['state']==3):?>
              <li><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo $value['img']?>" /></a></li>
             <?php else:?>
	        	<?php $i++;?>
	        	<?php if(count($data['ad']['2'])==$i):?>
	        		 <li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/red2.jpg'?>" /></a></li>
	        	<?php endif;?>
	         <?php endif?>
       	     <?php endforeach;?>
       	     <?php else:?>
       	     	<li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/red2.jpg'?>" /></a></li>
       	     <?php endif?>
            </ul>
            <div class="num">
              <ul>
              </ul>
            </div>
          </div>
        </div>
         <?php foreach ($data['trade'] as $key => $value):?>
        <div class="col-xs-3 shop_one_moban<?php echo $key+1>3?'s':''?>"> <a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
          <p>商标名：<?php echo msubstr($value['title'],0,13);?></p>
          <p>注册号：<?php echo $value['tmno']?></p>
          <p>类别：<?php echo $value['items']['name']?></p>
          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
        </div>
        <?php endforeach;?>
      </div>
      <div class="col-xs-12 thrguangao"> <img src="<?php echo $data['ad']['3']['state']==3&&$data['ad']['3']?$data['ad']['3']['img']:STATIC_V2.'images/red3.jpg'?>"/> </div>
    </div>
  </div>
  <!--商标-->
  <?php endif?>
  <?php if($data['pant']):?>
  <!--专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 thrsbscst">
      <div class="col-xs-12 shopsb_tit"><img src="<?php echo STATIC_V2;?>images/moban_f2.png"/><b>专利</b><span><a href="<?php echo U('shop/patnetlist',array('shop'=>$data['shop_id']))?>" >更多>> </a></span></div>
      <div class="col-xs-12 shopsb_con">
        <div class="col-xs-3 shopsb_img moban_img">
          <div class="www51buycom_moban1">
            <ul class="51buypic">
            <?php if($data['ad']['4']):?>
              <?php $i=0; foreach ($data['ad']['4'] as $key=>$value):?>
        	 <?php if($value['state']==3):?>
             <li><a href="<?php echo $value['link']?>" target="_blank"><img src="<?php echo $value['img']?>" /></a></li>
              <?php else:?>
	        	<?php $i++;?>
	        	<?php if(count($data['ad']['4'])==$i):?>
	        		 <li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/red4.jpg'?>" /></a></li>
	        	<?php endif;?>
	        <?php endif?>
       	     <?php endforeach;?>
       	    <?php else:?>
       	     	<li><a  target="_blank"><img src="<?php echo STATIC_V2.'images/red4.jpg'?>" /></a></li>
       	     <?php endif?>
            </ul>
            <div class="num">
              <ul>
              </ul>
            </div>
          </div>
        </div>
        <?php foreach ($data['pant'] as $key => $value):?>
        <div class="col-xs-3 shop_one_moban<?php echo $key+1>3?'s':''?>"> <a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
          <p>专利：<?php echo msubstr($value['title'],0,13);?></p>
          <p>专利号：<?php echo $value['tmno']?></p>
          <p>行业：<?php echo $value['items']['name']?></p>
          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
        </div>
        <?php endforeach;?>
      </div>
      <div class="col-xs-12 thrguangao"> <img src="<?php echo $data['ad']['5']['state']==3&&$data['ad']['5']?$data['ad']['5']['img']:STATIC_V2.'images/red5.jpg'?>"/> </div>
    </div>
  </div>
  <!--专利-->
  <?php endif?>
  <?php if($data['tj']):?>
  <!--精品专利-->
  <div class="thrfloor1">
    <div class="col-xs-12 thrsbscst">
      <div class="col-xs-12 shopsb_tit"><img src="<?php echo STATIC_V2;?>images/moban_f3.png"/><b>特别推荐</b></div>
      <div class="col-xs-12 shopsb_con moban_good">
        <div class='rollphotostk'>
          <div class='blk_29stk'>
            <div class='Cont' id='ISL_Cont_1'>
              <!-- 图片列表 begin -->
              
             <?php foreach ($data['tj'] as $key => $value):?>
        		<?php if($value['tmpa']==1):?>
        			<div class="box"> <a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
			          <p>商标名：<?php echo msubstr($value['title'],0,13);?></p>
			          <p>注册号：<?php echo $value['tmno']?></p>
			          <p>类别：<?php echo $value['items']['name']?></p>
			          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
			        </div>
        		<?php else:?>
        		<div class="box"> <a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
		          <p>专利：<?php echo msubstr($value['title'],0,13);?></p>
		          <p>专利号：<?php echo $value['tmno']?></p>
		          <p>行业：<?php echo $value['items']['name']?></p>
		          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
		        </div>
        		<?php endif?>
              <?php endforeach;?>
              <!-- 图片列表 end -->
            </div>
          </div>
        </div>
        <!--滚动图片 end-->
      </div>
    </div>
  </div>
  <!--精品专利-->
  <?php endif?>
  <!--主体-->
 
  <!--客服-->
  <div class="kefu"> <a href="javascript:;"><img src="<?php echo STATIC_V2;?>images/kefu.png"/></a> </div>
  <div class="shop_qq">
    <div class="shop_qq_title"><?php echo $data['shop_re']['name']?><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> </div>
    <div class="shop_qq_rule">
      <p>联系电话</p>
      <p><?php echo $data['shop_re']['phone']?></p>
    </div>
    <div class="shop_qq_con">
    <?php foreach ($data['shop_re']['kfinfo'] as $key=>$value):?>
    <?php if($value['qqchkshow']==1):?>
      <p> <a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $value['qq']?>&site=qq&menu=yes" target="_blank"> <img src="http://wpa.qq.com/pa?p=1:800020304:51"><?php echo $value['qqname']?></a></p>
    <?php endif;?>
    <?php endforeach;?>
    </div>
    <div class="shop_qq_rule">
      <p>工作时间</p>
       <?php foreach ($data['shop_re']['worktime'] as $key=>$value):?>
       <?php if($value['workshow']==1):?>
      <p><?php echo $value['wsta']?>至<?php echo $value['wend']?>:<?php echo $value['tsta']?>-<?php echo $value['tend']?></p>
      <?php endif;?>
      <?php endforeach;?>
    </div>
  </div>
  <!--客服-->
  
  <!--底部-->
<div class="thrwid bottom bottom_bg">
<div class="thrbottom">
<div class="col-xs-12 indwx_fuwu">
	<div class="col-xs-2 index_fuwus"><a href="http://wpa.qq.com/msgrd?v=3&uin=21556911&site=qq&menu=yes" target="_blank" rel="nofollow"><img src="<?php echo STATIC_V2;?>images/index_dianhua.png"/></a></div>
	<div class="col-xs-10 index_content">
		<div class="col-xs-2 index_fuwust">
			<h2>深圳运营中心</h2>
			<p>地址：深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312</p>
		</div>
		<div class="col-xs-2 index_fuwust">
			<h2>北京运营中心</h2>
			<p>地址：北京市朝阳区望京园602号楼23层2709室</p>
		</div>
		<div class="col-xs-2 index_fuwust">
			<h2>长沙运营中心</h2>
			<p>地址：长沙市开福区湘江中路万达广场B座7层</p>
		</div>
		<div class="col-xs-2 index_fuwust">
			<h2>武汉运营中心</h2>
			<p>地址：武汉市东湖新技术开发区光谷大道62号光谷总部国际1栋2307</p>
		</div>
	</div>
</div>
<div class="col-xs-12 index_fs">
<img src="<?php echo STATIC_V2;?>images/index_fs.png"/>
</div>

</div>
</div>
<div class="thrwid gao8 bottom_last">
<div class="thrbottoms index_border">
<div class="col-xs-1 help index_help">
<dl>
<dt>新手上路</dt>
<?php foreach ($data['help']['class'][0]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>在线交易</dt>
<?php foreach ($data['help']['class'][1]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>特色服务</dt>
<?php foreach ($data['help']['class'][2]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>帮助中心</dt>
<?php foreach ($data['help']['class'][3]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
<div class="col-xs-1 help index_help">
<dl>
<dt>关注我们</dt>
<?php foreach ($data['help']['class'][4]['info'] as $row){ ?>
	<dd><a href="__APP__/news/<?php echo $row['date'];?>/<?php echo $row['id'];?>HTMLSUFFIX" rel="nofollow" target="_blank"><?php echo $row['title'];?></a></dd>
<?php }?>
</dl>
</div>
</div>
<div class="thrbottoms">
<div class="col-xs-8 dizhi">
<p><a href="__APP__/news/20151125/1021.html" rel="nofollow" target="_blank">关于7号网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/news/20150508/1121HTMLSUFFIX" rel="nofollow" target="_blank">官方微信</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://weibo.com/7hip"  rel="nofollow" target="_blank">官方微博</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/siteMap/" target="_blank">网站地图</a></p>
<p><?php echo htmlspecialchars_decode($data['siteInfo']['web_copyright']); ?><?php echo $data['siteInfo']['web_icp']; ?></p>
<p>
	客服热线：<?php echo $data['siteInfo']['web_400']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：<?php echo $data['siteInfo']['web_addr'];?>
	&nbsp;&nbsp;
	<!-- cnzz站长统计  --> 
	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255557615'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1255557615%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></p>
</div>
<div class="col-xs-2 weixin">
<img src="<?php echo STATIC_V2;?>images/weixin.jpg"/><br/>关注7号网微信
</div>
<div class="col-xs-2 weibo">
<a href="http://weibo.com/7hip" rel="nofollow" target="_blank" >+关注</a>
</div>
</div>
</div>
</div>
</div>
<!--底部-->
</div>
<script type='text/javascript'>
/*精品专利*/
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 1200;//显示框宽度
		scrollPic_02.pageWidth      = 300; //翻页宽度
		scrollPic_02.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
/*精品专利*/

/*鼠标移过，左右按钮显示*/
$(".www51buycom_moban").hover(function(){
	$(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
	$(this).find(".prev,.next").hide();
})
/*鼠标移过某个按钮 高亮显示*/
$(".prev,.next").hover(function(){
	$(this).fadeTo("show",0.7);
},function(){
	$(this).fadeTo("show",0.1);
})
$(".www51buycom_moban").slide({ titCell:".num ul" , mainCell:".51buypic" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });

/*鼠标移过，左右按钮显示*/
$(".www51buycom_moban1").hover(function(){
	$(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
	$(this).find(".prev,.next").hide();
})
/*鼠标移过某个按钮 高亮显示*/
$(".prev,.next").hover(function(){
	$(this).fadeTo("show",0.7);
},function(){
	$(this).fadeTo("show",0.1);
})
$(".www51buycom_moban1").slide({ titCell:".num ul" , mainCell:".51buypic" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true });

/*全站搜索*/
$('.form_search').live('click',function(){
	var type_valuye = $(this).attr('type_valuye');
	$('input[name=type]').val(type_valuye);
	$('#moban_forms').submit();
})
/*全站搜索*/

/*客服*/
$('.kefu a').click(function(){
$('.shop_qq').show("slow");
$('.kefu').css('display','none');
})
$('.shop_qq_title span').click(function(){
$('.shop_qq').css('display','none');
$('.kefu').show("slow");
})
/*客服*/

/*banner*/
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
});
/*banner*/

/*右侧热线*/
$('.rexian li').mouseover(function(){
var tt=$(this).index();
$("div[class*='fwtu']").css('display','none');
$(".fwtu"+tt).css('display','block');
$('.rexian li').children('.fwrx').css('display','none');
$(this).children('.fwrx').css('display','block');
})
$('.rexian li').mouseout(function(){
var tt=$(this).index();
$(".fwtu"+tt).css('display','none');
$(this).children('.fwrx').css('display','none');
})
$('.rexian').mouseout(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
})
/*右侧热线*/

$(document).ready(function(){
$(".fwtu1").css('display','block');
$('#sels').children('.fwrx').css('display','block');
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
