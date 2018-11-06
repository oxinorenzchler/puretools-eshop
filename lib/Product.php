<?php

require_once('Query.php');

/*
 *Product Class
 */
class Product extends Query
{	

	public function getAll(){
		return $this->all();
	}

	public function addProduct(array $product){
		return $this->insert($product);
	}

	public function editProduct(array $product, $id){
		return $this->update($product, $id);
	}

	public function deleteProduct($id){
		return $this->destroy($id);
	}

	public function getProduct($id){
		return $this->find($id);
	}

   
}
