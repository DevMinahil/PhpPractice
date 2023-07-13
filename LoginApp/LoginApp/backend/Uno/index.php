<?php
require_once('deck.php');
require_once('player.php');

class Game
{
    private bool $isReverse;
    private int $numOfPlayers;
    private array $players;
    private array $nameOfPlayers = [];
    public Deck $deck;
    private array $cardPile = [];
    private string $deckColor = '';

    public function __construct($direction, $numOfPlayers, $name)
    {
        $this->isReverse = false;
        $this->numOfPlayers = $numOfPlayers;
        $this->nameOfPlayers = $name;
        $this->deck = new Deck();
        $temp = new Player($name[0]);

        for ($i = 1; $i < $this->numOfPlayers; $i++) {
            $this->players = array($temp, new Player($name[$i]));
        }

        $this->deck->generateDeck();
        $this->deck->shuffleCards();

        $card = $this->deck->drawCards(1);
        $card = implode($card);

        while ($this->deck->typeOfCard($card) === 'action') {
            $this->deck->insertCard($card);
            $card = $this->deck->drawCards(1);
            $card = implode($card);
        }

        array_push($this->cardPile, $card);
    }

    public function getNumOfPlayers(): int
    {
        return $this->numOfPlayers;
    }

    public function setNumOfPlayers(int $numOfPlayers): void
    {
        $this->numOfPlayers = $numOfPlayers;
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

            if ($this->deck->cardColor($card) == $this->deck->getColor()) {
                return true;
            }
            if ($this->getDeckColor()== $this->deck->cardColor($card)) {
                print("This condition is truee");
                return true;
                
            }
        }

        return false;
    }

    public function validCard($id, $cardIndex)
    {
        $firstCard = $this->getCardPile();
        $cards = $this->players[$id]->getCards();
        $card = $cards[$cardIndex];
        echo $this->getDeckColor();

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

        if ($this->getDeckColor()== $this->deck->cardColor($card)) {
            return true;
            
        }
        return false;
    }

    public function drawFromDeck($number)
    {
        return $this->deck->drawCards($number);
    }

    public function cardType($card)
    {
        return $this->deck->typeOfCard($card);
    }

    public function getDirection()
    {
        return $this->isReverse ? -1 : 1;
    }

    public function setDirection($direction)
    {
        $this->isReverse = ($direction === -1);
    }

    public function typeOfAction($card)
    {
        if ($this->deck->typeOfCard($card) == 'action') {
            if ($this->deck->typeOfAction($card) == 'Wild' || $this->deck->typeOfAction($card) == 'DrawFourWild') {
                return 'Wild';
            }
            return $this->deck->typeOfAction($card);
        }
        return '';
    }

    public function getPlayerCards($id)
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

    public function getNextPlayer($currentTurn)
    {
        $numOfPlayers = count($this->players);
        if ($this->isReverse) {
            $nextPlayer = ($currentTurn === 1) ? $numOfPlayers : $currentTurn - 1;
        } else {
            $nextPlayer = ($currentTurn === $numOfPlayers) ? 1 : $currentTurn + 1;
        }
       
        return $nextPlayer;
    }
}

echo "Welcome to Uno Game!\n";

$numOfPlayers = (int) readline('Enter the number of players in the game: ');

$name = [];
for ($i = 0; $i < $numOfPlayers; $i++) {
    $name[$i] = readline('Enter the name of player ' . ($i + 1) . ': ');
}

$game = new Game(1, $numOfPlayers, $name);
$game->distributeCards();
$noOfPlayers = $numOfPlayers;

$playing = true;
$turn = 1;

while ($playing) {
    $currentPlayer = $game->getPlayer($turn - 1);
    $currentPlayerCards = $game->viewInHandCards($turn - 1);

    echo "----------------------------------------\n";
    echo "Player " . $currentPlayer->getName() . "'s turn\n";
    echo "Current card on top of the pile: " . $game->getCardPile() . "\n";
    print("Your cards: " . "\n");
   

    if ($game->canPlay($turn - 1)) {
      
        $cardIndex = (int) readline('Enter the index of the card you want to play: ');

        while (!($game->validCard($turn - 1, $cardIndex))) {
            $cardIndex = (int) readline("Invalid card! Enter the index of a valid card: ");
        }

        $card = $currentPlayerCards[$cardIndex];
        $game->removePlayerCard($turn - 1, $card);
        $game->setCardPile($card);

        if ($game->typeOfAction($card) == 'Reverse') //working
        {
            $game->setDirection(-$game->getDirection());
        } elseif ($game->typeOfAction($card) == 'Skip') {
            echo "Uno Skip card is played. The next player's turn is skipped.\n";
            $turn = $game->getNextPlayer($turn);
            $turn = $game->getNextPlayer($turn);

        } elseif ($game->typeOfAction($card) == 'Draw') {
            echo "Draw Two card is played. The next player must draw two cards and skip their turn.\n";
            $nextPlayerId = $game->getNextPlayer($turn);
            $drawnCards = $game->drawFromDeck(2);
            $game->getPlayer($nextPlayerId - 1)->addCards($drawnCards);
            $turn = $game->getNextPlayer($nextPlayerId);
        } elseif ($game->typeOfAction($card) == 'Wild') //yeh nahi chal rhaa
        {
            echo "Wild card is played.\n";
            $chosenColor = readline("Choose the next color (Red, Green, Blue, Yellow): ");
            $game->setDeckColor($chosenColor);
            $turn = $game->getNextPlayer($turn);
        } elseif ($game->typeOfAction($card) == 'DrawFourWild') //yeh bhi nhi chal rhaa
        {
            echo "Draw Four Wild card is played.\n";
            $chosenColor = readline("Choose the next color (Red, Green, Blue, Yellow): ");
            $game->setDeckColor($chosenColor);
            $nextPlayerId = $game->getNextPlayer($turn);
            $drawnCards = $game->drawFromDeck(4);
            $game->getPlayer($nextPlayerId - 1)->addCards($drawnCards);
            $turn = $game->getNextPlayer($nextPlayerId);
        }

        if ($game->getPlayerCards($turn - 1) == 0) {
            echo "Congratulations, " . $game->getPlayer($turn - 1)->getName() . " has won the game!\n";
            $playing = false;
        }
    } else {
        echo "You cannot play. You must draw a card.\n";
        $drawnCard = $game->drawFromDeck(1);
        $currentPlayer->addCards($drawnCard);

        
    }
    if ($game->getPlayerCards($turn - 1) == 0) {
        echo "Congratulations, " . $currentPlayer->getName() . " has won the game!\n";
        $playing = false;
       
    } 
}

echo "Game Over!\n";
