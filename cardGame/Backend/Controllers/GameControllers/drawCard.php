<?php

require_once('../../Game/Game.php');
require_once('../../Game/Deck.php');
require_once('../../Game/Player.php');
session_start();
$game = $_SESSION['game'];
$turn = $_SESSION['turn'];
$drawnCard = $game->drawFromDeck(1);
$game->getPlayer($turn)->addCards($drawnCard);

$turn = $turn + $game->getDirection();
if ($turn >=$game->getNumOfPlayers()) {
    $turn = 0;
} elseif ($turn <0) {
    $turn = $game->getNumOfPlayers() - 1;
}
echo json_encode("The draw card is " . $drawnCard);
$_SESSION['turn']=$turn;
