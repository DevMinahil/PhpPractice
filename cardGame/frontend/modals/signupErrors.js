$(document).ready(function() {
   
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('signUpError')) {
        
        const errorMessage = "This Email already exist try with a different email";
        
        document.getElementById('errorMessage').textContent = errorMessage;
   
        $('#errorModal').modal('show');
    }
    else if($urlParams.get('signUpError') === '2')
    {
        const errorMessage = "This Phone Number  already exist try with a different phone number";
       
        document.getElementById('errorMessage').textContent = errorMessage;
      
        $('#errorModal').modal('show');
    }
});