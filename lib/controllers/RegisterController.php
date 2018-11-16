<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/User.php');

if (isset($_POST)) {


		$user = new User();
	$rules = array(
		'name' => ['required','string'],
		'email' => ['required','email'],
		'password' => ['required', 'min'],
		'password_confirmation' => ['password_confirmation'],
		'phone' => ['required','tel'],
	);

	$user->validate($_POST, $rules);

	//Assign values
	$request = array(

		'name' => $_POST['name'],
		'role_id' => 1,
		'email' => $_POST['email'],
		'password' => sha1($_POST['password']),
		'phone' => $_POST['phone'],

	);


	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		//Insert to DB and check if success
		if($user->insert($request)){

			// $_SESSION['success'] = "";
			// Redirect
			header("Location: http://".$_SERVER['SERVER_NAME']."/techies/login.php");

		}

	}
}