<?php
// signup.php

include('Connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "I am in Sign up function";
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo "Sign up";
    echo "User name :".$username.PHP_EOL;
    echo "Password :".$password.PHP_EOL;


   

    // Insert the signup data into the database
     $sql = "INSERT INTO users (email, password) VALUES ('$username', '$password')";
    // Execute the query
  if (mysqli_query($conn, $sql)) {
        echo "Signup successful!";
        $successMessage = "Signup successful!";

        // Pass the success message to the main page via URL parameter
        $url = "index.php?successMessage=" . urlencode($successMessage);

        // Redirect the user to the main page with the success message
        header("Location: " . $url);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
