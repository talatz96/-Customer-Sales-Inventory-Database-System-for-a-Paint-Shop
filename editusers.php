<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $user_id = $_POST['user_id'];  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    $salesperson = $_POST['salesperson'];    

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users_13038 SET user_id ='$user_id', username='$username', password ='$password', user_type = '$user_type', salesperson = '$salesperson' WHERE user_id = $user_id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: users_13038.php");
    }

?>
<?php
//getting id from url
$user_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users_13038 WHERE user_id = $user_id");
 
while($res = mysqli_fetch_array($result))
{
    $user_id = $res['user_id'];
    $username = $res['username'];
    $password = $res['password'];
    $salesperson = $res['salesperson'];
}
?>


<html>
<head>    
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Edit Data</title>
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

    <h1>Update User Details</h1>
    <br/>
    
    <form name="form1" method="post" action="editusers.php">
        <table class="table_add">
            <tr> 
                <td>User ID</td>
                <td><input type="text" name="user_id" value="<?php echo $user_id;?>"></td>
            </tr>
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password;?>"></td>
            </tr>
            <tr>   
                <td>User Type</td>
                <td>
                <select name="user_type" type= "text" >
                <option value="salesman">Salesman</option>
                <option value="customer">Customer</option>
                <option value="salesmanager">Sales Manager</option>
                </select>
                </td>
            </tr>
            <tr> 
                <td>Salesperson ID</td>
                <td><input type="text" name="salesperson" value="<?php echo $salesperson;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="user_id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <footer>Talat Zubair_13038</footer>
</body>
</html>