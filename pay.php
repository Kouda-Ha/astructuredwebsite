<!-- pay -->
<!DOCTYPE HTML>
<html lang='en'>
<head>
<meta charset='UTF-8'> 
<title>pay</title>
<link type='text/css' href='css/style.css' rel='stylesheet'>

</head>
<body>
<section id='issues' class='hidden'>
	<ul id='issuesList'>

	</ul>
	<a href = "pay.php"> Please try again. </a>
	</section>
<form id='myForm' action='success.php' method='post'>
	
<label for='cardNumber'>Card Number </label><input name='cardNumber' id='cardNumber' /><br>

<label for='expirationDate'>Expiration Date: </label><select name='expirationDate' id='expirationDate'>
<?php
	for ($month = 1 ; $month <= 12 ; $month++) {
		$dateObject = DateTime::createFromFormat('!m', $month);
		printf("  <option value=\"%'.02d\">%s</option>\n", $month, $dateObject->format('F'));
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
</select>

<label for='securityCode'>Security Code: </label><input name='securityCode' id='securityCode'/><br>
<input type='hidden' name='valid' id='valid' value='0' />
<input type='submit' value='submit' />
</form>
<script src='js/validate.js'></script>
</body>
</html>
