<?php
session_start();
$productId = $_REQUEST["productId"];

$basket = $_SESSION["basket"];

$arraylength = count($basket);
if($arraylength == 1) {
	$basket = array();
} else {
for($x = 0; $x < $arraylength; $x++) {
	if($basket[$x][0] == $productId) {
		array_splice($basket, $x, 1);
	}
}
}


$_SESSION["basket"]=$basket;


header("Location: viewCart.php");


?>

