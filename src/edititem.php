<?php
include_once("sessionchecker.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // Fetch data from the product table, since you're editing product details
    $result = $conn->query("SELECT * FROM product WHERE P_ID = $id");

    if ($result->num_rows > 0) {
        // Fetch the row if it exists
        $row = $result->fetch_assoc();
    } else {
        echo "<p>No product found with the given ID.</p>";
        exit; // Stop the script if no product is found
    }
}

// Update product details
if (isset($_POST['update'])) {
    $id = $_POST['P_ID'];
    $name = $_POST['P_Name'];
    $des = $_POST['P_Description'];
    $date = $_POST['P_Date'];
    $time = $_POST['P_Time'];

    $sql = "UPDATE product SET P_Name='$name', P_Description='$des', P_Date='$date', P_Time='$time' WHERE P_ID=$id";
    $conn->query($sql);
    header('Location: displayitemdetails.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
</head>
<body>
<div class="body1">
   
<?php
include_once("header.php");
?>

    <h2 align="center" style="margin-top:30px">Edit Product Details</h2>
<div style="padding:20px">
    
    <form method="POST" action="edititem.php" style=" width: 60%; margin: 50px  auto 0px auto; padding: 20px; border: 1px solid #ccc;">
        <input type="hidden" name="P_ID" value="<?php echo $row['P_ID']; ?>" style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="P_Name" value="<?php echo isset($row['P_Name']) ? $row['P_Name'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="P_Description" value="<?php echo isset($row['P_Description']) ? $row['P_Description'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="P_Date" value="<?php echo isset($row['P_Date']) ? $row['P_Date'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="P_Time" value="<?php echo isset($row['P_Time']) ? $row['P_Time'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="submit" name="update" value="Update" style="padding: 10px 15px; background-color: #5cb85c; color: white; border: none;">
    </form>
</div>
</div>
    
<?php
include_once("footer.php");
?>

</body>
</html>
