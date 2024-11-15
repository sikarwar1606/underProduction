<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /HR/credentials/secure_login.php');
    exit;
}

include '..\credentials\dbconnect.php';
 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Manage Emp Profile</title>
    <link rel="stylesheet" href="manage_emp_profile.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
  </head>
  <body>

    <!-- including navbar -->
    <?php
     include 'navbar_HR.php';
     ?>

    <!-- Responsive Menu -->
     <?php
     include 'responsive_menu_HR.php';
     ?>
    
    <!-- End of responsive menu -->
  </body>
</html>
