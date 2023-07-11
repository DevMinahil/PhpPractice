<?php
class player{

    public $name;
    private $cards;
    public $isTurn;

    public function __construct($name) 
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setCards($card)
    {
        $this->cards=$card;
    }
    public function getCards()
    {
       return $this->cards;
    }
    public function getTurn()
    {
        return $this->isTurn;
    }
    public function setTurn()
    {
        $this->isTurn=1;
    }
    public function getCardWithId($id)
    {
        return $this->cards[$id];
    }
    //this function will be used to play card by each player
    public function noOfCardsLeft()
    {
        return sizeof($this->cards);
    }
    public function removeCard($card)
    {
    $index = array_search($card, $this->cards);
    if ($index !== false) {
        unset($this->cards[$index]);
    }
    return sizeof($this->cards);
    }


    
}



?>