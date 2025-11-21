<?php
session_start();
include_once("connect.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'buyer') {
    echo "<script>
    alert('Please log in as a buyer to upload payment.');
    window.location.href = 'paymentupload.php'; 
    </script>";
}

// Get buyer ID from session
$buyer_id = $_SESSION['user_id']; // Assuming buyer ID is stored in session

// Ensure the input fields are correctly captured
$p_id = $_POST['name1'];          // Product ID (name1 in the form)
$pay_phone = $_POST['base_price']; // Phone number
$pay_email = $_POST['description']; // Email address

// Handle image upload
$image = $_FILES['image']; // Ensure this matches the form field name
$image_name = $image['name'];
$image_tmp = $image['tmp_name'];
$image_folder = 'uploads/' . $image_name;

if (move_uploaded_file($image_tmp, $image_folder)) {
    // Insert payment details into the database
    $sql = "INSERT INTO payment (B_ID, Pay_phone, Pay_email, Pay_image, P_id) 
            VALUES ('$buyer_id', '$pay_phone', '$pay_email', '$image_folder', '$p_id')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Payment uploaded successfully!');
            window.location.href = 'paymentdisplay.php'; 
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Failed to upload image.";
}
?>
