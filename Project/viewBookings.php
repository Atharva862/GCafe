<?php require 'partials/_nav.php'; ?>

<?php
// Include the database connection file
include 'partials/_dbconnect.php';

// Fetch bookings from the database
$result = $conn->query("SELECT bookings.id, games.name AS game, packages.name AS package, time_slot 
                        FROM bookings 
                        JOIN games ON bookings.game_id = games.id 
                        JOIN packages ON bookings.package_id = packages.id");

echo "<h1>Your Bookings</h1>";

// Display the bookings
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>Game: {$row['game']} | Package: {$row['package']} | Time: {$row['time_slot']}</p>";
    }
} else {
    echo "<p>No bookings found!</p>";
}

// Close the database connection
$conn->close();
?>
