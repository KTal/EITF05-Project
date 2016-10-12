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


$username = "Toto";
$address = "=;()";
$password = "=;()";

/*
if ($stmt = $conn->prepare("INSERT INTO users(name, address, password) VALUES(?, ?, ?)")) {
    $stmt->bind_param("sss", $username, $address, $password);
    $success = $stmt->execute();
    $stmt->close();
}

if($success) {
  print "Success";
} else {
  print "Bad";
}
*/


/* create a prepared statement*/
if ($stmt = $conn->prepare("SELECT password FROM users WHERE Name=?")) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    printf($result);
    $stmt->close();
}


/* close connection */
$conn->close();




?>
