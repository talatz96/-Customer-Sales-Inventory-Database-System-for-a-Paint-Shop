<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $sp_id = $_POST['sp_id'];  
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number']; 
    $customer_list = $_POST['customer_list'];

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE salesperson_13038 SET sp_id ='$sp_id', name='$name', contact_number = '$contact_number', customer_list = '$customer_list' WHERE sp_id = $sp_id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: salesperson_13038.php");
    }

?>
<?php
//getting id from url
$sp_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM salesperson_13038 WHERE sp_id = $sp_id");
 
while($res = mysqli_fetch_array($result))
{
    $sp_id = $res['sp_id'];
    $name = $res['name'];
    $contact_number = $res['contact_number'];
    $customer_list = $res['customer_list'];
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
    <h1>Update Salesperson Details</h1>
    <br/>
    
    <form name="form1" method="post" action="editsalesperson.php">
        <table class="table_add">
            <tr> 
                <td>Salesperson ID</td>
                <td><input type="text" name="sp_id" value="<?php echo $sp_id;?>"></td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Contact Number</td>
                <td><input type="text" name="contact_number" value="<?php echo $contact_number;?>"></td>
            </tr>
            <tr> 
                <td>Customer List</td>
                <td>
                <select name="customer_list">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                </td>         
            </tr>
            <tr>
                <td><input type="hidden" name="customer_id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <footer>Talat Zubair_13038</footer>
</body>
</html>