
<?php

class Book{
    private $title;
    private $author;
    private $price;
    
    public function __construct(string $title, string $author, int $price)
    { 
        $this->title = $title;
        $this->author = $author;
        $this->price = $price; 
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    
    public function getAuthor(): string
    {
        return $this->author;
    }
    
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }
    
    public function getPrice(): int
    {
        return $this->price;
    }
    
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}

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
 $physicalBook=new PhysicalBook("The Kite Runner","Khalid Huseeni",10,30);
$digitalBook=new DigitalBook("Alchemist","Paul Coehlo",19,20);
print $physicalBook->getAuthor().PHP_EOL;
print $digitalBook->getFilesize().PHP_EOL;
print $digitalBook->getAuthor().PHP_EOL;


?>

