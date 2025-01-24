<?php
// Start the session and check login
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

include 'partials/_dbconnect.php';

$email = $_SESSION['email'];

// Fetch user details from the database
$stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    echo "<div class='alert alert-danger' role='alert'>Error fetching user details.</div>";
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>User Profile</title>
    <style>
        body {
            background-image: url('chairs.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .profile-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.9);
        }

        .profile-container h2 {
            margin-bottom: 25px;
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        .profile-container .profile-detail {
            margin-bottom: 15px;
        }

        .profile-container .btn-logout {
            display: block;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php require 'partials/_nav.php'; ?>

    <div class="profile-container">
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>

        <div class="profile-detail">
            <strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?>
        </div>

        <div class="profile-detail">
            <strong>Registration Date:</strong> <?php echo htmlspecialchars($user['date']); ?>
        </div>

        <!-- Add more details if needed -->

        <!-- Display Status Message -->
        <?php if (isset($_GET['status'])): ?>
            <?php 
            $status = $_GET['status']; 
            if ($status == 'success'): ?>
                <div class="alert alert-success" role="alert">Password updated successfully!</div>
            <?php elseif ($status == 'error'): ?>
                <div class="alert alert-danger" role="alert">Error updating password. Please try again.</div>
            <?php elseif ($status == 'password_mismatch'): ?>
                <div class="alert alert-danger" role="alert">New passwords do not match.</div>
            <?php elseif ($status == 'current_password_error'): ?>
                <div class="alert alert-danger" role="alert">Current password is incorrect.</div>
            <?php elseif ($status == 'user_not_found'): ?>
                <div class="alert alert-danger" role="alert">User not found.</div>
            <?php endif; ?>
        <?php endif; ?>

        <hr>

        <!-- Update Password Form -->
        <h3>Update Password</h3>
        <form action="update_password.php" method="POST">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
        <h3>View Bookings</h3>
        <form action="viewBookings.php" method="POST">
        <button type="submit" class="btn btn-primary">Show</button>

        <hr>

        <a href="logout.php" class="btn btn-danger btn-logout">Logout</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUd8T0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GC"></script>
</body>
</html>
