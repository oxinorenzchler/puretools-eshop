<?php

include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Product.php');
include($_SERVER['DOCUMENT_ROOT'].'/techies/lib/Rating.php');

$products = new Product();
$rating = new Rating();

function calculateRating($id){

	$rating = new Rating();

	//Set initial count
	$count_rate_5 = [];
	$count_rate_4 = [];
	$count_rate_3 = [];
	$count_rate_2 = [];
	$count_rate_1 = [];

	//Check product if it has a rating
	$check = $rating->raw('WHERE product_id="'.$id.'"')->get();
	//Validate if empty
	if(empty($check)){
		return 0;
	}else{

		//Check each points in products
		$five = json_decode($rating->raw('WHERE product_id="'.$id.'" AND points="5"')->get());
		if (!empty($five)) {
			foreach ($five as $key => $value) {
				$count_rate_5 [] = $value->points;
			}
		}
		$four = json_decode($rating->raw('WHERE product_id="'.$id.'" AND points="4"')->get());
		if (!empty($four)) {
			foreach ($four as $key => $value) {
				$count_rate_4 [] = $value->points;
			}
		}
		$three = json_decode($rating->raw('WHERE product_id="'.$id.'" AND points="3"')->get());
		if(!empty($three)){
			foreach ($three as $key => $value) {
				$count_rate_3 [] = $value->points;
			}	
		}
		$two = json_decode($rating->raw('WHERE product_id="'.$id.'" AND points="2"')->get());
		if(!empty($two)){
			foreach ($two as $key => $value) {
				$count_rate_2 [] = $value->points;
			}

		}
		$one = json_decode($rating->raw('WHERE product_id="'.$id.'" AND points="1"')->get());
		if(!empty($one)){
			foreach ($one as $key => $value) {
				$count_rate_1 [] = $value->points;
			}
		}

		//Assign new values and get the sum of all points given to the item
		$count_rate_5 = array_sum($count_rate_5);
		$count_rate_4 = array_sum($count_rate_4);
		$count_rate_3 = array_sum($count_rate_3);
		$count_rate_2 = array_sum($count_rate_2);
		$count_rate_1 = array_sum($count_rate_1);

		//Calculate the weighted average of ratings
		$stars = (5 * $count_rate_5 + 4 * $count_rate_4 + 3 * $count_rate_3 + 2 * $count_rate_2 + 1 * $count_rate_1) / ($count_rate_5 + $count_rate_4 + $count_rate_3 + $count_rate_2 + $count_rate_1);

		//Round off
		$stars = round($stars, 0, PHP_ROUND_HALF_DOWN);

		//Return the result
		return $stars;

	}

}

if(isset($_POST['rating'])){
	//Fetch product
	$product = $products->find($_POST['id']);

	//set data for rating
	$data = array(
		'points' => $_POST['pts'],
		'product_id' => $_POST['id'],
		'user_id' => $_POST['uid']
	);

	if($rating->rateProduct($data)){
		//Bind Rating to product
		$newrating = ['rating' => calculateRating($_POST['id'])];

			$products->editProduct($newrating, $_POST['id']);
	}


}

