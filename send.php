<?php
class send{
	// 实例化用构造函数
	// function __construct(){
	// 	echo 'send object is created';
	// }

/*

Request:
Method:POST
URL: send
Data:{
	'id':'3',
	'rcpt':'info@gmail.com'
}

will return
*/

	public function otherMethod(){
		echo "Using Other Method";
	}

	public function indexMethod(){
		$tid=$_POST['id'];
		$recipient=$_POST['rcpt'];
		$conn=new DBConnection();
		$result = $conn->getTemplateById($tid);

		try{
			$mandrill = new Mandrill('aSznWSiyxJ8Kv-JemSNvgQ');
			$message =array(
				'html' => $result['content'],
				'subject'=>$result['name'],
				'from_email'=>'postman@sunnyfuture.ca',
				'from_name'=>'Wenbo',
				'to'=>array(
					array(
						'email'=>$recipient,
						'type'=>'to'
					)
				),
				'headers'=>array(
					'Reply-To' =>'gwb19920921@gmail.com'
				),
				'important'=>true,
				'track_opens'=>true,
				'track_click'=>true
			);
			$async=false;
			$ip_pool='Main Pool';
			$result=$mandrill->messages->send($message,$async,$ip_pool);
			return json_encode(array(
				'code'=>200,
				'message'=>'success'
			));
		} catch(Mandrill_Error $e){
			return json_encode(array(
				'code'=>400,
				'message'=>'fail'
			));
		}
	}
}


?>