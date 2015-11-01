<?php
require_once("../includes/global.php");

function _Header($page,$info) {


	if($page=="L"){
		echo "<HTML><HEAD><TITLE>Ledger</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>Ledger</h4> ";
	}

	if($page=="Ld"){
		echo "<HTML><HEAD><TITLE>Ledger on {$info}</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>Ledger on {$info}</h4> ";
	}

}

function _Footer() {
	_link("Home","../index.php");
    echo "</BODY></HTML>";
}





function _link($a,$b){
	echo"<br><button id=$b type=submit><a href='$b'>$a</a></button><br>";
}

function end_table(){
	echo "</tbody></table><br>";
}

function table_l(){
	echo '<div class="table-responsive-vertical shadow-z-1">
		<!-- Table starts here -->
		<table id="table" class="table table-hover table-mc-light-blue">
				<thead>
					<tr>
						<th>Date</th>
						<th>Payment Amount</th>
						<th>Bill Amount</th>
					</tr>
				</thead>
				<tbody>';
}
function l_details($row){
	echo '<tr>
		<td data-title="Date"><a href=LedgerDetails.php?query=' . $row["Date"]  .'>'. $row["Date"].'</a></td>
		<td data-title="Payment Amt">'.$row["Payment_Received"].'</td>
		<td data-title="Bill Amt">'.$row["Bill_Amount"].'</td>
	</tr>';
}

function table_bill(){
	echo '<table border="1" >
			<tr>
				<th>Bill ID</th>
				<th>Customer Name'.'</th>
				<th>Amount</th>
			</tr>';
}
function bill_details($row,$cname="pp"){
	echo '<tr>
	 <td>'.$row["Bill_ID"].'</td>
    <td><a href="../Customers/ICust.php?query=' . $row["Cust_ID"]  .'">'. $cname.'</a></td>
    <td>'.$row["Amount"].'</td>
  </tr>';
}

function table_pay(){
	echo '<table border="1" >
			<tr>
				<th>Payment ID</th>
				<th>Customer Name'.'</th>
				<th>Amount</th>
			</tr>';
}
function pay_details($row,$cname="pp"){
	echo '<tr>
	 <td>'.$row["Payment_ID"].'</td>
    <td><a href="../Customers/ICust.php?query=' . $row["Cust_ID"]  .'">'. $cname.'</a></td>
    <td>'.$row["Amount"].'</td>
  </tr>';
}

function delete_if_zero($result){
  while ($row = $result->fetch_assoc()){
    if ($row['Payment_Received'] == 0 && $row['Bill_Amount'] == 0){
      $sql = "DELETE FROM ledger WHERE Date = {$row['Date']}";
      echo $sql;
      $r = $mysqli->query($sql);
      if ($r)
        echo "Success";
      else {
        echo "Failure";

      }
      die();
    }
  }
}
?>
