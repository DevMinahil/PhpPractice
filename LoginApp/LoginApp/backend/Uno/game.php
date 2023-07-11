<?php
require_once('deck.php');
require_once('player.php');

class game
{

    //variable u to keep tract of the direction of the game
    private bool $direction;
    private int $numOfPlayers;
    private $players;
    private $nameOfPlayers = [];
    private Deck $deck;
    // this will be used to keep track of the card pile
    private $cardPile = [];


    //-1 mean reverse direction
    //+1 means farward direction
    public function __construct($direction, $numOfPlayers, $name)
    {
        $this->direction = $direction;
        $this->numOfPlayers = $numOfPlayers;
        $this->nameOfPlayers = $name;
        //generating deck for the game
        $this->deck = new Deck();
        $temp = new player($name[0]);


        for ($i = 1; $i < $this->numOfPlayers; $i++) {
            $this->players = array($temp, new player($name[$i]));
        }
        // foreach ($this->players as $player) {
        //     echo 'The name of player one ' . $player->getName() . ' ';
        // }

        //generating cards for this game and shuffling them
        $this->deck->generateDeck();
        $this->deck->shuffleCards();
        //setting the card pile to start the game

        //condition to check weather the first card is action or not if it is action so push it back into the deck else insert it
        //into the card pile
        $card = $this->deck->drawCards(1);


        $card = implode($card);





        while ($this->deck->typeOfCard($card) === 'action') {
            //   print("we will not put ".$card." in action :\n");

            $this->deck->insertCard($card);
            $card = $this->deck->drawCards(1);
            $card = implode($card);
        }


        array_push($this->cardPile, $card);
        // print_r($this->getCardPile());


    }
    // will take an id and return the player
    public function getPlayer($id)
    {
        return $this->players[$id];
    }
    //function overloading will be used of function getCardple

    //this function is responsible for distributing cards among all players
    //Assumtion each player will get 7 cards

    public function distributeCards()
    {
        foreach ($this->players as $player) {
            $player->setCards($this->deck->drawCards(7));
        }
    }
    //
    public function setCardPile($card)
    {
        array_push($this->cardPile, $card);
    }
    public function getCardPile()
    {
        // returns the last card of the pile

        return $this->cardPile[sizeof($this->cardPile) - 1];
    }
    //take the id of player and return his/her in hand card of the particular player
    public function viewInHandCards($id)
    {
        return $this->players[$id]->getCards();
    }
    // will return a bool and use to determine weather the player could play a card or simply
    //draw a card from the deck
    // this function will take the first card of the card pile and player cards whose turn is going on
    //player can play if he has same color same number or wild or draw four
    public function canPlay($id)
    {
        $firstCard = $this->getCardPile();
        // print("The player card are as follows :\n");

        //print_r($this->players[0]->getCards());


        foreach ($this->players[$id]->getCards() as $card) {
            print("\n");
            if ($this->deck->typeOfCard($card) == 'number') {

                if ($this->deck->cardNumber($card) == $this->deck->cardNumber($firstCard)) {
                    print($this->deck->cardNumber($card));
                    print($this->deck->cardNumber($firstCard));
                    print("The player can play because he has the same number :");
                    return 1;
                }
            }
            //if it is wild it will return true;

            if (($this->deck->cardColor($card)) == 'Wild') {
                print("The user can play coz he has wild card  :");
                return 1;
            }
            if ($this->deck->cardColor($card) == $this->deck->cardColor($firstCard)) {
                print("The user can play coz the color he has color to the card :");
                print($this->deck->cardColor($card));
                print($this->deck->cardColor($firstCard));
                return 1;
            }



            //same color condition
            //    elseif($this->deck->cardColor($this->getCardPile())==$this->deck->cardColor($card))
            //    {
            //     return 1;
            //    }




            //  print_r($this->deck->cardColor($card));

            // print_r("2 Blue");



            //     if($this->deck->typeOfCard($card)=='action')
            //     {
            //         //print("action card\n");
            //     }
            //     else
            //     {
            //     //print_r("Number card\n");
            //    // print_r(gettype($card));
            //   //  print("Printing the color of card :");
            //    print_r($this->deck->cardColor($card));

            //     }

        }
        print("The player cannot play :");
        return 0;
    }
    //this function will be used to check weather the card choosen by the user is valid or not

    public function validCard($id, $cardIndex)
    {
        $firstCard = $this->getCardPile();
        $cards = $this->players[$id]->getCards();
        $card = $cards[$cardIndex];
        print("The user want to play :");
        print($card);
        print("\n");



        if ($this->deck->typeOfCard($card) == 'number') {

            if ($this->deck->cardNumber($card) == $this->deck->cardNumber($firstCard)) {
                print($this->deck->cardNumber($card));
                print($this->deck->cardNumber($firstCard));
                print("The player can play because the card has the same number :");
                return 1;
            }
        }
        //if it is wild it will return true;

        if (($this->deck->cardColor($card)) == 'Wild') {
            print("The user can play coz the card he choosen has wild card  :");
            return 1;
        }
        if ($this->deck->cardColor($card) == $this->deck->cardColor($firstCard)) {
            print("The user can play coz the color of the card to the card :");
            print($this->deck->cardColor($card));
            print($this->deck->cardColor($firstCard));
            return 1;
        }



        //same color condition
        //    elseif($this->deck->cardColor($this->getCardPile())==$this->deck->cardColor($card))
        //    {
        //     return 1;
        //    }




        //  print_r($this->deck->cardColor($card));

        // print_r("2 Blue");



        //     if($this->deck->typeOfCard($card)=='action')
        //     {
        //         //print("action card\n");
        //     }
        //     else
        //     {
        //     //print_r("Number card\n");
        //    // print_r(gettype($card));
        //   //  print("Printing the color of card :");
        //    print_r($this->deck->cardColor($card));

        //     }


        print("The player cannot play :");
        return 0;
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
        return $this->deck->typeOAction($card);
    }
    public function getPlayerCards($id)
    {
        return $this->players[$id]->noOfCardsLeft();
    }
    public function removePlayerCard($id,$card)
    {
        return $this->players[$id]->removeCard($card);
    }
}

// $numOfPlayers = (int)readline('Enter the number of player in the game :');
// $names=[];
// for($i=0;$i<$numOfPlayers;$i++)
// {
// $name[$i]=readline('Enter the name of the player :');

// }
echo "hello wordl";
$game = new game(1, 2, ["Minahil", "Shahid"]);
$game->distributeCards();
$noOfPlayers=2;


// print_r($game->canPlay(0));

//this will keep track of the card pile


// for($i=0;$i<2;$i++)
// {
//     echo "The Card of palyer ";
//     print_r($game->viewInHandCards($i));
// }


// print_r($game->viewInHandCards(0));
// print_r($game->canPlay(0));
$playing = true;
$colors = ['Red', 'Green', 'Blue', 'Yellow'];
print("The starting card is :");
print_r($game->getCardPile());
print("\n");
$turn =1;
$reverse=false;
$skip=false;
while ($playing) {
    print("We are giving the following value to an array :");
    print_r($turn-1);
    print_r($game->getPlayerCards($turn-1));


    if($game->getPlayerCards($turn-1)==0)
    {
        
        print("Congratulation ");
        print($game->getPlayer($turn-1)->getName()." has won");
        print("\n");
        $playing=false;
        break;

    }
    else
    {
       print("The turn value is :".$turn ." \n");
       print("Its " . $game->getPlayer($turn-1)->getName() . " Turns :\n");
       print("Your cards are as follows \n");
       print_r($game->viewInHandCards($turn-1));
        if ($game->canPlay($turn-1)) {
            $indexOfCard = (int) readline('Enter the index of card u want to play :');
            while (!($game->validCard($turn-1, $indexOfCard))) //jab tak user valid card nahi choose krta is say inpt lain jaoo
            {
                $indexOfCard = (int) readline('Sorry this is an invalid car please try again:');
            }
          //  print("Akhir kaar user nay correct card day diya hai\n");
            $card = $game->getPlayer($turn-1)->getCardWithId($indexOfCard);
            //remving the card from the players cards;
            $game->removePlayerCard($turn-1,$card);
            
            $game->setCardPile($card);
            print_r($game->cardType($card));
            //now i want to check which card user has playeed

            print("Now the card pile is :");
            print_r($game->getCardPile());
            //do something if it is an action card
            if ($game->cardType($card) == 'action') {
                print("action card agayaa hai ab tou kuch krna paraay ga");
                print("let see what is the action :");
                print_r($game->typeOfAction($card));
                if ($game->typeOfAction($card) == 'Wild') {
                    // print('Wild');
                    // print_r($colors);
                    // $indexOfColor = (int) readline('Enter the index of color u want to choose ? :');
                    // print("You have choosen the following color :");
                    // print($colors[$indexOfColor]);
                }
                if ($game->typeOfAction($card) == 'Reverse') {
                    print("Uno reversed card is played :");
        
                    $reverse=true;
                    

                }
                if ($game->typeOfAction($card) == 'Skip') {
                    print("Uno Skip  card is played :");
                    $turn=($turn%2)+1;
                    
                    
                }
                if ($game->typeOfAction($card) == 'Draw') {
                    print("draw two");
                }
            }
            if($reverse==false)
            {

                $turn=($turn%2)+1;
            }
           
            else
            {
                $turn=$turn-1;
                $turn=($turn%2)+1;

            }

        } else {
            print("You cannot play u have to draw a card :");
            $game->getPlayer($turn-1)->setCards($game->drawFromDeck(1));
            $turn=($turn%2)+1;
        }
        print("The starting card is :");
        print_r($game->getCardPile());
    }
}

