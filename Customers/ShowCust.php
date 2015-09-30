<?php
require_once("../includes/global.php");
require_once("functions.php");
_Header("CusS");
$sql = "SELECT * From customer_details";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
	table_cust();
	while($row = $result->fetch_assoc()){
		cust_details($row);
	}
	end_table();
	_link("Add Costumers","AddCust.php");
	_link("Index Page","../index.php");
	

}
else
	echo "No Customer's Added";

?>
