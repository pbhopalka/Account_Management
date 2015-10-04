<?php
function _Header($page,$cname="") {

    if($page=='CusA'){
		echo "<HTML><HEAD><TITLE>Add New Customer</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
	}
	if($page=='CusE'){

		echo "<HTML><HEAD><TITLE>New Customer Addition Error</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>New Customer Addition Error</h4>";


	}
	if($page=='CusS'){

		echo "<HTML><HEAD><TITLE>Customers</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>Customer's Details</h4>";

	}

	if($page=='Ledger'){
		echo "<HTML><HEAD><TITLE>Ledger</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h4>Ledger</h4> ";
	}

	if($page=='CusD'){

		echo "<HTML><HEAD><TITLE>{$cname} - Details</TITLE><link href='../css/bootstrap.min.css' rel='stylesheet' media='screen'></HEAD><BODY>";
		echo "<h2>{$cname}</h2>";

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
	echo"<button id=$b type=submit><a href='$b'>$a</a></button><br>";
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
    <td><a href="ICust.php?query=' . $row["Cust_ID"]  .'">'. $row["Cust_Name"].'</a></td>
    <td>'.$row["Street"].','.$row["District"].','. $row["State"].'</td>
    <td>'.$row["Email"].'</td>
    <td>'.$row["Phone"].'</td>
    <td>'.$row["Pending_Amount"].'</td>
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
    <td>'.$row["Date"].'</td>
    <td>'.$row["Bill_Amount"].'</td>
    <td>'.$row["Payment_Received"].'</td>
  </tr>';
}

?>
