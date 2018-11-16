<?php

require_once('Query.php');

/**
 * 
 */
class User extends Query
{
	
	public function register($request){
		$this->insert($request);
	}

	public function login($id){
		$this->find($id);
	}

}