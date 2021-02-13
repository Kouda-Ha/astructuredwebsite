<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8"> 
<title>Black Books</title>
</head>
<body>
<?php
include 'database.php';
$link = mysqli_connect($database_host, $database_username, $database_password,$database_name);
if(!$link) die('failed');




$sql = "SELECT * FROM book";
	$result = $link->query($sql);
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {  
			echo ("Title: ".$row["title"]."<br>"); 
		} 
	}
    else {
		echo "0 results"; 
	} 


?>



</body>
</html>

