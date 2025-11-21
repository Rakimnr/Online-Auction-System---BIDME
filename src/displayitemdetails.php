<?php
include_once("sessionchecker.php");

// Assume $role and $user_id are obtained from the session
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>My Products</title>
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
        if ($role == 'seller') {
            // Query to select products relevant to the logged-in seller
            $sql = "SELECT * FROM product WHERE S_ID = $user_id";
            $details = $conn->query($sql);

            if ($details->num_rows > 0) {
                // Display the products in a table
                echo "<table>
                    <tr><th>Item Name</th><th>Description</th><th>Base Price</th><th>Date</th><th>Time</th><th>Edit</th><th>Delete</th></tr>";

                while ($row = $details->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['P_Name']}</td>
                        <td>{$row['P_Description']}</td>
                        <td>{$row['P_Base_Price']}</td>
                        <td>{$row['P_Date']}</td>
                        <td>{$row['P_Time']}</td>
                        <td><a href='edititem.php?edit={$row['P_ID']}'>Edit</a></td>
                        <td><a href='deleteItem.php?delete={$row['P_ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                    </tr>";
                }
                echo "</table>";
            } else {
                // If no products are available for this seller
                echo "<p>No products found for your account. Please upload some products.</p>";
            }
        } else {
            echo "<script>
                alert('You are not a seller. Please create a seller account and log in as a seller to view and upload products.');
                window.location.href = 'index.html';
            </script>";
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
