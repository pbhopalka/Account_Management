<?php
	
require_once("includes/global.php");

require_once("Customers/functions.php");

_Header("Ledger");


$sql = "SELECT * From ledger;";
//echo $sql."<br>";
$result = $mysqli->query($sql);
//echo "Query Called";
if($result->num_rows > 0){
	table_l();
	while($row = $result->fetch_assoc()){
		l_details($row);
	}
	end_table();
}
else
	echo "No Transactions Yet<br>";


_link("Index Page","index.php");	
	
	
	
?>
