<?php
	class User{
		private $db;

		public function __construct($db){
			$this->db = $db; 
		}
		
		public function is_logged_in(){
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
				return true;
			}
		}
		
		public function login($user_phone,$user_password){
			$search_user = $this->db->prepare("SELECT * FROM users WHERE user_phone = :user_phone");
			$search_user->execute(array(':user_phone' => $user_phone));
			$result = $search_user->fetchAll();
			if(count($result) > 0){
				$hashed_password=$result[0]['user_password'];
				if (password_verify($user_password, $hashed_password)) {
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
		
        
		public function logout(){
			$_SESSION = array();
			session_destroy();
		}
		
		public function hash_password($password){
			$options = ['cost' => 12];
			$hashed_password=password_hash($password, PASSWORD_BCRYPT, $options);
			return $hashed_password;
		}
	}
?>