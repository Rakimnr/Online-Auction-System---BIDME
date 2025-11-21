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
                <li><a href="auction.php">Auction</a></li>
                <li><a href="uploadItem.html">Selling</a></li>
                <li><a href="#" class="active">My Account</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="shipping.php">Shipping</a></li>
               
            </ul>
        </nav>

<div class="Table">
    <!-- Now, check the role and display appropriate details -->
    <?php
    if (isset($role) && isset($user_id)) {
        if ($role == 'buyer') {
            // Query for buyer details
            $sql = "SELECT * FROM buyer WHERE B_ID = $user_id";
            $details = $conn->query($sql);

            if ($details->num_rows > 0) {
                $row = $details->fetch_assoc();
                echo "<table>
                    <tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Edit</th><th>Delete</th></tr>
                    <tr><td>{$row['B_Name']} {$row['B_Lname']}</td><td>{$row['B_Email']}</td><td>{$row['B_phone']}</td>
                    <td><a href='B_editmyaccount.php?edit={$row['B_ID']}'>Edit</a></td>
                    <td><a href='B_deletemyaccount.php?delete={$row['B_ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                    </tr>
                </table>";
            }
        }

        if ($role == 'seller') {
            // Query for seller details
            $sql = "SELECT * FROM seller WHERE S_ID = $user_id";
            $details = $conn->query($sql);

            if ($details->num_rows > 0) {
                $row = $details->fetch_assoc();
                echo "<table>
                    <tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Edit</th><th>Delete</th></tr>
                    <tr><td>{$row['S_Name']} {$row['S_Lname']}</td><td>{$row['S_Email']}</td><td>{$row['S_phone']}</td>
                    <td><a href='S_editmyaccount.php?edit={$row['S_ID']}'>Edit</a></td>
                    <td><a href='S_deletemyaccount.php?delete={$row['S_ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                    </tr>
                </table>";
            }
        }

        if ($role == 'auctioneer') {
            // Query for auctioneer details
            $sql = "SELECT * FROM auctioneer WHERE A_ID = $user_id";
            $details = $conn->query($sql);

            if ($details->num_rows > 0) {
                $row = $details->fetch_assoc();
                echo "<table>
                    <tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Edit</th><th>Delete</th></tr>
                    <tr><td>{$row['A_Name']} {$row['A_LName']}</td><td>{$row['A_Email']}</td><td>{$row['A_phone']}</td>
                    <td><a href='A_editmyaccount.php?edit={$row['A_ID']}'>Edit</a></td>
                    <td><a href='A_deletemyaccount.php?delete={$row['A_ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                    </tr>
                </table>";
            }
        }
    }
    ?>
</div>
<h3 style="margin:0px 0px 20px 200px;">Do you want to logout?</h3>
<form action="logout.php" method="">
<input type="submit" value="Log Out" id="sub" style="color: white;background-color: red;height: 40px; width: 150px;margin:0px 0px 20px 200px;cursor: pointer;" >
</form>
<!-- Footer content -->
<?php
include_once("footer.php");
?>

</div>
</body>
</html>
