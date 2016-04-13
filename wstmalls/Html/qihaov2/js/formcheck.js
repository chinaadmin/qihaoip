 /*判断用户输入是否为空*/ 
  function isEmpty(ui){
  if(ui==null||ui==""){return false};
}
/*取得用户输入的字符串的长度*/ 
function getLength(ui){ 
var i,sum=0; 
for(i=0;i<ui.length;i++){
if ((ui.charCodeAt(i)>=0)&&(ui.charCodeAt(i)<=255)) 
sum++; 
else
sum+=2;
}
return sum;
} 
/*判断是否为身份证号码*/ 
function isIdno(ui){ 
   var valid=/(^\d{16}$)|(^\d{18}$)/; 
   return (isEmpty(ui)||valid.test(ui));
} 
/*判断radio是否已选择*/
function ischecked(ui){
for(radio in ui) {
   if(!ui[radio].checked){
	  return false;
   }
}
} 
/*判断是否为移动电话*/ 
 function isChinaMob(ui){ 
var valid=/^1[3|4|5|8][0-9]\d{8}$/; 
return (isEmpty(ui)||valid.test(ui));
}
/*判断是否为固定电话*/ 
function isChinaTel(ui){
var valid=/^0\d{2,3}\-\d{7,8}$/; 
return (isEmpty(ui)||valid.test(ui));
}  
/*判断是否为邮箱*/
function isMail(ui){ 
var valid=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
return (isEmpty(ui)||valid.test(ui));
} 
/*判断是否为QQ*/
function isQQ(ui){
var valid=/^\d{5,10}$/;
return (isEmpty(ui)||valid.test(ui));
}
/*判断是否为微信*/
function isWeixin(ui){
var valid=/^[a-z_\d]+$/;
return (isEmpty(ui)||valid.test(ui));
}