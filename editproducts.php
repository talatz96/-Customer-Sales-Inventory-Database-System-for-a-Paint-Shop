<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $product_id = $_POST['product_id'];  
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $shade = $_POST['shade'];
    $size = $_POST['size'];    
    $price = $_POST['price']; 
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products_13038 SET product_id ='$product_id', brand='$brand', type ='$type', shade = '$shade', size = '$size', price = '$price' WHERE product_id = $product_id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: products_13038.php");
    }

?>
<?php
//getting id from url
$product_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products_13038 WHERE product_id = $product_id");
 
while($res = mysqli_fetch_array($result))
{
    $product_id = $res['product_id'];  
    $brand = $res['brand'];
    $type = $res['type'];
    $shade = $res['shade'];
    $size = $res['size'];    
    $price = $res['price'];
    
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
    <h1>Update Product Details</h1>
    <br/>
    
    <form name="form1" method="post" action="editproducts.php">
        <table class="table_add">
            <tr> 
                <td>Product Code</td>
                <td><input type="text" name="product_id" value="<?php echo $product_id;?>"></td>
            </tr>
            <tr> 
                <td>Brand</td>
                <td><input type="text" name="brand" value="<?php echo $brand;?>"></td>
            </tr>
            <tr> 
                <td>Type</td>
                <td><input type="text" name="type" value="<?php echo $type;?>"></td>
            </tr>
            <tr> 
                <td>Shade</td>
                <td><input type="text" name="shade" value="<?php echo $shade;?>"></td>
            </tr>
            <tr> 
                <td>Size</td>
                <td>
                <br>
                <input type="radio" name="size" value="L"> Large<br>
                <input type="radio" name="size" value="M"> Medium<br>
                <input type="radio" name="size" value="S"> Small<br>
                <br>
                </td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="product_id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>
