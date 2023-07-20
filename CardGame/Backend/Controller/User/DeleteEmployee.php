<?php
require_once 'UserFactory.php';
$employeeId = $_POST['employeeId'];
$stmt=$user->delete($employeeId);
$result=$stmt->affected_rows;
