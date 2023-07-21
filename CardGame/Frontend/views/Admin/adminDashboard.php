<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="../../modals/updateSucess"></script>
        <link rel="stylesheet" href="../../styles/admin.css">
        <title></title>
    </head>
<!-- <?php
// session_start();
//Check if the user ID session variable is set
// if (!isset($_SESSION['id'])) {
//     // Redirect the user to the login page or display an error message
//     header('Location: ../../../index.php');
//     ; // Stop further execution of the script
// } elseif (!isset($_SESSION['IsAdmin'])) {
//     header('Location:../User/userDashboard.php');
// }
// ?> -->
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0ad4e;">
            <a class="navbar-brand" href="#">Navbar</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mr-5 ml-5">
                        <a class="nav-link" href="#">
                            Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active mr-5 ml-5">
                        <a class="nav-link" href="#">
                            About
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active mr-5 ml-5">
                        <a class="nav-link" href="#">
                            Contact Us
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../../Backend/Controller/User/Logout.php">
                            Logout
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <ul>
                        <div class="dropdown">
                            <button class="dropbtn">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-content">
                                <a href="../changePassword.php">Change Password</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>
            <table class="table">
                <div
                    class="modal fade"
                    id="updateStatusModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="updateStatusModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateStatusModalLabel">Update Status</h5>
                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="updateStatusModalBody"></div>
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
                <tbody id="employeeTableBody"></tbody>
            </table>
            <div id="pagination">
                <button id="previousBtn" onclick="goToPreviousPage()">&#8249;</button>
                <button id="nextBtn" onclick="goToNextPage()">&#8250;</button>
            </div>
            <div
                class="modal fade"
                id="deleteModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="deleteModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">User Deleted</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="deleteModalMessage"></p>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                id="Yes"
                                data-dismiss="modal"
                            >Close</button>
                            <button
                                type="button"
                                class="btn btn-secondary"
                                id="No"
                                data-dismiss="modal"
                                aria-hidden="true"
                            ></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- jQuery -->
            <script src="../../scripts/admin"></script>
        </body>
    </html>
