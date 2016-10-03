<?php

$productId = $_REQUEST['productId'];
$productName = $_REQUEST['productName'];
$quantity =  $_REQUEST['quantity'];
$productPrice = $_REQUEST['productPrice'];

session_start();
$basket = $_SESSION["basket"];

$flag = 0;
$arraylength = count($basket);
for($x = 0; $x < $arraylength; $x++) {
        if($basket[$x][0] == $productId) {
		$flag = 1;
		$basket[$x][2]+=$quantity;
        }
}

if($flag==0) {
	array_push($basket, array($productId, $productName, $quantity, $productPrice));
}

$_SESSION["basket"]=$basket;

$_SESSION["previousProductName"]=$productName;

header("Location: webshop.php");


?>

