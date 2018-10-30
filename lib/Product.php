<?php

include('Query.php');

/*
 *Product Class
 */
class Product extends Query
{	


   
}

$x = new Product();

$y = $x->all();


echo $x->insert(['1','Razer', 'Blue']);

