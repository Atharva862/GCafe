<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>GameOn</title>
  <link rel="stylesheet" href="home_styles.css">
  <style>
   
  </style>
</head>
<body>
<?php require 'partials/_nav.php'?>
  <!-- Background Section -->
  <div class="background">
    <div class="overlay">
      <p>Unleash Your Inner Gamer</p>
      <h1>Game On!</h1>
      <p>Welcome to GameOn, the ultimate gaming café where your wildest gaming dreams come true! Book your time slot, grab your friends, and dive into epic battles, all while enjoying snacks that are as legendary as your gaming skills!</p>
      <button onclick="window.location.href='login.php'">Join The Fun</button>
    </div>
  </div>

  <!-- Game Packages Section -->
  <section class="game-packages">
    <h1>Game Packages</h1>
    <div class="packages-container">
      <div class="package">
        <img src="Elden_ring.jpg" alt="Solo Gamer">
        <h2>Rs 100</h2>
        <h3>Solo</h3>
        <p>Perfect for solo missions! Enjoy 2 hours of gaming bliss.</p>
        <button onclick="window.location.href='bookNow.php'">Book Now</button>
      </div>
      <div class="package">
        <img src="wuwa.jpg" alt="Duo Delight">
        <h2>Rs 200</h2>
        <h3>Duo</h3>
        <p>Grab a buddy and game together for 3 hours of fun!</p>
        <button onclick="window.location.href='bookNow.php'">Book Now</button>
      </div>
      <div class="package">
        <img src="LoL.jpg" alt="Squad Goals">
        <h2>Rs 400</h2>
        <h3>Squad</h3>
        <p>Bring the whole crew! 5 hours of non-stop gaming action!</p>
        <button onclick="window.location.href='bookNow.php'">Book Now</button>
      </div>
      <div class="package">
        <img src="all_day.jpeg" alt="All Day">
        <h2>Rs 600</h2>
        <h3>Solo/Duo/Squad</h3>
        <p>All Day access for the true gaming fanatic</p>
        <button onclick="window.location.href='bookNow.php'">Book Now</button>
      </div>
  </div>
  <div class="features-container">
  <!-- Add a GIF before the features container -->
  <div class="gif-container">
    <img src="elden.gif" alt="Exciting Gaming GIF" class="feature-gif">
  </div>
  <h1>Epic Features Await!</h1>
  <p>Unleash your inner gamer with our top-notch features designed for champions!</p>
  <div class="features-grid">
    <div class="feature-card">
      <h2>01</h2>
      <h3>Flexible Booking</h3>
      <p>Choose your time slot with ease! No more waiting around like a noob. Get in, game, and conquer!</p>
    </div>
    <div class="feature-card">
      <h2>02</h2>
      <h3>High-Speed Internet</h3>
      <p>Lag? Not in our house! Experience lightning-fast internet that keeps you in the game and out of the stone age.</p>
    </div>
    <div class="feature-card">
      <h2>03</h2>
      <h3>Comfortable Seating</h3>
      <p>Say goodbye to back pain! Our plush chairs are designed for marathon gaming sessions. Comfort is key, folks!</p>
    </div>
    <div class="feature-card">
      <h2>04</h2>
      <h3>Snack Attack</h3>
      <p>Fuel your gaming with our delicious snacks and drinks. Because who can game on an empty stomach?</p>
    </div>
  </div>
</div>

  </section>
</body>
</html>
