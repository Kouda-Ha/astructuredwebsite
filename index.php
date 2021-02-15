<!DOCTYPE HTML>
<html lang='en'>
<head>
<meta charset='UTF-8'> 
<title>Black Books</title>
<link type='text/css' href='css/style.css' rel='stylesheet'>
</head>
<body>
<?php
include 'include/header.php';
?>

<main class = 'booksList'>

<?php
include 'include/books.php';
	foreach ($bookArr as $index => $book){
		$book->figure($index);
	}

?>
</main>
</body>
</html>

