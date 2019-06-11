<html>
<head>
    <title>Add Salesperson</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
//include_once("customers_13038.php");
//$customerlist = mysqli_query($mysqli, "SELECT customer_id FROM customers_13038");


if(isset($_POST['Submit'])) 
{    
    $sp_id = $_POST['sp_id'];
    $name = $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $customer_list = $_POST['customer_list'];
        

        $result = mysqli_query($mysqli, "INSERT INTO salesperson_13038(sp_id, name, contact_number, customer_list) VALUES('$sp_id', '$name', '$contact_number', '$customer_list')");
        
        //display success messages
        echo "<font color='blue'>Customer Added Successfully.";
        echo "<br/><a href='salesperson_13038.php'>Back to Salesperson Records</a>";
}

?>
</body>
</html>