<?php

//Ignore session warning
@session_start();

//Check if request has quantity
if(isset($_POST['quantity'])){

	$quantity = $_POST['quantity'];
	$id = $_POST['id'];

	//asign default value
	if (empty($quantity)) {
		$quantity = 1;
	}

	//declare cart and count
	$_SESSION['cart'][$id] = intval($quantity);
	$_SESSION['cart_count'] = array_sum($_SESSION['cart']);
	
	//return count
	echo $_SESSION['cart_count'];
}

/**
 *Feath items
 *
 *@return products
 */
function getCart(){

	//Fetech all products in cart
	$products = new Product();

	$cartIndex = array_keys($_SESSION['cart']);

	$strIndex = implode("','", $cartIndex);

	$prodID = htmlspecialchars($strIndex);

	$cartItems = $products->raw("WHERE id IN('".$prodID."')")->get();

	return json_decode($cartItems);
}

/**
 *Calculate subtotal and total
 *
 *@param product ID and price
 *@return subtotal
 */
function subTotal($id, $price){

	//Calculate subtotal
	$subTotal = $_SESSION['cart'][$id] * $price;

	//get subtotal
	$_SESSION['subtotal'][$id] = $subTotal;

	//get total
	$_SESSION['total'] = array_sum($_SESSION['subtotal']);

	//return subtotal
	return $subTotal;
}

//check if request is remove item
if(isset($_POST['removeitem'])){


	$subTotal = $_POST['subTotal'];
	$total = $_POST['total'];

	//Unset item in cart
	unset($_SESSION['cart'][$_POST['id']]);

	//Assign new values
	$newTotal = $total - $subTotal;

	$_SESSION['total'] = $newTotal;

	$newCount = array_sum($_SESSION['cart']);

	$_SESSION['cart_count'] = $newCount;

	$result = [
		'total' => $_SESSION['total'],
		'cart_count' => $_SESSION['cart_count']
	];

	//Unset session if total is 0
	if ($result['total'] == 0) {
		unset($_SESSION['cart']);
		unset($_SESSION['subtotal']);
		unset($_SESSION['total']);
		unset($_SESSION['cart_count']);
	}

	//return total and cart_count
	echo json_encode($result);

}

//check if request is edit quantity
if(isset($_POST['editquantity'])){

	$quantity = $_POST['itemqty'];
	$id = $_POST['id'];
	$price = $_POST['price'];

	//assign new quantity
	$_SESSION['cart'][$id] = $quantity;

	//remove the current subtotal from total;
	$removeSubTotal = $_SESSION['total'] - $_SESSION['subtotal'][$id];

	//calculate new subtotal
	$newSubTotal = $_SESSION['subtotal'][$id] = $quantity * $price;

	//assign new total
	$_SESSION['total'] = $removeSubTotal + $newSubTotal;

	//assign new cart count
	$newCount = array_sum($_SESSION['cart']);
	$_SESSION['cart_count'] = $newCount;

	$result = [
		'id' => $id,
		'cart_count' => $newCount,
		'quantity' => $quantity,
		'subtotal' => $newSubTotal,
		'total' => $_SESSION['total']

	];

	echo json_encode($result);


}

//redirect to checkout
if(isset($_GET['uid']) && $_GET['uid'] == md5(1)){
	header("Location: http://".$_SERVER['SERVER_NAME']."/techies/checkout.php");
}