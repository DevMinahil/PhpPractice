<!DOCTYPE html>
<html>
<head>
<title>Login Using Cookie with Logout</title>
<link href="styles/index.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="scripts/index.js"></script> 
<script> src="scripts/showpassword.js"</script>
<?php
session_start();

// Check if the user ID session variable is set
if (isset($_SESSION['id'])&& $_SESSION['IsAdmin']){
    // Redirect the user to the login page or display an error message
    header('Location: ../adminDashboard.php');
   ; // Stop further execution of the script
}
elseif(isset($_SESSION['id']) &&!isset($_SESSION['IsAdmin']))
{
  header('Location: ../userDashboard.php');
    
}

?>
</head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">PHP Mysql Login using Cookie and Session</h1>
<div class="modal" id="signupSuccessModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Signup Success</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Success message will be displayed here dynamically -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Add this code where you want the modal to appear -->
<div class="modal" id="loginErrorModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login Error</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Login failed. User not found!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<div class="login-form">
    <div class="main-div">
        <div class="panel">
            <h2>Admin Login</h2>
            <p>Please enter your username and password</p>
        </div>
        <form id="Login" method="POST" action="backend/login.php">
            <div class="form-group">
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
              
            </div>
            <div class="form-group" style="text-align:left;">
                <label><input type="checkbox" name="showPassword" id="showPassword"> Show password</label>
            </div>
            
            <div class="form-group" style="text-align:left;">
                <label><input type="checkbox" name="remember"> Remember me </label>
            </div>
            <div class="forgot">
                <a href="#">Forgot password?</a>
            </div>
            <div class="forgot">
                <a href="signup.html">Sign Up</a>
            </div>
            <input type="submit" class="btn btn-primary" value="Login" name="login">
        </form>
        <p class="botto-text"> by Cairocoders</p>
    </div>
</div>
</div>
</body>
</html>