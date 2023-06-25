<?php
        $ship_id  =          $_POST['ship_id'];
        $ship_destination =  $_POST['ship_destination'];
        $pack_id =           $_POST['pack_id'];
        $ship_date =           $_POST['ship_date'];
    
        include_once('config.php');

        $conn = new mysqli ($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO shipment (ship_id, ship_destination, pack_id, ship_date ) VALUES ($ship_id, '$ship_destination', $pack_id, ' $ship_date')";

        if($conn->query($sql) === TRUE ) {
            $conn->close();
            header("Location: index.php");
        }else{
            echo "Error: " .$sql . "<br>" . $conn->error;
        }

    ?>