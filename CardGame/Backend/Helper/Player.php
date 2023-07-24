<?php

class Player
{
    public string $name;
    private array $cards;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->cards = [];
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setCards(array $cards)
    {
        $this->cards = $cards;
    }
    public function getCards(): array
    {
        return $this->cards;
    }
    public function noOfCardsLeft(): int
    {
        return count($this->cards);
    }
    public function removeCard($card)
    {
        $index = array_search($card, $this->cards);

        if ($index !== false) {
            unset($this->cards[$index]);
            $this->cards = array_values($this->cards);
        }
    }
    public function addCards(array $newCards)
    {
        $this->cards = array_merge($this->cards, $newCards);
     
    }
}
