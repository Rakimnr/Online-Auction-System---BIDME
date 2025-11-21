<?php
include_once("sessionchecker.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM auctioneer WHERE A_ID = $id");
    $row = $result->fetch_assoc();
}

// Update buyer details
if (isset($_POST['update'])) {
    $id = $_POST['A_ID'];
    $name = $_POST['A_Name'];
    $lname = $_POST['A_Lname'];
    $phone = $_POST['A_phone'];

    $sql = "UPDATE auctioneer SET A_Name='$name', A_Lname='$lname', A_phone='$phone' WHERE A_ID=$id";
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
    <h2 align="center" style="margin-top:30px;">Edit Auctioneer Details</h2>
<div style="padding-bottom:30px">
    <form method="POST" action="A_editmyaccount.php" style="width: 60%; margin: 50px auto; padding: 20px; border: 1px solid #ccc; ">
        <input type="hidden" name="A_ID" value="<?php echo $row['A_ID']; ?>">
        <input type="text" name="A_Name" value="<?php echo $row['A_Name']; ?>" required style="width: 95%; padding: 10px; margin: 10px 0;">
        <input type="text" name="A_LName" value="<?php echo $row['A_LName']; ?>" required style="width: 95%; padding: 10px; margin: 10px 0;">
        <input type="text" name="A_phone" value="<?php echo $row['A_phone']; ?>" required style="width: 95%; padding: 10px; margin: 10px 0;">
        <input type="submit" name="update" value="Update" style="padding: 10px 15px; background-color: #5cb85c; color: white; border: none;">
    </form>
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>
