<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/User.php');

$user = new User();

//Check post request
if (isset($_POST['edit_account'])) {

	$id = $_POST['id'];

	$rules = array(
		'name' => ['required','string'],
		'email' => ['required','email'],
		'phone' => ['required','tel'],
		'address' => ['required', 'string'],
	);


	$user->validate($_POST, $rules);

	$request = array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone'],
		'address' => $_POST['address'],
	);

	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		$update = $user->update($request, $id);
		//Update to DB and check if success
		if(!$update){

			//fetch user updated data and store in session
			$result = $user->find($id);

			$_SESSION['user'] = json_decode($result);
			

			$_SESSION['success'] = "Account updated.";
			
			// //Redirect
			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}

	}
}



if (isset($_POST['change_pass'])) {
	

	// var_dump($_POST);
	$id = $_POST['id'];

	$rules = array(
		'password' => ['required', 'min'],
		'password_confirmation' => ['password_confirmation'],
	);


	$user->validate($_POST, $rules);

	$request = array(
		'password' => sha1($_POST['password']),
	);

	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		$update = $user->update($request, $id);
		//Update to DB and check if success
		if($update){

			//fetch user updated data and store in session
			$result = $user->find($id);

			$_SESSION['user'] = json_decode($result);
			

			$_SESSION['success'] = "Password updated.";
			
			// //Redirect
			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}
	
	}

}


if (isset($_POST['deactivate_account'])) {

	$id = $_POST['id'];

	if ($user->destroy($id)) {
		session_destroy();
		session_start();
		$_SESSION['success'] = "Acount has been deactivated.";
		header("Location: http://".$_SERVER['SERVER_NAME']."/techies/login.php");

	}

}