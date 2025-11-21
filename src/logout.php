<?php
session_start();
include_once("connect.php");

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    // If the user is not logged in, redirect them to the login page
    echo "<script>
    alert('You need to log in to access this page.');
    window.location.href = 'login.html'; // Redirect to the login page
    </script>";
} else {
    // If the user is logged in, destroy the session to log them out
    session_unset();  // Remove all session variables
    session_destroy();  // Destroy the session

    // Redirect the user to the login page or home page after logging out
    echo "<script>
    alert('You have successfully logged out.');
    window.location.href = 'login.html'; // Redirect to the login page
    </script>";
}
exit();
?>
