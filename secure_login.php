<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbconnect.php';
    $userName = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from emp_ragistration where username='$userName' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
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

                    <label for="username">Username:</label>

                    <input type="text" id="username" name="username" autocomplete="off" placeholder="sikarwar@2002"  required><br>

                    <label for="password">Password:</label>

                    <input type="password" id="password" name="password" placeholder="siKarwar&86" required><br>
                    <a href="Forget_password.html">Forget Password</a>

                    <input type="submit" class="login_button" value="Login">
                    
                </form>
        </div>
    </main>
<footer><h3 id="credit">Powered by Sikarwar</h3></footer>

</body>
</html>