<?php


//including the database connection file
include("config.php");
 
//getting id of the data from url
$customer_id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM customers WHERE customer_id = $customer_id");
 
//redirecting to the display page (index.php in our case)
header("Location:customers_13038.php");


?>