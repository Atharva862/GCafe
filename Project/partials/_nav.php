<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GCafe Navbar</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Ensure all text in the navbar is black */
    .navbar {
      background-color: rgba(241, 241, 241, 0.7); /* Adjust the alpha value (0.7) for transparency */
      border-radius: 20px; /* Circular edges */
      padding: 5px 15px; /* Optional padding adjustment */
    }
    .navbar-brand img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }
    .navbar-nav .nav-link {
      color: black !important;
      margin: 0 10px;
      font-weight: 500;
    }
    .btn-book-now {
      background-color: red;
      color: white;
      border-radius: 50px;
      padding: 5px 15px;
      font-weight: 600;
    }
    .btn-book-now:hover {
      background-color: darkred;
    }
    .ml-auto {
      margin-left: auto !important;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(241, 241, 241, 0.88);">

    <a class="navbar-brand" href="/Project">GCafe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/Project/homepage.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Project/bookNow.php">Book Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Project/aboutUs.html">About Us</a>
        </li>
      </ul>
      <!-- Separate list for the right-aligned dropdown -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/Project/login.php">Login</a>
            <a class="dropdown-item" href="/Project/signup.php">Sign Up</a>
            <a class="dropdown-item" href="/Project/logout.php">Logout</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
          <a class="nav-link" href="/Project/profile.php">Profile<span class="sr-only">(current)</span></a>
        </li>
    </div>
  </nav>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
