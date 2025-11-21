

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Item</title>
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
                <li><a href="#" class="active">Selling</a></li>
                <li><a href="myaccount.php">My Account</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="shipping.php">Shipping</a></li>
               
            </ul>
        </nav>
  

    <h1 style="text-align: center;color: rgb(42, 100, 60);margin-top:30px">Upload Payment Details.</h1><br><br>
    <form action="payment.php" method="POST" enctype="multipart/form-data"  style="margin-left: 30%;">
    <label for="name1">Product ID:</label>
    <input type="text" name="name1" required  style="height: 40px; ;width:50% ;margin-left:24px;"> <!-- P_ID (Product ID) --><br><br>
    
    <label for="base_price">Phone Number:</label>
    <input type="number" name="base_price" required  style="height: 40px; ;width:50% ;"> <!-- Pay_phone --><br><br>

    <label for="description">Email:</label>
    <input type="email" name="description" required  style="height: 40px; ;width:50% ;margin-left:58px;"> <!-- Pay_email --><br><br>

    <label for="image">Upload Image:</label>
    <input type="file" name="image" accept="image/*" required> <!-- Pay_image --><br><br>
    
    <input type="submit" value="Upload Payment" style="color: white;background-color: red;height: 40px; width: 150px;margin:0px 0px 20px 90px;cursor: pointer;">
</form>

    <form action="paymentdisplay.php">
        <input type="submit" value="Display Payment details" id="sub" style="color: white;background-color: #5cb85c;height: 40px; width: 150px;margin:0px 0px 20px 545px;cursor: pointer;" >

    </form>

    </nav>
    </body></div>

    </body></div>
</body>

<!---footer-->
<?php
       include_once("footer.php");
       ?>

</body>
</html>

</html>