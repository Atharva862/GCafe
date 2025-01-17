<?php
include 'partials/_dbconnect.php';


// Fetch games from the database
$sql = "SELECT game_id, game FROM games";  // Updated column names
$result = $conn->query($sql);

$games = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $games[] = $row;
    }
}

// Return games as JSON
header('Content-Type: application/json');
echo json_encode($games);

$conn->close();
?>
