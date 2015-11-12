<?php
require_once ("includes/global.php");
error_reporting(E_ERROR | E_PARSE);
//session_start();
//echo $_SESSION['login_user'];
if ($_SESSION['login_user'] == 'Superuser'){
  header('Location: dashboard/index.php') && die();
}
else if ($_SESSION['login_user'] == 'Normal'){
  header('Location: normalUser.php') && die();
}
?>
<html>
<head>
  <title>ACMS</title>
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
<body unresolved style="background-color:#f5f5f5">
  <div id="cards">
    <paper-card heading="Welcome to ACMS">
      <div class="card-content" style="text-align: center;">
        Account Management System for Small Businesses<br><br>
        <strong>Credits:</strong><br>Piyush Bhopalka<br>Prabhav Adhikari<br>Sakar Lamichhane
      </div>
      <div class="card-actions">
        <section onclick="clickHandler(event)">
          <!--Choose the appropriate data-dialog: either animated or modal-->
           <paper-button onclick="location.href='login.php'">Login</paper-button>

         <!--Animation Dialog box-->
           <paper-dialog id="animated" entry-animation="scale-up-animation" exit-animation="fade-out-animation" with-backdrop>
             <p>Piyush Bhopalka</p>
         </paper-dialog>
       </section>
        <!--<paper-button onclick="location.href='login.php'"view>Login</paper-button>-->
      </div>
    </paper-card>
  </div>

<!--
  <h1>Welcome to Index Page</h1>
  <p>Please login to proceed</p>
  <button id="login" type="submit"><a href="login.php">Login</a></button>
-->
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
