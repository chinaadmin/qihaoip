 /*�ж��û������Ƿ�Ϊ��*/ 
  function isEmpty(ui){
  if(ui==null||ui==""){return false};
}
/*ȡ���û�������ַ����ĳ���*/ 
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
/*�ж��Ƿ�Ϊ���֤����*/ 
function isIdno(ui){ 
   var valid=/(^\d{16}$)|(^\d{18}$)/; 
   return (isEmpty(ui)||valid.test(ui));
} 
/*�ж�radio�Ƿ���ѡ��*/
function ischecked(ui){
for(radio in ui) {
   if(!ui[radio].checked){
	  return false;
   }
}
} 
/*�ж��Ƿ�Ϊ�ƶ��绰*/ 
 function isChinaMob(ui){ 
var valid=/^1[3|4|5|8][0-9]\d{8}$/; 
return (isEmpty(ui)||valid.test(ui));
}
/*�ж��Ƿ�Ϊ�̶��绰*/ 
function isChinaTel(ui){
var valid=/^0\d{2,3}\-\d{7,8}$/; 
return (isEmpty(ui)||valid.test(ui));
}  
/*�ж��Ƿ�Ϊ����*/
function isMail(ui){ 
var valid=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
return (isEmpty(ui)||valid.test(ui));
} 
/*�ж��Ƿ�ΪQQ*/
function isQQ(ui){
var valid=/^\d{5,10}$/;
return (isEmpty(ui)||valid.test(ui));
}
/*�ж��Ƿ�Ϊ΢��*/
function isWeixin(ui){
var valid=/^[a-z_\d]+$/;
return (isEmpty(ui)||valid.test(ui));
}