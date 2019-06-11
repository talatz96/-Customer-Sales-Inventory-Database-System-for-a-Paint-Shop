<?php  
 $connect = mysqli_connect("localhost", "root", "root", "TalatZubair_13038"); 
 $receipt_id=isset($_POST["receipt_id"])?$_POST["receipt_id"]:"";
 $customer_id=isset($_POST["customer_id"])?$_POST["customer_id"]:"";
 $date=isset($_POST["date"])?$_POST["date"]:"";
 $sp_id=isset($_POST["sp_id"])?$_POST["sp_id"]:"";
 $amount=isset($_POST["amount"])?$_POST["amount"]:"";
//echo 'Data: ' . $O_No .'customer_id' . $customer_id . $date.'spid' . $sp_id .'pcode'. $P_Code .'q'. $Quantity;
 $row = mysqli_fetch_array($res);     
 $sql = "INSERT INTO payments_13038 VALUES('$receipt_id','$date','$customer_id','$sp_id','$amount')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
?> 
