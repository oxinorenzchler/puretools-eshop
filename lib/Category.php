<?php

require_once('Query.php');

/*
 *Category Class
 */
class Category extends Query
{	

	public function getAll(){
		return $this->all();
	}

	public function addCategory(array $product){
		return $this->insert($product);
	}

	public function editProduct(array $product, $id){
		$this->update($product, $id);
	}

	public function deleteCategory($id){
		return 	$this->destroy($id);
	}

	public function getCategory($id){
		return $this->find($id);
	}
   
}
