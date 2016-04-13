<!--装修模板1-->
          <div class="thrwid" >
            <!--头部-->
            <div class="kuang vtop zx_top_title"> 自定义装修 </div>
            <!--logo与导航-->
 
            <div class="thrgao">
              <div class="col-xs-4 vlogo"> <a href="/" ><img src="<?php echo STATIC_V2;?>images/logo.png"/><img src="<?php echo STATIC_V2;?>images/logo3.png"/></a> </div>
              <div class="col-xs-8 vdaohan">
                <ul>
                  <li><a>店铺首页</a></li>
                  <li><a>店铺简介</a></li>
                  <li><a>商标</a></li>
                  <li><a>专利</a></li>
                  <li><a>诚邀入驻</a></li>
                </ul>
              </div>
            </div>

            <!--logo与导航-->
            <!--头部-->
            <!--banner-->
            <div class="kuang gao3 thrshangchengao">
              <div class="flexslider">
                <ul class="slides">
                  <li style="background:url(<?php echo $data['ad']['1']['img']?$data['ad']['1']['img']:STATIC_V2."images/green1.jpg" ?>) 50% 0 no-repeat;"><img src="<?php echo STATIC_V2;?>images/blank.png" width="100%" height="430"></li>
                </ul>
              </div>
              <button type="button" class="btn btn-primary zx_cks posts2" rel="1" title="该图片1920*430px">编辑</button>
            </div>
            <!--banner-->
            <!--主体-->
            <!--4F 日化产品-->
            <div class="thrwid shop_index">
              <div class="thrfloor1 shopindex_con">
                <div class="shop_logo"> <a href="<?php echo U('Index/shop/shop_list',array('shop'=>$data['shop_re']['id']))?>" target="_blank"><img src="<?php echo $data['shop_re']['logo']?$data['shop_re']['logo']:STATIC_V2.'images/logo_default.jpg'?>"/></a> </div>
                <div class="shop_title"><?php echo $data['shop_re']['name']?$data['shop_re']['name']:'XXX'?>旗舰店</div>
                <div class="shop_search">
                  <form action="#" method="get">
                    <input type="text" name="name" class="bdsearch" />
                    <input type="hidden" name="type" value='3'/>
                    <input type="hidden" name="shop" value="1820" />
                    <button type="submit" class="tijiaosearch">| 搜本店</button>
                  </form>
                </div>
                <div class="shop_mbx"> 当前位置：<a href="/">7号网</a> » <a href="http://www.qihaoip.com/shop/" >商城首页</a> » <a href="http://www.qihaoip.com/shop/shop_list/shop/1820.html">7号网自营店</a> </div>
              </div>
            </div>
            <!--商标-->
            <div class="thrfloor1">
              <div class="col-xs-12 thrsbscst">
                <div class="col-xs-12 shopsb_tit"><b>商标</b><span><a href="#" title="#">更多>> </a></span></div>
                <div class="col-xs-12 shopsb_con">
                  <div class="col-xs-3 shopsb_img"><img src="<?php echo $data['ad']['2']['img']?$data['ad']['2']['img']:STATIC_V2."images/green2.jpg" ?>"/>
                    <button type="button" class="btn btn-primary zx_cks posts2" rel="2" title="该图片300*594px">编辑</button>
                  </div>
                  <?php foreach ($data['trade'] as $key => $value):?>
			        <div class="col-xs-3 shop_one">
			        <a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
			          <p>商标名：<?php echo msubstr($value['title'],0,13);?></p>
			          <p>注册号：<?php echo $value['tmno']?></p>
			          <p>类别：<?php echo $value['items']['name']?></p>
			          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
			        </div>
			        <?php endforeach;?>
                </div>
                <div class="col-xs-12 thrguangao"> <img src="<?php echo $data['ad']['3']['img']?$data['ad']['3']['img']:STATIC_V2."images/green3.jpg" ?>"/>
                  <button type="button" class="btn btn-primary zx_cks posts2" rel="3" title="该图片1200*80px">编辑</button>
                </div>
              </div>
            </div>
            <!--商标-->
            <!--专利-->
            <div class="thrfloor1">
              <div class="col-xs-12 thrsbscst">
                <div class="col-xs-12 shopsb_tit"><b>专利</b><span><a href="#" title="#">更多>> </a></span></div>
                <div class="col-xs-12 shopsb_con">
                  <div class="col-xs-3 shopsb_img"><img src="<?php echo $data['ad']['4']['img']?$data['ad']['4']['img']:STATIC_V2."images/green4.jpg" ?>"/>
                    <button type="button" class="btn btn-primary zx_cks posts2" rel="4" title="该图片300*594px">编辑</button>
                  </div>
                  <?php foreach ($data['pant'] as $key => $value):?>
			        <div class="col-xs-3 shop_one"> <a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
			          <p>专利：<?php echo msubstr($value['title'],0,13);?></p>
			          <p>专利号：<?php echo $value['tmno']?></p>
			          <p>行业：<?php echo $value['items']['name']?></p>
			          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
			        </div>
			        <?php endforeach;?>
                </div>
                <div class="col-xs-12 thrguangao"> <img src="<?php echo $data['ad']['5']['img']?$data['ad']['5']['img']:STATIC_V2."images/green5.jpg" ?>"/>
                  <button type="button" class="btn btn-primary zx_cks posts2" rel="5" title="该图片1200*80px">编辑</button>
                </div>
              </div>
            </div>
            <!--专利-->
            <!--精品专利-->
            <div class="thrfloor1">
              <div class="col-xs-12 thrsbscst">
                <div class="col-xs-12 shopsb_tit"><b>特别推荐</b></div>
                <div class="col-xs-12 shopsb_con">
                 <?php foreach ($data['tj'] as $key => $value):?>
        		<?php if($value['tmpa']==1):?>
        			<div class="col-xs-3 shop_one"> <a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
			          <p>商标名：<?php echo msubstr($value['title'],0,13);?></p>
			          <p>注册号：<?php echo $value['tmno']?></p>
			          <p>类别：<?php echo $value['items']['name']?></p>
			          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
			        </div>
        		<?php else:?>
        		<div class="col-xs-3 shop_one"> <a href="__APP__/patent/<?php echo $value['id'];?>HTMLSUFFIX"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>"/></a>
		          <p>专利：<?php echo msubstr($value['title'],0,13);?></p>
		          <p>专利号：<?php echo $value['tmno']?></p>
		          <p>行业：<?php echo $value['items']['name']?></p>
		          <span>价格：<?php echo $value['price']=='0'?'面议':$value['price']?></span>
		        </div>
        		<?php endif?>
              <?php endforeach;?>
                </div>
              </div>
            </div>
            <div class="col-xs-12 moban_bottom"> <img src="<?php echo STATIC_V2;?>images/moban_bottom.jpg"/> </div>
            <!--精品专利-->
            <!--主体-->
            <!--底部-->
            <!--底部-->
          </div>
		  <!--装修模板1-->
		  