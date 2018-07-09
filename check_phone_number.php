<?php require_once('includes/config.php'); ?>
<?php
	
	function check_phone($phone){
		global $db;
		$search_phone = $db->prepare("SELECT * FROM users WHERE user_phone = :user_phone");
		$search_phone->execute(array(
			':user_phone' => $phone
		));
		$result = $search_phone->fetchAll();
		if(count($result) > 0){
			return 705;
		}
		else{
			return "OK";
		}
	}	
	
	function set_new_password($user_phone,$new_password) {
		global $db,$user;
		$search_id = $db->prepare("SELECT user_id FROM users WHERE user_phone = :user_phone");
		$search_id->execute(array(':user_phone' => $user_phone));
		$result=$search_id->fetchAll();
		if(count($result) == 1){
			$hashed_password = $user->hash_password($new_password);
			$update_query = $db->prepare("UPDATE users SET user_password=:password WHERE user_id=:id");
			$update_result=$update_query->execute(array(':password' => $hashed_password, ':id' => $result[0]['user_id']));
			
			if($update_result==true) {
				$_SESSION['user_id'] = $result[0]['user_id'];
				$_SESSION['loggedin'] = true;
				return true;
			}
			else {
				return false;
			}
		}
		
		else {
			return false;
		}
	}	
	
	
	
	if(isset($_POST['phone'])) {
		echo json_encode(array('result' => check_phone($_POST['phone'])));
	}
	if(isset($_POST['login_phone'])) {
		echo json_encode(array('result' => check_phone($_POST['login_phone'])));
	}
	
	if(isset($_POST['recover_phone'])) {
		echo json_encode(array('result' => check_phone($_POST['recover_phone'])));
	}
	
	if(isset($_POST['user_phone']) && isset($_POST['new_password'])) {
		$user_phone=$_POST['user_phone'];
		$user_password=trim(preg_replace('/ /','',$_POST['new_password']));
		echo json_encode(array('result' => set_new_password($user_phone,$new_password)));
	}	
	
	
	if(isset($_POST['login_phone_number']) && isset($_POST['login_password'])) {
			$user_phone=$_POST['login_phone_number'];
			$user_password=trim(preg_replace('/ /','',$_POST['login_password']));
			global $user;
			echo json_encode(array('result' => $user->login($user_phone,$user_password)));
		}
		
?>