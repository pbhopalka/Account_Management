<?php
function _Header($page) {
    
    if($page=='CusA'){
		echo "<HTML><HEAD><TITLE>Add New Customer</TITLE></HEAD><BODY>";
		echo "<h4>Add New Customer</h4> ";
	}
	if($page=='CusE'){
		
		echo "<HTML><HEAD><TITLE>New Customer Addition Error</TITLE></HEAD><BODY>";
		echo "<h4>New Customer Addition Error</h4>";
		
		
	}
	if($page=='CusS'){
		
		echo "<HTML><HEAD><TITLE>Customers</TITLE></HEAD><BODY>";
		echo "<h4>Customer's Details</h4>";
		
	}
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
	echo "<a href='$b'>$a</a>";
}

function table_cust(){
	echo '<table border="1" >
			<tr>
				<th>Customer ID</th>
				<th>Name</th> 
				<th>Address</th>
				<th>Email ID</th>
				<th>Phone No.</th>
				<th>Pending Amount</th>
			</tr>';
}
function cust_details($row){
	echo '<tr>
    <td>'.$row["Cust_ID"].'</td>
    <td>'.$row["Cust_Name"].'</td>
    <td>'.$row["Street"].','.$row["District"].','. $row["State"].'</td>
    <td>'.$row["Email"].'</td>
    <td>'.$row["Phone"].'</td>
    <td>'.$row["Pending_Amount"].'</td>
  </tr>';
}
function end_table(){
	echo "</table>";
}
?>
