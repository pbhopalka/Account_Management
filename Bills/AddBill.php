<?php
require_once('functions.php');
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
    </head>
    <body>
      <paper-toolbar>
        <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
        <span class="flex">Add New Bill</span>
      </paper-toolbar>
      <?php
makeform(htmlspecialchars("AddedBill.php"));

item("Date",'date','date');
echo("Customer Name: ");
//Show List of Customers
	echo '<select id="cust_list" name="cid">';
	$sql = "SELECT Cust_ID, Cust_Name FROM customer_details";
	$result = $mysqli->query($sql);

	while($row = $result->fetch_assoc()){
		echo $row['Cust_ID'];
		echo $row['Cust_Name'];
		//echo "<option value='".$c->id."' ".$selected.">".$c->name."</option>" ;
		echo "<option value='".$row['Cust_ID']."'>".$row['Cust_Name']."</option>";
	}

	echo "</select><br><br>";
//End of LIST

item("Amount",'text','amt');
item("",'submit',"");
_link("Show Bills Records","ShowBills.php");
_link("Index Page","../index.php");
_Footer();
?>
