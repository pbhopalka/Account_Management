<?php
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


function GetForm() {
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$name=$_POST["name"];
		$state=$_POST["state"];
		$dist=$_POST["dist"];
		$state=$_POST["state"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		global $flag;
		if($name != 0)
		$flag=1;
	}
	else{
		global $flag;
		$flag=0;
	}
}

function makeform($act){
	echo "<form method='post' action=$act>";
}
function item($Text,$type,$name,$val=""){
	echo "$Text <input type=$type name=$name><br><br>";
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

function table_cust(){
	echo '<div class="table-responsive-vertical shadow-z-1">
	  <!-- Table starts here -->  <br>
	  <table id="table" class="table table-hover table-mc-light-blue">
	      <thead>
	        <tr>
          <th>Customer ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Email ID</th>
          <th>Phone No.</th>
          <th>Pending Amount</
	        </tr>
	      </thead>
	      <tbody>';
}

function cust_details($row){
	echo '<tr>
    <td data-title="Cust ID">'.$row["Cust_ID"].'</td>
    <td data-title="Name"><a href="ICust.php?query=' . $row["Cust_ID"]  .'">'. $row["Cust_Name"].'</a></td>
    <td data-title="Address">'.$row["District"].','. $row["State"].'</td>
    <td data-title="Email-id">'.$row["Email"].'</td>
    <td data-title="Phone">'.$row["Phone"].'</td>
    <td data-title="Pending Amount">'.$row["Pending_Amount"].'</td>
  </tr>';
}

function table_bill(){
	echo '<table border="1" >
			<tr>
				<th>Bill ID</th>
				<th>Date</th>
				<th>Amount</th>
			</tr>';
}

function bill_details($row){
	echo '<tr>
    <td>'.$row["Bill_ID"].'</td>
    <td>'.$row["Date"].'</td>
    <td>'.$row["Amount"].'</td>
  </tr>';
}

function table_pay(){
	echo '<table border="1" >
			<tr>
				<th>Payment ID</th>
				<th>Date</th>
				<th>Amount</th>
			</tr>';
}

function pay_details($row){
	echo '<tr>
    <td>'.$row["Payment_ID"].'</td>
    <td>'.$row["Date"].'</td>
    <td>'.$row["Amount"].'</td>
  </tr>';
}

function end_table(){
	echo "</tbody>
  </table>
  </div>";
}

function table_l(){
	echo '<table border="1" >
			<tr>
				<th>Date</th>
				<th>Bill Amount</th>
				<th>Payment Amount</th>
			</tr>';
}
function l_details($row){
	echo '<tr>
    <td>'.$row["Date"].'</td>
    <td>'.$row["Bill_Amount"].'</td>
    <td>'.$row["Payment_Received"].'</td>
  </tr>';
}

?>
