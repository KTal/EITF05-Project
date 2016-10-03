<?php

session_start();

$_SESSION["basket"]=array();
$_SESSION["previousProductName"]=null;
$_SESSION["username"]=null;


header("Location: index.html");


?>

