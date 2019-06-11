<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) 
{    
    $customer_id = $_POST['customer_id'];
    $shop_name = $_POST['shop_name'];
    $customer_name = $_POST['customer_name'];    
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $geo_coordinates = $_POST['geo_coordinates'];
        

        $result = mysqli_query($mysqli, "INSERT INTO customers(customer_id, shop_name, customer_name, contact_number, address, area, geo_coordinates) VALUES('$customer_id', '$shop_name', '$customer_name', '$contact_number', '$address', '$area', '$geo_coordinates')");
        
        //display success messages
        echo "<font color='blue'>Customer Added Successfully.";
        echo "<br/><a href='Customers_13038.php'>Back to Customer Records</a>";
}

?>
</body>
</html>