<?php 

session_start();
include('../Product.php');

// $_SESSION['success'] = "Item added";

// var_dump(array_keys($_POST));

$request = $_POST;



$product = new Product();

$rules = array(
	'price' => 'required|string',
	'name' => 'required'	
);

$product->validate($_POST, $rules);

//Validate
// foreach ($request as $input => $data) {

// 	if(empty($data)){
// 		$_SESSION['errors'][] = array(
// 			'error' => $input.' is required.',
// 		);
// 	}

// }

// if(is_numeric($_POST['price']) === FALSE){
// 	$_SESSION['errors'][] = array(
// 		'error' => 'price must be a number.',
// 	);
// }


// foreach ($_SESSION['errors'] as $key => $value) {
// 	foreach ($value as $k => $va) {
// 		echo $va;
// 	}
// }

// unset($_SESSION['errors']);

// header("Location: http://".$_SERVER['SERVER_NAME']."/techies/add_product.php");