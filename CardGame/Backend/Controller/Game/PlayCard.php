<?php
require_once('../../routes.php');
require_once($gamePath);
require_once($playerPath);
require_once($playTurnPath);
session_start();

if (!isset($_SESSION['game'])) {

    echo json_encode("session is not set ");
} else {
    $turn = $_SESSION['turn'];
    $game = $_SESSION['game'];
    if (isset($_POST['index'])) {
        $index = $_POST['index'];
        if (isset($_POST['color'])) {
            $color = $_POST['color'];
        } else {
            $color = null;
        }
        $playerTurn = new PlayTurn($turn, $index, $game, $color);
        $_SESSION['turn'] = $playerTurn->getTurn();
    }
}
