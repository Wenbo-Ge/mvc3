<?php
//非常适合做rest

require_once('vendor/autoload.php');
require_once('db.php');

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=UTF-8');

$param=$_GET['param'];

//1.  list/add

//2.  list

//3. list/delete{id}

//4. send
// url是一个变量

//问题与构思：
// 问题1：单入口的模式就是在运用restful api吗？
//问题2：在找第二位的请求的时候为什么要实例一个对象？
//问题3：单入口模式下，php文件修改后，直接可以用url调用，好像不需要刷新页面？

//构思：做项目的时候可以直接在url里调用不同文件里的不同方法，这样可以在link上设置不同的url来实现功能，页面的跳转。
//比如要查找联系人，点击list按钮，会跳转到email/emailList的界面，浏览所有的联系人，apache会根据url自动调用emailList.php里的方法来显示所有联系人

// 前端+后端

$param_array=explode('/', $param);

// echo '<pre>';
// var_dump($param_array);
// echo '</pre>';


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
	$method='indexMethod';
}

if (array_key_exists(2, $param_array)) {
	echo $handle_obj->$method($param_array[2]);
}else{
	echo $handle_obj->$method();
}



?>