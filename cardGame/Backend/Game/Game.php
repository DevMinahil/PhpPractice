<?php

require_once('Deck.php');
require_once('Player.php');

class Game
{
    private int $numOfPlayers;
    private $players;

    private $direction;
    public Deck $deck;
    private array $cardPile = [];
    private string $deckColor = '';
    private $currentColor;

    public function __construct($direction, $numOfPlayers, $name)
    {

        $this->numOfPlayers = $numOfPlayers;
        $this->direction = $direction;
        $this->deck = new Deck();
        $this->players=array();

        for ($i = 0; $i < $this->numOfPlayers; $i++) {
            $this->players[] = new Player($name[$i]);
        }

        $this->deck->generateDeck();
        $this->deck->shuffleCards();
        //generating cards for action file
        $card = $this->deck->drawCards(1);
        $card = implode($card);

        while ($this->deck->typeOfCard($card) === 'action') {
            $this->deck->insertCard($card);
            $card = $this->deck->drawCards(1);
            $card = implode($card);
        }

        array_push($this->cardPile, $card);
    }
    public function getDeck()
    {
        return $this->deck;
    }


    public function getNumOfPlayers(): int
    {
        return $this->numOfPlayers;
    }

    public function setNumOfPlayers(int $numOfPlayers): void
    {
        $this->numOfPlayers = $numOfPlayers;
    }
    public function getCurrentColor()
    {
        return $this->currentColor;
    }
    public function setCurrentColor($color)
    {
        $this->currentColor = $color;
    }

    public function getPlayer($id)
    {
        return $this->players[$id];
    }

    public function distributeCards()
    {
        foreach ($this->players as $player) {
            $player->setCards($this->deck->drawCards(7));
        }
    }

    public function setCardPile($card)
    {
        array_push($this->cardPile, $card);
    }

    public function getCardPile()
    {
        return $this->cardPile[sizeof($this->cardPile) - 1];
    }

    public function viewInHandCards($id)
    {
        return $this->players[$id]->getCards();

    }
    //verifies weather the user can play or not

    public function canPlay($id)
    {
        $firstCard = $this->getCardPile();

        foreach ($this->players[$id]->getCards() as $card) {
            if ($this->deck->typeOfCard($card) == 'number') {
                if ($this->deck->cardNumber($card) == $this->deck->cardNumber($firstCard)) {
                    return true;
                }
            }

            if (($this->deck->cardColor($card)) == 'Wild') {
                return true;
            }

            if ($this->deck->cardColor($card) == $this->deck->cardColor($firstCard)) {
                return true;
            }

            if ($this->currentColor == $this->deck->cardColor($card)) {
                return true;
            }
            if($this->deck->typeOfAction($card)==$this->deck->typeOfAction($firstCard)) {
                return true;
            }
        }

        return false;
    }
     //checks if the user has played valid card
    public function validCard($id, $cardIndex)
    {
        $firstCard = $this->getCardPile();
        $cards = $this->players[$id]->getCards();
        $card = $cards[$cardIndex];

        if ($this->deck->typeOfCard($card) == 'number') {
            if ($this->deck->cardNumber($card) == $this->deck->cardNumber($firstCard)) {
                return true;
            }
        }

        if (($this->deck->cardColor($card)) == 'Wild') {
            return true;
        }

        if ($this->deck->cardColor($card) == $this->deck->cardColor($firstCard)) {
            return true;
        }

        if ($this->getDeckColor() == $this->deck->cardColor($card)) {
            return true;
        }
        if ($this->currentColor === $this->deck->cardColor($card)) {

            return true;
        }
        if($this->typeOfAction($card)==$this->typeOfAction($firstCard)) {
            return true;

        }
        return false;
    }
    //draws specific number of cards from card file

    public function drawFromDeck($number)
    {
        return $this->deck->drawCards($number);
    }
    //return card type of the card played by the user

    public function cardType($card)
    {
        return $this->deck->typeOfCard($card);
    }
    //gives the direction of game useful for reverse card

    public function getDirection()
    {
        return $this->direction;
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    public function typeOfAction($card)
    {

        return $this->deck->typeOfAction($card);


    }

    public function getNoOfCards($id)
    {
        return $this->players[$id]->noOfCardsLeft();
    }

    public function removePlayerCard($id, $card)
    {
        return $this->players[$id]->removeCard($card);
    }

    public function setDeckColor(string $color)
    {
        $this->deckColor = $color;
    }

    public function getDeckColor()
    {
        return $this->deckColor;
    }
}
