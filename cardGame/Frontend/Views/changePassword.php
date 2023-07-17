<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="../Styles/signup.css" rel="stylesheet">
   <script src="../Scripts/validations"></script>
  

</head>

<body id="Change Passowrd">

    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-form">
                    <div class="main-div">
                        <div class="panel">
                            <form id="updatePasswordForm" action="../../Backend/Controllers/UserControllers/updatePassword.php" method="post" >
                                <div class="form-group">
                                    <input type="text" name="Current_Password" class="form-control" id="Current_Password" placeholder="Current Password" value="" required>
                                </div>
                                <div class="form-group">
                            <input type="text" value="" name="password" class="form-control" id="inputPassword"
                                placeholder="Password" required>

                            <small class="text-muted">Password must be at least 8 characters long and contain at least
                                one uppercase letter, one lowercase letter, one digit</small>
                            <br>
                            <small class="Weak" id="passwordStrength"></small>


                        </div>
                        <div class="form-group">
                            <input type="text" value="" name="confirm_password" class="form-control"
                                id="inputConfirmPassword" placeholder="Confirm Password" required>
                            <div class="invalid-feedback" id="confirmPasswordError"></div>
                        </div>
                    
                              
                                <input type="submit" class="btn btn-primary" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../Scripts/update.js"></script>



</body>

</html>