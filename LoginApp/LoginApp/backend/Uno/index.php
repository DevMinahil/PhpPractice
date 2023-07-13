<?php
require_once('deck.php');
require_once('player.php');

class Game
{

    private int $numOfPlayers;
    private  $players;
   
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

        if ($this->getDeckColor() == $this->deck->cardColor($card)) {
            return true;
        }
        if ($this->currentColor == $this->deck->cardColor($card)) {

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
$turn = 0;
while ($playing) {

    
    echo "Player " . $game->getPlayer($turn)->getName() . "'s turn\n";
    echo "Current card on top of the pile: " . $game->getCardPile() . "\n";
    print_r($game->viewInHandCards($turn));
    if ($game->canPlay($turn)) {
        $cardIndex = (int) readline('Enter the index of the card you want to play: ');

        while (!($game->validCard($turn, $cardIndex))) {
            $cardIndex = (int) readline("Invalid card! Enter the index of a valid card: ");
        }
        $card = $game->getPlayer($turn)->getCards()[$cardIndex];
      
        $game->removePlayerCard($turn, $card);
        $game->setCardPile($card);
        if ($game->getPlayerCards($turn) == 0) {
                echo "Congratulations, " . $currentPlayer->getName() . " has won the game!\n";
                $playing = false;
                
            
            } 
            else
            {
                if ($game->typeOfAction($card) == 'Wild') 
                {
                    echo "Wild card is played.\n";
                    $colors = ["Red", "Blue", "Green", "Yellow"];
                    print_r($colors);
                    $colorIndex = (int) readline('Enter the index of color :');
                    $game->setCurrentColor($colors[$colorIndex]);
                    echo  $game->getCurrentColor();
                }
                if ($game->typeOfAction($card) == 'Reverse') //working
                {
                    $game->setDirection(-$game->getDirection());
                } 
                if ($game->typeOfAction($card) == 'Skip') {
                    echo "Uno Skip card is played. The next player's turn is skipped.\n";
                    echo $game->getPlayer($turn)->getName(). "Turn is skipped ";
                    $turn = $turn + $game->getDirection();
                    if ($turn == $noOfPlayers) {
                        $turn = 0;
                    } elseif ($turn < 0) {
                        $turn = $noOfPlayers - 1;
                 }
                } elseif ($game->typeOfAction($card) == 'Draw') {
                    echo "Draw Two card is played.";
                    $drawnCards = $game->drawFromDeck(2);
                    $game->getPlayer($turn)->addCards($drawnCards);
                    $DrawTwoPlayer = $turn + $game->getDirection();
                    if ($DrawTwoPlayer == $noOfPlayers) {
                        $DrawTwoPlayer = 0;
                    } elseif ($DrawTwoPlayer < 0) {
                        $DrawTwoPlayer = $noOfPlayers - 1;
                    }
                    $game->getPlayer($DrawTwoPlayer)->addCards($drawnCards);
                } elseif ($game->typeOfAction($card) == 'DrawFourWild') //yeh bhi nhi chal rhaa
                {
                    echo "Draw Four Wild card is played.\n";
                    $colors = ["Red", "Blue", "Green", "Yellow"];
                    print_r($colors);
                    $colorIndex = (int) readline('Enter the index of color :');
                    $game->setCurrentColor($colors[$colorIndex]);
                    $drawnCards = $game->drawFromDeck(4);
                    $DrawFourPlayer = $turn + $game->getDirection();
                  
                    if ($DrawFourPlayer == $noOfPlayers) {
                        $DrawFourPlayer= 0;
                    } elseif ($DrawFourPlayer < 0) {
                        $DrawFourPlayer = $noOfPlayers - 1;
                    }
                    echo "Cards has been added :";

                    $game->getPlayer($DrawFourPlayer)->addCards($drawnCards);
                    echo $game->getCurrentColor();
                }
            }




    } else {
        print("U cannot play");
        $drawnCard = $game->drawFromDeck(1);
        $game->getPlayer($turn)->addCards($drawnCard);
    }
  
   


    $turn = $turn + $game->getDirection();
    echo "Turn in updayed here ".$turn;
    if ($turn == $noOfPlayers) {
        $turn = 0;
    } elseif ($turn < 0) {
        $turn = $noOfPlayers - 1;
    }
}

// while ($playing) {
// $currentPlayer = $game->getPlayer($turn - 1);
// 

// echo "----------------------------------------\n";
// echo "Player " . $currentPlayer->getName() . "'s turn\n";
// echo "Current card on top of the pile: " . $game->getCardPile() . "\n";
// print("Your cards: " . "\n");


// if ($game->canPlay($turn - 1)) {

//     $cardIndex = (int) readline('Enter the index of the card you want to play: ');

//     while (!($game->validCard($turn - 1, $cardIndex))) {
//         $cardIndex = (int) readline("Invalid card! Enter the index of a valid card: ");
//     }

//     $card = $currentPlayerCards[$cardIndex];
//     $game->removePlayerCard($turn - 1, $card);
//     $game->setCardPile($card);

//     if ($game->typeOfAction($card) == 'Reverse') //working
//     {
//         $game->setDirection(-$game->getDirection());
//     } elseif ($game->typeOfAction($card) == 'Skip') {
//         echo "Uno Skip card is played. The next player's turn is skipped.\n";
//         $turn = $game->getNextPlayer($turn);
//         $turn = $game->getNextPlayer($turn);

//     } elseif ($game->typeOfAction($card) == 'Draw') {
//         echo "Draw Two card is played. The next player must draw two cards and skip their turn.\n";
//         $nextPlayerId = $game->getNextPlayer($turn);
//         $drawnCards = $game->drawFromDeck(2);
//         $game->getPlayer($nextPlayerId - 1)->addCards($drawnCards);
//         $turn = $game->getNextPlayer($nextPlayerId);
//     } elseif ($game->typeOfAction($card) == 'Wild') //yeh nahi chal rhaa
//     {
//         echo "Wild card is played.\n";
//         $chosenColor = readline("Choose the next color (Red, Green, Blue, Yellow): ");
//         $game->setDeckColor($chosenColor);
//         $turn = $game->getNextPlayer($turn);
//     } elseif ($game->typeOfAction($card) == 'DrawFourWild') //yeh bhi nhi chal rhaa
//     {
//         echo "Draw Four Wild card is played.\n";
//         $chosenColor = readline("Choose the next color (Red, Green, Blue, Yellow): ");
//         $game->setDeckColor($chosenColor);
//         $nextPlayerId = $game->getNextPlayer($turn);
//         $drawnCards = $game->drawFromDeck(4);
//         $game->getPlayer($nextPlayerId - 1)->addCards($drawnCards);
//         $turn = $game->getNextPlayer($nextPlayerId);
//     }

//     if ($game->getPlayerCards($turn - 1) == 0) {
//         echo "Congratulations, " . $game->getPlayer($turn - 1)->getName() . " has won the game!\n";
//         $playing = false;
//     }
// } else {
//     echo "You cannot play. You must draw a card.\n";
//     $drawnCard = $game->drawFromDeck(1);
//     $currentPlayer->addCards($drawnCard);


// }
// if ($game->getPlayerCards($turn - 1) == 0) {
//     echo "Congratulations, " . $currentPlayer->getName() . " has won the game!\n";
//     $playing = false;

// } 
//}

echo "Game Over!\n";
