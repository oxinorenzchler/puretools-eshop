<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/User.php');

//Check post request
if (isset($_POST)) {
	//Instance & initialization
	$user = new User();
	$email = htmlspecialchars($_POST['email']);
	$pw = sha1(htmlspecialchars($_POST['password']));

	//Call login
	$result = json_decode($user->login($email, $pw));

	//Validate login
	if($result){
		//Unset error
		if(isset($_SESSION['auth.error'])){
			unset($_SESSION['auth.error']);
		}
		$_SESSION['user'] = $result;
		header("Location: http://".$_SERVER['SERVER_NAME']."/techies/user_account.php");
	}else{
		//Return to previous page with error
		$_SESSION['auth.error'] = "Invalid credentials. Please check username or password.";
		header("Location: ".$_SERVER['HTTP_REFERER']."");
	}

}