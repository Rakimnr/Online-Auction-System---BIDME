<?php
include_once("connect.php");

// Get the form data
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$mobileNumber = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['psw'];
$userType = $_POST['userType'];  // This gets whether 'buyer', 'seller', or 'auctioneer' was selected

$errors = array();

// Check if the user is already registered
if ($userType == 'buyer') {
    $sql = "SELECT * FROM buyer WHERE B_Email='$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        array_push($errors, "Email already exists for a buyer!");
    }else{

        $sql = "SELECT * FROM seller WHERE S_Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0){
            array_push($errors, "Email already exists for a seller!");
        }
        
        $sql = "SELECT * FROM auctioneer WHERE A_Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if($rowCount>0){
            array_push($errors, "Email already exists for a auctioneer!");
        }


    }


} else if ($userType == 'seller') {
    $sql = "SELECT * FROM seller WHERE S_Email='$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        array_push($errors, "Email already exists for a seller!");

    }else{

        $sql = "SELECT * FROM buyer WHERE B_Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0){
            array_push($errors, "Email already exists for a buyer!");
        }

        $sql = "SELECT * FROM auctioneer WHERE A_Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if($rowCount>0){
            array_push($errors, "Email already exists for a auctioneer!");
        }


    }

} else if ($userType == 'auctioneer') {
    $sql = "SELECT * FROM auctioneer WHERE A_Email='$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        array_push($errors, "Email already exists for an auctioneer!");
    }else{

        $sql = "SELECT * FROM seller WHERE S_Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0){
            array_push($errors, "Email already exists for a seller!");
        }

        $sql = "SELECT * FROM buyer WHERE B_Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);

        if($rowCount>0){
            array_push($errors, "Email already exists for a buyer!");
        }


    }
}

// If errors are found, display an alert and redirect to the registration page
if (!empty($errors)) {
    echo "<script>
            alert('You are already registered with this email.');
            window.location.href = 'register.html'; // Redirects to the registration page
          </script>";
} else {
    // If no errors, proceed with the registration
    if ($userType == 'buyer') {
        $sql = "INSERT INTO buyer (B_Name, B_Lname, B_phone, B_Email, B_Password)
                VALUES ('$firstName', '$lastName', '$mobileNumber', '$email', '$password')";
    } else if ($userType == 'seller') {
        $sql = "INSERT INTO seller (S_Name, S_Lname, S_phone, S_Email, S_Password)
                VALUES ('$firstName', '$lastName', '$mobileNumber', '$email', '$password')";
    } else if ($userType == 'auctioneer') {
        $sql = "INSERT INTO auctioneer (A_Name, A_LName, A_phone, A_Email, A_Password)
                VALUES ('$firstName', '$lastName', '$mobileNumber', '$email', '$password')";
    }

    // Execute the query and check if the insertion was successful
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('New record created successfully!');
                window.location.href = 'login.html'; // Redirects to the login page after successful registration
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
