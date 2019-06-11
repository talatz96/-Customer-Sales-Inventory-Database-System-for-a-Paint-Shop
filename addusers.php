<html>
<head>
    <title>Add New User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
 
<body>
<?php


include_once("config.php");

if(isset($_POST['Submit'])) 
{    
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
   // $user_type = $_POST['user_type'];
    $salesperson = $_POST['salesperson'];
        

        $result = mysqli_query($mysqli, "INSERT INTO users_13038 (user_id, username, password, salesperson) VALUES('$user_id','$username', '$password', '$salesperson')");
        
        //display success messages
        echo "<font color='blue'>User Added Successfully.";
        echo "<br/><a href='users_13038.php'>Back to User Records</a>";
}

?>
</body>
</html>