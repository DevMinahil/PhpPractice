
$(document).ready(function() {
const gameState = {
    playerName: "Player 1",
    player2Name: "Player 2",
    topCard: "4",
    playerHand: ["2", "6", "8", "Skip", "Wild"],
    player2Hand: ["1", "3", "5", "Skip", "Reverse"],
    message: ""
  };

  function updateUI() {
    document.getElementById("player-name").textContent = gameState.playerName;
    document.getElementById("top-card").textContent = gameState.topCard;

    const playerHand = document.getElementsByClassName("player-hand")[0];
    playerHand.innerHTML = "";
    gameState.playerHand.forEach(card => {
      const cardElement = document.createElement("div");
      cardElement.classList.add("card");
      cardElement.classList.add("player-card");
      cardElement.textContent = card;
      cardElement.onclick = () => playCard(card);
      playerHand.appendChild(cardElement);
    });

    const player2Hand = document.getElementsByClassName("player2-hand")[0];
    player2Hand.innerHTML = "";
    gameState.player2Hand.forEach(card => {
      const cardElement = document.createElement("div");
      cardElement.classList.add("card");
      cardElement.classList.add("player2-card");
      cardElement.textContent = card;
      player2Hand.appendChild(cardElement);
    });

    document.getElementById("message").textContent = gameState.message;
  }

  // Function to simulate playing a card
  function playCard(card) {
    gameState.message = `Played card: ${card}`;
    updateUI();
  }

  // Function to simulate drawing a card
  function drawCard() {
    const newCard = "3"; // Sample drawn card
    gameState.playerHand.push(newCard);
    gameState.message = `You drew card: ${newCard}`;
    updateUI();
  }

  // Initial update of the UI
  updateUI();
})