<?php
session_start();
include 'partials/_dbconnect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the user's current password from the database
    $stmt = $conn->prepare("SELECT password FROM `users` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Verify the current password
        if (password_verify($current_password, $user['password'])) {
            // Check if the new passwords match
            if ($new_password === $confirm_password) {
                // Hash the new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the password in the database
                $stmt = $conn->prepare("UPDATE `users` SET password = ? WHERE email = ?");
                $stmt->bind_param("ss", $hashed_password, $email);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Redirect back to the profile page with success message
                    header("Location: profile.php?status=success");
                    exit();
                } else {
                    // Redirect back to the profile page with error message
                    header("Location: profile.php?status=error");
                    exit();
                }
            } else {
                // Redirect back to the profile page with mismatched password error
                header("Location: profile.php?status=password_mismatch");
                exit();
            }
        } else {
            // Redirect back to the profile page with incorrect current password error
            header("Location: profile.php?status=current_password_error");
            exit();
        }
    } else {
        // Redirect back to the profile page if the user is not found
        header("Location: profile.php?status=user_not_found");
        exit();
    }
}
