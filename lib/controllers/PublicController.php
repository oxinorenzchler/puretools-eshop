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
 *@return products
 */
function getAllProducts(){
	$products = new Product();

	$result = json_decode($products->all());

	return $result;
}

/*
 *Get categories
 *
 *@return categories
 */

function getCategories(){

	$categories = new Category();
	
	$result = json_decode($categories->all());

	return $result;

}


/*
 *Get featured products according to date created
 *
 *@param category id
 *@return products
 */


function getFeatured($id){

	$products = new Product();

	$products = $products->where('category_id', $id)->orderBy('created_at','desc')->limit(5)->get();

	return json_decode($products);

}


/*
 *Get product page
 *
 *@param HTTP Request
 *@return HTTP Response
 */

if(isset($_GET['slug']) && !empty($_GET['slug'])){


	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];
		$slug = $_GET['slug'];
		if(empty($id)){

			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}else{

			$_SESSION['productID'] = $id;
			$_SESSION['product'] = $slug;

			header("Location: http://".$_SERVER['SERVER_NAME']."/techies/product.php?pid=$id&product=$slug");
		}
	}
}


/*
 *Get product
 *
 *@param product id
 *@return product
 */

function getProduct($id){

	$product = new Product();

	$result = $product->find($id);

	$product = $result;

	return json_decode($product);
}

/*
 *Get rating
 *
 *@param product id
 *@return product rating
 */


function getRating($id){

	$product = new Product();

	$result = $product->find($id);

	$stars = json_decode($result);

	return $stars->rating;  
}

/*
 *Get related products
 *
 *@param product id
 *@return products
 */

function getRelatedProducts($id){

	$products = new Product();

	$result = $products->find($id);

	$product = json_decode($result);

	$sql = "WHERE id NOT IN ($id) AND category_id=$product->category_id ORDER BY RAND() ";

	$related = $products->raw($sql)->limit(5)->get();

	return json_decode($related);
}