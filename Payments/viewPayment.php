<?php
  require_once("../includes/global.php");
  require_once("functions.php");
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
      <link rel="import" href="../trying_design/bower_components/paper-material/paper-material.html">
  		<link rel="import" href="../trying_design/bower_components/paper-tooltip/paper-tooltip.html">

      <link rel="stylesheet" href="../trying_design/styles.css">

      <link rel="stylesheet" href="../includes/table.less">
      <style>
      #table-material{
        margin-left: 32px;
        margin-right: 32px;
        margin-top: 32px;
      }
      </style>
      </head>
      <body>
        <paper-toolbar>
          <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
          <span class="flex">Payment Records</span>
  				<paper-icon-button id="addpayment"icon="add" onclick="location.href='addPayment.php'">Add new Payment></paper-icon-button>
  				<paper-tooltip for="addpayment" offset="0">Add new Payment</paper-tooltip>
          <paper-icon-button id="remove" src="../img/delete.png" onclick="location.href='removePayment.php?condition=all'">Remove Payment</paper-icon-button>
  				<paper-tooltip for="remove" offset="0">Remove All</paper-tooltip>
        </paper-toolbar>
        <paper-material id="table-material" class="table-condensed">

  <?php
  $sql = "SELECT * FROM payment_record";
  $result = $mysqli->query($sql);
  if ($result->num_rows <=0){
    $sql = "ALTER TABLE payment_record auto_increment = 1";
    $result = $mysqli->query($sql);
    echo '<p style="font-weight: 400; text-align: center; padding-top: 32px;">No payment entries. Press the Add button to add entries.</p><br>';
  }
  else{
    payment_table();
    while ($row=$result->fetch_assoc()){
      $cust_id = $row['Cust_ID'];
      $sql = "SELECT Cust_Name FROM customer_details WHERE Cust_ID = {$cust_id}";
      $result2 = $mysqli->query($sql);
      $row2 = $result2->fetch_assoc();
      $cust_name = $row2['Cust_Name'];
      payment_details($row, $cust_name);
      echo '<br>';
    }
    end_table();
  }
?>
</paper-material>
<!--
   <button id="index" type="submit"><a href="removePayment.php?condition=all">Remove all</a></button><br>
   <button id="index" type="submit"><a href="addPayment.php">Add Another Payment</a></button><br>
   <button id="index" type="submit"><a href="../index.php">Index</a></button><br>
-->
 </body>

 </html>
