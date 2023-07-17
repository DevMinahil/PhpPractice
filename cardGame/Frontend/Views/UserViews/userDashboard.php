<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../Scripts/update.js"></script>
    <link rel="stylesheet" href="../../Styles/user.css">
</head>

<style>



</style>

<body style="background-image: url('../images/UNO_Logo.svg');">
<?php
session_start();
if(isset($_SESSION['game']))
{
    unset($_SESSION['game']);
    unset($_SESSION['turn']);
}

?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0ad4e;">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active mr-5 ml-5">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active mr-5 ml-5">
                    <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active mr-5 ml-5">
                    <a class="nav-link" href="#">Contact Us<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item active mr-5 ml-5">
                <a class="nav-link" href="./backend/logout.php">Logout<span class="sr-only">(current)</span></a>
            </li> -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../../Backend/Controllers/UserControllers/logout.php">Logout<span class="sr-only">(current)</span></a>

                </li>
                <ul>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fa fa-cog"></i></button>
                        <div class="dropdown-content">
                            <a href="../changePassword.php">Change Password</a>

                        </div>
                    </div>

                </ul>
            </ul>
        </div>
    </nav>


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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="btn-group-vertical text-center">
            <button class="btn btn-secondary-lg custom_button">
                <a href="../GameViews/gameForm.html">Play</a>
            </button>

            <button type="button" class="btn btn-secondary-lg custom_button">Rules</button>
        </div>


    </div>



</body>

</html>