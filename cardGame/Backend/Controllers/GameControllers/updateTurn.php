<?php

require_once('../../Game/Game.php');
session_start();
$turn=$_SESSION['turn'];
$game = $_SESSION['game'];
echo "In update turn :";
