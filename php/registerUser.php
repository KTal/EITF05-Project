<?php
$created = true;

?>

<html>
<head>
<title>Webshop</title>
</head>
<body>

<?php if ($created) {

	?> 
	<h1 align="left">Registration confirmation</h1>
	<p>
 
<?php

		print "Username: $userId <br/>\n";
		print "Address: $userName <br/>\n";

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
