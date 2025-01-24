<?php require 'partials/_nav.php'; ?>

<?php
session_start(); // Start the session to track the logged-in user

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<p>Please log in first to add items to your cart.</p>";
    header('Location:login.php');
    exit;
}

include 'partials/_dbconnect.php';  // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data for the item to be added to the cart
    $game_id = $_POST['game'];    // Assuming game ID is passed
    $package_id = $_POST['package'];  // Assuming package ID is passed
    $user_email = $_SESSION['email'];  // Get user email from session
    $time_slot = $_POST['time'];  // Get time slot from form

    // Temporarily store booking data in the session
    $_SESSION['temp_booking'] = [
        'user_email' => $user_email,
        'game_id' => $game_id,
        'package_id' => $package_id,
        'time_slot' => $time_slot,
    ];

    echo "<p>Item added to your cart! Please proceed to payment.</p>";
    header('Location:payment.php');  // Redirect to the payment page
    exit;
}

// If payment is successful (on the payment.php page)
if (isset($_POST['payment_successful']) && $_POST['payment_successful'] === 'true') {
    // Retrieve temporary booking data from session
    if (isset($_SESSION['temp_booking'])) {
        $user_email = $_SESSION['temp_booking']['user_email'];
        $game_id = $_SESSION['temp_booking']['game_id'];
        $package_id = $_SESSION['temp_booking']['package_id'];
        $time_slot = $_SESSION['temp_booking']['time_slot'];

        // Insert the booking data into the bookings table after payment
        $sql = "INSERT INTO bookings (user_email, game_id, time_slot, package_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $user_email, $game_id, $time_slot, $package_id);

        if ($stmt->execute()) {
            echo "<p>Booking confirmed and payment successful!</p>";
            // Clear temporary booking data
            unset($_SESSION['temp_booking']);
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the statement and connection
        $stmt->close();
    } else {
        echo "<p>No booking information found.</p>";
    }
    $conn->close();
}
?>
