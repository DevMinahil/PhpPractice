$(document).ready(function () {

  function updateUI() {

    $.ajax({
      url: "fetchGameState.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        console.log(data);
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
          drawCard();
          updateUI();

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
  function drawCard() {
    $.ajax({
      url: "drawCard.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        alert(data);
      }
    })
  }
  function playCard(card, index) {
    var Wild;
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
      console.log("Condition true")
      colorDropdown.addEventListener("change", function () {
        selectedColor = this.value;
        console.log("Selected color:", selectedColor);
        console.log("Played card:", card, index);
        $.ajax({
          url: 'playCard.php',
          type: "POST",
          data: { "index": index, "color": selectedColor },
          success: function (data) {
            if (data) {
              $("#color-dropdown-container").prop("disabled", true).val(data.color);
              updateUI();
            
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
        url: 'playCard.php',
        type: "POST",
        data: { "index": index },
        success: function (data) {
          if (data) {
            updateUI();
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