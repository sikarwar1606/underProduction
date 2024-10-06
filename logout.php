<?php
// Start the session
session_start();

// Check if the session is active (to avoid errors when no session exists)
if (isset($_SESSION['loggedin'])) {
    // Unset all session variables
    session_unset();
    
    // Destroy the session
    if (session_destroy()) {
        // Redirect to the login page after successful logout
        header("Location: secure_login.php?logout=success");
        exit;
    } else {
        // Handle error if session destruction fails
        header("Location: secure_login.php?error=failed_to_logout");
        exit;
    }
} else {
    // If the session is not set, redirect directly to the login page
    header("Location: secure_login.php?error=not_logged_in");
    exit;
}
