<?php


//including the database connection file
include("config.php");
 
//getting id of the data from url
$product_id = $_GET['id'];

 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM products_13038 WHERE product_id = $product_id");
 
//redirecting to the display page (index.php in our case)
header("Location:products_13038.php");


?>