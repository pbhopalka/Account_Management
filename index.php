<?php
require_once ("includes/global.php");
session_start();
//echo $_SESSION['login_user'];
if ($_SESSION['login_user'] == 'Superuser'){
  header('Location: superuser.php') && die();
}
else if ($_SESSION['login_user'] == 'Normal'){
  header('Location: normalUser.php') && die();
}
?>
<html>
<head>
  <title>ACMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/main.css" rel="stylesheet" media="screen">
</head>
<body>
  <h1>Welcome to Index Page</h1>
  <p>Please login to proceed</p>
  <button id="login" type="submit"><a href="login.php">Login</a></button>
</body>
</html>
