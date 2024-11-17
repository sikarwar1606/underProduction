<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Resp</title>
    <link rel="stylesheet" href="manage_emp_profile.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
  </head>
  <body>
    <!-- Responsive Menu -->
    <div class="menu-container">
        <div class="menu-icon" onclick="toggleMenu()">&#9776; Menu</div>
        <div class="menu">            
            <span><a href="secure_signup.php">CREATE NEW EMP.</a></span>
            <span><a href="manage_emp_profile.php">MANAGE EMP. PROFILE</a></span>
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
  </body>
</html>
