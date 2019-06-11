<html>
<?php
include_once("survey_connect.php");
$result = $db->survey_form->find()->sort(array('_id' => -1));
?>
 
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">    
    <title>Survey Details</title>
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
          <li style="float:right"><a class="active" href="logout.php">Log out</a></li>
      </ul>
    <br/>
    <br/>
    <br/>    

    <h1>SURVEY RESULTS</h1>
   
    <a href="survey_add.html">New Survey</a><br/><br/>
    
    <table>
    <tr>
        <td class="table_headings">Timestamp</td>
        <td class="table_headings">Geographical Coordinates</td>
        <td class="table_headings">Shop Name</td>
        <td class="table_headings">Products Available in the Shop?</td>
        <td class="table_headings">Products Positioned in Front?</td>
        <td class="table_headings">Competitors' Products More Prominent?</td>
        <td class="table_headings">Shelf Image</td>
    </tr>
    <?php     
    foreach ($result as $res) {
        echo "<tr>";
        echo "<td>".$res['timestamp']."</td>";
        echo "<td>".$res['geo_coordinates']."</td>";
        echo "<td>".$res['shop_name']."</td>";    
        echo "<td>".$res['availability']."</td>";
        echo "<td>".$res['position']."</td>";
        echo "<td>".$res['prominence']."</td>";    
        echo "<td>".$res['image']."</td>";    
    }
    ?>
    </table>
</body>
</html>