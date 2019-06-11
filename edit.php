<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $customer_id = $_POST['customer_id'];  
    $shop_name = $_POST['shop_name'];
    $customer_name = $_POST['customer_name'];
    $contact_number = $_POST['contact_number'];    
    $address = $_POST['address'];
    $area = $_POST['area'];
    $geo_coordinates = $_POST['geo_coordinates']; 

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE customers SET customer_id ='$customer_id', shop_name='$shop_name', customer_name ='$customer_name', contact_number = '$contact_number', address = '$address', area = '$area', geo_coordinates = '$geo_coordinates' WHERE customer_id = $customer_id");
        
        //redirectig to the display page. In our case, it is index.php
 //       header("Location: customers_13038.php");
    }

?>
<?php
//getting id from url
$customer_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM customers WHERE customer_id = $customer_id");
 
while($res = mysqli_fetch_array($result))
{
    $customer_id = $res['customer_id'];
    $shop_name = $res['shop_name'];
    $customer_name = $res['customer_name'];
    $contact_number = $res['contact_number'];
    $address = $res['address'];
    $area = $res['area'];
    $geo_coordinates = $res['geo_coordinates'];
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

    <h1>Update Customer Details</h1>
    <br/>
    
    <form name="form1" method="post" action="edit.php">
        <table class="table_add">
            <tr> 
                <td>Customer ID</td>
                <td><input type="text" name="customer_id" value="<?php echo $customer_id;?>"></td>
            </tr>
            <tr> 
                <td>Shop Name</td>
                <td><input type="text" name="shop_name" value="<?php echo $shop_name;?>"></td>
            </tr>
            <tr> 
                <td>Customer Name</td>
                <td><input type="text" name="customer_name" value="<?php echo $customer_name;?>"></td>
            </tr>
            <tr> 
                <td>Contact Number</td>
                <td><input type="text" name="contact_number" value="<?php echo $contact_number;?>"></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $address;?>"></td>
            </tr>
            <tr> 
                <td>Area</td>
                <td><input type="text" name="area" value="<?php echo $area;?>"></td>
            </tr>
            <tr> 
                <td>Geographical Coordinates</td>
                <td><input type="text" name="geo_coordinates" value="<?php echo $geo_coordinates;?>"></td>
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