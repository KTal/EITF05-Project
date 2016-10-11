<?php
$sn = "localhost";
$un = "root";
$pw = "root";
$dbname = "db";

session_start();
$username = $_SESSION["username"];
$basket = $_SESSION["basket"];
$previousProductName = $_SESSION["previousProductName"];

// Create connection
$conn = new mysqli($sn, $un, $pw, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$details = "";
$arraylength = count($basket);
for($x = 0; $x < $arraylength; $x++) {
	$details = $details . $basket[$x][0] . " " . $basket[$x][2] . ", ";
}



$sql = "INSERT INTO orders(username, details) VALUES('$username', '$details')";
$order = $conn->query($sql);

$sql = "SELECT address FROM users WHERE name = '$username'";
$address = $conn->query($sql);

$conn->close();

//Very ugly but it works.
if ($address->num_rows > 0) {
    while($row = $address->fetch_assoc()) {
	$ad= $row["address"];
    }
}




$totalPrice =0;
$arraylength = count($basket);
for($x = 0; $x < $arraylength; $x++) {
        $totalPrice = $totalPrice + $basket[$x][2]*$basket[$x][3];
}



if($order != 1) {
	print $address->num_rows;
} else {
 	?>

        <html>
        <head>
        <title>Webshop</title>
        </head>
        <body>

        <h1 align="left">Order confirmation</h1>
        <!-- check if user..-->
        <!-- check type  of user-->

        <p class="breadtext">
                Username: <?php print $username; ?>
	<p> Address: <?php print $ad; ?>
        </p>


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
      </tr>
    <?php } ?>
      <tr></tr>
      <tr>
        <td>TOTAL PRICE</td>
        <td><?php print "€{$totalPrice}"; ?></td>
      </tr>
  </table>
<p>



        <form method=get action="logout.php">
          <input type="hidden" name="CSFusername" value="<?php print $username; ?>" />
                <input type=submit value="Logout" >
        </form>

        </body>
        </html>

        <?php

}




?>
