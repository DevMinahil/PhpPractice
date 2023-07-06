<?php
include('connection.php');
include('models/userQueries.php');
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $action = $_POST['action'];

    // Handle different CRUD operations based on the action
    switch ($action) {
        case 'add':
            echo $add;
            
       
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phoneNumber = $_POST['phoneNumber'];
            // Prepare the SQL query to insert employee data into the table
            $sql = "INSERT INTO users (name, email, password, phone) VALUES ('$username', '$email', '$password', '$phoneNumber')";
            mysqli_query($conn, $sql);
            break;

        case 'edit':
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phoneNumber = $_POST['phoneNumber'];
            $employeeId = $_POST['EmployeeId'];
           

            // Prepare the SQL query to update employee data in the table
            $sql = "UPDATE users SET email = '$email', password = '$password', phone = '$phoneNumber', name = '$username' WHERE id = '$employeeId'";
            if (mysqli_query($conn, $sql)) {
                // User updated successfully
                header('Location: ../adminDashboard.php?updateSuccess=true');  // Redirect to adminDashboard with a query parameter indicating success
                exit;
            } else {
                // Error occurred while updating user
                header('Location: ../adminDashboard.php?updateSuccess=false');  // Redirect to adminDashboard with a query parameter indicating error
            }
            break;

        case 'delete':
            $employeeId = $_POST['employeeId'];
            // Prepare the SQL query to delete an employee from the table
            $sql = "DELETE FROM users WHERE id = '$employeeId'";
            if (mysqli_query($conn, $sql)) {

            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
            break;
        case 'ViewId':
            if (isset($_POST['ID'])) {
                $employeeId = $_POST['ID'];
                $sql = "SELECT * FROM users WHERE id = '$employeeId'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo json_encode($row);
                }
            }
            if (mysqli_query($conn, $sql)) {

            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
            break;

        case 'view':
            $sql = "SELECT * FROM users WHERE IsAdmin = 0";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Create an array to hold the employee data
                $employees = array();
                // Loop through the query results and append employee data to the array
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["IsAdmin"] != 1) {
                        $employee = array(
                            'id' => $row['id'],
                            'name' => $row['name'],
                            'email' => $row['email'],
                            'phone' => $row['phone'],
                            'password' => $row['password']
                        );

                        // Append the employee data to the array
                        $employees[] = $employee;
                    }
                }
                // Convert the employee array to JSON format
                $jsonResponse = json_encode($employees);

                // Return the JSON response
                echo $jsonResponse;
            } else {
                // Return an empty array as JSON when no employees are found
                echo json_encode(array());
            }
            break;

        default:
            // Invalid action
            echo 'Invalid action.';
            exit;
    }
    // Close the database connection
    mysqli_close($conn);
}
