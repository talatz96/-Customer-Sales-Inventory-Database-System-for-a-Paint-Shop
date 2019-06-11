<?php
	include_once("login.php");
	session_start();
	session_destroy();
	mysqli_query($connection, "UPDATE users_13038 SET active = '0' WHERE username = '$username'");
    header('Location: login.php');
?>