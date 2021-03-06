<?php
  require_once("../includes/global.php");
  //echo $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ACMS: Make Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <script src="../trying_design/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

    <link rel="import" href="../trying_design/bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="../trying_design/bower_components/iron-form/iron-form.html">
    <link rel="import" href="../trying_design/bower_components/paper-toolbar/paper-toolbar.html">
    <link rel="import" href="../trying_design/bower_components/font-roboto/roboto.html">
    <link rel="import" href="../trying_design/bower_components/paper-button/paper-button.html">
    <link rel="import" href="../trying_design/bower_components/neon-animation/neon-animation.html">
    <link rel="import" href="../trying_design/bower_components/paper-card/paper-card.html">
    <link rel="import" href="../trying_design/bower_components/paper-checkbox/paper-checkbox.html">
    <link rel="import" href="../trying_design/bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="../trying_design/bower_components/paper-input/paper-input.html">
    <link rel="import" href="../trying_design/bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="../trying_design/bower_components/paper-tabs/paper-tabs.html">
    <link rel="import" href="../trying_design/bower_components/paper-toast/paper-toast.html">
    <link rel="import" href="../trying_design/bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="../trying_design/bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
    <link rel="import" href="../trying_design/bower_components/paper-styles/color.html">

    <link rel="stylesheet" href="../trying_design/styles.css">

    <style>
  paper-menu {
    display: block;
  }
  paper-dropdown-menu {
    text-align: left;
    margin: auto;
    width: 180px;
  }
  paper-dropdown-menu.letters {
    width: 90px;
  }
  paper-tabs {
    width: 400px;
  }
  .horizontal-section {
    text-align: center;
  }

  #container-sign-in {
    margin:10px 10px;
  }

  #date, #cust_list, #amount{
    margin:15px 15px 15px 15px;
  }
</style>

  </head>
  <body>
    <paper-toolbar>
      <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
      <span class="flex">Make a Payment</span>
    </paper-toolbar>
    <div id="container-sign-in">
          <form id=form-sign-in action="updatePayment.php" method="post">
            <input id="date" name="payment_date" type="date" placeholder="Date"><br>
            <select id="cust_list" name="payment_cust">
    <?php
    //Display all the customer names in the dropdown list
      $sql = "SELECT Cust_ID, Cust_Name FROM customer_details";
      $result = $mysqli->query($sql);
      while($row = $result->fetch_assoc()){
        echo $row['Cust_ID'];
        echo $row['Cust_Name'];
        //echo "<option value='".$c->id."' ".$selected.">".$c->name."</option>" ;
        echo "<option value='".$row['Cust_ID']."'>".$row['Cust_Name']."</option>";
      }
    ?>
            </select><br>
            <input id="amount" name="payment_amount" type="text" placeholder="Amount"><br>
            <button id="submit" type="submit">Submit</button>
          </form>
        </div>
      </body>
    </html>
