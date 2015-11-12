<?php

require_once("../includes/global.php");
require_once("functions.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ACMS:Show Customers</title>
    <?php
		_Header();
   ?>
    </head>
    <body>
      <paper-toolbar>
        <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
        <span class="flex">Customer Records</span>
				<paper-icon-button id="addCust"icon="add" onclick="location.href='AddCust.php'">Add new Bill></paper-icon-button>
				<paper-tooltip for="addCust" offset="0">Add new Customer</paper-tooltip>
      </paper-toolbar>
      <paper-material id="table-material" class="table-condensed" style="margin:10px 10px;">

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
<div>
<?php
_link("Add Costumers","AddCust.php");
echo "<br>";
_link("Index Page","../index.php");
?>
</body>
</html>
