<?php

session_start();
unset($_SESSION['id']);
if(isset($_SESSION['IsAdmin'])) {

    unset($_SESSION["IsAdmin"]);


}

header('Location: ../../../index.php');
