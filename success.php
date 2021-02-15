<!DOCTYPE HTML>
<html lang='en'>
<head>
<meta charset='UTF-8'> 
<title>success</title>
<link type='text/css' href='css/style.css' rel='stylesheet'>

</head>
<body>
<?php
	include 'include/header.php'; 
	
	$database_host = "localhost";
	$database_name = "creditcard";
	$database_username = "root";
	$database_password = "";
	
	$link = mysqli_connect($database_host, $database_username, $database_password, $database_name);
	if(!$link) die('failed');

	if ($_POST['valid'] == 1) {

		// prepare and bind
		$stmt = $link->prepare("INSERT INTO card (ccnum, expdate, seccode) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $ccnum, $expdate, $seccode);

		$date = new dateTime();
		$date->setDate($_POST['expirationYear'], $_POST['expirationDate'], 1);
		$date->modify('+1 month -1 day');


		// set parameters and execute
		$ccnum = md5( $_POST['cardNumber']);
		$expdate = $date->format('Y-m-d');
		$seccode = $_POST['securityCode'];
		$stmt->execute();



		$cc_last = substr($_POST['cardNumber'], -4);
?>
<h1>Thank you.</h1>
<h3>Your credit card details of xxxx-xxxx-xxxx-<?= $cc_last ?> was saved.</h3>
<?php
	
	} else {
	
?>
<h1>Error</h1>
<article>The validation failed. Please try again!</article>
<?php
	}
	?>
</body>
</html>