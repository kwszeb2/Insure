<?php
    session_start();
    include('config.php');
    $errors = array();

    if (isset($_POST['account'])) {

        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $state = mysqli_real_escape_string($conn, $_POST['st']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $zip = mysqli_real_escape_string($conn, $_POST['zip']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        
        // error messages will be displayed for every blank input
        if (empty($fname)) { array_push($errors, "First Name is required"); }
        if (empty($lname)) { array_push($errors, "Last Name is required"); }
        if (empty($address)) { array_push($errors, "Address is required"); }
        if (empty($state)) { array_push($errors, "State is required"); }
        if (empty($city)) { array_push($errors, "City is required"); }
        if (empty($zip)) { array_push($errors, "Zip Code is required"); }
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($pass)) { array_push($errors, "Password is required"); }

        // If the form is error free, then register the user
        if (count($errors) == 0) {
            $sql = "INSERT INTO Users (firstName, lastName, email, passcode, streetAddress, city, st, zip)
            VALUES('$fname', '$lname', '$email', '$pass', '$address', '$city', '$state', '$zip')";

            mysqli_query($conn, $sql);
            $_SESSION['fname'] = $fname;
            header('location: dashboard.php');
        }
    }
    else if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $remeber = isset($_POST['remember']);
        
         // Error message if the input field is left blank
         if (empty($email)) {
            array_push($errors,"Email is required");
        }
        if (empty($pass)) {
            array_push($errors,"Password is required");
        }

        // Checking for the errors
        if (count($errors) == 0) {
            $query = "SELECT User_ID, firstName, email, passcode FROM Users WHERE email='$email' AND passcode='$pass'";
            $resultOfQuery = mysqli_query($conn, $query);
            
           // if (mysqli_num_rows($resultOfQuery) > 0) {
            if (mysqli_num_rows($resultOfQuery) == 1) {  
                if($remeber == true){
                    while($row=mysqli_fetch_array($resultOfQuery)){
                        setcookie('email', $row['email'], time() + 60 * 60 * 24); // set cookies for 24 hrs...if you want to set cookies for 30 days just add  *30
                        setcookie('pass', $row['passcode'], time() + 60 * 60 * 24);
                    }
                }
                while($row=mysqli_fetch_array($resultOfQuery)){
                    $_SESSION['User_ID'] = $row['User_ID'];
                    $_SESSION['firstName'] = $row['firstName'];
                    header('location: dashboard.php');
                }
            }
        }
        else{
            array_push($errors, "Email or Password is incorrect. Please try again!!");
        }
    }
    else if(isset($_POST['resetPass'])){

        $email = $_POST['Email'];
        $resetPass = $_POST['user-pass'];
        $resetPassConfirm = $_POST['user-passConfirm'];
        
        if($resetPass == $resetPassConfirm){
            
            $query = "SELECT User_ID, email, passcode FROM Users WHERE email='$email'";
            $resultOfQuery = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($resultOfQuery)) {             
                                            
                $getuserID = $row['User_ID'];
                
                $sql = "UPDATE Users SET passcode='$resetPassConfirm' WHERE User_ID='$getuserID' AND email='$email'";
                mysqli_query($conn, $sql);
                header('location: index.html');
            }
        }
    } 
    else if (isset($_POST['regCar'])) {
        
        $getID = $_SESSION['User_ID'];
        $make = mysqli_real_escape_string($conn, $_POST['make']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $yr = mysqli_real_escape_string($conn, $_POST['year']);
        $vin = mysqli_real_escape_string($conn, $_POST['vin']);
        $license = mysqli_real_escape_string($conn, $_POST['license']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $ID = mysqli_real_escape_string($conn, $_POST[$getID]);

        $_SESSION['make'] = $make;
        $_SESSION['model'] = $model;
        $_SESSION['year'] = $yr;
        $_SESSION['vin'] = $vin;
        $_SESSION['license'] = $license;
        $_SESSION['color'] = $color;

        // error messages will be displayed for every blank input
        if (empty($make)) { array_push($errors, "Make is required"); }
        if (empty($model)) { array_push($errors, "Model is required"); }
        if (empty($yr)) { array_push($errors, "Year is required"); }
        if (empty($vin)) { array_push($errors, "VIN is required"); }
        if (empty($license)) { array_push($errors, "License number is required"); }
        if (empty($color)) { array_push($errors, "Color is required"); }

        if (count($errors) == 0) {
            $sql = "INSERT INTO Auto (Make, Model, Yr, VIN_Num, License_Num, Color, userID)
            VALUES('$make', '$model', '$yr', '$vin', '$license', '$color', '$getID')";
        
            mysqli_query($conn, $sql);
            header('location: dashboard.php');
        }
    }
    
    else if (isset($_POST['updateCar'])) {
        
        $getUserID = $_SESSION['User_ID'];
        $getCarID = $_SESSION['Car_ID'];
        
        $make = mysqli_real_escape_string($conn, $_POST['car-make']);
        $model = mysqli_real_escape_string($conn, $_POST['car-model']);
        $yr = mysqli_real_escape_string($conn, $_POST['car-year']);
        $vin = mysqli_real_escape_string($conn, $_POST['car-vin']);
        $license = mysqli_real_escape_string($conn, $_POST['car-license']);
        $color = mysqli_real_escape_string($conn, $_POST['car-color']);
        //$ID = mysqli_real_escape_string($conn, $_POST[$getID]);
        
        // error messages will be displayed for every blank input
        if (empty($make)) { array_push($errors, "Make is required"); }
        if (empty($model)) { array_push($errors, "Model is required"); }
        if (empty($yr)) { array_push($errors, "Year is required"); }
        if (empty($vin)) { array_push($errors, "VIN is required"); }
        if (empty($license)) { array_push($errors, "License number is required"); }
        if (empty($color)) { array_push($errors, "Color is required"); }

        if (count($errors) == 0) {
            $sql = "UPDATE Auto SET Make='$make', Model='$model', Yr='$yr', VIN_Num='$vin', License_Num='$license', Color='$color', userID='$getUserID' WHERE Car_ID='$getCarID'";
            echo $sql;
            mysqli_query($conn, $sql);
            header('location: dashboard.php');
        }
        
    }
?>