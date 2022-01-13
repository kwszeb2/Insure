<?php
    require_once('config.php');
    
    if(isset($_GET['ID'])){
        $getcID = $_GET['ID'];
        $query = "DELETE FROM Auto WHERE Car_ID='$getcID'";

        $resultOfQuery = mysqli_query($conn, $query);

        if($resultOfQuery){
            header("location:dashboard.php");
        }
    }
    else{
        header("location:dashboard.php");
    }
?>