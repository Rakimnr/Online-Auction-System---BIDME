<?php
include_once("connect.php");

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Fetch products based on the category ID
    $sql = "SELECT * FROM product WHERE C_ID = $category_id";
    $products = $conn->query($sql);

    // Fetch the category name (optional, to display the category name on the page)
    $category_sql = "SELECT C_Name FROM category WHERE C_ID = $category_id";
    $category_result = $conn->query($category_sql);
    $category_row = $category_result->fetch_assoc();
    $category_name = $category_row['C_Name'];
} else {
    echo "No category selected.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $category_name; ?> Products</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/oasstylesheet.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body>

<div class="body1">

   <?php
   include_once("header.php");
   ?>

<center><h2 style="margin:40px;font-size:40px;" >Products in <?php echo $category_name; ?></h2></center>

<?php
if ($products->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($products)) {
?>
    <div class="card1" style="margin:30px">
        <img src="<?php echo $row['P_Image']; ?>" alt="product image" style="width:100%">
        <h1 style="padding:10px"><?php echo $row['P_Name']; ?></h1><br>
        <p style="color:red">Price: $<?php echo $row['P_Base_Price']; ?></p>
        <a href="bidindex.php?product_id=<?php echo $row['P_ID']; ?>">
            <br>
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
