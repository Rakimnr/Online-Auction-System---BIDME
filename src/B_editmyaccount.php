<?php
include_once("sessionchecker.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM buyer WHERE B_ID = $id");
    $row = $result->fetch_assoc();
}

// Update buyer details
if (isset($_POST['update'])) {
    $id = $_POST['B_ID'];
    $name = $_POST['B_Name'];
    $lname = $_POST['B_Lname'];
    $phone = $_POST['B_phone'];

    $sql = "UPDATE buyer SET B_Name='$name', B_Lname='$lname', B_phone='$phone' WHERE B_ID=$id";
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

    <h2 align="center" style="margin-top:30px">Edit Buyer Details</h2>

    <form method="POST" action="B_editmyaccount.php" style="width: 60%; margin: 50px auto; padding: 20px; border: 1px solid #ccc;">
        <input type="hidden" name="B_ID" value="<?php echo $row['B_ID']; ?>">
        <input type="text" name="B_Name" value="<?php echo $row['B_Name']; ?>" required style=" width: 95%; padding: 10px; margin: 10px 0;">
        <input type="text" name="B_Lname" value="<?php echo $row['B_Lname']; ?>" required style=" width: 95%; padding: 10px; margin: 10px 0;">
        <input type="text" name="B_phone" value="<?php echo $row['B_phone']; ?>" required style=" width: 95%; padding: 10px; margin: 10px 0;">
        <input type="submit" name="update" value="Update" style=" padding: 10px 15px; background-color: #5cb85c; color: white; border: none;">
    </form>

    <?php
include_once("footer.php");
?>
</div>
</body>
</html>
