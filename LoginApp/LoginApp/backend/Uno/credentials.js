$(document).ready(function() {
    


    $("#player-number-form").show();
  
   

    $("#NoOfPlayersButton").click(function(){
        

       
        var noOfPlayers = parseInt(document.getElementById("noOfPlayers").value);
        console.log(noOfPlayers)
    
        // Hide the number of player form
         var numberFormContainer = document.getElementById("NoOfPlayersButton");
        numberFormContainer.style.display = "none";
    
        // Show the player name form
        var nameFormContainer = document.getElementById("player-names-form");
        nameFormContainer.style.display = "block";
    
        // Generate input fields for player names
        var playerNamesContainer = document.getElementById("player-names-fields-container");
        playerNamesContainer.innerHTML = "";
    
        for (var i = 1; i <= noOfPlayers; i++) {
            var label = document.createElement("label");
            label.innerHTML = "<b>Player " + i + " name:</b>";
      
            var input = document.createElement("input");
            input.type = "text";
            input.name = "playerName" + i;
            input.required = true;
      
            var div = document.createElement("div");
            div.classList.add("player-name-field");
            div.appendChild(label);
            div.appendChild(input);
      
            playerNamesContainer.appendChild(div);
          }
      
          return false;
        
      
      });
     
    // Sample game state
  
    


    // Initial update of the UI
   
  });