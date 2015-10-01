<?php
require_once('functions.php');
_Header('BillA');
makeform(htmlspecialchars("AddedBill.php"));

item("Date",'date','date');
echo("Customer Name: ");
//Show List of Customers
	echo '<select id="cust_list" name="cid">';
	$sql = "SELECT Cust_ID, Cust_Name FROM customer_details";
	$result = $mysqli->query($sql);
	
	while($row = $result->fetch_assoc()){
		echo $row['Cust_ID'];
		echo $row['Cust_Name'];
		//echo "<option value='".$c->id."' ".$selected.">".$c->name."</option>" ;
		echo "<option value='".$row['Cust_ID']."'>".$row['Cust_Name']."</option>";
	}
	
	echo "</select><br><br>";
//End of LIST

item("Amount",'text','amt');
item("",'submit',"");
_link("Show Bills Records","ShowBills.php");
_link("Index Page","../index.php");
_Footer();
?>
