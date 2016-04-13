<div class="col-xs-12 newmidconsts">
<div class="newtit"><span>推荐商标</span></div>
<div class="col-xs-12 newybs">
<?php foreach ($data['tm'] as $value){?>
	<div class="col-xs-12 newybs">
		<div class="col-xs-6 tuijiannews">
			<img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>" alt="<?php echo $value['title'];?>商标"/>
			<div class="sblibie"><?php echo msubstr(strip_tags($value['title']),0,15);?></div>
			<div class="jianshaos1 vsbyeset3">
				<a href="__APP__/trademark/<?php echo $value['id'];?>HTMLSUFFIX" title="<?php echo $value['title'];?>商标转让" target="_blank">
					<p>商标名：<?php echo msubstr(strip_tags($value['title']),0,12);?></p>
					<p>注册号：<?php echo $value['tmno'];?></p>
					<p>类别：<?php echo $value['name'];?></p>
					<p>价格：<span><?php echo $value['price']>'0'?$value['price']:'面议';?></span></p>
				</a>
			</div>
		</div>
	</div>
<?php }?>
</div>
</div>
<div class="col-xs-12 newmidconsts">
<div class="newtit"><span>推荐专利</span></div>
<div class="col-xs-12 newybs">
<?php foreach ($data['pt'] as $value){?>
	<div class="col-xs-6 tuijiannews">
		<img src="<?php $img = explode(',',$value['img']); echo $img['0'];?>" alt="<?php echo $value['title'];?>专利"/>
		<div class="sblibie"><?php echo msubstr(strip_tags($value['title']),0,12);?></div>
		<div class="jianshaos1 vsbyeset3">
			<a href="__APP__/patent/<?php echo $value['id']?>HTMLSUFFIX" title="<?php echo $value['title'];?>专利转让" target="_blank">
				<p>专利名：<?php echo msubstr(strip_tags($value['title']),0,10);?></p>
				<p>专利号：<?php echo $value['tmno'];?></p>
				<p>价格：<span><?php echo $value['price']>'0'?$value['price']:'面议';?></span></p>
			</a>
		</div>
	</div>
<?php }?>
	</div>
</div>