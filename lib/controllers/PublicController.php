<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php');
include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Rating.php');

$categories = new Category();
$products = new Product();

/*
 *Get all products
 *
 *@return HTTP Response
 */
function getAllProducts(){
	$product = new Product();
	return $product->getAll();
}

function getCategories(){
	$categories = new Category();
	return json_decode($categories->getAll());
}

function getFeatured($id){
	$products = new Product();
	$products = $products->where('category_id', $id)->orderBy('created_at','desc')->limit(5)->get();

	return json_decode($products);
}

/*
 *Get product
 *
 *@param HTTP Request
 *@return HTTP Response
 */

if(isset($_GET['getProductForm'])){

	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];
		if(empty($id)){

			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}else{

			$_SESSION['productID'] = $id;

			header("Location: http://".$_SERVER['SERVER_NAME']."/techies/product.php");
		}
	}
}

function getRating($id){

	$product = new Product();

	$result = $product->find($id);

	$stars;  

	foreach (json_decode($result) as $value) {
		$stars = $value->rating;
	}

	return $stars;
}


function getRelatedProducts($id){
	$products = new Product();

	$category;

	$result = $products->find($id);

	foreach (json_decode($result) as $value) {
		$category = $value->category_id;
	}

	$sql = "WHERE id NOT IN ($id) AND category_id=$category ORDER BY RAND() ";

	$related = $products->raw($sql)->limit(5)->get();

	return json_decode($related);
}