<?php
session_start(); // Start the session
include_once("connect.php");

$username = $_POST['username'];
$pass = $_POST['psw'];

// Check buyer table
$sql = "SELECT * FROM buyer WHERE B_Email='$username'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);

if ($rowCount > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($pass == $row['B_Password']) {
        // Set session variables for buyer
        $_SESSION['user_id'] = $row['B_ID'];
        $_SESSION['role'] = 'buyer';  // Store role as buyer
        $_SESSION['username'] = $username;

        echo "<script>
            alert('Login successfully as Buyer!');
            window.location.href = 'index.html'; 
          </script>";
    } else {
        echo "<script>
            alert('Invalid buyer username or password');
            window.location.href = 'login.html'; 
          </script>";
    }
} else {
    // Check seller table
    $sql = "SELECT * FROM seller WHERE S_Email='$username'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($pass == $row['S_Password']) {
            // Set session variables for seller
            $_SESSION['user_id'] = $row['S_ID'];
            $_SESSION['role'] = 'seller';  // Store role as seller
            $_SESSION['username'] = $username;

            echo "<script>
                alert('Login successfully as Seller!');
                window.location.href = 'uploaditem.html'; 
              </script>";
        } else {
            echo "<script>
                alert('Invalid seller username or password');
                window.location.href = 'login.html'; 
              </script>";
        }
    } else {
        // Check auctioneer table
        $sql = "SELECT * FROM auctioneer WHERE A_Email='$username'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if ($rowCount > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($pass == $row['A_Password']) {
                // Set session variables for auctioneer
                $_SESSION['user_id'] = $row['A_ID'];
                $_SESSION['role'] = 'auctioneer';  // Store role as auctioneer
                $_SESSION['username'] = $username;

                echo "<script>
                    alert('Login successfully as Auctioneer!');
                    window.location.href = 'index.html'; 
                  </script>";
            } else {
                echo "<script>
                    alert('Invalid auctioneer username or password');
                    window.location.href = 'login.html'; 
                  </script>";
            }
        } else {
            // If username not found in any table
            echo "<script>
                alert('Username not found');
                window.location.href = 'login.html'; 
              </script>";
        }
    }
}
?>

