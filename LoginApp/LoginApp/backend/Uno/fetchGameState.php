
<?php
require_once('index.php');

session_start();



if (!isset($_SESSION['game'])) {
    $numOfPlayers = 2; // Number of players

    $game = new Game(1, $numOfPlayers, ["Minahil", "Shahid"]);

    $game->distributeCards();

    $_SESSION['game'] = $game;
    $_SESSION['turn'] = 1;
} else {
    $game = $_SESSION['game'];
    $turn = $_SESSION['turn'];

}


$currentPlayerCards = $game->viewInHandCards($turn - 1);
$canPlay = $game->canPlay($turn - 1);
$cardPile= $game->getCardPile();

$responseData = [
    'cards' => $currentPlayerCards,
    'cardPile' => $cardPile,
    'canPlay' => $canPlay
];

echo json_encode($responseData);

?>