<html>  
      <head>  
           <title>Payments</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="styles2.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>      </head>  
      
      <body>
      <br/>
      <ul>    
          <li><a href="home.html"><img src="home.png" alt="home" style="width:20px;height:18px;border:0;padding:0;"></a></li>
          <li><a href="customers_13038.php">Customers</a></li>
          <li><a href="salesperson_13038.php">Salesperson</a></li>
          <li><a href="products_13038.php">Product</a></li>
          <li><a href="users_13038.php">Users</a></li>
          <li><a href="orders_13038.php">Orders</a></li>
          <li><a href="payments_13038.php">Payments</a></li>
          <li><a href="survey_form.php">Shop Survey</a></li>
          <li><a href="dashboard.html">Dashboard</a></li>
          <li style="float:right"><a class="active" href="logout.php">Log out</a></li>
      </ul>

    <br/>
    <br/>
    <br/>    
  
      <div class="container">  
      <div class="table-responsive">
      <div class="page-header">  
      <h1 style="text-align: center;
        font-size: 30pt;
        font-weight: bold;
        color: #05467C;
        margin-bottom: 5px; 
        font-family: Trebuchet MS;">PAYMENT DETAILS</h1><br/>
     </div>  

<h4>Select Customer ID:</h4>
<?php
$host = "localhost";
$db_name = "TalatZubair_13038";
$username = "root";
$password = "root";
$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
$stmt = $conn->prepare("SELECT customer_id from customers");
$stmt->execute();
    echo "<select id='customer_id' class='form-control'>";
echo '<option value="">None</option>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                  echo '<option value="'.$row["customer_id"].'">'.$row["customer_id"].'</option>';                
}
    echo "</select>";
?>
  </br>
<div id="live_data"></div>  
    </div>                 
           </div>  
      </body>  
 </html>  
 <script>  
  $(document).ready(function(){  
  var customer_id= $('#customer_id').val();
  $("#customer_id").change(function(){
  customer_id = $('#customer_id').val(); 
         fetch_data();
  });
  
  function fetch_data()
      {  
           $.ajax({  
                url:"/talat_mathoo/view_payments.php",  
                method:"POST",  
    data:{customer_id:customer_id},
    dataType:"text",
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
     var receipt_id = $('#receipt_id').text(); 
           var customer_id = customer_id;  
           var date = $('#date').text();  
           var sp_id = $('#sp_id').val();  
                    console.log(sp_id);           
           var amount = $('#amount').text(); 
        
 if(receipt_id == '')  
           {  
                alert("Enter Receipt Number");  
                return false;  
           }   
           if(date == '')  
           {  
                alert("Enter date");  
                return false;  
           }  
           if(amount == '')  
           {  
                alert("Enter Amount");  
                return false;  
           }    
   
                $.ajax({  
                url:"/talat_mathoo/add_payment.php",  
                method:"POST",  
                data:{receipt_id:receipt_id, customer_id:customer_id,date:date,sp_id:sp_id,amount:amount},  
                dataType:"text",  
                success:function(data)  
                {  
                    console.log('Record inserted');
                     fetch_data();  
                    console.log(data);

                },  
                error: function () 
                {
                    console.log('error 505');
                }
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"/talat_mathoo/edit_payment.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                    // alert(data);  
      fetch_data();
                }  
           });  
      }  

      $(document).on('blur', '.receipt_id', function(){  
           var id = $(this).data("id1");  
           var receipt_id = $(this).text();  
           edit_data(id, receipt_id, "receipt_id");  
      });  
      $(document).on('blur', '.date', function(){  
           var id= $(this).data("id2");  
           var date = $(this).text();  
           edit_data(id,date, "date");  
      });  
      $(document).on('blur', '.sp_id', function(){  
           var id = $(this).data("id4");  
           var sp_id = $(this).val();  
           edit_data(id,sp_id, "sp_id");  
      });  
      $(document).on('blur', 'amount', function(){  
           var id = $(this).data("id5");  
           var amount = $(this).val();  
           edit_data(id,amount, "amount");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                    url:"/talat_mathoo/delete_payment.php",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"text",  
                    success:function(data)
          {  
            fetch_data();  
                    }  
                });  
           }  
      });  
 });  
 </script>
