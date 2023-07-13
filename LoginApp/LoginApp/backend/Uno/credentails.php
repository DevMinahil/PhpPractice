<!DOCTYPE html>
<html>
<head>
  <title>UNO Game</title>
  <link rel="stylesheet" href="game.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="game.js"></script>
</head>
<body>

<div class="form-container" id="player-number-form">
  <div class="form-content">
    <form id="number-of-players-form" onsubmit="">
      <label for="noOfPlayers"><b>Enter the number of players:</b></label>
      <input type="number" id="noOfPlayers" name="noOfPlayers" required>
      <button type="submit" class="btn" id="NoOfPlayersButton">Next</button>
    </form>
  </div>
</div>

<div class="form-container" id="player-names-form" style="display: none;">
  <div class="form-content">
    <form id="player-names-submission-form" onsubmit="">
      <div id="player-names-fields-container"></div>
      <button type="submit" class="btn" id="StartGame">Start Game</button>
    </form>
  </div>
</div>



 
</body>
</html>
