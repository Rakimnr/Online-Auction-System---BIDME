<?php
include_once("sessionchecker.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    
    // Fetch data from the payment table
    $result = $conn->query("SELECT * FROM payment WHERE Pay_ID = $id");

    if ($result->num_rows > 0) {
        // Fetch the row if it exists
        $row = $result->fetch_assoc();
    } else {
        echo "<p>No payment found with the given ID.</p>";
        exit; // Stop the script if no payment is found
    }
}

// Update payment details
if (isset($_POST['update'])) {
    $id = $_POST['Pay_ID'];
    $email = $_POST['Pay_email'];
    $phone = $_POST['Pay_phone'];
    $product_id = $_POST['P_id'];

    // Correct the table name from `product` to `payment`
    $sql = "UPDATE payment SET Pay_email='$email', Pay_phone='$phone', P_id='$product_id' WHERE Pay_ID=$id";

    if ($conn->query($sql)) {
        // Redirect to the payment display page after update
        header('Location: paymentdisplay.php');
        exit;
    } else {
        echo "Error updating payment: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Payment Details</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<div class="body1">

<?php include_once("header.php"); ?>

<h2 align="center" style="margin-top:30px">Edit Payment Details</h2>
<div style="padding:20px">
    <form method="POST" action="editpayment.php" style="width: 60%; margin: 50px auto; padding: 20px; border: 1px solid #ccc;">
        <!-- Correct hidden input field name -->
        <input type="hidden" name="Pay_ID" value="<?php echo $row['Pay_ID']; ?>" style="width: 95%; padding: 10px; margin: 10px 0; ">
        
        <input type="email" name="Pay_email" value="<?php echo isset($row['Pay_email']) ? $row['Pay_email'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        
        <input type="number" name="Pay_phone" value="<?php echo isset($row['Pay_phone']) ? $row['Pay_phone'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        
        <input type="text" name="P_id" value="<?php echo isset($row['P_id']) ? $row['P_id'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        
        <input type="submit" name="update" value="Update" style="padding: 10px 15px; background-color: #5cb85c; color: white; border: none;">
    </form>
</div>
</div>

<?php include_once("footer.php"); ?>

</body>
</html>
