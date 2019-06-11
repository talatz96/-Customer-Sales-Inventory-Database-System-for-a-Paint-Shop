


<?php  
  $connect = mysqli_connect("localhost", "root", "root", "TalatZubair_13038");  
  $query = "SELECT type, count(*) as types FROM products_13038 GROUP BY type";  
  $query2 = "SELECT area, count(*) as areas FROM customers GROUP BY area";
  $query3 = "SELECT customer_id, count(*) as payment FROM payments_13038 GROUP BY customer_id";
  $query4 = "SELECT shade, count(*) as shades FROM products_13038 GROUP BY shade";

  $result = mysqli_query($connect, $query);  
  $result2 = mysqli_query($connect, $query2);  
  $result3 = mysqli_query($connect, $query3);
  $result4 = mysqli_query($connect, $query4);  
?>  
 <!DOCTYPE html>  
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      google.charts.setOnLoadCallback(drawChart4);
  

      function drawChart1()            
      {  
                var data = google.visualization.arrayToDataTable([  
                          ['type', 'types'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["type"]."', ".$row["types"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Product Types and Quantities',  
                      pieHole: 0.4, width: 400, height: 300 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('chart1_div'));  
                chart.draw(data, options);  
        } 

      function drawChart2() 
      {
                           var data = google.visualization.arrayToDataTable([  
                          ['area', 'areas'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["area"]."', ".$row["areas"]."],";  
                          }  
                          ?>  
                     ]);  
                           var options = 
                          {
                            title: 'Number of Paint Shops in Different Areas',  
                            pieHole: 0.4, width: 400, height: 300 
                          };

                        var chart = new google.visualization.PieChart(document.getElementById('chart2_div'));  
                chart.draw(data, options);  
     };
        
function drawChart3() 
{
        var data = google.visualization.arrayToDataTable([
          ['customer_id', 'payment'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["customer_id"]."', ".$row["payment"]."],";  
                          }  
                          ?> 
          ]);

        var options = {
          title: 'Total Amount Received from Each Customer',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart3_div'));
        chart.draw(data, options);
      }


function drawChart4()            
      {  
                var data = google.visualization.arrayToDataTable([  
                          ['shade', 'shades'],  
                          <?php  
                          while($row = mysqli_fetch_array($result4))  
                          {  
                               echo "['".$row["shade"]."', ".$row["shades"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Quantities of Different Shades of Paints',  
                      pieHole: 0.4, width: 400, height: 300 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('chart4_div'));  
                chart.draw(data, options);  
        } 


    </script>
  </head>
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
          <li><a href="dashboard.php">Dashboard</a></li>
          <li style="float:right"><a class="active" href="logout.php">Log out</a></li>
      </ul>

    <br/>
    <br/>
    <br/>  

    <table class="columns">
      <tr>
        <td><div id="chart1_div" ></div></td>
        <td><div id="chart2_div" ></div></td>
      </tr>
      <tr>
        <td><div id="chart3_div" style=" width: 900px; height: 500px;"></div></td>
        <td><div id="chart4_div" ></div></td>
      </tr>
    </table>
  </body>
</html>
