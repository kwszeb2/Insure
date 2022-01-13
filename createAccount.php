<?php
include_once 'config.php';
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $st = $_POST['st'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO `Users` (firstName, lastName, email, passcode, streetAddress, city, st, zip)
    VALUES('$fname', '$lname', '$email', '$pass', '$address', '$city', '$st', '$zip')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    print_r($sql);
    mysqli_close($conn);

?>