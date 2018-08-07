<?php include_once('includes/config.php'); ?>
<?php
	include_once "smsc_api.php";
	function get_random_code() {
		$min=1000;
		$max=9999;
		return rand($min,$max);
	}
	
	
	function send_code_smsc_ru($phone_number) {
		$phone_number=preg_replace('![^0-9]+!', '', $phone_number);
		$code=get_random_code();
		$result=send_sms($phone_number, $code);
		$len=sizeof($result);
		if($len > 2) {
			return $code;
		}
		else {
			return 0;
		}
	}
	
	
	if(isset($_POST['phone'])) {
	    echo json_encode(array('result' => 7777));
		/*$result=send_code_smsc_ru($_POST['phone']);
		 if($result==0) {
			 $result=send_code_smsc_ru($_POST['phone']);
			 if($result==0) {
				 echo json_encode(array('result' => 700));
			 }
			 else {
				 echo json_encode(array('result' => $result));
			 }
		
		 }
		 else {
			 echo json_encode(array('result' => $result));
			 
		}*/
	}
	
	if(isset($_POST['signout'])) { 
		try {
			$user->logout();
			 echo json_encode(array('result' => "OK"));
			}
		catch(PDOException $e) {
			 echo json_encode(array('result' => 701));
		}
	}
	
	

?>