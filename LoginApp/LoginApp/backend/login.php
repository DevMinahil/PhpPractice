<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['email'];
    $password = $_POST['password'];


   
    $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        $_SESSION['message'] = "Login Failed. User not Found!";
        header('location: ../index.php?loginError=1');
    } else {
        $row = mysqli_fetch_array($result);
    if (isset($_POST['remember'])) {
           
            setcookie("user", $username, time() + (86400 * 30));
            setcookie("pass", $password, time() + (86400 * 30));
        }
       
        $_SESSION['id'] = $row['id'];
        if ($row['IsAdmin'] == 1) {
            $_SESSION['IsAdmin'] = 1;
            echo $row;
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
