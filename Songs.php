
<?php

class Songs {
    private string $name;
    private int $numberOfPlays;
    private int|float $rating;

    public function __construct(string $name, int|float $numberOfPlays)
    {
        $this->name = $name;
        $this->numberOfPlays = $numberOfPlays;
        $this->rating=0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumberOfPlays(): int|float
    {
        return $this->numberOfPlays;
    }

    public function setNumberOfPlays(int|float $numberOfPlays): void
    {
        $this->numberOfPlays = $numberOfPlays;
    }
    public function setRating(int|float $rating )
    {//if the rating is less than zero than set the rating to zero
        $this->rating=max(0,$rating);
        //if the rating is more than 5 than set it to 5;
        $this->rating=min($rating,5);

    }
    public function getRating():int|float
    {
        return $this->rating;
    }
}

 
?>

