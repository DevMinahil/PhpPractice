<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="errorsModals/updateSucess.js"></script>
  <link rel="stylesheet" href="styles/admin.css">

  <title></title>
  
</head>
<?php
session_start();

// Check if the user ID session variable is set
if (!isset($_SESSION['id']) ) {
    // Redirect the user to the login page or display an error message
    header('Location: ../index.html');
   ; // Stop further execution of the script
}
elseif(!isset($_SESSION['IsAdmin']))
{
  header('Location: ../userDashboard.php');
    
}

?>

<body>

  <table class="table">
    <div class="modal fade" id="updateStatusModal" tabindex="-1" role="dialog" aria-labelledby="updateStatusModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateStatusModalLabel">Update Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="updateStatusModalBody">
            <!-- Content will be dynamically changed here -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <h2 style="text-align: center; margin-bottom: 3%;margin-top: 3%;">Employees Table</h2>

    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile Number</th>
        <th scope="col">Password</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="employeeTableBody">

    </tbody>
  </table>
  <div id="pagination">
    <button id="previousBtn" onclick="goToPreviousPage()">&#8249;</button>
    <button id="nextBtn" onclick="goToNextPage()">&#8250;</button>
  </div>


  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">User Deleted</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="deleteModalMessage"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- jQuery -->

  <script src="scripts/admin.js">


  </script>
  <script> </script>


</body>

</html>