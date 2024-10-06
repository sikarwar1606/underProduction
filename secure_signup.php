<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/dbconnect.php';
    $Name = $_POST["Name"];
    $DOB = $_POST["DOB"];
    $Department = $_POST["Department"];
    $Phone = $_POST["Phone"];
    $Mail = $_POST["Mail"];
    $EmpId = $_POST["EmpId"];
    $Role = $_POST["Role"];
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Check if the user already exists (to avoid duplicates)
    $existsSql = "SELECT * FROM `emp_ragistration` WHERE `userName` = '$userName'";
    $resultExists = mysqli_query($conn, $existsSql);
    $numExists = mysqli_num_rows($resultExists);

    if ($numExists > 0) {
        $showError = "Username already exists";
    } else {
        // Check if the password and confirm password fields match
        if ($password === $confirmPassword) {
            // Use prepared statements to avoid SQL injection
            $stmt = $conn->prepare("INSERT INTO `emp_ragistration` (`Name`, `DOB`, `Department`, `Phone`, `Mail`, `EmpId`, `Role`, `Current_time`, `userName`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, current_timestamp(), ?, ?)");
            $stmt->bind_param("sssssssss", $Name, $DOB, $Department, $Phone, $Mail, $EmpId, $Role, $userName, $password);

            if ($stmt->execute()) {
                $showAlert = true;
            } else {
                $showError = "Registration failed, please try again.";
            }
            $stmt->close();
        } else {
            $showError = "Passwords do not match!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="secure_signup.css">
</head>
<body>

<?php
    if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
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
        <form action="signup.php" method="POST" class="signin_main_page">
        <label for="Name">Full Name</label>
        <input type="text" class="input" name="Name" placeholder="Raj Kumar" required><br>

        <label for="DOB">Date of Birth</label>
        <input type="date" class="input" name="DOB" required><br>

        <label for="Department">Department</label>
        <input type="text" class="input" name="Department" placeholder="Quality" required><br>

        <label for="Phone">Mobile Number</label>
        <input type="phone" class="input" name="Phone" placeholder="9144444404" required><br>

        <label for="Mail">Email Id</label>
        <input type="email" class="input" name="Mail" placeholder="mohan32@gmail.com" required><br>

        <label for="EmpId">Employee Id</label>
        <input type="text" class="input" name="EmpId" placeholder="SI0111" required><br>

        <label for="Role">Role</label> 
        <input type="text" class="input" name="Role" placeholder="Executive" required><br>

        <label for="userName">User Name</label> 
        <input type="text" class="input" name="userName" placeholder="user@11" required><br>

        <label for="password">Password</label> 
        <input type="password" class="input" name="password" placeholder="Password#2343" required><br>

        <label for="confirmPassword">Confirm Password</label> 
        <input type="password" class="input" name="confirmPassword" placeholder="Confirm your password" required><br>

        <button type="submit" class="btn ">Submit</button>
    </form>
        </div>
    </main>

    <footer>
        <h3 id="credit">Powered by Sikarwar</h3>
    </footer>
</body>
</html>
