<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
    <link href="index.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <form id="updateEmployeeForm" action="CRUD.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="*******" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Phone Number" value="">
                    </div>
                    <input type="hidden" name="employeeId" id="employeeId" value="">
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch employee data
            var employeeId = <?php echo $_GET['id']; ?>;
            console.log(employeeId);
            fetchEmployeeData(employeeId);
        });
        function fetchEmployeeData(employeeId) {
            // Make an AJAX request to the CRUD PHP file
            $.ajax({
                url: 'crud.php',
                method: 'POST',
                data: { action: 'ViewId',ID:employeeId },
                success: function(response) {
                    // Update the table body with the received data
                   console.log("sUCCESSFULL");
                   console.log("I am going to display responce")
                   response=JSON.parse(response);
                   console.log(response.id)

                   console.log("Responce is displyed")
                   $('#username').val(response.name);
             $('#email').val(response.email);
            $('#password').val(response.password);
            $('#phoneNumber').val(response.phone_number);
                },
                error: function() {
                    console.log('Error occurred while fetching employee data.');
                }
            });
        }
        </script>
       


   
   
    



  
</body>
</html>
