<?php 
require_once 'UserRepository.php';
$user=new UserRepository();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNumber = $_POST['phoneNumber'];
$employeeId = $_POST['EmployeeId'];


$stmt=$user->update($email,$password,$phoneNumber,$username,$employeeId);
$result=$stmt->affected_rows;
if($result==1)
{
    header('Location: ../adminDashboard.php?updateSuccess=true'); 

}
else
{
    header('Location: ../adminDashboard.php?updateSuccess=false'); 
}

?>