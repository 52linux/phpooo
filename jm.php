<?php
function T_rndstr($length=""){//返回随机字符串 
	$str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; 
	if($length==""){ 
		return str_shuffle($str); 
	}else{ 
		return substr(str_shuffle($str),-$length); 
	} 
} 
$T_k1=T_rndstr();//随机密匙1 
$T_k2=T_rndstr();//随机密匙2 
$vstr=file_get_contents("1.php");//要加密的文件 
$v1=base64_encode($vstr); 
$c=strtr($v1,$T_k1,$T_k2);//根据密匙替换对应字符。 
$c=$T_k1.$T_k2.$c; 
$q=T_rndstr(); 
$isqs=0;//1 取随机字符串为变量名 2 大写O与数字0组成基本变量 
if($isqs=="1"){ 
	$q1=substr($q,2,3); 
	$q2=substr($q,10,10); 
	$q3=substr($q,20,12); 
	$q4=substr($q,30,10); 
	$q5=substr($q,40,8); 
	$q6=substr($q,5,5); 
}else{ 
	$q1="O00O0O"; 
	$q2="O0O000"; 
	$q3="O0OO00"; 
	$q4="OO0O00"; 
	$q5="OO0000"; 
	$q6="O00OO0"; 
} 

$keystr=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A"); 
/* 全字符串 
n1zb/ma5\vt0i28-pxuqy*6lrkdg9_ehcswo4+f37j 
base64_decode //$q1 
strtr //$q2 
substr 
*/ 

$s='$'.$q6.'=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$'.$q1.'=$'.$q6.'{3}.$'.$q6.'{6}.$'.$q6.'{33}.$'.$q6.'{30};$'.$q3.'=$'.$q6.'{33}.$'.$q6.'{10}.$'.$q6.'{24}.$'.$q6.'{10}.$'.$q6.'{24};$'.$q4.'=$'.$q3.'{0}.$'.$q6.'{18}.$'.$q6.'{3}.$'.$q3.'{0}.$'.$q3.'{1}.$'.$q6.'{24};$'.$q5.'=$'.$q6.'{7}.$'.$q6.'{13};$'.$q1.'.=$'.$q6.'{22}.$'.$q6.'{36}.$'.$q6.'{29}.$'.$q6.'{26}.$'.$q6.'{30}.$'.$q6.'{32}.$'.$q6.'{35}.$'.$q6.'{26}.$'.$q6.'{30};eval($'.$q1.'("'.base64_encode('$'.$q2.'="'.$c.'";eval(\'?>\'.$'.$q1.'($'.$q3.'($'.$q4.'($'.$q2.',$'.$q5.'*2),$'.$q4.'($'.$q2.',$'.$q5.',$'.$q5.'),$'.$q4.'($'.$q2.',0,$'.$q5.'))));').'"));';
//echo $s;
echo  'eval(base64_decode("'.base64_encode($s).'"))';



