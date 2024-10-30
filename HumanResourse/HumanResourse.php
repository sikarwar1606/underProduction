<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /HR/credentials/secure_login.php');
    exit;
}
// Database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "secure";

$conn = mysqli_connect($server, $username, $password, $database, 3307);
if (!$conn){

    die("Error". mysqli_connect_error());
}
// End of database connection




// SQL query to get the total number of employees
$totalEmpQuery = "SELECT COUNT(EmpId) AS total_employees FROM secure_user";
$result = $conn->query($totalEmpQuery);
$row = $result->fetch_assoc();
$totalEmployees = $row['total_employees'];

// SQL query to get the total number of inactive employees
$inactiveEmpQuery = "SELECT COUNT(DISTINCT EmpId) AS inactive_employees FROM emp_status WHERE status = 'inactive'";
$result = $conn->query($inactiveEmpQuery);
$row = $result->fetch_assoc();
$inactiveEmployees = $row['inactive_employees'];

// Calculate turnover ratio
if ($totalEmployees > 0) {
    $turnoverRatio = ($inactiveEmployees / $totalEmployees) * 100;
    echo "Employee Turnover Ratio: " . round($turnoverRatio, 2) . "%";
} else {
    echo "No employees found in the database.";
}


// Close the connection
$conn->close();


/////////////////////////////////////////////
 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Human Resourses</title>
    <link rel="stylesheet" href="HumanResourse.css" />
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



    <!-- Responsive Menu -->
    <div class="menu-container">
        <div class="menu-icon" onclick="toggleMenu()">&#9776; Menu</div>
        <div class="menu">            
            <span><a href="">CREATE NEW EMP.</a></span>
            <span><a href="">MANAGE EMP. PROFILE</a></span>
            <span><a href="">ATENDENCE</a></span>
            <span><a href="">PAY SLIPS</a></span>
            <span><a href="">EMP. PERFORMANCE</a></span>
            <span><a href="/HR/HomePage/HomeHyderabad.php">HOME</a></span>
        </div>
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
        <!-- End of responsive menu -->

    

    <div class="first_half" > 
        <div class="emp_turnover_rate">Employee Turnover Rate</div>
        <div class="manpower_status">Manpower Status</div>
    </div>
    <!--  End of first box  -->

    <div class="second_half" > 
        <div class="best_performer">Best performer</div>
        <div class="upcoming_birthday">Upcoming Birthday</div>
        <div class="complaints">Complaints</div>
    </div>
    <!-- End of Second box -->
    
   


  </body>
</html>
