<?php

require_once 'userFactory.php';
$employeeId = $_POST['ID'];
$stmt=$user->viewUser($employeeId);
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}



?>


