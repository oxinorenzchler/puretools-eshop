<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php');
include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Rating.php');

$products = new Product();

if(isset($_GET['search'])){
	

	$category = $_GET['category'];
	$product = $_GET['product'];
	$_SESSION['searchinput'] = $product;

	header("Location: http://".$_SERVER['SERVER_NAME']."/techies/search.php?category=$category&product=$product");


}

//Get categories
function getCategories(){
	$categories = new Category();
	return json_decode($categories->getAll());
}

//Search query
function searchQuery($category, $product){
	$products = new Product();
	if(empty($category)){
		$sql = "WHERE name LIKE '%$product%'";
	}else{
		$sql = "WHERE category_id=$category AND name LIKE '%$product%'";

	}

	$result = $products->raw($sql)->get();

	if($result){
		return $result;
	}else{
		return false;
	}
}

//Go to product
function getRating($id){

	$product = new Product();

	$result = $product->find($id);

	$stars;  

	foreach (json_decode($result) as $value) {
		$stars = $value->rating;
	}

	return $stars;
}
