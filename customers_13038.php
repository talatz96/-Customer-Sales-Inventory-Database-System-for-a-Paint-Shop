<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM customers ORDER BY customer_id"); // using mysqli_query instead
?>
 
<html>
<head>    
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Homepage</title>
</head>
    
<body>
      
    <br/>
    <ul>    
          <li><a href="customers_13038.php">Customers</a></li>
          <li><a href="salesperson_13038.php">Salesperson</a></li>
          <li><a href="products_13038">Product</a></li>
          <li><a href="users_13038.php">Users</a></li>
          <li style="float:right"><a class="active" href="logout.php">Log out</a></li>
    </ul>

    <br/>
    <br/>
    <br/>    

    <h1>CUSTOMER DETAILS</h1>
    
    <br/>
    <br/>


    <button onclick="window.location.href='/add.html'">Add New Customer</button>

    <br><br/>

    <table class="table_main">
        <tr>
            <td width="10px" class="table_headings">Customer ID</td>
            <td class="table_headings">Shop Name</td>
            <td class="table_headings">Customer Name</td>
            <td width="10px" class="table_headings">Contact Number</td>
            <td class="table_headings">Address</td>
            <td class="table_headings">Area</td>
            <td width="10px" class="table_headings">Geographical Coordinates</td>
	        <td class="table_headings">Update</td>
        </tr>
        <?php 
       

        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['customer_id']."</td>";
            echo "<td>".$res['shop_name']."</td>";
            echo "<td>".$res['customer_name']."</td>";    
            echo "<td>".$res['contact_number']."</td>";
            echo "<td>".$res['address']."</td>";
            echo "<td>".$res['area']."</td>";
            echo "<td>".$res['geo_coordinates']."</td>";
            echo "<td><a href=\"edit.php?id=$res[customer_id]\">Edit</a> | <a href=\"delete.php?id=$res[customer_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>

  	<footer>Talat Zubair_13038</footer>
</body>
</html>