<?php

include('Query.php');

/*
 *Product Class
 */
class Product extends Query
{	

	public function getAll(){
		return $this->all();
	}

	public function addProduct(array $product){
		$this->insert($product);
	}
   
}
