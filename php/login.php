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


$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$sql = "SELECT name FROM users WHERE name ='$username' AND password ='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
	?>

	<html>
	<head>
	<title>Webshop</title>
	</head>
	<body>

	<h1 align="left">Login Failed</h1>
	<!-- check if user..-->
	<!-- check type  of user-->

	<p class="breadtext">
                Please check that the username and password matches a registered account.
        </p>

	<form method=get action="index.html">
    		<input type=submit value="Back to login" >
 	</form>

	</body>
	</html>

	<?php
} else {

	session_start();
	$_SESSION["username"] = $username;
	$_SESSION["basket"] = array();
	$_SESSION["previousProductName"]=null;	

	header("Location: webshop.php");
}

$conn->close();

?>
