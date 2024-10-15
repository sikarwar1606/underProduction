<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: secure_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>HomeHyderabad</title>
    <link rel='stylesheet' href='secure_Home_Hyd.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' />
   
</head>

<body>
    <div class='navbar'>
        <div class='nav_logo'>
            <video class='logo_video' src='SecureHome.mp4' width='75%' loop autoplay muted></video>
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

        <a href='logout.php' class='log_out'>
            <i class='fa-solid fa-right-from-bracket'></i>
        </a>
    </div>

    <!-- Responsive Menu -->
    <div class="menu-container">
        <div class="menu-icon" onclick="toggleMenu()">&#9776; Menu</div>
        <div class="menu">            
            <span>Admin</span>
            <span>H.R</span>
            <span>Planning</span>
            <span>Store</span>
            <span>Production</span>
            <span>Quality</span>
            <span>Dispatch</span>
            <span>Utility & Electrical</span>
            <span>Maintenance & Technical</span>
        </div>
    </div>

    <div class="container">
        <div class="upcoming_events style_container">Upcoming Events</div>
        <div class="important_notes style_container">Important Notes</div>
        <div class="customer_complaints style_container">Customer Complaints</div>
    </div>

    <script>
        function toggleMenu() {
            const menu = document.querySelector('.menu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        function toggleNotifications() {
            const bellContainer = document.querySelector('.bell-container');
            bellContainer.classList.toggle('open');
        }

        function toggleNotifications_user() {
            const userLogoContainer = document.querySelector('.user_logo_container');
            userLogoContainer.classList.toggle('open');
        }
    </script>
</body>
</html>
