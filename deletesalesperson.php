<?php


//including the database connection file
include("config.php");
 
//getting id of the data from url
$sp_id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM salesperson_13038 WHERE sp_id = $sp_id");
 

header("Location:salesperson_13038.php");


?>