<?php

require_once('../../game/Game.php');
session_start();
$turn=$_SESSION['turn'];
$game = $_SESSION['game'];
echo "In update turn :";
