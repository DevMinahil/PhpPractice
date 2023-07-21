$(document).ready(function () {
  $("#player-number-form").show();

  $("#NoOfPlayersButton").click(function () {
    var noOfPlayers = parseInt(document.getElementById("noOfPlayers").value);
    console.log(noOfPlayers);
    $("#player-number-form").hide();
    $("#player-names-form").show();
    var playerNamesContainer = $("#player-names-fields-container");
    playerNamesContainer.html("");

    for (var i = 1; i <= noOfPlayers; i++) {
      var label = $("<label>").html("<b>Player " + i + " name:</b>");

      var input = $("<input>").attr({
        type: "text",
        name: "playerName" + i,
        required: true,
      });

      var div = $("<div>").addClass("player-name-field");
      div.append(label);
      div.append(input);

      playerNamesContainer.append(div);
    }

    return false;
  });

  $("#player-names-submission-form").submit(function (event) {
    event.preventDefault();
    const noOfPlayers = $("#noOfPlayers").val();

    var playerNames = [];
    for (var i = 1; i <= noOfPlayers; i++) {
      var playerName = $("input[name=playerName" + i + "]").val();
      playerNames.push(playerName);
    }

    const formData = {
      noOfPlayers: noOfPlayers,
      playerNames: playerNames,
    };

    $.ajax({
      url: "/Backend/Controller/Game/StartGame.php",
      type: "POST",
      data: formData,
      success: function (response) {
       window.location.href = "/Frontend/views/Game/gameUI.html";
      },
      error: function () {
        console.error(error);
       },
     });
  });
});
