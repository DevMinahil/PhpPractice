<!DOCTYPE html>
<html>

<head>
    <title>UNO Game</title>
    <link href="game.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- <div class="player-info">
            <span>Player:</span>
            <span id="player-name"></span>

        </div> -->


        <div class="deck" onclick="drawCard()">Draw</div>
        <div class='card'>
        <div id="card-pile"></div>
        </div>



        




        <div class="player2-hand">
            <!-- Player 2's hand cards will be added dynamically here -->
        </div>

        <div class="player-hand">
            <!-- Player's hand cards will be added dynamically here -->
        </div>

        <button class="draw-button" onclick="drawCard()">Draw Card</button>

        <div id="message" class="message"></div>

        <button class="draw-button" onclick="togglePlayer2Cards()">Toggle Player 2's Cards</button>
    </div>

    <script>
        $(document).ready(function () {

            function updateUI() {
                console.log("In upadte uni");

                $.ajax({
                    url: "fetchGameState.php",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        const playerHand = $(".player-hand");
                        playerHand.empty();
                        $.each(data.cards, function(index, card) {
                            const cardElement = $("<div></div>")
                                .addClass("card")
                                .addClass("player-card")
                                .addClass(data.canPlay ? "clickable" : "")
                                .text(card)
                                .click(() => {
                                    if (data.canPlay) {
                                        playCard(card,index);
                                    }
                                });
                            playerHand.append(cardElement);
                        });
                        if(!data.canPlay)
                        {
                            alert("You have to draw a card")
                        }
                        if(data.canPlay)
                        {
                            alert("You Can play")
                        }
                        $("#card-pile").text(data.cardPile);
                    },
                    error: function() {
                        console.log("Error occurred while updating player cards.");
                    }
                });

                   
                
            }

            // Function to simulate playing a card
            function playCard(card,index) {
                // Simulate the play card functionality
                console.log("Played card:", card,index);
                $.ajax({
                    url:'playCard.php',
                    type:"POST",
                    data:{"index":index},
                    success:function(data){
                        if(data)
                        {
                            alert(data);
                            updateUI();
                        }


                    },
                    error:function(){
                        console.log("Unexpectedd error");

                    }






                })
            }

            // Function to simulate drawing a card
            function drawCard() {
                // Simulate the draw card functionality
                console.log("Draw card");
            }

            // Function to toggle visibility of Player 2's cards
            function togglePlayer2Cards() {
                // Simulate the toggle functionality
                console.log("Toggle Player 2's cards");
            }

            // Initial update of the UI
            updateUI();
        });
    </script>
</body>

</html>