<?php

require_once('Query.php');

/**
 *Product Class
 */
class Product extends Query
{	
	/**
	 *Get all products
	 *
	 *@return HTTP Response
	 */
	public function getAll(){
		return $this->all();
	}

	/**
	 *Add product
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function addProduct(array $product){
		return $this->insert($product);
	}

	/**
	 *Edit product
	 *
	 *@param HTTP Request, Product ID
	 *@return HTTP Response
	 */
	public function editProduct(array $product, $id){
		return $this->update($product, $id);
	}

	/**
	 *Delete product
	 *
	 *@param HTTP Request, Product ID
	 *@return HTTP Response
	 */
	public function deleteProduct($id){
		return $this->destroy($id);
	}

	/**
	 *Get product by ID
	 *
	 *@param HTTP Request, Product ID
	 *@return HTTP Response
	 */
	public function getProduct($id){
		return $this->find($id);
	}

   
}
