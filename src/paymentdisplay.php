<?php
include_once("sessionchecker.php");

// Assume $role and $user_id are obtained from the session
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>My Payment Details</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="styles/myaccount.css">
</head>

<body>
<div class="body1">

<?php
include_once("header.php");
?>

<div class="Table">
    <?php
    if (isset($role) && isset($user_id)) {
       
        // Query to select payment details relevant to the logged-in buyer
        $sql = "SELECT * FROM payment WHERE B_ID = $user_id";
        $details = $conn->query($sql);

        if ($details->num_rows > 0) {
            // Display the payment details in a table
            echo "<table>
                <tr><th>Payment ID</th><th>E-mail</th><th>Phone</th><th>Product ID</th><th>Edit</th><th>Delete</th></tr>";

            while ($row = $details->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['Pay_ID']}</td>
                    <td>{$row['Pay_email']}</td>
                    <td>{$row['Pay_phone']}</td>
                    <td>{$row['P_id']}</td>
                    <td><a href='editpayment.php?edit={$row['Pay_ID']}'>Edit</a></td>
                    <td><a href='deletepayment.php?delete={$row['Pay_ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                </tr>";
            }
            echo "</table>";
        } else {
            // If no payment details are available for this buyer
            echo "<p>No payment details found for your account.</p>";
        }
    } else {
        echo "<p>Error: User information not found. Please log in again.</p>";
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
