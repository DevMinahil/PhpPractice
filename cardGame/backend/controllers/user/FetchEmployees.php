<?php

require_once 'UserFactory.php';
$employees = [];
$stmt = $user->viewAll();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["IsAdmin"] != 1) {
            $employee = [
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'password' => $row['password']
            ];

            $employees[] = $employee;
        }
    }
}

echo json_encode($employees);
