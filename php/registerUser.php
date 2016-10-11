<?php
$created = true;

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


$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$address = $_REQUEST['address'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(name, address, password) VALUES('$username', '$address', '$hash')";
$result = $conn->query($sql);

?>

<html>
<head>
<title>Webshop</title>
</head>
<body>

<?php if ($result) {

	?>
	<h1 align="left">Registration confirmation</h1>
	<p>

<?php

		print "Username: $username <br/>\n";
		print "Address: $address <br/>\n";

?>

	<p>
	Go to login page and login to start shopping
	<form method=get action="index.html">
		<input type=submit value="Login page" >
	</form>

<?php

} else {
	print "Error. Wrongly filled information or user already exists";

?>
	<p>
	<form method=get action="register.php">
	    <input type=submit value="Back to registration" >
	</form>

<?php

}
 ?>




</body>
</html>
