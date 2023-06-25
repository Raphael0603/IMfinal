<?php
        $id =           $_POST['id'];
        $customer_id =           $_POST['customer_id'];
        $ship_id  =          $_POST['ship_id'];
        $date_arrive =           $_POST['date_arrive'];

    
        include_once('config.php');

        $conn = new mysqli ($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO completed (id, customer_id, ship_id, date_arrive) VALUES ($id, $customer_id, $ship_id, '$date_arrive')";

        if($conn->query($sql) === TRUE ) {
            $conn->close();
            header("Location: index.php");
        }else{
            echo "Error: " .$sql . "<br>" . $conn->error;
        }

    ?>