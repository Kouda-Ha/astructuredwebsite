<!DOCTYPE HTML>
<html lang='en'>
<head>
<meta charset='UTF-8'> 
<title>Black Books</title>
<link type='text/css' href='css/style.css' rel='stylesheet'>
</head>
<body>
<?php
//Include the Header
include 'include/header.php';
include 'include/books.php';

echo "<main class='booksList'>\n";

//Loop through books and display the book widget for each
foreach ($bookArr as $index => $book){
	$book->figure($index);
}
?>
</main>
</body>
</html>