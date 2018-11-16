<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/User.php');


$user = new User();

if (isset($_POST['register'])) {

	var_dump($_POST);
	$rules = array(
		'name' => ['required','string'],
		'email' => ['required','email'],
		'password' => ['required', 'min'],
		'phone' => ['required','tel'],
	);

	var_dump($rules);

	$user->validate($_POST, $rules);

	//Assign values
	$request = array(

		'name' => $_POST['name'],
		'role_id' => 1,
		'email' => $_POST['email'],
		'password' => $_POST['password'],
		'phone' => $_POST['phone'],

	);


	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		//Insert to DB and check if success
		if($user->register($request)){

			// $_SESSION['success'] = "";
			// Redirect
			header("Location: http://".$_SERVER['SERVER_NAME']."/techies/login.php");

		}

	}
}