// Show the signup success modal if the success message is present in the URL
$(document).ready(function() {
    console.log("In show password ");

    
    $('#showPassword').change(function() {
        var passwordInput = $('#inputPassword');
        if (this.checked) {
            passwordInput.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
        }
    });
});
