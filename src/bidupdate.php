<?php 
// Include the database connection file
include_once("sessionchecker.php");

if (isset($role) && isset($user_id)) {
    if ($role == 'buyer') {
        // Query for buyer details
        $sql = "SELECT * FROM buyer WHERE B_ID = $user_id";
        $details = $conn->query($sql);

        if ($details->num_rows > 0) {
            $row = $details->fetch_assoc();
            
            if (isset($_POST['P_ID']) && isset($_POST['P_Base_Price'])) {
                $id = $_POST['P_ID'];
                $price = $_POST['P_Base_Price'];
            
                // Update product price and B_ID in the database
                $sql = "UPDATE product SET P_Base_Price='$price', B_ID='$user_id' WHERE P_ID=$id";
                if ($conn->query($sql)) {
                    header('Location: bidindex.php?product_id=' . $id); // Redirect back to the product page after update
                } else {
                    echo "Error updating price: " . $conn->error;
                }
            } else {
                echo "No product selected or price not provided.";
            }
        }
    } else {
        echo "<script>
        alert('Before placing a bid, you need to create a buyer account.');
        window.location.href = 'register.html'; 
        </script>";
        
    }
} else {
    echo "Invalid request.";
    
}
?>
