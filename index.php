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
</style>
<body>
    <h1 class="title">E-COMMERCE SHIPMENT SYSTEM</h1>
    <h1 class="header">Products</h1><h3>(sample products only - NOTE: Only online payment is supported)</h3>
    <!-- <form action="products.php" method="POST">
        <div class="prod_id">Product ID: <input type="text" id="prod" name="prod_id" placeholder="Product ID"required><br></div>
        <div class="prod_name">Product Name: <input type="text" id="prod" name="prod_name" placeholder="Product Name"required><br></div>
        <div class="prod_desc">Product Description: <input type="text" id="prod" name="prod_desc" placeholder="Product Description"required><br></div>
        <div class="prod_desc">Price: <input type="text" id="prod" name="price" placeholder="Price"required><br></div>
        <div class="subBtn"><input type="submit" id="AddBtn" name="submit" value="ADD DATA"></div>
</form> -->
   <form method="POST" action="search.php">
        <div class="search-input"><input type="text" id="search-term" name="searchTerm" placeholder="Search item..." required></div>
        <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Search"></div>
    </form>
    <?php
        include("config.php");
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Product ID</th><th>Product Name</th><th>Product Description</th><th>Price</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['prod_id'] . "</td>";
                echo "<td>" . $row['prod_name'] . "</td>";
                echo "<td>" . $row['prod_desc'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['prod_id'] . "'>Edit</a> | ";
                echo "<a href='delete.php?id=" . $row['prod_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>

<h1 class="header"><br>Orders</h1>
    <form action="orders.php" method="POST">
    <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Add"></div>
    </form>
    <?php
        include("config.php");
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Order ID</th><th>Product ID</th><th>QTY</th><th>Order Date</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['prod_id'] . "</td>";
                echo "<td>" . $row['QTY'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td>";
                echo "<a href='ordersedit.php?id=" . $row['order_id'] . "'>Edit</a> | ";
                echo "<a href='ordersdelete.php?id=" . $row['order_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>

    <!-- <form method="POST" action="search.php">
        <div class="search-input"><input type="text" id="search-term" name="searchTerm" placeholder="Search item..." required></div>
        <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Search"></div>
    </form> -->
    <h1 class="header"><br>Packing Status</h1>
    <form action="pack.php" method="POST">
    <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Add"></div>
    </form>
    <?php
        include("config.php");
        $sql = "SELECT * FROM pack";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Pack ID</th><th>Order ID</th><th>Status</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['pack_id'] . "</td>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo "<a href='packedit.php?id=" . $row['pack_id'] . "'>Edit</a> | ";
                echo "<a href='packdelete.php?id=" . $row['pack_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>
    <h1 class="header"><br>Shipment</h1>
    <form action="shipment.php" method="POST">
    <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Add"></div>
    </form>
    <?php
        include("config.php");
        $sql = "SELECT * FROM shipment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Shipment ID</th><th>Shipment Destination</th><th>Pack ID</th><th>Ship Date</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ship_id'] . "</td>";
                echo "<td>" . $row['ship_destination'] . "</td>";
                echo "<td>" . $row['pack_id'] . "</td>";
                echo "<td>" . $row['ship_date'] . "</td>";
                echo "<td>";
                echo "<a href='shipmentedit.php?id=" . $row['ship_id'] . "'>Edit</a> | ";
                echo "<a href='shipmentdelete.php?id=" . $row['ship_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>
     <h1 class="header"><br>Customer</h1>
    <form action="customer_info.php" method="POST">
    <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Add"></div>
    </form>
    <?php
        include("config.php");
        $sql = "SELECT * FROM customer_info";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Customer ID</th><th>Customer Name</th><th>Customer Address</th><th>Mobile Number</th><th>Postal Code</th><th>Email Address</th><th>Country</th><th>Shipment ID</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['customer_id'] . "</td>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['customer_address'] . "</td>";
                echo "<td>" . $row['customer_number'] . "</td>";
                echo "<td>" . $row['customer_postal'] . "</td>";
                echo "<td>" . $row['customer_email'] . "</td>";
                echo "<td>" . $row['customer_country'] . "</td>";
                echo "<td>" . $row['ship_id'] . "</td>";
                echo "<td>";
                echo "<a href='customeredit.php?id=" . $row['customer_id'] . "'>Edit</a> | ";
                echo "<a href='customerdelete.php?id=" . $row['customer_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>


     <h1 class="header"><br>Completed</h1>
    <form action="completed.php" method="POST">
    <div class="seachBtn"><input type="submit" id="search-Btn" name="search" value="Add"></div>
    </form>
    <?php
        include("config.php");
        $sql = "SELECT * FROM completed";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th><th>Customer ID</th><th>Ship ID</th><th>Date Arrive</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['customer_id'] . "</td>";
                echo "<td>" . $row['ship_id'] . "</td>";
                echo "<td>" . $row['date_arrive'] . "</td>";
                echo "<td>";
                echo "<a href='customeredit.php?id=" . $row['customer_id'] . "'>Edit</a> | ";
                echo "<a href='customerdelete.php?id=" . $row['customer_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>
    <!-- <?php
        include("config.php");
        $sql = "SELECT product.prod_id, customer_name, customer_address, customer_number,  prod_name, price, orders.order_id, QTY, order_date, ship_destination from product, customer_info, orders, shipment WHERE product.prod_id = orders.prod_id AND shipment.ship_id AND customer_info.ship_id AND pack.pack_id = shipment.pack_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Shipment ID</th><th>Shipment Destination</th>><th>Pack ID</th><th>Ship Date</th><th>Modify</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ship_id'] . "</td>";
                echo "<td>" . $row['ship_destination'] . "</td>";
                echo "<td>" . $row['pack_id'] . "</td>";
                echo "<td>" . $row['ship_date'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['ship_id'] . "'>Edit</a> | ";
                echo "<a href='deleteCustomer.php?id=" . $row['ship_id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?> -->
</body>
</html>
