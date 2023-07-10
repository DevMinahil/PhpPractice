<?php
require_once('deck.php');
require_once('player.php');

class game{

    //variable u to keep tract of the direction of the game
    private bool $direction;
    private int $numOfPlayers;
    private  $players;
    private $nameOfPlayers=[];
    private Deck $deck;
    // this will be used to keep track of the card pile
    private $cardPile=[];

    
    //-1 mean reverse direction
    //+1 means farward direction
    public function __construct($direction,$numOfPlayers,$name)
    {
        $this->direction=$direction;
        $this->numOfPlayers=$numOfPlayers;
        $this->nameOfPlayers=$name;
        //generating deck for the game
        $this->deck=new Deck();
        $temp=new player($name[0]);
     
       
        for($i=1;$i<$this->numOfPlayers;$i++)
        {
             $this->players=array($temp,new player($name[$i]));
           
            
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
        $card=$this->deck->drawCards(1);
       
        
        $card=implode($card);
        

        


         while($this->deck->typeOfCard($card)==='action')
        {
          print("we will not put ".$card." in action :\n");

           $this->deck->insertCard($card);
           $card=$this->deck->drawCards(1);
           $card=implode($card);  
           
        }

        
        array_push($this->cardPile,$this->deck->drawCards(1));
        print_r($this->getCardPile());


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
        array_push($this->cardPile,$card);
    }
    public function getCardPile()
    {
        // returns the last card of the pile

       return $this->cardPile[0];
      


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



        print('The color of the first card is :');
        $firstCard=implode($this->getCardPile());
       
        print_r($this->deck->cardColor($firstCard));
        foreach($this->players[$id]->getCards() as $card)
        {
           
           print("\n");
           print_r($this->deck->cardColor($card));
           //if it is wild it will return true;
           if(($this->deck->cardColor($card))=='Wild')
           {
            print("Wild card :");
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



    }
    public function getDirection()
    {
        return $this->direction;

    }
    public function setDirection($direction)
    {
        $this->direction=$direction;

    }
   



}

// $numOfPlayers = (int)readline('Enter the number of player in the game :');
// $names=[];
// for($i=0;$i<$numOfPlayers;$i++)
// {
// $name[$i]=readline('Enter the name of the player :');

// }
$game=new game(1,2,["Minahil","Shahid"]);
$game->distributeCards();

//this will keep track of the card pile


// for($i=0;$i<2;$i++)
// {
//     echo "The Card of palyer ";
//     print_r($game->viewInHandCards($i));
// }


// print_r($game->viewInHandCards(0));
// print_r($game->canPlay(0));






?>