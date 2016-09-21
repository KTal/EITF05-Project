<?php

$username = "Henrik";

$basket['toyCar']=3;
$basket['toyRocket']=1;

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
	<td></td>  
    <?php
    foreach($basket as $product => $quantity){ ?>
      <tr> 
        <td><?php print $product; ?></td>  
        <td><?php print $quantity; ?></td>
	<td><form method=get action="updatebasket2.php"><input type=submit value="Remove from basket"/></form></td>
      </tr>
    <?php } ?>
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
