<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products_13038 ORDER BY product_id"); // using mysqli_query instead
?>
 
<html>
<head>    
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Products</title>
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
    <h1>PRODUCT DETAILS</h1>
    
    <br/>
    <br/>

    <button onclick="window.location.href='/addproduct.html'">Add New Product</button>

    <br><br/>                           

    <table class="table_main">
        <tr>
            <td class="table_headings">Product Code</td>
            <td class="table_headings">Brand</td>
            <td class="table_headings">Type</td>
            <td class="table_headings">Shade</td>
            <td class="table_headings">Size</td>
            <td class="table_headings">Price</td>
	        <td class="table_headings">Update</td>
        </tr>
        <?php 
       

        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['product_id']."</td>";
            echo "<td>".$res['brand']."</td>";
            echo "<td>".$res['type']."</td>";    
            echo "<td>".$res['shade']."</td>";
            echo "<td>".$res['size']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "<td><a href=\"editproducts.php?id=$res[product_id]\">Edit</a> | <a href=\"deleteuproducts.php?id=$res[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
       
        }
        ?>
    </table>

  	<footer>Talat Zubair_13038</footer>
</body>
</html>