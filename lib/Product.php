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

// $x = new Product();

// $y = $x->all();

// var_dump($y);

// $item = array(
// 	// 'name' => '\'Animal\'',
// 	'category_id' => '\'2\'',
// 	// 'brand_id' => '\'1\'',
// 	'price' => '\'100\'',
// 	'description' => '\'Edited\''
// );

// $x->insert($item);

// $x->update($item, 6);

// $x->destroy(10);

// $z = $x->find(9);
// var_dump($z);