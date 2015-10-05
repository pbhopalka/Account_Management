<?php


require_once('functions.php');

_Header("L", "");
require_once("../includes/global.php");

$sql = "SELECT * From ledger;";
//echo $sql."<br>";
$result = $mysqli->query($sql);
//echo "Query Called";
while($row = $result->fetch_assoc()){
	$date = $row['Date'];
	echo $row['Payment_Received'];
	echo $row['Bill_Amount'];
	if ($row['Payment_Received'] == 0 && $row['Bill_Amount'] == 0){
		$sql = "DELETE FROM ledger WHERE Date = '{$date}'";
		$r = $mysqli->query($sql);
		echo $sql;

	}
}
$sql = "SELECT * From ledger;";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
	//delete_if_zero($result);

	table_l();

	while($row = $result->fetch_assoc()){
		l_details($row);
	}
	end_table();
}
else
	echo "No Transactions Yet<br>";


_Footer();

?>
