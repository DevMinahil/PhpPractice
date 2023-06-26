<?php
require_once "Book.php";
class PhysicalBook extends Book {
   
   private $weight;
   public function __construct(string $title, string $author, int $price, float $weight)
   {
       parent::__construct($title, $author, $price);
       $this->weight = $weight;
   }

   public function getWeight(): float
   {
       return $this->weight;
   }

   public function setWeight(float $weight): void
   {
       $this->weight = $weight;
   }
   public function printWeight(): void
   {
    print("The weight of the book is :");
    print($this->weight);
   }
}
?>