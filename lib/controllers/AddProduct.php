<?php 

session_start();

include('../Product.php');

/*
 *Insert
 *
 *@param HTTP Request
 *@return HTTP Response
 */
$product = new Product();

//Check if request is comming from add product form
if(isset($_POST['addProductForm'])){

	//Set rules
	$rules = array(
		'price' => ['required','numeric'],
		'name' => ['required','string'],
		'category'=> ['required'],
		'sdescription' => ['string','required'],
		'description' => ['string','required'],
		'details' => ['string','required']	
	);

	//Validate
	$product->validate($_POST, $rules);

	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		//Assign values
		$request = array(

			'name' => $_POST['name'],
			'category_id' => 2,
			'brand_id' => 2,
			'description' => $_POST['description'],
			'price' => $_POST['price'],

		);

		//Insert to DB and check if success
		if($product->insert($request)){

			$_SESSION['success'] = "Item added";
			//Redirect
			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}

	}
}