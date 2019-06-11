<?php


//including the database connection file
include("config.php");
 
//getting id of the data from url
$user_id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users_13038 WHERE user_id = $user_id");
 
//redirecting to the display page (index.php in our case)
header("Location:users_13038.php");


?>