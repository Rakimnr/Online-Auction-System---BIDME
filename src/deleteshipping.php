<?php
include_once("sessionchecker.php");

// Assume $role and $user_id are obtained from the session
                  


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM shipping WHERE Sh_id=$id");
    header('location: index.html');
}
?>