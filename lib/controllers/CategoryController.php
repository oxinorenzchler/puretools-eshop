<?php

session_start();

include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Category.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/FileHandler.php');

$category = new Category();

/*
 *Get all categories
 *
 *@return HTTP Response
 */
function getAllCategories(){
	$category = new Category();
	return $category->getAll();
}



/*
 *Insert
 *
 *@param HTTP Request
 *@return HTTP Response
 */

//Check if request is comming from add product form
if(isset($_POST['addCategoryForm'])){
	
	$dir = 'assets/img/uploads/categories/';

	//Set rules
	$rules = array(
		'name' => ['required','string'],
	);

	//Validate
	$category->validate($_POST, $rules);


	//Assign values
	$request = array(

		'name' => $_POST['name'],
		'image' => $image = FileHandler::uploadFile($_FILES, $dir),

	);

	//Check if errors exists
	if(!isset($_SESSION['errors']) && !isset($_SESSION['file'])){


		//Insert to DB and check if success
		if($category->addCategory($request)){

			$_SESSION['success'] = "Category added";
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
if (isset($_POST['deleteCategoryForm'])) {

	

	//Validate if empty
	if(empty($_POST['id'])){

		header("Location: ".$_SERVER['HTTP_REFERER']."");

	}else{
		//Mark deleted and check if success
		if($category->deleteCategory($_POST['id'])){
			$_SESSION['success'] = "Category deleted.";
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

			$_SESSION['categoryID'] = $id;

			header("Location: http://".$_SERVER['SERVER_NAME']."/techies/edit_category.php");
		}
	}

}