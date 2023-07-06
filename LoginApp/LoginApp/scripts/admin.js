$(document).ready(function() {
   
    fetchEmployeeData();
  
  
   
  });

 
  



  
var employees = [];

var pageSize = 5; // Number of records per page
var currentPage = 1; // Current page

// Function to display a specific page of records
function displayPage(page) {
  $('#employeeTableBody').empty(); 

  var startIndex = (page - 1) * pageSize;
  var endIndex = startIndex + pageSize;
  var displayedEmployees = employees.slice(startIndex, endIndex);

  for (var i = 0; i < displayedEmployees.length; i++) {
    var employee = displayedEmployees[i];

    // Create the table row and append it to the table body
    var row = $('<tr></tr>');
    row.append('<th scope="row">' + employee.id + '</th>');
    row.append('<td>' + employee.name + '</td>');
    row.append('<td>' + employee.email + '</td>');
    row.append('<td>' + employee.phone + '</td>');
    row.append('<td>' + employee.password + '</td>');
    row.append('<td><button class="btn mr-3" style="background-color: #f0ad4e;"><a href="update.html?id=' + employee.id + '" style="color: white;text-decoration: none;">Update</a></button><button class="btn btn-danger" onclick="deleteEmployee(' + employee.id + ')">Delete</button></td>');

    // Append the row to the table body
    $('#employeeTableBody').append(row);
  }

  // Update the pagination buttons
  updatePagination();
}

// Function to update pagination buttons
function updatePagination() {
  var totalPages = Math.ceil(employees.length / pageSize);
  var previousBtn = $('#previousBtn');
  var nextBtn = $('#nextBtn');

  // Enable/disable previous button based on current page
  if (currentPage > 1) {
    previousBtn.prop('disabled', false);
  } else {
    previousBtn.prop('disabled', true);
  }

  // Enable/disable next button based on current page
  if (currentPage < totalPages) {
    nextBtn.prop('disabled', false);
  } else {
    nextBtn.prop('disabled', true);
  }
}

// Function to navigate to the previous page
function goToPreviousPage() {
  if (currentPage > 1) {
    currentPage--;
    displayPage(currentPage);
  }
}

// Function to navigate to the next page
function goToNextPage() {
  var totalPages = Math.ceil(employees.length / pageSize);
  if (currentPage < totalPages) {
    currentPage++;
    displayPage(currentPage);
  }
}

// Function to fetch employee data using AJAX request
function fetchEmployeeData() {
  $.ajax({
    url: '/backend/fetchEmployees.php',
    method: 'GET',
    success: function(response) {
      console.log(response);

      // Parse the JSON response into an array of employee objects
      employees = JSON.parse(response);

      // Initial display
      displayPage(currentPage);
    },
     error: function(xhr, status, error) {
      console.error('AJAX request error:', status, error);
    }
  });
}

// Fetch employee data on page load


function deleteEmployee(employeeId) {
  $('#deleteModalLabel').text("Caution!");
  $('#deleteModalMessage').text('Do u really want to to delete');
  $('#Yes').text('Yes');
  $('#No').text('No');
 
 //         // Show the delete modal
    $('#deleteModal').modal('show');
    $("#No").show();
    $('#Yes').click(function(){
     // Make an AJAX request to the CRUD PHP file
    $.ajax({
        url: 'backend/deleteEmployee.php',
        method: 'POST',
        data: {employeeId: employeeId },
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
    
    });


    // 
}