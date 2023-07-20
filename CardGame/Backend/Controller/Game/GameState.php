
<?php
require_once('../../routes.php');
require_once($gamePath);
require_once($deckPath);
session_start();
$game = $_SESSION['game'];
$turn = $_SESSION['turn'];
$currentPlayerCards = $game->viewInHandCards($turn);
$canPlay = $game->canPlay($turn);
$cardPile = $game->getCardPile();
$cardPileColor = $game->getDeck()->cardColor($cardPile);
$playerName = $game->getPlayer($turn)->getName();
$cardColor = array();
foreach ($currentPlayerCards as $cards) {
    $cardColor[] = $game->getDeck()->cardColor($cards);
}
$responseData = [
    'cards' => $currentPlayerCards,
    'cardPile' => $cardPile,
    'canPlay' => $canPlay,
    'playerName' => $playerName,
    'cardColors' => $cardColor,
    'cardPileColor' => $cardPileColor
];

echo json_encode($responseData);

?>