<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = false;
    
    include 'partials/_dbconnect.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Check if user already exists
    //$sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_array($result)) {
            if(password_verify($password, $row['password'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("Location: homepage.php");
        }
    }
}
    
    if ($login) {
        
        echo '<div class="alert alert-success" role="alert">Login Successful</div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Invalid Details</div';
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
    <style>
    body {
    background-image: url('chairs.jpg'); /* Replace with your image path */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }

  .form-container {
    max-width: 400px;
    margin: 80px auto;
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    background-color: rgba(255, 255, 255, 0.9);
  }

  .form-container h2 {
    margin-bottom: 25px;
    text-align: center;
    color: #333;
    font-size: 24px;
  }

  .form-container .form-group {
    margin-bottom: 20px;
  }

  .form-container .form-control {
    padding: 12px;
    font-size: 16px;
  }

  .form-container .btn-primary {
    padding: 12px;
    font-size: 16px;
    width: 100%;
    border-radius: 5px;
    background-color: #007bff;
    border: none;
  }

  .form-container .btn-primary:hover {
    background-color: #0056b3;
  }

  .form-container p {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
  }

  .form-container a {
    color: #007bff;
    text-decoration: none;
  }

  .form-container a:hover {
    text-decoration: underline;
  }

</style> 
  </head>
  <body>
  <?php require 'partials/_nav.php'?>
    <div class="form-container">
      <h2>Login</h2>
      <form action="/Project/login.php" method="post">
        <!-- Email Address -->
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <!-- Password -->
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <!-- Signup Link -->
      <p>Don't have an Account? <a href="signup.php">Sign Up</a></p>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GC

