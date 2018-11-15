<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Auth.php');


if (isset($_POST['register'])) {
	
	$user = new User();

	$rules = array(
		'name' => ['required','string'],
		'email' => ['required','email'],
		'password' => ['required', 'min'],
		'phone' => ['required','tel'],
	);

	var_dump($rules);

	$user->validate($_POST, $rules);


	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		//Insert to DB and check if success
		if($product->addProduct($request)){

			$_SESSION['success'] = "Item added";
			//Redirect
			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}

	}
}