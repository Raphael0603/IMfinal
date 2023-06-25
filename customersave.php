
<?php
        $customer_id  =         $_POST['customer_id'];
        $customer_name =        $_POST['customer_name'];
        $customer_address =        $_POST['customer_address'];
        $customer_number =        $_POST['customer_number'];
        $customer_postal =        $_POST['customer_postal'];
        $customer_email =        $_POST['customer_email'];
        $customer_country =        $_POST['customer_country'];
        $ship_id =        $_POST['ship_id'];

        include_once('config.php');

        $conn = new mysqli ($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO customer_info (customer_id, customer_name, customer_address, customer_number, customer_postal, customer_email, customer_country, ship_id) VALUES ($customer_id, '$customer_name', '$customer_address', '$customer_number', '$customer_postal', '$customer_email', '$customer_country', $ship_id)";

        if($conn->query($sql) === TRUE ) {
            $conn->close();
            header("Location: index.php");
        }else{
            echo "Error: " .$sql . "<br>" . $conn->error;
        }

    ?>