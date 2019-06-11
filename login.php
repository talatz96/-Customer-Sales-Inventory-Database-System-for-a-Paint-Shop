<?php  //Start the Session
  session_start();
  require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted

if (isset($_POST['username']) and isset($_POST['password']))
  {
//3.1.1 Assigning posted values to variables.
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    //3.1.2 Checking the values are existing in the database or not

    $query = "SELECT * FROM users_13038 WHERE username='$username' and password='$password'";
     
    $result = mysqli_query($connection, $query) or die(mysqli_error($mysqli));
    $count = mysqli_num_rows($result);
    //3.1.2 If the posted values are equal to the database values, then session will be created for the user.$mysqli

    if ($count == 1)
      {
        $_SESSION['username'] = $username;
      } 
    else
      {
          $message = "Username and/or Password incorrect.\\nTry again.";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
  }
//3.1.4 if the user is logged in Greets the user with message

if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    mysqli_query($connection, "UPDATE users_13038 SET active = '1' WHERE username = '$username'");
    header('Location: home.html');
  }
else
  {
//3.2 When the user visits the page first time, simple login form will be displayed.  
?>

<html>
<head>
  <title>User Login</title>
  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles3.css" >


</head>
<body>

      <form class="form-signin" method="POST">
          <h2 class="form-signin-heading">Please Login</h2>
          </br>
          </br>
          </br>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
          </br>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          </br>
          </br>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>

</body>

</html>

<?php } ?>