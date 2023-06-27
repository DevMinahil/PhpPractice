<?php
include('Connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $action = $_POST['action'];

    // Handle different CRUD operations based on the action
    switch ($action) {
        case 'add':
            echo "I am in add action";
            $username = $_POST['username'];
            echo $username;
            $email = $_POST['email'];
            $password = $_POST['Password'];
            $phoneNumber = $_POST['PhoneNumber'];

            // // Prepare the SQL query to insert employee data into the table
            $sql = "INSERT INTO employees (name, email, password, phone_number) VALUES ('$username', '$email', '$password', '$phoneNumber')";
            break;

        case 'edit':
            $employeeId = $_POST['employeeId'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['Password'];
            $phoneNumber = $_POST['PhoneNumber'];

            // Prepare the SQL query to update employee data in the table
            $sql = "UPDATE employees SET name = '$username', email = '$email', password = '$password', phone_number = '$phoneNumber' WHERE id = '$employeeId'";
            break;

        case 'delete':
            $employeeId = $_POST['employeeId'];

            // Prepare the SQL query to delete an employee from the table
            $sql = "DELETE FROM employees WHERE id = '$employeeId'";
            break;
        case "ViewId":
            
            if (isset($_POST['ID'])) {
                $employeeId = $_POST['ID'];
            }
            $sql = "SELECT * FROM employees WHERE id = '$employeeId'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                 $row = mysqli_fetch_assoc($result);

                    // Prepare the response data as an array
                    

                    // Return the response as JSON
                    echo json_encode($row);
            }



            break;
            

           
        case 'view':
              
                $sql = "SELECT * FROM employees";
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                    // Create a variable to hold the HTML table rows
                    $tableRows = '';
            
                    // Loop through the query results and append employee data to the table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tableRows .= '<tr>';
                        $tableRows .= '<th scope="row">' . $row['id'] . '</th>';
                        $tableRows .= '<td>' . $row['name'] . '</td>';
                        $tableRows .= '<td>' . $row['email'] . '</td>';
                        $tableRows .= '<td>' . $row['phone_number'] . '</td>';
           $tableRows .= '<td>'.'<button class="btn btn-primary mr-3"><a href="update.php?id='.$row['id'].'"style="color: white; text-decoration: none";>Update</a></button>'
                         . '<button class="btn btn-danger" onclick="deleteEmployee('.$row['id'].')">Delete</button>'  . '</td>';
                       
                        $tableRows .= '</tr>';
                    }
            
                    // Return the HTML table rows as the response
                    echo $tableRows;
                } else {
                    // Return a message when no employees are found
                    echo '<tr><td colspan="5">No employees found.</td></tr>';
                }
            
              

        default:
            // Invalid action
            echo 'Invalid action.';
            exit;
    }

    // Execute the query
    if (mysqli_query($conn, $sql)) {
      
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
