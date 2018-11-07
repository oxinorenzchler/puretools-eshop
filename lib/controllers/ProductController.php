<?php 

session_start();

include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/FileHandler.php');

$product = new Product();

/*
 *Get all products
 *
 *@return HTTP Response
 */
function getAllProducts(){
	$product = new Product();
	return $product->getAll();
}

/*
 *Insert
 *
 *@param HTTP Request
 *@return HTTP Response
 */

//Check if request is comming from add product form
if(isset($_POST['addProductForm'])){

	//Set directory for upload
	$dir = 'assets/img/uploads/products/';

	//Set rules
	$rules = array(
		'price' => ['required','numeric'],
		'name' => ['required','string'],
		'category'=> ['required', 'numeric'],
		'sdescription' => ['string','required'],
		'description' => ['string','required'],
		'details' => ['string','required']	
	);

	//Validate
	$product->validate($_POST, $rules);

	//Assign values
	$request = array(

		'name' => $_POST['name'],
		'category_id' => $_POST['category'],
		'brand_id' => 2,
		'description' => $_POST['description'],
		'sdescription' => $_POST['sdescription'],
		'details' => $_POST['details'],
		'price' => $_POST['price'],
		'image' => FileHandler::uploadFile($_FILES, $dir),

	);

	//Check if errors exists
	if(!isset($_SESSION['errors']) && !isset($_SESSION['file'])){

		//Insert to DB and check if success
		if($product->addProduct($request)){

			$_SESSION['success'] = "Item added";
			//Redirect
			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}

	}

}

/*
 *Delete product
 *
 *@param HTTP Request
 *@return HTTP Response
 */

//Check if request is comming from deleteProductForm
if (isset($_POST['deleteProductForm'])) {

	//Validate if empty
	if(empty($_POST['id'])){
		header("Location: ".$_SERVER['HTTP_REFERER']."");
	}else{
		//Mark deleted and check if success
		if($product->deleteProduct($_POST['id'])){

			$_SESSION['success'] = "Item Deleted";
			//Redirect
			header("Location: ".$_SERVER['HTTP_REFERER']."");
		}

	}

}

/*
 *Show edit form
 *
 *@param HTTP Request
 *@return HTTP Response
 */
if(isset($_GET['showEditForm'])){

	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = $_GET['id'];

		if(empty($id)){

			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}else{

			$_SESSION['productID'] = $id;

			header("Location: http://".$_SERVER['SERVER_NAME']."/techies/edit_product.php");
		}
	}

}

/*
 *Save edit
 *
 *@param HTTP Request
 *@return HTTP Response
 */
if (isset($_POST['saveEdit'])) {

	$id = $_POST['id'];

	//Set rules
	$rules = array(
		'price' => ['required','numeric'],
		'name' => ['required','string'],
		'category'=> ['required','numeric'],
		'sdescription' => ['string','required'],
		'description' => ['string','required'],
		'details' => ['string','required']	
	);


	//Validate
	$product->validate($_POST, $rules);


	//Check if there is file
	if ((int)$_FILES['file']['error'] != 0) {

			//Assign values
			$request = array(

			'name' => $_POST['name'],
			'category_id' => (int)$_POST['category'],
			'brand_id' => 5,
			'description' => $_POST['description'],
			'sdescription' => $_POST['sdescription'],
			'details' => $_POST['details'],
			'price' => $_POST['price'],

		);

		
	}else{


		//Set directory for upload
		$dir = 'assets/img/uploads/products/';

			//Assign values
		$request = array(

			'name' => $_POST['name'],
			'category_id' => (int)$_POST['category'],
			'brand_id' => 5,
			'description' => $_POST['description'],
			'sdescription' => $_POST['sdescription'],
			'details' => $_POST['details'],
			'price' => $_POST['price'],
			'image' => FileHandler::uploadFile($_FILES, $dir)

		);

	}

	//Check if errors exists
	if(!isset($_SESSION['errors'])){

		//Update to DB and check if success
		if($product->editProduct($request, $id)){

			$_SESSION['success'] = "Item updated.";
			//Redirect
			header("Location: ".$_SERVER['HTTP_REFERER']."");

		}

	}
}