
<?php

$productName = $_REQUEST['productName'];
$quantity =  $_REQUEST['quantity'];

session_start();

$basket = $_SESSION["basket"];
array_push($basket, array($productId, $productName, $quantity));
$_SESSION["basket"]=$basket;

$_SESSION["previousProductName"]=$productName;

header("Location: webshop.php");


?>

