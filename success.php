<!DOCTYPE HTML>
<html lang='en'>
<head>
<meta charset='UTF-8'> 
<title>success</title>
<link type='text/css' href='css/style.css' rel='stylesheet'>
</head>
<body>
<?php
	//Include the Header
	include 'include/header.php'; 

	$database_host = 'localhost';
	$database_name = 'creditcard';
	$database_username = 'root';
	$database_password = '';

	$link = mysqli_connect($database_host, $database_username, $database_password, $database_name);
	if(!$link) die('failed');

	if ($_POST['valid'] == 1) {

		//Prepare and bind
		$preparedQuery = $link->prepare('INSERT INTO card (ccnum, expdate, seccode) VALUES (?, ?, ?)');
		$preparedQuery->bind_param('sss', $ccnum, $expdate, $seccode);

		//Calculates the date as the last day of the month
		$date = new dateTime();
		$date->setDate($_POST['expirationYear'], $_POST['expirationDate'], 1);
		$date->modify('+1 month -1 day');

		//Set parameters and execute
		//Hash the credit card number
		$ccnum = md5( $_POST['cardNumber']);
		//Converts the date into string format (year-month-day)
		$expdate = $date->format('Y-m-d');
		//Stores security code as is
		$seccode = $_POST['securityCode'];
		//Stores all values in the database
		$preparedQuery->execute();
		
		//Only prints the last 4 credit card number numbers
		$cc_last = substr($_POST['cardNumber'], -4);

		echo <<<EOF
	<main>
	<section>
		<header><h2>You have successfully entered your credit card details.</h2></header>
		<p>Your credit card details of xxxx-xxxx-xxxx-{$cc_last} was saved.</p>
	</section>
	</main>
EOF;

	} else {
		//The user has arrived here without passing the JavaScript validation, displays try again message
		echo <<<EOF
	<main>
	<section>
		<header><h2>Error</h2></header>
		<p>The validation failed. <a href='pay.php?book={$_POST['book']}'>Please try again!</a></p>
	</section>
	</main>
EOF;
	}
?>
</body>
</html>