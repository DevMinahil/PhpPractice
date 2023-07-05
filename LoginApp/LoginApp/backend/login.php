<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Perform validation and data sanitization if needed
    echo $username.PHP_EOL;
    echo $password.PHP_EOL;

    // Check if the provided username and password match the records in the database
    $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        $_SESSION['message'] = "Login Failed. User not Found!";
        header('location: ../index.html?loginError=1');
    } else {
        $row = mysqli_fetch_array($result);
       

        // Store user ID in session
     

        if (isset($_POST['remember'])) {
            // Set up cookie
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
    header('location: ../index.html');
    $_SESSION['message'] = "Please Login!";
}
?>
