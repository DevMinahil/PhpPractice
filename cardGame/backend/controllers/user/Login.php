<?php

session_start();
include('../../config/connection.php');
require_once 'UserFactory.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $user->LoginUser($email, $password);
    $result = $stmt->get_result();


    if (mysqli_num_rows($result) == 0) {
        $_SESSION['message'] = "Login Failed. User not Found!";
        header('location: ../../../index.php?loginError=1');
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

            header('location:../../../frontend/views/Admin/adminDashboard.php');

        } else {
            header('location: ../../../frontend/views/User/userDashboard.php');
        }


    }
} else {
    header('location: ./index.php');
    $_SESSION['message'] = "Please Login!";
}
