<?php
$string = "Hello, World! How are you today?";
$delimiter = " ,!?";

// Tokenize the string using strtok()
$token = strtok($string, $delimiter);

// Loop through the tokens
while ($token !== false) {
    echo $token . "\n";
    $token = strtok($delimiter);
}
?>
