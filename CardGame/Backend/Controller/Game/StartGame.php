<?php
session_start();
require_once('../../Helper/Game.php');
$noOfPlayers = $_POST['noOfPlayers'];
$playerNames = $_POST['playerNames'];
$game =Game::getInstance(1,$noOfPlayers,$playerNames);
$game->distributeCards();
$_SESSION['game'] = $game;
$_SESSION['turn'] = 0;
echo json_encode(true);
