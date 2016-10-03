<?php
$sn = "localhost";
$un = "root";
$pw = "root";
$dbname = "db";

// Create connection
$conn = new mysqli($sn, $un, $pw, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, price FROM products";
$products = $conn->query($sql);

$conn->close();

session_start();
$username = $_SESSION["username"];
$basket = $_SESSION["basket"];
$previousProductName = $_SESSION["previousProductName"];

if(!$previousProductName==null) {
        print "{$previousProductName} just added to the shopping basket!";
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

<?php
if ($products->num_rows > 0) {
?>
<table id="products">
        <tr>
        <td>Product</td>
        <td>Price</td>
	<td></td>
	</tr>
    <?php
    // output data of each row
    while($row = $products->fetch_assoc()) {
	?>
      <tr>
        <td><?php print $row["name"]; ?></td>
        <td><?php print "€{$row["price"]}"; ?></td>
	<td>
                <form action="addToBasket.php">
		<input type="hidden" name="productId" value="<?php print $row["id"]; ?>" />
		<input type="hidden" name="productName" value="<?php print $row["name"]; ?>" />
		<input type="hidden" name="productPrice" value="<?php print $row["price"]; ?>" />
                <select name="quantity">
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
    
<?php
    }
    ?>

  </table>

<?php
} else {
    echo "0 results";
}
?>


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
