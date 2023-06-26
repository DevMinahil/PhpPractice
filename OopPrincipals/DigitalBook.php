<?php
require_once "Book.php";
class DigitalBook extends Book {
   
   private $filesize;

   public function __construct(string $title, string $author, int $price, int $filesize)
   {
       parent::__construct($title, $author, $price);
       $this->filesize = $filesize;
   }

   public function getFilesize(): int
   {
       return $this->filesize;
   }

   public function setFilesize(int $filesize): void
   {
       $this->filesize = $filesize;
   }
}
?>