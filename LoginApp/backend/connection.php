<?php
$host = 'localhost';
$dbname = 'Users';
$username = 'root';
$password = '123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to MySQL successfully";
} catch(PDOException $e) {
    echo "Failed to connect to MySQL: " . $e->getMessage();
}
?>
