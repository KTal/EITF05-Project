<?php

session_start();
$username = $_SESSION["username"] ;
$basket = $_SESSION["basket"];

$totalPrice =0;
$arraylength = count($basket);
for($x = 0; $x < $arraylength; $x++) {
        $totalPrice = $totalPrice + $basket[$x][2]*$basket[$x][3];
}

?>


<html>
<head>
<title>Shopping basket</title>
</head>
<body>

<h1 align="left">Your shopping basket</h1>

Logged in as user: <?php print $username ?>
<p>


  <table id="basket">
	<tr>
	<td>Object</td>
	<td>Quantity</td>
	<td>Price</td>
	<td></td> 
	</tr> 
    <?php
    $arraylength = count($basket);
    for($x = 0; $x < $arraylength; $x++) { ?>
      <tr> 
        <td><?php print $basket[$x][1]; ?></td>  
        <td><?php print $basket[$x][2]; ?></td>
	<td><?php print "€{$basket[$x][3]}"; ?></td>
	<td><form action="removeFromBasket.php">
		<input type="hidden" name="productId" value="<?php print $basket[$x][0]; ?>" />
		<input type=submit value="Remove from basket"/></form></td>
      </tr>
    <?php } ?>
      <tr></tr>
      <tr>
	<td>TOTAL PRICE</td>
	<td><?php print "€{$totalPrice}"; ?></td>
      </tr>
  </table>
<p>  

<form method=get action="webshop.php">
    <input type=submit value="Back to shop" >
  </form>


<p>
<form method=get action="placeOrder.html">
    <input type=submit value="Place Order" >
  </form>

<p>


</body>
</html>
