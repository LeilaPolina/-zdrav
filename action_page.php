<?php 
	include_once "smsc_api.php";
	
	function get_random_code() {
		$min=1000;
		$max=9999;
		return rand($min,$max);
	}
	
	function send_code_sms_ru($phone_number) {
		$phone_number=preg_replace('![^0-9]+!', '', $phone_number);
		$code=get_random_code();
		$smsru = new SMSRU('34BCD573-33C6-5B8C-83A0-261389F4E13F');//6005E9B9-62AF-B32E-E76C-DF3F7BD94A86   
		$data = new stdClass();
		$data->to = $phone_number;	
		$data->text = $code;
		$sms = $smsru->send_one($data); 
		if ($sms->status == "OK") { 
			return $code;
		} else {
			return 0;
		}
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
		echo json_encode(array('result' => 7777));//send_code_sms_ru($_POST['phone'])));
		/* $result=send_code_smsc_ru($_POST['phone']);
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
?>