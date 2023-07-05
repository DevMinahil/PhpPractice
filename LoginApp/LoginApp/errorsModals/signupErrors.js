$(document).ready(function() {
    // Check if the URL contains the signUpError parameter
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('signUpError')) {
        // Get the error message from the session
        const errorMessage = "This Email already exist try with a different email";
        // Set the error message in the modal
        document.getElementById('errorMessage').textContent = errorMessage;
        // Display the modal
        $('#errorModal').modal('show');
    }
    else if($urlParams.get('signUpError') === '2')
    {
        const errorMessage = "This Phone Number  already exist try with a different phone number";
        // Set the error message in the modal
        document.getElementById('errorMessage').textContent = errorMessage;
        // Display the modal
        $('#errorModal').modal('show');
    }
});