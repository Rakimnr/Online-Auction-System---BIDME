<?php
include_once("connect.php");

if (isset($_POST['submit'])) {
    // Check if file is uploaded without errors
    if (isset($_FILES["my_image"]) && $_FILES["my_image"]["error"] == UPLOAD_ERR_OK) {
        $cid = $_POST["cid"];
        $cname = $_POST["cname"];
       
        $file = $_FILES["my_image"]["name"];
        
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $allowedTypes = array("jpg", "png", "jpeg");
        $tempName = $_FILES["my_image"]["tmp_name"];
        $targetPath = "uploads/" . basename($file); // Use basename to avoid directory traversal attacks

        // Check file type
        if (in_array($ext, $allowedTypes)) {
            // Ensure the uploads directory exists
            if (!file_exists('uploads')) {
                mkdir('uploads', 0755, true); // Create uploads directory if it doesn't exist
            }

            // Move the uploaded file to the target path
            if (move_uploaded_file($tempName, $targetPath)) {
                // Insert file information into the database
                $query = "INSERT INTO category (C_ID, C_Name, file) VALUES ('$cid', '$cname', '$file')";
                
                if (mysqli_query($conn, $query)) {
                    echo "Image inserted successfully.";
                } else {
                    echo "Error inserting image: " . mysqli_error($conn);
                }
            } else {
                echo "File is not uploaded.";
            }
        } else {
            echo "Your file is not allowed. Only JPG, PNG, and JPEG formats are accepted.";
        }
    } else {
        echo "No file uploaded or there was an error with the file upload.";
    }
}
?>
