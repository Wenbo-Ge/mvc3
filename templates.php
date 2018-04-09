<?php
class templates {
	// 实例化用构造函数
	// function __construct(){
	// 	echo 'list object is created';
	// }

	

	//程序多写一些解释

/*
	*@Method otherMethod
	*@input int id input id to delete
	*@Output boolean if ture delete success
	*Detail - Current 
*/

	

	public function defaultMethod(){
		return "template index action is working";
	}

	
	/*写一些注释和定义()restful api,开发者和使用者都按照这个标准

	* Method:POST
	* URL:template/save
	*
	* Request body format
	* request - post :
	* {
		'content':'<h1>html content </h1>',
		'name': 'template 1',
		'var': 'var1;var2'
	  }

	*will return format:
	*json:
		{
		'code':200,
		'message':'success'
		}
	*/

	public function saveMethod(){
		$content=$_POST['content'];
		$name=$_POST['name'];
		$var=$_POST['var'];

		$conn= new DBConnection();
		$result=$conn->addTemplate($content,$name,$var);
		if ($result) {
			return json_encode(array('code'=>200,
				'message'=>'Template add success'));
		}else{
			return json_encode(array('code'=>500,
				'message'=>'Template add failed'));
		}
	}

	/*
	* Request body format
	* Method:GET
	*URL: templates/get
	*will return:
	*json:
	[
		{'id':1,
		'content':'hello',
		'name':'template 1',
		'var': 'var1;var2'}
	]
	*/

	public function getMethod(){
		$conn=new DBConnection();
		$results=$conn->getAllTemplates();

		if ($results) {
			return json_encode($results);
		} else {
			return json_encode(array('code'=>400,
				'message'=>'No template exits'));
		}
		
	}
}



?>