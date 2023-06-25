<?php
    include("config.php");

    if (isset($_POST['submit'])) {
        $pack_id =     $_POST['pack_id'];
        $order_id =      $_POST['order_id'];
        $status =          $_POST['status'];

        // Update the product in the database
        $sql = "UPDATE pack SET order_id = $order_id, status = '$status' WHERE pack_id = $pack_id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating product: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>