<?php

$productId = $_REQUEST['productId'];

$basket = $_SESSION["basket"];

$arraylength = count($basket);
for($x = 0; $x < $arraylength; $x++) {
	if($basket[$x][0] == $productId) {
		array_splice($basket, $x, $x);
	}
}


$_SESSION["basket"]=$basket;


header("Location: viewCart.php");


?>

