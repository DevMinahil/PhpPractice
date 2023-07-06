<?php

require_once 'UserRepository.php';
$user=new UserRepository();

if (isset($_POST['ID'])) {
    $employeeId = $_POST['ID'];
    $stmt->$user->ViewId($employeeId);
    $result = $stmt->get_result(); 
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}
if (mysqli_query($conn, $sql)) {

} else {
    echo 'Error: ' . mysqli_error($conn);
}

?>


