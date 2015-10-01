<?php
	
require_once("includes/global.php");

require_once("Customers/functions.php");

_Header("Ledger");
table_l();

$sql = "SELECT * From ledger;";
//echo $sql."<br>";
$result = $mysqli->query($sql);
//echo "Query Called";
if($result->num_rows > 0){
	
	while($row = $result->fetch_assoc()){
		l_details($row);
	}
	end_table();
}
else
	echo "No Transactions Yet";


_link("Index Page","index.php");	
	
	
	
?>
