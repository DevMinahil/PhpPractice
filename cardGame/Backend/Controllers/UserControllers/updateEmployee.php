<?php

require_once './userFactory.php';
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNumber = $_POST['phone'];
$employeeId = $_POST['EmployeeId'];

$stmt=$user->update($email, $password, $phoneNumber, $username, $employeeId);
$result=$stmt->affected_rows;
if($result==1) {
    header('Location: ../../../Frontend/Views/AdminViews/adminDashboard.php?updateSuccess=true');

} else {
    header('Location: ../../../Frontend/Views/AdminViews/adminDashboard.php?updateSuccess=false');
}
