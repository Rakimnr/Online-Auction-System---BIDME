<?php
include_once("connect.php");

$sql = "SELECT * FROM category";
$all_categories = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    
<title>categories</title>

<link rel="stylesheet" href="styles\oasstylesheet2.css">
<script src = "js\oasscript.js"></script>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles\oasstylesheet.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
</head>
<body>

<?php
include_once("header.php");
?>
<br><br><br><br>



<div class="body1" style="display: flex; flex-wrap: wrap; gap: 20px; align-items: center;">

<?php
include_once("header.php");
?>

<?php
while ($row = mysqli_fetch_assoc($all_categories)) {
?>
    <div style="text-align: center;">
        <a href="categoryitem.php?category_id=<?php echo $row['C_ID']; ?>">
            <img class="laptop" src="uploads/<?php echo $row['file']; ?>" alt="category image" style="width: 35s0px; height: 300px;">
        </a>
        <h2 style="padding:10px"><?php echo $row['C_Name']; ?></h2>
    </div>

<?php
}
?>

</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>

  <img class="pay" src="images\cards.png"  alt ="furniture">


</footer>


<?php
include_once("footer.php");
?>

</body>
</html>
