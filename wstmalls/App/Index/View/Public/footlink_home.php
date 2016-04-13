<!--底部-->
<div class="kuang bottom">
<div class="container kuangs">
<div class="row">
<volist name="data['help']['class']" id="vo">
	<div class="col-xs-1 col-xs-offset-1 help">
		<dl>
		<dt>{$vo['name']}</dt>
		<volist name="vo['info']" id="v">
			<dd><a href="__APP__/news/{$v['date']}/{$v['id']}HTMLSUFFIX" rel="nofollow" target="_blank">{$v['title']}</a></dd>
		</volist>
		</dl>
	</div>
</volist>
<div class="col-xs-2 col-xs-offset-1 helps">
<img src="<?php echo STATIC_V2;?>images/contact.png"/>
电话：<?php echo $data['siteInfo']['web_400']; ?><br/>
QQ：<?php echo $data['siteInfo']['web_qq']; ?>
</div>
</div>
<?php if($data['link']){?>	
<div class="row">
	<div class="col-xs-12 yqlj">
		<ul>
			<li><a href="javascript:void(0);" class="selst">友情链接</a></li>
		</ul>
	</div>
</div>
<?php }?>
<div class="row">
<?php foreach ($data['link'] as $key => $value){?>	
	<div class="col-xs-12 hzjg<?php if($key != 0 ){echo '1';}?>" id="yqljs<?php echo $key++;?>">
		<ul>
		<?php foreach ($value['youlian'] as $k => $v){?>
			<li><a href="<?php echo $v['link'];?>" <?php if($v['title']){echo 'title="'.$v['title'].'"';}?> <?php if($v['nofollow'] == 2){echo 'rel="nofollow"';}?> target="_blank"><?php echo $v['name'];?></a></li>
		<?php }?>
		</ul>
	</div>
<?php }?>
</div>
</div>
</div>