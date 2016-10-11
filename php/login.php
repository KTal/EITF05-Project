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

//----------------bad version for sql injection---------------
/*
if (strpos($username, ';') or strpos($username, '=') or strpos($password, ';') or strpos($password, '=')) {
  $username = "";
  $password = "";
}

$sql = "SELECT name FROM users WHERE name = '$username' AND (password ='$password')";
$result = $conn->query($sql);

$conn->close();

$username = null;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$username= $row["name"];
    }
}

if($username==null) {

*/

//---------------------------------------------------------


$sql = "SELECT password FROM users WHERE name ='$username'";
$result = $conn->query($sql);

$conn->close();

//Very ugly but it works.
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	$hash= $row["password"];
    }
}


if (!password_verify($password, $hash)) {

//-------------------------
  sleep(1);

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
  sleep(1);
	session_start();
	$_SESSION["username"] = $username;
	$_SESSION["basket"] = array();
	$_SESSION["previousProductName"]=null;

	header("Location: webshop.php");
}

$conn->close();

?>
