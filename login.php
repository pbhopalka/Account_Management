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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <script src="trying_design/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

    <link rel="import" href="trying_design/bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="trying_design/bower_components/paper-toolbar/paper-toolbar.html">
    <link rel="import" href="trying_design/bower_components/font-roboto/roboto.html">
    <link rel="import" href="trying_design/bower_components/paper-button/paper-button.html">
    <link rel="import" href="trying_design/bower_components/neon-animation/neon-animation.html">
    <link rel="import" href="trying_design/bower_components/paper-card/paper-card.html">
    <link rel="import" href="trying_design/bower_components/paper-checkbox/paper-checkbox.html">
    <link rel="import" href="trying_design/bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="trying_design/bower_components/paper-input/paper-input.html">
    <link rel="import" href="trying_design/bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="trying_design/bower_components/paper-tabs/paper-tabs.html">
    <link rel="import" href="trying_design/bower_components/paper-toast/paper-toast.html">
    <link rel="import" href="trying_design/bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="trying_design/bower_components/paper-styles/color.html">

    <link rel="stylesheet" href="trying_design/styles.css">

    <style>
    #cards{
      max-width: 250px;
      margin-left: auto;
      margin-right: auto;
      max-height: 200px;
      margin-top: 30vh;
      margin-bottom: auto;
    }

    </style>
  </head>
  <body style="background-color:#f5f5f5">
    <div id="cards">
      <paper-card heading="ACMS">
        
        <div class="card-actions">
          <form id=login-form action="login.php" method="post">
            <paper-input id="username" name="username" label="Username" type="text"></paper-input>
            <paper-input id="password" name="password" label="Password" type="password"></paper-input>
            <paper-button id="submit" onclick="document.forms['login-form'].submit()">Login</paper-button>
          </form>
          <!--<paper-button onclick="location.href='login.php'"view>Login</paper-button>-->
        </div>
      </paper-card>
    </div>

    <script>
        function clickHandler(e) {
          var button = e.target;
          while (!button.hasAttribute('data-dialog') && button !== document.body) {
            button = button.parentElement;
          }
          if (!button.hasAttribute('data-dialog')) {
            return;
          }
          var id = button.getAttribute('data-dialog');
          var dialog = document.getElementById(id);
          if (dialog) {
            dialog.open();
          }
        }
      </script>


    <script src="trying_design/main.js"></script>

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
  $sql2 = "SELECT Username,role FROM manager WHERE username = '{$username}' AND password = '{$password}'";
  $login = $mysqli->query($sql2);
  $row = $login->fetch_assoc();
  //$row contains role. Use $row['role'] to get the role name and putting that in the if condition
  if ($result->num_rows){
    //echo 'Login successful';
    $_SESSION['login_user']=$row['role'];
    $_SESSION['username']=$row['Username'];
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
