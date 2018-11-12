<?php

session_start();

include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php');
include ($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Rating.php');

$categories = new Category();
$products = new Product();

if(isset($_GET['search'])){
	
	$result = $products->where('category_id', $_GET['id'])->get();

	echo $result;
}