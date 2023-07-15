<?php
require_once('index.php');
require_once('deck.php');
session_start();
    $game = $_SESSION['game'];
    $turn = $_SESSION['turn'];
    $drawnCard = $game->drawFromDeck(1); 
    $game->getPlayer($turn)->addCards($drawnCard);
    $turn = $turn + $game->getDirection();
    if ($turn >=$game->getNumOfPlayers()) {
     $turn = $turn % $game->getNumOfPlayers();
    }
     elseif ($turn <0) {
     $turn = $game->getNumOfPlayers() - 1;
    }
    $_SESSION['turn']=$turn;
    echo json_encode('A card has been added to deck');


?>