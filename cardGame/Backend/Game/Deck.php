<?php

class Deck
{
    private $cards = [];
    private $colors;
    private $numbers;
    private $special;
    private string $currentColor;
    public function __construct()
    {
        $this->colors = ['Red', 'Green', 'Blue', 'Yellow'];
        $this->numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'Draw two', "Skip", "Reverse"];
        $this->special = ["Wild", "DrawFourWild"];
        $this->currentColor = '';
    }
    //This function is responsible for generating cards for uno game
    //rules 19 Red cards – 0 to 9.
    // 19 Blue cards – 0 to 9.
    // 19 Green cards – 0 to 9.
    // 19 Yellow cards – 0 to 9.
    // 8 Skip cards – two cards of each color.
    // 8 Reverse cards – two cards of each color.
    // 8 Draw cards – two cards of each color.
    // 8 Black cards – 4 wild cards and 4 Wild Draw 4 cards.
    public function generateDeck()
    {
        foreach ($this->numbers as $number) {
            foreach ($this->colors as $color) {
                if ($number != '0') {

                    array_push($this->cards, $number . " " . $color . " ", $number . " " . $color . " ");
                } else {
                    array_push($this->cards, $number . " " . $color . " ");
                }
            }
        }
        for ($i = 0; $i < 4; $i++) {
            array_push($this->cards, $this->special[0], $this->special[1]);
        }

        return $this->cards;
    }
    //this function will be responsible to assigning cards to each player
    //assumtion each player will get 7 cards;


    //This function will draw specified number of cards from the deck
    //this can be used for draw two draw four and assigning each player his/her cards
    public function drawCards(int $number)
    {// if deck have enough cards to draw or not
        if(count($this->cards)>$number) {
            $playerCards = array_slice($this->cards, 0, $number);
            array_splice($this->cards, 0, $number);
            return $playerCards;
        } 
        else {
            return 0;
        }
    }
    public function AddCards($card)
    {   
        array_push($this->cards, $card);
        shuffle($this->cards);
    }

    //this will shuffle the cards
    public function shuffleCards()
    {
        shuffle($this->cards);
    }
    //this will return an array of remaining cards in the deck
    public function cardNumber($card)
    {
        $number = explode(" ", $card);
        if (intval($number[0])) {
            return intval($number[0]);
        } else {

            return ($number[0]);
        }

    }
    public function remainingCards()
    {
        return sizeof($this->cards); //

    }
    public function insertCard($card)
    {
        $this->cards[$this->remainingCards()]=$card;
    }
    // return the type of card can be action or number
    public function typeOfCard($card)
    {
        $number = explode(" ", $card);
        if (intval($number[0]) || $number[0] === "0") {
            return "number";
        } else {
            return "action";
        }
    }
    public function typeOfAction($card)
    {
        $number = explode(" ", $card);
        return $number[0];
    }
    // it will be used to insert card at the ending of the deck
    // return color of the card if applicable other wise return zero
    public function cardColor($card)
    {
        $number = explode(" ", $card);
        if (sizeof($number) > 3) {
            return $number[2];
        }

        if (sizeof($number) == 3) {
            // print_r($number);

            if ($number[2] != '') {
                return ($number[2]);
            } else {
                return ($number[1]);
            }
        }
        if (sizeof($number) == 2) {
            return $number[1];
        }
        // the card is wild

        if (sizeof($number) == 1) {

            return "Wild";
        }


    }
}
