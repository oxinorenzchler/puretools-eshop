<?php

session_start();

if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
	session_destroy();
	header("Location: http://".$_SERVER['SERVER_NAME']."/techies/login.php");
}