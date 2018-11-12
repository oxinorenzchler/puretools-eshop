<?php

include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Rating.php');

$product = new Product();
$rating = new Rating();

if(isset($_POST['rating'])){
	//Fetch product
	$product = $product->getProduct($_POST['id']);

	//set data for rating
	$data = array(
		'points' => $_POST['pts'],
		'product_id' => $_POST['id'],
		'user_id' => $_POST['uid']
	);

	if($rating->rateProduct($data)){
		echo 'Success';
	}

}

