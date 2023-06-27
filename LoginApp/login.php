<?php
session_start();
include('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform validation and data sanitization if needed

    // Check if the provided username and password match the records in the database
    $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        $_SESSION['message'] = "Login Failed. User not Found!";
        header('location: index.html?loginError=1');
    } else {
        $row = mysqli_fetch_array($result);

        if (isset($_POST['remember'])) {
            // Set up cookie
            setcookie("user", $row['user_name'], time() + (86400 * 30));
            setcookie("pass", $row['user_password'], time() + (86400 * 30));
        }

        $_SESSION['id'] = $row['user_id'];
        header('location: dashboard.html');
    }
} else {
    header('location: index.html');
    $_SESSION['message'] = "Please Login!";
}
?>
