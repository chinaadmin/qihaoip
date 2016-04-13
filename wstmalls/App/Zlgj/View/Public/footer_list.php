<div class="zllist_bottom">
	©2014-2018 7号网 版权所有ICP经营性许可证：粤ICP备15024104号-2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客服热线：400-889-7080&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;深圳市南山区南山大道3838号深圳设计产业园金栋210-223、308-312
</div>
<script type='text/javascript'>
/*
*直接跳转分页功能
*/
$(".gjsub").click(function(){
    var go = $('#go').val();
    var pagenum = $('#pagecount').val();
 	if(parseInt(go) > parseInt(pagenum) || parseInt(go) < '1'){
    	$.MsgBoxgj.Alert("温馨提示：",'对不起，当前页无效！');
    	return false;
    }
    $url = changeURL(window.location.href,'p',go);
    window.location.href = $url;
});
/*
* url 目标url
* arg 需要替换的参数名称
* arg_val 替换后的参数的值
* return url 参数替换后的url
*/
function changeURL(url,arg,arg_val){
    var pattern=arg+'=([^&]*)';
    var replaceText=arg+'='+arg_val; 
    if(url.match(pattern)){
        var tmp='/('+ arg+'=)([^&]*)/gi';
        tmp=url.replace(eval(tmp),replaceText);
        return tmp;
    }else{
        if(url.match('[\?]')){
            return url+'&'+replaceText;
        }else{
            return url+'?'+replaceText;
        }
    }
    return url+'\n'+arg+'\n'+arg_val;
}
$(document).ready(function(){
	$('.onth').parents('dl').children('dd').slideToggle("slow");
	});
</script>