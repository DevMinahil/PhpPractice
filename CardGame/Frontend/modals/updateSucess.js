$(document).ready(function() {
  
    const urlParams = new URLSearchParams(window.location.search);
    const updateSuccess = urlParams.get('updateSuccess');
    
  
    if (updateSuccess === 'true') {
    
      const Message = "The Data is upadated Sucessfully";
      // Set the error message in the modal
      document.getElementById('updateStatusModalBody').textContent = Message;
      $('#updateStatusModal').modal('show');

    }
    if(updateSuccess === 'false')
    {const Message = "There is an error in updating the data";
    // Set the error message in the modal
    document.getElementById('updateStatusModalBody').textContent = Message;
    $('#updateStatusModal').modal('show');
     
    }
});