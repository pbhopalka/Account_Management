<?php
require_once('functions.php');
require_once("../includes/global.php");
_Header("BillAd");

$date =$_POST["date"];
$amt =$_POST["amt"];
$cid =$_POST["cid"];

$sql = "INSERT INTO bill_record(Date,Cust_ID,Amount) VALUES('$date','$cid',$amt)";

if($mysqli->query($sql)===TRUE){
	//update cust table
	$sql = "Update customer_details set Pending_Amount =  Pending_Amount + $amt where Cust_ID=$cid";
	$mysqli->query($sql);
	
	//update ledger table
	//check if first entry
	$sql = "select Date from ledger where Date='$date'";
	echo $sql;
	$res = $mysqli->query($sql);
	if($res->num_rows > 0 ){
		echo "yess";
		$sql = "update ledger set Bill_Amount = Bill_Amount + $amt where Date='$date'";
		echo "<br>".$sql;
		$mysqli->query($sql);
		echo "updated";
	}
	else{
		echo "noo";
		$sql = "insert into ledger values('$date',$amt,0)";
		echo $sql;
		if($mysqli->query($sql)===TRUE)
			echo "Inserted";
		else{
			echo "Nope";
			echo $mysqli->error;
		}
	}
	
	header('location:ShowBills.php');

}
else{
	echo "Error: " . $sql . "<br>" . $mysqli->error;
	header('location:AddBill.php');
}

?>
