<?php

function payment_table(){
	echo '<table border="1" >
			<tr>
				<th>Payment ID</th>
				<th>Date</th>
				<th>Customer ID</th>
				<th>Amount</th>
			</tr>';
}

function payment_details($row){
	echo '<tr>
    <td>'.$row["Payment_ID"].'</td>
    <td>'.$row["Date"].'</td>
    <td>'.$row["Cust_ID"].'</td>
    <td>'.$row["Amount"].'</td>
    <td><a href="removePayment.php">Remove Payment</a></td>
  </tr>';
}

function end_table(){
	echo "</table>";
}

?>
