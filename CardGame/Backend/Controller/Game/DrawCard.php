<?php
require_once('../../routes.php');
require_once($deckPath);
require_once($playerPath);
require_once($gamePath);
session_start();
$game = $_SESSION['game'];
$turn = $_SESSION['turn'];
$drawnCard = $game->drawFromDeck(1);
$game->getPlayer($turn)->addCards($drawnCard);
$turn = $turn + $game->getDirection();
if ($turn >= $game->getNumOfPlayers()) {
    $turn = 0;
} elseif ($turn < 0) {
    $turn = $game->getNumOfPlayers() - 1;
}
$_SESSION['turn'] = $turn;
echo json_encode("The draw card is ".$drawnCard[0]);
