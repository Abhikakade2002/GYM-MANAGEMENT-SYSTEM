<?php
session_start();
require('db.php');
$username="";
$errors = array(); 

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  if (count($errors) == 0) {
    $query = "SELECT * FROM login WHERE uname='$username' AND pwd='$pwd'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['uname'] = $username;
      header("location:home.php?info=add_gym");
    }else {
      array_push($errors, "<div class='alert alert-warning'><b>Wrong username/password combination</b></div>");
    }
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gym Management</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
    background: url(gym5.jpg);
    background-size: cover;
    background-position: center; 
    height:550px;
    color: white;
    background-repeat: no-repeat;
    }

  .overlay {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Adjust the last value for transparency */
    z-index: 1;
  }

	.form{
		width:30%;
		margin-left:35%;
		margin-top:7%;
	}

  .btn{
    color:red;
    position:relative;
    top: 5px;
  }
	
	hr{
		background-color:white;
	}
    .navbar{
      background-color: transparent !important;
    }
  </style>
</head>
<body>
  <div class="overlay">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php"><h3 style="color:yellow; text-align:center;"> GYM <span style="color:Red;">MANAGEMENT</span> SYSTEM</h3></a>
 
</div>
</nav>
<hr>
 <h2 style="color:white; text-align:center;"> Access Only To Admin</h2>
 <hr>

<form class="form " action="" method="post">
	  <input type="text" class="form-control mb-2 mr-sm-2" name="username" placeholder="USERNAME" required> <br/>
	  <input type="password" class="form-control mb-2 mr-sm-2" name="pwd" placeholder="PASSWORD" required> <br/>
	  <button type="submit" class="btn btn-outline-light mb-2" name="login_user">Login</button>
</form>

</div>

</body>
</html>