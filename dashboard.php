<?php
    session_start();
    include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/style.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <!--<a class="navbar-brand" href="#">INSURE</a>-->
                <img src="IMGS/logo2.png" alt="">
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class=""><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="register.html">Vehicle Registeration</a></li>
                    <li><a href="history.html">Payment History</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <!--<h2>INSURE</h2>-->
                <img src="IMGS/logo.png" alt="">
                <ul class="nav nav-pills nav-stacked">
                    <li class=""><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="register.html">Vehicle Registeration</a></li>
                    <li><a href="history.html">Payment History</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="well">
                    <h4>HELLO 
                        <?php
                            echo strtoupper($_SESSION['firstName']);
                        ?>
                    </h4>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Next Payment Due</h4>
                            <p>$1,300</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Previous Payment Paid</h4>
                            <p>$1,300</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Protection Plan</h4>
                            <p>Full Protection</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Discounts & Perks</h4>
                            <p>List of discounts</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <h4>Vehicle(s) Owned</h4><br>
                            <table>
                                <tr>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>VIN</th>
                                    <th>License Plate</th>
                                    <th>Color</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php
                                    $query = "SELECT Car_ID, userID, Make, Model, Yr, VIN_Num, License_Num, Color FROM Auto INNER JOIN Users ON Users.User_ID = Auto.userID WHERE userID='{$_SESSION['User_ID']}' AND firstName='{$_SESSION['firstName']}'";
                                    $resultOfQuery = mysqli_query($conn, $query);

                                    while($row = mysqli_fetch_assoc($resultOfQuery)) {             
                                        
                                        $getCarID = $row['Car_ID'];
                                        $getMake = $row['Make'];
                                        $getModel = $row['Model'];
                                        $getYear = $row['Yr'];
                                        $getVIN = $row['VIN_Num'];
                                        $getLicense = $row['License_Num'];
                                        $getColor = $row['Color'];
                                ?>
                                    <tr>
                                        <td><?php echo $getMake?></td>
                                        <td><?php echo $getModel?></td>
                                        <td><?php echo $getYear?></td>
                                        <td><?php echo $getVIN?></td>
                                        <td><?php echo $getLicense?></td>
                                        <td><?php echo $getColor?></td>
                                        <td><a href="edit.php?ID=<?php echo $getCarID?>"><button type="submit" name="edit" id="myEditBtn" class="btn btn-primary">EDIT</button></a></td>
                                        <td><a href="delete.php?ID=<?php echo $getCarID?>"><button type="submit" name="delete" id="myDeleteBtn" class="btn btn-primary">DELETE</button></a></td>
                                    </tr>
                                <?php } ?> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>