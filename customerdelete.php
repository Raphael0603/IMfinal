<?php
    include("config.php");

    if (isset($_GET['id'])) {
        $orderId = $_GET['id'];

        // Delete the product from the database
        $sql = "DELETE FROM customer_info WHERE customer_id = $orderId";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>
