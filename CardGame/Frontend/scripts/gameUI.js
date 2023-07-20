$(document).ready(function () {
  function updateUI() {
    $.ajax({
      url: "/Backend/Controller/Game/GameState.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        const playerHand = $(".player-hand");
        playerHand.empty();
     
        $.each(data.cards, function (index, card) {
          const cardElement = $("<div></div>")
            .addClass("card")
            .addClass("player-card")
            .addClass(data.cardColors[index])
            .addClass(data.canPlay ? "clickable" : "")
            .text(card)
            .click(() => {
              if (data.canPlay) {
                
                playCard(card, index);
              }
            });
          playerHand.append(cardElement);
        });
        if (!data.canPlay) {
          alert("You cannot play you have to draw a card!");
          $("#draw-button").prop("disabled", false);
        }
        $("#card-pile").text(data.cardPile);
        //console.log("Card pile color is "+data.cardPileColor);
        $("#card-pile").removeClass().addClass(data.cardPileColor);

        $("#player-name").text(data.playerName);
      },
      error: function () {
        console.log("Error occurred while updating player cards.");
      }
    });
  }
  //asking the user weather he want to exit or not
  window.addEventListener('beforeunload', (event) => {
    event.returnValue = `Game Progress will be loss`;
  });
  $("#draw-button").click(function () {
    console.log("Button is clicked !");
    //Disabling button again
    $("#draw-button").prop("disabled", true);
    $.ajax({
      url: "/Backend/Controller/Game/DrawCard.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
       alert(data);
    
      },
      error: function (error) {
        console.log(error);
      }
  
    });
    updateUI();

  });
  function playCard(card, index) {
    var Wild;
    console.log(card);
    if (card == "Wild" || card == "DrawFourWild") {
      Wild = true;
      var colorDropdown = document.createElement("select")
      var colors = ["Red", "Blue", "Green", "Yellow"];
      for (var i = 0; i < colors.length; i++) {
        var option = document.createElement("option");
        option.value = colors[i];
        option.setAttribute("class", colors[i]);
        option.text = colors[i];
        colorDropdown.appendChild(option);
      }
      var container = document.getElementById("color-dropdown-container")
      $("#color-dropdown-container").show();
      container.innerHTML = "";
      container.appendChild(colorDropdown);
    }
    if (Wild === true) {
      Wild=false;
      colorDropdown.addEventListener("change", function () {
        selectedColor = this.value;
        console.log("Selected color:", selectedColor);
        console.log("Played card:", card, index);
        $.ajax({
          url: '/Backend/Controller/Game/PlayCard.php',
          type: "POST",
          data: { "index": index, "color": selectedColor },
          success: function (data) {
            if (data) {
              alert(data);
              if (data.includes("Congratulations")) {
                console.log("Congratulations message found in the response.");
                alert(data);
                window.location.href="../../Backend/Controller/Game/gameForm.html";
            } else {    
              $("#color-dropdown-container").prop("disabled", true).val(data.color);
              updateUI();
            }
            
            }
          },
          error: function () {
            console.log("Unexpected error");
          }
        })
      })
    }
    else {
      $.ajax({
        url: '/Backend/Controller/Game/PlayCard.php',
        type: "POST",
        data: { "index": index },
        success: function (data) {
          if (data) { 
            alert(data);
            if (data.includes("Congratulations,")) {
              console.log("Congratulations message found in the response.");
              alert(data);
              window.location.href="/frontend/views/Game/gameForm.html";

           } else {
            
              updateUI();
          }      
          }
        },
        error: function () {
          console.log("Unexpected error");
        }
      });
    }
  }
  updateUI();
});