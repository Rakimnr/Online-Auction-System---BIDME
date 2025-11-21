<?php
include_once("sessionchecker.php");

// Assume $role and $user_id are obtained from the session
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>My Account</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="styles/myaccount.css">
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
                <li><a href="#" class="active">Shipping</a></li>
                
            </ul>
        </nav>

<div class="Table">
    <!-- Now, check the role and display appropriate details -->
    <?php
    if (isset($role) && isset($user_id)) {
        if ($role == 'buyer') {
            // Query for buyer details
            $sql = "SELECT * FROM shipping WHERE B_ID = $user_id";
            $details = $conn->query($sql);

            if ($details->num_rows > 0) {
                $row = $details->fetch_assoc();
                echo "<table>
                    <tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Street</th><th>Town/City</th><th>Country</th><th>Update</th><th>Delete</th></tr>
                    <tr><td>{$row['U_name']}</td><td>{$row['U_email']}</td><td>{$row['U_phone']}</td><td>{$row['U_address']}</td><td>{$row['U_city']}</td><td>{$row['U_country']}</td>
                    <td><a href='editshipping.php?edit={$row['Sh_id']}'>Edit</a></td>
                    <td><a href='deleteshipping.php?delete={$row['Sh_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                    </tr>
                </table>";
            }
        }
    } else {
        echo "<p>User role or ID not set. Please log in again.</p>";
    }
    ?>
</div>

<!-- Footer content -->
<?php
include_once("footer.php");
?>

</div>
</body>
</html>
