<?php require 'partials/_nav.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Booking Form</title>
    <link rel="stylesheet" href="bookNow_styles.css">
</head>
<body>
    <div class="container">
        <h1>Game Booking Form</h1>
        <form id="purchaseForm">
            <div class="form-group">
                <label for="games">Game:</label>
                <select id="games" name="games" required>
                    <option value="">Loading games...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="package">Package:</label>
                <select id="package" name="package" required>
                    <option value="">Select a package</option>
                    <option value="solo">Solo</option>
                    <option value="duo">Duo</option>
                    <option value="squad">Squad</option>
                    <option value="all day">All Day</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <button type="button" id="proceedToPayment">Proceed to Payment</button>
        </form>
    </div>

    <script>
      // Fetch games from the server
      async function fetchGames() {
          const response = await fetch('fetch_games.php');
          const games = await response.json();
          const gamesSelect = document.getElementById('games');

          // Clear existing options
          gamesSelect.innerHTML = '<option value="">Select a game</option>';

          // Populate games
          games.forEach(game => {
              const option = document.createElement('option');
              
              // Ensure correct assignment of values
              option.value = game.game_id;  // The game_id is assigned as the value of the option
              option.textContent = game.game;  // The game name is assigned as the display text

              gamesSelect.appendChild(option);
          });
      }

      document.getElementById('proceedToPayment').addEventListener('click', function () {
          const game = document.getElementById('games').value;
          const package = document.getElementById('package').value;
          const time = document.getElementById('time').value;

          if (game && package && time) {
              alert(`You selected:\nGame: ${game}\nPackage: ${package}\nTime: ${time}`);
          } else {
              alert('Please fill out all fields before proceeding to payment.');
          }
      });

      // Load games when the page loads
      document.addEventListener('DOMContentLoaded', fetchGames);
    </script>
</body>
</html>
