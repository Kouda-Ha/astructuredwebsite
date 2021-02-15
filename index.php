<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8"> 
<title>Black Books</title>
<link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
include 'database.php';
$link = mysqli_connect($database_host, $database_username, $database_password, $database_name);
if(!$link) die('failed');




$sql = "SELECT * FROM book";
	$result = $link->query($sql);
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {  
			?> 
				<div class="bookBlock">
					<img class="bookImage" src="images/books/<?= $row['image'] ?>">
					<div class="bookTitle"><?= $row['title'] ?></div>
					<div class="bookDescription"><?= $row['description'] ?></div>
					<div class="bookPrice">£<?= $row['price']/100 ?></div>				
				</div>		
			<?php
		} 
	}
    else {
		echo "0 results"; 
	} 

?>

</body>
</html>

