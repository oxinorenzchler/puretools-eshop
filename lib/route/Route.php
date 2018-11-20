<?php

/**
 * 
 */
class Route
{
	

	public static function redirect($file){
		return $file;
	}

	public static function back(){
		return $_SERVER['HTTP_REFERER'];
	}

	public static function current(){
		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		return $actual_link;

	}
	
}