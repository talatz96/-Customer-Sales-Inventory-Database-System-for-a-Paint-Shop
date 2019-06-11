<?php  
 $connect = mysqli_connect("localhost", "root", "root", "TalatZubair_13038");  
 $row = mysqli_fetch_array($res);
 $sql = "INSERT INTO sales_13038 VALUES('".$_POST["order_id"]."', '".$_POST["customer_id"]."', '".$_POST["date"]."', '".$_POST["sp_id"]."', '".$_POST["product_id"]."', '".$_POST["quantity"]."', '".$_POST["rate"]."', '".$_POST["amount"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      mysqli_query($connect, "UPDATE salesperson_13038 SET amount = rate * quantity WHERE order_id ='".$_POST["order_id"]."'");
      echo 'Data Inserted';  
 }  
 ?> 
