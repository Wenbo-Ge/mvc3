<?php
class emailList {
	// 实例化用构造函数
	// function __construct(){
	// 	echo 'list object is created';
	// }

	public function addMethod($id){
		echo "Using Add Method" . $id;
	}

	public function deleteMethod($id){
		echo "Using Delete Method" . $id;
	}

	public function defaultMethod(){
		echo "Using Default Method";
	}
}
	
	


echo "list.php is used<br>";


?>