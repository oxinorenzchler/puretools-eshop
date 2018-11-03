<?php
session_start();
include('../Product.php');


$product = new Product();

if(isset($_GET['id']) && !empty($_GET['id'])){
	$id = $_GET['id'];
	$data = $product->find($id);

	if($data === NULL){

		header("Location: http://".$_SERVER['SERVER_NAME']."/techies/catalog.php");

	}else{

		$_SESSION['product'] = json_decode($data);
		
		header("Location: http://".$_SERVER['SERVER_NAME']."/techies/product.php");
	}
}

