<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbconnect.php';
    $userId = $_POST["userId"];
    $passwordd = $_POST["passwordd"]; 
    
     
    $sql = "Select * from user_credentials where userId='$userId' AND passwordd='$passwordd'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userId'] = $userId;
        header("location: HomeHyderabad.php");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="secure_login.css">
</head>

<body>

<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="navbar">
        <div class="nav_logo"><video class="logo_video" src="secure_logo.mp4" width="75%px"  loop autoplay muted ></div>
        <div class="user_logo_nav"><i class="fa-regular fa-user"></i></div>
      </div>

    <main>
        <div class="welcome_message">
            <h1>Welcome to Secure</h1>
            
        </div>

        <div class="main">            
                <form action="secure_login.php" method="POST" class="login_main_page">

                    <label for="userId">User Id:</label>

                    <input type="text" id="userId" name="userId" autocomplete="off" placeholder="user@1234"  required><br>

                    <label for="passwordd">Password:</label>

                    <input type="password" id="password" name="passwordd" placeholder="passeord#@34" required><br>
                    <a href="Forget_password.html">Forget Password</a>

                    <input type="submit" class="login_button" value="Login">
                    
                </form>
        </div>
    </main>
<footer><h3 id="credit">Powered by Sikarwar</h3></footer>

</body>
</html>