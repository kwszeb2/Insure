<?php 
    session_start();
    require_once('config.php');
    $getcID = $_GET['ID'];
    
    $query = "SELECT * FROM Auto WHERE Car_ID='".$getcID."'";
    $resultOfQuery = mysqli_query($conn, $query);

     
    while($row = mysqli_fetch_assoc($resultOfQuery)) {
        $_SESSION['Car_ID'] = $row['Car_ID'];
        $getMake = $row['Make'];
        $getModel = $row['Model'];
        $getYear = $row['Yr'];
        $getVIN = $row['VIN_Num'];
        $getLicense = $row['License_Num'];
        $getColor = $row['Color'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Registeration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/style.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
 <div class="col-sm-9">
    <div class="well">
        <h2 style="text-align: center;">UPDATE VEHICLE REGISTRATION</h2>
    </div>
    <div class="well">
        <form action="server.php" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="formLabel">
                        <label for="make">Make</label>
                    </div>
                    <input type="text" name="car-make" required value="<?php echo $getMake?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="formLabel">
                        <label for="model">Model</label>
                    </div>
                    <input type="text" name="car-model" required value="<?php echo $getModel?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="formLabel">
                        <label for="year">Year</label>
                    </div>
                    <input type="text" name="car-year" required value="<?php echo $getYear?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="formLabel">
                        <label for="vin">VIN</label>
                    </div>
                    <input type="text" name="car-vin" required value="<?php echo $getVIN?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="formLabel">
                        <label for="license">License Number</label>
                    </div>
                    <input type="text" name="car-license" required value="<?php echo $getLicense?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="formLabel">
                        <label for="color">Color</label>
                    </div>
                    <input type="text" name="car-color" required value="<?php echo $getColor?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" name="updateCar" class="btn btn-primary btn-lg">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>