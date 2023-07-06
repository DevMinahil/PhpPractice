<?php


$add = "INSERT INTO users (name, email, password, phone) VALUES ('?', '?', '?', '?')";
$update = "UPDATE users SET email = ?, password = ?, phone = ?, name = ? WHERE id = ?";
$delete="DELETE FROM users WHERE id = ?";
$viewId="SELECT * FROM users WHERE id = '?'";
$view="SELECT * FROM users WHERE IsAdmin = 0";
$updatePassword="UPDATE users SET password = ? WHERE id = ?"

?>