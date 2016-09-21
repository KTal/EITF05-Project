<?php

$username = "Henrik";
$products['toyCar']="Toy car";
$products['toyBoat']="Toy boat";
$products['toyRocket']="Toy rocket";
$products['toyHouse']="Toy house";

$previous = "Toy boat";

if(!$previous==null) {
        print "{$previous} just added to the shopping basket!";
}

?>


<html>
<head>
<title>Webshop</title>
</head>
<body>

<h1 align="left">Webshop</h1>

Logged in as user: <?php print $username ?>
<p>


  <table id="objects">
	<tr>
	<td>Object</td>
	<td></td>
    <?php
    foreach($products as $product => $productName){ ?>
      <tr> 
        <td><?php print $productName; ?></td> 
	<td>
		<form action="updatedShoppingbasket.php">
                <select name="toyCar">
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                </select>
                <input type=submit value ="Add to basket">
                </form>
	</td>
      </tr>
    <?php } ?>
  </table>
<p> 





<form method=get action="viewCart.php">
    <input type=submit value="View Shopping cart" >
  </form>


<p>
<form method=get action="index.html">
    <input type=submit value="logout" >
  </form>

<p>


</body>
</html>
