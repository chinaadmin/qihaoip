<?php
namespace Org\Util;
class ZlgjPage{
     
    public $page; //当前页
    public $pagenum; // 页数
    public $pagesize; // 每页显示条
    public $count;//总数
    public $showPage;//计算偏移量
    public function __construct($count,$pagesize){
    	$this->pagesize = $pagesize;//每页显示数量
    	$this->count = $count;//数据总数量
        $this->pagenum = ceil($this->count/$this->pagesize);//总页数
        $this->page = (isset($_GET['p'])&&$_GET['p']>0) ? intval($_GET['p']) : 1;
    }
    /**
     * 获得 url 后面GET传递的参数
     */
    public function getUrl(){  
        $url = '?'.http_build_query($_GET);
        $url = preg_replace('/[?,&]p=(\w)+/','',$url);
        $url .= (strpos($url,"?") === false) ? '?' : '&';
        return $url;
    }
    
    
    /**
     * 获得 url 后面GET传递的参数
     */
    public function goUrl(){
    	$souurl = http_build_query($_GET);
    	$purl = preg_replace('/[?,&]p=(\w)+/','',$souurl);
    	$souurl = preg_replace('/q=(.*?)+/','',$purl);
    	$esouurl = explode('&',$souurl);
    	$souurl = $esouurl[0];
    	return urldecode($souurl);
    }
 	
    /**
     * 获得分页HTML
     */
    public function getPage(){
    	//计算偏移量
    	$showPage = 5;
    	$pageoffset = ($showPage-1)/2;
    	//初始化数据
        $url = $this->getUrl();
        //$souurl = $this->goUrl();
        $start = $this->page-5;
        $start = $start>0 ? $start : 1; 
        $end = $start+4;
        $end = $end<$this->pagenum ? $end : $this->pagenum;
        $pagestr = '';
        
         if($this->page == 1){
         	$pagestr.='<div class="gjdaohan">';
         	$pagestr.='<div class="gjqiehuan">';
         	//$pagestr.='<div class="qieleft" style="background:#dfdfdf;"><<上一页</div>';
         	$pagestr.='<ul>';
         }

        if($this->page > 1){
        	$pagestr.='<div class="gjdaohan">';
        	$pagestr.='<div class="gjqiehuan">';
        	if($this->page > 5){
        		$pagestr.= '<div class="gjqieleft"><a href='.$url.'p=1'.'>首页</a></div>';
        	}
        	$pagestr.='<div class="gjqieleft"><a href='.$url.'p='.($this->page-1).' title="上一页"> <<上一页</a></div>';
        	$pagestr.='<ul>';
        }
        
        if($this->pagenum > $showPage){
        
        	/* if($this->page > $pageoffset + 1){
        		$pagestr.="...";
        	} */
        
        	if($this->page > $pageoffset){
        		$start = $this->page - $pageoffset;
        		$end = $this->pagenum > $this->page + $pageoffset?$this->page + $pageoffset:$this->pagenum;
        	}
        	
        	if($this->page + $pageoffset > $this->pagenum){
        		$start = $start - ($this->page + $pageoffset -$end);
        	}
        
        }
        
        for($i=$start;$i<=$end;$i++){
        	if($this->page == $i){
        		$pagestr.="<li><a href=".$url."p=".$i.' title='.$i.' style="background: #006aec none repeat scroll 0 0;color: #ffffff;"'.'>'.$i."</a></li>";
        	} else {
        		$pagestr.= "<li><a href=".$url."p=".$i.' title='.$i.'>'.$i."</a></li>";
        	}
                                
        }

        /* if($this->pagenum > $showPage && $this->pagenum > $this->page + $pageoffset){
        	$pagestr.="...";
        } */

        if($this->page!= $this->pagenum){
        	$pagestr.='</ul>';
        	$pagestr.='<div class="gjqieleft"><a href='.$url.'p='.($this->page + 1).' title="下一页">下一页>> </a></div>';
        	if($this->page+5<$this->pagenum){
        		$pagestr.='<div class="gjqieleft"><a href='.$url."p=".$this->pagenum.'>尾页</a></div>';
        	}
        	$pagestr.='<div class="gjtiao">';
        	$pagestr.='<span>';
        	$pagestr.='共'."$this->pagenum".'页/'."$this->count".'条</span>';
        	$pagestr.='<input type="hidden" id="pagecount" value='."$this->pagenum".' />';
        	$pagestr.='<input type="text" id="go" name="p" value='."$this->page".' class="gjinps" />';
        	$pagestr.='<input type="buntton" value="GO" class="gjsub"/>';
        	$pagestr.='</div></div></div>';
        }
        
       if($this->page == $this->pagenum){
	       	$pagestr.='</ul>';
	       	$pagestr.='<div class="gjtiao">';
	       	$pagestr.='<span>';
	       	$pagestr.='共'."$this->pagenum".'页/'."$this->count".'条</span>';
	       	$pagestr.='<input type="hidden" id="pagecount" value='."$this->pagenum".' />';
	       	$pagestr.='<input type="text" id="go" name="p" value='."$this->page".' class="gjinps" />';
	       	$pagestr.='<input type="buntton" value="GO" class="gjsub"/>';
	       	$pagestr.='</div></div></div>';
        }
        return $pagestr;  
    }
}
?>