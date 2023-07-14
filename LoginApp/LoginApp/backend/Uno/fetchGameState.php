
<?php
require_once('index.php');
require_once('deck.php');

session_start();


//unset($_SESSION['game']);

if (!isset($_SESSION['game'])) {
    $numOfPlayers = 2; // Number of players

    $game = new Game(1, $numOfPlayers, ["Minahil", "Shahid"]);

    $game->distributeCards();

    $_SESSION['game'] = $game;
    $_SESSION['turn'] = 0;
} else {
    $game = $_SESSION['game'];
    $turn = $_SESSION['turn'];

}


$currentPlayerCards = $game->viewInHandCards($turn);
$canPlay = $game->canPlay($turn);

$cardPile= $game->getCardPile();
$cardPileColor=$game->getDeck()->cardColor($cardPile);
$playerName=$game->getPlayer($turn)->getName();
$cardColor=array();
foreach($currentPlayerCards as $cards)
{
   $cardColor[]= $game->getDeck()->cardColor($cards);
}
if(!$canPlay)
{ $drawnCard = $game->drawFromDeck(1);
 $game->getPlayer($turn)->addCards($drawnCard);
 $turn = $turn + $game->getDirection();
 if ($turn == $game->getNumOfPlayers()) {
     $turn = 0;
 } elseif ($turn < 0) {
     $turn = $game->getNumOfPlayers() - 1;
 }
 $_SESSION['turn']=$turn;



}

$responseData = [
    'cards' => $currentPlayerCards,
    'cardPile' => $cardPile,
    'canPlay' => $canPlay,
    'playerName'=>$playerName,
    'cardColors'=>$cardColor,
    'cardPileColor'=>$cardPileColor

];

echo json_encode($responseData);

?>