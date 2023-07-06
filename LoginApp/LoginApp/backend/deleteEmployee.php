<?php 
require_once 'UserRepository.php';

$employeeId = $_POST['employeeId'];
$user=new UserRepository();

$stmt=$user->delete($employeeId);
$result=$stmt->affected_rows;


?>