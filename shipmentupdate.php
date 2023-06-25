<?php
    include("config.php");

    if (isset($_POST['submit'])) {
        $ship_id =              $_POST['ship_id'];
        $ship_destination =      $_POST['ship_destination'];
        $pack_id =              $_POST['pack_id'];
        $ship_date =            $_POST['ship_date'];

        // Update the product in the database
        $sql = "UPDATE shipment SET ship_destination = '$ship_destination', pack_id = $pack_id, ship_date = '$ship_date' WHERE ship_id = $ship_id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating product: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>
