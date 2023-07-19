<?php

require_once 'UserFactory.php';
$new = $_POST['password'];
session_start();


if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    //need to check wetaher the old password is of user
    $stmt = $user->updatePassword($id, $new);
    if ($stmt->affected_rows > 0) {
        if (isset($_SESSION['IsAdmin'])) {
            header('Location: ../../../frontend/views/Admin/adminDashboard.php?updateSuccess=true');
        } else {
            header('Location: .../../../frontend/views/User/userDashboard.php?updateSuccess=true');
        }
    } else {
        if (isset($_SESSION['IsAdmin'])) {
            header('Location: ../../../frontend/views/Admin/adminDashboard.php?updateSuccess=false');

        } else {
            header('Location: ../../../frontend/views/User/userDashboard.php?updateSuccess=false');

        }
    }



}
