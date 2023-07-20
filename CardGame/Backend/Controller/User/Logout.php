<?php
session_start();
unset($_SESSION['id']);
if (isset($_SESSION['IsAdmin'])) {

    unset($_SESSION["IsAdmin"]);
}
if (isset($_SESSION['game'])) {

    unset($_SESSION["game"]);
}
if (isset($_SESSION['turn'])) {

    unset($_SESSION['turn']);
}
header('Location: ../../../index.php');
