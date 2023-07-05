$(document).ready(function() {
    // Fetch and display employee data
    fetchEmployeeData();
  
    // admin.js
   

    // Your existing code
  
   
  });

 
  


// function fetchEmployeeData() {
//     console.log("hello")
//     // Make an AJAX request to the CRUD PHP file
//     $.ajax({
//         url: '/backend/crud.php',
//         method: 'POST',
//         data: { action: 'view' },
//         success: function(response) {
//             console.log(response);
          

//             // Parse the JSON response into an array of employee objects
//            var employees = JSON.parse(response);

//             // Clear the table body
//             $('#employeeTableBody').empty();
         
//             // // Loop through the employees array and populate the table rows
//             for (var i = 0; i < employees.length; i++) {
//                 var employee = employees[i];

//                 // Create the table row and append it to the table body
//                 var row = $('<tr></tr>');
//                 row.append('<th scope="row">' + employee.id + '</th>');
//                 row.append('<td>' + employee.name + '</td>');
//                 row.append('<td>' + employee.email + '</td>');
//                 row.append('<td>' + employee.phone + '</td>');
//                 row.append('<td>' + employee.password + '</td>');
//                 row.append('<td><button class="btn mr-3" style="background-color: #f0ad4e;"><a href="update.html?id=' + employee.id + '" style="color: white;text-decoration: none;">Update</a></button><button class="btn btn-danger" onclick="deleteEmployee(' + employee.id + ')">Delete</button></td>');

//                 // Append the row to the table body
//                 $('#employeeTableBody').append(row);
//             }
//         },
//         error: function() {
//             console.log('Error occurred while fetching employee data.');
//         }
//     });
// }
// var employees = [
//     { id: 1, name: "John Doe", email: "john@example.com", phone: "1234567890", password: "password1" },
//   { id: 2, name: "Jane Smith", email: "jane@example.com", phone: "0987654321", password: "password2" },
//   { id: 3, name: "Mark Johnson", email: "mark@example.com", phone: "9876543210", password: "password3" },
//   { id: 4, name: "Emily Davis", email: "emily@example.com", phone: "0123456789", password: "password4" },
//   { id: 5, name: "Michael Brown", email: "michael@example.com", phone: "9876543210", password: "password5" },
//   { id: 6, name: "Olivia Wilson", email: "olivia@example.com", phone: "1234567890", password: "password6" },
//   { id: 7, name: "Daniel Taylor", email: "daniel@example.com", phone: "0123456789", password: "password7" },
//   { id: 8, name: "Sophia Anderson", email: "sophia@example.com", phone: "9876543210", password: "password8" },
//   { id: 9, name: "James Thomas", email: "james@example.com", phone: "1234567890", password: "password9" },
//   { id: 10, name: "Ava Martin", email: "ava@example.com", phone: "0123456789", password: "password10" },
//   { id: 11, name: "David Garcia", email: "david@example.com", phone: "9876543210", password: "password11" },
//   { id: 12, name: "Emma Martinez", email: "emma@example.com", phone: "1234567890", password: "password12" },
//   { id: 13, name: "Joseph Hernandez", email: "joseph@example.com", phone: "0123456789", password: "password13" },
//   { id: 14, name: "Mia Lopez", email: "mia@example.com", phone: "9876543210", password: "password14" },
//   { id: 15, name: "Alexander Gonzalez", email: "alexander@example.com", phone: "1234567890", password: "password15" }
// ];
  
  
//   var pageSize = 5; // Number of records per page
//   var currentPage = 1; // Current page
  
//   // Function to display a specific page of records
//   function displayPage(page) {
//     $('#employeeTableBody').empty(); // Clear the table body
  
//     var startIndex = (page - 1) * pageSize;
//     var endIndex = startIndex + pageSize;
//     var displayedEmployees = employees.slice(startIndex, endIndex);
  
//     for (var i = 0; i < displayedEmployees.length; i++) {
//       var employee = displayedEmployees[i];
  
//       // Create the table row and append it to the table body
//       var row = $('<tr></tr>');
//       row.append('<th scope="row">' + employee.id + '</th>');
//       row.append('<td>' + employee.name + '</td>');
//       row.append('<td>' + employee.email + '</td>');
//       row.append('<td>' + employee.phone + '</td>');
//       row.append('<td>' + employee.password + '</td>');
//       row.append('<td><button class="btn mr-3" style="background-color: #f0ad4e;"><a href="update.html?id=' + employee.id + '" style="color: white;text-decoration: none;">Update</a></button><button class="btn btn-danger" onclick="deleteEmployee(' + employee.id + ')">Delete</button></td>');
  
//       // Append the row to the table body
//       $('#employeeTableBody').append(row);
//     }
  
//     // Update the pagination buttons
//     updatePagination();
//   }
  
//   // Function to update pagination buttons
//   function updatePagination() {
//     var totalPages = Math.ceil(employees.length / pageSize);
//     var previousBtn = $('#previousBtn');
//     var nextBtn = $('#nextBtn');
  
//     // Enable/disable previous button based on current page
//     if (currentPage > 1) {
//       previousBtn.prop('disabled', false);
//     } else {
//       previousBtn.prop('disabled', true);
//     }
  
//     // Enable/disable next button based on current page
//     if (currentPage < totalPages) {
//       nextBtn.prop('disabled', false);
//     } else {
//       nextBtn.prop('disabled', true);
//     }
//   }
  
//   // Function to navigate to the previous page
//   function goToPreviousPage() {
//     if (currentPage > 1) {
//       currentPage--;
//       displayPage(currentPage);
//     }
//   }
  
//   // Function to navigate to the next page
//   function goToNextPage() {
//     var totalPages = Math.ceil(employees.length / pageSize);
//     if (currentPage < totalPages) {
//       currentPage++;
//       displayPage(currentPage);
//     }
//   }
  
//   // Initial display
//   displayPage(currentPage);
  
var employees = [];

var pageSize = 5; // Number of records per page
var currentPage = 1; // Current page

// Function to display a specific page of records
function displayPage(page) {
  $('#employeeTableBody').empty(); // Clear the table body

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
    url: '/backend/crud.php',
    method: 'POST',
    data: { action: 'view' },
    success: function(response) {
      console.log(response);

      // Parse the JSON response into an array of employee objects
      employees = JSON.parse(response);

      // Initial display
      displayPage(currentPage);
    },
    error: function() {
      console.log('Error occurred while fetching employee data.');
    }
  });
}

// Fetch employee data on page load


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