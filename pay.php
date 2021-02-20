<!DOCTYPE HTML>
<html lang='en'>
<head>
<meta charset='UTF-8'> 
<title>pay</title>
<link type='text/css' href='css/style.css' rel='stylesheet'>

</head>
<body>
<?php
//Include the Header
include 'include/header.php';
include 'include/books.php';

//Gets the book the user is interested in buying
$bookId = $_GET['book'];
$book = $bookArr[$bookId];

?>
<main>

<?= $book->figure() ?>

<section id='paymentOptions'>
	<header><h2>Payment Options</h2></header>
	<img src='images/logo/mastercard.png' alt='MasterCard'>
</section>

<form id='myForm' action='success.php' method='post'>
<!-- Displays the table where user inputs their credit card details for verification -->
<table>
	<tr>
		<td><label for='cardNumber'>Card Number </label></td>
		<td><input name='cardNumber' id='cardNumber' /></td>
	</tr>
	<tr>
		<td><label for='expirationDate'>Expiration Date: </label></td>
		<td>
<?php
	//Drop down menu for the months
	echo "\t\t\t<select name='expirationDate' id='expirationDate'>\n";
	for ($month = 1 ; $month <= 12 ; $month++) {
		$dateObject = DateTime::createFromFormat('!m', $month);
		printf("\t\t\t\t<option value=\"%'.02d\">%s</option>\n", $month-1, $dateObject->format('F'));
	}
	
	//Drop down menu for the year, starting in the current year and ending 20 years from now
	echo "\t\t\t</select>\n\t\t\t<select name='expirationYear' id='expirationYear'>\n";
	$dateObject = new DateTime();
	$currentYear = intval($dateObject->format('Y'));
	for ($year = $currentYear ; $year < $currentYear+20 ; $year++) {
		printf("\t\t\t\t<option value=\"%1\$d\">%1\$d</option>\n", $year);
	}
	echo "\t\t\t</select>";
?>

		</td>
	</tr>
	<tr>
		<td><label for='securityCode'>Security Code: </label></td>
		<td><input name='securityCode' id='securityCode'/></td>
	</tr>
	<tr>
		<td colspan='2'>
			<input type='hidden' name='valid' id='valid' value='0' />
			<input type='hidden' name='book' id='book' value='<?= $bookId ?>' />
			<input type='submit' value='Continue' id='continueButton' />
		</td>
	</tr>
</table>
</form>
<!--
	Validation checked via this file
	The JavaScript binds to the forms submit action and performs all validation at that step 
-->
<script src='js/validate.js'></script>
</main>
</body>
</html>