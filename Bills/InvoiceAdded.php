<?php
require_once('functions.php');
require_once("../includes/global.php");
_Header("BillAd");

$date = date("Y\-m\-d");
$amt =$_POST["NewAmtName"];
$cid =$_POST["cid"];
$total = $_POST["ItemsNo"];
echo "<br> $date";
echo "<br> $amt";
echo "<br> $cid";
echo "<br> $total";

if($amt==0){
	echo "NOPE";
	header('location:Invoice.php');
}
else{
echo "<br>SSD";
$sql = "INSERT INTO bill_record(Date,Cust_ID,Amount) VALUES('$date','$cid',$amt)";

if($mysqli->query($sql)===TRUE){
	//update cust table
	$billID = $mysqli->insert_id;
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

	echo "<br><br> BILL ID iS $billID";
	echo "$total";
	for($i = 0;$i<=$total;$i++){
		$it = $_POST["Item"][$i]; //item
 		$qt = $_POST["Qty"][$i]; //qty
 		$rt = $_POST["Rate"][$i]; //rate
		if($qt!=0 && $rt!=0){
			$sql = "Insert Into bills values($billID, '$it',$qt,$rt)";
			$mysqli->query($sql);
		}
 	}
	//die();
	header('location:ShowBills.php');

}
else{
	echo "Error: " . $sql . "<br>" . $mysqli->error;
	//die();
	header('location:Invoice.php');
}

}

?>
