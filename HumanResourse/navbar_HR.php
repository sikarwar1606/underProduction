<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>navbar_HR</title>
    <link rel="stylesheet" href="navbar_HR.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
  </head>
  <body>
   <!-- including navbar -->
  <div class='navbar'>
        <div class='nav_logo' > 
            <video class='logo_video' src='\HR\resourse\secure_production.mp4' width='75%' loop autoplay muted></video>
        </div>
        <div class='search_nav'>
            <input type='text' placeholder='Search...' class='search_input_nav' />
            <i class='fa-solid fa-magnifying-glass'></i>
        </div>

        <!-- Notification Bell -->
        <div class="bell-container" onclick="toggleNotifications()">
            <span class="bell-icon"><i class="fa-solid fa-bell"></i></span>
            <!-- Notification Dropdown -->
            <div class="notification-dropdown" id="notificationDropdown">
                <div class="notification">📢 Academic Calendar for Jul-Aug 2024 - 9 October at 8:00 PM</div>
                <div class="notification">📢 Practical Term End Exam - 30 August at 12:00 AM</div>
                <div class="notification">📢 Assignment Due - 24 August at 12:01 AM</div>
                <div class="notification">📢 Assignment Due - 7 August at 11:59 PM</div>
            </div>
        </div>

        <!-- User Icon -->
        <div class="user_logo_container" onclick="toggleNotifications_user()">
            <span class="user_logo"><i class='fa-regular fa-user'></i></span>
            <!-- User Dropdown -->
            <div class="notification-dropdown_user" id="notificationDropdown_user">
                <div class="notification_user">Profile Settings</div>
                <div class="notification_user">Account Details</div>
                <div class="notification_user">Log Out</div>
            </div>
        </div>

        <a href='/HR/credentials/logout.php' class='log_out'>
            <i class='fa-solid fa-right-from-bracket'></i>
        </a>
    </div>
  </body>
</html>
