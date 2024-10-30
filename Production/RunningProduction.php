<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /HR/credentials/secure_login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>ProductionSecure</title>
    <link rel="stylesheet" href="ProductionSecureHyderabad.css" />
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
        <span><a href="/HR/HomePage/HomeHyderabad.php">Home</a></span>
        <span><a href="/HR/Production/ProductionSecureHyderabad.php">Production</a></span>            
            <span>Add</span>
            <span>Add</span>
            <span>Add</span>
            <span>Add</span>
            <span>Add</span>
            <span>Add</span>
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

    <div class="RunningProduction" >
      <div class="nav_running_production">
        <h3 id="hrp">Running Production</h3>
      </div>
      <div id="container_running_production">
        <table id="realTimeRunningProduction">
          <thead>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
            <th class="headTableDataForRp"><p class="headingOfTable">Targetisre </p></th>
          </thead>
          <tbody>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
          <tr>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
            <td class="tableDataForRp"><input type="text" class="placeholderForRP"></td>
          </tr>
        </tbody>
        </table>
      </div>
      
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
          var table = document.getElementById("realTimeRunningProduction");
          localStorage.setItem("realTimeRunningProduction", table.outerHTML);
      });
      </script>
    <!-- END OF RUNNING PRODUCTION -->


    <div class="UpcomingPlan">
      <div class="nav_upcoming_plan">
        <h3 id="hup">Upcoming Plan</h3>
      </div>
      <div id="container_upcoming_plan"></div>      
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
          var storedData = localStorage.getItem("table_upcomingPlan");
          if (storedData) {
              document.getElementById("container_upcoming_plan").innerHTML = storedData;
          }
      });
      </script>
    <!-- END OF UPCOMING PLAN -->

      

    <div class="main_documents">
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
      <div class="d1">For docs.</div>
     
    </div>

    
    
    <!-- <footer><p>This is a footer</p></footer> -->

  </body>
</html>
