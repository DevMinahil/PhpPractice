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
                url: 'backend/controllers/user/FetchEmployees.php',
                method: 'POST',
                data: {ID:employeeId },
                success: function(response) {
                    // Update the table body with the received data
                  
                   response=JSON.parse(response);
                

                   console.log("Responce is displyed");
                   $('#inputName').val(response.name);
                   $("#EmployeeId").val(response.id)
                   $('#inputEmail').val(response.email);
                   $('#inputPassword').val(response.password);
                   $('#phone').val(response.phone);
                },
                error: function() {
                    console.log('Error occurred while fetching employee data.');
                }
            });
        }
   
       


   
   
    



  
