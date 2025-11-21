<?php
// Include the database connection file
include_once("connect.php"); // Make sure this file has the $conn variable
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details along with the highest bidder's first and last name
    $sql = "
        SELECT p.*, b.B_Name, b.B_Lname 
        FROM product p 
        LEFT JOIN buyer b ON p.B_ID = b.B_ID 
        WHERE p.P_ID = $product_id";
    $result = $conn->query($sql);

    if (!$result) {
        echo "SQL Error: " . $conn->error; // Print SQL error if any
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the product details
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "No product selected.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Auction</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <script>
    function validateBid() {
        // Fetch the current base price from the PHP variable
        var currentBasePrice = <?php echo $row['P_Base_Price']; ?>;

        // Fetch the new bid value from the input field
        var newBidValue = parseFloat(document.getElementById('num2').value);

        // Validate if the new bid is greater than the current base price
        if (newBidValue <= currentBasePrice) {
            alert("Your bid must be higher than the current base price of $" + currentBasePrice + ".");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
    </script>
</head>

<body>
    <div class="body1">
    <?php
       include_once("header.php");
       ?>
    
        <!-- Auction Content -->
        <div class="bid-image" style="float: left; margin: 70px 70px 30px 30px; text-align: center;width: 300px;height: 300px;overflow: hidden;">
            <img src="<?php echo $row['P_Image']; ?>" alt="Product Image" style=" width: 100%; height: auto; object-fit: cover; border: 3px solid black; border-radius: 10px;">
        </div>

        <h1 style="padding:40px;margin-top:50px;"><?php echo $row['P_Name']; ?></h1>
        <p class="price"  style="font-size:20px;color:blue"><?php echo $row['P_Description']; ?></p><br>

        <p style="font-size:20px;color:red">
            Current Highest Bidder: 
            <?php 
            if (isset($row['B_Name']) && isset($row['B_Lname'])) {
                echo $row['B_Name'] . ' ' . $row['B_Lname']; // Concatenate first and last name
            } else {
                echo 'No bids yet';
            }
            ?>
        </p><br>
        <p class="price" id="num1" style="font-size:20px;color:red">Current Price: $<?php echo $row['P_Base_Price']; ?></p><br>

        <!-- Form for bidding -->
        <?php  
        if ($row['auction_status'] === 'closed') {
            // Display auction closed message and winner details with styles
            echo '<div style="text-align: center; margin-top: 20px;">';
            echo '<h2 style="color: red;">Auction Closed</h2>'. '<br>';
            echo '<p style="font-size: 20px;">Current Highest Bidder: ' . $row['B_Name'] . ' ' . $row['B_Lname'] . '</p>';
            echo '<p style="font-size: 20px;">Product_ID: ' . $row['P_ID'] . ' ' . $row['P_ID'] . '</p>';
            echo '<p style="font-size: 20px;margin-left:350px; color: green;">Winning Bid: $' . $row['P_Base_Price'] . '</p>';
            echo '</div>';
            echo'<form action="paymentupload.php">';
            echo'<input type="submit" value="Pay" id="sub" style="color: white;background-color: red;height: 40px; width: 150px;margin:10px 0px 20px 900px;cursor: pointer;" >';
            echo'</form>';
        } else {
            // Display bidding form with styles
            echo '<form id="bidForm" method="POST" action="bidupdate.php" onsubmit="return validateBid();" style="margin-top: 20px;">';
            echo '<input type="hidden" name="P_ID" value="' . $row['P_ID'] . '">'; // Corrected line
            echo '<input type="text" id="num2" name="P_Base_Price" value="' . (isset($row['P_Base_Price']) ? $row['P_Base_Price'] : '') . '" style="height: 40px; width: 50%; padding: 5px;margin:30px 0px 10px 400px;" placeholder="Enter New Price $" required><br><br>';
            echo '<input type="submit" name="save" value="Place Bid" id="sub" style="width: 50%; height: 40px; color: white; background-color: black; padding: 10px 15px;margin:0px 0px 30px 400px; border: none; cursor: pointer;">';
            echo '<br><br>';        
            echo '</form>';
            echo '<form method="POST" action="auctioncontrol.php" style=" margin-top: 20px;">';
            echo '<input type="hidden" name="P_ID" value="' . $row['P_ID'] . '">';
            echo '<input type="submit" name="close" value="Close Auction" style=" margin-left:400px;width: 150px; height: 40px; color: white; background-color: red; padding: 10px 15px; border: none; cursor: pointer;">';
            echo '</form>';
        }
        ?>

       

        <br><br>
    </div>

    <!-- Footer -->
    <?php
       include_once("footer.php");
       ?>
</body>
</html>