<?php

@session_start();

$_SESSION['total'] = 0;

if(isset($_POST['quantity'])){
	$quantity = $_POST['quantity'];
	$id = $_POST['id'];

	if (empty($quantity)) {
		$quantity = 1;
	}

	$_SESSION['cart'][$id] = intval($quantity);
	$_SESSION['cart_count'] = array_sum($_SESSION['cart']);

	echo $_SESSION['cart_count'];
}


function getCart(){

	$products = new Product();
	$cartIndex = array_keys($_SESSION['cart']);

	$strIndex = implode("','", $cartIndex);

	$prodID = htmlspecialchars($strIndex);

	$cartItems = $products->raw("WHERE id IN('".$prodID."')")->get();

	return json_decode($cartItems);
}

function subTotal($id, $price){

	$subTotal = $_SESSION['cart'][$id] * $price;

	$_SESSION['total'] += $subTotal; 

	return $subTotal; 
}

if(isset($_POST['removeitem'])){

  unset($_SESSION['cart'][$_POST['id']]);

	//////////Not working new total
   $newTotal = $_SESSION['total'] - $_POST['subtTotal'];

   $_SESSION['total'] = $newTotal;

   $newCount = array_sum($_SESSION['cart']);

   $_SESSION['cart_count'] = $newCount;

   $result = [
   	'total' => $newTotal,
   	'cart_count' => $newCount
   ];

   echo json_encode($result);

}