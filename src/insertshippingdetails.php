<?php
session_start();
include_once("connect.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'buyer') {
    echo "<script>
    alert('You are not a registered buyer');
    window.location.href = 'index.html'; // Redirect to homepage
    </script>";
    exit();
}

// Get the form data
$firstName = $_POST['fullname'];
$lastName = $_POST['country'];
$st = $_POST['street'];
$town = $_POST['town'];
$mobileNumber = $_POST['mobile'];
$email = $_POST['email'];

$errors = array();

// Get buyer ID from the session
$buyer_id = $_SESSION['user_id']; // Assuming the buyer ID is stored in the session

// SQL query to insert shipping data into the 'shipping' table
$sql = "INSERT INTO shipping (U_name, U_country, U_address, U_city, U_phone, U_email, B_ID)
        VALUES ('$firstName', '$lastName', '$st', '$town', '$mobileNumber', '$email', '$buyer_id')";

// Execute the query and check if the insertion was successful
if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('New shipping record created successfully!');
            window.location.href = 'displayshipping.php'; // Redirect to the login page after successful insertion
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
