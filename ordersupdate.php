<?php
    include("config.php");

    if (isset($_POST['submit'])) {
        $order_id =     $_POST['order_id'];
        $prod_id =      $_POST['prod_id'];
        $QTY =          $_POST['QTY'];
        $orderDate =    $_POST['order_date'];

        // Update the product in the database
        $sql = "UPDATE orders SET prod_id = $prod_id, QTY = '$QTY', order_date = '$orderDate' WHERE order_id = $order_id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error updating product: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>
