<?php
include_once("sessionchecker.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // Ensure that the query returns a valid result
    $result = $conn->query("SELECT * FROM shipping WHERE Sh_id = $id");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No data found for the given ID.";
        exit; // Stop the script if no data is found
    }
}

// Update buyer details
if (isset($_POST['update'])) {
    $id = $_POST['Sh_id'];
    $name = $_POST['U_name'];
    $con = $_POST['U_country'];
    $add = $_POST['U_address'];
    $city= $_POST['U_city'];
    $phone = $_POST['U_phone'];
    $email = $_POST['U_email'];

    // Update the database with the new data
    $sql = "UPDATE shipping SET U_name='$name', U_country='$con', U_address='$add',U_city='$city',U_phone='$phone',U_email='$email' WHERE Sh_id=$id";
    $conn->query($sql);
    header('Location: displayshipping.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buyer</title>
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<div class="body1">

<nav1>
            <ul>
                <li><a href="login.html"><button class="btn1">Log in</button></a></li>
                
        
        
            </ul>
        </nav1>
        
        <!---logo-->
        <div class="logo">
            <a href="#">
                <img  src="images/logo2.jpg">
                
            </a>
           
        </div>
        
        <!---Nav bar-->
        <nav>
            <ul>
                <li style="padding-left: 100px;"><a href="index.html">Home</a></li>
                <li><a href="category.php">Catagories</a></li>
                <li><a href="auction.php">Auction</a></li>
                <li><a href="uploadItem.html">Selling</a></li>
                <li><a href="myaccount.php">My Account</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="shipping.php">Shipping</a></li>
                <li>
                    <div class="search-container">
                        <form action="">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    <h2 align="center" style="margin:20px;">Edit Shipping Details</h2>

    <form method="POST" action="editshipping.php" style="width: 60%; margin: 50px auto; padding: 20px; border: 1px solid #ccc;">
        <div class="upship">
        <input type="hidden" name="Sh_id" value="<?php echo isset($row['Sh_id']) ? $row['Sh_id'] : ''; ?>" style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="U_name" value="<?php echo isset($row['U_name']) ? $row['U_name'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="U_country" value="<?php echo isset($row['U_country']) ? $row['U_country'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="U_address" value="<?php echo isset($row['U_address']) ? $row['U_address'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="U_city" value="<?php echo isset($row['U_city']) ? $row['U_city'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="U_phone" value="<?php echo isset($row['U_phone']) ? $row['U_phone'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
        <input type="text" name="U_email" value="<?php echo isset($row['U_email']) ? $row['U_email'] : ''; ?>" required style="width: 95%; padding: 10px; margin: 10px 0; ">
</div>
        <input type="submit" name="update" value="Update" style=" padding: 10px 15px; background-color: #5cb85c; color: white; border: none;">
    </form>
</div>
<footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="https://facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://about.x.com/"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="tc.html">Terms and Conditions</a></li>
                </ul>
            </div>
            <p>Copyright &copy;2024; Designed by  Sanjula/Thushan/Rakindu/Chenath</p>
        </div>
    </footer>
</body>
</html>
