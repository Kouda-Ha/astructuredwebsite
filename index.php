<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8"> 
<title>Black Books</title>
<link type="text/css" href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
include 'include/header.php';
?>

<main>

<?php
include 'include/books.php';
	foreach ($bookArr as $index => $book){
		?> 
			<figure class="bookBlock">
				<img class="bookImage" src="images/books/<?= $book->image ?>">
				<figcaption>
					<header class="bookTitle"><?= $book->title ?></header>
					<section class="bookDescription"><?= $book->description ?></section>
					<section class="bookPrice"><?= $book->price ?></section>
					<form method="get" action="pay.php">
						<input type="hidden" name="book" value="<?= $index ?>" />
						<input type="submit" value="pay"/>
					</form>
				</figcaption>
			</figure>		
		<?php
	}

?>
</main>
</body>
</html>

