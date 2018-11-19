<?php

session_start();

if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
	session_destroy();
	header("Location: http://".$_SERVER['SERVER_NAME']."/techies/login.php");
}