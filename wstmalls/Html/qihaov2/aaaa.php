<?php 
header("content-type:text/html;charset=utf-8");
//header("content-type:text/xml;charset=utf-8");
//file_put_contents("d:/mylog.log","ok",FILE_APPEND);
$id=$_POST['id'];
//file_put_contents("d:/mylog.log","ok".$username."\r\n",FILE_APPEND);
if($id){
	//echo "不可以用";
	echo "[{'res':'可以用','info':'嘻嘻'},{'res':'可以用11','info':'嘻嘻11'}]";
	//echo "<result><res>不可以用</res><info>哈哈</info></result>";
}