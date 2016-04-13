<notempty name="data['link']">
<div class="col-xs-12 yqlj">
 <ul>
  <volist name="data['link']" id="vo">
    <li><a href="javascript:void(0);" <eq name="key" value="0">class="selst"</eq>>{$vo['name']}</a></li>	
  </volist>
 </ul>
</div>
<div class="row thrbottomst">
 <volist name="data['link']" id="vo">
   <div class="col-xs-12 hzjg<if condition="$key gt 0 ">1</if> index_imglink" id="yqljs{$key++}">
     <ul>
       <volist name="vo['youlian']" id="v">
         <li><a href="{$v['link']}" <notempty name="v['title']">title="{$v['title']}"</notempty> <eq name="v['nofollow']" value="2">rel="nofollow"</eq> target="_blank"><notempty name="v['img']"><img src="{$v['img']}" alt="{$v['alt']}"/><else/>{$v['name']}</notempty></a></li>
       </volist>
     </ul>
   </div>
 </volist>
</div>
</notempty>