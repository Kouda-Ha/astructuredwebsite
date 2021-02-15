<?php
/* A books database.
   It would be best to store these details in the real database, but I cant be sure the tutor will have time to load our custom database file.
*/

class Book {
	public $title;
	public $description;
	public $author;
	public $price;
	public $image;
	public $isbn;
	function __construct($argv) {
		$this->title = $argv['title'];
		$this->description = $argv['description'];
		$this->author = $argv['author'];
		$this->price = $argv['price'];
		$this->image = $argv['image'];
		$this->isbn = $argv['isbn'];
	}
}

$bookArr = array(
	new Book(array(
		'title' => 'Little Book of Calm',
		'description' => 'Feeling stressed? Need some help to regain balance in your life? The Little Book of Calm is full of advice to follow and thought to inspire. Open it at any page and you will find a path to inner peace.',
		'author' => 'Paul Wilson',
		'price' => '£4.99',
		'image' => '',
		'isbn' => '978-0-140-28526-0'
	)),
	new Book(array(
		'title' => 'Japanese for Busy People II',
		'description' => 'Since it was first published in 1984. Japanese for Busy People has won acclain world-wide as an effective, easy-to-understand textbook, either for classroom use or for independent study. Now, in a major new revision, the series has been redesigned, updated, and consolidated to meet the needs of students and businesspeople who want to learn natural, spoken Japanese as effectively as possible in a limited amount of time.',
		'author' => 'Association for Japanese-Language Teaching',
		'price' => '$29.00',
		'image' => '',
		'isbn' => '978-1-56836-386-8'
	)),
	new Book(array(
		'title' => 'JavasScript The Good Parts',
		'description' => 'Most programming languages contain good and bad components, but javascript has more than its share of the latter, as it was developped and released in a hurry, before it could be refined. This authoritative book scrapes away the most horrendous features to reveal a subset of JavaScript that\'s ,pre re;oable, readable and maintainable than the languge as a whole - a subset you can use to create turly extensible and efficient code.',
		'author' => 'Douglas Crockford',
		'price' => '$29.00',
		'image' => '',
		'isbn' => '978-0-596-51774-8'
	)),
	new Book(array(
		'title' => 'Final Fantasy XIV Shadowbringers.',
		'description' => 'The Art of Reflection, Histories Forsaken.',
		'author' => 'Square Enix Co. Ltd.',
		'price' => '$39.99',
		'image' => '',
		'isbn' => '978-1-64609-061-7'
	)),
);


?>