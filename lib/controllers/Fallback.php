<?php

/**
 * 
 */
class Fallback
{
	
	public function redirect($uri){
		header('Location: http://'.$_SERVER['SERVER_NAME'].'/techies/index.php');
	}
	
}