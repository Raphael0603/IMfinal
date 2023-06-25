<?php
        $pack_id  =          $_POST['pack_id'];
        $order_id =          $_POST['order_id'];
        $status =               $_POST['status'];
    
        include_once('config.php');

        $conn = new mysqli ($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO pack (pack_id, order_id, status) VALUES ($pack_id, $order_id, '$status')";

        if($conn->query($sql) === TRUE ) {
            $conn->close();
            header("Location: index.php");
        }else{
            echo "Error: " .$sql . "<br>" . $conn->error;
        }

    ?>