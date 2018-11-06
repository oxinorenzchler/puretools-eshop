<?php

session_start();

include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php');

$category = new Category();

/*
 *Insert
 *
 *@param HTTP Request
 *@return HTTP Response
 */

//Check if request is comming from add product form
if(isset($_POST['addCategoryForm'])){

	//Set rules
	$rules = array(
		'name' => ['required','string'],
	);

	//Validate
	$category->validate($_POST, $rules);

	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		//Assign values
		$request = array(

			'name' => $_POST['name'],

		);

		//Insert to DB and check if success
		if($category->addCategory($request)){

			// $_SESSION['success'] = "Item added";
			// //Redirect
			// header("Location: ".$_SERVER['HTTP_REFERER']."");

		}

	}

}