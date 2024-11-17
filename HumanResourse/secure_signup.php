<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /HR/credentials/secure_login.php');
    exit;
}

$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../credentials/dbconnect.php';
    $user_name = $_POST["user_name"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $EmpId = $_POST["EmpId"];
    $department_name = $_POST["department_name"];    
    $designation = $_POST["designation"];
    
    // Check if the user already exists (to avoid duplicates) with a prepared statement
    $existsSql = $conn->prepare("SELECT * FROM `secure_user` WHERE `user_name` = ?");
    $existsSql->bind_param("s", $user_name);
    $existsSql->execute();
    $resultExists = $existsSql->get_result();
    $numExists = $resultExists->num_rows;

    if ($numExists > 0) {
        $showError = "Username already exists";
    } else {
        // Use prepared statements to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO `secure_user` (`user_name`, `dob`, `phone`, `email`, `EmpId`, `department_name`, `designation`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $user_name, $dob, $phone, $email, $EmpId, $department_name, $designation);

        if ($stmt->execute()) {
            $showAlert = true;
        } else {
            $showError = "Registration failed, please try again.";
        }
        $stmt->close();
    }
    $existsSql->close(); // Close the prepared statement

    $userId = $_POST["userId"];
    $passwordd = $_POST["passwordd"];
    $confirm_password = $_POST["confirm_password"];
    $EmpId = $_POST["EmpId"];
    
    
    // Check if the user already exists (to avoid duplicates) with a prepared statement
    $existsSql = $conn->prepare("SELECT * FROM `user_credentials` WHERE `passwordd` = ?");
    $existsSql->bind_param("s", $passwordd);
    $existsSql->execute();
    $resultExists = $existsSql->get_result();
    $numExists = $resultExists->num_rows;

    if ($numExists > 0) {
        $showError = "password already exists";
    } else {
       if($passwordd===$confirm_password) {
        $stmt = $conn->prepare("INSERT INTO `user_credentials` (`userId`, `passwordd`, `EmpId`) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $passwordd, $confirm_password, $EmpId);

            if ($stmt->execute()) {
                $showAlert = true;
            } else {
                $showError = "Registration failed, please try again.";
            }
            $stmt->close();
       }
       else{
        $showError="Password do not match!";
       }


}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="secure_signup.css">
</head>
<body>

<?php
// including navbar
include 'navbar_HR.php';

//  Responsive Men
include 'responsive_menu_HR.php';



    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError .'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>';
    }
?>

<div class="navbar">
    <div class="nav_logo">
        <video class="logo_video" src="secure_logo.mp4" width="75%" loop autoplay muted></video> <!-- Corrected video tag -->
    </div>
    <div class="user_logo_nav">
        <i class="fa-regular fa-user"></i>
    </div>
</div>

<main>
    <div class="welcome_message">
        <h1>Welcome to Secure</h1>
    </div>

    <div class="main">            
        <form action="secure_signup.php" method="POST" class="signin_main_page">
            <label for="Name">Full Name</label>
            <input type="text" class="input" name="user_name" placeholder="Raj Kumar" required autocomplete="off"><br>

            <label for="DOB">Date of Birth</label>
            <input type="date" class="input" name="dob" required autocomplete="off"><br>

            <label for="Phone">Mobile Number</label>
            <input type="text" class="input" name="phone" placeholder="9144444404" required autocomplete="off"><br>

            <label for="Mail">Email Id</label>
            <input type="email" class="input" name="email" placeholder="mohan32@gmail.com" required autocomplete="off"><br>

            <label for="EmpId">Employee Id</label>
            <input type="text" class="input" name="EmpId" placeholder="SI0111" required autocomplete="off"><br>

            <label for="department_name">Department</label>
            <select class="input" name="department_name" required>
                <option value="Quality">Quality</option>
                <option value="Production">Production</option>
                <option value="Store">Store</option>
                <option value="Planing">Planing</option>
                <option value="H.R">H.R</option>
                <option value="Dispatch">Dispatch</option>
                <option value="Marketing">Marketing</option>
                <option value="Admin">Admin</option>
                <option value="Director">Director</option>
                <option value="Maintenance">Maintenance</option>
                <option value="Utility">Utility</option>
                <option value="Management">Management</option>
                <option value="Top_management">Top Management</option>                
            </select><br>

            <label for="designation">Designation</label>
            <select class="input" name="designation" required>
                <option value="executive">Executive</option>
                <option value="shift_incharge">Shift Incharge</option>
                <option value="team_leader">Team Leader</option>
                <option value="asst_manager">Asst. Manager</option>
                <option value="manager">Manager</option>
                <option value="genral_manager">Genral Manager</option>
                <option value="director">Director</option>                                
            </select><br>

            <label for="Name">USER ID</label>
            <input type="text" class="input" name="userId" placeholder="user@23" required autocomplete="off"><br>

            <label for="passwordd">Password</label>
            <input type="password" class="input" name="passwordd" placeholder="password@53" required autocomplete="off"><br>

            <label for="confirm_passwordd">Password</label>
            <input type="password" class="input" name="confirm_password" placeholder="password@53" required autocomplete="off"><br>

            <label for="status">Status</label>
            <input type="text" class="input" name="status" placeholder="Active" required autocomplete="off"><br>

    


            <button type="submit" class="btn ">Submit</button>


        </form>
    </div>
</main>

<footer>
    <h3 id="credit">Powered by Sikarwar</h3>
</footer>

</body>
</html>
