<?php
  require_once("includes/global.php");

  if (isset($_SESSION['login_user']))
    header("location: index.php") && die();
else if (! isset($_POST['username'])){
    header ( 'Content-type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ACMS: Login</title>
  </head>
  <body>
    <div id="container-sign-in">
      <form id=form-sign-in action="" method="post">
        <h2>Sign in here</h2>
        <input id="username" name="username" type="text" placeholder="Username">
        <input id="password" name="password" type="password" placeholder="Password">
        <button id="submit" type="submit">Sign In</button>
      </form>
    </div>
  </body>
</html>
<?php
}
else {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM manager WHERE username = '{$username}' AND password = '{$password}'";
  $result = $mysqli->query($sql);
  //Selecting the role so that later, page for superuser and normal can be decided
  $sql2 = "SELECT role FROM manager WHERE username = '{$username}' AND password = '{$password}'";
  $login = $mysqli->query($sql2);
  $row = $login->fetch_assoc();
  //$row contains role. Use $row['role'] to get the role name and putting that in the if condition
  if ($result->num_rows){
    //echo 'Login successful';
    $_SESSION['login_user']=$row['role'];
    //die();
    header('Location: index.php');
  }
  else {
    //echo $mysqli->error;
   //echo 'login unsuccessful';
    //die();
    header('Location: login.php');
  }
}
?>
