<?php



$add = "INSERT INTO users (name,email,phone,password,IsAdmin) VALUES (?,?,?,?,?)";
$update = "UPDATE users SET email = ?, password = ?, phone = ?, name = ? WHERE id = ?";
$delete = "DELETE FROM users WHERE id = ?";
$viewId = "SELECT * FROM users WHERE id = ?";
$view = "SELECT * FROM users WHERE IsAdmin = 0";
$updatePassword = "UPDATE users SET password = ? WHERE id = ?";
$getUserByEmail = "SELECT * FROM users WHERE email = ?";
$getUserByPhone = " SELECT * FROM users WHERE phone = ?";
$login = "SELECT * FROM users WHERE email = ? AND password = ?";

?>