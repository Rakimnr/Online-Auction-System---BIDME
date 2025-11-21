<?php
include_once("connect.php");

// Fetch all products from the product table
$query = "SELECT * FROM product";
$products = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles\oasstylesheet.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<div class="body1">

<nav1>
                    <ul>
                        <li><a href="login.html"><button class="btn1">Log in</button></a></li>
                        <li><a href="register.html"><button class="btn1">Sign Up</button></a></li>              
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
                        <li><a href="#" class="active">Auction</a></li>
                        <li><a href="uploadItem.html">Selling</a></li>
                        <li><a href="myaccount.php">My Account</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="shipping.php">Shipping</a></li>
                        
                    </ul>
                </nav>

<?php
if ($products->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($products)) {
?>
    <div class="card1" style="margin:30px">
        <img src="<?php echo $row['P_Image']; ?>" alt="product image" style="width:100%">
        <h1 style="padding:10px"><?php echo $row['P_Name']; ?></h1>
        <p style="color:red">Price: $<?php echo $row['P_Base_Price']; ?></p>
        <a href="bidindex.php?product_id=<?php echo $row['P_ID']; ?>">
            <p><button>View Details</button></p>
        </a>
    </div>
<?php
    }
} else {
    echo "<p>No products found in this category.</p>";
}
?>
</div>

<?php
include_once("footer.php");
?>

</body>
</html>
