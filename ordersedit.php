<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<style>
     *{
    background-color: rgb(211, 205, 205);
}


#prod{
    justify-content: center;
    width: 400px;
    height: 25px;
    padding: 3px;
    margin: 3px;
    border-radius: 4px;
    border: 1px solid white;
    text-align: center;
   
}
.prod{
    font-size: 15px;
    font-family: 'Lucida Sans';
    justify-content: center;
    align-items: center;
    display: row;
    color: black;
    font-weight: bold;
}


#AddBtn{
    height: 30px;
    width: 100px;
    border-radius: 4px;
    border: 0;
    background-color: rgb(73, 88, 228);
    transition: 0.5s;
    color: white;
    margin-top: 15px;
    align-items: center;
    justify-content: center;
    display: flex;

}

#AddBtn:hover{
    background-color: rgb(28, 158, 158);
}

th{
    width: 400px;
    padding: 10px;
    background-color: black;
    color: white;
}
tr{
    padding: 10px;
}
table{
    border: 1px solid;
    border-color: gray;
    margin: 25px;
    
}
td{
    border: 1px solid;
    border-color: gray;
    width: 50px;
    border-width: 1px;
    padding: 10px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

h2{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

#BACKbtn{
    height: 30px;
    width: 100px;
    border-radius: 4px;
    border: 0;
    background-color: rgb(73, 88, 228);
    transition: 0.5s;
    color: white;
    margin-bottom: 20px;

}

.search{
    width: 200px;
    height: 25px;
    padding: 3px;
    margin: 3px;
    border-radius: 4px;
    border: 1px solid;
    margin-left: 10px;

}

.search-input #search-term{
    width: 50%;
    height: 30px;
    padding: 3px;
    margin: 3px;
    border-radius: 4px;
    border: 1px solid black;
    margin-left: 50px;
    margin-top: 15px;
}
.seachBtn #search-Btn{
    height: 30px;
    width: 100px;
    border-radius: 4px;
    border: 0;
    background-color: rgb(53, 192, 48);
    transition: 0.5s;
    color: white;
    margin-left: 50px;
    margin-top: 15px;
}
.header{
    text-align: center;
}
h3{
    text-align: center;
}
.title{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 100px;
    text-align: center;
}
</style>
<body>
<?php
    include("config.php");

        if (isset($_GET['id'])) {
            $order_id = $_GET['id'];

            // Fetch the product from the database based on the product ID
            $sql = "SELECT * FROM orders WHERE order_id = $order_id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $orderId = $row['order_id'];
                $prodId = $row['prod_id'];
                $QTY = $row['QTY'];
                $orderDate = $row['order_date'];

                // Display the edit form with pre-filled values
                echo "
                <form action='ordersupdate.php' method='POST'>
                    <input type='hidden' name='order_id' value='$orderId'>
                    <div class='prod'><label for='prod_id'>Prod ID:</label></div>
                    <div class='prod'><input type='text' id='prod' name='prod_id' value='$prodId' required><br>
                    <div class='prod'><label for='QTY'>QTY:</label></div>
                   <input type='text' id='prod' name='QTY' value='$QTY' reqired><br>
                   <div class='prod'<label for='order_date'>Order Date:</label></div>
                    <input type='text' id='prod' name='order_date' value='$orderDate' ><br>
                    <div class='seachBtn'><input type='submit' id='search-Btn' name='submit' value='Update'></div>
                    
                </form>";
            } else {
                echo "Product not found.";
            }
             } else {
            echo "Invalid request.";
        }
    ?>
    <h1 class="header"><br>Orders</h1>
        <form action="index.php" method="POST">
        <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Add"></div>
    </form?>
        <?php
            include("config.php");
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Order ID</th><th>Product ID</th><th>QTY</th><th>Order Date</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['order_id'] . "</td>";
                    echo "<td>" . $row['prod_id'] . "</td>";
                echo "<td>" . $row['QTY'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>
    <form method="POST" action="index.php">
        <div class="backBtn"><input type="submit" id="BACKbtn" name="search" value="BACK"></div>
    </form>

</body>
</html>

