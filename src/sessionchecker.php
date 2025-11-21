<?php
session_start();
include_once("connect.php");

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    // If user is not logged in or their role is not set, redirect them to login page
    echo "<script>
    alert('You need to log in to access this page.');
    window.location.href = 'login.html'; // Redirect to the login page
    </script>";
    
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
?>