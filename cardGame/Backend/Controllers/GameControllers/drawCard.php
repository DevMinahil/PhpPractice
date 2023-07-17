<?php
require_once('../../Game/Game.php');
require_once('../../Game/Deck.php');
session_start();

$game = $_SESSION['game'];

$turn = $_SESSION['turn'];
$drawnCard = $game->drawFromDeck(1);
$game->getPlayer($turn)->addCards($drawnCard);
echo json_encode($drawnCard." has been added to deck");
$turn = $turn + $game->getDirection();
if ($turn >=$game->getNumOfPlayers()) {
 $turn = 0;
}
 elseif ($turn <0) {
 $turn = $game->getNumOfPlayers() - 1;
}
$_SESSION['turn']=$turn;
$_SESSION['game']=$game;

