<?php

$param=$_GET['param'];

//1.  list/add

//2.  list

//3. list/delete{id}

//4. send
// url是一个变量



$param_array=explode('/', $param);

echo '<pre>';
var_dump($param_array);
echo '</pre>';


//Use url变量array来访问文件
// $param_array[0]=emailList
// 找第一位的请求
if (!file_exists($param_array[0]. '.php')) {
	echo "Sorry, wrong route";
	exit;
}
require_once($param_array[0].'.php');

$handle_obj=new $param_array[0]();
// 找第二位的请求
if (array_key_exists(1, $param_array)) {
	$method=$param_array[1].'Method';
}else{
	$method='defaultMethod';
}

if (array_key_exists(2, $param_array)) {
	$handle_obj->$method($param_array[2]);
}else{
	$handle_obj->$method();
}



?>