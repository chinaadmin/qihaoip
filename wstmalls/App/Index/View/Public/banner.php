<!--banner-->
<div class="kuang gao3">
<div class="flexslider">
        <ul class="slides">
        	<?php foreach ($data['banner'] as $row){ 
        	echo '
		    <li style="background:url('.$row['img'].') 50% 0 no-repeat;background-color:'.$row['about'].';"><a href="'.$row['link'].'" title="'.$row['name'].'" target="_blank"><img src="'.STATIC_V2.'images/blank.png" width="100%" height="430"></a></li>';
			} ?>
        </ul>
</div>
</div>
<!--banner-->