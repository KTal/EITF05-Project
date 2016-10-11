<?php

session_start();

//CSF-check
if($_REQUEST['CSFusername'] == $_SESSION["username"]) {
  $_SESSION["basket"]=array();
  $_SESSION["previousProductName"]=null;
  $_SESSION["username"]=null;
  header("Location: index.html");
} else {
  print "Are you trying to do some CSF?:)";
}


?>
