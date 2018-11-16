<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/User.php');


if (isset($_POST)) {

	$user = new User();
	$email = htmlspecialchars($_POST['email']);
	$pw = sha1(htmlspecialchars($_POST['password']));

	$result = json_decode($user->login($email, $pw));

	//Validate login
	if($result){
		$_SESSION['user'] = $result;
		header("Location: http://".$_SERVER['SERVER_NAME']."/techies/user_account.php");
	}

}