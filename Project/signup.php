<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $showAlert = false;
    include 'partials/_dbconnect.php';
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];
    
    // Check if user already exists
    $existsQuery = "SELECT * FROM `users` WHERE `email` = '$email'";
    $existsResult = mysqli_query($conn, $existsQuery);
    $exists = mysqli_num_rows($existsResult) > 0;

    if ($exists) {
        echo '<div class="alert alert-danger" role="alert">Email already registered!</div>';
    }

    if (($password !== $cpassword)) {
        echo '<div class="alert alert-danger" role="alert">Passwords do not match!</div>';
    } else if (!$exists) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`name`, `email`, `password`, `date`) VALUES ('$fullName', '$email', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql);
         if ($result) {
            $showAlert = true;
            echo '<div class="alert alert-success" role="alert">Your account has been created successfully!</div>';
        }
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Signup</title>
    <style>
    body {
    background-image: url('chairs.jpg'); /* Update with your image path */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
  }
  .form-container {
    max-width: 400px;
    margin: 40px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: rgba(240, 240, 240, 0.8); /* Semi-transparent background */
  }
  .form-container h2 {
    margin-bottom: 20px;
    text-align: center;
  }
  </style>
  </head>
  <body style="background-color:black;">
    <?php require 'partials/_nav.php'?>
    <div class="container">

    </div>
    <div class="form-container">
    <h2>Signup</h2>
    <form action="/Project/signup.php" method="post">
      <!-- Full Name -->
      <div class="mb-3">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name"  required>
      </div>
      <!-- Email Address -->
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"  required>
      </div>
      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
      </div>
      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Re-enter your password" required>
      </div>
      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100">Sign Up</button>
    </form>
    <p>Already Registered? <a href="login.php">Login</a></p>
  </div>
    </form>

    <script src="signup_validation.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>