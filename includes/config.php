<?php
	require_once('classes/class.user.php');
	ob_start();
	session_start();
	try{
		$db_hostname = "localhost";
		//$db_username = "abcbuh";
		//$db_password = "qaz1212w";
		//$db = new PDO("mysql:host=$db_hostname;dbname=abcbuh_clientarea;charset=utf8", $db_username, //$db_password);
		$db = new PDO("mysql:host=localhost;dbname=abcbuh_clientarea;charset=utf8", "root", "mysql");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$user = new User($db);
	 }
	 
	catch(PDOException $e){
		return "775"; //"Connection failed: " . $e->getMessage();
	}
	
	
	
?>
