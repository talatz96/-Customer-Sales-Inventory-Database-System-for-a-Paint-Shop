<html>  
      <head>  
           <title>Orders</title>  
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
        font-family: Trebuchet MS;">ORDER DETAILS</h1><br/>
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
<br />
                     <div id="live_data"></div>            
                </div>  
           </div>  
      </body>  
</html>  
<script>  
 $(document).ready(function(){  
var customer_id = $('#customer_id').val();
      $("#customer_id").change(function(){
       customer_id = $('#customer_id').val();
fetch_data();
      });
      function fetch_data()  
      {  
           $.ajax({  
                url:"/talat_mathoo/view_orders.php",  
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
           var order_id = $('#order_id').text();  
           var customer_id = customer_id;
   var Date = $('#date').text();
   var sp_id = $('#sp_id').val();
   var product_id = $('#product_id').val();
   var quantity = $('#quantity').text(); 
   var rate = $('#rate').text();
   var quantity = parseInt(quantity);
   var rate = parseInt(rate);
   var amount = quantity*rate;
           if(order_id == '')  
           {  
                alert("Enter Order Number");  
                return false;  
           }    
           if(date == '')  
           {  
                alert("Enter Date");  
                return false;  
           }   
           if(quantity == '')  
           {  
                alert("Enter Quantity");  
                return false;  
           }  
           $.ajax({  
                url:"/talat_mathoo/add_orders.php",  
                method:"POST",  
                data:{order_id:order_id, customer_id:customer_id, date:date, sp_id:sp_id, product_id:product_id, quantity:quantity, rate:rate, amount:amount},  
                dataType:"text",  
                success:function(data)  
                {  
                    fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"/talat_mathoo/edit_orders.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data)
{  
                    fetch_data();
                }  
           });  
      }  
      $(document).on('blur', '.order_id', function(){  
           var id = $(this).data("id1");  
           var order_id = $(this).text();  
           edit_data(id, order_id, "order_id");  
      });   
      $(document).on('blur', '.date', function(){  
           var id = $(this).data("id3");  
           var date = $(this).text();  
           edit_data(id, date, "date");  
      });  
      $(document).on('blur', '.sp_id', function(){  
           var id = $(this).data("id4");  
           var sp_id = $(this).val();  
           edit_data(id, sp_id, "sp_id");  
      });
      $(document).on('blur', '.product_id', function(){  
           var id = $(this).data("id5");  
           var product_id = $(this).val();  
           edit_data(id, product_id, "product_id");  
      });  
      $(document).on('blur', '.quantity', function(){  
           var id = $(this).data("id6");  
           var quantity = $(this).text();  
           edit_data(id, quantity, "quantity");  
      });
      $(document).on('blur', '.rate', function(){  
           var id = $(this).data("id7");  
           var rate = $(this).text();  
           edit_data(id, rate, "rate");  
      });   
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id9");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                    url:"/talat_mathoo/delete_orders.php",  
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
