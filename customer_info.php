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
    <h1>Add to Customer table</h1>
<form action="customersave.php" method="POST">
        <div class="prod prod_id">Customer ID: <br><input type="text" id="prod" name="customer_id" placeholder="Customer ID"required><br></div>
        <div class="prod prod_name">Customer Name: <br><input type="text" id="prod" name="customer_name" placeholder="Customer Name"required><br></div>
        <div class="prod prod_desc">Customer Address: <br><input type="text" id="prod" name="customer_address" placeholder="Customer Address"required><br></div>
        <div class="prod prod_desc">Customer Number: <br><input type="text" id="prod" name="customer_number" placeholder="Customer Number"required><br></div>
        <div class="prod prod_desc">Customer Postal: <br><input type="text" id="prod" name="customer_postal" placeholder="Customer Postal"required><br></div>
        <div class="prod prod_desc">Customer Email: <br><input type="text" id="prod" name="customer_email" placeholder="Customer Email"required><br></div>
        <div class="prod prod_desc">Customer Country: <br><input type="text" id="prod" name="customer_country" placeholder="Customer Country"required><br></div>
        <div class="prod prod_id">Shipment ID: <br><input type="text" id="prod" name="ship_id" placeholder="Shipment ID" required><br></div>
        <div class="subBtn"><input type="submit" id="AddBtn" name="submit" value="ADD DATA"></div>
    </form>
    <h1 class="header"><br>Customer</h1>
    <?php
        include("config.php");
        $sql = "SELECT * FROM customer_info";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Customer ID</th><th>Customer Name</th><th>Customer Address</th><th>Mobile Number</th><th>Postal Code</th><th>Email Address</th><th>Country</th><th>Shipment ID</th>";
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
                echo "<td>" . $row['order_id'] . "</td>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }    
    ?>
    <h1 class="header"><br>Shipment</h1>
    <?php
        include("config.php");
        $sql = "SELECT * FROM shipment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Shipment ID</th><th>Shipment Destination</th><th>Pack ID</th><th>Ship Date</th>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ship_id'] . "</td>";
                echo "<td>" . $row['ship_destination'] . "</td>";
                echo "<td>" . $row['pack_id'] . "</td>";
                echo "<td>" . $row['ship_date'] . "</td>";
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