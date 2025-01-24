<?php require 'partials/_nav.php'; ?>

<?php

session_start(); // Start the session to track the logged-in user

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<p>Please log in first.</p>";
    header('Location:login.php');
    exit;
}

include 'partials/_dbconnect.php';

// Fetch games from the database
$games_result = $conn->query("SELECT id, name FROM games");
$games_options = "";
while ($row = $games_result->fetch_assoc()) {
    $games_options .= "<option value='{$row['id']}'>{$row['name']}</option>";
}

// Fetch packages from the database
$packages_result = $conn->query("SELECT id, name FROM packages");
$packages_options = "";
while ($row = $packages_result->fetch_assoc()) {
    $packages_options .= "<option value='{$row['id']}'>{$row['name']}</option>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Booking</title>
    <link rel="stylesheet" href="bookNow_styles.css">
</head>
<body>
    <h1>Book Your Game</h1>
    <form action="addtoCart.php" method="POST">
    <!-- Game Selection -->
    <label for="game">Select Game:</label>
    <select id="game" name="game" required>
        <?= $games_options ?>
    </select>

    <!-- Package Selection -->
    <label for="package">Select Package:</label>
    <select id="package" name="package" required>
        <?= $packages_options ?>
    </select>

    <!-- Time Slot Selection -->
    <label for="time">Select Time Slot:</label>
    <input type="time" id="time" name="time" required>

    <!-- Submit Button -->
    <button type="submit">Add to Cart</button>
</form>
</body>
</html>
