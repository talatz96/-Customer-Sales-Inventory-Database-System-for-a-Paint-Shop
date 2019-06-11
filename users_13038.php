<?php
//including the database connection file
include_once("config.php");
 

$result_admin = mysqli_query($mysqli, "SELECT user_id, username, active FROM users_13038 WHERE username = 'TalatZubair'");
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT user_id, username, active, user_type, salesperson FROM users_13038 WHERE username <> 'TalatZubair'"); // using mysqli_query instead
?>
 
<head>    
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Users</title>
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

    <h1>USERS</h1>
    
    <br/>
    <br/>

    <button onclick="window.location.href='/addusers.html'">Add New User</button>

    <br><br/>

    

    <table class="table_main">

        <tr>
            <td class="table_headings">User ID</td>
            <td class="table_headings">Username</td> 
            <td class="table_headings">Active?</td>
            <td class="table_headings">User Type</td>
            <td class="table_headings">Salesperson ID</td>
  	        <td class="table_headings">Update</td>
        </tr>
        <?php 
       

        $admin_row = mysqli_fetch_array($result_admin);
        echo "<tr class = admin_row>";
        echo "<td>".$admin_row['user_id']."</td>";
        echo "<td>".$admin_row['username']."</td>";
        echo "<td>".$admin_row['active']."</td>";
        echo "<td>"." "."</td>";
        echo "<td>"." "."</td>";
        echo "<td>"." "."</td>";


        while($res = mysqli_fetch_array($result)) 
        {         
            echo "<tr>";
            echo "<td>".$res['user_id']."</td>";
            echo "<td>".$res['username']."</td>";
            echo "<td>".$res['active']."</td>";
            echo "<td>".$res['user_type']."</td>";
            echo "<td>".$res['salesperson']."</td>";
            echo "<td><a href=\"editusers.php?id=$res[user_id]\">Edit</a> | <a href=\"deleteusers.php?id=$res[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>

  	<footer>Talat Zubair_13038</footer>
</body>
</html>