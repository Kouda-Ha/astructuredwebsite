<!DOCTYPE HTML>
<html lang='en'>
<head>
<meta charset='UTF-8'> 
<title>pay</title>
<link type='text/css' href='css/style.css' rel='stylesheet'>

</head>
<body>
<?php	
include 'include/header.php';
include 'include/books.php';

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
<section id='issues' class='hidden'>
	<ul id='issuesList'>

	</ul>
	<a href = 'pay.php?book=<?= $bookID ?>'> Please try again. </a>
</section>

<table>
	<tr>
		<td><label for='cardNumber'>Card Number </label></td>
		<td><input name='cardNumber' id='cardNumber' /></td>
	</tr>
	<tr>
		<td><label for='expirationDate'>Expiration Date: </label></td>
		<td><select name='expirationDate' id='expirationDate'>
<?php
	for ($month = 1 ; $month <= 12 ; $month++) {
		$dateObject = DateTime::createFromFormat('!m', $month);
		printf("  <option value=\"%'.02d\">%s</option>\n", $month-1, $dateObject->format('F'));
	}

?>
</select>
<select name='expirationYear' id='expirationYear'>
<?php
	$dateObject = new DateTime();
	$currentYear = intval($dateObject->format('Y'));
	for ($year = $currentYear ; $year < $currentYear+20 ; $year++) {
		printf("  <option value=\"%1\$d\">%1\$d</option>\n", $year);
	}
?>
</select></td>
	</tr>
	<tr>
		<td><label for='securityCode'>Security Code: </label></td>
		<td><input name='securityCode' id='securityCode'/></td>
	</tr>
	<tr>
		<td colspan='2'>
			<input type='hidden' name='valid' id='valid' value='0' />
			<input type='hidden' name='book' value='<?= $bookId ?>' />
			<input type='submit' value='submit' />
		</td>
	</tr>
</form>
<script src='js/validate.js'></script>
</main>
</body>
</html>