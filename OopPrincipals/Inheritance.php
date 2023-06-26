
<?php
require_once "Book.php";
require_once "PhysicalBook.php";
require_once "DigitalBook.php";
$physicalBook=new PhysicalBook("The Kite Runner","Khalid Huseeni",10,30);
$digitalBook=new DigitalBook("Alchemist","Paul Coehlo",19,20);
print $physicalBook->getAuthor().PHP_EOL;
print $digitalBook->getFilesize().PHP_EOL;
print $digitalBook->getAuthor().PHP_EOL;

 
?>

