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

/* Protect against SQL-injection by using prepared statement*/
if ($stmt = $conn->prepare("SELECT password FROM users WHERE Name=?")) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hash);
    $stmt->fetch();
    $stmt->close();
}


$conn->close();


if (!password_verify($password, $hash)) {
  //Sleep to protect against brute force attacks
  sleep(1);

	?>

	<html>
	<head>
	<title>Webshop</title>
	</head>
	<body>

	<h1 align="left">Login Failed</h1>

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
  sleep(1);
	session_start();
	$_SESSION["username"] = $username;
	$_SESSION["basket"] = array();
	$_SESSION["previousProductName"]=null;

	header("Location: webshop.php");
}

?>
