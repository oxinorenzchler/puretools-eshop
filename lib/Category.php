<?php

include('Query.php');

/*
 *Category Class
 */
class Category extends Query
{	

	public function getAll(){
		return $this->all();
	}

	public function addCategory(array $product){
		$this->insert($product);
	}

	public function editProduct(array $product, $id){
		$this->update($product, $id);
	}

	public function deleteProduct($id){
		$this->destroy($id);
	}

	public function getProduct($id){
		return $this->find($id);
	}
   
}
