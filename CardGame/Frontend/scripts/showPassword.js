// Show the signup success modal if the success message is present in the URL
$(document).ready(function() {
    $('#showPassword').change(function() {
        var passwordInput = $('#inputPassword');
        if (this.checked) {
            passwordInput.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
        }
    });
});
