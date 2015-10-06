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
		<link rel="import" href="../trying_design/bower_components/paper-tooltip/paper-tooltip.html">

    <link rel="stylesheet" href="../trying_design/styles.css">
    </head>
    <body>
      <paper-toolbar>
        <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
        <span class="flex">Bill Records</span>
				<paper-icon-button id="addBill"icon="add" onclick="location.href='AddBill.php'">Add new Bill></paper-icon-button>
				<paper-tooltip for="addBill" offset="0">Add new bill</paper-tooltip>
      </paper-toolbar>
      <?php

$sql = "SELECT * From bill_record";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
	table_bill();
	while($row = $result->fetch_assoc()){
		$cid = $row["Cust_ID"];
		$sql = "SELECT Cust_Name FROM customer_details WHERE Cust_ID=$cid;";
		$r = $mysqli->query($sql);
		$r = $r->fetch_assoc();
		$r = $r["Cust_Name"];
		bill_details($r,$row);
	}
	end_table();

}
else{
	$sql = "ALTER TABLE bill_record auto_increment = 1";
	$result = $mysqli->query($sql);
	echo "No Bills Added<br>";
}
_link("Add Bill","AddBill.php");
_link("Index Page","../index.php");

?>
