
<?php
// Start or resume the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Unset or destroy the session variable(s) that store user information
    unset($_SESSION['username']);
    

    // Redirect to the login page or any other appropriate page
    header("Location: login.php");
    exit();
} else {
    // If the user is not logged in, you can redirect them to the login page or another appropriate page
    header("Location: login.php");
    exit();
}
?>