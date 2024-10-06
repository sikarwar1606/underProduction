<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomeHyderabad</title>
    <link rel="stylesheet" href="HomeHyderabad.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
  </head>
  <body>
    <div class="navbar">
      <div class="nav_logo"><video class="logo_video" src="SecureHome.mp4" width="75%px"  loop autoplay muted ></div>
      <div class="search_nav">
        <input type="text" placeholder="Search..." class="search_input_nav" />
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
      <div class="use_logout">
        <div class="user_logo_nav" ><i class="fa-regular fa-user"></i></div>
        <a href="logout.php" class="log_out">
          <i class="fa-solid fa-right-from-bracket"></i>
        </a>
      </div>
    </div>
    <!-- End of navbar -->
    <div class="menu">
      <span>H.R & Admin</span>
      <span>Store</span>
      <span>Production</span>
      <span>Quality</span>
      <span>Utility & Electrical</span>
      <span>Maintanance</span>
    </div>

    <!-- about company growth, Target & news & announcement -->
     <div class="GTNA">
      <div class="growth">
        <h1>Growth</h1>
      </div>
      <div class="Targets">
        <h1>Targets</h1>
      </div>
      <div class="NandA">
        <h1>News & Announcement</h1>
      </div>
     </div>

  </body>
</html>
