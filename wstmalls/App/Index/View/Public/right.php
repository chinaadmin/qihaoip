<div class="col-xs-3 news-list-right">
      <div class="col-xs-12 news-list-rights">
        <div class="col-xs-12 news-list-rights-top">
          <div class="www51buycomss">
            <ul class="51buypic">
            <volist name="data['adv']" id="vo">
              <li>
              	<a href="{$vo['link']}" title="{$vo['name']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['name']}"/></a>
                <div class="biaotik"><a href="{$vo['link']}" title="{$vo['name']}">{$vo['name']}</a></div>
              </li>
            </volist>
            </ul>
            <div class="num">
              <ul>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xs-12 shop_margin">
          <div class="col-xs-12 shop_titles">点击排行 <a href="__APP__/news/hot/" target="_blank">更多>></a></div>
          <div class="col-xs-12 news-click-list">
            <ul>
            <volist name="data['hot']" id="vo">
	            <if condition="$i elt 3">
	              <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><span class="news-span-color">{$i}</span>{$vo['title']|htmlspecialchars_decode|msubstr=0,18}</a></li>
	            <else/>
	              <li><a href="__APP__/news/{$vo['date']}/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><span>{$i}</span>{$vo['title']|htmlspecialchars_decode|msubstr=0,18}</a></li>
	            </if>
            </volist>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 shop_margin">
          <div class="col-xs-12 news-right-erweima">
            <div class="col-xs-12 news-right-erweima-top">关注我们的自媒体<br/>获得更多优秀内容 </div>
            <div class="col-xs-12 news-right-erweima-middle">7号新浪微博账号：前海七号<br/>7号网微信订阅账号：qihaosub </div>
            <img src="{$Think.STATIC_V2}images/news-weixin-img.jpg"/><br/>扫描二维码立即关注 
          </div>
        </div>
        <div class="col-xs-12 shop_margin">
          <div class="col-xs-12 shop_titles">推荐商标 <a href="__APP__/trademark/fine/" target="_blank">更多>></a></div>
          <div class="col-xs-12 news-sb-tuijian">
           <volist name="data['tm']" id="vo"> 
            <div class="col-xs-12 news-sb-tuijian-one"> 
              <a href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}商标转让"></a>
              <div class="news-sb-tuijian-ones"><span>{$vo['price']}</span>
                <p>【{$vo['catename']}】<a href="__APP__/trademark/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,8}</a></p>
                <div class="col-xs-12">{$vo['tmlimit']|msubstr=0,14}</div>
              </div>
            </div>
            </volist>
          </div>
        </div>
        <div class="col-xs-12 shop_margin">
          <div class="col-xs-12 shop_titles">推荐专利 <a href="__APP__/patent/recommend/" target="_blank">更多>></a></div>
          <div class="col-xs-12 news-sb-tuijian">
           <volist name="data['pt']" id="vo"> 
            <div class="col-xs-12 news-sb-tuijian-one"> 
              <a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank"><img src="{$vo['img']}" alt="{$vo['title']}专利转让"></a>
              <div class="news-sb-tuijian-ones"><span>{$vo['price']}</span>
                <p>【{$vo['tmtype']}】<a href="__APP__/patent/{$vo['id']}HTMLSUFFIX" title="{$vo['title']}" target="_blank">{$vo['title']|msubstr=0,7}</a></p>
                <div class="col-xs-12">{$vo['category']}</div>
              </div>
            </div>
           </volist>
          </div>
        </div>
      </div>
 </div>