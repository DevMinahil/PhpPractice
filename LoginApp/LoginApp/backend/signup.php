<?php
// signup.php

include('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Retrieve form data
    $user = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $is_admin = isset($_POST['isAdminCheckbox']) ? 1 : 0; 
    
    echo "Sign up" . PHP_EOL;
    echo "Name: " . $user . PHP_EOL;
    echo "Password: " . $password . PHP_EOL;
    echo "Phone Number: " . $phone . PHP_EOL;
    echo "Email: " . $email . PHP_EOL;
    echo "As Admin: " . ($is_admin ? 1: 0) . PHP_EOL;

    $query = "SELECT * FROM users WHERE email = '$email'";
}
// // Execute the query and check if any rows are returned
// // You'll need to use the appropriate method to execute the query depending on the database library you're using
// // Here's an example using mysqli
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {

    header('Location: ../signup.html?signUpError=1');
    exit();
 }
    $phoneQuery = "SELECT * FROM users WHERE phone = '$phone'";
    $phoneResult = mysqli_query($conn, $phoneQuery);
    if ($phoneResult && mysqli_num_rows($phoneResult) > 0) {
        // Phone number already exists, display an error message
        
        // Store the error message in a session variable
       

       // 2 means phone already exist
        header('Location: ../signup.html?signUpError=2');
        exit();
    }



   

//     //Insert the signup data into the database
   $sql = "INSERT INTO users (name,email,phone,password,IsAdmin) VALUES ('$user', '$email','$phone','$password','$is_admin')";
   // Execute the query
  if (mysqli_query($conn, $sql)) {
        echo "Signup successful!";
        $successMessage = "Signup successful!";

        // Pass the success message to the main page via URL parameter
        $url = "../index.php?successMessage=" . urlencode($successMessage);

        // Redirect the user to the main page with the success message
        header("Location: " . $url);
    } else {
        echo "Error: " . mysqli_error($conn);
    }



// Close the database connection
mysqli_close($conn);
