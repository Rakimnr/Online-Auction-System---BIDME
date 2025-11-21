<!DOCTYPE HTML>
<html>
<head>
    <title>Register </title>

    <link rel="stylesheet" href="styles/register.css">
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
                <li><a href="auction.php">Auction</a></li>
                <li><a href="uploadItem.html">Selling</a></li>
                <li><a href="myaccount.php">My Account</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li style="background-color:darkgoldenrod;"><a href="#"class="active">Shipping</a></li>
                
            </ul>
        </nav>
        <div class="reg">

            <h1>Shipping Details</h1>

            <form method="POST" action="insertshippingdetails.php">
                
                <div class="column">
                    <div class="input-box">
                        <label>Full Name*</label>
                        <input type="text" name="fullname" placeholder="Enter full Name..." required>
                    </div>
                    <div class="input-box">
                        <label>Country*</label>
                        <input type="text" name="country" placeholder="Enter Country..." required>
                    </div>
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>Street Address*</label>
                        <input type="text" name="street" placeholder="Enter Street Address..."  required>

                    </div>
                    <div class="input-box">
                        <label>Town/City*</label>
                        <input type="text"  name="town" placeholder="Enter Town/City..." >

                    </div>
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>Mobile Number</label>
                        <input type="phone" pattern="[0-9]{10}" placeholder="Enter Mobile Number..." name="mobile" required>

                    </div>
                    <div class="input-box">
                        <label>E-mail</label>
                        <input type="email" id="myEmail" name="email" placeholder="Enter Email..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />

                    </div>
                </div>
                <br />
               
                <input type="submit" value="Submit" id="submitbtn" ><br />
                

            </form>
            

        </div>

    </div>
    
    <form method="POST" action="displayshipping.php">
        <center>
        <input type="submit" value="Display shipping details" id="sub" style="color: white;background-color: red;height: 40px; width: 150px; cursor:pointer;" >
        </form>
</center><br><br>
</div>
<<?php
include_once("footer.php");
?>

</body>
</html>
