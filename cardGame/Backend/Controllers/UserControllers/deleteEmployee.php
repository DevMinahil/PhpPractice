<?php

require_once './userFactory.php';
$employeeId = $_POST['employeeId'];
$stmt=$user->delete($employeeId);
$result=$stmt->affected_rows;
