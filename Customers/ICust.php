<?php

require_once("../includes/global.php");
require_once("functions.php");?>

<p><a href="../index.php">Index Page</a></p>
<?php
$sql = "Select * from customer_details where Cust_ID={$_GET['query']}";
$res = $mysqli->query($sql);

$res = $res->fetch_assoc();
$cname = $res["Cust_Name"];
$amt = $res["Pending_Amount"];
_Header("CusD",$cname);

echo "<h4>Customer ID : {$res["Cust_ID"]} </h4>";
echo "<h4>Address</h4>";
echo "<h5>Street : {$res["Street"]}</h5>";
echo "<h5>District : {$res["District"]}</h5>";
echo "<h5>State : {$res["State"]}</h5>";
echo "<h4>Phone : {$res["Phone"]} </h4>";
echo "<h4>Email : {$res["Email"]} </h4>";
echo "<h4>Pending Amount : {$amt} </h4>";

//BILL RECORDS

$sql = "Select Date,Bill_ID,Amount from bill_record where Cust_ID={$_GET['query']}";
$res = $mysqli->query($sql);
if($res->num_rows > 0 ){
	echo "<h3>Bill Records for {$cname} : </h3>";
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
	echo "<h3>Payment Records for {$cname} : </h3>";
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
