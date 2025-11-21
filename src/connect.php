<?php
$server = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password is empty for XAMPP
$db = "auction";      // Your database name

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>