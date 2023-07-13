<?php
//

require_once('index.php');
require_once('player.php');
session_start();


if (!isset($_SESSION['game'])) {
    echo json_encode("session hi nahi set ");
   


}

 else {
  
    $turn = $_SESSION['turn'];
    $game = $_SESSION['game'];
   
    


    if (isset($_POST['index'])) {
        $index = $_POST['index'];
        if (!$game->validCard($turn - 1, $index)) {
            $response = ['error' => 'error! Invalid Car'];
            echo json_encode($response);

        } else {
            $currentPlayerCards = $game->viewInHandCards($turn - 1);
           
           
           
           
        
             $game->removePlayerCard($turn - 1,  $currentPlayerCards[$index]);
             echo $game->viewInHandCards($turn - 1);
             $game->setCardPile($currentPlayerCards[$index]);
             $card=$currentPlayerCards[$index];
             if ($game->typeOfAction($card) == 'Reverse') {
                            $game->setDirection(!$game->getDirection());
            } 
            elseif ($game->typeOfAction($card) == 'Skip') {
                            echo "Uno Skip card is played. The next player's turn is skipped.\n";
                            $turn = ($turn % $game->getNumOfPlayers()) + 1;
            } elseif ($game->typeOfAction($card) == 'Draw') {
                            echo "Draw Two card is played. The next player must draw two cards and skip their turn.\n";
                            $nextPlayerId = ($turn % $game->getNumOfPlayers()) + 1;
                            $drawnCards = $game->drawFromDeck(2);
                            $game->getPlayer($nextPlayerId - 1)->addCards($drawnCards);
                            $turn = $nextPlayerId;
            }
                        // } elseif ($game->typeOfAction($card) == 'Wild') {
                        //     echo "Wild card is played.\n";
                        //     $chosenColor = readline("Choose the next color (Red, Green, Blue, Yellow): ");
                        //     $game->setDeckColor($chosenColor);
                        // } elseif ($game->typeOfAction($card) == 'DrawFourWild') {
                        //     echo "Draw Four Wild card is played.\n";
                        //     $chosenColor = readline("Choose the next color (Red, Green, Blue, Yellow): ");
                        //     $game->setDeckColor($chosenColor);
                        //     $nextPlayerId = ($turn % $noOfPlayers) + 1;
                        //     $drawnCards = $game->drawFromDeck(4);
                        //     $game->getPlayer($nextPlayerId - 1)->addCards($drawnCards);
                        //     $turn = $nextPlayerId;
                        // }
            // echo json_encode("sahi khail gaya hai bhai");

        }

    }
}



// } 




?>