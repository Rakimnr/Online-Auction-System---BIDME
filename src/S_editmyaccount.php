<?php
include_once("sessionchecker.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM seller WHERE S_ID = $id");
    $row = $result->fetch_assoc();
}

// Update buyer details
if (isset($_POST['update'])) {
    $id = $_POST['S_ID'];
    $name = $_POST['S_Name'];
    $lname = $_POST['S_Lname'];
    $phone = $_POST['S_phone'];

    $sql = "UPDATE seller SET S_Name='$name', S_Lname='$lname', S_phone='$phone' WHERE S_ID=$id";
    $conn->query($sql);
    header('Location: myaccount.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buyer</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<div class="body1">

<?php
include_once("header.php");
?>

    <h2 align="center">Edit Seller Details</h2>
    <div style="padding:20px">
    <form method="POST" action="S_editmyaccount.php" style="width: 60%; margin: 50px auto; padding: 20px; border: 1px solid #ccc; ">
        <input type="hidden" name="S_ID" value="<?php echo $row['S_ID']; ?>">
        <input type="text" name="S_Name" value="<?php echo $row['S_Name']; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="S_Lname" value="<?php echo $row['S_Lname']; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="S_phone" value="<?php echo $row['S_phone']; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="submit" name="update" value="Update" style="padding: 10px 15px; background-color: #5cb85c; color: white; border: none;">
    </form>
</div>
   
<?php
include_once("footer.php");
?>
</body>
</html>
