<?php

require_once('Query.php');

/*
 *Category Class
 */
class Category extends Query
{	

	/**
	 *Get all category
	 *
	 *
	 *@return HTTP Response
	 */
	public function getAll(){
		return $this->all();
	}

	/**
	 *Add category
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function addCategory(array $product){
		return $this->insert($product);
	}

	/**
	 *Edit product
	 *
	 *@param HTTP Request, category ID
	 *@return HTTP Response
	 */
	public function editCategory(array $product, $id){
		return $this->update($product, $id);
	}

	/**
	 *Get all products
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function deleteCategory($id){
		return 	$this->destroy($id);
	}

	/**
	 *Get all products
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function getCategory($id){
		return $this->find($id);
	}
   
}
