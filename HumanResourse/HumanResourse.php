<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /HR/credentials/secure_login.php');
    exit;
}
// Database connection
include '..\credentials\dbconnect.php';
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
     <?php
     include 'navbar_HR.php';
     ?>
    <!-- Responsive Menu -->
     <?php
     include 'responsive_menu_HR.php';
     ?>
    

    <div class="first_half" > 
        <div class="emp_turnover_rate">
            <p1>Employee Turnover Rate</p1>
            <?php
                echo round($turnoverRatio, 1) . "%";
            ?>

        </div>
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
