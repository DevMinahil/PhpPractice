 $(document).ready(function() {
            // Fetch employee data
            var urlParams = new URLSearchParams(window.location.search);
            var employeeId = urlParams.get('id');
            console.log(employeeId);
            fetchEmployeeData(employeeId);
        });
        function fetchEmployeeData(employeeId) {
            // Make an AJAX request to the CRUD PHP file
            $.ajax({
                url: './backend/crud.php',
                method: 'POST',
                data: { action: 'ViewId',ID:employeeId },
                success: function(response) {
                    // Update the table body with the received data
                  
                   response=JSON.parse(response);
                

                   console.log("Responce is displyed");
                   $('#username').val(response.name);
                   $("#EmployeeId").val(response.id)
             $('#email').val(response.email);
            $('#password').val(response.password);
            $('#phoneNumber').val(response.phone);
                },
                error: function() {
                    console.log('Error occurred while fetching employee data.');
                }
            });
        }
   
       


   
   
    



  
