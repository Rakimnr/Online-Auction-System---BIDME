<?php
include_once("connect.php");

$username = $_POST['username'];
$newpass = $_POST['psw'];

// Initialize a flag to check if the email was found in any table
$emailFound = false;

// Check the buyer table
$sql = "SELECT * FROM buyer WHERE B_Email='$username'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
    $emailFound = true;
    // Corrected update query with backticks around table and column names
    $update_sql = "UPDATE buyer SET B_password = '$newpass' WHERE B_Email = '$username'";
    mysqli_query($conn, $update_sql);
}

// Check the seller table if email not found in buyer
if (!$emailFound) {
    $sql = "SELECT * FROM seller WHERE S_Email='$username'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $emailFound = true;
        // Update password in seller table
        $update_sql = "UPDATE seller SET S_password = '$newpass' WHERE S_Email = '$username'";
        mysqli_query($conn, $update_sql);
    }
}

// Check the auctioneer table if email not found in buyer or seller
if (!$emailFound) {
    $sql = "SELECT * FROM auctioneer WHERE A_Email='$username'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $emailFound = true;
        // Update password in auctioneer table
        $update_sql = "UPDATE auctioneer SET A_password = '$newpass' WHERE A_Email = '$username'";
        mysqli_query($conn, $update_sql);
    }
}

// If email is not found in any table, show an error message
if (!$emailFound) {
    echo "<script>
    alert('Invalid e-mail');
    window.location.href = 'forget_pass.html'; 
    </script>";
} else {
    // Success message after updating the password
    echo "<script>
    alert('Password updated successfully');
    window.location.href = 'login.html'; 
    </script>";
}

// Close the connection
mysqli_close($conn);
?>
