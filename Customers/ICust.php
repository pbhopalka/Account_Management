<?php

require_once("../includes/global.php");
require_once("functions.php");
$sql = "Select Cust_Name,Pending_Amount from customer_details where Cust_ID={$_GET['query']}";
$res = $mysqli->query($sql);

$res = $res->fetch_assoc();
$cname = $res["Cust_Name"];
$amt = $res["Pending_Amount"];
_Header("CusD",$cname);

echo "<h4>Pending Amount : {$amt} </h4>";
//BILL RECORDS

$sql = "Select Date,Bill_ID,Amount from bill_record where Cust_ID={$_GET['query']}";
$res = $mysqli->query($sql);
if($res->num_rows > 0 ){
	echo "<h4>Bill Records for {$cname} : </h4>";
	table_bill();
	while($row = $res->fetch_assoc()){
		bill_details($row);
	}
	end_table();
}
else{
	echo "No Bill Records for {$cname} Yet";
}

//Payment Records
$sql = "Select Date,Payment_ID,Amount from payment_record where Cust_ID={$_GET['query']}";
$res = $mysqli->query($sql);
if($res->num_rows > 0 ){
	echo "<h4>Payment Records for {$cname} : </h4>";
	table_pay();
	while($row = $res->fetch_assoc()){
		pay_details($row);
	}
	end_table();
}
else{
	echo "No Payment Records for {$cname} Yet";
}

?>
