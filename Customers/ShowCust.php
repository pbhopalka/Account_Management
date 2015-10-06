<?php

require_once("../includes/global.php");
require_once("functions.php");
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
    <link rel="stylesheet" href="table.less">

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
        <span class="flex">Customer Records</span>
				<paper-icon-button id="addCust"icon="add" onclick="location.href='AddCust.php'">Add new Bill></paper-icon-button>
				<paper-tooltip for="addCust" offset="0">Add new Customer</paper-tooltip>
      </paper-toolbar>
      <paper-material id="table-material" class="table-condensed">
      
      <?php
$sql = "SELECT * From customer_details";
$result = $mysqli->query($sql);
if($result->num_rows <= 0){
	echo '<p style="font-weight: 400; text-align: center; padding-top: 32px;">No payment entries. Press the Add button to add entries.</p><br>';
}
else{
  table_cust();
	while($row = $result->fetch_assoc()){
		cust_details($row);
	}
	end_table();
}
?>
</paper-material>
<?php
_link("Add Costumers","AddCust.php");
_link("Index Page","../index.php");
?>
</body>
</html>
