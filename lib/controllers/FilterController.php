<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php');
include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Rating.php');

$categories = new Category();
$products = new Product();

if(isset($_GET['search'])){
	
	$result = $products->where('category_id', $_GET['id'])->get();

	if(!empty($result)){
		$_SESSION['category_id'] = $_GET['id'];
	}
}


//Check if form submit
if (isset($_GET['filter'])) {

	//Assign get request
	$rate = $_GET['rating'];
	$category = $_GET['category'];
	$minprice = $_GET['minprice'];
	$maxprice = $_GET['maxprice'];
	
	//Validate if request is empty	
	if(!empty($rate) && !empty($category) && !empty($minprice) && !empty($maxprice)){
		$sql = "WHERE rating=$rate AND category_id=$category AND price BETWEEN $minprice AND $maxprice";
		$result = $products->raw($sql)->get();

		if($result){
			$_SESSION['filter'] = $sql;
		}else{
			unset($_SESSION['filter']);
		}
	}

}

