<include file="Public/header" />
<style type="text/css">
body {
	background: #ffffff;
}
</style>
<!--banner-->
<div class="kuang searchgao">
	<div class="container kuangs">
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3 schform">
				<form action="<?php echo U('Search/index');?>" method="get" id="fromsearch">
					<ul>
						<li><a href="javascript:void(0);" type=""
							<?php if($data['type'] == 0){?> class="schsel" <?php }?>
							name="sb">全部</a></li>
						<li><a href="javascript:void(0);" type="1"
							<?php if($data['type'] == 1){?> class="schsel" <?php }?>
							name="sb">商标</a></li>
						<li><a href="javascript:void(0);" type="2"
							<?php if($data['type'] == 2){?> class="schsel" <?php }?>
							name="zl">专利</a></li> 
						<li><a href="javascript:void(0);" type="3"
							<?php if($data['type'] == 3){?> class="schsel" <?php }?>
							name="sc">商城</a></li>
						<!-- <li><a href="javascript:void(0);" type="4"
							<?php if($data['type'] == 4){?> class="schsel" <?php }?>
							name="zx">资讯</a></li> -->
					</ul>
					<input type="hidden" name="type" value="<?php echo $data['type']?>" />
					<div class="schconts">
						<input name="name" type="text" class="searchst" value="<?php echo $data['name']?>"
							placeholder="请在输入框中输入您想要搜索的内容" /> <input type="submit" name=""
							class="searchtijiao" id="tijiao" value="立即搜索" />
					</div>
				</form>
			</div>
			<div class="col-xs-2 col-xs-offset-5 zhsstt">搜索</div>
		</div>
	</div>
</div>
<!--banner-->
<!--主体-->

<div class="kuang">
	<div class="kuangs container searchgao1">
		<div class="row">
			<!--搜索结果-->
			<div class="col-xs-4 col-xs-offset-4 searchtitt">
				<img src="<?php echo STATIC_V2;?>images/searchnews.png" />
			</div>
			<div class="col-xs-12 schresult">
			<?php if($data ['item_data']):?>
				<?php foreach ($data['item_data'] as $key=>$value):?>
					<?php if($value['tmpa']==1){
									$url = 'trademark/';
								 }elseif($value['tmpa']==2){
									$url = 'patent/';
								 }?>
					<div class="col-xs-3">
						<div class="onetu searchbuto">
							<a href="__APP__/<?php echo $url;?><?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title']?>" target="_blank"><img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>" alt="<?php echo $value['title'];?>" /></a>
							<div class="sblibietsch">价格：<?php echo $value['price']!='0'?$value['price']:'面议'?></div>
							<div class="jianshaos1 bgcolorst">
								<a href="#" title="#" target="_blank">
									<p>商标名：<?php echo $value['title']?></p>
									<p>注册号：<?php echo $value['tmno']?></p>
									<p>价格：<?php echo $value['price']!='0'?$value['price']:'面议'?></p>
								</a>
							</div>
						</div>
					</div>
			<?php endforeach;?>
			<?php else:?>
				<div class="col-xs-12 img_center">
					<img src="<?php echo STATIC_V2;?>images/katong.jpg"/><br/>
					对不起，没有找到相关的内容！
				</div>
			<?php endif;?>
				<div class="col-xs-12">
					<?php echo $data['page'];?>
				</div>
			</div>
			<!--搜索结果-->
			<!--热门搜索-->
			<div class="col-xs-4 col-xs-offset-4 searchtitt">
				<img src="<?php echo STATIC_V2;?>images/hotsearch.png" />
			</div>
			<div class="col-xs-12 guedou">
				<!--滚动图片 start-->
				<div class='rollphotos'>
					<div class='blk_29s'>
						<div class='LeftBotton' id='LeftArr'></div>
						<div class='Cont' id='ISL_Cont_1'>
							<!-- 图片列表 begin -->
							
						<?php foreach ($data['item_view'] as $key=>$value):?>
							<?php if($value['tmpa']==1){
									$url = 'trademark/';
								 }elseif($value['tmpa']==2){
									$url = 'patent/';
								 }?>
								
							<div class='box'>
								<a href="__APP__/<?php echo $url ;?><?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>" target='_blank'><img src="<?php echo $value['img']?>" alt="<?php echo $value['title'];?>" /></a>
								<div class="sblibiet">
									<a href="__APP__/<?php echo $url ;?><?php echo $value['id'];?>HTMLSUFFIX" target="_blank"><?php echo $value['title']?></a>
								</div>
							</div>
						<?php endforeach;?>
							<!-- 图片列表 end -->
						</div>
						<div class='RightBotton' id='RightArr'></div>
					</div>
				</div>
				<!--滚动图片 end-->
			</div>
			<div class="col-xs-4 col-xs-offset-4 searchtitt">
				<img src="<?php echo STATIC_V2;?>images/hotschbottom.png" />
			</div>
			<!--热门搜索-->
		</div>
	</div>
</div>

<!--主体-->
<include file="Public/footlink_home" />
<include file="Public/foot" />
<script type='text/javascript'>					
/*发明趣闻滚动*/
var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "ISL_Cont_1"; //内容容器ID
		scrollPic_02.arrLeftId      = "LeftArr";//左箭头ID
		scrollPic_02.arrRightId     = "RightArr"; //右箭头ID
		scrollPic_02.frameWidth     = 800;//显示框宽度
		scrollPic_02.pageWidth      = 245; //翻页宽度
		scrollPic_02.speed          = 50; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 400; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
/*发明趣闻滚动*/
/*搜索类别切换*/
$('.schform li').click(function(){
$('.schform li a').removeClass('schsel');
$(this).find("a").addClass('schsel');
var type = $(this).find('a').attr('type');
$('input[name=type]').val(type);
})
/*搜索类别切换*/
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
$('.help').first().removeClass('col-xs-offset-1');
});
</script>
</body>
</html>