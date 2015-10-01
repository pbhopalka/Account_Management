<?php
require_once("../includes/global.php");
function _Header($page) {
    
    if($page=='BillA'){
		echo "<HTML><HEAD><TITLE>Add New Bill</TITLE></HEAD><BODY>";
		echo "<h4>Add New Bill</h4> ";
	}
	if($page=='BillS'){
		echo "<HTML><HEAD><TITLE>View Bills' Details</TITLE></HEAD><BODY>";
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
	echo '<table border="1" >
			<tr>
				<th>Bill ID</th>
				<th>Cust Name</th>
				<th>Date</th> 
				<th>Amount</th>
			</tr>';
}
function bill_details($cname,$row){
	echo '<tr>
    <td>'.$row["Bill_ID"].'</td>
    <td>'.$cname.'</td>
    <td>'.$row["Date"].'</td>
    <td>'.$row["Amount"].'</td>
  </tr>';
}


function end_table(){
	echo "</table>";
}


?>
