<?php
session_start();
include('connection.php');
require_once 'userFactory.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
   



   
    $stmt=$user->LoginUser($email,$password);
    $result = $stmt->get_result();
    echo "Query chal gai hai";

    if (mysqli_num_rows($result) == 0) {
        $_SESSION['message'] = "Login Failed. User not Found!";
        header('location: ../index.php?loginError=1');
        exit();
    } else {
        $row = mysqli_fetch_array($result);
    if (isset($_POST['remember'])) {
           
            setcookie("user", $username, time() + (86400 * 30));
            setcookie("pass", $password, time() + (86400 * 30));
        }
       
        $_SESSION['id'] = $row['id'];
        if ($row['IsAdmin'] == 1) {
            $_SESSION['IsAdmin'] = 1;
           
            header('location:../adminDashboard.php');
        } else {
            header('location: ../userDashboard.php');
        }
    

    }
} else {
    header('location: ../index.php');
    $_SESSION['message'] = "Please Login!";
}
?>
