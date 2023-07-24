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
    private $playerName;

    function __construct($turn, $cardIndex, &$game, $color = null)
    {
        $this->turn = $turn;
        $this->cardIndex = $cardIndex;
        $this->game = $game;
        $this->color = $color;
        $this->card = $this->game->getPlayer($this->turn)->getCards()[$this->cardIndex];
        $this->playerName = $this->game->getPlayerName($turn);

        if (!$this->isCardValid()) {
            $response = ['error' => 'error! Invalid Card'];
            echo json_encode($response);
            return;
        }
        $this->playCard();
        if ($this->isWinner()) {
            echo json_encode('Congratulations, ' . $this->playerName . ' has won the game!');
            return;
        }
        if ($this->isActionCardPlayed()) {
            if ($this->takeAction() == 0) {
                return;
            }
        }
        $this->turn = $this->updateTurn();
    }
    public function getTurn()
    {
        return $this->turn;
    }
    function isCardValid()
    {
        if (!$this->game->validCard($this->turn, $this->cardIndex)) {
            return 0;
        }
        return 1;
    }
    function playCard()
    {
        $this->game->setCurrentColor(null);
        $this->game->removePlayerCard($this->turn, $this->card);
        $this->game->setCardPile($this->card);
        echo json_encode($this->card);
    }
    function isWinner()
    {
        if ($this->game->getNoOfCards($this->turn) == 0) {
            echo json_encode('Congratulations, ' .  $this->playerName . ' has won the game!');
            return true;
        }
    }
    function wildCard()
    {
        if ($this->color == null) {
            return 0;
        }
        $this->game->setCurrentColor($this->color);
        echo json_encode('Now the current color is: ' . $this->game->getCurrentColor());
        return 1;
    }
    function reverseCard()
    {
        $this->game->setDirection(($this->game->getDirection()) * -1);
        echo json_encode('Reverse card is played.');
        return 1;
    }
    function skipCard()
    {
        $this->turn = $this->updateTurn();
        echo json_encode($this->game->getPlayerName($this->turn) . "'s turn is skipped.");
        return 1;
    }
    function drawTwo()
    {
        $drawnCards = $this->game->drawFromDeck(2);
        $drawTwoPlayer = $this->updateTurn();
        $this->game->getPlayer($drawTwoPlayer)->addCards($drawnCards);
        echo json_encode('Draw Two card is played. Cards are added in ' . $this->game->getPlayerName($drawTwoPlayer));
        return 1;
    }
    function drawFour()
    {
        if ($this->color == null) {
            return 0;
        }
        $drawnCards = $this->game->drawFromDeck(4);
        $drawFourPlayer = $this->updateTurn();
        $this->game->addCardInPlayerHand($drawFourPlayer, $drawnCards);
        $this->game->setCurrentColor($this->color);
        echo json_encode('Draw Four card is played. Cards are added in ' . $this->game->getPlayerName($drawFourPlayer));
        return 1;
    }
    function updateTurn()
    {
        $turn = $this->turn + $this->game->getDirection();
        $numOfPlayers = $this->game->getNumOfPlayers();

        if ($turn == $numOfPlayers) {
            $turn = 0;
        } elseif ($turn < 0) {
            $turn = $numOfPlayers - 1;
        }
        return $turn;
    }
    function isActionCardPlayed()
    {
        if ($this->game->deck->typeOfCard($this->card) === 'number') {
            return 0;
        }
        return 1;
    }
    function takeAction()
    {
        if ($this->game->typeOfAction($this->card) == 'Wild') {
            $result = $this->wildCard();
        } elseif ($this->game->typeOfAction($this->card) == 'Reverse') {
            $result = $this->reverseCard();
        } elseif ($this->game->typeOfAction($this->card) == 'Skip') {
            $result = $this->skipCard();
        } elseif ($this->game->typeOfAction($this->card) == 'Draw') {
            $result =  $this->drawTwo();
        } elseif ($this->game->typeOfAction($this->card) == 'DrawFourWild') {
            $result = $this->drawFour();
        }
        return $result;
    }
}
