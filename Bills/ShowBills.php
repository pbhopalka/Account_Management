<?php

require_once("../includes/global.php");
require_once("functions.php");
_Header("BillS");

$sql = "SELECT * From bill_record";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
	table_bill();
	while($row = $result->fetch_assoc()){
		$cid = $row["Cust_ID"];
		$sql = "SELECT Cust_Name FROM customer_details WHERE Cust_ID=$cid;";
		$r = $mysqli->query($sql);
		$r = $r->fetch_assoc();
		$r = $r["Cust_Name"];
	
	
		bill_details($r,$row);
	}
	end_table();
	
}
else
	echo "No Bills Added<br>";

_link("Add Bill","AddBill.php");
_link("Index Page","../index.php");

?>

