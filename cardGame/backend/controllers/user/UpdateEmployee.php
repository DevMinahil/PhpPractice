<?php

require_once 'UserFactory.php';
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNumber = $_POST['phone'];
$employeeId = $_POST['EmployeeId'];

$stmt=$user->update($email, $password, $phoneNumber, $username, $employeeId);
$result=$stmt->affected_rows;
if($result==1) {
    header('Location: .../../../frontend/views/Admin/adminDashboard.php?updateSuccess=true');

} else {
    header('Location:../../../frontend/views/Admin/adminDashboard.php?updateSuccess=false');
}
