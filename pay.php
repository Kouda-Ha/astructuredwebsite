<!-- pay -->
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8"> 
<title>pay</title>
<link type="text/css" href="css/style.css" rel="stylesheet">
</head>
<?php
	$dateObj = new DateTime();
	echo $dateObj->format("Y");
?>
<body>
Card Number <input /><br>
 <label for="expirationDate">Expiration Date: </label>

<select name="expirationDate" id="expirationDate">
<?php
	for ($month = 1 ; $month <= 12 ; $month++) {
		$dateObject = DateTime::createFromFormat('!m', $month);
		printf("  <option value=\"%'.02d\">%s</option>\n", $month, $dateObject->format('F'));
	}

?>
</select> 
<select name="expirationYear" id="expirationYear">
<?php
	$dateObject = new DateTime();
	$currentYear = intval($dateObject->format("Y"));
	for ($year = $currentYear ; $year < $currentYear+20 ; $year++) {
		printf("  <option value=\"%1\$d\">%1\$d</option>\n", $year);
	}
?>
</select>

Security Code <input />
</body>
</html>
