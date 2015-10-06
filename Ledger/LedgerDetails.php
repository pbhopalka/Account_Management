<?php

require_once("../includes/global.php");
require_once("functions.php");

$sql = "Select Bill_ID,Cust_ID,Amount from bill_record where Date=".'"'."{$_GET['query']}".'"';


$res = $mysqli->query($sql);

//BILL RECORDS

_Header("Ld",$_GET['query']);

if($res->num_rows > 0 ){
	echo "<h4>Bill Records : </h4>";
	table_bill();
	while($row = $res->fetch_assoc()){
		$cid = $row["Cust_ID"];
		
		$sql = "Select Cust_Name from customer_details where Cust_ID={$cid}";
		$res_cname = $mysqli->query($sql);
		
		$cname = $res_cname->fetch_assoc();
		
		$cname = $cname["Cust_Name"];
		
		bill_details($row,$cname);
	}
	end_table();
}
else{
	echo "No Bill Records in {$_GET['query']} Yet";
}



//Payment Records
$sql = "Select Cust_ID,Payment_ID,Amount from payment_record where Date='{$_GET['query']}'";
$res = $mysqli->query($sql);
if($res->num_rows > 0 ){
	echo "<h4>Payment Records: </h4>";
	table_pay();
	while($row = $res->fetch_assoc()){
		$cid = $row["Cust_ID"];
		
		$sql = "Select Cust_Name from customer_details where Cust_ID={$cid}";
		$res_cname = $mysqli->query($sql);
		
		$cname = $res_cname->fetch_assoc();
		
		$cname = $cname["Cust_Name"];
		pay_details($row,$cname);
	}
	end_table();
}
else{
	echo "No Payment Records on {$_GET['query']} Yet";
}
_Footer();
?>


