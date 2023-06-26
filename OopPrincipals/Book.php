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



?>