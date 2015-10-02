<?php
require_once('../includes/global.php');

function _Header($page) {

   
	if($page=="L"){
		echo "<HTML><HEAD><TITLE>Ledger</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>Ledger</h4> ";
	}
	
}

function _Footer() {
    echo "</BODY></HTML>";
}





function _link($a,$b){
	echo"<button id=$b type=submit><a href='$b'>$a</a></button><br>";
}

function end_table(){
	echo "</table><br>";
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
    <td><a href=LedgerDetails.php?query="' . $row["Date"]  .'">'. $row["Date"].'</a></td>
    <td>'.$row["Bill_Amount"].'</td>
    <td>'.$row["Payment_Received"].'</td>
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
?>

