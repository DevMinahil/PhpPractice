<?php

require_once 'UserRepository.php';
$user=new UserRepository();
$new = $_POST['password'];
session_start();


if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];

    $stmt=$user->updatePassword($id,$new);
    if($stmt->affected_rows>0)
    {
        if(isset($_SESSION['IsAdmin']))
        {
        header('Location: ../adminDashboard.php?updateSuccess=true'); 
        }
        else
        {
            header('Location: ../userDashboard.php?updateSuccess=true');
        }
    }
    else
    {
        if(isset($_SESSION['IsAdmin']))
        {
        header('Location: ../adminDashboard.php?updateSuccess=false'); 
        }
        else
        {
            header('Location: ../userDashboard.php?updateSuccess=false');
        }
    }



}




?>