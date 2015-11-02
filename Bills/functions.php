<?php
require_once("../includes/global.php");
function _Header($page) {

    if($page=='BillA'){
		echo "<HTML><HEAD><TITLE>Add New Bill</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>Add New Bill</h4> ";
	}
	if($page=='BillS'){
		echo "<HTML><HEAD><TITLE>View Bills' Details</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>Bill Details</h4> ";
	}



}

function _Footer() {
    echo "</BODY></HTML>";
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
	echo"<button id=$b type=submit><a href='$b'>$a</a></button><br>";
}

function table_bill(){
  echo '<div class="table-responsive-vertical shadow-z-1">
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
