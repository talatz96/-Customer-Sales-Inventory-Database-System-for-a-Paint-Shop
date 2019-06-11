<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM salesperson_13038 ORDER BY sp_id"); // using mysqli_query instead
?>
 
<html>
<head>    
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Salesperson</title>
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
    <h1>SALESPERSON DETAILS</h1>
    
    <br/>
    <br/>

    <button onclick="window.location.href='/addsalesperson.html'">Add New Salesperson</button>

    <br><br/>

    <table class="table_main">
        <tr>
            <td class="table_headings">Salesperson ID</td>
            <td class="table_headings">Name</td>
            <td class="table_headings">Contact Number</td>
            <td class="table_headings">Customer List</td>
	        <td class="table_headings">Update</td>
        </tr>
        <?php 
       

        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['sp_id']."</td>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['contact_number']."</td>";
            echo "<td>".$res['customer_list']."</td>";
            echo "<td><a href=\"editsalesperson.php?id=$res[sp_id]\">Edit</a> | <a href=\"deletesalesperson.php?id=$res[sp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>

  	<footer>Talat Zubair_13038</footer>
</body>
</html>