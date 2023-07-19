<?php

//
require_once('../../game/Game.php');

require_once('../../game/Player.php');

session_start();

if (!isset($_SESSION['game'])) {
    echo json_encode("session is not set ");



} else {

    $turn = $_SESSION['turn'];
    $game = $_SESSION['game'];
   




    if (isset($_POST['index'])) {
        $index = $_POST['index'];
        if (!$game->validCard($turn, $index)) {
            $response = ['error' => 'error! Invalid Car'];
            echo json_encode($response);


        } else {
            $game->setCurrentColor(null);

            $card = $game->getPlayer($turn)->getCards()[$index];
            echo json_encode($card);
           

            $game->removePlayerCard($turn, $card);
            $game->setCardPile($card);
            
            //wining condition
            if ($game->getNoOfCards($turn) == 0) {
                echo json_encode("Congratulations, " . $game->getPlayer($turn)->getName() . " has won the game!");
    
                exit();

            }
            //agar nahi jeeta sad life
            else {
                if ($game->typeOfAction($card) == "Wild") {
                    //check the disered color for the user
                    if (!isset($_POST['color'])) {
                        echo json_encode("Select the color first");
                        exit();
                    }
                    //color day diya hai user nay
                    else {
                        $color = $_POST['color'];
                        $game->setCurrentColor($color);

                        echo json_encode("Now the current color is :".$game->getCurrentColor());
                    }

                }
                if ($game->typeOfAction($card) == 'Reverse') {
                    $game->setDirection(($game->getDirection())*-1);
                  
                    $turn2 = $turn + $game->getDirection();
                    if ($turn2 == $game->getNumOfPlayers()) {
                        $turn2 = 0;
                    } elseif ($turn2 < 0) {
                        $turn2 = $game->getNumOfPlayers() - 1;
                    }

                    echo json_encode("Rerverse card is played :"." Now turn is ".$turn2);
                }
                if ($game->typeOfAction($card) == 'Skip') {


                    $turn = $turn + $game->getDirection();
                    if ($turn == $game->getNumOfPlayers()) {
                        $turn = 0;
                    } elseif ($turn < 0) {
                        $turn = $game->getNumOfPlayers()- 1;
                    }

                    echo json_encode($game->getPlayer($turn)->getName() . "Turn is skipped ");
                } elseif ($game->typeOfAction($card) == 'Draw') {

                    $drawnCards = $game->drawFromDeck(2);
    
                    $DrawTwoPlayer = $turn + $game->getDirection();
                    if ($DrawTwoPlayer == $game->getNumOfPlayers()) {
                        $DrawTwoPlayer = 0;
                    } elseif ($DrawTwoPlayer < 0) {
                        $DrawTwoPlayer = $game->getNumOfPlayers() - 1;
                    }
                    $game->getPlayer($DrawTwoPlayer)->addCards($drawnCards);
                    echo json_encode("Draw Two card is played. Cards are added in ".$game->getPlayer($DrawTwoPlayer)->getName());
                } elseif ($game->typeOfAction($card) == 'DrawFourWild') {
                
                    if (!isset($_POST['color'])) {
                        echo json_encode("Select the color first");
                        exit();
                    }
                    //color day diya hai user nay
                    else {
                        $color = $_POST['color'];
                        $game->setCurrentColor($color);
                        $drawnCards = $game->drawFromDeck(4);
                        $DrawFourPlayer = $turn + $game->getDirection();
                        if ($DrawFourPlayer == $game->getNumOfPlayers()) {
                            $DrawFourPlayer = 0;
                        } elseif ($DrawFourPlayer < 0) {
                            $DrawFourPlayer = $game->getNumOfPlayers() - 1;
                        }
                        $game->getPlayer($DrawFourPlayer)->addCards($drawnCards);
                        json_encode("DrawFourWild Card has been added to ". $game->getPlayer($DrawFourPlayer)->getName()." Cards :");


                    }
                }



                $turn = $turn + $game->getDirection();
                if ($turn == $game->getNumOfPlayers()) {
                    $turn = 0;
                } elseif ($turn < 0) {
                    $turn = $game->getNumOfPlayers() - 1;
                }
                $_SESSION['turn']=$turn;
                $_SESSION['game']=$game;

            }

        }






    }
}
