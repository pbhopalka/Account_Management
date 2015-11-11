<?php
require_once("../includes/global.php");

function _Header($page="",$cname="") {

	echo "<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
    <meta name='mobile-web-app-capable' content='yes'>
    <meta name='apple-mobile-web-app-capable' content='yes'>

     <script src='../trying_design/bower_components/webcomponentsjs/webcomponents-lite.js'></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>

    <link rel='import' href='../trying_design/bower_components/iron-icons/iron-icons.html'>
    <link rel='import' href='../trying_design/bower_components/paper-toolbar/paper-toolbar.html'>
    <link rel='import' href='../trying_design/bower_components/font-roboto/roboto.html'>
    <link rel='import' href='../trying_design/bower_components/paper-button/paper-button.html'>
    <link rel='import' href='../trying_design/bower_components/neon-animation/neon-animation.html'>
    <link rel='import' href='../trying_design/bower_components/paper-card/paper-card.html'>
    <link rel='import' href='../trying_design/bower_components/paper-checkbox/paper-checkbox.html'>
    <link rel='import' href='../trying_design/bower_components/paper-icon-button/paper-icon-button.html'>
    <link rel='import' href='../trying_design/bower_components/paper-fab/paper-fab.html'>
    <link rel='import' href='../trying_design/bower_components/paper-tabs/paper-tabs.html'>
    <link rel='import' href='../trying_design/bower_components/paper-toast/paper-toast.html'>
    <link rel='import' href='../trying_design/bower_components/paper-dialog/paper-dialog.html'>
    <link rel='import' href='../trying_design/bower_components/paper-tooltip/paper-tooltip.html'>
    <link rel='import' href='../trying_design/bower_components/paper-styles/color.html'>
    <link rel='stylesheet' href='../trying_design/styles.css'>
    <link rel='stylesheet' href='../includes/table.less'>

    <link rel='stylesheet' href='../dashboard/material.min.css'>
    <link rel='stylesheet' href='../dashboard/styles.css'>
";
}


function _Footer() {
    echo "</BODY></HTML>";
}

function makeform($act){
	echo "<form method='post' action=$act>";
}

function item($Text,$type,$name){
	echo "$Text <input type=$type name=$name></input>";
}

function endform(){
	echo "</form>";
}

function _link($a,$b){


echo "
<div style='margin-left: 2px; margin-right: 2px;'>
  <a href={$b} class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast'>
  {$a}</a>
</div><br>";

}

function table_bill(){
  echo '<div class="table-responsive-vertical">
		<!-- Table starts here -->
		<table id="table" class="table table-hover table-mc-light-blue">
				<thead>
					<tr>
            <th>Bill ID</th>
            <th>Cust Name</th>
						<th>Date</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>';
}

function table_inv(){
  echo '<div class="table-responsive-vertical">
		<!-- Table starts here -->
		<table id="Bills" class="table table-hover table-mc-light-blue">
				<thead>
					<tr>
            <th>S.No</th>
            <th>Item</th>
						<th>Qty</th>
						<th>Rate</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>';
}

function bill_details($cname,$row){
	echo '<tr>
    <td data-title="ID">'.$row["Bill_ID"].'</td>
    <td data-title="Name"><a href="../Customers/ICust.php?query=' . $row["Cust_ID"]  .'">'. $cname.'</a></td>
    <td data-title="Date">'.$row["Date"].'</td>
    <td data-title="Amount">'.$row["Amount"].'</td>
    <td><a href="removeBill.php?query='.$row["Bill_ID"].'"><img src = "../img/delete_24.png"></img></a></td>
  </tr>';
}

function end_table(){
	echo "</tbody>
  </table>";
}


?>
