<?php
session_start();
include_once("connect.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'seller') {
    
    echo "<script>
    alert('You are not a seller. Please create a seller account and log in as a seller to upload products.');
    window.location.href = 'index.html'; // Redirect to homepage
</script>";


}

// Get seller ID from the session
$seller_id = $_SESSION['user_id']; // Assuming the seller ID is stored in the session

// Get form data
$item_name = mysqli_real_escape_string($conn, $_POST['name']);
$item_description = mysqli_real_escape_string($conn, $_POST['description']);
$item_base_price = $_POST['base_price'];
$Date = $_POST['date'];
$Time = $_POST['time'];
$category_id = $_POST['category'];

// Check if category ID is valid
$sql = "SELECT C_ID FROM category WHERE C_ID = '$category_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    die("Error: Invalid category ID.");
}

// Handle image upload
$image = $_FILES['image'];
$image_name = $image['name'];
$image_tmp = $image['tmp_name'];
$image_folder = 'uploads/' . $image_name; // Specify upload directory

// Move the uploaded image to the specified folder
if (move_uploaded_file($image_tmp, $image_folder)) {
    // Insert item details into the database
    $sql = "INSERT INTO product (P_Name, P_Description, P_Base_Price,P_Date,P_Time, P_Image, S_ID, C_ID) VALUES ('$item_name', '$item_description', '$item_base_price','$Date','$Time', '$image_folder', '$seller_id', '$category_id')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Item uploaded successfully!');
            window.location.href = 'displayitemdetails.php'; 
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Failed to upload image.";
}
?>