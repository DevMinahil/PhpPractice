$(document).ready(function() {
    // Fetch and display employee data
    fetchEmployeeData();


    // admin.js
    const urlParams = new URLSearchParams(window.location.search);
    const updateSuccess = urlParams.get('updateSuccess');
    console.log(updateSuccess);
  
    if (updateSuccess === 'true') {
    
      const Message = "The Data is upadated Sucessfully";
      // Set the error message in the modal
      document.getElementById('updateStatusModalBody').textContent = Message;
      $('#updateStatusModal').modal('show');

    }
    if(updateSuccess === 'false')
    {const Message = "There is an error in updating the data";
    // Set the error message in the modal
    document.getElementById('updateStatusModalBody').textContent = Message;
    $('#updateStatusModal').modal('show');
     
    }
$
    // Your existing code
  
   
  });

 
  


function fetchEmployeeData() {
    console.log("hello")
    // Make an AJAX request to the CRUD PHP file
    $.ajax({
        url: '/backend/crud.php',
        method: 'POST',
        data: { action: 'view' },
        success: function(response) {
            console.log(response);
          

            // Parse the JSON response into an array of employee objects
           var employees = JSON.parse(response);

            // Clear the table body
            $('#employeeTableBody').empty();
         
            // // Loop through the employees array and populate the table rows
            for (var i = 0; i < employees.length; i++) {
                var employee = employees[i];

                // Create the table row and append it to the table body
                var row = $('<tr></tr>');
                row.append('<th scope="row">' + employee.id + '</th>');
                row.append('<td>' + employee.name + '</td>');
                row.append('<td>' + employee.email + '</td>');
                row.append('<td>' + employee.phone + '</td>');
                row.append('<td>' + employee.password + '</td>');
                row.append('<td><button class="btn btn-primary mr-3"><a href="update.html?id=' + employee.id + '" style="color: white; text-decoration: none">Update</a></button><button class="btn btn-danger" onclick="deleteEmployee(' + employee.id + ')">Delete</button></td>');

                // Append the row to the table body
                $('#employeeTableBody').append(row);
            }
        },
        error: function() {
            console.log('Error occurred while fetching employee data.');
        }
    });
}

function deleteEmployee(employeeId) {
    // Make an AJAX request to the CRUD PHP file
    $.ajax({
        url: 'backend/crud.php',
        method: 'POST',
        data: { action: 'delete', employeeId: employeeId },
        success: function (response) {
            // Display the success modal
            $('#deleteModalMessage').text('The user has been successfully deleted.');

            // Show the delete modal
            $('#deleteModal').modal('show');

            // Refresh the employee data after deletion
            fetchEmployeeData();
        },
        error: function () {
            // Display the error modal
            $('#deleteModalMessage').text('An error occurred while deleting the user. Please try again.');

            // Show the delete modal
            $('#deleteModal').modal('show');
            console.log('Error occurred while deleting the employee.');
        }
    });
}