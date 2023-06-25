<?php
    include("config.php");

    if (isset($_POST['submit'])) {
        $customer_id =              $_POST['customer_id'];
        $customer_name =      $_POST['customer_name'];
        $customer_address =              $_POST['customer_address'];
        $customer_number =            $_POST['customer_number'];
        $customer_postal =            $_POST['customer_postal'];
        $customer_email =       $_POST['customer_email'];
        $ship_id =            $_POST['ship_id'];

        // Update the product in the database
        $sql = "UPDATE customer_info SET customer_name = '$customer_name', customer_address= '$customer_address', customer_number = '$customer_number', customer_postal = '$customer_postal', customer_email = '$customer_email', ship_id = $ship_id WHERE customer_id = $customer_id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating product: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>
