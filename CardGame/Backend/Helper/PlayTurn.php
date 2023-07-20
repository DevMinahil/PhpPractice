<?php
require_once('Deck.php');
require_once('Player.php');
require_once('Game.php');
class PlayTurn
{
    private $turn;
    private $cardIndex;
    private Game $game;
    private $color;
    private $card;
    function __construct($turn, $cardIndex, &$game, $color = null)
    {
        $this->turn = $turn;
        $this->cardIndex = $cardIndex;
        $this->game = $game;
        $this->color=$color;
        $this->card=$this->game->getPlayer($this->turn)->getCards()[$this->cardIndex];
        if (!$this->IsCardValid()) {
            $response = ['error' => 'error! Invalid Car'];
            echo json_encode($response);
            return;
        }
        $this->PlayCard();
        if ($this->IsWinner()) {
            echo json_encode("Congratulations, " . $this->game->getPlayer($this->cardIndex)->getName() . " has won the game!");
            return;
        }
        if ($this->IsActionCardPlayed()) {

            if ($this->takeAction() == 0){
                return;
            }
        }
         $this->turn = $this->UpdateTurn();
    }
    // Getter methods
    public function getTurn()
    {
        return $this->turn;
    }
    function IsCardValid()
    {
        if (!$this->game->validCard($this->turn, $this->cardIndex)) {
            return 0;
        }
        return 1;
    }
    function PlayCard()
    {
        $this->game->setCurrentColor(null);
        $this->game->removePlayerCard($this->turn, $this->card);
        $this->game->setCardPile($this->card);
        echo json_encode($this->card);
    }
    function IsWinner()
    {
        if ($this->game->getNoOfCards($this->turn) == 0) {
            echo json_encode("Congratulations, " . $this->game->getPlayer($this->cardIndex)->getName() . " has won the game!");
            return true;
        }
    }
    function wildCard()
    {
        if ($this->color == null) {
            return 0;
        }
        $this->game->setCurrentColor($this->color);
        echo json_encode("Now the current color is :" . $this->game->getCurrentColor());
    }
    function reverseCard()
    {
        $this->game->setDirection(($this->game->getDirection()) * -1);
        echo json_encode("Rerverse card is played :");
    }
    function skipCard()
    {
        $this->turn = $this->UpdateTurn();
        echo json_encode($this->game->getPlayer($this->turn)->getName() . "Turn is skipped ");
    }
    function drawTwo()
    {
        $drawnCards = $this->game->drawFromDeck(2);
        $DrawTwoPlayer = $this->UpdateTurn();
        $this->game->getPlayer($DrawTwoPlayer)->addCards($drawnCards);
        echo json_encode("Draw Two card is played. Cards are added in " . $this->game->getPlayer($DrawTwoPlayer)->getName());
    }
    function drawFour()
    {
        if ($this->color == null) {
            return 0;
        }
        $drawnCards = $this->game->drawFromDeck(4);
        $DrawFourPlayer = $this->UpdateTurn();
        $this->game->getPlayer($DrawFourPlayer)->addCards($drawnCards);
        $this->game->setCurrentColor($this->color);
        echo json_encode("Draw Two card is played. Cards are added in " . $this->game->getPlayer($DrawFourPlayer)->getName());
    }
    function UpdateTurn()
    {
        $turn = $this->turn + $this->game->getDirection();
        if ($turn == $this->game->getNumOfPlayers()) {
            $turn = 0;
        } elseif ($turn < 0) {
            $turn = $this->game->getNumOfPlayers() - 1;
        }
        return $turn;
    }
    function IsActionCardPlayed()
    {
        
        if ($this->game->deck->typeOfCard($this->card) === "number") {
            return 0;
        }
        return 1;
    }
    function takeAction()
    {

        if ($this->game->typeOfAction($this->card) == "Wild") {
            $this->wildCard();
        } elseif ($this->game->typeOfAction($this->card) == 'Reverse') {
            $this->reverseCard();
        } elseif ($this->game->typeOfAction($this->card) == 'Skip') {
            $this->skipCard();
        }
        //draw 2 card
        elseif ($this->game->typeOfAction($this->card) == 'Draw') {
            $this->drawTwo();
        } elseif ($this->game->typeOfAction($this->card) == 'DrawFourWild') {
            $this->drawFour();
        }
    }
}
