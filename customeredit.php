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
            $customer_id = $_GET['id'];

            // Fetch the product from the database based on the product ID
            $sql = "SELECT * FROM customer_info WHERE customer_id = $customer_id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $customer_id = $row['customer_id'];
                $customer_name = $row['customer_name'];
                $customer_address = $row['customer_address'];
                $customer_number = $row['customer_number'];
                $customer_postal = $row['customer_postal'];
                $customer_email = $row['customer_email'];
                $customer_country = $row['customer_country'];
                $ship_id = $row['ship_id'];

                // Display the edit form with pre-filled values
                echo "
                <form action='customerupdate.php' method='POST'>
                    <input type='hidden' name='customer_id' value='$customer_id'>
                    <div class='prod'><label for='prod_id'>Customer Name:</label></div>
                    <div class='prod'><input type='text' id='prod' name='customer_name' value='$customer_name' required><br>
                    <div class='prod'><label for='prod_id'>Customer Address:</label></div>
                    <div class='prod'><input type='text' id='prod' name='customer_address' value='$customer_address' required><br>
                    <div class='prod'><label for='QTY'>Customer Number:</label></div>
                   <input type='text' id='prod' name='customer_number' value='$customer_number' reqired><br>
                   <div class='prod'<label for='order_date'>Customer Postal:</label></div>
                    <input type='text' id='prod' name='customer_postal' value='$customer_postal' ><br>
                    <div class='prod'<label for='order_date'>Customer Email:</label></div>
                    <input type='text' id='prod' name='customer_email' value='$customer_email' ><br>
                    <div class='prod'<label for='order_date'>Customer Country:</label></div>
                    <input type='text' id='prod' name='customer_country' value='$customer_country' ><br>
                    <div class='prod'<label for='order_date'>Shipment ID:</label></div>
                    <input type='text' id='prod' name='ship_id' value='$ship_id' ><br>
                    <div class='seachBtn'><input type='submit' id='search-Btn' name='submit' value='Update'></div>
                    
                </form>";
            } else {
                echo "Product not found.";
            }
             } else {
            echo "Invalid request.";
        }
    ?>
    <?php
        include("config.php");
        $sql = "SELECT * FROM customer_info";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Customer ID</th><th>Customer Name</th><th>Customer Address</th><th>Mobile Number</th><th>Postal Code</th><th>Email Address</th><th>Country</th><th>Shipment ID</th><th>Order ID ID</th>";
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
    <form method="POST" action="index.php">
        <div class="backBtn"><input type="submit" id="BACKbtn" name="search" value="BACK"></div>
    </form>

</body>
</html>

