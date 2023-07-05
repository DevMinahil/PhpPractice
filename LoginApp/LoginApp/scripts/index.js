
    // Show the signup success modal if the success message is present in the URL
    $(document).ready(function() {
        if (window.location.search.indexOf('successMessage') > -1) {
            $('#signupSuccessModal').modal('show');
        }
    
  
        // Check if the loginError parameter is present in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const loginError = urlParams.get('loginError');
        
        if (loginError) {
            // Show the login error modal
            $('#loginErrorModal').modal('show');
        }

        document.getElementById('showPassword').addEventListener('change', function() {
            var passwordInput = document.getElementById('inputPassword');
            if (this.checked) {
                passwordInput.setAttribute('type', 'text');
            } else {
                passwordInput.setAttribute('type', 'password');
            }
        });
        
    });
    