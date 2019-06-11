<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) 
{    
    $product_id = $_POST['product_id'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $shade = $_POST['shade'];
    $size = $_POST['size'];
    $price = $_POST['price'];
        

    $result = mysqli_query($mysqli, "INSERT INTO products_13038(product_id, brand, type, shade, size, price) VALUES('$product_id', '$brand', '$type', '$shade', '$size', '$price')");
        
        //display success messages
    echo "<font color='blue'>Product Added Successfully.";
    echo "<br/><a href='products_13038.php'>Back to Product Records</a>";
}

?>
</body>
</html>